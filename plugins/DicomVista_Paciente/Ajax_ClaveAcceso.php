<?php  

include '../../funciones/conn3.php';


$clienteID = $_GET['clienteID'];


$sql = "SELECT * from clientes where cliente_id = '$clienteID'";
while($RowClientes = mysqli_fetch_array($result)){
    $Documento = $RowClientes["CODI_CLIENTE"];
}





?>