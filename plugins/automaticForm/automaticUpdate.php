<?php
include '../../funciones/conn3.php';



$camposQueNoSePuedenRepetir = ['porcentaje'];


$countEspecial = 0;
if (empty($countEspecial)) {
    $queryshow = mysqli_query($conn3, "SHOW COLUMNS FROM {$_POST['tabla']} WHERE `Key` LIKE '%PRI%'");
    if ($queryshow) {
        $fetchshow = mysqli_fetch_array($queryshow);
    }
    $validar = mysqli_query($conn3, "UPDATE {$_POST['tabla']} SET {$_POST['campo']} = '{$_POST['valor']}' WHERE {$fetchshow['Field']} = '{$_POST['idUpdate']}'");
}


if ($validar !== false) {
    $affectedRows = mysqli_affected_rows($conn3);
    if ($affectedRows > 0) {
        echo "true";
    } else {
        echo "false";
    }
} else {
    echo "false";
}
