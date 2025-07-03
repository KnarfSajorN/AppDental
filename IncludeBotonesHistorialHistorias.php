<?php
if (!isset($FacturacionTipo)) {
    $FacturacionTipo = "SgenerarFactura?clienteId={$Cliente_id}"; // Facturación Normal
}
$Cliente_id_encryptado = encrypt($Cliente_id);
$claseAdicional = isset($claseAdicional) ? $claseAdicional : 'btn-outline-info btn-lg rounded-pill shadow m-1'; // Clase por defecto
?>

<a class="btn <?= $claseAdicional ?>" href="<?= $FacturacionTipo; ?>" role="button">
    <i class="fa fa-shopping-basket"></i> Facturación
</a>

<a class="btn <?= $claseAdicional ?>" href="agregarCitas?cI=<?= $Cliente_id_encryptado; ?>" role="button">
    <i class="fa fa-calendar"></i> Agendar Cita
</a>
