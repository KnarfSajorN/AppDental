<?php
/*
include 'funciones/conn3.php';

$queryList = mysqli_query($conn3, "SELECT * FROM  LB_Examen  order by id ASC");
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

  $Valores_Referencia_Filtrado = $rowMotorizado["Valores_Referencia_Filtrado"];
  echo "<br>".$Valores_Referencia_Filtrado."<br>";
  // Verificar si $Valores_Referencia_Filtrado es un JSON válido
  $parsedData = json_decode($Valores_Referencia_Filtrado, true);

  if (is_array($parsedData)) {
    foreach ($parsedData as &$element) {
      // Verificar y ajustar los campos necesarios
      if (!isset($element['Tipo_Edad'])) {
        $element['Tipo_Edad'] = 'No Aplica';
      }
      if (!isset($element['Edad_Minima'])) {
        $element['Edad_Minima'] = 0;
      }
      if (!isset($element['Edad_Maxima'])) {
        $element['Edad_Maxima'] = 0;
      }
      if (!isset($element['Sexo'])) {
        $element['Sexo'] = 'No Aplica';
      }
    }
    unset($element); // Liberar la referencia al último elemento
  }
  
  // Convertir los datos modificados nuevamente a JSON
  $updatedData = json_encode($parsedData,true);

  echo json_encode($updatedData,true);
  echo "<br>";
  echo $rowMotorizado['Nombre'];
  echo "<hr>";

  $id_examen = $rowMotorizado['id'];
  //$updateResult =mysqli_query($conn3, "UPDATE LB_Examen SET Valores_Referencia_Filtrado='$updatedData' WHERE id = '{$id_examen}' limit 1;");

  //$updateResult = mysqli_query($conn3, $updateQuery);

  if ($updateResult) {
    $rowsAffected = mysqli_affected_rows($conn3);
    if ($rowsAffected > 0) {
      echo "<br><br>Actualización exitosa para el examen con ID {$id_examen}. Filas afectadas: {$rowsAffected}<br>";
    } else {
      echo "<br><br>La actualización no afectó ninguna fila para el examen con ID {$id_examen}<br>";
    }
  } else {
    echo "<br><br>Error al realizar la actualización para el examen con ID {$id_examen}: " . mysqli_error($conn3) . "<br>";
  }

}

*/

include 'funciones/conn3.php';
/*
$queryList = mysqli_query($conn3, "SELECT * FROM  LB_Examen  order by id ASC limit 1");
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

  $Valores_Referencia_Filtrado = $rowMotorizado["Caracteristicas"];
  echo "<br>".$Valores_Referencia_Filtrado."<br>";
  // Verificar si $Valores_Referencia_Filtrado es un JSON válido
  $parsedData = json_decode($Valores_Referencia_Filtrado, true);

  if (is_array($parsedData)) {

    // Ahora, actualiza el campo 'Filtro_Personalizado' en el JSON
    $parsedData["Filtro_Personalizado"] = "";

  }
  
  // Convertir los datos modificados nuevamente a JSON
  $updatedData = json_encode($parsedData,true);

  echo json_encode($updatedData,true);
  echo "<br>";
  echo $rowMotorizado['Nombre'];
  echo "<hr>";

  $id_examen = $rowMotorizado['id'];
  //$updateResult =mysqli_query($conn3, "UPDATE LB_Examen SET Valores_Referencia_Filtrado='$updatedData' WHERE id = '{$id_examen}' limit 1;");

  //$updateResult = mysqli_query($conn3, $updateQuery);

  
  if ($updateResult) {
    $rowsAffected = mysqli_affected_rows($conn3);
    if ($rowsAffected > 0) {
      echo "<br><br>Actualización exitosa para el examen con ID {$id_examen}. Filas afectadas: {$rowsAffected}<br>";
    } else {
      echo "<br><br>La actualización no afectó ninguna fila para el examen con ID {$id_examen}<br>";
    }
  } else {
    echo "<br><br>Error al realizar la actualización para el examen con ID {$id_examen}: " . mysqli_error($conn3) . "<br>";
  }
  
}*/

/*
function limpiarFiltros($json) {
  $data = json_decode($json, JSON_UNESCAPED_UNICODE);

  if ($data === null) {
      // Manejar el error de decodificación JSON aquí si es necesario
      return null;
  }

  foreach ($data as &$item) {
      $item['Filtro_Personalizado'] = "[]";
  }

  return json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
}

$queryList = mysqli_query($conn3, "SELECT * FROM LB_Examen ORDER BY id ASC");

while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $Caracteristicas = $rowMotorizado["Caracteristicas"];
   
    echo $Caracteristicas."<hr>";
    


// Tu JSON original
//$originalJson = '[{"id":1,"Nombre_Caracteristica":"Nivel de 17 - Hidroxiprogesterona","Campo_Resultado":"Numerico","Valores_Campo_Resultado":"","Unidades_Referencia":"","Filtro_Personalizado":"[{"id_Filtro":0,"Nombre":"","Tipo_Filtro":"Numerico","Valor_Referencia_Minima":"0.5","Valor_Referencia_Maxima":"2.5","Color_Correcto":"#27ff3375"}]","Valores_Referencia_Caracteristica":"Valor de Referencia para niños: 0.21 a 1.4 ng/ml"},{"id":2,"Nombre_Caracteristica":"Nivel de 17 - Hidroxiprogesterona","Campo_Resultado":"Numerico","Valores_Campo_Resultado":"","Unidades_Referencia":"","Filtro_Personalizado":"[{"id_Filtro":0,"Nombre":"","Tipo_Filtro":"Numerico","Valor_Referencia_Minima":"0.5","Valor_Referencia_Maxima":"4.2","Color_Correcto":"#27ff3375"}]","Valores_Referencia_Caracteristica":"VALORES DE REFERENCIA Fase Folicular: 0.03 a 1.0ng/ml Pico Ovulación: 1.1 a 3.7ng/ml fase Luteal : 0.4 a 4.2ng/ml Niñas : 0.21 a 1.4 ng/ml"}]';

// Llamar a la función para limpiar los filtros
$jsonConFiltrosLimpio = limpiarFiltros($Caracteristicas);

echo $jsonConFiltrosLimpio."<hr>";

$id_examen = $rowMotorizado['id'];
  $updateResult =mysqli_query($conn3, "UPDATE LB_Examen SET Caracteristicas='$jsonConFiltrosLimpio' WHERE id = '{$id_examen}' limit 1;");

  //$updateResult = mysqli_query($conn3, $updateQuery);

  
  if ($updateResult) {
    $rowsAffected = mysqli_affected_rows($conn3);
    if ($rowsAffected > 0) {
      echo "<br><br>Actualización exitosa para el examen con ID {$id_examen}. Filas afectadas: {$rowsAffected}<br>";
    } else {
      echo "<br><br>La actualización no afectó ninguna fila para el examen con ID {$id_examen}<br>";
    }
  } else {
    echo "<br><br>Error al realizar la actualización para el examen con ID {$id_examen}: " . mysqli_error($conn3) . "<br>";
  }


}

*/
?>