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

    header('Content-Type: application/vnd.ms-excel; charset=UTF-8');
    header('Content-Disposition: attachment; filename=ReporteMinimosMaximosFechaVentayCompra.xls');

        echo "<table border='1' cellpadding='2' cellspacing='0' width='100%'>";
        echo "<tr>";
        echo "<td>Producto</td>
        <td>Deposito</td>
        
        <td>Mínimo</td>
        <td>Máximo</td>
        <td>Fecha Ultima Venta</td>
        <td>Fecha Ultima Compra</td>
        <td>Existencia</td>";
        echo "</tr>";
        
        $QueryInventario="";
        if($Producto!="Todos"){
            $QueryInventario.="AND ID = '$Producto' ";
        }
        $QueryDetalles="";
        if($Deposito!="Todos"){
            $QueryDetalles.="AND idDep = '$Deposito' ";
        }

        /*
        echo "<tr>";
        echo "<td> SELECT * FROM SinvDep WHERE (fechaVencimiento BETWEEN '{$desde}' AND '{$hasta}') $Query ORDER BY fechaVencimiento DESC </td>";
        echo "</tr>";
        */

        function verificarRango($valor, $minimo, $maximo) {
            $distancia_al_minimo = abs($valor - $minimo);
            $distancia_al_maximo = abs($valor - $maximo);
            
            if ($distancia_al_minimo < $distancia_al_maximo) {
                return "#adff2f"; // Verde
            } elseif ($distancia_al_minimo > $distancia_al_maximo) {
                return "#ff8080"; // Rojo
            } else {
                return ""; // Sin color (en caso de empate)
            }
          }

        $QueryInven = mysqli_query($conn3, "SELECT * FROM sinvetrios WHERE  estado = 1 $QueryInventario ORDER BY id DESC");
        while ($RowInven= mysqli_fetch_array($QueryInven)) {

            $idProducto = $RowInven['ID'];

            $ClasificacionProducto = funcionMaster($RowInven['tipo'],'id','tipo','scategoria');

            if($ClasificacionProducto=="5" OR $ClasificacionProducto=="1"){

                $QueryInventarioDetalles = mysqli_query($conn3, "SELECT * FROM SinvDep WHERE idSinvetrios='$idProducto' $QueryDetalles ORDER BY id DESC");
                while ($RowDetalles= mysqli_fetch_array($QueryInventarioDetalles)) {

                    $SinvDep_id = $RowDetalles["id"];
                    $Productoid = $RowDetalles["idSinvetrios"];
                    $NombreProducto = funcionMaster($Productoid,'ID','descripcion','sinvetrios');
                    $Deposito = funcionMaster($RowDetalles["idDep"],'id','descripcion','dep');

                    $Color = verificarRango($RowDetalles["existencia"], $RowInven["minimo"], $RowInven["maximo"]);


                    $FechaVenta="";
                    /*
                    $QueryVentasDetalles = mysqli_query($conn3, "SELECT * FROM `sDetalleOper` WHERE estado = 1 AND SinvDep_id='$SinvDep_id' AND idOperacion='$idOperacion' ORDER BY `fechaRegistro` DESC, `id`");
                    while ($RowVentasDetalles= mysqli_fetch_array($QueryVentasDetalles)) {
                        $FechaVenta= $RowVentasDetalles["fechaRegistro"];
                    }
                    */
                    $QueryVentasDetalles = mysqli_query($conn3, "SELECT sDetalleOper.* 
                        FROM sDetalleOper
                        INNER JOIN sOperacionInv ON sDetalleOper.idOperacion = sOperacionInv.idOperacion
                        WHERE sDetalleOper.estado = 1
                        AND sDetalleOper.SinvDep_id='$SinvDep_id'
                        AND sOperacionInv.tipo = 1
                        ORDER BY sDetalleOper.fechaRegistro DESC, sDetalleOper.id DESC
                        LIMIT 1");

                    while ($RowVentasDetalles = mysqli_fetch_array($QueryVentasDetalles)) {
                        $FechaVenta = $RowVentasDetalles["fechaRegistro"];
                    }

                    $FechaCompra="";
                    $QueryVentasDetalles = mysqli_query($conn3, "SELECT sDetalleOper.* 
                        FROM sDetalleOper
                        INNER JOIN sOperacionInv ON sDetalleOper.idOperacion = sOperacionInv.idOperacion
                        WHERE sDetalleOper.estado = 1
                        AND sDetalleOper.SinvDep_id='$SinvDep_id'
                        AND sOperacionInv.tipo = 3
                        ORDER BY sDetalleOper.fechaRegistro DESC, sDetalleOper.id DESC
                        LIMIT 1");

                    while ($RowVentasDetalles = mysqli_fetch_array($QueryVentasDetalles)) {
                        $FechaCompra = $RowVentasDetalles["fechaRegistro"];
                    }


                    /*
                    $FechaVenta="";
                    $QueryVentas = mysqli_query($conn3, "SELECT * FROM `sOperacionInv` WHERE tipo = 1 ORDER BY `fechaOperacion` DESC, `idOperacion` DESC");
                    while ($RowVentas= mysqli_fetch_array($QueryVentas)) {

                        $idOperacion = $RowVentas["idOperacion"];

                        $QueryVentasDetalles = mysqli_query($conn3, "SELECT * FROM `sDetalleOper` WHERE estado = 1 AND SinvDep_id='$SinvDep_id' AND idOperacion='$idOperacion' ORDER BY `fechaRegistro` DESC, `id` DESC LIMIT 1");
                        while ($RowVentasDetalles= mysqli_fetch_array($QueryVentasDetalles)) {
                            $FechaVenta= $RowVentasDetalles["fechaRegistro"];
                        }

                    }

                    $FechaCompra="";
                    $QueryCompras = mysqli_query($conn3, "SELECT * FROM `sOperacionInv` WHERE tipo = 3 ORDER BY `fechaOperacion` DESC, `idOperacion` DESC");
                    while ($RowCompras= mysqli_fetch_array($QueryCompras)) {

                        $idOperacion = $RowCompras["idOperacion"];

                        $QueryComprasDetalles = mysqli_query($conn3, "SELECT * FROM `sDetalleOper` WHERE estado = 1 AND SinvDep_id='$SinvDep_id' AND idOperacion='$idOperacion' ORDER BY `fechaRegistro` DESC, `id` DESC LIMIT 1");
                        while ($RowComprasDetalles= mysqli_fetch_array($QueryComprasDetalles)) {
                            $FechaCompra= $RowComprasDetalles["fechaRegistro"];
                        }

                    }
                    */

                        echo "<tr>
                            <td bgcolor='{$Color}'>
                                ".$NombreProducto."
                            </td>
                            <td bgcolor='{$Color}'>
                                ".$Deposito."
                            </td>
                            
                            <td bgcolor='{$Color}'>
                                ".$RowInven["minimo"]."
                            </td>
                            <td bgcolor='{$Color}'>
                                ".$RowInven["maximo"]."
                            </td>
                            <td bgcolor='{$Color}'>
                                ".$FechaVenta."
                            </td>
                            <td bgcolor='{$Color}'>
                                ".$FechaCompra."
                            </td>
                            <td bgcolor='{$Color}'>
                            ".$RowDetalles["existencia"]."
                            </td>
                        </tr>";

                        $ExistenciaTotal = $ExistenciaTotal+$RowDetalles["existencia"];
                    
                }
                

            }

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