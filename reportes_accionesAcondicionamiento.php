
  <!-- Left side column. contains the logo and sidebar -->
   <?php 
   include 'header.php';
   include 'menu.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       
    Reportes Acciones de Acondicionemiento y Socieducativas       
      </h1>
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
        <li><a href="#"> Reportes facturación </a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">


         <div class="box">
           
            <!-- /.box-header -->
            <div class="box-body">


        <div class="col-xs-12">
Reporte General 
<form action="ReporteFacturas" method="POST"> 
  <div class="col-xs-3">


    Desde
     <input type="date" class="form-control input-lg" name="desde" required>
     <?php
$ID = $_SESSION['ID'];
     ?>

     <input type="hidden" class="form-control input-lg" name="ID" value="<?php echo $ID?>" required>
    
  </div> 
  <div class="col-xs-3">
     Hasta
     <input type="date" class="form-control input-lg" name="hasta" required>
  </div> 
<!--  <div class="col-xs-3">
    Clientes
 
 <select id="tipo" name="tipo" class="form-control select2" style="width: 100%;" required="required"   >

       <option value="0" select>Todos</option>
                          <?php
 
                        $queryList=mysqli_query($conn3,"SELECT * FROM cliente WHERE usuario_id = $ID order by nombre_cliente");
                                      $nrowl=mysqli_num_rows($queryList);
                                      while($row_recordset32=mysqli_fetch_array($queryList))
                                      {
                                          $nombre_cliente      = $row_recordset32['nombre_cliente'];
                                          $cliente_id      = $row_recordset32['cliente_id'];
                                          

                                          echo "<option value='$cliente_id'> $nombre_cliente</option>";
                                      }

                    ?>
        
        

     </select> 
  </div> -->
  <div class="col-xs-3">
     <center><button type="submit" class="btn btn-block btn-primary btn-sm"> <h4> <strong>  Generar  </strong> </h4> </button></center>
  </div>  
</form> 


        </div>
        </div>
        </div>

<br>

<!-- <div class="box">
           
            <!-- /.box-header -->
        <!--    <div class="box-body">


        <div class="col-xs-12">
Reporte Cuentas a Cobrar
<form action="ReporteCuentasaCobrar" method="POST"> 
  <div class="col-xs-3">


    Desde
     <input type="date" class="form-control input-lg" name="desde" required>
     <?php
$ID = $_SESSION['ID'];
     ?>

     <input type="hidden" class="form-control input-lg" name="ID" value="<?php echo $ID?>" required>
    
  </div> 
  <div class="col-xs-3">
     Hasta
     <input type="date" class="form-control input-lg" name="hasta" required>
  </div> 
<!--  <div class="col-xs-3">
    Clientes
 <select id="tipo" name="tipo" class="form-control select2" style="width: 100%;" required="required"   >
       <option value="0" select>Todos</option>
      
           <?php

            $queryList=mysqli_query($conn3,"SELECT * FROM cliente WHERE usuario_id = $ID order by nombre_cliente");
                          $nrowl=mysqli_num_rows($queryList);
                          while($row_recordset32=mysqli_fetch_array($queryList))
                          {
                              $nombre_cliente      = $row_recordset32['nombre_cliente'];
                              $cliente_id      = $row_recordset32['cliente_id'];
                              

                              echo "<option value='$cliente_id'> $nombre_cliente</option>";
                          }

        ?>


     </select>
  </div> -
  <div class="col-xs-3">
     <center><button type="submit" class="btn btn-block btn-primary btn-sm"> <h4> <strong>  Generar  </strong> </h4> </button></center>
  </div>  -->
</form> 




        </div>
        </div>
        </div>  
 
<div align="center"> <h6> <font color="red"> Necesitas un reporte nuevo?, Solicítalo por <a href="<?php echo $Base;?>/soporte" target="_blank"> <strong> <i class="fa fa fa-support"></i> soporte </strong></a>  </font></h6>
 </div>


       
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
   <?php
    include 'footer.php';

   ?>