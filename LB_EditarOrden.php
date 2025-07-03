<?php
include 'header.php';
include 'menu.php';



$_POST = DatosIngresarMysqli($_POST);

$idOperacion = $_GET["idOperacion"];

$queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv where idOperacion = $idOperacion");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $idCliente      = $rowMotorizado['idCliente'];
    $idEmpresa      = $rowMotorizado['idEmpresa'];
    $montoPagado = $rowMotorizado['montoPagado'];
    $descuentos = $rowMotorizado['descuentos'];
    $Tipo_Descuento = $rowMotorizado['Tipo_Descuento'];
}

$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $idEmpresa");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $emailF = $rowMotorizado['emailF'];
    $ciudadPaisF = $rowMotorizado['ciudadPaisF'];
    $LogoF = $rowMotorizado['logoF'];
    $impuestoF = $rowMotorizado['impuestoF'];

    if (strlen($LogoF) > 0) {
        $Logo = "<img src='{$Base}/logos/{$LogoF}' style='height: 3.5cm;width: auto;'>";
    }
}

$queryList = mysqli_query($conn3, "SELECT * FROM  usuarios where ID = $idEmpresa");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $ciudad             = $rowMotorizado['ciudad'];
    $NOMBRE_USUARIO     = $rowMotorizado['NOMBRE_USUARIO'];
}

$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $idCliente");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $nombre_cliente             = $rowMotorizado['nombre_cliente'];
    $ciudad_cliente             = $rowMotorizado['ciudad_cliente'];
    $direccion_cliente          = $rowMotorizado['direccion_cliente'];
    $telefono_cliente           = $rowMotorizado['telefono_cliente'];
    $CODI_CLIENTE               = $rowMotorizado['CODI_CLIENTE'];
}














///////////////////////////////////////////////////////////////////////////// actualizar el presupuesto /////////////////////////////////////////////////////////////////////////////

