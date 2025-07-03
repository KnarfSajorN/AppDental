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
    header('Content-Disposition: attachment; filename=ReporteMedicamentosVencer_'.$desde.'_'.$hasta.'.xls');

        echo "<table border='1' cellpadding='2' cellspacing='0' width='100%'>";
        echo "<tr>";
        echo "<td>Producto</td>
        <td>Deposito</td>
        <td>Lote</td>
        <td>Fecha Vencimiento</td>
        <td>Existencia</td>";
        echo "</tr>";
        
        $Query="";
        if($Producto!="Todos"){
            $Query.="AND idSinvetrios = '$Producto' ";
        }
        if($Deposito!="Todos"){
            $Query.="AND idDep = '$Deposito' ";
        }

        /*
        echo "<tr>";
        echo "<td> SELECT * FROM SinvDep WHERE (fechaVencimiento BETWEEN '{$desde}' AND '{$hasta}') $Query ORDER BY fechaVencimiento DESC </td>";
        echo "</tr>";
        */
        $QueryInventario = mysqli_query($conn3, "SELECT * FROM SinvDep WHERE  (fechaVencimiento BETWEEN '{$desde}' AND '{$hasta}') $Query ORDER BY fechaVencimiento DESC");
        while ($RowInventario= mysqli_fetch_array($QueryInventario)) {

            $Productoid = $RowInventario["idSinvetrios"];
            $TipoProducto = funcionMaster($Productoid,'ID','tipo','sinvetrios');
            $ClasificacionProducto = funcionMaster($TipoProducto,'id','tipo','scategoria');
            
            $NombreProducto = funcionMaster($Productoid,'ID','descripcion','sinvetrios');
            $Deposito = funcionMaster($RowInventario["idDep"],'id','descripcion','dep');
            if($ClasificacionProducto=="5"){

                echo "<tr>
                    <td>
                        ".$NombreProducto."
                    </td>
                    <td>
                        ".$Deposito."
                    </td>
                    <td>
                        ".$RowInventario["lote"]."
                    </td>
                    <td>
                        ".$RowInventario["fechaVencimiento"]."
                    </td>
                    <td>
                    ".$RowInventario["existencia"]."
                    </td>
                </tr>";

                $ExistenciaTotal = $ExistenciaTotal+$RowInventario["existencia"];
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
        Total: ".$ExistenciaTotal."
        </td>
    </tr>";

        echo "</table>";


?>