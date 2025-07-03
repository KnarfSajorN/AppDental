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

 

           }

        ?>





 <div class="card-body">
                  <div class="box-body">
                     

          
            <div class="col-md-5">
                
              <label><strong>Correo:</strong></label>
                <label> <?php echo $correo_cliente;?>  </label>
              

              <br>
                <label><strong>Nombre:</strong></label>
                 <label><?php echo $nombre_cliente;?> </label>
              

               <br>
                <label><strong>Celular:</strong></label>
                <label><?php echo $celular_cliente;?></label>
            
                <br> 
                <label><strong>Ciudad:</strong></label>
                <label><?php echo $ciudad_cliente;?></label>
             
                <br>
                <label><strong>Fecha registro:</strong></label>
                <label><?php echo $fechar;?></label>
                
               <br>
                <label><strong>Cedula o ID:</strong></label>
                <label><?php echo $CODI_CLIENTE;?></label>
               
               <br>
                <label><strong> Es donante:</strong></label>
                <label><?php echo $esDonante;?></label>
               
               <br>
                <label><strong>Entidad de salud :</strong></label>
                <label><?php echo $entidadSalud;?></label>
               

          
               
               

            </div>
       
               <div class="col-md-5">
                <label><strong>  Dirección cliente:</strong></label>
                <label><?php echo $direccion_cliente ;?></label>
             <br>
                <label><strong> Teléfono :</strong></label>
                <label><?php echo $telefono_cliente ;?></label>
                <br>
                
                <label><strong> Fecha de nacimiento :</strong></label>
                <label><?php echo $fechaNacimiento;?></label>
                
                   <br>


                <label><strong> Edad :</strong></label>
                <label><?php echo calculaedad($fechaNacimiento);?></label>
                
                 <br>

                  <label><strong>Genero:</strong></label>
                  <label><?php echo $genero;?></label>

               <br>
                  <label><strong>Profesión :</strong></label>
                  <label><?php echo $profesion_cliente ;?></label>

                <br>
                  <label><strong>Tipo de sangre :</strong></label>
                  <label><?php echo $tiposSangre ;?></label>   

                <br>

               <br>
                <label><strong>Seguro :</strong></label>
                <label><?php echo $seguro;?></label>
               
                 

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
<hr>  
</div>
              <div class="col-md-12">
              <div class="col-md-12">

                <label><strong>Toma algún medicamento:</strong></label>
                <label><?php echo $tomaMedicamento ;?></label>   
</div>
    <div class="form-group col-md-2" align="right">
      Alergias a las aines  <?php echo sino($ap1)?>
    </div>  
     
    <div class="form-group col-md-2" align="right">
      Asma <?php echo sino($ap2)?>
      
    </div>

    <div class="form-group col-md-2" align="right">
      HTA <?php echo sino($ap3)?>
     </div> 

    <div class="form-group col-md-2" align="right">
      Diabetes <?php echo sino($ap4)?>

    </div>

    <div class="form-group col-md-2" align="right">
      Hipotiroidismo <?php echo sino($ap5)?>
    
    </div>

    <div class="form-group col-md-2" align="right">
      Tabaquismo <?php echo sino($ap6)?>
  
    </div>

    <div class="form-group col-md-2" align="right">
      Licor <?php echo sino($ap7)?>
  
    </div>

    <div class="form-group col-md-2" align="right">
      Otras Alergias <?php echo sino($ap8)?>
 
    </div>

    <div class="form-group col-md-2" align="right">
      Cirugías <?php echo sino($ap9)?>
  
    </div>
    </div>


    <div class="form-group col-md-12" >




                <label><strong>Antecedentes Familiares:</strong></label>
                <label><?php echo $antecedentes;?></label>.
              <br>
                <label><strong>Alergias :</strong></label>
                <label><?php echo $alergias;?></label>

                <br>
               
                <label><strong>Notas adicionales :</strong></label>
                <label><?php echo $nota;?></label>.

              </div>
            
 



                    </div>




    <div class="form-group col-md-12" >




  </div>




             <div align="center">

  <a class="btn btn-primary" href="Historia_RiesgoPsicoSocial.php?clienteId=<?php echo $clienteId;?>" role="button"> <i class="fa fa-heartbeat"></i>  Nueva consulta </a>

          <?php

include 'estadoFacturaPresupuestoCliente.php';

  ?> 
                               
     </div>
