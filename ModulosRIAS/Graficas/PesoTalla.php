<?php
include '../../funciones/conn3.php';
include '../../funciones/funciones.php';

$cliente_id = $_GET['clienteId'];



$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $cliente_id ");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $nombre_cliente = $rowMotorizado['nombre_cliente'];
    $CODI_CLIENTE = $rowMotorizado['CODI_CLIENTE'];
    $fechaNacimiento = $rowMotorizado['fechaNacimiento'];
    $direccion_cliente = $rowMotorizado['direccion_cliente'];
    $entidadSalud = $rowMotorizado['entidadSalud'];
    $entidadSalud = funcionMaster($rowMotorizado['entidad_id'], 'id', 'Nombre', 'Rips_Entidades');
    $celular_cliente = $rowMotorizado['celular_cliente'];
    $genero = $rowMotorizado['genero'];
}

$Genero["F"] = "Femenino";
$Genero["M"] = "Masculino";
if($genero=="M"){
    $GeneroTexto = " - ".$Genero["M"];
}elseif ($genero=="F") {    
    $GeneroTexto = " - ".$Genero["F"];
}
?>



<!DOCTYPE html>
<html>

<head>
    <style>
        @page {
        orientation: landscape;
        size: 1100px 800px;
        margin: 0;
        }
    </style>
    <style>

    </style>    
</head>

<body>

    <div id="Include_GraficaCrecimientoZ_TallaPeso" style="width: 1080px; height: 750px; margin: 0px auto;"></div>

</body>

</html>
<script src="../../plugins/CanvasK/canvasjs.min.js"></script>
<script src="../../plugins/jquery/jquery-2.2.3.min.js"></script>

<script>
    var chart_2;
    function AgregarGraficaCrecimientoZ_AlturaPeso() {
        

        $.ajax({
        type: "POST",
        url: "AjaxGraficas.php",
        data: {
            cliente_id: '<?=$_GET["clienteId"]?>',
            Tipo_Consulta: "Consultar Grafica Altura x Peso"
        },



        success: function(response) {
            var dataArreglo = JSON.parse(response);

            var Config = dataArreglo['Config'];
            var Data = dataArreglo['Data'];
            //console.log(dataArreglo);


            chart_2 = new CanvasJS.Chart("Include_GraficaCrecimientoZ_TallaPeso", {
            animationEnabled: true,
            zoomEnabled: true,
            zoomType: "xy",
            theme: "light2",
            backgroundColor: Config.colorFill,
            title: {
            text: "Paciente: <?=$nombre_cliente;?> [Peso para la Talla] <?=$GeneroTexto?>",
            fontSize: 28
        },
        subtitles: [{
            text: Config.Tipo,
            fontSize: 20
        }],
        toolTip: {
            shared: true
        },
        axisX: {
            title: "Altura (cm)",
            minimum: Config.min_grafica_x,
            maximum: Config.max_grafica_x,
            interval: Config.intervalo_x,
            gridThickness: 1,
            gridColor: Config.colorLine,
            labelFontSize: 12
        },
        axisY: {
            title: "Peso (kg)",
            interval: Config.intervalo_y,
            minimum: Config.min_grafica_y,
            maximum: Config.max_grafica_y,
            gridThickness: 1,
            gridColor: Config.colorLine,
            labelFontSize: 14
        },
        data: Data,
            legend: {
                cursor: "pointer",
                itemclick: toggleDataSeries_2,
                fontSize: 18
            }
        });
        chart_2.render();

        setTimeout(function() {
                printHTML();
            }, 2000);

        
        }

    });

    }

    function toggleDataSeries_2(e) {
            if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                e.dataSeries.visible = false;
            } else {
                e.dataSeries.visible = true;
            }
            chart_2.render();
        }
</script>

<script type="text/javascript">
 $(document).ready(function() {
    AgregarGraficaCrecimientoZ_AlturaPeso();
    });

    function printHTML() {
        if (window.print) {
            window.print();
        }
    }
</script>