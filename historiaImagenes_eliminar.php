<?php
include 'funciones/funciones.php';
include 'funciones/conn3.php';
// Para mostrar todos los errores
error_reporting(E_ALL);

// Para activar la visualización de errores
ini_set('display_errors', 1);


$id_archivos = $_GET['id'];
$cliente = $_GET['cliente'];

echo "HOLAAA";

echo "id Archivo" . $id_archivos . " cliente" . $cliente;


$QueryArchivos = mysqli_query($conn3, "SELECT * FROM archivos  where id = '$id_archivos' AND cliente_id = '$cliente'");
if($QueryArchivos){
    while ($RowArchivos = mysqli_fetch_array($QueryArchivos)) {

        $codigo = $RowArchivos['codigo'];
    }
    
}

$rm_file = "archivos/$codigo";
if( file_exists( $rm_file ) AND !is_dir($rm_file) )
{
    // echo "archivo encontrado";
    //mostrar archivo
    // echo "<img src='$rm_file' alt='$rm_file' width='100%' height='100%'>";
    //eliminar archivo si no existe el archivo continuar con la ejecucion
    unlink($rm_file);
}

mysqli_query($conn3, "UPDATE archivos set estado = 0 where id = '$id_archivos' AND cliente_id = '$cliente' limit 1");
//
echo "<script language='Javascript'> history.back();location.reload();</script>";

?>