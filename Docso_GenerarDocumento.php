<?php
include 'header.php';
include 'menu.php';

$id = $_GET['id'];
$ID_Usuario  =  $_SESSION['ID'];

$_POST = DatosIngresarMysqli($_POST);

if (isset($_POST['GuardarDetalleDocumento'])) {
    date_default_timezone_set('America/Bogota');



////////////////////////////////////////////////////////////////////? creacion de la tabla  //////////////////////////////////////////////////////////////////////////
$tabla = mysqli_query($conn3, "SHOW TABLES LIKE 'DocumentoSoporte_Detalles_Temp'");
$nrowtabla = mysqli_num_rows($tabla);
if ($nrowtabla == 0) {
    $query = "CREATE TABLE `DocumentoSoporte_Detalles_Temp` ( 
        `id` INT(11) NOT NULL AUTO_INCREMENT , 
        `Fecha` DATE NULL DEFAULT CURRENT_TIMESTAMP , 
        `idOperacion` INT(11) NULL DEFAULT '0' ,
        `idProducto` INT(11) NULL DEFAULT '0' ,
        `Cantidad` TEXT NULL DEFAULT '0' , 
        `Descripcion` TEXT NULL  ,
        `Base` FLOAT NOT NULL,
        `Totalbase` FLOAT NOT NULL,
        `Subtotal` FLOAT NOT NULL,
        `usuario_id` INT(11) NOT NULL ,
        `proveedor_id` INT(11) NOT NULL ,
        `SinvDep_id` INT(11) NULL DEFAULT '0' ,
        `Deposito_id` INT(11) NULL DEFAULT '0' ,

        `Descuento_Numerico` FLOAT NOT NULL,
        `Descuento_Textual` TEXT NULL ,
        
        `Impuesto_Numerico` FLOAT NOT NULL,
        `Impuesto_Textual` TEXT NULL ,

        `Total` FLOAT NOT NULL,
        `Estado` INT(11) NULL DEFAULT '1' ,
        PRIMARY KEY (`id`)) ENGINE = MyISAM;";

    $creaciontabla = mysqli_query($conn3, $query);
    if (!$creaciontabla) {
        echo "<script language='Javascript'> alert('error en la creacion de la tabla');
        window.location='portada';</script>";

        exit();
    }
}
$tabla = mysqli_query($conn3, "SHOW TABLES LIKE 'DocumentoSoporte_Detalles'");
$nrowtabla = mysqli_num_rows($tabla);
if ($nrowtabla == 0) {
    $query = "CREATE TABLE `DocumentoSoporte_Detalles` ( 
        `id` INT(11) NOT NULL AUTO_INCREMENT , 
        `Fecha` DATE NULL DEFAULT CURRENT_TIMESTAMP , 
        `idOperacion` INT(11) NULL DEFAULT '0' ,
        `idProducto` INT(11) NULL DEFAULT '0' ,
        `Cantidad` TEXT NULL DEFAULT '0' , 
        `Descripcion` TEXT NULL  ,
        `Base` FLOAT NOT NULL,
        `Totalbase` FLOAT NOT NULL,
        `Subtotal` FLOAT NOT NULL,
        `usuario_id` INT(11) NOT NULL ,
        `proveedor_id` INT(11) NOT NULL ,
        `SinvDep_id` INT(11) NULL DEFAULT '0' ,
        `Deposito_id` INT(11) NULL DEFAULT '0' ,

        `Descuento_Numerico` FLOAT NOT NULL,
        `Descuento_Textual` TEXT NULL ,
        
        `Impuesto_Numerico` FLOAT NOT NULL,
        `Impuesto_Textual` TEXT NULL ,

        `Total` FLOAT NOT NULL,
        `Estado` INT(11) NULL DEFAULT '1' ,
        PRIMARY KEY (`id`)) ENGINE = MyISAM;";

    $creaciontabla = mysqli_query($conn3, $query);
    if (!$creaciontabla) {
        echo "<script language='Javascript'> alert('error en la creacion de la tabla');
        window.location='portada';</script>";

        exit();
    }
}
////////////////////////////////////////////////////////////////////? creacion de la tabla  //////////////////////////////////////////////////////////////////////////

    $idOperacion = 0;
    $fechaRegistro = date("Y-m-d H:i:s");
    $codigoProd = $_POST["codigoProd"];
    $SinvDep_id = $_POST['SinvDep_id'];
    $Deposito_id = $_POST['dep'];
    $cantidad = $_POST['cantidad'];

    if($codigoProd=="0"){
        $descripcion = mysqli_real_escape_string($conn3, $_POST['codigoProd_Texto']);
        $SinvDep_id = "0";
        $Deposito_id = "0";
    }else{
        $descripcion = mysqli_real_escape_string($conn3, funcionMaster($codigoProd, 'ID', 'descripcion', 'sinvetrios'));
    }
    
    $base = $_POST["base"];

    //$subTotal = $_POST["subTotal"];
    $usuario_id = $_POST['usuario_id'];
    $proveedor_id = $_POST['ID_Empresa'];
    $tipo_historia = $_POST['tipo_historia'];
    $historia = $_POST['historia'];

    //$descuento_base = $_POST['descuento'];
    $descuento_base = 0;
    $totalbase = $base * $cantidad;

    if (strpos($descuento_base, '%') !== false) {

        $descuentos = str_replace("%", "", "$descuento_base");
        $descuentos = ($descuentos / 100);
        $descuento_final = round(($totalbase * $descuentos), 2);
        //echo "porcentaje";
    } else {
        $descuento_final = $descuento_base;
        //echo "numerico";
    }

    $subTotal = round($totalbase - $descuento_final,2);

    ////////////////////apartado iva
    if($codigoProd=="0"){
        $iva = $_POST['impuesto'];
    }else{
        $iva = funcionMaster($codigoProd, 'ID', 'iva', 'sinvetrios');
    }
    
    if ($iva != "" and $iva != "0") {
        // Calcular el monto del IVA
        $ivaMonto = round((($subTotal * $iva) / 100), 2);

        // Sumar el monto del IVA al subtotal
        $totalConIva = round($subTotal + $ivaMonto, 2);
    } else {
        $iva = 0;
        $ivaMonto = 0;
        $totalConIva = $subTotal;
    }
    //////////////////////////////////


    $queryList = mysqli_query($conn3, "INSERT INTO DocumentoSoporte_Detalles_Temp (Fecha, idProducto, Cantidad, Descripcion, Base, Totalbase, 
  Subtotal, usuario_id, proveedor_id,Descuento_Numerico,Descuento_Textual,SinvDep_id,Deposito_id,Impuesto_Numerico,Impuesto_Textual,Total) VALUES 
                                                                            ('$fechaRegistro', '$codigoProd','$cantidad','$descripcion','$base', '$totalbase', 
  '$subTotal', '$usuario_id', '$proveedor_id','$descuento_final','$descuento_base','$SinvDep_id','$Deposito_id','$ivaMonto','$iva','$totalConIva');") or die(mysqli_error($conn3));


    $ruta = htmlentities($_SERVER['PHP_SELF']);
    $ruta = str_replace('.php', '', $ruta);
    if ($queryList != true) {
        echo "<script language='Javascript'> window.location='{$ruta}?id={$proveedor_id}&error=Hubo Un Error Al Guardar Los Datos $Mensaje '</script>";
    } else {
        echo "<script language='Javascript'> window.location='{$ruta}?id={$proveedor_id}&msg=Se Guardaron Los Datos Correctamente $Mensaje '</script>";
    }
}


