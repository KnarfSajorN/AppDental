<?php
include 'header.php';
include 'menu.php';

$id = $_GET['id'];
$usuarioId = $_GET['usuarioId'];
$ID_principal = $_SESSION['ID_principal'];

$ID_Usuario  =  $_SESSION['ID'];


$_POST = DatosIngresarMysqli($_POST);

if (isset($_POST['GuardarDetalleOrden'])) {
    date_default_timezone_set('America/Bogota');

    $Campo1 = mysqli_query($conn3, "show COLUMNS from sDetalleOperPendites WHERE Field = 'Descuento_Numerico';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `sDetalleOperPendites` ADD `Descuento_Numerico` TEXT NULL DEFAULT '0'  COMMENT 'valor numerico del descuento *Creado desde modulo de factura*';");
    }

    $Campo1 = mysqli_query($conn3, "show COLUMNS from sDetalleOperPendites WHERE Field = 'Descuento_Textual';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `sDetalleOperPendites` ADD `Descuento_Textual` TEXT NULL DEFAULT '0'  COMMENT 'valor Original del descuento *Creado desde modulo de factura*';");
    }

    $Campo1 = mysqli_query($conn3, "show COLUMNS from sDetalleOper WHERE Field = 'Descuento_Numerico';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `sDetalleOper` ADD `Descuento_Numerico` TEXT NULL DEFAULT '0'  COMMENT 'valor numerico del descuento *Creado desde modulo de factura*';");
    }

    $Campo1 = mysqli_query($conn3, "show COLUMNS from sDetalleOper WHERE Field = 'Descuento_Textual';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `sDetalleOper` ADD `Descuento_Textual` TEXT NULL DEFAULT '0'  COMMENT 'valor Original del descuento *Creado desde modulo de factura*';");
    }


    $idOperacion = 0;
    $fechaRegistro = date("Y-m-d H:i:s");
    $codigoProd = $_POST["codigoProd"];
    $cantidad = $_POST['cantidad'];

    $descripcion = mysqli_real_escape_string($conn3, funcionMaster($codigoProd, 'ID', 'descripcion', 'sinvetrios'));
    $base = $_POST["base"];
    $impuesto = 0;

    $subTotal = $_POST["subTotal"];
    $usuario_id = $_POST['usuario_id'];
    $ID_Empresa = $_POST['ID_Empresa'];
    $tipo_historia = $_POST['tipo_historia'];
    $historia = $_POST['historia'];

    $descuento_base = $_POST['descuento'];

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

    $valor_calculado = $totalbase - $descuento_final;

    $SinvDep_id = $_POST['SinvDep_id'];
    $Deposito_id = $_POST['dep'];

    if ("$valor_calculado" != "$subTotal") {
        $subTotal = round($totalbase - $descuento_final, 2);
        $Mensaje = "[F]";
    }

    ////////////////////apartado iva
    $iva = funcionMaster($codigoProd, 'ID', 'iva', 'sinvetrios');
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

    $nOrden = 0 + $_POST['nOrden'];


    $queryList = mysqli_query($conn3, "INSERT INTO sDetalleOperPendites (idOperacion, fechaRegistro, idProducto, cantidad, descripcion, base, impuesto, totalbase, 
  subTotal, id_usuario, id_cliente,Descuento_Numerico,Descuento_Textual,ID_Empresa,tipo,SinvDep_id,Deposito_id,Impuesto_Numerico,Impuesto_Textual,Total, nOrden) VALUES ('$idOperacion','$fechaRegistro', '$codigoProd','$cantidad','$descripcion','$base',
  '$impuesto', '$totalbase', '$subTotal', '$usuario_id', '$ID_Empresa','$descuento_final','$descuento_base','$id','3','$SinvDep_id','$Deposito_id','$ivaMonto','$iva','$totalConIva', '$nOrden');") or die(mysqli_error($conn3));
    //echo "INSERT INTO sDetalleOperPendites (idOperacion, fechaRegistro, idProducto, cantidad, descripcion, base, impuesto, totalbase, subTotal, id_usuario, id_cliente,Descuento_Numerico,Descuento_Textual) VALUES ('$idOperacion','$fechaRegistro', '$codigoProd','$cantidad','$descripcion','$base','$impuesto', '$totalbase', '$subTotal', '$usuario_id', '$ID_Empresa','$descuento_final','$descuento_base');";


    $ruta = htmlentities($_SERVER['PHP_SELF']);
    if ($queryList != true) {
        echo "<script language='Javascript'> window.location='{$ruta}?id={$ID_Empresa}&iO={$nOrden}&tipo_historia=$tipo_historia&historiaClinica1=$historia&error=Hubo Un Error Al Guardar Los Datos $Mensaje '</script>";
    } else {
        echo "<script language='Javascript'> window.location='{$ruta}?id={$ID_Empresa}&iO={$nOrden}&tipo_historia=$tipo_historia&historiaClinica1=$historia&msg=Se Guardaron Los Datos Correctamente $Mensaje '</script>";
    }
}