if (isset($_POST['Actualizar_Presupuesto'])) {
    date_default_timezone_set('America/Bogota');
    $fechaRegistro = date("Y-m-d H:i:s");

    $idOperacion = $_POST["idOperacion"];
    $usuario_id = $_POST["usuario_id"];
    $cliente_id = $_POST["cliente_id"];

    /*
    $queryList = mysqli_query($conn3, "SELECT count(id) As CantidadExamenes FROM sDetalleOper WHERE idOperacion ='{$idOperacion}' AND estado = '1' ");
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $CantidadExamenes = $rowMotorizado["CantidadExamenes"];
    }

    $MismoProducto = "0";
    foreach ($_POST["Producto"] as $key => $value) {
        foreach ($value as $key1 => $value1) {
            if ($key1 == "id") {
                $id = $value1;
                $Producto_id = $value["idProducto"];
            }
        }

        $queryList = mysqli_query($conn3, "SELECT * FROM  sDetalleOper where id = $id AND estado = '1'");
        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
            $Producto_id_actual = $rowMotorizado["idProducto"];
        }

        if ($Producto_id == $Producto_id_actual) {
            $MismoProducto++;
        }
    }

    if ($CantidadExamenes == $MismoProducto) {
        $CrearExamenes = "No";
    } else {
        $CrearExamenes = "Si";
    }
    echo "<hr>";
    */

    foreach ($_POST["Producto"] as $key => $value) {
        $Campos = "";
        $id = "";
        $contador++;
        foreach ($value as $key1 => $value1) {
            if ($key1 != "id") {
                $Campos .= "{$key1} = '{$value1}',";
            }
            if ($key1 == "id") {
                $id = $value1;
                $Nombre = mysqli_real_escape_string($conn3,funcionMaster($value["idProducto"], 'id', 'Nombre', 'LB_Examen'));
                $Producto_id = $value["idProducto"];
                $Cantidad = $value["cantidad"];
                $base = $value["base"];

                $totalbase = $base*$Cantidad;
            }
        }
        $Campos = trim($Campos, ',');

        $ProductoModificado="0";
        $queryList = mysqli_query($conn3, "SELECT * FROM  sDetalleOper where id = $id AND estado = '1'");
        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
            $Producto_id_actual = $rowMotorizado["idProducto"];
            $Cantidad_Actual = $rowMotorizado["cantidad"];
        }

        if ($Producto_id != $Producto_id_actual) {
            $ProductoModificado="1";
        }
        if ($Cantidad != $Cantidad_Actual) {
            $ProductoModificado="1";
        }

        mysqli_query($conn3, "UPDATE sDetalleOper SET {$Campos},descripcion='{$Nombre}',fechaRegistro='{$fechaRegistro}',totalbase='{$totalbase}' WHERE id = '{$id}' and idOperacion='{$idOperacion}' limit 1;");
        //echo "UPDATE sDetalleOper SET {$Campos},descripcion='{$Nombre}',fechaRegistro='{$fechaRegistro}' WHERE id = '{$id}' and idOperacion='{$idOperacion}' limit 1;";
        $id_detallefactura  = $id;

        if ($ProductoModificado=="1") {
            $contador = 0;
            /*
            $QueryExamen = mysqli_query($conn3, "SELECT * FROM  LB_ExamenCargado where examen_id= '$Producto_id_actual' AND idOperacion='$idOperacion' AND Activo = 1 ORDER BY id ASC");
            $nrowl = mysqli_num_rows($QueryExamen);
            while ($rowExamen = mysqli_fetch_array($QueryExamen)) {

                $examen_valores[$Producto_id_actual][$contador] = $rowExamen["Resultado"];
                $contador++;
            }
            */
            //echo '<pre>' . print_r($examen_valores, TRUE) . '</pre>';

            //mysqli_query($conn3, "DELETE FROM LB_ExamenCargado where examen_id= '$Producto_id_actual' AND idOperacion='$idOperacion'");
            mysqli_query($conn3, "UPDATE LB_ExamenCargado set Activo = 0 where examen_id= '$Producto_id_actual' AND idOperacion='$idOperacion' AND detalle_id='$id_detallefactura' ");

            ///////////////////////////////////////////////////////////////////////////////////////////////

            for ($crearExamenes = 1; $crearExamenes <= $Cantidad; $crearExamenes++) {

                    //limpiar arreglo $Datos
                    $Datos = array();
                    //$Datos="";
                    $QueryExamen = mysqli_query($conn3, "SELECT * FROM  LB_Examen where id=$Producto_id");
                    $nrowl = mysqli_num_rows($QueryExamen);
                    while ($rowExamen = mysqli_fetch_array($QueryExamen)) {
        
                        $Caracteristicas = $rowExamen['Caracteristicas'];
                        $rowExamen = DatosIngresarMysqli($rowExamen);
                        $id_examen = $rowExamen['id'];
                        $Nombre = $rowExamen['Nombre'];
                        $Metodo = $rowExamen['Metodo'];
                        $En_Dos_Tablas = $rowExamen['En_Dos_Tablas'];
                        $Unidades_Referencia = $rowExamen['Unidades_Referencia'];
                        $Valores_Referencia = $rowExamen['Valores_Referencia'];
                        $Valores_Referencia_Filtrado = $rowExamen['Valores_Referencia_Filtrado'];
                        $Formulas = $rowExamen['Formulas'];
                        $Interpretacion = $rowExamen['Interpretacion'];
        
                        $ArregloValoresArray["categoria_id"] = $rowExamen['categoria_id'];
                        $ArregloValoresArray["Campo_Resultado"] = $rowExamen['Campo_Resultado'];
                        $ArregloValoresArray["Valores_Campo_Resultado"] = str_replace('"', '&quot;',$rowExamen['Valor_Campo_Resultado']);
        
                    }
        
                    foreach ($ArregloValoresArray as $key => $value) {
                        $Datos["{$key}"]="{$value}";
                    }
                    $Datos = json_encode($Datos, JSON_UNESCAPED_UNICODE);
        
                    if ($Caracteristicas != "[]") {


                        mysqli_query($conn3, "INSERT INTO LB_ExamenCargado (idOperacion, cliente_id, usuario_id,            examen_id, Nombre, Metodo, Unidades_Referencia, Valores_Referencia, En_Dos_Tablas, Resultado, Valores_Referencia_Filtrado,Interpretacion,               Arreglo_Mas_Informacion) 
                                    VALUES ('$idOperacion', '$cliente_id', '$usuario_id',            '$id_examen', '$Nombre', '$Metodo' ,'$Unidades_Referencia','$Valores_Referencia','$En_Dos_Tablas','No Aplica Resultado','$Valores_Referencia_Filtrado','$Interpretacion',    '$Datos');");
                        
                        $idExamenCargado  = mysqli_insert_id($conn3);
                        //update
                        mysqli_query($conn3, "UPDATE LB_ExamenCargado SET examenrelacion_id = '$idExamenCargado', detalle_id = '$id_detallefactura' where id = '$idExamenCargado';");      
                        


                        $listado = json_decode($Caracteristicas, true);
                        foreach ($listado as $key => $value) {
                            // $Datos="";
                            $Datos = array();
                            $Nombre = $value["Nombre_Caracteristica"];
                            $Valores_Referencia_Caracteristica = $value["Valores_Referencia_Caracteristica"];
                            $Unidades_Referencia = $value["Unidades_Referencia"];
        
                            $Datos["Campo_Resultado"] = $value["Campo_Resultado"];
                            $Datos["Valores_Campo_Resultado"] = $value["Valores_Campo_Resultado"];
        
                            $Datos = json_encode($Datos, JSON_UNESCAPED_UNICODE);
                            $Valores_Referencia_Filtrado = PonerComillasyOtrosCaracteres($value["Filtro_Personalizado"]);
                            $Formulas = PonerComillasyOtrosCaracteres($value["Formula"]);
                            mysqli_query($conn3, "INSERT INTO LB_ExamenCargado (idOperacion, cliente_id, usuario_id,            examen_id, Nombre, Unidades_Referencia, Valores_Referencia, En_Dos_Tablas,CaracteristicaExamen, Valores_Referencia_Filtrado,       Arreglo_Mas_Informacion,Formulas, examenrelacion_id, detalle_id) 
                                    VALUES ('$idOperacion', '$cliente_id', '$usuario_id',            '$id_examen', '$Nombre','$Unidades_Referencia','$Valores_Referencia_Caracteristica','$En_Dos_Tablas','Si', '$Valores_Referencia_Filtrado',     '$Datos','$Formulas', '$idExamenCargado', '$id_detallefactura');");
                        }
                    }
                    else {

                        mysqli_query($conn3, "INSERT INTO LB_ExamenCargado (idOperacion, cliente_id, usuario_id,            examen_id, Nombre, Metodo, Unidades_Referencia, Valores_Referencia,  En_Dos_Tablas, Valores_Referencia_Filtrado,Interpretacion,      Arreglo_Mas_Informacion,Formulas) 
                                    VALUES ('$idOperacion', '$cliente_id', '$usuario_id',            '$id_examen', '$Nombre', '$Metodo' ,'$Unidades_Referencia','$Valores_Referencia','$En_Dos_Tablas', '$Valores_Referencia_Filtrado','$Interpretacion',     '$Datos','$Formulas');");
                        $idExamenCargado  = mysqli_insert_id($conn3);
                        //update
                        mysqli_query($conn3, "UPDATE LB_ExamenCargado SET examenrelacion_id = '$idExamenCargado', detalle_id = '$id_detallefactura' where id = '$idExamenCargado';");    
                }
                
        
            }


        }




    }
    
    $Producto_id = "0";
    foreach ($_POST["Producto_Adicional"] as $key => $value) {
        $Campos = "";
        $Valores = "";
        $id = "";
        $contador1++;
        foreach ($value as $key1 => $value1) {
            $Campos .= $key1 . ',';
            $Valores .= "'{$value1}',";
        }
        $Nombre = mysqli_real_escape_string($conn3,funcionMaster($value["idProducto"], 'id', 'Nombre', 'LB_Examen'));
        $Producto_id = $value["idProducto"];

        $base = $value["base"];
        $cantidad = $value["cantidad"];

        $totalbase = $base*$cantidad;

        $Campos = trim($Campos, ',');
        $Valores = trim($Valores, ',');
        mysqli_query($conn3, "INSERT INTO sDetalleOper (id_usuario,id_cliente,descripcion,idOperacion,impuesto,totalbase,fechaRegistro,Tipo_Producto,{$Campos}) VALUES ('$usuario_id','$cliente_id','$Nombre','{$idOperacion}','0','$totalbase','$fechaRegistro','Laboratorio',{$Valores});");
        //echo "INSERT INTO sDetalleOper (id_usuario,id_cliente,descripcion,cantidad,idOperacion,impuesto,totalbase,base,fechaRegistro,Tipo_Producto,{$Campos}) VALUES ('$usuario_id','$cliente_id','$Nombre','1','{$idOperacion}','0','0','$base','$fechaRegistro','Laboratorio',{$Valores});";
        $id_detallefactura  = mysqli_insert_id($conn3);
        
        if ($Producto_id != "0") {

             ///////////////////////////////////////////////////////////////////////////////////////////////

            for ($crearExamenes = 1; $crearExamenes <= $cantidad; $crearExamenes++) {

                //limpiar arreglo $Datos
                $Datos = array();
                //$Datos="";
                $QueryExamen = mysqli_query($conn3, "SELECT * FROM  LB_Examen where id=$Producto_id");
                $nrowl = mysqli_num_rows($QueryExamen);
                while ($rowExamen = mysqli_fetch_array($QueryExamen)) {
    
                    $Caracteristicas = $rowExamen['Caracteristicas'];
                    $rowExamen = DatosIngresarMysqli($rowExamen);
                    $id_examen = $rowExamen['id'];
                    $Nombre = $rowExamen['Nombre'];
                    $Metodo = $rowExamen['Metodo'];
                    $En_Dos_Tablas = $rowExamen['En_Dos_Tablas'];
                    $Unidades_Referencia = $rowExamen['Unidades_Referencia'];
                    $Valores_Referencia = $rowExamen['Valores_Referencia'];
                    $Valores_Referencia_Filtrado = $rowExamen['Valores_Referencia_Filtrado'];
                    $Formulas = $rowExamen['Formulas'];
                    $Interpretacion = $rowExamen['Interpretacion'];
    
                    $ArregloValoresArray["categoria_id"] = $rowExamen['categoria_id'];
                    $ArregloValoresArray["Campo_Resultado"] = $rowExamen['Campo_Resultado'];
                    $ArregloValoresArray["Valores_Campo_Resultado"] = str_replace('"', '&quot;',$rowExamen['Valor_Campo_Resultado']);
    
                }
    
                foreach ($ArregloValoresArray as $key => $value) {
                    $Datos["{$key}"]="{$value}";
                }
                $Datos = json_encode($Datos, JSON_UNESCAPED_UNICODE);
    
                if ($Caracteristicas != "[]") {


                    mysqli_query($conn3, "INSERT INTO LB_ExamenCargado (idOperacion, cliente_id, usuario_id,            examen_id, Nombre, Metodo, Unidades_Referencia, Valores_Referencia, En_Dos_Tablas, Resultado, Valores_Referencia_Filtrado,Interpretacion,               Arreglo_Mas_Informacion) 
                                VALUES ('$idOperacion', '$cliente_id', '$usuario_id',            '$id_examen', '$Nombre', '$Metodo' ,'$Unidades_Referencia','$Valores_Referencia','$En_Dos_Tablas','No Aplica Resultado','$Valores_Referencia_Filtrado','$Interpretacion',    '$Datos');");
                    
                    $idExamenCargado  = mysqli_insert_id($conn3);
                    //update
                    mysqli_query($conn3, "UPDATE LB_ExamenCargado SET examenrelacion_id = '$idExamenCargado', detalle_id = '$id_detallefactura' where id = '$idExamenCargado';");      
                    


                    $listado = json_decode($Caracteristicas, true);
                    foreach ($listado as $key => $value) {
                        // $Datos="";
                        $Datos = array();
                        $Nombre = $value["Nombre_Caracteristica"];
                        $Valores_Referencia_Caracteristica = $value["Valores_Referencia_Caracteristica"];
                        $Unidades_Referencia = $value["Unidades_Referencia"];
    
                        $Datos["Campo_Resultado"] = $value["Campo_Resultado"];
                        $Datos["Valores_Campo_Resultado"] = $value["Valores_Campo_Resultado"];
    
                        $Datos = json_encode($Datos, JSON_UNESCAPED_UNICODE);
                        $Valores_Referencia_Filtrado = PonerComillasyOtrosCaracteres($value["Filtro_Personalizado"]);
                        $Formulas = PonerComillasyOtrosCaracteres($value["Formula"]);
                        mysqli_query($conn3, "INSERT INTO LB_ExamenCargado (idOperacion, cliente_id, usuario_id,            examen_id, Nombre, Unidades_Referencia, Valores_Referencia, En_Dos_Tablas,CaracteristicaExamen, Valores_Referencia_Filtrado,       Arreglo_Mas_Informacion,Formulas, examenrelacion_id, detalle_id) 
                                VALUES ('$idOperacion', '$cliente_id', '$usuario_id',            '$id_examen', '$Nombre','$Unidades_Referencia','$Valores_Referencia_Caracteristica','$En_Dos_Tablas','Si', '$Valores_Referencia_Filtrado',     '$Datos','$Formulas', '$idExamenCargado', '$id_detallefactura');");
                    }
                }
                else{

                    mysqli_query($conn3, "INSERT INTO LB_ExamenCargado (idOperacion, cliente_id, usuario_id,            examen_id, Nombre, Metodo, Unidades_Referencia, Valores_Referencia,  En_Dos_Tablas, Valores_Referencia_Filtrado,Interpretacion,      Arreglo_Mas_Informacion,Formulas) 
                                VALUES ('$idOperacion', '$cliente_id', '$usuario_id',            '$id_examen', '$Nombre', '$Metodo' ,'$Unidades_Referencia','$Valores_Referencia','$En_Dos_Tablas', '$Valores_Referencia_Filtrado','$Interpretacion',     '$Datos','$Formulas');");
                    $idExamenCargado  = mysqli_insert_id($conn3);
                    //update
                    mysqli_query($conn3, "UPDATE LB_ExamenCargado SET examenrelacion_id = '$idExamenCargado', detalle_id = '$id_detallefactura' where id = '$idExamenCargado';");    
                }
            
    
            }

        }
        
    }
    
    
    $Subtotal_operacion = $_POST["Subtotal_operacion"]; //Subtotal de los productos

    $queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $usuario_id");
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $impuestoF = $rowMotorizado['impuestoF'];
    }

    if ($impuestoF > 0) {
        $impuestoF2 = $impuestoF / 100;
        $total1 =  $Subtotal_operacion * $impuestoF2;
        $total =  $total1 + $Subtotal_operacion;
    } else {
        $total =  $Subtotal_operacion;
    }

    $queryList = mysqli_query($conn3, "SELECT SUM(cantidad) as sumCantidad  from   sDetalleOper  where idOperacion = $idOperacion AND Tipo_Producto='Laboratorio' AND estado='1' order by id");
    $nrowl = mysqli_num_rows($queryList);
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $sumCantidad    = $rowMotorizado['sumCantidad'];
    }

    //$cantidad_productos = $_POST["cantidad_productos"]; //total de las cantidades
    $cantidad_productos = $sumCantidad;
    $CheckDescuento = $_POST["Check_Descuento"]; //Check de descuento Numerico/Porcentaje
    $Descuento_operacion = $_POST["Descuento_operacion"]; //Monto Decuento
    $MontoPagado_operacion = $_POST["MontoPagado_operacion"]; //Monto Pagado
    $subBase = $_POST["Subtotal_operacion"];

    switch ($CheckDescuento) {
        case "Numerico":
            $total = $total-$Descuento_operacion;
            break;
        case "Porcentaje":
            $DescuentoNumerico = $total*($Descuento_operacion/100);
            $total = $total - $DescuentoNumerico;
            break;
    }

    mysqli_query($conn3, "UPDATE sOperacionInv SET totalBruto='$subBase',totalNeto='$total',cantidadProduc='$cantidad_productos',Tipo_Descuento='$CheckDescuento',descuentos='$Descuento_operacion',montoPagado='$MontoPagado_operacion', impuesto='$impuestoF' WHERE idOperacion='$idOperacion'");

    echo "<script language='Javascript'> window.location='LB_EditarOrden?idOperacion=$idOperacion'</script>";
}

///////////////////////////////////////////////////////////////////////////// eliminar el presupuesto /////////////////////////////////////////////////////////////////////////////



if (isset($_GET['idOperacionBorrar']) and isset($_GET['idDetalleOper'])) {
    $idOperacion = $_GET['idOperacionBorrar'];
    $idDetalleOper = $_GET['idDetalleOper'];

    $idProducto = funcionMaster($idDetalleOper, 'id', 'idProducto', 'sDetalleOper');
    //mysqli_query($conn3, "DELETE FROM sDetalleOper where id= '$idDetalleOper' AND idOperacion='$idOperacion' limit 1");
    //mysqli_query($conn3, "DELETE FROM LB_ExamenCargado where examen_id= '$idProducto' AND idOperacion='$idOperacion' AND detalle_id='$idDetalleOper'");

    mysqli_query($conn3, "UPDATE sDetalleOper set estado = 0 WHERE  id= '$idDetalleOper' AND idOperacion='$idOperacion' limit 1");
    mysqli_query($conn3, "UPDATE LB_ExamenCargado set Activo = 0 WHERE  examen_id= '$idProducto' AND idOperacion='$idOperacion' AND detalle_id='$idDetalleOper'");

    $queryList = mysqli_query($conn3, "SELECT SUM(base) as sumBase, SUM(cantidad) as sumCantidad, SUM(subTotal) as sumSubTotal  from   sDetalleOper  where idOperacion = '$idOperacion' AND estado = '1'  order by id ASC ");
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        //$sumBase        = $rowMotorizado['sumBase'];
        $sumCantidad    = $rowMotorizado['sumCantidad'];
        $sumSubTotal    = $rowMotorizado['sumSubTotal'];
    }

    $usuario = $_SESSION['ID'];
    $queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $usuario");
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $impuestoF = $rowMotorizado['impuestoF'];
    }

    if ($impuestoF > 0) {
        $impuestoF2 = $impuestoF / 100;
        $total1 =  $sumSubTotal * $impuestoF2;
        $total =  $total1 + $sumSubTotal;
    } else {
        $total =  $sumSubTotal;
    }

    $queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv where idOperacion = $idOperacion");
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $CheckDescuento = $rowMotorizado["Tipo_Descuento"]; //Check de descuento Numerico/Porcentaje
        $Descuento_operacion = $rowMotorizado["descuentos"]; //Monto Decuento
    
    }
    switch ($CheckDescuento) {
        case "Numerico":
            $total = $total-$Descuento_operacion;
            break;
        case "Porcentaje":
            $DescuentoNumerico = $total*($Descuento_operacion/100);
            $total = $total - $DescuentoNumerico;
            break;
    }

    mysqli_query($conn3, "UPDATE sOperacionInv SET  totalNeto = '$total', totalBruto = '$sumSubTotal',  cantidadProduc = '$sumCantidad', impuesto='$impuestoF' where idOperacion = '$idOperacion'");
    //echo "UPDATE sOperacionInv SET  totalNeto = '$total', totalBruto = '$sumSubTotal',  cantidadProduc = '$sumCantidad' where idOperacion = '$idOperacion'";
    echo "<script language='Javascript'> window.location='LB_EditarOrden?idOperacion=$idOperacion'</script>";
}
#Cierre
if ($_GET["msg"] != "") {
    include "plugins/SweetAlert2K/AlertaCorrectaOperacion.php";
}
if ($_GET["error"] != "") {
    include "plugins/SweetAlert2K/AlertaErrorOperacion.php";
}

