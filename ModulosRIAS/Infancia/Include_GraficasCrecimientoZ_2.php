<script src="plugins/CanvasK/canvasjs.min.js"></script>
<?php
$G = funcionMaster($_GET["clienteId"], 'cliente_id', 'genero', 'cliente');
$Genero["F"] = "Femenino";
$Genero["M"] = "Masculino";
if($G=="M"){
    $GeneroTexto = " - ".$Genero["M"];
}elseif ($G=="F") {    
    $GeneroTexto = " - ".$Genero["F"];
}
?>
<script>
    var chart;
    function AgregarGraficaCrecimientoZ_AlturaEdad() {
        
        var Valor = document.getElementById("ExamenFisico_Parametros_Talla").value;
        
        $.ajax({
        type: "POST",
        url: "ModulosRIAS/RIAS_Ajax.php",
        data: {
            cliente_id: '<?=$_GET["clienteId"]?>',
            ValorTemporal: Valor,
            Tipo_Consulta: "Consultar Grafica Altura x Edad"
        },
        success: function(response) {
            var dataArreglo = JSON.parse(response);

            var Config = dataArreglo['Config'];
            var Data = dataArreglo['Data'];
            //console.log(dataArreglo);


         chart = new CanvasJS.Chart("Include_GraficaCrecimientoZ_TallaEdad", {
            animationEnabled: true,
            zoomEnabled: true,
            zoomType: "xy",
            theme: "light2",
            backgroundColor: Config.colorFill,
            title: {
            text: "Talla para la Edad <?=$GeneroTexto?>",
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
            title: "Edad",
            minimum: Config.min_grafica_x,
            maximum: Config.max_grafica_x,
            interval: Config.intervalo_x,
            gridThickness: 1,
            gridColor: Config.colorLine,
            labelFontSize: 12
        },
        axisY: {
            title: "Altura (cm)",
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
                itemclick: toggleDataSeries,
                fontSize: 18
            }
        });
        chart.render();

        }
    });

    }

    function toggleDataSeries(e) {
            if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                e.dataSeries.visible = false;
            } else {
                e.dataSeries.visible = true;
            }
            chart.render();
        }
</script>


