<?php
    include 'funciones/conn3.php';
    $tipo = $_POST['tipo'];

    if ($tipo=='Consultar') {
        "<option value=''>Seleccione</option>";
        $query = mysqli_query($conn3, "SELECT * FROM HN_finalidadesConsulta");
        foreach ($query as $tabla) {
            $valor = $tabla['codigo'] . ' - ' . $tabla['descripcion']; 
            echo "<option value='".$valor."'>".$valor."</option>";
        }
    }

    if ($tipo=='Guardar') {
        $nFinalidadConsulta = $_POST['nFinalidadConsulta'];
        $nCodigoConsulta = $_POST['nCodigoConsulta'];
        $query = mysqli_query($conn3, "INSERT INTO HN_finalidadesConsulta(codigo, descripcion) VALUES('$nCodigoConsulta', '$nFinalidadConsulta')");
    }


?>