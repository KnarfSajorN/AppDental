<style>
  .dd-selected{
    height: 36px!important;
  }

</style>
<?php
//$javascriptocultar = "1"; //ocultar el jquery del footer por que da error con el jquery que uno llegue a agregar para estos modulos de graficas
//////////////////////////////? IMPORTANTEEEEEEEEEEE  no quitar //////////////////////////////
$Campo_Javascript_Historia_Audiologia=true;
//////////////////////////////? IMPORTANTEEEEEEEEEEE  no quitar //////////////////////////////

foreach ($Modulos_Dinamicos as $key => $Modulo) {


  /*
  if ($Modulo == "Audiometria Tonal") {
    //se necesita la tabla iconos_grafica


    $queryList = mysqli_query($conn3, "SELECT * FROM  iconos_grafica ");
    $nrowl = mysqli_num_rows($queryList);
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
      $id = $rowMotorizado['id'];
      $nombre = $rowMotorizado['nombre'];
      $ruta = $rowMotorizado['ruta'];
      $tipo = $rowMotorizado['tipo'];
      $clase = $rowMotorizado['clase'];

      if ($tipo == "1" and $clase == "1") {
        if ($id == "16") {
          $select_izquierdo_aerea .= '<option value="' . $ruta . '" data-imagesrc="https://medicalsoftplus.com/baseDev/IconosGraficas/' . $ruta . '"; selected> ' . $nombre . ' </option>';
        } else {
          $select_izquierdo_aerea .= '<option value="' . $ruta . '" data-imagesrc="https://medicalsoftplus.com/baseDev/IconosGraficas/' . $ruta . '"; > ' . $nombre . ' </option>';
        }
      }
      if ($tipo == "1" and $clase == "2") {
        if ($id == "10") {
          $select_izquierdo_oseo .= '<option value="' . $ruta . '" data-imagesrc="https://medicalsoftplus.com/baseDev/IconosGraficas/' . $ruta . '"; selected> ' . $nombre . ' </option>';
        } else {
          $select_izquierdo_oseo .= '<option value="' . $ruta . '" data-imagesrc="https://medicalsoftplus.com/baseDev/IconosGraficas/' . $ruta . '";> ' . $nombre . ' </option>';
        }
      }
      if ($tipo == "2" and $clase == "1") {
        if ($id == "8") {
          $select_derecho_aerea .= '<option value="' . $ruta . '" data-imagesrc="https://medicalsoftplus.com/baseDev/IconosGraficas/' . $ruta . '"; selected> ' . $nombre . ' </option>';
        } else {
          $select_derecho_aerea .= '<option value="' . $ruta . '" data-imagesrc="https://medicalsoftplus.com/baseDev/IconosGraficas/' . $ruta . '";> ' . $nombre . ' </option>';
        }
      }
      if ($tipo == "2" and $clase == "2") {
        if ($id == "4") {
          $select_derecho_oseo .= '<option value="' . $ruta . '" data-imagesrc="https://medicalsoftplus.com/baseDev/IconosGraficas/' . $ruta . '"; selected> ' . $nombre . ' </option>';
        } else {
          $select_derecho_oseo .= '<option value="' . $ruta . '" data-imagesrc="https://medicalsoftplus.com/baseDev/IconosGraficas/' . $ruta . '";> ' . $nombre . ' </option>';
        }
      }
    }
?>

    <!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>-->
    <script src="plugins/jQuery/jquery-2.2.3.min.js"></script> <!-- no se repita el javascript y genere error en el footer se condiciono este script-->
    <!--<script type="text/javascript" src="https://cdn.rawgit.com/prashantchaudhary/ddslick/master/jquery.ddslick.min.js" ></script>-->
    <script type="text/javascript" src="plugins/DdslickK/jquery.ddslick.min.js"></script>

    <input type="hidden" name="editar_ronda" id="editar_ronda" value="9999">

    <script>
      function select_imagen() {
        $("#slick_aerea").ddslick({
          width: "100%",
          imagePosition: "left",
          selectText: "Seleccione Simbolo",
          onSelected: function(data) {
            //es el input que va a tener el valor del select de los iconos
            $("#icono_grafica_aerea").val(data.selectedData.value);
          }
        })

        $("#slick_oseo").ddslick({
          width: "100%",
          imagePosition: "left",
          selectText: "Seleccione Simbolo",
          onSelected: function(data) {
            //es el input que va a tener el valor del select de los iconos
            $("#icono_grafica_oseo").val(data.selectedData.value);
          }
        })
      }
    </script>

    <script type="text/javascript">
      function CrearInput(value) {
        var ronda_editar = document.getElementById("editar_ronda").value;
        if (ronda_editar == "9999") {
          var ronda = document.getElementById("ronda_grafica").value;
        } else {
          var ronda = ronda_editar;
        }

        var rangos = [125, 250, 500, 750, 1000, 1500, 2000, 3000, 4000, 6000, 8000];
        if (value == "0") {
          var rango = rangos[0];
        }
        if (value == "125") {
          var rango = rangos[1];
        }
        if (value == "250") {
          var rango = rangos[2];
        }
        if (value == "500") {
          var rango = rangos[3];
        }
        if (value == "750") {
          var rango = rangos[4];
        }
        if (value == "1000") {
          var rango = rangos[5];
        }
        if (value == "1500") {
          var rango = rangos[6];
        }
        if (value == "2000") {
          var rango = rangos[7];
        }
        if (value == "3000") {
          var rango = rangos[8];
        }
        if (value == "4000") {
          var rango = rangos[9];
        }
        if (value == "6000") {
          var rango = rangos[10];
        }
        if (value == "8000") {
          var rango = rangos[0];
        }
        if (ronda == "5") {
          var rango = 'final';
        }

        if (rango != "final") {
          if (ronda == "0") {
            var texto = '<div class="col-md-8"><label> Oído Derecho -' + rango + '- Vía Aerea </label> <input type="number" name="derecho_aerea_' + rango + '" id="derecho_aerea_' + rango + '" class="form-control input-lg" placeholder=" Vía Aérea"></div>';

            texto += '<div class="col-md-4"> <label> Icónos </label> <select id="slick_aerea" style="width: 120px;" class="form-control input-lg">';
            texto += '<?php echo $select_derecho_aerea; ?> </select><br></div>';

            texto += ' <button class="btn btn-block btn-primary btn-sm" type="button" onclick="Enviar_grafica(' + rango + ')"> <i class="fa fa-plus"></i> Agregar Información Oído Derecho - Vía Aérea </button><br>';
          } else if (ronda == "1") {
            var texto = '<div class="col-md-8"> <label> Oído Derecho -' + rango + '- Vía Oseo </label> <input type="number" name="derecho_oseo_' + rango + '" id="derecho_oseo_' + rango + '" class="form-control input-lg" placeholder="Vía Oseo"> </div>';

            texto += '<div class="col-md-4"> <label> Icónos </label> <select id="slick_oseo" style="width: 120px;" class="form-control input-lg">';
            texto += '<?php echo $select_derecho_oseo; ?> </select><br></div>';

            texto += ' <button class="btn btn-block btn-primary btn-sm" type="button" onclick="Enviar_grafica(' + rango + ')"> <i class="fa fa-plus"></i> Agregar Información Oído Derecho - Vía Oseo </button><br>';
          } else if (ronda == "2") {
            var texto = '<div class="col-md-8"><label> Oído Izquierdo -' + rango + '- Vía Aérea </label> <input type="number" name="izquierdo_aerea_' + rango + '" id="izquierdo_aerea_' + rango + '" class="form-control input-lg" placeholder=" Vía Aérea"></div>';

            texto += '<div class="col-md-4"> <label> Icónos </label> <select id="slick_aerea" style="width: 120px;" class="form-control input-lg">';
            texto += '<?php echo $select_izquierdo_aerea; ?> </select><br></div>';

            texto += ' <button class="btn btn-block btn-primary btn-sm" type="button" onclick="Enviar_grafica(' + rango + ')"> <i class="fa fa-plus"></i> Agregar Información Oído Izquierdo </button><br>';
          } else if (ronda == "3") {
            var texto = '<div class="col-md-8"> <label> Oído Izquierdo -' + rango + '- Via Oseo </label> <input type="number" name="izquierdo_oseo_' + rango + '" id="izquierdo_oseo_' + rango + '" class="form-control input-lg" placeholder="Vía Oseo"> </div>';

            texto += '<div class="col-md-4"> <label> Icónos </label> <select id="slick_oseo" style="width: 120px;" class="form-control input-lg">';
            texto += '<?php echo $select_izquierdo_oseo; ?> </select><br></div>';

            texto += ' <button class="btn btn-block btn-primary btn-sm" type="button" onclick="Enviar_grafica(' + rango + ')"> <i class="fa fa-plus"></i> Agregar Información Oído Izquierdo </button><br>';
          } else if (ronda == "4") {
            var texto = '<label> Se llenaron todos los campos </label>';
          }
        }

        // aqui enviamos el mensaje por medio de un arreglo     
        document.getElementById("inputs").innerHTML = texto;

        select_imagen();

      }


      function Enviar_grafica(valor) {
        var rango = parseInt(valor);
        //var ronda = parseInt(document.getElementById("ronda_grafica").value);
        var ronda_editar = parseInt(document.getElementById("editar_ronda").value);
        if (ronda_editar == "9999") {
          var ronda = parseInt(document.getElementById("ronda_grafica").value);
        } else {
          var ronda = ronda_editar;
        }

        var arreglo = {};
        arreglo[rango] = {};

        var puntos = JSON.parse(document.getElementById("grafica").value);
        for (index in puntos) {
          var rango1 = puntos[index].rango;
          arreglo[rango1] = {};

          arreglo[rango1]["rango"] = puntos[index].rango;

          arreglo[rango1]["izquierdo_aerea"] = puntos[index].izquierdo_aerea;
          arreglo[rango1]["izquierdo_oseo"] = puntos[index].izquierdo_oseo;
          arreglo[rango1]["izquierdo_icono_aerea"] = puntos[index].izquierdo_icono_aerea;
          arreglo[rango1]["izquierdo_icono_oseo"] = puntos[index].izquierdo_icono_oseo;

          arreglo[rango1]["derecho_aerea"] = puntos[index].derecho_aerea;
          arreglo[rango1]["derecho_oseo"] = puntos[index].derecho_oseo;
          arreglo[rango1]["derecho_icono_aerea"] = puntos[index].derecho_icono_aerea;
          arreglo[rango1]["derecho_icono_oseo"] = puntos[index].derecho_icono_oseo;


          arreglo[rango]["rango"] = rango;
          if (ronda == "0") {
            var derecho_icono_aerea = document.getElementById("icono_grafica_aerea").value;
            var derecho_aerea = parseInt(document.getElementById("derecho_aerea_" + valor).value);

            arreglo[rango]["derecho_aerea"] = derecho_aerea;
            arreglo[rango]["derecho_icono_aerea"] = derecho_icono_aerea;

          } else if (ronda == "1") {

            var derecho_icono_oseo = document.getElementById("icono_grafica_oseo").value;
            var derecho_oseo = parseInt(document.getElementById("derecho_oseo_" + valor).value);

            arreglo[rango]["derecho_oseo"] = derecho_oseo;
            arreglo[rango]["derecho_icono_oseo"] = derecho_icono_oseo;
          } else if (ronda == "2") {
            var izquierdo_icono_aerea = document.getElementById("icono_grafica_aerea").value;
            var izquierdo_aerea = parseInt(document.getElementById("izquierdo_aerea_" + valor).value);

            arreglo[rango]["izquierdo_aerea"] = izquierdo_aerea;
            arreglo[rango]["izquierdo_icono_aerea"] = izquierdo_icono_aerea;
          } else if (ronda == "3") {

            var izquierdo_icono_oseo = document.getElementById("icono_grafica_oseo").value;
            var izquierdo_oseo = parseInt(document.getElementById("izquierdo_oseo_" + valor).value);

            arreglo[rango]["izquierdo_oseo"] = izquierdo_oseo;
            arreglo[rango]["izquierdo_icono_oseo"] = izquierdo_icono_oseo;
          }
        }
        document.getElementById("grafica").value = JSON.stringify(arreglo);


        if (rango == "8000") {
          console.log('entro');
          ronda = 1 + parseInt(ronda);
          document.getElementById("ronda_grafica").value = ronda;
          rango = "0";
        }

        document.getElementById("frecuencia_actual").value = rango;
        var ticks = parseInt(document.getElementById("ticks_grafica").value);
        ticks++;


        var antes_editar = document.getElementById("actual_campo_audiometria_antes_editar").value;
        if (antes_editar != "ninguno") {
          rango = antes_editar;
          document.getElementById("actual_campo_audiometria_antes_editar").value = "ninguno";
          document.getElementById("frecuencia_actual").value = rango;
          ticks--;
        }
        document.getElementById("ticks_grafica").value = ticks;
        drawChart();
        document.getElementById("editar_ronda").value = "9999";
        CrearInput(rango);
      }
    </script>

    <style type="text/css">
      .whiteHat {
        border: none;
        position: absolute;
      }

      .dd-selected {
        color: black;
        padding: 0px;
      }

      .dd-options {
        overflow: auto !important;
        height: 250px !important;
      }

      .dd-option-text {
        line-height: 36px !important;
      }

      .dd-selected-text {
        line-height: 36px !important;
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
        data.addColumn('number', 'Oído Derecho Aérea');
        data.addColumn('number', 'Oído Derecho Oseo');

        data.addColumn('number', 'Oído Izquiero Aerea');
        data.addColumn('number', 'Oído Izquierdo Oseo');

        var promedio_derecho = 0;
        var promedio_izquierdo = 0;
        var puntos = JSON.parse(document.getElementById("grafica").value);
        //console.log(puntos);
        for (index in puntos) {
          var rango = puntos[index].rango;

          var derecho_aerea = puntos[index].derecho_aerea;
          var derecho_oseo = puntos[index].derecho_oseo;
          var izquierdo_aerea = puntos[index].izquierdo_aerea;
          var izquierdo_oseo = puntos[index].izquierdo_oseo;

          if ((rango == "500" || rango == "1000" || rango == "2000") && derecho_aerea != null) {
            promedio_derecho = promedio_derecho + parseInt(derecho_aerea);
          }

          if ((rango == "500" || rango == "1000" || rango == "2000") && izquierdo_aerea != null) {
            promedio_izquierdo = promedio_izquierdo + parseInt(izquierdo_aerea);
          }

          var derecho_icono_aerea = puntos[index].derecho_icono_aerea;
          var derecho_icono_oseo = puntos[index].derecho_icono_oseo;
          var izquierdo_icono_aerea = puntos[index].izquierdo_icono_aerea;
          var izquierdo_icono_oseo = puntos[index].izquierdo_icono_oseo;


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


            var url = puntos[data.getValue(i, 0)]['derecho_icono_aerea'];

            if (url != null && yPos != null) {

              var whiteHat = container.appendChild(document.createElement('img'));
              whiteHat.src = direccion + url;
              whiteHat.className = 'whiteHat';

              // 16x16 (image size in this example)
              whiteHat.style.top = (yPos - 18) + 'px';
              whiteHat.style.left = (xPos) - 2 + 'px';
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
              whiteHat1.style.top = (yPos - 18) + 'px';
              whiteHat1.style.left = (xPos) - 2 + 'px';
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
              whiteHat2.style.top = (yPos - 18) + 'px';
              whiteHat2.style.left = (xPos) - 2 + 'px';
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
              whiteHat3.style.top = (yPos - 18) + 'px';
              whiteHat3.style.left = (xPos) - 2 + 'px';
            }
            ///////////////////////////////////////////////////////////



          }
        });
        document.getElementById("promedio_derecho_audible1").innerHTML = (promedio_derecho / 3).toFixed(1);
        document.getElementById("promedio_derecho_audible2").innerHTML = (promedio_izquierdo / 3).toFixed(1);
        console.log(promedio_derecho);
        console.log(promedio_izquierdo);
        chart.draw(data, options);



      }
    </script>
    <div class="form-group col-md-12" align="center">
      <hr>
    </div>
    <button type="button" data-toggle="modal" data-target="#modalForm" onclick="Select_EditarGrafica();" title="Editar Grafica"> Editar Grafica
      <i class="fa fa-pencil"></i>
    </button>
    <div id="curve_chart" class="col-md-12" style="width: 100%; height: 500px;zoom:0.7"></div>
    <div class="row">
      <label id="promedio_tonal1" style="width: 50%;text-align-last: end;">Promedio Tonos Audibles (PTA) Oído Derecho: <u id="promedio_derecho_audible1"> </u> dB</label>
      <label id="promedio_tonal2">Promedio Tonos Audibles (PTA) Oído Izquierdo: <u id="promedio_derecho_audible2"></u> dB</label>
      <div id="inputs" class="col-md-12"> </div>
      <input type="hidden" name="grafica" id="grafica" value='{"0":{"rango":0,"izquierdo_aerea":null,"izquierdo_osea":null,"izquierdo_icono_aerea":null,"izquierdo_icono_oseo":null,"derecho_aerea":null,"derecho_osea":null,"derecho_icono_aerea":null,"derecho_icono_oseo":null}}'>

      <input type="hidden" name="icono_grafica_oseo" id="icono_grafica_oseo">
      <input type="hidden" name="icono_grafica_aerea" id="icono_grafica_aerea">

      <input type="hidden" name="ronda_grafica" id="ronda_grafica" value="0">
      <input type="hidden" name="frecuencia_actual" id="frecuencia_actual" value="0">

      <input type="hidden" name="ticks_grafica" id="ticks_grafica" value="0">
    </div>
    <div class="form-group col-md-12" align="center">
      <hr>
    </div>

    <script type="text/javascript">
      CrearInput(0);
    </script>



    <!-- modal primera grafica-->

    <div class="modal fade" id="modalForm" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
              <span aria-hidden="true">×</span>
              <span class="sr-only">Cerrar</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Editar Grafica</h4>
          </div>

          <!-- Modal Body -->
          <div class="modal-body">
            <p class="statusMsg"></p>

            <div class="form-group">
              <label for="arreglo_editar">Elija Frecuency Hertz </label>
              <select name="EditarGrafica_Audiometria" id="EditarGrafica_Audiometria" class="form-control input-lg">

              </select>
              <input type="hidden" name="actual_campo_audiometria_antes_editar" id="actual_campo_audiometria_antes_editar" value="ninguno">

            </div>

            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <a href="#" onclick="EditarGrafica();" class="btn btn-default"> <i class="fa fa-glyphicon glyphicon-plus"></i> <strong> Actualizar </strong></a>


          </div>
        </div>
      </div>
    </div>

    <script type="text/javascript">
      function Select_EditarGrafica() {
        var ronda = document.getElementById("ronda_grafica").value;
        var rangos = [0, 125, 250, 500, 750, 1000, 1500, 2000, 3000, 4000, 6000, 8000];
        var etapas = ["Via Aerea - Oido Derecho", "Via Oseo - Oido Derecho", "Via Aerea - Oido Izquierdo", "Via Oseo - Oido Izquierdo"];

        var puntos = JSON.parse(document.getElementById("grafica").value);

        var ticks = document.getElementById("ticks_grafica").value;
        var text = "0";
        var contador = "1";

        for (i = 0; i < 4; i++) {

          for (index in puntos) {



            var value = puntos[index].rango;

            if (value == "125") {
              var rango_final = rangos[0];
            }
            if (value == "250") {
              var rango_final = rangos[1];
            }
            if (value == "500") {
              var rango_final = rangos[2];
            }
            if (value == "750") {
              var rango_final = rangos[3];
            }
            if (value == "1000") {
              var rango_final = rangos[4];
            }
            if (value == "1500") {
              var rango_final = rangos[5];
            }
            if (value == "2000") {
              var rango_final = rangos[6];
            }
            if (value == "3000") {
              var rango_final = rangos[7];
            }
            if (value == "4000") {
              var rango_final = rangos[8];
            }
            if (value == "6000") {
              var rango_final = rangos[9];
            }
            if (value == "8000") {
              var rango_final = rangos[10];
            }

            if (i == 0) {
              var repuesta = puntos[index].derecho_aerea;
              var estilo = "style='background-color:#ff222294;'"
            }
            if (i == 1) {
              var repuesta = puntos[index].derecho_oseo;
              var estilo = "style='background-color:#f344447d'"
            }
            if (i == 2) {
              var repuesta = puntos[index].izquierdo_aerea;
              var estilo = "style='background-color:#3b83bd'"
            }
            if (i == 3) {
              var repuesta = puntos[index].izquierdo_oseo;
              var estilo = "style='background-color:#67a1cf'"
            }

            if (value != "0") {
              text += "<option value='" + rango_final + "_" + i + "' " + estilo + "><b>" + value + " - " + etapas[i] + "</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Valor Digitado: " + repuesta + "</option>";
            } else {
              contador--;
            }
            if (ticks == contador) {
              break;
            }
            contador++;
          }
          if (ticks == contador) {
            break;
          }
        }


        document.getElementById('EditarGrafica_Audiometria').innerHTML = text;

      }

      function EditarGrafica() {
        var frecuencia_actual = document.getElementById("frecuencia_actual").value;
        document.getElementById('actual_campo_audiometria_antes_editar').value = frecuencia_actual;

        var frecuencia = document.getElementById("EditarGrafica_Audiometria").value;
        var respuesta = frecuencia.split("_");
        document.getElementById("editar_ronda").value = respuesta[1];
        //console.log(respuesta[0]);
        //console.log(respuesta[1]);
        CrearInput(respuesta[0]);
        $('#modalForm').modal('hide')

      }
    </script>









  <?php

  } //cierre de la audiometria tonal
  
  */
  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  if ($Modulo == "Audiometria Tonal Nueva") {
    //$NombreGrafica="AltaFrecuencia";
    //$NombreGrafica sirve para que si hay mas graficas como esta no tengan error y tenga sus variables independientes
  ?>

    <!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>-->
    <script src="plugins/jQuery/jquery-2.2.3.min.js"></script> <!-- no se repita el javascript y genere error en el footer se condiciono este script-->
    <!--<script type="text/javascript" src="https://cdn.rawgit.com/prashantchaudhary/ddslick/master/jquery.ddslick.min.js" ></script>-->
    <script type="text/javascript" src="plugins/DdslickK/jquery.ddslick.min.js"></script>

    <div class="row col-md-12">

      <div id="curve_chart<?php echo $NombreGrafica ?>" class="col-md-12" style="width: 100%; height: 550px;zoom:0.7;z-index: 1;"></div>

      <div class="col-md-12 row">
        <div class="col-md-12">
          <label id="promedio_tonal1" style="width: 50%;text-align-last: end;">Promedio Tonos Audibles (PTA) Oído Derecho: <u id="promedio_derecho_audible1"> </u> dB</label>
          <label id="promedio_tonal2">Promedio Tonos Audibles (PTA) Oído Izquierdo: <u id="promedio_derecho_audible2"></u> dB</label>
        </div>
        <!-- Campos Editables //-->
        <input type="hidden" name="grafica<?php echo $NombreGrafica ?>" id="grafica<?php echo $NombreGrafica ?>">
        <!--value='{"0":{"rango":0,"izquierdo":null,"izquierdo_icono":null,"derecho":null,"derecho_icono":null}}'
                          {"0":{"rango":0,"derecho":null,"derecho_icono":null,"izquierdo":null,"izquierdo_icono":null}}-->

        <div class="form-group col-md-3" align="center">
          <label>Vía</label>
          <select class="form-control input-lg" id="Via<?php echo $NombreGrafica ?>" onchange="Iconos<?php echo $NombreGrafica ?>()" style="width:100%">
            <script>
              // <!-- Campos Editables-->
              vias_escrito<?php echo $NombreGrafica ?> = ["Oído Derecho Aérea", "Oído Derecho Óseo", "Oído Izquierdo Aérea", "Oído Izquierdo Óseo"];
              // <!-- Campos Editables-->
              vias_value<?php echo $NombreGrafica ?> = ["derecho_aerea", "derecho_oseo", "izquierdo_aerea", "izquierdo_oseo"];

              var valorgrafica = '{"0":{"rango":0';
              vias_value<?php echo $NombreGrafica ?>.forEach((elem, index) => {
                valorgrafica += ',"' + elem + '":null,"' + elem + '_icono":null';
              });
              valorgrafica += '}}';
              document.getElementById("grafica<?php echo $NombreGrafica ?>").value = valorgrafica;


              for (index in vias_escrito<?php echo $NombreGrafica ?>) {
                $('#Via<?php echo $NombreGrafica ?>').append("<option value='" + vias_value<?php echo $NombreGrafica ?>[index] + "'>" + vias_escrito<?php echo $NombreGrafica ?>[index] + "</option>");
              }
            </script>
          </select>
        </div>

        <div class="form-group col-md-3" align="center">
          <label>Intervalos</label>
          <select class="form-control input-lg" id="Rango<?php echo $NombreGrafica ?>" style="width:100%">
            <script>
              //<!-- Campos Editables-->
              intervalos<?php echo $NombreGrafica ?> = [125, 250, 500, 750, 1000, 1500, 2000, 3000, 4000, 6000, 8000];
              for (index in intervalos<?php echo $NombreGrafica ?>) {
                $('#Rango<?php echo $NombreGrafica ?>').append("<option value='" + intervalos<?php echo $NombreGrafica ?>[index] + "'>" + intervalos<?php echo $NombreGrafica ?>[index] + "</option>");
              }
            </script>
          </select>
        </div>

        <div class="form-group col-md-2" align="center">
          <label>Valor</label>
          <input type="text" id="Valor<?php echo $NombreGrafica ?>" class="form-control input-lg" style="width:100%">
        </div>

        <?php
        //<!-- Campos Editables-->
        $select_izquierdo = "";
        $select_derecho = "";
        $queryList = mysqli_query($conn3, "SELECT * FROM  iconos_grafica ");
        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
          $id = $rowMotorizado['id'];
          $nombre = $rowMotorizado['nombre'];
          $ruta = $rowMotorizado['ruta'];
          $tipo = $rowMotorizado['tipo'];
          $clase = $rowMotorizado['clase'];

          //Campos Editables x2
          if ($tipo == "1" and $clase == "1") {
            if ($id == "16") {
              $select_izquierdo_aerea .= '<option value="' . $ruta . '" data-imagesrc="'.$Base.'IconosGraficas/' . $ruta . '"; selected> ' . $nombre . ' </option>';
            } else {
              $select_izquierdo_aerea .= '<option value="' . $ruta . '" data-imagesrc="'.$Base.'IconosGraficas/' . $ruta . '"; > ' . $nombre . ' </option>';
            }
          }
          if ($tipo == "1" and $clase == "2") {
            if ($id == "10") {
              $select_izquierdo_oseo .= '<option value="' . $ruta . '" data-imagesrc="'.$Base.'IconosGraficas/' . $ruta . '"; selected> ' . $nombre . ' </option>';
            } else {
              $select_izquierdo_oseo .= '<option value="' . $ruta . '" data-imagesrc="'.$Base.'IconosGraficas/' . $ruta . '";> ' . $nombre . ' </option>';
            }
          }
          if ($tipo == "2" and $clase == "1") {
            if ($id == "8") {
              $select_derecho_aerea .= '<option value="' . $ruta . '" data-imagesrc="'.$Base.'IconosGraficas/' . $ruta . '"; selected> ' . $nombre . ' </option>';
            } else {
              $select_derecho_aerea .= '<option value="' . $ruta . '" data-imagesrc="'.$Base.'IconosGraficas/' . $ruta . '";> ' . $nombre . ' </option>';
            }
          }
          if ($tipo == "2" and $clase == "2") {
            if ($id == "4") {
              $select_derecho_oseo .= '<option value="' . $ruta . '" data-imagesrc="'.$Base.'IconosGraficas/' . $ruta . '"; selected> ' . $nombre . ' </option>';
            } else {
              $select_derecho_oseo .= '<option value="' . $ruta . '" data-imagesrc="'.$Base.'IconosGraficas/' . $ruta . '";> ' . $nombre . ' </option>';
            }
          }
        }
        ?>

        <div class="form-group col-md-4" align="center">
          <label>Ícono</label>
          <select class="form-control input-lg" id="Icono<?php echo $NombreGrafica ?>" style="width:100%">
          </select>
          <script>
            function Iconos<?php echo $NombreGrafica ?>() {
              $estado = $('#Via<?php echo $NombreGrafica ?>').val();
              //<!-- Campos Editables //-->
              //tiene que tener el mismo orden que en la variable vias  en este ejemplo seria este los valores ["derecho_aerea", "derecho_oseo","izquierdo_area", "izquierdo_aerea"]
              //var arregloiconos = ['<?php echo $select_derecho ?>', '<?php echo $select_izquierdo ?>'];

              var arregloiconos = ['<?php echo $select_derecho_aerea ?>', '<?php echo $select_derecho_oseo ?>', '<?php echo $select_izquierdo_aerea ?>', '<?php echo $select_izquierdo_oseo ?>']
              vias_value<?php echo $NombreGrafica ?>.forEach((elem, index) => {

                if ($estado == elem) {
                  $('#Icono<?php echo $NombreGrafica ?>').ddslick('destroy');
                  //<!-- Campos Editables-->
                  $('#Icono<?php echo $NombreGrafica ?>').empty().append(arregloiconos[index]);
                }
              });

              /*
              if ($estado == "derecho") {
                $('#Icono<?php echo $NombreGrafica ?>').ddslick('destroy');
                //<!-- Campos Editables-->
                $('#Icono<?php echo $NombreGrafica ?>').empty().append('<?php echo $select_derecho ?>');
              }
              //<!-- Campos Editables //-->
              if ($estado == "izquierdo") {
                $('#Icono<?php echo $NombreGrafica ?>').ddslick('destroy');
                //<!-- Campos Editables-->
                $('#Icono<?php echo $NombreGrafica ?>').empty().append('<?php echo $select_izquierdo ?>');
              }
              */

              $("#Icono<?php echo $NombreGrafica ?>").ddslick({
                width: "100%",
                imagePosition: "left",
              })
            }
          </script>
          <input type="hidden" id="icono_grafica<?php echo $NombreGrafica ?>">
        </div>

        <div class="form-group col-md-12" align="center">
          <button class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" type="button" onclick="AgregarPunto<?php echo $NombreGrafica ?>()"> <i class="fa fa-plus"></i> Agregar </button><br>
        </div>

      </div data="cierre row">

      <script>
        function AgregarPunto<?php echo $NombreGrafica ?>() {

          var Rango = document.getElementById("Rango<?php echo $NombreGrafica ?>").value;
          var Via = document.getElementById("Via<?php echo $NombreGrafica ?>").value;
          var Valor = document.getElementById("Valor<?php echo $NombreGrafica ?>").value;

          var Icono = $('#Icono<?php echo $NombreGrafica ?>').data('ddslick');
          Icono = Icono["selectedData"]["value"];

          var arreglo = {};
          arreglo[Rango] = {};

          promedio_derecho = 0;
          promedio_izquierdo = 0;
          var puntos = JSON.parse(document.getElementById("grafica<?php echo $NombreGrafica ?>").value);
          for (index in puntos) {
            var rango1 = puntos[index].rango;
            arreglo[rango1] = {};
            arreglo[rango1]["rango"] = puntos[index].rango;

            vias_value<?php echo $NombreGrafica ?>.forEach((elem, index1) => {
              arreglo[rango1][elem] = puntos[index][elem];
              arreglo[rango1][elem + "_icono"] = puntos[index][elem + "_icono"];

              //solo aplica para audimetria tonal
              if ((rango1 == "500" || rango1 == "1000" || rango1 == "2000") && elem == "derecho_aerea") {
                promedio_derecho = promedio_derecho + parseInt(puntos[index][elem]);
              }

              if ((rango1 == "500" || rango1 == "1000" || rango1 == "2000") && elem == "izquierdo_aerea") {
                promedio_izquierdo = promedio_izquierdo + parseInt(puntos[index][elem]);
              }
              //fin solo aplica para audimetria tonal

            });
            /*
            //<!-- Campos Editables X2 //-->
            arreglo[rango1]["izquierdo"] = puntos[index].izquierdo;
            arreglo[rango1]["derecho"] = puntos[index].derecho;

            //<!-- Campos Editables X2 //-->
            arreglo[rango1]["izquierdo_icono"] = puntos[index].izquierdo_icono;
            arreglo[rango1]["derecho_icono"] = puntos[index].derecho_icono;
            */

          }

          //solo aplica para audimetria tonal 
          //console.log(promedio_derecho);
          document.getElementById("promedio_derecho_audible1").innerHTML = (promedio_derecho / 3).toFixed(1);
          document.getElementById("promedio_derecho_audible2").innerHTML = (promedio_izquierdo / 3).toFixed(1);
          //fin solo aplica para audimetria tonal

          arreglo[Rango]["rango"] = Rango;
          arreglo[Rango][Via] = Valor;
          arreglo[Rango][Via + "_icono"] = Icono;

          document.getElementById("grafica<?php echo $NombreGrafica ?>").value = JSON.stringify(arreglo);

          //////////////////////////////////////
          for (index in intervalos<?php echo $NombreGrafica ?>) {
            if (intervalos<?php echo $NombreGrafica ?>[index] == Rango) {
              var SiguienteRango = parseInt(index) + 1;
            }
          }
          //console.log(intervalos[SiguienteRango]);
          if (intervalos<?php echo $NombreGrafica ?>[SiguienteRango] == undefined) {
            for (index1 in vias_value<?php echo $NombreGrafica ?>) {
              if (vias_value<?php echo $NombreGrafica ?>[index1] == Via) {
                var SiguienteVia = vias_value<?php echo $NombreGrafica ?>[parseInt(index1) + 1];
                var SiguienteRango = 0;
              }
            }
          } else {
            var SiguienteVia = Via;
          }
          if (SiguienteVia == undefined) {
            SiguienteVia = vias_value<?php echo $NombreGrafica ?>[0];
          }

          document.getElementById("Rango<?php echo $NombreGrafica ?>").value = intervalos<?php echo $NombreGrafica ?>[SiguienteRango];
          document.getElementById("Via<?php echo $NombreGrafica ?>").value = SiguienteVia;
          Iconos<?php echo $NombreGrafica ?>();
          /////////////////////////////////////
          drawChart<?php echo $NombreGrafica ?>();
        }
      </script>

      <script type="text/javascript" src="plugins/LoaderK/loader.js"></script>
      <script type="text/javascript">
        /////////////////////////////////////////////////
        google.charts.load('current', {
          'packages': ['corechart', 'line']
        });
        google.charts.setOnLoadCallback(drawChart<?php echo $NombreGrafica ?>);

        function drawChart<?php echo $NombreGrafica ?>() {
          var data = new google.visualization.DataTable();
          data.addColumn('number', 'Frecuency Heartz');
          vias_escrito<?php echo $NombreGrafica ?>.forEach((elem, index1) => {
            data.addColumn('number', elem);
          });
          /*
          //<!-- Campos Editables X2 //-->
          data.addColumn('number', 'Oído Derecho');
          data.addColumn('number', 'Oído Izquiero');
          */

          var puntos = JSON.parse(document.getElementById("grafica<?php echo $NombreGrafica ?>").value);
          //console.log(puntos);
          for (index in puntos) {

            var datos_arreglo = new Array();
            datos_arreglo.push(parseInt(puntos[index].rango));
            vias_value<?php echo $NombreGrafica ?>.forEach((elem, index1) => {
              datos_arreglo.push(parseInt(puntos[index][elem]));
            });

            data.addRow(datos_arreglo);
            /*
            var derecho = puntos[index].derecho;
            var izquierdo = puntos[index].izquierdo;
            //<!-- Campos Editables //-->
            data.addRow([parseInt(puntos[index].rango), parseInt(puntos[index].derecho), parseInt(puntos[index].izquierdo)]);
            */
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

          var container = document.getElementById('curve_chart<?php echo $NombreGrafica ?>');
          var chart = new google.visualization.LineChart(container);
          var direccion = "IconosGraficas/";

          google.visualization.events.addListener(chart, 'ready', function() {
            var layout = chart.getChartLayoutInterface();
            for (var i = 0; i < data.getNumberOfRows(); i++) {
              //<!-- Campos Editables //-->
              //iconos_arreglo = ["derecho_icono", "izquierdo_icono"];
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
                  whiteHat[index].style.top = (yPos - 18) + 'px';
                  whiteHat[index].style.left = (xPos) - 10 + 'px';
                }

              }
            }
          });

          chart.draw(data, options);

        }

        Iconos<?php echo $NombreGrafica ?>();
        //poner esto para que funcione el select con los simbolos, ya que al agregar mas de una grafica manda error
        $(window).load(function() {
          Iconos<?php echo $NombreGrafica ?>();
        });
      </script>

      <style type="text/css">
        .whiteHat {
          border: none;
          position: absolute;
        }

        .dd-selected {
          color: black;
          padding: 0px;
        }

        .dd-options {
          overflow: auto !important;
          height: 250px !important;
        }

        .dd-option-text {
          line-height: 36px !important;
        }

        .dd-selected-text {
          line-height: 36px !important;
        }
      </style>

    <?php
  }
  //cierre de audiometria tonal nueva
  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  /*
  if ($Modulo == "Logoaudiometria") {

    //se necesita la tabla iconos_grafica
    ?>

      <?php
      $queryList = mysqli_query($conn3, "SELECT * FROM  iconos_grafica ");
      $nrowl = mysqli_num_rows($queryList);
      while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $id = $rowMotorizado['id'];
        $nombre = $rowMotorizado['nombre'];
        $ruta = $rowMotorizado['ruta'];
        $tipo = $rowMotorizado['tipo'];
        $clase = $rowMotorizado['clase'];

        if ($tipo == "1" and $clase == "1") {
          if ($id == "16") {
            $select_izquierdo_aerea .= '<option value="' . $ruta . '" data-imagesrc="https://medicalsoftplus.com/baseDev/IconosGraficas/' . $ruta . '"; selected> ' . $nombre . ' </option>';
          } else {
            $select_izquierdo_aerea .= '<option value="' . $ruta . '" data-imagesrc="https://medicalsoftplus.com/baseDev/IconosGraficas/' . $ruta . '"; > ' . $nombre . ' </option>';
          }
        }

        if ($tipo == "2" and $clase == "1") {
          if ($id == "8") {
            $select_derecho_aerea .= '<option value="' . $ruta . '" data-imagesrc="https://medicalsoftplus.com/baseDev/IconosGraficas/' . $ruta . '"; selected> ' . $nombre . ' </option>';
          } else {
            $select_derecho_aerea .= '<option value="' . $ruta . '" data-imagesrc="https://medicalsoftplus.com/baseDev/IconosGraficas/' . $ruta . '";> ' . $nombre . ' </option>';
          }
        }
      }
      ?>

      <!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>-->
      <script src="plugins/jQuery/jquery-2.2.3.min.js"></script> <!-- no se repita el javascript y genere error en el footer se condiciono este script-->
      <!--<script type="text/javascript" src="https://cdn.rawgit.com/prashantchaudhary/ddslick/master/jquery.ddslick.min.js" ></script>-->
      <script type="text/javascript" src="plugins/DdslickK/jquery.ddslick.min.js"></script>

      <input type="hidden" name="editar_ronda1" id="editar_ronda1" value="9999">

      <script>
        function select_imagen1() {
          $("#slick_aerea1").ddslick({
            width: "100%",
            imagePosition: "left",
            selectText: "Seleccione Simbolo",
            onSelected: function(data) {
              //es el input que va a tener el valor del select de los iconos
              $("#icono_grafica_aerea1").val(data.selectedData.value);
            }
          })

        }
      </script>

      <script type="text/javascript">
        function CrearInput1(value) {
          var ronda_editar = document.getElementById("editar_ronda1").value;
          if (ronda_editar == "9999") {
            var ronda = document.getElementById("ronda_grafica1").value;
          } else {
            var ronda = ronda_editar;
          }

          var rangos = [-1, 0, 5, 10, 15, 20, 25, 30, 35, 40, 45, 50, 55, 60, 65, 70, 75, 80, 85, 90, 95, 100];

          for (var i = 0; i < rangos.length; i++) {
            if (value == "100") {
              var rango = rangos[2];
              break;
            }
            if (value == rangos[i]) {
              var rango = rangos[i + 1];
              break;
            }
          }
          //if(ronda=="5"){var rango='final';}

          if (rango != "final") {
            if (ronda == "0") {
              var texto = '<div class="col-md-8"><label> Oído Derecho -' + rango + '- Vía Aérea </label> <input type="number" name="derecho_aerea1_' + rango + '" id="derecho_aerea1_' + rango + '" class="form-control input-lg" placeholder=" Vía Aérea"></div>';

              texto += '<div class="col-md-4"> <label> Icónos </label> <select id="slick_aerea1" style="width: 120px;" class="form-control input-lg">';
              texto += '<?php echo $select_derecho_aerea; ?> </select><br></div>';

              texto += ' <button class="btn btn-block btn-primary btn-sm" type="button" onclick="Enviar_grafica1(' + rango + ')"> <i class="fa fa-plus"></i> Agregar Información Oído Derecho - Vía Aérea </button><br>';
            } else if (ronda == "1") {
              var texto = '<div class="col-md-8"><label> Oído Izquierdo -' + rango + '- Vía Aerea </label> <input type="number" name="izquierdo_aerea1_' + rango + '" id="izquierdo_aerea1_' + rango + '" class="form-control input-lg" placeholder=" Vía Aérea"></div>';

              texto += '<div class="col-md-4"> <label> Icónos </label> <select id="slick_aerea1" style="width: 120px;" class="form-control input-lg">';
              texto += '<?php echo $select_izquierdo_aerea; ?> </select><br></div>';

              texto += ' <button class="btn btn-block btn-primary btn-sm" type="button" onclick="Enviar_grafica1(' + rango + ')"> <i class="fa fa-plus"></i> Agregar Información Oído Izquierdo </button><br>';
            } else if (ronda == "2") {
              var texto = '<label> Se llenaron todos los campos </label>';
            }
          }

          // aqui enviamos el mensaje por medio de un arreglo     
          document.getElementById("inputs1").innerHTML = texto;

          select_imagen1();

        }


        function Enviar_grafica1(valor) {
          var rango = parseInt(valor);
          //var ronda = parseInt(document.getElementById("ronda_grafica1").value);
          var ronda_editar = parseInt(document.getElementById("editar_ronda1").value);
          if (ronda_editar == "9999") {
            var ronda = parseInt(document.getElementById("ronda_grafica1").value);
          } else {
            var ronda = ronda_editar;
          }

          var arreglo = {};
          arreglo[rango] = {};

          var puntos = JSON.parse(document.getElementById("grafica1").value);
          for (index in puntos) {
            var rango1 = puntos[index].rango;
            arreglo[rango1] = {};

            arreglo[rango1]["rango"] = puntos[index].rango;

            arreglo[rango1]["izquierdo_aerea"] = puntos[index].izquierdo_aerea;
            arreglo[rango1]["izquierdo_icono_aerea"] = puntos[index].izquierdo_icono_aerea;

            arreglo[rango1]["derecho_aerea"] = puntos[index].derecho_aerea;
            arreglo[rango1]["derecho_icono_aerea"] = puntos[index].derecho_icono_aerea;


            arreglo[rango]["rango"] = rango;
            if (ronda == "0") {
              var derecho_icono_aerea = document.getElementById("icono_grafica_aerea1").value;
              var derecho_aerea = parseInt(document.getElementById("derecho_aerea1_" + valor).value);

              arreglo[rango]["derecho_aerea"] = derecho_aerea;
              arreglo[rango]["derecho_icono_aerea"] = derecho_icono_aerea;

            } else if (ronda == "1") {
              var izquierdo_icono_aerea = document.getElementById("icono_grafica_aerea1").value;
              var izquierdo_aerea = parseInt(document.getElementById("izquierdo_aerea1_" + valor).value);

              arreglo[rango]["izquierdo_aerea"] = izquierdo_aerea;
              arreglo[rango]["izquierdo_icono_aerea"] = izquierdo_icono_aerea;
            }

          }
          document.getElementById("grafica1").value = JSON.stringify(arreglo);


          if (rango == "100") {
            console.log('entro');
            ronda = 1 + parseInt(ronda);
            document.getElementById("ronda_grafica1").value = ronda;
            rango = "-1";
          }

          document.getElementById("frecuencia_actual1").value = rango;
          var ticks = parseInt(document.getElementById("ticks_grafica1").value);
          ticks++;


          var antes_editar = document.getElementById("actual_campo_audiometria_antes_editar1").value;
          if (antes_editar != "ninguno") {
            rango = antes_editar;
            document.getElementById("actual_campo_audiometria_antes_editar1").value = "ninguno";
            document.getElementById("frecuencia_actual1").value = rango;
            ticks--;
          }
          document.getElementById("ticks_grafica1").value = ticks;
          drawChart1();
          document.getElementById("editar_ronda1").value = "9999";
          CrearInput1(rango);
        }
      </script>

      <style type="text/css">
        .whiteHat {
          border: none;
          position: absolute;
        }

        .dd-selected {
          color: black;
          padding: 0px;
        }

        .dd-options {
          overflow: auto !important;
          height: 250px !important;
        }

        .dd-option-text {
          line-height: 36px !important;
        }

        .dd-selected-text {
          line-height: 36px !important;
        }
      </style>

      <!--<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>-->
      <script type="text/javascript" src="plugins/LoaderK/loader.js"></script>
      <script type="text/javascript">
        /////////////////////////////////////////////////
        google.charts.load('current', {
          'packages': ['corechart', 'line']
        });
        google.charts.setOnLoadCallback(drawChart1);

        function drawChart1() {
          var data = new google.visualization.DataTable();
          data.addColumn('number', 'Frecuency Heartz');
          data.addColumn('number', 'Oído Derecho Aérea');
          data.addColumn('number', 'Oído Izquiero Aérea');


          var puntos = JSON.parse(document.getElementById("grafica1").value);
          for (index in puntos) {
            var rango = puntos[index].rango;

            var derecho_aerea = puntos[index].derecho_aerea;
            var izquierdo_aerea = puntos[index].izquierdo_aerea;

            var derecho_icono_aerea = puntos[index].derecho_icono_aerea;
            var izquierdo_icono_aerea = puntos[index].izquierdo_icono_aerea;

            data.addRow([rango, derecho_aerea, izquierdo_aerea]);
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

          var container = document.getElementById('curve_chart1');
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
                whiteHat.style.top = (yPos - 18) + 'px';
                whiteHat.style.left = (xPos) - 2 + 'px';
              }


              ///////////////////////////////////////////////////////////

              var xPos = layout.getXLocation(data.getValue(i, 0));
              var yPos = layout.getYLocation(data.getValue(i, 2));


              var url2 = puntos[data.getValue(i, 0)]['izquierdo_icono_aerea'];

              if (url2 != null && yPos != null) {

                var whiteHat2 = container.appendChild(document.createElement('img'));
                whiteHat2.src = direccion + url2;
                whiteHat2.className = 'whiteHat';

                // 16x16 (image size in this example)
                whiteHat2.style.top = (yPos - 18) + 'px';
                whiteHat2.style.left = (xPos) - 2 + 'px';
              }

              ///////////////////////////////////////////////////////////       
            }
          });

          chart.draw(data, options);
        }
      </script>

      <div class="form-group col-md-12" align="center">
        <hr>
      </div>
      <button type="button" data-toggle="modal" data-target="#modalForm1" onclick="Select_EditarGrafica1();" title="Editar Grafica"> Editar Grafica
        <i class="fa fa-pencil"></i>
      </button>
      <div id="curve_chart1" class="col-md-12" style="width: 100%; height: 500px;zoom:0.7"></div>
      <div class="row">
        <div id="inputs1" class="col-md-12"> </div>
        <input type="hidden" name="grafica1" id="grafica1" value='{"0":{"rango":0,"izquierdo_aerea":null,"izquierdo_icono_aerea":null,"derecho_aerea":null,"derecho_icono_aerea":null}}'>

        <input type="hidden" name="icono_grafica_oseo1" id="icono_grafica_oseo1">
        <input type="hidden" name="icono_grafica_aerea1" id="icono_grafica_aerea1">

        <input type="hidden" name="ronda_grafica1" id="ronda_grafica1" value="0">
        <input type="hidden" name="frecuencia_actual1" id="frecuencia_actual1" value="0">

        <input type="hidden" name="ticks_grafica1" id="ticks_grafica1" value="0">
      </div>


      <script type="text/javascript">
        CrearInput1(-1);
      </script>

      <div class="container">

        <div class="col-md-6">
          <label>Umbral de voz (Oído Derecho)</label>
          <input type="text" name="LogoAudiometria[Umbral de voz][Oido Derecho]" class="form-control input-lg" pattern="[^'\x22]+" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)">
        </div>
        <div class="col-md-6">
          <label>Umbral de voz (Oído Izquierdo)</label>
          <input type="text" name="LogoAudiometria[Umbral de voz][Oido Izquierdo]" class="form-control input-lg" pattern="[^'\x22]+" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)">
        </div>

        <div class="col-md-6">
          <label>Umbral de Palabra (Oído Derecho)</label>
          <input type="text" name="LogoAudiometria[Umbral de Palabra][Oido Derecho]" class="form-control input-lg" pattern="[^'\x22]+" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)">
        </div>
        <div class="col-md-6">
          <label>Umbral de Palabra (Oído Izquierdo)</label>
          <input type="text" name="LogoAudiometria[Umbral de Palabra][Oido Izquierdo]" class="form-control input-lg" pattern="[^'\x22]+" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)">
        </div>

        <div class="col-md-6">
          <label>Umbral de Captación (Oído Derecho)</label>
          <input type="text" name="LogoAudiometria[Umbral de Captación][Oido Derecho]" class="form-control input-lg" pattern="[^'\x22]+" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)">
        </div>
        <div class="col-md-6">
          <label>Umbral de Captación (Oído Izquierdo)</label>
          <input type="text" name="LogoAudiometria[Umbral de Captación][Oido Izquierdo]" class="form-control input-lg" pattern="[^'\x22]+" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)">
        </div>

        <div class="col-md-6">
          <label>Umbral de Máxima Discriminación (Oído Derecho)</label>
          <input type="text" name="LogoAudiometria[Umbral de Máxima Discriminación][Oido Derecho]" class="form-control input-lg" pattern="[^'\x22]+" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)">
        </div>
        <div class="col-md-6">
          <label>Umbral de Máxima Discriminación (Oído Izquierdo)</label>
          <input type="text" name="LogoAudiometria[Umbral de Máxima Discriminación][Oido Izquierdo]" class="form-control input-lg" pattern="[^'\x22]+" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)">
        </div>

        <div class="col-md-6">
          <label>Umbral de Distorsión (Oído Derecho)</label>
          <input type="text" name="LogoAudiometria[Umbral de Distorsión][Oido Derecho]" class="form-control input-lg" pattern="[^'\x22]+" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)">
        </div>
        <div class="col-md-6">
          <label>Umbral de Distorsión (Oído Izquierdo)</label>
          <input type="text" name="LogoAudiometria[Umbral de Distorsión][Oido Izquierdo]" class="form-control input-lg" pattern="[^'\x22]+" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)">
        </div>

        <div class="col-md-6">
          <label>% Discriminación (Oído Derecho)</label>
          <input type="text" name="LogoAudiometria[% Discriminación][Oido Derecho]" class="form-control input-lg" pattern="[^'\x22]+" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)">
        </div>
        <div class="col-md-6">
          <label>% Discriminación (Oído Izquierdo)</label>
          <input type="text" name="LogoAudiometria[% Discriminación][Oido Izquierdo]" class="form-control input-lg" pattern="[^'\x22]+" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)">
        </div>

        <div class="col-md-6">
          <label>MCL (Oído Derecho)</label>
          <input type="text" name="LogoAudiometria[MCL][Oido Derecho]" class="form-control input-lg" pattern="[^'\x22]+" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)">
        </div>
        <div class="col-md-6">
          <label>MCL (Oído Izquierdo)</label>
          <input type="text" name="LogoAudiometria[MCL][Oido Izquierdo]" class="form-control input-lg" pattern="[^'\x22]+" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)">
        </div>

        <div class="col-md-6">
          <label>UCL (Oído Derecho)</label>
          <input type="text" name="LogoAudiometria[UCL][Oido Derecho]" class="form-control input-lg" pattern="[^'\x22]+" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)">
        </div>
        <div class="col-md-6">
          <label>UCL (Oído Izquierdo)</label>
          <input type="text" name="LogoAudiometria[UCL][Oido Izquierdo]" class="form-control input-lg" pattern="[^'\x22]+" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)">
        </div>
        <br><br>
      </div>

      <div class="form-group col-md-6">
        <b>Oído Derecho:</b>
        <select class="form-control select2" name="logoderecho">
          <option value="">Seleccione </option>
          <option value="Curva de la logoaudiometr&iacute;a normal que se correlaciona con la audiometr&iacute;a.">Curva de la logoaudiometr&iacute;a normal que se correlaciona con la audiometr&iacute;a. </option>

          <option value="Curva de la logoaudiometr&iacute;a desplazada que se correlaciona con la audiometr&iacute;a.">Curva de la logoaudiometr&iacute;a desplazada que se correlaciona con la audiometr&iacute;a. </option>

          <option value="No responde a la m&aacute;xima intensidad del audi&oacute;metro.">No responde a la m&aacute;xima intensidad del audi&oacute;metro.</option>

          <option value="No responde de forma adecuada a los est&iacute;mulos auditivos por lo que no se pueden obtener respuestas confiables y precisas.">No responde de forma adecuada a los est&iacute;mulos auditivos por lo que no se pueden obtener respuestas confiables y precisas.</option>


        </select>
      </div>



      <div class="form-group col-md-6">

        <b>Oído Izquierdo:</b>
        <select class="form-control select2" name="logoIzquierdo">
          <option value="">Seleccione </option>

          <option value="Curva de la logoaudiometr&iacute;a normal que se correlaciona con la audiometr&iacute;a."> Curva de la logoaudiometr&iacute;a normal que se correlaciona con la audiometr&iacute;a. </option>
          <option value="Curva de la logoaudiometr&iacute;a desplazada que se correlaciona con la audiometr&iacute;a.">Curva de la logoaudiometr&iacute;a desplazada que se correlaciona con la audiometr&iacute;a. </option>
          <option value="No responde a la m&aacute;xima intensidad del audi&oacute;metro.">No responde a la m&aacute;xima intensidad del audi&oacute;metro.</option>
          <option value="No responde de forma adecuada a los est&iacute;mulos auditivos por lo que no se pueden obtener respuestas confiables y precisas.">No responde de forma adecuada a los est&iacute;mulos auditivos por lo que no se pueden obtener respuestas confiables y precisas.</option>


        </select>
      </div>


      <div class="form-group col-md-6">
        <input type="text" name="discriDer" value="Logra discriminar al   %  a    dB" class="form-control input-lg" id="enfermedadActual">
      </div>


      <div class="form-group col-md-6">
        <input type="text" name="discriIz" value="Logra discriminar al   %  a    dB" class="form-control input-lg" id="enfermedadActual">
      </div>
      <div class="form-group col-md-12" align="center">
        <hr>
      </div>


      <!-- modal segunda grafica-->

      <div class="modal fade" id="modalForm1" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">×</span>
                <span class="sr-only">Cerrar</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">Editar Grafica</h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
              <p class="statusMsg"></p>

              <div class="form-group">
                <label for="arreglo_editar">Elija Frecuency Hertz </label>
                <select name="EditarGrafica_Audiometria1" id="EditarGrafica_Audiometria1" class="form-control input-lg">

                </select>
                <input type="hidden" name="actual_campo_audiometria_antes_editar1" id="actual_campo_audiometria_antes_editar1" value="ninguno">

              </div>

              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <a href="#" onclick="EditarGrafica1();" class="btn btn-default"> <i class="fa fa-glyphicon glyphicon-plus"></i> <strong> Actualizar </strong></a>


            </div>
          </div>
        </div>
      </div>

      <script type="text/javascript">
        function Select_EditarGrafica1() {
          var ronda = document.getElementById("ronda_grafica1").value;
          var rangos = [0, 5, 10, 15, 20, 25, 30, 35, 40, 45, 50, 55, 60, 65, 70, 75, 80, 85, 90, 95, 100];

          var etapas = ["Via Aerea - Oido Derecho", "Via Aerea - Oido Izquierdo"];

          var puntos = JSON.parse(document.getElementById("grafica1").value);

          var ticks = document.getElementById("ticks_grafica1").value;
          var text = "0";
          var contador = "1";

          for (i = 0; i < 2; i++) //cantidad de lineas que hay en la grafica
          {

            for (index in puntos) {

              var value = puntos[index].rango;

              for (var k = 0; k < rangos.length; k++) {
                if (value == "0") {
                  var rango_final = "-1";
                  break;
                }
                if (value == rangos[k]) {
                  var rango_final = rangos[k - 1];
                  break;
                }
              }

              if (i == 0) {
                var repuesta = puntos[index].derecho_aerea;
                var estilo = "style='background-color:#ff222294;'"
              }
              if (i == 1) {
                var repuesta = puntos[index].izquierdo_aerea;
                var estilo = "style='background-color:#3b83bd'"
              }

              if (value != "-1") {
                text += "<option value='" + rango_final + "_" + i + "' " + estilo + "><b>" + value + " - " + etapas[i] + "</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Valor Digitado: " + repuesta + "</option>";
              } else {
                contador--;
              }
              if (ticks == contador) {
                break;
              }
              contador++;
            }
            if (ticks == contador) {
              break;
            }
          }


          document.getElementById('EditarGrafica_Audiometria1').innerHTML = text;

        }

        function EditarGrafica1() {
          var frecuencia_actual = document.getElementById("frecuencia_actual1").value;
          document.getElementById('actual_campo_audiometria_antes_editar1').value = frecuencia_actual;

          var frecuencia = document.getElementById("EditarGrafica_Audiometria1").value;
          var respuesta = frecuencia.split("_");
          document.getElementById("editar_ronda1").value = respuesta[1];
          CrearInput1(respuesta[0]);
          $('#modalForm1').modal('hide');

        }
      </script>

    <?php

  } // cierre de logoaudiometria

  */
  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  if ($Modulo == "Impedanciometria") {
    ?>










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
          //data.addColumn('number', '');

          //data.addRow([-200, 0, 0]);
          data.addRow([-200, 0]);

          var puntos = JSON.parse(document.getElementById("grafica_timpanograma_arreglo_1").value);
          //console.log(puntos);

          var cadena = "0";
          var contadoreferencia = "0";
          var arreglo = new Array();
          for (index in puntos) {
            var rango = puntos[index].x;
            if (rango != null) {
              cadena++;
              arreglo[cadena] = {};
              arreglo[cadena]["x"] = puntos[index].x;
              arreglo[cadena]["y"] = puntos[index].y;
            }

            /*
            if (puntos[index].y > 0.5) {
              contadoreferencia++;
            }
            */

          }

          /*
          if (contadoreferencia > 0) {
            filtro = "title: 'ml',ticks: [0, 0.5, 1, 1.5],viewWindow: {min: 0,max: 1.5}";
          } else if (contadoreferencia == 0) {
            filtro = "title: 'ml',ticks: [0, 0.1, 0.2, 0.3, 0.4, 0.5],viewWindow: {min: 0.01,max: 0.5}";
          }
          */

          //console.log(filtro);
          arreglo.sort((a, b) => a.x - b.x);
          //console.log(arreglo); 

          var contador = "0";
          for (const n of arreglo) {
            contador++;
            var x = n.x;
            var y = n.y;

            //data.addRow([x, y, 0]);
            data.addRow([x, y]);
            if (cadena == contador) {
              break;
            }
          }

          //data.addRow([200, 0, 0]);
          data.addRow([200, 0]);

          var classicOptions = {
            title: 'Timpanograma',

            width: 900,
            height: 500,
            // Gives each series an axis that matches the vAxes number below.
            series: {
              0: {
                targetAxisIndex: 0,
                color: '#FF0000'
              },

              1: {
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

              //0:{filtro}
            },
            hAxis: {
              scaleType: 'linear',
              ticks: [-200, -100, 0, 100, 200]
            },

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

        /////////////////////////////////////////////////
        google.charts.load('current', {
          'packages': ['corechart', 'line']
        });
        google.charts.setOnLoadCallback(drawChart3);

        function drawChart3() {
          var data = new google.visualization.DataTable();
          data.addColumn('number', 'daPa');
          data.addColumn('number', 'Oído Izquierdo');
          //data.addColumn('number', '');

          //data.addRow([-200, 0, 0]);
          data.addRow([-200, 0]);

          var puntos = JSON.parse(document.getElementById("grafica_timpanograma_arreglo_2").value);
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

          arreglo.sort((a, b) => a.x - b.x);


          var contador = "0";
          for (const n of arreglo) {
            contador++;
            var x = n.x;
            var y = n.y;

            //data.addRow([x, y, 0]);
            data.addRow([x, y]);
            if (cadena == contador) {
              break;
            }
          }

          //data.addRow([200, 0, 0])
          data.addRow([200, 0])

          var classicOptions = {
            title: 'Timpanograma',

            width: 900,
            height: 500,
            // Gives each series an axis that matches the vAxes number below.
            series: {
              0: {
                targetAxisIndex: 0,
                color: '#0082fd'
              },
              /*
                          1: {
                            targetAxisIndex: 1,
                            lineWidth: 0
                          }*/
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
              ticks: [-200, -100, 0, 100, 200]
            },

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
                //0: { color: '#FF0000' },
                0: { color: '#0082fd' },
              },
              interpolateNulls: true,
               };
          */
          var container = document.getElementById('curve_chart3');
          var chart = new google.visualization.LineChart(container);

          chart.draw(data, classicOptions);
        }
      </script>

      <style type="text/css">
        .section_our_solution .row {
          align-items: center;
        }

        .our_solution_category {
          display: flex;
          flex-direction: row;
          flex-wrap: wrap;
        }

        .our_solution_category .solution_cards_box {
          display: flex;
          flex-direction: column;
          justify-content: center;
        }

        .solution_cards_box .solution_card {
          flex: 0 50%;
          background: #e47171;
          ;
          box-shadow: 0 2px 4px 0 rgba(136, 144, 195, 0.2),
            0 5px 15px 0 rgba(37, 44, 97, 0.15);
          border-radius: 15px;
          margin: 8px;
          padding: 10px 15px;
          position: relative;
          z-index: 1;
          overflow: hidden;
          min-height: 100px;
          transition: 0.7s;
        }

        .solution_cards_box .solution_card:hover {
          background: #e47171;
          ;
          /*color: #fff;*/
          transform: scale(1.1);
          z-index: 9;
        }

        .solution_cards_box .solution_card:hover::before {
          background: rgb(85 108 214 / 10%);
        }

        .solution_cards_box .solution_card:hover .solu_title h3,
        .solution_cards_box .solution_card:hover .solu_description p {
          color: #fff;
        }

        .solution_cards_box .solution_card:before {
          content: "";
          position: absolute;
          background: rgb(85 108 214 / 5%);
          width: 170px;
          height: 400px;
          z-index: -1;
          transform: rotate(42deg);
          right: -56px;
          top: -23px;
          border-radius: 35px;
        }

        .solution_cards_box .solution_card:hover .solu_description button {
          background: #fff !important;
          color: red;
        }

        .solution_card .so_top_icon {}

        .solution_card .solu_title h3 {
          color: #212121;
          font-size: 1.3rem;
          margin-top: 13px;
          margin-bottom: 13px;
        }

        .solution_card .solu_description p {
          font-size: 15px;
          margin-bottom: 15px;
        }

        .solution_card .solu_description button {
          border: 0;
          border-radius: 15px;
          background: linear-gradient(140deg,
              #42c3ca 0%,
              #42c3ca 50%,
              #42c3cac7 75%) !important;
          color: #fff;
          font-weight: 500;
          font-size: 1rem;
          padding: 5px 16px;
        }

        .our_solution_content h1 {
          text-transform: capitalize;
          margin-bottom: 1rem;
          font-size: 2.5rem;
        }

        .our_solution_content p {}

        .hover_color_bubble {
          position: absolute;
          background: rgb(54 81 207 / 15%);
          width: 100rem;
          height: 100rem;
          left: 0;
          right: 0;
          z-index: -1;
          top: 16rem;
          border-radius: 50%;
          transform: rotate(-36deg);
          left: -18rem;
          transition: 0.7s;
        }

        .solution_cards_box .solution_card:hover .hover_color_bubble {
          top: 0rem;
        }

        .solution_cards_box .solution_card .so_top_icon {
          width: 60px;
          height: 60px;
          border-radius: 50%;
          background: #fff;
          overflow: hidden;
          display: flex;
          align-items: center;
          justify-content: center;
        }

        .solution_cards_box .solution_card .so_top_icon img {
          width: 40px;
          height: 50px;
          object-fit: contain;
        }

        /*start media query*/
        @media screen and (min-width: 320px) {
          .sol_card_top_3 {
            position: relative;
            top: 0;
          }

          .our_solution_category {
            width: 100%;
            margin: 0 auto;
          }

          .our_solution_category .solution_cards_box {
            flex: auto;
          }
        }

        @media only screen and (min-width: 768px) {
          .our_solution_category .solution_cards_box {
            flex: 1;
          }
        }

        @media only screen and (min-width: 1024px) {
          .sol_card_top_3 {
            position: relative;
            top: -3rem;
          }

          .our_solution_category {
            width: 50%;
            margin: 0 auto;
          }
        }

        @media only screen and (max-width: 1400px) {
          .timpanograma_zoom {
            zoom: 0.6;
          }

        }
      </style>
      <br><br>
      <div class="form-group col-md-12" align="center">
        <hr>
      </div>
      <div class="row col-md-12">
        <!--<div class="form-group col-md-12" align="center"> <strong> Timpanogramas: </strong></div>-->
        <div id="curve_chart2" class="col-md-12" style="height: 500px;text-align: -webkit-center;"></div>
        <div class="col-md-12 row timpanograma_zoom">
          <div class="col-md-2">
            <label> Tipo </label>
            <input type="text" name="Timpanograma[Derecho][Tipo]" id="timpanograma_tipo1" class="form-control input-lg" pattern="[^'\x22]+" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)">
          </div>
          <div class="col-md-2">
            <label> V.F. C </label>
            <input type="number" name="Timpanograma[Derecho][V.F. C]" id="timpanograma_vfc1" class="form-control input-lg" step="any">
          </div>
          <div class="col-md-2">
            <label> Presión </label>
            <input type="number" name="Timpanograma[Derecho][Presión]" id="timpanograma_presion1" class="form-control input-lg" step="any">
          </div>
          <div class="col-md-2">
            <label> Complacencia </label>
            <input type="number" name="Timpanograma[Derecho][Complacencia]" id="timpanograma_complacencia1" class="form-control input-lg" step="0.01">
          </div>
          <!--
        <div class="col-md-2">
          <label> Gradiente </label>
          <input type="number" name="Timpanograma[Derecho][Gradiente]" id="timpanograma_gradiente1" class="form-control input-lg" step="any">
        </div>
        -->

          <input type="hidden" name="grafica_timpanograma_arreglo_1" id="grafica_timpanograma_arreglo_1" value='{"0":{"x":null,"y":null}}'>
          <input type="hidden" name="posicionxtemp1" id="posicionxtemp1" value="9999">

          <div class="col-md-4">
            <hr style="margin-top: 15px;">
            <a onclick="CargarPuntos(1,'principal');" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" style="width:100%;"> <i class="fa fa-glyphicon glyphicon-plus"></i> <strong> Agregar Punto Oído Derecho </strong></a>
          </div>
          <div class="col-md-12">
            <br>
            <a onclick="PuntosGrafica(1)" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" style="float: right;"> <i class="fa fa-glyphicon glyphicon-plus"></i> <strong> Añadir más puntos en la gráfica (Oído Derecho) </strong></a>
            <a onclick="reestablecer(1)" style="display: flow-root;"> <i class="fa fa-trash" style="color: red;padding: 5px;font-size: 20px;left: 10px;position: relative;top: 10px;"></i></a>
            <br><br>
          </div>
        </div>
        
        <div id="curve_chart3" class="col-md-12" style="height: 500px;text-align: -webkit-center;"></div>

        <div class="col-md-12 row timpanograma_zoom">
          <div class="col-md-2">
            <div class="solution_cards_box" id="popUp" style="display: none;position: absolute;top: -200px;width: 200px;">
              <div class="solution_card">
                <div class="hover_color_bubble"></div>
                <div class="so_top_icon">
                  <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                </div>
                <div class="solu_title">
                  <h3>Error</h3>
                </div>
                <div class="solu_description">
                  <p>
                    No se acepta el caracter '
                  </p>
                  <!--<button type="button" class="read_more_btn">Read More</button>-->
                </div>
              </div>
            </div>
            <label> Tipo </label>
            <input type="text" name="Timpanograma[Izquierdo][Tipo]" id="timpanograma_tipo2" class="form-control input-lg" pattern="[^'\x22]+" oninput="if (!this.checkValidity()){ this.value = this.value.slice(0, -1);$( '#popUp' ).show(); setTimeout(function() {$( '#popUp' ).hide();}, 3000);}">
          </div>
          <div class="col-md-2">
            <label> V.F. C </label>
            <input type="number" name="Timpanograma[Izquierdo][V.F. C]" id="timpanograma_vfc2" class="form-control input-lg" step="any">
          </div>
          <div class="col-md-2">
            <label> Presión </label>
            <input type="number" name="Timpanograma[Izquierdo][Presión]" id="timpanograma_presion2" class="form-control input-lg" step="any">
          </div>
          <div class="col-md-2">
            <label> Complacencia </label>
            <input type="number" name="Timpanograma[Izquierdo][Complacencia]" id="timpanograma_complacencia2" class="form-control input-lg" step="0.01">
          </div>
          <!--
        <div class="col-md-2">
          <label> Gradiente </label>
          <input type="number" name="Timpanograma[Izquierdo][Gradiente]" id="timpanograma_gradiente2" class="form-control input-lg" step="any">
        </div>
        -->

          <input type="hidden" name="grafica_timpanograma_arreglo_2" id="grafica_timpanograma_arreglo_2" value='{"0":{"x":null,"y":null}}'>
          <input type="hidden" name="posicionxtemp2" id="posicionxtemp2" value="9999">

          <div class="col-md-4">
            <hr style="margin-top: 15px;">
            <a onclick="CargarPuntos(2,'principal');" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" style="width:100%"> <i class="fa fa-glyphicon glyphicon-plus"></i> <strong> Agregar Punto Oído Izquierdo </strong></a>
          </div>

          <div class="col-md-12">
            <br>
            <a onclick="PuntosGrafica(2)" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" style="float: right;"> <i class="fa fa-glyphicon glyphicon-plus"></i> <strong> Añadir más puntos en la gráfica (Oído Izquierdo) </strong></a>
            <a onclick="reestablecer(2)" style="display: flow-root;"> <i class="fa fa-trash" style="color: red;padding: 5px;font-size: 20px;left: 10px;position: relative;top: 10px;"></i></a>
            <br><br>
          </div>

        </div>

        <div class="col-md-12 box">



          <input type="hidden" name="timpanogramax" id="timpanogramax">
          <input type="hidden" name="timpanogramay" id="timpanogramay">

          <div class="col-md-12 row" id="reflejosestapediales">
            <script type="text/javascript">
              function reflejosestapediales() {

                var arreglo = ["Reflejos_Ipsilaterales", "Reflejos_Contralaterales"];
                var arreglo_1 = [500, 1000, 2000, 4000];
                var pattern = "[^,/|\\x22\\x27]+";

                var texto = "";
                for (var i = 0; i < arreglo.length; i++) {
                  texto += '<div class="col-md-12" align="center"><h3>' + arreglo[i].replace("_", " ") + '</h3></div>';
                  texto += '<div class="col-md-4 form-group"><label>Frecuencia</label></div><div class="col-md-4 form-group"><label> Oído Derecho</label></div><div class="col-md-4 form-group"><label>Oído Izquierdo</label></div>';


                  for (var k = 0; k < arreglo_1.length; k++) {
                    texto += '<div class="col-md-4 form-group"><label>' + arreglo_1[k] + 'Hz</label></div><div class="col-md-4 form-group"> <input type="text" name="' + arreglo[i] + '[' + arreglo_1[k] + '][Oido Derecho]" class="form-control input-lg" placeholder="dB" value="dB" pattern="' + pattern + '" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)"> </div><div class="col-md-4 form-group"><input type="text" name="' + arreglo[i] + '[' + arreglo_1[k] + '][Oido Izquierdo]" class="form-control input-lg" placeholder="dB" value="dB" pattern="' + pattern + '" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)"></div>';
                  }
                }
                document.getElementById("reflejosestapediales").innerHTML = texto;
              }

              reflejosestapediales();
            </script>
          </div>
          <div class="form-group col-md-12" align="center">
            <hr>
          </div>

        </div>

      </div>
      <style type="text/css">
        .swal2-popup {
          font-size: 1.5rem;
        }
      </style>


      <script src="plugins/SweetAlert2K/Sweetalert2.11.1.5.js"></script>

      <script type="text/javascript">
        function reestablecer(valor) {
          if (valor == 1) {
            document.getElementById("grafica_timpanograma_arreglo_1").value = '{"0":{"x":null,"y":null}}';
            drawChart2();
          }

          if (valor == 2) {
            document.getElementById("grafica_timpanograma_arreglo_2").value = '{"0":{"x":null,"y":null}}';
            drawChart3();
          }
        }

        function PuntosGrafica(valor) {

          const {
            value: text
          } = Swal.fire({
            toast: true,
            icon: 'question',
            title: 'Añadir más puntos a la gráfica',
            html: '<label>Eje daPa </label>' +
              '<input id="swal-input1" class="swal2-input" style="max-width: 100%;" type="number" value="0"><br>' +
              '<label>Eje ml </label>' +
              '<input id="swal-input2" class="swal2-input" style="max-width: 100%;" type="number" value="0">',
            focusConfirm: false,
            showCancelButton: true,
            preConfirm: () => {
              var contador = "0";
              var mensaje = "";
              //alert(document.getElementById('swal-input1').value);
              //alert(document.getElementById('swal-input2').value);
              if (document.getElementById('swal-input1').value <= -400 || document.getElementById('swal-input1').value >= 200 || document.getElementById('swal-input1').value == "") {
                mensaje += 'El campo debe estar en el rango de -400 y 200 <br>';
              } else {
                document.getElementById('timpanogramax').value = document.getElementById('swal-input1').value;
                contador++
              }

              if (document.getElementById('swal-input2').value <= -400 || document.getElementById('swal-input2').value >= 200 || document.getElementById('swal-input1').value == "") {
                mensaje += 'El campo debe estar en el rango de -400 y 200 <br>';
              } else {
                document.getElementById('timpanogramay').value = document.getElementById('swal-input2').value;
                contador++
              }

              if (contador == "2") {
                CargarPuntos(valor, 'secundario');
              } else {
                Swal.showValidationMessage(mensaje);
              }
            }
          })


        }


        function CargarPuntos(valor, tipo) {
          if (valor == "1" && tipo == "secundario") {
            var arreglo = {};

            var puntos = JSON.parse(document.getElementById("grafica_timpanograma_arreglo_1").value);
            for (index in puntos) {
              arreglo[index] = {};

              arreglo[index]["x"] = puntos[index].x;

              arreglo[index]["y"] = puntos[index].y;
            }

            var x = parseFloat(document.getElementById("timpanogramax").value);
            var y = parseFloat(document.getElementById("timpanogramay").value);

            arreglo[x] = {};

            arreglo[x]["x"] = x;
            arreglo[x]["y"] = y;

            document.getElementById("grafica_timpanograma_arreglo_1").value = JSON.stringify(arreglo);
            drawChart2();
          }


          if (valor == "2" && tipo == "secundario") {
            var arreglo = {};

            var puntos = JSON.parse(document.getElementById("grafica_timpanograma_arreglo_2").value);
            for (index in puntos) {
              arreglo[index] = {};

              arreglo[index]["x"] = puntos[index].x;

              arreglo[index]["y"] = puntos[index].y;
            }

            var x = parseFloat(document.getElementById("timpanogramax").value);
            var y = parseFloat(document.getElementById("timpanogramay").value);

            arreglo[x] = {};

            arreglo[x]["x"] = x;
            arreglo[x]["y"] = y;

            document.getElementById("grafica_timpanograma_arreglo_2").value = JSON.stringify(arreglo);
            drawChart3();
          }

          //////////////////////////////////////////////////////////////////////////////////////////////////////////////

          if (valor == "1" && tipo == "principal") {
            var pos = parseInt(document.getElementById("posicionxtemp1").value);

            var arreglo = {};

            var puntos = JSON.parse(document.getElementById("grafica_timpanograma_arreglo_1").value);
            for (index in puntos) {
              arreglo[index] = {};

              arreglo[index]["x"] = puntos[index].x;

              arreglo[index]["y"] = puntos[index].y;
            }

            if (pos != "9999") {
              delete(arreglo[pos]);
            }

            var x = parseFloat(document.getElementById("timpanograma_presion1").value);
            var y = parseFloat(document.getElementById("timpanograma_complacencia1").value);

            arreglo[x] = {};

            arreglo[x]["x"] = x;
            arreglo[x]["y"] = y;

            document.getElementById("posicionxtemp1").value = x;
            document.getElementById("grafica_timpanograma_arreglo_1").value = JSON.stringify(arreglo);

            drawChart2();
          }


          if (valor == "2" && tipo == "principal") {
            var arreglo = {};
            var pos = parseInt(document.getElementById("posicionxtemp2").value);

            var puntos = JSON.parse(document.getElementById("grafica_timpanograma_arreglo_2").value);
            for (index in puntos) {
              arreglo[index] = {};

              arreglo[index]["x"] = puntos[index].x;

              arreglo[index]["y"] = puntos[index].y;
            }

            if (pos != "9999") {
              delete(arreglo[pos]);
            }

            var x = parseFloat(document.getElementById("timpanograma_presion2").value);
            var y = parseFloat(document.getElementById("timpanograma_complacencia2").value);

            arreglo[x] = {};

            arreglo[x]["x"] = x;
            arreglo[x]["y"] = y;

            document.getElementById("posicionxtemp2").value = x;
            document.getElementById("grafica_timpanograma_arreglo_2").value = JSON.stringify(arreglo);
            drawChart3();
          }



        }
      </script>
      <style>
        body.swal2-toast-shown .swal2-container.swal2-center {
          width:50% !important;
        }
      </style>
    <?php
  } //cierre de impedanciometria

  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  /*
  if ($Modulo == "Entidad") {
    ?>

      <div class="form-group col-md-12">
        <strong>
          Entidad dónde se realiza la evaluación
        </strong>
        <select id="Entidad" name="Entidad" class="form-control select2" style="width: 100%;">

          <?php

          $queryList = mysqli_query($conn3, "SELECT * FROM H_Entidades  where activo=1");
          $nrowl = mysqli_num_rows($queryList);
          while ($row_recordset32 = mysqli_fetch_array($queryList)) {

            $id    = $row_recordset32['id'];
            $nombre     = $row_recordset32['nombre'];
            $des     = $row_recordset32['descripcion'];

            echo "<option value='$nombre - $des'>$nombre - $des </option>";
          }

          ?>
          <option value="No Especifica">No Especifica</option>
        </select>
      </div>


      <div class="form-group col-md-12">
        <strong>Equipos Utilizados</strong>
        <div class="form-group col-md-12">
          <select id="cie" name="equipos[]" class="form-control select2" style="width: 100%;" multiple>
            <option value="" selected="selected">Seleccione ...</option> ';
            <?php
            $queryList = mysqli_query($conn3, "SELECT * FROM H_Equipos where activo=1");
            $nrowl = mysqli_num_rows($queryList);
            while ($row_recordset32A = mysqli_fetch_array($queryList)) {
              $fecha_c = $row_recordset32A['fecha_c'];
              $nombre = $row_recordset32A['nombre'];


              echo "<option value='$nombre, Fecha calibraci&oacute;n: $fecha_c'> $nombre / Fecha calibración: $fecha_c </option>";
            }

            ?>
          </select>
        </div>


      <?php
    } //cierre del modulo entidad
*/
    if ($Modulo == "Logoaudiometria_1") {
      ?>










        <?php

        $queryList = mysqli_query($conn3, "SELECT * FROM  iconos_grafica ");
        $nrowl = mysqli_num_rows($queryList);
        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
          $id = $rowMotorizado['id'];
          $nombre = $rowMotorizado['nombre'];
          $ruta = $rowMotorizado['ruta'];
          $tipo = $rowMotorizado['tipo'];
          $clase = $rowMotorizado['clase'];

          if ($tipo == "1" and $clase == "1") {
            if ($id == "16") {
              $select_izquierdo_aerea .= '<option value="' . $ruta . '" data-imagesrc="'.$Base.'IconosGraficas/' . $ruta . '"; selected> ' . $nombre . ' </option>';
            } else {
              $select_izquierdo_aerea .= '<option value="' . $ruta . '" data-imagesrc="'.$Base.'IconosGraficas/' . $ruta . '"; > ' . $nombre . ' </option>';
            }
          }
          if ($tipo == "1" and $clase == "2") {
            if ($id == "10") {
              $select_izquierdo_oseo .= '<option value="' . $ruta . '" data-imagesrc="'.$Base.'IconosGraficas/' . $ruta . '"; selected> ' . $nombre . ' </option>';
            } else {
              $select_izquierdo_oseo .= '<option value="' . $ruta . '" data-imagesrc="'.$Base.'IconosGraficas/' . $ruta . '";> ' . $nombre . ' </option>';
            }
          }
          if ($tipo == "2" and $clase == "1") {
            if ($id == "8") {
              $select_derecho_aerea .= '<option value="' . $ruta . '" data-imagesrc="'.$Base.'IconosGraficas/' . $ruta . '"; selected> ' . $nombre . ' </option>';
            } else {
              $select_derecho_aerea .= '<option value="' . $ruta . '" data-imagesrc="'.$Base.'IconosGraficas/' . $ruta . '";> ' . $nombre . ' </option>';
            }
          }
          if ($tipo == "2" and $clase == "2") {
            if ($id == "4") {
              $select_derecho_oseo .= '<option value="' . $ruta . '" data-imagesrc="'.$Base.'IconosGraficas/' . $ruta . '"; selected> ' . $nombre . ' </option>';
            } else {
              $select_derecho_oseo .= '<option value="' . $ruta . '" data-imagesrc="'.$Base.'IconosGraficas/' . $ruta . '";> ' . $nombre . ' </option>';
            }
          }
        }
        ?>

        <!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>-->
        <script src="plugins/jQuery/jquery-2.2.3.min.js"></script> <!-- no se repita el javascript y genere error en el footer se condiciono este script-->
        <!--<script type="text/javascript" src="https://cdn.rawgit.com/prashantchaudhary/ddslick/master/jquery.ddslick.min.js" ></script>-->
        <script type="text/javascript" src="plugins/DdslickK/jquery.ddslick.min.js"></script>

        <input type="hidden" name="editar_ronda1" id="editar_ronda1" value="9999">

        <script>
          function select_imagen1() {
            $("#slick_aerea1").ddslick({
              width: "100%",
              imagePosition: "left",
              selectText: "Seleccione Simbolo",
              onSelected: function(data) {
                //es el input que va a tener el valor del select de los iconos
                $("#icono_grafica_aerea1").val(data.selectedData.value);
              }
            })

            $("#slick_oseo1").ddslick({
              width: "100%",
              imagePosition: "left",
              selectText: "Seleccione Simbolo",
              onSelected: function(data) {
                //es el input que va a tener el valor del select de los iconos
                $("#icono_grafica_oseo1").val(data.selectedData.value);
              }
            })

          }
        </script>

        <script type="text/javascript">
          function CrearInput1(value) {
            var ronda_editar = document.getElementById("editar_ronda1").value;
            if (ronda_editar == "9999") {
              var ronda = document.getElementById("ronda_grafica1").value;
            } else {
              var ronda = ronda_editar;
            }

            var rangos = [-1, 0, 5, 10, 15, 20, 25, 30, 35, 40, 45, 50, 55, 60, 65, 70, 75, 80, 85, 90, 95, 100];

            for (var i = 0; i < rangos.length; i++) {
              if (value == "100") {
                var rango = rangos[2];
                break;
              }
              if (value == rangos[i]) {
                var rango = rangos[i + 1];
                break;
              }
            }
            //if(ronda=="5"){var rango='final';}

            if (rango != "final") {
              if (ronda == "0") {
                var texto = '<div class="col-md-8"><label> Oído Derecho -' + rango + '- Vía Aérea </label> <input type="text" name="derecho_aerea1_' + rango + '" id="derecho_aerea1_' + rango + '" class="form-control input-lg valuelogoaudiometria" oninput="FuncionValoresGraficas_Logo(this.id, 0, 100)" placeholder=" Vía Aérea"></div>';

                texto += '<div class="col-md-4"> <label> Ícono </label> <select id="slick_aerea1" style="width: 120px;" class="form-control input-lg">';
                texto += '<?php echo $select_derecho_aerea; ?> </select><br></div>';

                texto += ' <button class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" type="button" onclick="Enviar_grafica1(' + rango + ')"> <i class="fa fa-plus"></i> Agregar Información Oído Derecho - Vía Aérea </button><br>';
              } else if (ronda == "1") {
                var texto = '<div class="col-md-8"> <label> Oído Derecho -' + rango + '- Vía Ósea </label> <input type="text" name="derecho_oseo1_' + rango + '" id="derecho_oseo1_' + rango + '" class="form-control input-lg valuelogoaudiometria" oninput="FuncionValoresGraficas_Logo(this.id, 0, 100)" placeholder="Vía Óseo"> </div>';

                texto += '<div class="col-md-4"> <label> Ícono </label> <select id="slick_oseo1" style="width: 120px;" class="form-control input-lg">';
                texto += '<?php echo $select_derecho_oseo; ?> </select><br></div>';

                texto += ' <button class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" type="button" onclick="Enviar_grafica1(' + rango + ')"> <i class="fa fa-plus"></i> Agregar Información Oído Derecho - Vía Ósea </button><br>';
              } else if (ronda == "2") {
                var texto = '<div class="col-md-8"><label> Oído Izquierdo -' + rango + '- Vía Aérea </label> <input type="text" name="izquierdo_aerea1_' + rango + '" id="izquierdo_aerea1_' + rango + '" class="form-control input-lg valuelogoaudiometria" oninput="FuncionValoresGraficas_Logo(this.id, 0, 100)" placeholder=" Vía Aérea"></div>';

                texto += '<div class="col-md-4"> <label> Ícono </label> <select id="slick_aerea1" style="width: 120px;" class="form-control input-lg">';
                texto += '<?php echo $select_izquierdo_aerea; ?> </select><br></div>';

                texto += ' <button class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" type="button" onclick="Enviar_grafica1(' + rango + ')"> <i class="fa fa-plus"></i> Agregar Información Oído Izquierdo - Vía Aérea </button><br>';
              } else if (ronda == "3") {
                var texto = '<div class="col-md-8"> <label> Oído Izquierdo -' + rango + '- Via Ósea </label> <input type="text" name="izquierdo_oseo1_' + rango + '" id="izquierdo_oseo1_' + rango + '" class="form-control input-lg valuelogoaudiometria" oninput="FuncionValoresGraficas_Logo(this.id, 0, 100)" placeholder="Vía Ósea"> </div>';

                texto += '<div class="col-md-4"> <label> Ícono </label> <select id="slick_oseo1" style="width: 120px;" class="form-control input-lg">';
                texto += '<?php echo $select_izquierdo_oseo; ?> </select><br></div>';

                texto += ' <button class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" type="button" onclick="Enviar_grafica1(' + rango + ')"> <i class="fa fa-plus"></i> Agregar Información Oído Izquierdo - Vía Ósea </button><br>';
              } else if (ronda == "4") {
                var texto = '<label> Se llenaron todos los campos </label>';
              }
            }

            // aqui enviamos el mensaje por medio de un arreglo     
            document.getElementById("inputs1").innerHTML = texto;

            select_imagen1();

          }


          function Enviar_grafica1(valor) {
            var rango = parseInt(valor);
            //var ronda = parseInt(document.getElementById("ronda_grafica1").value);
            var ronda_editar = parseInt(document.getElementById("editar_ronda1").value);
            if (ronda_editar == "9999") {
              var ronda = parseInt(document.getElementById("ronda_grafica1").value);
            } else {
              var ronda = ronda_editar;
            }

            var arreglo = {};
            arreglo[rango] = {};

            var puntos = JSON.parse(document.getElementById("grafica1").value);
            for (index in puntos) {
              var rango1 = puntos[index].rango;
              arreglo[rango1] = {};

              arreglo[rango1]["rango"] = puntos[index].rango;

              arreglo[rango1]["izquierdo_aerea"] = puntos[index].izquierdo_aerea;
              arreglo[rango1]["izquierdo_oseo"] = puntos[index].izquierdo_oseo;
              arreglo[rango1]["izquierdo_icono_aerea"] = puntos[index].izquierdo_icono_aerea;
              arreglo[rango1]["izquierdo_icono_oseo"] = puntos[index].izquierdo_icono_oseo;

              arreglo[rango1]["derecho_aerea"] = puntos[index].derecho_aerea;
              arreglo[rango1]["derecho_oseo"] = puntos[index].derecho_oseo;
              arreglo[rango1]["derecho_icono_aerea"] = puntos[index].derecho_icono_aerea;
              arreglo[rango1]["derecho_icono_oseo"] = puntos[index].derecho_icono_oseo;

              arreglo[rango1]["logografica"] = puntos[index].logografica;

              arreglo[rango]["rango"] = rango;
              if (ronda == "0") {
                var derecho_icono_aerea = document.getElementById("icono_grafica_aerea1").value;
                var derecho_aerea = parseInt(document.getElementById("derecho_aerea1_" + valor).value);

                arreglo[rango]["derecho_aerea"] = derecho_aerea;
                arreglo[rango]["derecho_icono_aerea"] = derecho_icono_aerea;

              } else if (ronda == "1") {

                var derecho_icono_oseo = document.getElementById("icono_grafica_oseo1").value;
                var derecho_oseo = parseInt(document.getElementById("derecho_oseo1_" + valor).value);

                arreglo[rango]["derecho_oseo"] = derecho_oseo;
                arreglo[rango]["derecho_icono_oseo"] = derecho_icono_oseo;
              } else if (ronda == "2") {
                var izquierdo_icono_aerea = document.getElementById("icono_grafica_aerea1").value;
                var izquierdo_aerea = parseInt(document.getElementById("izquierdo_aerea1_" + valor).value);

                arreglo[rango]["izquierdo_aerea"] = izquierdo_aerea;
                arreglo[rango]["izquierdo_icono_aerea"] = izquierdo_icono_aerea;
              } else if (ronda == "3") {

                var izquierdo_icono_oseo = document.getElementById("icono_grafica_oseo1").value;
                var izquierdo_oseo = parseInt(document.getElementById("izquierdo_oseo1_" + valor).value);

                arreglo[rango]["izquierdo_oseo"] = izquierdo_oseo;
                arreglo[rango]["izquierdo_icono_oseo"] = izquierdo_icono_oseo;
              }

            }
            document.getElementById("grafica1").value = JSON.stringify(arreglo);


            if (rango == "100") {
              console.log('entro');
              ronda = 1 + parseInt(ronda);
              document.getElementById("ronda_grafica1").value = ronda;
              rango = "-1";
            }

            document.getElementById("frecuencia_actual1").value = rango;
            var ticks = parseInt(document.getElementById("ticks_grafica1").value);
            ticks++;


            var antes_editar = document.getElementById("actual_campo_audiometria_antes_editar1").value;
            if (antes_editar != "ninguno") {
              rango = antes_editar;
              document.getElementById("actual_campo_audiometria_antes_editar1").value = "ninguno";
              document.getElementById("frecuencia_actual1").value = rango;
              ticks--;
            }
            document.getElementById("ticks_grafica1").value = ticks;
            drawChart1();
            document.getElementById("editar_ronda1").value = "9999";
            CrearInput1(rango);
          }
        </script>

        <style type="text/css">
          .whiteHat {
            border: none;
            position: absolute;
          }

          .dd-selected {
            color: black;
            padding: 0px;
          }

          .dd-options {
            overflow: auto !important;
            height: 250px !important;
          }

          .dd-option-text {
            line-height: 36px !important;
          }

          .dd-selected-text {
            line-height: 36px !important;
          }
        </style>

        <!--<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>-->
        <script type="text/javascript" src="plugins/LoaderK/loader.js"></script>
        <script type="text/javascript">
          /////////////////////////////////////////////////
          google.charts.load('current', {
            'packages': ['corechart', 'line']
          });
          google.charts.setOnLoadCallback(drawChart1);

          function drawChart1() {
            var data = new google.visualization.DataTable();
            data.addColumn('number', 'Frecuency Heartz');
            data.addColumn('number', 'Oído Derecho Aérea');
            data.addColumn('number', 'Oído Derecho Óseo');
            data.addColumn('number', 'Oído Izquiero Aérea');
            data.addColumn('number', 'Oído Izquierdo Óseo');
            data.addColumn('number', 'Logo - Logoaudiometría');

            /*
            var figuralogo = [];
            figuralogo["0.1"] = 0;
            figuralogo["5.1"] = 10;
            figuralogo["10.1"] = 50;
            figuralogo["15.1"] = 90;
            figuralogo["20.1"] = 100;
            for (index in figuralogo) {
              data.addRow([parseInt(index), null, null, null, null, figuralogo[index]]);
            }
            */

            var puntos = JSON.parse(document.getElementById("grafica1").value);
            for (index in puntos) {
              var rango = puntos[index].rango;

              var derecho_aerea = puntos[index].derecho_aerea;
              var derecho_oseo = puntos[index].derecho_oseo;
              var izquierdo_aerea = puntos[index].izquierdo_aerea;
              var izquierdo_oseo = puntos[index].izquierdo_oseo;


              var derecho_icono_aerea = puntos[index].derecho_icono_aerea;
              var derecho_icono_oseo = puntos[index].derecho_icono_oseo;
              var izquierdo_icono_aerea = puntos[index].izquierdo_icono_aerea;
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
              series: {
                0: {
                  curveType: "function",
                  color: '#FF0000'
                },
                1: {
                  lineWidth: 0
                },
                2: {
                  curveType: "function",
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
              backgroundColor: 'none'
            };

            var container = document.getElementById('curve_chart1');
            var chart = new google.visualization.LineChart(container);

            var direccion = "IconosGraficas/";
            var contador = "0";
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
                  whiteHat.style.top = (yPos - 18) + 'px';
                  whiteHat.style.left = (xPos) - 2 + 'px';
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
                  whiteHat1.style.top = (yPos - 18) + 'px';
                  whiteHat1.style.left = (xPos) - 2 + 'px';
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
                  whiteHat2.style.top = (yPos - 18) + 'px';
                  whiteHat2.style.left = (xPos) - 2 + 'px';
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
                  whiteHat3.style.top = (yPos - 18) + 'px';
                  whiteHat3.style.left = (xPos) - 2 + 'px';
                }
                ///////////////////////////////////////////////////////////
                contador++;
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
                numero.style.top = (yPos - 18) + 'px';
                numero.style.left = (xPos) + 9 + 'px';
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
                numero.style.top = (yPos - 18) + 'px';
                numero.style.left = (xPos) + 9 + 'px';
              }






            });



            chart.draw(data, options);
          }
        </script>


        <div class="form-group col-md-12" align="center">
          <hr>
        </div>
        <button type="button" data-toggle="modal" data-target="#modalForm1" onclick="Select_EditarGrafica1();" title="Editar Grafica" style="width: 100%;" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow"> Editar Gráfica
          <i class="fa fa-pencil"></i>
        </button>
        <div id='brand_div' style="width: 100%;">
          <div id="curve_chart1" class="col-md-12" style="width: 100%; height: 500px;zoom:0.7"></div>
        </div>
        <div class="row col-md-12">
          <div id="inputs1" class="col-md-12 row"> </div>
          <input type="hidden" name="grafica1" id="grafica1" value='{"0":{"rango":0,"izquierdo_aerea":null,"izquierdo_osea":null,"izquierdo_icono_aerea":null,"izquierdo_icono_oseo":null,"derecho_aerea":null,"derecho_osea":null,"derecho_icono_aerea":null,"derecho_icono_oseo":null,"logografica":0},"5":{"rango":5,"izquierdo_aerea":null,"izquierdo_osea":null,"izquierdo_icono_aerea":null,"izquierdo_icono_oseo":null,"derecho_aerea":null,"derecho_osea":null,"derecho_icono_aerea":null,"derecho_icono_oseo":null,"logografica":10},"10":{"rango":10,"izquierdo_aerea":null,"izquierdo_osea":null,"izquierdo_icono_aerea":null,"izquierdo_icono_oseo":null,"derecho_aerea":null,"derecho_osea":null,"derecho_icono_aerea":null,"derecho_icono_oseo":null,"logografica":50},"15":{"rango":15,"izquierdo_aerea":null,"izquierdo_osea":null,"izquierdo_icono_aerea":null,"izquierdo_icono_oseo":null,"derecho_aerea":null,"derecho_osea":null,"derecho_icono_aerea":null,"derecho_icono_oseo":null,"logografica":90},"20":{"rango":20,"izquierdo_aerea":null,"izquierdo_osea":null,"izquierdo_icono_aerea":null,"izquierdo_icono_oseo":null,"derecho_aerea":null,"derecho_osea":null,"derecho_icono_aerea":null,"derecho_icono_oseo":null,"logografica":100}}'>

          <input type="hidden" name="icono_grafica_oseo1" id="icono_grafica_oseo1">
          <input type="hidden" name="icono_grafica_aerea1" id="icono_grafica_aerea1">

          <input type="hidden" name="ronda_grafica1" id="ronda_grafica1" value="0">
          <input type="hidden" name="frecuencia_actual1" id="frecuencia_actual1" value="0">

          <input type="hidden" name="ticks_grafica1" id="ticks_grafica1" value="0">
        </div>


        <script type="text/javascript">
          CrearInput1(-1);
        </script>



        <div class="form-group col-md-6">
          <br>
          <b>Oído Derecho:</b>
          <select class="form-control select2" name="logoderecho">
            <option value="">Seleccione </option>
            <option value="Curva de la logoaudiometr&iacute;a normal que se correlaciona con la audiometr&iacute;a.">Curva de la logoaudiometr&iacute;a normal que se correlaciona con la audiometr&iacute;a. </option>

            <option value="Curva de la logoaudiometr&iacute;a desplazada que se correlaciona con la audiometr&iacute;a.">Curva de la logoaudiometr&iacute;a desplazada que se correlaciona con la audiometr&iacute;a. </option>

            <option value="No responde a la m&aacute;xima intensidad del audi&oacute;metro.">No responde a la m&aacute;xima intensidad del audi&oacute;metro.</option>

            <option value="No responde de forma adecuada a los est&iacute;mulos auditivos por lo que no se pueden obtener respuestas confiables y precisas.">No responde de forma adecuada a los est&iacute;mulos auditivos por lo que no se pueden obtener respuestas confiables y precisas.</option>


          </select>
        </div>



        <div class="form-group col-md-6">
          <br>
          <b>Oído Izquierdo:</b>
          <select class="form-control select2" name="logoIzquierdo">
            <option value="">Seleccione </option>

            <option value="Curva de la logoaudiometr&iacute;a normal que se correlaciona con la audiometr&iacute;a."> Curva de la logoaudiometr&iacute;a normal que se correlaciona con la audiometr&iacute;a. </option>
            <option value="Curva de la logoaudiometr&iacute;a desplazada que se correlaciona con la audiometr&iacute;a.">Curva de la logoaudiometr&iacute;a desplazada que se correlaciona con la audiometr&iacute;a. </option>
            <option value="No responde a la m&aacute;xima intensidad del audi&oacute;metro.">No responde a la m&aacute;xima intensidad del audi&oacute;metro.</option>
            <option value="No responde de forma adecuada a los est&iacute;mulos auditivos por lo que no se pueden obtener respuestas confiables y precisas.">No responde de forma adecuada a los est&iacute;mulos auditivos por lo que no se pueden obtener respuestas confiables y precisas.</option>


          </select>
        </div>


        <div class="form-group col-md-6">
          <input type="text" name="discriDer" value="Logra discriminar al   %  a    dB" class="form-control input-lg" id="enfermedadActual">
        </div>


        <div class="form-group col-md-6">
          <input type="text" name="discriIz" value="Logra discriminar al   %  a    dB" class="form-control input-lg" id="enfermedadActual">
        </div>
        <div class="form-group col-md-12" align="center">
          <hr>
        </div>


        <!-- modal segunda grafica-->

        <div class="modal fade" id="modalForm1" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <!-- Modal Header -->
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                  <span aria-hidden="true">×</span>
                  <span class="sr-only">Cerrar</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Editar Grafica</h4>
              </div>

              <!-- Modal Body -->
              <div class="modal-body">
                <p class="statusMsg"></p>

                <div class="form-group">
                  <label for="arreglo_editar">Elija Frecuency Hertz </label>
                  <select name="EditarGrafica_Audiometria1" id="EditarGrafica_Audiometria1" class="form-control input-lg">

                  </select>
                  <input type="hidden" name="actual_campo_audiometria_antes_editar1" id="actual_campo_audiometria_antes_editar1" value="ninguno">

                </div>

                <button type="button" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" data-dismiss="modal">Cerrar</button>
                <a href="#" onclick="EditarGrafica1();" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow"> <i class="fa fa-glyphicon glyphicon-plus"></i> <strong> Actualizar </strong></a>


              </div>
            </div>
          </div>
        </div>

        <script type="text/javascript">
          function Select_EditarGrafica1() {
            var ronda = document.getElementById("ronda_grafica1").value;
            var rangos = [0, 5, 10, 15, 20, 25, 30, 35, 40, 45, 50, 55, 60, 65, 70, 75, 80, 85, 90, 95, 100];

            var etapas = ["Vía Aérea - Oído Derecho", "Vía Ósea - Oído Derecho", "Vía Aérea - Oído Izquierdo", "Vía Ósea - Oído Izquierdo"];

            var puntos = JSON.parse(document.getElementById("grafica1").value);

            var ticks = document.getElementById("ticks_grafica1").value;
            var text = "0";
            var contador = "1";

            for (i = 0; i < 4; i++) //cantidad de lineas que hay en la grafica
            {

              for (index in puntos) {

                var value = puntos[index].rango;

                for (var k = 0; k < rangos.length; k++) {
                  if (value == "0") {
                    var rango_final = "-1";
                    break;
                  }
                  if (value == rangos[k]) {
                    var rango_final = rangos[k - 1];
                    break;
                  }
                }

                if (i == 0) {
                  var repuesta = puntos[index].derecho_aerea;
                  var estilo = "style='background-color:#ff222294;'"
                }
                if (i == 1) {
                  var repuesta = puntos[index].derecho_oseo;
                  var estilo = "style='background-color:#ff226994'"
                }
                if (i == 2) {
                  var repuesta = puntos[index].izquierdo_aerea;
                  var estilo = "style='background-color:#3b83bd'"
                }
                if (i == 3) {
                  var repuesta = puntos[index].izquierdo_oseo;
                  var estilo = "style='background-color:#67a1cf'"
                }

                if (value != "-1") {
                  text += "<option value='" + rango_final + "_" + i + "' " + estilo + "><b>" + value + " - " + etapas[i] + "</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Valor Digitado: " + repuesta + "</option>";
                } else {
                  contador--;
                }
                if (ticks == contador) {
                  break;
                }
                contador++;
              }
              if (ticks == contador) {
                break;
              }
            }


            document.getElementById('EditarGrafica_Audiometria1').innerHTML = text;

          }

          function EditarGrafica1() {
            var frecuencia_actual = document.getElementById("frecuencia_actual1").value;
            document.getElementById('actual_campo_audiometria_antes_editar1').value = frecuencia_actual;

            var frecuencia = document.getElementById("EditarGrafica_Audiometria1").value;
            var respuesta = frecuencia.split("_");
            document.getElementById("editar_ronda1").value = respuesta[1];
            CrearInput1(respuesta[0]);
            $('#modalForm1').modal('hide');

          }
        </script>

















      <?php
    } // cierre de la audiometria_1

    if ($Modulo == "Alta Frecuencia") {
      //$NombreGrafica="AltaFrecuencia";
      //$NombreGrafica sirve para que si hay mas graficas como esta no tengan error y tenga sus variables independientes
      ?>

        <!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>-->
        <script src="plugins/jQuery/jquery-2.2.3.min.js"></script> <!-- no se repita el javascript y genere error en el footer se condiciono este script-->
        <!--<script type="text/javascript" src="https://cdn.rawgit.com/prashantchaudhary/ddslick/master/jquery.ddslick.min.js" ></script>-->
        <script type="text/javascript" src="plugins/DdslickK/jquery.ddslick.min.js"></script>

        <div class="row col-md-12">

          <div id="curve_chart<?php echo $NombreGrafica ?>" class="col-md-12" style="width: 100%; height: 550px;zoom:0.7;z-index: 1;"></div>

          <div class="col-md-12 row">
            <input type="hidden" name="grafica<?php echo $NombreGrafica ?>" id="grafica<?php echo $NombreGrafica ?>" value='{"0":{"rango":0,"izquierdo_aerea":null,"izquierdo_osea":null,"izquierdo_aerea_icono":null,"izquierdo_osea_icono":null,"derecho_aerea":null,"derecho_osea":null,"derecho_aerea_icono":null,"derecho_osea_icono":null}}'>

            <div class="form-group col-md-3" align="center">
              <label>Vía</label>
              <select class="form-control input-lg" id="Via<?php echo $NombreGrafica ?>" onchange="Iconos<?php echo $NombreGrafica ?>()" style="width:100%">
                <script>
                  vias_escrito<?php echo $NombreGrafica ?> = ["Vía Aérea - Derecha", "Vía Ósea - Derecha", "Vía Aérea - Izquierda", "Vía Ósea - Izquierda"];
                  vias_value<?php echo $NombreGrafica ?> = ["derecho_aerea", "derecho_osea", "izquierdo_aerea", "izquierdo_osea"];
                  for (index in vias_escrito<?php echo $NombreGrafica ?>) {
                    $('#Via<?php echo $NombreGrafica ?>').append("<option value='" + vias_value<?php echo $NombreGrafica ?>[index] + "'>" + vias_escrito<?php echo $NombreGrafica ?>[index] + "</option>");
                  }
                </script>
              </select>
            </div>

            <div class="form-group col-md-3" align="center">
              <label>Intervalos</label>
              <select class="form-control input-lg" id="Rango<?php echo $NombreGrafica ?>" style="width:100%">
                <script>
                  intervalos<?php echo $NombreGrafica ?> = [8000, 9000, 10000, 11200, 12500, 14000, 16000, 18000, 20000];
                  for (index in intervalos<?php echo $NombreGrafica ?>) {
                    $('#Rango<?php echo $NombreGrafica ?>').append("<option value='" + intervalos<?php echo $NombreGrafica ?>[index] + "'>" + intervalos<?php echo $NombreGrafica ?>[index] + "</option>");
                  }
                </script>
              </select>
            </div>

            <div class="form-group col-md-2" align="center">
              <label>Valor</label>
              <input type="text" id="Valor<?php echo $NombreGrafica ?>" class="form-control input-lg" style="width:100%">
            </div>

            <?php
            $select_izquierdo_aerea = "";
            $select_izquierdo_oseo = "";
            $select_derecho_aerea = "";
            $select_derecho_oseo = "";
            $queryList = mysqli_query($conn3, "SELECT * FROM  iconos_grafica ");
            while ($rowMotorizado = mysqli_fetch_array($queryList)) {
              $id = $rowMotorizado['id'];
              $nombre = $rowMotorizado['nombre'];
              $ruta = $rowMotorizado['ruta'];
              $tipo = $rowMotorizado['tipo'];
              $clase = $rowMotorizado['clase'];

              if ($tipo == "1" and $clase == "1") {
                if ($id == "16") {
                  $select_izquierdo_aerea .= '<option value="' . $ruta . '" data-imagesrc="'.$Base.'IconosGraficas/' . $ruta . '"; selected> ' . $nombre . ' </option>';
                } else {
                  $select_izquierdo_aerea .= '<option value="' . $ruta . '" data-imagesrc="'.$Base.'IconosGraficas/' . $ruta . '"; > ' . $nombre . ' </option>';
                }
              }
              if ($tipo == "1" and $clase == "2") {
                if ($id == "10") {
                  $select_izquierdo_oseo .= '<option value="' . $ruta . '" data-imagesrc="'.$Base.'IconosGraficas/' . $ruta . '"; selected> ' . $nombre . ' </option>';
                } else {
                  $select_izquierdo_oseo .= '<option value="' . $ruta . '" data-imagesrc="'.$Base.'IconosGraficas/' . $ruta . '";> ' . $nombre . ' </option>';
                }
              }
              if ($tipo == "2" and $clase == "1") {
                if ($id == "8") {
                  $select_derecho_aerea .= '<option value="' . $ruta . '" data-imagesrc="'.$Base.'IconosGraficas/' . $ruta . '"; selected> ' . $nombre . ' </option>';
                } else {
                  $select_derecho_aerea .= '<option value="' . $ruta . '" data-imagesrc="'.$Base.'IconosGraficas/' . $ruta . '";> ' . $nombre . ' </option>';
                }
              }
              if ($tipo == "2" and $clase == "2") {
                if ($id == "4") {
                  $select_derecho_oseo .= '<option value="' . $ruta . '" data-imagesrc="'.$Base.'IconosGraficas/' . $ruta . '"; selected> ' . $nombre . ' </option>';
                } else {
                  $select_derecho_oseo .= '<option value="' . $ruta . '" data-imagesrc="'.$Base.'IconosGraficas/' . $ruta . '";> ' . $nombre . ' </option>';
                }
              }
            }
            ?>

            <div class="form-group col-md-4" align="center">
              <label>Ícono</label>
              <select class="form-control input-lg" id="Icono<?php echo $NombreGrafica ?>" style="width:100%">
              </select>
              <script>
                function Iconos<?php echo $NombreGrafica ?>() {
                  $estado = $('#Via<?php echo $NombreGrafica ?>').val();
                  if ($estado == "derecho_aerea") {
                    $('#Icono<?php echo $NombreGrafica ?>').ddslick('destroy');
                    $('#Icono<?php echo $NombreGrafica ?>').empty().append('<?php echo $select_derecho_aerea ?>');
                  }
                  if ($estado == "derecho_osea") {
                    $('#Icono<?php echo $NombreGrafica ?>').ddslick('destroy');
                    $('#Icono<?php echo $NombreGrafica ?>').empty().append('<?php echo $select_derecho_oseo ?>');
                  }
                  if ($estado == "izquierdo_aerea") {
                    $('#Icono<?php echo $NombreGrafica ?>').ddslick('destroy');
                    $('#Icono<?php echo $NombreGrafica ?>').empty().append('<?php echo $select_izquierdo_aerea ?>');
                  }
                  if ($estado == "izquierdo_osea") {
                    $('#Icono<?php echo $NombreGrafica ?>').ddslick('destroy');
                    $('#Icono<?php echo $NombreGrafica ?>').empty().append('<?php echo $select_izquierdo_oseo ?>');
                  }

                  $("#Icono<?php echo $NombreGrafica ?>").ddslick({
                    width: "100%",
                    imagePosition: "left",
                  })
                }
              </script>
              <input type="hidden" id="icono_grafica<?php echo $NombreGrafica ?>">
            </div>

            <div class="form-group col-md-12" align="center">
              <button class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" type="button" onclick="AgregarPunto<?php echo $NombreGrafica ?>()"> <i class="fa fa-plus"></i> Agregar </button><br>
            </div>

          </div data="cierre row">

          <script>
            function AgregarPunto<?php echo $NombreGrafica ?>() {

              var Rango = document.getElementById("Rango<?php echo $NombreGrafica ?>").value;
              var Via = document.getElementById("Via<?php echo $NombreGrafica ?>").value;
              var Valor = document.getElementById("Valor<?php echo $NombreGrafica ?>").value;

              var Icono = $('#Icono<?php echo $NombreGrafica ?>').data('ddslick');
              Icono = Icono["selectedData"]["value"];

              var arreglo = {};
              arreglo[Rango] = {};

              var puntos = JSON.parse(document.getElementById("grafica<?php echo $NombreGrafica ?>").value);
              for (index in puntos) {
                var rango1 = puntos[index].rango;
                arreglo[rango1] = {};
                arreglo[rango1]["rango"] = puntos[index].rango;

                arreglo[rango1]["izquierdo_aerea"] = puntos[index].izquierdo_aerea;
                arreglo[rango1]["izquierdo_osea"] = puntos[index].izquierdo_osea;
                arreglo[rango1]["izquierdo_aerea_icono"] = puntos[index].izquierdo_aerea_icono;
                arreglo[rango1]["izquierdo_osea_icono"] = puntos[index].izquierdo_osea_icono;

                arreglo[rango1]["derecho_aerea"] = puntos[index].derecho_aerea;
                arreglo[rango1]["derecho_osea"] = puntos[index].derecho_osea;
                arreglo[rango1]["derecho_aerea_icono"] = puntos[index].derecho_aerea_icono;
                arreglo[rango1]["derecho_osea_icono"] = puntos[index].derecho_osea_icono;
              }

              arreglo[Rango]["rango"] = Rango;
              arreglo[Rango][Via] = Valor;
              arreglo[Rango][Via + "_icono"] = Icono;

              document.getElementById("grafica<?php echo $NombreGrafica ?>").value = JSON.stringify(arreglo);

              //////////////////////////////////////
              for (index in intervalos<?php echo $NombreGrafica ?>) {
                if (intervalos<?php echo $NombreGrafica ?>[index] == Rango) {
                  var SiguienteRango = parseInt(index) + 1;
                }
              }
              //console.log(intervalos[SiguienteRango]);
              if (intervalos<?php echo $NombreGrafica ?>[SiguienteRango] == undefined) {
                for (index1 in vias_value<?php echo $NombreGrafica ?>) {
                  if (vias_value<?php echo $NombreGrafica ?>[index1] == Via) {
                    var SiguienteVia = vias_value<?php echo $NombreGrafica ?>[parseInt(index1) + 1];
                    var SiguienteRango = 0;
                  }
                }
              } else {
                var SiguienteVia = Via;
              }
              if (SiguienteVia == undefined) {
                SiguienteVia = vias_value<?php echo $NombreGrafica ?>[0];
              }

              document.getElementById("Rango<?php echo $NombreGrafica ?>").value = intervalos<?php echo $NombreGrafica ?>[SiguienteRango];
              document.getElementById("Via<?php echo $NombreGrafica ?>").value = SiguienteVia;
              Iconos<?php echo $NombreGrafica ?>();
              /////////////////////////////////////
              drawChart<?php echo $NombreGrafica ?>();
            }
          </script>

          <script type="text/javascript" src="plugins/LoaderK/loader.js"></script>
          <script type="text/javascript">
            /////////////////////////////////////////////////
            google.charts.load('current', {
              'packages': ['corechart', 'line']
            });
            google.charts.setOnLoadCallback(drawChart<?php echo $NombreGrafica ?>);

            function drawChart<?php echo $NombreGrafica ?>() {
              var data = new google.visualization.DataTable();
              data.addColumn('number', 'Frecuency Heartz');
              data.addColumn('number', 'Oído Derecho Aérea');
              data.addColumn('number', 'Oído Derecho Óseo');
              data.addColumn('number', 'Oído Izquiero Aérea');
              data.addColumn('number', 'Oído Izquierdo Óseo');

              var puntos = JSON.parse(document.getElementById("grafica<?php echo $NombreGrafica ?>").value);
              for (index in puntos) {
                var derecho_icono_aerea = puntos[index].derecho_aerea_icono;
                var derecho_icono_oseo = puntos[index].derecho_osea_icono;
                var izquierdo_icono_aerea = puntos[index].izquierdo_aerea_icono;
                var izquierdo_icono_oseo = puntos[index].izquierdo_osea_icono;

                data.addRow([parseInt(puntos[index].rango), parseInt(puntos[index].derecho_aerea), parseInt(puntos[index].derecho_osea), parseInt(puntos[index].izquierdo_aerea), parseInt(puntos[index].izquierdo_osea)]);
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

              var container = document.getElementById('curve_chart<?php echo $NombreGrafica ?>');
              var chart = new google.visualization.LineChart(container);
              var direccion = "IconosGraficas/";

              google.visualization.events.addListener(chart, 'ready', function() {
                var layout = chart.getChartLayoutInterface();
                for (var i = 0; i < data.getNumberOfRows(); i++) {
                  iconos_arreglo = ["derecho_aerea_icono", "derecho_osea_icono", "izquierdo_aerea_icono", "izquierdo_osea_icono"];
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
                      whiteHat[index].style.top = (yPos - 18) + 'px';
                      whiteHat[index].style.left = (xPos) - 10 + 'px';
                    }

                  }
                }
              });

              chart.draw(data, options);

            }

            Iconos<?php echo $NombreGrafica ?>();
            //poner esto para que funcione el select con los simbolos, ya que al agregar mas de una grafica manda error
            $(window).load(function() {
              Iconos<?php echo $NombreGrafica ?>();
            });
          </script>

          <style type="text/css">
            .whiteHat {
              border: none;
              position: absolute;
            }

            .dd-selected {
              color: black;
              padding: 0px;
            }

            .dd-options {
              overflow: auto !important;
              height: 250px !important;
            }

            .dd-option-text {
              line-height: 36px !important;
            }

            .dd-selected-text {
              line-height: 36px !important;
            }
          </style>






        <?php
      }

      if ($Modulo == "Alta Frecuencia 1") {
        //$NombreGrafica="AltaFrecuencia";
        //$NombreGrafica sirve para que si hay mas graficas como esta no tengan error y tenga sus variables independientes
        ?>


          <style>
            @media (max-width: 1440px) {
              #curve_chartAltaFrecuencia_1 {
                zoom: 0.5 !important;
              }
            }
          </style>
          <!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>-->
          <script src="plugins/jQuery/jquery-2.2.3.min.js"></script> <!-- no se repita el javascript y genere error en el footer se condiciono este script-->
          <!--<script type="text/javascript" src="https://cdn.rawgit.com/prashantchaudhary/ddslick/master/jquery.ddslick.min.js" ></script>-->
          <script type="text/javascript" src="plugins/DdslickK/jquery.ddslick.min.js"></script>

          <div class="row col-md-12">

            <div id="curve_chart<?php echo $NombreGrafica ?>" class="col-md-12" style="width: 100%; height: 550px;zoom:0.7;z-index: 1;"></div>

            <div class="col-md-12 row">
              <input type="hidden" name="grafica<?php echo $NombreGrafica ?>" id="grafica<?php echo $NombreGrafica ?>" value='{"0":{"rango":0,"izquierdo_aerea":null,"izquierdo_osea":null,"izquierdo_aerea_icono":null,"izquierdo_osea_icono":null,"derecho_aerea":null,"derecho_osea":null,"derecho_aerea_icono":null,"derecho_osea_icono":null}}'>

              <div class="form-group col-md-3" align="center">
                <label>Vía</label>
                <select class="form-control input-lg" id="Via<?php echo $NombreGrafica ?>" onchange="Iconos<?php echo $NombreGrafica ?>()" style="width:100%">
                  <script>
                    vias_escrito<?php echo $NombreGrafica ?> = ["Vía Aérea - Derecha", "Vía Ósea - Derecha", "Vía Aérea - Izquierda", "Vía Ósea - Izquierda"];
                    vias_value<?php echo $NombreGrafica ?> = ["derecho_aerea", "derecho_osea", "izquierdo_aerea", "izquierdo_osea"];
                    for (index in vias_escrito<?php echo $NombreGrafica ?>) {
                      $('#Via<?php echo $NombreGrafica ?>').append("<option value='" + vias_value<?php echo $NombreGrafica ?>[index] + "'>" + vias_escrito<?php echo $NombreGrafica ?>[index] + "</option>");
                    }
                  </script>
                </select>
              </div>

              <div class="form-group col-md-3" align="center">
                <label>Intervalos</label>
                <select class="form-control input-lg" id="Rango<?php echo $NombreGrafica ?>" style="width:100%">
                  <script>
                    intervalos<?php echo $NombreGrafica ?> = [206, 224, 282, 315, 355, 400, 447, 560, 630, 710, 800, 890, 1120, 1250, 1410, 1600, 1780, 2240, 2500, 2820, 3000, 3150, 3550, 4470, 5000, 5600, 6300, 7100];
                    for (index in intervalos<?php echo $NombreGrafica ?>) {
                      $('#Rango<?php echo $NombreGrafica ?>').append("<option value='" + intervalos<?php echo $NombreGrafica ?>[index] + "'>" + intervalos<?php echo $NombreGrafica ?>[index] + "</option>");
                    }
                  </script>
                </select>
              </div>

              <div class="form-group col-md-2" align="center">
                <label>Valor</label>
                <input type="text" id="Valor<?php echo $NombreGrafica ?>" class="form-control input-lg" style="width:100%">
              </div>

              <?php
              $select_izquierdo_aerea = "";
              $select_izquierdo_oseo = "";
              $select_derecho_aerea = "";
              $select_derecho_oseo = "";
              $queryList = mysqli_query($conn3, "SELECT * FROM  iconos_grafica ");
              while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                $id = $rowMotorizado['id'];
                $nombre = $rowMotorizado['nombre'];
                $ruta = $rowMotorizado['ruta'];
                $tipo = $rowMotorizado['tipo'];
                $clase = $rowMotorizado['clase'];

                if ($tipo == "1" and $clase == "1") {
                  if ($id == "16") {
                    $select_izquierdo_aerea .= '<option value="' . $ruta . '" data-imagesrc="'.$Base.'IconosGraficas/' . $ruta . '"; selected> ' . $nombre . ' </option>';
                  } else {
                    $select_izquierdo_aerea .= '<option value="' . $ruta . '" data-imagesrc="'.$Base.'IconosGraficas/' . $ruta . '"; > ' . $nombre . ' </option>';
                  }
                }
                if ($tipo == "1" and $clase == "2") {
                  if ($id == "10") {
                    $select_izquierdo_oseo .= '<option value="' . $ruta . '" data-imagesrc="'.$Base.'IconosGraficas/' . $ruta . '"; selected> ' . $nombre . ' </option>';
                  } else {
                    $select_izquierdo_oseo .= '<option value="' . $ruta . '" data-imagesrc="'.$Base.'IconosGraficas/' . $ruta . '";> ' . $nombre . ' </option>';
                  }
                }
                if ($tipo == "2" and $clase == "1") {
                  if ($id == "8") {
                    $select_derecho_aerea .= '<option value="' . $ruta . '" data-imagesrc="'.$Base.'IconosGraficas/' . $ruta . '"; selected> ' . $nombre . ' </option>';
                  } else {
                    $select_derecho_aerea .= '<option value="' . $ruta . '" data-imagesrc="'.$Base.'IconosGraficas/' . $ruta . '";> ' . $nombre . ' </option>';
                  }
                }
                if ($tipo == "2" and $clase == "2") {
                  if ($id == "4") {
                    $select_derecho_oseo .= '<option value="' . $ruta . '" data-imagesrc="'.$Base.'IconosGraficas/' . $ruta . '"; selected> ' . $nombre . ' </option>';
                  } else {
                    $select_derecho_oseo .= '<option value="' . $ruta . '" data-imagesrc="'.$Base.'IconosGraficas/' . $ruta . '";> ' . $nombre . ' </option>';
                  }
                }
              }
              ?>

              <div class="form-group col-md-4" align="center">
                <label>Ícono</label>
                <select class="form-control input-lg" id="Icono<?php echo $NombreGrafica ?>" style="width:100%">
                </select>
                <script>
                  function Iconos<?php echo $NombreGrafica ?>() {
                    $estado = $('#Via<?php echo $NombreGrafica ?>').val();
                    if ($estado == "derecho_aerea") {
                      $('#Icono<?php echo $NombreGrafica ?>').ddslick('destroy');
                      $('#Icono<?php echo $NombreGrafica ?>').empty().append('<?php echo $select_derecho_aerea ?>');
                    }
                    if ($estado == "derecho_osea") {
                      $('#Icono<?php echo $NombreGrafica ?>').ddslick('destroy');
                      $('#Icono<?php echo $NombreGrafica ?>').empty().append('<?php echo $select_derecho_oseo ?>');
                    }
                    if ($estado == "izquierdo_aerea") {
                      $('#Icono<?php echo $NombreGrafica ?>').ddslick('destroy');
                      $('#Icono<?php echo $NombreGrafica ?>').empty().append('<?php echo $select_izquierdo_aerea ?>');
                    }
                    if ($estado == "izquierdo_osea") {
                      $('#Icono<?php echo $NombreGrafica ?>').ddslick('destroy');
                      $('#Icono<?php echo $NombreGrafica ?>').empty().append('<?php echo $select_izquierdo_oseo ?>');
                    }

                    $("#Icono<?php echo $NombreGrafica ?>").ddslick({
                      width: "100%",
                      imagePosition: "left",
                    })
                  }
                </script>
              </div>

              <div class="form-group col-md-12" align="center">
                <button class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" type="button" onclick="AgregarPunto<?php echo $NombreGrafica ?>()"> <i class="fa fa-plus"></i> Agregar </button><br>
              </div>

            </div data="cierre row">

            <script>
              function AgregarPunto<?php echo $NombreGrafica ?>() {

                var Rango = document.getElementById("Rango<?php echo $NombreGrafica ?>").value;
                var Via = document.getElementById("Via<?php echo $NombreGrafica ?>").value;
                var Valor = document.getElementById("Valor<?php echo $NombreGrafica ?>").value;
                var Icono = $('#Icono<?php echo $NombreGrafica ?>').data('ddslick');
                Icono = Icono["selectedData"]["value"];

                var arreglo = {};
                arreglo[Rango] = {};

                var puntos = JSON.parse(document.getElementById("grafica<?php echo $NombreGrafica ?>").value);
                for (index in puntos) {
                  var rango1 = puntos[index].rango;
                  arreglo[rango1] = {};
                  arreglo[rango1]["rango"] = puntos[index].rango;

                  arreglo[rango1]["izquierdo_aerea"] = puntos[index].izquierdo_aerea;
                  arreglo[rango1]["izquierdo_osea"] = puntos[index].izquierdo_osea;
                  arreglo[rango1]["izquierdo_aerea_icono"] = puntos[index].izquierdo_aerea_icono;
                  arreglo[rango1]["izquierdo_osea_icono"] = puntos[index].izquierdo_osea_icono;

                  arreglo[rango1]["derecho_aerea"] = puntos[index].derecho_aerea;
                  arreglo[rango1]["derecho_osea"] = puntos[index].derecho_osea;
                  arreglo[rango1]["derecho_aerea_icono"] = puntos[index].derecho_aerea_icono;
                  arreglo[rango1]["derecho_osea_icono"] = puntos[index].derecho_osea_icono;
                }

                arreglo[Rango]["rango"] = Rango;
                arreglo[Rango][Via] = Valor;
                arreglo[Rango][Via + "_icono"] = Icono;

                document.getElementById("grafica<?php echo $NombreGrafica ?>").value = JSON.stringify(arreglo);

                //////////////////////////////////////
                for (index in intervalos<?php echo $NombreGrafica ?>) {
                  if (intervalos<?php echo $NombreGrafica ?>[index] == Rango) {
                    var SiguienteRango = parseInt(index) + 1;
                  }
                }
                //console.log(intervalos[SiguienteRango]);
                if (intervalos<?php echo $NombreGrafica ?>[SiguienteRango] == undefined) {
                  for (index1 in vias_value<?php echo $NombreGrafica ?>) {
                    if (vias_value<?php echo $NombreGrafica ?>[index1] == Via) {
                      var SiguienteVia = vias_value<?php echo $NombreGrafica ?>[parseInt(index1) + 1];
                      var SiguienteRango = 0;
                    }
                  }
                } else {
                  var SiguienteVia = Via;
                }
                if (SiguienteVia == undefined) {
                  SiguienteVia = vias_value<?php echo $NombreGrafica ?>[0];
                }

                document.getElementById("Rango<?php echo $NombreGrafica ?>").value = intervalos<?php echo $NombreGrafica ?>[SiguienteRango];
                document.getElementById("Via<?php echo $NombreGrafica ?>").value = SiguienteVia;
                Iconos<?php echo $NombreGrafica ?>();
                /////////////////////////////////////
                drawChart<?php echo $NombreGrafica ?>();
              }
            </script>

            <script type="text/javascript" src="plugins/LoaderK/loader.js"></script>
            <script type="text/javascript">
              /////////////////////////////////////////////////
              google.charts.load('current', {
                'packages': ['corechart', 'line']
              });
              google.charts.setOnLoadCallback(drawChart<?php echo $NombreGrafica ?>);

              function drawChart<?php echo $NombreGrafica ?>() {
                var data = new google.visualization.DataTable();
                data.addColumn('number', 'Frecuency Heartz');
                data.addColumn('number', 'Oído Derecho Aérea');
                data.addColumn('number', 'Oído Derecho Óseo');
                data.addColumn('number', 'Oído Izquiero Aérea');
                data.addColumn('number', 'Oído Izquierdo Óseo');

                var puntos = JSON.parse(document.getElementById("grafica<?php echo $NombreGrafica ?>").value);
                for (index in puntos) {
                  var derecho_icono_aerea = puntos[index].derecho_aerea_icono;
                  var derecho_icono_oseo = puntos[index].derecho_osea_icono;
                  var izquierdo_icono_aerea = puntos[index].izquierdo_aerea_icono;
                  var izquierdo_icono_oseo = puntos[index].izquierdo_osea_icono;

                  data.addRow([parseInt(puntos[index].rango), parseInt(puntos[index].derecho_aerea), parseInt(puntos[index].derecho_osea), parseInt(puntos[index].izquierdo_aerea), parseInt(puntos[index].izquierdo_osea)]);
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

                var container = document.getElementById('curve_chart<?php echo $NombreGrafica ?>');
                var chart = new google.visualization.LineChart(container);
                var direccion = "IconosGraficas/";

                google.visualization.events.addListener(chart, 'ready', function() {
                  var layout = chart.getChartLayoutInterface();
                  for (var i = 0; i < data.getNumberOfRows(); i++) {
                    iconos_arreglo = ["derecho_aerea_icono", "derecho_osea_icono", "izquierdo_aerea_icono", "izquierdo_osea_icono"];
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
                        whiteHat[index].style.top = (yPos - 18) + 'px';
                        whiteHat[index].style.left = (xPos) - 10 + 'px';
                      }

                    }
                  }
                });

                chart.draw(data, options);

              }

              Iconos<?php echo $NombreGrafica ?>();

              //poner esto para que funcione el select con los simbolos, ya que al agregar mas de una grafica manda error
              $(window).load(function() {
                Iconos<?php echo $NombreGrafica ?>();
              });
            </script>

            <style type="text/css">
              .whiteHat {
                border: none;
                position: absolute;
              }

              .dd-selected {
                color: black;
                padding: 0px;
              }

              .dd-options {
                overflow: auto !important;
                height: 250px !important;
              }

              .dd-option-text {
                line-height: 36px !important;
              }

              .dd-selected-text {
                line-height: 36px !important;
              }
            </style>



          <?php
        }

        if ($Modulo == "Valoracion de Tinnitus") {


          ?>
            <div class="form-group col-md-12" style="padding-left: 40px;padding-right: 40px;">
              <table style="width:100%" class="table">
                <thead>
                  <tr>
                  <th></th>
                  <th>Oído Derecho</th>
                  <th>Oído Izquierdo</th>
                  <th>Central</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Tipo</td>
                    <td> <input type="text" name="Tinnitus[Tipo][Derecho]" class="form-control input-lg"> </td>
                    <td> <input type="text" name="Tinnitus[Tipo][Izquierdo]" class="form-control input-lg"> </td>
                    <td> <input type="text" name="Tinnitus[Tipo][Central]" class="form-control input-lg"> </td>
                  </tr>
                  <tr>
                    <td>Nivel de Intensidad</td>
                    <td> <input type="text" name="Tinnitus[Nivel de Intensidad][Derecho]" class="form-control input-lg"> </td>
                    <td> <input type="text" name="Tinnitus[Nivel de Intensidad][Izquierdo]" class="form-control input-lg"> </td>
                    <td> <input type="text" name="Tinnitus[Nivel de Intensidad][Central]" class="form-control input-lg"> </td>
                  </tr>
                  <tr>
                    <td>Frecuencia</td>
                    <td> <input type="text" name="Tinnitus[Frecuencia][Derecho]" class="form-control input-lg"> </td>
                    <td> <input type="text" name="Tinnitus[Frecuencia][Izquierdo]" class="form-control input-lg"> </td>
                    <td> <input type="text" name="Tinnitus[Frecuencia][Central]" class="form-control input-lg"> </td>
                  </tr>
                  <tr>
                    <td>Index</td>
                    <td> <input type="text" name="Tinnitus[Index][Derecho]" class="form-control input-lg"> </td>
                    <td> <input type="text" name="Tinnitus[Index][Izquierdo]" class="form-control input-lg"> </td>
                    <td> <input type="text" name="Tinnitus[Index][Central]" class="form-control input-lg"> </td>
                  </tr>
                </tbody>
              </table>

              <div class="form-group col-md-12">
                <label>Prueba de Inhibición de Tinnitus:</label>
                <textarea name="Tinnitus[Prueba de Inhibición de Tinnitus]" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
              </div>
            </div>


          <?php
        }

        if ($Modulo == "Logoaudiometria Tecnica Americana") {
          ?>

            <div class="col-md-12 row">

              <div class="col-md-4">
                <label>SAT (Oído Derecho)</label>
                <input type="text" name="LogoAudiometria[SAT][Oido Derecho]" class="form-control input-lg" pattern="[^'\x22]+" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)">
              </div>
              <div class="col-md-4">
                <label>SAT (Oído Izquierdo)</label>
                <input type="text" name="LogoAudiometria[SAT][Oido Izquierdo]" class="form-control input-lg" pattern="[^'\x22]+" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)">
              </div>
              <div class="col-md-4">
                <label>SAT (Central)</label>
                <input type="text" name="LogoAudiometria[SAT][Central]" class="form-control input-lg" pattern="[^'\x22]+" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)">
              </div>

              <div class="col-md-4">
                <label>SRT (Oído Derecho)</label>
                <input type="text" name="LogoAudiometria[SRT][Oido Derecho]" class="form-control input-lg" pattern="[^'\x22]+" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)">
              </div>
              <div class="col-md-4">
                <label>SRT (Oído Izquierdo)</label>
                <input type="text" name="LogoAudiometria[SRT][Oido Izquierdo]" class="form-control input-lg" pattern="[^'\x22]+" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)">
              </div>
              <div class="col-md-4">
                <label>SRT (Central)</label>
                <input type="text" name="LogoAudiometria[SRT][Central]" class="form-control input-lg" pattern="[^'\x22]+" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)">
              </div>

              <div class="col-md-4">
                <label>SD (Oído Derecho)</label>
                <input type="text" name="LogoAudiometria[SD][Oido Derecho]" class="form-control input-lg" pattern="[^'\x22]+" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)">
              </div>
              <div class="col-md-4">
                <label>SD (Oído Izquierdo)</label>
                <input type="text" name="LogoAudiometria[SD][Oido Izquierdo]" class="form-control input-lg" pattern="[^'\x22]+" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)">
              </div>
              <div class="col-md-4">
                <label>SD (Central)</label>
                <input type="text" name="LogoAudiometria[SD][Central]" class="form-control input-lg" pattern="[^'\x22]+" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)">
              </div>

              <div class="col-md-4">
                <label>% (Oído Derecho)</label>
                <input type="text" name="LogoAudiometria[%][Oido Derecho]" class="form-control input-lg" pattern="[^'\x22]+" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)">
              </div>
              <div class="col-md-4">
                <label>% (Oído Izquierdo)</label>
                <input type="text" name="LogoAudiometria[%][Oido Izquierdo]" class="form-control input-lg" pattern="[^'\x22]+" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)">
              </div>
              <div class="col-md-4">
                <label>% (Central)</label>
                <input type="text" name="LogoAudiometria[%][Central]" class="form-control input-lg" pattern="[^'\x22]+" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)">
              </div>

              <div class="col-md-4">
                <label>MCL (Oído Derecho)</label>
                <input type="text" name="LogoAudiometria[MCL][Oido Derecho]" class="form-control input-lg" pattern="[^'\x22]+" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)">
              </div>
              <div class="col-md-4">
                <label>MCL (Oído Izquierdo)</label>
                <input type="text" name="LogoAudiometria[MCL][Oido Izquierdo]" class="form-control input-lg" pattern="[^'\x22]+" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)">
              </div>
              <div class="col-md-4">
                <label>MCL (Central)</label>
                <input type="text" name="LogoAudiometria[MCL][Central]" class="form-control input-lg" pattern="[^'\x22]+" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)">
              </div>

              <div class="col-md-4">
                <label>UCL (Oído Derecho)</label>
                <input type="text" name="LogoAudiometria[UCL][Oido Derecho]" class="form-control input-lg" pattern="[^'\x22]+" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)">
              </div>
              <div class="col-md-4">
                <label>UCL (Oído Izquierdo)</label>
                <input type="text" name="LogoAudiometria[UCL][Oido Izquierdo]" class="form-control input-lg" pattern="[^'\x22]+" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)">
              </div>
              <div class="col-md-4">
                <label>UCL (Central)</label>
                <input type="text" name="LogoAudiometria[UCL][Central]" class="form-control input-lg" pattern="[^'\x22]+" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)">
              </div>

            </div>

          <?php
        }
        if ($Modulo == "Logoaudiometria Tecnica Europea") {


          ?>
            <div class="form-group col-md-12" style="padding-left: 40px;padding-right: 40px;">
              <table style="width:100%" class="table">
                <thead>
                  <tr>
                    <th></th>
                    <th>Oído Derecho</th>
                    <th>Oído Izquierdo</th>
                    <th>Central</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>U. de Inteligibilidad</td>
                    <td> <input type="text" name="LogoFrancesa[U. de Inteligibilidad][Derecho]" class="form-control input-lg"> </td>
                    <td> <input type="text" name="LogoFrancesa[U. de Inteligibilidad][Izquierdo]" class="form-control input-lg"> </td>
                    <td> <input type="text" name="LogoFrancesa[U. de Inteligibilidad][Central]" class="form-control input-lg"> </td>
                  </tr>
                  <tr>
                    <td>U. de Discriminación</td>
                    <td> <input type="text" name="LogoFrancesa[U. de Discriminación][Derecho]" class="form-control input-lg"> </td>
                    <td> <input type="text" name="LogoFrancesa[U. de Discriminación][Izquierdo]" class="form-control input-lg"> </td>
                    <td> <input type="text" name="LogoFrancesa[U. de Discriminación][Central]" class="form-control input-lg"> </td>
                  </tr>
                  <tr>
                    <td>% Discriminación</td>
                    <td> <input type="text" name="LogoFrancesa[% Discriminación][Derecho]" class="form-control input-lg"> </td>
                    <td> <input type="text" name="LogoFrancesa[% Discriminación][Izquierdo]" class="form-control input-lg"> </td>
                    <td> <input type="text" name="LogoFrancesa[% Discriminación][Central]" class="form-control input-lg"> </td>
                  </tr>
                </tbody>
              </table>

            </div>

          <?php
        }

        if ($Modulo == "Incapacidad de Tinnitus") {


          ?>
            <style>
              .table>tbody>tr>td {
                vertical-align: middle;
              }
            </style>

            <div class="form-group col-md-12" style="padding-left: 40px;padding-right: 40px;">
              <table style="width:100%" class="table">
                <thead>
                  <tr>
                  <th colspan="2">Aspecto</th>
                  <th>Respuesta</th>
                  </tr>
                </thead>
                <tbody style="text-align:center">

                  <tr>
                    <td colspan="2">Actividades Afectadas</td>
                    <td> <textarea name="IncapacidadTinnitus[Actividades Afectadas]" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea> </td>
                  </tr>
                  <tr>
                    <td rowspan="4">THI</td>
                    <td> Severidad del Tinnitus </td>
                    <td> <input type="text" name="IncapacidadTinnitus[Severidad del Tinnitus]" class="form-control input-lg"> </td>
                  </tr>

                  <tr>
                    <td> Sub Escala Funcional </td>
                    <td> <input type="text" name="IncapacidadTinnitus[Sub Escala Funcional]" class="form-control input-lg"> </td>
                  </tr>

                  <tr>
                    <td> Sub Escala Emocional </td>
                    <td> <input type="text" name="IncapacidadTinnitus[Sub Escala Emocional]" class="form-control input-lg"> </td>
                  </tr>

                  <tr>
                    <td> Sub Escala Catastrófica </td>
                    <td> <input type="text" name="IncapacidadTinnitus[Sub Escala Catastrófica]" class="form-control input-lg"> </td>
                  </tr>


                  <tr>
                    <td rowspan="3">EVA</td>
                    <td> Severidad </td>
                    <td> <input type="text" name="IncapacidadTinnitus[Severidad]" class="form-control input-lg"> </td>
                  </tr>

                  <tr>
                    <td> Molestia </td>
                    <td> <input type="text" name="IncapacidadTinnitus[Molestia]" class="form-control input-lg"> </td>
                  </tr>

                  <tr>
                    <td> Efectos en la Vida </td>
                    <td> <input type="text" name="IncapacidadTinnitus[Efectos en la Vida]" class="form-control input-lg"> </td>
                  </tr>

                  <tr>
                    <td> TQR </td>
                    <td> <input type="text" name="IncapacidadTinnitus[TQR]" class="form-control input-lg"> </td>
                    <td> <input type="text" name="IncapacidadTinnitus[TQR 1]" class="form-control input-lg"> </td>
                  </tr>


                </tbody>
              </table>

            </div>


          <?php
        }

        if ($Modulo == "Desarrollo Conducta Auditiva") {


          ?>
            <style>
              .table>tbody>tr>td {
                vertical-align: middle;
              }
            </style>

            <div class="form-group col-md-12" style="padding-left: 40px;padding-right: 40px;">
              <table style="width:100%" class="table">
                <thead>
                  <tr>
                    <th></th>
                    <th>Instrumento</th>
                    <th>Respuesta</th>
                  </tr>
                </thead>
                <tbody style="text-align:center">
                  <tr>
                    <td>0 - 4 Meses Respuesta Refleja Motora</td>
                    <td> <input type="text" name="ConductaAuditiva[0 - 4 Meses Respuesta Refleja Motora][Instrumento]" class="form-control input-lg"> </td>
                    <td> <input type="text" name="ConductaAuditiva[0 - 4 Meses Respuesta Refleja Motora][Campo Libre]" class="form-control input-lg"> </td>
                  </tr>
                  <tr>
                    <td>3 - 6 Meses Localización en Plano Horizontal</td>
                    <td> <input type="text" name="ConductaAuditiva[3 - 6 Meses Localización en Plano Horizontal][Instrumento]" class="form-control input-lg"> </td>
                    <td> <input type="text" name="ConductaAuditiva[3 - 6 Meses Localización en Plano Horizontal][Campo Libre]" class="form-control input-lg"> </td>
                  </tr>

                  <tr>
                    <td>6 - 13 Meses Localización Plano Inferior </td>
                    <td> <input type="text" name="ConductaAuditiva[6 - 13 Meses Localización Plano Inferior][Instrumento]" class="form-control input-lg"> </td>
                    <td> <input type="text" name="ConductaAuditiva[6 - 13 Meses Localización Plano Inferior][Campo Libre]" class="form-control input-lg"> </td>
                  </tr>

                  <tr>
                    <td>13 - 20 Meses Localización en Plano Superior</td>
                    <td> <input type="text" name="ConductaAuditiva[13 - 20 Meses Localización en Plano Superior][Instrumento]" class="form-control input-lg"> </td>
                    <td> <input type="text" name="ConductaAuditiva[13 - 20 Meses Localización en Plano Superior][Campo Libre]" class="form-control input-lg"> </td>
                  </tr>

                  <tr>
                    <td>20 - 24 Meses Localización en Todos los Planos</td>
                    <td> <input type="text" name="ConductaAuditiva[20 - 24 Meses Localización en Todos los Planos][Instrumento]" class="form-control input-lg"> </td>
                    <td> <input type="text" name="ConductaAuditiva[20 - 24 Meses Localización en Todos los Planos][Campo Libre]" class="form-control input-lg"> </td>
                  </tr>
                </tbody>
              </table>

              <hr style="border-top-color: #3c8dbc;">

              <table style="width:100%" class="table">
                <thead>
                  <tr>
                    <th></th>
                    <th>Respuesta</th>
                  </tr>
                </thead>
                <tbody style="text-align:center">
                  <tr>
                    <td>Graves (Cucú-Mumú)</td>
                    <td> <input type="text" name="ConductaAuditiva_1[Graves (Cucú-Mumú)][Respuesta]" class="form-control input-lg"> </td>
                  </tr>
                  <tr>
                    <td>Medios (Papa-Lala)</td>
                    <td> <input type="text" name="ConductaAuditiva_1[Medios (Papa-Lala)][Respuesta]" class="form-control input-lg"> </td>
                  </tr>
                  <tr>
                    <td>Agudos (Sisi-Shishi)</td>
                    <td> <input type="text" name="ConductaAuditiva_1[Agudos (Sisi-Shishi)][Respuesta]" class="form-control input-lg"> </td>
                  </tr>
                  <tr>
                    <td>Reacción al Nombre y Partes del Cuerpo</td>
                    <td> <input type="text" name="ConductaAuditiva_1[Reacción al Nombre y Partes del Cuerpo][Respuesta]" class="form-control input-lg"> </td>
                  </tr>
                </tbody>
              </table>

              <hr style="border-top-color: #3c8dbc;">

              <table style="width:100%" class="table">
                <tbody style="text-align:center">
                  <tr>
                    <td>Reacción Ocular</td>
                    <td> <input type="text" name="ConductaAuditiva_2[Reacción Ocular][l]" class="form-control input-lg"> </td>
                  </tr>
                  <tr>
                    <td>Excitación</td>
                    <td> <input type="text" name="ConductaAuditiva_2[Excitación][l]" class="form-control input-lg"> </td>
                  </tr>
                  <tr>
                    <td>Detección de Actividad</td>
                    <td> <input type="text" name="ConductaAuditiva_2[Detección de Actividad][l]" class="form-control input-lg"> </td>
                  </tr>
                  <tr>
                    <td>Cefalogiro</td>
                    <td> <input type="text" name="ConductaAuditiva_2[Cefalogiro][l]" class="form-control input-lg"> </td>
                  </tr>
                  <tr>
                    <td>Ubicación de Fuente Sonora</td>
                    <td> <input type="text" name="ConductaAuditiva_2[Ubicación de Fuente Sonora][l]" class="form-control input-lg"> </td>
                  </tr>
                </tbody>
              </table>

              <hr style="border-top-color: #3c8dbc;">

              <table style="width:100%" class="table">
                <tbody style="text-align:center">
                  <tr>
                    <td>Confiabilidad</td>
                    <td><Select name="ConductaAuditiva_3[Confiabilidad][l]" class="form-control input-lg">
                        <option value="">Seleccione</option>
                        <option>Buena</option>
                        <option>Regular</option>
                        <option>Mala</option>
                      </Select></td>
                  </tr>
                  <tr>
                    <td>Diagnóstico</td>
                    <td>
                      <textarea name="ConductaAuditiva_3[Diagnóstico][l]" class="form-control input-lg"></textarea>
                    </td>
                  </tr>
                  <tr>
                    <td>Recomendaciones</td>
                    <td>
                      <textarea name="ConductaAuditiva_3[Recomendaciones][l]" class="form-control input-lg"></textarea>
                    </td>
                  </tr>
                </tbody>
              </table>

              <hr style="border-top-color: #3c8dbc;">

              <center><strong><b> Valoración Pediátrica </b></strong></center> <br>

              <table style="width:100%" class="table">
                <thead>
                  <tr>
                    <th>Frecuencia</th>
                    <th>250</th>
                    <th>500</th>
                    <th>2000</th>
                    <th>3000</th>
                    <th>4000</th>
                    <th>6000</th>
                  </tr>
                </thead>
                <tbody style="text-align:center">
                  <tr>
                    <td>Oído Derecho</td>
                    <td> <input type="text" name="ConductaAuditiva_4[Oído Derecho][250]" class="form-control input-lg"> </td>
                    <td> <input type="text" name="ConductaAuditiva_4[Oído Derecho][500]" class="form-control input-lg"> </td>
                    <td> <input type="text" name="ConductaAuditiva_4[Oído Derecho][2000]" class="form-control input-lg"> </td>
                    <td> <input type="text" name="ConductaAuditiva_4[Oído Derecho][3000]" class="form-control input-lg"> </td>
                    <td> <input type="text" name="ConductaAuditiva_4[Oído Derecho][4000]" class="form-control input-lg"> </td>
                    <td> <input type="text" name="ConductaAuditiva_4[Oído Derecho][6000]" class="form-control input-lg"> </td>
                  </tr>
                  <tr>
                    <td>Oído Izquierdo</td>
                    <td> <input type="text" name="ConductaAuditiva_4[Oído Izquierdo][250]" class="form-control input-lg"> </td>
                    <td> <input type="text" name="ConductaAuditiva_4[Oído Izquierdo][500]" class="form-control input-lg"> </td>
                    <td> <input type="text" name="ConductaAuditiva_4[Oído Izquierdo][2000]" class="form-control input-lg"> </td>
                    <td> <input type="text" name="ConductaAuditiva_4[Oído Izquierdo][3000]" class="form-control input-lg"> </td>
                    <td> <input type="text" name="ConductaAuditiva_4[Oído Izquierdo][4000]" class="form-control input-lg"> </td>
                    <td> <input type="text" name="ConductaAuditiva_4[Oído Izquierdo][6000]" class="form-control input-lg"> </td>
                  </tr>
                  <tr>
                    <td>Conducción Ósea</td>
                    <td> <input type="text" name="ConductaAuditiva_4[Conducción Ósea][250]" class="form-control input-lg"> </td>
                    <td> <input type="text" name="ConductaAuditiva_4[Conducción Ósea][500]" class="form-control input-lg"> </td>
                    <td> <input type="text" name="ConductaAuditiva_4[Conducción Ósea][2000]" class="form-control input-lg"> </td>
                    <td> <input type="text" name="ConductaAuditiva_4[Conducción Ósea][3000]" class="form-control input-lg"> </td>
                    <td> <input type="text" name="ConductaAuditiva_4[Conducción Ósea][4000]" class="form-control input-lg"> </td>
                    <td> <input type="text" name="ConductaAuditiva_4[Conducción Ósea][6000]" class="form-control input-lg"> </td>
                  </tr>
                  <tr>
                    <td>Campo Libre</td>
                    <td> <input type="text" name="ConductaAuditiva_4[Campo Libre][250]" class="form-control input-lg"> </td>
                    <td> <input type="text" name="ConductaAuditiva_4[Campo Libre][500]" class="form-control input-lg"> </td>
                    <td> <input type="text" name="ConductaAuditiva_4[Campo Libre][2000]" class="form-control input-lg"> </td>
                    <td> <input type="text" name="ConductaAuditiva_4[Campo Libre][3000]" class="form-control input-lg"> </td>
                    <td> <input type="text" name="ConductaAuditiva_4[Campo Libre][4000]" class="form-control input-lg"> </td>
                    <td> <input type="text" name="ConductaAuditiva_4[Campo Libre][6000]" class="form-control input-lg"> </td>
                  </tr>
                </tbody>
              </table>

              <hr style="border-top-color: #3c8dbc;">

              <table style="width:100%" class="table">
                <tbody style="text-align:center">
                  <tr>
                    <td>Estímulo</td>
                    <td><Select name="ConductaAuditiva_5[Estímulo][l]" class="form-control input-lg">
                        <option value="">Seleccione</option>
                        <option>Tonos puros</option>
                        <option>Tonos modulados</option>
                        <option>Ruido enmascarante</option>
                      </Select></td>
                    <td>Técnica</td>
                    <td><Select name="ConductaAuditiva_5[Técnica][l]" class="form-control input-lg">
                        <option value="">Seleccione</option>
                        <option>BOA</option>
                        <option>Audiometría condicionada</option>
                      </Select></td>
                  </tr>

                </tbody>
              </table>

              <hr style="border-top-color: #3c8dbc;">

              <table style="width:100%" class="table">
                <thead>
                  <tr>
                    <th></th>
                    <th>Nivel de Detección de Voz</th>
                    <th>Nivel de Recepción de la Palabra</th>
                  </tr>
                </thead>
                <tbody style="text-align:center">
                  <tr>
                    <td>Oído Derecho</td>
                    <td> <input type="text" name="ConductaAuditiva_6[Oído Derecho][Nivel de Detección de Voz]" class="form-control input-lg"> </td>
                    <td> <input type="text" name="ConductaAuditiva_6[Oído Derecho][Nivel de Recepción de la Palabra]" class="form-control input-lg"> </td>
                  </tr>
                  <tr>
                    <td>Oído Izquierdo</td>
                    <td> <input type="text" name="ConductaAuditiva_6[Oído Izquierdo][Nivel de Detección de Voz]" class="form-control input-lg"> </td>
                    <td> <input type="text" name="ConductaAuditiva_6[Oído Izquierdo][Nivel de Recepción de la Palabra]" class="form-control input-lg"> </td>
                  </tr>
                  <tr>
                    <td>Conducción Ósea</td>
                    <td> <input type="text" name="ConductaAuditiva_6[Conducción Ósea][Nivel de Detección de Voz]" class="form-control input-lg"> </td>
                    <td> <input type="text" name="ConductaAuditiva_6[Conducción Ósea][Nivel de Recepción de la Palabra]" class="form-control input-lg"> </td>
                  </tr>
                  <tr>
                    <td>Campo Libre</td>
                    <td> <input type="text" name="ConductaAuditiva_6[Campo Libre][Nivel de Detección de Voz]" class="form-control input-lg"> </td>
                    <td> <input type="text" name="ConductaAuditiva_6[Campo Libre][Nivel de Recepción de la Palabra]" class="form-control input-lg"> </td>
                  </tr>
                </tbody>
              </table>

              <hr style="border-top-color: #3c8dbc;">

              <table style="width:100%" class="table">
                <tbody style="text-align:center">
                  <tr>
                    <td>Confiabilidad</td>
                    <td><Select name="ConductaAuditiva_7[Confiabilidad][l]" class="form-control input-lg">
                        <option value="">Seleccione</option>
                        <option>Buena</option>
                        <option>Regular</option>
                        <option>Mala</option>
                      </Select></td>
                  </tr>
                  <tr>
                    <td>Diagnóstico</td>
                    <td>
                      <textarea name="ConductaAuditiva_7[Diagnóstico][l]" class="form-control input-lg"></textarea>
                    </td>
                  </tr>
                  <tr>
                    <td>Recomendaciones</td>
                    <td>
                      <textarea name="ConductaAuditiva_7[Recomendaciones][l]" class="form-control input-lg"></textarea>
                    </td>
                  </tr>
                </tbody>
              </table>

              <hr style="border-top-color: #3c8dbc;">

            </div>


          <?php
        }

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        if ($Modulo == "Antecedentes Personales Audiologicos") {

          echo "<div class='form-group col-md-12' style='padding-left: 40px;padding-right: 40px;'> <table style='width:100%;' class='table'>";

          $header_tabla = ["Antecedentes Personales", "Si", "No", "Descripción"];
          $header_tabla_estilos = ["width:30%;", "width:10%;", "width:10%;", "width:50%;"];
          $columnas_tabla = ["Hipertensión Arterial", "Diabetes", "Dislipidemia", "Enfermedad Renal", "Trastornos Tiroideos", "Meningitis", "Cáncer", "Virales", "Infecciosas", "Tratamientos con Ototóxicos", "Otros", "Antecedentes Familiares"];
          echo "<thead><tr>";
          foreach ($header_tabla as $key => $value) {
            echo "<th style='{$header_tabla_estilos[$key]}'>{$value}</th>";
          }
          echo "</tr></thead>";
          echo "<tbody>";

          foreach ($columnas_tabla as $key => $value) {
            echo "<tr><td>{$value}</td>";
            for ($i = 1, $Tamano = count($header_tabla); $i < $Tamano; $i++) {
              $span = $columnas_tabla_span[$value][$i];
              if ($span == "") {
                $span = 1;
              }
              echo "<td><input type='text' name='AntecedentesPersonalesAudiologicos[{$value}][{$columnas_tabla[$i]}][$span]'  class='form-control input-lg'></td>";
            }
          }

          echo "</tbody></table></div>";
        }

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        if ($Modulo == "Antecedentes Otologicos") {
          echo "<div class='form-group col-md-12' style='padding-left: 40px;padding-right: 40px;'> <table style='width:100%;' class='table'>";

          $header_tabla = ["Antecedentes Otológicos", "Si", "No", "Oído Derecho", "Oído Izquierdo", "Descripción"];
          $header_tabla_estilos = ["width:30%;", "width:10%;", "width:10%;", "width:10%;", "width:10%;", "width:50%;"];

          $columnas_tabla = ["Otitis", "Otalgia", "Otorrea/Otorragia", "Tinnitus", "Plenitud Aural", "Sensación de Oído Tapado", "Vértigo", "Cirugía de Oído", "Traumas", "Otros"];
          $columnas_tabla_span["Otros"] = ["1", "0", "0", "0", "0", "5"];

          echo "<thead><tr>";
          foreach ($header_tabla as $key => $value) {
            echo "<th style='{$header_tabla_estilos[$key]}'>{$value}</th>";
          }
          echo "</tr></thead>";
          echo "<tbody>";

          foreach ($columnas_tabla as $key => $value) {
            echo "<tr><td>{$value}</td>";
            for ($i = 1, $Tamano = count($header_tabla); $i < $Tamano; $i++) {
              $span = $columnas_tabla_span[$value][$i];
              if ($span == "") {
                $span = 1;
              }

              if ($span <> "0") {
                echo "<td colspan='{$span}'><input type='text' name='AntecedentesOtologicos[{$value}][{$header_tabla[$i]}][$span]'  class='form-control input-lg'></td>";
              }
            }
          }
          echo "</tbody></table></div>";
        }

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        if ($Modulo == "Caracteristicas Subjetivas Audicion") {
          echo "<div class='form-group col-md-12' style='padding-left: 40px;padding-right: 40px;'> <table style='width:100%;' class='table'>";

          $header_tabla = ["Características Subjetivas de la Audición", "Si", "No", "Descripción"];
          $header_tabla_estilos = ["width:30%;", "width:10%;", "width:10%;", "width:50%;"];

          $columnas_tabla = ["¿Cree que oye bien?", "¿Oye mejor por un oído?", "¿Le molestan los ruidos fuertes?", "¿Oye bien el timbre de la casa?", "¿Oye bien el timbre del teléfono?", "¿Oye bien las conversaciones telefónicas?", "¿Oye bien en sitios públicos?", "¿Oye bien en reuniones?"];
          //$columnas_tabla_span["Otros"]=["1","0","0","0","0","5"];

          echo "<thead><tr>";
          foreach ($header_tabla as $key => $value) {
            echo "<th style='{$header_tabla_estilos[$key]}'>{$value}</th>";
          }
          echo "</tr></thead>";
          echo "<tbody>";

          foreach ($columnas_tabla as $key => $value) {
            echo "<tr><td>{$value}</td>";
            for ($i = 1, $Tamano = count($header_tabla); $i < $Tamano; $i++) {
              $span = $columnas_tabla_span[$value][$i];
              if ($span == "") {
                $span = 1;
              }

              if ($span <> "0") {
                echo "<td colspan='{$span}'><input type='text' name='CaracteristicasSubjetivasAudicion[{$value}][{$header_tabla[$i]}][$span]'  class='form-control input-lg'></td>";
              }
            }
          }
          echo "</tbody></table></div>";
        }

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        if ($Modulo == "Antecedentes Laborales Audiologia") {
          echo "<div class='form-group col-md-12' style='padding-left: 40px;padding-right: 40px;'> <table style='width:100%;' class='table'>";

          $header_tabla = ["Antecedentes Laborales", "Si", "No", "Descripción"];
          $header_tabla_estilos = ["width:30%;", "width:10%;", "width:10%;", "width:50%;"];

          $columnas_tabla = ["Exposición a Ruido", "Uso de Protección Auditiva", "Exposición a Químicos", "Cambios de Presión Atmosférica", "Cambios de Temperatura"];
          //$columnas_tabla_span["Otros"]=["1","0","0","0","0","5"];

          echo "<thead><tr>";
          foreach ($header_tabla as $key => $value) {
            echo "<th style='{$header_tabla_estilos[$key]}'>{$value}</th>";
          }
          echo "</tr></thead>";
          echo "<tbody>";

          foreach ($columnas_tabla as $key => $value) {
            echo "<tr><td>{$value}</td>";
            for ($i = 1, $Tamano = count($header_tabla); $i < $Tamano; $i++) {
              $span = $columnas_tabla_span[$value][$i];
              if ($span == "") {
                $span = 1;
              }

              if ($span <> "0") {
                echo "<td colspan='{$span}'><input type='text' name='AntecedentesLaboralesAudiologia[{$value}][{$header_tabla[$i]}][$span]'  class='form-control input-lg'></td>";
              }
            }
          }
          echo "</tbody></table></div>";
        }

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        if ($Modulo == "Habitos Audiologia") {
          echo "<div class='form-group col-md-12' style='padding-left: 40px;padding-right: 40px;'> <table style='width:100%;' class='table'>";

          $header_tabla = ["Hábitos", "Si", "No", "Descripción"];
          $header_tabla_estilos = ["width:30%;", "width:10%;", "width:10%;", "width:50%;"];

          $columnas_tabla = ["Uso Frecuente de Reproductores de Sonido", "Consumo de Alcohol", "Consumo de Tabaco", "Sustancias Alucinógenas"];
          //$columnas_tabla_span["Otros"]=["1","0","0","0","0","5"];

          echo "<thead><tr>";
          foreach ($header_tabla as $key => $value) {
            echo "<th style='{$header_tabla_estilos[$key]}'>{$value}</th>";
          }
          echo "</tr></thead>";
          echo "<tbody>";

          foreach ($columnas_tabla as $key => $value) {
            echo "<tr><td>{$value}</td>";
            for ($i = 1, $Tamano = count($header_tabla); $i < $Tamano; $i++) {
              $span = $columnas_tabla_span[$value][$i];
              if ($span == "") {
                $span = 1;
              }

              if ($span <> "0") {
                echo "<td colspan='{$span}'><input type='text' name='HabitosAudiologia[{$value}][{$header_tabla[$i]}][$span]'  class='form-control input-lg'></td>";
              }
            }
          }
          echo "</tbody></table></div>";
        }

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        if ($Modulo == "Antecedentes Extralaborales Audiologia") {
          echo "<div class='form-group col-md-12' style='padding-left: 40px;padding-right: 40px;'> <table style='width:100%;' class='table'>";

          $header_tabla = ["Antecedentes Extralaborales", "Si", "No", "Descripción"];
          $header_tabla_estilos = ["width:30%;", "width:10%;", "width:10%;", "width:50%;"];

          $columnas_tabla = ["Práctica de Tiro o Caza", "Uso de Motocicleta", "Discotecas o Espectáculos Ruidosos", "Tejo u Otro Deporte Ruidoso", "Natación o Buceo", "Aviación o Aeromodelismo"];
          $columnas_tabla_span["Otros"]=["1","0","0","0","0","4"];

          echo "<thead><tr>";
          foreach ($header_tabla as $key => $value) {
            echo "<th style='{$header_tabla_estilos[$key]}'>{$value}</th>";
          }
          echo "</tr></thead>";
          echo "<tbody>";

          foreach ($columnas_tabla as $key => $value) {
            echo "<tr><td>{$value}</td>";
            for ($i = 1, $Tamano = count($header_tabla); $i < $Tamano; $i++) {
              $span = $columnas_tabla_span[$value][$i];
              if ($span == "") {
                $span = 1;
              }

              if ($span <> "0") {
                echo "<td colspan='{$span}'><input type='text' name='AntecedentesExtralaboralesAudiologia[{$value}][{$header_tabla[$i]}][$span]'  class='form-control input-lg'></td>";
              }
            }
          }
          echo "</tbody></table></div>";
        }

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        if ($Modulo == "Antecedentes Extralaborales Audiologia 2") {
          echo "<div class='form-group col-md-12' style='padding-left: 40px;padding-right: 40px;'> <table style='width:100%;' class='table'>";

          $header_tabla = ["Otoscopia", "Oído Derecho", "Oído Izquierdo"];
          $header_tabla_estilos = ["width:30%;", "width:35%;", "width:35%;"];

          $columnas_tabla = ["Pabellón Auricular", "Conducto Auditivo Externo", "Membrana Timpánica", "Observaciones"];
          $columnas_tabla_span["Otros"]=["1","0","0","0","0","5"];

          echo "<thead><tr>";
          foreach ($header_tabla as $key => $value) {
            echo "<th style='{$header_tabla_estilos[$key]}'>{$value}</th>";
          }
          echo "</tr></thead>";
          echo "<tbody>";

          foreach ($columnas_tabla as $key => $value) {
            echo "<tr><td>{$value}</td>";
            for ($i = 1, $Tamano = count($header_tabla); $i < $Tamano; $i++) {
              $span = $columnas_tabla_span[$value][$i];
              if ($span == "") {
                $span = 1;
              }

              if ($span <> "0") {
                echo "<td colspan='{$span}'><input type='text' name='AntecedentesExtralaboralesAudiologia_2[{$value}][{$header_tabla[$i]}][$span]'  class='form-control input-lg'></td>";
              }
            }
          }
          echo "</tbody></table></div>";
        }

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        if ($Modulo == "Anamnesis Tinnitus") {

          $n_arr = "AnamnesisTinnitus";
          $filtro[0] = "class='form-control input-lg' maxlength='120' oninput='if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'"; //input
          $filtro[1] = "class='form-control select2' style='width: 100%;'"; //select
          $filtro[2] = "class='form-control input-lg' style='width: 100%; min-height: 60px;height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;max-width: 100%;'"; //textarea 
          $Inputs = array(
            "Su Tinnitus está localizado en:" => array(
              "Nombre" => "{$n_arr}[Su Tinnitus está localizado en]",
              "Tipo"  => "select",
              "Valor" => "Oído derecho|Oído izquierdo|Ambos oídos|Cabeza|Sin localización",
              "Filtro" => "{$filtro[1]}",
              "Tamano" => "6"
            ),
            "¿Cuál es el peor?" => array(
              "Nombre" => "{$n_arr}[¿Cuál es el peor?]",
              "Tipo"  => "text",
              "Valor" => "",
              "Filtro" => "{$filtro[0]}",
              "Tamano" => "6"
            ),
            "¿Hace cuánto tiempo percibe usted su Tinnitus? " => array(
              "Nombre" => "{$n_arr}[¿Hace cuánto tiempo percibe usted su Tinnitus?]",
              "Tipo"  => "select",
              "Valor" => "Días|Semanas|Meses|Años",
              "Filtro" => "{$filtro[1]}",
              "Tamano" => "12"
            ),
            "¿Cómo fue la aparición de su Tinnitus? " => array(
              "Nombre" => "{$n_arr}[¿Cómo fue la aparición de su Tinnitus?]",
              "Tipo"  => "select",
              "Valor" => "Súbita|Gradual",
              "Filtro" => "{$filtro[1]}",
              "Tamano" => "12"
            ),
            "Por favor caracterice el ruido:" => array(
              "Nombre" => "{$n_arr}[Por favor caracterice el ruido][]",
              "Tipo"  => "select",
              "Valor" => "Zumbido|Silbido|Voces|Sonido de océano|Latido de corazón|Campanas|Grillos|Golpe de piedras|Pitos|Otros",
              "Filtro" => "{$filtro[1]} multiple",
              "Tamano" => "6"
            ),
            "Describa" => array(
              "Nombre" => "{$n_arr}[Por favor caracterice el ruido][Describa]",
              "Tipo"  => "text",
              "Valor" => "",
              "Filtro" => "{$filtro[0]}",
              "Tamano" => "6"
            ),
            "¿El ruido es igual para ambos oídos?" => array(
              "Nombre" => "{$n_arr}[¿El ruido es igual para ambos oídos?]",
              "Tipo"  => "select",
              "Valor" => "Si|No",
              "Filtro" => "{$filtro[1]}",
              "Tamano" => "12"
            ),
            "¿Cuándo se convirtió el Tinnitus en una molestia por primera vez?" => array(
              "Nombre" => "{$n_arr}[¿Cuándo se convirtió el Tinnitus en una molestia por primera vez?]",
              "Tipo"  => "textarea",
              "Valor" => "",
              "Filtro" => "{$filtro[2]}",
              "Tamano" => "12"
            ),
            "¿En qué circunstancias comenzó a padecer de su Tinnitus?" => array(
              "Nombre" => "{$n_arr}[¿En qué circunstancias comenzó a padecer de su Tinnitus?]",
              "Tipo"  => "textarea",
              "Valor" => "¿A qué lo atribuye?",
              "Filtro" => "{$filtro[2]}",
              "Tamano" => "12"
            ),
            "¿Su Tinnitus fluctúa de volumen?" => array(
              "Nombre" => "{$n_arr}[¿Su Tinnitus fluctúa de volumen?]",
              "Tipo"  => "select",
              "Valor" => "Si|No",
              "Filtro" => "{$filtro[1]}",
              "Tamano" => "6"
            ),
            "Su Tinnitus es:" => array(
              "Nombre" => "{$n_arr}[Su Tinnitus es]",
              "Tipo"  => "select",
              "Valor" => "Intermitente|Constante",
              "Filtro" => "{$filtro[1]}",
              "Tamano" => "6"
            ),
            "¿Existen días peores ?" => array(
              "Nombre" => "{$n_arr}[¿Existen días peores?]",
              "Tipo"  => "select",
              "Valor" => "Si|No",
              "Filtro" => "{$filtro[1]}",
              "Tamano" => "6"
            ),
            "¿Su Tinnitus ha cambiado ese desde su primera aparición?" => array(
              "Nombre" => "{$n_arr}[¿Su Tinnitus ha cambiado ese desde su primera aparición?]",
              "Tipo"  => "select",
              "Valor" => "Si|No",
              "Filtro" => "{$filtro[1]}",
              "Tamano" => "6"
            ),
            "¿Su Tinnitus es episódico? (Viene y se va)" => array(
              "Nombre" => "{$n_arr}[¿Su Tinnitus es episódico? (Viene y se va)]",
              "Tipo"  => "select",
              "Valor" => "Si|No",
              "Filtro" => "{$filtro[1]}",
              "Tamano" => "6"
            ),
            "¿Su Tinnitus ocurre con mayor frecuencia en un tiempo específico del día?" => array(
              "Nombre" => "{$n_arr}[¿Su Tinnitus ocurre con mayor frecuencia en un tiempo específico del día?][]",
              "Tipo"  => "select",
              "Valor" => "Mañana|Tarde|Noche|Ninguno",
              "Filtro" => "{$filtro[1]} multiple",
              "Tamano" => "6"
            ),
            "¿Hay alguna actividad que haga que el Tinnitus sea peor, si su respuesta es si describa:" => array(
              "Nombre" => "{$n_arr}[¿Hay alguna actividad que haga que el Tinnitus sea peor?][]",
              "Tipo"  => "select",
              "Valor" => "Si|No",
              "Filtro" => "{$filtro[1]}",
              "Tamano" => "12"
            ),
            "Si su respuesta es si Describa" => array(
              "Nombre" => "{$n_arr}[¿Hay alguna actividad que haga que el Tinnitus sea peor?][Describa]",
              "Tipo"  => "textarea",
              "Valor" => "",
              "Filtro" => "{$filtro[2]}",
              "Tamano" => "12"
            ),
            "¿Su Tinnitus empeora cuando está estresado?" => array(
              "Nombre" => "{$n_arr}[¿Su Tinnitus empeora cuando está estresado?]",
              "Tipo"  => "select",
              "Valor" => "Si|No",
              "Filtro" => "{$filtro[1]}",
              "Tamano" => "6"
            ),
            "¿Su Tinnitus empeora cuando está cansado?" => array(
              "Nombre" => "{$n_arr}[¿Su Tinnitus empeora cuando está cansado?]",
              "Tipo"  => "select",
              "Valor" => "Si|No",
              "Filtro" => "{$filtro[1]}",
              "Tamano" => "6"
            ),
            "¿Existe alguna cosa que usted pueda hacer para disminuir el ruido o hacerlo irse?" => array(
              "Nombre" => "{$n_arr}[¿Existe alguna cosa que usted pueda hacer para disminuir el ruido o hacerlo irse?][]",
              "Tipo"  => "select",
              "Valor" => "Si|No",
              "Filtro" => "{$filtro[1]}",
              "Tamano" => "12"
            ),
            "Si su respuesta es 'SI', describa: " => array(
              "Nombre" => "{$n_arr}[¿Existe alguna cosa que usted pueda hacer para disminuir el ruido o hacerlo irse?][Describa]",
              "Tipo"  => "textarea",
              "Valor" => "",
              "Filtro" => "{$filtro[2]}",
              "Tamano" => "12"
            ),
            "¿Qué medicamentos o tratamientos ha utilizado  para controlar el ruido?" => array(
              "Nombre" => "{$n_arr}[¿Qué medicamentos o tratamientos ha utilizado  para controlar el ruido?]",
              "Tipo"  => "textarea",
              "Valor" => "",
              "Filtro" => "{$filtro[2]}",
              "Tamano" => "12"
            ),
            "¿Qué tratamientos ha intentado para el Tinnitus?" => array(
              "Nombre" => "{$n_arr}[¿Qué tratamientos ha intentado para el Tinnitus?][]",
              "Tipo"  => "select",
              "Valor" => "Audífono|Enmascarador|Terapia musical|Terapia de reentrenamiento TRT|Asistencia Psicológica|Otros",
              "Filtro" => "{$filtro[1]} multiple",
              "Tamano" => "6"
            ),
            "Cuál" => array(
              "Nombre" => "{$n_arr}[¿Qué tratamientos ha intentado para el Tinnitus?][Cuál]",
              "Tipo"  => "text",
              "Valor" => "",
              "Filtro" => "{$filtro[0]}",
              "Tamano" => "6"
            ),
            "¿Qué resultados obtuvo con esos tratamientos?" => array(
              "Nombre" => "{$n_arr}[¿Qué resultados obtuvo con esos tratamientos?]",
              "Tipo"  => "textarea",
              "Valor" => "",
              "Filtro" => "{$filtro[2]}",
              "Tamano" => "12"
            ),
            "¿Alguien más de su familia tiene Tinnitus?" => array(
              "Nombre" => "{$n_arr}[¿Alguien más de su familia tiene Tinnitus?]",
              "Tipo"  => "select",
              "Valor" => "Si|No",
              "Filtro" => "{$filtro[1]}",
              "Tamano" => "6"
            ),
            "¿Usted considera que su Tinnitus interfiere con su calidad de escucha?" => array(
              "Nombre" => "{$n_arr}[¿Usted considera que su Tinnitus interfiere con su calidad de escucha?]",
              "Tipo"  => "select",
              "Valor" => "Si|No",
              "Filtro" => "{$filtro[1]}",
              "Tamano" => "6"
            ),
            "Comentarios" => array(
              "Nombre" => "{$n_arr}[Comentarios]",
              "Tipo"  => "textarea",
              "Valor" => "",
              "Filtro" => "{$filtro[2]}",
              "Tamano" => "12"
            )

          );

          echo Tabla_Campos_Dinamico($Inputs, "<div class='form-group col-md-12 row' style='padding-left: 40px;padding-right: 40px;'>");
        }


        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


        if ($Modulo == "Cuestionario Reacciones Tinnitus") {
          ?>

            <script type="text/javascript">
              function Puntaje_Cuestionario() {
                elementos = document.getElementsByClassName("Puntaje_1");
                var n_0 = 0;
                var n_1 = 0;
                var n_2 = 0;
                var n_3 = 0;
                var n_4 = 0;
                var n_5 = 0;
                var text = "";
                console.log(elementos);

                for (x in elementos) {
                  //text += elementos[x].value + " ";
                  switch (elementos[x].value) {
                    case '0':
                      n_0 = n_0 + 1;
                      break;
                    case '1':
                      n_1 = n_1 + 1;
                      break;
                    case '2':
                      n_2 = n_2 + 1;
                      break;
                    case '3':
                      n_3 = n_3 + 1;
                      break;
                    case '4':
                      n_4 = n_4 + 1;
                      break;

                  }
                }

                document.getElementById("Puntaje_0").value = n_0;
                document.getElementById("Puntaje_1").value = n_1;
                document.getElementById("Puntaje_2").value = n_2;
                document.getElementById("Puntaje_3").value = n_3;
                document.getElementById("Puntaje_4").value = n_4;
                document.getElementById("Puntaje_5").value = n_0 + n_1 + n_2 + n_3 + n_4;

              }
            </script>
            <?php

            $n_arr = "CuestionarioReaccionesTinnitus";
            $filtro[0] = "class='form-control input-lg' maxlength='120' oninput='if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'"; //input
            $filtro[1] = "class='form-control select2' style='width: 100%;'"; //select
            $filtro[2] = "class='form-control input-lg' style='width: 100%; min-height: 60px;height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;max-width: 100%;'"; //textarea 
            $filtro[3] = "class='form-control select2 Puntaje_1' style='width: 100%;'"; //select

            $Inputs = array(
              "Escala Visual Análoga del Tinnitus" => array(
                "Tipo"  => "titulo",
                "Tamano" => "12"
              ),
              "Evalúe su tinnitus en una escala de 0 a 10.  Por favor no tenga en cuenta otros problemas de audición al responder estas preguntas" => array(
                "Tipo"  => "subtitulo",
                "Tamano" => "12"
              ),
              "¿Qué tan fuerte fue su  tinnitus, en promedio, durante el último mes? '0' sería  'sin tinnitus' y '10' sería  tan fuerte como un disparo" => array(
                "Nombre" => "{$n_arr}[¿Qué tan fuerte fue su  tinnitus, en promedio, durante el último mes? 0 sería  sin tinnitus y 10 sería  tan fuerte como un dispa.]",
                "Tipo"  => "select",
                "Valor" => "1|2|3|4|5|6|7|8|9|10",
                "Filtro" => "{$filtro[1]}",
                "Tamano" => "12"
              ),
              "¿Cuánto le ha molestado su tinnitus, en promedio, en el último mes? '0' sería  'nada de molestia' y 10 sería  'tan molesto como se puede imaginar'." => array(
                "Nombre" => "{$n_arr}[¿Cuánto le ha molestado su tinnitus, en promedio, en el último mes? 0 sería  nada de molestia y 10 sería  tan molesto como se puede imaginar.]",
                "Tipo"  => "select",
                "Valor" => "1|2|3|4|5|6|7|8|9|10",
                "Filtro" => "{$filtro[1]}",
                "Tamano" => "12"
              ),
              "¿Cuánto efecto o impacto tuvo su tinnitus en su vida, en promedio, en el último mes? '0' sería  'nada ha cambiado' y '10' sería  'todo ha cambiado'." => array(
                "Nombre" => "{$n_arr}[¿Cuánto efecto o impacto tuvo su tinnitus en su vida, en promedio, en el último mes? 0 sería  nada ha cambiado y 10 sería  todo ha cambiado.]",
                "Tipo"  => "select",
                "Valor" => "1|2|3|4|5|6|7|8|9|10",
                "Filtro" => "{$filtro[1]}",
                "Tamano" => "12"
              ),
              "¿Qué porcentaje de tiempo está presente su tinnitus dentro del tiempo consiente?" => array(
                "Nombre" => "{$n_arr}[¿Qué porcentaje de tiempo está presente su tinnitus dentro del tiempo consiente?]",
                "Tipo"  => "text",
                "Valor" => "",
                "Filtro" => "{$filtro[0]}",
                "Tamano" => "6"
              ),
              "¿Que porcentaje de tiempo está ausente su tinnitus dentro del tiempo consiente?" => array(
                "Nombre" => "{$n_arr}[¿Que porcentaje de tiempo está ausente su tinnitus dentro del tiempo consiente?]",
                "Tipo"  => "text",
                "Valor" => "",
                "Filtro" => "{$filtro[0]}",
                "Tamano" => "6"
              ),
              "Señale que actividades se ven  afectadas por el tinnitus" => array(
                "Nombre" => "{$n_arr}[Señale que actividades se ven  afectadas por el tinnitus][]",
                "Tipo"  => "select",
                "Valor" => "Concentración|Deportes|Sueño|Vida social|Trabajo|Restaurantes|Otros",
                "Filtro" => "{$filtro[1]}",
                "Tamano" => "6"
              ),
              "Cuáles?" => array(
                "Nombre" => "{$n_arr}[Señale que actividades se ven  afectadas por el tinnitus][Cuáles]",
                "Tipo"  => "text",
                "Valor" => "",
                "Filtro" => "{$filtro[0]}",
                "Tamano" => "6"
              ),

              "Cuestionario Reacciones Tinnitus - TQR" => array(
                "Tipo"  => "titulo",
                "Tamano" => "12"
              ),
              "El presente cuestionario ha sido diseñado para averiguar qué tipo de efectos ha tenido el tinnitus sobre su estilo de vida, bienestar general, etc. Es posible que algunos de los efectos que figuran a continuación sean pertinentes en su caso y que otros no. Responda todas las preguntas encerrando con un círculo   el número que mejor refleje el modo en que el tinnitus lo ha afectado durante la última semana." => array(
                "Tipo"  => "subtitulo",
                "Tamano" => "12"
              ),
              "0 = En ningún momento <br> 1 = Una pequeña parte del tiempo<br> 2 = Cierta parte del tiempo<br> 3= Una buena parte del tiempo<br> 4= Casi todo el tiempo " => array(
                "Tipo"  => "subtitulo",
                "Tamano" => "12"
              ),
              "El tinnitus me ha hecho sentir infeliz" => array(
                "Nombre" => "{$n_arr}[El tinnitus me ha hecho sentir infeliz]",
                "Tipo"  => "select", "Valor" => "0|1|2|3|4", "Filtro" => "{$filtro[3]} onchange=\"Puntaje_Cuestionario()\"", "Tamano" => "6"
              ),
              "El tinnitus me ha hecho sentir tenso/a" => array(
                "Nombre" => "{$n_arr}[El tinnitus me ha hecho sentir tenso/a]",
                "Tipo"  => "select", "Valor" => "0|1|2|3|4", "Filtro" => "{$filtro[3]} onchange=\"Puntaje_Cuestionario()\"", "Tamano" => "6"
              ),
              "El tinnitus me ha hecho sentir irritable" => array(
                "Nombre" => "{$n_arr}[El tinnitus me ha hecho sentir irritable]",
                "Tipo"  => "select", "Valor" => "0|1|2|3|4", "Filtro" => "{$filtro[3]} onchange=\"Puntaje_Cuestionario()\"", "Tamano" => "6"
              ),
              "El tinnitus me ha hecho sentir enojado/a" => array(
                "Nombre" => "{$n_arr}[El tinnitus me ha hecho sentir enojado/a]",
                "Tipo"  => "select", "Valor" => "0|1|2|3|4", "Filtro" => "{$filtro[3]} onchange=\"Puntaje_Cuestionario()\"", "Tamano" => "6"
              ),
              "El tinnitus me ha hecho llorar" => array(
                "Nombre" => "{$n_arr}[El tinnitus me ha hecho llorar]",
                "Tipo"  => "select", "Valor" => "0|1|2|3|4", "Filtro" => "{$filtro[3]} onchange=\"Puntaje_Cuestionario()\"", "Tamano" => "6"
              ),
              "El tinnitus me ha hecho evitar situaciones en las que hubiera silencio" => array(
                "Nombre" => "{$n_arr}[El tinnitus me ha hecho evitar situaciones en las que hubiera silencio]",
                "Tipo"  => "select", "Valor" => "0|1|2|3|4", "Filtro" => "{$filtro[3]} onchange=\"Puntaje_Cuestionario()\"", "Tamano" => "6"
              ),
              "El tinnitus me ha hecho sentir menos interés por salir" => array(
                "Nombre" => "{$n_arr}[El tinnitus me ha hecho sentir menos interés por salir]",
                "Tipo"  => "select", "Valor" => "0|1|2|3|4", "Filtro" => "{$filtro[3]} onchange=\"Puntaje_Cuestionario()\"", "Tamano" => "6"
              ),
              "El tinnitus me ha hecho sentir deprimido/a" => array(
                "Nombre" => "{$n_arr}[El tinnitus me ha hecho sentir deprimido/a]",
                "Tipo"  => "select", "Valor" => "0|1|2|3|4", "Filtro" => "{$filtro[3]} onchange=\"Puntaje_Cuestionario()\"", "Tamano" => "6"
              ),
              "El tinnitus me ha hecho sentir fastidiado/a" => array(
                "Nombre" => "{$n_arr}[El tinnitus me ha hecho sentir fastidiado/a]",
                "Tipo"  => "select", "Valor" => "0|1|2|3|4", "Filtro" => "{$filtro[3]} onchange=\"Puntaje_Cuestionario()\"", "Tamano" => "6"
              ),
              "El tinnitus me ha hecho sentir confundido/a" => array(
                "Nombre" => "{$n_arr}[El tinnitus me ha hecho sentir confundido/a]",
                "Tipo"  => "select", "Valor" => "0|1|2|3|4", "Filtro" => "{$filtro[3]} onchange=\"Puntaje_Cuestionario()\"", "Tamano" => "6"
              ),
              "El tinnitus me ha vuelto loco/a" => array(
                "Nombre" => "{$n_arr}[El tinnitus me ha vuelto loco/a]",
                "Tipo"  => "select", "Valor" => "0|1|2|3|4", "Filtro" => "{$filtro[3]} onchange=\"Puntaje_Cuestionario()\"", "Tamano" => "6"
              ),
              "El tinnitus ha interferido con mi placer por la vida" => array(
                "Nombre" => "{$n_arr}[El tinnitus ha interferido con mi placer por la vida]",
                "Tipo"  => "select", "Valor" => "0|1|2|3|4", "Filtro" => "{$filtro[3]} onchange=\"Puntaje_Cuestionario()\"", "Tamano" => "6"
              ),
              "El tinnitus me ha hecho que me resulte difícil concentrarme" => array(
                "Nombre" => "{$n_arr}[El tinnitus me ha hecho que me resulte difícil concentrarme]",
                "Tipo"  => "select", "Valor" => "0|1|2|3|4", "Filtro" => "{$filtro[3]} onchange=\"Puntaje_Cuestionario()\"", "Tamano" => "6"
              ),
              "El tinnitus ha hecho que me resulte difícil relajarme" => array(
                "Nombre" => "{$n_arr}[El tinnitus ha hecho que me resulte difícil relajarme]",
                "Tipo"  => "select", "Valor" => "0|1|2|3|4", "Filtro" => "{$filtro[3]} onchange=\"Puntaje_Cuestionario()\"", "Tamano" => "6"
              ),
              "El tinnitus me ha hecho sentir angustiado/a" => array(
                "Nombre" => "{$n_arr}[El tinnitus me ha hecho sentir angustiado/a]",
                "Tipo"  => "select", "Valor" => "0|1|2|3|4", "Filtro" => "{$filtro[3]} onchange=\"Puntaje_Cuestionario()\"", "Tamano" => "6"
              ),
              "El tinnitus me ha sentir imposibilitado/a" => array(
                "Nombre" => "{$n_arr}[El tinnitus me ha sentir imposibilitado/a]",
                "Tipo"  => "select", "Valor" => "0|1|2|3|4", "Filtro" => "{$filtro[3]} onchange=\"Puntaje_Cuestionario()\"", "Tamano" => "6"
              ),
              "El tinnitus me ha hecho sentir frustrado/a con las cosas" => array(
                "Nombre" => "{$n_arr}[El tinnitus me ha hecho sentir frustrado/a con las cosas]",
                "Tipo"  => "select", "Valor" => "0|1|2|3|4", "Filtro" => "{$filtro[3]} onchange=\"Puntaje_Cuestionario()\"", "Tamano" => "6"
              ),
              "El tinnitus ha interferido con mi capacidad para trabajar" => array(
                "Nombre" => "{$n_arr}[El tinnitus ha interferido con mi capacidad para trabajar]",
                "Tipo"  => "select", "Valor" => "0|1|2|3|4", "Filtro" => "{$filtro[3]} onchange=\"Puntaje_Cuestionario()\"", "Tamano" => "6"
              ),
              "El tinnitus me ha hecho desesperar" => array(
                "Nombre" => "{$n_arr}[El tinnitus me ha hecho desesperar]",
                "Tipo"  => "select", "Valor" => "0|1|2|3|4", "Filtro" => "{$filtro[3]} onchange=\"Puntaje_Cuestionario()\"", "Tamano" => "6"
              ),
              "El tinnitus me ha hecho evitar situaciones en las que hay ruido" => array(
                "Nombre" => "{$n_arr}[El tinnitus me ha hecho evitar situaciones en las que hay ruido]",
                "Tipo"  => "select", "Valor" => "0|1|2|3|4", "Filtro" => "{$filtro[3]} onchange=\"Puntaje_Cuestionario()\"", "Tamano" => "6"
              ),
              "El tinnitus me ha hecho evitar situaciones sociales" => array(
                "Nombre" => "{$n_arr}[El tinnitus me ha hecho evitar situaciones sociales]",
                "Tipo"  => "select", "Valor" => "0|1|2|3|4", "Filtro" => "{$filtro[3]} onchange=\"Puntaje_Cuestionario()\"", "Tamano" => "6"
              ),
              "El tinnitus me ha hecho sentir desesperanzado/a en relación con el futuro" => array(
                "Nombre" => "{$n_arr}[El tinnitus me ha hecho sentir desesperanzado/a en relación con el futuro]",
                "Tipo"  => "select", "Valor" => "0|1|2|3|4", "Filtro" => "{$filtro[3]} onchange=\"Puntaje_Cuestionario()\"", "Tamano" => "6"
              ),
              "El tinnitus ha interferido con mi sueño" => array(
                "Nombre" => "{$n_arr}[El tinnitus ha interferido con mi sueño]",
                "Tipo"  => "select", "Valor" => "0|1|2|3|4", "Filtro" => "{$filtro[3]} onchange=\"Puntaje_Cuestionario()\"", "Tamano" => "6"
              ),
              "El tinnitus me ha hecho pensar en el suicidio" => array(
                "Nombre" => "{$n_arr}[El tinnitus me ha hecho pensar en el suicidio]",
                "Tipo"  => "select", "Valor" => "0|1|2|3|4", "Filtro" => "{$filtro[3]} onchange=\"Puntaje_Cuestionario()\"", "Tamano" => "6"
              ),
              "El tinnitus me ha hecho sentir pánico" => array(
                "Nombre" => "{$n_arr}[El tinnitus me ha hecho sentir pánico]",
                "Tipo"  => "select", "Valor" => "0|1|2|3|4", "Filtro" => "{$filtro[3]} onchange=\"Puntaje_Cuestionario()\"", "Tamano" => "6"
              ),
              "El tinnitus me ha hecho sentir atormentado" => array(
                "Nombre" => "{$n_arr}[El tinnitus me ha hecho sentir atormentado]",
                "Tipo"  => "select", "Valor" => "0|1|2|3|4", "Filtro" => "{$filtro[3]} onchange=\"Puntaje_Cuestionario()\"", "Tamano" => "6"
              )
            );

            echo Tabla_Campos_Dinamico($Inputs, "<div class='form-group col-md-12' style='padding-left: 40px;padding-right: 40px;>");

            $header_tabla = ["", "Puntaje"];
            $header_tabla_estilos = ["width:50%;", "width:50%;"];

            $columnas_tabla = ["0", "1", "2", "3", "4", "Puntaje"];
            //$columnas_tabla_span["Otros"]=["1","0","0","0","0","5"];
            $nombre_arreglo = "ResultadoReaccionesTinnitus";
            echo "<label style='text-align:center;width: 100%;'>Resultado</label><br>";

            $Texto = "<div class='form-group col-md-12' style='padding-left: 40px;padding-right: 40px;'> <table style='width:100%;' class='table'>";

            $Texto .= "<thead><tr>";
            foreach ($header_tabla as $key => $value) {
              $Texto .= "<th style='{$header_tabla_estilos[$key]}'>{$value}</th>";
            }
            $Texto .= "</tr></thead>";
            $Texto .= "<tbody>";

            foreach ($columnas_tabla as $key => $value) {
              $Texto .= "<tr><td>{$value}</td>";
              for ($i = 1, $Tamano = count($header_tabla); $i < $Tamano; $i++) {
                $span = $columnas_tabla_span[$value][$i];
                if ($span == "") {
                  $span = 1;
                }

                if ($span <> "0") {
                  $Texto .= "<td colspan='{$span}'><input type='text' name='{$nombre_arreglo}[{$value}][{$header_tabla[$i]}][$span]' id='Puntaje_{$key}' class='form-control input-lg'></td>";
                }
              }
            }
            $Texto .= "</tbody></table></div>";

            echo $Texto;

            echo "<center><h4><b>Tinnitus Handicap Inventory - THI </b></h4></center>";
            $n_arr = "TinnitusHandicapInventory";

            $Inputs1 = array(
              "1F ¿Le cuesta concentrarse por culpa del ruido o zumbido de oído?" => array(
                "Nombre" => "{$n_arr}[1F ¿Le cuesta concentrarse por culpa del ruido o zumbido de oído?]",
                "Tipo"  => "select", "Valor" => "Si|A Veces|No", "Filtro" => "{$filtro[1]} ", "Tamano" => "6"
              ),
              "2F ¿Le cuesta escuchar a los demás debido a que el zumbido es muy fuerte?" => array(
                "Nombre" => "{$n_arr}[2F ¿Le cuesta escuchar a los demás debido a que el zumbido es muy fuerte?]",
                "Tipo"  => "select", "Valor" => "Si|A Veces|No", "Filtro" => "{$filtro[1]} ", "Tamano" => "6"
              ),
              "3F ¿Le pone de mal genio el zumbido del oído?" => array(
                "Nombre" => "{$n_arr}[3F ¿Le pone de mal genio el zumbido del oído?]",
                "Tipo"  => "select", "Valor" => "Si|A Veces|No", "Filtro" => "{$filtro[1]} ", "Tamano" => "6"
              ),
              "4F ¿Se siente confundido por culpa del ruido o zumbido del oído?" => array(
                "Nombre" => "{$n_arr}[4F ¿Se siente confundido por culpa del ruido o zumbido del oído?]",
                "Tipo"  => "select", "Valor" => "Si|A Veces|No", "Filtro" => "{$filtro[1]} ", "Tamano" => "6"
              ),
              "5C ¿Se desespera con el ruido o zumbido?" => array(
                "Nombre" => "{$n_arr}[5C ¿Se desespera con el ruido o zumbido?]",
                "Tipo"  => "select", "Valor" => "Si|A Veces|No", "Filtro" => "{$filtro[1]} ", "Tamano" => "6"
              ),
              "6E ¿Se queja mucho por tener el zumbido en el oído?" => array(
                "Nombre" => "{$n_arr}[6E ¿Se queja mucho por tener el zumbido en el oído?]",
                "Tipo"  => "select", "Valor" => "Si|A Veces|No", "Filtro" => "{$filtro[1]} ", "Tamano" => "6"
              ),
              "7F ¿Le cuesta quedarse dormido en la noche por culpa del zumbido del oído?" => array(
                "Nombre" => "{$n_arr}[7F ¿Le cuesta quedarse dormido en la noche por culpa del zumbido del oído?]",
                "Tipo"  => "select", "Valor" => "Si|A Veces|No", "Filtro" => "{$filtro[1]} ", "Tamano" => "6"
              ),
              "8C ¿Cree que el problema de su zumbido es algo sin solución?" => array(
                "Nombre" => "{$n_arr}[8C ¿Cree que el problema de su zumbido es algo sin solución?]",
                "Tipo"  => "select", "Valor" => "Si|A Veces|No", "Filtro" => "{$filtro[1]} ", "Tamano" => "6"
              ),
              "9F ¿El zumbido del oído es un problema que le impide disfrutar de la vida, como por ejemplo salir a comer con amigos o ir al cine?" => array(
                "Nombre" => "{$n_arr}[9F ¿El zumbido del oído es un problema que le impide disfrutar de la vida, como por ejemplo salir a comer con amigos o ir al cine?]",
                "Tipo"  => "select", "Valor" => "Si|A Veces|No", "Filtro" => "{$filtro[1]} ", "Tamano" => "6"
              ),
              "9F ¿El zumbido del oído es un problema que le impide disfrutar de la vida, como por ejemplo salir a comer con amigos o ir al cine?" => array(
                "Nombre" => "{$n_arr}[9F ¿El zumbido del oído es un problema que le impide disfrutar de la vida, como por ejemplo salir a comer con amigos o ir al cine?]",
                "Tipo"  => "select", "Valor" => "Si|A Veces|No", "Filtro" => "{$filtro[1]} ", "Tamano" => "6"
              ),
              "10E ¿Se siente desilusionado por culpa del zumbido del oído?" => array(
                "Nombre" => "{$n_arr}[10E ¿Se siente desilusionado por culpa del zumbido del oído?]",
                "Tipo"  => "select", "Valor" => "Si|A Veces|No", "Filtro" => "{$filtro[1]} ", "Tamano" => "6"
              ),
              "11C ¿Cree que tiene una enfermedad incurable?" => array(
                "Nombre" => "{$n_arr}[11C ¿Cree que tiene una enfermedad incurable?]",
                "Tipo"  => "select", "Valor" => "Si|A Veces|No", "Filtro" => "{$filtro[1]} ", "Tamano" => "6"
              ),
              "12F ¿El zumbido de oído le impide pasarlo bien?" => array(
                "Nombre" => "{$n_arr}[12F ¿El zumbido de oído le impide pasarlo bien?]",
                "Tipo"  => "select", "Valor" => "Si|A Veces|No", "Filtro" => "{$filtro[1]} ", "Tamano" => "6"
              ),
              "13F ¿Le estorba al zumbido de oído en su trabajo o en las labores de la casa?" => array(
                "Nombre" => "{$n_arr}[13F ¿Le estorba al zumbido de oído en su trabajo o en las labores de la casa?]",
                "Tipo"  => "select", "Valor" => "Si|A Veces|No", "Filtro" => "{$filtro[1]} ", "Tamano" => "6"
              ),
              "14F ¿Se siente a menudo de mal genio por culpa del zumbido del oído?" => array(
                "Nombre" => "{$n_arr}[14F ¿Se siente a menudo de mal genio por culpa del zumbido del oído?]",
                "Tipo"  => "select", "Valor" => "Si|A Veces|No", "Filtro" => "{$filtro[1]} ", "Tamano" => "6"
              ),
              "15F ¿Le cuesta comprender lo que lee por culpa del zumbido del oído?" => array(
                "Nombre" => "{$n_arr}[15F ¿Le cuesta comprender lo que lee por culpa del zumbido del oído?]",
                "Tipo"  => "select", "Valor" => "Si|A Veces|No", "Filtro" => "{$filtro[1]} ", "Tamano" => "6"
              ),
              "16E ¿Se siente alterado por el zumbido de oído?" => array(
                "Nombre" => "{$n_arr}[16E ¿Se siente alterado por el zumbido de oído?]",
                "Tipo"  => "select", "Valor" => "Si|A Veces|No", "Filtro" => "{$filtro[1]} ", "Tamano" => "6"
              ),
              "17E ¿Siente que el zumbido de oído ha echado a perder las relaciones con sus familiares y amigos?" => array(
                "Nombre" => "{$n_arr}[17E ¿Siente que el zumbido de oído ha echado a perder las relaciones con sus familiares y amigos?]",
                "Tipo"  => "select", "Valor" => "Si|A Veces|No", "Filtro" => "{$filtro[1]} ", "Tamano" => "6"
              ),
              "18F ¿Le cuesta sacarse de la cabeza el zumbido y concentrarse en otra cosa?" => array(
                "Nombre" => "{$n_arr}[18F ¿Le cuesta sacarse de la cabeza el zumbido y concentrarse en otra cosa?]",
                "Tipo"  => "select", "Valor" => "Si|A Veces|No", "Filtro" => "{$filtro[1]} ", "Tamano" => "6"
              ),
              "19C ¿Siente que no puede controlar el zumbido de oído?" => array(
                "Nombre" => "{$n_arr}[19C ¿Siente que no puede controlar el zumbido de oído?]",
                "Tipo"  => "select", "Valor" => "Si|A Veces|No", "Filtro" => "{$filtro[1]} ", "Tamano" => "6"
              ),
              "20F ¿Se siente a menudo cansado por culpa del zumbido de oído?" => array(
                "Nombre" => "{$n_arr}[20F ¿Se siente a menudo cansado por culpa del zumbido de oído?]",
                "Tipo"  => "select", "Valor" => "Si|A Veces|No", "Filtro" => "{$filtro[1]} ", "Tamano" => "6"
              ),
              "21E ¿Se siente deprimido por causa del zumbido de oído?" => array(
                "Nombre" => "{$n_arr}[21E ¿Se siente deprimido por causa del zumbido de oído?]",
                "Tipo"  => "select", "Valor" => "Si|A Veces|No", "Filtro" => "{$filtro[1]} ", "Tamano" => "6"
              ),
              "22E ¿Lo pone nervioso el zumbido de oído?" => array(
                "Nombre" => "{$n_arr}[22E ¿Lo pone nervioso el zumbido de oído?]",
                "Tipo"  => "select", "Valor" => "Si|A Veces|No", "Filtro" => "{$filtro[1]} ", "Tamano" => "6"
              ),
              "23C ¿Siente que no puede ya hacerle frente al zumbido de oído?" => array(
                "Nombre" => "{$n_arr}[23C ¿Siente que no puede ya hacerle frente al zumbido de oído?]",
                "Tipo"  => "select", "Valor" => "Si|A Veces|No", "Filtro" => "{$filtro[1]} ", "Tamano" => "6"
              ),
              "24F ¿Empeora el zumbido de oído cuando está estresado?" => array(
                "Nombre" => "{$n_arr}[24F ¿Empeora el zumbido de oído cuando está estresado?]",
                "Tipo"  => "select", "Valor" => "Si|A Veces|No", "Filtro" => "{$filtro[1]} ", "Tamano" => "6"
              ),
              "25E ¿Se siente inseguro por culpa del zumbido de oído?" => array(
                "Nombre" => "{$n_arr}[25E ¿Se siente inseguro por culpa del zumbido de oído?]",
                "Tipo"  => "select", "Valor" => "Si|A Veces|No", "Filtro" => "{$filtro[1]} ", "Tamano" => "6"
              )

            );

            echo Tabla_Campos_Dinamico($Inputs1, "<div class='row col-md-12' style='padding-left: 40px;padding-right: 40px;'>");

            $header_tabla = ["Sub Escala", "Si (x4)", "A Veces (x2)", "No (x4)", "Total"];
            //no modificar se usa para el calculo de la funcion
            $clase_columna_personalizada["1"] = "Dinamico_SubEscala_Si";
            $clase_columna_personalizada["2"] = "Dinamico_SubEscala_Aveces";
            $clase_columna_personalizada["3"] = "Dinamico_SubEscala_No";
            $clase_columna_personalizada["4"] = "Dinamico_SubEscala_Total";
            $header_tabla_estilos = ["width:40%;", "width:15%;", "width:15%;", "width:15%;", "width:15%;"];

            $columnas_tabla = ["Funcional", "Emocional", "Catastrófica"];
            //$columnas_tabla_span["Otros"]=["1","0","0","0","0","5"];
            $nombre_arreglo = "SubEscalaTinnitus";

            echo "<center><h4><b> Sub Escalas </b></h4></center>";

            echo Tabla_Historia_Dinamico_Personalizado($nombre_arreglo, $header_tabla, $header_tabla_estilos, $columnas_tabla, "", "",$clase_columna_personalizada);

            echo "<center><h4><b> Calificación </b></h4></center>";
            ?>

            <div class='form-group col-md-12' style='padding-left: 40px;padding-right: 40px;'>

              <hr style="border-top-color: #3c8dbc;">

              <table style="width:100%;" class="table">
                <thead>
                  <tr>
                    <th>Si</th>
                    <th>A Veces</th>
                    <th>No</th>
                    <th>Puntaje</th>
                  </tr>
                </thead>
                <tbody style="text-align:center">
                  <tr>
                    <td>( X4)</td>
                    <td>( X2)</td>
                    <td>( X0)</td>
                    <td> </td>
                  </tr>
                  <tr>
                    <!-- no modificar el id ya que se usa para el calculo de la funcion-->
                    <td> <input type="text" name="CalificacionTinnitus[Si]" id="Dinamico_SubEscala_Si"class="form-control input-lg " oninput="limpiarCaracteresNoNumericos(this)"></td>
                    <td> <input type="text" name="CalificacionTinnitus[A Veces]" id="Dinamico_SubEscala_Aveces"class="form-control input-lg " oninput="limpiarCaracteresNoNumericos(this)"> </td>
                    <td> <input type="text" name="CalificacionTinnitus[No]" id="Dinamico_SubEscala_No"class="form-control input-lg " oninput="limpiarCaracteresNoNumericos(this)"> </td>
                    <td> <input type="text" name="CalificacionTinnitus[Puntaje]" id="Dinamico_SubEscala_Total"class="form-control input-lg " oninput="limpiarCaracteresNoNumericos(this)"> </td>
                  </tr>
                  <tr>
                    <td colspan="3">Grado de Discapacidad</td>
                    <td> <input type="text" name="CalificacionTinnitus[Grado de Discapacidad]" class="form-control input-lg"> </td>
                  </tr>
                </tbody>
              </table>
            </div>
          <?php
        }


        if ($Modulo == "Ganancia Funcional") {
          //$NombreGrafica="AltaFrecuencia";
          //$NombreGrafica sirve para que si hay mas graficas como esta no tengan error y tenga sus variables independientes
          ?>

            <!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>-->
            <script src="plugins/jQuery/jquery-2.2.3.min.js"></script> <!-- no se repita el javascript y genere error en el footer se condiciono este script-->
            <!--<script type="text/javascript" src="https://cdn.rawgit.com/prashantchaudhary/ddslick/master/jquery.ddslick.min.js" ></script>-->
            <script type="text/javascript" src="plugins/DdslickK/jquery.ddslick.min.js"></script>

            <div class="col-md-12 row">

              <div id="curve_chart<?php echo $NombreGrafica ?>" class="col-md-12" style="width: 100%; height: 550px;zoom:0.7;z-index: 1;"></div>

              <div class="col-md-12 row">
                <!-- Campos Editables //-->
                <input type="hidden" name="grafica<?php echo $NombreGrafica ?>" id="grafica<?php echo $NombreGrafica ?>">
                <!--value='{"0":{"rango":0,"izquierdo":null,"izquierdo_icono":null,"derecho":null,"derecho_icono":null}}'
                          {"0":{"rango":0,"derecho":null,"derecho_icono":null,"izquierdo":null,"izquierdo_icono":null}}-->

                <div class="form-group col-md-3" align="center">
                  <label>Vía</label>
                  <select class="form-control input-lg" id="Via<?php echo $NombreGrafica ?>" onchange="Iconos<?php echo $NombreGrafica ?>()" style="width:100%">
                    <script>
                      // <!-- Campos Editables-->
                      vias_escrito<?php echo $NombreGrafica ?> = ["Oído Derecho", "Oído Izquierdo"];
                      // <!-- Campos Editables-->
                      vias_value<?php echo $NombreGrafica ?> = ["derecho", "izquierdo"]; //

                      var valorgrafica = '{"0":{"rango":0';
                      vias_value<?php echo $NombreGrafica ?>.forEach((elem, index) => {
                        valorgrafica += ',"' + elem + '":null,"' + elem + '_icono":null';
                      });
                      valorgrafica += '}}';
                      document.getElementById("grafica<?php echo $NombreGrafica ?>").value = valorgrafica;


                      for (index in vias_escrito<?php echo $NombreGrafica ?>) {
                        $('#Via<?php echo $NombreGrafica ?>').append("<option value='" + vias_value<?php echo $NombreGrafica ?>[index] + "'>" + vias_escrito<?php echo $NombreGrafica ?>[index] + "</option>");
                      }
                    </script>
                  </select>
                </div>

                <div class="form-group col-md-3" align="center">
                  <label>Intervalos</label>
                  <select class="form-control input-lg" id="Rango<?php echo $NombreGrafica ?>" style="width:100%">
                    <script>
                      //<!-- Campos Editables-->
                      intervalos<?php echo $NombreGrafica ?> = [125, 250, 500, 750, 1000, 1500, 2000, 3000, 4000, 6000, 8000];
                      for (index in intervalos<?php echo $NombreGrafica ?>) {
                        $('#Rango<?php echo $NombreGrafica ?>').append("<option value='" + intervalos<?php echo $NombreGrafica ?>[index] + "'>" + intervalos<?php echo $NombreGrafica ?>[index] + "</option>");
                      }
                    </script>
                  </select>
                </div>

                <div class="form-group col-md-2" align="center">
                  <label>Valor</label>
                  <input type="text" id="Valor<?php echo $NombreGrafica ?>" class="form-control input-lg" style="width:100%">
                </div>

                <?php
                //<!-- Campos Editables-->
                $select_izquierdo = "";
                $select_derecho = "";
                $queryList = mysqli_query($conn3, "SELECT * FROM  iconos_grafica ");
                while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                  $id = $rowMotorizado['id'];
                  $nombre = $rowMotorizado['nombre'];
                  $ruta = $rowMotorizado['ruta'];
                  $tipo = $rowMotorizado['tipo'];
                  $clase = $rowMotorizado['clase'];

                  //Campos Editables x2
                  if ($tipo == "1" and $clase == "3") {
                    $select_izquierdo .= '<option value="' . $ruta . '" data-imagesrc="'.$Base.'IconosGraficas/' . $ruta . '"; > ' . $nombre . ' </option>';
                  }

                  if ($tipo == "2" and $clase == "3") {
                    $select_derecho .= '<option value="' . $ruta . '" data-imagesrc="'.$Base.'IconosGraficas/' . $ruta . '"; > ' . $nombre . ' </option>';
                  }
                }
                ?>

                <div class="form-group col-md-4" align="center">
                  <label>Ícono</label>
                  <select class="form-control input-lg" id="Icono<?php echo $NombreGrafica ?>" style="width:100%">
                  </select>
                  <script>
                    function Iconos<?php echo $NombreGrafica ?>() {
                      $estado = $('#Via<?php echo $NombreGrafica ?>').val();
                      //<!-- Campos Editables //-->
                      //tiene que tener el mismo orden que en la variable vias  en este ejemplo seria este los valores ["derecho", "izquierdo"]
                      //var arregloiconos = ['<?php echo $select_derecho ?>', '<?php echo $select_izquierdo ?>'];

                      var arregloiconos = ['<?php echo $select_derecho ?>', '<?php echo $select_izquierdo ?>']
                      vias_value<?php echo $NombreGrafica ?>.forEach((elem, index) => {

                        if ($estado == elem) {
                          $('#Icono<?php echo $NombreGrafica ?>').ddslick('destroy');
                          //<!-- Campos Editables-->
                          $('#Icono<?php echo $NombreGrafica ?>').empty().append(arregloiconos[index]);
                        }
                      });

                      /*
                      if ($estado == "derecho") {
                        $('#Icono<?php echo $NombreGrafica ?>').ddslick('destroy');
                        //<!-- Campos Editables-->
                        $('#Icono<?php echo $NombreGrafica ?>').empty().append('<?php echo $select_derecho ?>');
                      }
                      //<!-- Campos Editables //-->
                      if ($estado == "izquierdo") {
                        $('#Icono<?php echo $NombreGrafica ?>').ddslick('destroy');
                        //<!-- Campos Editables-->
                        $('#Icono<?php echo $NombreGrafica ?>').empty().append('<?php echo $select_izquierdo ?>');
                      }
                      */

                      $("#Icono<?php echo $NombreGrafica ?>").ddslick({
                        width: "100%",
                        imagePosition: "left",
                      })
                    }
                  </script>
                  <input type="hidden" id="icono_grafica<?php echo $NombreGrafica ?>">
                </div>

                <div class="form-group col-md-12" align="center">
                  <button class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" type="button" onclick="AgregarPunto<?php echo $NombreGrafica ?>()"> <i class="fa fa-plus"></i> Agregar </button><br>
                </div>

              </div data="cierre row">

              <script>
                function AgregarPunto<?php echo $NombreGrafica ?>() {

                  var Rango = document.getElementById("Rango<?php echo $NombreGrafica ?>").value;
                  var Via = document.getElementById("Via<?php echo $NombreGrafica ?>").value;
                  var Valor = document.getElementById("Valor<?php echo $NombreGrafica ?>").value;

                  var Icono = $('#Icono<?php echo $NombreGrafica ?>').data('ddslick');
                  Icono = Icono["selectedData"]["value"];

                  var arreglo = {};
                  arreglo[Rango] = {};

                  var puntos = JSON.parse(document.getElementById("grafica<?php echo $NombreGrafica ?>").value);
                  for (index in puntos) {
                    var rango1 = puntos[index].rango;
                    arreglo[rango1] = {};
                    arreglo[rango1]["rango"] = puntos[index].rango;

                    vias_value<?php echo $NombreGrafica ?>.forEach((elem, index1) => {
                      arreglo[rango1][elem] = puntos[index][elem];
                      arreglo[rango1][elem + "_icono"] = puntos[index][elem + "_icono"];
                    });
                    /*
                    //<!-- Campos Editables X2 //-->
                    arreglo[rango1]["izquierdo"] = puntos[index].izquierdo;
                    arreglo[rango1]["derecho"] = puntos[index].derecho;

                    //<!-- Campos Editables X2 //-->
                    arreglo[rango1]["izquierdo_icono"] = puntos[index].izquierdo_icono;
                    arreglo[rango1]["derecho_icono"] = puntos[index].derecho_icono;
                    */
                  }

                  arreglo[Rango]["rango"] = Rango;
                  arreglo[Rango][Via] = Valor;
                  arreglo[Rango][Via + "_icono"] = Icono;

                  document.getElementById("grafica<?php echo $NombreGrafica ?>").value = JSON.stringify(arreglo);

                  //////////////////////////////////////
                  for (index in intervalos<?php echo $NombreGrafica ?>) {
                    if (intervalos<?php echo $NombreGrafica ?>[index] == Rango) {
                      var SiguienteRango = parseInt(index) + 1;
                    }
                  }
                  //console.log(intervalos[SiguienteRango]);
                  if (intervalos<?php echo $NombreGrafica ?>[SiguienteRango] == undefined) {
                    for (index1 in vias_value<?php echo $NombreGrafica ?>) {
                      if (vias_value<?php echo $NombreGrafica ?>[index1] == Via) {
                        var SiguienteVia = vias_value<?php echo $NombreGrafica ?>[parseInt(index1) + 1];
                        var SiguienteRango = 0;
                      }
                    }
                  } else {
                    var SiguienteVia = Via;
                  }
                  if (SiguienteVia == undefined) {
                    SiguienteVia = vias_value<?php echo $NombreGrafica ?>[0];
                  }

                  document.getElementById("Rango<?php echo $NombreGrafica ?>").value = intervalos<?php echo $NombreGrafica ?>[SiguienteRango];
                  document.getElementById("Via<?php echo $NombreGrafica ?>").value = SiguienteVia;
                  Iconos<?php echo $NombreGrafica ?>();
                  /////////////////////////////////////
                  drawChart<?php echo $NombreGrafica ?>();
                }
              </script>

              <script type="text/javascript" src="plugins/LoaderK/loader.js"></script>
              <script type="text/javascript">
                /////////////////////////////////////////////////
                google.charts.load('current', {
                  'packages': ['corechart', 'line']
                });
                google.charts.setOnLoadCallback(drawChart<?php echo $NombreGrafica ?>);

                function drawChart<?php echo $NombreGrafica ?>() {
                  var data = new google.visualization.DataTable();
                  data.addColumn('number', 'Frecuency Heartz');
                  vias_escrito<?php echo $NombreGrafica ?>.forEach((elem, index1) => {
                    data.addColumn('number', elem);
                  });
                  /*
                  //<!-- Campos Editables X2 //-->
                  data.addColumn('number', 'Oído Derecho');
                  data.addColumn('number', 'Oído Izquiero');
                  */

                  var puntos = JSON.parse(document.getElementById("grafica<?php echo $NombreGrafica ?>").value);
                  console.log(puntos);
                  for (index in puntos) {

                    var datos_arreglo = new Array();
                    datos_arreglo.push(parseInt(puntos[index].rango));
                    vias_value<?php echo $NombreGrafica ?>.forEach((elem, index1) => {
                      datos_arreglo.push(parseInt(puntos[index][elem]));
                    });

                    data.addRow(datos_arreglo);
                    /*
                    var derecho = puntos[index].derecho;
                    var izquierdo = puntos[index].izquierdo;
                    //<!-- Campos Editables //-->
                    data.addRow([parseInt(puntos[index].rango), parseInt(puntos[index].derecho), parseInt(puntos[index].izquierdo)]);
                    */
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

                  var container = document.getElementById('curve_chart<?php echo $NombreGrafica ?>');
                  var chart = new google.visualization.LineChart(container);
                  var direccion = "IconosGraficas/";

                  google.visualization.events.addListener(chart, 'ready', function() {
                    var layout = chart.getChartLayoutInterface();
                    for (var i = 0; i < data.getNumberOfRows(); i++) {
                      //<!-- Campos Editables //-->
                      //iconos_arreglo = ["derecho_icono", "izquierdo_icono"];
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
                          whiteHat[index].style.top = (yPos - 18) + 'px';
                          whiteHat[index].style.left = (xPos) - 10 + 'px';
                        }

                      }
                    }
                  });

                  chart.draw(data, options);

                }

                Iconos<?php echo $NombreGrafica ?>();
                //poner esto para que funcione el select con los simbolos, ya que al agregar mas de una grafica manda error
                $(window).load(function() {
                  Iconos<?php echo $NombreGrafica ?>();
                });
              </script>

              <style type="text/css">
                .whiteHat {
                  border: none;
                  position: absolute;
                }

                .dd-selected {
                  color: black;
                  padding: 0px;
                }

                .dd-options {
                  overflow: auto !important;
                  height: 250px !important;
                }

                .dd-option-text {
                  line-height: 36px !important;
                }

                .dd-selected-text {
                  line-height: 36px !important;
                }
              </style>
              <?php

              //echo "<center><strong><b> TINNITUS HANDICAP INVENTORY - THI </b></strong></center>";
              $n_arr = "GananciaInformacion";
              $filtro[0] = "class='form-control input-lg' maxlength='120' oninput='if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'"; //input
              $filtro[1] = "class='form-control select2' style='width: 100%;'"; //select
              $filtro[2] = "class='form-control input-lg' style='width: 100%; min-height: 60px;height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;max-width: 100%;'"; //textarea 
              $filtro[3] = "class='form-control select2 Puntaje_1' style='width: 100%;'"; //select

              $Inputs1 = array(
                "Ganancia" => array(
                  "Nombre" => "{$n_arr}[Ganancia]",
                  "Tipo" => "select", "Valor" => "Ganancia funcional óptima para la disminución auditiva|Ganancia funcional deficiente para la disminución auditiva", "Filtro" => "{$filtro[1]} ", "Tamano" => "12"
                ),
                "Observaciones" => array(
                  "Nombre" => "{$n_arr}[Observaciones]",
                  "Tipo" => "textarea", "Valor" => "", "Filtro" => "{$filtro[2]}", "Tamano" => "12"
                ),
                "Recomendaciones" => array(
                  "Nombre" => "{$n_arr}[Recomendaciones]",
                  "Tipo" => "textarea", "Valor" => "", "Filtro" => "{$filtro[2]}", "Tamano" => "12"
                )
              );

              echo Tabla_Campos_Dinamico($Inputs1, "<div class='form-group col-md-12' style='padding-left: 40px;padding-right: 40px;'>");
              ?>



          <?php
        }

        if ($Modulo == "Funciones") {
          /////////////////////////////////////////////////////////////////// F U N C I O N - T A B L A   H T M L /////////////////////////////////////////////////////////////////////////

          function Tabla_Historia_Dinamico($nombre_arreglo, $header_tabla, $header_tabla_estilos, $columnas_tabla, $columnas_tabla_span, $estilo_div)
          {
            $Texto = "<div class='form-group col-md-12' style='padding-left: 40px;padding-right: 40px;{$estilo_div}'> <table style='width:100%;' class='table'>";

            $Texto .= "<thead><tr>";
            foreach ($header_tabla as $key => $value) {
              $Texto .= "<th style='{$header_tabla_estilos[$key]}'>{$value}</th>";
            }
            $Texto .= "</tr></thead>";
            $Texto .= "<tbody>";

            if ($columnas_tabla_span <> '') {
                foreach ($columnas_tabla as $key => $value) {
                $span = $columnas_tabla_span[$value][0];
                $Texto .= "<tr><td colspan='{$span}'>{$value}</td>";
                for ($i = 1, $Tamano = count($header_tabla); $i < $Tamano; $i++) {
                  $span = $columnas_tabla_span[$value][$i];
                  if ($span == "") {
                    $span = 1;
                  }

                  if ($span <> "0") {
                    $Texto .= "<td colspan='{$span}'><input type='text' name='{$nombre_arreglo}[{$value}][{$header_tabla[$i]}][$span]'  class='form-control input-lg'></td>";
                  }
                }
              }
            }
            
            $Texto .= "</tbody></table></div>";

            return $Texto;
          }

          //no modificar esta tabla ya que se usa para el calculo de la tabla dinamicamente
          function Tabla_Historia_Dinamico_Personalizado($nombre_arreglo, $header_tabla, $header_tabla_estilos, $columnas_tabla, $columnas_tabla_span, $estilo_div,$clasePersonalizada)
          {
            $Texto = "<div class='form-group col-md-12' style='padding-left: 40px;padding-right: 40px;{$estilo_div}'> <table style='width:100%;' class='table'>";

            $Texto .= "<thead><tr>";
            foreach ($header_tabla as $key => $value) {
              $Texto .= "<th style='{$header_tabla_estilos[$key]}'>{$value}</th>";
            }
            $Texto .= "</tr></thead>";
            $Texto .= "<tbody>";


            if (is_array($columnas_tabla_span)) {
              foreach ($columnas_tabla as $key => $value) {
              $span = $columnas_tabla_span[$value][0];
              $Texto .= "<tr><td colspan='{$span}'>{$value}</td>";
              for ($i = 1, $Tamano = count($header_tabla); $i < $Tamano; $i++) {
                $span = $columnas_tabla_span[$value][$i];
                $claseperso = $clasePersonalizada[$i];

                $clasesumartotal="";
                $identificadorespecial="";
                if($i!="4"){
                  $clasesumartotal = "filas_tabla_dinamica_$value";
                }
                if($i=="4"){
                  $identificadorespecial = "id='filas_tabla_dinamica_$value'";
                }
                if ($span == "") {
                  $span = 1;
                }

                if ($span <> "0") {
                  $Texto .= "<td colspan='{$span}'><input type='text' name='{$nombre_arreglo}[{$value}][{$header_tabla[$i]}][$span]'  class='form-control input-lg $claseperso $clasesumartotal' $identificadorespecial></td>";
                }
              }
            }
            }
            
            $Texto .= "</tbody></table></div>";

            return $Texto;
          }

          /////////////////////////////////////////////////////////////////// F U N C I O N - C A M P O S  D I N A M I C O S /////////////////////////////////////////////////////////////////////////

          function Tabla_Campos_Dinamico($arreglo, $div_titulo)
          {
            $Texto = $div_titulo;
            foreach ($arreglo as $key => $value) {

              $Nombre_Campo = $value["Nombre"];
              $Valor = $value["Valor"];
              $Tipo_Campo = $value["Tipo"];
              $Filtro = $value["Filtro"];
              $Tamano = $value["Tamano"];

              if ($Tipo_Campo != "titulo" and $Tipo_Campo != "subtitulo") {
                $Texto .= "<div class='form-group col-md-{$Tamano}'><label>{$key}</label>";
              }
              switch ($Tipo_Campo) {
                case "text":
                case "number":
                case "date":
                case "email":
                  $Texto .= "<input name=\"{$Nombre_Campo}\" type=\"{$Tipo_Campo}\" placeholder=\"{$key}\" {$Filtro}>";
                  break;
                case "select":
                  $Valor1 = explode("|", $Valor);
                  $options = "";
                  foreach ($Valor1 as $key1 => $value1) {
                    $options .= "<option value='{$value1}'>{$value1}</option>";
                  }
                  $Texto .= "<select name=\"{$Nombre_Campo}\" {$Filtro}>
                      <option value=\"\" selected=\"selected\">Seleccione</option>{$options}
                    </select>";
                  break;
                case "textarea":
                  $Texto .= "<textarea name=\"{$Nombre_Campo}\" {$Filtro}>{$Valor}</textarea> ";
                  break;
                case "titulo":
                  $Texto .= "<div class='form-group col-md-{$Tamano}'><h4 align='center'><b>{$key}</b></h4>";
                  break;
                case "subtitulo":
                  $Texto .= "<div class='form-group col-md-{$Tamano}'><h5 align='left'><b>{$key}</b></h5>";
                  break;
                default:
                  $Texto .= "<p style=\"color:red;\"> el tipo de dato esta incorrecto revisar el arreglo </p>";
              }
              $Texto .= "</div>";
            }
            $Texto .= "</div>";
            return $Texto;
          }

          ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        }
      } // cierre del foreach
          ?>