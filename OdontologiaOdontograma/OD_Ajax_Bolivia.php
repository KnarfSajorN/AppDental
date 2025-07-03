<?php

try {

    session_start();
    require_once __DIR__ . "/../funciones/conn3.php";
    require_once __DIR__ . '/../plugins/comprimir/comprimirImagen.php';
    date_default_timezone_set('America/Bogota');


    $linkkey = !$linkkey ? $_SESSION['linkkey'] : $linkkey;


    //esto es para evitar que cuando se ejecute esta funcion no genere error con el funcionMaster del require_once f../unciones/funciones.php
    if ($_POST["Tipo_Consulta"] != "Enviar Firmar Cliente") {
        function funcionMaster($filtro, $campoFiltrar, $campoImprimir, $tabla)
        {
            // require_once __DIR__ . '/../funciones/conn3.php';
            global $conn3;
            $query = mysqli_query($conn3, "SELECT * FROM $tabla where $campoFiltrar = '$filtro'");
            $nrowl = mysqli_num_rows($query);
            while ($row = mysqli_fetch_array($query)) {

                $text = $row[$campoImprimir];
            }
            return  $text;
        }

        function DatosIngresarMysqli($valor)
        {
            // require_once __DIR__ . "/../funciones/conn3.php";
            global $conn3;
            foreach ($valor as $key => $value) {
                if (is_array($value)) {
                    $Arreglo[$key] = DatosIngresarMysqli($value);
                } else {
                    $Arreglo[$key] = mysqli_real_escape_string($conn3, $value);
                }
            }
            return $Arreglo;
        }
    }



    $tabla = mysqli_query($conn3, "SHOW TABLES LIKE 'OD_OdontogramaMaster_Pendientes'");
    $nrowtabla = mysqli_num_rows($tabla);
    if ($nrowtabla == 0) {

        $query = "CREATE TABLE `OD_OdontogramaMaster_Pendientes` (
    `id` int(11) NOT NULL,
    `Fecha` date DEFAULT NULL,
    `Hora` time NOT NULL,
    `cliente_id` int(11) DEFAULT NULL,
    `usuario_id` int(11) DEFAULT NULL, 
    `d18` TEXT NULL DEFAULT  '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `d17` TEXT NULL DEFAULT  '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `d16` TEXT NULL DEFAULT  '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `d15` TEXT NULL DEFAULT  '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `d14` TEXT NULL DEFAULT  '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `d13` TEXT NULL DEFAULT  '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `d12` TEXT NULL DEFAULT  '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `d11` TEXT NULL DEFAULT  '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `d21` TEXT NULL DEFAULT  '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `d22` TEXT NULL DEFAULT  '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `d23` TEXT NULL DEFAULT  '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `d24` TEXT NULL DEFAULT  '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `d25` TEXT NULL DEFAULT  '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `d26` TEXT NULL DEFAULT  '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `d27` TEXT NULL DEFAULT  '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `d28` TEXT NULL DEFAULT  '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `d55` TEXT NULL DEFAULT  '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `d54` TEXT NULL DEFAULT  '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `d53` TEXT NULL DEFAULT  '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `d52` TEXT NULL DEFAULT  '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `d51` TEXT NULL DEFAULT  '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `d61` TEXT NULL DEFAULT  '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `d62` TEXT NULL DEFAULT  '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `d63` TEXT NULL DEFAULT  '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `d64` TEXT NULL DEFAULT  '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `d65` TEXT NULL DEFAULT  '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `d48` TEXT NULL DEFAULT  '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `d47` TEXT NULL DEFAULT  '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `d46` TEXT NULL DEFAULT  '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `d45` TEXT NULL DEFAULT  '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `d44` TEXT NULL DEFAULT  '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `d43` TEXT NULL DEFAULT  '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `d42` TEXT NULL DEFAULT  '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `d41` TEXT NULL DEFAULT  '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `d31` TEXT NULL DEFAULT  '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `d32` TEXT NULL DEFAULT  '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `d33` TEXT NULL DEFAULT  '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `d34` TEXT NULL DEFAULT  '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `d35` TEXT NULL DEFAULT  '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `d36` TEXT NULL DEFAULT  '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `d37` TEXT NULL DEFAULT  '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `d38` TEXT NULL DEFAULT  '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `d85` TEXT NULL DEFAULT  '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `d84` TEXT NULL DEFAULT  '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `d83` TEXT NULL DEFAULT  '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `d82` TEXT NULL DEFAULT  '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `d81` TEXT NULL DEFAULT  '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `d71` TEXT NULL DEFAULT  '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `d72` TEXT NULL DEFAULT  '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `d73` TEXT NULL DEFAULT  '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `d74` TEXT NULL DEFAULT  '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `d75` TEXT NULL DEFAULT  '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',

    `r18` TEXT NULL DEFAULT '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `r17` TEXT NULL DEFAULT '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `r16` TEXT NULL DEFAULT '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `r15` TEXT NULL DEFAULT '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `r14` TEXT NULL DEFAULT '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `r13` TEXT NULL DEFAULT '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `r12` TEXT NULL DEFAULT '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `r11` TEXT NULL DEFAULT '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `r21` TEXT NULL DEFAULT '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `r22` TEXT NULL DEFAULT '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `r23` TEXT NULL DEFAULT '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `r24` TEXT NULL DEFAULT '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `r25` TEXT NULL DEFAULT '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `r26` TEXT NULL DEFAULT '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `r27` TEXT NULL DEFAULT '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `r28` TEXT NULL DEFAULT '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `r55` TEXT NULL DEFAULT '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `r54` TEXT NULL DEFAULT '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `r53` TEXT NULL DEFAULT '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `r52` TEXT NULL DEFAULT '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `r51` TEXT NULL DEFAULT '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `r61` TEXT NULL DEFAULT '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `r62` TEXT NULL DEFAULT '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `r63` TEXT NULL DEFAULT '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `r64` TEXT NULL DEFAULT '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `r65` TEXT NULL DEFAULT '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `r48` TEXT NULL DEFAULT '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `r47` TEXT NULL DEFAULT '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `r46` TEXT NULL DEFAULT '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `r45` TEXT NULL DEFAULT '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `r44` TEXT NULL DEFAULT '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `r43` TEXT NULL DEFAULT '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `r42` TEXT NULL DEFAULT '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `r41` TEXT NULL DEFAULT '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `r31` TEXT NULL DEFAULT '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `r32` TEXT NULL DEFAULT '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `r33` TEXT NULL DEFAULT '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `r34` TEXT NULL DEFAULT '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `r35` TEXT NULL DEFAULT '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `r36` TEXT NULL DEFAULT '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `r37` TEXT NULL DEFAULT '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `r38` TEXT NULL DEFAULT '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `r85` TEXT NULL DEFAULT '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `r84` TEXT NULL DEFAULT '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `r83` TEXT NULL DEFAULT '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `r82` TEXT NULL DEFAULT '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `r81` TEXT NULL DEFAULT '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `r71` TEXT NULL DEFAULT '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `r72` TEXT NULL DEFAULT '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `r73` TEXT NULL DEFAULT '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `r74` TEXT NULL DEFAULT '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]',
    `r75` TEXT NULL DEFAULT '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]'
  ) ENGINE=MyISAM DEFAULT CHARSET=latin1;";

        $creaciontabla = mysqli_query($conn3, $query);
        if (!$creaciontabla) {
            echo "<script language='Javascript'> alert('error en la creacion de la tabla');</script>";
        } else {
            mysqli_query($conn3, "ALTER TABLE `OD_OdontogramaMaster_Pendientes` ADD PRIMARY KEY (`id`);");
            mysqli_query($conn3, "ALTER TABLE `OD_OdontogramaMaster_Pendientes` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;");
        }
    }

    $tabla = mysqli_query($conn3, "SHOW TABLES LIKE 'OD_OdontogramaMasterDetalle_Pendientes'");
    $nrowtabla = mysqli_num_rows($tabla);
    if ($nrowtabla == 0) {

        $query = "CREATE TABLE `OD_OdontogramaMasterDetalle_Pendientes` (
    `id` int(11) NOT NULL,
    `Fecha` date DEFAULT NULL,
    `Hora` time NOT NULL,
    `cliente_id` int(11) DEFAULT NULL,
    `usuario_id` int(11) DEFAULT NULL,
    `Numero_Diente` text NOT NULL,
    `Detalle` text NULL DEFAULT '',
    `Procedimiento` text NULL DEFAULT '',
    `Posicion` text NULL DEFAULT '',
    `NombreCara` text NULL DEFAULT '',
    `inventario_id` text NULL DEFAULT '' COMMENT 'si es diferente de 0 es que adjuntaron un tratamiento con un inventario *Creado desde modulo de OD_Ajax*',
    `cie_10` text NULL DEFAULT '' COMMENT 'cie-10 de la tabla OD_Cie10 *Creado desde modulo de OD_Ajax*',
    `Activo` varchar(5) DEFAULT '1'
  ) ENGINE=MyISAM DEFAULT CHARSET=latin1;";

        $creaciontabla = mysqli_query($conn3, $query);
        if (!$creaciontabla) {
            echo "<script language='Javascript'> alert('error en la creacion de la tabla');</script>";
        } else {
            mysqli_query($conn3, "ALTER TABLE `OD_OdontogramaMasterDetalle_Pendientes` ADD PRIMARY KEY (`id`);");
            mysqli_query($conn3, "ALTER TABLE `OD_OdontogramaMasterDetalle_Pendientes` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;");
        }
    }

    //Tema de facturacion
    $Campo1 = mysqli_query($conn3, "show COLUMNS from OD_OdontogramaMasterDetalle_Pendientes WHERE Field = 'detalle_id_factura';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `OD_OdontogramaMasterDetalle_Pendientes` ADD `detalle_id_factura` TEXT NULL DEFAULT '0' COMMENT 'si es 0 es que no esta facturado  el detalle, si es otro numero sera el id de sdetalleoper *Creado desde modulo de OD_Ajax*'");
    }
    //NuevosCampos

    $Campo1 = mysqli_query($conn3, "show COLUMNS from OD_OdontogramaMasterDetalle_Pendientes WHERE Field = 'inventario_id';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `OD_OdontogramaMasterDetalle_Pendientes` ADD `inventario_id` TEXT NULL DEFAULT '0' COMMENT 'si es diferente de 0 es que adjuntaron un tratamiento con un inventario *Creado desde modulo de OD_Ajax*'");
    }
    $Campo1 = mysqli_query($conn3, "show COLUMNS from OD_OdontogramaMasterDetalle_Pendientes WHERE Field = 'cie_10';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `OD_OdontogramaMasterDetalle_Pendientes` ADD `cie_10` TEXT NULL DEFAULT '0' COMMENT 'cie-10 de la tabla OD_Cie10 *Creado desde modulo de OD_Ajax*'");
    }
    //////////////////////

    $tabla = mysqli_query($conn3, "SHOW TABLES LIKE 'OD_FirmaDetalle'");
    $nrowtabla = mysqli_num_rows($tabla);
    if ($nrowtabla == 0) {

        $query = "CREATE TABLE `OD_FirmaDetalle` (
    `id` int(11) NOT NULL,
    `Fecha` date DEFAULT NULL,
    `Hora` time NOT NULL,
    `usuario_id` int(11) DEFAULT NULL COMMENT 'usuario que envia el mensaje ya sea whatsapp/correo',
    `cliente_id` int(11) DEFAULT NULL,
    `Firma` LONGTEXT NULL DEFAULT '',
    `Firma_Nombre` LONGTEXT NULL DEFAULT '',
    `Firma_Documento` LONGTEXT NULL DEFAULT '',
    `detalle_id` text NULL DEFAULT '',
    `Activo` varchar(5) DEFAULT '1'
  ) ENGINE=MyISAM DEFAULT CHARSET=latin1;";

        $creaciontabla = mysqli_query($conn3, $query);
        if (!$creaciontabla) {
            echo "<script language='Javascript'> alert('error en la creacion de la tabla');</script>";
        } else {
            mysqli_query($conn3, "ALTER TABLE `OD_FirmaDetalle` ADD PRIMARY KEY (`id`);");
            mysqli_query($conn3, "ALTER TABLE `OD_FirmaDetalle` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;");
        }
    }




    function ActualizarDetallesOdontograma($id_detalle)
    {


        // require_once __DIR__ . '/../funciones/conn3.php';
        global $conn3;
        $id = $id_detalle;
        //consultar el campo Numero_Diente y Nombre_Cara y cliente_id de la tabla OD_OdontogramaMasterDetalle_Pendientes
        $QueryOdontogramaMaster = mysqli_query($conn3, "SELECT * FROM OD_OdontogramaMasterDetalle_Pendientes WHERE id = '$id' limit 1");
        $RowOdontogramaMaster = mysqli_fetch_array($QueryOdontogramaMaster);
        $Numero_Diente = $RowOdontogramaMaster["Numero_Diente"];
        $Nombre_Cara = $RowOdontogramaMaster["NombreCara"];
        $cliente_id = $RowOdontogramaMaster["cliente_id"];
        $usuario_id = $RowOdontogramaMaster["usuario_id"];

        //consultar el campo d$Numero_diente y r$Numero_diente de la tabla OD_OdontogramaMaster_Pendientes
        $queryOdontogramaDetalle = mysqli_query($conn3, "SELECT * FROM OD_OdontogramaMaster_Pendientes WHERE cliente_id = '$cliente_id' AND usuario_id='$usuario_id' AND activo = '1' limit 1");
        while ($RowOdontogramaDetalle = mysqli_fetch_array($queryOdontogramaDetalle)) {
            $idOdontogramaMaster = $RowOdontogramaDetalle["id"];
            $ArregloD = $RowOdontogramaDetalle["d$Numero_Diente"];
            $ArregloR = $RowOdontogramaDetalle["r$Numero_Diente"];
        }

        //convertir string a array $ArregloR json_decode y $ArregloD json_decode
        $ArregloR_Array = json_decode($ArregloR, true);
        $ArregloD_Array = json_decode($ArregloD, true);
        //foreach del ArregloR y preguntar si existe el id en el ArregloR

        $contadorAcciones = 0;
        //Aqui se establece si hay un procedimiento que sea en toda la pieza y los actualiza para posteriormente ir preguntando cara por cara si existe registro para este diente en esa cara e irlo actualizando para que quede pintado correctamente las caras
        $QueryDetalleOdonto = mysqli_query($conn3, "SELECT * FROM OD_OdontogramaMasterDetalle_Pendientes WHERE  Numero_Diente = '$Numero_Diente' AND Posicion = 'Toda La Pieza' AND cliente_id = '$cliente_id' AND usuario_id='$usuario_id' AND Activo = 1 ORDER BY id DESC limit 1");
        $rowDetalleOdonto = mysqli_num_rows($QueryDetalleOdonto);
        if ($rowDetalleOdonto > 0) {

            //echo "Toda la pieza<br>";
            $RowDetalleOdonto = mysqli_fetch_array($QueryDetalleOdonto);

            $id_detalle = $RowDetalleOdonto["id"];
            $Procedimiento_detalle = $RowDetalleOdonto["Procedimiento"];

            $ArregloPosiciones = array("RecuadroSuperior", "RecuadroIzquierdo", "RecuadroInferior", "RecuadroDerecha", "RecuadroCentro", "RecuadroSeparadoSuperior", "RecuadroSeparadoInferior");
            foreach ($ArregloPosiciones as $key_Posiciones => $value_Posiciones) {
                $ArregloR_Array[$key_Posiciones] = $id_detalle;
                $ArregloD_Array[$key_Posiciones] = $Procedimiento_detalle;
            }

            $id_TodaLaPieza = $RowDetalleOdonto["id"];
            $contadorAcciones++;
        }

        if ($contadorAcciones == 0) {
            // poner todos los campos en blanco de este arreglo $ArregloR_Array y $ArregloD_Array
            $ArregloR_Array = ["0", "0", "0", "0", "0", "0", "0"];
            $ArregloD_Array = ["0", "0", "0", "0", "0", "0", "0"];
        }

        //Aqui se busca si existe el procedimiento en la tabla OD_OdontogramaMasterDetalle_Pendientes por cada cara y que sea el ultimo procedimiento activo   
        $ArregloPosiciones = array("RecuadroSuperior", "RecuadroIzquierdo", "RecuadroInferior", "RecuadroDerecha", "RecuadroCentro", "RecuadroSeparadoSuperior", "RecuadroSeparadoInferior");
        foreach ($ArregloPosiciones as $key_Posiciones => $value_Posiciones) {

            $QueryDetalleOdonto = mysqli_query($conn3, "SELECT * FROM OD_OdontogramaMasterDetalle_Pendientes WHERE  Numero_Diente = '$Numero_Diente' AND Posicion = '$value_Posiciones' AND cliente_id = '$cliente_id' AND usuario_id='$usuario_id' AND Activo = 1 AND id>'$id_TodaLaPieza' ORDER BY id DESC limit 1");
            $rowDetalleOdonto = mysqli_num_rows($QueryDetalleOdonto);
            if ($rowDetalleOdonto > 0) {

                //echo "Detalle <br>";
                $RowDetalleOdonto = mysqli_fetch_array($QueryDetalleOdonto);

                $id_detalle = $RowDetalleOdonto["id"];
                $Procedimiento_detalle = $RowDetalleOdonto["Procedimiento"];

                $ArregloR_Array[$key_Posiciones] = $id_detalle;
                $ArregloD_Array[$key_Posiciones] = $Procedimiento_detalle;
            }
        }




        //actualizar el campo d$Numero_diente y r$Numero_diente de la tabla OD_OdontogramaMaster_Pendientes
        $queryOdontogramaDetalle = mysqli_query($conn3, "UPDATE OD_OdontogramaMaster_Pendientes SET d$Numero_Diente = '" . json_encode($ArregloD_Array) . "' WHERE id = '$idOdontogramaMaster' limit 1");
        $Afectadas[1] = mysqli_affected_rows($conn3);
        //echo de la consulta
        //echo "UPDATE OD_OdontogramaMaster_Pendientes SET d$Numero_Diente = '".json_encode($ArregloD_Array)."' WHERE id = '$idOdontogramaMaster' limit 1";
        $queryOdontogramaMaster = mysqli_query($conn3, "UPDATE OD_OdontogramaMaster_Pendientes SET r$Numero_Diente = '" . json_encode($ArregloR_Array) . "' WHERE id = '$idOdontogramaMaster' limit 1");
        $Afectadas[2] = mysqli_affected_rows($conn3);
        //echo de la consulta
        //echo "UPDATE OD_OdontogramaMaster_Pendientes SET r$Numero_Diente = '".json_encode($ArregloR_Array)."' WHERE id = '$idOdontogramaMaster' limit 1";
        //echo "$Afectadas > 0 AND $Afectadas_1 > 0 AND $Afectadas_2 > 0";
        //echo "UPDATE OD_OdontogramaMaster_Pendientes SET d$Numero_Diente = '".json_encode($ArregloD_Array)."' WHERE id = '$idOdontogramaMaster' limit 1";
        return $Afectadas;
    }


    function PresupuestarDetalle($detalle_id_odontograma, $inventario)
    {

        // require_once __DIR__ . '/../funciones/conn3.php';
        global $conn3;

        $tabla = mysqli_query($conn3, "SHOW TABLES LIKE 'OD_Procedimientos_Presupuestar'");
        $nrowtabla = mysqli_num_rows($tabla);
        if ($nrowtabla == 0) {

            $query = "CREATE TABLE `OD_Procedimientos_Presupuestar` (
        `id` int(11) NOT NULL,
        `Fecha` date DEFAULT NULL,
        `Hora` time DEFAULT NULL,
        `usuario_id` int(11) DEFAULT NULL COMMENT 'usuario que envia el mensaje ya sea whatsapp/correo',
        `cliente_id` int(11) DEFAULT NULL,
        `inventario_id` TEXT NULL DEFAULT '0' COMMENT 'id de la tabla OD_Procedimiento / seria el tratamiento que seleccionan al guardar el detalle dental',
        `Estado` TEXT NULL DEFAULT '0' COMMENT '0-> No Facturado/Presupuestado | 1-> Facturado/Presupuestado',
        `detalle_odontograma_id` text NULL DEFAULT '' COMMENT 'id de la tabla OD_OdontogramaMasterDetalle_Pendientes',
        `Activo` varchar(5) DEFAULT '1'
      ) ENGINE=MyISAM DEFAULT CHARSET=latin1;";

            $creaciontabla = mysqli_query($conn3, $query);
            if (!$creaciontabla) {
                echo "<script language='Javascript'> alert('error en la creacion de la tabla');</script>";
            } else {
                mysqli_query($conn3, "ALTER TABLE `OD_Procedimientos_Presupuestar` ADD PRIMARY KEY (`id`);");
                mysqli_query($conn3, "ALTER TABLE `OD_Procedimientos_Presupuestar` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;");
            }
        }

        $id = $detalle_id_odontograma;
        //consultar el campo Numero_Diente y Nombre_Cara y cliente_id de la tabla OD_OdontogramaMasterDetalle_Pendientes
        $QueryOdontogramaMaster = mysqli_query($conn3, "SELECT * FROM OD_OdontogramaMasterDetalle_Pendientes WHERE id = '$id' limit 1");
        $RowOdontogramaMaster = mysqli_fetch_array($QueryOdontogramaMaster);
        //$Procedimiento = $RowOdontogramaMaster["Procedimiento"];
        $usuario_id = $RowOdontogramaMaster["usuario_id"];
        $cliente_id = $RowOdontogramaMaster["cliente_id"];

        $Fecha = $RowOdontogramaMaster["Fecha"];
        $Hora = $RowOdontogramaMaster["Hora"];

        //insert OD_TratamientosPresupuesto | OD_Procedimientos_Presupuestar
        mysqli_query($conn3, "INSERT INTO OD_Procedimientos_Presupuestar (Fecha,Hora,usuario_id,cliente_id,inventario_id,Estado,detalle_odontograma_id) 
    VALUES ('$Fecha','$Hora','$usuario_id','$cliente_id','$inventario','0','$id')");
    }


    if ($_POST["Tipo_Consulta"] == "Agregar Dato Odontograma") {

        $Fecha = date("Y-m-d");
        $Hora = date("H:i:s");

        $usuario_id = $_POST["usuario_id"];
        $cliente_id = $_POST["cliente_id"];

        $QueryOdontograma = mysqli_query($conn3, "SELECT * FROM OD_OdontogramaMaster_Pendientes WHERE cliente_id = '{$cliente_id}' AND usuario_id = '$usuario_id' AND activo = '1'");
        $NumRowOdontograma = mysqli_num_rows($QueryOdontograma);

        if ($NumRowOdontograma == 0) {
        mysqli_query($conn3, "INSERT INTO OD_OdontogramaMaster_Pendientes(usuario_id, cliente_id, Fecha, Hora ) 
                                    VALUES ('$usuario_id','$cliente_id','$Fecha' ,'$Hora');") 
                                    or throw new Exception("Error al guardar => " . mysqli_error($conn3));
        }

        $Numero_Diente = $_POST["diente_id"];
        $Detalle = $_POST["Diente_Detalle"];
        $Procedimiento = $_POST["Diente_Procedimiento"];
        $Posicion = $_POST["Diente_Posicion"];
        $NombreCara = $_POST["Diente_NombreCara"];

        //$Presupuesto_Tratamiento = $_POST["Presupuesto_Tratamiento"];
        //$inventario_id = $_POST["inventario_id"];
        $inventario_id = funcionMaster($Procedimiento, 'id', 'inventario_id', 'OD_Procedimiento') ?: 0;
        $cie_10 = $_POST["cie_10"];

        //Insertar
        mysqli_query($conn3, "INSERT INTO OD_OdontogramaMasterDetalle_Pendientes 
                                    SET usuario_id = '$usuario_id',
                                        cliente_id = '$cliente_id',
                                        Fecha = '$Fecha',
                                        Hora = '$Hora',
                                        Numero_Diente = '$Numero_Diente',
                                        Detalle = '$Detalle',
                                        Procedimiento = '$Procedimiento',
                                        Posicion = '$Posicion',
                                        NombreCara = '$NombreCara',
                                        inventario_id = '$inventario_id',
                                        cie_10 = '$cie_10'") or throw new Exception("Error al guardar => " . mysqli_error($conn3));


        $Detalle_id = mysqli_insert_id($conn3);

        // if ($inventario_id > 0) {
        //     PresupuestarDetalle($Detalle_id, $inventario_id);
        // }



        $QueryOdontogramaMaster = mysqli_query($conn3, "SELECT * FROM OD_OdontogramaMaster_Pendientes WHERE cliente_id = '{$cliente_id}' AND usuario_id = '$usuario_id' AND activo = '1' LIMIT 1") or throw new Exception("Error al guardar => " . mysqli_error($conn3));
        while ($RowOdontogramaMaster = mysqli_fetch_array($QueryOdontogramaMaster)) {
            $ArregloD = $RowOdontogramaMaster["d$Numero_Diente"];
            $ArregloR = $RowOdontogramaMaster["r$Numero_Diente"];
        }

        $ArregloDientes = json_decode($ArregloD);
        foreach ($ArregloDientes as $key => $value) {
            $ArregloDientesAGuardar[$key] = $value;
        }

        $ArregloRelacionDientes = json_decode($ArregloR);
        foreach ($ArregloRelacionDientes as $key => $value) {
            $ArregloRelacionDientesAGuardar[$key] = $value;
        }

        switch ($Posicion) {
            case 'RecuadroSuperior':
                $ArregloDientesAGuardar[0] = $Procedimiento;
                $ArregloRelacionDientesAGuardar[0] = (string)$Detalle_id;
                break;
            case 'RecuadroIzquierdo':
                $ArregloDientesAGuardar[1] = $Procedimiento;
                $ArregloRelacionDientesAGuardar[1] = (string)$Detalle_id;
                break;
            case 'RecuadroInferior':
                $ArregloDientesAGuardar[2] = $Procedimiento;
                $ArregloRelacionDientesAGuardar[2] = (string)$Detalle_id;
                break;
            case 'RecuadroDerecha':
                $ArregloDientesAGuardar[3] = $Procedimiento;
                $ArregloRelacionDientesAGuardar[3] = (string)$Detalle_id;
                break;
            case 'RecuadroCentro':
                $ArregloDientesAGuardar[4] = $Procedimiento;
                $ArregloRelacionDientesAGuardar[4] = (string)$Detalle_id;
                break;
            case 'RecuadroSeparadoSuperior':
                $ArregloDientesAGuardar[5] = $Procedimiento;
                $ArregloRelacionDientesAGuardar[5] = (string)$Detalle_id;
                break;
            case 'RecuadroSeparadoInferior':
                $ArregloDientesAGuardar[6] = $Procedimiento;
                $ArregloRelacionDientesAGuardar[6] = (string)$Detalle_id;
                break;
        }

        if ($_POST["Diente_TodaPieza"] != "") {

            $ArregloDientesAGuardar[0] = $Procedimiento;
            $ArregloRelacionDientesAGuardar[0] = (string)$Detalle_id;

            $ArregloDientesAGuardar[1] = $Procedimiento;
            $ArregloRelacionDientesAGuardar[1] = (string)$Detalle_id;

            $ArregloDientesAGuardar[2] = $Procedimiento;
            $ArregloRelacionDientesAGuardar[2] = (string)$Detalle_id;

            $ArregloDientesAGuardar[3] = $Procedimiento;
            $ArregloRelacionDientesAGuardar[3] = (string)$Detalle_id;

            $ArregloDientesAGuardar[4] = $Procedimiento;
            $ArregloRelacionDientesAGuardar[4] = (string)$Detalle_id;

            $ArregloDientesAGuardar[5] = $Procedimiento;
            $ArregloRelacionDientesAGuardar[5] = (string)$Detalle_id;

            $ArregloDientesAGuardar[6] = $Procedimiento;
            $ArregloRelacionDientesAGuardar[6] = (string)$Detalle_id;
        }

        $ADientes = json_encode($ArregloDientesAGuardar);
        $RDientes =  json_encode($ArregloRelacionDientesAGuardar);

        $QueryUpdate = "UPDATE OD_OdontogramaMaster_Pendientes SET d{$Numero_Diente}='$ADientes', r{$Numero_Diente}='$RDientes' WHERE cliente_id = '{$cliente_id}' AND usuario_id = '$usuario_id' AND activo = '1' limit 1";
        $queryList = mysqli_query($conn3, $QueryUpdate) or throw new Exception("Error al guardar => " . mysqli_error($conn3));

        //echo "UPDATE OD_OdontogramaMaster_Pendientes SET d{$Numero_Diente}='$ADientes', r{$Numero_Diente}='$RDientes' WHERE cliente_id = '{$cliente_id}' AND usuario_id = '$usuario_id' limit 1;";
        $SVG = funcionMaster(funcionMaster($Procedimiento, 'id', 'Icono', 'OD_Procedimiento'), 'id', 'SVG', 'OD_Iconos_SVG');
        $Color = funcionMaster($Procedimiento, 'id', 'Color', 'OD_Procedimiento');
        $SVG = str_replace('fill="currentColor"', 'fill="' . $Color . '"', $SVG);
        echo $SVG;
    }






    if ($_POST["Tipo_Consulta"] == "Agregar Dato Odontograma Inicial") {

        $Fecha = date("Y-m-d");
        $Hora = date("H:i:s");

        $usuario_id = $_POST["usuario_id"];
        $cliente_id = $_POST["cliente_id"];

        $QueryOdontograma = mysqli_query($conn3, "SELECT * FROM OD_OdontogramaMaster_Pendientes WHERE cliente_id = '{$cliente_id}' AND usuario_id = '$usuario_id' AND activo = '1'");
        $NumRowOdontograma = mysqli_num_rows($QueryOdontograma);

        if ($NumRowOdontograma == 0) {
            mysqli_query($conn3, "INSERT INTO OD_OdontogramaMaster_Pendientes(usuario_id, cliente_id, Fecha, Hora ) 
                                                        VALUES ('$usuario_id','$cliente_id','$Fecha' ,'$Hora');");
        }

        $Numero_Diente = $_POST["diente_id"];
        $Detalle = $_POST["Diente_Detalle"];
        $Procedimiento = $_POST["Diente_Procedimiento"];
        $Posicion = $_POST["Diente_Posicion"];
        $NombreCara = $_POST["Diente_NombreCara"];
        //$Presupuesto_Tratamiento = $_POST["Presupuesto_Tratamiento"];

        //$inventario_id = $_POST["inventario_id"];
        //$inventario_id = 0;
        $inventario_id = funcionMaster($Procedimiento, 'id', 'inventario_id', 'OD_Procedimiento') ?: 0;
        $cie_10 = $_POST["cie_10"];

        //Insertar
        mysqli_query($conn3, "INSERT INTO OD_OdontogramaMasterDetalle_Pendientes (usuario_id, cliente_id,     Fecha, Hora,      Numero_Diente, Detalle,   Procedimiento,    Posicion, NombreCara , inventario_id, cie_10) 
                                                        VALUES ('$usuario_id','$cliente_id','$Fecha' ,'$Hora','$Numero_Diente','$Detalle','$Procedimiento','$Posicion','$NombreCara', '$inventario_id','$cie_10');");

        $Detalle_id = mysqli_insert_id($conn3);
        //PresupuestarDetalle($Detalle_id,$inventario_id);
        if ($inventario_id > 0) {
            PresupuestarDetalle($Detalle_id, $inventario_id);
        }

        $QueryOdontogramaMaster = mysqli_query($conn3, "SELECT * FROM OD_OdontogramaMaster_Pendientes WHERE cliente_id = '{$cliente_id}' AND usuario_id = '$usuario_id' AND activo = '1' LIMIT 1");
        while ($RowOdontogramaMaster = mysqli_fetch_array($QueryOdontogramaMaster)) {
            $ArregloD = $RowOdontogramaMaster["d$Numero_Diente"];
            $ArregloR = $RowOdontogramaMaster["r$Numero_Diente"];
        }

        $ArregloDientes = json_decode($ArregloD);
        foreach ($ArregloDientes as $key => $value) {
            $ArregloDientesAGuardar[$key] = $value;
        }

        $ArregloRelacionDientes = json_decode($ArregloR);
        foreach ($ArregloRelacionDientes as $key => $value) {
            $ArregloRelacionDientesAGuardar[$key] = $value;
        }

        switch ($Posicion) {
            case 'RecuadroSuperior':
                $ArregloDientesAGuardar[0] = $Procedimiento;
                $ArregloRelacionDientesAGuardar[0] = (string)$Detalle_id;
                break;
            case 'RecuadroIzquierdo':
                $ArregloDientesAGuardar[1] = $Procedimiento;
                $ArregloRelacionDientesAGuardar[1] = (string)$Detalle_id;
                break;
            case 'RecuadroInferior':
                $ArregloDientesAGuardar[2] = $Procedimiento;
                $ArregloRelacionDientesAGuardar[2] = (string)$Detalle_id;
                break;
            case 'RecuadroDerecha':
                $ArregloDientesAGuardar[3] = $Procedimiento;
                $ArregloRelacionDientesAGuardar[3] = (string)$Detalle_id;
                break;
            case 'RecuadroCentro':
                $ArregloDientesAGuardar[4] = $Procedimiento;
                $ArregloRelacionDientesAGuardar[4] = (string)$Detalle_id;
                break;
            case 'RecuadroSeparadoSuperior':
                $ArregloDientesAGuardar[5] = $Procedimiento;
                $ArregloRelacionDientesAGuardar[5] = (string)$Detalle_id;
                break;
            case 'RecuadroSeparadoInferior':
                $ArregloDientesAGuardar[6] = $Procedimiento;
                $ArregloRelacionDientesAGuardar[6] = (string)$Detalle_id;
                break;
        }

        if ($_POST["Diente_TodaPieza"] != "") {

            $ArregloDientesAGuardar[0] = $Procedimiento;
            $ArregloRelacionDientesAGuardar[0] = (string)$Detalle_id;

            $ArregloDientesAGuardar[1] = $Procedimiento;
            $ArregloRelacionDientesAGuardar[1] = (string)$Detalle_id;

            $ArregloDientesAGuardar[2] = $Procedimiento;
            $ArregloRelacionDientesAGuardar[2] = (string)$Detalle_id;

            $ArregloDientesAGuardar[3] = $Procedimiento;
            $ArregloRelacionDientesAGuardar[3] = (string)$Detalle_id;

            $ArregloDientesAGuardar[4] = $Procedimiento;
            $ArregloRelacionDientesAGuardar[4] = (string)$Detalle_id;

            $ArregloDientesAGuardar[5] = $Procedimiento;
            $ArregloRelacionDientesAGuardar[5] = (string)$Detalle_id;

            $ArregloDientesAGuardar[6] = $Procedimiento;
            $ArregloRelacionDientesAGuardar[6] = (string)$Detalle_id;
        }

        $ADientes = json_encode($ArregloDientesAGuardar);
        $RDientes =  json_encode($ArregloRelacionDientesAGuardar);

        $queryList = mysqli_query($conn3, "UPDATE OD_OdontogramaMaster_Pendientes SET d{$Numero_Diente}='$ADientes', r{$Numero_Diente}='$RDientes' WHERE cliente_id = '{$cliente_id}' AND usuario_id = '$usuario_id' limit 1;");

        echo date('h:i:s') . "<br>";
        //sleep for 0.5 seconds
        sleep(0.5);
        //start again
        echo date('h:i:s');

        echo $ADientes . " | " . $RDientes;
    }




    if ($_POST["Tipo_Consulta"] == "Agregar Dato Multiple Odontograma") {

        $Fecha = date("Y-m-d");
        $Hora = date("H:i:s");

        $usuario_id = $_POST["usuario_id"];
        $cliente_id = $_POST["cliente_id"];

        $QueryOdontograma = mysqli_query($conn3, "SELECT * FROM OD_OdontogramaMaster_Pendientes WHERE cliente_id = '{$cliente_id}' AND usuario_id = '$usuario_id' AND activo = '1'");
        $NumRowOdontograma = mysqli_num_rows($QueryOdontograma);

        if ($NumRowOdontograma == 0) {
            mysqli_query($conn3, "INSERT INTO OD_OdontogramaMaster_Pendientes(usuario_id, cliente_id, Fecha, Hora ) 
                                                        VALUES ('$usuario_id','$cliente_id','$Fecha' ,'$Hora');");
        }

        $diente_multiple = $_POST["diente_multiple"];
        $Procedimiento = $_POST["Diente_Procedimiento"];
        $Detalle = $_POST["Diente_Detalle"];

        //$inventario_id = $_POST["inventario_id"];
        //$inventario_id = 0;
        $inventario_id = funcionMaster($Procedimiento, 'id', 'inventario_id', 'OD_Procedimiento') ?: 0;
        $cie_10 = $_POST["cie_10"];

        $Posicion = "Toda la Pieza";
        $NombreCara = "Toda la Pieza";

        foreach (json_decode($diente_multiple) as $key => $value) {

            $Numero_Diente = $value;

            //Insertar
            mysqli_query($conn3, "INSERT INTO OD_OdontogramaMasterDetalle_Pendientes (usuario_id, cliente_id,     Fecha, Hora,      Numero_Diente, Detalle,   Procedimiento,    Posicion, NombreCara, inventario_id, cie_10) 
        VALUES ('$usuario_id','$cliente_id','$Fecha' ,'$Hora','$Numero_Diente','$Detalle','$Procedimiento','$Posicion','$NombreCara', '$inventario_id','$cie_10');");
            $Detalle_id = mysqli_insert_id($conn3);

            if ($inventario_id > 0) {
                PresupuestarDetalle($Detalle_id, $inventario_id);
            }

            $QueryOdontogramaMaster = mysqli_query($conn3, "SELECT * FROM OD_OdontogramaMaster_Pendientes WHERE cliente_id = '{$cliente_id}' AND usuario_id = '$usuario_id' LIMIT 1");
            while ($RowOdontogramaMaster = mysqli_fetch_array($QueryOdontogramaMaster)) {
                $ArregloD = $RowOdontogramaMaster["d$Numero_Diente"];
                $ArregloR = $RowOdontogramaMaster["r$Numero_Diente"];
            }

            $ArregloDientes = json_decode($ArregloD);
            foreach ($ArregloDientes as $key => $value) {
                $ArregloDientesAGuardar[$key] = $value;
            }

            $ArregloRelacionDientes = json_decode($ArregloR);
            foreach ($ArregloRelacionDientes as $key => $value) {
                $ArregloRelacionDientesAGuardar[$key] = $value;
            }

            $ArregloDientesAGuardar[0] = $Procedimiento;
            $ArregloRelacionDientesAGuardar[0] = (string)$Detalle_id;

            $ArregloDientesAGuardar[1] = $Procedimiento;
            $ArregloRelacionDientesAGuardar[1] = (string)$Detalle_id;

            $ArregloDientesAGuardar[2] = $Procedimiento;
            $ArregloRelacionDientesAGuardar[2] = (string)$Detalle_id;

            $ArregloDientesAGuardar[3] = $Procedimiento;
            $ArregloRelacionDientesAGuardar[3] = (string)$Detalle_id;

            $ArregloDientesAGuardar[4] = $Procedimiento;
            $ArregloRelacionDientesAGuardar[4] = (string)$Detalle_id;

            $ArregloDientesAGuardar[5] = $Procedimiento;
            $ArregloRelacionDientesAGuardar[5] = (string)$Detalle_id;

            $ArregloDientesAGuardar[6] = $Procedimiento;
            $ArregloRelacionDientesAGuardar[6] = (string)$Detalle_id;

            $ADientes = json_encode($ArregloDientesAGuardar);
            $RDientes =  json_encode($ArregloRelacionDientesAGuardar);

            $queryList = mysqli_query($conn3, "UPDATE OD_OdontogramaMaster_Pendientes SET d{$Numero_Diente}='$ADientes', r{$Numero_Diente}='$RDientes' WHERE cliente_id = '{$cliente_id}' AND usuario_id = '$usuario_id' limit 1;");
        }

        echo "1";
    }





    /*
elseif($_POST["Tipo_Consulta"] == "Cargar Imagen Pieza")
{
    $usuario_id = $_POST["usuario_id"];
    $cliente_id = $_POST["cliente_id"];
    $diente_id = $_POST["diente_id"];
    
        $QueryOdontogramaMaster = mysqli_query($conn3, "SELECT * FROM OD_OdontogramaMaster_Pendientes WHERE cliente_id = '{$cliente_id}' AND usuario_id = '$usuario_id' LIMIT 1");
        while ($RowOdontogramaMaster= mysqli_fetch_array($QueryOdontogramaMaster)) {

            $ArregloD = $RowOdontogramaMaster["d$diente_id"];
            $ArregloR = $RowOdontogramaMaster["r$diente_id"];

            foreach (json_decode($ArregloD) as $key => $value) {
                
                $Activo = funcionMaster($ArregloR[$key],'id','Activo','OD_OdontogramaMasterDetalle_Pendientes');

                $SVG = funcionMaster(funcionMaster($value,'id','Icono','OD_Procedimiento'),'id','SVG','OD_Iconos_SVG');
                $Color = funcionMaster($value,'id','Color','OD_Procedimiento');
                $SVG = str_replace('fill="currentColor"', "fill='{$Color}'", $SVG);
                $Arreglo[]=$SVG;
                
                //if($Activo==1){
                //    $Arreglo[]=$SVG;
                //}
                //else{
                //    $Arreglo[]="";
                //}
                
            }

        }

    echo json_encode($Arreglo,true);
}
*/ elseif ($_POST["Tipo_Consulta"] == "Cargar Imagen Pieza") {
        $usuario_id = $_POST["usuario_id"];
        $cliente_id = $_POST["cliente_id"];
        $diente_id = $_POST["diente_id"];

        $QueryOdontogramaMaster = mysqli_query($conn3, "SELECT * FROM OD_OdontogramaMaster_Pendientes WHERE cliente_id = '{$cliente_id}' AND usuario_id = '$usuario_id' AND activo = '1' LIMIT 1");
        $Arreglo = [];
        if ($QueryOdontogramaMaster) {
            while ($RowOdontogramaMaster = mysqli_fetch_array($QueryOdontogramaMaster)) {

                $ArregloD = $RowOdontogramaMaster["d$diente_id"];
                $ArregloR = $RowOdontogramaMaster["r$diente_id"];

                foreach (json_decode($ArregloD) as $key => $value) {

                    $Activo = funcionMaster($ArregloR[$key], 'id', 'Activo', 'OD_OdontogramaMasterDetalle_Pendientes');

                    $SVG = funcionMaster(funcionMaster($value, 'id', 'Icono', 'OD_Procedimiento'), 'id', 'SVG', 'OD_Iconos_SVG');
                    $Color = funcionMaster($value, 'id', 'Color', 'OD_Procedimiento');
                    $SVG = str_replace('fill="currentColor"', "fill='{$Color}'", $SVG);
                    $Arreglo[] = $SVG;
                }
            }
        }

        echo json_encode($Arreglo, true);
    } elseif ($_POST["Tipo_Consulta"] == "Cargar Imagen Pieza Historia") {
        $usuario_id = $_POST["usuario_id"];
        $cliente_id = $_POST["cliente_id"];
        $diente_id = $_POST["diente_id"];
        $historia_bo_id = $_POST["historia_bo_id"];


        $QueryOdontogramaMaster = mysqli_query($conn3, "SELECT * FROM OD_OdontogramaMaster_Fin WHERE cliente_id = '{$cliente_id}' AND usuario_id = '$usuario_id' AND activo = '0' AND historia_bo_id = '$historia_bo_id' LIMIT 1");
        $Arreglo = [];
        if ($QueryOdontogramaMaster) {
            while ($RowOdontogramaMaster = mysqli_fetch_array($QueryOdontogramaMaster)) {

                $ArregloD = $RowOdontogramaMaster["d$diente_id"];
                $ArregloR = $RowOdontogramaMaster["r$diente_id"];

                foreach (json_decode($ArregloD) as $key => $value) {

                    $Activo = funcionMaster($ArregloR[$key], 'id', 'Activo', 'OD_OdontogramaMasterDetalle_Pendientes');

                    $SVG = funcionMaster(funcionMaster($value, 'id', 'Icono', 'OD_Procedimiento'), 'id', 'SVG', 'OD_Iconos_SVG');
                    $Color = funcionMaster($value, 'id', 'Color', 'OD_Procedimiento');
                    $SVG = str_replace('fill="currentColor"', "fill='{$Color}'", $SVG);
                    $Arreglo[] = $SVG;
                }
            }
        }

        echo json_encode($Arreglo, true);
    } elseif ($_POST["Tipo_Consulta"] == "Cargar Imagen Diente") {
        $usuario_id = $_POST["usuario_id"];
        $cliente_id = $_POST["cliente_id"];
        $diente_id = $_POST["diente_id"];
        $historia_bo_id = $_POST["historia_bo_id"];

        $QueryOdontogramaMaster = mysqli_query($conn3, "SELECT * FROM OD_OdontogramaMaster_Pendientes WHERE cliente_id = '$cliente_id' AND usuario_id = '$usuario_id' AND Numero_Diente='$diente_id' AND Activo = 1 ORDER BY id DESC LIMIT 1 ");

        if ($QueryOdontogramaMaster) {
            while ($RowOdontogramaMaster = mysqli_fetch_array($QueryOdontogramaMaster)) {
                $Procedimiento = $RowOdontogramaMaster["Procedimiento"];
            }
        }

        $SVG = funcionMaster(funcionMaster($Procedimiento, 'id', 'Icono', 'OD_Procedimiento'), 'id', 'SVG', 'OD_Iconos_SVG');
        $Color = funcionMaster($Procedimiento, 'id', 'Color', 'OD_Procedimiento');
        $SVG = str_replace('fill="currentColor"', 'fill="' . $Color . '"', $SVG);

        if ($Procedimiento == "17") {
            switch ($diente_id) {
                case '55':
                case '54':
                case '53':
                case '52':
                case '51':
                case '61':
                case '62':
                case '63':
                case '64':
                case '65':
                case '85':
                case '84':
                case '83':
                case '82':
                case '81':
                case '71':
                case '72':
                case '73':
                case '74':
                case '75':
                    $Estilo = "width: 95px;height: 80px;top: 44px;left: 5px;";
                    break;

                default:
                    $Estilo = "width: 95px;height: 80px;top: 25px;left: -3px;";
                    break;
            }

            $SVG = '<svg viewBox="0 0 500 500" width="500" height="500" xmlns="http://www.w3.org/2000/svg" style="' . $Estilo . '">
        <rect y="200" width="1155.317" height="100" style="stroke-width: 40px; stroke: rgb(0, 42, 255); fill: rgba(255, 255, 255, 0);" x="-285.379"/>
        </svg>
        ';
            echo $SVG . "|" . funcionMaster($Procedimiento, 'id', 'Nombre', 'OD_Procedimiento');
        } elseif ($Procedimiento == "18") {

            switch ($diente_id) {
                case '55':
                case '54':
                case '53':
                case '52':
                case '51':
                case '61':
                case '62':
                case '63':
                case '64':
                case '65':
                case '85':
                case '84':
                case '83':
                case '82':
                case '81':
                case '71':
                case '72':
                case '73':
                case '74':
                case '75':
                    $Estilo = "width: 95px;height: 130px;top: 18px;left: 5px;";
                    break;

                default:
                    $Estilo = "width: 95px;height: 130px;top: 8px;left: -3px;";
                    break;
            }

            $SVG = '<svg viewBox="0 0 500 500" width="500" height="500" xmlns="http://www.w3.org/2000/svg" style="' . $Estilo . '">
        <rect x="-1200" y="40.664" width="2640.058" height="452.339" style="stroke-width: 40px; stroke: rgb(0, 42, 255); fill: rgba(216, 216, 216, 0);"/>
      </svg>';
            echo $SVG . "|" . funcionMaster($Procedimiento, 'id', 'Nombre', 'OD_Procedimiento');
        } else {
            echo $SVG . "|" . funcionMaster($Procedimiento, 'id', 'Nombre', 'OD_Procedimiento');
        }
    } elseif ($_POST["Tipo_Consulta"] == "Cargar Imagen Diente Historia") {
        $usuario_id = $_POST["usuario_id"];
        $cliente_id = $_POST["cliente_id"];
        $diente_id = $_POST["diente_id"];

        $QueryOdontogramaMaster = mysqli_query($conn3, "SELECT * FROM OD_OdontogramaMasterDetalle_Pendientes WHERE cliente_id = '$cliente_id' AND usuario_id = '$usuario_id' AND Numero_Diente='$diente_id' AND Activo = 1 ORDER BY id DESC LIMIT 1 ");
        while ($RowOdontogramaMaster = mysqli_fetch_array($QueryOdontogramaMaster)) {
            $Procedimiento = $RowOdontogramaMaster["Procedimiento"];
        }

        $SVG = funcionMaster(funcionMaster($Procedimiento, 'id', 'Icono', 'OD_Procedimiento'), 'id', 'SVG', 'OD_Iconos_SVG');
        $Color = funcionMaster($Procedimiento, 'id', 'Color', 'OD_Procedimiento');
        $SVG = str_replace('fill="currentColor"', 'fill="' . $Color . '"', $SVG);

        if ($Procedimiento == "17") {
            switch ($diente_id) {
                case '55':
                case '54':
                case '53':
                case '52':
                case '51':
                case '61':
                case '62':
                case '63':
                case '64':
                case '65':
                case '85':
                case '84':
                case '83':
                case '82':
                case '81':
                case '71':
                case '72':
                case '73':
                case '74':
                case '75':
                    $Estilo = "width: 95px;height: 80px;top: 44px;left: 5px;";
                    break;

                default:
                    $Estilo = "width: 95px;height: 80px;top: 25px;left: -3px;";
                    break;
            }

            $SVG = '<svg viewBox="0 0 500 500" width="500" height="500" xmlns="http://www.w3.org/2000/svg" style="' . $Estilo . '">
        <rect y="200" width="1155.317" height="100" style="stroke-width: 40px; stroke: rgb(0, 42, 255); fill: rgba(255, 255, 255, 0);" x="-285.379"/>
        </svg>
        ';
            echo $SVG . "|" . funcionMaster($Procedimiento, 'id', 'Nombre', 'OD_Procedimiento');
        } elseif ($Procedimiento == "18") {

            switch ($diente_id) {
                case '55':
                case '54':
                case '53':
                case '52':
                case '51':
                case '61':
                case '62':
                case '63':
                case '64':
                case '65':
                case '85':
                case '84':
                case '83':
                case '82':
                case '81':
                case '71':
                case '72':
                case '73':
                case '74':
                case '75':
                    $Estilo = "width: 95px;height: 130px;top: 18px;left: 5px;";
                    break;

                default:
                    $Estilo = "width: 95px;height: 130px;top: 8px;left: -3px;";
                    break;
            }

            $SVG = '<svg viewBox="0 0 500 500" width="500" height="500" xmlns="http://www.w3.org/2000/svg" style="' . $Estilo . '">
        <rect x="-1200" y="40.664" width="2640.058" height="452.339" style="stroke-width: 40px; stroke: rgb(0, 42, 255); fill: rgba(216, 216, 216, 0);"/>
      </svg>';
            echo $SVG . "|" . funcionMaster($Procedimiento, 'id', 'Nombre', 'OD_Procedimiento');
        } else {
            echo $SVG . "|" . funcionMaster($Procedimiento, 'id', 'Nombre', 'OD_Procedimiento');
        }
    } elseif ($_POST["Tipo_Consulta"] == "Cargar Historial Diente") {
        $usuario_id = $_POST["usuario_id"];
        $cliente_id = $_POST["cliente_id"];
        $diente_id = $_POST["diente_id"];

        echo "<table class='table table-bordered table-striped' style='text-align-last: center;'>
            <thead>
                <tr>
                    <td>Icono</td>
                    <td>Usuario</td>
                    <td>Fecha</td>
                    <td>Detalles</td>
                    <td>Firma/Estado</td>
                    <td><i class='fas fa-sliders-h'></i></td>
                </tr>
            </thead>
        <tbody>";
        $QueryOdontogramaMaster = mysqli_query($conn3, "SELECT * FROM OD_OdontogramaMasterDetalle_Pendientes WHERE cliente_id = '$cliente_id' AND usuario_id = '$usuario_id' AND Numero_Diente='$diente_id' AND Activo = 1 ORDER BY id DESC");
        while ($RowOdontogramaMaster = mysqli_fetch_array($QueryOdontogramaMaster)) {

            $id_detalle = $RowOdontogramaMaster["id"];
            $Nombre_Procedimiento = funcionMaster($RowOdontogramaMaster["Procedimiento"], 'id', 'Nombre', 'OD_Procedimiento');

            $Estado_Procedimiento = $RowOdontogramaMaster["Estado_Procedimiento"];
            $Estado_Procedimiento_Detalle = $RowOdontogramaMaster["Estado_Procedimiento_Detalle"];

            $Estado = 0;
            /*
        $QueryPresupuestoTratamiento = mysqli_query($conn3, "SELECT * FROM OD_Procedimientos_Presupuestar WHERE detalle_odontograma_id = '$id_detalle'");
        while ($RowPrespuestoTratamiento= mysqli_fetch_array($QueryPresupuestoTratamiento)) {
            $Estado = $RowPrespuestoTratamiento["Estado"];
        }
        */
            $inventario_id = $RowOdontogramaMaster["inventario_id"];
            $Nombre_Inventario = "";
            if ($inventario_id > 0) {
                $Nombre_Inventario = "<br> Servicio: [" . funcionMaster($inventario_id, 'ID', 'descripcion', 'sinvetrios') . "]";
            }

            $SVG = funcionMaster(funcionMaster($RowOdontogramaMaster["Procedimiento"], 'id', 'Icono', 'OD_Procedimiento'), 'id', 'SVG', 'OD_Iconos_SVG');
            $Color = funcionMaster($RowOdontogramaMaster["Procedimiento"], 'id', 'Color', 'OD_Procedimiento');
            $SVG = str_replace('fill="currentColor"', 'fill="' . $Color . '"', $SVG);

            $EstadoFirma = funcionMaster($RowOdontogramaMaster["id"], 'detalle_id', 'id', 'OD_FirmaDetalle');
            $BotonAdicional = "";
            $BotonesAcciones = "";
            if ($EstadoFirma != "" or $Estado == 1) {
                $EstadoFirma = "<label style='color:green;'>Firmado</label>";
                $BotonAdicional = "<a href='#' onclick='VerFirmaCliente(" . $RowOdontogramaMaster["id"] . ")' class='btn btn-success btn-sm ' style='width:100%;background-color:#0091ef;'><i class='fa fa-book'></i> Ver Firma </a> <hr style='margin:7px;'>";

                $BotonesAcciones = "<a href='#' onclick='EliminarDetalleOdontograma_Diente(" . $RowOdontogramaMaster["id"] . ")' class='btn btn-danger btn-sm' style='width:100%'><i class='fa fa-trash-o'></i> Eliminar Procedimiento </a>";
            } else {
                $EstadoFirma = "<label style='color:red;'>Sin Firma</label>";
                $BotonAdicional = "<a href='#' onclick='EnviarAFirmarCliente(" . $RowOdontogramaMaster["id"] . ")' class='btn btn-info btn-sm ' style='width:100%;background-color:#0091ef;'><i class='fa fa-pencil'></i> Enviar Firma </a> <hr style='margin:7px;'>";

                $BotonesAcciones = "<a href='#' onclick='EliminarDetalleOdontograma_Diente(" . $RowOdontogramaMaster["id"] . ")' class='btn btn-danger btn-sm' style='width:100%'><i class='fa fa-trash-o'></i> Eliminar Procedimiento </a>
            <a href='#' onclick='EditarDetalleOdontograma_Diente(" . $RowOdontogramaMaster["id"] . ")' class='btn btn-info btn-sm' style='width:100%;padding-left: 15px;padding-right: 15px;margin-top: 10px;'><i class='fa fa-pencil'></i> Editar Procedimiento </a>";
            }

            //BTN PARA EVOLUCINES
            $BotonesAcciones .= "<a href='#' onclick='mostrarModalEvolucion(" . $RowOdontogramaMaster["id"] . ", " . $diente_id . ")' class='btn btn-secondary btn-sm my-2' style='width:100%'><i class='fas fa-tooth'></i> Evoluciones </a>";

            $BotonAdicional .= "<a href='#' onclick='EditarEstadoProcedimiento(" . $RowOdontogramaMaster["id"] . ")' class='btn btn-warning btn-sm ' style='width:100%;background-color:#0091ef;'><i class='fa fa-pencil'></i> Estado Procedimiento </a> <hr style='margin:7px;'>";

            $Cie10Texto = "";
            if ($RowOdontogramaMaster["cie_10"] != "0" and $RowOdontogramaMaster["cie_10"] != "") {
                $Cie10Texto = "CIE-10: " . $RowOdontogramaMaster["cie_10"];
            }

            echo "<tr>
                <td style='text-align: -webkit-center;' width='15%'>
                    <div style='width:40px'>
                    " . $SVG . " 
                    </div>
                    Cara:<br>" . $RowOdontogramaMaster["NombreCara"] . " <hr style='margin-top: 5px;margin-bottom: 5px;'> <b>$Nombre_Procedimiento</b> {$Nombre_Inventario} <hr style='margin-top: 5px;margin-bottom: 5px;'>  " . $Cie10Texto . "
                </td>
                <td width='10%'>
                " . funcionMaster($RowOdontogramaMaster["usuario_id"], 'ID', 'NOMBRE_USUARIO', 'usuarios') . "
                </td>
                <td width='10%' style='text-align: -webkit-center;'>
                    " . $RowOdontogramaMaster["Fecha"] . "<br>" . $RowOdontogramaMaster["Hora"] . "
                </td>
                
                <td width='20%'>
                " . $RowOdontogramaMaster["Detalle"] . "
                </td>

                <td width='25%'>
                    <u>Firma</u> : " . $EstadoFirma . " <hr> <u>Estado</u> : " . $Estado_Procedimiento . " <br> " . $Estado_Procedimiento_Detalle . "
                </td>
                
                <td width='15%' style='text-align: center;'>
                    {$BotonAdicional}
                    {$BotonesAcciones}
                </td>
            </tr>";
        }

        echo "</tbody></table>";
    } elseif ($_POST["Tipo_Consulta"] == "Cargar Historial Paciente") {
        $usuario_id = $_POST["usuario_id"];
        $cliente_id = $_POST["cliente_id"];

        echo "<table class='table table-bordered table-striped' style='text-align-last: center;'>
            <thead>
                <tr>
                    <td>Fecha</td>
                    <td>Usuario</td>
                    <td>Icono</td>
                    <td>Diente</td>
                    <td>Detalles</td>
                    <td>Estado/Firma</td>
                    <td><i class='fas fa-sliders-h'></i></td>
                </tr>
            </thead>
            <tbody>";

        $QueryOdontogramaMaster = mysqli_query($conn3, "SELECT * FROM OD_OdontogramaMasterDetalle_Pendientes WHERE cliente_id = '$cliente_id' AND usuario_id = '$usuario_id' AND Activo=1 ORDER BY id DESC");
        while ($RowOdontogramaMaster = mysqli_fetch_array($QueryOdontogramaMaster)) {

            $Nombre_Procedimiento = funcionMaster($RowOdontogramaMaster["Procedimiento"], 'id', 'Nombre', 'OD_Procedimiento');

            $SVG = funcionMaster(funcionMaster($RowOdontogramaMaster["Procedimiento"], 'id', 'Icono', 'OD_Procedimiento'), 'id', 'SVG', 'OD_Iconos_SVG');
            $Color = funcionMaster($RowOdontogramaMaster["Procedimiento"], 'id', 'Color', 'OD_Procedimiento');
            $SVG = str_replace('fill="currentColor"', 'fill="' . $Color . '"', $SVG);

            $EstadoFirma = funcionMaster($RowOdontogramaMaster["id"], 'detalle_id', 'id', 'OD_FirmaDetalle');
            $Estado_Procedimiento = $RowOdontogramaMaster["Estado_Procedimiento"];
            $Estado_Procedimiento_Detalle = $RowOdontogramaMaster["Estado_Procedimiento_Detalle"];
            $BotonAdicional = "";
            $BotonesAcciones = "";
            if ($EstadoFirma != "") {
                $EstadoFirma = "<label style='color:green;'>Firmado</label>";
                $BotonAdicional = "<a href='#' onclick='VerFirmaCliente(" . $RowOdontogramaMaster["id"] . ")' class='btn btn-success btn-sm ' style='width:100%;background-color:#0091ef;'><i class='fa fa-book'></i> Ver Firma </a> <hr style='margin:7px;'>";

                //$BotonesAcciones ="<a href='#' onclick='EliminarDetalleOdontograma_Diente(".$RowOdontogramaMaster["id"].")' class='btn btn-danger btn-sm' style='width:100%'><i class='fa fa-trash-o'></i> Eliminar Procedimiento0 </a>";
                $BotonesAcciones = "<a href='#' onclick='EliminarDetalleOdontograma(" . $RowOdontogramaMaster["id"] . ")' class='btn btn-danger btn-sm' style='width:100%'><i class='fa fa-trash-o'></i> Eliminar Procedimiento0 </a>";
            } else {
                $EstadoFirma = "<label style='color:red;'>Sin Firma</label>";
                $BotonAdicional = "<a href='#' onclick='EnviarAFirmarCliente(" . $RowOdontogramaMaster["id"] . ")' class='btn btn-info btn-sm ' style='width:100%;background-color:#0091ef;'><i class='fa fa-pencil'></i> Enviar Firma </a> <hr style='margin:7px;'>";

                //$BotonesAcciones ="<a href='#' onclick='EliminarDetalleOdontograma_Diente(".$RowOdontogramaMaster["id"].")' class='btn btn-danger btn-sm' style='width:100%'><i class='fa fa-trash-o'></i> Eliminar Procedimiento </a>
                //<a href='#' onclick='EditarDetalleOdontograma_Diente(".$RowOdontogramaMaster["id"].")' class='btn btn-info btn-sm' style='width:100%;padding-left: 15px;padding-right: 15px;margin-top: 10px;'><i class='fa fa-pencil'></i> Editar Procedimiento </a>";

                $BotonesAcciones = "<a href='#' onclick='EliminarDetalleOdontograma(" . $RowOdontogramaMaster["id"] . ")' class='btn btn-danger btn-sm' style='width:100%'><i class='fa fa-trash-o'></i> Eliminar Procedimiento </a>
            <a href='#' onclick='EditarDetalleOdontograma_Diente(" . $RowOdontogramaMaster["id"] . ",1)' class='btn btn-info btn-sm' style='width:100%;padding-left: 15px;padding-right: 15px;margin-top: 10px;'><i class='fa fa-pencil'></i> Editar Procedimiento </a>";
            }
            $BotonAdicional .= "<a href='#' onclick='EditarEstadoProcedimiento(" . $RowOdontogramaMaster["id"] . ")' class='btn btn-warning btn-sm ' style='width:100%;background-color:#0091ef;'><i class='fa fa-pencil'></i> Estado Procedimiento </a> <hr style='margin:7px;'>";

            //$BotonAdicional.="<a href='#' onclick='EditarEstadoProcedimiento(".$RowOdontogramaMaster["id"].")' class='btn btn-warning btn-sm ' style='width:100%;background-color:#0091ef;'><i class='fa fa-pencil'></i> Editar Estado Procedimiento </a> <hr style='margin:7px;'>";


            $Cie10Texto = "";
            if ($RowOdontogramaMaster["cie_10"] != "0" and $RowOdontogramaMaster["cie_10"] != "") {
                $Cie10Texto = "CIE-10: " . $RowOdontogramaMaster["cie_10"];
            }



            echo "<tr>
                <td width='10%'>
                    " . $RowOdontogramaMaster["Fecha"] . " <br> " . $RowOdontogramaMaster["Hora"] . "
                </td>
                <td width='15%'>
                " . funcionMaster($RowOdontogramaMaster["usuario_id"], 'ID', 'NOMBRE_USUARIO', 'usuarios') . "
                </td>
                <td  width='20%'style='text-align: -webkit-center;'>
                    <div style='width:40px'>
                    " . $SVG . " 
                    </div>
                    <br>
                    Cara: " . $RowOdontogramaMaster["NombreCara"] . " <hr> $Nombre_Procedimiento <hr>  " . $Cie10Texto . "
                </td>
                <td width='10%'>
                    " . $RowOdontogramaMaster["Numero_Diente"] . "
                </td>
                <td width='45%'>
                    " . $RowOdontogramaMaster["Detalle"] . "
                </td>
                <td>
                    Firma: " . $EstadoFirma . "<br> 
                    Estado: " . $Estado_Procedimiento . ", " . $Estado_Procedimiento_Detalle . "
                </td>
                <td width='25%'>
                    {$BotonAdicional}
                    {$BotonesAcciones}
                </td>
            </tr>";
        }

        echo "</tbody>
    </table>";
    }

    //if para Eliminar Detalle Odontograma
    elseif ($_POST["Tipo_Consulta"] == "Eliminar Detalle Odontograma") {
        $id = $_POST["DetalleOdontograma_id"];
        //hacer un update al campo Activo=0
        $QueryOdontogramaMaster = mysqli_query($conn3, "UPDATE OD_OdontogramaMasterDetalle_Pendientes SET Activo = 0 WHERE id = '$id' limit 1");
        //numero de columnas afectadas por el update
        $AfectadasUp = mysqli_affected_rows($conn3);

        $Afectadas = ActualizarDetallesOdontograma($id);
        $Afectadas[0] = $AfectadasUp;
        //print_r($Afectadas);

        if ($Afectadas[0] > 0) {

            //$queryPresupuestoTratamiento = mysqli_query($conn3, "UPDATE OD_Procedimientos_Presupuestar SET Activo='0' WHERE detalle_odontograma_id = '$id' limit 1");

            $QueryOdontogramaMaster = mysqli_query($conn3, "SELECT * FROM OD_OdontogramaMasterDetalle_Pendientes WHERE id = '$id' limit 1");
            $RowOdontogramaMaster = mysqli_fetch_array($QueryOdontogramaMaster);
            //echo $RowOdontogramaMaster["Numero_Diente"];

            $Arreglo["Estado"] = true;
            $Arreglo["Numero_Diente"] = $RowOdontogramaMaster["Numero_Diente"];
        }

        echo json_encode($Arreglo);
    } elseif ($_POST["Tipo_Consulta"] == "Buscar Informacion Detalle Odontograma") {

        $id = $_POST["DetalleOdontograma_id"];

        //consultar el campo Numero_Diente y Nombre_Cara y cliente_id de la tabla OD_OdontogramaMasterDetalle_Pendientes
        $QueryOdontogramaMaster = mysqli_query($conn3, "SELECT * FROM OD_OdontogramaMasterDetalle_Pendientes WHERE id = '$id' limit 1");
        $RowOdontogramaMaster = mysqli_fetch_array($QueryOdontogramaMaster);

        $Arreglo['id_detalle'] = $RowOdontogramaMaster["id"];
        $Arreglo['Detalle'] = $RowOdontogramaMaster["Detalle"];
        $Arreglo['Procedimiento'] = $RowOdontogramaMaster["Procedimiento"];
        $Arreglo['Posicion'] = $RowOdontogramaMaster["Posicion"];
        $Arreglo['NombreCara'] = $RowOdontogramaMaster["NombreCara"];
        $Arreglo['NumeroDiente'] = $RowOdontogramaMaster["Numero_Diente"];

        //$Arreglo['inventario_id'] = $RowOdontogramaMaster["inventario_id"];
        $Arreglo['cie_10'] = $RowOdontogramaMaster["cie_10"];
        //consultar el tratamiento adjunto del detalle del odontograma
        /*
    $QueryOdontogramaMaster = mysqli_query($conn3, "SELECT * FROM OD_Procedimientos_Presupuestar WHERE detalle_odontograma_id = '$id' limit 1");
    $RowOdontogramaMaster = mysqli_fetch_array($QueryOdontogramaMaster);
    $Arreglo['inventario_presupuesto_id'] = $RowOdontogramaMaster["inventario_presupuesto_id"] == "" ? "0" : $RowOdontogramaMaster["inventario_presupuesto_id"];
    */
        echo json_encode($Arreglo);
    } elseif ($_POST["Tipo_Consulta"] == "Guardar Edicion Informacion Detalle Odontograma") {

        $id_detalle = $_POST["Resultados"]["id_detalle"];

        $Detalle = $_POST["Resultados"]["detalle"];
        $Procedimiento = $_POST["Resultados"]["estado"];
        $Posicion = $_POST["Resultados"]["posicion_edicion"];
        $NombreCara = $_POST["Resultados"]["cara"];

        //$tratamiento_edicion = $_POST["Resultados"]["tratamiento_edicion"];
        //$inventario_id = $_POST["Resultados"]["tratamiento_edicion"];
        //$inventario_id = 0;
        $inventario_id = funcionMaster($Procedimiento, 'id', 'inventario_id', 'OD_Procedimiento') ?: 0;
        $cie_10 = $_POST["Resultados"]["CIE10_edicion"];

        $Fecha = date("Y-m-d");
        $Hora = date("H:i:s");

        $queryOdontogramaMaster = mysqli_query($conn3, "UPDATE OD_OdontogramaMasterDetalle_Pendientes SET Detalle = '{$Detalle}',Procedimiento = '{$Procedimiento}',Posicion = '{$Posicion}',NombreCara = '{$NombreCara}',inventario_id='{$inventario_id}', cie_10='{$cie_10}' WHERE id = '$id_detalle' limit 1") or die(mysqli_error($conn3));
        //FacturarDetalle($id_detalle);
        $AfectadasUp = mysqli_affected_rows($conn3);

        if ($AfectadasUp > 0) {
            $queryOdontogramaMaster = mysqli_query($conn3, "UPDATE OD_OdontogramaMasterDetalle_Pendientes SET Fecha='{$Fecha}', Hora='{$Hora}' WHERE id = '$id_detalle' limit 1");
            $Afectadas = ActualizarDetallesOdontograma($id_detalle);
            $QueryOdontogramaMaster = mysqli_query($conn3, "SELECT * FROM OD_OdontogramaMasterDetalle_Pendientes WHERE id = '$id_detalle' limit 1");
            $RowOdontogramaMaster = mysqli_fetch_array($QueryOdontogramaMaster);


            $queryPresupuestoTratamiento = mysqli_query($conn3, "UPDATE OD_Procedimientos_Presupuestar SET inventario_id='{$inventario_id}' WHERE detalle_odontograma_id = '$id_detalle' limit 1");
            $AfectadasPresupuesto = mysqli_affected_rows($conn3);
            if ($AfectadasPresupuesto > 0) {
                $queryPresupuestoTratamiento = mysqli_query($conn3, "UPDATE OD_Procedimientos_Presupuestar SET Fecha='{$Fecha}', Hora='{$Hora}' WHERE detalle_odontograma_id = '$id_detalle' limit 1");
            } elseif ($AfectadasPresupuesto == 0) {
                if ($inventario_id > 0) {
                    PresupuestarDetalle($id_detalle, $inventario_id);
                }
            }

            if ($inventario_id > 0) {
                $queryPresupuestoTratamiento = mysqli_query($conn3, "UPDATE OD_Procedimientos_Presupuestar SET Activo='1' WHERE detalle_odontograma_id = '$id_detalle' limit 1");
            } else {
                $queryPresupuestoTratamiento = mysqli_query($conn3, "UPDATE OD_Procedimientos_Presupuestar SET Activo='0' WHERE detalle_odontograma_id = '$id_detalle' limit 1");
            }

            $Arreglo["NumeroDiente"] = $RowOdontogramaMaster["Numero_Diente"];
            $Arreglo["Estado"] = "Actualizado";
            $Arreglo["Test"] = $AfectadasPresupuesto;
        } else {
            $QueryOdontogramaMaster = mysqli_query($conn3, "SELECT * FROM OD_OdontogramaMasterDetalle_Pendientes WHERE id = '$id_detalle' limit 1");
            $RowOdontogramaMaster = mysqli_fetch_array($QueryOdontogramaMaster);

            $Arreglo["NumeroDiente"] = $RowOdontogramaMaster["Numero_Diente"];
            $Arreglo["Estado"] = "Sin Cambios";
        }

        echo json_encode($Arreglo);
    } elseif ($_POST["Tipo_Consulta"] == "Enviar Firmar Cliente") {

        require_once '../funciones/funciones.php';

        function Encriptar($valor)
        {
            $Sc = base64_decode("Medical");
            $Texto = (openssl_encrypt($valor, "AES-256-CBC", $Sc));
            return base64_encode($Texto);
        }

        function Desencriptar($valor)
        {
            $Sc = base64_decode("Medical");
            $Texto = openssl_decrypt(($valor), "AES-256-CBC", $Sc);
            return $Texto;
        }

        $Whatsapp = $_POST["Resultados"]["whatsapp_enviar"];
        $Correo = $_POST["Resultados"]["correo_enviar"];
        $cliente_id = $_POST["Resultados"]["cliente_id"];
        $detalle_odontograma_id = $_POST["Resultados"]["detalle_odontograma_id"];

        $QueryOdontogramaMaster = mysqli_query($conn3, "SELECT * FROM OD_OdontogramaMasterDetalle_Pendientes WHERE id = '$detalle_odontograma_id' limit 1");
        $RowOdontogramaMaster = mysqli_fetch_array($QueryOdontogramaMaster);

        $usuario_id = $RowOdontogramaMaster["usuario_id"];
        $Numero_Diente = $RowOdontogramaMaster["Numero_Diente"];
        $NombreCara = $RowOdontogramaMaster["NombreCara"];
        $Procedimiento = funcionMaster($RowOdontogramaMaster["Procedimiento"], 'id', 'Nombre', 'OD_Procedimiento');

        //$tabla_encriptado = Encriptar("OD_FirmaDetalle"); //nombre de la tabla
        $detalle_id_encriptado = Encriptar($detalle_odontograma_id); // nombre del id de la tabla (llave primaria)
        $usuario_encriptado = Encriptar($usuario_id);


        $CodigoUnico = strtotime("now");

        $mensajeW = " Sr(a) *" . trim(funcionMaster($cliente_id, 'cliente_id', 'nombre_cliente', 'cliente'), " ") . "* Se le ha registrado un detalle en la pieza dental #{$Numero_Diente} en {$NombreCara} el procedimiento {$Procedimiento} por el Doctor " . funcionMaster($usuario_id, 'ID', 'NOMBRE_USUARIO', 'usuarios') . ", para firmar el detalle utilizar el siguiente link, Link: {$Base}OD_ModuloFirma.php?id={$detalle_id_encriptado}&ui={$usuario_encriptado}";
        $action = 0;

        echo $mensajeW;
        Whatsapp_sent_cliente($linkkey, $Whatsapp, $mensajeW, $idCliente, $usuario_id, $Whatsapp, $action);
        /////////////////////////////////Correo electronico [Llenar]/////////////////////////////////
        require_once '../PlantillaCorreo/funcionesPlantillas.php';

        $usuario_id = $usuario_id;



        $titulo = "Dentalsoft - Detalle Odontograma  #" . $CodigoUnico;
        $subtitulo = "Detalle Procedimiento/Estado - " . funcionMaster($cliente_id, 'cliente_id', 'nombre_cliente', 'cliente');
        $texto = $mensajeW . ' o puede darle click al boton que dice Documento, Muchas gracias por su tiempo';
        $url = ["{$Base}OD_ModuloFirma.php?id={$detalle_id_encriptado}&ui={$usuario_encriptado}"];
        $botonurl = ["Firmar"];

        $mensaje = PlantillaBasicaMedica($usuario_id, $titulo, $subtitulo, $texto, $url, $botonurl);
        ////////////////////////////////////Correo electronico [Datos Adicionales]/////////////////////////////////
        $para = "{$Correo}"; //Correo

        // Para enviar un correo HTML, debe establecerse la cabecera Content-type
        $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
        $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        // Cabeceras adicionales
        $cabeceras .= 'To: ' . funcionMaster($usuario_id, 'ID', 'NOMBRE_USUARIO', 'usuarios') . '_' . $CodigoUnico . ' <noreply@dentalsoftplus.com>' . "\r\n";
        //$cabeceras .= 'From: ' . $titulo . ' <noreply2@3medicalsoftcolombia.com>' . "\r\n";
        //$cabeceras .= 'Cc: noreply3@2medicalsoftcolombia.com' . "\r\n";
        //$cabeceras .= 'Bcc: noreply4@1medicalsoftcolombia.com' . "\r\n";
        mail($para, $titulo, $mensaje, $cabeceras);
    } elseif ($_POST["Tipo_Consulta"] == "Buscar Firma") {

        $Detalle_id = $_POST["Detalle_id"];

        $queryList = mysqli_query($conn3, "SELECT * FROM OD_FirmaDetalle where detalle_id = '$Detalle_id' ORDER BY id DESC LIMIT 1 ");
        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
            $Arreglo["Firma"] = $rowMotorizado['Firma'];
            $Arreglo["Fecha"]  = $rowMotorizado['Fecha'];
            $Arreglo["Hora"]  = $rowMotorizado['Hora'];
            $Arreglo["Firma_Nombre"]  = $rowMotorizado['Firma_Nombre'];
            $Arreglo["Firma_Documento"]  = $rowMotorizado['Firma_Documento'];
        }

        echo json_encode($Arreglo);
    } elseif ($_POST["Tipo_Consulta"] == "Actualizar Estado Procedimiento") {

        $_POST = DatosIngresarMysqli($_POST);

        $Estado_Procedimiento = $_POST["Resultados"]["Estado_Modal_Procedimiento"];
        $Detalle_Procedimiento = $_POST["Resultados"]["Detalle_Modal_Procedimiento"];
        $detalle_odontograma_id = $_POST["Resultados"]["detalle_odontograma_id"];

        $Campo1 = mysqli_query($conn3, "show COLUMNS from OD_OdontogramaMasterDetalle_Pendientes WHERE Field = 'Estado_Procedimiento';");
        $nrowCampo1 = mysqli_num_rows($Campo1);
        if ($nrowCampo1 == "0") {
            mysqli_query($conn3, "ALTER TABLE `OD_OdontogramaMasterDetalle_Pendientes` ADD `Estado_Procedimiento` TEXT NULL DEFAULT 'Registrado' COMMENT 'Estado del Odontograma*Creado desde modulo de OD_Ajax*'");
        }
        $Campo1 = mysqli_query($conn3, "show COLUMNS from OD_OdontogramaMasterDetalle_Pendientes WHERE Field = 'Estado_Procedimiento_Detalle';");
        $nrowCampo1 = mysqli_num_rows($Campo1);
        if ($nrowCampo1 == "0") {
            mysqli_query($conn3, "ALTER TABLE `OD_OdontogramaMasterDetalle_Pendientes` ADD `Estado_Procedimiento_Detalle` TEXT NULL DEFAULT '' COMMENT 'Detalle del estado del odontograma *Creado desde modulo de OD_Ajax*'");
        }

        $QueryOdontogramaMaster = mysqli_query($conn3, "SELECT * FROM OD_OdontogramaMasterDetalle_Pendientes WHERE id = '$detalle_odontograma_id' limit 1");
        $RowOdontogramaMaster = mysqli_fetch_array($QueryOdontogramaMaster);
        $Numero_Diente = $RowOdontogramaMaster["Numero_Diente"];

        $queryPresupuestoTratamiento = mysqli_query($conn3, "UPDATE OD_OdontogramaMasterDetalle_Pendientes SET Estado_Procedimiento='{$Estado_Procedimiento}', Estado_Procedimiento_Detalle='{$Detalle_Procedimiento}' WHERE id = '$detalle_odontograma_id' limit 1");
        $AfectadasUp = mysqli_affected_rows($conn3);
        if ($AfectadasUp > 0) {
            $Arreglo["Estado"] = "Actualizado";
        } else {
            $Arreglo["Estado"] = "Sin Cambios";
        }
        $Arreglo["NumeroDiente"] = $Numero_Diente;

        echo json_encode($Arreglo);
    } elseif ($_POST["Tipo_Consulta"] == "Consultar_Evoluciones") {

        $dienteId = $_POST["dienteId"];
        $procedimiento = $_POST["procedimiento"];
        $usuario_id = $_POST["usuario_id"];
        $cliente_id = $_POST["cliente_id"];
        $usuarioPrincipal = $_POST["usuarioPrincipal"];

        $Tabla = "OD_OdontogramaEvolucion";
        $Tabla2 = "OD_OdontogramaEvolucionImagenes";

        $QueryCreateTable = "CREATE TABLE IF NOT EXISTS {$Tabla} (
            `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `nota_evolucion` varchar(45) NOT NULL,
            `diente_id` int(11) NOT NULL,
            `procedimiento_id` int(11) NOT NULL,
            `usuario_id` int(11) NOT NULL,
            `cliente_id` int(11) NOT NULL,
            `usuario_principal_id` int(11) NOT NULL,
            `fecha_registro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
            `fecha_actualizacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";

        $QueryCreateTable2 = "CREATE TABLE IF NOT EXISTS {$Tabla2} (
            `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `diente_id` int(11) NOT NULL,
            `procedimiento_id` int(11) NOT NULL,
            `usuario_id` int(11) NOT NULL,
            `cliente_id` int(11) NOT NULL,
            `usuario_principal_id` int(11) NOT NULL,
            `evolucion_id` int(11) NOT NULL,
            `nombre_archivo` varchar(255) NOT NULL,
            `ruta` varchar(255) NOT NULL,
            `fecha_registro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
            `fecha_actualizacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";

        if (!mysqli_query($conn3, $QueryCreateTable) || !mysqli_query($conn3, $QueryCreateTable2)) {
            $error = mysqli_error($conn3);
            $response =  [
                "error" => $error,
                "status" => false,
                "data" => null
            ];

            echo json_encode($response);
            exit();
        }


        $QueryEvoluciones = "SELECT nota_evolucion, id FROM {$Tabla} WHERE  diente_id = '{$dienteId}' and procedimiento_id = '{$procedimiento}' and cliente_id = '{$cliente_id}'";
        $ResultEvoluciones = mysqli_query($conn3, $QueryEvoluciones);
        $data = [];
        if ($ResultEvoluciones) {
            foreach ($ResultEvoluciones as $RowEvoluciones) {
                $idEvolucion =  $RowEvoluciones["id"];
                $QueryEvolucionesImg = "SELECT ruta, nombre_archivo FROM {$Tabla2} WHERE  evolucion_id = '{$idEvolucion}' ";
                $ResultEvolucionesImg = mysqli_query($conn3, $QueryEvolucionesImg);
                if ($ResultEvolucionesImg) {
                    foreach ($ResultEvolucionesImg as $RowEvolucionesImg) {
                        $RowEvoluciones["imagenes"][] = $RowEvolucionesImg;
                    }
                }
                $data[] = $RowEvoluciones;
            }
        }

        $response =  [
            "error" => null,
            "status" => true,
            "data" => $data
        ];

        echo json_encode($response);
        exit();
    } elseif ($_POST["Tipo_Consulta"] == "Guardar_Evoluciones") {

        $dienteId             = $_POST["dienteId"];
        $procedimientoId      = $_POST["procedimientoId"];
        $nota                 = $_POST["nota"];
        $usuario_id           = $_POST["usuario_id"];
        $cliente_id           = $_POST["cliente_id"];
        $usuario_principal_id = $_POST["usuario_principal_id"];
        $Tipo_Consulta        = $_POST["Tipo_Consulta"];

        $Tabla = "OD_OdontogramaEvolucion";
        $Tabla2 = "OD_OdontogramaEvolucionImagenes";

        $QueryInsertEvoluciones = " INSERT INTO {$Tabla} SET 
                                nota_evolucion = '$nota',
                                diente_id = '$dienteId' ,
                                procedimiento_id = '$procedimientoId',
                                usuario_id = '$usuario_id',
                                cliente_id = '$cliente_id',
                                usuario_principal_id = '$usuario_principal_id'";


        if (!mysqli_query($conn3, $QueryInsertEvoluciones)) {
            $error = mysqli_error($conn3);
            $response =  [
                "error" => $error,
                "status" => false,
                "data" => null
            ];

            echo json_encode($response);
            exit();
        }

        $evolucion_id = mysqli_insert_id($conn3);

        foreach ($_FILES["files_evolucion"]["tmp_name"] as $index => $file) {
            $name = date("YmdHis") . "_" . $_FILES["files_evolucion"]["name"][$index];
            $type = $_FILES["files_evolucion"]["type"][$index];

            $dirBase = "OD_ImagenesEvoluciones/";
            if (!file_exists($dirBase)) {
                mkdir($dirBase);
            }

            $endDir = $dirBase . $name;

            comprimirImagen($file, $endDir, 70);

            // if (move_uploaded_file($file, $endDir)) {
            // if ( comprimirImagen($file, $endDir, 70) ) {
            $QueryInsert = "INSERT INTO {$Tabla2} SET 
                            diente_id = '$dienteId',
                            procedimiento_id = '$procedimientoId',
                            usuario_id = '$usuario_id',
                            cliente_id = '$cliente_id',
                            usuario_principal_id = '$usuario_principal_id',
                            evolucion_id = '$evolucion_id',
                            nombre_archivo = '$name',
                            ruta = '$endDir' ";

            if (!mysqli_query($conn3, $QueryInsert)) {
                $error = mysqli_error($conn3);
                $response =  [
                    "error" => $error,
                    "status" => false,
                    "data" => null
                ];

                echo json_encode($response);
                exit();
            }
            // }
        }

        $response =  [
            "error" => null,
            "status" => true,
            "data" => [
                "message" => "Evolucion Guardada"
            ]
        ];

        echo json_encode($response);
        exit();
    }

    mysqli_close($conn3);
    exit();
} catch (\Throwable $th) {
    echo "Error: " . $th->getMessage() . "<br>";
    echo "Line: " . $th->getLine() . "<br>";
}