$arreglo_categoria="";
$QueryCategoria = mysqli_query($conn3, "SELECT * FROM LB_Categoria where Activo=1");
while ($RowCategoria = mysqli_fetch_array($QueryCategoria)) {
    $id1 = $RowCategoria['id'];
    $Nombre = $RowCategoria['Nombre'];
    $arreglo_categoria .= "<option value='$id1'> $Nombre </option>";
}

$usuario_id = $_SESSION['ID'];
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
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> Editar Orden </a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="content">
                <h4 class="Titulo_Pagina">Editar Orden</h4>
                <div class="box">
                    <div class="box-body">

                        <div class="col-md-12">
                            <div class="col-md-4" style="text-align-last: center;">
                                <h2 style="width: fit-content;">
                                    <?php echo $Logo ?>
                                </h2>
                            </div>
                            <div class="col-md-8" style="text-align-last: center;">
                                <!--
                                <h2 class="page-header" style="font-size: 25px;"><br>
                                    <small class="pull-center"><?php echo $header ?></small>
                                    <small class="pull-center"> <?php echo $ciudad ?></small>
                                    <small class="pull-center"><?php echo $ciudadPaisF ?></small>
                                    <small class="pull-center"><?php echo $emailF ?></small>
                                </h2>
                                -->
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="col-xs-6" style="text-align-last: center;">
                                <h1 class="page-header" style="font-size: 30px;">
                                    Orden de Laboratorio #<?php echo $idOperacion ?>
                                </h1>
                            </div>

                            <div class="col-xs-6">
                                <h2 class="page-header" style="font-size: 20px;">
                                    <small class="pull-center"><strong>Fecha :</strong> <?php echo $fechaOperacion ?></small>
                                    <small class="pull-center"><strong>Usuario :</strong> <?php echo $NOMBRE_USUARIO ?></small>
                                </h2>
                            </div>
                        </div>

                        <div class="col-md-12">

                            <div class="col-md-6 invoice-col" style="font-size: 14px;">
                                <address>
                                    <strong>Id Paciente </strong><?php echo $idCliente ?><br>
                                    <strong>Nombres </strong><?php echo $nombre_cliente ?><br>
                                    <strong>Cédula </strong><?php echo $CODI_CLIENTE ?><br>
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-md-6 invoice-col" style="font-size: 14px;">
                                <address>
                                    <strong>Ciudad </strong><?php echo $ciudad_cliente ?><br>
                                    <strong>Dirección </strong><?php echo $direccion_cliente ?><br>
                                    <strong>Teléfonos </strong><?php echo $telefono_cliente ?><br>
                                </address>
                            </div>

                            <div class="col-md-12">
                                <hr style="border-top: 1px solid #000;">
                                <br>
                                <label style="color:red;text-align:center;width: 100%;"> Importante: Si Edita la Cantidad o el Examen que Ya se Encuentra Registrado, Se Eliminaran Todos los Resultados que Hayan Ingresado Para ese Examen</label>
                            </div>
                        </div>

                        <button onclick="AnadirProducto()" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">Agregar Producto</button>
                        <form action="LB_EditarOrden?idOperacion=<?php echo $idOperacion; ?>" method="POST">
                            <div class="box-body">
                                <div class="box-body table-responsive no-padding">
                                    <table id="exampl" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th width='25%'>
                                                    <div align="center">Categorías</div>
                                                </th>
                                                <th>
                                                    <div align="center">Exámenes</div>
                                                </th>
                                                <th>
                                                    <div align="center">Precio</div>
                                                </th>
                                                <th>
                                                    <div align="center">Cantidad</div>
                                                </th>
                                                <th>
                                                    <div align="center">Subtotal</div>
                                                </th>
                                                <th style="width: 5%;">
                                                    <div align="center"> Acciones </div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $resultados = mysqli_query($conn3, "SELECT * FROM sDetalleOper where idOperacion=$idOperacion AND estado = '1' order by id asc");
                                            $nrow = mysqli_num_rows($resultados);
                                            while ($res = mysqli_fetch_array($resultados)) {
                                                $Numero++;
                                                $id = $res["id"];

                                                $idproducto = $res["idProducto"];
                                                $descripcion = $res["descripcion"];
                                                $subTotal = $res["subTotal"];
                                                $precio = $res["base"];
                                                $cantidad = $res["cantidad"];

                                                echo "<tr>
                                                <td  width='5%'>{$Numero}</td>";

                                                $idcategoria = funcionMaster($idproducto, 'id', 'categoria_id', 'LB_Examen');
                                                $nombrecategoria = funcionMaster($idcategoria, 'id', 'Nombre', 'LB_Categoria');
                                                echo "<td width='15%'><div align='Right'>
                                                <label>Categorías</label>
                                                <select name='ProductoInfoAparte[{$Numero}][idCategoria]' id='idCategoria_{$Numero}'class='form-control select2' style='width: 100%;' required='required' onChange='BuscarExamen(this.value,{$Numero});'>
                                                    <option value='{$idcategoria}' selected='selected'>{$nombrecategoria} </option>";

                                                $arreglo_categoria = "";
                                                $QueryCategoria = mysqli_query($conn3, "SELECT * FROM LB_Categoria where Activo=1");
                                                while ($RowCategoria = mysqli_fetch_array($QueryCategoria)) {
                                                    $id1 = $RowCategoria['id'];
                                                    $Nombre = $RowCategoria['Nombre'];
                                                    $arreglo_categoria .= "<option value='$id1'> $Nombre </option>";
                                                }
                                                echo $arreglo_categoria;

                                                echo "</select>
                                            </div></td>";

                                                echo "<td width='15%'><div align='Right'>
                                                <label>Examenes</label>
                                                <select name='Producto[{$Numero}][idProducto]' id='idProducto_{$Numero}'class='form-control select2' style='width: 100%;' required='required' onChange='CargarPrecio(this.value,{$Numero});'>
                                                    <option value='{$idproducto}' selected='selected'>{$descripcion} </option>";

                                                $arregloExamenes = "";
                                                $queryList = mysqli_query($conn3, "SELECT * FROM LB_Examen where Activo=1 AND categoria_id='{$idcategoria}'");
                                                while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                                                    $id1           = $row_recordset32['id'];
                                                    $Nombre       = $row_recordset32['Nombre'];

                                                    $arregloExamenes .= "<option value='{$id1}'>{$Nombre} </option>";
                                                }
                                                echo $arregloExamenes;

                                                echo "</select>
                                            </div></td>";

                                            echo "<td width='10%'><div align='Right'>
                                                <label>Precio</label>
                                                <input type='number' class='form-control input-lg base' name='Producto[{$Numero}][base]' id='precio_{$Numero}' oninput='CalcularSubtotal($Numero)'placeholder='Precio' step='0.01' value='{$precio}' maxlength='11' oninput='if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'>
                                            </div></td>";

                                            echo "<td width='10%'><div align='Right'>
                                                <label>Cantidad</label>
                                                <input type='number' class='form-control input-lg cantidad' name='Producto[{$Numero}][cantidad]' id='cantidad_{$Numero}' oninput='CalcularSubtotal($Numero)'placeholder='Cantidad' step='1' min='1' value='{$cantidad}' maxlength='11' oninput='if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'>
                                            </div></td>";

                                                echo "<td width='10%'><div align='Right'>
                                                <label>Subtotal</label>
                                                <input type='number' class='form-control input-lg subtotal' name='Producto[{$Numero}][subTotal]' id='subTotal_{$Numero}' placeholder='Subtotal' step='0.01' min='0' value='{$subTotal}' maxlength='11' oninput='if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);' data-readonly_P>
                                            </div></td>";

                                                echo "<input  type='hidden' name='Producto[{$Numero}][id]' value='{$id}'>";

                                                echo "<td width='5%'><div align='center'>
                                                <button type='button' class='btn btn-block btn-outline-danger btn-lg rounded-pill shadow' style='margin-top: 25px;padding: 10px 10px 10px 10px;font-size: 15px;'><a style='color:red;' href='LB_EditarOrden?idOperacionBorrar={$idOperacion}&idDetalleOper={$id}'><i class='fa fa-times'></i> Eliminar Examen</a></button>
                                            </div></td>";

                                                $total = $total + $subTotal;
                                            }
                                            ?>
                                        </tbody>
                                        <tbody id="productos_nuevos">

                                        </tbody>
                                        <tbody>
                                            <tr>
                                                <td colspan="4"></td>
                                                <td colspan="1">
                                                    <div align='Right'>Subtotal :</div>
                                                </td>
                                                <td colspan="1"><input type="number" name="Subtotal_operacion" id="Subtotal_operacion" class='form-control input-lg' readonly value="<?php echo $total ?>">
                                                <td colspan="1"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="4"></td>
                                                <td colspan="1">
                                                    <div align='Right'>Tipo Descuento :</div>
                                                </td>
                                                <td colspan="1">
                                                    <!--crear dos checkbox uno con descuento numero y otro con descuento porcentual y un label que diga el valor del descuento-->
                                                    <label style="font-size:10px;left: 20px;position: relative;">Numérico
                                                        <input type="checkbox" class="checkbox" value="Numerico" name="Check_Descuento" id="Descuento_Numerico" onclick="CheckGroup(this), calculoDescuento()" <?php if($Tipo_Descuento=="Numerico"){echo "checked";} ?> />
                                                        <label for="Descuento_Numerico" class="check-box" style="zoom: 0.2;bottom: -20px;left: 40px;"></label>
                                                    </label>
                                                    <label style="font-size:10px;left: 40px;position: relative;">Porcentaje
                                                        <input type="checkbox" class="checkbox" value="Porcentaje" name="Check_Descuento" id="Descuento_Porcentaje" onclick="CheckGroup(this), calculoDescuento()" <?php if($Tipo_Descuento=="Porcentaje"){echo "checked";} ?>  />
                                                        <label for="Descuento_Porcentaje" class="check-box" style="zoom: 0.2;bottom: -20px;left: 40px;"></label>
                                                    </label>
                                                    <label style="font-size:15px; left: 60px;position: relative;">
                                                        Totales:
                                                        <span id="calculoDescuento">0</span>
                                                    </label>
                                                    
                                                    <script>
                                                        function CheckGroup(checkbox) {
                                                            var checkboxes = document.getElementsByName('Check_Descuento')
                                                            checkboxes.forEach((item) => {
                                                                if (item !== checkbox) item.checked = false
                                                            })
                                                        }
                                                    </script>

                                                </td>
                                                <td colspan="1"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="4"></td>
                                                <td colspan="1">
                                                    <div align='Right'>Descuento :</div>
                                                </td>
                                                <td colspan="1"><input type="number" name="Descuento_operacion" id="Descuento_operacion" class='form-control input-lg'  onkeyup="calculoDescuento()"  value="<?php echo $descuentos ?>"> 
                                                <script type="text/javascript">
                                                    function calculoDescuento(value = false) {
                                                        let cheked = ($("#Descuento_Numerico").prop("checked") ? $("#Descuento_Numerico") : ($("#Descuento_Porcentaje").prop("checked") ? $("#Descuento_Porcentaje") : ''));
                                                        var monto = 0;
                                                        var totalCalcular = (value != false ? value : $("#Subtotal_operacion").val());
                                                        switch (cheked.val()) {
                                                            case "Numerico":
                                                                monto = (totalCalcular - $("input[name='Descuento_operacion']").val());
                                                                $("#calculoDescuento").text(monto);
                                                                $("input[name='MontoPagado_operacion']").val(monto);
                                                                $("ïnput[name='MontoPagado_operacion']").attr("max", monto);
                                                                break;
                                                            case "Porcentaje":
                                                                monto = (totalCalcular - ((totalCalcular * $("input[name='Descuento_operacion']").val()) / 100));
                                                                $("#calculoDescuento").text(monto);
                                                                $("input[name='MontoPagado_operacion']").val(monto);
                                                                $("input[name='MontoPagado_operacion']" ).attr("max", monto);
                                                                break;
                                                            default:
                                                                $("#calculoDescuento").text("0");
                                                                break;
                                                        }
                                                    }
                                                </script>
                                                </td>
                                                <td colspan="1"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="4"></td>
                                                <td colspan="1">
                                                    <div align='Right'>Monto Pagado :</div>
                                                </td>
                                                <td colspan="1"><input type="number" step="0.01" name="MontoPagado_operacion" id="MontoPagado_operacion" class='form-control input-lg'  value="<?php echo $montoPagado ?>"></td>
                                                <td colspan="1"></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <input type="hidden" name="cantidad_productos" id="cantidad_productos" value="<?php echo $Numero ?>">

                                    <input type="hidden" name="idOperacion" value="<?php echo $idOperacion ?>">
                                    <input type="hidden" name="usuario_id" value="<?php echo $_SESSION['ID'] ?>">
                                    <input type="hidden" name="cliente_id" value="<?php echo $idCliente ?>">
                                    <br>
                                    <hr>
                                    <center><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" name="Actualizar_Presupuesto">
                                            <h2> <strong> A c t u a l i z a r </strong> </h2>
                                        </button></center>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include 'footer.php';

