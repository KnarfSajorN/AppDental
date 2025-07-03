<?php 
include 'header.php'
?>
<body>
<?php include 'menu.php'?>

  <!-- Content Wrapper. Contains page content --> 
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Grafica
        <small> </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Portada</a></li>
        
        <li class="active">Grafica</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
       
      <div class="row">
         
        <!-- /.col (LEFT) -->
        <div class="col-md-12">
          <!-- LINE CHART -->
          
          
          
          
          
          
          
          
          
          
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Grafica</h3>
              
            </div>
            <div class="box-body chart-responsive">
              <div class="chart" id="line-chart" style="height: 300px;"></div>
            </div>
            <!-- /.box-body -->
          </div>
          
          
          
          

<?php
$dias = 0;
include 'funciones/conn3.php';
  //  for ($dias=30; $dias < '1000'; $dias+=30) { 
        
        // echo $dias.'<br> ';
        
        //$queryList1=mysqli_query($conn2,"SELECT * from tablaCrecimientoB where dias = $dias");
        $queryList1=mysqli_query($conn2,"SELECT * from tablaCrecimientoB   ");

        $nrowl=mysqli_num_rows($queryList1);  
        while($arrayList1=mysqli_fetch_array($queryList1))
        {

          

          $dias              =$arrayList1['meses'];
        //  $dias = $dias+30;
          $sd2n              =$arrayList1['sd3n'];
          $sd                =$arrayList1['sd0'];
          $sd2               =$arrayList1['sd3'];
          
        ?>

      <?php echo $dias?>', item1: <?php echo $sd?>, item2: <?php echo $sd2?><br>    
      
 
<?php


//echo $dias.'<br> ';

} 

//}
?>
          
          
        
         

        </div>
        <!-- /.col (RIGHT) -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.8
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>


        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    "use strict";


    // LINE CHART
    var line = new Morris.Line({
      element: 'line-chart',
      resize: true,
      data: [


<?php
$dias = 0;
include 'funciones/conn3.php'; 

for ($dia=1; $dia < '18'; $dia+=1) { 
    

        $queryList1=mysqli_query($conn2,"SELECT * from tablaCrecimientoB where meses = '$dia' ");
       // $queryList1=mysqli_query($conn2,"SELECT * from tablaCrecimientoB");

        $nrowl=mysqli_num_rows($queryList1);  
        while($arrayList1=mysqli_fetch_array($queryList1))
        {
 
          $dias              =$arrayList1['meses'];
          $sd2n              =$arrayList1['sd3n'];
          $sd                =$arrayList1['sd0'];
          $sd2               =$arrayList1['sd3'];
       
          $Valor ='0';
         
 
        $q1=mysqli_query($conn2,"SELECT * from historiaCrecimiento where meses = $dias");

        $nrowl2=mysqli_num_rows($q1);  
        while($array2=mysqli_fetch_array($q1))
        {
          $id_historiaCrecimiento               =$array2['id'];
          $Valor                                =$array2['estatura'];
        }


        ?>

{y: '<?php echo $dias?>', Valor: <?php echo $Valor?> ,item1: <?php echo $sd2n?>, item2: <?php echo $sd?>, item3: <?php echo $sd2?>},
      

      
 
<?php

} 

  }
?>
     
 
      ],
      xkey: 'y',
      ykeys: ['Valor','item1', 'item2', 'item3' ],
      labels: ['SD 1', 'SD 0', 'SD -1', 'Paciente'],
      lineColors: ['red', '#a0d0e0', '#3c8dbc', '#3c8dbc'],
      hideHover: 'auto'
    });

   
   
  });
</script>
</body>
</html>

<!--
        {y: '2011 Q1', item1: 2666, item2: 2666},
        {y: '2011 Q2', item1: 2778, item2: 2294},
        {y: '2011 Q3', item1: 4912, item2: 1969},
        {y: '2011 Q4', item1: 3767, item2: 3597},
        {y: '2012 Q1', item1: 6810, item2: 1914},
        {y: '2012 Q2', item1: 5670, item2: 4293},
        {y: '2012 Q3', item1: 4820, item2: 3795},
        {y: '2012 Q4', item1: 15073, item2: 5967},
        {y: '2013 Q1', item1: 10687, item2: 4460},
        {y: '2013 Q2', item1: 8432, item2: 5713}
-->