<?php
date_default_timezone_set('America/Bogota');

include("funciones/funciones.php");
include("funciones/funcionesUtilidades.php");

$historiaClinica = $_GET['historiaClinica'];
$idHistoria = $_GET['idHistoria'];
$Tipo = $_GET['Tipo'];

$queryListhc = mysqli_query($conn3, "SELECT * from configTablas where id = $idHistoria ");
$nrowl = mysqli_num_rows($queryListhc);
while ($rowhc = mysqli_fetch_array($queryListhc)) {
  $Tabla = $rowhc['name'];
  $nombre = $rowhc['nombre'];
}

//////////////////////////////////////////////////////? Audiometria /////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////? Audiometria /////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////? Audiometria /////////////////////////////////////////////////////////////////

if($Tipo=="Audiometria"):


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
      <h3 class="titulo_grafica"> Gráfica de Audiometría Tonal: </h3>
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
<style type="text/css">
  .whiteHat {
    border: none;
    position: absolute;
  }
</style>
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
    data.addColumn('number', 'Oído Derecho Aérea');
    data.addColumn('number', 'Oído Derecho Óseo');

    data.addColumn('number', 'Oído Izquierdo Aérea');
    data.addColumn('number', 'Oído Izquierdo Óseo');


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

<?php
endif;
//////////////////////////////////////////////////////? Audiometria [FIN]/////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////? Audiometria [FIN]/////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////? Audiometria [FIN]/////////////////////////////////////////////////////////////////
?>



























<?php


//////////////////////////////////////////////////////? Logoaudiometria /////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////? Logoaudiometria /////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////? Logoaudiometria /////////////////////////////////////////////////////////////////
if($Tipo=="Logoaudiometria"):

$queryList = mysqli_query($conn3, "SELECT * FROM  $Tabla where id = $historiaClinica");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

  $grafica_audiometria1      = $rowMotorizado['grafica_logometria'];
}

$grafica_audiometria = json_decode($grafica_audiometria1, true);


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
      <h3 class="titulo_grafica"> Gráfica de Logoaudiometría </h3>
    </div>
    <div id="curve_chart" class="col-md-12" align="center" style="width: 1100px; height: 600px"></div>
    <input type="hidden" name="grafica" id="grafica" value='<?php echo $grafica_audiometria1; ?>'>
  </div>
</body>
<style type="text/css">
  .whiteHat {
    border: none;
    position: absolute;
  }
