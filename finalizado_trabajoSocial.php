<?php
 
    include 'header.php';
    include 'menu.php';

  $historiaClinica_TrabajoSocial= $_GET['trabajo'];

?>

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <h1></h1>
        <ol class="breadcrumb">
          <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
          <li><a href="#"> </a></li>
        </ol>
      </section>


    <section class="content">
 
      <br><br>
      <div align="center">
  
        <a class="btn btn-app" href="<?php echo $Base;?>buscarpaciente"> <i class="fa fa-heartbeat"></i> Nuevo consulta</a>

        <a class="btn btn-app" href="<?php echo $Base;?>calendarioagenda"> <i class="fa fa-calendar-check-o"></i> Agregar Cita</a>

        <a class="btn btn-app" href="<?php echo $Base;?>SclienteAdministracion_facturas"> <i class="fa fa-plus"></i> Facturas</a>
      </div>
      
      <hr>  

      <div align="center">

        
        <a class="btn btn-app" target="_blank" href="<?php echo $Base;?>imprimirTrabajoSocial.php?trabajo=<?php echo $historiaClinica_TrabajoSocial;?>"> 
          <i class="fa fa-print"></i> Imprimir Trabajo Social
        </a>
      </div>

    </section>
     
    </div>
           

<?php include("footer.php")?>