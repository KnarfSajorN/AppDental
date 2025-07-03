<?php

if ($_POST['key']) {
    include 'config.php';

    function meer($texto1)
    {

        //Rememplazamos caracteres especiales latinos minusculas
        $repl = array('á', 'é', 'í', 'ó', 'ú', 'ñ', '\"', '€', 'ü');
        $find = array('&aacute;', '&eacute;', '&iacute;', '&oacute;', '&uacute;', '&ntilde;', '&quot;', '&euro;', '&uuml;');
        $texto1 = str_replace($find, $repl, $texto1);


        //Rememplazamos caracteres especiales latinos mayusculas
        $repl = array('Á', 'É', 'Í', 'Ó', 'Ú', 'Ñ', 'Ü', 'ç', 'Ç');
        $find = array('&Aacute;', '&Eacute;', '&Iacute;', '&Oacute;', '&Uacute;', '&Ntilde;', '&Uuml;', '&ccedil;', '&Ccedil;');
        $texto1 = str_replace($find, $repl, $texto1);

        return $texto1;
    }

    function MasDetalles_EditarP($idProductoT, $SinvDep_id)
    {
        include 'funciones/conn3.php';

        $QueryInventario = mysqli_query($conn3, "SELECT * FROM  sinvetrios where ID = $idProductoT");
        while ($RowInventario = mysqli_fetch_array($QueryInventario)) {
            $tipo = $RowInventario['tipo'];
        }
        $TipoInventario = funcionMasterEditarPresupuesto($tipo, 'id', 'tipo', 'scategoria');

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $TextoInventario = "";
        if ($TipoInventario == "3") {

            $TextoInventarioCompuesto = "";
            $resultCompuestos = mysqli_query($conn3, "SELECT * from SinvComp where idCompuesto = '$idProductoT' and activo = 1");
            while ($rowCompuestos = mysqli_fetch_array($resultCompuestos)) {
                $TextoInventarioCompuesto .= funcionMasterEditarPresupuesto($rowCompuestos['idSinvetrios'], 'id', 'descripcion', 'sinvetrios') . " x" . $rowCompuestos['cantidad'] . " | ";
            }
            $TextoInventario = "[" . $TextoInventarioCompuesto . "]";
        } else if ($TipoInventario == "5") {

            $TextoInventarioLotesTallas = "";
            $resultCompuestos = mysqli_query($conn3, "SELECT * from SinvDep where id = '$SinvDep_id' ");
            while ($rowCompuestos = mysqli_fetch_array($resultCompuestos)) {
                if ($TipoInventario == "5") {
                    $TextoInventarioLotesTallas = $rowCompuestos['lote'];
                }
            }
            $TextoInventario = "[" . $TextoInventarioLotesTallas . "]";
        }

        return $TextoInventario;
    }

    function funcionMasterEditarPresupuesto($filtro, $campoFiltrar, $campoImprimir, $tabla)
    {
        include 'funciones/conn3.php';
        $query = mysqli_query($conn3, "SELECT * FROM $tabla where $campoFiltrar = '$filtro'");
        // $nrowl = mysqli_num_rows($query);
        while ($row = mysqli_fetch_array($query)) {

            $text = $row[$campoImprimir];
        }
        return  $text;
    }

    // $conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));
    $idCliente = $_POST['idCliente'];
    $idOperacion = $_POST['idOperacion'];
    $idUsuario = $_POST['idUsuario'];
    if ($_POST['key'] == "cargarItems") {
        $queryResult = mysqli_query($conn3, "SELECT * FROM sDetalleOper where id_cliente = $idCliente and idOperacion = $idOperacion and estado = 1 order by id") or die(var_dump(mysqli_error_list($conn3)));
        // $queryResult = mysqli_query($conn3, "SELECT * FROM sDetalleOper where id_usuario = $idUsuario and  id_cliente = $idCliente and idOperacion = $idOperacion order by id") or die(var_dump(mysqli_error_list($conn3)));
        // $row = mysqli_num_rows($queryResult);
        $numero = 0;
        while ($resultArray = mysqli_fetch_array($queryResult)) {
            $newArray[$numero][0] = $numero + 1;
            $newArray[$numero][1] = base64_encode(utf8_decode($resultArray['descripcion']));
            $newArray[$numero][2] = base64_encode(number_format($resultArray['cantidad'], 2, '.', ''));
            $newArray[$numero][3] = base64_encode(number_format($resultArray['base'], 2, '.', ''));
            $newArray[$numero][4] = base64_encode(number_format($resultArray['subTotal'], 2, '.', ''));
            $newArray[$numero][5] = base64_encode($resultArray['id']);
            $newArray[$numero][6] = $resultArray['detalle_presupuesto_odontograma'];
            $newArray[$numero][7] = base64_encode(number_format($resultArray['Descuento_Numerico'], 2, '.', ''));   
            $newArray[$numero][8] = $resultArray['SinvDep_id'];
            $newArray[$numero][9] = $resultArray['idProducto'];
            $newArray[$numero][10] = $resultArray['Impuesto_Numerico'];
            $newArray[$numero][11] = base64_encode(number_format($resultArray['Total'], 2, '.', ''));
            $numero++;
        }
        $queryResultDescuento = mysqli_query($conn3, "SELECT * FROM sOperacionInv where idCliente = $idCliente and idOperacion = $idOperacion")->fetch_object();
        $newArray[count($newArray)][0] = $queryResultDescuento->descuentos;
    } else if ($_POST['key'] == "editarItem" || $_POST['key'] == "removeItem" || $_POST['key'] == "isertarItem" || $_POST['key'] == "editarDescuento") {
        $id = $_POST['id'];
        if ($_POST['key'] == "editarItem" || $_POST['key'] == "isertarItem" || $_POST['key'] == "editarDescuento") {
            if ($_POST['key'] == "editarDescuento") {
                $newDesc = ($_POST['newDesc'] == "" || $_POST['newDesc'] < 0 ? 0 : $_POST['newDesc']);
                $queryActualizarDescuento = mysqli_query($conn3, "UPDATE sOperacionInv SET descuentos = '$newDesc' where idEmpresa = $idUsuario and  idCliente = $idCliente and idOperacion = $idOperacion");
            } else {

                

                $cantidad = $_POST['cantidad'];
                $descripcion = $_POST['descripcion'];
                if (is_numeric($descripcion)) {
                    $queryList = mysqli_query($conn3, "SELECT * FROM sinvetrios WHERE ID = $descripcion");
                    // $nrowl = mysqli_num_rows($queryList);
                    while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                        $descripcion     = $row_recordset32['descripcion'];
                    }
                }
                $base = $_POST['base'];
                $subTotal = $_POST['subTotal'];
                if ($_POST['key'] == "isertarItem") {
                    $fechaRegistro = $_POST['fechaRegistro'];
                    $totalBase = round($base * $cantidad,2);


                    $descuento_base = $_POST['descuento'];
                    if (strpos($descuento_base, '%') !== false) {
                    
                      $descuentos = str_replace("%", "", "$descuento_base");
                      $descuentos = ($descuentos / 100);
                      $descuento_final = round(($totalBase * $descuentos), 2);
                      //echo "porcentaje ->>>>>>>>>>>>>>>>($totalBase * $descuentos) | $descuentos | $descuento_final";
                    } else {
                      $descuento_final = $descuento_base;
                      //echo "numerico";
                    }


                    ////////////////////apartado iva
                    $idProducto = $_POST['descripcion'];

                    $iva = funcionMasterEditarPresupuesto($idProducto, 'ID', 'iva', 'sinvetrios');
                    if($iva!="" AND $iva != "0") {
                        // Calcular el monto del IVA
                        $ivaMonto = round((($subTotal * $iva) / 100),2);

                        // Sumar el monto del IVA al subtotal
                        $totalConIva = round($subTotal + $ivaMonto,2);
                    }else{
                            $iva=0;
                            $ivaMonto=0;
                            $totalConIva = round($subTotal,2);  
                    }
                    //////////////////////////////////

                    $SinvDep_id = $_POST['SinvDep_id'];
                    $Deposito_id = $_POST['deposito'];

                    

                    $Descuento_Textual = $_POST['descuento'];
                    $Descuento_Numerico = $descuento_final;
                    
                    //////////////////////////////////////////////////////////////////////////
                    //toco poner esto manual con una nueva funcion
                    $idProductoT=$idProducto;
                    $SinvDep_id=$SinvDep_id;
                    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                    $Mas_Detalles = mysqli_real_escape_string($conn3,MasDetalles_EditarP($idProductoT,$SinvDep_id));
                    //////////////////////////////////////////////////////////////////////////
                    
                    $queryResultInsert = mysqli_query($conn3, "INSERT INTO sDetalleOper SET idOperacion = $idOperacion, fechaRegistro = '$fechaRegistro', idProducto = $idProducto, cantidad = $cantidad, descripcion = '$descripcion', base = '$base', impuesto = 0, 
                    totalbase = {$totalBase}, subTotal = $subTotal, id_usuario = $idUsuario, id_cliente = $idCliente, Descuento_Textual = '$Descuento_Textual', Descuento_Numerico = '$Descuento_Numerico', SinvDep_id='$SinvDep_id', Deposito_id='$Deposito_id', Mas_Detalles='$Mas_Detalles'
                    , Impuesto_Numerico = '$ivaMonto', Impuesto_Textual = '$iva', Total = '$totalConIva' ") or die(var_dump(mysqli_error_list($conn3)));
                } else {

                    $descuento_base = $_POST['descuento'];
                    $totalBase = $base * $cantidad;
                    if (strpos($descuento_base, '%') !== false) {
                  
                      $descuentos = str_replace("%", "", "$descuento_base");
                      $descuentos = ($descuentos / 100);
                      $descuento_final = round(($totalBase * $descuentos), 2);
                      //echo "porcentaje";
                    } else {
                      $descuento_final = $descuento_base;
                      //echo "numerico";
                    }

                    $Descuento_Textual = $_POST['descuento'];
                    $Descuento_Numerico = $descuento_final;

                    //$idProducto = $_POST['descripcion'];


                    ////////////////////apartado iva
                    $idProducto = $_POST['descripcion'];

                    $iva = funcionMaster($idProducto, 'ID', 'iva', 'sinvetrios');
                    if($iva!="" AND $iva != "0") {
                        // Calcular el monto del IVA
                        $ivaMonto = round((($subTotal * $iva) / 100),2);

                        // Sumar el monto del IVA al subtotal
                        $totalConIva = round($subTotal + $ivaMonto,2);
                    }else{
                            $iva=0;
                            $ivaMonto=0;
                            $totalConIva = round($subTotal,2);  
                    }
                    //////////////////////////////////

                    /////////////////////////////////////////////////////////////////////

                    $SinvDep_id = $_POST['SinvDep_id'];
                    $Deposito_id = $_POST['deposito'];
                    

                    //////////////////////////////////////////////////////////////////////////
                    //toco poner esto manual con una nueva funcion
                    $idProductoT=$idProducto;
                    $SinvDep_id=$SinvDep_id;
                    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                    $Mas_Detalles = mysqli_real_escape_string($conn3,MasDetalles_EditarP($idProductoT,$SinvDep_id));
                    //////////////////////////////////////////////////////////////////////////
                    
                    $queryResultInsert = mysqli_query($conn3, "UPDATE sDetalleOper SET idProducto = $idProducto , cantidad = $cantidad, descripcion = '$descripcion', totalbase = $totalBase, base = $base, subTotal = $subTotal, 
                    Descuento_Textual = '$Descuento_Textual', Descuento_Numerico = $Descuento_Numerico ,SinvDep_id='$SinvDep_id', Deposito_id='$Deposito_id', Mas_Detalles='$Mas_Detalles'
                    , Impuesto_Numerico = '$ivaMonto', Impuesto_Textual = '$iva', Total = '$totalConIva' where id_usuario = $idUsuario AND id_cliente = $idCliente AND idOperacion = $idOperacion AND id = $id");
                }
            }
        } else if ($_POST['key'] == "removeItem") {
            $queryResultRemove = mysqli_query($conn3, "UPDATE sDetalleOper set estado = 0 WHERE id_usuario = $idUsuario AND id_cliente = $idCliente AND idOperacion = $idOperacion AND id = $id");
        }
        if ($queryResultInsert || $queryResultRemove || $queryActualizarDescuento) {

            /*
            $impuestoF="0";
            $queryList111 = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $idUsuario");
            while ($rowMotorizado111 = mysqli_fetch_array($queryList111)) {
                $impuestoF = $rowMotorizado111['impuestoF'];
            }
            if($impuestoF==""){$impuestoF="0";}
            */
            $impuestoF="0";
            $queryResultActually = mysqli_query($conn3, "SELECT sum(cantidad) as catTotal, sum(subTotal) as precioTotal, sum(base) as base, sum(totalbase) as totalBase, sum(Descuento_Numerico) as descuento
            ,SUM(Impuesto_Numerico) as sumImpuesto,SUM(Total) as sumTotal  FROM sDetalleOper where id_cliente = $idCliente and idOperacion = $idOperacion and estado = 1");
            // $queryResultActually = mysqli_query($conn3, "SELECT sum(cantidad) as catTotal, sum(base) as precioTotal, sum(subTotal) as totalBase FROM sDetalleOper where id_usuario = $idUsuario and  id_cliente = $idCliente and idOperacion = $idOperacion");
            // $row = mysqli_num_rows($queryResultActually);
            while ($resultArray = mysqli_fetch_array($queryResultActually)) {
                $catTotal = $resultArray['catTotal'];
                $precioTotal = $resultArray['precioTotal'];
                $totalBase = $resultArray['totalBase'];
                $descuento = $resultArray['descuento'];

                $sumImpuesto = $resultArray['sumImpuesto'];
				$sumTotal = $resultArray['sumTotal'];
                if($sumImpuesto==""){$sumImpuesto=0;}
                /*
                $total1="0";
                if ($impuestoF > 0) {
                    $impuestoF2 = $impuestoF / 100;
                    $total1 =  $precioTotal * $impuestoF2;
                    $total =  $total1 + $precioTotal;
                } else {


                    $total =  $precioTotal;
                }
                */
                $queryResultDescuento = mysqli_query($conn3, "SELECT * FROM sOperacionInv where idEmpresa = $idUsuario and idCliente = $idCliente and idOperacion = $idOperacion")->fetch_object();
                // $totalBase = $totalBase - $queryResultDescuento->descuentos;
                
                
                $queryResultInsert = mysqli_query($conn3, "UPDATE sOperacionInv SET impuesto='$impuestoF',impuestoBase='$sumImpuesto',totalNeto = '$sumTotal', totalBruto = '$totalBase', cantidadProduc = '$catTotal', descuentos = '$descuento' where idEmpresa = $idUsuario and  idCliente = $idCliente and idOperacion = $idOperacion")  or die(var_dump(mysqli_error_list($conn3)));
                $newArray = $queryResultInsert ? 1 : 0;
            }
        }
    } else if ($_POST['key'] == "cargarProducto") {
        $queryList = mysqli_query($conn3, "SELECT si.* FROM sinvetrios si
                                  JOIN scategoria sca ON si.tipo = sca.id
                                  WHERE 1=1
                                  AND si.estado = 1
                                  AND sca.tipo in (1,2,3,5)") or die(var_dump(mysqli_error_list($conn3)));
        // $nrowl = mysqli_num_rows($queryList);
        while ($row_recordset32 = mysqli_fetch_array($queryList)) {
            $descripcion     = $row_recordset32['descripcion'];
            $existencia      = $row_recordset32['existencia'];
            $cliente_id      = $row_recordset32['cliente_id'];
            $referencia      = $row_recordset32['referencia'];
            $ID              = $row_recordset32['ID'];
            $newArray .= "<option value='$ID'" . ($_POST['nameCode'] == $descripcion ? 'selected' : '') . ">$referencia | $descripcion </option>";
        }
    }
    header("Content-type: application/json; charset= utf-8");
    echo json_encode($newArray);
    exit();
}
include 'header.php';
include 'menu.php';

$idOperacion = $_GET['idOperacion'];

$queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv where idOperacion = $idOperacion");
// $nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $idOperacion      = $rowMotorizado['idOperacion'];
    $numeroDoc      = $rowMotorizado['numeroDoc'];
    $idCliente      = $rowMotorizado['idCliente'];
    $idEmpresa      = $rowMotorizado['idEmpresa'];
    $fechaOperacion      = $rowMotorizado['fechaOperacion'];
    $fechaOperacion = list($y, $m, $d) = explode("-", $fechaOperacion);
    $fechaOperacion = $d . "-" . $m . "-" . $y;
    $fechaVencimiento = $rowMotorizado['fechaVencimiento'];
    $fechaVencimiento = list($y, $m, $d) = explode("-", $fechaVencimiento);
    $fechaVencimiento = $d . "-" . $m . "-" . $y;
    $subTotal      = $rowMotorizado['subTotal'];
    $impuesto      = $rowMotorizado['impuesto'];
    $totalNeto      = $rowMotorizado['totalNeto'];
    $totalBruto      = $rowMotorizado['totalBruto'];
    $cantidadProduc      = $rowMotorizado['cantidadProduc'];
    $descuentos      = $rowMotorizado['descuentos'];
    $montoPagado      = $rowMotorizado['montoPagado'];
    $nota      = $rowMotorizado['nota'];

    $tipo_presupuesto = $rowMotorizado['tipo'];
    $Deposito_id = $rowMotorizado['Deposito_id'];
}


$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $idEmpresa");
// $nrowl = mysqli_num_rows($queryList);
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

}



$queryList = mysqli_query($conn3, "SELECT * FROM  usuarios where ID = $idEmpresa");
// $nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

    $empresaNombre      = $rowMotorizado['empresaNombre'];
    $pais               = $rowMotorizado['pais'];

    $ciudad             = $rowMotorizado['ciudad'];
    $direccion          = $rowMotorizado['direccion'];
    $telefono           = $rowMotorizado['telefono'];
    $NOMBRE_USUARIO           = $rowMotorizado['NOMBRE_USUARIO'];

    $nit                = $rowMotorizado['nit'];
}


