
  <?php
$javascriptocultar="1";//ocultar el jquery del footer por que da error con el jquery que uno llegue a agregar para estos modulos

foreach ($Modulos_Dinamicos as $key => $Modulo) {



  if($Modulo=="Audiometria Tonal")
  {
    //se necesita la tabla iconos_grafica


    $queryList=mysqli_query($conn3,"SELECT * FROM  iconos_grafica ");
    $nrowl=mysqli_num_rows($queryList);
    while($rowMotorizado=mysqli_fetch_array($queryList))
    {
        $id=$rowMotorizado['id'];
        $nombre=$rowMotorizado['nombre'];
        $ruta=$rowMotorizado['ruta'];
        $tipo=$rowMotorizado['tipo'];
        $clase=$rowMotorizado['clase'];

        if($tipo=="1" AND $clase=="1")
        {
          if($id=="16")
          {
            $select_izquierdo_aerea.='<option value="'.$ruta.'" data-imagesrc="https://medicalsoftplus.com/baseDev/IconosGraficas/'.$ruta.'"; selected> '.$nombre.' </option>';
          }
          else
          {
            $select_izquierdo_aerea.='<option value="'.$ruta.'" data-imagesrc="https://medicalsoftplus.com/baseDev/IconosGraficas/'.$ruta.'"; > '.$nombre.' </option>';
          }
        }
        if($tipo=="1" AND $clase=="2")
        {
          if($id=="14")
          {
            $select_izquierdo_oseo.='<option value="'.$ruta.'" data-imagesrc="https://medicalsoftplus.com/baseDev/IconosGraficas/'.$ruta.'"; selected> '.$nombre.' </option>';
          }
          else
          {
            $select_izquierdo_oseo.='<option value="'.$ruta.'" data-imagesrc="https://medicalsoftplus.com/baseDev/IconosGraficas/'.$ruta.'";> '.$nombre.' </option>';
          }
        }
        if($tipo=="2" AND $clase=="1")
        {
          if($id=="8")
          {
            $select_derecho_aerea.='<option value="'.$ruta.'" data-imagesrc="https://medicalsoftplus.com/baseDev/IconosGraficas/'.$ruta.'"; selected> '.$nombre.' </option>';
          }
          else
          {
            $select_derecho_aerea.='<option value="'.$ruta.'" data-imagesrc="https://medicalsoftplus.com/baseDev/IconosGraficas/'.$ruta.'";> '.$nombre.' </option>';
          }
        }
        if($tipo=="2" AND $clase=="2")
        {
          if($id=="6")
          {
            $select_derecho_oseo.='<option value="'.$ruta.'" data-imagesrc="https://medicalsoftplus.com/baseDev/IconosGraficas/'.$ruta.'"; selected> '.$nombre.' </option>';
          }
          else
          {
            $select_derecho_oseo.='<option value="'.$ruta.'" data-imagesrc="https://medicalsoftplus.com/baseDev/IconosGraficas/'.$ruta.'";> '.$nombre.' </option>';
          }
        }


    }
?>

<!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>-->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script> <!-- no se repita el javascript y genere error en el footer se condiciono este script-->
<!--<script type="text/javascript" src="https://cdn.rawgit.com/prashantchaudhary/ddslick/master/jquery.ddslick.min.js" ></script>-->
<script type="text/javascript" src="plugins/DdslickK/jquery.ddslick.min.js"></script>

<input  type="hidden" name="editar_ronda" id="editar_ronda" value="9999">

    <script>

    function select_imagen()
    {
      $("#slick_aerea").ddslick({
        width:"100%",
        imagePosition:"left",
        selectText: "Seleccione Simbolo",
        onSelected: function(data)
        {
          //es el input que va a tener el valor del select de los iconos
          $("#icono_grafica_aerea").val(data.selectedData.value);
        }
      })

      $("#slick_oseo").ddslick({
        width:"100%",
        imagePosition:"left",
        selectText: "Seleccione Simbolo",
        onSelected: function(data)
        {
          //es el input que va a tener el valor del select de los iconos
          $("#icono_grafica_oseo").val(data.selectedData.value);
        }
      })
    }


    </script>

<script type="text/javascript">
    function CrearInput(value)
    {
      var ronda_editar = document.getElementById("editar_ronda").value;
      if(ronda_editar=="9999")
      {
        var ronda = document.getElementById("ronda_grafica").value;
      }
      else
      {
        var ronda = ronda_editar;
      }
      
      var rangos = [125,250,500,750,1000,1500,2000,3000,4000,6000,8000];
      if(value=="0"){var rango=rangos[0];}
      if(value=="125"){var rango=rangos[1];}
      if(value=="250"){var rango=rangos[2];}
      if(value=="500"){var rango=rangos[3];}
      if(value=="750"){var rango=rangos[4];}
      if(value=="1000"){var rango=rangos[5];}
      if(value=="1500"){var rango=rangos[6];}
      if(value=="2000"){var rango=rangos[7];}
      if(value=="3000"){var rango=rangos[8];}
      if(value=="4000"){var rango=rangos[9];}
      if(value=="6000"){var rango=rangos[10];}
      if(value=="8000"){var rango=rangos[0];}
      if(ronda=="5"){var rango='final';}

      if(rango !="final")
      {
        if(ronda=="0")
        {
          var texto = '<div class="col-md-8"><label> Oído Derecho -'+rango+'- Vía Aerea </label> <input type="number" name="derecho_aerea_'+rango+'" id="derecho_aerea_'+rango+'" class="form-control input-lg" placeholder=" Vía Aérea"></div>';

          texto+='<div class="col-md-4"> <label> Icónos </label> <select id="slick_aerea" style="width: 120px;" class="form-control input-lg">';
          texto += '<?php echo $select_derecho_aerea;?> </select><br></div>';

          texto +=' <button class="btn btn-block btn-primary btn-sm" type="button" onclick="Enviar_grafica('+rango+')"> <i class="fa fa-plus"></i> Agregar Información Oído Derecho - Vía Aérea </button><br>';
        }
        else if(ronda=="1")
        {
           var texto='<div class="col-md-8"> <label> Oído Derecho -'+rango+'- Vía Oseo </label> <input type="number" name="derecho_oseo_'+rango+'" id="derecho_oseo_'+rango+'" class="form-control input-lg" placeholder="Vía Oseo"> </div>';

          texto+='<div class="col-md-4"> <label> Icónos </label> <select id="slick_oseo" style="width: 120px;" class="form-control input-lg">';
          texto += '<?php echo $select_derecho_oseo;?> </select><br></div>';

          texto +=' <button class="btn btn-block btn-primary btn-sm" type="button" onclick="Enviar_grafica('+rango+')"> <i class="fa fa-plus"></i> Agregar Información Oído Derecho - Vía Oseo </button><br>';
        }
        else if(ronda=="2")
        {
          var texto = '<div class="col-md-8"><label> Oído Izquierdo -'+rango+'- Vía Aérea </label> <input type="number" name="izquierdo_aerea_'+rango+'" id="izquierdo_aerea_'+rango+'" class="form-control input-lg" placeholder=" Vía Aérea"></div>';

         texto+='<div class="col-md-4"> <label> Icónos </label> <select id="slick_aerea" style="width: 120px;" class="form-control input-lg">';
         texto += '<?php echo $select_izquierdo_aerea;?> </select><br></div>';

         texto +=' <button class="btn btn-block btn-primary btn-sm" type="button" onclick="Enviar_grafica('+rango+')"> <i class="fa fa-plus"></i> Agregar Información Oído Izquierdo </button><br>';
        }
        else if(ronda=="3")
        {
          var texto='<div class="col-md-8"> <label> Oído Izquierdo -'+rango+'- Via Oseo </label> <input type="number" name="izquierdo_oseo_'+rango+'" id="izquierdo_oseo_'+rango+'" class="form-control input-lg" placeholder="Vía Oseo"> </div>';

          texto+='<div class="col-md-4"> <label> Icónos </label> <select id="slick_oseo" style="width: 120px;" class="form-control input-lg">';
          texto += '<?php echo $select_izquierdo_oseo;?> </select><br></div>';

          texto +=' <button class="btn btn-block btn-primary btn-sm" type="button" onclick="Enviar_grafica('+rango+')"> <i class="fa fa-plus"></i> Agregar Información Oído Izquierdo </button><br>';
        }
        else if(ronda=="4")
        {
          var texto = '<label> Se llenaron todos los campos </label>';
        }
      }

      // aqui enviamos el mensaje por medio de un arreglo     
      document.getElementById("inputs").innerHTML=texto;
      
      select_imagen();

    }


    function Enviar_grafica(valor)
    {
      var rango = parseInt(valor);
      //var ronda = parseInt(document.getElementById("ronda_grafica").value);
      var ronda_editar = parseInt(document.getElementById("editar_ronda").value);
      if(ronda_editar=="9999")
      {
        var ronda = parseInt(document.getElementById("ronda_grafica").value);
      }
      else
      {
        var ronda = ronda_editar;
      }

      var arreglo = {};
      arreglo[rango] = {};

      var puntos = JSON.parse(document.getElementById("grafica").value);
      for(index in puntos) 
      {
        var rango1 = puntos[index].rango;
        arreglo[rango1] = {};

        arreglo[rango1]["rango"]=puntos[index].rango;
        
        arreglo[rango1]["izquierdo_aerea"]=puntos[index].izquierdo_aerea;
        arreglo[rango1]["izquierdo_oseo"]=puntos[index].izquierdo_oseo;
        arreglo[rango1]["izquierdo_icono_aerea"]=puntos[index].izquierdo_icono_aerea;
        arreglo[rango1]["izquierdo_icono_oseo"]=puntos[index].izquierdo_icono_oseo;

        arreglo[rango1]["derecho_aerea"]=puntos[index].derecho_aerea;
        arreglo[rango1]["derecho_oseo"]=puntos[index].derecho_oseo;
        arreglo[rango1]["derecho_icono_aerea"]=puntos[index].derecho_icono_aerea;
        arreglo[rango1]["derecho_icono_oseo"]=puntos[index].derecho_icono_oseo;
      
      
      arreglo[rango]["rango"]=rango;
      if(ronda=="0")
      {
        var derecho_icono_aerea = document.getElementById("icono_grafica_aerea").value;
        var derecho_aerea = parseInt(document.getElementById("derecho_aerea_"+valor).value);
        
        arreglo[rango]["derecho_aerea"]=derecho_aerea; 
        arreglo[rango]["derecho_icono_aerea"]=derecho_icono_aerea;
        
      }
      else if (ronda=="1"){
        
        var derecho_icono_oseo = document.getElementById("icono_grafica_oseo").value;
        var derecho_oseo = parseInt(document.getElementById("derecho_oseo_"+valor).value);

        arreglo[rango]["derecho_oseo"]=derecho_oseo;
        arreglo[rango]["derecho_icono_oseo"]=derecho_icono_oseo;
      }
      else if (ronda=="2"){
        var izquierdo_icono_aerea = document.getElementById("icono_grafica_aerea").value;
        var izquierdo_aerea = parseInt(document.getElementById("izquierdo_aerea_"+valor).value);

        arreglo[rango]["izquierdo_aerea"]=izquierdo_aerea;
        arreglo[rango]["izquierdo_icono_aerea"]=izquierdo_icono_aerea;
      }
      else if (ronda=="3"){
        
        var izquierdo_icono_oseo = document.getElementById("icono_grafica_oseo").value;
        var izquierdo_oseo = parseInt(document.getElementById("izquierdo_oseo_"+valor).value);

        arreglo[rango]["izquierdo_oseo"]=izquierdo_oseo;        
        arreglo[rango]["izquierdo_icono_oseo"]=izquierdo_icono_oseo;
      }
    }
      document.getElementById("grafica").value = JSON.stringify(arreglo);
      

      if(rango=="8000"){
        console.log('entro');
        ronda = 1+parseInt(ronda);
        document.getElementById("ronda_grafica").value=ronda;
        rango="0";
      }
      
      document.getElementById("frecuencia_actual").value=rango;
      var ticks = parseInt(document.getElementById("ticks_grafica").value);
      ticks++;
      

      var antes_editar = document.getElementById("actual_campo_audiometria_antes_editar").value;
      if(antes_editar!="ninguno")
      {
        rango=antes_editar;
        document.getElementById("actual_campo_audiometria_antes_editar").value="ninguno";
        document.getElementById("frecuencia_actual").value=rango;
        ticks--;
      }
      document.getElementById("ticks_grafica").value=ticks;
      drawChart();
      document.getElementById("editar_ronda").value="9999";
      CrearInput(rango);
    }
  </script>

<style type="text/css">.whiteHat {
  border: none;
  position: absolute;
}
.dd-selected
{color:black;padding:0px;}
.dd-options
{
  overflow: auto!important;
    height: 250px !important;
}
.dd-option-text
{
  line-height: 36px !important;
}
.dd-selected-text
{
  line-height: 36px !important;
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
        data.addColumn('number', 'Oído Derecho Aérea');
        data.addColumn('number', 'Oído Derecho Oseo');

        data.addColumn('number', 'Oído Izquiero Aerea');
        data.addColumn('number', 'Oído Izquierdo Oseo');

        var promedio_derecho=0; var promedio_izquierdo =0;
        var puntos = JSON.parse(document.getElementById("grafica").value);
        //console.log(puntos);
        for(index in puntos) 
        {
          var rango =puntos[index].rango;

          var derecho_aerea = puntos[index].derecho_aerea;
          var derecho_oseo = puntos[index].derecho_oseo;
          var izquierdo_aerea = puntos[index].izquierdo_aerea;
          var izquierdo_oseo = puntos[index].izquierdo_oseo;

          if((rango=="500" || rango=="1000" || rango=="2000") && derecho_aerea!=null)
          {
              promedio_derecho=promedio_derecho+parseInt(derecho_aerea);
          }

          if((rango=="500" || rango=="1000" || rango=="2000") && izquierdo_aerea!=null)
          {
              promedio_izquierdo=promedio_izquierdo+parseInt(izquierdo_aerea);
          }
          
          var derecho_icono_aerea = puntos[index].derecho_icono_aerea;
          var derecho_icono_oseo = puntos[index].derecho_icono_oseo;
          var izquierdo_icono_aerea = puntos[index].izquierdo_icono_aerea;
          var izquierdo_icono_oseo = puntos[index].izquierdo_icono_oseo;
          

          data.addRow([rango,derecho_aerea,derecho_oseo,izquierdo_aerea,izquierdo_oseo]);
        }

        var options = {
               hAxis: {
                  title: 'Frecuency Hertz',
                  scaleType: 'log',
                  ticks: [125,250,500,750,1000,1500,2000,3000,4000,6000,8000]
               },
               vAxis: {
                 title: 'Hearing level dB',
                 viewWindowMode: "explicit",
                  direction: -1,


                  ticks: [-10,0,10,20,30,40,50,60,70,80,90,100,110,120],
                  viewWindow: {min: -10,max:120}, 
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
                whiteHat.style.top = (yPos - 18) + 'px';
                whiteHat.style.left = (xPos)-2 + 'px';
              }
              

              ///////////////////////////////////////////////////////////

              var xPos = layout.getXLocation(data.getValue(i, 0));
              var yPos = layout.getYLocation(data.getValue(i, 2));

              
              var url1 = puntos[data.getValue(i, 0)]['derecho_icono_oseo'];
              
              if(url1!=null && yPos !=null)
              {
                
                  var whiteHat1 = container.appendChild(document.createElement('img'));
                whiteHat1.src = direccion+url1;
                whiteHat1.className = 'whiteHat';

                // 16x16 (image size in this example)
                whiteHat1.style.top = (yPos - 18) + 'px';
                whiteHat1.style.left = (xPos)-2 + 'px';
            }

              ///////////////////////////////////////////////////////////

              var xPos = layout.getXLocation(data.getValue(i, 0));
              var yPos = layout.getYLocation(data.getValue(i, 3));

              
              var url2 = puntos[data.getValue(i, 0)]['izquierdo_icono_aerea'];

              if(url2!=null && yPos !=null)
              {
                
                  var whiteHat2 = container.appendChild(document.createElement('img'));
                whiteHat2.src = direccion+url2;
                whiteHat2.className = 'whiteHat';

                // 16x16 (image size in this example)
                whiteHat2.style.top = (yPos - 18) + 'px';
                whiteHat2.style.left = (xPos)-2 + 'px';
            }

              ///////////////////////////////////////////////////////////

              var xPos = layout.getXLocation(data.getValue(i, 0));
              var yPos = layout.getYLocation(data.getValue(i, 4));

              ;
              var url3 = puntos[data.getValue(i, 0)]['izquierdo_icono_oseo'];

              if(url3!=null && yPos !=null)
              {
                
                  var whiteHat3 = container.appendChild(document.createElement('img'))
                whiteHat3.src = direccion+url3;
                whiteHat3.className = 'whiteHat';

                // 16x16 (image size in this example)
                whiteHat3.style.top = (yPos - 18) + 'px';
                whiteHat3.style.left = (xPos)-2 + 'px';
              }
              ///////////////////////////////////////////////////////////


            
          }
        });
        document.getElementById("promedio_derecho_audible1").innerHTML = (promedio_derecho/3).toFixed(1);
        document.getElementById("promedio_derecho_audible2").innerHTML = (promedio_izquierdo/3).toFixed(1);
        console.log(promedio_derecho);
        console.log(promedio_izquierdo);
        chart.draw(data, options);



        }

    </script>
    <div class="form-group col-md-12" align="center"><hr></div>
    <button type="button"  data-toggle="modal" data-target="#modalForm" onclick="Select_EditarGrafica();" title="Editar Grafica"> Editar Grafica
      <i class="fa fa-pencil"></i>
    </button>
    <div id="curve_chart" class="col-md-12"style="width: 100%; height: 500px"></div>
    <div class="row">
        <label id="promedio_tonal1" style="width: 50%;text-align-last: end;">Promedio Tonos Audibles (PTA) Oído Derecho: <u id="promedio_derecho_audible1"> </u> dB</label>
        <label id="promedio_tonal2">Promedio Tonos Audibles (PTA) Oído Izquierdo:  <u id="promedio_derecho_audible2"></u> dB</label>
      <div id="inputs" class="col-md-12"> </div>
      <input  type="hidden" name="grafica" id="grafica" value='{"0":{"rango":0,"izquierdo_aerea":null,"izquierdo_osea":null,"izquierdo_icono_aerea":null,"izquierdo_icono_oseo":null,"derecho_aerea":null,"derecho_osea":null,"derecho_icono_aerea":null,"derecho_icono_oseo":null}}'>

      <input type="hidden" name="icono_grafica_oseo" id="icono_grafica_oseo">
      <input type="hidden" name="icono_grafica_aerea" id="icono_grafica_aerea">

      <input type="hidden" name="ronda_grafica" id="ronda_grafica" value="0">
      <input type="hidden" name="frecuencia_actual" id="frecuencia_actual" value="0">

      <input type="hidden" name="ticks_grafica" id="ticks_grafica" value="0">
    </div>
    <div class="form-group col-md-12" align="center"><hr></div>
  
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
                        <input  type="hidden" name="actual_campo_audiometria_antes_editar" id="actual_campo_audiometria_antes_editar" value="ninguno">
                        
                    </div>

                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <a href="#"  onclick="EditarGrafica();" class="btn btn-default"> <i class="fa fa-glyphicon glyphicon-plus"></i> <strong> Actualizar </strong></a>

                
            </div>
        </div>
    </div>
