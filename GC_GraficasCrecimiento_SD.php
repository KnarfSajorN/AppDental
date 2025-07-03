<?php
    include 'header.php';
    include 'menu.php';

    $Tipo = $_GET["Tipo"];
    $clienteId = decrypt($_GET["cI"]);
    $Botones = $_GET["Botones"];

    ?>

   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper p-3">
       <!-- Content Header (Page header) -->
       <section class="content-header">
           <ol class="breadcrumb">
               <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
               <li><a href="#">Pacientes</a></li>
           </ol>
       </section>
       <!-- Main content -->
       <section class="content">
           <div class="">
               <div class="col-xs-12">
                    <h4 class="Titulo_Pagina"> Gráfica Paciente <?php echo funcionMaster($clienteId, 'cliente_id', 'nombre_cliente', 'cliente') ?> </h4>
                   <div class="box">
                       <!-- /.box-header -->
                       <div class="box-body">
                        <h2 style='text-align-last: center;'>
                            <?php
                            if($Botones=="General"){
                                $Mensaje_Tipo = "[General]";
                            }
                            else{
                                $Mensaje_Tipo = "[".$Botones."] Años";
                            }
                            
                            ?>
                        </h2>
                           <div class="row">
                            <div class="col-md-12" style="padding-bottom: 15px;">
                                <div id="chartContainer" style="height: 770px; width: 100%; margin: 0px auto;"></div>
                                <button id="ViewChart" class="btn btn-block btn-primary">Visualizar Gráfica</button>
                                <div id="chartContainer1" style="height: 1200px; width: 2400px; margin: 0px;position: relative;top: -100000;"></div>
                            </div>
                            <?php if($Tipo=="IMC"):?>
                            <div class="col-md-12" style="padding:65px;">
                                <label>Nota *Si se registra mas de dos registros en el mismo mes de edad solo se tomara el ultimo registrado*</label>
                                <?php
                                $QueryLista1=mysqli_query($conn3,"SELECT * from Grafica_Crecimiento where cliente_id='{$clienteId}' ORDER BY fecha ASC");
                                while($RowLista1=mysqli_fetch_array($QueryLista1))
                                {
                                 if($RowLista1['Edad']<=240){
                                    //fecha,Edad,Peso,Altura,IMC
                                  $ArregloDatosPacientes1[$RowLista1['Edad']] = array($RowLista1['fecha'],$RowLista1['Edad'],$RowLista1['Peso'],$RowLista1['Altura'],$RowLista1['IMC']);
                                 }
                                }
                              
                                //ordenar de menor a mayor los valores de los meses
                                ksort($ArregloDatosPacientes1);
                                
                                echo "<table class='table table-bordered table-striped'>";
                                echo "<thead><tr><th>Fecha</th><th>Edad [Meses]</th><th>Peso</th><th>Altura</th><th>IMC</th></tr></thead>";
                                foreach ($ArregloDatosPacientes1 as $key => $value) {
                                    echo "<tr>";
                                    echo "<td>".$value[0]."</td>";
                                    echo "<td>".$value[1]."</td>";
                                    echo "<td>".$value[2]."</td>";
                                    echo "<td>".$value[3]."</td>";
                                    echo "<td>".$value[4]."</td>";
                                    echo "</tr>";
                                }
                                echo "</table>";
                                ?>
                            </div>
                            <?php endif;?>
                            <script src="plugins/CanvasK/canvasjs.min.js"></script>
                           </div>

                       </div>
                       <!-- /.box-body -->
                   </div>
                   <!-- /.box -->
               </div>
               <!-- /.col -->
           </div>
           <!-- /.row -->
       </section>
       <!-- /.content -->
   </div>
   <!-- /.content-wrapper -->

   <?php

$Tipo=$_GET["Tipo"];
$clienteId = decrypt($_GET["cI"]);