$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $idCliente");
// $nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

    $nombre_cliente             = $rowMotorizado['nombre_cliente'];
    $ciudad_cliente             = $rowMotorizado['ciudad_cliente'];

    $correo_cliente             = $rowMotorizado['correo_cliente'];
    $direccion_cliente          = $rowMotorizado['direccion_cliente'];
    $telefono_cliente           = $rowMotorizado['telefono_cliente'];
    $whatsapp           = $rowMotorizado['whatsapp'];
    $codigo_ciudad           = $rowMotorizado['codigo_ciudad'];
    $CODI_CLIENTE           = $rowMotorizado['CODI_CLIENTE'];
}


$saldo = $totalBruto - $montoPagado;

if ($saldo == 0) {
    $pagado = '<div align="center"><img src="https://' . $Base . '/pagado.png" height="10%" width="30%"></div>';
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Presupuesto
            <small># 0000<?php echo $numeroDoc ?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li class="active"> Presupuesto</li>
        </ol>
    </section>


    <!-- Main content -->
    <section class="invoice p-3">
        <!-- title row -->
        <div class="row">


            <div class="col-md-12">
                <hr style="border-top: 1px solid #000;">


                <div class="col-xs-6" style="text-align-last: center;">
                    <h1 class="page-header" style="font-size: 30px;">
                        PRESUPUESTO #<?php echo $numeroDoc ?>
                    </h1>
                </div>

                <div class="col-xs-6">
                    <h2 class="page-header" style="font-size: 20px;">
                        <small class="pull-center"><strong>Fecha :</strong> <?php echo $fechaOperacion ?></small>
                        <small class="pull-center"><strong>Usuario :</strong> <?php echo $NOMBRE_USUARIO ?></small>

                    </h2>
                </div>
                <hr style="border-top: 1px solid #000;">

            </div>

            <div class="col-md-12">
                <div class="row">
                <div class="col-md-6 invoice-col" style="font-size: 14px;">
                    <h4>Datos de la Empresa</h4>
                    <address>
                        <strong>Nombre de la Empresa:</strong><?php echo $nombreF ?><br>
                        <!-- Licencia: <strong> <?php echo $licenciaF ?></strong><br> -->
                        <strong>NIT:</strong> <?php echo $nit ?><br>
                        <strong>Dirección:</strong> <?php echo $direccionF ?> - <?php echo $ciudadPaisF ?><br>
                        <strong>Teléfono:</strong> <?php echo $telefonoF ?><br>
                        <strong>Email:</strong> <?php echo $emailF ?>
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-md-6 invoice-col" style="font-size: 14px;">
                    <h4>Datos del Cliente</h4>
                    <address>

                        <strong>Nombre: </strong> <?php echo $nombre_cliente ?><br>
                        <strong>Cédula:</strong> <?php echo $CODI_CLIENTE ?> <br>
                        <strong>Dirección:</strong> <?php echo $direccion_cliente ?><br>
                        <strong>Ciudad:</strong> <?php echo $codigo_ciudad ?><br>
                        <strong>Teléfono:</strong> <?php echo $whatsapp ?><br>
                        <strong>Email:</strong> <?php echo $correo_cliente ?>
                    </address>
                </div>
                </div>

                <hr style="border-top: 1px solid #000;">

            </div>
            <div class="col-md-12">
                <?php
                $queryListDP = mysqli_query($conn3, "SELECT * from dep WHERE id = '$Deposito_id' ");
                while ($rowMotorizadoDP = mysqli_fetch_array($queryListDP)) {
                    $idDP = $rowMotorizadoDP['id'];
                    $descripcionDP = $rowMotorizadoDP['descripcion'];
                          
                    echo "<h3 style='text-align-last: center;'>Deposito : ".$descripcionDP."</h3>";
                    echo '<input type="hidden" name="Deposito_id" id="deposito" value="'.$idDP.'">';// esto es importante no eliminar se usa para editar y crear el producto
                }
                ?>
            </div>
            <!-- Table row -->
            <div class="col-md-12">
                <div class="col-md-12 table-responsive">
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
                                    <div align="Right">Descuento</div>
                                </th>                               
                                <th>
                                    <div align="Right">Subtotal </div>
                                </th>
                                <th>
                                    <div align="center">Opciones</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="impFactura">
                            <?php

                            $resultado = mysqli_query($conn3,"SELECT * FROM  sDetalleOper where id_usuario = $idEmpresa and  id_cliente = $idCliente and idOperacion = $idOperacion and estado = 1 order by id");
                            //$resultado=mysqli_query($conn3,"select * from patients where ID_Doctor = '$ID_DOSTOR'");
                            // $check = mysqli_num_rows($q);

                            while ($fila = mysqli_fetch_array($resultado)) {


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

            <div class="col-md-6">
                <!-- accepted payments column -->
                <div class="col-md-6">
                    <?php
                    if($tipo_presupuesto==6){
                        echo "<label style='color:red'>Este presupuesto es de odontograma y puede contener registros realizados desde la ventana emergente de facturar procedimientos con el siguiente icono tendrán los detalles que son registrados desde la ventana emergente <i class='fa fa-tooth' aria-hidden='true'></i>  </label>";
                    }
                    ?>

                    <p class="lead">Comentarios:</p>


                    <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                        <?php echo $nota; ?>
                    </p>
                </div>
                <!-- /.col -->
                <div class="col-md-6">


                    <div class="table-responsive">
                        <table class="table">

                
                            <!-- <tr>
                                <th>Total:</th>
                                <td id="totalP"></td>
                                <!-- <?php echo number_format($montoPagado, 2) . " $" ?> -->
                           <!-- </tr> -->

                            <tr id="descuento">
                        
                            <!-- <td> <?php echo $totalD ?> </td> -->
                            </tr>
                            <!-- <tr>
                                <th>Total Nota de Venta:</th>
                                <td id="totalNV"></td>
                                <!-- <?php echo number_format($totalNeto, 2) . " $" ?> -->
                            <!-- </tr> -->
                            <tr>
                                <th>subtotal:</th>
                                <td id="totalS"></td>
                            </tr>
                            <tr>
                                <th>Impuesto:</th>
                                <td id="totalI"></td>
                            </tr>
                            <tr>
                                <th>Total Nota de Presupuesto:</th>
                                <td id="totalP"></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- /.col -->
            </div>



            <!-- /.row -->

            <!-- this row will not appear when printing -->
            <div class="row no-print">



                <div class="col-xs-12" align="center">
                    <a href="SclienteAdministracion_ControlPresupuesto" class="btn btn-block btn-outline-success rounded-pill shadow m-1"><i class="fa fa-sign-in"></i> Guardar y salir</a>


                </div>



                <div class="col-xs-12" align="center">
                    <?php echo $pieF ?>
                </div>







            </div>
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
</div>

<script type="text/javascript">
    let cacheIndice = "";
    let cacheCargaProducto;

    function cargarCosto(indice) {
        var codigoProd = (indice != 0 ? $("#producto" + indice).val() : $("#codigoProd").val());

        $.ajax({
            type: "POST",
            url: "ajax_cargarPrecio.php",
            data: {
                codigoProd: codigoProd,
                usuario_id: <?= $idEmpresa ?>,
                key: "editFactura"
            },
            success: function(resp) {
                if (resp) {
                    if (indice != 0) {
                        $("#precio" + indice).val(parseInt(resp));
                        calcularSubTotal(indice);
                    } else {
                        $("#base").val(parseInt(resp));
                        calcularSubTotal();
                    }
                }
            }
        });
    };

    // Funcion que adapta number_format de PHP para javascript = formato de miles y decimales.
    function number_format(number, decimals, decPoint, thousandsSep) { // eslint-disable-line camelcase
        number = (number + '').replace(/[^0-9+\-Ee.]/g, '')
        const n = !isFinite(+number) ? 0 : +number
        const prec = !isFinite(+decimals) ? 0 : Math.abs(decimals)
        const sep = (typeof thousandsSep === 'undefined') ? ',' : thousandsSep
        const dec = (typeof decPoint === 'undefined') ? '.' : decPoint
        let s = ''
        const toFixedFix = function(n, prec) {
            if (('' + n).indexOf('e') === -1) {
                return +(Math.round(n + 'e+' + prec) + 'e-' + prec)
            } else {
                const arr = ('' + n).split('e')
                let sig = ''
                if (+arr[1] + prec > 0) {
                    sig = '+'
                }
                return (+(Math.round(+arr[0] + 'e' + sig + (+arr[1] + prec)) + 'e-' + prec)).toFixed(prec)
            }
        }
        // @todo: for IE parseFloat(0.55).toFixed(0) = 0;
        s = (prec ? toFixedFix(n, prec).toString() : '' + Math.round(n)).split('.')
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep)
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || ''
            s[1] += new Array(prec - s[1].length + 1).join('0')
        }
        return s.join(dec)
    }

    function cargarProductos(indice) {
        if (indice != cacheCargaProducto) {
            let date;
            if (indice != 0) {
                date = {
                    idUsuario: <?= $idEmpresa ?>,
                    nameCode: $("#nameCod" + indice).val(),
                    key: "cargarProducto"
                };
            } else {
                date = {
                    idUsuario: <?= $idEmpresa ?>,
                    key: "cargarProducto"
                };
            }
            // console.log(date);
            cacheCargaProducto = indice;
            // console.log(cacheCargaProducto);
            $.ajax({
                url: "Editar_Presupuesto.php",
                data: date,
                method: "POST",
                dataType: "JSON",
                success: function(resp) {
                    // console.log(resp);
                    if (resp) {
                        
                        if (indice != 0) {
                            // console.log("entre1");
                            $("#producto" + indice).html(resp);
                        } else {
                            // console.log("entre2");
                            $("#codigoProd").html(resp);
                        }
                    }
                },
            });
        }
        $('.select2').select2();
    }

    function calcularSubTotal(indice) {
        console.log(indice);
        

        if (!indice) {
            
            var descuentoInicial = $("#descuento").val();
            // Verificar si el valor contiene el carácter %
            if (descuentoInicial.includes("%")) {
                var numeroDescuento = parseFloat(descuentoInicial.replace("%", ""));
                var subtotal = number_format(($("#cantidad").val() * $("#base").val()), 2, '.', '');
                
                // Calcular el monto de descuento (porcentaje del subtotal)
                var montoDescuento = (numeroDescuento / 100) * (subtotal);

                // Calcular el subtotal después de aplicar el descuento
                var subtotalConDescuento = (subtotal) - montoDescuento;

                // Formatear el subtotal con dos decimales
                var subtotalFormateado = subtotalConDescuento.toFixed(2);

                $("#subtotal").val(subtotalFormateado);
            } else {
                $("#subtotal").val((number_format(($("#cantidad").val() * $("#base").val()), 2, '.', ''))-($("#descuento").val()));
            }
            
        } else {

            var descuentoInicial = $("#descuento"+ indice).val();
            // Verificar si el valor contiene el carácter %
            if (descuentoInicial.includes("%")) {
                var numeroDescuento = parseFloat(descuentoInicial.replace("%", ""));
                var subtotal = number_format(($("#cantidad"+ indice).val() * $("#precio"+ indice).val()), 2, '.', '');
                
                // Calcular el monto de descuento (porcentaje del subtotal)
                var montoDescuento = (numeroDescuento / 100) * (subtotal);

                // Calcular el subtotal después de aplicar el descuento
                var subtotalConDescuento = (subtotal) - montoDescuento;

                // Formatear el subtotal con dos decimales
                var subtotalFormateado = subtotalConDescuento.toFixed(2);

                $("#subtotal"+ indice).val(subtotalFormateado);
            } else {
                $("#subtotal" + indice).val((number_format(($("#cantidad" + indice).val() * $("#precio" + indice).val()), 2, '.', ''))-($("#descuento" + indice).val()));
            }

            
        }
    }

    function ValidarInput(campo,indice) {
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

      calcularSubTotal(indice);
    }


    function operacionRemovEditInsert(indice, id, modo) {
        let date = "";
        if (modo == 0) { // editar
            date = {
                idCliente: <?= $idCliente ?>,
                idOperacion: <?= $idOperacion ?>,
                idUsuario: <?= $idEmpresa ?>,
                id: id,
                descripcion: $("#producto" + indice).val(),
                cantidad: $("#cantidad" + indice).val(),
                base: $("#precio" + indice).val(),
                subTotal: $("#subtotal" + indice).val(),
                descuento: $("#descuento" + indice).val(),

                deposito: $("#deposito").val(),
                SinvDep_id: $("#SinvDep_id"+ indice).val(),

                key: "editarItem"
            };
        } else if (modo == 1) { // remover
            date = {
                idCliente: <?= $idCliente ?>,
                idOperacion: <?= $idOperacion ?>,
                idUsuario: <?= $idEmpresa ?>,
                id: id,
                key: "removeItem"
            };
        } else if (modo == 2) { // insertar
            let fecha = new Date();
            let year = fecha.toLocaleDateString().split("/");
            fecha = year[2] + "-" + year[1] + "-" + year[0] + " " + fecha.toLocaleTimeString().split(":")[0] + ":" + fecha.toLocaleTimeString().split(":")[1] + ":" + fecha.toLocaleTimeString().split(":")[2].split(" ")[0];
            date = {
                idCliente: <?= $idCliente ?>,
                idOperacion: <?= $idOperacion ?>,
                idUsuario: <?= $idEmpresa ?>,
                descripcion: $("#codigoProd").val(),
                cantidad: $("#cantidad").val(),
                base: $("#base").val(),
                subTotal: $("#subtotal").val(),
                descuento: $("#descuento").val(),
                fechaRegistro: fecha,

                SinvDep_id: $("#SinvDep_id").val(),
                deposito: $("#deposito").val(),

                key: "isertarItem"
            };
        }
         console.log(date);
        $.ajax({
            url: "Editar_Presupuesto.php",
            data: date,
            method: "POST",
            dataType: "JSON",
            success: function(resp) {
                // console.log(resp);
                // console.log("first3")
                console.log(resp);
                if (resp) {
                    // console.log("first2")
                    cargarItems();
                    cargarProductos(-1);
                }
            },
        });
    }

    function activarEdit(indice) {
        if (cacheIndice != "") {
            $("#producto" + cacheIndice).attr("disabled", true);
            $("#cantidad" + cacheIndice).attr("disabled", true);
            $("#precio" + cacheIndice).attr("disabled", true);
            $("#descuento" + cacheIndice).attr("disabled", true);
            $("#precio" + cacheIndice).val(number_format($("#precio" + cacheIndice).val(), 2));
            $("#subtotal" + cacheIndice).attr("disabled", true);
            $("#subtotal" + cacheIndice).val(number_format($("#subtotal" + cacheIndice).val(), 2));
            $("#trash" + cacheIndice).hide();
            $("#edit" + cacheIndice).show();
        }

        if (indice != false) {
            cacheIndice = indice;
            $("#producto" + indice).attr("disabled", false);
            $("#cantidad" + indice).attr("disabled", false);
            $("#precio" + indice).attr("disabled", false);
            $("#descuento" + indice).attr("disabled", false);
            $("#precio" + indice).val(number_format($("#precio" + indice).val(), 2, '.', ''));
            $("#subtotal" + indice).attr("disabled", false);
            $("#subtotal" + indice).val(number_format($("#subtotal" + indice).val(), 2, '.', ''));
            $("#trash" + indice).show();
            $("#edit" + indice).hide();
        }
    }

    function cargarItems() {
        let date = {
            idCliente: <?= $idCliente ?>,
            idOperacion: <?= $idOperacion ?>,
            idUsuario: <?= $idEmpresa ?>,
            key: "cargarItems"
        };
        // console.log(date);
        // console.log("items");
        $.ajax({
            url: "Editar_Presupuesto.php",
            data: date,
            method: "POST",
            dataType: "JSON",
            success: function(resp) {
                // console.log(resp);
                if (resp) {
                    let imprimir = "";
                    let total = 0;
                    let totalI = 0;
                    let totalS = 0;
                    for (let num = 0; num < (resp.length - 1); num++) {
                        // console.log(resp[num]);
                        var icono = "";
                        if(resp[num][6]!="0"){
                            icono = '<i class="fa fa-tooth"></i>';
                        }

                        imprimir +=
                            '<tr>' +
                            '<td width="5%">' + resp[num][0] +' '+icono+'</td>' +
                            '<td width="30%">' +
                            '<input type="hidden" name="nameCod' + resp[num][0] + '" id="nameCod' + resp[num][0] + '" value="' + atob(resp[num][1]) + '">' +
                            '<select name="producto' + resp[num][0] + '" id="producto' + resp[num][0] + '" class="form-control select2 input-lg" style="width: 100%;" onclick="cargarProductos(' + resp[num][0] + ')" onChange="CargarPrecioProducto(' + resp[num][0] + ');" onmouseover="this.focus();" disabled>' +
                            '<option value="'+ resp[num][9] + '"selected>' + atob(resp[num][1]) + '</option>' +
                            '</select>' +
                            '<div id="Campo_Adicional_Producto' + resp[num][0] + '" class="col-md-12">'+
                                '<input type="hidden" name="SinvDep_id' + resp[num][0] + '" id="SinvDep_id' + resp[num][0] + '" value="'+resp[num][8]+'">'+
                            '</div>'+
                            '</td>' +

                            '<td width="10%"><div align="Right"><input type="number" step="0.01" onkeyup="calcularSubTotal(' + resp[num][0] + ')" name="cantidad' + resp[num][0] + '" id="cantidad' + resp[num][0] + '" class="form-control input-lg" value="' + number_format(atob(resp[num][2]), 2, '.', '') + '" disabled></div></td>' +

                            '<td width="10%"><div align="Right"><input type="number" step="0.01" onkeyup="calcularSubTotal(' + resp[num][0] + ')" name="precio' + resp[num][0] + '" id="precio' + resp[num][0] + '" class="form-control input-lg" value="' + number_format(atob(resp[num][3]), 2, '.', '') + '" disabled></div></td>' +

                            '<td width="10%"><div align="Right"><input type="text" step="0.01"  name="descuento' + resp[num][0] + '" id="descuento' + resp[num][0] + '" class="form-control input-lg" value="' + number_format(atob(resp[num][7]), 2, '.', '') + '" pattern="[0-9.%]+" oninput="ValidarInput(this,'+ resp[num][0] +')"  disabled></div></td>' +

                            '<td width="20%"><div align="Right"><input type="number" step="0.01" name="subtotal' + resp[num][0] + '" id="subtotal' + resp[num][0] + '" class="form-control input-lg" value="' + number_format(atob(resp[num][4]), 2, '.', '') + '" disabled></div></td>' +

                            '<td width="10%" style="font-size: 22px; width: 96%; height: 45px; margin:7px; display:flex; justify-content: space-evenly; align-items: center;"> <i class="fa fa-refresh text-black" onclick="operacionRemovEditInsert(' + resp[num][0] + ',' + atob(resp[num][5]) + ',0)" style="display:none; cursor:pointer;" id="trash' + resp[num][0] + '"></i> <i class="fa fa-edit text-primary" style="cursor:pointer;" id="edit' + resp[num][0] + '" onclick="activarEdit(' + resp[num][0] + ')"></i> <i class="fa fa-trash text-danger" onclick="operacionRemovEditInsert(' + resp[num][0] + ',' + atob(resp[num][5]) + ',1)" style="cursor:pointer;" id="trash' + resp[num][0] + '"></i> </td>' +
                            '</tr>';
                        total = total + parseFloat(number_format(atob(resp[num][11]), 2, '.', ''));
                        totalI = totalI + parseFloat(number_format((resp[num][10]), 2, '.', ''));
                        totalS = totalS + parseFloat(number_format(atob(resp[num][4]), 2, '.', ''));
                    }
                    imprimir +=
                        '<tr>' +
                        '<td width="5%">' + (resp.length + 1) + '</td>' +
                        '<td width="30%">' +
                        '<select id="codigoProd" name="producto" class="form-control select2 input-lg" style="width: 100%;" required="required" onclick="cargarProductos(0)" onChange="CargarPrecioProducto(0);" onmouseover="this.focus();">' +
                        '</select>' +
                        '<div id="Campo_Adicional_Producto" class="col-md-12">'+

                        '</div>'+
                        '</td>' +
                        '<td width="10%"><div align="Right"><input type="number" step="0.01" name="cantidad" id="cantidad" onkeyup="calcularSubTotal()" class="form-control input-lg" value="1"></div></td>' +

                        '<td width="20%"><div align="Right"><input type="number" step="0.01" name="precio" id="base" onkeyup="calcularSubTotal()" class="form-control input-lg" value=""></div></td>' +

                        '<td width="20%"><div align="Right"><input type="text" step="0.01" name="descuento" id="descuento" pattern="[0-9.%]+" oninput="ValidarInput(this)"  class="form-control input-lg" value=""></div></td>' +

                        '<td width="20%"><div align="Right"><input type="number" step="0.01" name="subtotal" id="subtotal" class="form-control input-lg" value=""></div></td>' +

                        '<td width="10%" style="font-size: 22px; width: 96%; height: 46px; margin:7px; display:flex; justify-content: center; align-items: center;"> <a class="text-primary" style="font-size: 36px; cursor:pointer;" onclick="operacionRemovEditInsert(0,0,2);"><i class="fa fa-plus-circle"></i></a> </td>' +
                        // '<td width="10%" style="font-size: 22px; width: 96%; height: 46px; margin:7px; display:flex; justify-content: center; align-items: center;"> <div class="btn btn-primary" style="font-size: 20px; width:37px; height:36px; display:flex; justify-content: center; align-items: center; border-radius:100%" onclick="operacionRemovEditInsert(0,0,2)"><i class="fa fa-plus-circle"></i></div> </td>' +
                        '</tr>';
                    $("#impFactura").html(imprimir);
                    
                    if (resp[resp.length - 1] >= 0) {
                        let impDescuento = '<th>Descuento: </th>' +
                            '<td style="display: flex;">' +
                            '  <div><input type="number" step="0.01" name="desct" id="desct" class="form-control input-lg" value="' + resp[resp.length - 1] + '" disabled style="height: 40px;"></div></div>' +
                            '  <div style="display: flex; justify-content:center; align-items: center;">' +
                            // '  <a href="#dc" onclick="editActualizarDescuento(1,<?= $idOperacion ?>)" id="editDescuento"><i class="fa fa-edit" style="font-size: 25px; margin-left: 15px;"></i></a>' +
                            // '  <a href="#dc" onclick="editActualizarDescuento(0,<?= $idOperacion ?>)" id="actualizarDescuento" style="font-size: 25px; margin-left: 15px; display:none;"><i class="fa fa-refresh"></i></a></div>' +
                            '</td>';
                        $("#descuento").html(impDescuento || 0);
                    }
                        $("#totalI").html(number_format(totalI, 2) + " $");
                        $("#totalP").html(number_format(total, 2) + " $");
                        $("#totalS").html(number_format(totalS, 2) + " $");
                        // $("#totalNV").html(number_format((total - resp[resp.length - 1]), 2) + "$");
                        
                }
            },
        });
    }

    function editActualizarDescuento(modo, idOperacion) {
        // console.log($("#desct").val());
        $("#" + (modo == 1 ? 'actualizarDescuento' : 'editDescuento')).show();
        $("#" + (modo == 1 ? 'desct' : 'desct')).attr('disabled', (modo == 1 ? false : true));
        $("#" + (modo == 0 ? 'actualizarDescuento' : 'editDescuento')).hide();
        if (modo == 0) {
            let date = {
                idCliente: <?= $idCliente ?>,
                idOperacion: <?= $idOperacion ?>,
                idUsuario: <?= $idEmpresa ?>,
                newDesc: $("#desct").val(),
                key: "editarDescuento"
            };
            $.ajax({
                url: "Editar_Presupuesto.php",
                data: date,
                method: "POST",
                dataType: "JSON",
                success: function(resp) {
                    // console.log(resp);
                    if (resp) {
                        cargarItems();
                    }
                },
            });
        }
    }

    window.addEventListener('load', () => {
        // console.log("entre");
        cargarItems();
    });
