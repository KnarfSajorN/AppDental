<?php 
session_start();
include 'funciones/funciones.php';
include 'funciones/conn3.php';

// recibimos la consulta
$query = decrypt($_POST['query']);

// query
$queryconfig = $query;
$resultConfig = mysqli_query($conn3, $queryconfig);
$rowConfig = [];
if ($resultConfig){
    while ($row = mysqli_fetch_assoc($resultConfig)) {
        $rowConfig[] = $row;
    }
}
$return = "<table>
    <thead>
        ";
        foreach ($rowConfig[0] as $key => $value) {
            $return .= "<th>$key</th>";
        }
    $return .= "</thead>
    <tbody>
        ";
        foreach ($rowConfig as $key => $value) {
            $return .= "<tr>";
            foreach ($value as $key2 => $value2) {
                $return .= "<td>$value2</td>";
            }
            $return .= "</tr>";
        }
        $return .="
    </tbody>
</table>";

$return = base64_encode($return);

echo $return;
?>
