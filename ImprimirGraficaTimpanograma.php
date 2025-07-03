<?php
date_default_timezone_set('America/Bogota');
 
 
include("funciones/funciones.php");
include("funciones/funcionesUtilidades.php");
             
            $historiaClinica = $_GET['historiaClinica'];
            $idHistoria = $_GET['idHistoria'];

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

              $grafica_timpanograma_oi      =$rowMotorizado['grafica_timpanograma_oi'];
              $grafica_timpanograma_od      =$rowMotorizado['grafica_timpanograma_od'];

            }
            


   ?>
<style type="text/css">
	@media print{@page {size: landscape}}
  @page{
   margin: 0;
}
</style>
<body>
	<div class="row">
	<div class="col-md-12" align="center"> <h3> Timpanogramas: </h3></div>
  <div class="col-md-12">
  <div id="curve_chart3" style="height: 400px;width: 550px;float: right;"></div>
  <div id="curve_chart2" style="height: 400px;width: 550px;"></div>
  </div>
    <input  type="hidden" id="grafica_timpanograma_arreglo_1" value='<?php echo $grafica_timpanograma_od;?>'>
    <input  type="hidden" id="grafica_timpanograma_arreglo_2" value='<?php echo $grafica_timpanograma_oi;?>'>
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
              google.charts.setOnLoadCallback(drawChart2);

              function drawChart2() {
                var data = new google.visualization.DataTable();
                data.addColumn('number', 'daPa');
                data.addColumn('number', 'Oido Derecho');     

                data.addRow([-400,0]);

                var puntos = JSON.parse(document.getElementById("grafica_timpanograma_arreglo_1").value);
                //console.log(puntos);
               
                var cadena="0";
                var arreglo = new Array();
                for(index in puntos) 
                {
                  var rango = puntos[index].x;
                  if(rango != null)
                  {
                    cadena++;
                    arreglo[cadena] = {};
                    arreglo[cadena]["x"]=puntos[index].x;
                    arreglo[cadena]["y"]=puntos[index].y;
                  }

                }
                
                //console.log(arreglo);
                arreglo.sort((a, b) => a.x - b.x);
                //console.log(arreglo); 

                var contador="0";
                for(const n of arreglo) {
                  contador++;
                  var x = n.x;
                  var y = n.y;
          
                  data.addRow([x,y]);
                  if(cadena == contador)
                  {
                    break;
                  }  
                }

                data.addRow([200,0]);
                

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
                         ticks: ["0","0.5","1","1.5","2","2.5","3"],
                         viewWindow: {min: 0,max:3}, 
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
                    legend:'none',
                    interpolateNulls: true,
                     };

                var container = document.getElementById('curve_chart2');
                var chart = new google.visualization.LineChart(container);

                chart.draw(data, options);
              }

              /////////////////////////////////////////////////
              google.charts.load('current', {'packages':['corechart','line']});
              google.charts.setOnLoadCallback(drawChart3);

              function drawChart3() {
                var data = new google.visualization.DataTable();
                data.addColumn('number', 'daPa');
                data.addColumn('number', 'Oido Izquierdo');

                data.addRow([-400,0]);

                var puntos = JSON.parse(document.getElementById("grafica_timpanograma_arreglo_2").value);
                //console.log(puntos);
               
                var cadena="0";
                var arreglo = new Array();
                for(index in puntos) 
                {
                  var rango = puntos[index].x;
                  if(rango != null)
                  {
                    cadena++;
                    arreglo[cadena] = {};
                    arreglo[cadena]["x"]=puntos[index].x;
                    arreglo[cadena]["y"]=puntos[index].y;
                  }

                }
                
                //console.log(arreglo);
                arreglo.sort((a, b) => a.x - b.x);
                //console.log(arreglo); 

                var contador="0";
                for(const n of arreglo) {
                  contador++;
                  var x = n.x;
                  var y = n.y;
          
                  data.addRow([x,y]);
                  if(cadena == contador)
                  {
                    break;
                  }  
                }

                data.addRow([200,0])


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
                         ticks: ["0","0.5","1","1.5","2","2.5","3"],
                         viewWindow: {min: 0,max:3}, 
                         baseline:{
                            color: '#F6F6F6'
                          }
                       },
                      crosshair: {
                            color: '#000',
                            trigger: 'selection'
                         },
                    series: {
                      //0: { color: '#FF0000' },
                      0: { color: '#0082fd' },
                    },
                    legend:'none',
                    interpolateNulls: true,
                     };

                var container = document.getElementById('curve_chart3');
                var chart = new google.visualization.LineChart(container);

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