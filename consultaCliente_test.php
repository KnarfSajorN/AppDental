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

  <a class="btn btn-primary" href="testCoronavirus.php?clienteId=<?php echo $clienteId;?>" role="button"> <i class="fa fa-heartbeat"></i>  Nuevo Test </a>
 
         
                               
     </div>
<br>

               <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#Consultas" data-toggle="tab">Test Coronavirus</a></li>
             

              <!-- 
              <li><a href="#Documentos" data-toggle="tab">Registros de exámenes</a></li>
                <a class="btn btn-primary" href="historiaExamenes.php?clienteId=<?php echo $clienteId;?>" role="button"><i class="fa fa-folder-open-o"></i>  Agregar exámenes</a>
              -->
            </ul>
            <div class="tab-content">
          <div class="active tab-pane" id="Consultas">
          
          
           





           <div class="col-md-12">
          <div class="box box-solid">
             
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box-group" id="accordion">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                








          <hr align="center" size="10" width="100%" color="#000000">
           <h3>
           Consultas
           </h3>
    
                  <?php 
               
                  $queryList=mysqli_query($conn3,"SELECT * FROM  test  where  cliente_id = $clienteId and usuario_id = $usuarioId order by ID DESC");
                
                $nrowl=mysqli_num_rows($queryList);
                while($rowMotorizado=mysqli_fetch_array($queryList))
                {

                  $ID      =$rowMotorizado['ID'];
                  $cliente_id      =$rowMotorizado['cliente_id'];
                  $usuario_id      =$rowMotorizado['usuario_id'];
                  $Fecha           =$rowMotorizado['Fecha'];

                  $Hora            =$rowMotorizado['Hora'];
                  $motivoc         =$rowMotorizado['test'];
                  

                     ?>
 


                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $ID?>">
                        Fecha <?php echo $Fecha .'-'.$Hora.' <strong>|</strong> '.$peso_descripcion?> <a href="imprimirtest.php?historiaClinica1=<?php echo $ID?>" title="Imprimir Consulta" target="_blank"><i class="fa fa-print"></i> </a>
                        || <a href="archivos/Formato_346_Covid.pdf" title="Imprimir Consulta 2" target="_blank"><i class="fa fa-print"></i> Imprimir Formato 346 </a>
                        | <a href="archivos/Formato_346_Covid.pdf" download="Archivo" title="Descargar Consulta" target="_blank"><i class="fa fa-arrow-down"></i> Descargar </a>
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
                 <?php echo $motivoc?>
                 
                   </table> 
  
             

 
              
<?php if (strlen($laboratorio)>0 or strlen($laboratorio)>0 or strlen($laboratorio)>0 ): ?>
<hr>
<div align="center"> Exámenes a Realizar  </div>
 

              

 
<?php endif ?>  

                    </div>
                  </div>
                </div>

 


                











              
              
            <?php }  ?>



              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        








      </div>
              <!-- /.tab-pane -->
              
 
      
  <div class="tab-pane" id="Examenes">
      <hr align="center" size="10" width="100%" color="#000000">
           <h3>
           Registro de Examenes        </h3>  
 
                  <?php 

                  $queryList=mysqli_query($conn3,"SELECT * FROM historiaImagen where cliente_id= $clienteId GROUP by Fecha");

          

                  while($row_recordset32=mysqli_fetch_assoc($queryList))

                  {             
                      $ID                         = $row_recordset32['IM_id'];    
                      $Fecha                         = $row_recordset32['Fecha'];    ?>





              <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $ID?>">
                        Fecha / Hora <?php echo $Fecha; ?> <a href="finalizado.php?historiaClinica1=<?php echo $ID?>" title="Imprimir Consulta" target="_blank"><i class="fa fa-print"></i> </a>
                      </a>
                    </h4>
                  </div>



                  <div id="<?php echo $ID?>" class="panel-collapse collapse">
                    <div class="box-body">
<div class="row">
                      <?php //echo $Fecha;

                            $ListaImg=mysqli_query($conn3,"SELECT * FROM historiaImagen where Fecha= '$Fecha'");?>
                          


                          <?php  while ($resulImg=mysqli_fetch_assoc($ListaImg)) {  ?>
                           

                             <a target="blank" href="https://medicalsoftplus.com/ec189/galeriaImg/<?php echo $resulImg['nombre_img']; ?>">
                                  <div class="form-group col-md-3" style="padding: 3px 10px 3px 10px;">
                                   <img style="box-shadow: 0px 0px 15px -4px rgb(60, 141, 188);border: 1px solid #3c8dbc; border-radius: 5px;" width="250" height="150" src="galeriaImg/<?php echo $resulImg['nombre_img']; ?>" alt=""  >
                                  </div>
                              </a>  


                            <?php } ?>
        </div>
                    </div>
                  </div>
              </div>















           
    <?php  } ?>

       
  </div>

              
            







    <div class="tab-pane" id="ExamenesEcografias">
      <hr align="center" size="10" width="100%" color="#000000">
           <h3>
           Registros de Imagenes       </h3>  
 
     





   
  
              </div>
              </div>
            
              
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
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