$Arreglo["Peso x Edad"] = ["Tipo" => "Gráfica Peso / Edad", "Unidad" => "Peso (kg)", "Variable" => "Peso", "Minimo" => "0","Maximo" => "240"];
$Arreglo["Altura x Edad"] = ["Tipo" => "Gráfica Altura / Edad", "Unidad" => "Altura (cm)", "Variable" => "Altura", "Minimo" => "0","Maximo" => "240"];
$Arreglo["Perimetro Cefalico"] = ["Tipo" => "Gráfica Perímetro Cefálico", "Unidad" => "Perímetro Cefálico (cm)", "Variable" => "Perimetro_Cefalico", "Minimo" => "0","Maximo" => "36"];
$Arreglo["IMC"] = ["Tipo" => "Gráfica IMC / Edad", "Unidad" => "IMC", "Variable" => "IMC", "Minimo" => "24","Maximo" => "240"];

$G=funcionMaster($clienteId,'cliente_id','genero','cliente');
$Genero["F"]="Femenino";
$Genero["M"]="Masculino";    

//explode a - $Botones
$Botones_Finales=explode("-",$_GET["Botones"]);

//volver numero $Botones_Finales[0]
$MinMeses=$Botones_Finales[0]*12;
$MaxMeses=$Botones_Finales[1]*12;

if($_GET["Botones"]=="General"){
    $MinMeses = $Arreglo[$Tipo]["Minimo"];
    $MaxMeses = $Arreglo[$Tipo]["Maximo"];
}

if($Tipo!="IMC"){
  if($MinMeses==0 OR $_GET["Botones"]=="General"){
    $MinMeses="1";
    }  
}


if($_GET["Botones"]!="General"){
    $TotalMeses = $MaxMeses-$MinMeses;

    if($TotalMeses<=12){
        $Intervalo = 1;
    }
    elseif($TotalMeses>12 && $TotalMeses<=24){
        $Intervalo = 2;
    }
    elseif($TotalMeses>24 && $TotalMeses<=36){
        $Intervalo = 3;
    }
    elseif($TotalMeses>36 && $TotalMeses<=48){
        $Intervalo = 4;
    }
    elseif($TotalMeses>48 && $TotalMeses<=60){
        $Intervalo = 5;
    }
    elseif($TotalMeses>60 ){
        $Intervalo = 12;
    }
}
else{
    $Intervalo = 12;
}


//volver MinMeses, MaxMeses convertir a texto
$MinMeses="$MinMeses";
$MaxMeses="$MaxMeses";

if($MinMeses!="" AND $MaxMeses!=""){
    $QueryLista = mysqli_query($conn3, "SELECT * from Tabla_Crecimiento_Sindrome_Down where Tipo = '{$Tipo}' AND Genero='{$Genero[$G]}' AND Meses BETWEEN '$MinMeses' AND '$MaxMeses'  ORDER BY Meses ASC");
    $min_grafica = $MinMeses;
    $max_grafica = $MaxMeses;
}else{
    $QueryLista = mysqli_query($conn3, "SELECT * from Tabla_Crecimiento_Sindrome_Down where Tipo = '{$Tipo}' AND Genero='{$Genero[$G]}' ORDER BY Meses ASC");
    $min_grafica = '0';
    $max_grafica = '241';
    $Intervalo = '12';
}

while($RowLista=mysqli_fetch_array($QueryLista))
{
    $Meses = (int) $RowLista['Meses'];

    $Percentil_5 = $RowLista['Percentil_5'];
    $ArrayLista_5[] = array("x"=>$Meses,"y"=>$Percentil_5);

    $Percentil_10 = $RowLista['Percentil_10'];
    $ArrayLista_10[] = array("x"=>$Meses,"y"=>$Percentil_10);

    $Percentil_25 = $RowLista['Percentil_25'];
    $ArrayLista_25[] = array("x"=>$Meses,"y"=>$Percentil_25);

    $Percentil_50 = $RowLista['Percentil_50'];
    $ArrayLista_50[] = array("x"=>$Meses,"y"=>$Percentil_50);

    $Percentil_75 = $RowLista['Percentil_75'];
    $ArrayLista_75[] = array("x"=>$Meses,"y"=>$Percentil_75);

    $Percentil_90 = $RowLista['Percentil_90'];
    $ArrayLista_90[] = array("x"=>$Meses,"y"=>$Percentil_90);

    $Percentil_95 = $RowLista['Percentil_95'];
    $ArrayLista_95[] = array("x"=>$Meses,"y"=>$Percentil_95);

}

