<?php
include("funciones/conn3.php");

function funcionMaster($filtro, $campoFiltrar, $campoImprimir, $tabla)
{
    include 'funciones/conn3.php';
    $query = mysqli_query($conn3, "SELECT * FROM $tabla where $campoFiltrar = '$filtro'");
    $nrowl = mysqli_num_rows($query);
    while ($row = mysqli_fetch_array($query)) {

        $text = $row[$campoImprimir];
    }
    return  $text;
}

function DatosIngresarMysqli($valor)
{
	include "funciones/conn3.php";
	foreach ($valor as $key => $value) {
		if (is_array($value)) {
			$Arreglo[$key] = DatosIngresarMysqli($value);
		} else {
			$Arreglo[$key] = mysqli_real_escape_string($conn3, $value);
		}
	}
	return $Arreglo;
}




function CrearDetalleTabla(){

    include "funciones/conn3.php";

    //Campos para la Facturacion de la entidad
    //`entidad_id` text DEFAULT '0' COMMENT '0-> facturas clientes / !0 [Diferente de 0] facturas empresas',
    //`Estado_Detalle_Entidad` text DEFAULT '' COMMENT 'Solo aplica para facturar este detalle a una empresa |0 -> No Procesada | 1-> En Proceso | 2-> Procesado'
    $CamposDetalles = "(
        `id` int(11) NOT NULL,
        `idOperacion` int(11) NOT NULL,
        `fechaRegistro` timestamp NOT NULL DEFAULT current_timestamp(),
        `producto_id` int(11) NOT NULL,
        `Descripcion` text NOT NULL,
        `Base` text NOT NULL,
        `Cantidad` text NOT NULL,
        `TotalBase` text NOT NULL,

        `Iva` text DEFAULT '0' COMMENT 'iva en texto ingresado',
        `Monto_Iva` text DEFAULT '0' COMMENT 'valor numerico del iva',
        
        `Subtotal` text NOT NULL COMMENT 'valor aplicando Base*Cantidad+Iva',
        `Descuento` text DEFAULT '0' COMMENT 'descuento en texto ingresado',
        `Monto_Descuento` text DEFAULT '0' COMMENT 'valor numerico del descuento',

        `TotalDetalle` text NOT NULL COMMENT 'valor total aplicando impuestos y luego descuentos',
        
        `Copago` text DEFAULT '' COMMENT 'vacio -> no aplica Copago | solo se usa en productos salidos de tarifas [entidad/contrato]',
        `Mas_Informacion` text DEFAULT '' COMMENT 'Mas informacion para el detalle de la operacion',
        `Tipo_Detalle` text DEFAULT '0' COMMENT '0 -> Detalle del inventario | 1 -> Detalle de Tarifa | 2 -> Detalle Abierto  | 3 -> Detalle Entidad/Convenio',

        `Nota_Credito` text DEFAULT '0' COMMENT '1-> al detalle se le hizo una nota credito',
        `tarifa_id` text DEFAULT '0' COMMENT 'tarifas de la entidad/convenio asociado al cliente',
        `usuario_id` int(11) NOT NULL,
        `cliente_id` int(11) NOT NULL,
        `entidad_id` text DEFAULT '0' COMMENT '',
        `convenio_id` text DEFAULT '0' COMMENT '',
        `Tipo_Factura` text DEFAULT '' COMMENT '1-> Detalles de Factura Clientes / 2-> Detalles de Factura Entidades',

        `Estado_Detalle_Entidad` text DEFAULT '' COMMENT 'Solo aplica para facturar este detalle a una empresa |0 -> No Procesada | 1-> En Proceso | 2-> Procesado',
        `Tipo_Producto` TEXT DEFAULT '0'  COMMENT '0 -> Inventario/Tarifas | 1-> Laboratorio/Tarifas | ',
        `Detalle_Origen` TEXT DEFAULT '0'  COMMENT ' Solo aplica para relacionar el detalle actual con uno de origen y aplica para los detalles de la devolucion y los detalles creados/cargados por la entidad para los contratos  tipo paquete/lote'
      ) ENGINE=MyISAM DEFAULT CHARSET=latin1;";

$tabla = mysqli_query($conn3, "SHOW TABLES LIKE 'FE_DetallesOperacion_Temp'");
$nrowtabla = mysqli_num_rows($tabla);
if ($nrowtabla == 0) {
    $query = "CREATE TABLE `FE_DetallesOperacion_Temp` {$CamposDetalles}";
    $creaciontabla = mysqli_query($conn3, $query);
    if (!$creaciontabla) {
        echo "error en la creacion de la tabla temp";
        exit();
    } else {
        mysqli_query($conn3, "ALTER TABLE `FE_DetallesOperacion_Temp` ADD PRIMARY KEY (`id`);");
        mysqli_query($conn3, "ALTER TABLE `FE_DetallesOperacion_Temp` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;");
    }
}

$tabla = mysqli_query($conn3, "SHOW TABLES LIKE 'FE_DetallesOperacion'");
$nrowtabla = mysqli_num_rows($tabla);
if ($nrowtabla == 0) {
    $query = "CREATE TABLE `FE_DetallesOperacion` {$CamposDetalles}";
    $creaciontabla = mysqli_query($conn3, $query);
    if (!$creaciontabla) {
        echo "error en la creacion de la tabla";
        exit();
    } else {
        mysqli_query($conn3, "ALTER TABLE `FE_DetallesOperacion` ADD PRIMARY KEY (`id`);");
        mysqli_query($conn3, "ALTER TABLE `FE_DetallesOperacion` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;");
    }
}

}













///////////////////////////////////////////////////////////////////////registro de informacion de facturacion del paciente//////////////////////////////////////////////////////////////////////////////////////////////

if ($_POST["Tipo_Consulta"] == "Busqueda Convenio") {

    $hoy = date("Y-m-d");
    $entidad_id = $_POST["valor"];
    if($entidad_id == 0 ){
        echo "<option value='0'>Ninguno</option>";
    }else{
        $QueryConvenio = mysqli_query($conn3, "SELECT * FROM Rips_Convenio WHERE entidad_id = '{$entidad_id}' AND Activo = 1");
        while ($RowConvenio= mysqli_fetch_array($QueryConvenio)) {
            $id= $RowConvenio['id'];
            $Nombre= $RowConvenio['Nombre'];

            $ArregloConvenios[$id]="Existe";

        }

        /*
        $QueryConvenio = mysqli_query($conn3, "SELECT * FROM FE_Convenios WHERE entidad_id = '{$entidad_id}' AND Activo = 1 AND (Fecha_Inicio <= '$hoy'
        AND Fecha_Caducidad >= '$hoy')");
        while ($RowConvenio= mysqli_fetch_array($QueryConvenio)) {
            $id= $RowConvenio['id'];
            $Nombre= $RowConvenio['Nombre'];

            if(isset($ArregloConvenios[$id])){
                $ArregloConvenios[$id]="Activo";
            }
            //echo "<option value='$id'>".$Nombre."</option>";
        }
        */

        foreach ($ArregloConvenios as $key => $value) {
            $Nombre = funcionMaster($key,'id','Nombre','Rips_Convenio');
            //if($value=="Activo"){
                echo "<option value='$key'>".$Nombre."</option>";
            //}else{
            //    echo "<option value='$key' disabled style='color:salmon;'>".$Nombre."</option>";
            //}
        }
    }
    
}


elseif($_POST["Tipo_Consulta"] == "Busqueda Departamento")
{   
    // cambiar el charset de la conexion
    mysqli_set_charset($connFE,"utf8");
    $pais = $_POST["valor"];

    echo '<div class="form-group col-md-12">
        <div align="left"> Departamento </div>
        <select  id="fe_departamento" name="Arreglo[fe_departamento]" class="form-control input-lg select" style="width: 100%;" onchange="Buscar_Municipio()" required>
            <option value="" selected="selected">Seleccione</option>';

            $queryList = mysqli_query($connFE, "SELECT * FROM  fe_departamento");
            while ($RowCamposFacturacion = mysqli_fetch_array($queryList)) {
                echo "<option value='$RowCamposFacturacion[codigo]'> $RowCamposFacturacion[nombre]</option>";
            }
        echo'</select></div>'; 
}





elseif($_POST["Tipo_Consulta"] == "Busqueda Municipio")
{
    // cambiar el charset de la conexion
    mysqli_set_charset($connFE,"utf8");

    $departamento = $_POST["valor"];
        echo '<div class="form-group col-md-12">
        <div align="left"> Municipio </div>
        <select  id="fe_municipio" name="Arreglo[fe_municipio]" class="form-control input-lg select" style="width: 100%;" required>
            <option value="" selected="selected">Seleccione</option>';

            $queryList = mysqli_query($connFE, "SELECT * FROM  fe_municipio WHERE codigo_departamento='$departamento' ");
            while ($RowCamposFacturacion = mysqli_fetch_array($queryList)) {
                echo "<option value='$RowCamposFacturacion[codigo_municipio]'> $RowCamposFacturacion[nombre_municipio]</option>";
            }
        echo'</select></div>';
}





//////////////////////////////////////////////////////////////////////funciones para la facturacion por cliente ///////////////////////////////////////////////////////////////////////////////////////////////





elseif($_POST["Tipo_Consulta"] == "Precio Inventario")
{
    $producto_id = $_POST["producto_id"];

    $QueryTarifa = mysqli_query($conn3, "SELECT * FROM sinvetrios WHERE ID = '{$producto_id}'");
    while ($RowTarifa= mysqli_fetch_array($QueryTarifa)) {
        $Precio = $RowTarifa['precio'];
    }

    if($producto_id!=""){
        echo round($Precio,2);
    }else{
        echo "";
    }
    
}





elseif($_POST["Tipo_Consulta"] == "Precio Tarifa")
{
    $Tarifa_id = $_POST["Tarifa_id"];

    $QueryTarifa = mysqli_query($conn3, "SELECT * FROM FE_Tarifas WHERE id = '{$Tarifa_id}'");
    while ($RowTarifa= mysqli_fetch_array($QueryTarifa)) {
        $Valor = $RowTarifa['Valor'];
        $Copago = $RowTarifa['Copago'];
    
        $Precio = $Valor*($Copago/100);
    }

    if($Tarifa_id!=""){
        echo round($Precio,2);
    }else{
        echo "";
    }
    
}


//////////////////////////////////////////?                                           ////////////////////////////////////////////////////
//////////////////////////////////////////? Facturacion del Inventario               ////////////////////////////////////////////////////
//////////////////////////////////////////?                                           ////////////////////////////////////////////////////