if (isset($_GET['borrar'])) {
    $id = $_GET['borrar'];
    $nOrden = 0 + intval($_GET['iO']);
    $historiaClinica1 = $_GET['historiaClinica1'];
    $tipo_historia  = $_GET['tipo_historia'];


    mysqli_query($conn3, "UPDATE sDetalleOperPendites set estado = 0 WHERE id = '{$id}' limit 1;");

    $id = $_GET["id"];
    $ruta = htmlentities($_SERVER['PHP_SELF']);
    echo "<script language='Javascript'>window.location='{$ruta}?id={$id}&iO={$nOrden}&error=Se Borro el Producto'</script>";
}






$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $ID_Usuario");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $moneda = $rowMotorizado['moneda'];
    $impuestoF = $rowMotorizado['impuestoF'];
}

$queryList = mysqli_query($conn3, "SELECT * FROM  sproveedores where id = '$id'");
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



//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//esto se usara para el apartado de la lista del deposito y en un campo hidden para totalizar la factura
$id_proveedor = $_GET['id'];
$Deposito_id = "0";
// if ($_GET['iO'] != 0) {
//     $nOrden = $_GET['iO'];
//     $resultado = mysqli_query($conn3, "SELECT * FROM  sDetalleOperPendites where estado = 1 and  id_cliente = $id_proveedor AND tipo = '3' and nOrden = $nOrden order by id");
// } else {
//     $resultado = mysqli_query($conn3, "SELECT * FROM  sDetalleOperPendites where estado = 1 and  id_usuario =$ID and  id_cliente = $id_proveedor AND tipo = '3' and nOrden = 0 order by id");    
// }

// while ($fila = mysqli_fetch_array($resultado)) {
//     $Deposito_id = $fila["Deposito_id"];
// }
// if ($Deposito_id != "0" and $Deposito_id != "") {
//     $DesabilitarDep = "readonly";
// }
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

function ConsultarDisponbilidadSerialTipoProducto($Detalle_id)
{
    include 'funciones/conn3.php';
    $QueryDetalle = mysqli_query($conn3, "SELECT * FROM  sDetalleOperPendites WHERE id = $Detalle_id");
    while ($RowDetalle = mysqli_fetch_array($QueryDetalle)) {
        $idProducto = $RowDetalle['idProducto'];
        $SinvDep_id = $RowDetalle['SinvDep_id'];
        $cantidad = $RowDetalle['cantidad'];
        $Seriales = $RowDetalle['Seriales'];
    }

    $QueryInventario = mysqli_query($conn3, "SELECT * FROM  sinvetrios WHERE ID = $idProducto");
    while ($RowInventario = mysqli_fetch_array($QueryInventario)) {
        $tipo = $RowInventario['tipo'];
    }

    $QueryDepartamento = mysqli_query($conn3, "SELECT * FROM  scategoria WHERE id = $tipo limit 1");
    while ($RowDepartamento = mysqli_fetch_array($QueryDepartamento)) {
        $tipodepartamento = $RowDepartamento['tipo'];
        $maneja_serial = $RowDepartamento['maneja_serial'];
        $caracter_serial = $RowDepartamento['caracter_serial'];
    }



    if ($tipodepartamento == "6" and $maneja_serial == "1") {
        if ($Seriales == "") {
            return '<a onclick="ModalModuloExistenciasActivos_Compras(' . $Detalle_id . ',' . $SinvDep_id . ',\'' . $caracter_serial . '\',' . $cantidad . ')" class="btn btn-outline-info rounded-pill shadow m-1 FaltaLlenarSerial"><i class="fa fa-sticky-note"></i></a>';
        } else {
            return '<a onclick="ModalModuloHistorialExistencias(' . $Detalle_id . ',\'' . $caracter_serial . '\')" class="btn btn-outline-warning rounded-pill shadow m-1"><i class="fa fa-list"></i></a>';
        }
    }
    else if ($tipodepartamento == "1" and $maneja_serial == "1") {
        if ($Seriales == "") {
            return '<a onclick="ModalModuloExistenciasActivos_Compras(' . $Detalle_id . ',' . $SinvDep_id . ',\'' . $caracter_serial . '\',' . $cantidad . ')" class="btn btn-outline-info rounded-pill shadow m-1 FaltaLlenarSerial"><i class="fa fa-sticky-note"></i></a>';
        } else {
            return '<a onclick="ModalModuloHistorialExistencias(' . $Detalle_id . ',\'' . $caracter_serial . '\')" class="btn btn-outline-warning rounded-pill shadow m-1"><i class="fa fa-list"></i></a>';
        }
    } 
    else {
        return "";
    }
}


