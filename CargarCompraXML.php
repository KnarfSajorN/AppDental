<?php
include 'header.php';
include 'menu.php';

$id = $_GET['id'];
$usuarioId = $_GET['usuarioId'];

$ID_Usuario  =  $_SESSION['ID'];

if (isset($_POST['GuardarDetalleXML'])) {
    date_default_timezone_set('America/Bogota');


    // $Campo1 = mysqli_query($conn3, "show COLUMNS from sDetalleOperPendites WHERE Field = 'Impuesto_Numerico';");
    // $nrowCampo1 = mysqli_num_rows($Campo1);
    // if ($nrowCampo1 == "0") {
    //     mysqli_query($conn3, "ALTER TABLE `sDetalleOperPendites` ADD `Impuesto_Numerico` TEXT NULL  COMMENT 'valor numerico del impuesto *Creado desde modulo de CompraXML*';");
    // }

    // $Campo1 = mysqli_query($conn3, "show COLUMNS from sDetalleOperPendites WHERE Field = 'Impuesto_Textual';");
    // $nrowCampo1 = mysqli_num_rows($Campo1);
    // if ($nrowCampo1 == "0") {
    //     mysqli_query($conn3, "ALTER TABLE `sDetalleOperPendites` ADD `Impuesto_Textual` TEXT NULL   COMMENT 'valor Original del impuesto *Creado desde modulo de CompraXML*';");
    // }

    // $Campo1 = mysqli_query($conn3, "show COLUMNS from sDetalleOperPendites WHERE Field = 'Total';");
    // $nrowCampo1 = mysqli_num_rows($Campo1);
    // if ($nrowCampo1 == "0") {
    //     mysqli_query($conn3, "ALTER TABLE `sDetalleOperPendites` ADD `Total` TEXT NULL   COMMENT 'total con impuesto *Creado desde modulo de CompraXML*';");
    // }



    // $Campo1 = mysqli_query($conn3, "show COLUMNS from sDetalleOper WHERE Field = 'Impuesto_Numerico';");
    // $nrowCampo1 = mysqli_num_rows($Campo1);
    // if ($nrowCampo1 == "0") {
    //     mysqli_query($conn3, "ALTER TABLE `sDetalleOper` ADD `Impuesto_Numerico` TEXT NULL  COMMENT 'valor numerico del impuesto *Creado desde modulo de CompraXML*';");
    // }

    // $Campo1 = mysqli_query($conn3, "show COLUMNS from sDetalleOper WHERE Field = 'Impuesto_Textual';");
    // $nrowCampo1 = mysqli_num_rows($Campo1);
    // if ($nrowCampo1 == "0") {
    //     mysqli_query($conn3, "ALTER TABLE `sDetalleOper` ADD `Impuesto_Textual` TEXT NULL   COMMENT 'valor Original del impuesto *Creado desde modulo de CompraXML*';");
    // }

    // $Campo1 = mysqli_query($conn3, "show COLUMNS from sDetalleOper WHERE Field = 'Total';");
    // $nrowCampo1 = mysqli_num_rows($Campo1);
    // if ($nrowCampo1 == "0") {
    //     mysqli_query($conn3, "ALTER TABLE `sDetalleOper` ADD `Total` TEXT NULL   COMMENT 'total con impuesto *Creado desde modulo de CompraXML*';");
    // }

    $Deposito_id = $_POST['dep'];
    $archivo_xml = $_POST['archivo_xml'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_FILES['archivo_xml']) && $_FILES['archivo_xml']['error'] === UPLOAD_ERR_OK) {
            // Ruta donde se almacenará el archivo temporalmente
            $archivo_temporal = $_FILES['archivo_xml']['tmp_name'];
    
            // Cargar y analizar el archivo XML
            $xml = simplexml_load_file($archivo_temporal);
    
            
            //$xml = simplexml_load_file('ejemplo.xml');

            if ($xml) {
                // Acceder al fragmento XML dentro de la sección CDATA en <comprobante>
                $comprobanteCDATA = $xml->comprobante;

                if ($comprobanteCDATA) {
                    // Parsear el XML contenido en la sección CDATA
                    $comprobanteXML = simplexml_load_string($comprobanteCDATA);

                    if ($comprobanteXML) {
                        // Acceder a los elementos <detalle> dentro de <detalles>
                        foreach ($comprobanteXML->infoTributaria as $detalleinfo) {
                            // Acceder a la etiqueta <codigoPrincipal> en cada detalle
                            $RUC = (string) $detalleinfo->ruc;
                            // Puedes hacer algo con el valor de <codigoPrincipal> aquí
                            //echo "RUC: $RUC  <br>";
                        }

                        foreach ($comprobanteXML->detalles->detalle as $detalle) {
                            // Acceder a la etiqueta <codigoPrincipal> en cada detalle
                            $codigoPrincipal = (string) $detalle->codigoPrincipal;
                            $cantidadDetalle = (int) $detalle->cantidad;
                            $PrecioDetalle = (float) $detalle->precioUnitario;
                            $descuentoDetalle = (float) $detalle->descuento;

                            // Acceder al elemento <detAdicionalLote_Vence> dentro del contexto del detalle actual
                            $detAdicionalLote_Vence = $detalle->detallesAdicionales->detAdicional;

                            $valorLoteVence="";
                            $valorLote_1="";
                            $valorFechaVence_1="";

                            foreach ($detAdicionalLote_Vence as $detAdicional) {
                                // Verificar si el atributo "nombre" es igual a "detAdicionalLote_Vence"
                                if ((string) $detAdicional['nombre'] === 'detAdicionalLote_Vence') {
                                    // Acceder al valor del atributo "valor" del elemento encontrado
                                    $valorLoteVence = (string) $detAdicional['valor'];
                                    //echo "Valor de detAdicionalLote_Vence: $valorLoteVence";
                                }

                                if ((string) $detAdicional['nombre'] === 'LOTE/REG.SAN') {
                                    // Acceder al valor del atributo "valor" del elemento encontrado
                                    $valorLote_1 = (string) $detAdicional['valor'];
                                    //echo "Valor de detAdicionalLote_Vence: $valorLoteVence";
                                }
                                if ((string) $detAdicional['nombre'] === 'CADUCA') {
                                    // Acceder al valor del atributo "valor" del elemento encontrado
                                    $valorFechaVence_1 = (string) $detAdicional['valor'];

                                    $FechaVence = explode("/", $valorFechaVence_1);

                                    $valorFechaVence_1 = "01/".$FechaVence[0]."/20".$FechaVence[1];
                                    //echo "Valor de detAdicionalLote_Vence: $valorLoteVence";
                                }
                                
                            }
                            
                            if($valorLote_1!="" AND $valorFechaVence_1 !=""){
                                $valorLoteVence=$valorLote_1."_".$valorFechaVence_1;   
                            }

                            // Puedes hacer algo con el valor de <codigoPrincipal> aquí
                            //echo "Código Principal: $codigoPrincipal - Cantidad: $cantidadDetalle - Precio: $PrecioDetalle <br>";

                            $ArregloDatosDetallesXML[] = array(
                                "Codigo" => $codigoPrincipal,
                                "Cantidad" => $cantidadDetalle,
                                "Precio" => $PrecioDetalle,
                                "Descuento" => $descuentoDetalle,
                                "Lote" => $valorLoteVence
                            );
                        }
                    } else {
                        echo "Error al cargar y procesar el XML contenido en CDATA.";
                    }
                } 
            } else {
                echo "Error al cargar el archivo XML.";
            }

        } 
    } 

    /////////////////////////////////////////////////////////////////////////////////////////
    
    /*
    echo "<pre>";
    print_r($ArregloDatosDetallesXML);
    echo "</pre>";
    */
    //exit();

    $QueryProveedor = mysqli_query($conn3, "SELECT * FROM  sproveedores where (usuario_id = '{$_SESSION['ID']}' or usuario_id = '{$_SESSION['ID_principal']}') and rut = '$RUC'");
    $NrowProveedor = mysqli_num_rows($QueryProveedor);
    if($NrowProveedor==0){
        echo "<script>alert('Proveedor No Existe Porfavor Crearlo');window.location='proveedores';</script>";
    }else{
        while ($RowProveedor = mysqli_fetch_array($QueryProveedor)) {
            $ID_Empresa = $RowProveedor['id'];
        }
    }

    //echo $ID_Empresa;
    
    foreach ($ArregloDatosDetallesXML as $key => $value) {
        $Referencia = $value["Codigo"];
        $queryList = mysqli_query($conn3, "SELECT * FROM  sinvetrios where (usuario_id='{$_SESSION['ID']}' or usuario_id='{$_SESSION['ID_principal']}') and referencia = '$Referencia' AND estado = 1 ");
        $nrowproducto = mysqli_num_rows($queryList);
        if($nrowproducto==0){
            echo "<script>alert('Producto con esa Referencia no Existe [$Referencia]');window.location='IN_Inventario';</script>";
        }
    }

    $idOperacion = 0;
    $fechaRegistro = date("Y-m-d H:i:s");
    $usuario_id = $_POST['usuario_id'];
    $tipo_historia = $_POST['tipo_historia'];
    $historia = $_POST['historia'];

    //exit();
    

    foreach ($ArregloDatosDetallesXML as $key => $value) {
        
        $Referencia = $value["Codigo"];
        
        $ID="";
        $tipo="";
        $iva="";
        $queryList = mysqli_query($conn3, "SELECT * FROM  sinvetrios where (usuario_id='{$_SESSION['ID']}' or usuario_id='{$_SESSION['ID_principal']}') and referencia = '$Referencia' AND estado = 1 ");
        $nrowproducto = mysqli_num_rows($queryList);
        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
            $ID = $rowMotorizado['ID'];
            $tipo = $rowMotorizado['tipo'];
            $iva = $rowMotorizado['iva'];
        }
        if($nrowproducto==0){
            echo "<script>alert('Producto con esa Referencia no Existe [$Referencia]');window.location='IN_Inventario';</script>";
        }
        $TipoInventario = funcionMaster($tipo, 'id', 'tipo', 'scategoria');

        

        $codigoProd = $ID;

        $cantidad = $value['Cantidad'];

        $descripcion = mysqli_real_escape_string($conn3, funcionMaster($codigoProd, 'ID', 'descripcion', 'sinvetrios'));
        $base = $value["Precio"];
        $impuesto = 0;

        
        

        $descuento_base = $value["Descuento"];

        $totalbase = round($base * $cantidad,2);

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

        
        $Deposito_id = $_POST['dep'];
        $SinvDep_id="";
        if($TipoInventario=="5"){

            // Dividir el valor en fecha y lote utilizando explode
            $partes = explode("_", $value["Lote"]);
            $Lote = $partes[0]; // La primera parte es la fecha
            $Fecha = date("Y-m-d", strtotime(str_replace("/", "-",$partes[1]))); // La segunda parte es el lote
        
            //echo "SELECT * FROM SinvDep WHERE idSinvetrios = $codigoProd AND idDep = $Deposito_id AND fechaVencimiento = '$Fecha' AND lote ='$Lote' LIMIT 1";
            $QueryProductoLoteTallas = mysqli_query($conn3, "SELECT * FROM SinvDep WHERE idSinvetrios = $codigoProd AND idDep = $Deposito_id AND fechaVencimiento = '$Fecha' AND lote ='$Lote' LIMIT 1");
            $NrowLote = mysqli_num_rows($QueryProductoLoteTallas);
            while ($RowProducto = mysqli_fetch_array($QueryProductoLoteTallas)) {
                $SinvDep_id = $RowProducto['id'];
            }
            if($NrowLote==0){
                //exit();
                echo "<script>alert('Error no existe lote para este inventario [Lote: {$Lote}] [Fecha Vencimient: {$Fecha}], crearlo con los datos de lote y fecha de vencimiento iguales a los enviados por el XML');window.history.back();</script>";
                /*
                $QueryProductoLoteTallas1 = mysqli_query($conn3, "SELECT * FROM SinvDep WHERE idSinvetrios = $codigoProd AND idDep = $Deposito_id ORDER BY id DESC LIMIT 1");
                $NrowLote1 = mysqli_num_rows($QueryProductoLoteTallas1);
                while ($RowProducto1 = mysqli_fetch_array($QueryProductoLoteTallas1)) {
                    $SinvDep_id = $RowProducto1['id'];
                }
                if($NrowLote1==0){
                    echo "<script>alert('Error no existe lote para este inventario');window.history.back();</script>";
                }
                */
            }
        }else if($TipoInventario=="1"){
            $QueryProductoLoteTallas = mysqli_query($conn3, "SELECT * FROM  SinvDep where idSinvetrios = $codigoProd AND idDep = $Deposito_id LIMIT 1");
            $nrowl = mysqli_num_rows($QueryProductoLoteTallas);
            while ($RowProducto = mysqli_fetch_array($QueryProductoLoteTallas)) {
                $SinvDep_id = $RowProducto['id'];
            }
        }
            
        
        //$SinvDep_id = $_POST['SinvDep_id'];

        

        $subTotal = round($valor_calculado,2);

        ////////////////////apartado iva
        if($iva!="" AND $iva != "0") {
        // Calcular el monto del IVA
        $ivaMonto = round((($subTotal * $iva) / 100),2);

        // Sumar el monto del IVA al subtotal
        $totalConIva = round($subTotal + $ivaMonto,2);
        }else{
          $iva=0;
          $ivaMonto=0;
          $totalConIva = $subTotal;  
        }

        
        $queryList = mysqli_query($conn3, "INSERT INTO sDetalleOperPendites (idOperacion, fechaRegistro, idProducto, cantidad, descripcion, base, impuesto, totalbase, 
        subTotal, id_usuario, id_cliente,Descuento_Numerico,Descuento_Textual,ID_Empresa,tipo,SinvDep_id,Deposito_id,Impuesto_Numerico,Impuesto_Textual,Total) VALUES ('$idOperacion','$fechaRegistro', '$codigoProd','$cantidad','$descripcion','$base',
        '$impuesto', '$totalbase', '$subTotal', '$usuario_id', '$ID_Empresa','$descuento_final','$descuento_base','$ID_Empresa','3','$SinvDep_id','$Deposito_id','$ivaMonto','$iva','$totalConIva');") or die(mysqli_error($conn3));
        

    }
    
    $ruta = htmlentities($_SERVER['PHP_SELF']);
    echo "<script language='Javascript'>window.location='SgenerarOrdenC.php?id={$ID_Empresa}'</script>";
}