elseif($_POST["Tipo_Consulta"] == "Agregar Detalle Factura Cliente"){

    date_default_timezone_set('America/Bogota');
    CrearDetalleTabla();//por si no esta creado la tabla de detalles temp y detalles

    $entidad_id = $_POST['entidad_id'];
    $convenio_id = $_POST['convenio_id'];


    $idOperacion = 0;
    $fechaRegistro = date("Y-m-d H:i:s");

    if($_POST['tarifa_id']!=""){
        $tarifa_id = $_POST['tarifa_id'];
        $producto_id = funcionMaster($tarifa_id, 'id', 'inventario_id', 'FE_Tarifas');
        $Descripcion = mysqli_real_escape_string($conn3, funcionMaster($producto_id, 'ID', 'descripcion', 'sinvetrios'));
    }elseif($_POST['producto_id']!=""){
        $tarifa_id = "0";
        $producto_id = $_POST['producto_id'];
        $Descripcion = mysqli_real_escape_string($conn3, funcionMaster($producto_id, 'ID', 'descripcion', 'sinvetrios'));
    }elseif($_POST['producto_id']=="" AND $_POST['tarifa_id']==""){
        $tarifa_id = "0";
        $producto_id = "0";
        $Descripcion = mysqli_real_escape_string($conn3,$_POST['producto_libre']);
        $convenio_id="0";
    }
    
    $Base = $_POST['Base'];
    $Cantidad = $_POST['Cantidad'];
    $TotalBase = round($Base * $Cantidad,2);

    $Iva = $_POST['Iva'];
    $Monto_Iva = round($TotalBase * ($Iva/100),2);
    $Subtotal = $TotalBase+$Monto_Iva;


    $Descuento = $_POST['Descuento'];
    $Monto_Descuento=0;
    if (strpos($Descuento, '%') !== false) {
        $Descuento_Texto =  str_replace("%", "", "$Descuento");
        $Monto_Descuento = round(($Subtotal * ($Descuento_Texto / 100)), 2);
    } else {
        $Monto_Descuento = round($Descuento,2);
    }
    $TotalDetalle = round($Subtotal - $Monto_Descuento,2);

    if($TotalDetalle<0){
        echo "Error al Registrar el Detalle , Valor total Negativo";
        exit();
    }
    $Copago = funcionMaster($tarifa_id, 'id', 'Copago', 'FE_Tarifas');

    $usuario_id = $_POST['usuario_id'];
    $cliente_id = $_POST['cliente_id'];

    $queryList = mysqli_query($conn3, "SELECT * FROM sinvetrios WHERE ID = '$producto_id' limit 1");
    while ($RowInventario = mysqli_fetch_array($queryList)) {
        $Inventario_Descripcion  = mysqli_real_escape_string($conn3, $RowInventario['descripcion']);
        $Inventario_Referencia  = mysqli_real_escape_string($conn3, $RowInventario['referencia']);
        $Inventario_Precio  = $RowInventario['precio'];
    }

    $queryList = mysqli_query($conn3, "SELECT * FROM FE_Tarifas WHERE id = '$tarifa_id' limit 1");
    while ($RowTarifas = mysqli_fetch_array($queryList)) {
        $Valor_Tarifa = $RowTarifas['Valor'];
    }

    $listado["Inventario_Descripcion"] = $Inventario_Descripcion;
    $listado["Inventario_Referencia"] = $Inventario_Referencia;
    $listado["Inventario_Precio"] = $Inventario_Precio;
    $listado["Tarifa_PrecioTotal"] = $Valor_Tarifa;
    $listafinal = json_encode($listado, JSON_UNESCAPED_UNICODE);


    $Tipo_Detalle = $_POST['Tipo_Detalle'];
    $Tipo_Producto = "0";//0-> Inventario
    $Tipo_Factura = "1";//1->Factura Tipo Cliente


    
    $queryList = mysqli_query($conn3, "INSERT INTO FE_DetallesOperacion_Temp ( idOperacion, fechaRegistro, Producto_id, Descripcion, Base, Cantidad, TotalBase, Iva, Monto_Iva, Subtotal, Descuento, Monto_Descuento,                    TotalDetalle,Copago, tarifa_id, usuario_id, cliente_id,entidad_id, convenio_id,                      Mas_Informacion,Tipo_Detalle,              Tipo_Producto,Tipo_Factura) 
                                                        VALUES ('$idOperacion','$fechaRegistro','$producto_id','$Descripcion','$Base','$Cantidad','$TotalBase', '$Iva', '$Monto_Iva' ,'$Subtotal' ,'$Descuento', '$Monto_Descuento' ,    '$TotalDetalle','$Copago','$tarifa_id','$usuario_id','$cliente_id', '$entidad_id', '$convenio_id',   '$listafinal','$Tipo_Detalle',             '$Tipo_Producto','$Tipo_Factura');");

    if ($queryList != true) {
        echo "Error al Registrar el Detalle";
    }else{
        echo "1";
    }
}




elseif($_POST["Tipo_Consulta"] == "Agregar Paquete Factura Cliente"){

    date_default_timezone_set('America/Bogota');
    CrearDetalleTabla();//por si no esta creado la tabla de detalles temp y detalles

    $paquete_id = $_POST["paquete_id"];
    $entidad_id = $_POST['entidad_id'];
    $convenio_id = $_POST['convenio_id'];//antes convenio_id

    $idOperacion = 0;
    $fechaRegistro = date("Y-m-d H:i:s");

    // se pone en 1 ya que es para solo los productos tipo inventario, el de laboratorio es 2
    $QueryPaquete = mysqli_query($conn3, "SELECT * FROM  FE_Tarifas WHERE paquete_id='$paquete_id' AND convenio_id='{$convenio_id}'");
    while ($rowMotorizado = mysqli_fetch_array($QueryPaquete)) {

        $producto_id = $rowMotorizado['inventario_id'];
        $tarifa_id = $rowMotorizado['id'];
        $Descripcion = mysqli_real_escape_string($conn3, funcionMaster($producto_id, 'ID', 'descripcion', 'sinvetrios'));



        ///////////////////////////////////
        $Valor = $rowMotorizado['Valor'];
        $Copago = $rowMotorizado['Copago'];
        ///////////////////////////////////
        $Precio = $Valor*($Copago/100);
        ///////////////////////////////////
        
        $Base = round($Precio,2);

        $Cantidad = 1;
        $TotalBase = round($Base * $Cantidad,2);

        $Iva = 0;
        $Monto_Iva = round($TotalBase * ($Iva/100),2);
        $Subtotal = $TotalBase+$Monto_Iva;
        

        $Descuento = 0;
        $Monto_Descuento=0;
        $Descuento_Texto="";
        
        $TotalDetalle = round($Subtotal - $Monto_Descuento,2);

        $usuario_id = $_POST['usuario_id'];
        $cliente_id = $_POST['cliente_id'];

        $QueryInventario = mysqli_query($conn3, "SELECT * FROM sinvetrios WHERE ID = '$producto_id' limit 1");
        while ($RowInventario = mysqli_fetch_array($QueryInventario)) {
            $Inventario_Descripcion  = mysqli_real_escape_string($conn3, $RowInventario['descripcion']);
            $Inventario_Referencia  = mysqli_real_escape_string($conn3, $RowInventario['referencia']);
            $Inventario_Precio  = $RowInventario['precio'];
        }

        $QueryTarifa = mysqli_query($conn3, "SELECT * FROM FE_Tarifas WHERE id = '$tarifa_id' limit 1");
        while ($RowTarifas = mysqli_fetch_array($QueryTarifa)) {
            $Valor_Tarifa = $RowTarifas['Valor'];
        }

        $listado["Inventario_Descripcion"] = $Inventario_Descripcion;
        $listado["Inventario_Referencia"] = $Inventario_Referencia;
        $listado["Inventario_Precio"] = $Inventario_Precio;
        $listado["Tarifa_PrecioTotal"] = $Valor_Tarifa;
        $listafinal = json_encode($listado, JSON_UNESCAPED_UNICODE);

        $Tipo_Detalle = $_POST['Tipo_Detalle'];
        $Tipo_Producto = "0";//1-> Inventario
        $Tipo_Factura = "1";//1->Factura Tipo Cliente


        $queryList = mysqli_query($conn3, "INSERT INTO FE_DetallesOperacion_Temp ( idOperacion, fechaRegistro, Producto_id, Descripcion, Base, Cantidad, TotalBase,       Iva, Monto_Iva,          Subtotal, Descuento, Monto_Descuento,                  TotalDetalle,Copago, tarifa_id, usuario_id, cliente_id,entidad_id, convenio_id,                              Mas_Informacion,Tipo_Detalle,            Tipo_Producto,Tipo_Factura) 
                                                            VALUES ('$idOperacion','$fechaRegistro','$producto_id','$Descripcion',   '$Base', '$Cantidad','$TotalBase' , '$Iva', '$Monto_Iva' , '$Subtotal', '$Descuento', '$Monto_Descuento',              '$TotalDetalle' ,'$Copago','$tarifa_id','$usuario_id','$cliente_id', '$entidad_id', '$convenio_id',                  '$listafinal','$Tipo_Detalle',       '$Tipo_Producto','$Tipo_Factura');");
    }
    

    
    
    
    if ($queryList != true) {
        echo "Error al registrar el detalle o el paquete no tiene productos del inventario";
    }else{
        echo "1";
    }
}




elseif($_POST["Tipo_Consulta"] == "Eliminar Detalle Factura")
{
    $Detalle_id = $_POST["Detalle_id"];

    $queryList = mysqli_query($conn3,"DELETE from FE_DetallesOperacion_Temp WHERE id = $Detalle_id LIMIT 1");

    if ($queryList != true) {
        echo "Error al Borrar el Detalle";
    }else{   
        echo "1";
    }

}

elseif($_POST["Tipo_Consulta"] == "Tabla Detalles Factura")
{
    $usuario_id = $_POST['usuario_id'];
    $cliente_id = $_POST['cliente_id'];
    $Tipo_Detalle = $_POST['Tipo_Detalle'];
    
    $convenio_id = $_POST['convenio_id'];
    $TipoContrato = funcionMaster($convenio_id,'id','Tipo_Contrato','FE_Convenios');
        echo "<table id='example1' class='table table-bordered table-striped'>
        <thead>
            <tr>
                <th scope='col'>#</th>";

        if($Tipo_Detalle=="1"){
            echo "<th scope='col' class='centrar' >Copago</th>";
            $ColSpanDetalle="3";
        }else{
            $ColSpanDetalle="2";
        }
                
        echo   "<th scope='col' class='centrar' >Nombre del Producto/Servicio</th>
                <th scope='col' class='centrar' >Precio</th>
                <th scope='col' class='centrar' >Cantidad</th>
                <th scope='col' class='centrar' >Valor</th>
                <th scope='col' class='centrar' >Iva</th>
                <th scope='col' class='centrar' >Subtotal</th>
                <th scope='col' class='centrar' >Descuento</th> 
                <th scope='col' class='centrar' >Total</th>
                <th scope='col' class='centrar' ></th>
            </tr>
        </thead>
        <tbody id='detalles_tabla'>";

        $queryList = mysqli_query($conn3, "SELECT * FROM  FE_DetallesOperacion_Temp WHERE cliente_id='{$cliente_id}' AND usuario_id='{$usuario_id}' AND Tipo_Detalle='{$Tipo_Detalle}' AND Tipo_Producto = '0' AND Tipo_Factura='1' ORDER BY id ASC");
        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
            $contador++;
            $id = $rowMotorizado['id'];
            $Copago = $rowMotorizado['Copago'];
            $Descripcion = $rowMotorizado['Descripcion'];
            $Base = $rowMotorizado['Base'];
            $Cantidad = $rowMotorizado['Cantidad'];
            $TotalBase = $rowMotorizado['TotalBase'];

            $Monto_Iva = $rowMotorizado['Monto_Iva'];
            $Iva  = $rowMotorizado['Iva'];

            $Subtotal = $rowMotorizado['Subtotal'];

            $Monto_Descuento = $rowMotorizado['Monto_Descuento'];
            $Descuento  = $rowMotorizado['Descuento'];

            $Descuento_Texto="";
            if (strpos($Descuento, '%') !== false) {
                $Descuento_Texto = " [ ".$Descuento." ]";
            }

            $TotalDetalle = $rowMotorizado['TotalDetalle'];

            echo "<tr><th scope='row' width='2%'>{$contador}</th>";
            
            if($Tipo_Detalle=="1"){
            echo"<td width='5%' class='centrar'>{$Copago} %</td>";
            }

            echo "<td width='20%' class='centrar'>{$Descripcion}</td>
            <td width='5%' class='centrar'>".number_format($Base, 2, ",", ".")." </td>
            <td width='2%' class='centrar'>".number_format($Cantidad, 2, ",", ".")." </td>
            <td width='5%' class='centrar'>".number_format($TotalBase, 2, ",", ".")." </td>
            <td width='10%' class='centrar'>".number_format($Monto_Iva, 2, ",", ".")." [{$Iva}%] </td>
            <td width='5%' class='centrar'>".number_format($Subtotal, 2, ",", ".")." </td>
            <td width='10%' class='centrar'>".number_format($Monto_Descuento, 2, ",", ".")." {$Descuento_Texto} </td>
            <td width='5%' class='centrar'>".number_format($TotalDetalle, 2, ",", ".")." </td>";

            echo "<td width='2%'> 
                <a href='#' onclick='EliminarDetalle($id)'><i class='fa fa-trash'></i></a>
            </td></tr>";

            $Total_Precio = $Total_Precio + $Base;
            $Total_Cantidad = $Total_Cantidad + $Cantidad;
            $Total_TotalBase = $Total_TotalBase + $TotalBase;
            $Total_Descuento = $Total_Descuento + $Monto_Descuento;
            $Total_Subtotal = $Total_Subtotal + $Subtotal;
            $Total_Iva = $Total_Iva + $Monto_Iva;
            $Total_Factura = $Total_Factura + $TotalDetalle;

        }

        echo "</tbody>
            <tfoot>
            <tr>
                <th colspan='{$ColSpanDetalle}' rowspan='2'>Total</th>
                <th rowspan='2' class='centrar' >".number_format($Total_Precio,2,",",".")." </th>
                <th rowspan='2' class='centrar' >".number_format($Total_Cantidad,2,",",".")." </th>
                <th rowspan='2' class='centrar' >".number_format($Total_TotalBase,2,",",".")." </th>

                <th rowspan='2' class='centrar' >".number_format($Total_Iva,2,",",".")." </th>
                <th rowspan='2' class='centrar' >".number_format($Total_Subtotal,2,",",".")." </th>
                <th rowspan='2' class='centrar' >".number_format($Total_Descuento,2,",",".")." </th>
                <th rowspan='2' class='centrar' >".number_format($Total_Factura,2,",",".")." </th>
                <th rowspan='2' class='centrar' > </th>
            </tr>
            </tfoot>";

        echo "
        </table>";

echo "<style type='text/css'> .centrar { text-align: center;}</style>";

}


elseif ($_POST["Tipo_Consulta"] == "Maximo Monto Pagado"){

    $usuario_id = $_POST['usuario_id'];
    $cliente_id = $_POST['cliente_id'];
    $Tipo_Detalle = $_POST['Tipo_Detalle'];
    $entidad_id = $_POST['entidad_id'];

    $queryList = mysqli_query($conn3, "SELECT SUM(TotalDetalle) as Sum_TotalDetalle FROM  FE_DetallesOperacion_Temp WHERE cliente_id='{$cliente_id}' AND usuario_id='{$usuario_id}' AND Tipo_Detalle='{$Tipo_Detalle}' AND Tipo_Producto = '0' AND entidad_id='{$entidad_id}' AND Tipo_Factura='1' ");
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $MontoAPagar = $rowMotorizado["Sum_TotalDetalle"];
    }

    echo round($MontoAPagar,2);

}


elseif ($_POST["Tipo_Consulta"] == "Ver Examenes Paquete Inventario"){

    $paquete = $_POST['paquete'];

    $QueryTarifa = mysqli_query($conn3, "SELECT * FROM FE_Tarifas WHERE paquete_id = '{$paquete}'");
    while ($RowTarifa= mysqli_fetch_array($QueryTarifa)) {
        $Nombre = funcionMaster($RowTarifa['inventario_id'],'ID','descripcion','sinvetrios');

        echo $Nombre."<br>";
    }

    if($Nombre==""){
        echo "<label style='color:red;'>No hay productos del inventario en el paquete seleccionado</label>";
    }
}



//////////////////////////////////////////?                                           ////////////////////////////////////////////////////
//////////////////////////////////////////? Facturacion del Inventario    FINAL       ////////////////////////////////////////////////////
//////////////////////////////////////////?                                           ////////////////////////////////////////////////////






////////////////////////////////////////////////////////////////////////////tabla que trae la factura realizada solo consultando con el idoperacion/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