if (isset($_GET['borrar'])) {
    $id_borrar = $_GET['borrar'];

    mysqli_query($conn3, "UPDATE DocumentoSoporte_Detalles_Temp set Estado = 0 WHERE id = '{$id_borrar}' limit 1;");

    $id = $_GET["id"];
    $ruta = htmlentities($_SERVER['PHP_SELF']);
    $ruta = str_replace('.php', '', $ruta);
    echo "<script language='Javascript'>window.location='{$ruta}?id={$id}&error=Se Borro el Producto'</script>";
}


$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $ID_Usuario");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $moneda = $rowMotorizado['moneda'];
}

$proveedor_id = $_GET["id"];

$queryList = mysqli_query($conn3, "SELECT * FROM  sproveedores where id = '$proveedor_id'");
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

    $nombre = $rowMotorizado['nombre'];
    $rut = $rowMotorizado['rut'];
    $correo = $rowMotorizado['correo'];

    $direccion = $rowMotorizado['direccion'];
    $telefono = $rowMotorizado['telefono'];
    $vendedor = $rowMotorizado['vendedor'];
    $nota = $rowMotorizado['nota'];
    $idE = $rowMotorizado['id'];
}

if ($_GET["msg"] != "") {
    include "plugins/SweetAlert2K/AlertaCorrectaOperacion.php";
}
if ($_GET["error"] != "") {
    include "plugins/SweetAlert2K/AlertaErrorOperacion.php";
}

