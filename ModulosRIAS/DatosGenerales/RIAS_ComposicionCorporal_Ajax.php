<?php

include '../../funciones/conn3.php';

$Edad = $_POST['Edad'];
$cliente_id = $_POST['cliente_id'];
$IMC = $_POST['IMC'];

$Peso = $_POST['Peso'];
$Altura = $_POST['Altura'];

// Redondear el valor según las reglas
if ($Altura - floor($Altura) < 0.2) {
    // Si la parte decimal es menor que 0.2, redondea hacia abajo
    $redondeado = floor($Altura);
} elseif ($Altura - floor($Altura) < 0.7) {
    // Si la parte decimal está entre 0.2 y 0.7, redondea a la mitad
    $redondeado = floor($Altura) + 0.5;
} else {
    // Si la parte decimal es mayor o igual a 0.7, redondea hacia arriba
    $redondeado = ceil($Altura);
}

$Altura = $redondeado;

$QueryCliente = mysqli_query($conn3, "SELECT * FROM `cliente` where cliente_id = '$cliente_id'");
while ($RowCliente = mysqli_fetch_array($QueryCliente)) {

    $genero = $RowCliente['genero'];

}


switch ($genero) {
    case 'M':
        $genero1 = 'Masculino';
        break;
    case 'F':
        $genero1 = 'Femenino';
        break;
}

$QueryTablaIMC = mysqli_query($conn3, "SELECT * FROM `Tabla_Crecimiento_Puntuacion_Z` where Tipo = 'IMC' AND Genero = '$genero1' AND Meses = '$Edad' limit 1");

while ($RowImc = mysqli_fetch_array($QueryTablaIMC)) {

    $ArregloIMC["-3"] = $RowImc['SD3neg'];
    $ArregloIMC["-2"] = $RowImc['SD2neg'];
    $ArregloIMC["-1"] = $RowImc['SD1neg'];
    $ArregloIMC["0"] = $RowImc['SD0'];
    $ArregloIMC["1"] = $RowImc['SD1'];
    $ArregloIMC["2"] = $RowImc['SD2'];
    $ArregloIMC["3"] = $RowImc['SD3'];

}

/*
$numero = $IMC;
// Calcular la diferencia absoluta entre $numero y cada elemento del arreglo
$diferencias = [];
foreach ($ArregloIMC as $clave => $valor) {
    $diferencias[$clave] = abs($valor - $numero);
}

// Ordenar el arreglo de diferencias
asort($diferencias);

// Tomar los dos primeros elementos del arreglo ordenado
$claves_cercanas = array_slice(array_keys($diferencias), 0, 2);

// Mostrar los valores correspondientes a las claves encontradas
foreach ($claves_cercanas as $clave_cercana) {
    echo "Clave: $clave_cercana, Valor: " . $ArregloIMC[$clave_cercana] . "\n";
    $Claves[] = $clave_cercana;
}
*/
//echo "SELECT * FROM `Tabla_Crecimiento_Puntuacion_Z` where Tipo = 'IMC' AND Genero = '$genero1' AND Meses = '$Edad'";

/*
echo "<pre>";
print_r($ArregloIMC);
echo "</pre>";
*/

if($Edad<=59){


// Determinar en qué rango se encuentra el valor
    if ($IMC > $ArregloIMC["3"]) {
        $Estado = 'Obesidad';
    } elseif ($IMC <= $ArregloIMC["3"] && $IMC > $ArregloIMC["2"]) {
        $Estado = 'Sobrepeso';
    } elseif ($IMC <= $ArregloIMC["2"] && $IMC > $ArregloIMC["1"]) {
        $Estado = 'Riesgo de Sobrepeso';
    } elseif ($IMC <= $ArregloIMC["1"]) {
        

        $QueryTablaAltura = mysqli_query($conn3, "SELECT * FROM `Tabla_Crecimiento_Puntuacion_Z` where Tipo = 'Altura x Peso' AND Genero = '$genero1' AND Altura = '$Altura' limit 1");
        while ($RowAltura = mysqli_fetch_array($QueryTablaAltura)) {

            $ArregloAltur["-3"] = $RowAltura['SD3neg'];
            $ArregloAltur["-2"] = $RowAltura['SD2neg'];
            $ArregloAltur["-1"] = $RowAltura['SD1neg'];
            $ArregloAltur["0"] = $RowAltura['SD0'];
            $ArregloAltur["1"] = $RowAltura['SD1'];
            $ArregloAltur["2"] = $RowAltura['SD2'];
            $ArregloAltur["3"] = $RowAltura['SD3'];

        }

/*
echo "<pre>";
print_r($ArregloAltur);
echo "</pre>";
*/

        if ($Peso > $ArregloAltur["3"]) {
            $Estado = 'Obesidad.';
        } elseif ($Peso <= $ArregloAltur["3"] && $Peso > $ArregloAltur["2"]) {
            $Estado = 'Sobrepeso.';
        } elseif ($Peso <= $ArregloAltur["2"] && $Peso > $ArregloAltur["1"]) {
            $Estado = 'Riesgo de Sobrepeso.';
        } elseif ($Peso <= $ArregloAltur["1"] && $Peso>= $ArregloAltur["-1"]) {
            $Estado = 'Peso Adecuado para la Talla.';
        } elseif ($Peso < $ArregloAltur["-1"] && $Peso >= $ArregloAltur["-2"]) {
            $Estado = 'Riesgo de Desnutricion Aguda.';
        } elseif ($Peso < $ArregloAltur["-2"] && $Peso >= $ArregloAltur["-3"]) {
            $Estado = 'Desnutricion Aguda Moderada.';
        } elseif ( $Peso < $ArregloAltur["-3"]) {
            $Estado = 'Desnutricion Aguda Severa.';
        } 

    } 


}