elseif($_POST["Tipo_Consulta"] == "Tabla Factura Realizada")
{
    $idOperacion = $_POST['idOperacion'];
    $queryList = mysqli_query($conn3, "SELECT * FROM  FE_Operacion WHERE idOperacion='{$idOperacion}'");
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $Tipo_Detalles = $rowMotorizado['Tipo_Detalles'];
        
        $TotalNeto = $rowMotorizado['TotalNeto'];
        $MontoPago = $rowMotorizado['MontoPago'];

        $Saldo = $TotalNeto - $MontoPago;

        $TipoContrato = funcionMaster($rowMotorizado['convenio_id'],'id','Tipo_Contrato','FE_Convenios');
    }
        echo "<table id='example1' class='table table-bordered table-striped'>
        <thead>
            <tr>
                <th scope='col'>#</th>";

        if($Tipo_Detalles=="1"){
            echo "<th scope='col' class='centrar' >Copago</th>";
            $ColSpanDetalle="3";
        }else{
            $ColSpanDetalle="2";
        }
                
        echo   "<th scope='col' class='centrar' >Nombre del Producto/Servicio</th>
                <th scope='col' class='centrar' >Precio</th>
                <th scope='col' class='centrar' >Cantidad</th>
                <th scope='col' class='centrar' >Valor</th>
                <th scope='col' class='centrar' >Iva</th>
                <th scope='col' class='centrar' >Subtotal</th>
                <th scope='col' class='centrar' >Descuento</th>
                <th scope='col' class='centrar' >Total</th>
            </tr>
        </thead>
        <tbody>";

        $queryList = mysqli_query($conn3, "SELECT * FROM  FE_DetallesOperacion WHERE idOperacion='{$idOperacion}' ORDER BY id ASC");
        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
            $contador++;
            $id = $rowMotorizado['id'];
            $Copago = $rowMotorizado['Copago'];
            $Descripcion = $rowMotorizado['Descripcion'];
            $Base = $rowMotorizado['Base'];
            $Cantidad = $rowMotorizado['Cantidad'];
            $TotalBase = $rowMotorizado['TotalBase'];

            $Monto_Iva = $rowMotorizado['Monto_Iva'];
            $Iva  = $rowMotorizado['Iva'];

            $Subtotal = $rowMotorizado['Subtotal'];

            $Monto_Descuento = $rowMotorizado['Monto_Descuento'];
            $Descuento  = $rowMotorizado['Descuento'];

            $Descuento_Texto="";
            if (strpos($Descuento, '%') !== false) {
                $Descuento_Texto = " [ ".$Descuento." ]";
            }

            $TotalDetalle = $rowMotorizado['TotalDetalle'];

            echo "<tr><th scope='row' width='2%'>{$contador}</th>";
            
            if($Tipo_Detalles=="1"){
            echo"<td width='5%' class='centrar'>{$Copago}</td>";
            }

            echo "<td width='20%' class='centrar'>{$Descripcion}</td>
            <td width='5%' class='centrar'>".number_format($Base, 2, ",", ".")." </td>
            <td width='2%' class='centrar'>".number_format($Cantidad, 2, ",", ".")." </td>
            <td width='5%' class='centrar'>".number_format($TotalBase, 2, ",", ".")." </td>
            <td width='10%' class='centrar'>".number_format($Monto_Iva, 2, ",", ".")."  [{$Iva}%]</td>
            <td width='5%' class='centrar'>".number_format($Subtotal, 2, ",", ".")." </td>
            <td width='10%' class='centrar'>".number_format($Monto_Descuento, 2, ",", ".")."  {$Descuento_Texto}</td>
            <td width='5%' class='centrar'>".number_format($TotalDetalle, 2, ",", ".")." </td>";

            echo "</tr>";

            $Total_Precio = $Total_Precio + $Base;
            $Total_Cantidad = $Total_Cantidad + $Cantidad;
            $Total_TotalBase = $Total_TotalBase + $TotalBase;
            $Total_Descuento = $Total_Descuento + $Monto_Descuento;
            $Total_Subtotal = $Total_Subtotal + $Subtotal;
            $Total_Iva = $Total_Iva + $Monto_Iva;
            $Total_Factura = $Total_Factura + $TotalDetalle;

        }

        echo "</tbody>
            <tfoot>
            <tr>
                <th colspan='{$ColSpanDetalle}' rowspan='2'>Total</th>
                <th rowspan='2' class='centrar' >".number_format($Total_Precio,2,",",".")." </th>
                <th rowspan='2' class='centrar' >".number_format($Total_Cantidad,2,",",".")." </th>
                <th rowspan='2' class='centrar' >".number_format($Total_TotalBase,2,",",".")." </th>

                <th rowspan='2' class='centrar' >".number_format($Total_Iva,2,",",".")." </th>
                <th rowspan='2' class='centrar' >".number_format($Total_Subtotal,2,",",".")." </th>
                <th rowspan='2' class='centrar' >".number_format($Total_Descuento,2,",",".")." </th>
                <th rowspan='2' class='centrar' >".number_format($Total_Factura,2,",",".")." </th>
            </tr>
            </tfoot>
        </table>";

        echo "<div class='table table-bordered table-striped'>
        <table class='table'>
          <tr>
            <td align='right' style='width:80%'><b>Subtotal:</b></td>
            <td align='right'>".number_format($Total_TotalBase,2,",",".")."</td>
          </tr>
          <tr>
            <td align='right' style='width:80%'><b>Impuesto:</b></td>
            <td align='right'>".number_format($Total_Iva,2,",",".")."</td>
          </tr>
          <tr>
            <td align='right' style='width:80%'><b>Descuento:</b></td>
            <td align='right'>".number_format($Total_Descuento,2,",",".")."</td>
          </tr>
          <tr>
            <td align='right' style='width:80%'><b>Total:</b></td>
            <td align='right'>".number_format($Total_Factura,2,",",".")."</td>
          </tr>
          <tr>
            <td align='right' style='width:80%'><b>MontoPagado:</b></td>
            <td align='right'>".number_format($MontoPago,2,",",".")."</td>
          </tr>
          <tr>
            <td align='right' style='width:80%'><b>Saldo:</b></td>
            <td align='right'>".number_format(($Saldo),2,",",".")."</td>
          </tr>
        </table>
        </div>";

echo "<style type='text/css'> .centrar { text-align: center;}</style>";

}










//////////////////////////////////////////////////////////////////////tabla para cuentas x cobrar por cliente///////////////////////////////////////////////////////////////////////////////////////////////







else if($_POST["Tipo_Consulta"] == "Tablas Cuentas Por Cobrar Cliente"){

    $cliente_id = $_POST["cliente_id"];
    $Nombre=funcionMaster($cliente_id,'cliente_id','nombre_cliente','cliente');
    echo "<div class='modal-body'>
            <div class='col-md-12 row table-responsive' >
            <h2>Cuentas x Cobrar del Cliente {$Nombre}</h2>
                <table id='TablaFuncionAjax' class='table table-bordered table-striped'>
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Fecha</th>
                        <th>Total</th>
                        <th>Monto Pagado</th>
                        <th>Monto Pendiente</th>
                        <th>Opcion</th>
                    </tr>
                    </thead>
                    <tbody>";
                
                    $queryList = mysqli_query($conn3, "SELECT * FROM  FE_CuentasxCobrar  WHERE cliente_id = $cliente_id AND Tipo_Operacion = 0  ORDER BY id DESC");
                    $nrowl = mysqli_num_rows($queryList);
                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                        $id = $rowMotorizado['id'];
                        $idOperacion = $rowMotorizado["idOperacion"];
                        $FechaRegistro = $rowMotorizado["FechaRegistro"];
                        $NumeroDocumento = $rowMotorizado["NumeroDocumento"];

                        $MontoPendiente = $rowMotorizado["MontoPendiente"];
                        $TotalFactura = $rowMotorizado["TotalFactura"];
                        $MontoPagado = $rowMotorizado["MontoPagado"];

                        echo"<tr>
                                <td>$idOperacion | # $NumeroDocumento</td>
                                <td>$FechaRegistro</td>
                                <td>$TotalFactura</td>
                                <td>$MontoPagado</td>
                                <td>$MontoPendiente</td>";
                        
                        if($MontoPendiente==0){
                            echo "<td><a title='Visualizar Abono' class='btn btn-block btn-primary' style='background-color:#3cbc52;' href='FE_PagosCuentasCobrar.php?id=$id'><i class='fa-regular fa-rectangle-list'></i><br>Visualizar Abono</a></td>";
                        }else{
                            echo "<td><a title='Generar Abono' class='btn btn-block btn-primary' href='FE_PagosCuentasCobrar.php?id=$id'><i class='fa fa-money'></i><br>Realizar Abono</a></td>";
                        }

                        echo"</tr>";

                    }

    echo "          </tbody>
                </table>
            </div>
        </div>";

    echo "<style>
            @media (min-width: 1492px){
                .modal-lg {
                    width: 1400px;
                }
            }
        </style>
        ";
}


//////////////////////////////////////////////////////////////////////tabla para cuentas x cobrar por entidad///////////////////////////////////////////////////////////////////////////////////////////////







else if($_POST["Tipo_Consulta"] == "Tablas Cuentas Por Cobrar Entidad"){

    $entidad_id = $_POST["entidad_id"];
    $Nombre=mysqli_real_escape_string($conn3, funcionMaster($entidad_id, 'id', 'Nombre', 'FE_Entidades'));
    echo "<div class='modal-body'>
            <div class='col-md-12 row table-responsive' >
            <h2>Cuentas x Cobrar de la Entidad {$Nombre}</h2>
                <table id='TablaFuncionAjax' class='table table-bordered table-striped'>
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Fecha</th>
                        <th>Total</th>
                        <th>Monto Pagado</th>
                        <th>Monto Pendiente</th>
                        <th>Opcion</th>
                    </tr>
                    </thead>
                    <tbody>";
                
                    $queryList = mysqli_query($conn3, "SELECT * FROM  FE_CuentasxCobrar  WHERE entidad_id = $entidad_id AND Tipo_Operacion = 1  ORDER BY id DESC");
                    $nrowl = mysqli_num_rows($queryList);
                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                        $id = $rowMotorizado['id'];
                        $idOperacion = $rowMotorizado["idOperacion"];
                        $FechaRegistro = $rowMotorizado["FechaRegistro"];
                        $NumeroDocumento = $rowMotorizado["NumeroDocumento"];

                        $MontoPendiente = $rowMotorizado["MontoPendiente"];
                        $TotalFactura = $rowMotorizado["TotalFactura"];
                        $MontoPagado = $rowMotorizado["MontoPagado"];

                        echo"<tr>
                                <td>$idOperacion | # $NumeroDocumento</td>
                                <td>$FechaRegistro</td>
                                <td>$TotalFactura</td>
                                <td>$MontoPagado</td>
                                <td>$MontoPendiente</td>";
                        
                        if($MontoPendiente==0){
                            echo "<td><a title='Visualizar Abono' class='btn btn-block btn-primary' style='background-color:#3cbc52;' href='FE_PagosCuentasCobrar.php?id=$id'><i class='fa-regular fa-rectangle-list'></i><br>Visualizar Abono</a></td>";
                        }else{
                            echo "<td><a title='Generar Abono' class='btn btn-block btn-primary' href='FE_PagosCuentasCobrar.php?id=$id'><i class='fa fa-money'></i><br>Realizar Abono</a></td>";
                        }

                        echo"</tr>";

                    }

    echo "          </tbody>
                </table>
            </div>
        </div>";

    echo "<style>
            @media (min-width: 1492px){
                .modal-lg {
                    width: 1400px;
                }
            }
        </style>
        ";
}



//////////////////////////////////////////////////////////////Tabla Entidad a Facturar  ///////////////////////////////////////////////////////////////////////////////////////////////////////




else if($_POST["Tipo_Consulta"] == "Tabla Facturacion Entidad Tipo Contrato"){

    $entidad_id = $_POST["entidad_id"];
    $Nombre=funcionMaster($entidad_id,'id','Nombre','FE_Entidades');
    echo "<div class='modal-body'>
            <div class='col-md-12 row table-responsive'>
            <h2>Convenios de {$Nombre}</h2>
                <table id='example1' class='table table-bordered table-striped'>
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre Convenio</th>
                        <th>Tipo Convenio</th>
                        <th>Rango Fecha Activo</th>
                        <th>Opcion</th>
                    </tr>
                    </thead>
                    <tbody>";
                
                    $queryList = mysqli_query($conn3, "SELECT * FROM  FE_Convenios  WHERE entidad_id = $entidad_id AND Activo = 1 ORDER BY id DESC");
                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                        $id = $rowMotorizado['id'];
                        $Tipo_Contrato = $rowMotorizado["Tipo_Contrato"];
                        $Nombre = $rowMotorizado["Nombre"];
                        $Fecha_Inicio = $rowMotorizado["Fecha_Inicio"];
                        $Fecha_Caducidad = $rowMotorizado["Fecha_Caducidad"];

                        switch ($Tipo_Contrato) {
                            case '1':
                                $Texto_Tipo_Contrato = "Capitacion";
                                $Boton = "<td><a title='Facturacion Capitacion' class='btn btn-block btn-primary' style='background-color:#3cbc52;' href='FE_PreFacturacionEntidad.php?convenio=$id'><i class='fa-regular fa-rectangle-list'></i><br>Facturacion Capitacion</a></td>";

                                echo"<tr>
                                <td>$id</td>
                                <td>$Nombre</td>
                                <td>$Texto_Tipo_Contrato</td>
                                <td>{$Fecha_Inicio} - {$Fecha_Caducidad}</td>";
                        
                                echo $Boton;

                                echo"</tr>";

                                break;
                            
                            case '2':
                                    $Texto_Tipo_Contrato = "Paquete";
                                    $Boton = "<td><a title='Facturacion Paquete' class='btn btn-block btn-primary' style='background-color:#3cbc52;' href='FE_PreFacturacionEntidad.php?convenio=$id'><i class='fa-regular fa-rectangle-list'></i><br>Facturacion Paquete</a></td>";
                                    
                                    echo"<tr>
                                    <td>$id</td>
                                    <td>$Nombre</td>
                                    <td>$Texto_Tipo_Contrato</td>
                                    <td>{$Fecha_Inicio} - {$Fecha_Caducidad}</td>";
                            
                                    echo $Boton;
    
                                    echo"</tr>";
                                break;

                            case '4':
                                    $Texto_Tipo_Contrato = "Evento";
                                    $Boton = "<td><a title='Facturacion Por Lotes' class='btn btn-block btn-primary' style='background-color:#3cbc52;' href='FE_PreFacturacionEntidad.php?convenio=$id'><i class='fa-regular fa-rectangle-list'></i><br>Facturacion Por Evento</a></td>";
    
                                    echo"<tr>
                                    <td>$id</td>
                                    <td>$Nombre</td>
                                    <td>$Texto_Tipo_Contrato</td>
                                    <td>{$Fecha_Inicio} - {$Fecha_Caducidad}</td>";
                            
                                    echo $Boton;
    
                                    echo"</tr>";

                            /*
                            aqui no aplica ya que este tipo de contrato no se factura a la entidad
                            case '2':
                                $Texto_Tipo_Contrato = "Paquete";
                                $Boton = "<td><a title='Facturacion Paquete' class='btn btn-block btn-primary' style='background-color:#3cbc52;' href='FE_PreFacturacionEntidad.php?convenio=$id'><i class='fa-regular fa-rectangle-list'></i><br>Facturacion Paquete</a></td>";
                                break;
                            */
                        }

                        

                    }

    echo "          </tbody>
                </table>
            </div>
        </div>";

    echo "<style>
            @media (min-width: 1492px){
                .modal-lg {
                    width: 1400px;
                }
            }
        </style>";
}
