?>
<script>
    function BuscarExamen(valor, input) {
        $.ajax({
            type: "POST",
            url: "LB_Ajax.php",
            data: {
                Categoria: valor,
                Tipo: "Factura Examen"
            },
            success: function(response) {
                $('#idProducto_' + input).html(response);
            }
        });
    }

    function CargarPrecio(valor, input) {
        $.ajax({
            type: "POST",
            url: "LB_Ajax.php",
            data: {
                Examen: valor,
                Tipo: "Precio Examen"
            },
            success: function(response) {
                $('#precio_' + input).val(response);
                CalcularSubtotal(input)
                Totalizar();
            }
        });
    }

    function Totalizar() {
        var valor_subtotal = 0;
        tabcontent = document.getElementsByClassName("subtotal");
        for (i = 0; i < tabcontent.length; i++) {
            valor_subtotal = Number(valor_subtotal) + Number(tabcontent[i].value);
        }
        document.getElementById("Subtotal_operacion").value = valor_subtotal;

    }
</script>
<script>
    function AnadirProducto() {
        var table = document.getElementById("productos_nuevos");
        var cantidad_tr = table.getElementsByTagName('tr').length;
        var cantidad_productos = Number(document.getElementById("cantidad_productos").value);
        cantidad_productos = cantidad_productos + 1;
        var row = table.insertRow(cantidad_tr);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);
        var cell6 = row.insertCell(5);
        var cell7 = row.insertCell(6);

        cell1.innerHTML = cantidad_productos;
        cell2.innerHTML = "<div align='Right'><label>Categorías</label><select  name='ProductoInfoAparte_Adicional[" + cantidad_productos + "][idCategoria]'  id='idCategoria_" + cantidad_productos + "'  class='form-control select2' style='width: 100%;' onchange='BuscarExamen(this.value," + cantidad_productos + ")' required><option value='' selected='selected'>Seleccione.. </option><?php echo $arreglo_categoria; ?></select></div>";
        cell3.innerHTML = "<div align='Right'><label>Examen</label><select  name='Producto_Adicional[" + cantidad_productos + "][idProducto]'  id='idProducto_" + cantidad_productos + "'  class='form-control select2' style='width: 100%;' onchange='CargarPrecio(this.value," + cantidad_productos + ")' required><option value='' selected='selected'>Seleccione.. </option></select></div>";

        cell4.innerHTML = "<div align='Right'><label>Precio</label><input type='number' name='Producto_Adicional[" + cantidad_productos + "][base]' id='precio_" + cantidad_productos + "' oninput='CalcularSubtotal("+cantidad_productos+")' class='form-control input-lg base'  step='0.01' required placeholder='Precio' maxlength='11' oninput='if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'></div>";
        cell5.innerHTML = "<div align='Right'><label>Cantidad</label><input type='number' name='Producto_Adicional[" + cantidad_productos + "][cantidad]' id='cantidad_" + cantidad_productos + "' oninput='CalcularSubtotal("+cantidad_productos+")' class='form-control input-lg cantidad'  step='1' required placeholder='Cantidad' maxlength='11' oninput='if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'></div>";
        
        cell6.innerHTML = "<div align='Right'><label>Subtotal</label><input type='number' name='Producto_Adicional[" + cantidad_productos + "][subTotal]' id='subTotal_" + cantidad_productos + "' class='form-control input-lg subtotal'  step='0.01' required placeholder='Subtotal' min='0' maxlength='11' oninput='if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);' data-readonly_P></div>";
        cell7.innerHTML = "<div align='center'><button type='button' class='btn btn-block btn-outline-info btn-lg rounded-pill shadow' style='margin-top: 25px;padding: 10px 10px 10px 10px;font-size: 15px;'><a onclick='delete_row(this)'><i class='fa fa-times' style='color:red'> Eliminar Examen</i></a> </button></div>";
        cell5.style.textAlign = "center";

        document.getElementById("cantidad_productos").value = cantidad_productos;

        //jquery
        $('#idProducto_' + cantidad_productos).select2();
        $('#idCategoria_' + cantidad_productos).select2();

        $(".subtotal").change(function() {
            Totalizar();
        });
    }

    function delete_row(e) {
        e.parentNode.parentNode.parentNode.parentNode.parentNode.removeChild(e.parentNode.parentNode.parentNode.parentNode);
        Totalizar();
    }

    $(".subtotal").change(function() {
        Totalizar();
    });

    function CalcularSubtotal(Numero){

        var precio = Number(document.getElementById("precio_"+Numero).value);
        var cantidad = Number(document.getElementById("cantidad_"+Numero).value);

        var Total = precio*cantidad;

        document.getElementById("subTotal_"+Numero).value = Number.isInteger(Total) ? Total : Total.toFixed(2)
        Totalizar();
    }
</script>