<br>

               <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#Consultas" data-toggle="tab">Consultas</a></li>

              <!-- 
              <li><a href="#Documentos" data-toggle="tab">Registros de exámenes</a></li>
                <a class="btn btn-primary" href="historiaExamenes.php?clienteId=<?php echo $clienteId;?>" role="button"><i class="fa fa-folder-open-o"></i>  Agregar exámenes</a>
              -->
            </ul>
            <div class="tab-content">
          <div class="active tab-pane" id="Consultas">
          
          
           





           <div>
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
               
                  $queryList=mysqli_query($conn3,"SELECT * FROM  historia_psicosocial where cliente_id = $clienteId  order by ID DESC");

                  $nrowl=mysqli_num_rows($queryList);

                  while($rowMotorizado=mysqli_fetch_array($queryList))

                  {
                      $id      =$rowMotorizado['id'];
                      $cliente_id      =$rowMotorizado['cliente_id'];
                      $usuario_id      =$rowMotorizado['usuario_id'];
                      $Fecha           =$rowMotorizado['fecha'];
                      $Hora            =$rowMotorizado['hora'];

                      $edad            =$rowMotorizado['edad'];
                      $paridad            =$rowMotorizado['paridad'];
                      $antecedentes            =$rowMotorizado['antecedentes'];
                      $embarazo            =$rowMotorizado['embarazo'];
                      $total_riesgo_1            =$rowMotorizado['total_riesgo_1'];
                      $tension_emocional            =$rowMotorizado['tension_emocional'];
                      $humor_depresivo            =$rowMotorizado['humor_depresivo'];
                      $sintomas_neurovegetativos            =$rowMotorizado['sintomas_neurovegetativos'];
                      $total_riesgo_2            =$rowMotorizado['total_riesgo_2'];
                      $tiempo_riesgo            =$rowMotorizado['tiempo_riesgo'];
                      $espacio_riesgo            =$rowMotorizado['espacio_riesgo'];
                      $dinero_riesgo            =$rowMotorizado['dinero_riesgo'];
                      $total_riesgo_3            =$rowMotorizado['total_riesgo_3'];
                      $total_historia            =$rowMotorizado['total_historia'];     
                   

                     ?>
 


                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $id?>">
                        Fecha <?php echo $Fecha .'-'.$Hora?> <a href="finalizado_PsicoSocial.php?historia=<?php echo $id?>" title="Imprimir Consulta" target="_blank"><i class="fa fa-print"></i> </a>
                      </a>
                    </h4>
                  </div>
                  <div id="<?php echo $id?>" class="panel-collapse collapse">
                    <div class="box-body">

                     <hr align="center" size="10" width="100%" color="#000000">
                      
                     <div align="right" >
                      Fecha <?php echo $Fecha .'-'.$Hora?>
                     </div>

                     <h4 align="center"> HISTORIA CLÍNICA PSICO SOCIAL
                     </h4> 
                       <div class="col-md-12" align="left"><label> I. HISTORIA REPRODUCTIVA </label> <br>
                         <?php echo $edad?>
                       </div>
                       <div class="col-md-12" align="left">
                         <?php echo $paridad?>
                       </div>
                       <div class="col-md-12" align="left"><label> II. ANTECEDENTES PERSONALES </label> <br>
                         <?php echo $antecedentes?>
                       </div>
                       <div class="col-md-12" align="left"><label> III. EMBARAZO ACTUAL </label> <br>
                         <?php echo $embarazo?>
                       </div>
                       <div class="col-md-12" align="left"><label> TOTAL RIESGO OBSTÉTRICO </label> <br>
                         <?php echo $total_riesgo_1;if($total_riesgo_1 >=3)
                         {
                           echo '<br><label> ALTO RIESGO </label> <br>';
                         }
                         elseif($total_riesgo_1 <3)
                         {
                           echo '<br><label> BAJO RIESGO </label> <br>';
                         }
                         ?>
                       </div>
                       <div class="col-md-12" align="left"><br><label> IV. RIESGO PSICOSOCIAL </label> <br></div>
                       <div class="col-md-12" align="left"> <label> Tensión emocional:  </label> <br>
                         <?php echo $tension_emocional?>
                       </div>
                       <div class="col-md-12" align="left"> <label> Tensión emocional:  </label> <br>
                         <?php echo $humor_depresivo?>
                       </div>
                       <div class="col-md-12" align="left"> <label> Tensión emocional: </label> <br>
                         <?php echo $sintomas_neurovegetativos?>
                       </div>
                       <div class="col-md-12" align="left"> <label> SUB TOTAL: </label>
                         <?php echo $total_riesgo_2?>
                       </div>
                       <div class="col-md-12" align="left"> <label> Tiempo:  </label>
                         <?php echo $tiempo_riesgo?>
                       </div>
                       <div class="col-md-12" align="left"> <label> Espacio: </label>
                         <?php echo $espacio_riesgo?>
                       </div>
                       <div class="col-md-12" align="left"> <label> Dinero: </label>
                         <?php echo $dinero_riesgo?>
                       </div>
                       <div class="col-md-12" align="left">  <label> SUB TOTAL: </label>
                         <?php echo $total_riesgo_3?>
                       </div>
                       <div class="col-md-12" align="left"> <label> TOTAL RIESGO PSICOSOCIAL: </label>
                         <?php echo $total_historia; if($total_historia >=2)
                         {
                           echo '<br><label> ALTO RIESGO </label> <br>';
                         }
                         elseif($total_historia <2)
                         {
                           echo '<br><label> BAJO RIESGO </label> <br>';
                         }?>
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