</div>











<?php
  }//cierre de la audiometria tonal

  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  if($Modulo=="Logoaudiometria")
  {  
      
    //se necesita la tabla iconos_grafica
?>










<?php
    $queryList=mysqli_query($conn3,"SELECT * FROM  iconos_grafica ");
    $nrowl=mysqli_num_rows($queryList);
    while($rowMotorizado=mysqli_fetch_array($queryList))
    {
        $id=$rowMotorizado['id'];
        $nombre=$rowMotorizado['nombre'];
        $ruta=$rowMotorizado['ruta'];
        $tipo=$rowMotorizado['tipo'];
        $clase=$rowMotorizado['clase'];

        if($tipo=="1" AND $clase=="1")
        {
          if($id=="16")
          {
            $select_izquierdo_aerea.='<option value="'.$ruta.'" data-imagesrc="https://medicalsoftplus.com/baseDev/IconosGraficas/'.$ruta.'"; selected> '.$nombre.' </option>';
          }
          else
          {
            $select_izquierdo_aerea.='<option value="'.$ruta.'" data-imagesrc="https://medicalsoftplus.com/baseDev/IconosGraficas/'.$ruta.'"; > '.$nombre.' </option>';
          }
        }

        if($tipo=="2" AND $clase=="1")
        {
          if($id=="8")
          {
            $select_derecho_aerea.='<option value="'.$ruta.'" data-imagesrc="https://medicalsoftplus.com/baseDev/IconosGraficas/'.$ruta.'"; selected> '.$nombre.' </option>';
          }
          else
          {
            $select_derecho_aerea.='<option value="'.$ruta.'" data-imagesrc="https://medicalsoftplus.com/baseDev/IconosGraficas/'.$ruta.'";> '.$nombre.' </option>';
          }
        }

    }
?>

<!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>-->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script> <!-- no se repita el javascript y genere error en el footer se condiciono este script-->
<!--<script type="text/javascript" src="https://cdn.rawgit.com/prashantchaudhary/ddslick/master/jquery.ddslick.min.js" ></script>-->
<script type="text/javascript" src="plugins/DdslickK/jquery.ddslick.min.js"></script>

<input  type="hidden" name="editar_ronda1" id="editar_ronda1" value="9999">

    <script>

    function select_imagen1()
    {
      $("#slick_aerea1").ddslick({
        width:"100%",
        imagePosition:"left",
        selectText: "Seleccione Simbolo",
        onSelected: function(data)
        {
          //es el input que va a tener el valor del select de los iconos
          $("#icono_grafica_aerea1").val(data.selectedData.value);
        }
      })

    }


    </script>

<script type="text/javascript">
    function CrearInput1(value)
    {
      var ronda_editar = document.getElementById("editar_ronda1").value;
      if(ronda_editar=="9999")
      {
        var ronda = document.getElementById("ronda_grafica1").value;
      }
      else
      {
        var ronda = ronda_editar;
      }
      
      var rangos = [-1,0,5,10,15,20,25,30,35,40,45,50,55,60,65,70,75,80,85,90,95,100];

      for (var i = 0; i < rangos.length; i++) {
         if(value=="100"){var rango=rangos[2];break;}
         if(value==rangos[i]){var rango=rangos[i+1];break;}
      }
      //if(ronda=="5"){var rango='final';}

      if(rango !="final")
      {
        if(ronda=="0")
        {
          var texto = '<div class="col-md-8"><label> Oído Derecho -'+rango+'- Vía Aérea </label> <input type="number" name="derecho_aerea1_'+rango+'" id="derecho_aerea1_'+rango+'" class="form-control input-lg" placeholder=" Vía Aérea"></div>';

          texto+='<div class="col-md-4"> <label> Icónos </label> <select id="slick_aerea1" style="width: 120px;" class="form-control input-lg">';
          texto += '<?php echo $select_derecho_aerea;?> </select><br></div>';

          texto +=' <button class="btn btn-block btn-primary btn-sm" type="button" onclick="Enviar_grafica1('+rango+')"> <i class="fa fa-plus"></i> Agregar Información Oído Derecho - Vía Aérea </button><br>';
        }
        else if(ronda=="1")
        {
          var texto = '<div class="col-md-8"><label> Oído Izquierdo -'+rango+'- Vía Aerea </label> <input type="number" name="izquierdo_aerea1_'+rango+'" id="izquierdo_aerea1_'+rango+'" class="form-control input-lg" placeholder=" Vía Aérea"></div>';

         texto+='<div class="col-md-4"> <label> Icónos </label> <select id="slick_aerea1" style="width: 120px;" class="form-control input-lg">';
         texto += '<?php echo $select_izquierdo_aerea;?> </select><br></div>';

         texto +=' <button class="btn btn-block btn-primary btn-sm" type="button" onclick="Enviar_grafica1('+rango+')"> <i class="fa fa-plus"></i> Agregar Información Oído Izquierdo </button><br>';
        }
        else if(ronda=="2")
        {
          var texto = '<label> Se llenaron todos los campos </label>';
        }
      }

      // aqui enviamos el mensaje por medio de un arreglo     
      document.getElementById("inputs1").innerHTML=texto;
      
      select_imagen1();

    }


    function Enviar_grafica1(valor)
    {
      var rango = parseInt(valor);
      //var ronda = parseInt(document.getElementById("ronda_grafica1").value);
      var ronda_editar = parseInt(document.getElementById("editar_ronda1").value);
      if(ronda_editar=="9999")
      {
        var ronda = parseInt(document.getElementById("ronda_grafica1").value);
      }
      else
      {
        var ronda = ronda_editar;
      }

      var arreglo = {};
      arreglo[rango] = {};

      var puntos = JSON.parse(document.getElementById("grafica1").value);
      for(index in puntos) 
      {
        var rango1 = puntos[index].rango;
        arreglo[rango1] = {};

        arreglo[rango1]["rango"]=puntos[index].rango;
        
        arreglo[rango1]["izquierdo_aerea"]=puntos[index].izquierdo_aerea;
        arreglo[rango1]["izquierdo_icono_aerea"]=puntos[index].izquierdo_icono_aerea;

        arreglo[rango1]["derecho_aerea"]=puntos[index].derecho_aerea;
        arreglo[rango1]["derecho_icono_aerea"]=puntos[index].derecho_icono_aerea;
      
      
      arreglo[rango]["rango"]=rango;
      if(ronda=="0")
      {
        var derecho_icono_aerea = document.getElementById("icono_grafica_aerea1").value;
        var derecho_aerea = parseInt(document.getElementById("derecho_aerea1_"+valor).value);
        
        arreglo[rango]["derecho_aerea"]=derecho_aerea; 
        arreglo[rango]["derecho_icono_aerea"]=derecho_icono_aerea;
        
      }
      else if (ronda=="1"){
        var izquierdo_icono_aerea = document.getElementById("icono_grafica_aerea1").value;
        var izquierdo_aerea = parseInt(document.getElementById("izquierdo_aerea1_"+valor).value);

        arreglo[rango]["izquierdo_aerea"]=izquierdo_aerea;
        arreglo[rango]["izquierdo_icono_aerea"]=izquierdo_icono_aerea;
      }

    }
      document.getElementById("grafica1").value = JSON.stringify(arreglo);
      

      if(rango=="100"){
        console.log('entro');
        ronda = 1+parseInt(ronda);
        document.getElementById("ronda_grafica1").value=ronda;
        rango="-1";
      }
      
      document.getElementById("frecuencia_actual1").value=rango;
      var ticks = parseInt(document.getElementById("ticks_grafica1").value);
      ticks++;
      

      var antes_editar = document.getElementById("actual_campo_audiometria_antes_editar1").value;
      if(antes_editar!="ninguno")
      {
        rango=antes_editar;
        document.getElementById("actual_campo_audiometria_antes_editar1").value="ninguno";
        document.getElementById("frecuencia_actual1").value=rango;
        ticks--;
      }
      document.getElementById("ticks_grafica1").value=ticks;
      drawChart1();
      document.getElementById("editar_ronda1").value="9999";
      CrearInput1(rango);
    }
  </script>

<style type="text/css">.whiteHat {
  border: none;
  position: absolute;
}
.dd-selected
{color:black;padding:0px;}
.dd-options
{
  overflow: auto!important;
    height: 250px !important;
}
.dd-option-text
{
  line-height: 36px !important;
}
.dd-selected-text
{
  line-height: 36px !important;
}
</style>

<!--<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>-->
<script type="text/javascript" src="plugins/LoaderK/loader.js"></script>
    <script type="text/javascript">

      /////////////////////////////////////////////////
      google.charts.load('current', {'packages':['corechart','line']});
      google.charts.setOnLoadCallback(drawChart1);

      function drawChart1() {
        var data = new google.visualization.DataTable();
        data.addColumn('number', 'Frecuency Heartz');
        data.addColumn('number', 'Oído Derecho Aérea');
        data.addColumn('number', 'Oído Izquiero Aérea');


        var puntos = JSON.parse(document.getElementById("grafica1").value);
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
            series: {
              0: { color: '#FF0000' },
              1: { color: '#0082fd' },
            },
            interpolateNulls: true,
             };

        var container = document.getElementById('curve_chart1');
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
                whiteHat.style.top = (yPos - 18) + 'px';
                whiteHat.style.left = (xPos)-2 + 'px';
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
                whiteHat2.style.top = (yPos - 18) + 'px';
                whiteHat2.style.left = (xPos)-2 + 'px';
            }

              ///////////////////////////////////////////////////////////       
          }
        });

        chart.draw(data, options);
      }

    </script>

    <div class="form-group col-md-12" align="center"><hr></div>
    <button type="button"  data-toggle="modal" data-target="#modalForm1" onclick="Select_EditarGrafica1();" title="Editar Grafica"> Editar Grafica
      <i class="fa fa-pencil"></i>
    </button>
    <div id="curve_chart1" class="col-md-12"style="width: 100%; height: 500px"></div>
    <div class="row">
      <div id="inputs1" class="col-md-12"> </div>
      <input  type="hidden" name="grafica1" id="grafica1" value='{"0":{"rango":0,"izquierdo_aerea":null,"izquierdo_icono_aerea":null,"derecho_aerea":null,"derecho_icono_aerea":null}}'>

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
        <input type="text" name="LogoAudiometria[Umbral de voz][Oido Derecho]"  class="form-control input-lg" pattern="[^'\x22]+" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)">
      </div>
      <div class="col-md-6">
        <label>Umbral de voz (Oído Izquierdo)</label>
        <input type="text" name="LogoAudiometria[Umbral de voz][Oido Izquierdo]"  class="form-control input-lg" pattern="[^'\x22]+" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)">
      </div>

      <div class="col-md-6">
        <label>Umbral de Palabra (Oído Derecho)</label>
        <input type="text" name="LogoAudiometria[Umbral de Palabra][Oido Derecho]"  class="form-control input-lg" pattern="[^'\x22]+" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)">
      </div>
      <div class="col-md-6">
        <label>Umbral de Palabra (Oído Izquierdo)</label>
        <input type="text" name="LogoAudiometria[Umbral de Palabra][Oido Izquierdo]"  class="form-control input-lg" pattern="[^'\x22]+" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)">
      </div>

      <div class="col-md-6">
        <label>Umbral de Captación (Oído Derecho)</label>
        <input type="text" name="LogoAudiometria[Umbral de Captación][Oido Derecho]"  class="form-control input-lg" pattern="[^'\x22]+" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)">
      </div>
      <div class="col-md-6">
        <label>Umbral de Captación (Oído Izquierdo)</label>
        <input type="text" name="LogoAudiometria[Umbral de Captación][Oido Izquierdo]"  class="form-control input-lg" pattern="[^'\x22]+" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)">
      </div>

      <div class="col-md-6">
        <label>Umbral de Máxima Discriminación (Oído Derecho)</label>
        <input type="text" name="LogoAudiometria[Umbral de Máxima Discriminación][Oido Derecho]"  class="form-control input-lg" pattern="[^'\x22]+" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)">
      </div>
      <div class="col-md-6">
        <label>Umbral de Máxima Discriminación (Oído Izquierdo)</label>
        <input type="text" name="LogoAudiometria[Umbral de Máxima Discriminación][Oido Izquierdo]"  class="form-control input-lg" pattern="[^'\x22]+" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)">
      </div>

      <div class="col-md-6">
        <label>Umbral de Distorsión (Oído Derecho)</label>
        <input type="text" name="LogoAudiometria[Umbral de Distorsión][Oido Derecho]"  class="form-control input-lg" pattern="[^'\x22]+" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)">
      </div>
      <div class="col-md-6">
        <label>Umbral de Distorsión (Oído Izquierdo)</label>
        <input type="text" name="LogoAudiometria[Umbral de Distorsión][Oido Izquierdo]"  class="form-control input-lg" pattern="[^'\x22]+" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)">
      </div>

      <div class="col-md-6">
        <label>% Discriminación (Oído Derecho)</label>
        <input type="text" name="LogoAudiometria[% Discriminación][Oido Derecho]"  class="form-control input-lg" pattern="[^'\x22]+" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)">
      </div>
      <div class="col-md-6">
        <label>% Discriminación (Oído Izquierdo)</label>
        <input type="text" name="LogoAudiometria[% Discriminación][Oido Izquierdo]"  class="form-control input-lg" pattern="[^'\x22]+" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)">
      </div>

      <div class="col-md-6">
        <label>MCL (Oído Derecho)</label>
        <input type="text" name="LogoAudiometria[MCL][Oido Derecho]"  class="form-control input-lg" pattern="[^'\x22]+" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)">
      </div>
      <div class="col-md-6">
        <label>MCL (Oído Izquierdo)</label>
        <input type="text" name="LogoAudiometria[MCL][Oido Izquierdo]"  class="form-control input-lg" pattern="[^'\x22]+" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)">
      </div>

      <div class="col-md-6">
        <label>UCL (Oído Derecho)</label>
        <input type="text" name="LogoAudiometria[UCL][Oido Derecho]"  class="form-control input-lg" pattern="[^'\x22]+" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)">
      </div>
      <div class="col-md-6">
        <label>UCL (Oído Izquierdo)</label>
        <input type="text" name="LogoAudiometria[UCL][Oido Izquierdo]"  class="form-control input-lg" pattern="[^'\x22]+" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)">
      </div>
      <br><br>
    </div>

    <div class="form-group col-md-6">        
        <b>Oído Derecho:</b>
        <select class="form-control select2"  name="logoderecho"  >
        <option value="">Seleccione </option>
            <option value="Curva de la logoaudiometr&iacute;a normal que se correlaciona con la audiometr&iacute;a.">Curva de la logoaudiometr&iacute;a normal que se correlaciona con la audiometr&iacute;a. </option>

        <option value="Curva de la logoaudiometr&iacute;a desplazada que se correlaciona con la audiometr&iacute;a.">Curva de la logoaudiometr&iacute;a desplazada que se correlaciona con la audiometr&iacute;a. </option>

        <option value="No responde a la m&aacute;xima intensidad del audi&oacute;metro.">No responde a la m&aacute;xima intensidad del audi&oacute;metro.</option>

        <option value="No responde de forma adecuada a los est&iacute;mulos auditivos por lo que no se pueden obtener respuestas confiables y precisas.">No responde de forma adecuada a los est&iacute;mulos auditivos por lo que no se pueden obtener respuestas confiables y precisas.</option>


        </select>
    </div>



    <div class="form-group col-md-6">
                    
        <b>Oído Izquierdo:</b>
        <select class="form-control select2" name="logoIzquierdo"  >
        <option value="">Seleccione </option>

        <option value="Curva de la logoaudiometr&iacute;a normal que se correlaciona con la audiometr&iacute;a."> Curva de la logoaudiometr&iacute;a normal que se correlaciona con la audiometr&iacute;a. </option>
        <option value="Curva de la logoaudiometr&iacute;a desplazada que se correlaciona con la audiometr&iacute;a.">Curva de la logoaudiometr&iacute;a desplazada que se correlaciona con la audiometr&iacute;a. </option>
        <option value="No responde a la m&aacute;xima intensidad del audi&oacute;metro.">No responde a la m&aacute;xima intensidad del audi&oacute;metro.</option>
        <option value="No responde de forma adecuada a los est&iacute;mulos auditivos por lo que no se pueden obtener respuestas confiables y precisas.">No responde de forma adecuada a los est&iacute;mulos auditivos por lo que no se pueden obtener respuestas confiables y precisas.</option>


        </select> 
    </div>


    <div class="form-group col-md-6"> 
        <input type="text" name="discriDer"  value="Logra discriminar al   %  a    dB" class="form-control input-lg" id="enfermedadActual">
    </div>            


    <div class="form-group col-md-6"> 
        <input type="text" name="discriIz"  value="Logra discriminar al   %  a    dB" class="form-control input-lg" id="enfermedadActual">
    </div>   
    <div class="form-group col-md-12" align="center"><hr></div>


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
                        <input  type="hidden" name="actual_campo_audiometria_antes_editar1" id="actual_campo_audiometria_antes_editar1" value="ninguno">
                        
                    </div>

                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <a href="#"  onclick="EditarGrafica1();" class="btn btn-default"> <i class="fa fa-glyphicon glyphicon-plus"></i> <strong> Actualizar </strong></a>

                
            </div>
        </div>
    </div>
