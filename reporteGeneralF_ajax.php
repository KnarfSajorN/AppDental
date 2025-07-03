    <?php
    date_default_timezone_set('America/Bogota');
    // include("conexiones/conexion.php");
    // include("funciones/conexiones.php");
    include("funciones/funciones.php");
    // $con = conectar();
    $conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));

    $desde = $_POST['desde'];
    $hasta = $_POST['hasta'];
    $tipo = $_POST['tipo'];
    $ID = $_POST['ID'];

    $resultados = [];

    ?> <?php echo 'Desde: ' . $desde . '<br> Hasta:' . $hasta ?>
    <?php
    $tipo = $_POST['tipo'];

    if ($_POST['tipo'] <> 0) {
        echo '<br>Cliente: ' . $tipo;
    } elseif ($_POST['tipo'] == 0) {
        echo '<br> Todos';
    }
    ?>

    <?php
    $tiposPago = [
        "10" => "EFECTIVO",
        "2" => "CREDITO",
        "20" => "CHEQUE",
        "31" => "TRANSFERENCIA",
        "34" => "DEPOSITO",
        "48" => "TAR. VISA CREDITO",
        "49" => "TAR. VISA DEBITO",
    ];

    $tipo = $_POST['tipo'];

    if ($tipo == 0) {
        $queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv where activo = 1 and fechaOperacion BETWEEN '$desde' and '$hasta' ");
    } elseif ($tipo <> 0) {
        $queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv  where activo = 1 and idCliente = $tipo and fechaOperacion BETWEEN '$desde' and '$hasta' ");
    }

    if ($queryList) {
        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
            $fechaOperacion      = $rowMotorizado['fechaOperacion'];
            $numeroDoc               = $rowMotorizado['numeroDoc'];
            $subTotal               = $rowMotorizado['subTotal'];
            $impuesto               = $rowMotorizado['impuesto'];
            $totalBruto               = $rowMotorizado['totalBruto'];
            $montoPagado               = $rowMotorizado['montoPagado'];
            $cantidadProduc               = $rowMotorizado['cantidadProduc'];
            $idCliente               = $rowMotorizado['idCliente'];
            $idOperacion               = $rowMotorizado['idOperacion'];
            $vendedor               = $rowMotorizado['vendedor'];
            $pago               = $rowMotorizado['pago'];
            $tipoDoc               = $rowMotorizado['tipo'];
            $voucher               = $rowMotorizado['voucher'];
            $entidadf               = $rowMotorizado['entidadf'];

            // VALIDAREMOS SI REALMENTE HA PASADO LA FACTURA
            $queryOpera = mysqli_query($conn3, "SELECT * FROM  fe_registroelectronico WHERE idOperacon = '{$idOperacion}' ORDER BY id");
            if ($queryOpera) {
                while ($rowOperac = mysqli_fetch_array($queryOpera)) {
                    $cufe = $rowOperac['cufe'];
                    $dian_descripcion = $rowOperac['dian_descripcion'];
                    $docpdf_pdfbase64 = $rowOperac['docpdf_pdfbase64'];
                    $docpdf = strlen($docpdf_pdfbase64);
                }
            }

            $queryListA = mysqli_query($conn3, "SELECT * FROM  AperturaCaja  where  Fecha BETWEEN '$desde' and '$hasta' ");

            if ($queryListA) {
                while ($rowA = mysqli_fetch_array($queryListA)) {
                    $caja_farmacia = $rowA['caja_farmacia'];
                    $caja_recepcion = $rowA['caja_recepcion'];

                    $cajatotal += $caja;
                }
            }


            $queryListCli = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $idCliente");
            $nrowl = mysqli_num_rows($queryListCli);
            while ($rowCli = mysqli_fetch_array($queryListCli)) {

                $nombre_cliente      = $rowCli['nombre_cliente'];
                $tipo_cliente      = $rowCli['tipo_cliente'];
                $CODI_CLIENTE      = $rowCli['CODI_CLIENTE'];
                $correo_cliente      = $rowCli['correo_cliente'];
                $direccion_cliente      = $rowCli['direccion_cliente'];
                $whatsapp      = $rowCli['whatsapp'];
            }


            $metodo_pago1 = '';
            $metodoPagoString1 = '';
            $queryListCli1 = mysqli_query($conn3, "SELECT * FROM sDetalleMetodosPagos where idOperacion = $idOperacion ");
            $nrowl = mysqli_num_rows($queryListCli1);
            while ($rowCli1 = mysqli_fetch_array($queryListCli1)) {
                echo $metodo_pago1         = $rowCli1['metodo_pago'];



                $metodoPagoString1 .= "{$metodo_pago1},";
            }




            $metodoPagoString = (preg_replace("/,$/", "", $metodoPagoString1));

            $resultado = mysqli_query($conn3, "SELECT * FROM  sDetalleOper where id_usuario = $ID and id_cliente = $idCliente and idOperacion = 6 order by id");



            while ($fila = mysqli_fetch_array($resultado)) {

                $Numero++;
                $total += $fila[9];
            }
            $totales += $totalBruto;



            $totales1 += $montoPagado;



            if (is_numeric($vendedor)) {
                $vendedor = funcionMaster($vendedor, "ID", "nombre", "vendedoresFE");
                $vendedor = strtoupper($vendedor);
            }
        }
    }
    ?>



    <?php

    $queryListCli112 = mysqli_query($conn3, "SELECT * FROM  aperturacaja  where Fecha BETWEEN '$desde' and '$hasta' ");
    if ($queryListCli112) {
        while ($rowCli112 = mysqli_fetch_array($queryListCli112)) {
            $Fecha    = $rowCli112['Fecha'];
            $Hora   = $rowCli112['Hora'];
            $caja_farmacia     = $rowCli112['caja_farmacia'];
            $caja_recepcion     = $rowCli112['caja_recepcion'];

            echo '<tr>
                        <td width="20%">' . $Fecha . '  - ' . $Hora . ' </td>
                        <td width="40%">' . number_format($caja_farmacia, 2) . ' </td>
                        <td width="40%">' . number_format($caja_recepcion, 2) . ' </td>';
        }
    }

    ?>

    <?php

    $tipo = $_POST['tipo'];

    if ($tipo == 0) {

        $queryList = mysqli_query($conn3, "SELECT * FROM  sCuentasCobrar where  fechaActualizado BETWEEN '$desde' and '$hasta' ");
    } elseif ($tipo <> 0) {

        $queryList = mysqli_query($conn3, "SELECT * FROM  sCuentasCobrar  where  idCliente = $tipo and fechaActualizado BETWEEN '$desde' and '$hasta' ");
    }

    $nrowl = mysqli_num_rows($queryList);
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {

        $fechaOperacion      = $rowMotorizado['fechaActualizado'];
        $numeroDoc               = $rowMotorizado['numeroDocumento'];

        $montoBase               = $rowMotorizado['montoBase'];


        $montoPendiente               = $rowMotorizado['montoPendiente'];

        $montoPagado               = $rowMotorizado['montoPagado'];

        $fechaPago               = $rowMotorizado['fechaPago'];

        $idCliente               = $rowMotorizado['idEmpresa'];



        //  '.$fila[2].'                    <a href="" >  <i class="fa fa-pencil-square-o"></i>   </a>  
        $Numero++;

        $queryListCli = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $idCliente");
        $nrowl = mysqli_num_rows($queryListCli);
        while ($rowCli = mysqli_fetch_array($queryListCli)) {
            $nombre_cliente      = $rowCli['nombre_cliente'];
        }
    }

    $resultados['operaciones'][] = [
        'Numero de factura' => 'FEAD ' . $numeroDoc,
        'Vendedor' => $vendedor,
        'Paciente' => $nombre_cliente,
        'Tipo Doc' => $tipo_cliente,
        'Numero Doc' => $CODI_CLIENTE,
        'Correo' => $correo_cliente,
        'Direccion' => $direccion_cliente,
        'Numero Telefono' => $whatsapp,
        'Fecha' => $fechaOperacion,
        'Tipo' => ($tipoDoc == 2 ? 'NOTA CREDITO' : 'FACTURA'),
        'Cantidad de productos' => $cantidadProduc,
        'Método de pago' => $tiposPago[$pago],
        'Método de pago de abono' => $metodoAbono,
        'Entidad Bancaria de Voucher' => $entidadf,
        'Num Voucher' => $voucher,
        'Sub total' => $totalBruto,
        'Impuesto' => $impuesto,
        'Total' => $totalBruto,
        'Monto pagado' => $montoPagado
    ];

    $jsonResultados = json_encode($resultados, JSON_PRETTY_PRINT);

    // Imprimir el JSON
    header('Content-Type: application/json');
    echo $jsonResultados;

    ?>