////////////////////////////////////////////////////////////////////////////Cargar Detalle de la entidad con contrato por capitacion //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////













/*
elseif($_POST["Tipo_Consulta"] == "Agregar Detalle Factura Entidad Capitacion"){

    date_default_timezone_set('America/Bogota');

    
    $usuario_id = $_POST['usuario_id'];
    $cliente_id = "0";

    $entidad_id = $_POST['entidad_id'];
    $convenio_id = $_POST['convenio_id'];
    $Mas_Informacion_Capitacion = $_POST['Mas_Informacion_Capitacion'];

    $idOperacion = 0;
    $fechaRegistro = date("Y-m-d H:i:s");

    $queryList = mysqli_query($conn3, "SELECT * FROM  FE_DetallesOperacion_Temp WHERE entidad_id='{$entidad_id}' AND convenio_id='{$convenio_id}' AND usuario_id='{$usuario_id}' AND Tipo_Detalle='3'");
    $nrow = mysqli_num_rows($queryList);

    if($nrow==1){
        echo "Error";
        exit();
    }
    /////////////////////////Datos///////////////////////////////////
    $queryList = mysqli_query($conn3, "SELECT * FROM  FE_Convenios  WHERE id = $convenio_id AND Activo = 1 ORDER BY id DESC");
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $Nombre = $rowMotorizado["Nombre"];
        $fe_valor_convenio = $rowMotorizado["fe_valor_convenio"];
    }

    $tarifa_id = "0";
    $producto_id = "0";
    $Descripcion = "Contrato - {$Nombre}";

    $Base = $fe_valor_convenio;
    $Cantidad = 1;
    $TotalBase = round($Base * $Cantidad,2);

    $Iva = 0;
    $Monto_Iva = 0;

    $Subtotal = $TotalBase+$Monto_Iva;

    $Descuento = 0;
    $Monto_Descuento = 0;
    
    $TotalDetalle = round($Subtotal - $Monto_Descuento,2);

    $Copago = "";

    //Este es un Detalle Tipo Entidad
    $Tipo_Detalle = 3;

    $listafinal = $Mas_Informacion_Capitacion;

    $queryList = mysqli_query($conn3, "INSERT INTO FE_DetallesOperacion_Temp ( idOperacion, fechaRegistro, Producto_id, Descripcion, Base, Cantidad, TotalBase,   Iva,  Monto_Iva,   Subtotal,  Descuento,  Monto_Descuento, TotalDetalle,                     Copago, tarifa_id, usuario_id, cliente_id,                  entidad_id,convenio_id,           Mas_Informacion,Tipo_Detalle) 
                                                        VALUES ('$idOperacion','$fechaRegistro','$producto_id','$Descripcion','$Base','$Cantidad','$TotalBase','$Iva','$Monto_Iva','$Subtotal' ,'$Descuento', '$Monto_Descuento','$TotalDetalle',      '$Copago','$tarifa_id','$usuario_id','$cliente_id',    '$entidad_id','$convenio_id',        '$listafinal','$Tipo_Detalle');");

    $idDetalleCapitacion = mysqli_insert_id($conn3);
    if ($queryList != true) {
        echo "Error";
    }else{
        echo $idDetalleCapitacion;
    }
}


elseif($_POST["Tipo_Consulta"] == "Eliminar Detalle Factura Entidad Capitacion")
{
    $usuario_id = $_POST['usuario_id'];
    $detalle_id = $_POST['detalle_id'];

    $entidad_id = $_POST['entidad_id'];
    $convenio_id = $_POST['convenio_id'];

    $queryList = mysqli_query($conn3,"DELETE from FE_DetallesOperacion_Temp WHERE id = $detalle_id AND usuario_id='$usuario_id' AND entidad_id='$entidad_id' AND convenio_id='$convenio_id' LIMIT 1");


    if ($queryList != true) {
        echo "Error";
    }else{
        echo "1";
    }

}




elseif($_POST["Tipo_Consulta"] == "Tabla Detalles Factura Relacionada A Entidad Capitacion"){

    echo "<div class='panel panel-default'>
                                <div class='panel-heading' style='color: black!important;background-color: #9bc2da!important;border-color: #01cd36!important;'>
                                    <h4 class='panel-title' style='text-align: center;'>
                                        <a data-toggle='collapse' href='#collapse1' style='display: block;'>Detalles de factura relacionados a la entidad convenio actual</a>
                                    </h4>
                                </div>
                                <div id='collapse1' class='panel-collapse collapse'>
                                    <div class='panel-body'>

                                    <table id='example1' class='table table-bordered table-striped' style='width:100%;'>
                                    <thead>
                                        <tr>
                                            <th scope='col'>#</th>
                                            <th scope='col' class='centrar' >idOperacion</th>
                                            <th scope='col' class='centrar' >Nombre Cliente</th>
                                            <th scope='col' class='centrar' >Nombre del Producto/Servicio</th>
                                            <th scope='col' class='centrar' >Precio</th>
                                            <th scope='col' class='centrar' >Cantidad</th>
                                            <th scope='col' class='centrar' >Valor</th>
                                            <th scope='col' class='centrar' >Iva</th>
                                            <th scope='col' class='centrar' >Subtotal</th>
                                            <th scope='col' class='centrar' >Descuento</th>
                                            <th scope='col' class='centrar' >Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>";

                                    $convenio_id = $_POST["convenio_id"];
                                    $entidad_id = $_POST["entidad_id"];
                                    $usuario_id = $_POST["usuario_id"];

                                    //ponerle color a los detalles que ya fueron agregados al detalle de la entidad con el contrato tipo capitacion
                                    $queryList = mysqli_query($conn3, "SELECT * FROM  FE_DetallesOperacion_Temp WHERE entidad_id='{$entidad_id}' AND convenio_id='{$convenio_id}' AND usuario_id='{$usuario_id}' AND Tipo_Detalle='3' ORDER BY id ASC");
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                        $ArregloDetalles = $rowMotorizado["Mas_Informacion"]; 
                                    }

                                    $ArregloDetalles = json_decode($ArregloDetalles, true);
                                    foreach ($ArregloDetalles as $key => $value) {
                                        foreach ($value as $key1 => $value1) {
                                            $ArregloPersonalizado[$key][$value1]="Existe";
                                        }
                                    }

                                    $QueryFactura = mysqli_query($conn3, "SELECT * FROM  FE_Operacion WHERE convenio_id='{$convenio_id}' AND entidad_id='{$entidad_id}' AND usuario_id='{$usuario_id}' AND Tipo_Operacion='0' AND CobroEntidad='0'");
                                    while ($RowFactura = mysqli_fetch_array($QueryFactura)) {    

                                        $idOperacion = $RowFactura["idOperacion"];
                                        $QueryDetalle = mysqli_query($conn3, "SELECT * FROM  FE_DetallesOperacion WHERE idOperacion='{$idOperacion}' ORDER BY id ASC");
                                        while ($rowMotorizado = mysqli_fetch_array($QueryDetalle)) {
                                            $contador++;
                                            $id = $rowMotorizado['id'];
                                            $Copago = $rowMotorizado['Copago'];
                                            $Descripcion = $rowMotorizado['Descripcion'];
                                            $Base = $rowMotorizado['Base'];
                                            $Cantidad = $rowMotorizado['Cantidad'];
                                            $TotalBase = $rowMotorizado['TotalBase'];

                                            $Monto_Iva = $rowMotorizado['Monto_Iva'];
                                            $Iva  = $rowMotorizado['Iva'];

                                            $Subtotal = $rowMotorizado['Subtotal'];

                                            $Monto_Descuento = $rowMotorizado['Monto_Descuento'];
                                            $Descuento  = $rowMotorizado['Descuento'];

                                            $Descuento_Texto="";
                                            if (strpos($Descuento, '%') !== false) {
                                                $Descuento_Texto = " [ ".$Descuento." ]";
                                            }

                                            $TotalDetalle = $rowMotorizado['TotalDetalle'];

                                            $cliente_id  = $rowMotorizado['cliente_id'];    
                                            $Nombre=funcionMaster($cliente_id,'cliente_id','nombre_cliente','cliente');
                                            
                                            if($ArregloPersonalizado[$idOperacion][$id]=="Existe"){
                                                $Color="style='background-color:#d0e5d0;'";
                                            }else{
                                                $Color="style='background-color:#f7d4d4;'";
                                            }
                                            
                                            echo "<tr {$Color}><th scope='row' width='2%'>{$contador}</th>";

                                            echo "<td width='2%' class='centrar'>{$idOperacion}</td>
                                            <td width='20%' class='centrar'>{$Nombre}</td>
                                            <td width='20%' class='centrar'>{$Descripcion}</td>
                                            <td width='5%' class='centrar'>".number_format($Base, 2, ",", ".")." </td>
                                            <td width='2%' class='centrar'>".number_format($Cantidad, 2, ",", ".")." </td>
                                            <td width='5%' class='centrar'>".number_format($TotalBase, 2, ",", ".")." </td>
                                            <td width='10%' class='centrar'>".number_format($Monto_Iva, 2, ",", ".")."  [{$Iva}%]</td>
                                            <td width='5%' class='centrar'>".number_format($Subtotal, 2, ",", ".")." </td>
                                            <td width='10%' class='centrar'>".number_format($Monto_Descuento, 2, ",", ".")."  {$Descuento_Texto}</td>
                                            <td width='5%' class='centrar'>".number_format($TotalDetalle, 2, ",", ".")." </td>";

                                            echo "</tr>";

                                        }
                                    }

                                echo "<label> Si el color de fondo del detalle es verde significa que el detalle cargado para facturar este convenio tiene relacion con ese detalle</label>
                                    </tbody>
                                </table>

                                <style type='text/css'> .centrar { text-align: center;}</style>
                                    </div>
                                    <div class='panel-footer' style='background-color: #9bc1d8;'>Detalles Relacionados</div>
                                </div>
                            </div>";
}

*/







elseif($_POST["Tipo_Consulta"] == "Tabla Detalles Factura Entidad")
{
    $usuario_id = $_POST['usuario_id'];
    $entidad_id = $_POST['entidad_id'];
    $convenio_id = $_POST['convenio_id'];
        
        echo "<table id='example1' class='table table-bordered table-striped'>
        <thead>
            <tr>
                <th scope='col'>#</th>";             
        echo   "<th scope='col' class='centrar' >Nombre del Producto/Servicio</th>
                <th scope='col' class='centrar' >Precio</th>
                <th scope='col' class='centrar' >Cantidad</th>
                <th scope='col' class='centrar' >Total</th>
            </tr>
        </thead>
        <tbody>";
        $contador=0;
        $queryList = mysqli_query($conn3, "SELECT * FROM  FE_DetallesOperacion_Temp WHERE entidad_id='{$entidad_id}' AND convenio_id='{$convenio_id}' AND usuario_id='{$usuario_id}' AND Tipo_Detalle='3' ORDER BY id ASC");
        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
            $contador++;
            $id = $rowMotorizado['id'];
            $Copago = $rowMotorizado['Copago'];
            $Descripcion = $rowMotorizado['Descripcion'];
            $Base = $rowMotorizado['Base'];
            $Cantidad = $rowMotorizado['Cantidad'];
            $TotalDetalle = $rowMotorizado['TotalDetalle'];

            echo "<tr><th scope='row' width='2%'>{$contador}</th>";

            echo "<td width='20%' class='centrar'>{$Descripcion}</td>
            <td width='5%' class='centrar'>".number_format($Base, 2, ",", ".")." </td>
            <td width='2%' class='centrar'>".number_format($Cantidad, 2, ",", ".")." </td>
            <td width='5%' class='centrar'>".number_format($TotalDetalle, 2, ",", ".")." </td>";


            $Total_Precio = $Total_Precio + $Base;
            $Total_Cantidad = $Total_Cantidad + $Cantidad;
            $Total_Factura = $Total_Factura + $TotalDetalle;

        }

        echo "</tbody>
            <tfoot>
            <tr>
                <th colspan='2' rowspan='2'>Total</th>
                <th rowspan='2' class='centrar' >".number_format($Total_Precio,2,",",".")." </th>
                <th rowspan='2' class='centrar' >".number_format($Total_Cantidad,2,",",".")." </th>
                <th rowspan='2' class='centrar' >".number_format($Total_Factura,2,",",".")." </th>
            </tr>
            </tfoot>";

        echo "
        </table>";

echo "<style type='text/css'> .centrar { text-align: center;}</style>";

