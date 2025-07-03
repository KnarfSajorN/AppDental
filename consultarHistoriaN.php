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
              <li class="active"><a href="#Consultas" data-toggle="tab">Historia Clínica</a></li>
          <li><a href="#Examenes" data-toggle="tab">Test coronavirus</a></li>
              <li><a href="#Examenes1" data-toggle="tab">orden Laboratorios</a></li>
              <li><a href="#Examenes2" data-toggle="tab">orden Imagenologia</a></li>

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
               
                $queryList=mysqli_query($conn3,"SELECT * FROM  historiaClinicaN  where  cliente_id = $clienteId  order by ID DESC");
                
                $nrowl=mysqli_num_rows($queryList);
                while($rowMotorizado=mysqli_fetch_array($queryList))
                {

                  $ID      =$rowMotorizado['ID'];
                  $cliente_id      =$rowMotorizado['cliente_id'];
                  $usuario_id      =$rowMotorizado['usuario_id'];
                  $Fecha           =$rowMotorizado['Fecha'];

                  $Hora            =$rowMotorizado['Hora'];
                  $motivoc         =$rowMotorizado['motivoConsulta'];
                  $organos       =$rowMotorizado['organos'];
                  $antrop        =$rowMotorizado['antrop'];
                  $examenesr        =$rowMotorizado['exaregional'];
                  $diagnostico      =$rowMotorizado['diagnostico'];
                   $receta          =$rowMotorizado['receta']; 


  $queryList=mysqli_query($conn3,"SELECT * FROM  usuarios where ID = $usuario_id");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {

              $empresaNombre      =$rowMotorizado['empresaNombre'];
              $pais               =$rowMotorizado['pais'];

              $ciudad             =$rowMotorizado['ciudad'];
              $direccion          =$rowMotorizado['direccion'];
              $telefono           =$rowMotorizado['telefono'];

              $nit                =$rowMotorizado['nit'];

               $Nombre            =$rowMotorizado['NOMBRE_USUARIO'];
               $especialidad      =$rowMotorizado['especialidad'];

            }



                     ?>
 


                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $ID?>">
                        Fecha <?php echo $Fecha .'-'.$Hora?>  
                      </a>
                     <a href="imprimirHistoriaN.php?historiaClinica1=<?php echo $ID?>" title="Imprimir Consulta" target="_blank"><i class="fa fa-print"></i> </a>
                      <a href="imprimirRecetaH.php?idr=<?php echo $receta?>&cliente=<?php echo $clienteId?>" title="Imprimir Receta" target="_blank"><i class="fa fa-newspaper-o"></i> </a>
                      </a>
                      <a href="pruebareceta.php?idr=<?php echo $receta?>&cliente=<?php echo $clienteId?>" title="Enviar receta" target="_blank"><i class="fa fa-send-o"></i> </a>
                      </a>

                    </h4>
                  </div>
                  <div id="<?php echo $ID?>" class="panel-collapse collapse">
                    <div class="box-body">
                   



               <hr align="center" size="10" width="100%" color="#000000">
                
               <div align="right" >
                Fecha <?php echo $Fecha .'-'.$Hora?>
               </div>
               
             <table class="table table-bordered">
                    
                     <tr>
                      <td>MEDICO: <?php echo $Nombre ?></td>
                      <td>Especialidad: <?php echo $especialidad ?></td>
                      
                  
                    </tr>

                  
                    </tr>
                  </table>  
              
              
              <div>
             
              <table>
                 <?php echo $motivoc?>
                  <?php echo $organos?>
                  <?php echo $antrop?>
                  <?php echo $examenesr?>
                  <?php echo $diagnostico?>
                   </table> 
               
              </div>
             
 
     

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
            Test
           </h3>
    
                  
                  <?php 
               
                  $queryList=mysqli_query($conn3,"SELECT * FROM  test  where  cliente_id = $clienteId  order by ID DESC");
                
                $nrowl=mysqli_num_rows($queryList);
                while($rowMotorizado=mysqli_fetch_array($queryList))
                {

                  $ID      =$rowMotorizado['ID'];
                  $cliente_id      =$rowMotorizado['cliente_id'];
                  $usuario_id      =$rowMotorizado['usuario_id'];
                  $Fecha           =$rowMotorizado['Fecha'];

                  $Hora            =$rowMotorizado['Hora'];
                  $TEST        =$rowMotorizado['test'];
                  

                     ?>


                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#iniciado<?php echo $ID?>">
                        Fecha <?php echo $Fecha .'-'.$Hora?>  
                      </a>
                      <a href="imprimirtest.php?historiaClinica1=<?php echo $ID?>" title="Imprimir Test" target="_blank"><i class="fa fa-print"></i> </a>
                      
                    </h4>
                  </div>
                  <div id="iniciado<?php echo $ID?>" class="panel-collapse collapse">
                    <div class="box-body">
                   



               <hr align="center" size="10" width="100%" color="#000000">
                
               <div align="right" >
                Fecha <?php echo $Fecha .'-'.$Hora?>
               </div>
               
            
              
               
              <div>
             
              <table>
                 <?php echo $TEST?>
                 
                   </table> 
               
              </div>
             
 
     

                    </div>
                  </div>
                </div>
               

              
            <?php }  ?>

            
              
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
       
          <!-- /.nav-tabs-custom -->
       
       

        <!-- /.col -->
     
 <div class="tab-pane" id="Examenes1">
     
          <hr align="center" size="10" width="100%" color="#000000">
           <h3>
            Laboratorios
           </h3>
    
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
                      <a data-toggle="collapse" data-parent="#accordion" href="#procesado<?php echo $ID?>">
                        Fecha <?php echo $Fecha .'-'.$Hora?>  
                      </a>
                      <a href="imprimirOrdenLab.php?historiaClinica1=<?php echo $ID?>" title="Imprimir Test" target="_blank"><i class="fa fa-print"></i> </a>
                      <a href="enviarLaboratorio.php?historiaClinica1=<?php echo $ID?>" title="Enviar laboratorio" target="_blank"><i class="fa fa-send-o"></i> </a>
                    </h4>
                  </div>
                  <div id="procesado<?php echo $ID?>" class="panel-collapse collapse">
                    <div class="box-body">
                   



               <hr align="center" size="10" width="100%" color="#000000">
                
               <div align="right" >
                Fecha <?php echo $Fecha .'-'.$Hora?>
               </div>
               
            
              
               
              <div>
             
               <table>
                 <?php echo $datos?>
                 <?php echo $lab?>
                 
                   </table> 
               
              </div>
             
 
     

                    </div>
                  </div>
                </div>
               

              
            <?php }  ?>

            </div>
             