</div>

<?php
  }// cierre de logoaudiometria

  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  if($Modulo=="Impedanciometria")
  {
?>










<script type="text/javascript">

/////////////////////////////////////////////////
google.charts.load('current', {'packages':['corechart','line']});
google.charts.setOnLoadCallback(drawChart2);

function drawChart2() {
  var data = new google.visualization.DataTable();
  data.addColumn('number', 'daPa');
  data.addColumn('number', 'Oído Derecho');     

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
  data.addColumn('number', 'Oído Izquierdo');

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
      interpolateNulls: true,
       };

  var container = document.getElementById('curve_chart3');
  var chart = new google.visualization.LineChart(container);

  chart.draw(data, options);
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
background: #e47171;;
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
background: #e47171;;
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

.solution_card .so_top_icon {
}

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
background: linear-gradient(
140deg,
#42c3ca 0%,
#42c3ca 50%,
#42c3cac7 75%
) !important;
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
.our_solution_content p {
}

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
<div class="form-group col-md-12" align="center"><hr></div>
<div class="row">
<!--<div class="form-group col-md-12" align="center"> <strong> Timpanogramas: </strong></div>-->
<div id="curve_chart2" class="col-md-6"style="height: 500px"></div>
<div id="curve_chart3" class="col-md-6"style="height: 500px"></div>

<div  class="col-md-12 box">
<div  class="col-md-6 timpanograma_zoom">
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
  <div class="col-md-2">
      <label> Gradiente </label> 
      <input type="number" name="Timpanograma[Derecho][Gradiente]" id="timpanograma_gradiente1" class="form-control input-lg" step="any">
  </div>

<input  type="hidden" name="grafica_timpanograma_arreglo_1" id="grafica_timpanograma_arreglo_1" value='{"0":{"x":null,"y":null}}'>
<input  type="hidden" name="posicionxtemp1" id="posicionxtemp1" value="9999">

<div class="col-md-2">
  <hr style="margin-top: 10px;">
  <a onclick="CargarPuntos(1,'principal');" class="btn btn-default"> <i class="fa fa-glyphicon glyphicon-plus"></i> <strong> Oído Derecho </strong></a>
</div>
</div>
<div  class="col-md-6 timpanograma_zoom" >
  <div class="col-md-2">
      <div class="solution_cards_box"  id="popUp" style="display: none;position: absolute;top: -200px;width: 200px;">
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
  <div class="col-md-2">
      <label> Gradiente </label> 
      <input type="number" name="Timpanograma[Izquierdo][Gradiente]" id="timpanograma_gradiente2" class="form-control input-lg" step="any">
  </div>

<input  type="hidden" name="grafica_timpanograma_arreglo_2" id="grafica_timpanograma_arreglo_2" value='{"0":{"x":null,"y":null}}'>
<input  type="hidden" name="posicionxtemp2" id="posicionxtemp2" value="9999">

<div class="col-md-2">
  <hr style="margin-top: 10px;">
  <a onclick="CargarPuntos(2,'principal');" class="btn btn-default"> <i class="fa fa-glyphicon glyphicon-plus"></i> <strong> Oído Izquierdo </strong></a>
</div>
</div>

<input  type="hidden" name="timpanogramax" id="timpanogramax">
<input  type="hidden" name="timpanogramay" id="timpanogramay">

<div  class="col-md-6">
<br>  
<a onclick="PuntosGrafica(1)" class="btn btn-block btn-primary btn-sm" style="float: right;"> <i class="fa fa-glyphicon glyphicon-plus"></i> <strong> Añadir mas puntos en la grafica (Oído Derecho) </strong></a>
<a onclick="reestablecer(1)" style="display: flow-root;"> <i class="fa fa-trash" style="color: red;padding: 5px;font-size: 20px;"></i></a>
</div>
<div  class="col-md-6">
<br>  
<a onclick="PuntosGrafica(2)" class="btn btn-block btn-primary btn-sm" style="float: right;"> <i class="fa fa-glyphicon glyphicon-plus"></i> <strong> Añadir mas puntos en la grafica (Oído Izquierdo) </strong></a>
<a onclick="reestablecer(2)" style="display: flow-root;"> <i class="fa fa-trash" style="color: red;padding: 5px;font-size: 20px;"></i></a>
</div>

<div  class="col-md-12" id="reflejosestapediales">
<script type="text/javascript">
  function reflejosestapediales()
  {
    
    var arreglo = ["Reflejos_Ipsilaterales","Reflejos_Contralaterales"];
    var arreglo_1 = [500,1000,2000,4000];
    var pattern = "[^,/|\\x22\\x27]+";

    var texto="";
    for (var i = 0; i < arreglo.length; i++)
    {
       texto += '<div class="col-md-12" align="center"><h3>'+arreglo[i].replace("_", " ")+'</h3></div>';
       texto += '<div class="col-md-4 form-group"><label>Frecuencia</label></div><div class="col-md-4 form-group"><label> Oído Derecho</label></div><div class="col-md-4 form-group"><label>Oído Izquierdo</label></div>';


      for (var k = 0; k < arreglo_1.length; k++)
      {
        texto += '<div class="col-md-4 form-group"><label>'+arreglo_1[k]+'Hz</label></div><div class="col-md-4 form-group"> <input type="text" name="'+arreglo[i]+'['+arreglo_1[k]+'][Oido Derecho]" class="form-control input-lg" placeholder="dB" value="dB" pattern="'+pattern+'" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)"> </div><div class="col-md-4 form-group"><input type="text" name="'+arreglo[i]+'['+arreglo_1[k]+'][Oido Izquierdo]" class="form-control input-lg" placeholder="dB" value="dB" pattern="'+pattern+'" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)"></div>';
      }
    }
    document.getElementById("reflejosestapediales").innerHTML=texto;
  }

  reflejosestapediales();
  
</script>
</div>
<div class="form-group col-md-12" align="center"><hr></div>

</div> 

</div>
<style type="text/css">
.swal2-popup {
font-size: 1.5rem;    
}
</style>


<script src="plugins/SweetAlert2K/Sweetalert2.11.1.5.js"></script>

<script type="text/javascript">
function reestablecer(valor)
{
if(valor==1)
{
  document.getElementById("grafica_timpanograma_arreglo_1").value='{"0":{"x":null,"y":null}}';
  drawChart2();
}

if(valor==2)
{
  document.getElementById("grafica_timpanograma_arreglo_2").value='{"0":{"x":null,"y":null}}';
  drawChart3();
}
}

function PuntosGrafica(valor)
{

const { value: text } =  Swal.fire({
toast: true,
icon: 'question',
title: 'Añadir mas puntos a la grafica',
html:
'<label>Eje daPa </label>'+
'<input id="swal-input1" class="swal2-input" style="max-width: 100%;" type="number" value="0">'+
'<label>Eje ml </label>'+
'<input id="swal-input2" class="swal2-input" style="max-width: 100%;" type="number" value="0">',
focusConfirm: false,
showCancelButton: true,
preConfirm: () => {
 var contador = "0";
 var mensaje = "";
 //alert(document.getElementById('swal-input1').value);
 //alert(document.getElementById('swal-input2').value);
 if (document.getElementById('swal-input1').value<=-400 || document.getElementById('swal-input1').value>=200 || document.getElementById('swal-input1').value=="" ) 
 {
  mensaje += 'El campo debe estar en el rango de -400 y 200 <br>';
 }
 else{document.getElementById('timpanogramax').value=document.getElementById('swal-input1').value;
 contador++}

 if (document.getElementById('swal-input2').value<=-400 || document.getElementById('swal-input2').value>=200 || document.getElementById('swal-input1').value=="" ) 
 {
  mensaje += 'El campo debe estar en el rango de -400 y 200 <br>';
 }
 else{document.getElementById('timpanogramay').value=document.getElementById('swal-input2').value;
 contador++}
 
 if(contador=="2"){CargarPuntos(valor,'secundario');
 }else{Swal.showValidationMessage(mensaje);}
}
})


}


function CargarPuntos(valor,tipo)
{
if(valor=="1" && tipo=="secundario")
{
var arreglo = {};

var puntos = JSON.parse(document.getElementById("grafica_timpanograma_arreglo_1").value);
for(index in puntos) 
{
  arreglo[index] = {};

  arreglo[index]["x"]=puntos[index].x;
  
  arreglo[index]["y"]=puntos[index].y;
}

  var x = parseFloat(document.getElementById("timpanogramax").value);
  var y = parseFloat(document.getElementById("timpanogramay").value);
  
  arreglo[x] = {};

  arreglo[x]["x"]=x; 
  arreglo[x]["y"]=y;  

document.getElementById("grafica_timpanograma_arreglo_1").value = JSON.stringify(arreglo);
drawChart2();
}


if(valor=="2" && tipo=="secundario")
{
var arreglo = {};

var puntos = JSON.parse(document.getElementById("grafica_timpanograma_arreglo_2").value);
for(index in puntos) 
{
  arreglo[index] = {};

  arreglo[index]["x"]=puntos[index].x;
  
  arreglo[index]["y"]=puntos[index].y;
}

  var x = parseFloat(document.getElementById("timpanogramax").value);
  var y = parseFloat(document.getElementById("timpanogramay").value);
  
  arreglo[x] = {};

  arreglo[x]["x"]=x; 
  arreglo[x]["y"]=y;

document.getElementById("grafica_timpanograma_arreglo_2").value = JSON.stringify(arreglo);
drawChart3();
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////

if(valor=="1" && tipo=="principal")
{
var pos = parseInt(document.getElementById("posicionxtemp1").value);

var arreglo = {};

var puntos = JSON.parse(document.getElementById("grafica_timpanograma_arreglo_1").value);
for(index in puntos) 
{
  arreglo[index] = {};

  arreglo[index]["x"]=puntos[index].x;
  
  arreglo[index]["y"]=puntos[index].y;
}

 if(pos!="9999"){delete(arreglo[pos]);}

  var x = parseFloat(document.getElementById("timpanograma_presion1").value);
  var y = parseFloat(document.getElementById("timpanograma_complacencia1").value);
  
  arreglo[x] = {};

  arreglo[x]["x"]=x; 
  arreglo[x]["y"]=y;

document.getElementById("posicionxtemp1").value = x;
document.getElementById("grafica_timpanograma_arreglo_1").value = JSON.stringify(arreglo);

drawChart2();
}


if(valor=="2" && tipo=="principal")
{
var arreglo = {};
var pos = parseInt(document.getElementById("posicionxtemp2").value);

var puntos = JSON.parse(document.getElementById("grafica_timpanograma_arreglo_2").value);
for(index in puntos) 
{
  arreglo[index] = {};

  arreglo[index]["x"]=puntos[index].x;
  
  arreglo[index]["y"]=puntos[index].y;
}

if(pos!="9999"){delete(arreglo[pos]);}

  var x = parseFloat(document.getElementById("timpanograma_presion2").value);
  var y = parseFloat(document.getElementById("timpanograma_complacencia2").value);
  
  arreglo[x] = {};

  arreglo[x]["x"]=x; 
  arreglo[x]["y"]=y;

document.getElementById("posicionxtemp2").value = x;
document.getElementById("grafica_timpanograma_arreglo_2").value = JSON.stringify(arreglo);
drawChart3();
}



}
</script>

<?php
  } //cierre de impedanciometria

  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  if($Modulo=="Entidad")
  {
?>

    <div class="form-group col-md-12">
        <div align="left"> <h4>Entidad dónde se realiza la evaluación </h4></div>
            <select id="Entidad" name="Entidad" class="form-control select2" style="width: 100%;" required="required"  >
                <option value="" selected="selected">Seleccione</option>
                    <?php
 
                            $queryList=mysqli_query($conn3,"SELECT * FROM H_Entidades  where activo=1");
                            $nrowl=mysqli_num_rows($queryList);
                            while($row_recordset32=mysqli_fetch_array($queryList))
                            {

                                    $ID    = $row_recordset32['ID'];
                                    $nombre     = $row_recordset32['nombre'];
                                    $des     = $row_recordset32['descripcion'];
                                  
                                    echo "<option value='$ID'> $des</option>";

                            }

                    ?>
            </select>
    </div>


    <div class="col-md-12" align="center"> <B>Equipos Utilizados</B></div>                                                    
        <div class="form-group col-md-12">
            <select id="cie" name="equipos[]" class="form-control select2" style="width: 100%;" multiple>
                <option value="" selected="selected">Seleccione ...</option> ';   
                    <?php
                    $queryList=mysqli_query($conn3,"SELECT * FROM H_Equipos where activo=1");
                    $nrowl=mysqli_num_rows($queryList);
                    while($row_recordset32A=mysqli_fetch_array($queryList))
                    {
                        $fecha_c= $row_recordset32A['fecha_c'];
                        $nombre= $row_recordset32A['nombre'];
    
                       
                        echo "<option value='$nombre, Fecha calibraci&oacute;n: $fecha_c'> $nombre / Fecha calibración: $fecha_c </option>";
                    }

                ?>
            </select>
     </div>


<?php
  }//cierre del modulo entidad
?>

<?php     
}// cierre del foreach
?>

