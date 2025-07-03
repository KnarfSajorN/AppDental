<?php
include 'header.php';
include 'menu.php';

$clienteId = $_GET['clienteId'];
$usuarioId = $_GET['usuarioId'];
$historiaClinica1 = $_GET['historiaClinica1'];
$tipo_historia = $_GET['tipo_historia'];

$ID_Usuario = $_SESSION['ID'];
$ID_UsuarioP = $_SESSION['ID_principal'];


$_POST = DatosIngresarMysqli($_POST);

if (isset($_POST['GuardarDetalleOrden'])) {
    date_default_timezone_set('America/Bogota');

    $Campo1 = mysqli_query($conn3, "show COLUMNS from sDetalleOperPendites WHERE Field = 'Descuento_Numerico';");
    // $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `sDetalleOperPendites` ADD `Descuento_Numerico` TEXT NULL DEFAULT '0'  COMMENT 'valor numerico del descuento *Creado desde modulo de factura*';");
    }

    $Campo1 = mysqli_query($conn3, "show COLUMNS from sDetalleOperPendites WHERE Field = 'Descuento_Textual';");
    // $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `sDetalleOperPendites` ADD `Descuento_Textual` TEXT NULL DEFAULT '0'  COMMENT 'valor Original del descuento *Creado desde modulo de factura*';");
    }

    $Campo1 = mysqli_query($conn3, "show COLUMNS from sDetalleOper WHERE Field = 'Descuento_Numerico';");
    // $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `sDetalleOper` ADD `Descuento_Numerico` TEXT NULL DEFAULT '0'  COMMENT 'valor numerico del descuento *Creado desde modulo de factura*';");
    }

    $Campo1 = mysqli_query($conn3, "show COLUMNS from sDetalleOper WHERE Field = 'Descuento_Textual';");
    // $nrowCampo1 = mysqli_num_rows($Campo1);
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
    $cliente_id = $_POST['cliente_id'];
    $tipo_historia = $_POST['tipo_historia'];
    $historia = $_POST['historia'];

    $descuento_base = $_POST['descuento'];

    $totalbase = round($base * $cantidad, 2);

    $SinvDep_id = $_POST['SinvDep_id'];
    $Deposito_id = $_POST['dep'];

    if (strpos($descuento_base, '%') !== false) {

        $descuentos = str_replace("%", "", "$descuento_base");
        $descuentos = ($descuentos / 100);
        $descuento_final = round(($totalbase * $descuentos), 2);
        //echo "porcentaje";
    } else {
        $descuento_final = $descuento_base;
        //echo "numerico";
    }

    $valor_calculado = round($totalbase - $descuento_final, 2);

    if ("$valor_calculado" != "$subTotal") {
        $subtotal = round($totalbase - $descuento_final, 2);
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
        $totalConIva = round($subTotal, 2);
    }
    //////////////////////////////////


    $queryList = mysqli_query($conn3, "INSERT INTO sDetalleOperPendites (idOperacion, fechaRegistro, idProducto, cantidad, descripcion, base, impuesto, totalbase,
  subTotal, id_usuario, id_cliente,Descuento_Numerico,Descuento_Textual,tipo,SinvDep_id,Deposito_id,Impuesto_Numerico,Impuesto_Textual,Total) VALUES ('$idOperacion','$fechaRegistro', '$codigoProd','$cantidad','$descripcion','$base',
  '$impuesto', '$totalbase', '$subTotal', '$usuario_id', '$cliente_id','$descuento_final','$descuento_base','1','$SinvDep_id','$Deposito_id','$ivaMonto','$iva','$totalConIva');") or die(mysqli_error($conn3));


    $ruta = htmlentities($_SERVER['PHP_SELF']);
    $ruta = str_replace('.php', '', $ruta);
    if ($queryList != true) {
        echo "<script language='Javascript'> window.location='{$ruta}?clienteId={$cliente_id}&tipo_historia=$tipo_historia&historiaClinica1=$historia&error=Hubo Un Error Al Guardar Los Datos $Mensaje '</script>";
    } else {
        echo "<script language='Javascript'> window.location='{$ruta}?clienteId={$cliente_id}&tipo_historia=$tipo_historia&historiaClinica1=$historia&msg=Se Guardaron Los Datos Correctamente $Mensaje '</script>";
    }
}


if (isset($_GET['borrar'])) {
    $id = $_GET['borrar'];
    $historiaClinica1 = $_GET['historiaClinica1'];
    $tipo_historia = $_GET['tipo_historia'];


    mysqli_query($conn3, "UPDATE sDetalleOperPendites set estado = 0 WHERE id = '{$id}' limit 1;");

    $clienteId = $_GET["clienteId"];
    $ruta = htmlentities($_SERVER['PHP_SELF']);
    $ruta = str_replace('.php', '', $ruta);
    echo "<script language='Javascript'>window.location='{$ruta}?clienteId={$clienteId}&tipo_historia{$tipo_historia}=&historiaClinica1={$historiaClinica1}&error=Se Borro el Producto'</script>";
}


