<div class="col-md-12">
    <button type="button" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" style="display:none;"
        onclick="ModalRetenciones();">
        Agregar Retenciones
    </button>
</div>

<?php
$RetencionBase = 0;
$RetencionImpuesto = 0;

//$ValorBaseParaRetencion_ModalInclude viene de las ordenes de compra
//$ValorImpuestoParaRetencion_ModalInclude viene de las ordenes de compra

$QueryRetenciones = mysqli_query($conn3, "SELECT * FROM  DetalleRetenciones WHERE Activo='1' AND ID_Empresa = '$Empresa_Id_ModalInclude' AND usuario_id = '$_SESSION[ID]' ");
while ($RowRetenciones = mysqli_fetch_array($QueryRetenciones)) {
    $Tipo = $RowRetenciones['Tipo'];

    if ($Tipo == 1) {
        $RetencionBase = round($RetencionBase + $RowRetenciones['MontoRetencion'], 2);
    } elseif ($Tipo == 2) {
        $RetencionImpuesto = round($RetencionImpuesto + $RowRetenciones['MontoRetencion'], 2);
    }
}

if ($RetencionBase > 0) {
    echo '<hr>';
    echo '<label>Retención Base</label><br><input type="number" step="0.01" name="RetencionBase" id="RetencionBase" value="' . $RetencionBase . '" max="' . $ValorBaseParaRetencion_ModalInclude . '"  class="form-control input-lg blur" style="pointer-events: none;background-color: #eee;opacity: 1;" required><br><label style="    font-size: 13px;color:red;">*La retención de base no podra superar el valor base de la factura*</label>';
}
if ($RetencionImpuesto > 0) {
    echo '<hr>';
    echo '<label>Retención Impuesto</label><br><input type="number" step="0.01" name="RetencionImpuesto" id="RetencionImpuesto" value="' . $RetencionImpuesto . '" max="' . $ValorImpuestoParaRetencion_ModalInclude . '"  class="form-control input-lg blur" style="pointer-events: none;background-color: #eee;opacity: 1;" required><br><label style="    font-size: 13px;color:red;">*La retención de impuesto no podra superar el valor del iva de la factura*</label>';
}

echo "<br>";
echo "<hr>";
echo "<br>";
?>
<script>
    document.addEventListener("DOMContentLoaded", function() {
  var botonAgregarRetenciones = document.querySelector(".btn.btn-block.btn-outline-info.btn-lg.rounded-pill.shadow");
  botonAgregarRetenciones.style.display = "block";
});
</script>