<script type="text/javascript">

  function Select_EditarGrafica()
  {
    var ronda = document.getElementById("ronda_grafica").value;
    var rangos = [0,125,250,500,750,1000,1500,2000,3000,4000,6000,8000];
    var etapas = ["Via Aerea - Oido Derecho","Via Oseo - Oido Derecho","Via Aerea - Oido Izquierdo","Via Oseo - Oido Izquierdo"];

    var puntos = JSON.parse(document.getElementById("grafica").value);
    
    var ticks = document.getElementById("ticks_grafica").value;
    var text="0";var contador="1";

    for (i = 0; i < 4; i++) 
    {

      for(index in puntos) 
      {
        
        

        var value = puntos[index].rango;

        if(value=="125"){var rango_final=rangos[0];}
        if(value=="250"){var rango_final=rangos[1];}
        if(value=="500"){var rango_final=rangos[2];}
        if(value=="750"){var rango_final=rangos[3];}
        if(value=="1000"){var rango_final=rangos[4];}
        if(value=="1500"){var rango_final=rangos[5];}
        if(value=="2000"){var rango_final=rangos[6];}
        if(value=="3000"){var rango_final=rangos[7];}
        if(value=="4000"){var rango_final=rangos[8];}
        if(value=="6000"){var rango_final=rangos[9];}
        if(value=="8000"){var rango_final=rangos[10];}

        if(i==0){var repuesta = puntos[index].derecho_aerea;var estilo="style='background-color:#ff222294;'"}
        if(i==1){var repuesta = puntos[index].derecho_oseo;var estilo="style='background-color:#f344447d'"}
        if(i==2){var repuesta = puntos[index].izquierdo_aerea;var estilo="style='background-color:#3b83bd'"}
        if(i==3){var repuesta = puntos[index].izquierdo_oseo;var estilo="style='background-color:#67a1cf'"}

        if(value!="0")
        {
         text +="<option value='"+rango_final+"_"+i+"' "+estilo+"><b>"+value+" - "+etapas[i]+"</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Valor Digitado: "+repuesta+"</option>";
        }
        else
        {
          contador--;
        }
        if(ticks==contador){break;}
        contador++;
      }
      if(ticks==contador){break;}
    }
    

    document.getElementById('EditarGrafica_Audiometria').innerHTML=text;
    
  }

  function EditarGrafica()
  {
    var frecuencia_actual = document.getElementById("frecuencia_actual").value;
    document.getElementById('actual_campo_audiometria_antes_editar').value=frecuencia_actual;

    var frecuencia = document.getElementById("EditarGrafica_Audiometria").value;
    var respuesta = frecuencia.split("_");
    document.getElementById("editar_ronda").value=respuesta[1];
    //console.log(respuesta[0]);
    //console.log(respuesta[1]);
    CrearInput(respuesta[0]);
    $('#modalForm').modal('hide')

  }