?>


<style>
    .select2-container--default .select2-selection--single {
        height: 40px !important;
    }

    /* para aplicar la misma funcion de un readonly, ya que si hay readonly y required no funcionan los dos */
    
    input[data-readonly_P] {
        pointer-events: none;
        background-color: #eee;
        opacity: 1;
    }

    input[data-readonly_montorestante] {
        pointer-events: none;
        background-color: #eee;
        opacity: 1;
    }
    
</style>
<!-- Content Wrapper. Contains page content -->

<style>
.Titulo_Pagina {
    width: fit-content;
    background-color: #3c8dbc75;
    padding: 20px;
    border-radius: 20px 20px 0px 0px;
    display: table-cell;
}
</style>

<div class="content-wrapper p-3">
    <div class="">

        <!-- /.box-header -->
        <div class="">

            <!-- Content Header (Page header) -->
            <section class="content-header">
                <ol class="breadcrumb">
                    <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio </a></li>
                    <li><a href="#">Generar Documento Soporte</a></li>


                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <h4 class="Titulo_Pagina">Generar Documento Soporte</h4>
                <div>
                    <div class="col-xs-12">

                        <div class="box">

                            <!-- /.box-header -->
                            <div class="box-body">

                                <?php echo datosProveedorReducido($proveedor_id); ?>





                                <br>

                                <div align="left" style="padding-bottom: 15px;padding-top: 15px;">
                                    <a style="padding-left: 15px;" class='btn btn-outline-info  rounded-pill shadow' onclick="MostrarTipoFactura('Simple_Formulario');">Seleccionar Por Producto</a>
                                o <a onclick="MostrarTipoFactura('Abierto_Formulario');" style="" class='btn btn-outline-info  rounded-pill shadow'>Seleccionar Producto Libre</a>
                                </div>

                                <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?id=<?php echo $id; ?>" method="POST" id="Simple_Formulario">
                                    <div class="form-row">



                                        <div class="form-group col-md-12">
                                            <label><strong> Depósito</strong></label>
                                            <!-- <select class="input-lg form-control" name="dep" id="deposito" onchange="ActualizacionDeposito()" <?= $DesabilitarDep; ?> required> -->
                                            <select class="input-lg form-control" name="dep" id="deposito" onchange="ActualizacionDeposito()" required>
                                                <?php
                                                $queryListDP = mysqli_query($conn3, "SELECT * from dep WHERE activo = 1 ORDER BY id ASC");
                                                while ($rowMotorizadoDP = mysqli_fetch_array($queryListDP)) {
                                                    $idDP = $rowMotorizadoDP['id'];
                                                    $descripcionDP = $rowMotorizadoDP['descripcion'];

                                                    if ($Deposito_id != "" and $Deposito_id == $idDP) {
                                                        echo '<option value="' . $idDP . '" selected>' . $descripcionDP . '</option>';
                                                    } else {
                                                        echo '<option value="' . $idDP . '">' . $descripcionDP . '</option>';
                                                    }
                                                }
                                                ?>
                                            </select>

                                        </div>

                                        <div class="form-group col-md-12">
                                            <div class="form-group col-md-12 m-0 p-0">
                                                <div align="left">
                                                    <label>Producto</label>
                                                </div>

                                                <select id="codigoProd" name="codigoProd" class="form-control select2" style="width: 100%;" required="required" onChange="CargarPrecioProducto();">
                                                    <option value="" selected="selected">Seleccione Producto</option>
                                                    <?php

                                                    $queryList = mysqli_query($conn3, "SELECT si.* from sinvetrios si
                                                    JOIN scategoria sca on si.tipo = sca.id
                                                    WHERE 1=1
                                                    AND si.estado = 1
                                                    AND sca.tipo in (1,3)");
                                                    while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                                                        $descripcion     = $row_recordset32['descripcion'];
                                                        $ID              = $row_recordset32['ID'];

                                                        echo "<option value='$ID'> $descripcion </option>";
                                                    }

                                                    ?>

                                                </select>
                                            </div>
                                            <div id="Campo_Adicional_Producto" class="col-md-12">

                                            </div>
                                        </div>


                                        <div class="form-group col-md-3">
                                            <div align="left">
                                                <label> Costo </label>
                                            </div>
                                            <input type="number" step="0.01" class="form-control input-lg" id="2" name="base" placeholder="Costo" onchange="multiplicar();" value="" required>
                                        </div>


                                        <div class="form-group col-md-3">
                                            <label>Cantidad</label>
                                            <input type="number" class="form-control input-lg" id="1" name="cantidad" placeholder="cantidad" onChange="multiplicar();" required>
                                            <div align="left" id="informacion_existencia"></div>
                                        </div>
                                        
                                        <!--
                                        <div class="form-group col-md-3">
                                            <label style="color:green;">Descuento</label>
                                            <input type="text" class="form-control input-lg" id="descuento" name="descuento" placeholder="descuento" pattern="[0-9.%]+" step="any" oninput="ValidarInput(this)" required>
                                        </div>
                                        -->
                                        <input type="hidden" name="descuento" id="descuento" value="0">

                                        <div class="form-group col-md-3">
                                            <label>Subtotal</label>
                                            <input type="number" class="form-control input-lg blur" id="3" name="subTotal" placeholder="subTotal" min="0" step="0.01" data-readonly_P required>
                                        </div>
                                        <div class="form-group col-md-12" align="center">
                                            <label style="color:#3a8bb9;">[si desea el descuento en % deberá colocar al final del numero el símbolo %, si es valor numérico solo colocar números]</label>
                                            <center><button type="submit" class="btn btn-block btn-outline-info rounded-pill shadow m-1" name="GuardarDetalleDocumento">Guardar</button></center>
                                        </div>


                                        <input type="hidden" name="usuario_id" value="<?php echo $_SESSION['ID'] ?>">
                                        <input type="hidden" name="ID_Empresa" value="<?php echo $id ?>">
                                    </div>
                                </form>









                                <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?id=<?php echo $id; ?>" method="POST" id="Abierto_Formulario" style="display:none;">
                                    <div class="form-row">

                                        <div class="form-group col-md-12">
                                            <div class="form-group col-md-12 m-0 p-0">
                                                <div align="left">
                                                    <label>Nombre del Producto</label>
                                                </div>
                                                <input type="text" class="form-control input-lg" id="codigoProd_Texto" name="codigoProd_Texto" placeholder="Producto" required>
                                            </div>

                                        </div>


                                        <div class="form-group col-md-3">
                                            <div align="left">
                                                <label> Costo </label>
                                            </div>
                                            <input type="number" step="0.01" class="form-control input-lg" id="2_Libre" name="base" placeholder="Costo" onchange="multiplicarProductoLibre();" value="" required>
                                        </div>


                                        <div class="form-group col-md-3">
                                            <label>Cantidad</label>
                                            <input type="number" class="form-control input-lg" id="1_Libre" name="cantidad" placeholder="cantidad" onchange="multiplicarProductoLibre();" required>
                                            <div align="left" id="informacion_existencia"></div>
                                        </div>
                                        
                                        <!--
                                        <div class="form-group col-md-3">
                                            <label style="color:green;">Descuento</label>
                                            <input type="text" class="form-control input-lg" id="descuento_Libre" name="descuento" placeholder="descuento" pattern="[0-9.%]+" step="any" oninput="ValidarInputProductoLibre(this)" required>
                                        </div>
                                        -->

                                        <input type="hidden" name="descuento" id="descuento_Libre" value="0">

                                        <div class="form-group col-md-3">
                                            <label>Subtotal</label>
                                            <input type="number" class="form-control input-lg blur" id="3_Libre" name="subTotal" placeholder="subTotal" min="0" step="0.01" data-readonly_P required>
                                        </div>
                                        
                                        <div class="form-group col-md-3">
                                            <label>Impuesto</label>
                                            <input type="number" class="form-control input-lg" id="impuesto" name="impuesto" placeholder="Impuesto" min="0" step="0.01" value="0" required>
                                        </div>

                                        <div class="form-group col-md-9" align="center">
                                            <label style="color:#3a8bb9;">[si desea el descuento en % deberá colocar al final del numero el símbolo %, si es valor numérico solo colocar números]</label>
                                            <center><button type="submit" class="btn btn-block btn-outline-info rounded-pill shadow m-1" name="GuardarDetalleDocumento">Guardar</button></center>
                                        </div>




                                        <input type="hidden" name="usuario_id" value="<?php echo $_SESSION['ID'] ?>">
                                        <input type="hidden" name="ID_Empresa" value="<?php echo $id ?>">
                                        <input type="hidden" name="codigoProd" value="0">
                                </form>






                            </div>
                        </div>

                    </div>






                    <div class="box">
                        <div class="box-body">
                            <div class="col-xs-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Descripción</th>

                                            <th>
                                                <div align="Right">Precio</div>
                                            </th>

                                            <th>
                                                <div align="Right">Cantidad</div>
                                            </th>

                                            <th>
                                                <div align="Right">SubTotal</div>
                                            </th>
                                            <th>
                                                <div align="center" style="color: blue;">Impuesto</div>
                                            </th>
                                            <th>
                                                <div align="Right">Total</div>
                                            </th>
                                            <th> </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php

                                            $ID = $_SESSION['ID'];
                                            
                                            $resultado = mysqli_query($conn3, "SELECT * FROM  DocumentoSoporte_Detalles_Temp where Estado = 1 and usuario_id = $ID and  proveedor_id = $id Order by id");
                                            while ($fila = mysqli_fetch_array($resultado)) {
    
                                                $Numero++;

                                                $deposito = funcionMaster($fila['Deposito_id'],'id','descripcion','dep');
                                                if($deposito != ""){
                                                    $deposito = $deposito." | ";
                                                }

                                                echo '     <tr>
                                                <td  width="5%">' . $Numero .' </td>
                                                <td width="30%">' .$deposito . ' ' . $fila['Descripcion'] .' </td>
                                                <td width="10%"><div align="Right">' . $fila['Base'] . '' . $moneda . '</div></td>
                                                <td width="5%"><div align="Right">' . $fila['Cantidad'] . '</div></td>
                                                <td width="10%"><div align="Right">' . $fila['Subtotal'] . '' . $moneda . '</div></td>
                                                <td width="10%"><div align="center">' . $fila['Impuesto_Numerico'] . '' . $moneda . '</div></td>
                                                <td width="10%"><div align="Right">' . $fila['Total'] . '' . $moneda . '</div></td>';
                                                

                                                echo "<td width='1%'><a href={$ruta}?id={$_GET['id']}&borrar={$fila['id']}><i class='fa fa-trash' style='color:red'></i> </a></td>";

                                                echo '</tr>';

                                                $totalCant += $fila['Cantidad'];
                                                $totalBase +=  $fila['Base'];
                                                $total += $fila['Subtotal'];

                                                //$totaldesc += $fila['Descuento_Numerico'];
                                                $ImpuestoDetalles += $fila['Impuesto_Numerico'];

                                                $totalFinal = $total;

                                                $TotalFactura += $fila['Total'];
                                            }

                                            ?>
                                        </tr>


                                    </tbody>

                                    <thead>
                                        <tr>

                                            <th> </th>
                                            <th> <strong>
                                                    <div align="Right"> Totales </div>
                                                </strong>
                                            </th>
                                            <th>
                                                <div align="Right"><?php echo $totalBase . ' ' . $moneda; ?> </div>
                                            </th>
                                            <th>
                                                <div align="Right"><?php echo $totalCant ?></div>
                                            </th>
                                            <th>
                                                <div align="Right"><?php echo $total . ' ' . $moneda; ?> </div>
                                            </th>
                                            <th>
                                                <div align="Right"><?php echo $ImpuestoDetalles . ' ' . $moneda; ?> </div>
                                            </th>
                                            <th>
                                                <div align="Right"><?php echo $TotalFactura . ' ' . $moneda; ?> </div>
                                            </th>
                                            <th> </th>

                                        </tr>



                                    </thead>


                                </table>

                            </div>
                        </div>
                    </div>

                    <?php
                    /*
                    $ID = $_SESSION['ID'];
                    //tipo 3 -> ordenes de compra
                    $nOrden = 0 + $_GET['iO'];
                    $resultado = mysqli_query($conn3, "SELECT * FROM sDetalleMetodosPagos WHERE id_usuario = $ID AND id_cliente = $clienteId AND idOperacion = 0 AND tipo = '3' and nOrden = $nOrden");
                    $MontoPagadoDetalle = 0;
                    while ($fila = mysqli_fetch_array($resultado)) {
                        $MontoPagadoDetalle = $MontoPagadoDetalle + $fila['nota_pago'];
                    }

                    $MontoDebe = round($total - $MontoPagadoDetalle, 2);

                    $MontoFaltanteFacturaCompra = $MontoDebe;
                    */
                    ?>




                    <?php
                    /*
                    ?>
                    <div class="col-md-12">
                        <form action="guardarDetalleMetodo.php" method="POST" name="formularioActualizarcliente">
                            <div class="form-row">

                                <div class="form-group col-md-3">

                                    <input type="hidden" class="form-control input-lg" id="id_usuario" name="id_usuario" placeholder="id_usuario" value="<?php echo  $id_usuario ?>">
                                    <label>Método de pago</label>
                                    <select id="metodo_pago" name="metodo_pago" class="form-control input-lg select" style="width: 100%;" required>
                                        <option value="">Seleccione...</option>
                                        <!--
                                        <option value="Efectivo">Efectivo</option>
                                        <option value="Crédito">Crédito</option>
                                        <option value="Cheque">Cheque</option>
                                        <option value="Transferencia Bancaria">Transferencia Bancaria</option>-->
                                        <?php
                                        //aqui se admite el numero de pago con id = 5 para el apartado de puntos
                                        $QueryMedioPago = mysqli_query($conn3, "SELECT * FROM Medios_Pago WHERE  Activo = '1'");
                                        while ($RowMedioPago = mysqli_fetch_array($QueryMedioPago)) {

                                            $MedioPago_id = $RowMedioPago['id'];
                                            $Nombre_MedioPago = $RowMedioPago['Nombre'];

                                            echo "<option value='$MedioPago_id'>$Nombre_MedioPago</option>";

                                        }
                                        ?>
                                    </select>

                                    <label>Monto</label>
                                    <input type="number" id="nota_pago" name="nota_pago" placeholder="Monto" class="form-control input-lg" step="0.01" max="<?= round($MontoFaltanteFacturaCompra, 2); ?>"><br>
                                    <button type="submit" class="btn btn-block btn-outline-primary rounded-pill shadow m-1">
                                        <i class="fa fa-save"></i>
                                        Guardar
                                    </button>




                                    <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['ID'] ?>">
                                    <input type="hidden" name="ID_Empresa" value="<?php echo $id ?>">
                                    <input type="hidden" name="id_historia" value="<?php echo $historiaClinica1 ?>">
                                    <input type="hidden" name="tipo_historia" value="<?php echo $tipo_historia ?>">
                                    

                                    <input type="hidden" name="tipo_cliente" valur="1">
                                    <input type="hidden" name="tipo" value="3">
                                    <input type="hidden" name="id_cliente" value="0">
                                    <input type="hidden" name="nOrden" value="<?= ($_GET["iO"] != "" ? $_GET["iO"] : 0) ?>">
                                </div>
                        </form>

                        <div class="col-md-3">
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
                                        <th> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php
                                        $ID = $_SESSION['ID'];
                                        //tipo 3 -> ordenes de compra
                                        $nOrden = 0 + $_GET['iO'];
                                        $resultado = mysqli_query($conn3, "SELECT * FROM sDetalleMetodosPagos WHERE id_usuario = $ID AND ID_Empresa = $id AND idOperacion = 0 AND tipo = '3' and nOrden = $nOrden");
                                        $check = mysqli_num_rows($resultado);
                                        $totalMet = 0;

                                        while ($fila = mysqli_fetch_array($resultado)) {
                                            $Numero++;
                                            $ruta = htmlentities($_SERVER['PHP_SELF']);
                                            $Nombre_Pago = funcionMaster($fila['metodo_pago'],'id','Nombre','Medios_Pago');

                                            echo '<tr>
                                                <td>' . $Numero . '</td>
                                                <td>' . $Nombre_Pago . '</td>
                                                <td><div align="Right">' . $fila[6] . '' . $moneda . '</div></td>
                                            </tr>';

                                            $totalMet += $fila['nota_pago'];
                                        }


                                        // echo "El total es: " . $totalMet;
                                        ?>
                                    </tr>
                                </tbody>
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th> <strong>
                                                <div align="Right"> Total </div>
                                            </strong>
                                        </th>
                                        <th>
                                            <div align="Right"><?php echo $totalMet . ' ' . $moneda; ?> </div>
                                        </th>



                                    </tr>

                                </thead>

                            </table>

                        </div>
                        <?php
                        */
                        ?>
                        <div class="box">
                            <div class="box-body">
                                <div class="col-md-12">
                                    <form action="Docso_TotalizarDocumento.php" method="POST" class="col-md-12" >
                                        <div class="form-row">
                                            <div class="form-group col-md-6">

                                                <label> Valor Factura </label>
                                                <input type="number" name="montoPendiente" id="montoPendiente"  class="form-control input-lg blur" step="0.01" min="0" value="<?= round($TotalFactura,2) ?>" required data-readonly_montorestante> <br>

                                                <label> Fecha de Vencimiento</label>
                                                <input type="date" name="FechaVencimiento" placeholder="Fecha Vencimiento" class="form-control input-lg" value="<?= date('Y-m-d'); ?>" required>
                                                <br> <br>
                                                <label> Fecha de Venta</label>
                                                <input type="date" name="FechaVenta" placeholder="Fecha Venta" class="form-control input-lg" value="<?= date('Y-m-d'); ?>" required>
                                                <br> <br>
                                                <label> Fecha de Entrega</label>
                                                <input type="date" name="FechaEntrega" placeholder="Fecha Entrega" class="form-control input-lg" value="<?= date('Y-m-d'); ?>" required>
                                                <br> <br>
                                                <button type="submit" class="btn btn-block btn-outline-danger btn-lg rounded-pill shadow">
                                                    <i class="fa fa-dollar"></i>
                                                    Totalizar Factura
                                                </button>

                                            </div>
                                            <div class="form-group col-md-6">
                                                <label> Observaciones o notas</label>
                                                <textarea id="Nota" name="Nota" class="textarea" placeholder="Observaciones o Notas" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                                            </div>


                                            <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID'] ?>">
                                            <input type="hidden" name="proveedor_id" id="proveedor_id" value="<?php echo $_GET['id'] ?>">

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                </div>
                <!-- /.col -->
            </section>
        </div>
        <!-- /.row -->
        <!-- /.content -->
    </div>




    <?php include("footer.php") ?>

    <script>
  // no quitar para evitar problemas de que guarde con este caracter ""
  $(document).on('input', 'input[type="text"], textarea', function() {
    $(this).val($(this).val().replace(/['"]/g, ''));
  });
</script>
    <script type="text/javascript">
        function multiplicar() {

            var descuentos = $("#descuento").val();

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
                    descuentos = descuentos.replace('%', ' ');

                    descuentos = parseFloat(descuentos);

                    descuentos = (descuentos / 100);
                    descuentos_final = r * descuentos;

                } else {
                    descuentos_final = descuentos;
                }
            }


            r = (r - descuentos_final).toFixed(2);
            //console.log(r);

            document.getElementById("3").value = r;
        }

        function multiplicarProductoLibre(){

            var descuentos = $("#descuento_Libre").val();

            m1 = document.getElementById("1_Libre").value;
            m2 = document.getElementById("2_Libre").value;
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
                    descuentos = descuentos.replace('%', ' ');

                    descuentos = parseFloat(descuentos);

                    descuentos = (descuentos / 100);
                    descuentos_final = r * descuentos;

                } else {
                    descuentos_final = descuentos;
                }
            }


            r = (r - descuentos_final).toFixed(2);
            //console.log(r);

            document.getElementById("3_Libre").value = r;

        }








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
            multiplicar();
        }



        function ValidarInputProductoLibre(campo) {
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
            multiplicarProductoLibre();
        }


    </script>
    <script>
        $(document).on('focus', ".blur", function() {
            $(this).blur();
        });
    </script>


    <script>
        function CargarPrecioProducto() {
            var codigoProd = $("#codigoProd").val();
            var deposito = $("#deposito").val();

            ////////////////////////// EVITAR ERRORES ///////////////
            var DivCampoPersonalizado = document.getElementById('Campo_Adicional_Producto');
            DivCampoPersonalizado.innerHTML = "";
            $('#3').val("");
            $('#2').val("");
            $('#1').val("");
            $('#descuento').val("");
            document.getElementById('informacion_existencia').innerHTML = "";
            /////////////////////////////////////////////////////////


            if (codigoProd != "") {
                $.ajax({
                    type: "POST",
                    url: "FA_Ajax_CargarPrecioYLista.php",
                    data: {
                        codigoProd: codigoProd,
                        deposito: deposito,
                        Tipo_Consulta: "Cargar Costo"
                    },
                    success: function(response) {

                        var Respuesta = JSON.parse(response);
                        //console.log (Respuesta);

                        // codigo para el apartado de lotes
                        if (Respuesta.Lista == true && Respuesta.Tipo == "Lotes") {

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
                                optionElement.textContent = item.Nombre + ` [${item.Existencia}] [${item.Vencimiento}] `;
                                optionElement.dataset.existencias = item.Existencia;

                                if (parseInt(item.Existencia) <= 0) {
                                    //optionElement.disabled = true;
                                    optionElement.style.backgroundColor = '#ff00004d';
                                }

                                selectElement.appendChild(optionElement);
                            });

                            // Agrega la función onchange al select
                            selectElement.onchange = function() {
                                var selectedOption = this.options[this.selectedIndex];
                                var existencias = selectedOption.dataset.existencias;

                                //////////////////////////////////////////////////////////////////////////
                                var Mensaje = "Existencia Disponible: <u><b>" + existencias + "</b></u>";
                                //info de las existencias informacion_existencia
                                document.getElementById('informacion_existencia').innerHTML = Mensaje;
                                ///////////////////////////////////////////////////////////////////////////
                            };

                            DivCampoPersonalizado.appendChild(selectElement);

                        }
                        //codigo para el apartado de producto simple
                        else if (Respuesta.Tipo == "Simple") {

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
                                var Mensaje = "Existencia Disponible: <u><b>" + item.Existencia + "</b></u>";
                                document.getElementById('informacion_existencia').innerHTML = Mensaje;
                                //////////////////////

                            });
                            DivCampoPersonalizado.appendChild(input);

                        }

                        // si no tiene un tipo de clasificacion nos indicara este error
                        else if (Respuesta.Tipo == "Error") {

                            alert('el tipo del producto tiene un error con la clasificacion del inventario o no existe el registro para el deposito elegido');
                            ActualizacionDeposito();
                        } else if (Respuesta.Detalles == null) {

                            alert('no existe el registro para el deposito elegido');
                            ActualizacionDeposito();
                        }



                        $('#2').val(Respuesta.Costo);

                    }
                });
            } else {
                $("#codigoProd").val("").trigger('change');
            }

        }

        function ActualizacionDeposito() {

            var divPersonalizado = document.getElementById('Campo_Adicional_Producto');
            divPersonalizado.innerHTML = "";
            $('#3').val("");
            $('#2').val("");
            $('#1').val("");
            $('#descuento').val("");
            //document.getElementById('1').removeAttribute('max');
            $("#codigoProd").val("").trigger('change');

        }
    </script>

    <script>
        
  function MostrarTipoFactura(valor) {

        if (valor == "Simple_Formulario") {
        document.getElementById(valor).style.display = "block";
        document.getElementById("Abierto_Formulario").style.display = "none";
        } else if (valor == "Abierto_Formulario") {
        document.getElementById(valor).style.display = "block";
        document.getElementById("Simple_Formulario").style.display = "none";
        }
    }

    </script>