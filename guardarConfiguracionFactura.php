<?php
include "funciones/funciones.php";

try {    
    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($data['idUsuario']) && isset($data['columnasSeleccionadas'])) {
        $idUsuario = $data['idUsuario'];
        $columnas = $data['columnasSeleccionadas'];
        $idSerieFacturacion = $data['idSerieFacturacion'];
        echo $idSerieFacturacion;
        $queryColumnas = "INSERT INTO ConfiguracionFacturacionUsuario (idUsuario, idColumnaSerie,idserie_facturacion) VALUES ";

        $valuesColumnas = [];
        foreach ($columnas as $columna) {
            $valuesColumnas[] = "($idUsuario, '$columna', $idSerieFacturacion)";
        }
        $queryColumnas .= implode(', ', $valuesColumnas);
        if (!empty($valuesColumnas)) {
            if (!mysqli_query($conn3, $queryColumnas)) {
                echo "Error al guardar las columnas seleccionadas: " . mysqli_error($conn3);
                exit;
            } else {
                echo "Configuración de factura guardada exitosamente.";
            }
        } else {
            echo "No se recibieron los datos necesarios correctamente.";
        }
    } else {
        echo "No se recibieron los datos necesarios correctamente2.";
    }
} catch (\Throwable $th) {
    echo "Error: " . $th->getMessage();
}
?>

