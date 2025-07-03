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

$Departamentos = $_POST['Departamentos'];
$Deposito = $_POST['Deposito'];

    header('Content-Type: application/vnd.ms-excel; charset=UTF-8');
    header('Content-Disposition: attachment; filename=ReporteExistenciasDepartamentos.xls');

        echo "<table border='1' cellpadding='2' cellspacing='0' width='100%'>";
        echo "<tr>";
        echo "<td>Producto</td>
        <td>Deposito</td>
        <td>Departamento</td>
        <td>Existencia</td>";
        echo "</tr>";
        
        $QueryInventario="";
        if($Departamentos!="Todos"){
            $QueryInventario.="AND tipo = '$Departamentos' ";
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


        $QueryInven = mysqli_query($conn3, "SELECT * FROM sinvetrios WHERE  estado = 1 $QueryInventario ORDER BY id DESC");
        while ($RowInven= mysqli_fetch_array($QueryInven)) {

            $idProducto = $RowInven['ID'];

            $ClasificacionProducto = funcionMaster($RowInven['tipo'],'id','tipo','scategoria');
            $ClasificacionProductoDescripcion = funcionMaster($RowInven['tipo'],'id','descripcion','scategoria');

            if($ClasificacionProducto=="5" OR $ClasificacionProducto=="1"){

                $QueryInventarioDetalles = mysqli_query($conn3, "SELECT * FROM SinvDep WHERE idSinvetrios='$idProducto' $QueryDetalles ORDER BY id DESC");
                while ($RowDetalles= mysqli_fetch_array($QueryInventarioDetalles)) {

                    $SinvDep_id = $RowDetalles["id"];
                    $Productoid = $RowDetalles["idSinvetrios"];
                    $NombreProducto = funcionMaster($Productoid,'ID','descripcion','sinvetrios');
                    $Deposito = funcionMaster($RowDetalles["idDep"],'id','descripcion','dep');



                        echo "<tr>
                            <td style='background-color:$Color;'>
                                ".$NombreProducto."
                            </td>
                            <td style='background-color:$Color;'>
                                ".$Deposito."
                            </td>
                            <td style='background-color:$Color;'>
                                ".$ClasificacionProductoDescripcion."
                            </td>
                            <td style='background-color:$Color;'>
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
        Total: ".$ExistenciaTotal."
        </td>
    </tr>";
    
        echo "</table>";


?>