<?php
session_start();
unset($SESSION['username']);
$usuario = $_SESSION['usuario_id_relacionado'];
session_destroy();
header('Location: ./verHistorias?i='.$usuario);
?>
