<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php 
try {
    require_once __DIR__ .  '/../funciones/conn3.php';
    require_once __DIR__ .  '/../funciones/funciones.php';
    
    
    $id = decrypt($_GET["id"]);
    $TableHeader = "OP_Presupuesto";
    $TableDetalle = "OP_PresupuestoDetalle";
    
    $Query = "SELECT * FROM {$TableHeader} WHERE id = '{$id}' ";
    $Result = mysqli_query($conn3, $Query);
    $RowsHeader = mysqli_fetch_assoc($Result);

    $usuario_id = $RowsHeader["usuario_id"];
    $fecha_registro = $RowsHeader["fecha_registro"];
    $fecha_registro_nueva = date("Y-m-d");
    // $fecha_registro_array = explode(" ", $fecha_registro);
    // $fecha_registro_nueva = $fecha_registro_array[0];
    $fecha_vencimiento = $RowsHeader["fecha_vencimiento"];
    $fecha_vencimiento_array = explode(" ", $fecha_vencimiento);
    $fecha_vencimiento_nueva = $fecha_vencimiento_array[0];

    $numeroPresupuesto = funcionMaster($usuario_id, "ID", "numeroPresupuesto", "usuarios");
    if ( !is_numeric($numeroPresupuesto) ) {
        throw new Exception("Numero de presupuesto no es numerico => {$numeroPresupuesto}", 1);
    }

    $numeroPresupuesto += 1;

    

    $QueryAddColumnOP = "ALTER TABLE $TableHeader ADD COLUMN IF NOT EXISTS fecha_presupuesto_corriente DATETIME NULL COMMENT 'Columna que indica la fecha en la que se convirtio el presupuesto en presupuesto corriente'";
    mysqli_query($conn3, $QueryAddColumnOP) or throw new Exception("Error al crear columna od_presupuesto_id => " . ( mysqli_error($conn3) ), 1);

    $QueryAddColumnOP = "ALTER TABLE $TableHeader ADD COLUMN IF NOT EXISTS soperacioninv_id INT NULL COMMENT 'Columna que indica la relacion con la tabla sOperacionInv'";
    mysqli_query($conn3, $QueryAddColumnOP) or throw new Exception("Error al crear columna od_presupuesto_id => " . ( mysqli_error($conn3) ), 1);

    $QueryAddColumnOP = "ALTER TABLE sOperacionInv  ADD COLUMN IF NOT EXISTS od_presupuesto_id INT NULL DEFAULT 0 COMMENT 'Columna que referencia al presupuesto de odontograma en el caso de que exista en la tabla {$TableHeader}'";
    mysqli_query($conn3, $QueryAddColumnOP) or throw new Exception("Error al crear columna od_presupuesto_id => " . ( mysqli_error($conn3) ), 1);

    $InsertHeader = "INSERT INTO sOperacionInv SET 
                        numeroDoc = '$numeroPresupuesto',
                        idCliente = '{$RowsHeader["cliente_id"]}',
                        idEmpresa = '{$RowsHeader["usuario_id"]}',
                        fechaOperacion = '$fecha_registro_nueva',
                        fechaVencimiento = '$fecha_vencimiento_nueva',
                        docOrigen = '0',
                        seriaOperacion = NULL,
                        impuesto = '0',
                        impuestoBase = '0',
                        totalNeto = '{$RowsHeader["total_neto"]}',     
                        totalBruto = '{$RowsHeader["total_bruto"]}',
                        cantidadProduc = '{$RowsHeader["cantidad_items"]}',
                        descuentos = '0',
                        montoPagado = '{$RowsHeader["monto_pagado"]}' ,
                        nota = '{$RowsHeader["nota"]}',
                        tipo = '2',
                        Deposito_id = '0',
                        od_presupuesto_id = '{$RowsHeader["id"]}',
                        ID_principal = '{$RowsHeader["ID_principal"]}'";

    mysqli_query($conn3, $InsertHeader) or throw new Exception("Error al guardar => " . ( mysqli_error($conn3) ) . $InsertHeader, 1);
    $idOperacion = mysqli_insert_id($conn3);

    $QueryDetalle = "SELECT * FROM {$TableDetalle} WHERE presupuesto_id = '{$id}' ";
    $ResultDetalle = mysqli_query($conn3, $QueryDetalle);

    $QueryAddColumnOPD = "ALTER TABLE sDetalleOper 
                        ADD COLUMN IF NOT EXISTS od_presupuesto_detalle_id  INT NULL DEFAULT 0 COMMENT 'Columna que referencia al detalle de presupuesto de odontograma en el caso de que exista en la tabla {$TableDetalle}',
                        ADD COLUMN IF NOT EXISTS nombre_procedimiento_odontograma  TEXT NULL DEFAULT '0' COMMENT 'Columna que guarda el nombre del procedimiento de odontograma'";
    mysqli_query($conn3, $QueryAddColumnOPD) or throw new Exception("Error al crear columnas => " . ( mysqli_error($conn3) ), 1);

    $QueryAddColumnOPD = "  ALTER TABLE $TableDetalle 
                            ADD COLUMN IF NOT EXISTS sdetalleoper_id INT NULL COMMENT 'Columna que indica la relacion con la tabla sDetalleOper',
                            ADD COLUMN IF NOT EXISTS fecha_presupuesto_corriente DATETIME NULL COMMENT 'Columna que indica la fecha en la que se convirtio el presupuesto en presupuesto corriente'";
    mysqli_query($conn3, $QueryAddColumnOPD) or throw new Exception("Error al crear columna sdetalleoper_id => " . ( mysqli_error($conn3) ), 1);

    foreach ($ResultDetalle as $RowDetalle) {

        $procedimientoNombre = funcionMaster($RowDetalle["procedimiento_id"], "id", "Nombre", "OD_Procedimiento"); 

        $InsertDetalle = "INSERT INTO sDetalleOper SET
                            idOperacion = '$idOperacion',
                            fechaRegistro = '$fecha_registro_nueva',
                            idProducto = '0',
                            cantidad = '{$RowDetalle["cantidad"]}',
                            descripcion = '{$RowDetalle["descripcion"]}',
                            nombre_procedimiento_odontograma = '$procedimientoNombre',
                            base = '{$RowDetalle["precio_base"]}',
                            impuesto = '0',
                            totalbase = '{$RowDetalle["precio_total_base"]}',
                            subTotal = '{$RowDetalle["subTotal"]}',
                            id_usuario = '{$RowDetalle["usuario_id"]}',
                            id_cliente = '{$RowDetalle["cliente_id"]}',
                            Descuento_Numerico = '{$RowDetalle["descuento_numerico"]}',
                            Descuento_Textual = '{$RowDetalle["descuento_textual"]}',
                            od_presupuesto_detalle_id = '{$RowDetalle["id"]}',
                            SinvDep_id = '0',
                            Deposito_id = '0',
                            Mas_Detalles = '0',
                            Impuesto_Numerico = '{$RowDetalle["impuesto_numerico"]}',
                            Impuesto_Textual = '{$RowDetalle["impuestoo_textual"]}',
                            Total = '{$RowDetalle["subTotal"]}'";

        mysqli_query($conn3, $InsertDetalle) or throw new Exception("Error al guardar detalle => " . ( mysqli_error($conn3) ), 1);
        $id_detalle = mysqli_insert_id($conn3);
        
        $UpdateTablaDetalle = "UPDATE $TableDetalle SET 
                                sdetalleoper_id = '$id_detalle',
                                fecha_presupuesto_corriente = '".date("Y-m-d H:i:s")."' 
                                WHERE id= '{$RowDetalle["id"]}'";
                                
        mysqli_query($conn3, $UpdateTablaDetalle) or throw new Exception("Error al actualizar {$TableDetalle} => " . ( mysqli_error($conn3) ), 1);
    }

    mysqli_query($conn3, "UPDATE usuarios SET numeroPresupuesto = $numeroPresupuesto where ID = $usuario_id") or throw new Exception("Error al actualizar numeracion de presupuesto => " . ( mysqli_error($conn3) ), 1);

    $UpdateTablaHeader = "UPDATE $TableHeader SET 
                            fecha_presupuesto_corriente = '".date("Y-m-d H:i:s")."',
                            soperacioninv_id = '$idOperacion' 
                            WHERE id= '{$id}' ";
    
    mysqli_query($conn3, $UpdateTablaHeader) or throw new Exception("Error al actualizar {$TableHeader} => " . ( mysqli_error($conn3) ), 1); 


    if ( intval($RowsHeader["monto_pagado"])  > 0) {
        $factura = funcionMaster($idOperacion, "idOperacion", "numeroDoc", "sOperacionInv");
        $monto_pagado_factura = funcionMaster($idOperacion,'idOperacion','montoPagado','sOperacionInv');
        $monto_total = funcionMaster($idOperacion,'idOperacion','totalNeto','sOperacionInv');
        $montoFinal=$monto_pagado_factura+$valor_abonar;


        $InsertAbono = "INSERT INTO abono SET 
                            fecha                   = '$fecha_registro_nueva',
                            numero_operacion        = '$idOperacion',
                            numero_documento        = '$factura',
                            usuario_id              = '$usuario_id',
                            cliente_id              = '{$RowsHeader["cliente_id"]}',
                            valor_abonado           = '{$RowsHeader["monto_pagado"]}',
                            valor_anterior_factura  = '$monto_pagado_factura',
                            valor_nuevo_factura     = '$montoFinal',
                            monto_faltante          = '$montoPendienteFinal',
                            pago                    = '',
                            banco                   = '',
                            tarjeta                 = '',
                            cuenta                  = '',
                            notas                   = 'Abono inicial',
                            fecha_abono             = '$fecha_abono',
                            hora                    = '". date("H:i:s")."'";
                            
        mysqli_query($conn3, $InsertAbono) or throw new Exception("Error al guardar abono => " .  $InsertAbono . " => " . ( mysqli_error($conn3) ), 1);;

    }



    echo "ok";
    
    echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Correcto',
                text: 'Presupuesto corriente generado correctamente'
            }).then(() => {
                history.back();
            });
        </script>";

} catch (\Throwable $th) { 
    $error = $th->getMessage();
    $line = $th->getLine(); 
    
    echo "bad";
    // echo "Ocurrio un fatal error: => " . $error . " en la linea => " . $line;
    
    ?>
    
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Ocurrio un error'
        });

        console.error(`Error <?= $error; ?>`);
        console.error(`Line <?= $line; ?>`);
    </script>

<?php 
} 
?>
