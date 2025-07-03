<?php

include 'header.php';
include 'menu.php';

$historiaClinica1 = decrypt($_GET['iC']) ;





$queryList=mysqli_query($conn3,"SELECT * FROM historiaClinicaCirugiaPlastica where ID = $historiaClinica1");
$nrowl=mysqli_num_rows($queryList);
while($rowMotorizado=mysqli_fetch_array($queryList))
{             
  $usuario_id      =$rowMotorizado['cliente_id'];
}


// echo "SELECT * FROM  historiaClinicaCirugiaPlastica where ID = $historiaClinica1";

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
    
    <a class="btn btn-app" href="<?php echo $Base;?>hccpPacientes"> 
      <i class="fa fa-heartbeat"></i> Nuevo consulta
    </a>

    <a class="btn btn-app" href="<?php echo $Base;?>agregarCitas?cI=<?= encrypt($usuario_id) ;?>"> 
      <i class="fa fa-calendar-check-o"></i> Agregar Cita
    </a>

    <a class="btn btn-app" href="<?php echo $Base;?>SclienteAdministracion_facturas"> 
      <i class="fa fa-plus"></i> Facturar
    </a>
    

  </div>



  <hr>	

  
  <div align="center">
    
    <a class="btn btn-app" target="_blank" href="<?php echo $Base;?>hccpImprimir?iC=<?= encrypt($historiaClinica1) ;?>"> 
      <i class="fa fa-print"></i> Imprimir Tratamiento 
    </a>

    
    

  </div>











  
  <div align="center">
   



   <?php




   $queryList=mysqli_query($conn3,"SELECT firma FROM  firmas where historia_id = $historiaClinica1 and historia_nombre = '0'");
   $nrowl=mysqli_num_rows($queryList);
   while($rowMotorizado=mysqli_fetch_array($queryList))
   {
    $firma = $rowMotorizado['firma']; 
  }

  if (strlen($firma)>10) 
  {
    echo "<img src='$firma'>";
  }

  else
  {

    ?>

    <a class="btn btn-app" target="_blank" onclick="solicitarFirma1()" href="<?php echo $Base;?>firma/firmardocumento/<?php echo $historiaClinica1;?>/21/<?php echo $usuario_id;?>" > 
      <i class="fa fa-pencil-square-o" ></i> Solicitar Firma 
    </a>

    <div id="div-results"></div>

    <?php

  }
  




  
  ?> 
  
  
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