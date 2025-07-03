<?php
date_default_timezone_set('America/Bogota');
 
 
include("funciones/funciones.php");
include("funciones/funcionesUtilidades.php");
             
             $historiaClinica = decrypt($_GET['historiaClinica']) ;
            $idHistoria = decrypt($_GET['idHistoria']) ;

            $queryListhc=mysqli_query($conn3,"SELECT * from configTablas where id = $idHistoria ");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $Tabla=$rowhc['name'];
                $nombre =$rowhc['nombre'];
              }   

            $queryList=mysqli_query($conn3,"SELECT * FROM  $Tabla where id = $historiaClinica");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {

              $grafica_audiometria1      =$rowMotorizado['grafica_logometria'];
            }
            
            $grafica_audiometria = json_decode($grafica_audiometria1, true);


   ?>
<style type="text/css">
	@media print{@page {size: landscape}}
</style>
<body>
	<div class="row">
	<div class="col-md-12" align="center"> <h3> Logoaudiometría </h3> </div>
    <div id="curve_chart" class="col-md-12" align="center" style="width: 1100px; height: 600px"></div>
    <input  type="hidden" name="grafica" id="grafica" value='<?php echo $grafica_audiometria1;?>'>
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
      google.charts.load('current', {'packages':['corechart','line']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('number', 'Frecuency Heartz');
        data.addColumn('number', 'Oido Derecho Aerea');
        data.addColumn('number', 'Oido Izquiero Aerea');


        var puntos = JSON.parse(document.getElementById("grafica").value);
        for(index in puntos) 
        {
          var rango =puntos[index].rango;

          var derecho_aerea = puntos[index].derecho_aerea;
          var izquierdo_aerea = puntos[index].izquierdo_aerea;
          
          var derecho_icono_aerea = puntos[index].derecho_icono_aerea;
          var izquierdo_icono_aerea = puntos[index].izquierdo_icono_aerea;
          
          data.addRow([rango,derecho_aerea,izquierdo_aerea]);
        }

        var options = {
               hAxis: {
                  //title: 'Frecuency Hertz',
                  scaleType: 'linear',
                  ticks: [0,5,10,15,20,25,30,35,40,45,50,55,60,65,70,75,80,85,90,95,100]
               },
               vAxis: {
                 //title: 'Hearing level dB',
                 viewWindowMode: "explicit",
                  //direction: -1,


                  ticks: [0,10,20,30,40,50,60,70,80,90,100],
                  viewWindow: {min: 0,max:100}, 
                  baseline:{
                    color: '#F6F6F6'
                  }
               },
              crosshair: {
                    color: '#000',
                    trigger: 'selection'
                 },
                 legend: { position: 'none' },
            series: {
              0: { color: '#FF0000' },
              1: { color: '#0082fd' },
            },
            interpolateNulls: true,
             };

        var container = document.getElementById('curve_chart');
        var chart = new google.visualization.LineChart(container);

        var direccion = "IconosGraficas/";

        google.visualization.events.addListener(chart, 'ready', function () {
          var layout = chart.getChartLayoutInterface();
          for (var i = 0; i < data.getNumberOfRows(); i++) {
            
            
              var xPos = layout.getXLocation(data.getValue(i, 0));
              var yPos = layout.getYLocation(data.getValue(i, 1));

              
              var url = puntos[data.getValue(i, 0)]['derecho_icono_aerea'];

              if(url!=null && yPos !=null)
              {
                
                var whiteHat = container.appendChild(document.createElement('img'));
                whiteHat.src = direccion+url;
                whiteHat.className = 'whiteHat';

                // 16x16 (image size in this example)
                whiteHat.style.top = (yPos+30) + 'px';
                whiteHat.style.left = (xPos-10) + 'px';
              }
              

              ///////////////////////////////////////////////////////////

              var xPos = layout.getXLocation(data.getValue(i, 0));
              var yPos = layout.getYLocation(data.getValue(i, 2));

              
              var url2 = puntos[data.getValue(i, 0)]['izquierdo_icono_aerea'];

              if(url2!=null && yPos !=null)
              {
                
                var whiteHat2 = container.appendChild(document.createElement('img'));
                whiteHat2.src = direccion+url2;
                whiteHat2.className = 'whiteHat';

                // 16x16 (image size in this example)
                whiteHat2.style.top = (yPos+30) + 'px';
                whiteHat2.style.left = (xPos-10) + 'px';
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