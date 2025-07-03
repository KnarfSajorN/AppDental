<?php
include '../funciones/funciones.php';
include '../funciones/conn3.php';


// recibir get
$id = decrypt($_GET['id']);
$estado = $_GET['estado'];
$tabla = $_GET['tabla'];

$query = "UPDATE ".(!empty($tabla) ? $tabla : "ws_filtro")." SET activo = '$estado' WHERE id = '$id'";
mysqli_query($conn3, $query);
?>
<script>
    window.location.href = "<?= (!empty($tabla) ? ($tabla == "ws_mensajesC" ? "masivoMensajesC" : "masivoMensajesW" ) :  "masivoFiltros") ?>";
</script>