$QueryLista1=mysqli_query($conn3,"SELECT * from Grafica_Crecimiento where cliente_id='{$clienteId}' ORDER BY fecha ASC");
  while($RowLista1=mysqli_fetch_array($QueryLista1))
  {
   if($RowLista1['Edad']<=240){
    $ArregloDatosPacientes[$RowLista1['Edad']] = $RowLista1[$Arreglo[$Tipo]["Variable"]];
   }
  }

  //ordenar de menor a mayor los valores de los meses
  ksort($ArregloDatosPacientes);

  foreach ($ArregloDatosPacientes as $key => $value) {
    $ArrayPaciente[] = array("x"=>$key,"y"=>$value);
  }

  switch($Genero[$G])
    {
        case "Femenino":
        $colorFondo = 'rgba(255, 99, 132, 0.2)';
        $colorLine = "#ec7893";
        break;
        case "Masculino":
        $colorFondo = 'rgba(54, 162, 235, 0.2)';
        $colorLine = "#2c9cdb";
        break;
    }
?>
<script>
window.onload = function () {
    
var chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,
	zoomEnabled: true,
    zoomType: "xy",
    theme: "light2",
    backgroundColor: "<?= $colorFondo ?>",
	title: {
		text: "<?= $Arreglo[$Tipo]["Tipo"]." [Síndrome de Down]"; ?>",
        fontSize: 28
	},
    subtitles:[
		{
			text: "<?= $Mensaje_Tipo; ?>",
            fontSize: 20
        }
    ],
	toolTip: {
		shared: true
	},
    axisX:{ 
		title: "Edad en Meses",
		//interval: <?= $Intervalo; ?>,
        maximum: <?= $max_grafica; ?>,
        minimum: <?= $min_grafica; ?>,
        gridThickness: 1,
        gridColor: "<?= $colorLine ?>",
        labelFontSize: 12
	},
    axisY:{ 
		title: "<?= $Arreglo[$Tipo]["Unidad"]; ?>",
        gridThickness: 1,
        gridColor: "<?= $colorLine ?>",
        labelFontSize: 14
	},
	legend:{
		cursor:"pointer",
		itemclick : toggleDataSeries,
        fontSize: 18
	},
	data: [{
		type:"spline",
		name: "5th",
        markerType: 0,
		showInLegend: true,
        color: "red",
		dataPoints:<?php echo json_encode($ArrayLista_5, JSON_NUMERIC_CHECK); ?>
		
	    },
        {
		type:"spline",
		name: "10th",
        markerType: 0,
		showInLegend: true,
        color: "#f5821f",
		dataPoints:<?php echo json_encode($ArrayLista_10, JSON_NUMERIC_CHECK); ?>
		
	    },
        {
		type:"spline",
		name: "25th",
        markerType: 0,
		showInLegend: true,
        color: "#dbe15e",
		dataPoints:<?php echo json_encode($ArrayLista_25, JSON_NUMERIC_CHECK); ?>
		
	    },
        {
		type:"spline",
		name: "50th",
        markerType: 0,
		showInLegend: true,
        color: "#00a650",
		dataPoints:<?php echo json_encode($ArrayLista_50, JSON_NUMERIC_CHECK); ?>
		
	    },
        {
		type:"spline",
		name: "75th",
        markerType: 0,
		showInLegend: true,
        color: "#dbe15e",
		dataPoints:<?php echo json_encode($ArrayLista_75, JSON_NUMERIC_CHECK); ?>
		
	    },
        {
		type:"spline",
		name: "90th",
        markerType: 0,
		showInLegend: true,
        color: "#f5821f",
		dataPoints:<?php echo json_encode($ArrayLista_90, JSON_NUMERIC_CHECK); ?>
		
	    },
        {
		type:"spline",
		name: "95th",
        markerType: 0,
		showInLegend: true,
        color: "red",
		dataPoints:<?php echo json_encode($ArrayLista_95, JSON_NUMERIC_CHECK); ?>
		
	    },
        {
		type:"spline",
		name: "Paciente",
		showInLegend: true,
        color: "black",
		dataPoints:<?php echo json_encode($ArrayPaciente, JSON_NUMERIC_CHECK); ?>
		
	    }
]
});
chart.render();


