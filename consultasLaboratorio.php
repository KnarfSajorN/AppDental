<?php 
   include 'header.php';
   include 'menu.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Paciente
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
        <li><a href="#">Paciente</a></li>
        

      </ol>
    </section>

    <!-- Main content -->
    <section class="content"> 
      <div class="row">
      
<?php
       
            $clienteId = $_GET['clienteId']; 
            $usuarioId = $_SESSION['ID']; 
 $conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

        $queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id=$clienteId");

        $nrowl=mysqli_num_rows($queryList);

        while($rowMotorizado=mysqli_fetch_array($queryList))

        {
 $usuario_id=$rowMotorizado['usuario_id'];
            $nombre_cliente=$rowMotorizado['nombre_cliente'];
            $celular_cliente=$rowMotorizado['celular_cliente'];
            $ciudad_cliente=$rowMotorizado['ciudad_cliente'];
            $correo_cliente=$rowMotorizado['correo_cliente'];
            $CODI_CLIENTE=$rowMotorizado['CODI_CLIENTE'];
            $id_uso_servicio=$rowMotorizado['id_uso_servicio'];
            $tipo_cliente=$rowMotorizado['tipo_cliente'];
            $fechar=$rowMotorizado['fechar'];
            $fecha_actualizado=$rowMotorizado['fecha_actualizado'];
            $activo=$rowMotorizado['activo'];
            $genero=$rowMotorizado['genero'];
            $direccion_cliente=$rowMotorizado['direccion_cliente'];
            $telefono_cliente=$rowMotorizado['telefono_cliente'];
            $edad_cliente=$rowMotorizado['edad_cliente'];
            $profesion_cliente=$rowMotorizado['profesion_cliente'];
            $acompananteFamiliar=$rowMotorizado['acompananteFamiliar'];
            $telefono_acompanante=$rowMotorizado['telefono_acompanante'];
            $antecedentes=$rowMotorizado['antecedentes'];
            $fechaNacimiento=$rowMotorizado['fechaNacimiento'];
            $esDonante=$rowMotorizado['esDonante'];
            $entidadSalud=$rowMotorizado['entidadSalud'];

              


            $peso                     = $rowMotorizado['peso']; 
            $altura                   = $rowMotorizado['altura']; 
            $imc                          = $rowMotorizado['imc']; 
            $ComposicionCorporal      = $rowMotorizado['ComposicionCorporal']; 
            $fotoperfil      = $rowMotorizado['fotoperfil']; 

 $apell_cliente=$rowMotorizado['apell_cliente'];
        $apellido_cliente=$rowMotorizado['apellido_cliente'];
        $celular_cliente=$rowMotorizado['celular_cliente'];
         $nombre_cliente1=$rowMotorizado['nombre_cliente1'];

           }

        ?>





 <div class="card-body">
                  <div class="box-body">
                     

          <?php echo datosPacientes($clienteId);?>


<div class="col-md-12">

  <a class="btn btn-primary" href="historiaClinicaN.php?clienteId=<?php echo $clienteId;?>" role="button"> <i class="fa fa-heartbeat"></i>  Nueva Historia </a>
 
         
                               
     </div>
<br>

               <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
            <!--    <li class="active"><a href="#Consultas" data-toggle="tab">Historia Clínica</a></li>
             

             
              <li><a href="#Documentos" data-toggle="tab">Registros de exámenes</a></li>
                <a class="btn btn-primary" href="historiaExamenes.php?clienteId=<?php echo $clienteId;?>" role="button"><i class="fa fa-folder-open-o"></i>  Agregar exámenes</a>
            



              <li><a href="#ExamenesEcografias" data-toggle="tab">Test coronavirus</a></li>    -->
              <li><a href="#Examenes" data-toggle="tab">orden Laboratorios</a></li>
            </ul>
            <div class="tab-content">
          <div class="active tab-pane" id="Consultas">
          
          
           





           <div class="col-md-12">
          <div class="box box-solid">
             
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box-group" id="accordion">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                








      
  <div class="tab-pane" id="Examenes">
      <hr align="center" size="10" width="100%" color="#000000">
           <h3>
           Registros de Orden laboratorio      </h3>  
 
                  <?php 
               
                  $queryList=mysqli_query($conn3,"SELECT * FROM   Ordenlaboratorio where  cliente_id = $clienteId order by ID DESC");
                
                $nrowl=mysqli_num_rows($queryList);
                while($rowMotorizado=mysqli_fetch_array($queryList))
                {

                  $ID      =$rowMotorizado['ID'];
                  $cliente_id      =$rowMotorizado['cliente_id'];
                  $usuario_id      =$rowMotorizado['usuario_id'];
                  $Fecha           =$rowMotorizado['Fecha'];

                  $Hora            =$rowMotorizado['Hora'];
                  $datos       =$rowMotorizado['datos'];
                  $lab      =$rowMotorizado['laboratorio'];
                  

                     ?>




              <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $ID?>">
                        Fecha <?php echo $Fecha; ?> <a href="imprimirOrdenLab.php?historiaClinica1=<?php echo $ID?>" title="Imprimir Consulta" target="_blank"><i class="fa fa-print"></i> </a>
                      </a>
                    </h4>
                  </div>



                  <div id="<?php echo $ID?>" class="panel-collapse collapse">
                    <div class="box-body">

               <hr align="center" size="10" width="100%" color="#000000">
                
               <div align="right" >
                Fecha <?php echo $Fecha .'-'.$Hora?>
               </div>
               
             <table>
                 <?php echo $datos?>
                 <?php echo $lab?>
                 
                   </table> 
  
        </div></div> 
           
    <?php  } ?>

       
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