<div class="tab-pane" id="Examenes2">
     
          <hr align="center" size="10" width="100%" color="#000000">
           <h3>
            Imagenologia
           </h3>
    
                  <?php 
               
                  $queryList=mysqli_query($conn3,"SELECT * FROM imagenologia where  cliente_id = $clienteId order by ID DESC");
                
                $nrowl=mysqli_num_rows($queryList);
                while($rowMotorizado=mysqli_fetch_array($queryList))
                {

                  $ID      =$rowMotorizado['ID'];
                  $cliente_id      =$rowMotorizado['cliente_id'];
                  $usuario_id      =$rowMotorizado['usuario_id'];
                  $Fecha           =$rowMotorizado['Fecha'];

                  $Hora            =$rowMotorizado['Hora'];
                  $datos1       =$rowMotorizado['datos'];
                  $lab1      =$rowMotorizado['laboratorio'];
                  

                     ?>

                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#cerrado<?php echo $ID?>">
                        Fecha <?php echo $Fecha .'-'.$Hora?>  
                      </a>
                      <a href="imprimirImagenologia.php?historiaClinica1=<?php echo $ID?>" title="Imprimir Test" target="_blank"><i class="fa fa-print"></i> </a>
                      <a href="enviarImagenologia.php?historiaClinica1=<?php echo $ID?>" title="Enviar" target="_blank"><i class="fa fa-send-o"></i> </a>
                    </h4>
                  </div>
                  <div id="cerrado<?php echo $ID?>" class="panel-collapse collapse">
                    <div class="box-body">
                   



               <hr align="center" size="10" width="100%" color="#000000">
                
               <div align="right" >
                Fecha <?php echo $Fecha .'-'.$Hora?>
               </div>
               
            
              
               
              <div>
             
             <table>
                 <?php echo $datos1?>
                 <?php echo $lab1?>
                 
                   </table> 
               
              </div>
             
 
     

                    </div>
                  </div>
                </div>
               

              
            <?php }  ?>

            </div>
              
            






              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        </div>

      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
   <?php
    include 'footer.php';

   ?>