if (isset($_GET['borrar'])) {
    $id = $_GET['borrar'];
    $historiaClinica1 = $_GET['historiaClinica1'];
    $tipo_historia  = $_GET['tipo_historia'];


    mysqli_query($conn3, "UPDATE sDetalleOperPendites set estado = 0 WHERE id = '{$id}' limit 1;");

    $id = $_GET["id"];
    $ruta = htmlentities($_SERVER['PHP_SELF']);
    echo "<script language='Javascript'>window.location='{$ruta}?id={$id}&error=Se Borro el Producto'</script>";
}






$queryList = mysqli_query($conn3, "SELECT * FROM  config where (ID_Usuario = $ID or ID_Usuario = '{$_SESSION['ID_principal']}')");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $moneda = $rowMotorizado['moneda'];
    $impuestoF = $rowMotorizado['impuestoF'];
}

$queryList = mysqli_query($conn3, "SELECT * FROM  sproveedores where (usuario_id = '{$_SESSION['ID']}' or usuario_id = '{$_SESSION['ID_principal']}') and id = '$id'");
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
$Deposito_id="0";
$resultado = mysqli_query($conn3, "SELECT * FROM  sDetalleOperPendites where estado = 1 and  (id_usuario =$ID or id_usuario ='{$_SESSION['ID_principal']}') and  id_cliente = $id_proveedor AND tipo = '3' order by id");

