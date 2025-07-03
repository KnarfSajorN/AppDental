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

$desde = $_POST['desde_fecha'];
$hasta = $_POST['hasta_fecha'];


    header('Content-Type: application/vnd.ms-excel; charset=UTF-8');
    header('Content-Disposition: attachment; filename=ReporteCantidadComprados_'.$desde.'_'.$hasta.'.xls');

        echo "<table border='1' cellpadding='2' cellspacing='0' width='100%'>";
        echo "<tr>";
        echo "<td>Producto</td>
        <td>Tipo</td>
        <td>Deposito</td>
        <td>Lote</td>
        <td>Fecha Vencimiento</td>
        <td>Fecha Expedicion</td>
        <td>Cantidad Productos Vendidos</td>";
        echo "</tr>";

        
        $QueryFactura = mysqli_query($conn3, "SELECT * FROM sOperacionInv WHERE  (fechaOperacion BETWEEN '{$desde}' AND '{$hasta}') $QueryFactura AND tipo = 3 ORDER BY idOperacion DESC");
        while ($RowFactura= mysqli_fetch_array($QueryFactura)) {

            $idOperacion = $RowFactura["idOperacion"];

            $QueryInventario = mysqli_query($conn3, "SELECT * FROM sDetalleOper WHERE idOperacion = '$idOperacion' AND estado = 1 $QueryDetalles ORDER BY idOperacion DESC");
            while ($RowInventario= mysqli_fetch_array($QueryInventario)) {
                
                $idProducto = $RowInventario["idProducto"];
                $TipoProducto = funcionMaster($idProducto,'ID','tipo','sinvetrios');
                $ClasificacionProducto = funcionMaster($TipoProducto,'id','tipo','scategoria');

                $NombreProducto = $RowInventario["descripcion"];
                $Deposito = funcionMaster($RowInventario["Deposito_id"],'id','descripcion','dep');
                $Lote = funcionMaster($RowInventario["SinvDep_id"],'id','lote','SinvDep');

                $FechaExpedicion = funcionMaster($RowInventario["SinvDep_id"],'id','fechaExpedicion','SinvDep');
                $FechaVencimiento = funcionMaster($RowInventario["SinvDep_id"],'id','fechaVencimiento','SinvDep');


                switch ($ClasificacionProducto) {
                    case '1':
                        //Simple
                        $ArregloInventarios[$RowInventario["idProducto"]][$RowInventario["SinvDep_id"]]["Existencias"] = $ArregloInventarios[$RowInventario["idProducto"]][$RowInventario["SinvDep_id"]]["Existencias"]+ $RowInventario["cantidad"];
                        $ArregloInventarios[$RowInventario["idProducto"]][$RowInventario["SinvDep_id"]]["Tipo"] = "Simple";
                        $ArregloInventarios[$RowInventario["idProducto"]][$RowInventario["SinvDep_id"]]["Nombre"] = $NombreProducto;
                        $ArregloInventarios[$RowInventario["idProducto"]][$RowInventario["SinvDep_id"]]["Deposito"] = $Deposito;

                        $ArregloInventarios[$RowInventario["idProducto"]][$RowInventario["SinvDep_id"]]["Expedicion"] = $FechaExpedicion;
                        $ArregloInventarios[$RowInventario["idProducto"]][$RowInventario["SinvDep_id"]]["Vencimiento"] = $FechaVencimiento;
                        
                        break;
                    case '2':
                        //Servicios
                        $ArregloInventarios[$RowInventario["idProducto"]][$RowInventario["Deposito_id"]]["Existencias"] = $ArregloInventarios[$RowInventario["idProducto"]][$RowInventario["Deposito_id"]]["Existencias"]+$RowInventario["cantidad"];
                        $ArregloInventarios[$RowInventario["idProducto"]][$RowInventario["Deposito_id"]]["Tipo"] = "Servicio";
                        $ArregloInventarios[$RowInventario["idProducto"]][$RowInventario["Deposito_id"]]["Nombre"] = $NombreProducto;
                        $ArregloInventarios[$RowInventario["idProducto"]][$RowInventario["Deposito_id"]]["Deposito"] = $Deposito;

                        $ArregloInventarios[$RowInventario["idProducto"]][$RowInventario["Deposito_id"]]["Expedicion"] = $FechaExpedicion;
                        $ArregloInventarios[$RowInventario["idProducto"]][$RowInventario["Deposito_id"]]["Vencimiento"] = $FechaVencimiento;

                        break;
                    case '3':
                        //Compuesto
                        $ArregloInventarios[$RowInventario["idProducto"]][$RowInventario["Deposito_id"]]["Existencias"] = $ArregloInventarios[$RowInventario["idProducto"]][$RowInventario["Deposito_id"]]["Existencias"]+$RowInventario["cantidad"];
                        $ArregloInventarios[$RowInventario["idProducto"]][$RowInventario["Deposito_id"]]["Tipo"] = "Compuesto";
                        $ArregloInventarios[$RowInventario["idProducto"]][$RowInventario["Deposito_id"]]["Nombre"] = $NombreProducto;
                        $ArregloInventarios[$RowInventario["idProducto"]][$RowInventario["Deposito_id"]]["Deposito"] = $Deposito;

                        $ArregloInventarios[$RowInventario["idProducto"]][$RowInventario["Deposito_id"]]["Expedicion"] = $FechaExpedicion;
                        $ArregloInventarios[$RowInventario["idProducto"]][$RowInventario["Deposito_id"]]["Vencimiento"] = $FechaVencimiento;

                        break;
                    case '5':
                        //Lote
                        $ArregloInventarios[$RowInventario["idProducto"]][$RowInventario["SinvDep_id"]]["Existencias"] = $ArregloInventarios[$RowInventario["idProducto"]][$RowInventario["SinvDep_id"]]["Existencias"]+$RowInventario["cantidad"];
                        $ArregloInventarios[$RowInventario["idProducto"]][$RowInventario["SinvDep_id"]]["Tipo"] = "Lotes";
                        $ArregloInventarios[$RowInventario["idProducto"]][$RowInventario["SinvDep_id"]]["Nombre"] = $NombreProducto;
                        $ArregloInventarios[$RowInventario["idProducto"]][$RowInventario["SinvDep_id"]]["Deposito"] = $Deposito;
                        $ArregloInventarios[$RowInventario["idProducto"]][$RowInventario["SinvDep_id"]]["Lote"] = $Lote;

                        $ArregloInventarios[$RowInventario["idProducto"]][$RowInventario["SinvDep_id"]]["Expedicion"] = $FechaExpedicion;
                        $ArregloInventarios[$RowInventario["idProducto"]][$RowInventario["SinvDep_id"]]["Vencimiento"] = $FechaVencimiento;
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
                
                echo "<tr>
                    <td>
                        ".$value1['Nombre']."
                    </td>
                    <td>
                        ".$value1['Tipo']."
                    </td>
                    <td>
                        ".$value1['Deposito']."
                    </td>
                    <td>
                    ".$value1['Lote']."
                    </td>
                    <td>
                    ".$value1['Vencimiento']."
                    </td>
                    <td>
                    ".$value1['Expedicion']."
                    </td>
                    <td>
                        ".$value1['Existencias']."
                    </td>
                </tr>";

                $ExistenciaTotal = $ExistenciaTotal+$value1['Existencias'];
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

        </td>
        <td>
        Total: ".$ExistenciaTotal."
        </td>
    </tr>";


        echo "</table>";


?>