</style>
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
    data.addColumn('number', 'Oído Derecho Aérea');
    data.addColumn('number', 'Oído Derecho Óseo');
    data.addColumn('number', 'Oído Izquierdo Aérea');
    data.addColumn('number', 'Oído Izquierdo Óseo');
    data.addColumn('number', 'Logo - Logoaudiometría');


    var puntos = JSON.parse(document.getElementById("grafica").value);
    for (index in puntos) {
      var rango = puntos[index].rango;

      var derecho_aerea = puntos[index].derecho_aerea;
      var izquierdo_aerea = puntos[index].izquierdo_aerea;
      var derecho_oseo = puntos[index].derecho_oseo;
      var izquierdo_oseo = puntos[index].izquierdo_oseo;

      var derecho_icono_aerea = puntos[index].derecho_icono_aerea;
      var izquierdo_icono_aerea = puntos[index].izquierdo_icono_aerea;
      var derecho_icono_oseo = puntos[index].derecho_icono_oseo;
      var izquierdo_icono_oseo = puntos[index].izquierdo_icono_oseo;

      var logo = puntos[index].logografica;
      data.addRow([rango, derecho_aerea, derecho_oseo, izquierdo_aerea, izquierdo_oseo, logo]);
    }

    var options = {
      hAxis: {
        //title: 'Frecuency Hertz',
        scaleType: 'linear',
        ticks: [0, 5, 10, 15, 20, 25, 30, 35, 40, 45, 50, 55, 60, 65, 70, 75, 80, 85, 90, 95, 100]
      },
      vAxis: {
        //title: 'Hearing level dB',
        viewWindowMode: "explicit",
        //direction: -1,


        ticks: [0, 10, 20, 30, 40, 50, 60, 70, 80, 90, 100],
        viewWindow: {
          min: 0,
          max: 100
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
        position: 'rigth'
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
        4: {
          curveType: "function",
          color: 'black',
          legend: {
            position: 'bottom'
          }
        }
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


        var url = puntos[data.getValue(i, 0)]['derecho_icono_aerea'];

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


        var url1 = puntos[data.getValue(i, 0)]['derecho_icono_oseo'];

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


        var url2 = puntos[data.getValue(i, 0)]['izquierdo_icono_aerea'];

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
        var url3 = puntos[data.getValue(i, 0)]['izquierdo_icono_oseo'];

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

      linearreglo = [-10, -5, 0, 5, 10, 15, 20, 25, 30, 35, 40, 45, 50, 55, 60, 65, 70, 75, 80, 85];
      for (let index = 0; index < linearreglo.length; index++) {
        var numero = container.appendChild(document.createElement('svg'));
        numero.setAttribute("width", "36");
        numero.setAttribute("height", "36");
        numero.setAttribute("xmlns", "http://www.w3.org/2000/svg");
        numero.setAttribute("xmlns:xlink", "http://www.w3.org/1999/xlink");
        numero.setAttribute("style", "position:absolute");
        numero.innerHTML = '<g transform="translate(0 0)"><rect width="300" height="36" rx="4" transform="translate(0 0)" fill="white" stroke="transparent" stroke-width="1"></rect><text transform="translate(12 23)" fill="#9e9e9e" font-size="14" font-family="Roboto-Regular,Roboto"><tspan x="0" y="0">' + linearreglo[index] + '</tspan></text></g>';

        var xPos = layout.getXLocation(linearreglo[index] + 12.5);
        var yPos = layout.getYLocation(50);
        // 16x16 (image size in this example)
        numero.style.top = (yPos + 30) + 'px';
        numero.style.left = (xPos - 2) + 'px';
      }

      linearreglo = [40, 55, 70];
      linearregloT = ["va", "vm", "vf"];
      for (let index = 0; index < linearreglo.length; index++) {
        var numero = container.appendChild(document.createElement('svg'));
        numero.setAttribute("width", "36");
        numero.setAttribute("height", "36");
        numero.setAttribute("xmlns", "http://www.w3.org/2000/svg");
        numero.setAttribute("xmlns:xlink", "http://www.w3.org/1999/xlink");
        numero.setAttribute("style", "position:absolute");
        numero.innerHTML = '<g transform="translate(0 0)"><rect width="300" height="36" rx="4" transform="translate(0 0)" fill="white" stroke="transparent" stroke-width="1"></rect><text transform="translate(12 23)" fill="#9e9e9e" font-size="14" font-family="Roboto-Regular,Roboto"><tspan x="0" y="0">' + linearregloT[index] + '</tspan></text></g>';

        var xPos = layout.getXLocation(linearreglo[index]);
        var yPos = layout.getYLocation(95);
        // 16x16 (image size in this example)
        numero.style.top = (yPos + 30) + 'px';
        numero.style.left = (xPos + 2) + 'px';
      }
    });

    chart.draw(data, options);
  }
</script>

<?php
endif;
//////////////////////////////////////////////////////? Logoaudiometria [FIN]/////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////? Logoaudiometria [FIN]/////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////? Logoaudiometria [FIN]/////////////////////////////////////////////////////////////////
?>






























<?php


//////////////////////////////////////////////////////? Timpanograma /////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////? Timpanograma /////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////? Timpanograma /////////////////////////////////////////////////////////////////
if($Tipo=="Timpanograma"):


$queryList = mysqli_query($conn3, "SELECT * FROM  $Tabla where id = $historiaClinica");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

  $grafica_timpanograma_oi      = $rowMotorizado['grafica_timpanograma_oi'];
  $grafica_timpanograma_od      = $rowMotorizado['grafica_timpanograma_od'];
}



