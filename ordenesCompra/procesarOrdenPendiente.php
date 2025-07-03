<?php 
session_start();
include "../funciones/funciones.php";
include "../funciones/conn3.php";
$usuario_id = $_SESSION['ID'];
$date = date('y-m-d H:i:s');

// archivo para asociar el detalle de una orden de compra pendiente con su numero de orden respectiva

$idOrden = base64_decode($_GET['FAID']);
$sK = 0 + intval($_GET['sK']);
if ($idOrden != "" && $sK == 0) {
    $queryOrdenesPendientes = "UPDATE ordenesCompraPendiente 
    set estado = 1
    , nOrden = $idOrden
    where 1=1 and estado = 0 and usuario_id = '{$usuario_id}' and nOrden = 0 ";
    $result = mysqli_query($conn3, $queryOrdenesPendientes);
}

    // chismoso auditor
    $query = "SELECT * from ordenesCompraHeader where id = $idOrden limit 1";
    $result = mysqli_query($conn3, $query);
    $row = mysqli_fetch_array($result);

    $insert = "INSERT INTO ordenesCompraHeaderAuditor
    set 
    idOrden = '{$idOrden}', 
    fechaRegistro = '{$date}', 
    total = '{$row['total']}', 
    cantidadRegistros = '{$row['cantidadRegistros']}', 
    notas = '{$row['notas']}', 
    usuario_id = '{$usuario_id}', 
    fecha = '{$row['fecha']}', 
    estado = '{$row['estado']}'
    ";
    $result = mysqli_query($conn3, $insert);
    var_dump($result);

    header("Location: ../ordenesCompraControl");

?>