if($Edad>=60 AND $Edad<=204){

    if ($IMC > $ArregloIMC["2"]) {
        $Estado = 'Obesidad';
    } elseif ($IMC <= $ArregloIMC["2"] && $IMC > $ArregloIMC["1"]) {
        $Estado = 'Sobrepeso';
    } elseif ($IMC <= $ArregloIMC["1"] && $IMC >= $ArregloIMC["-1"]) {
        $Estado = 'IMC Adecuado para la Edad';
    } elseif ($IMC < $ArregloIMC["-1"] && $IMC >= $ArregloIMC["-2"]) {
        $Estado = 'Riesgo de Delgadez';
    } elseif ($IMC < $ArregloIMC["-2"]) {
        $Estado = 'Delgadez';
    } 

}

$Arreglo["Respuesta"]=$Estado;

echo json_encode($Arreglo);
//echo "SELECT * FROM `Tabla_Crecimiento_Puntuacion_Z` where Tipo = 'Altura x Peso' AND Genero = '$genero1' AND Altura = '$Altura';";




/*

if ($IMC > $ArregloIMC["3"]) {
    echo "El valor está en el rango correspondiente a ArregloIMC[\"3\"].";
} elseif ($IMC <= $ArregloIMC["3"] && $IMC > $ArregloIMC["2"]) {
    echo "El valor está en el rango correspondiente a ArregloIMC[\"2\"].";
} elseif ($IMC <= $ArregloIMC["2"] && $IMC > $ArregloIMC["1"]) {
    echo "El valor está en el rango correspondiente a ArregloIMC[\"1\"].";
} elseif ($IMC <= $ArregloIMC["1"] && $IMC >= $ArregloIMC["0"]) {
    echo "El valor está en el rango correspondiente a ArregloIMC[\"0\"].";
} elseif ($IMC < $ArregloIMC["0"] && $IMC >= $ArregloIMC["-1"]) {
    echo "El valor está en el rango correspondiente a ArregloIMC[\"-1\"].";
} elseif ($IMC < $ArregloIMC["-1"] && $IMC >= $ArregloIMC["-2"]) {
    echo "El valor está en el rango correspondiente a ArregloIMC[\"-2\"].";
} elseif ($IMC < $ArregloIMC["-2"] && $IMC >= $ArregloIMC["-3"]) {
    echo "El valor está en el rango correspondiente a ArregloIMC[\"-3\"].";
} else {
    echo "El valor no está dentro de los rangos definidos.";
}

*/






/*
// Número al que quieres encontrar el valor más cercano
$numero = 2.5;

// Inicializar la variable para almacenar el valor más cercano y la diferencia mínima
$valorCercano = null;
$diferenciaMinima = INF;

// Recorre el arreglo para encontrar el valor más cercano
foreach ($ArregloIMC as $key => $value) {
    // Calcula la diferencia entre el número y el valor actual del arreglo
    $diferencia = abs($numero - $value);
    
    // Si la diferencia actual es menor que la diferencia mínima registrada hasta ahora,
    // actualiza el valor más cercano y la diferencia mínima
    if ($diferencia < $diferenciaMinima) {
        $valorCercanoSD = $key;
        $diferenciaMinima = $diferencia;
    }
}

echo $valorCercano;

echo "<br>";

echo $ArregloIMC[$valorCercanoSD];
*/


// Número al que quieres encontrar los valores más cercanos

/*
// Inicializar variables para almacenar los dos valores más cercanos y las diferencias mínimas
$valoresCercanos = array(null, null);
$diferenciasMinimas = array(INF, INF);

// Recorre el arreglo para encontrar los dos valores más cercanos
foreach ($ArregloIMC as $key => $value) {
    // Calcula la diferencia entre el número y el valor actual del arreglo
    $diferencia = abs($numero - $value);
    
    // Compara la diferencia con las diferencias mínimas registradas hasta el momento
    // y actualiza los valores y las diferencias mínimas si es necesario
    for ($i = 0; $i < 2; $i++) {
        if ($diferencia < $diferenciasMinimas[$i]) {
            // Desplazar los valores existentes hacia abajo
            for ($j = 1; $j > $i; $j--) {
                $valoresCercanos[$j] = $valoresCercanos[$j - 1];
                $diferenciasMinimas[$j] = $diferenciasMinimas[$j - 1];
            }
            // Actualizar los nuevos valores más cercanos y diferencias mínimas
            $valoresCercanos[$i] = $value;
            $diferenciasMinimas[$i] = $diferencia;
            break;
        }
    }
}

// Imprime los dos valores más cercanos encontrados
echo "Los dos valores más cercanos a $numero son: $valoresCercanos[0] y $valoresCercanos[1]";
*/
?>