?>
<style type="text/css">
  @media print {
    @page {
      size: landscape
    }
  }

  @page {
    margin: 0;
  }

</style>

<body>
  <div class="row">
    <div class="col-md-12" align="center">
      <h3 class="titulo_grafica"> Timpanogramas: </h3>
    </div>
    <div class="col-md-12" align="center">
      <div id="curve_chart2" style="height: 450px;width: 1050px;"></div>
    </div>
    <input type="hidden" id="grafica_timpanograma_arreglo_1" value='<?php echo $grafica_timpanograma_od; ?>'>
    <input type="hidden" id="grafica_timpanograma_arreglo_2" value='<?php echo $grafica_timpanograma_oi; ?>'>
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
  google.charts.setOnLoadCallback(drawChart2);

  function drawChart2() {
    var data = new google.visualization.DataTable();
    data.addColumn('number', 'daPa');
    data.addColumn('number', 'Oído Derecho');
    data.addColumn('number', 'Oído Izquierdo');
    //data.addColumn('number', '');

    //data.addRow([-200, 0, 0, 0]);
    data.addRow([-200, 0, 0]);

    var puntos = JSON.parse(document.getElementById("grafica_timpanograma_arreglo_1").value);
    var puntos2 = JSON.parse(document.getElementById("grafica_timpanograma_arreglo_2").value);
    //console.log(puntos);

    var cadena = "0";
    var arreglo = new Array();
    for (index in puntos) {
      var rango = puntos[index].x;
      if (rango != null) {
        cadena++;
        arreglo[cadena] = {};
        arreglo[cadena]["x"] = puntos[index].x;
        arreglo[cadena]["y"] = puntos[index].y;
      }

    }
    for (index1 in puntos2) {
      var rango = puntos2[index1].x;
      if (rango != null) {
        cadena++;
        arreglo[cadena] = {};
        arreglo[cadena]["x"] = puntos2[index1].x;
        arreglo[cadena]["z"] = puntos2[index1].y;
      }

    }

    //console.log(arreglo);
    arreglo.sort((a, b) => a.x - b.x);
    //console.log(arreglo); 

    var contador = "0";
    for (const n of arreglo) {
      contador++;
      var x = n.x;
      var y = n.y;
      var z = n.z;

      //data.addRow([x, y, z, 0]);
      data.addRow([x, y, z]);
      if (cadena == contador) {
        break;
      }
    }

    //data.addRow([200, 0, 0, 0]);
    data.addRow([200, 0, 0]);

    var classicOptions = {
      title: 'Timpanograma',
      curveType: 'linear',
      width: 900,
      height: 500,
      // Gives each series an axis that matches the vAxes number below.
      series: {
        0: {
          color: '#FF0000'
        },
        1: {
          targetAxisIndex: 0,
          color: '#0082fd'
        },
        2: {
          targetAxisIndex: 1,
          lineWidth: 0
        }
      },
      vAxes: {
        // Adds titles to each axis.
        /*
        0: {
          title: 'ml',
          ticks: [0, 0.1, 0.2, 0.3, 0.4, 0.5],
          viewWindow: {
            min: 0,
            max: 0.5
          }
        },
        1: {
          title: 'ml',
          ticks: [0, 0.5, 1, 1.5],
          viewWindow: {
            min: 0,
            max: 1.5
          }
        }*/
        0: {
          title: 'ml',
          ticks: [0, 0.5, 1, 1.5],
          viewWindow: {
            min: 0,
            max: 1.5
          }
        }
        },
        hAxis: {
          scaleType: 'linear',
          ticks: [-200, 0, 200]
        },
        interpolateNulls: true,

      };
      /*
        var options = {
               curveType: 'function',
               hAxis: {
                  title: 'daPa',
                  scaleType: 'linear',
                  ticks: [-400,-200,0,200],
                  viewWindow: {min: -600,max:400},
               },
               vAxis: {
                 title: 'ml',
                 viewWindowMode: "explicit",
                 ticks: ["0.0","0.1","0.2","0.3","0.4","0.5"],
                 viewWindow: {min: 0,max:0.5}, 
                 baseline:{
                    color: '#F6F6F6'
                  }
               },
              crosshair: {
                    color: '#000',
                    trigger: 'selection'
                 },
            series: {
              0: { color: '#FF0000' },
              1: { color: '#0082fd' },
            },
            interpolateNulls: true,
             };
      */
      var container = document.getElementById('curve_chart2');
      var chart = new google.visualization.LineChart(container);

      chart.draw(data, classicOptions);
    }