<script>
    var chart_2;
    function AgregarGraficaCrecimientoZ_AlturaPeso() {
        
        var ValorTalla = document.getElementById("ExamenFisico_Parametros_Talla").value;
        var ValorPeso = document.getElementById("ExamenFisico_Parametros_Peso").value;

        $.ajax({
        type: "POST",
        url: "ModulosRIAS/RIAS_Ajax.php",
        data: {
            cliente_id: '<?=$_GET["clienteId"]?>',
            ValorTemporalTalla: ValorTalla,
            ValorTemporalPeso: ValorPeso,
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
            text: "Peso para la Talla <?=$GeneroTexto?>",
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

<script>
    var chart_3;
    function AgregarGraficaCrecimientoZ_PerimetroCefalico() {
        
        var ValorPerimetro = document.getElementById("ExamenFisico_Parametros_PerimetroC").value;

        $.ajax({
        type: "POST",
        url: "ModulosRIAS/RIAS_Ajax.php",
        data: {
            cliente_id: '<?=$_GET["clienteId"]?>',
            ValorTemporalPerimetro: ValorPerimetro,
            Tipo_Consulta: "Consultar Grafica Perimetro Cefalico"
        },



        success: function(response) {
            var dataArreglo = JSON.parse(response);

            var Config = dataArreglo['Config'];
            var Data = dataArreglo['Data'];
            //console.log(dataArreglo);


            chart_3 = new CanvasJS.Chart("Include_GraficaCrecimientoZ_PerimetroCefalico", {
            animationEnabled: true,
            zoomEnabled: true,
            zoomType: "xy",
            theme: "light2",
            backgroundColor: Config.colorFill,
            title: {
            text: "Perimetro Cefalico <?=$GeneroTexto?>",
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
            title: "Edad",
            minimum: Config.min_grafica_x,
            maximum: Config.max_grafica_x,
            interval: Config.intervalo_x,
            gridThickness: 1,
            gridColor: Config.colorLine,
            labelFontSize: 12
        },
        axisY: {
            title: "Perimetro",
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
                itemclick: toggleDataSeries_3,
                fontSize: 18
            }
        });
        chart_3.render();

        }

    });

    }

    function toggleDataSeries_3(e) {
            if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                e.dataSeries.visible = false;
            } else {
                e.dataSeries.visible = true;
            }
            chart_3.render();
        }
</script>

<script>
    var chart_4;
    function AgregarGraficaCrecimientoZ_IMC() {
        
        var ValorIMC = document.getElementById("ExamenFisico_Parametros_IMC").value;

        $.ajax({
        type: "POST",
        url: "ModulosRIAS/RIAS_Ajax.php",
        data: {
            cliente_id: '<?=$_GET["clienteId"]?>',
            ValorTemporalIMC: ValorIMC,
            Tipo_Consulta: "Consultar Grafica IMC"
        },



        success: function(response) {
            var dataArreglo = JSON.parse(response);

            var Config = dataArreglo['Config'];
            var Data = dataArreglo['Data'];
            //console.log(dataArreglo);


            chart_4 = new CanvasJS.Chart("Include_GraficaCrecimientoZ_IMC", {
            animationEnabled: true,
            zoomEnabled: true,
            zoomType: "xy",
            theme: "light2",
            backgroundColor: Config.colorFill,
            title: {
            text: "IMC para la Edad <?=$GeneroTexto?>",
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
            title: "Edad",
            minimum: Config.min_grafica_x,
            maximum: Config.max_grafica_x,
            interval: Config.intervalo_x,
            gridThickness: 1,
            gridColor: Config.colorLine,
            labelFontSize: 12
        },
        axisY: {
            title: "IMC",
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
                itemclick: toggleDataSeries_4,
                fontSize: 18
            }
        });
        chart_4.render();

        }

    });

    }

    function toggleDataSeries_4(e) {
            if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                e.dataSeries.visible = false;
            } else {
                e.dataSeries.visible = true;
            }
            chart_4.render();
        }
</script>


<script>
    var chart_5;
    function AgregarGraficaCrecimientoZ_PesoEdad() {
        
        var ValorPeso = document.getElementById("ExamenFisico_Parametros_Peso").value;

        $.ajax({
        type: "POST",
        url: "ModulosRIAS/RIAS_Ajax.php",
        data: {
            cliente_id: '<?=$_GET["clienteId"]?>',
            ValorTemporalPeso: ValorPeso,
            Tipo_Consulta: "Consultar Grafica Peso x Edad"
        },



        success: function(response) {
            var dataArreglo = JSON.parse(response);

            var Config = dataArreglo['Config'];
            var Data = dataArreglo['Data'];
            //console.log(dataArreglo);


            chart_5 = new CanvasJS.Chart("Include_GraficaCrecimientoZ_PesoEdad", {
            animationEnabled: true,
            zoomEnabled: true,
            zoomType: "xy",
            theme: "light2",
            backgroundColor: Config.colorFill,
            title: {
            text: "Peso para la Edad <?=$GeneroTexto?>",
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
            title: "Edad",
            minimum: Config.min_grafica_x,
            maximum: Config.max_grafica_x,
            interval: Config.intervalo_x,
            gridThickness: 1,
            gridColor: Config.colorLine,
            labelFontSize: 12
        },
        axisY: {
            title: "Peso",
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
                itemclick: toggleDataSeries_5,
                fontSize: 18
            }
        });
        chart_5.render();

        }

    });

    }

    function toggleDataSeries_5(e) {
            if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                e.dataSeries.visible = false;
            } else {
                e.dataSeries.visible = true;
            }
            chart_5.render();
        }
</script>


<script>
var idInput_Talla = document.getElementById('ExamenFisico_Parametros_Talla');
if (idInput_Talla) {
    idInput_Talla.onchange = function() {
        var idValue = idInput_Talla.value;
        if (idValue && !isNaN(idValue)) {
            AgregarGraficaCrecimientoZ_AlturaEdad();
            AgregarGraficaCrecimientoZ_AlturaPeso();
            AgregarGraficaCrecimientoZ_IMC();
            
        } else {
            console.log('El valor de ID no es válido');
        }
    };
} else {
    console.log('No se encontró el elemento con ID "idInput_Talla"');
}

var idInput_Peso = document.getElementById('ExamenFisico_Parametros_Peso');
if (idInput_Peso) {
    idInput_Peso.onchange = function() {
        var idValue = idInput_Peso.value;
        if (idValue && !isNaN(idValue)) {
            AgregarGraficaCrecimientoZ_AlturaPeso();
            AgregarGraficaCrecimientoZ_PesoEdad();
            AgregarGraficaCrecimientoZ_IMC();
        } else {
            console.log('El valor de ID no es válido');
        }
    };
} else {
    console.log('No se encontró el elemento con ID "idInput_Peso"');
}

var idInput_PerimetroCefalico = document.getElementById('ExamenFisico_Parametros_PerimetroC');
if (idInput_PerimetroCefalico) {
    idInput_PerimetroCefalico.onchange = function() {
        var idValue = idInput_PerimetroCefalico.value;
        if (idValue && !isNaN(idValue)) {
            AgregarGraficaCrecimientoZ_PerimetroCefalico();
        } else {
            console.log('El valor de ID no es válido');
        }
    };
} else {
    console.log('No se encontró el elemento con ID "idInput_PerimetroCefalico"');
}

var idInputIMC = document.getElementById('ExamenFisico_Parametros_IMC');
if (idInputIMC) {
    idInputIMC.onchange = function() {
        var idValue = idInputIMC.value;
        if (idValue && !isNaN(idValue)) {
            AgregarGraficaCrecimientoZ_IMC();
        } else {
            console.log('El valor de ID no es válido');
        }
    };
} else {
    console.log('No se encontró el elemento con ID "idInputIMC"');
}

$(document).ready(function() {
    AgregarGraficaCrecimientoZ_AlturaEdad();
    //AgregarGraficaCrecimientoZ_AlturaPeso();
    //AgregarGraficaCrecimientoZ_PerimetroCefalico();
    AgregarGraficaCrecimientoZ_IMC();
    AgregarGraficaCrecimientoZ_PesoEdad();
})
</script>
