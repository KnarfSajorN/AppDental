<?php
date_default_timezone_set('America/Bogota');
include("funciones/conn3.php");
include("funciones/funcionesUtilidades.php");

function funcionMaster($filtro, $campoFiltrar, $campoImprimir, $tabla)
{
    include 'funciones/conn3.php';
    $query = mysqli_query($conn3, "SELECT * FROM $tabla where $campoFiltrar = '$filtro'");
    while ($row = mysqli_fetch_array($query)) {

        $text = $row[$campoImprimir];
    }
    return  $text;
}


if ($_POST["Tipo"] == "Add") {

    $Arreglo["Nombre_Caracteristica"] = QuitarComillasyOtrosCaracteres($_POST['rowdata']['Nombre_Caracteristica']);
    $Arreglo["Campo_Resultado"] = QuitarComillasyOtrosCaracteres($_POST['rowdata']['Campo_Resultado']);
    $Arreglo["Valores_Campo_Resultado"] = QuitarComillasyOtrosCaracteres($_POST['rowdata']['Valores_Campo_Resultado']);
    $Arreglo["Unidades_Referencia"] = QuitarComillasyOtrosCaracteres($_POST['rowdata']['Unidades_Referencia']);

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $ArregloTabla1 = json_decode($_POST['rowdata']['Filtro_Personalizado'], true);
    $Arreglonuevo = [];
    foreach ($ArregloTabla1 as $key => $value) {
        if ($value != null) {
            $Arreglonuevo[] = $value;
        }
    }
    foreach ($Arreglonuevo as $key => $value) {
        foreach ($value as $key1 => $value1) {
            if ($key1 == "id_Filtro") {
                $Arreglonuevo[$key][$key1] = $key;
            }
        }
    }
    $Arreglo["Filtro_Personalizado"] = QuitarComillasyOtrosCaracteres(json_encode($Arreglonuevo, JSON_UNESCAPED_UNICODE));
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    $Arreglo["Valores_Referencia_Caracteristica"] = QuitarComillasyOtrosCaracteres($_POST['rowdata']['Valores_Referencia_Caracteristica']);

    $Examen = $_POST['Examen'];

    $queryList = mysqli_query($conn3, "SELECT * FROM LB_Examen where id='$Examen' AND Activo = '1' ");
    while ($row_recordset32A = mysqli_fetch_array($queryList)) {
        $Caracteristicas = $row_recordset32A['Caracteristicas'];
    }

    foreach ($Arreglo as $key => $value) {
        $Datos .= '"' . $key . '":"' . $value . '",';
    }
    $Datos = trim($Datos, ',');

    $listado = json_decode($Caracteristicas, true);
    foreach ($listado as $key => $value) {
        foreach ($value as $key1 => $value1) {
            if ($key1 == "id") {
                $ultimoid = $value1;
            }
        }
    }
    $ultimoid = $ultimoid + 1;

    $NuevaCaracteristica = '{"id":' . $ultimoid . ',' . $Datos . '}';
    $nuevoarreglo = json_decode($NuevaCaracteristica, true);

    if ($nuevoarreglo != null) {
        $listado[] = $nuevoarreglo;
        $listafinal = json_encode($listado, JSON_UNESCAPED_UNICODE);
        echo $NuevaCaracteristica;

        $queryList = mysqli_query($conn3, "UPDATE LB_Examen SET Caracteristicas = '" . $listafinal . "' WHERE id = {$Examen};");
    }
} 

