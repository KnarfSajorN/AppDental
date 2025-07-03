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


if ($_POST["Tipo_Consulta"] == "Consultar Tarifas") {
    
    $FechaHoy = date('Y-m-d');
    $convenio_id = $_POST["convenio_id"];
    $deposito_id = $_POST["deposito_id"];

    $QueryTarifas = mysqli_query($conn3, "SELECT * FROM Rips_Tarifa
                            WHERE convenio_id = '$convenio_id' AND deposito_id = '$deposito_id' AND Activo = '1' ");
    while ($RowTarifas = mysqli_fetch_array($QueryTarifas)) {
        $tarifa_id = $RowTarifas['id'];
      $SinvDep_id = $RowTarifas['SinvDep_id'];
      $inventario_id = $RowTarifas['inventario_id'];
      $Valor = $RowTarifas['Valor'];
      $Copago = $RowTarifas['Copago'];

      $ValorFinal = round($Valor*($Copago/100),2);

      $QueryInventario = mysqli_query($conn3, "SELECT * FROM  sinvetrios WHERE ID = $inventario_id");
       while ($RowInventario = mysqli_fetch_array($QueryInventario)) {
           $tipo = $RowInventario['tipo'];
           $descripcion = $RowInventario['descripcion'];
       }

       $TipoInventarioCodigo = funcionMaster($tipo,'id','tipo','scategoria');

       $FechaVencimiento="";
       if($TipoInventarioCodigo=="5"){
        $FechaVencimiento = funcionMaster($SinvDep_id, 'id', 'fechaVencimiento', 'SinvDep');
        $descripcion.= " - Lote[".funcionMaster($SinvDep_id, 'id', 'lote', 'SinvDep')."]";

        // Añade la condición para verificar si la fecha de vencimiento es mayor que hoy
        if (strtotime($FechaVencimiento) > strtotime($FechaHoy)) {
            $Arreglo["Datos"][]="<option value='$tarifa_id' data-value='$ValorFinal'> $descripcion Copago[%$Copago] </option>";
        }else{
            //$Arreglo["Datos"][]="<option value='$tarifa_id' data-value='$ValorFinal' disabled> $descripcion Copago[%$Copago] $FechaVencimiento</option>";
        }

       }else{
        $Arreglo["Datos"][]="<option value='$tarifa_id' data-value='$ValorFinal'> $descripcion Copago[%$Copago]</option>";
       }
       
    }


    echo json_encode($Arreglo,true);
}



if ($_POST["Tipo_Consulta"] == "Verificar Existencia") {

    $usuario_id = $_POST['usuario_id'];
    $cliente_id = $_POST['cliente_id'];

    $deposito = $_POST['deposito'];
    $tipo = $_POST['tipo'];

    function CalcularExistenciasDescontar($usuario_id, $cliente_id, $deposito,$tipoFactura){
        include 'funciones/conn3.php';
    
        $usuario_id = $usuario_id;
        $cliente_id = $cliente_id;
    
        $deposito = $deposito;

        $TipoServicios="0";

        //aqui se realiza la consulta de todos detalles a facturar
        $queryListT = mysqli_query($conn3, "SELECT * FROM  sDetalleOperPendites WHERE estado = 1 and id_usuario =$usuario_id and  id_cliente = $cliente_id AND tipo = '$tipoFactura'  ORDER BY id ASC");
        while ($rowMotorizadoT = mysqli_fetch_array($queryListT)) {
    
            $Producto_id = $rowMotorizadoT['idProducto'];
            $SinvDep_id = $rowMotorizadoT['SinvDep_id'];
    
            $Cantidad_Producto = $rowMotorizadoT['cantidad'];
    
            $ArregloProductos=array();
            $ArregloExistenciasProducto=array();
            //aqui se va almacenando por id de SinvDep_id las cantidades a descontar
            if($SinvDep_id != "0"){
                $ArregloExistencias_InvDep[$SinvDep_id]["Existencias Descontar"] = $ArregloExistencias_InvDep[$SinvDep_id]["Existencias Descontar"] + $rowMotorizadoT['cantidad'];
            }else{
    
                $queryinv = mysqli_query($conn3, "SELECT * FROM  sinvetrios where ID = $Producto_id");
                while ($rowinv = mysqli_fetch_array($queryinv)) {
                    $tipo = $rowinv['tipo'];
                }
    
                $queryinv = mysqli_query($conn3, "SELECT * FROM  scategoria where id = $tipo LIMIT 1");
                while ($rowinv = mysqli_fetch_array($queryinv)) {
                    $TipoInventario = $rowinv['tipo'];
                }
    
                //aqui se va almacenanar en los productos simples las cantidades a descontar ya que aqui entrarian solo los productos compuestos los cuales descontaran de los productos simples elegidos 
                if($TipoInventario=="3"){
                    
                    //aqui recorremos los productos que tiene el id del producto compuesto a facturar y guardamos el id del inventario
                    $resultCompuestos = mysqli_query($conn3, "SELECT * from SinvComp where idCompuesto = '$Producto_id' and activo = 1");
                    while ($rowCompuestos = mysqli_fetch_array($resultCompuestos)) {
                        $ArregloProductos[$rowCompuestos['idSinvetrios']]=$rowCompuestos['cantidad'];
                    }
    
                    //aqui recorremos el arreglo generado arriba de los productos que se van a descontar para guardar el id de sinvdep
                    foreach ($ArregloProductos as $key => $value) {
                        
                        $QueryProductoLoteTallas = mysqli_query($conn3, "SELECT * FROM  SinvDep where idSinvetrios = $key AND idDep = $deposito LIMIT 1");
                        $nrowl = mysqli_num_rows($QueryProductoLoteTallas);
                        while ($RowProducto = mysqli_fetch_array($QueryProductoLoteTallas)) {
                            $ArregloExistenciasProducto[$key]["id"] = $RowProducto['id'];
                        }
                    }
                    
                    //aqui recorremos los productos que se van a descontar y se multiplicara por la cantidad que se agrego en el detalle del producto al facturar para tener el total de productos a descontar para ese producto simple dentro de esteproducto compuesto
                    foreach ($ArregloProductos as $key => $value) {
                        $ArregloExistencias_InvDep[$ArregloExistenciasProducto[$key]["id"]]["Existencias Descontar"] = $ArregloExistencias_InvDep[$ArregloExistenciasProducto[$key]["id"]]["Existencias Descontar"] + $Cantidad_Producto*$ArregloProductos[$key];
                    }
    
                }

                if($TipoInventario=="2"){
                    $TipoServicios="1";
                }
                
            }
        }

        //aqui recorremos los productos que generamos arriba  para aqui validar si hay existencias suficientes o no y para agregar mas informacion para visualizar al momento de generar el alerta
        foreach ($ArregloExistencias_InvDep as $key => $value) {
            $ExistenciasDescontar = $value['Existencias Descontar'];
    
            $QueryProductoLoteTallas = mysqli_query($conn3, "SELECT * FROM  SinvDep where id = $key LIMIT 1");
            while ($RowProducto = mysqli_fetch_array($QueryProductoLoteTallas)) {
                $ExistenciasSistema = $RowProducto['existencia'];

                $sinvetrios = $RowProducto['idSinvetrios'];
                $queryinv = mysqli_query($conn3, "SELECT * FROM  sinvetrios where id = $sinvetrios LIMIT 1");
                while ($rowinv = mysqli_fetch_array($queryinv)) {
                    $Nombre = $rowinv['descripcion'];
                }
            }
    
            if($ExistenciasDescontar<=$ExistenciasSistema){
                $Arreglo["Detalles"][$key]["Nombre"] = $Nombre;
                $Arreglo["Detalles"][$key]["Estado"] = true;
                $Arreglo["Detalles"][$key]["Existencia"] = $ExistenciasSistema;
                $Arreglo["Detalles"][$key]["Descontar"] = $ExistenciasDescontar;
            }else{
                $Arreglo["Detalles"][$key]["Nombre"] = $Nombre;
                $Arreglo["Detalles"][$key]["Estado"] = false;
                $Arreglo["Detalles"][$key]["Existencia"] = $ExistenciasSistema;
                $Arreglo["Detalles"][$key]["Descontar"] = $ExistenciasDescontar;
                $Arreglo["Detalles"][$key]["Motivo"] = "No  se encuentran existencias suficientes para este producto, una posibilidad es que este agregando un producto simple y uno compuesto en la misma factura y generen este inconveniente al sobrepasar las existencias a facturar, eliminar el detalle del producto";
                $Arreglo["Enviar"] = false;
            }
        }

        if($TipoServicios=="1" AND $Arreglo==NULL){
            $Arreglo["Enviar"] = true;
        }
    
        return $Arreglo;
    }
    
    
    $FacturarExistenciasNegativas=0;
    $QueryConfig = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = '$usuario_id' LIMIT 1");
    while ($RowConfig = mysqli_fetch_array($QueryConfig)) {
        $FacturarExistenciasNegativas = $RowConfig['FacturarExistenciasNegativas'];
    }

    $ArregloExistencias = CalcularExistenciasDescontar($usuario_id,$cliente_id,$deposito,$tipo);
    
    if($FacturarExistenciasNegativas=="0"){
        $ArregloExistencias["FiltroExistenciasNegativas"]="No Facturar";
    }else if($FacturarExistenciasNegativas=="1"){
        $ArregloExistencias["FiltroExistenciasNegativas"]="Facturar";
    }else if($FacturarExistenciasNegativas=="2"){
        $ArregloExistencias["FiltroExistenciasNegativas"]="Token";
    }

    echo json_encode($ArregloExistencias,true);
}



if ($_POST["Tipo_Consulta"] == "Consultar Paquetes") {
    
    $FechaHoy = date('Y-m-d');
    $convenio_id = $_POST["convenio_id"];
    //$deposito_id = $_POST["deposito_id"];

    $QueryTarifas = mysqli_query($conn3, "SELECT * FROM Rips_Paquetes
                            WHERE convenio_id = '$convenio_id' AND Activo = '1' ");
    while ($RowTarifas = mysqli_fetch_array($QueryTarifas)) {
      $Paquete_id = $RowTarifas['id'];
      $Nombre = $RowTarifas['Nombre'];

      $Arreglo["Datos"][]="<option value='$Paquete_id'> $Nombre </option>";
       
       
    }


    echo json_encode($Arreglo,true);
}

if ($_POST["Tipo_Consulta"] == "Consultar Tarifas Paquetes") {
    
    $FechaHoy = date('Y-m-d');
    $paquete_id = $_POST["paquete_id"];
    $deposito_id = $_POST["deposito_id"];

    $QueryTarifas = mysqli_query($conn3, "SELECT * FROM Rips_Tarifa
                            WHERE paquete_id = '$paquete_id' AND deposito_id = '$deposito_id' AND Activo = '1' ");
    while ($RowTarifas = mysqli_fetch_array($QueryTarifas)) {
      $inventario_id = $RowTarifas['inventario_id'];
      
      $QueryInventario = mysqli_query($conn3, "SELECT * FROM  sinvetrios WHERE ID = $inventario_id");
       while ($RowInventario = mysqli_fetch_array($QueryInventario)) {
           $ArregloNombre["Datos"] .= $RowInventario['descripcion']." | ";
       }

       
       
    }


    echo json_encode($ArregloNombre,true);
}





if($_POST["Tipo_Consulta"] == "Tabla Facturacion Entidad Tipo Contrato"){

    $entidad_id = $_POST["entidad_id"];
    $Nombre=funcionMaster($entidad_id,'id','Nombre','Rips_Entidades');
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
                
                    $queryList = mysqli_query($conn3, "SELECT * FROM  Rips_Convenio  WHERE entidad_id = $entidad_id AND Activo = 1 ORDER BY id DESC");
                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                        $id = $rowMotorizado['id'];
                        $Tipo_Contrato = $rowMotorizado["Tipo_Contrato"];
                        $Nombre = $rowMotorizado["Nombre"];
                        $Fecha_Inicio = $rowMotorizado["Fecha_Inicio"];
                        $Fecha_Caducidad = $rowMotorizado["Fecha_Caducidad"];

                        switch ($Tipo_Contrato) {
                            case '1':
                                $Texto_Tipo_Contrato = "Capitacion";
                                $Boton = "<td><a title='Facturacion Capitacion' class='btn btn-block btn-outline-info btn-lg rounded-pill shadow'  href='EN_FacturacionEntidad.php?convenio_id=$id'><i class='fa-regular fa-rectangle-list'></i><br>Facturacion Capitacion</a></td>";

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
                                $Boton = "<td><a title='Facturacion Paquete' class='btn btn-block btn-outline-info btn-lg rounded-pill shadow'  href='EN_FacturacionEntidad.php?convenio_id=$id'><i class='fa-regular fa-rectangle-list'></i><br>Facturacion Paquete</a></td>";
                                
                                echo"<tr>
                                <td>$id</td>
                                <td>$Nombre</td>
                                <td>$Texto_Tipo_Contrato</td>
                                <td>{$Fecha_Inicio} - {$Fecha_Caducidad}</td>";
                        
                                echo $Boton;

                                echo"</tr>";
                                break;

                                
                            
                            case '4':
                                $Texto_Tipo_Contrato = "Lotes";
                                $Boton = "<td><a title='Facturacion Por Lotes' class='btn btn-block btn-outline-info btn-lg rounded-pill shadow'  href='EN_FacturacionEntidad.php?convenio_id=$id'><i class='fa-regular fa-rectangle-list'></i><br>Facturacion Por Lote</a></td>";

                                echo"<tr>
                                <td>$id</td>
                                <td>$Nombre</td>
                                <td>$Texto_Tipo_Contrato</td>
                                <td>{$Fecha_Inicio} - {$Fecha_Caducidad}</td>";
                        
                                echo $Boton;

                                echo"</tr>";

                                break;
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


?>