<div class="row container-fluid">
    <div class="form-group">
        <div class="col-xs-6" align="center">
            <div id="chartContainer1" style="height: 500px; width: 100%;"></div>
        </div>
    </div>
    <!--
    <div class="form-group">
        <div class="col-xs-6" align="center">
            <div id="chartContainer2" style="height: 500px; width: 100%;"></div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-xs-6" align="center">
            <div id="chartContainer3" style="height: 500px; width: 100%;"></div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-xs-6" align="center">
            <div id="chartContainer4" style="height: 500px; width: 100%;"></div>
        </div>
    </div>
    -->
</div>
<script src="https://medicalsoftplus.com/co703/plugins/CanvasK/canvasjs.min.js"></script>
<?php
$QueryLista = mysqli_query($conn3, "SELECT * FROM Tabla_Crecimiento_Puntuacion_Z WHERE tipo = 'Peso para Talla' AND genero = 'M' AND A_Desde = 0 AND A_Hasta = 2;");
$pruebaArray = [];
while ($RowLista = mysqli_fetch_array($QueryLista)) {
    $pruebaArray["+3"][] = array("x" => $RowLista['Length'], "y" => $RowLista["SD3"]);
    $pruebaArray["+2"][] = array("x" => $RowLista['Length'], "y" => $RowLista["SD2"]);
    $pruebaArray["+1"][] = array("x" => $RowLista['Length'], "y" => $RowLista["SD1"]);
    $pruebaArray["0"][] = array("x" => $RowLista['Length'], "y" => $RowLista["SD0"]);
    $pruebaArray["-1"][] = array("x" => $RowLista['Length'], "y" => $RowLista["SD1neg"]);
    $pruebaArray["-2"][] = array("x" => $RowLista['Length'], "y" => $RowLista["SD2neg"]);
    $pruebaArray["-3"][] = array("x" => $RowLista['Length'], "y" => $RowLista["SD3neg"]);
}
$QueryLista = mysqli_query($conn3, "SELECT * FROM Tabla_Crecimiento_Puntuacion_Z WHERE tipo = 'Peso para Talla' AND genero = 'M' AND A_Desde = 2 AND A_Hasta = 5;");
$pruebaArray2 = [];
while ($RowLista = mysqli_fetch_array($QueryLista)) {
    $pruebaArray2["+3"][] = array("x" => $RowLista['Length'], "y" => $RowLista["SD3"]);
    $pruebaArray2["+2"][] = array("x" => $RowLista['Length'], "y" => $RowLista["SD2"]);
    $pruebaArray2["+1"][] = array("x" => $RowLista['Length'], "y" => $RowLista["SD1"]);
    $pruebaArray2["0"][] = array("x" => $RowLista['Length'], "y" => $RowLista["SD0"]);
    $pruebaArray2["-1"][] = array("x" => $RowLista['Length'], "y" => $RowLista["SD1neg"]);
    $pruebaArray2["-2"][] = array("x" => $RowLista['Length'], "y" => $RowLista["SD2neg"]);
    $pruebaArray2["-3"][] = array("x" => $RowLista['Length'], "y" => $RowLista["SD3neg"]);
}
?>
<script type="text/javascript">
    const prueba = JSON.parse(JSON.stringify(<?= json_encode($pruebaArray, JSON_NUMERIC_CHECK) ?>));
    const prueba2 = JSON.parse(JSON.stringify(<?= json_encode($pruebaArray2, JSON_NUMERIC_CHECK) ?>));
    const colorColumn = {
        "+3": {
            color: "#990000",
            lineDashType: "auto",
            indexLabel: "+3",
            indexLabelFontColor: "#990000"
        },
        "+2": {
            color: "#990000",
            lineDashType: "dash",
            indexLabel: "+2",
            indexLabelFontColor: "#990000"
        },
        "+1": {
            color: "#807000",
            lineDashType: "auto",
            indexLabel: "+1",
            indexLabelFontColor: "#807000"
        },
        "0": {
            color: "#009900",
            lineDashType: "auto",
            indexLabel: "0",
            indexLabelFontColor: "#009900"
        },
        "-1": {
            color: "#807000",
            lineDashType: "auto",
            indexLabel: "-1",
            indexLabelFontColor: "#807000"
        },
        "-2": {
            color: "#990000",
            lineDashType: "dash",
            indexLabel: "-2",
            indexLabelFontColor: "#990000"
        },
        "-3": {
            color: "#990000",
            lineDashType: "auto",
            indexLabel: "-3",
            indexLabelFontColor: "#990000",
            labelFontSize: 8
        }
    };
    // console.log(prueba);

    const json_data = Object.entries(prueba).map(function([clave, value]) {
        const {
            color,
            lineDashType,
            ...newDatos
        } = colorColumn[clave];

        const count = value.length; // 131
        const newValue = [
            ...value.slice(0, (count - 1)), // 130
            {
                ...value.slice((count - 1), count)[0],
                ...newDatos
            }
        ]

        return {
            type: "spline",
            lineDashType: lineDashType,
            name: clave,
            markerType: 0,
            showInLegend: true,
            color: color,
            dataPoints: newValue
        }
    });
    const json_data2 = Object.entries(prueba2).map(function([clave, value]) {
        const {
            color,
            lineDashType,
            ...newDatos
        } = colorColumn[clave];

        const count = value.length; // 131
        const newValue = [
            ...value.slice(0, (count - 1)), // 130
            {
                ...value.slice((count - 1), count)[0],
                ...newDatos
            }
        ]

        return {
            type: "spline",
            lineDashType: lineDashType,
            name: clave,
            markerType: 0,
            showInLegend: true,
            color: color,
            dataPoints: newValue
        }
    });

    // console.log(json_data);
    // id: id del contendor
    // backgroundColor: color fondo
    // title: Titulo
    // subtitles: Sub titulo
    // axisX: configuracion X
    // axisY: configuracion Y
    let config = {
        element: "chartContainer1",
        backgroundColor: 'rgba(54, 162, 235, 0.2)',
        title: {
            text: "Puntuación Z",
            fontSize: 28
        },
        subtitles: [{
            text: "(0 a 2 Años)",
            fontSize: 20
        }],
        toolTip: {
            shared: true
        },
        axisX: {
            title: "Talla (cm)",
            minimum: 45,
            maximum: 112,
            interval: 5,
            gridThickness: 1,
            gridColor: "#2c9cdb",
            labelFontSize: 12
        },
        axisY: {
            title: "Peso (Kg)",
            interval: 1,
            minimum: 1,
            maximum: 26,
            gridThickness: 1,
            gridColor: "#2c9cdb",
            labelFontSize: 14
        },
        //data: json_data
        data:data: [{
                    type: "spline",
                    name: "3th",
                    markerType: 0,
                    showInLegend: true,
                    color: "red",
                    dataPoints: <?php echo json_encode($ArrayLista_3, JSON_NUMERIC_CHECK); ?>

                },
                {
                    type: "spline",
                    name: "15th",
                    markerType: 0,
                    showInLegend: true,
                    color: "#f5821f",
                    dataPoints: <?php echo json_encode($ArrayLista_15, JSON_NUMERIC_CHECK); ?>

                },
                {
                    type: "spline",
                    name: "50th",
                    markerType: 0,
                    showInLegend: true,
                    color: "#6fe46d",
                    dataPoints: <?php echo json_encode($ArrayLista_50, JSON_NUMERIC_CHECK); ?>

                },
                {
                    type: "spline",
                    name: "85th",
                    markerType: 0,
                    showInLegend: true,
                    color: "#f5821f",
                    dataPoints: <?php echo json_encode($ArrayLista_85, JSON_NUMERIC_CHECK); ?>

                },
                {
                    type: "spline",
                    name: "97th",
                    markerType: 0,
                    showInLegend: true,
                    color: "red",
                    dataPoints: <?php echo json_encode($ArrayLista_97, JSON_NUMERIC_CHECK); ?>

                },
                {
                    type: "spline",
                    name: "Paciente",
                    showInLegend: true,
                    color: "black",
                    dataPoints: <?php echo json_encode($ArrayPaciente, JSON_NUMERIC_CHECK); ?>

                }
            ]
    };

    const pruebas = (config) => {
        const {
            element,
            ...newConfig
        } = config;

        var chart = new CanvasJS.Chart(element, {
            animationEnabled: true,
            zoomEnabled: true,
            zoomType: "xy",
            theme: "light2",
            ...newConfig,
            legend: {
                cursor: "pointer",
                itemclick: toggleDataSeries,
                fontSize: 18
            }
        });
        chart.render();
    }

    function toggleDataSeries(e) {
        if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
            e.dataSeries.visible = false;
        } else {
            e.dataSeries.visible = true;
        }
        chart.render();
    }

    window.addEventListener('load', function() {
        pruebas(config);

        config.element = "chartContainer2";
        config.subtitles = [{
            text: "(2 a 5 Años)",
            fontSize: 20
        }];
        config.axisX.minimum = 65;
        config.axisX.maximum = 122;
        config.axisY.minimum = 5;
        config.axisY.maximum = 32;
        config.data = json_data2;
        pruebas(config);

        config.element = "chartContainer3";
        pruebas(config);

        config.element = "chartContainer4";
        pruebas(config);
    });
</script>