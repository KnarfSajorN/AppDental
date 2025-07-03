<?php
date_default_timezone_set('America/Bogota');
include("funciones/conn3.php");
include("funciones/funciones.php");

$id = $_POST['id'];
$color = $_POST['color'];

// Actualizar el color en la tabla correspondiente
$sql = "UPDATE main_menu SET color = '$color' WHERE id = '$id'";
mysqli_query($conn3, $sql);

if ($conn3->query($sql) === TRUE) {
    echo "El color ha sido actualizado correctamente.";
} else {
    echo "Error al actualizar el color: " . $conn3->error;
}

// Cerrar la conexión a la base de datos
$conn3->close();
?>
