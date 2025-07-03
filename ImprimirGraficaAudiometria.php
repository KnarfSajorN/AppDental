<?php
date_default_timezone_set('America/Bogota');


include("funciones/funciones.php");
include("funciones/funcionesUtilidades.php");

$historiaClinica = $_GET['historiaClinica'];
$idHistoria = $_GET['idHistoria'];

$queryListhc = mysqli_query($conn3, "SELECT * from configTablas where id = $idHistoria ");
$nrowl = mysqli_num_rows($queryListhc);
while ($rowhc = mysqli_fetch_array($queryListhc)) {
  $Tabla = $rowhc['name'];
  $nombre = $rowhc['nombre'];
}

$queryList = mysqli_query($conn3, "SELECT * FROM  $Tabla where id = $historiaClinica");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

  $grafica_audiometria1      = $rowMotorizado['grafica_audiometria'];
}

$grafica_audiometria = json_decode($grafica_audiometria1, true);

foreach ($grafica_audiometria as $key => $value) {
  //echo $key.'-';
  foreach ($value as $key1 => $value1) {
    //echo $key1.'-'.$value1."<br>";
    if ($key1 == "derecho_aerea") {
      $arr_derecho[$key] = $value1;
    } elseif ($key1 == "izquierdo_aerea") {
      $arr_izquierdo[$key] = $value1;
    }

    if (($key == "500" or $key == "1000" or $key == "2000") and $key1 == "derecho_aerea") {
      $promedio_derecho += $value1;
    }

    if (($key == "500" or $key == "1000" or $key == "2000") and $key1 == "izquierdo_aerea") {
      $promedio_izquierdo += $value1;
    }
  }
}

/*
 	echo "<br>***************************************** JSON-ARRAY****************************************<br>";
 	print("<pre>".print_r($arr_derecho,true)."</pre>");
 	echo "<br>***************************************** JSON ****************************************<br>";

 	echo "<br>***************************************** JSON-ARRAY****************************************<br>";
 	print("<pre>".print_r($arr_izquierdo,true)."</pre>");
 	echo "<br>***************************************** JSON ****************************************<br>";
	*/

foreach ($arr_derecho as $key => $value) {
  $datos .= "{ x: " . $key . ", y: " . $value . ", markerType: 'cross' },";
}
foreach ($arr_izquierdo as $key => $value) {
  $datos1 .= "{ x: " . $key . ", y: " . $value . " },";
}

?>
<style type="text/css">
  @media print {
    @page {
      size: landscape
    }
  }
</style>

<body>
  <div class="row">
    <div class="col-md-12" align="center">
      <h3> Audiometría Tonal: </h3>
    </div>
    <div id="curve_chart" class="col-md-12" align="center" style="width: 1100px; height: 600px"></div>
    <div class="col-md-12" align="center">
      Promedio Tonos Audibles (PTA) Oído Derecho: <?php echo  number_format(($promedio_derecho / 3), 1) ?> dB
    </div>
    <div class="col-md-12" align="center">
      Promedio Tonos Audibles (PTA) Oído Izquierdo: <?php echo  number_format(($promedio_izquierdo / 3), 1); ?> dB
    </div>
    <input type="hidden" name="grafica" id="grafica" value='<?php echo $grafica_audiometria1; ?>'>
  </div>

</body>
<!--<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>-->
<style type="text/css">
  .whiteHat {
    border: none;
    position: absolute;
  }
</style>