</script>
<?php
endif;
//////////////////////////////////////////////////////? Timpanograma [FIN]/////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////? Timpanograma [FIN]/////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////? Timpanograma [FIN]/////////////////////////////////////////////////////////////////
?>

















<?php


//////////////////////////////////////////////////////? AltaFrecuencia /////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////? AltaFrecuencia /////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////? AltaFrecuencia /////////////////////////////////////////////////////////////////
if($Tipo=="AltaFrecuencia"):


$queryList=mysqli_query($conn3,"SELECT * FROM  $Tabla where id = $historiaClinica");
$nrowl=mysqli_num_rows($queryList);
while($rowMotorizado=mysqli_fetch_array($queryList))
{
  $grafica_audiometria =$rowMotorizado['Grafica_AltaFrecuencia'];
  $grafica_audiometria_1 =$rowMotorizado['Grafica_AltaFrecuencia_1'];
}
?>






<style type="text/css">
	@media print{@page {size: landscape}}
</style>
<body>
	<div class="row">
	<div class="col-md-12" align="center"> <h3 class="titulo_grafica"> Gráfica de Alta Frecuencia: </h3> </div>
    <div id="curve_chart" class="col-md-12" align="center" style="width: 1100px; height: 600px"></div>
    <input  type="hidden" name="grafica" id="grafica" value='<?php echo $grafica_audiometria;?>'>
	</div>
</body>