//este es para validar que haya mas de 1 detalle para poder acceder al facturar
echo "<script>if (document.getElementById('cantidad_detalles') != null){document.getElementById('cantidad_detalles').value='{$contador}'; }</script>";

}






elseif($_POST["Tipo_Consulta"] == "Tabla Factura Entidad Realizada")
{
    $idOperacion = $_POST['idOperacion'];
    $queryList = mysqli_query($conn3, "SELECT * FROM  FE_Operacion WHERE idOperacion='{$idOperacion}'");
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $Tipo_Detalles = $rowMotorizado['Tipo_Detalles'];
        
        $TotalNeto = $rowMotorizado['TotalNeto'];
        $MontoPago = $rowMotorizado['MontoPago'];

        $Saldo = $TotalNeto - $MontoPago;
    }
        echo "<table id='example1' class='table table-bordered table-striped'>
        <thead>
            <tr>
                <th scope='col'>#</th>";   
        echo   "<th scope='col' class='centrar' >Nombre del Producto/Servicio</th>
                <th scope='col' class='centrar' >Precio</th>
                <th scope='col' class='centrar' >Cantidad</th>
                <th scope='col' class='centrar' >Valor</th>
                <th scope='col' class='centrar' >Iva</th>
                <th scope='col' class='centrar' >Subtotal</th>
                <th scope='col' class='centrar' >Descuento</th>
                <th scope='col' class='centrar' >Total</th>
            </tr>
        </thead>
        <tbody>";

        $queryList = mysqli_query($conn3, "SELECT * FROM  FE_DetallesOperacion WHERE idOperacion='{$idOperacion}' ORDER BY id ASC");
        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
            $contador++;
            $id = $rowMotorizado['id'];
            $Copago = $rowMotorizado['Copago'];
            $Descripcion = $rowMotorizado['Descripcion'];
            $Base = $rowMotorizado['Base'];
            $Cantidad = $rowMotorizado['Cantidad'];
            $TotalBase = $rowMotorizado['TotalBase'];

            $Monto_Iva = $rowMotorizado['Monto_Iva'];
            $Iva  = $rowMotorizado['Iva'];

            $Subtotal = $rowMotorizado['Subtotal'];

            $Monto_Descuento = $rowMotorizado['Monto_Descuento'];
            $Descuento  = $rowMotorizado['Descuento'];

            $Descuento_Texto="";
            if (strpos($Descuento, '%') !== false) {
                $Descuento_Texto = " [ ".$Descuento." ]";
            }

            $TotalDetalle = $rowMotorizado['TotalDetalle'];

            echo "<tr><th scope='row' width='2%'>{$contador}</th>";

            echo "<td width='20%' class='centrar'>{$Descripcion}</td>
            <td width='5%' class='centrar'>".number_format($Base, 2, ",", ".")." </td>
            <td width='2%' class='centrar'>".number_format($Cantidad, 2, ",", ".")." </td>
            <td width='5%' class='centrar'>".number_format($TotalBase, 2, ",", ".")." </td>
            <td width='10%' class='centrar'>".number_format($Monto_Iva, 2, ",", ".")."  [{$Iva}%]</td>
            <td width='5%' class='centrar'>".number_format($Subtotal, 2, ",", ".")." </td>
            <td width='10%' class='centrar'>".number_format($Monto_Descuento, 2, ",", ".")."  {$Descuento_Texto}</td>
            <td width='5%' class='centrar'>".number_format($TotalDetalle, 2, ",", ".")." </td>";

            echo "</tr>";

            $Total_Precio = $Total_Precio + $Base;
            $Total_Cantidad = $Total_Cantidad + $Cantidad;
            $Total_TotalBase = $Total_TotalBase + $TotalBase;
            $Total_Descuento = $Total_Descuento + $Monto_Descuento;
            $Total_Subtotal = $Total_Subtotal + $Subtotal;
            $Total_Iva = $Total_Iva + $Monto_Iva;
            $Total_Factura = $Total_Factura + $TotalDetalle;

        }

        echo "</tbody>
            <tfoot>
            <tr>
                <th colspan='2' rowspan='2'>Total</th>
                <th rowspan='2' class='centrar' >".number_format($Total_Precio,2,",",".")." </th>
                <th rowspan='2' class='centrar' >".number_format($Total_Cantidad,2,",",".")." </th>
                <th rowspan='2' class='centrar' >".number_format($Total_TotalBase,2,",",".")." </th>

                <th rowspan='2' class='centrar' >".number_format($Total_Iva,2,",",".")." </th>
                <th rowspan='2' class='centrar' >".number_format($Total_Subtotal,2,",",".")." </th>
                <th rowspan='2' class='centrar' >".number_format($Total_Descuento,2,",",".")." </th>
                <th rowspan='2' class='centrar' >".number_format($Total_Factura,2,",",".")." </th>
            </tr>
            </tfoot>
        </table>";

        echo "<div class='table table-bordered table-striped'>
        <table class='table'>
          <tr>
            <td align='right' style='width:80%'><b>Subtotal:</b></td>
            <td align='right'>".number_format($Total_TotalBase,2,",",".")."</td>
          </tr>
          <tr>
            <td align='right' style='width:80%'><b>Impuesto:</b></td>
            <td align='right'>".number_format($Total_Iva,2,",",".")."</td>
          </tr>
          <tr>
            <td align='right' style='width:80%'><b>Descuento:</b></td>
            <td align='right'>".number_format($Total_Descuento,2,",",".")."</td>
          </tr>
          <tr>
            <td align='right' style='width:80%'><b>Total:</b></td>
            <td align='right'>".number_format($Total_Factura,2,",",".")."</td>
          </tr>
          <tr>
            <td align='right' style='width:80%'><b>MontoPagado:</b></td>
            <td align='right'>".number_format($MontoPago,2,",",".")."</td>
          </tr>
          <tr>
            <td align='right' style='width:80%'><b>Saldo:</b></td>
            <td align='right'>".number_format(($Saldo),2,",",".")."</td>
          </tr>
        </table>
        </div>";

echo "<style type='text/css'> .centrar { text-align: center;}</style>";

}

////////////////////////////////////////////////////////////////////////////////////////////////////////////? Modulo Convenios  /////////////////////////////////////////////



elseif($_POST["Tipo_Consulta"] == "Crear Paquete")
{   
    $_POST = DatosIngresarMysqli($_POST);

    $ModalArreglo = $_POST["ModalArreglo"];
    $tabla = mysqli_query($conn3, "SHOW TABLES LIKE 'FE_PaquetesTarifa'");
    $nrowtabla = mysqli_num_rows($tabla);
    if ($nrowtabla == 0) {
        foreach ($ModalArreglo as $key => $value) {$Campos .= "`{$key}` text DEFAULT '',";}
        $Campos = trim($Campos, ',');
        $query = "CREATE TABLE `FE_PaquetesTarifa` (
                `id` int(11) NOT NULL,
                `fechaRegistro` timestamp NOT NULL DEFAULT current_timestamp(),
                {$Campos},

                `usuario_id` int(11) NOT NULL,
                `convenio_id` int(11) NOT NULL,

                `Creacion_Dinamica` text DEFAULT '',
                `Activo` varchar(5) DEFAULT '1'
            ) ENGINE=MyISAM DEFAULT CHARSET=latin1;";

        $creaciontabla = mysqli_query($conn3, $query);
        if (!$creaciontabla) {
            echo "Error Tabla";
            exit();
        } else {
            mysqli_query($conn3, "ALTER TABLE `FE_PaquetesTarifa` ADD PRIMARY KEY (`id`);");
            mysqli_query($conn3, "ALTER TABLE `FE_PaquetesTarifa` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;");
        }
    }
    elseif($nrowtabla == 1) {
            $Campo1 = mysqli_query($conn3, "show COLUMNS from FE_PaquetesTarifa WHERE Field = 'Creacion_Dinamica';");
            $nrowCampo1 = mysqli_num_rows($Campo1);
            if ($nrowCampo1 == "1") {
                foreach ($ModalArreglo as $key => $value) {
                    $Campo = mysqli_query($conn3, "show COLUMNS from FE_PaquetesTarifa WHERE Field = '{$key}';");
                    $nrowCampo = mysqli_num_rows($Campo);
                    if ($nrowCampo == 0) {
                        mysqli_query($conn3, "ALTER TABLE `FE_PaquetesTarifa` ADD `{$key}` TEXT NULL DEFAULT '';");
                    }
                }
            } else {
                echo "Tabla No fue creada Dinamicamente";
                // si bota este mensaje es por que la tabla no esta creado el campo *Creacion_Dinamica* sirve para que no se use este modulo en tablas ya preexistentes
            }
    }

    $Campos = "";$Valores = "";
    foreach ($_POST["ModalArreglo"] as $key => $value) {
        $Campos .= $key . ','; $Valores .= "'{$value}',";
    }
    $Campos = trim($Campos, ',');$Valores = trim($Valores, ',');

    $usuario_id = $_POST['usuario_id'];
    $convenio_id = $_POST['convenio_id'];

    $queryList = mysqli_query($conn3, "INSERT INTO FE_PaquetesTarifa (usuario_id,convenio_id,{$Campos}) VALUES ('$usuario_id','$convenio_id',{$Valores});");
    if ($queryList != true) {
        echo "Error Al Registrar El Paquete";
    }

}

elseif($_POST["Tipo_Consulta"] == "Tabla Paquetes Tarifas")
{   
    $usuario_id = $_POST['usuario_id'];
    $convenio_id = $_POST['convenio_id'];

    $queryList = mysqli_query($conn3, "SELECT * FROM  FE_PaquetesTarifa WHERE usuario_id='$usuario_id' AND convenio_id='$convenio_id' AND Activo = 1");
    while ($RowCamposFacturacion = mysqli_fetch_array($queryList)) {
        //echo "<option value='$RowCamposFacturacion[codigo_municipio]'> $RowCamposFacturacion[nombre_municipio]</option>";
        $ArregloRespuesta[$RowCamposFacturacion["id"]]=$RowCamposFacturacion["Nombre"];
    }

    echo json_encode($ArregloRespuesta);
}





elseif($_POST["Tipo_Consulta"] == "Editar Paquete")
{   
    $_POST = DatosIngresarMysqli($_POST);

    foreach ($_POST["ModalArregloEdicion"] as $key => $value) {
        $Campos .= "{$key} = '{$value}',";
    }
    $Campos = trim($Campos, ',');

    $paquete_id_editar = $_POST['paquete_id_editar'];

    $queryList = mysqli_query($conn3, "UPDATE FE_PaquetesTarifa SET {$Campos} WHERE id = '{$paquete_id_editar}' limit 1;");
    if ($queryList != true) {
        echo "Error Al Actualizar El Paquete UPDATE FE_PaquetesTarifa SET {$Campos} WHERE id = '{$paquete_id_editar}' limit 1;";
    }

}

elseif($_POST["Tipo_Consulta"] == "Eliminar Paquete")
{
    $paquete_id = $_POST["paquete_id"];

    $queryList = mysqli_query($conn3,"UPDATE FE_PaquetesTarifa SET Activo = 0 WHERE id = $paquete_id LIMIT 1");

    if ($queryList != true) {
        echo "Error al Eliminar el Paquete";
    }

}

//////////////////////////////////////////// modulo tarifa traer precios

elseif($_POST["Tipo_Consulta"] == "Cargar Valor Producto")
{
    $Valor = $_POST["Valor"];

    $QueryTarifa = mysqli_query($conn3, "SELECT * FROM sinvetrios WHERE ID = '{$Valor}'");
    while ($RowTarifa= mysqli_fetch_array($QueryTarifa)) {
        $Precio = $RowTarifa['precio'];
    }

    if($Valor!=""){
        echo round($Precio,2);
    }else{
        echo "";
    }
    
}




/////////////////////////////////////////////////////////////////////?  modulo factura entidad libre ///////////////////////////////////////////////////

