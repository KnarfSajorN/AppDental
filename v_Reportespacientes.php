
  <!-- Left side column. contains the logo and sidebar -->
   <?php 
   include 'header.php';
   include 'menu.php';
   $ID = $_SESSION['ID'];
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       
    Reportes pacientes         
      </h1>
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
        <li><a href="#"> Reportes pacientes </a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

 

<br>







      <div class="box">
           
            <!-- /.box-header -->
            <div class="box-body">


        <div class="col-xs-12">
Reporte general
<form action="ReporteGeneralVacunacion" method="POST"> 
  <div class="col-xs-3">


   Desde
     <input type="date" class="form-control input-lg" name="desde" required>


     <input type="hidden" class="form-control input-lg" name="ID" value="<?php echo $ID?>" required>
    
  </div> 
  <div class="col-xs-3">
      Hasta
     <input type="date" class="form-control input-lg" name="hasta" required>
  </div>


<div class="col-xs-3">
    Clientes
 
 <select id="tipo" name="tipo" class="form-control select2" style="width: 100%;" required="required"   >

       <option value="0" select>Todos</option>
                        <?php
 
                        $queryList=mysqli_query($conn3,"SELECT * FROM v_cliente WHERE usuario_id = $ID order by nombre_cliente");
                                      $nrowl=mysqli_num_rows($queryList);
                                      while($row_recordset32=mysqli_fetch_array($queryList))
                                      {
                                          $nombre_cliente      = $row_recordset32['nombre_cliente'];
                                          $cliente_id      = $row_recordset32['id'];
                                          

                                          echo "<option value='$cliente_id'> $nombre_cliente</option>";
                                      }

                    ?>
        
        

     </select>
  </div> 



 
  <div class="col-xs-3">
     <center><button type="submit" class="btn btn-block btn-primary btn-sm"> <h4> <strong>  Generar  </strong> </h4> </button></center>
  </div>  
</form> 


        </div>
        </div>
        </div>


      <div class="box">
           
            <!-- /.box-header -->
            <div class="box-body">


        <div class="col-xs-12">
Reporte General facturacion

<form action="ReporteGeneralFacturacion" method="POST"> 
  <div class="col-xs-3">


   Desde
     <input type="date" class="form-control input-lg" name="desde" required>


     <input type="hidden" class="form-control input-lg" name="ID" value="<?php echo $ID?>" required>
    
  </div> 
  <div class="col-xs-3">
       Hasta
     <input type="date" class="form-control input-lg" name="hasta" required>
  </div>


  <div class="col-xs-3">
  Clientes Empresa
  <select id="tipo" name="tipo" class="form-control select2" style="width: 100%;" required="required">

       <option value="0" select>Todos</option>
                          <?php
 
                        $queryList=mysqli_query($conn3,"SELECT * FROM v_clienteE WHERE usuario_id = $ID order by nombre");
                                      $nrowl=mysqli_num_rows($queryList);
                                      while($row_recordset32=mysqli_fetch_array($queryList))
                                      {
                                          $nombre_cliente      = $row_recordset32['nombre'];
                                          $cliente_id      = $row_recordset32['id'];
                                          

                                          echo "<option value='$cliente_id'> $nombre_cliente</option>";
                                      }

                    ?>
        
        

     </select>
  </div> 



 
  <div class="col-xs-3">
     <center><button type="submit" class="btn btn-block btn-primary btn-sm"> <h4> <strong>  Generar  </strong> </h4> </button></center>
  </div>  
</form> 


        </div>
        </div>
        </div>








 








 

 




            <!-- /.box-header

 <div class="box">
           
            <div class="box-body">


        <div class="col-xs-12">
Reporte historia clinica por paciente
<form action="Reportehistoriaclinica" method="POST"> 
       <input type="hidden" class="form-control input-lg" name="ID" value="<?php echo $ID?>" required>

  <div class="col-xs-6">
     <select class="form-control input-lg" name="tipo">
       <?php
        $usuario_id = $_SESSION['ID'];

          $querycat=mysqli_query($conn3,"SELECT * FROM  cliente where usuario_id = $usuario_id order by nombre_cliente");
          $nrowl=mysqli_num_rows($querycat);
          while($row_cat=mysqli_fetch_array($querycat))
          {
              
              $cliente_id      = $row_cat['cliente_id'];
              $nombre_cliente      = $row_cat['nombre_cliente'];
              echo '<option value="'.$cliente_id.'" >'.$nombre_cliente.'</option>';
          }
 
      ?>

    

     </select>
  </div> 
  <div class="col-xs-6">
     <center><button type="submit" class="btn btn-block btn-primary btn-sm"> <h4> <strong>  Generar  </strong> </h4> </button></center>
  </div>  
</form> 





        </div>
        </div>
        </div>
 -->







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