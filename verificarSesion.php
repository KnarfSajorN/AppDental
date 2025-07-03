<?php
// _DISABLED = 0
// _NONE = 1
// _ACTIVE = 2

if (session_status() <> 2 || !isset($_SESSION) || $_SESSION['ID'] == '' || $_SESSION['ID'] == null) {
    // se corta conexion con base de datos
    mysqli_close($conn3);
    $conn3 = '';
    // se cierra la session de todas formas
    session_destroy();
    echo "<script>alert('Sesión caducada debe iniciar sesión nuevamente'); window.location='index.php'</script>";
}