elseif($_POST["Tipo_Consulta"] == "Agregar Detalle Factura Entidad Libre"){

    date_default_timezone_set('America/Bogota');

    $usuario_id = $_POST['usuario_id'];
    $cliente_id = "0";

    $entidad_id = $_POST['entidad_id'];
    $convenio_id = "0";
    
    $idOperacion = 0;
    $fechaRegistro = date("Y-m-d H:i:s");

    $tarifa_id = "0";
    $producto_id = "0";
    $Descripcion = mysqli_real_escape_string($conn3,$_POST['producto_libre']);
    
    $Base = $_POST['Base'];
    $Cantidad = $_POST['Cantidad'];
    $TotalBase = round($Base * $Cantidad,2);

    $Iva = $_POST['Iva'];
    $Monto_Iva = round($TotalBase * ($Iva/100),2);
    $Subtotal = $TotalBase+$Monto_Iva;


    $Descuento = $_POST['Descuento'];
    $Monto_Descuento=0;
    if (strpos($Descuento, '%') !== false) {
        $Descuento_Texto =  str_replace("%", "", "$Descuento");
        $Monto_Descuento = round(($Subtotal * ($Descuento_Texto / 100)), 2);
    } else {
        $Monto_Descuento = round($Descuento,2);
    }
    $TotalDetalle = round($Subtotal - $Monto_Descuento,2);

    $Copago = "";

    //Este es un Detalle Abierto
    $Tipo_Detalle = 2;
    $Tipo_Factura = "2";//2->Factura Tipo Entidad
    $listafinal="";

    $queryList = mysqli_query($conn3, "INSERT INTO FE_DetallesOperacion_Temp ( idOperacion, fechaRegistro, Producto_id, Descripcion, Base, Cantidad, TotalBase, Iva, Monto_Iva, Subtotal, Descuento, Monto_Descuento,                     TotalDetalle,Copago,  tarifa_id,   usuario_id,   cliente_id,       entidad_id,convenio_id,               Mas_Informacion,Tipo_Detalle,Tipo_Factura) 
                                                        VALUES ('$idOperacion','$fechaRegistro','$producto_id','$Descripcion','$Base','$Cantidad','$TotalBase', '$Iva', '$Monto_Iva' ,'$Subtotal' ,'$Descuento', '$Monto_Descuento' ,   '$TotalDetalle','$Copago','$tarifa_id','$usuario_id','$cliente_id'    ,'$entidad_id','$convenio_id'   ,'$listafinal','$Tipo_Detalle','$Tipo_Factura');");

    if ($queryList != true) {
        echo "Error al Registrar el Detalle";
    }else{
        echo "1";
    }

}


elseif($_POST["Tipo_Consulta"] == "Eliminar Detalle Factura Entidad Libre")
{
    $usuario_id = $_POST['usuario_id'];
    $detalle_id = $_POST['Detalle_id'];

    $entidad_id = $_POST['entidad_id'];
    $convenio_id = "0";

    $queryList = mysqli_query($conn3,"DELETE from FE_DetallesOperacion_Temp WHERE id = $detalle_id AND usuario_id='$usuario_id' AND entidad_id='$entidad_id' AND convenio_id='$convenio_id' LIMIT 1");

    if ($queryList != true) {
        echo "Error";
    }else{
        echo "1";
    }
}

elseif($_POST["Tipo_Consulta"] == "Tabla Detalles Factura Entidad Libre")
{
    $usuario_id = $_POST['usuario_id'];
    $entidad_id = $_POST['entidad_id'];
    $convenio_id = $_POST['convenio_id'];
        
        echo "<table id='example1' class='table table-bordered table-striped'>
        <thead>
            <tr>
                <th scope='col'>#</th>";             
        echo   "<th scope='col' class='centrar' >Nombre del Producto/Servicio</th>
                <th scope='col' class='centrar' >Precio</th>
                <th scope='col' class='centrar' >Cantidad</th>
                <th scope='col' class='centrar' >Valor</th>
                <th scope='col' class='centrar' >Iva</th>
                <th scope='col' class='centrar' >Subtotal</th>
                <th scope='col' class='centrar' >Descuento</th>
                <th scope='col' class='centrar' >Total</th>
                <th scope='col' class='centrar' ></th>
            </tr>
        </thead>
        <tbody>";
        $contador=0;
        $queryList = mysqli_query($conn3, "SELECT * FROM  FE_DetallesOperacion_Temp WHERE entidad_id='{$entidad_id}' AND convenio_id='{$convenio_id}' AND usuario_id='{$usuario_id}' AND Tipo_Detalle='2' AND Tipo_Factura='2' ORDER BY id ASC");
        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
            $contador++;
            $id = $rowMotorizado['id'];

            $Descripcion = $rowMotorizado['Descripcion'];
            $Base = $rowMotorizado['Base'];
            $Cantidad = $rowMotorizado['Cantidad'];
            $TotalBase = $rowMotorizado['TotalBase'];

            $Monto_Iva = $rowMotorizado['Monto_Iva'];
            $Iva  = $rowMotorizado['Iva'];

            $Subtotal = $rowMotorizado['Subtotal'];

            $Monto_Descuento = $rowMotorizado['Monto_Descuento'];
            $Descuento  = $rowMotorizado['Descuento'];

            $Descuento_Texto="";
            if (strpos($Descuento, '%') !== false) {
                $Descuento_Texto = " [ ".$Descuento." ]";
            }

            $TotalDetalle = $rowMotorizado['TotalDetalle'];

            echo "<tr><th scope='row' width='2%'>{$contador}</th>";

            echo "<td width='20%' class='centrar'>{$Descripcion}</td>
            <td width='5%' class='centrar'>".number_format($Base, 2, ",", ".")." </td>
            <td width='2%' class='centrar'>".number_format($Cantidad, 2, ",", ".")." </td>
            <td width='5%' class='centrar'>".number_format($TotalBase, 2, ",", ".")." </td>
            <td width='10%' class='centrar'>".number_format($Monto_Iva, 2, ",", ".")."  [{$Iva}%]</td>
            <td width='5%' class='centrar'>".number_format($Subtotal, 2, ",", ".")." </td>
            <td width='10%' class='centrar'>".number_format($Monto_Descuento, 2, ",", ".")."  {$Descuento_Texto}</td>
            <td width='5%' class='centrar'>".number_format($TotalDetalle, 2, ",", ".")." </td>";

            if(isset($_POST["comando_eliminar"])){
            echo "<td width='2%'> 
                <a href='#' onclick='EliminarDetalle($id)'><i class='fa fa-trash'></i></a>
            </td>";
            }else{
                echo "<td width='2%'></td>";
            }
            echo "</tr>";

            $Total_Precio = $Total_Precio + $Base;
            $Total_Cantidad = $Total_Cantidad + $Cantidad;
            $Total_TotalBase = $Total_TotalBase + $TotalBase;
            $Total_Descuento = $Total_Descuento + $Monto_Descuento;
            $Total_Subtotal = $Total_Subtotal + $Subtotal;
            $Total_Iva = $Total_Iva + $Monto_Iva;
            $Total_Factura = $Total_Factura + $TotalDetalle;

        }

        echo "</tbody>
            <tfoot>
            <tr>
                <th colspan='2' rowspan='2'>Total</th>
                <th rowspan='2' class='centrar' >".number_format($Total_Precio,2,",",".")." </th>
                <th rowspan='2' class='centrar' >".number_format($Total_Cantidad,2,",",".")." </th>
                <th rowspan='2' class='centrar' >".number_format($Total_TotalBase,2,",",".")." </th>

                <th rowspan='2' class='centrar' >".number_format($Total_Iva,2,",",".")." </th>
                <th rowspan='2' class='centrar' >".number_format($Total_Subtotal,2,",",".")." </th>
                <th rowspan='2' class='centrar' >".number_format($Total_Descuento,2,",",".")." </th>
                <th rowspan='2' class='centrar' >".number_format($Total_Factura,2,",",".")." </th>
                <th rowspan='2' class='centrar' > </th>
            </tr>
            </tfoot>";

        echo "
        </table>";

echo "<style type='text/css'> .centrar { text-align: center;}</style>";

//este es para validar que haya mas de 1 detalle para poder acceder al facturar
echo "<script>if (document.getElementById('cantidad_detalles') != null){document.getElementById('cantidad_detalles').value='{$contador}'; }</script>";

}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




/////////////////////////////////////////////////////////////////////?  modulo devolucion ///////////////////////////////////////////////////


elseif($_POST["Tipo_Consulta"] == "Tabla Detalles Dinamico Factura Devolucion")
{
    $usuario_id = $_POST['usuario_id'];
    $idOperacion = $_POST['idOperacion'];
        
        echo "<table id='example1' class='table table-bordered table-striped'>
        <thead>
            <tr>
                <th scope='col'>#</th>";             
        echo   "<th scope='col' class='centrar' >Nombre del Producto/Servicio</th>
                <th scope='col' class='centrar' >Precio</th>
                <th scope='col' class='centrar' >Cantidad</th>
                <th scope='col' class='centrar' >Valor</th>
                <th scope='col' class='centrar' >Iva</th>
                <th scope='col' class='centrar' >Subtotal</th>
                <th scope='col' class='centrar' >Descuento</th>
                <th scope='col' class='centrar' >Total</th>
                <th scope='col' class='centrar' ></th>
            </tr>
        </thead>
        <tbody>";
        $contador=0;
        $queryList = mysqli_query($conn3, "SELECT * FROM  FE_DetallesOperacion WHERE  idOperacion='{$idOperacion}'  ORDER BY id ASC");
        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
            $contador++;
            $id = $rowMotorizado['id'];

            $Descripcion = $rowMotorizado['Descripcion'];
            $Base = $rowMotorizado['Base'];
            $Cantidad = $rowMotorizado['Cantidad'];
            $TotalBase = $rowMotorizado['TotalBase'];

            $Monto_Iva = $rowMotorizado['Monto_Iva'];
            $Iva  = $rowMotorizado['Iva'];

            $Subtotal = $rowMotorizado['Subtotal'];

            $Monto_Descuento = $rowMotorizado['Monto_Descuento'];
            $Descuento  = $rowMotorizado['Descuento'];

            $Descuento_Texto="";
            if (strpos($Descuento, '%') !== false) {
                $Descuento_Texto = " [ ".$Descuento." ]";
            }

            $TotalDetalle = $rowMotorizado['TotalDetalle'];

            echo "<tr><th scope='row' width='2%'>{$contador}</th>";

            echo "<td width='20%' class='centrar'>{$Descripcion}</td>
            <td width='5%' class='centrar'>".number_format($Base, 2, ",", ".")." </td>
            <td width='2%' class='centrar'>".number_format($Cantidad, 2, ",", ".")." </td>
            <td width='5%' class='centrar'>".number_format($TotalBase, 2, ",", ".")." </td>
            <td width='10%' class='centrar'>".number_format($Monto_Iva, 2, ",", ".")."  [{$Iva}%]</td>
            <td width='5%' class='centrar'>".number_format($Subtotal, 2, ",", ".")." </td>
            <td width='10%' class='centrar'>".number_format($Monto_Descuento, 2, ",", ".")."  {$Descuento_Texto}</td>
            <td width='5%' class='centrar'>".number_format($TotalDetalle, 2, ",", ".")." </td>";

            if($rowMotorizado['Nota_Credito']==0){
            echo "<td width='2%' class='centrar'> 
                <input type='checkbox' name='ArregloDetalles[]' class='Checked_Detalles' value='$id'>
            </td>";
            }else{
                echo "<td width='2%'></td>";
            }
            echo "</tr>";
        }

        echo "</tbody>";
     echo "</table>";

echo "<style type='text/css'> .centrar { text-align: center;}</style>";

}


elseif($_POST["Tipo_Consulta"] == "Tabla Factura Devolucion Realizada")
{
    $idOperacion = $_POST['idOperacion'];
    $queryList = mysqli_query($conn3, "SELECT * FROM  FE_Operacion WHERE idOperacion='{$idOperacion}'");
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $Tipo_Detalles = $rowMotorizado['Tipo_Detalles'];
    }
        echo "<table id='example1' class='table table-bordered table-striped'>
        <thead>
            <tr>
                <th scope='col'>#</th>";   
        echo   "<th scope='col' class='centrar' >Nombre del Producto/Servicio</th>
                <th scope='col' class='centrar' >Precio</th>
                <th scope='col' class='centrar' >Cantidad</th>
                <th scope='col' class='centrar' >Total</th>
            </tr>
        </thead>
        <tbody>";

        $queryList = mysqli_query($conn3, "SELECT * FROM  FE_DetallesOperacion WHERE idOperacion='{$idOperacion}' ORDER BY id ASC");
        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
            $contador++;
            $id = $rowMotorizado['id'];

            $Descripcion = $rowMotorizado['Descripcion'];
            $Base = $rowMotorizado['Base'];
            $Cantidad = $rowMotorizado['Cantidad'];
            $TotalDetalle = $rowMotorizado['TotalDetalle'];

            echo "<tr><th scope='row' width='2%'>{$contador}</th>";

            echo "<td width='20%' class='centrar'>{$Descripcion}</td>
            <td width='5%' class='centrar'>".number_format($Base, 2, ",", ".")." </td>
            <td width='2%' class='centrar'>".number_format($Cantidad, 2, ",", ".")." </td>
            <td width='5%' class='centrar'>".number_format($TotalDetalle, 2, ",", ".")." </td>";

            echo "</tr>";

            $Total_Precio = $Total_Precio + $Base;
            $Total_Cantidad = $Total_Cantidad + $Cantidad;
            $Total_Factura = $Total_Factura + $TotalDetalle;

        }

        echo "</tbody>
            <tfoot>
            <tr>
                <th colspan='2' rowspan='2'>Total</th>
                <th rowspan='2' class='centrar' >".number_format($Total_Precio,2,",",".")." </th>
                <th rowspan='2' class='centrar' >".number_format($Total_Cantidad,2,",",".")." </th>
                <th rowspan='2' class='centrar' >".number_format($Total_Factura,2,",",".")." </th>
            </tr>
            </tfoot>
        </table>";

        echo "<div class='table table-bordered table-striped'>
        <table class='table'>
          <tr>
            <td align='right' style='width:80%'><b>Total:</b></td>
            <td align='right'>".number_format($Total_Factura,2,",",".")."</td>
          </tr>
        </table>
        </div>";

echo "<style type='text/css'> .centrar { text-align: center;}</style>";

}







////////////////////////////////////////////////////////////////////////////?Modulo de PreFactura del Contrato por Capitacion //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////?Modulo de PreFactura del Contrato por Capitacion //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////?Modulo de PreFactura del Contrato por Capitacion //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



