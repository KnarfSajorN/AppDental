<?php
include '../funciones/conn3.php';

$banco_id = $_POST['banco_id'];

$queryList=mysqli_query($conn3,"SELECT * from Sbancos WHERE id = '$banco_id'");
while($rowMotorizado=mysqli_fetch_array($queryList))
{
    $idCuentaContableBanco = $rowMotorizado['idCuentaContable'];

	echo $idCuentaContableBanco;
}


?>