<script type="text/javascript" src="plugins/LoaderK/loader.js"></script>
<script type="text/javascript">

  /////////////////////////////////////////////////
  google.charts.load('current', {'packages':['corechart','line']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() 
  {
    var data = new google.visualization.DataTable();
    data.addColumn('number', 'Frecuency Heartz');
    data.addColumn('number', 'Oído Derecho Aérea');
    data.addColumn('number', 'Oído Derecho Óseo');
    data.addColumn('number', 'Oído Izquierdo Aérea');
    data.addColumn('number', 'Oído Izquierdo Óseo');

    var puntos = JSON.parse(document.getElementById("grafica").value);
    for(index in puntos) 
    {
      var derecho_icono_aerea = puntos[index].derecho_aerea_icono;
      var derecho_icono_oseo = puntos[index].derecho_osea_icono;
      var izquierdo_icono_aerea = puntos[index].izquierdo_aerea_icono;
      var izquierdo_icono_oseo = puntos[index].izquierdo_osea_icono;
      
      data.addRow([parseInt(puntos[index].rango),parseInt(puntos[index].derecho_aerea),parseInt(puntos[index].derecho_osea),parseInt(puntos[index].izquierdo_aerea),parseInt(puntos[index].izquierdo_osea)]);
    }

    var options = {
           hAxis: {
              title: 'Frecuency Hertz',
              scaleType: 'log',
              ticks: [8000,9000,10000,11200,12500,14000,16000,18000,20000],
              /*format: 'short'*/
           },
           vAxis: {
             title: 'Hearing level dB',
             viewWindowMode: "explicit",
              direction: -1,
              ticks: [-20,-10,0,10,20,30,40,50,60,70,80,90,100,110,120],
              viewWindow: {min: -20,max:120}, 
              baseline:{
                color: '#F6F6F6'
              }
           },
          crosshair: {
                color: '#000',
                trigger: 'selection'
             },
        series: {
          0: { color: '#FF0000' },
          1: { lineWidth: 0 },
          2: { color: '#0082fd' },
          3: { lineWidth: 0 },
        },
        interpolateNulls: true,
    };

    var container = document.getElementById('curve_chart');
    var chart = new google.visualization.LineChart(container);
    var direccion = "IconosGraficas/";

    google.visualization.events.addListener(chart, 'ready', function () {
      var layout = chart.getChartLayoutInterface();
      for (var i = 0; i < data.getNumberOfRows(); i++)
      {  
        iconos_arreglo=["derecho_aerea_icono","derecho_osea_icono","izquierdo_aerea_icono","izquierdo_osea_icono"];
        for(index in iconos_arreglo) 
        {
          var xPos = layout.getXLocation(data.getValue(i, 0));
          var yPos = layout.getYLocation(data.getValue(i, parseInt(index)+1));
          var url = puntos[data.getValue(i, 0)][iconos_arreglo[index]];

          if(url!=null && yPos !=null)
          {
            var whiteHat = {};
            whiteHat[index] = {};
            whiteHat[index] = container.appendChild(document.createElement('img'));
            whiteHat[index].src = direccion+url;
            whiteHat[index].className = 'whiteHat';
            // 16x16 (image size in this example)
            whiteHat[index].style.top = (yPos+30) + 'px';
            whiteHat[index].style.left = (xPos-10) + 'px';
          }

        }
      }
    });
        
    chart.draw(data, options);

  }
</script>
<style type="text/css">.whiteHat {
  border: none;
  position: absolute;
}
</style>





<?php
endif;
//////////////////////////////////////////////////////? AltaFrecuencia [FIN]/////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////? AltaFrecuencia [FIN]/////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////? AltaFrecuencia [FIN]/////////////////////////////////////////////////////////////////
?>



































<?php


//////////////////////////////////////////////////////? AltaFrecuencia 1 /////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////? AltaFrecuencia 1 /////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////? AltaFrecuencia 1 /////////////////////////////////////////////////////////////////
if($Tipo=="AltaFrecuencia_1"):


$queryList=mysqli_query($conn3,"SELECT * FROM  $Tabla where id = $historiaClinica");
$nrowl=mysqli_num_rows($queryList);
while($rowMotorizado=mysqli_fetch_array($queryList))
{
  $grafica_audiometria =$rowMotorizado['Grafica_AltaFrecuencia'];
  $grafica_audiometria_1 =$rowMotorizado['Grafica_AltaFrecuencia_1'];
}
?>
<style type="text/css">
	@media print{@page {size: landscape}}
</style>
<body style="margin-left: -65px;">
	<div class="row">
	<div class="col-md-12" align="center"> <h3 class="titulo_grafica"> Gráfica de Multifrecuencia: </h3> </div>
    <div id="curve_chart" class="col-md-12" align="center" style="width: 1700px; height: 600px"></div>
    <input  type="hidden" name="grafica" id="grafica" value='<?php echo $grafica_audiometria_1;?>'>
	</div>
</body>

<script type="text/javascript" src="plugins/LoaderK/loader.js"></script>
<script type="text/javascript">

  /////////////////////////////////////////////////
  google.charts.load('current', {'packages':['corechart','line']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() 
  {
    var data = new google.visualization.DataTable();
    data.addColumn('number', 'Frecuency Heartz');
    data.addColumn('number', 'Oído Derecho Aérea');
    data.addColumn('number', 'Oído Derecho Óseo');
    data.addColumn('number', 'Oído Izquierdo Aérea');
    data.addColumn('number', 'Oído Izquierdo Óseo');

    var puntos = JSON.parse(document.getElementById("grafica").value);
    for(index in puntos) 
    {
      var derecho_icono_aerea = puntos[index].derecho_aerea_icono;
      var derecho_icono_oseo = puntos[index].derecho_osea_icono;
      var izquierdo_icono_aerea = puntos[index].izquierdo_aerea_icono;
      var izquierdo_icono_oseo = puntos[index].izquierdo_osea_icono;
      
      data.addRow([parseInt(puntos[index].rango),parseInt(puntos[index].derecho_aerea),parseInt(puntos[index].derecho_osea),parseInt(puntos[index].izquierdo_aerea),parseInt(puntos[index].izquierdo_osea)]);
    }

    var options = {
           hAxis: {
              title: 'Frecuency Hertz',
              scaleType: 'log',
              //ticks: [125,250,500,750,1000,1500,2000,3000,4000,6000,8000,9000,10000,11200,12500,14000,16000,18000,20000],
              ticks: [206, 224, 282, 315, 355, 400, 447, 560, 630, 710, 800, 890, 1120, 1250, 1410, 1600, 1780, 2240, 2500, 2820, 3000, 3150, 3550, 4470, 5000, 5600, 6300, 7100],
              format: 'short',
              legend:'none'
           },
           
           vAxis: {
             title: 'Hearing level dB',
             viewWindowMode: "explicit",
              direction: -1,
              ticks: [-20,-10,0,10,20,30,40,50,60,70,80,90,100,110,120],
              viewWindow: {min: -20,max:120}, 
              baseline:{
                color: '#F6F6F6'
              }
           },
          crosshair: {
                color: '#000',
                trigger: 'selection'
             },
        series: {
          0: { color: '#FF0000' },
          1: { pointShape: 'circle',color: '#FF0000' },
          2: { color: '#0082fd' },
          3: { pointShape: 'circle',color: '#0082fd' },
        },
        legend: {position: 'top'},
        interpolateNulls: true,

    };

    var container = document.getElementById('curve_chart');
    var chart = new google.visualization.LineChart(container);
    var direccion = "IconosGraficas/";

    google.visualization.events.addListener(chart, 'ready', function () {
      var layout = chart.getChartLayoutInterface();
      for (var i = 0; i < data.getNumberOfRows(); i++)
      {  
        iconos_arreglo=["derecho_aerea_icono","derecho_osea_icono","izquierdo_aerea_icono","izquierdo_osea_icono"];
        for(index in iconos_arreglo) 
        {
          var xPos = layout.getXLocation(data.getValue(i, 0));
          var yPos = layout.getYLocation(data.getValue(i, parseInt(index)+1));
          var url = puntos[data.getValue(i, 0)][iconos_arreglo[index]];

          if(url!=null && yPos !=null)
          {
            var whiteHat = {};
            whiteHat[index] = {};
            whiteHat[index] = container.appendChild(document.createElement('img'));
            whiteHat[index].src = direccion+url;
            whiteHat[index].className = 'whiteHat';
            // 16x16 (image size in this example)
            whiteHat[index].style.top = (yPos+30) + 'px';
            whiteHat[index].style.left = (xPos-82) + 'px';
          }

        }
      }
    });
        
    chart.draw(data, options);

  }
</script>
<style type="text/css">.whiteHat {
  border: none;
  position: absolute;
}
</style>


<?php
endif;
//////////////////////////////////////////////////////? AltaFrecuencia 1 [FIN]/////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////? AltaFrecuencia 1 [FIN]/////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////? AltaFrecuencia 1 [FIN]/////////////////////////////////////////////////////////////////
?>






















<?php


//////////////////////////////////////////////////////? Ganancia /////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////? Ganancia  /////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////? Ganancia  /////////////////////////////////////////////////////////////////
if($Tipo=="Ganancia"):


$queryList = mysqli_query($conn3, "SELECT * FROM  $Tabla where id = $historiaClinica");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $GraficaGanancia = $rowMotorizado['GraficaGanancia'];
}

$NombreGrafica = "GananciaFuncional";
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
            <h3 class="titulo_grafica"> Gráfica de Ganancia: </h3>
        </div>
        <div class="col-md-12" align="">
         <div id="curve_chart" class="col-md-12" align="center" style="width: 1100px; height: 600px"></div>
        </div>
        <input type="hidden" name="grafica" id="grafica" value='<?php echo $GraficaGanancia; ?>'>
    </div>
</body>

<script type="text/javascript" src="plugins/LoaderK/loader.js"></script>
<script type="text/javascript">
    /////////////////////////////////////////////////
    google.charts.load('current', {
        'packages': ['corechart', 'line']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        // <!-- Campos Editables-->
        vias_escrito<?php echo $NombreGrafica ?> = ["Oído Derecho", "Oído Izquierdo"];
        // <!-- Campos Editables-->
        vias_value<?php echo $NombreGrafica ?> = ["derecho", "izquierdo"]; //

        intervalos<?php echo $NombreGrafica ?> = [125, 250, 500, 750, 1000, 1500, 2000, 300, 4000, 6000, 8000];

        var data = new google.visualization.DataTable();
        data.addColumn('number', 'Frecuency Heartz');
        vias_escrito<?php echo $NombreGrafica ?>.forEach((elem, index1) => {
            data.addColumn('number', elem);
        });

        var puntos = JSON.parse(document.getElementById("grafica").value);
        for (index in puntos) {

            var datos_arreglo = new Array();
            datos_arreglo.push(parseInt(puntos[index].rango));
            vias_value<?php echo $NombreGrafica ?>.forEach((elem, index1) => {
                datos_arreglo.push(parseInt(puntos[index][elem]));
            });

            data.addRow(datos_arreglo);
        }

        var options = {
            hAxis: {
                title: 'Frecuency Hertz',
                scaleType: 'log',
                ticks: intervalos<?php echo $NombreGrafica ?>
            },
            vAxis: {
                title: 'Hearing level dB',
                viewWindowMode: "explicit",
                direction: -1,
                ticks: [-20, -10, 0, 10, 20, 30, 40, 50, 60, 70, 80, 90, 100, 110, 120],
                viewWindow: {
                    min: -20,
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
            series: {
                0: {
                    color: '#FF0000'
                },
                1: {
                    color: '#0082fd'
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
                var iconos_arreglo = [];
                vias_value<?php echo $NombreGrafica ?>.forEach((elem, index1) => {
                    iconos_arreglo.push(elem + "_icono");
                });
                for (index in iconos_arreglo) {
                    var xPos = layout.getXLocation(data.getValue(i, 0));
                    var yPos = layout.getYLocation(data.getValue(i, parseInt(index) + 1));
                    var url = puntos[data.getValue(i, 0)][iconos_arreglo[index]];

                    if (url != null && yPos != null) {
                        var whiteHat = {};
                        whiteHat[index] = {};
                        whiteHat[index] = container.appendChild(document.createElement('img'));
                        whiteHat[index].src = direccion + url;
                        whiteHat[index].className = 'whiteHat';
                        // 16x16 (image size in this example)
                        whiteHat[index].style.top = (yPos + 30) + 'px';
                        whiteHat[index].style.left = (xPos - 10) + 'px';
                    }

                }
            }
        });

        chart.draw(data, options);

    }
</script>
<style type="text/css">.whiteHat {
  border: none;
  position: absolute;
}
</style>

<?php
endif;
//////////////////////////////////////////////////////? Ganancia [FIN]/////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////? Ganancia [FIN]/////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////? Ganancia [FIN]/////////////////////////////////////////////////////////////////
?>


<?php
 if($_GET['Popup']!="Si"):
?>
<script type="text/javascript">
  setTimeout(printHTML, 3000);

  function printHTML() {
    if (window.print) {
      window.print();
    }
  }
</script>
<?php
endif;

?>

<?php
 if($_GET['Popup']=="Si"):
?>
<style>
  .titulo_grafica{
    color:white !important;
  }
</style>
<script>
    const elementosTituloGrafica = document.querySelectorAll(".titulo_grafica");

// Recorrer todos los elementos y modificar su contenido HTML
elementosTituloGrafica.forEach(elemento => {
  elemento.innerHTML = "&nbsp;";
});
</script>
<?php
endif;
?>