elseif($_POST["Tipo_Consulta"] == "Tabla Detalles Factura Entidad Capitacion"){

    echo "<div class='panel panel-default'>
                                <div class='panel-heading' style='color: black!important;background-color: #9bc2da!important;border-color: #01cd36!important;'>
                                    <h4 class='panel-title' style='text-align: center;'>
                                        <a data-toggle='collapse' href='#collapse1' style='display: block;'>Detalles de factura relacionados a la entidad convenio actual</a>
                                    </h4>
                                </div>
                                <div id='collapse1' class='panel-collapse collapse'>
                                    <div class='panel-body'>

                                    <table id='example1' class='table table-bordered table-striped' style='width:100%;'>
                                    <thead>
                                        <tr>
                                            <th scope='col'>#</th>
                                            <th scope='col' class='centrar' >idOperacion</th>
                                            <th scope='col' class='centrar' >Copago</th>
                                            <th scope='col' class='centrar' >Nombre Cliente</th>
                                            <th scope='col' class='centrar' >Nombre del Producto/Servicio</th>
                                            <th scope='col' class='centrar' >Precio</th>
                                            <th scope='col' class='centrar' >Cantidad</th>
                                            <th scope='col' class='centrar' >Valor</th>
                                            <th scope='col' class='centrar' >Iva</th>
                                            <th scope='col' class='centrar' >Subtotal</th>
                                            <th scope='col' class='centrar' >Descuento</th>
                                            <th scope='col' class='centrar' >Total Cliente</th>
                                        </tr>
                                    </thead>
                                    <tbody>";

                                    $convenio_id = $_POST["convenio_id"];
                                    $entidad_id = $_POST["entidad_id"];
                                    $usuario_id = $_POST["usuario_id"];

                                    //ponerle color a los detalles que ya fueron agregados al detalle de la entidad con el contrato tipo capitacion
                                    $queryList = mysqli_query($conn3, "SELECT * FROM  FE_DetallesOperacion_Temp WHERE entidad_id='{$entidad_id}' AND convenio_id='{$convenio_id}' AND usuario_id='{$usuario_id}' AND Tipo_Detalle='3' ORDER BY id ASC");
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                        $ArregloDetalles = $rowMotorizado["Mas_Informacion"]; 
                                    }

                                    $ArregloDetalles = json_decode($ArregloDetalles, true);
                                    foreach ($ArregloDetalles as $key => $value) {
                                        foreach ($value as $key1 => $value1) {
                                            $ArregloPersonalizado[$key][$value1]="Existe";
                                        }
                                    }

                                    $QueryFactura = mysqli_query($conn3, "SELECT * FROM  FE_Operacion WHERE usuario_id='{$usuario_id}' AND Tipo_Operacion='0' AND CobroEntidad='0'");
                                    while ($RowFactura = mysqli_fetch_array($QueryFactura)) {    

                                        $idOperacion = $RowFactura["idOperacion"];
                                        $QueryDetalle = mysqli_query($conn3, "SELECT * FROM  FE_DetallesOperacion WHERE idOperacion='{$idOperacion}' AND entidad_id='{$entidad_id}' AND convenio_id='{$convenio_id}' AND Tipo_Factura='1' AND Estado_Detalle_Entidad !='2' ORDER BY id ASC");
                                        while ($rowMotorizado = mysqli_fetch_array($QueryDetalle)) {
                                            $contador++;
                                            $id = $rowMotorizado['id'];
                                            $Copago = $rowMotorizado['Copago'];
                                            $Descripcion = $rowMotorizado['Descripcion'];
                                            $Base = $rowMotorizado['Base'];
                                            $Cantidad = $rowMotorizado['Cantidad'];
                                            $TotalBase = $rowMotorizado['TotalBase'];

                                            $Monto_Iva = $rowMotorizado['Monto_Iva'];
                                            $Iva  = $rowMotorizado['Iva'];

                                            $Subtotal = $rowMotorizado['Subtotal'];

                                            $Monto_Descuento = $rowMotorizado['Monto_Descuento'];
                                            $Descuento  = $rowMotorizado['Descuento'];

                                            $Descuento_Texto="";
                                            if (strpos($Descuento, '%') !== false) {
                                                $Descuento_Texto = " [ ".$Descuento." ]";
                                            }

                                            $TotalDetalle = $rowMotorizado['TotalDetalle'];

                                            $cliente_id  = $rowMotorizado['cliente_id'];    
                                            $Nombre=funcionMaster($cliente_id,'cliente_id','nombre_cliente','cliente');
                                            
                                            if($ArregloPersonalizado[$idOperacion][$id]=="Existe"){
                                                $Color="style='background-color:#d0e5d0;'";
                                            }else{
                                                $Color="style='background-color:#f7d4d4;'";
                                            }
                                            
                                            echo "<tr {$Color}><th scope='row' width='2%'>{$contador}</th>";

                                            echo "<td width='2%' class='centrar'>{$idOperacion}</td>
                                            <td width='2%' class='centrar'>{$Copago}</td>
                                            <td width='20%' class='centrar'>{$Nombre}</td>
                                            <td width='20%' class='centrar'>{$Descripcion}</td>
                                            <td width='5%' class='centrar'>".number_format($Base, 2, ",", ".")." </td>
                                            <td width='2%' class='centrar'>".number_format($Cantidad, 2, ",", ".")." </td>
                                            <td width='5%' class='centrar'>".number_format($TotalBase, 2, ",", ".")." </td>
                                            <td width='10%' class='centrar'>".number_format($Monto_Iva, 2, ",", ".")."  [{$Iva}%]</td>
                                            <td width='5%' class='centrar'>".number_format($Subtotal, 2, ",", ".")." </td>
                                            <td width='10%' class='centrar'>".number_format($Monto_Descuento, 2, ",", ".")."  {$Descuento_Texto}</td>
                                            <td width='5%' class='centrar'>".number_format($TotalDetalle, 2, ",", ".")." </td>";
                                            
                                            echo "</tr>";

                                        }
                                    }

                                echo "<label> Si el color de fondo del detalle es verde significa que el detalle cargado para facturar este convenio tiene relacion con ese detalle</label>
                                    </tbody>
                                </table>

                                <style type='text/css'> .centrar { text-align: center;}</style>
                                    </div>
                                    <div class='panel-footer' style='background-color: #9bc1d8;'>Detalles Relacionados</div>
                                </div>
                            </div>";
}


elseif($_POST["Tipo_Consulta"] == "Detalle Factura Entidad Capitacion"){

    $convenio_id = $_POST["convenio_id"];
    $entidad_id = $_POST["entidad_id"];
    $usuario_id = $_POST["usuario_id"];

    $queryList = mysqli_query($conn3, "SELECT * FROM  FE_Convenios  WHERE id = $convenio_id AND Activo = 1 ORDER BY id DESC");
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $Tipo_Contrato = $rowMotorizado["Tipo_Contrato"];
        $Nombre = $rowMotorizado["Nombre"];
        $fe_valor_convenio = $rowMotorizado["fe_valor_convenio"];
    }

    //Tipo_Operacion = 0 -> facturacion cliente 
    //Tipo_Detalles = 1 -> esta factura se facturo con tarifas de convenios osea que es una factura por entidad
    $queryList = mysqli_query($conn3, "SELECT * FROM  FE_Operacion  WHERE Tipo_Operacion = '0' AND Tipo_Detalles = '1'  AND CobroEntidad = '0' ORDER BY idOperacion DESC");
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $idOperacion = $rowMotorizado["idOperacion"];

        $QueryDetalles = mysqli_query($conn3, "SELECT * FROM  FE_DetallesOperacion  WHERE idOperacion = $idOperacion AND entidad_id = $entidad_id AND convenio_id = $convenio_id AND Tipo_Factura='1' AND Estado_Detalle_Entidad='0' ORDER BY id ASC");
        while ($RowDetalles = mysqli_fetch_array($QueryDetalles)) {
            $ArregloCapitacion[$idOperacion][] = $RowDetalles["id"];
        }
    }

    $ListaMasInformacion = json_encode($ArregloCapitacion, JSON_UNESCAPED_UNICODE);

    $queryList = mysqli_query($conn3, "SELECT * FROM  FE_DetallesOperacion_Temp WHERE entidad_id='{$entidad_id}' AND convenio_id='{$convenio_id}' AND usuario_id='{$usuario_id}' AND Tipo_Detalle='3' AND Tipo_Factura='2' limit 1");
    $nrow = mysqli_num_rows($queryList);
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $detalle_capitacion_id = $rowMotorizado['id'];
    }


    echo"<table id='example1' class='table table-bordered table-striped'>
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Descripcion</th>
                                            <th>Precio</th>
                                            <th>Cantidad</th>
                                            <th>Total</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>";

                                    echo "<tr><td width='2%' class='centrar'>1</td>
                                                <td width='5%' class='centrar'> Contrato - {$Nombre} </td>
                                                <td width='2%' class='centrar'>".number_format($fe_valor_convenio, 2, ",", ".")." </td>
                                                <td width='5%' class='centrar'>".number_format("1", 2, ",", ".")." </td>
                                                <td width='10%' class='centrar'>".number_format($fe_valor_convenio, 2, ",", ".")."
                                                <input type='hidden' id='Mas_Informacion_Capitacion' value='{$ListaMasInformacion}'>
                                                </td>";
                                        if($nrow==1){
                                            echo "<td width='2%'>
                                                    <a href='#' onclick='EliminarDetalleCapitacion(this,$detalle_capitacion_id)'><i class='fa fa-trash'></i></a>
                                                </td>";
                                        }else{
                                            echo "<td width='2%'>
                                                    
                                                    <a href='#' onclick='AgregarDetalleCapitacion(this)'><i class='fa fa-plus'></i></a>
                                                </td>";
                                        }
                                                
                                            echo"</tr>";

                            echo "</tbody>
                            </table>";
}




elseif($_POST["Tipo_Consulta"] == "Agregar Detalle Factura Entidad Capitacion"){

    date_default_timezone_set('America/Bogota');
    
    $usuario_id = $_POST['usuario_id'];
    $cliente_id = "0";

    $entidad_id = $_POST['entidad_id'];
    $convenio_id = $_POST['convenio_id'];
    $Mas_Informacion_Capitacion = $_POST['Mas_Informacion_Capitacion'];

    $idOperacion = 0;
    $fechaRegistro = date("Y-m-d H:i:s");

    $queryList = mysqli_query($conn3, "SELECT * FROM  FE_DetallesOperacion_Temp WHERE entidad_id='{$entidad_id}' AND convenio_id='{$convenio_id}' AND usuario_id='{$usuario_id}' AND Tipo_Detalle='3' AND Tipo_Factura='2' ");
    $nrow = mysqli_num_rows($queryList);

    if($nrow==1){
        echo "Error";
        exit();
    }
    /////////////////////////Datos///////////////////////////////////
    $queryList = mysqli_query($conn3, "SELECT * FROM  FE_Convenios  WHERE id = $convenio_id AND Activo = 1 ORDER BY id DESC");
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $Nombre = $rowMotorizado["Nombre"];
        $fe_valor_convenio = $rowMotorizado["fe_valor_convenio"];
    }

    $tarifa_id = "0";
    $producto_id = "0";
    $Descripcion = "Contrato - {$Nombre}";

    $Base = $fe_valor_convenio;
    $Cantidad = 1;
    $TotalBase = round($Base * $Cantidad,2);

    $Iva = 0;
    $Monto_Iva = 0;

    $Subtotal = $TotalBase+$Monto_Iva;

    $Descuento = 0;
    $Monto_Descuento = 0;
    
    $TotalDetalle = round($Subtotal - $Monto_Descuento,2);

    $Copago = "";

    //Este es un Detalle Tipo Entidad
    $Tipo_Detalle = 3;
    $Tipo_Factura = "2";//1->Factura Tipo Cliente | 2->Factura Tipo Entidad
    

    $listafinal = $Mas_Informacion_Capitacion;

    $queryList = mysqli_query($conn3, "INSERT INTO FE_DetallesOperacion_Temp ( idOperacion, fechaRegistro, Producto_id, Descripcion, Base, Cantidad, TotalBase,   Iva,  Monto_Iva,   Subtotal,  Descuento,  Monto_Descuento, TotalDetalle,                     Copago, tarifa_id, usuario_id, cliente_id,                  entidad_id,convenio_id,           Mas_Informacion,Tipo_Detalle,Tipo_Factura) 
                                                        VALUES ('$idOperacion','$fechaRegistro','$producto_id','$Descripcion','$Base','$Cantidad','$TotalBase','$Iva','$Monto_Iva','$Subtotal' ,'$Descuento', '$Monto_Descuento','$TotalDetalle',      '$Copago','$tarifa_id','$usuario_id','$cliente_id',    '$entidad_id','$convenio_id',        '$listafinal','$Tipo_Detalle','$Tipo_Factura');");

    $idDetalleCapitacion = mysqli_insert_id($conn3);
    if ($queryList != true) {
        echo "Error";
    }else{
        echo $idDetalleCapitacion;
    }
}


elseif($_POST["Tipo_Consulta"] == "Eliminar Detalle Factura Entidad Capitacion")
{
    $usuario_id = $_POST['usuario_id'];
    $detalle_id = $_POST['detalle_id'];

    $entidad_id = $_POST['entidad_id'];
    $convenio_id = $_POST['convenio_id'];

    $queryList = mysqli_query($conn3,"DELETE from FE_DetallesOperacion_Temp WHERE id = $detalle_id AND usuario_id='$usuario_id' AND entidad_id='$entidad_id' AND convenio_id='$convenio_id' AND Tipo_Factura='2' LIMIT 1");


    if ($queryList != true) {
        echo "Error";
    }else{
        echo "1";
    }

}



////////////////////////////////////////////////////////////////////////////?Modulo de PreFactura del Contrato por Capitacion  FINAL//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////?Modulo de PreFactura del Contrato por Capitacion  FINAL//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////?Modulo de PreFactura del Contrato por Capitacion  FINAL//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////































////////////////////////////////////////////////////////////////////////////? Modulo PreFactura Para Contrato Por Paquetes/Lotes //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////? Modulo PreFactura Para Contrato Por Paquetes/Lotes //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////? Modulo PreFactura Para Contrato Por Paquetes/Lotes //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////





