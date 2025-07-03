<?php
date_default_timezone_set('America/Bogota');
// include("funciones/funciones.php");
include 'funciones/conn3.php';

$date = date("Y-m-d");

$n = $_POST['n'];
?>
<div>
    <hr>
</div>
<div id="chart<?= $n ?>"></div>
<?php
// opciones

// monocromatico
$monochrome = $_POST['monochrome'];
if ($monochrome == 0) {
    $monochrome_ = "";
} else {    
    $monochrome_ = "theme: { monochrome: { enabled: true } },";
}

$gradient = $_POST['gradient'];
if ($gradient == 0) {
    $gradient_ = "";
} else {    
    $gradient_ = "fill: { type: 'gradient', },";
}

// tamano
$tamano = $_POST['tamano'];
$tipo = $_POST['tipo'];
$sucursal = $_POST['sucursal'];
//$datos = $_POST['datos'];
$datos = $_POST['datos'] ?? [];
$Descripcion='';
$Valor1='';

foreach ($datos as $key => $value) {
    $Descripcion = $Descripcion . '"' . $value[0] . '"' . ',';
    $Valor1 = $Valor1 . '' . str_replace(',', '', $value[1]) . '' . ',';
}
?>
<?php if ($tipo == 'bar' or $tipo == 'line' or $tipo == 'area') { ?>
    <script type="text/javascript">
        // bar - line - area
        var options = {
            chart: {
                type: '<?= $tipo ?>',
                height: '<?= $tamano ?>',
            },
            <?= $monochrome_ ?>
            <?= $gradient_ ?>
            series: [{
                // datos en cada punto
                name: 'Total',
                data: [<?= $Valor1; ?>],                
            }],
            xaxis: {
                // datos en x
                categories: [<?= $Descripcion; ?>]
            }
        }
        var chart = new ApexCharts(document.querySelector("#chart<?= $n ?>"), options);
        chart.render();
    </script>
<?php } ?>
<?php if ($tipo == 'pie' or $tipo == 'donut') { ?>
    <script type="text/javascript">
        // pie - donut 
        var options = {
            series: [<?= $Valor1; ?>],
            chart: {
                // width: <?= $tamano ?>px,
                // width: '<?= $tamano ?>',
                height: '<?= $tamano ?>',
                type: '<?= $tipo ?>',
            },
            <?= $monochrome_ ?>
            <?= $gradient_ ?>
            labels: [<?= $Descripcion; ?>],
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        show: false
                    }
                }
            }],
            legend: {
                position: 'right',
                offsetY: 0,
                height: 230,
            }
        };
        var chart = new ApexCharts(document.querySelector("#chart<?= $n ?>"), options);
        chart.render();
    </script>
<?php } ?>