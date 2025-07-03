<?php
include 'funciones/funciones.php';
include 'funciones/conn3.php';

$id_archivos = decrypt($_GET['iI']);
$proveedor_id = decrypt($_GET['cI']);


$QueryArchivos = mysqli_query($conn3, "SELECT * FROM archivos_proveedor  where id = '$id_archivos' AND proveedor_id = '$proveedor_id'");
while ($RowArchivos = mysqli_fetch_array($QueryArchivos)) {

    $codigo = $RowArchivos['codigo'];
}

$rm_file = "archivos_proveedor/$codigo";
if( file_exists( $rm_file ) AND !is_dir($rm_file) )
{
    // echo "archivo encontrado";
    //mostrar archivo
    // echo "<img src='$rm_file' alt='$rm_file' width='100%' height='100%'>";
    //eliminar archivo si no existe el archivo continuar con la ejecucion
    unlink($rm_file);
}

mysqli_query($conn3, "UPDATE archivos_proveedor set estado = 0 where id = '$id_archivos' AND proveedor_id = '$proveedor_id' limit 1");
//
echo "<script language='Javascript'> history.back();location.reload();</script>";

?>