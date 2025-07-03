<?php
// phpinfo();
$host = "191.98.164.154";
$user = "ms";
$pass = "ms2024.";
$db = "MSDAT";
$puerto = "4726";

try {
    $dsn = "odbc:Driver={SQL Server};Server=$host,$puerto;Database=$db";
    $connPDO = new PDO($dsn, $user, $pass);

    echo "Conectado";
} catch (PDOException $e) {
    echo "Error de Conexión: " . $e->getMessage();
}
?>