?>


<style>
    .select2-container--default .select2-selection--single {
        height: 40px !important;
    }

    /* para aplicar la misma funcion de un readonly, ya que si hay readonly y required no funcionan los dos */
    /* no quitar sirve para las retenciones*/

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


<div class="content-wrapper p-3">
    <div class="box">

        <!-- /.box-header -->
        <div class="box-body">

            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Generar Orden

                </h1>
                <ol class="breadcrumb">
                    <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio </a></li>
                    <li><a href="#">Generar Orden</a></li>


                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div>
                    <div class="col-xs-12">

                        <div class="box">

                            <!-- /.box-header -->
                            <div class="box-body">

                                <?php echo datosProveedorReducido($id_proveedor); ?>







                                <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?id=<?php echo $id; ?>" method="POST" name="formularioActualizarcliente">
                                    <div class="form-row">



                                        <div class="form-group col-md-12">
                                            <label><strong> Depósito</strong></label>
                                            <!-- <select class="input-lg form-control" name="dep" id="deposito" onchange="ActualizacionDeposito()" <?= $DesabilitarDep; ?> required> -->
                                            <select class="input-lg form-control" name="dep" id="deposito" onchange="ActualizacionDeposito()" required>
                                                <?php
                                                $queryListDP = mysqli_query($conn3, "SELECT * from dep WHERE ID_principal = $ID_principal and activo = 1 ORDER BY id ASC");
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
                                            <?php
                                            // if ($DesabilitarDep != "") {
                                            //     echo '<script>document.getElementById("deposito").addEventListener("mousedown", function (e) {
                                            //     e.preventDefault(); // Evita que se abra el menú desplegable
                                            //     this.blur(); // Quítale el enfoque al elemento
                                            // });</script>';
                                            // }
                                            ?>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <div class="form-group col-md-12 m-0 p-0">
                                                <div align="left">
                                                    <label>Producto</label>
                                                </div>

                                                <select id="codigoProd" name="codigoProd" class="form-control select2" style="width: 100%;" required="required" onChange="CargarPrecioProducto();">
                                                    <option value="" selected="selected">Seleccione Producto</option>
                                                    <?php

                                                    // $queryList = mysqli_query($conn3, "SELECT * FROM sinvetrios WHERE estado = 1 order by ID");
                                                    $queryList = mysqli_query($conn3, "SELECT si.* from sinvetrios si
                                                join scategoria sca on si.tipo = sca.id
                                                where 1=1
                                                and si.estado = 1
                                                and sca.tipo in (1,2,5,6)");
                                                    while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                                                        $descripcion     = $row_recordset32['descripcion'];
                                                        $ID              = $row_recordset32['ID'];

                                                        // $tipo = $row_recordset32['tipo'];
                                                        // $QueryCategorias = mysqli_query($conn3, "SELECT * FROM  scategoria where id = $tipo LIMIT 1");
                                                        // while ($rowCategorias = mysqli_fetch_array($QueryCategorias)) {
                                                        //     $TipoInventario = $rowCategorias['tipo'];
                                                        // }

                                                        // if($TipoInventario=="1" OR $TipoInventario=="5"){
                                                        //     echo "<option value='$ID'> $descripcion </option>";
                                                        // }
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

                                        <div class="form-group col-md-3">
                                            <label style="color:green;">Descuento</label>
                                            <input type="text" class="form-control input-lg" id="descuento" name="descuento" placeholder="descuento" pattern="[0-9.%]+" step="any" oninput="ValidarInput(this)" required>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label>Subtotal</label>
                                            <input type="number" class="form-control input-lg blur" id="3" name="subTotal" placeholder="subTotal" min="0" step="0.01" data-readonly_P required>
                                        </div>
                                        <div class="form-group col-md-12" align="center">
                                            <label style="color:#3a8bb9;">[si desea el descuento en % deberá colocar al final del numero el símbolo %, si es valor numérico solo colocar números]</label>
                                            <center><button type="submit" class="btn btn-block btn-outline-info rounded-pill shadow m-1" name="GuardarDetalleOrden">Guardar</button></center>
                                        </div>


                                        <input type="hidden" name="usuario_id" value="<?php echo $_SESSION['ID'] ?>">
                                        <input type="hidden" name="ID_Empresa" value="<?php echo $id ?>">
                                        <input type="hidden" name="historia" value="<?php echo $historiaClinica1 ?>">
                                        <input type="hidden" name="tipo_historia" value="<?php echo $tipo_historia ?>">
                                        <input type="hidden" name="nOrden" value="<?= ($_GET["iO"] != "" ? $_GET["iO"] : 0) ?>">


                                        <input type="hidden" name="tipo_cliente" valur="1">
                                        <input type="hidden" name="id_cliente" value="0">

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
                                            <th>
                                                Descripción del producto

                                            </th>
                                            <th>
                                                <div align="Right">Porcentaje IVA</div>
                                            </th>

                                            <th>
                                                <div align="Right">Precio</div>
                                            </th>

                                            <th>
                                                <div align="Right">Cantidad</div>
                                            </th>

                                            <th>
                                                <div align="center" style="color: green;">Descuento</div>
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

                                            // 31 10 2023

                                            if ($_GET['iO'] != 0) {
                                                $nOrden = $_GET['iO'];
                                                $resultado = mysqli_query($conn3, "SELECT * FROM  sDetalleOperPendites where estado = 1 and id_cliente = $id AND tipo = 3 and nOrden = $nOrden order by id");
                                            } else {
                                                $resultado = mysqli_query($conn3, "SELECT * FROM  sDetalleOperPendites where estado = 1 and id_usuario =$ID and  id_cliente = $id AND tipo = 3 and nOrden = 0 order by id");
                                            }
                                            //$resultado=mysql_query("select * from patients where ID_Doctor = '$ID_DOSTOR'");
                                            //$check = mysqli_num_rows($q);

                                            while ($fila = mysqli_fetch_array($resultado)) {
                                                //  '.$fila[2].'                    <a href="" >  <i class="fa fa-pencil-square-o"></i>   </a>  
                                                $Numero++;
                                                $ruta = htmlentities($_SERVER['PHP_SELF']);

                                                $totalbase = $fila['totalbase'];
                                                $subTotal = $fila['subTotal'];

                                                $descuentoValor = $fila['Descuento_Numerico'];

                                                $Descripcion = $fila['descripcion'];

                                                $SinvDep_id = $fila['SinvDep_id'];
                                                $idProductoT = $fila['idProducto'];
                                                $MasDetalles = ConsultarMasInformacion_Facturacion_Funcion($idProductoT, $SinvDep_id);
                                                $iva = funcionMaster($fila['idProducto'], 'ID', 'iva', 'sinvetrios');
                                                if ($MasDetalles != "") {
                                                    $Descripcion .= $MasDetalles;
                                                }

                                                // datos del deposito
                                                $deposito = funcionMaster($fila['Deposito_id'], 'id', 'descripcion', 'dep');

                                                //esta funcion es para agregar los seriales a las compras
                                                //parte superior esta la funcion
                                                $CampoAdicionalSerial = ConsultarDisponbilidadSerialTipoProducto($fila['id']);


                                                echo '     <tr>
                                                <td  width="5%">' . $Numero . '' . $CampoAdicionalSerial . ' </td>
                                                <td width="15%">' . $deposito . ' | ' . $Descripcion . ' </td>
                                                <td width="5%">' . $iva . '' . "%" . '  </td>
                                                <td width="10%"><div align="Right">' . $fila['base'] . '' . $moneda . '</div></td>
                                                <td width="5%"><div align="Right">' . $fila['cantidad'] . '</div></td>
                                                <td width="10%"><div align="center">' . $descuentoValor . '' . $moneda . '</div></td>
                                                <td width="10%"><div align="Right">' . $fila['subTotal'] . '' . $moneda . '</div></td>';

                                                echo "<td width='1%'><a href={$ruta}?id={$id}&iO={$nOrden}tipo_historia{$tipo_historia}=&historiaClinica1={$historiaClinica1}&borrar={$fila['id']}><i class='fa fa-trash' style='color:red'></i> </a></td>";

                                                echo '</tr>';

                                                $totalCant += $fila['cantidad'];
                                                $totalBase +=  $fila['base'];
                                                $total += $fila['subTotal'];

                                                $totaldesc += $descuentoValor;
                                                $ImpuestoDetalles += $fila['Impuesto_Numerico'];

                                                $totalFinal = $total;
                                            }

                                            //////////////////?importante no borrar////////////////////////////////////
                                            //////////////////?importante no borrar////////////////////////////////////
                                            //////////////////?importante no borrar////////////////////////////////////
                                            $Empresa_Id_ModalInclude = $_GET['id'];

                                            $ValorBaseParaRetencion_ModalInclude = $total;
                                            $ValorImpuestoParaRetencion_ModalInclude = $ImpuestoDetalles;

                                            //////////////////?importante no borrar////////////////////////////////////
                                            //////////////////?importante no borrar////////////////////////////////////
                                            //////////////////?importante no borrar////////////////////////////////////
                                            ?>
                                        </tr>


                                    </tbody>

                                    <thead>
                                        <tr>

                                            <th> </th>
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
                                                <div align="center"><?php echo $totaldesc . ' ' . $moneda; ?> </div>
                                            </th>
                                            <th>
                                                <div align="Right"><?php echo $total . ' ' . $moneda; ?> </div>
                                            </th>
                                            <th> </th>

                                        </tr>

                                        <?php
                                        if ($ImpuestoDetalles > 0) {
                                            $total = $total + $ImpuestoDetalles;
                                        ?>
                                            <tr>
                                                <th></th>
                                                <th colspan="5"> <strong>
                                                        <div align="Right"> Impuesto </div>
                                                    </strong>
                                                </th>
                                                <th>
                                                    <div align="Right"><?php echo $ImpuestoDetalles  . ' ' . $moneda; ?> </div>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th></th>
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
                        </div>
                    </div>

                    <?php
                    $ID = $_SESSION['ID'];
                    //tipo 3 -> ordenes de compra
                    $nOrden = 0 + $_GET['iO'];
                    $resultado = mysqli_query($conn3, "SELECT * FROM sDetalleMetodosPagos WHERE id_usuario = $ID AND id_cliente = $clienteId AND idOperacion = 0 AND tipo = '3' and nOrden = $nOrden");
                    $MontoPagadoDetalle = 0;
                    if ($resultado) {
                        while ($fila = mysqli_fetch_array($resultado)) {
                        $MontoPagadoDetalle = $MontoPagadoDetalle + $fila['nota_pago'];
                        }
                    }
                    

                    $MontoDebe = round($total - $MontoPagadoDetalle, 2);
                    // echo "El total es: " . $totalMet;

                    ////////////////////?Para Retenciones//////////////////////////////
                    $ResultadoRetencion = mysqli_query($conn3, "SELECT * FROM  DetalleRetenciones WHERE Activo='1' AND ID_Empresa = '$Empresa_Id_ModalInclude' AND usuario_id = '$_SESSION[ID]' ");
                    $MontoRetencion = 0;
                    while ($RowRetencion = mysqli_fetch_array($ResultadoRetencion)) {
                        $MontoRetencion = $MontoRetencion + $RowRetencion['MontoRetencion'];
                    }
                    ////////////////////?Para Retenciones//////////////////////////////

                    $MontoFaltanteFacturaCompra = round($MontoDebe - $MontoRetencion, 2);
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
                                            $Nombre_Pago = funcionMaster($fila['metodo_pago'], 'id', 'Nombre', 'Medios_Pago');

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

                        <!-- no modificar el id del formulario se usa para varias cosas -->
                        <form action="totalizarFactura.php" method="POST" name="formularioActualizarcliente" class="col-md-6" id="FormularioTotalizarFactura">
                            <div class="form-row">
                                <div class="form-group col-md-6">

                                    <!-- agregar include de retenciones -->
                                    <?php
                                    //Son dos querys includes de retencion buscarlos y arriba debajo de pagos hay un query para retenciones para el calculo del monto
                                    $QueryContabilidad = mysqli_query($conn3, "SELECT * FROM  Config_Contabilidad WHERE Activo = 1");
                                    $NrowContabilidad = mysqli_num_rows($QueryContabilidad);
                                    if ($NrowContabilidad > 0) {
                                        include 'RT_IncludeBotonRetenciones.php';
                                    }

                                    ?>



                                    <label> Restante por pagar </label>
                                    <input type="number" name="montoPendiente" id="montoPendiente" placeholder="Monto Pagado" class="form-control input-lg blur" step="0.01" min="0" value="<?= round($MontoFaltanteFacturaCompra - $totalMet, 2) ?>" required data-readonly_montorestante> <br>

                                    <label> Fecha de vencimiento</label>
                                    <input type="date" name="fechaVencimiento" placeholder="fecha Vencimiento" class="form-control input-lg" value="<?= date('Y-m-d'); ?>" required>
                                    <br> <br>
                                    <button type="submit" class="btn btn-block btn-outline-danger btn-lg rounded-pill shadow">
                                        <i class="fa fa-dollar"></i>
                                        Totalizar Factura
                                    </button>

                                </div>
                                <div class="form-group col-md-6">
                                    <label> Observaciones o notas</label>
                                    <textarea id="nota" name="nota" class="textarea" placeholder="Observaciones o Notas" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                                </div>


                                <input type="hidden" name="id_usuario" id="id_usuario_totalizar" value="<?php echo $_SESSION['ID'] ?>">
                                <input type="hidden" name="ID_Empresa" id="id_cliente_totalizar" value="<?php echo $id ?>">
                                <input type="hidden" name="historia" value="<?php echo $historiaClinica1 ?>">
                                <input type="hidden" name="tipo_historia" value="<?php echo $tipo_historia ?>">
                                <!-- <input type="hidden" name="Deposito_id" id="Deposito_id" value="<?php echo $Deposito_id; ?>"> -->

                                <input type="hidden" name="tipo_cliente" valur="1">
                                <input type="hidden" name="tipo" value="3">
                                <input type="hidden" name="id_cliente" value="0">
                                <input type="hidden" name="nOrden" value="<?= ($_GET["iO"] != "" ? $_GET["iO"] : 0) ?>">

                            </div>
                        </form>

                    </div>
                </div>
                <!-- /.col -->
            </section>
        </div>
        <!-- /.row -->
        <!-- /.content -->
    </div>




    <?php include("footer.php") ?>

    <?php
    //Son dos querys includes de retencion buscarlos y arriba debajo de pagos hay un query para retenciones para el calculo del monto
    $QueryContabilidad = mysqli_query($conn3, "SELECT * FROM  Config_Contabilidad WHERE Activo = 1");
    $NrowContabilidad = mysqli_num_rows($QueryContabilidad);
    if ($NrowContabilidad > 0) {
        include 'RT_IncludeModalRetenciones.php';
        include 'Include_CompraContabilidad.php';
    ?>
        <script>
            document.getElementById('FormularioTotalizarFactura').addEventListener('submit', function(event) {
                event.preventDefault();
                ModalModuloContabilidadCXP();
            });
        </script>
    <?php
    }
    ?>



    <?php
    //esto es para el apartado de seriales
    include 'IncludeModalSerialesFacturaCompra.php';
    ?>
    <script>
        $(document).ready(function() {
            // Busca si existe un elemento con la clase 'FaltaLlenarSerial' es por que falta que llenen el serial del producto
            var faltaLlenarSerialElement = $('.FaltaLlenarSerial');

            if (faltaLlenarSerialElement.length > 0) {
                var nuevoInput = $('<input>', {
                    type: 'text',
                    class: 'form-control input-lg blur',
                    id: 'ValidacionSeriales',
                    name: 'ValidacionSeriales',
                    placeholder: 'Faltan llenar los seriales en la parte superior',
                    value: '',
                    'data-readonly_P': true,
                    required: true,
                });

                $('#FormularioTotalizarFactura').append(nuevoInput);
            }
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

            multiplicar();
        }



        /*
        function cargarcosto() {
            var codigoProd = $("#codigoProd").val();
            var usuario_id = $("#usuario_id").val();

            $.ajax({
                type: "POST",
                url: "Ajax_PrecioProductoFacturaOrden.php",
                data: {
                    codigoProd: codigoProd,
                    usuario_id: usuario_id
                },
                success: function(response) {
                    $('#div-results-costo').html(response);
                }
            });
        };

        function agergarItem() {

            // estas son las variables que enviamos

            var codigoProd = $("#codigoProd").val();
            var cantidad = $("#cantidad").val();
            var valor = $("#valor").val();

            var usuario_id = $("#usuario_id").val();

            // aqui enviamos el mensaje por medio de un arreglo     

            $.ajax({
                type: "POST",
                url: "ajax_agregarItemOrden.php",
                data: {
                    codigoProd: codigoProd,
                    cantidad: cantidad,
                    usuario_id: usuario_id,
                    valor: valor
                },
                success: function(response) {
                    $('#div-results').html(response);

                    // aqui enviamos el mensaje por medio de un arreglo     



                }
            });
        };

        function eliminarItem() {

            // estas son las variables que enviamos

            var idOper = $("#idOper").val();

            var usuario_id = $("#usuario_id").val();

            // aqui enviamos el mensaje por medio de un arreglo     

            $.ajax({
                type: "POST",
                url: "eliminarItemOrden.php",
                data: {
                    idOper: idOper,
                    usuario_id: usuario_id
                },
                success: function(response) {
                    $('#div-results').html(response);

                    // aqui enviamos el mensaje por medio de un arreglo     



                }
            });
        };






        function listaItem() {

            // estas son las variables que enviamos

            var usuario_id = $("#usuario_id").val();

            // aqui enviamos el mensaje por medio de un arreglo     

            $.ajax({
                type: "POST",
                url: "listaItem.php",
                data: {
                    usuario_id: usuario_id
                },
                success: function(response) {
                    $('#div-results').html(response);

                    // aqui enviamos el mensaje por medio de un arreglo     



                }
            });
        };
        window.onload = listaItem;*/
    </script>
    <script>
        /* no quitar sirve para las retenciones*/
        /* no quitar sirve para las retenciones*/
        /* no quitar sirve para las retenciones*/
        $(document).on('focus', ".blur", function() {
            $(this).blur();
        });
        /* no quitar sirve para las retenciones*/
        /* no quitar sirve para las retenciones*/
        /* no quitar sirve para las retenciones*/
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
        $(document).ready(function() {
            const get = '<?= $_GET['iO'] ?>';
            console.log(get);
            if (get == null || get == '' || get == undefined || get == 'undefined') {
                const hay = '<?= funcionMaster('1', '1 and estado = 1 and tipo = 3 and id_cliente = ' . $id . ' and nOrden <> 0', 'count(id)', 'sDetalleOperPendites') ?>';
                if (hay > 0) {
                    const nOrden = '<?= funcionMaster('1', '1 and estado = 1 and tipo = 3 and id_cliente = ' . $id . ' and nOrden <> 0', 'nOrden', 'sDetalleOperPendites') ?>';
                    // hay orden pendientes
                    Swal.fire({
                        title: 'Existe una Orden de compra pendiente ¿Desea cargar los datos de la orden de compra #' + nOrden + '?',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonText: 'Sí',
                        cancelButtonText: 'No'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '<?= htmlentities($_SERVER['PHP_SELF']) ?>?id=<?= $id ?>&iO=' + nOrden;
                        } else {
                            window.location.href = '<?= htmlentities($_SERVER['PHP_SELF']) ?>?id=<?= $id ?>&iO=0';
                        }
                    });
                }
            }
        });
    </script>