elseif($_POST["Tipo_Consulta"] == "Tabla Detalles Factura Entidad Paquete"){

    echo "<div class='panel panel-default'>
                                <div class='panel-heading' style='color: black!important;background-color: #9bc2da!important;border-color: #01cd36!important;'>
                                    <h4 class='panel-title' style='text-align: center;'>
                                        <a data-toggle='collapse' href='#collapse1' style='display: block;'>Detalles de factura relacionados a la entidad convenio actual</a>
                                    </h4>
                                </div>
                                <div id='collapse1' class='panel-collapse collapse'>
                                    <div class='panel-body'>

                                    <table id='example1' class='table table-bordered table-striped' style='width:100%;'>
                                    <thead>
                                        <tr>
                                            <th scope='col'>#</th>
                                            <th scope='col' class='centrar' >idOperacion</th>
                                            
                                            <th scope='col' class='centrar' >Nombre Cliente</th>
                                            <th scope='col' class='centrar' >Nombre del Producto/Servicio</th>
                                            <th scope='col' class='centrar' >Precio Tarifa</th>
                                            <th scope='col' class='centrar' >Copago</th>
                                            <th scope='col' class='centrar' >Cantidad</th>
                                            <th scope='col' class='centrar' >Total Bruto Cliente</th>
                                            <th scope='col' class='centrar' >Total Entidad</th>
                                        </tr>
                                    </thead>
                                    <tbody>";

                                    $convenio_id = $_POST["convenio_id"];
                                    $entidad_id = $_POST["entidad_id"];
                                    $usuario_id = $_POST["usuario_id"];

                                    $QueryFactura = mysqli_query($conn3, "SELECT * FROM  FE_Operacion WHERE usuario_id='{$usuario_id}' AND Tipo_Operacion='0' AND CobroEntidad='0'");
                                    while ($RowFactura = mysqli_fetch_array($QueryFactura)) {    

                                        $idOperacion = $RowFactura["idOperacion"];
                                        $QueryDetalle = mysqli_query($conn3, "SELECT * FROM  FE_DetallesOperacion WHERE idOperacion='{$idOperacion}' AND entidad_id='{$entidad_id}' AND convenio_id='{$convenio_id}' AND Tipo_Factura='1' AND Estado_Detalle_Entidad !='2' ORDER BY id ASC");
                                        while ($rowMotorizado = mysqli_fetch_array($QueryDetalle)) {
                                            $contador++;
                                            $id = $rowMotorizado['id'];
                                            $Copago = $rowMotorizado['Copago'];
                                            $Descripcion = $rowMotorizado['Descripcion'];
                                            $Base = $rowMotorizado['Base'];
                                            $Cantidad = $rowMotorizado['Cantidad'];
                                            $TotalBase = $rowMotorizado['TotalBase'];

                                            $Monto_Iva = $rowMotorizado['Monto_Iva'];
                                            $Iva  = $rowMotorizado['Iva'];

                                            $Subtotal = $rowMotorizado['Subtotal'];

                                            $Monto_Descuento = $rowMotorizado['Monto_Descuento'];
                                            $Descuento  = $rowMotorizado['Descuento'];

                                            $Descuento_Texto="";
                                            if (strpos($Descuento, '%') !== false) {
                                                $Descuento_Texto = " [ ".$Descuento." ]";
                                            }

                                            $TotalDetalle = $rowMotorizado['TotalDetalle'];

                                            $cliente_id  = $rowMotorizado['cliente_id'];    
                                            $Nombre=funcionMaster($cliente_id,'cliente_id','nombre_cliente','cliente');
                                            
                                            $QueryTemporalDetalle = mysqli_query($conn3, "SELECT * FROM  FE_DetallesOperacion_Temp WHERE entidad_id='{$entidad_id}' AND convenio_id='{$convenio_id}' AND Detalle_Origen='$id'");
                                            $nrow = mysqli_num_rows($QueryTemporalDetalle);

                                            if($nrow!="0"){
                                                $Color="style='background-color:#d0e5d0;'";
                                            }else{
                                                $Color="style='background-color:#f7d4d4;'";
                                            }
                                            
                                            $ValorBase = $rowMotorizado["Base"];
                                            $PagoEntidad = 100-$rowMotorizado["Copago"];
                                            $ValorBaseTarifa = ($ValorBase*100)/$rowMotorizado["Copago"];

                                            $ValorBaseFinal = ($ValorBase*$PagoEntidad)/$rowMotorizado["Copago"];
                                            $ValorTotalFinal=$ValorBaseFinal*$rowMotorizado["Cantidad"];

                                            if($Copago!="100"){

                                                echo "<tr {$Color}><th scope='row' width='2%'>{$contador}</th>";

                                                echo "<td width='2%' class='centrar'>{$idOperacion}</td>
                                                
                                                <td width='20%' class='centrar'>{$Nombre}</td>
                                                <td width='20%' class='centrar'>{$Descripcion}</td>
                                                <td width='5%' class='centrar'>".number_format($ValorBaseTarifa, 2, ",", ".")." </td>
                                                <td width='2%' class='centrar'>{$Copago}</td>
                                                <td width='2%' class='centrar'>".number_format($Cantidad, 2, ",", ".")." </td>
                                                <td width='5%' class='centrar'>".number_format($TotalBase, 2, ",", ".")." </td>
                                                <td width='5%' class='centrar'>".number_format($ValorTotalFinal, 2, ",", ".")." </td>";
                                                
                                                echo "</tr>";
                                            }

                                        }
                                        
                                    }
                                echo "<label> Si el color de fondo del detalle es verde significa que el detalle cargado para facturar este convenio tiene relacion con ese detalle</label>
                                    </tbody>
                                </table>

                                <style type='text/css'> .centrar { text-align: center;}</style>
                                    </div>
                                    <div class='panel-footer' style='background-color: #9bc1d8;'>Detalles Relacionados</div>
                                </div>
                            </div>";
}






elseif($_POST["Tipo_Consulta"] == "Detalle Factura Entidad Paquete"){

    $convenio_id = $_POST["convenio_id"];
    $entidad_id = $_POST["entidad_id"];
    $usuario_id = $_POST["usuario_id"];

    echo"<table id='example1' class='table table-bordered table-striped'>
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Descripcion</th>
                                            <th>Precio</th>
                                            <th>Cantidad</th>
                                            <th>Total</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>";

                                    $QueryFactura = mysqli_query($conn3, "SELECT * FROM  FE_Operacion WHERE usuario_id='{$usuario_id}' AND Tipo_Operacion='0' AND CobroEntidad='0'");
                                    while ($RowFactura = mysqli_fetch_array($QueryFactura)) {    

                                        $idOperacion = $RowFactura["idOperacion"];
                                        $QueryDetalle = mysqli_query($conn3, "SELECT * FROM  FE_DetallesOperacion WHERE idOperacion='{$idOperacion}' AND entidad_id='{$entidad_id}' AND convenio_id='{$convenio_id}' AND Tipo_Factura='1' AND Estado_Detalle_Entidad !='2' ORDER BY id ASC");
                                        while ($rowMotorizado = mysqli_fetch_array($QueryDetalle)) {
                                            $contador++;
                                            $id = $rowMotorizado['id'];
                                            $Copago = $rowMotorizado['Copago'];
                                            $Descripcion = $rowMotorizado['Descripcion'];
                                            $ValorBase = $rowMotorizado["Base"];
                                            $Cantidad = $rowMotorizado["Cantidad"];

                                            $PagoEntidad = 100-$Copago;
                                            $ValorBaseTarifa = ($ValorBase*100)/$Copago;

                                            $ValorBaseEntidad = ($ValorBase*$PagoEntidad)/$Copago;
                                            $ValorTotalFinal=$ValorBaseEntidad*$Cantidad;

                                            $QueryTemporalDetalle = mysqli_query($conn3, "SELECT * FROM  FE_DetallesOperacion_Temp WHERE entidad_id='{$entidad_id}' AND convenio_id='{$convenio_id}' AND Detalle_Origen='$id'");
                                            $nrow = mysqli_num_rows($QueryTemporalDetalle);
                                            while ($rowTemp = mysqli_fetch_array($QueryTemporalDetalle)) {
                                                $detalle_paquete_id = $rowTemp['id'];
                                            }

                                            if($Copago!="100"){

                                                echo "<tr {$Color}><th scope='row' width='2%'>{$contador}</th>";

                                                echo "
                                                <td width='20%' class='centrar'>{$Descripcion}</td>
                                                <td width='5%' class='centrar'>".number_format($ValorBaseEntidad, 2, ",", ".")." </td>
                                                <td width='2%' class='centrar'>{$Cantidad}</td>
                                                <td width='5%' class='centrar'>".number_format($ValorTotalFinal, 2, ",", ".")." </td>";
                                                
                                                if($nrow==1){
                                                    echo "<td width='2%'>
                                                            <a href='#' onclick='EliminarDetallePaquete(this,$detalle_paquete_id)'><i class='fa fa-trash'></i></a>
                                                        </td>";
                                                }else{
                                                    echo "<td width='2%'>
                                                            <a href='#' onclick='AgregarDetallePaquete(this,$id)'><i class='fa fa-plus'></i></a>
                                                        </td>";
                                                }

                                                echo "</tr>";

                                            }

                                        }
                                        
                                    }

                            echo "</tbody>
                            </table>";
}





elseif($_POST["Tipo_Consulta"] == "Agregar Detalle Factura Entidad Paquete"){

    date_default_timezone_set('America/Bogota');
    
    $usuario_id = $_POST['usuario_id'];
    $detalle_id = $_POST['detalle_id'];

    $entidad_id = $_POST['entidad_id'];
    $convenio_id = $_POST['convenio_id'];

    $idOperacion = 0;
    $fechaRegistro = date("Y-m-d H:i:s");

    $QueryTemporalDetalle = mysqli_query($conn3, "SELECT * FROM  FE_DetallesOperacion_Temp WHERE entidad_id='{$entidad_id}' AND convenio_id='{$convenio_id}' AND Detalle_Origen='$detalle_id'");
    $nrow = mysqli_num_rows($QueryTemporalDetalle);

    if($nrow==1){
        echo "Error";
        exit();
    }


    $QueryDetalle = mysqli_query($conn3, "SELECT * FROM  FE_DetallesOperacion WHERE id='{$detalle_id}' AND  Estado_Detalle_Entidad !='2' ORDER BY id ASC");
    while ($rowMotorizado = mysqli_fetch_array($QueryDetalle)) {

        $ArregloDetalles["producto_id"] = $rowMotorizado['producto_id'];
        $ArregloDetalles["Descripcion"] = $rowMotorizado['Descripcion'];

        /*
        $ArregloDetalles["Base"] = $rowMotorizado['Base'];
        $ArregloDetalles["Cantidad"] = $rowMotorizado['Cantidad'];
        $ArregloDetalles["TotalBase"] = $rowMotorizado['TotalBase'];
        */

        ////////////////|Calculo Valor Restante a Pagar ///////////////////////////////////////////
        $ValorBase = $rowMotorizado["Base"];
        $Cantidad = $rowMotorizado["Cantidad"];
        $Copago = $rowMotorizado["Copago"];
        $PagoEntidad = 100-$Copago;

        $ValorBaseEntidad = ($ValorBase*$PagoEntidad)/$Copago;
        $ValorTotalFinal=$ValorBaseEntidad*$Cantidad;
        ////////////////| /////////////////////////////////////////////////////////////////////////

        $ArregloDetalles["Base"] = $ValorBaseEntidad;
        $ArregloDetalles["Cantidad"] = $Cantidad;
        $ArregloDetalles["TotalBase"] = $ValorTotalFinal;


        /////////////////////////////////////////////////////////////

        $ArregloDetalles["Iva"] = "0";
        $ArregloDetalles["Monto_Iva"] = "0";

        $ArregloDetalles["Subtotal"] = $ValorTotalFinal;

        $ArregloDetalles["Descuento"] = "0";
        $ArregloDetalles["Monto_Descuento"] = "0";
        
        $ArregloDetalles["TotalDetalle"] = $ValorTotalFinal;

        $ArregloDetalles["Copago"] = "";
        $ArregloDetalles["Mas_Informacion"] = "";
        $ArregloDetalles["Tipo_Detalle"] = "3";//3->Detalle entidad

        $ArregloDetalles["Nota_Credito"] = "0";
        $ArregloDetalles["tarifa_id"] = $rowMotorizado['tarifa_id'];
        $ArregloDetalles["usuario_id"] = $usuario_id;
        $ArregloDetalles["cliente_id"] = $rowMotorizado['cliente_id'];
        $ArregloDetalles["entidad_id"] = $rowMotorizado['entidad_id'];
        $ArregloDetalles["convenio_id"] = $rowMotorizado['convenio_id'];
        
        $ArregloDetalles["Estado_Detalle_Entidad"] =""; 
        $ArregloDetalles["Tipo_Producto"] = $rowMotorizado['Tipo_Producto'];
        $ArregloDetalles["Detalle_Origen"] = $rowMotorizado['id'];
        $ArregloDetalles["Tipo_Factura"] = "2";//1->Factura Tipo Cliente | 2->Factura Tipo Entidad

        $ArregloDetalles["idOperacion"] = "0";


        $Campos="";$Valores="";
        foreach ($ArregloDetalles as $key => $value) {
            $Campos .= $key . ',';
            $Valores .= "'{$value}',";
        }
        $Campos = trim($Campos, ',');
        $Valores = trim($Valores, ',');

        $queryList = mysqli_query($conn3, "INSERT INTO FE_DetallesOperacion_Temp ({$Campos}) VALUES ({$Valores});") or die(mysqli_error($conn3));

        $idDetalleCapitacion = mysqli_insert_id($conn3);
    }

    if ($queryList != true) {
        echo "Error";
    }else{
        echo $idDetalleCapitacion;
    }
}







elseif($_POST["Tipo_Consulta"] == "Eliminar Detalle Factura Entidad Paquete")
{
    $usuario_id = $_POST['usuario_id'];
    $detalle_id_temp = $_POST['detalle_id_temp'];

    $entidad_id = $_POST['entidad_id'];
    $convenio_id = $_POST['convenio_id'];

    $queryList = mysqli_query($conn3,"DELETE from FE_DetallesOperacion_Temp WHERE id = $detalle_id_temp AND usuario_id='$usuario_id' AND entidad_id='$entidad_id' AND convenio_id='$convenio_id' AND Tipo_Factura='2' LIMIT 1");
    $FilasAfectadas = mysqli_affected_rows($conn3);

    if ($FilasAfectadas == "0") {
        echo "Error";
    }else{
        echo "1";
    }

}






////////////////////////////////////////////////////////////////////////////? Modulo PreFactura Para Contrato Por Paquetes/Lotes FINAL //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////? Modulo PreFactura Para Contrato Por Paquetes/Lotes FINAL //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////? Modulo PreFactura Para Contrato Por Paquetes/Lotes FINAL //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
