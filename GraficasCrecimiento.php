   <?php 
   include 'header.php';
   include 'menu.php';
   
   $Tipo=$_GET["Tipo"];
   $clienteId=$_GET["clienteId"];
   ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Grafica Paciente <?php echo funcionMaster($clienteId,'cliente_id','nombre_cliente','cliente')?>
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
        <li><a href="#">Pacientes</a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <?php
     $msg = $_GET['msg'];
    if ($msg=='1') 
        {
          echo '  <div class="callout callout-info ">
            <h4> Cliente ya Registrado!</h4>

            <p>   </p>
          </div>'; 
        }

        if ($msg=='2') 
        {
          echo '
            <div class="callout callout-info ">
            <h4> Cliente Registrado!</h4>

            <p>   </p>
          </div>'; 
        }
        if ($msg=='3') 
        {
          echo '
            <div class="callout callout-info ">
            <h4> Cliente Actualizado!</h4>

            <p>   </p>
          </div>'; 


 
        }
 
      ?>

          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">

                <div class="row">
                    <div id="curve_chart" class="col-md-12" align="center" style="width: 100%; height: 800px"></div>
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


<script type="text/javascript" src="plugins/LoaderK/loader.js"></script>
    <script type="text/javascript">

      /////////////////////////////////////////////////
      google.charts.load('current', {'packages':['corechart','line']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('number', 'Peso');
        data.addColumn('number', 'Percentil 3');
        data.addColumn('number', 'Percentil 10');

        data.addColumn('number', 'Percentil 50');

        data.addColumn('number', 'Percentil 90');
        data.addColumn('number', 'Percentil 97');

        data.addColumn('number', 'Paciente');
        <?php

        $Arreglo["Peso x Edad"]=["Grafica Peso / Edad","Peso (kg)","20","Peso"];
        $Arreglo["Estatura x Edad"]=["Grafica Estatura x Edad","Estatura (cm)","20","Altura"];
        $Arreglo["Circunferencia de Cabeza"]=["Grafica Perimetro Craneal","Perimetro Craneal (cm)","3","Perimetro_Cefalico"];
        $Arreglo["IMC"]=["Grafica IMC ","IMC (kg/m^2)","20","IMC"];

        $G=funcionMaster($clienteId,'cliente_id','genero','cliente');
        $Genero["F"]="Mujer";
        $Genero["M"]="Hombre";    

        $QueryLista=mysqli_query($conn3,"SELECT * from Tabla_Crecimiento where Tipo_Tabla = '{$Tipo}' AND Genero='{$Genero[$G]}' ORDER BY CAST(Meses AS FLOAT)");
        while($RowLista=mysqli_fetch_array($QueryLista))
        {
 
          $Meses = $RowLista['Meses'];
          $Percentil_3 = $RowLista['3_Percentil'];
          $Percentil_10 = $RowLista['10_Percentil'];
          $Percentil_50 = $RowLista['50_Percentil'];
          $Percentil_90 = $RowLista['90_Percentil'];
          $Percentil_97 = $RowLista['97_Percentil'];

          $Valor ="";
          $QueryLista1=mysqli_query($conn3,"SELECT * from Grafica_Crecimiento where Edad = '{$Meses}' AND cliente_id='{$clienteId}' ORDER BY id ASC");
          while($RowLista1=mysqli_fetch_array($QueryLista1))
          {
            $Valor = $RowLista1[$Arreglo[$Tipo][3]];  
          }

          if($Valor==""){$Valor='null';}
        ?>
            data.addRow([<?php echo $Meses; ?>,<?php echo $Percentil_3; ?>,<?php echo $Percentil_10; ?>,<?php echo $Percentil_50; ?>,<?php echo $Percentil_90; ?>,<?php echo $Percentil_97; ?>,<?php echo $Valor; ?>]);
        <?php
        }
        ?>
        var options = {
          title: '<?php echo $Arreglo[$Tipo][0]; ?>',
          curveType: 'function',
          hAxis: {title: 'Meses',  titleTextStyle: {color: '#333'},
                  },
          vAxis: {title: '<?php echo $Arreglo[$Tipo][1]; ?>',minValue: 0},
          explorer: { 
            actions: ['dragToZoom', 'rightClickToReset'],
            axis: 'horizontal',
            keepInBounds: true,
            maxZoomIn: '<?php echo $Arreglo[$Tipo][2]; ?>'},
          series: {
              0: { color: '#FF0000' },
              1: { color: '#f5821f' },
              2: { color: '#00a650' },
              3: { color: '#f5821f' },
              4: { color: '#FF0000' },
              5: { color: 'black',lineWidth: 3 },
          },
          interpolateNulls: true,
        };

        var container = document.getElementById('curve_chart');
        var chart = new google.visualization.LineChart(container);

        chart.draw(data, options);
      }

    </script>


<?php
  include 'footer.php';
?>

