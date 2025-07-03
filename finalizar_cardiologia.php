<?php

    include 'header.php';
    include 'menu.php';

	$historiaClinica1 = $_GET['historiaClinica1'];

?>
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
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
 
 <br>
 <br>
 <div align="center">
  
<a class="btn btn-app" href="<?php echo $Base;?>pacientes_quirurgico.php"> 
  <i class="fa fa-heartbeat"></i> Nueva consulta
</a>

<a class="btn btn-app" href="<?php echo $Base;?>calendarioagenda"> 
  <i class="fa fa-calendar-check-o"></i> Agregar Cita
</a>

<a class="btn btn-app" href="<?php echo $Base;?>SclienteAdministracion_facturas"> 
  <i class="fa fa-plus"></i> Facturas
</a>
 

</div>



<hr>	

 
<div align="center">
  
<a class="btn btn-app" target="_blank" href="<?php echo $Base;?>imprimirHistoriaCardiologia.php?historiaClinica1=<?php echo $historiaClinica1;?>"> 
  <i class="fa fa-print"></i> Imprimir Historia Cardiologia
</a>
<!--
<a class="btn btn-app" target="_blank" href="<?php echo $Base;?>imprimirTratamiento.php?historiaClinica1=<?php echo $historiaClinica1;?>"> 
  <i class="fa fa-print"></i> Imprimir Tratamiento
</a>

<a class="btn btn-app" target="_blank" href="<?php echo $Base;?>imprimirDiscapacidad.php?historiaClinica1=<?php echo $historiaClinica1;?>"> 
  <i class="fa fa-print"></i> Imprimir Incapacidad
</a>


<a class="btn btn-app" target="_blank" href="<?php echo $Base;?>imprimirExamenes.php?historiaClinica1=<?php echo $historiaClinica1;?>"> 
  <i class="fa fa-print"></i> Imprimir Examenes
</a>
 -->

</div>




  </section>










     
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