</script>

<script>

function CargarPrecioProducto(indice) {
    
    var deposito = $("#deposito").val();
    //var codigoProd = (indice != 0 ? $("#producto" + indice).val() : $("#codigoProd").val());
    if (indice != 0) {
        var DivCampoPersonalizado_1 = document.getElementById('Campo_Adicional_Producto' + indice);
        var codigoProd = $("#producto"+indice).val();
        var nombreindice=indice;
    } else {
        var DivCampoPersonalizado_1 = document.getElementById('Campo_Adicional_Producto');
        var codigoProd = $("#codigoProd").val();
        var nombreindice="";
    }
    DivCampoPersonalizado_1.innerHTML="";
    
    console.log(codigoProd);
    if(codigoProd != "" && codigoProd!=null){
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

        // codigo para el apartado de lotes
        if(Respuesta.Lista == true && Respuesta.Tipo == "Lotes"){

        var DivCampoPersonalizado = DivCampoPersonalizado_1;
        // Crea el elemento select
        var selectElement = document.createElement('select');
        selectElement.className = "form-control input-lg";
        selectElement.setAttribute('required', 'required');
        selectElement.setAttribute('name', 'SinvDep_id'+nombreindice);
        selectElement.setAttribute('id', 'SinvDep_id'+nombreindice);
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
          //var Mensaje = "Existencia Disponible: <u><b>"+existencias+"</b></u>";
          //info de las existencias informacion_existencia
          //document.getElementById('informacion_existencia').innerHTML = Mensaje;
          ///////////////////////////////////////////////////////////////////////////
          // Establecer el valor máximo para el elemento con id=1 que es el campo cantidad
          //var elemento1 = document.getElementById('1');
          // elemento1.max = existencias;
        };

        DivCampoPersonalizado.appendChild(selectElement);

      }
      //codigo para el apartado de producto simple
      else if(Respuesta.Tipo == "Simple"){
        
        var DivCampoPersonalizado = DivCampoPersonalizado_1;
        var Options = Respuesta.Detalles;
        //console.log(Options);

        // Crea el elemento input hidden
        var input = document.createElement('input');
        input.setAttribute('type', 'hidden');
        input.setAttribute('name', 'SinvDep_id'+nombreindice);
        input.setAttribute('id', 'SinvDep_id'+nombreindice);
        //selectElement.setAttribute('name', 'SinvDep_id');
        
        Object.keys(Options).forEach(function(key) {
          var item = Options[key];
          input.value = item.id;

          //var elemento1 = document.getElementById('1');
          //elemento1.max = item.Existencia;

          ////////////////////
          //var Mensaje = "Existencia Disponible: <u><b>"+item.Existencia+"</b></u>";
          //document.getElementById('informacion_existencia').innerHTML = Mensaje;
          //////////////////////

        });
        DivCampoPersonalizado.appendChild(input);
        
      }
      //codigo para el apartado del producto compuesto
      else if(Respuesta.Tipo == "Compuesto"){
        
        var DivCampoPersonalizado = DivCampoPersonalizado_1;
        var Options = Respuesta.Detalles;
        //console.log(Options);
        // Crea el elemento input hidden
        var input = document.createElement('input');
        input.setAttribute('type', 'hidden');
        input.setAttribute('name', 'SinvDep_id'+nombreindice);
        input.setAttribute('id', 'SinvDep_id'+nombreindice);
        //selectElement.setAttribute('name', 'SinvDep_id');

        var labelElement = document.createElement('label');
        
        Object.keys(Options).forEach(function(key) {
          var item = Options[key];
          input.value = "0";

          //var elemento1 = document.getElementById('1');
          //elemento1.max = item.Existencia;
          labelElement.textContent = item.Nombre;

          ////////////////////
          //var Mensaje = "Existencia Disponible: <u><b>"+item.Existencia+"</b></u>";
          //document.getElementById('informacion_existencia').innerHTML = Mensaje;
          //////////////////////

        });
        
        DivCampoPersonalizado.appendChild(input);
        DivCampoPersonalizado.appendChild(labelElement);
      }
      else if(Respuesta.Tipo == "Servicio"){
        
        var DivCampoPersonalizado = DivCampoPersonalizado_1;
        var Options = Respuesta.Detalles;
        //console.log(Options);

        // Crea el elemento input hidden
        var input = document.createElement('input');
        input.setAttribute('type', 'hidden');
        input.setAttribute('name', 'SinvDep_id'+nombreindice);
        input.setAttribute('id', 'SinvDep_id'+nombreindice);

        input.value = "0";
        ////////////////////
        //var Mensaje = "<u><b>Servicio</b></u>";
        //document.getElementById('informacion_existencia').innerHTML = Mensaje;
        //////////////////////

        DivCampoPersonalizado.appendChild(input);

      }
      // si no tiene un tipo de clasificacion nos indicara este error
      else if(Respuesta.Tipo == "Error"){
        
        alert('el tipo del producto tiene un error con la clasificacion del inventario');
        //ActualizacionDeposito();
        DivCampoPersonalizado_1.innerHTML="";
        if (indice != 0) {
            $("#nameCod"+indice).val("").trigger('change');
        } else {
            $("#codigoProd").val("").trigger('change');
        }

      }


      if (indice != 0) {
          $("#precio" + indice).val(parseInt(Respuesta.Precio));
          calcularSubTotal(indice);
      } else {
          $("#base").val(parseInt(Respuesta.Precio));
          calcularSubTotal();
      }

      }
    });
  }
  else{
    //if (indice != 0) {
    //        $("#nameCod"+indice).val("").trigger('change');
    //    } else {
    //        $("#codigoProd").val("").trigger('change');
    //    }
  }

}

</script>

<?php include("footer.php") ?>