var chart1 = new CanvasJS.Chart("chartContainer1", {
    animationEnabled: true,
	zoomEnabled: true,
    zoomType: "xy",
    theme: "light2",
	title: {
		text: "<?= $Arreglo[$Tipo]["Tipo"]." [Síndrome de Down]"; ?>",
        fontSize: 28
	},
    subtitles:[
		{
			text: "<?= $Mensaje_Tipo; ?>",
            fontSize: 20
        }
    ],
	toolTip: {
		shared: true
	},
    axisX:{ 
		title: "Edad en Meses",
		//interval: <?= $Intervalo; ?>,
        maximum: <?= $max_grafica; ?>,
        minimum: <?= $min_grafica; ?>,
        gridThickness: 1,
        gridColor: "<?= $colorLine ?>",
        labelFontSize: 12
	},
    axisY:{ 
		title: "<?= $Arreglo[$Tipo]["Unidad"]; ?>",
        gridThickness: 1,
        gridColor: "<?= $colorLine ?>",
        labelFontSize: 14
	},
	legend:{
		cursor:"pointer",
		itemclick : toggleDataSeries,
        fontSize: 18
	},
	data: [{
		type:"spline",
		name: "5th",
        markerType: 0,
		showInLegend: true,
        color: "red",
		dataPoints:<?php echo json_encode($ArrayLista_5, JSON_NUMERIC_CHECK); ?>
		
	    },
        {
		type:"spline",
		name: "10th",
        markerType: 0,
		showInLegend: true,
        color: "#f5821f",
		dataPoints:<?php echo json_encode($ArrayLista_10, JSON_NUMERIC_CHECK); ?>
		
	    },
        {
		type:"spline",
		name: "25th",
        markerType: 0,
		showInLegend: true,
        color: "#dbe15e",
		dataPoints:<?php echo json_encode($ArrayLista_25, JSON_NUMERIC_CHECK); ?>
		
	    },
        {
		type:"spline",
		name: "50th",
        markerType: 0,
		showInLegend: true,
        color: "#00a650",
		dataPoints:<?php echo json_encode($ArrayLista_50, JSON_NUMERIC_CHECK); ?>
		
	    },
        {
		type:"spline",
		name: "75th",
        markerType: 0,
		showInLegend: true,
        color: "#dbe15e",
		dataPoints:<?php echo json_encode($ArrayLista_75, JSON_NUMERIC_CHECK); ?>
		
	    },
        {
		type:"spline",
		name: "90th",
        markerType: 0,
		showInLegend: true,
        color: "#f5821f",
		dataPoints:<?php echo json_encode($ArrayLista_90, JSON_NUMERIC_CHECK); ?>
		
	    },
        {
		type:"spline",
		name: "95th",
        markerType: 0,
		showInLegend: true,
        color: "red",
		dataPoints:<?php echo json_encode($ArrayLista_95, JSON_NUMERIC_CHECK); ?>
		
	    },
        {
		type:"spline",
		name: "Paciente",
		showInLegend: true,
        color: "black",
		dataPoints:<?php echo json_encode($ArrayPaciente, JSON_NUMERIC_CHECK); ?>
		
	    }
]
});
chart1.render();

document.getElementById("ViewChart").addEventListener("click",function(){
        var canvas = $("#chartContainer1 .canvasjs-chart-canvas").get(0);
        var dataURL = canvas.toDataURL("image/png");
        //descargar imagen
        var w = window.open('about:blank', 'imageWindow');
        w.document.write("<img src='" + dataURL + "' alt='chart'/>");
});
//chartContainer1 display none
document.getElementById("chartContainer1").style.display = "none";

function toggleDataSeries(e) {
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible ){
		e.dataSeries.visible = false;
	} else {
		e.dataSeries.visible = true;
	}
	chart.render();
}

}
</script>

   <?php
    include 'footer.php';
    ?>