if ($resultado) {
    while ($fila = mysqli_fetch_array($resultado)) {
    $Deposito_id=$fila["Deposito_id"];
    }
}

if($Deposito_id!="0" AND $Deposito_id!=""){
    $DesabilitarDep="readonly";
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////



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







                                <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?id=<?php echo $id; ?>" method="POST" name="formularioActualizarcliente" enctype="multipart/form-data">
                                    <div class="form-row">



                                    <div class="form-group col-md-12">
                                        <label><strong> Depósito</strong></label>
                                        <select class="input-lg form-control" name="dep" id="deposito" onchange="ActualizacionDeposito()" <?=$DesabilitarDep;?> required>
                                        <?php
                                        $queryListDP = mysqli_query($conn3, "SELECT * from dep WHERE (usuario_id = '{$_SESSION['ID']}' or usuario_id = '{$_SESSION['ID_principal']}') and activo = 1 ORDER BY id ASC");
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
                                        <div class="form-group col-md-12">
                                            <div align="left">
                                                <label>Archivo XML</label>
                                            </div>

                                            <input type="file" name="archivo_xml" id="archivo_xml" accept=".xml">
                                            <div align="left">
                                                <label style="color:red;">*Para que se carguen los datos deberá estar creado en el sistema el proveedor con el rut, los productos con su correspondiente código de referencia, si es un producto con lote deberá llevar el mismo lote y fecha de vencimiento, además si el xml es de un proveedor diferente al que está actualmente en la página al cargar los datos redirigirá a la pestaña de la compra del proveedor que estaba en el xml*</label>
                                            </div>
                                        </div>
                                    </div>

                                        <div class="form-group col-md-12" align="center">
                                            <center><button type="submit" class="btn btn-block btn-outline-info rounded-pill shadow m-1" name="GuardarDetalleXML">Guardar</button></center>
                                        </div>


                                        <input type="hidden" name="usuario_id" value="<?php echo $_SESSION['ID'] ?>">
                                        <input type="hidden" name="ID_Empresa" value="<?php echo $id ?>">
                                        <input type="hidden" name="historia" value="<?php echo $historiaClinica1 ?>">
                                        <input type="hidden" name="tipo_historia" value="<?php echo $tipo_historia ?>">

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
                                            <th>Descripción del producto</th>

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
                                            $ImpuestoDetalles=0;

                                            $resultado = mysqli_query($conn3, "SELECT * FROM  sDetalleOperPendites where estado = 1 and (id_usuario =$ID or id_usuario ='{$_SESSION['ID_principal']}') and  id_cliente = $id AND tipo = 3 order by id");
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
                                                $MasDetalles = ConsultarMasInformacion_Facturacion_Funcion($idProductoT,$SinvDep_id);
                                                if($MasDetalles!=""){
                                                    $Descripcion .= $MasDetalles;
                                                }

                                                echo '     <tr>
                                                <td  width="5%">' . $Numero . ' </td>
                                                <td width="30%">' . $Descripcion . ' </td>
                                                <td width="10%"><div align="Right">' . $fila['base'] . '' . $moneda . '</div></td>
                                                <td width="5%"><div align="Right">' . $fila['cantidad'] . '</div></td>
                                                <td width="10%"><div align="center">' . $descuentoValor . '' . $moneda . '</div></td>
                                                <td width="10%"><div align="Right">' . $fila['subTotal'] . '' . $moneda . '</div></td>';

                                                echo "<td width='1%'><a href={$ruta}?id={$id}&tipo_historia{$tipo_historia}=&historiaClinica1={$historiaClinica1}&borrar={$fila['id']}><i class='fa fa-trash' style='color:red'></i> </a></td>";

                                                echo '</tr>';

                                                $totalCant += $fila['cantidad'];
                                                $totalBase +=  $fila['base'];
                                                $total += $fila['subTotal'];

                                                $totaldesc += $descuentoValor;

                                                $ImpuestoDetalles += $fila['Impuesto_Numerico'];
                                                $totalFinal = $total;
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
                                                <div align="center"><?php echo $totaldesc . ' ' . $moneda; ?> </div>
                                            </th>
                                            <th>
                                                <div align="Right"><?php echo $total . ' ' . $moneda; ?> </div>
                                            </th>
                                            <th> </th>

                                        </tr>

                                        <?php
                                        //if ($impuestoF > 0) {
                                        //    $impuestoF2 = $impuestoF / 100;
                                        //    $total1 =  $total * $impuestoF2;
                                        //    $total =  $total1 + $total;
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
                        </div>
                    </div>

                    <?php
                    $ID = $_SESSION['ID'];
                    //tipo 3 -> ordenes de compra
                    $resultado = mysqli_query($conn3, "SELECT * FROM sDetalleMetodosPagos WHERE (id_usuario = $ID or id_usuario = '{$_SESSION['ID_principal']}') AND id_cliente = $clienteId AND idOperacion = 0 AND tipo = '3' ");
                    $MontoPagadoDetalle = 0;
                    if ($resultado) {
                        while ($fila = mysqli_fetch_array($resultado)) {
                            $MontoPagadoDetalle = $MontoPagadoDetalle + $fila['nota_pago'];
                        }   
                    }

                    $MontoDebe = round($total - $MontoPagadoDetalle, 2);
                    // echo "El total es: " . $totalMet;
                    ?>




                    <!--
                    <div class="col-md-12">
                        <form action="guardarDetalleMetodo.php" method="POST" name="formularioActualizarcliente">
                            <div class="form-row">

                                <div class="form-group col-md-3">

                                    <input type="hidden" class="form-control input-lg" id="id_usuario" name="id_usuario" placeholder="id_usuario" value="<?php echo  $id_usuario ?>">
                                    <label>Método de pago</label>
                                    <select id="metodo_pago" name="metodo_pago" class="form-control input-lg select" style="width: 100%;" required>
                                        <option value="">Seleccione...</option>
                                        <option value="Efectivo">Efectivo</option>
                                        <option value="Crédito">Crédito</option>
                                        <option value="Cheque">Cheque</option>
                                        <option value="Transferencia Bancaria">Transferencia Bancaria</option>
                                    </select>

                                    <label>Monto</label>
                                    <input type="number" id="nota_pago" name="nota_pago" placeholder="Monto" class="form-control input-lg" step="0.01" max="<?= round($MontoDebe, 2); ?>"><br>
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
                                        $resultado = mysqli_query($conn3, "SELECT * FROM sDetalleMetodosPagos WHERE (id_usuario = $ID or id_usuario = '{$_SESSION['ID_principal']}') AND ID_Empresa = $id AND idOperacion = 0 AND tipo = '3' ");
                                        $check = mysqli_num_rows($resultado);
                                        $totalMet = 0;

                                        while ($fila = mysqli_fetch_array($resultado)) {
                                            $Numero++;
                                            $ruta = htmlentities($_SERVER['PHP_SELF']);

                                            echo '<tr>
                                                <td>' . $Numero . '</td>
                                                <td>' . $fila[5] . '</td>
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

                        <form action="totalizarFactura.php" method="POST" name="formularioActualizarcliente" class="col-md-6" id="FormularioTotalizarFactura">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label> Restante por pagar </label>
                                    <input type="number" name="montoPagado" placeholder="Monto Pagado" class="form-control input-lg" step="any" value="<?= $total - $totalMet; ?>" required readonly> <br>

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
                                <input type="hidden" name="Deposito_id" id="Deposito_id" value="<?php echo $Deposito_id;?>">

                                <input type="hidden" name="tipo_cliente" valur="1">
                                <input type="hidden" name="tipo" value="3">
                                <input type="hidden" name="id_cliente" value="0">

                            </div>
                        </form>
                    -->
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
        $(document).on('focus', ".blur", function() {
            $(this).blur();
        });
    </script>

    









