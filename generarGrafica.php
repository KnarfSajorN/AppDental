<?php
$n = $_GET['n'];
$nombre = $_GET['nombre'];
$datos = $_GET['datos'];
$Tiempo = $_GET['Tiempo'];

?>

<!--Apex Charts-->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<!-- jquery cdn -->
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>



<div class="box-body col-md-12 row" id="exclude">
    <div class="col-md-6">
        <label>Tema</label>
        <select class="form-control" required name="monochrome<?= $n ?>" id="monochrome<?= $n ?>" onchange="generarGrafica<?= $n ?>();">
            <option value="0">Normal</option>
            <option value="1">Monocromático</option>
        </select>
    </div>
    <div class="col-md-6">
        <label>Gradiente</label>
        <select class="form-control" required name="gradient<?= $n ?>" id="gradient<?= $n ?>" onchange="generarGrafica<?= $n ?>();">
            <option value="0">No</option>
            <option value="1">Si</option>
        </select>
    </div>
    <div class="col-md-6">
        <label>Tipo de Gráfica</label>
        <select class="form-control" required name="tipo<?= $n ?>" id="tipo<?= $n ?>" onchange="generarGrafica<?= $n ?>();">
            <option value="area"> 1 - Área</option>
            <option value="line"> 2 - Líneas</option>
            <option value="bar"> 3 - Barras</option>
            <option value="pie"> 4 - Torta</option>
            <option value="donut"> 5 - Dona</option>
        </select>
    </div>
    <div class="col-md-6">
        <label>Tamaño</label>
        <select class=" form-control" required name="tamano<?= $n ?>" id="tamano<?= $n ?>" onchange="generarGrafica<?= $n ?>();">
        <option value="300">5</option>
        <option value="600">6</option>
        <option value="700">7</option>
        <option value="800">8</option>
        <option value="900">9</option>
        <option value="1000">10</option>
        </select>
    </div>
    <div class="col-md-12">
        <input type="hidden" name="sucursal" id="sucursal" value="0">
    </div>
</div>


<div class="col-md-12">
    <div id="chart-<?= $n ?>"></div>
</div>



<script type="text/javascript">
    // sacar graficas
    function generarGrafica<?= $n ?>() {
        let monochrome = document.getElementById('monochrome<?= $n ?>').value;
        let gradient = document.getElementById('gradient<?= $n ?>').value;
        let tipo = document.getElementById('tipo<?= $n ?>').value;
        let tamano = document.getElementById('tamano<?= $n ?>').value;
        sucursal = 0;
        n = <?= $n ?>;


        $.ajax({
            type: "POST",
            url: "ajax_graficas.php",
            data: {
                monochrome: monochrome,
                gradient: gradient,
                tipo: tipo,
                tamano: tamano,
                sucursal: sucursal,
                n: <?= $n ?>,
                datos: <?= $datos ?>
            },
            success: function(response) {
                $("#chart-<?= $n ?>").html(response);
            }
        });
    }


    setTimeout(() => {
        generarGrafica<?= $n ?>();
    }, <?= $Tiempo ?>);
</script>