if (isset($_POST['GuardarDetallePaquete'])) {



    $Campo1 = mysqli_query($conn3, "show COLUMNS from sDetalleOperPendites WHERE Field = 'PaqueteProcedimiento_id';");
    // $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `sDetalleOperPendites` ADD `PaqueteProcedimiento_id` INT(11) NULL DEFAULT '0'  COMMENT 'este campo es el id de la tabla ES_Paquete_Procedimientos *Creado desde modulo de factura*';");
    }

    $Campo1 = mysqli_query($conn3, "show COLUMNS from sDetalleOper WHERE Field = 'PaqueteProcedimiento_id';");
    // $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `sDetalleOper` ADD `PaqueteProcedimiento_id` INT(11) NULL DEFAULT '0'  COMMENT 'este campo es el id de la tabla ES_Paquete_Procedimientos *Creado desde modulo de factura*';");
    }

    date_default_timezone_set('America/Bogota');

    $Paquete = $_POST["Paquete"];
    $Deposito_id = $_POST['deposito_paquete'];

    $usuario_id = $_POST['usuario_id'];
    $cliente_id = $_POST['cliente_id'];
    $tipo_historia = $_POST['tipo_historia'];
    $historia = $_POST['historia'];

    $queryListPaquetes = mysqli_query($conn3, "SELECT * FROM  ES_Paquete_Procedimientos where paquete_id =$Paquete and Activo='1' ");
    while ($row_recordset32 = mysqli_fetch_array($queryListPaquetes)) {
        $procedimiento_id = $row_recordset32["id"];
        $idOperacion = 0;
        $fechaRegistro = date("Y-m-d H:i:s");
        $codigoProd = $row_recordset32["inventario_id"];
        $cantidad = $row_recordset32['Numerosesiones'];
        $precio = $row_recordset32['Precio'];

        $descripcion = mysqli_real_escape_string($conn3, funcionMaster($codigoProd, 'ID', 'descripcion', 'sinvetrios'));
        $base = round(($precio / $cantidad), 2);
        $impuesto = 0;

        $subTotal = $precio;


        $descuento_base = "0";

        $totalbase = round($base * $cantidad, 2);

        $TipoProducto = funcionMaster($codigoProd, 'ID', 'tipo', 'sinvetrios');
        $ClasificacionTipo = funcionMaster($TipoProducto, 'id', 'tipo', 'scategoria');


        $SinvDep_id = "0";
        $QueryInvDep = mysqli_query($conn3, "SELECT * FROM  SinvDep where idDep = $Deposito_id AND idSinvetrios = '$codigoProd'");
        while ($RowInvDep = mysqli_fetch_array($QueryInvDep)) {
            $SinvDep_id = $RowInvDep['id'];
        }

        if (strpos($descuento_base, '%') !== false) {

            $descuentos = str_replace("%", "", "$descuento_base");
            $descuentos = ($descuentos / 100);
            $descuento_final = round(($totalbase * $descuentos), 2);
            //echo "porcentaje";
        } else {
            $descuento_final = $descuento_base;
            //echo "numerico";
        }

        $valor_calculado = round($totalbase - $descuento_final, 2);

        if ("$valor_calculado" != "$subTotal") {
            $subtotal = round($totalbase - $descuento_final, 2);
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
            $totalConIva = round($subTotal, 2);
        }
        //////////////////////////////////


        if ($ClasificacionTipo == "1" or $ClasificacionTipo == "2") {
            $queryList = mysqli_query($conn3, "INSERT INTO sDetalleOperPendites (idOperacion, fechaRegistro, idProducto, cantidad, descripcion, base, impuesto, totalbase,
      subTotal, id_usuario, id_cliente,Descuento_Numerico,Descuento_Textual,tipo,PaqueteProcedimiento_id,Tipo_Producto,SinvDep_id,Deposito_id,Impuesto_Numerico,Impuesto_Textual,Total) VALUES ('$idOperacion','$fechaRegistro', '$codigoProd','$cantidad','$descripcion','$base',
      '$impuesto', '$totalbase', '$subTotal', '$usuario_id', '$cliente_id','$descuento_final','$descuento_base','1','$procedimiento_id','Inventario_Paquete','$SinvDep_id','$Deposito_id','$ivaMonto','$iva','$totalConIva');") or die(mysqli_error($conn3));
            //echo "INSERT INTO sDetalleOperPendites (idOperacion, fechaRegistro, idProducto, cantidad, descripcion, base, impuesto, totalbase, subTotal, id_usuario, id_cliente,Descuento_Numerico,Descuento_Textual) VALUES ('$idOperacion','$fechaRegistro', '$codigoProd','$cantidad','$descripcion','$base','$impuesto', '$totalbase', '$subTotal', '$usuario_id', '$cliente_id','$descuento_final','$descuento_base');";
        }
    }






    $ruta = htmlentities($_SERVER['PHP_SELF']);
    $ruta = str_replace('.php', '', $ruta);
    if ($queryList != true) {
        echo "<script language='Javascript'> window.location='{$ruta}?clienteId={$cliente_id}&tipo_historia=$tipo_historia&historiaClinica1=$historia&error=Hubo Un Error Al Guardar Los Datos $Mensaje '</script>";
    } else {
        echo "<script language='Javascript'> window.location='{$ruta}?clienteId={$cliente_id}&tipo_historia=$tipo_historia&historiaClinica1=$historia&msg=Se Guardaron Los Datos Correctamente $Mensaje '</script>";
    }
}



if (isset($_POST['GuardarDetalleServiciosEmpresaAfiliada'])) {


    $Campo1 = mysqli_query($conn3, "show COLUMNS from sDetalleOperPendites WHERE Field = 'Servicio_EmpresaAfiliadas_id';");
    // $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `sDetalleOperPendites` ADD `Servicio_EmpresaAfiliadas_id` INT(11) NULL DEFAULT '0'  COMMENT 'este campo es el id de la tabla empresasAfiliadas_Servicios *Creado desde modulo de factura*';");
    }

    $Campo1 = mysqli_query($conn3, "show COLUMNS from sDetalleOper WHERE Field = 'Servicio_EmpresaAfiliadas_id';");
    // $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `sDetalleOper` ADD `Servicio_EmpresaAfiliadas_id` INT(11) NULL DEFAULT '0'  COMMENT 'este campo es el id de la tabla empresasAfiliadas_Servicios *Creado desde modulo de factura*';");
    }

    date_default_timezone_set('America/Bogota');

    $ProductoEmpresaAfiliada = $_POST["ProductoEmpresaAfiliada"];
    $Deposito_id = $_POST['deposito_SaludOcupacional'];

    $usuario_id = $_POST['usuario_id'];
    $cliente_id = $_POST['cliente_id'];
    $tipo_historia = $_POST['tipo_historia'];
    $historia = $_POST['historia'];

    $cantidad = $_POST['cantidad'];


    $queryListPaquetes = mysqli_query($conn3, "SELECT * FROM  empresasAfiliadas_Servicios where id = $ProductoEmpresaAfiliada and Activo='1' ");
    while ($row_recordset32 = mysqli_fetch_array($queryListPaquetes)) {
        $Servicio_EmpresaAfiliadas_id_1 = $row_recordset32["id"];
        $idOperacion = 0;
        $fechaRegistro = date("Y-m-d H:i:s");
        $codigoProd = $row_recordset32["inventario_id"];
        $precio = $row_recordset32['Precio'];

        $descripcion = mysqli_real_escape_string($conn3, funcionMaster($codigoProd, 'ID', 'descripcion', 'sinvetrios'));
        $base = $precio;
        $impuesto = 0;




        $descuento_base = "0";

        $totalbase = round($base * $cantidad, 2);
        $subTotal = $totalbase;

        $TipoProducto = funcionMaster($codigoProd, 'ID', 'tipo', 'sinvetrios');
        $ClasificacionTipo = funcionMaster($TipoProducto, 'id', 'tipo', 'scategoria');


        $SinvDep_id = "0";
        $QueryInvDep = mysqli_query($conn3, "SELECT * FROM  SinvDep where idDep = $Deposito_id AND idSinvetrios = '$codigoProd'");
        while ($RowInvDep = mysqli_fetch_array($QueryInvDep)) {
            $SinvDep_id = $RowInvDep['id'];
        }

        if (strpos($descuento_base, '%') !== false) {

            $descuentos = str_replace("%", "", "$descuento_base");
            $descuentos = ($descuentos / 100);
            $descuento_final = round(($totalbase * $descuentos), 2);
            //echo "porcentaje";
        } else {
            $descuento_final = $descuento_base;
            //echo "numerico";
        }

        $valor_calculado = round($totalbase - $descuento_final, 2);

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
            $totalConIva = round($subTotal, 2);
        }
        //////////////////////////////////

        if ($ClasificacionTipo == "1" or $ClasificacionTipo == "2") {
            $queryList = mysqli_query($conn3, "INSERT INTO sDetalleOperPendites (idOperacion, fechaRegistro, idProducto, cantidad, descripcion, base, impuesto, totalbase,
      subTotal, id_usuario, id_cliente,Descuento_Numerico,Descuento_Textual,tipo,Servicio_EmpresaAfiliadas_id,Tipo_Producto,SinvDep_id,Deposito_id,Impuesto_Numerico,Impuesto_Textual,Total) VALUES ('$idOperacion','$fechaRegistro', '$codigoProd','$cantidad','$descripcion','$base',
      '$impuesto', '$totalbase', '$subTotal', '$usuario_id', '$cliente_id','$descuento_final','$descuento_base','1','$Servicio_EmpresaAfiliadas_id_1','Inventario_Empresa_Afiliada','$SinvDep_id','$Deposito_id','$ivaMonto','$iva','$totalConIva');") or die(mysqli_error($conn3));
            //echo "INSERT INTO sDetalleOperPendites (idOperacion, fechaRegistro, idProducto, cantidad, descripcion, base, impuesto, totalbase, subTotal, id_usuario, id_cliente,Descuento_Numerico,Descuento_Textual) VALUES ('$idOperacion','$fechaRegistro', '$codigoProd','$cantidad','$descripcion','$base','$impuesto', '$totalbase', '$subTotal', '$usuario_id', '$cliente_id','$descuento_final','$descuento_base');";
        }
    }









    $ruta = htmlentities($_SERVER['PHP_SELF']);
    $ruta = str_replace('.php', '', $ruta);
    if ($queryList != true) {
        echo "<script language='Javascript'> window.location='{$ruta}?clienteId={$cliente_id}&tipo_historia=$tipo_historia&historiaClinica1=$historia&error=Hubo Un Error Al Guardar Los Datos $Mensaje '</script>";
    } else {
        echo "<script language='Javascript'> window.location='{$ruta}?clienteId={$cliente_id}&tipo_historia=$tipo_historia&historiaClinica1=$historia&msg=Se Guardaron Los Datos Correctamente $Mensaje '</script>";
    }
}



