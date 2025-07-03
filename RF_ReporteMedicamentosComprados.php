<?php
include 'funciones/conn3.php';

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

$desde = $_POST['desde'];
$hasta = $_POST['hasta'];
$usuario_id = $_POST['usuario_id'];

$Producto = $_POST['Producto'];
$Deposito = $_POST['Deposito'];
$Proveedor = $_POST['Proveedor'];
    header('Content-Type: application/vnd.ms-excel; charset=UTF-8');
    header('Content-Disposition: attachment; filename=ReporteMedicamentosComprados_'.$desde.'_'.$hasta.'.xls');

        echo "<table border='1' cellpadding='2' cellspacing='0' width='100%'>";
        echo "<tr>";
        echo "<td>Proveedor</td>
        <td>Producto</td>
        <td>Tipo</td>
        <td>Deposito</td>
        <td>Lote</td>
        <td>Cantidad Productos Vendidos</td>";
        echo "</tr>";
        
        $QueryDetalles="";
        if($Producto!="Todos"){
            $QueryDetalles.="AND idProducto = '$Producto' ";
        }
        if($Deposito!="Todos"){
            $QueryDetalles.="AND Deposito_id = '$Deposito' ";
        }

        $QueryFactura="";
        if($Proveedor!="Todos"){
            $QueryFactura.="AND ID_Empresa = '$Proveedor' ";
        }
        /*
        echo "<tr>";
        echo "<td> SELECT * FROM sOperacionInv WHERE  (fechaOperacion BETWEEN '{$desde}' AND '{$hasta}') $QueryFactura AND tipo = 1 ORDER BY idOperacion DESC </td>";
        echo "</tr>";
        */
        
        $QueryFactura = mysqli_query($conn3, "SELECT * FROM sOperacionInv WHERE  (fechaOperacion BETWEEN '{$desde}' AND '{$hasta}') $QueryFactura AND tipo = 3 ORDER BY idOperacion DESC");
        while ($RowFactura= mysqli_fetch_array($QueryFactura)) {

            $idOperacion = $RowFactura["idOperacion"];
            $Proveedor_id = $RowFactura["ID_Empresa"];

            $QueryInventario = mysqli_query($conn3, "SELECT * FROM sDetalleOper WHERE idOperacion = '$idOperacion' AND estado = 1 ORDER BY idOperacion DESC");
            while ($RowInventario= mysqli_fetch_array($QueryInventario)) {
                
                $idProducto = $RowInventario["idProducto"];
                $TipoProducto = funcionMaster($idProducto,'ID','tipo','sinvetrios');
                $ClasificacionProducto = funcionMaster($TipoProducto,'id','tipo','scategoria');

                $NombreProducto = $RowInventario["descripcion"];
                $Deposito = funcionMaster($RowInventario["Deposito_id"],'id','descripcion','dep');
                $Lote = funcionMaster($RowInventario["SinvDep_id"],'id','lote','SinvDep');

                switch ($ClasificacionProducto) {
                    case '1':
                        //Simple
                        $ArregloInventarios[$RowInventario["idProducto"]][$Proveedor_id][$RowInventario["SinvDep_id"]]["Existencias"] = $ArregloInventarios[$RowInventario["idProducto"]][$Proveedor_id][$RowInventario["SinvDep_id"]]["Existencias"]+ $RowInventario["cantidad"];
                        $ArregloInventarios[$RowInventario["idProducto"]][$Proveedor_id][$RowInventario["SinvDep_id"]]["Tipo"] = "Simple";
                        $ArregloInventarios[$RowInventario["idProducto"]][$Proveedor_id][$RowInventario["SinvDep_id"]]["Nombre"] = $NombreProducto;
                        $ArregloInventarios[$RowInventario["idProducto"]][$Proveedor_id][$RowInventario["SinvDep_id"]]["Deposito"] = $Deposito;
                        
                        break;
                    case '2':
                        //Servicios
                        $ArregloInventarios[$RowInventario["idProducto"]][$Proveedor_id][$RowInventario["Deposito_id"]]["Existencias"] = $ArregloInventarios[$RowInventario["idProducto"]][$Proveedor_id][$RowInventario["Deposito_id"]]["Existencias"]+$RowInventario["cantidad"];
                        $ArregloInventarios[$RowInventario["idProducto"]][$Proveedor_id][$RowInventario["Deposito_id"]]["Tipo"] = "Servicio";
                        $ArregloInventarios[$RowInventario["idProducto"]][$Proveedor_id][$RowInventario["Deposito_id"]]["Nombre"] = $NombreProducto;
                        $ArregloInventarios[$RowInventario["idProducto"]][$Proveedor_id][$RowInventario["Deposito_id"]]["Deposito"] = $Deposito;
                        break;
                    case '3':
                        //Compuesto
                        $ArregloInventarios[$RowInventario["idProducto"]][$Proveedor_id][$RowInventario["Deposito_id"]]["Existencias"] = $ArregloInventarios[$RowInventario["idProducto"]][$Proveedor_id][$RowInventario["Deposito_id"]]["Existencias"]+$RowInventario["cantidad"];
                        $ArregloInventarios[$RowInventario["idProducto"]][$Proveedor_id][$RowInventario["Deposito_id"]]["Tipo"] = "Compuesto";
                        $ArregloInventarios[$RowInventario["idProducto"]][$Proveedor_id][$RowInventario["Deposito_id"]]["Nombre"] = $NombreProducto;
                        $ArregloInventarios[$RowInventario["idProducto"]][$Proveedor_id][$RowInventario["Deposito_id"]]["Deposito"] = $Deposito;
                        break;
                    case '5':
                        //Lote
                        $ArregloInventarios[$RowInventario["idProducto"]][$Proveedor_id][$RowInventario["SinvDep_id"]]["Existencias"] = $ArregloInventarios[$RowInventario["idProducto"]][$Proveedor_id][$RowInventario["SinvDep_id"]]["Existencias"]+$RowInventario["cantidad"];
                        $ArregloInventarios[$RowInventario["idProducto"]][$Proveedor_id][$RowInventario["SinvDep_id"]]["Tipo"] = "Lotes";
                        $ArregloInventarios[$RowInventario["idProducto"]][$Proveedor_id][$RowInventario["SinvDep_id"]]["Nombre"] = $NombreProducto;
                        $ArregloInventarios[$RowInventario["idProducto"]][$Proveedor_id][$RowInventario["SinvDep_id"]]["Deposito"] = $Deposito;
                        $ArregloInventarios[$RowInventario["idProducto"]][$Proveedor_id][$RowInventario["SinvDep_id"]]["Lote"] = $Lote;
                        break;
                }
                
            }
        
        }

        //echo "<pre>";
        //print_r($ArregloInventarios);
        //echo "</pre>";  

        foreach ($ArregloInventarios as $key => $value) {

            $idProducto = $key;
            foreach ($value as $key1 => $value1) {
                
                foreach ($value1 as $key2 => $value2) {
                
                    echo "<tr>
                        <td>
                            ".funcionMaster($key1,'id','nombre','sproveedores')."
                        </td>
                        <td>
                            ".$value2['Nombre']."
                        </td>
                        <td>
                            ".$value2['Tipo']."
                        </td>
                        <td>
                            ".$value2['Deposito']."
                        </td>
                        <td>
                        ".$value2['Lote']."
                        </td>
                        <td>
                            ".$value2['Existencias']."
                        </td>
                    </tr>";

                    $ExistenciaTotal = $ExistenciaTotal+$value2['Existencias'];
    
                }

            }
            # code...
        }
        
        
        echo "<tr>
        <td>

        </td>
        <td>

        </td>
        <td>

        </td>
        <td>

        </td>
        <td>

        </td>
        <td>
        Total: ".$ExistenciaTotal."
        </td>
    </tr>";


        echo "</table>";


?>