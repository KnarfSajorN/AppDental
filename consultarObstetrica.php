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
                     

          <div class="col-md-10">

              <?php echo datosPacientes($clienteId);?>

            </div>

              <div class="col-md-2">

                <?php
                // echo strlen($logoF);
                if (strlen($fotoperfil) > 0) { 
                echo '<img src="'.$Base.'/pascientes/'.$fotoperfil.'" width="90%" height="20%">';
                }
                else
                {

                echo '';
                }
 
                ?>


             
 
              </div> 
<br>

                <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#Consultas" data-toggle="tab">Historia Clínica</a></li>
          <li><a href="#Examenes" data-toggle="tab">Test coronavirus</a></li>
              <li><a href="#Examenes1" data-toggle="tab">orden Laboratorios</a></li>
              <li><a href="#Examenes2" data-toggle="tab">orden Imagenologia</a></li>
              <li><a href="#Examenes3" data-toggle="tab">Epidemiología</a></li>
              <li><a href="#Examenes4" data-toggle="tab">Registro de Archivos</a></li>
              

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
           
                $queryList=mysqli_query($conn3,"SELECT * FROM  historiaObstetrica  where  cliente_id = $clienteId  order by ID DESC");
                
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
                   $personales      =$rowMotorizado['personales'];
                  $familiares    =$rowMotorizado['familiares'];
                  $enfermedadA   =$rowMotorizado['enfermedad'];
                  $antedentesgine    =$rowMotorizado['antedentesgine'];
                  $vacunante   =$rowMotorizado['vacunante'];
                  $historialvacu    =$rowMotorizado['historialvacu'];
                  $habitos   =$rowMotorizado['habitos'];
                  $receta   =$rowMotorizado['receta'];


  $query12=mysqli_query($conn3,"SELECT * FROM  usuarios where ID = $usuario_id");
            $nrowl=mysqli_num_rows($query12);
            while($row_12=mysqli_fetch_array($query12))
            {

              $empresaNombre      =$row_12['empresaNombre'];
              $pais               =$row_12['pais'];

              $ciudad             =$row_12['ciudad'];
              $direccion          =$row_12['direccion'];
              $telefono           =$row_12['telefono'];

              $nit                =$row_12['nit'];

               $Nombre            =$row_12['NOMBRE_USUARIO'];
               $especialidad      =$row_12['especialidad'];

            }



                     ?>
 


                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $ID?>">
                        Fecha <?php echo $Fecha .'-'.$Hora?>  
                      </a>
                     <a href="imprimirHistoriaObstetrica.php?historiaClinica1=<?php echo $ID?>" title="Imprimir Consulta" target="_blank"><i class="fa fa-print"></i> </a>
                      <a href="imprimirRecetaOstetrica.php?idr=<?php echo $receta?>&cliente=<?php echo $clienteId?>" title="Imprimir Receta" target="_blank"><i class="fa fa-newspaper-o"></i> </a>
                      </a>
                      <a href="pruebareceta.php?idr=<?php echo $receta?>&cliente=<?php echo $clienteId?>" title="Enviar receta" target="_blank"><i class="fa fa-send-o"></i> </a>
                      </a>
                       <a title="Agregar Seguimiento" href="Evolucion_Historia.php?historiaClinica=<?php echo $ID?>&cliente=<?php echo $clienteId?>" title="Evolución" target="_blank"><i class="fa fa-file"></i> </a>
                       <a title="ver Seguimientos" href="verEvolucion_Historia.php?historiaClinica=<?php echo $ID?>&cliente=<?php echo $clienteId?>" title="Evolución" target="_blank"><i class="fa fa-eye"></i></a>

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
                 <?php echo $enfermedadA?>
                  <?php echo $personales?>
                  <?php echo $familiares?>
                   <?php echo $antedentesgine?>
                  <?php echo $vacunante?>
                  <?php echo $historialvacu?>
                  <?php echo $habitos?>
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

                  $hematologia_final=str_replace('|','<br>',$rowMotorizado['hematologia_final']);
                  $drogasabuso_final=str_replace('|','<br>',$rowMotorizado['drogasabuso_final']);
                  $serologia_final=str_replace('|','<br>',$rowMotorizado['serologia_final']);
                  $autoinmunidad_final=str_replace('|','<br>',$rowMotorizado['autoinmunidad_final']);
                  $coproanalisis_final=str_replace('|','<br>',$rowMotorizado['coproanalisis_final']);
                  $coagulacion_final=str_replace('|','<br>',$rowMotorizado['coagulacion_final']);
                  $enzimas_final=str_replace('|','<br>',$rowMotorizado['enzimas_final']);
                  $biologiamolecular_final=str_replace('|','<br>',$rowMotorizado['biologiamolecular_final']);
                  $electro_final=str_replace('|','<br>',$rowMotorizado['electro_final']);
                  $anticuerpos_final=str_replace('|','<br>',$rowMotorizado['anticuerpos_final']);
                  $bacteriologia_final=str_replace('|','<br>',$rowMotorizado['bacteriologia_final']);
                  $quimica_final=str_replace('|','<br>',$rowMotorizado['quimica_final']);
                  $marcadores_final=str_replace('|','<br>',$rowMotorizado['marcadores_final']);
                  $drogas_final=str_replace('|','<br>',$rowMotorizado['drogas_final']);
                  $pruebashor_final=str_replace('|','<br>',$rowMotorizado['pruebashor_final']);
                  $inmuno_final=str_replace('|','<br>',$rowMotorizado['inmuno_final']);
                  $orina_final=str_replace('|','<br>',$rowMotorizado['orina_final']);
                  $patologia_final=str_replace('|','<br>',$rowMotorizado['patologia_final']);
                  $otrosexa_final=str_replace('|','<br>',$rowMotorizado['otrosexa_final']);
                  $otros_laboratorios=str_replace('|','<br>',$rowMotorizado['otros_laboratorios']);
                  
                  

                     ?>
 


                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#procesado<?php echo $ID?>">
                        Fecha <?php echo $Fecha .'-'.$Hora?>  
                      </a>
                      <a href="imprimirOrdenLabOste.php?historiaClinica1=<?php echo $ID?>" title="Imprimir Test" target="_blank"><i class="fa fa-print"></i> </a>
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
             
               <p>
        <?php  if ( $hematologia_final<> '') { echo '<b>HEMATOLOGÍA</b> <br>'.$hematologia_final;} ?> 
      </p>
      <p>
        <?php  if ( $drogasabuso_final<> '') { echo '<b>DROGAS DE ABUSO</b> <br>'.$drogasabuso_final;} ?> 
      </p>
      <p>
        <?php  if ( $serologia_final<> '') { echo '<b>SEROLOGÍA</b> <br>'.$serologia_final;} ?> 
      </p>
      <p>
        <?php  if ( $autoinmunidad_final<> '') { echo '<b>AUTOINMUNIDAD</b> <br>'.$autoinmunidad_final;} ?> 
      </p>
      <p>
        <?php  if ( $coproanalisis_final<> '') { echo '<b>COPROANÁLISIS</b> <br>'.$coproanalisis_final;} ?> 
      </p>
      <p>
        <?php  if ( $coagulacion_final<> '') { echo '<b>COAGULACIÓN</b> <br>'.$coagulacion_final;} ?> 
      </p>
      <p>
        <?php  if ( $enzimas_final<> '') { echo '<b>ENZIMAS</b> <br>'.$enzimas_final;} ?> 
      </p>
      <p>
        <?php  if ( $biologiamolecular_final<> '') { echo '<b>BIOLOGÍA MOLECULAR</b> <br>'.$biologiamolecular_final;} ?> 
      </p>
      <p>
        <?php  if ( $electro_final<> '') { echo '<b>ELECTROLITOS</b> <br>'.$electro_final;} ?> 
      </p>
      <p>
        <?php  if ( $anticuerpos_final<> '') { echo '<b>ANTICUERPOS VIRALES E INMUNODIAGNOSTICO</b> <br>'.$anticuerpos_final;} ?> 
      </p>

      <p>
        <?php  if ( $bacteriologia_final<> '') { echo '<b>BACTERIOLOGIA</b> <br>'.$bacteriologia_final;} ?> 
      </p>
      <p>
        <?php  if ( $quimica_final<> '') { echo '<b>QUIMICA SANGUINEA</b> <br>'.$quimica_final;} ?> 
      </p>
      <p>
        <?php  if ( $marcadores_final<> '') { echo '<b>MARCADORES ONCOLÓGICOS</b> <br>'.$marcadores_final;} ?> 
      </p>
      <p>
        <?php  if ( $drogas_final<> '') { echo '<b>DROGAS TERAPÉUTICAS</b> <br>'.$drogas_final;} ?> 
      </p>
      <p>
        <?php  if ( $pruebashor_final<> '') { echo '<b>PRUEBAS HORMONALES</b> <br>'.$pruebashor_final;} ?> 
      </p>

      <p>
        <?php  if ( $inmuno_final<> '') { echo '<b>INMUNO DIAGNÓSTICO</b> <br>'.$inmuno_final;} ?> 
      </p>
      <p>
        <?php  if ( $orina_final<> '') { echo '<b>ORINA</b> <br>'.$orina_final;} ?> 
      </p>
      <p>
        <?php  if ( $patologia_final<> '') { echo '<b>PATOLOGÍA-CITOLOGÍA</b> <br>'.$patologia_final;} ?> 
      </p>
      <p>
        <?php  if ( $otrosexa_final<> '') { echo '<b>OTROS</b> <br>'.$otrosexa_final;} ?> 
      </p>
      <p>
        <?php  if ( $otros_laboratorios<> '') { echo '<b>OTROS LABORATORIOS</b> <br>'.$otros_laboratorios;} ?> 
      </p>
               
              </div>
             
 
     

                    </div>
                  </div>
                </div>
               

              
            <?php }  ?>

            </div>









 <div class="tab-pane" id="Examenes3">
     
          <hr align="center" size="10" width="100%" color="#000000">
           <h3>
            Epidemiología
           </h3>
    
                  <?php 
               
                  $queryList=mysqli_query($conn3,"SELECT * FROM   epidemiologia where  cliente_id = $clienteId order by ID DESC");
                
                $nrowl=mysqli_num_rows($queryList);
                while($rowMotorizado=mysqli_fetch_array($queryList))
                {

                  $ID      =$rowMotorizado['ID'];
                  $cliente_id      =$rowMotorizado['cliente_id'];
                  $usuario_id      =$rowMotorizado['usuario_id'];
                   $Fechaepi           =$rowMotorizado['fecha'];

                  $Hora            =$rowMotorizado['hora'];
                  $datos             =$rowMotorizado['datos'];
                  $laboratorio        =$rowMotorizado['epidemiologia'];
                  $laboratorio2        =$rowMotorizado['epidemiologia2'];
                  $contacto      =$rowMotorizado['idTabla'];

                     ?>
 


                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#proce<?php echo $ID?>">
                        Fecha <?php echo $Fechaepi .'-'.$Hora?>  
                      </a>
                      <a href="imprimirEpidemiologia.php?historiaClinica1=<?php echo $ID?>" title="Imprimir Epi" target="_blank"><i class="fa fa-print"></i> </a>
                   <!--   <a href="enviarLaboratorio.php?historiaClinica1=<?php echo $ID?>" title="Enviar laboratorio" target="_blank"><i class="fa fa-send-o"></i> </a>
                    </h4> -->
                  </div>
                  <div id="proce<?php echo $ID?>" class="panel-collapse collapse">
                    <div class="box-body">
                   



               <hr align="center" size="10" width="100%" color="#000000">
                
               <div align="right" >
                Fecha <?php echo $Fechaepi.'-'.$Hora?>
               </div>
               
            
              
               
              <div>
             
               <table>
                 <?php echo $datos?>
                 <?php echo $laboratorio?>
                 <?php echo $laboratorio2?>
                 
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
              
            
      
  <div class="tab-pane" id="Examenes4">
  <hr align="center" size="10" width="100%" color="#000000">
           <h3> Registro de Archivos </h3>  
 
                 <table width="100%" border="1" >
  <tr>
    <th class="tg-c3ow">Resultados</th>
    <th class="tg-0pky"></th>
    <th class="tg-0lax"></th>
    <th class="tg-0lax"></th>
  </tr>

                      <?php  
 $queryImg=mysqli_query($conn3,"SELECT * FROM archivos  where cliente_id = '$clienteId'");
                  $nrowlER=mysqli_num_rows($queryImg);
                  while($resulImg=mysqli_fetch_array($queryImg))
                  {
                    ?>
  <tr>
    <th>

    <?php echo $resulImg['codigo']; ?>
      
    </th>
    <th>
    <?php echo $resulImg['fecha']; ?>
      

    </th>
    <th>
      
       <a target="blank" href="<?php echo $Base;?>/archivos/<?php echo $resulImg['codigo']; ?>">
                            <a href="<?php echo $Base;?>/archivos/'<?php echo $resulImg['codigo']; ?>'"download="Archivo">Descargar Archivo    
</a>  
                              </a>  

    </th>
    <th>
        <a target="_blank" href="<?php echo $Base;?>/archivos/<?php echo $resulImg['codigo']; ?>">
                                <a href="<?php echo $Base;?>/archivos/'<?php echo $resulImg['codigo']; ?>'" >Ver Archivo o Imagen     <br>
</a>  
                              </a> 

    </th>
  </tr>

                            

                              


                            <?php } ?>

                            </table>
       
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