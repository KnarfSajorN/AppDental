<?php
    include 'header.php';
    include 'menu.php';

  $historiaClinica1 = $_GET['historiaClinica1'];
 


 $queryList=mysqli_query($conn3,"SELECT * FROM  Evoluciones_Historia_Control_Prenatal where ID = $historiaClinica1");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {

              $cliente_id      =$rowMotorizado['cliente_id'];
              $usuario_id      =$rowMotorizado['usuario_id'];             
              $id_historiaClinica     =$rowMotorizado['id_historiaClinica'];             
            }

            
?>
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
        <li><a href="#"> </a></li>
      </ol>
    </section>

<section class="content">
 <div class="box">
 <div class="box-body">
 <br>
 <br>
 <div align="center">
  
<a class="btn btn-outline-info btn-lg rounded-pill shadow" href="<?php echo $Base;?>GO_PacientesControlPrenatal.php"> 
  <i class="fa fa-heartbeat"></i> Nueva consulta
</a>

<a class="btn btn-outline-info btn-lg rounded-pill shadow" href="<?php echo $Base;?>agregarCitas"> 
  <i class="fa fa-calendar-check-o"></i> Agregar Cita
</a>

<a class="btn btn-outline-info btn-lg rounded-pill shadow" href="<?php echo $Base;?>SclienteAdministracion_facturas"> 
  <i class="fa fa-plus"></i> Facturas
</a>
 

</div>



<hr>  

 
<div align="center">
  


<a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base;?>GO_Evolucion_Imprimir.php?historiaClinica1=<?php echo $historiaClinica1;?>"> 
  <i class="fa fa-print"></i> Imprimir Evolución
</a>


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
           
<?php include("footer.php")?>