<!--<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>-->
<script type="text/javascript" src="plugins/LoaderK/loader.js"></script>
<script type="text/javascript">
  /////////////////////////////////////////////////
  google.charts.load('current', {
    'packages': ['corechart', 'line']
  });
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = new google.visualization.DataTable();
    data.addColumn('number', 'Frecuency Heartz');
    data.addColumn('number', 'Oido Derecho Aerea');
    data.addColumn('number', 'Oido Derecho Oseo');

    data.addColumn('number', 'Oido Izquiero Aerea');
    data.addColumn('number', 'Oido Izquierdo Oseo');


    var puntos = JSON.parse(document.getElementById("grafica").value);
    console.log(puntos);
    for (index in puntos) {
      var rango = parseInt(puntos[index].rango);

        var derecho_aerea = parseInt(puntos[index].derecho_aerea);
        var derecho_oseo = parseInt(puntos[index].derecho_oseo);
        var izquierdo_aerea = parseInt(puntos[index].izquierdo_aerea);
        var izquierdo_oseo = parseInt(puntos[index].izquierdo_oseo);

        var derecho_icono_aerea = puntos[index].derecho_aerea_icono;
        var derecho_icono_oseo = puntos[index].derecho_oseo_icono;
        var izquierdo_icono_aerea = puntos[index].izquierdo_aerea_icono;
        var izquierdo_icono_oseo = puntos[index].izquierdo_oseo_icono;


        data.addRow([rango, derecho_aerea, derecho_oseo, izquierdo_aerea, izquierdo_oseo]);
      }

      var options = {
        hAxis: {
          title: 'Frecuency Hertz',
          scaleType: 'log',
          ticks: [125, 250, 500, 750, 1000, 1500, 2000, 3000, 4000, 6000, 8000]
        },
        vAxis: {
          title: 'Hearing level dB',
          viewWindowMode: "explicit",
          direction: -1,


          ticks: [-10, 0, 10, 20, 30, 40, 50, 60, 70, 80, 90, 100, 110, 120],
          viewWindow: {
            min: -10,
            max: 120
          },
          baseline: {
            color: '#F6F6F6'
          }
        },
        crosshair: {
          color: '#000',
          trigger: 'selection'
        },
        legend: {
          position: 'none'
        },
        series: {
          0: {
            color: '#FF0000'
          },
          1: {
            lineWidth: 0
          },
          2: {
            color: '#0082fd'
          },
          3: {
            lineWidth: 0
          },
        },
        interpolateNulls: true,
      };

      var container = document.getElementById('curve_chart');
      var chart = new google.visualization.LineChart(container);

      var direccion = "IconosGraficas/";

      google.visualization.events.addListener(chart, 'ready', function() {
        var layout = chart.getChartLayoutInterface();
        for (var i = 0; i < data.getNumberOfRows(); i++) {


          var xPos = layout.getXLocation(data.getValue(i, 0));
          var yPos = layout.getYLocation(data.getValue(i, 1));


          var url = puntos[data.getValue(i, 0)]['derecho_aerea_icono'];

          if (url != null && yPos != null) {

            var whiteHat = container.appendChild(document.createElement('img'));
            whiteHat.src = direccion + url;
            whiteHat.className = 'whiteHat';

            // 16x16 (image size in this example)
            whiteHat.style.top = (yPos + 30) + 'px';
            whiteHat.style.left = (xPos - 10) + 'px';
          }


          ///////////////////////////////////////////////////////////

          var xPos = layout.getXLocation(data.getValue(i, 0));
          var yPos = layout.getYLocation(data.getValue(i, 2));


          var url1 = puntos[data.getValue(i, 0)]['derecho_oseo_icono'];

          if (url1 != null && yPos != null) {

            var whiteHat1 = container.appendChild(document.createElement('img'));
            whiteHat1.src = direccion + url1;
            whiteHat1.className = 'whiteHat';

            // 16x16 (image size in this example)
            whiteHat1.style.top = (yPos + 30) + 'px';
            whiteHat1.style.left = (xPos - 10) + 'px';
          }

          ///////////////////////////////////////////////////////////

          var xPos = layout.getXLocation(data.getValue(i, 0));
          var yPos = layout.getYLocation(data.getValue(i, 3));


          var url2 = puntos[data.getValue(i, 0)]['izquierdo_aerea_icono'];

          if (url2 != null && yPos != null) {

            var whiteHat2 = container.appendChild(document.createElement('img'));
            whiteHat2.src = direccion + url2;
            whiteHat2.className = 'whiteHat';

            // 16x16 (image size in this example)
            whiteHat2.style.top = (yPos + 30) + 'px';
            whiteHat2.style.left = (xPos - 10) + 'px';
          }

          ///////////////////////////////////////////////////////////

          var xPos = layout.getXLocation(data.getValue(i, 0));
          var yPos = layout.getYLocation(data.getValue(i, 4));

          ;
          var url3 = puntos[data.getValue(i, 0)]['izquierdo_oseo_icono'];

          if (url3 != null && yPos != null) {

            var whiteHat3 = container.appendChild(document.createElement('img'))
            whiteHat3.src = direccion + url3;
            whiteHat3.className = 'whiteHat';

            // 16x16 (image size in this example)
            whiteHat3.style.top = (yPos + 30) + 'px';
            whiteHat3.style.left = (xPos - 10) + 'px';
          }
          ///////////////////////////////////////////////////////////



        }
      });

      chart.draw(data, options);
    }
</script>

<script type="text/javascript">
  setTimeout(printHTML, 3000);

  function printHTML() {
    if (window.print) {
      window.print();
    }
  }
</script>