else if ($_POST["Tipo"] == "Edit") {
    $id = $_POST['rowdata']['id'];

    $Arreglo["Nombre_Caracteristica"] = QuitarComillasyOtrosCaracteres($_POST['rowdata']['Nombre_Caracteristica']);
    $Arreglo["Campo_Resultado"] = QuitarComillasyOtrosCaracteres($_POST['rowdata']['Campo_Resultado']);
    $Arreglo["Valores_Campo_Resultado"] = QuitarComillasyOtrosCaracteres($_POST['rowdata']['Valores_Campo_Resultado']);
    $Arreglo["Unidades_Referencia"] = QuitarComillasyOtrosCaracteres($_POST['rowdata']['Unidades_Referencia']);

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $ArregloTabla1 = json_decode(PonerComillasyOtrosCaracteres($_POST['rowdata']['Filtro_Personalizado']), true);
    $Arreglonuevo = [];
    foreach ($ArregloTabla1 as $key => $value) {
        if ($value != null) {
            $Arreglonuevo[] = $value;
        }
    }
    foreach ($Arreglonuevo as $key => $value) {
        foreach ($value as $key1 => $value1) {
            if ($key1 == "id_Filtro") {
                $Arreglonuevo[$key][$key1] = $key;
            }
        }
    }
    $Arreglo["Filtro_Personalizado"] = QuitarComillasyOtrosCaracteres(json_encode($Arreglonuevo, JSON_UNESCAPED_UNICODE));
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    $Arreglo["Valores_Referencia_Caracteristica"] = QuitarComillasyOtrosCaracteres($_POST['rowdata']['Valores_Referencia_Caracteristica']);

    $Examen = $_POST['Examen'];

    $queryList = mysqli_query($conn3, "SELECT * FROM LB_Examen where id='$Examen' AND Activo = '1' ");
    $nrowl = mysqli_num_rows($queryList);
    while ($row_recordset32A = mysqli_fetch_array($queryList)) {
        $Caracteristicas = $row_recordset32A['Caracteristicas'];
    }

    foreach ($Arreglo as $key => $value) {
        $Datos .= '"' . $key . '":"' . $value . '",';
    }
    $Datos = trim($Datos, ',');

    $listado = json_decode($Caracteristicas, true);
    foreach ($listado as $key => $value) {
        foreach ($value as $key1 => $value1) {
            if ($key1 == "id" and $value1 == $id) {
                $editarid = $key;
            }
        }
    }

    //$NuevaCaracteristica = '{"id":' . $id . ',"Nombre_Caracteristica":"' . $Nombre_Caracteristica . '","Unidades_Referencia":"' . $Unidades_Referencia . '","Valores_Referencia_Caracteristica":"' . $Valores_Referencia_Caracteristica . '"}';
    $NuevaCaracteristica = '{"id":' . $id . ',' . $Datos . '}';

    $nuevoarreglo = json_decode($NuevaCaracteristica, true);
    if ($nuevoarreglo != null) {
        $listado[$editarid] = $nuevoarreglo;

        $listafinal = json_encode($listado, JSON_UNESCAPED_UNICODE);
        echo $NuevaCaracteristica;
        $queryList = mysqli_query($conn3, "UPDATE LB_Examen SET Caracteristicas = '" . $listafinal . "' WHERE id = {$Examen};");
    }

} 

else if ($_POST["Tipo"] == "Delete") {
    $id = $_POST['rowdata']['id'];

    $Examen = $_POST['Examen'];

    $queryList = mysqli_query($conn3, "SELECT * FROM LB_Examen where id='$Examen' AND Activo = '1' ");
    $nrowl = mysqli_num_rows($queryList);
    while ($row_recordset32A = mysqli_fetch_array($queryList)) {
        $Caracteristicas = $row_recordset32A['Caracteristicas'];
    }

    $listado = json_decode($Caracteristicas, true);

    foreach ($listado as $key => $value) {
        if ($value["id"] != $id) {
            $NuevoListado .= "{";
            foreach ($value as $key1 => $value1) {
                if ($key1 == "id") {
                    $NuevoListado .= '"' . $key1 . '":' . $value1 . ',';
                } else {
                    $NuevoListado .= '"' . $key1 . '":"' . $value1 . '",';
                }
            }
            $NuevoListado = trim($NuevoListado, ',');
            $NuevoListado .= "},";
            //$NuevoListado .= '{"id":' . $value["id"] . ',"Nombre_Caracteristica":"' . $value["Nombre_Caracteristica"] . '","Unidades_Referencia":"' . $value["Unidades_Referencia"] . '","Valores_Referencia_Caracteristica":"' . $value["Valores_Referencia_Caracteristica"] . '"},';
        }
    }
    $NuevoListado = trim($NuevoListado, ',');
    $NuevoListado = "[" . $NuevoListado . "]";

    //echo $NuevoListado;

    if ($NuevoListado != null) {
        $queryList = mysqli_query($conn3, "UPDATE LB_Examen SET Caracteristicas = '" . $NuevoListado . "' WHERE id = {$Examen};");
    }
}



else if ($_GET["idExamen"] != "") {

    $idExamen = $_GET["idExamen"];
    $queryList = mysqli_query($conn3, "SELECT * FROM LB_Examen where id='{$idExamen}' AND Activo = '1' ");
    $nrowl = mysqli_num_rows($queryList);
    while ($row_recordset32A = mysqli_fetch_array($queryList)) {
        $Caracteristicas = $row_recordset32A['Caracteristicas'];

        echo $Caracteristicas;
    }
} 

else if ($_GET["BorrarTodo"] != "") {

    $BorrarTodo = $_GET["BorrarTodo"];
    $queryList = mysqli_query($conn3, "UPDATE LB_Examen SET Caracteristicas = '[]' WHERE id = {$BorrarTodo};");

    echo "<script>window.history.back()</script>";
} 

else if ($_GET["FiltroValores"] != "") {

    $FiltroValores = $_GET["FiltroValores"];
    $queryList = mysqli_query($conn3, "SELECT * FROM LB_Examen where id='{$FiltroValores}' AND Activo = '1' ");
    $nrowl = mysqli_num_rows($queryList);
    while ($row_recordset32A = mysqli_fetch_array($queryList)) {
        $Valores_Referencia_Filtrado = $row_recordset32A['Valores_Referencia_Filtrado'];
    }

    if ($Valores_Referencia_Filtrado != "") {
        echo $Valores_Referencia_Filtrado;
    } else {
        echo "[]";
    }
} 
?>
