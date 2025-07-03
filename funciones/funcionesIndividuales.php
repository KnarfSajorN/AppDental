<?php
function clearInput($value)
{
    include './funciones/conn3.php';
    $replace = array(
        '@<script[^>]*?>.*?</script>@si',   // Elimina javascript
        /*'@<[\/\!]*?[^<>]*?>@si',          // Elimina las etiquetas HTML
        '@<style[^>]*?>.*?</style>@siU',    // Elimina las etiquetas de estilo*/
        '@<![\s\S]*?--[ \t\n\r]*>@',        // Elimina los comentarios multi-línea
        '@SELECT.*?FROM@si',
        '@FROM.*?WHERE@si',
        '@UPDATE.*?SET@si',
        '@INSERT INTO.*?SET@si'
    );
    if (is_array($value)) { // si es un array
        return array_map('clearInput', $value); // retornamos la auto llamada por cada valor hasta ramificar cada uno de los datos y por ultimo devolveria un array
    } else {
        return preg_replace($replace, '', mysqli_real_escape_string($conn3, $value)); // en este caso por cada llamada pasara por este apartado para ser limpiado de inyecciones de codigo y limpiar soltos de lineas y demas
    }
}
function preparePost($post = array(), $Parse_Ignore = array())
// $post: array|any, $Parse_Ignore: array|boolean
{
    $data = ""; // con esto almacenamos lo que retornaremos
    $indice = 0; // con esto controlaremos la posicion de la coma al culminar
    if (!is_array($post)) { // si el valor recibido no es array; solo limpiaremos el dato
        $data = clearInput($post);
    } else { // si es un array lo setearemos
        foreach ($post as $key => $value) { // recorremos el array
            if (!in_array($key, $Parse_Ignore) || (gettype($Parse_Ignore) === "boolean" && $Parse_Ignore === true)) { // nos aseguramos; si es un array o boleano, para ignorar valores o que pueda pasar por esta condicion
                $value = clearInput($value); // limpiamos valores de inyeccion de codigo; saltos de linea y demas, y pasamos los valores a caracteres compatibles con la conexion de la db
                if (gettype($Parse_Ignore) != "boolean") { // validamos si no es un valor boleano; entonces preparamos el array para su posterior INSERT || UPDATE u otros
                    $value = (is_array($value) ? json_encode($value) : $value); // (OPCIONAL) este caso convertira los arrays internos en json para evitar errores al insertar en tabla
                    $data .= "{$key} = '{$value}'" . ($indice == (count($post) - 1) ? "" : ", "); // preparamos los valores dividiendo con un espacio y una coma
                } else { // de ser un valor boleano; solo preparamos los valores para su poesterior vuelta como un array nuevamente
                    $post[$key] = $value;
                }
            }
            $indice++;
        }
    }
    // retornamos el valor correcto segun los valores pasados; ya sea array; o un valor unico; y segun el parametro de parseo.
    return $data = ((gettype($Parse_Ignore) === "boolean" && $Parse_Ignore === true) ? $post : preg_replace("/, $/", '', $data));
}
// $prepare =  preparePost($_POST); EJEMPLO DE USO: name = 'value', cedula = 'value'
// [ 'name' => 'value1', 'cedula' => 'value2']
// $prepare =  preparePost($_POST, ['name']); EJEMPLO DE COMO IGNORAR VALORES  EJEMPLO DE USO: cedula = 'value'
// $variable = "PruebaINSERT INTO SER";
// $variableLimpia =  preparePost($variable); LIMPIAR VARIABLES EJEMPLO DE USO: Prueba
// [ 'name' => 'value1', 'cedula' => 'value2']
// $_POST =  preparePost($_POST, true); LIMPIAR ARRAY Y DEVOLVERA EL MISMO ARRAY EJEMPLO DE USO: // [ 'name' => 'value1', 'cedula' => 'value2']
// *********************************** PREPARE POST OR VARIABLE ***********************************
