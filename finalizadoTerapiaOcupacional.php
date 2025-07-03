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
  
<a class="btn btn-app" href="<?php echo $Base;?>buscarpaciente"> 
  <i class="fa fa-heartbeat"></i> Nuevo consulta
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
  
<a class="btn btn-app" target="_blank" href="<?php echo $Base;?>imprimirTerapiaOcupacional.php?historiaClinica1=<?php echo $historiaClinica1;?>"> 
  <i class="fa fa-print"></i> Imprimir Terapia Ocupacional
</a>


</div>



 
<div align="center">
<!--




***************************************************** FIRMA  *****************************************************
***************************************************** FIRMA  *****************************************************
***************************************************** FIRMA  *****************************************************
***************************************************** FIRMA  *****************************************************
***************************************************** FIRMA  *****************************************************
***************************************************** FIRMA  *****************************************************
***************************************************** FIRMA  *****************************************************
***************************************************** FIRMA  *****************************************************
***************************************************** FIRMA  *****************************************************



   

<a class="btn btn-app" target="_blank" href="<?php echo $Base;?>firma/firmardocumento/<?php echo $historiaClinica1;?>" > 
  <i class="fa fa-pencil-square-o"></i> Solicitar Firma 
</a>

 
</div>


<div align="center">
 







  <a class="btn btn-app" target="_blank" href="<?php echo $Base;?>firma/firmar.php?id=<?php echo $historiaClinica1;?>" > 










<form action="regFirmaWhatsapp.php" method="POST">
 <input type="number" name="numeroW"> 





</form>
 
<a class="btn btn-app" target="_blank" href="<?php echo $Base;?>imprimirExamenes.php?historiaClinica1=<?php echo $historiaClinica1;?>"> 
  <i class="fa fa-pencil-square-o"></i> Enviar Solicitud a whatsapp 
</a>
 
 

</div>
-->

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