<?php 
// cualquier usuario que este vencido no podra acceder a ningun modulo expecto los que see describen a continuación
// con esto se arma un arreglo de urls / pantallas / modulos el cual el cliente si a a tener acceso 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$listaModulosPermitidos = array(
    // portada
    "portada",
    "citasM", // => DEIVYD - TRABAJANDO....
    "vencido",
    "config",
    // modulos de citas
    "Control de Citas",
    "agregarCitas",
    "controlCitas",
    "Calendario_C",
    // modulo para crear alertas
    "RecordatoriosForm",
);

$urlActual = strtok($_SERVER['REQUEST_URI'], '?'); // Obtener la URL sin parámetros

if ($_SESSION["vencido"] == 1 or $_SESSION["ACTIVO"] == 2) {
    // Comprobar si la URL está en la lista de módulos permitidos
    $urlPartes = explode('/', $urlActual);
    $moduloActual = end($urlPartes); // Obtener el último segmento de la URL

    if (!in_array($moduloActual, $listaModulosPermitidos)) {
        $_SESSION['urlActual'] = $urlActual;
        header("Location: vencido");
        exit; // adios :v
    }
}

?>