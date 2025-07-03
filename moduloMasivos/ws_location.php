<?php
if (!empty($_GET['url'])) {
    include '../funciones/funciones.php';
    
    $archivo = mysqli_query($conn3, "SELECT url FROM ws_archivos WHERE alias = '{$_GET['url']}'") or die(mysqli_error($conn3));
    var_dump("SELECT url FROM ws_archivos WHERE alias = '{$_GET['url']}'");
    var_dump($archivo);
    if (mysqli_num_rows($archivo) > 0) {
        $archivo = mysqli_fetch_assoc($archivo);
        header("Location: https://app.dentalsoftplus.com/".trim(explode("/", $_SERVER['PHP_SELF'])[1])."/ws_archivos/{$archivo['url']}");
    } else {
        header("Location: https://app.dentalsoftplus.com/".trim(explode("/", $_SERVER['PHP_SELF'])[1])."/error_404.php");
    }
}