</script>

<script type="text/javascript">

  function Select_EditarGrafica1()
  {
    var ronda = document.getElementById("ronda_grafica1").value;
    var rangos = [0,5,10,15,20,25,30,35,40,45,50,55,60,65,70,75,80,85,90,95,100];
      
    var etapas = ["Via Aerea - Oido Derecho","Via Aerea - Oido Izquierdo"];

    var puntos = JSON.parse(document.getElementById("grafica1").value);
    
    var ticks = document.getElementById("ticks_grafica1").value;
    var text="0";var contador="1";

    for (i = 0; i < 2; i++) //cantidad de lineas que hay en la grafica
    {

      for(index in puntos) 
      {
        
        var value = puntos[index].rango;

        for (var k = 0; k < rangos.length; k++) {
           if(value=="0"){var rango_final="-1";break;}
           if(value==rangos[k]){var rango_final=rangos[k-1];break;}
        }

        if(i==0){var repuesta = puntos[index].derecho_aerea;var estilo="style='background-color:#ff222294;'"}
        if(i==1){var repuesta = puntos[index].izquierdo_aerea;var estilo="style='background-color:#3b83bd'"}

        if(value!="-1")
        {
         text +="<option value='"+rango_final+"_"+i+"' "+estilo+"><b>"+value+" - "+etapas[i]+"</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Valor Digitado: "+repuesta+"</option>";
        }
        else
        {
          contador--;
        }
        if(ticks==contador){break;}
        contador++;
      }
      if(ticks==contador){break;}
    }
    

    document.getElementById('EditarGrafica_Audiometria1').innerHTML=text;
    
  }

  function EditarGrafica1()
  {
    var frecuencia_actual = document.getElementById("frecuencia_actual1").value;
    document.getElementById('actual_campo_audiometria_antes_editar1').value=frecuencia_actual;

    var frecuencia = document.getElementById("EditarGrafica_Audiometria1").value;
    var respuesta = frecuencia.split("_");
    document.getElementById("editar_ronda1").value=respuesta[1];
    CrearInput1(respuesta[0]);
    $('#modalForm1').modal('hide');

  }
</script>