$queryList = mysqli_query($conn3, "SELECT * FROM config where (ID_Usuario = '{$_SESSION['ID']}' or ID_Usuario = '{$_SESSION['ID_principal']}')");
// $nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $moneda = $rowMotorizado['moneda'];
    $impuestoF = $rowMotorizado['impuestoF'];
}

$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id=$clienteId");
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $nombre_cliente = $rowMotorizado['nombre_cliente'];
    $CODI_CLIENTE = $rowMotorizado['CODI_CLIENTE'];

    $empresaAfiliada_id = $rowMotorizado['idEmpresa'];
}

if ($_GET["msg"] != "") {
    include "plugins/SweetAlert2K/AlertaCorrectaOperacion.php";
}
if ($_GET["error"] != "") {
    include "plugins/SweetAlert2K/AlertaErrorOperacion.php";
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//esto se usara para el apartado de la lista del deposito y en un campo hidden para totalizar la factura
$Deposito_id = "0";
$resultado = mysqli_query($conn3, "SELECT * FROM  sDetalleOperPendites where estado = 1 and (id_usuario ='{$_SESSION['ID']}' or id_usuario ='{$_SESSION['ID_principal']}') and  id_cliente = $clienteId AND tipo = '1' order by id");
while ($fila = mysqli_fetch_array($resultado)) {
    $Deposito_id = $fila["Deposito_id"];
}
if ($Deposito_id != "0" and $Deposito_id != "") {
    $DesabilitarDep = "readonly";
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////



function MostrarBotonesFacturacionAdicional($Nombre, $Usuario_id)
{

    include 'funciones/conn3.php';

    $queryList = mysqli_query($conn3, "SELECT * FROM main_menu WHERE tabla = '$Nombre'");
    while ($row_recordset32 = mysqli_fetch_array($queryList)) {
        $menu_id_paquete = $row_recordset32['id'];
    }

    $MenuActivo = 0;
    $grupo = funcionMaster($Usuario_id, 'ID', 'menu', 'usuarios');
    $QueryMenu = mysqli_query($conn3, "SELECT * FROM  grupos WHERE id = '$grupo'");
    while ($RowMenu = mysqli_fetch_array($QueryMenu)) {
        $Arreglo_Grupos = json_decode($RowMenu['Arreglo_Grupos']);
        foreach ($Arreglo_Grupos as $key => $value) {
            $ArregloMenuFinal = [];
            $querySubmenu = mysqli_query($conn3, "SELECT * FROM  Grupos_Menu WHERE id = '$value'");
            while ($RowSubMenu = mysqli_fetch_array($querySubmenu)) {
                $ArregloMenu = json_decode($RowSubMenu['Arreglo'], true);
            }
            foreach ($ArregloMenu as $key1 => $value1) {
                if ($value1["Activo"] == "1" and $value1["id"] == "$menu_id_paquete") {
                    $MenuActivo = "1";
                }
            }
        }
    }

    return $MenuActivo;
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>

<style>
    /* para aplicar la misma funcion de un readonly, ya que si hay readonly y required no funcionan los dos */
    input[data-readonly_P] {
        pointer-events: none;
        background-color: #eee;
        opacity: 1;
    }

    /* no eliminar  IMPORTANTE */
    input[data-readonly_MontoRestante] {
        pointer-events: none;
        background-color: #eee;
        opacity: 1;
    }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <div>

        <!-- /.box-header -->
        <div>

            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Generar Factura
                </h1>
                <ol class="breadcrumb">
                    <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio </a></li>
                    <li><a href="#">Generar Factura</a></li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div>
                    <div class="col-xs-12">

                        <div class="box">

                            <!-- /.box-header -->
                            <div class="box-body">

                                <?php echo datosPacientesReducido($clienteId); ?>

                            </div>


                            <br>

                            <div align="left" style="padding-bottom: 15px;padding-top: 15px; display:flex; flex-direction: row; align-items:center ">
                                <a style="padding-left: 15px;margin:10px" class='btn btn-outline-info  rounded-pill shadow' onclick="MostrarTipoFactura('Simple_Formulario');">Seleccionar Por Producto</a>
                                <?php
                                $MenuPaquetes = 0;
                                $MenuPaquetes = MostrarBotonesFacturacionAdicional("ES_Paquete", $_SESSION['ID']);

                                if ($MenuPaquetes == "1") {
                                ?>||
                                <a onclick="MostrarTipoFactura('Paquetes_Formulario');" style="margin:10px" class='btn btn-outline-info  rounded-pill shadow'>Seleccionar Por
                                    Paquete/Procedimientos</a>
                            <?php
                                }

                                $MenuEmpresaAfiliadas = 0;
                                $MenuEmpresaAfiliadas = MostrarBotonesFacturacionAdicional("empresasAfiliadas", $_SESSION['ID']);


                                if ($MenuEmpresaAfiliadas == "1") {
                            ?>
                                ||<a onclick="MostrarTipoFactura('Servicios_EmpresasAfiliadas_SaludOcupacional');" style="margin:10px" class='btn btn-outline-info  rounded-pill shadow'>Seleccionar
                                    Por Empresa Afiliada [Salud
                                    Ocupacional]</a>
                            <?php
                                }

                            ?>



                            </div>

                            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?clienteId=<?php echo $clienteId; ?>" method="POST" id="Simple_Formulario">
                                <div class="form-row row">



                                    <div class="form-group col-md-12">
                                        <label><strong> Depósito</strong></label>
                                        <select class="input-lg form-control" name="dep" id="deposito" onchange="ActualizacionDeposito()" <?= $DesabilitarDep; ?> required>
                                            <?php
                                            $queryListDP = mysqli_query($conn3, "SELECT * from dep WHERE (usuario_id='{$_SESSION['ID']}' or usuario_id='{$_SESSION['ID_principal']}') and activo = 1 ORDER BY id ASC");
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
                                        if ($DesabilitarDep != "") {
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
                                                <label>Producto o Servicio</label>
                                            </div>

                                            <select id="codigoProd" name="codigoProd" class="form-control select2" style="width: 100%;" required="required" onChange="CargarPrecioProducto();">
                                                <option value="" selected="selected">Seleccione Producto</option>
                                                <?php

                                                $queryList = mysqli_query($conn3, "SELECT si.* FROM sinvetrios si
                            JOIN scategoria sca ON si.tipo = sca.id
                            WHERE 1=1
                            AND (si.usuario_id = '{$_SESSION['ID']}' or si.usuario_id = '{$_SESSION['ID_principal']}')
                            AND si.estado = 1
                            AND sca.tipo in (1,2,3,5)");
                                                while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                                                    $descripcion = $row_recordset32['descripcion'];
                                                    $ID = $row_recordset32['ID'];

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
                                            <label> Precio </label>
                                        </div>
                                        <input type="number" step="0.01" class="form-control input-lg" id="2" name="base" placeholder="precio" oninput="multiplicar();" value="" required>
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label>Cantidad</label>
                                        <input type="number" class="form-control input-lg" id="1" name="cantidad" placeholder="cantidad" oninput="multiplicar();" required>
                                        <div align="left" id="informacion_existencia"></div>
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label>Descuento</label>
                                        <input type="text" class="form-control input-lg" id="descuento" value="0" name="descuento" placeholder="descuento" pattern="[0-9.%]+" step="any" oninput="ValidarInput(this)" required>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label>Subtotal</label>
                                        <input type="number" class="form-control input-lg blur" id="3" name="subTotal" placeholder="subTotal" min="0" step="0.01" data-readonly_P required>
                                    </div>




                                    <div class="form-group col-md-2" align="center">
                                        <br>
                                        <button type="submit" class="btn btn-block btn-outline-info rounded-pill shadow m-1" name="GuardarDetalleOrden">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>




                                    <div class="form-group col-md-12" align="center">
                                        <label style="color:#3a8bb9;">[si desea el descuento en % deberá colocar al
                                            final del numero el
                                            símbolo %, si es valor numérico solo colocar números]</label>
                                    </div>


                                    <input type="hidden" name="usuario_id" value="<?php echo $_SESSION['ID'] ?>">
                                    <input type="hidden" name="cliente_id" value="<?php echo $clienteId ?>">
                                    <input type="hidden" name="historia" value="<?php echo $historiaClinica1 ?>">
                                    <input type="hidden" name="tipo_historia" value="<?php echo $tipo_historia ?>">







                                    <input type="hidden" name="tipo_cliente" valur="1">
                                </div>
                            </form>



                            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?clienteId=<?php echo $clienteId; ?>" method="POST" id="Paquetes_Formulario" style="display:none;">
                                <div class="form-row">

                                    <div class="form-group col-md-12">
                                        <label><strong> Depósito</strong></label>
                                        <select class="input-lg form-control" name="deposito_paquete" id="deposito_paquete" <?= $DesabilitarDep; ?> required>
                                            <?php
                                            $queryListDP = mysqli_query($conn3, "SELECT * from dep WHERE (usuario_id = '{$_SESSION['ID']}' or usuario_id = '{$_SESSION['ID_principal']}') and activo = 1 ORDER BY id ASC");
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
                                        if ($DesabilitarDep != "") {
                                            echo '<script>document.getElementById("deposito_paquete").addEventListener("mousedown", function (e) {
                              e.preventDefault(); // Evita que se abra el menú desplegable
                              this.blur(); // Quítale el enfoque al elemento
                          });</script>';
                                        }
                                        ?>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <div align="left">Paquetes </div>
                                        <select name="Paquete" id="Paquete" class="form-control select2" style="width: 100%;" data-placeholder="Seleccione un Paquete" required>
                                            <option value="" selected="selected">Seleccione ...</option>
                                            <?php
                                            $QueryPaquetes = mysqli_query($conn3, "SELECT * FROM  ES_Paquete WHERE Activo='1' AND (usuario_id='{$_SESSION['ID']}' or usuario_id='{$_SESSION['ID_principal']}')");
                                            while ($RowPaquetes = mysqli_fetch_array($QueryPaquetes)) {
                                                $id = $RowPaquetes['id'];
                                                $Nombre = $RowPaquetes['Nombre'];
                                                echo "<option value='$id'> $Nombre </option>";
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <input type="hidden" name="usuario_id" value="<?php echo $_SESSION['ID'] ?>">
                                    <input type="hidden" name="cliente_id" value="<?php echo $clienteId ?>">

                                    <input type="hidden" name="historia" value="<?php echo $historiaClinica1 ?>">
                                    <input type="hidden" name="tipo_historia" value="<?php echo $tipo_historia ?>">

                                    <div class="form-group col-md-12"><br>
                                        <center><button type="submit" class="btn btn-block btn-outline-info  rounded-pill shadow" name="GuardarDetallePaquete" style="font-size: 18px;">Guardar</button>
                                        </center>
                                    </div>
                                </div>
                            </form>















                            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?clienteId=<?php echo $clienteId; ?>" method="POST" id="Servicios_EmpresasAfiliadas_SaludOcupacional" style="display:none;">
                                <div class="form-row">

                                    <div class="form-group col-md-12">
                                        <label><strong> Depósito</strong></label>
                                        <select class="input-lg form-control" name="deposito_SaludOcupacional" id="deposito_SaludOcupacional" <?= $DesabilitarDep; ?> required>
                                            <?php
                                            $queryListDP = mysqli_query($conn3, "SELECT * from dep WHERE (usuario_id = '{$_SESSION['ID']}' or usuario_id = '{$_SESSION['ID_principal']}') and activo = 1 ORDER BY id ASC");
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
                                        if ($DesabilitarDep != "") {
                                            echo '<script>document.getElementById("deposito_SaludOcupacional").addEventListener("mousedown", function (e) {
                              e.preventDefault(); // Evita que se abra el menú desplegable
                              this.blur(); // Quítale el enfoque al elemento
                          });</script>';
                                        }
                                        ?>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <div align="left" style=""><label>Productos/Servicios Empresa Afiliada</label>
                                        </div>
                                        <select name="ProductoEmpresaAfiliada" id="ProductoEmpresaAfiliada" class="form-control select2" style="width: 100%;" data-placeholder="Seleccione un Producto" required>
                                            <option value="" selected="selected">Seleccione ...</option>
                                            <?php
                                            $QueryServiciosEmpresas = mysqli_query($conn3, "SELECT * FROM  empresasAfiliadas_Servicios WHERE (usuario_id = '{$_SESSION['ID']}' or usuario_id = '{$_SESSION['ID_principal']}') and Activo='1' AND empresaAfiliada_id='$empresaAfiliada_id'");
                                            while ($RowEmpresasAfiliadas = mysqli_fetch_array($QueryServiciosEmpresas)) {
                                                $id = $RowEmpresasAfiliadas['id'];
                                                $Nombre = funcionMaster($RowEmpresasAfiliadas['inventario_id'], 'ID', 'descripcion', 'sinvetrios');
                                                echo "<option value='$id'> $Nombre | $RowEmpresasAfiliadas[Precio] </option>";
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Cantidad</label>
                                        <input type="number" class="form-control input-lg" name="cantidad" placeholder="Cantidad" value="1" required>
                                    </div>




                                    <input type="hidden" name="usuario_id" value="<?php echo $_SESSION['ID'] ?>">
                                    <input type="hidden" name="cliente_id" value="<?php echo $clienteId ?>">

                                    <input type="hidden" name="historia" value="<?php echo $historiaClinica1 ?>">
                                    <input type="hidden" name="tipo_historia" value="<?php echo $tipo_historia ?>">

                                    <div class="form-group col-md-12"><br>
                                        <center><button type="submit" class="btn btn-block btn-outline-info  rounded-pill shadow" name="GuardarDetalleServiciosEmpresaAfiliada" style="font-size: 18px;">Guardar</button></center>
                                    </div>
                                </div>
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
                                        <th width="5%">#</th>
                                        <th width="15%">Descripción del Producto</th>
                                        <th width="5%">
                                            <div align="Right">Porcentaje IVA</div>
                                        </th>
                                        <th width="10%">
                                            <div align="Right">Precio</div>
                                        </th>

                                        <th width="5%">
                                            <div align="Right">Cantidad</div>
                                        </th>

                                        <th width="10%">
                                            <div align="Right">Descuento</div>
                                        </th>
                                        <th width="10%">
                                            <div align="Right">Total</div>
                                        </th>
                                        <th width="5%" align="center"> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php
                                        //Seriales Productos Simples Parte 1/2
                                        include 'IN_IncludeSerialesDetallesPHP.php';

                                        $ID = $_SESSION['ID'];

                                        $resultado = mysqli_query($conn3, "SELECT * FROM  sDetalleOperPendites where estado = 1 and  (id_usuario ='{$_SESSION['ID']}' or id_usuario ='{$_SESSION['ID_principal']}') and  id_cliente = $clienteId AND tipo=1 order by id");
                                        // //$check = mysqli_num_rows($q);
                                        while ($fila = mysqli_fetch_array($resultado)) {

                                            $Numero++;
                                            $ruta = htmlentities($_SERVER['PHP_SELF']);

                                            $totalbase = $fila['totalbase'];
                                            $subTotal = $fila['subTotal'];
                                            $PuntosT = funcionMaster($fila['idProducto'], 'ID', 'puntos', 'sinvetrios');
                                            $cantidad = $fila['cantidad'];
                                            $iva = funcionMaster($fila['idProducto'], 'ID', 'iva', 'sinvetrios');

                                            $Descripcion = $fila['descripcion'];
                                            //Apartado de paquetes
                                            if ($fila["PaqueteProcedimiento_id"] != "0") {
                                                $Paquete_id = funcionMaster($fila["PaqueteProcedimiento_id"], 'id', 'paquete_id', 'ES_Paquete_Procedimientos');
                                                $PaqueteNombre = funcionMaster($Paquete_id, 'id', 'Nombre', 'ES_Paquete');
                                                $Descripcion .= ' [' . $PaqueteNombre . ']';
                                            }
                                            $PuntosTotal = $cantidad * $PuntosT;

                                            $descuentoValor = $fila['Descuento_Numerico'];
                                            $descuentoTextual = $fila['Descuento_Textual'];

                                            $SinvDep_id = $fila['SinvDep_id'];
                                            $idProductoT = $fila['idProducto'];
                                            $MasDetalles = ConsultarMasInformacion_Facturacion_Funcion($idProductoT, $SinvDep_id);
                                            if ($MasDetalles != "") {
                                                $Descripcion .= $MasDetalles;
                                            }

                                            //Seriales Productos Simples Parte 1/2
                                            $CampoAdicionalSerial = ConsultarDisponbilidadSerialTipoProducto_ProductoSimple($fila['id']);

                                            $number_format = fn ($num, $decimals = 2) => number_format($num, $decimals);
                                            $yes_or_no = fn ($condtion, $yes, $no) => $condtion ? $yes : $no;

                                            $sup = $yes_or_no(strpos($descuentoTextual, "%"), "{{$descuentoTextual}}", "");

                                            echo <<<HTML
                                            <tr>
                                                <td>{$Numero} {$CampoAdicionalSerial}</td>
                                                <td>{$Descripcion}</td>
                                                <td align="right">{$iva}%</td>
                                                <td align="right">{$number_format($fila['base'])} {$moneda}</td>
                                                <td align="right">{$fila['cantidad']}</td>
                                                <td align="Right">{$sup} {$number_format($descuentoValor)} {$moneda}</td>
                                                <td align="right">{$number_format($fila['subTotal'])} {$moneda}</td>
                                                <td align="center"><a href="{$ruta}?clienteId={$clienteId}&tipo_historia{$tipo_historia}=&historiaClinica1={$historiaClinica1}&borrar={$fila['id']}"><i class='fa fa-trash' style='color:red'></i> </a></td>
                                            </tr>
                                            HTML;

                                            //                         echo '     <tr>
                                            // <td >' . $Numero . ' ' . $CampoAdicionalSerial . ' </td>
                                            // <td >' . $Descripcion . ' </td>
                                            // <td >' . $iva . '' . "%" . '  </td>
                                            // <td ><div align="Right">' . number_format($fila['base'], 2) . '' . $moneda . '</div></td>
                                            // <td ><div align="Right">' . $fila['cantidad'] . '</div></td>
                                            // <td ><div align="center">' . number_format($descuentoValor, 2) . '' . $moneda . '</div></td>
                                            // <td ><div align="Right">' . number_format($fila['subTotal'], 2) . '' . $moneda . '</div></td>';

                                            //                         echo "<td width='1%'><a href={$ruta}?clienteId={$clienteId}&tipo_historia{$tipo_historia}=&historiaClinica1={$historiaClinica1}&borrar={$fila['id']}><i class='fa fa-trash' style='color:red'></i> </a></td>";

                                            //                         echo '</tr>';

                                            $totalCant += $fila['cantidad'];
                                            $totalBase += $fila['base'];
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
                                        <th> </th>
                                        <td align="right"> <strong>
                                                <div> Totales </div>
                                            </strong>
                                        </td>
                                        <td align="right">
                                            <b>
                                                <?php echo number_format($totalBase, 2) . ' ' . $moneda; ?>
                                            </b>
                                        </td>
                                        <td align="right">
                                            <b><?php echo $totalCant ?></b>
                                        </td>

                                        <td align="Right">
                                            <b>
                                                <?php echo number_format($totaldesc, 2) . ' ' . $moneda; ?>
                                            </b>
                                        </td>
                                        <td align="right">
                                            <b><?php echo number_format($total, 2) . ' ' . $moneda; ?>
                                            </b>
                                        </td>
                                        <td align="center"></td>
                                    </tr>

                                    <?php
                                    if ($ImpuestoDetalles > 0) {
                                        $total = $total + $ImpuestoDetalles;
                                    ?>
                                        <tr>
                                            <td colspan="6" align="Right"><b>Impuesto</b></td>
                                            <td align="Right"><b><?= "{$number_format($ImpuestoDetalles)} {$moneda}" ?></b>
                                            </td>
                                            <td align="center"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="6" align="Right"><b>Total con Impuesto</b></td>
                                            <td align="Right"><b><?= "{$number_format($total)} {$moneda}" ?></b></td>
                                            <td align="center"></td>
                                        </tr>
                                    <?php } ?>
                                </thead>
                            </table>

                        </div>
                    </div>
                </div>

                <div class="box">
                    <div class="box-body">


                        <?php
                        $ID = $_SESSION['ID'];

                        $resultado1 = mysqli_query($conn3, "SELECT * FROM cliente WHERE cliente_id = $clienteId");
                        while ($fila1 = mysqli_fetch_array($resultado1)) {
                            $Puntos = $fila1['Puntos'];
                        }

                        $resultado = mysqli_query($conn3, "SELECT * FROM sOperacionInv WHERE idCliente = $clienteId");
                        while ($fila2 = mysqli_fetch_array($resultado)) {
                            $puntosCanjeados = $fila2['puntosCanjeados'];
                        }

                        $TotalPuntosP = $Puntos + $puntosCanjeados;


                        //tipo 1 -> facturas
                        //Calcular max del campo monto de pago
                        $resultado = mysqli_query($conn3, "SELECT * FROM sDetalleMetodosPagos WHERE (id_usuario = '{$_SESSION['ID']}' or id_usuario = '{$_SESSION['ID_principal']}') AND id_cliente = $clienteId AND idOperacion = 0 AND tipo = '1' AND Activo = 1");
                        $MontoPagadoDetalle = 0;
                        while ($fila = mysqli_fetch_array($resultado)) {
                            $MontoPagadoDetalle = $MontoPagadoDetalle + (int) $fila['nota_pago'];

                            $metodo_pago = $fila['metodo_pago'];
                        }

                        $MontoDebe = round($total - $MontoPagadoDetalle, 2);
                        // echo "El total es: " . $totalMet;
                        ?>


                        <div class="row">


                            <div class="col-md-6">
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
                                            <th>
                                                <div align="center"><i class='fa fa-trash'></div></i>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php
                                            $ID = $_SESSION['ID'];
                                            //tipo 1 -> facturas
                                            $resultado = mysqli_query($conn3, "SELECT * FROM sDetalleMetodosPagos WHERE (id_usuario = '{$_SESSION['ID']}' or id_usuario = '{$_SESSION['ID_principal']}') AND id_cliente = $clienteId AND idOperacion = 0 AND tipo = '1' AND Activo = 1");
                                            $totalMet = 0;
                                            while ($fila = mysqli_fetch_array($resultado)) {
                                                $Numero++;
                                                $Valor_Pago = (int) $fila['nota_pago'];
                                                $Nombre_Pago = funcionMaster($fila['metodo_pago'], 'id', 'Nombre', 'Medios_Pago');

                                                echo '<tr>
                            <td>' . $Numero . '</td>
                            <td>' . $Nombre_Pago . '</td>
                            <td><div align="Right">' . number_format($Valor_Pago, 2) . '' . $moneda . '</div></td>';

                                                echo "<td align='center'><a onclick='EliminarMedioPago({$fila['id']})'><i class='fa fa-trash' style='color:red'></i> </a></td>";

                                                echo '</tr>';


                                                $totalMet += (int) $fila['nota_pago'];
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
                                                <div align="Right">
                                                    <?php echo number_format($totalMet, 2) . ' ' . $moneda; ?>
                                                </div>
                                            </th>
                                            <th></th>
                                        </tr>

                                        <?php

                                        if ($metodo_pago == '5') {

                                            $totalpuntos += $PuntosTotal;
                                            echo '
			   <tr><th> <strong>
                            <div align="Right"> Total Puntos</div>
                          </strong>
                        </th>
                        <th>
                        <div align="Right">
                        ' . $totalpuntos . '
                        </div></th></tr>


                        <tr><th> <strong>
                            <div align="Right"> Total Puntos Paciente</div>
                          </strong>
                        </th>
                        <th>
                        <div align="Right">
                        ' . $TotalPuntosP . '
                        </div></th></tr>';
                                        }
                                        ?>




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
                                                    <h3><?php echo number_format(round($totalMet - $total, 2), 2) ?>
                                                    </h3>
                                                </div>
                                            </th>



                                        </tr>
                                    </thead>

                                </table>

                            </div>


                            <div class="col-md-6">
                                <form action="guardarDetalleMetodo.php" method="POST" name="formularioActualizarcliente" style="width:100%">
                                    <?php
                                    $queryUser = "SELECT mp.*, u.ID_principal FROM Medios_Pago mp 
                                    left join usuarios u on u.ID = mp.usuario_id
                                    WHERE 
                                    1=1
                                    and (mp.ID_principal = '{$_SESSION['ID_principal']}' or mp.ID_principal = '0' ) AND mp.Activo = '1'";
                                    $QueryMedioPago = mysqli_query($conn3, $queryUser);
                                    $usersRow = null;
                                    while ($RowMedioPago = mysqli_fetch_assoc($QueryMedioPago)) {
                                        $usersRow[] = $RowMedioPago;
                                    }
                                    ?>
                                    <!-- <input type="hidden" class="form-control input-lg" id="id_usuario" name="id_usuario" placeholder="id_usuario" value=""> -->
                                    <label>Método de pago</label>
                                    <select id="metodo_pago" name="metodo_pago" class="form-control input-lg select" style="width: 100%;" required>
                                        <option value="">Seleccione...</option>
                                        <?php
                                        foreach ($usersRow as $user) {
                                            echo '<option value="' . $user['id'] . '">' . $user['Nombre'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                    <script>
                                        document.getElementById('metodo_pago').addEventListener('change', mostrarQr);

                                        function mostrarQr() {
                                            let selectValue = this.value;
                                            console.log(`este es el  valor del select: ` + selectValue);
                                            let medioPago = [];
                                            medioPago = '<?= json_encode($usersRow); ?>';
                                            let arreglo = JSON.parse(medioPago);
                                            console.log(arreglo);

                                            for (let index = 0; index < arreglo.length; index++) {
                                                if (arreglo[index].id == selectValue) {
                                                    let imagenQr = arreglo[index].imagenQr;
                                                    if (imagenQr != '' && imagenQr != null) {
                                                        window.open('<?= $Base ?>uploads/' + arreglo[index].ID_principal + '/metodosdepagos/' + imagenQr, 'ventan1', 'width=300,height=300');
                                                    } else {
                                                        break;
                                                    }
                                                }
                                            }
                                        };
                                    </script>

                                    <label>Monto</label>
                                    <input type="number" id="nota_pago" required name="nota_pago" placeholder="Monto" class="form-control input-lg" step="0.01" max="<?= round($MontoDebe, 2); ?>"><br>
                                    <button type="submit" class="btn btn-block btn-outline-primary rounded-pill">
                                        <i class="fas fa-coins mr-1"></i>
                                        Pagar
                                    </button>



                                    <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['ID'] ?>">
                                    <input type="hidden" name="id_cliente" value="<?php echo $clienteId ?>">
                                    <input type="hidden" name="id_historia" value="<?php echo $historiaClinica1 ?>">
                                    <input type="hidden" name="tipo_historia" value="<?php echo $tipo_historia ?>">


                                    <input type="hidden" name="tipo_cliente" valur="1">
                                    <input type="hidden" name="tipo" value="1">

                                </form>
                            </div>






                            <div class="col-md-12">
                                <!-- no modificar el id del formulario se usa para varias cosas -->
                                <form id="totalizarFactura" action="totalizarFactura.php" method="POST" name="formularioActualizarcliente" enctype="multipart/form-data">
                                    <div class="row">

                                        <div class="form-group col-md-6">
                                            <label> Observaciones o notas</label>
                                            <textarea id="nota" name="nota" class="textarea" placeholder="Observaciones o Notas" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                                        </div>

                                        <div class="col-md-6">
                                            <label> Monto Pendiente </label>

                                            <?php

                                            $pendiente = round($total - $totalMet, 2);
                                            if ($pendiente < 0) {
                                                $pendiente = 0;
                                            }
                                            ?>

                                            <!--<input type="number" name="montoPagado" placeholder="Monto Pagado" class="form-control input-lg" step="0.01" value="<?= $pendiente; ?>" required readonly> <br>-->
                                            <input type="number" name="montoPendiente" id="montoPendiente" placeholder="Monto Pagado" class="form-control input-lg blur" step="0.01" min="0" value="<?= $pendiente; ?>" required data-readonly_MontoRestante>
                                            <br>
                                            <label> Fecha de vencimiento</label>
                                            <input type="date" name="fechaVencimiento" placeholder="fecha Vencimiento" class="form-control input-lg" value="<?= date('Y-m-d'); ?>" required>
                                            <br>
                                            <?php
                                            //query para obtener los doctores y mostrarlos en el select
                                            $queryDoctor = "SELECT * FROM usuarios WHERE ID_principal = $ID_UsuarioP ";
                                            $queryDocList = mysqli_query($conn3, $queryDoctor);
                                            $docsRow = null;
                                            while ($docsQueryResult = mysqli_fetch_assoc($queryDocList)) {
                                                $docsRow[] = $docsQueryResult;
                                            }
                                            ?>
                                        <label for="">Factura a nombre del Doctor </label>
                                        <select name="id_usuario" id="id_usuario_totalizar" class="form-control input-lg select" id="">
                                            <option value="<?= $_SESSION['ID'] ?>"><?= $_SESSION['NOMBRE_USUARIO'] ?></option>
                                            <?php
                                            foreach ($docsRow as $doc) {
                                                echo '<option value="' . $doc['ID'] . '">' . $doc['NOMBRE_USUARIO'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    
                                            <div class="form-group">
                                                <label>Documentos</label> <br>
                                                <input type="file" name="Documentos[]" multiple />
                                            </div>


                                            <?php
                                            if ($totalpuntos > $TotalPuntosP) {
                                            } else {
                                                echo '<button type="submit" class="btn btn-block btn-outline-danger rounded-pill">
                                                <i class="fas fa-dollar-sign mr-1"></i>
                                                Totalizar Factura
                                                </button>';
                                            }
                                            ?>
                                        </div>




                                        <!-- <input type="hidden" name="id_usuario" id="id_usuario_totalizar" value=""> -->
                                        <input type="hidden" name="id_cliente" id="id_cliente_totalizar" value="<?php echo $clienteId ?>">
                                        <input type="hidden" name="historia" value="<?php echo $historiaClinica1 ?>">
                                        <input type="hidden" name="tipo_historia" value="<?php echo $tipo_historia ?>">
                                        <input type="hidden" name="totalpuntos" value="<?php echo $totalpuntos ?>">
                                        <input type="hidden" name="Deposito_id" id="Deposito_id" value="<?php echo $Deposito_id; ?>">




                                        <input type="hidden" name="tipo_cliente" valur="1">
                                        <input type="hidden" name="tipo" value="1">
                                    </div>
                                </form>
                            </div>
















                        </div>
















                    </div>
                </div>






        </div>
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>





<?php include("footer.php") ?>


<?php
//Seriales Productos Simples Parte 2/2
$Tabla_id_Formulario = 'totalizarFactura';
include 'IN_IncludeSerialesDetallesJS.php';

?>


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
    /*
    function agergarItem() {

      // estas son las variables que enviamos

      var codigoProd = $("#codigoProd").val();
      var cantidad = $("#cantidad").val();
      var valor = $("#valor").val();

      var usuario_id = $("#usuario_id").val();

      // aqui enviamos el mensaje por medio de un arreglo

      $.ajax({
        type: "POST",
        url: "ajax_agregarItem.php",
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
        url: "eliminarItem.php",
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
    window.onload = listaItem;
    */

    function MostrarTipoFactura(valor) {

        if (valor == "Simple_Formulario") {
            document.getElementById(valor).style.display = "block";
            document.getElementById("Paquetes_Formulario").style.display = "none";
            document.getElementById("Servicios_EmpresasAfiliadas_SaludOcupacional").style.display = "none";
        } else if (valor == "Paquetes_Formulario") {
            document.getElementById(valor).style.display = "block";
            document.getElementById("Simple_Formulario").style.display = "none";
            ocument.getElementById("Servicios_EmpresasAfiliadas_SaludOcupacional").style.display = "none";
        } else if (valor == "Servicios_EmpresasAfiliadas_SaludOcupacional") {
            document.getElementById(valor).style.display = "block";
            document.getElementById("Simple_Formulario").style.display = "none";
            document.getElementById("Paquetes_Formulario").style.display = "none";
        }
    }
</script>

<script>
    /* no eliminar IMPORTANTE */
    $(document).on('focus', ".blur", function() {
        $(this).blur();
    });
</script>

<script>
    function EliminarMedioPago(id) {

        $.ajax({
            type: "POST",
            url: "Ajax_EliminarMedioPago.php",
            data: {
                id: id,
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
                    Tipo_Consulta: "Cargar Precio"
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
                            var Mensaje = "Existencia Disponible: <u><b>" + existencias + "</b></u>";
                            //info de las existencias informacion_existencia
                            document.getElementById('informacion_existencia').innerHTML = Mensaje;
                            ///////////////////////////////////////////////////////////////////////////
                            // Establecer el valor máximo para el elemento con id=1 que es el campo cantidad
                            //var elemento1 = document.getElementById('1');
                            // elemento1.max = existencias;
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

                            //var elemento1 = document.getElementById('1');
                            //elemento1.max = item.Existencia;

                            ////////////////////
                            var Mensaje = "Existencia Disponible: <u><b>" + item.Existencia + "</b></u>";
                            document.getElementById('informacion_existencia').innerHTML = Mensaje;
                            //////////////////////

                        });
                        DivCampoPersonalizado.appendChild(input);

                    }
                    //codigo para el apartado del producto compuesto
                    else if (Respuesta.Tipo == "Compuesto") {

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
                            var Mensaje = "Existencia Disponible: <u><b>" + item.Existencia + "</b></u>";
                            document.getElementById('informacion_existencia').innerHTML = Mensaje;
                            //////////////////////

                        });

                        DivCampoPersonalizado.appendChild(input);
                        DivCampoPersonalizado.appendChild(labelElement);
                    } else if (Respuesta.Tipo == "Servicio") {

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
                    else if (Respuesta.Tipo == "Error") {

                        alert('el tipo del producto tiene un error con la clasificacion del inventario o no existe el registro para el deposito elegido');
                        ActualizacionDeposito();
                    }


                    $('#2').val(Respuesta.Precio);

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

    //////////////////////////////////////Validar Existencias //////////////////////////////////////
    // si no necesitan validar las existencias comentar este codigo
    document.getElementById('totalizarFactura').addEventListener('submit', function(event) {
        event.preventDefault(); // Detiene el envío predeterminado del formulario

        var usuario_id = $("#id_usuario_totalizar").val();
        var cliente_id = $("#id_cliente_totalizar").val();
        var deposito = $("#Deposito_id").val();
        var tipo = "1"; //1-> Factura General | revisar el campo tipo de soperacioninv
        $.ajax({
            type: "POST",
            url: "FA_Ajax_VerificarCantidadesAFacturar.php",
            data: {
                usuario_id: usuario_id,
                cliente_id: cliente_id,
                deposito: deposito,
                tipo: tipo,
                Tipo_Consulta: "Verificar Existencia"
            },
            success: function(response) {
                console.log(response);
                var Respuesta = JSON.parse(response);
                var Detalles = Respuesta.Detalles;
                if (Respuesta.Enviar == false) {
                    var Mensaje = "";
                    var MensajeEstatico = "";
                    Object.keys(Detalles).forEach(function(key) {
                        var item = Detalles[key];
                        if (item.Estado == false) {
                            Mensaje += item.Nombre + ": ";
                            Mensaje += "\r\nExistencias: " + item.Existencia + "\r\n";
                            Mensaje += "Existencias a descontar en la factura actual: " + item.Descontar + " . \r\n   ";
                            MensajeEstatico += item.Motivo;
                        }

                    });

                    Mensaje = Mensaje + " " + MensajeEstatico;

                    alert(Mensaje);
                } else {
                    //alert("Existencia Disponible");
                    <?php
                    $QueryContabilidad = mysqli_query($conn3, "SELECT * FROM  Config_Contabilidad WHERE (usuario_id = '{$_SESSION['ID']}' or usuario_id = '{$_SESSION['ID_principal']}') and Activo = 1");
                    // $NrowContabilidad = mysqli_num_rows($QueryContabilidad);
                    //if($NrowContabilidad>0 && $_GET['clienteId']=='115'){
                    if ($NrowContabilidad > 0) {
                        echo "ModalModuloContabilidad();";
                    } else {
                        echo "document.getElementById('totalizarFactura').submit();";
                    }
                    ?>

                }
            }
        });

    });
    //////////////////////////////////////Validar Existencias //////////////////////////////////////
</script>


<?php
// 13 09 2023 - JRodriguez
// este include es para facturar a terceros
// solo comentar el include si no necesitan esta opcion
//include 'facturarTerceroModal.php';
// ir a totalizarFactura para continuar con el registro del auxiliar

include 'Include_FacturaContabilidad.php';
?>