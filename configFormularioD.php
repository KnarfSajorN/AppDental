<?php
session_start();
include'funciones/funciones.php';

$Nombre_table=$_GET['Nombre_table'];
$Tabla=$_GET['Tabla'];
$accion=$_GET['accion'];

// 1 desactivar 2 activar

if ($accion==1) {
    echo"UPDATE configTablas set activo=0 where id='$Tabla'";
    mysqli_query($conn3,"UPDATE configTablas set activo=0 where id='$Tabla'");    
}else if ($accion==2) {
    echo"UPDATE configTablas set activo=1 where id='$Tabla'";
    mysqli_query($conn3,"UPDATE configTablas set activo=1 where id='$Tabla'");    
}

echo "<script language='Javascript'> window.location='portada';alert('Procesado!');</script>"; 

?>
