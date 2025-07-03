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
  <a class="btn btn-primary" href="vercliente.php?clienteId=<?php echo $clienteId;?>" role="button"> <i class="fa fa-eye"></i>  Ver completo</a>
  <a class="btn btn-primary" href="historiaClinica.php?clienteId=<?php echo $clienteId;?>" role="button"> <i class="fa fa-heartbeat"></i>  Nueva consulta </a>
  <a class="btn btn-primary" href="historiaImagenes.php?clienteId=<?php echo $clienteId;?>" role="button"><i class="fa fa-folder-open-o"></i>  Agregar exámenes </a>
          <?php

include 'estadoFacturaPresupuestoCliente.php';

  ?> 
                               
     </div>
<br>

               <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#Consultas" data-toggle="tab">Consultas</a></li>
              <li><a href="#Examenes" data-toggle="tab">Registros de exámenes</a></li>
              <li><a href="#ExamenesEcografias" data-toggle="tab">Registros de Ecografias</a></li>

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
               
                  $queryList=mysqli_query($conn3,"SELECT * FROM  historiaClinica_urologia where cliente_id = $clienteId  order by ID DESC");

                  $nrowl=mysqli_num_rows($queryList);

                  while($row_recordset32=mysqli_fetch_array($queryList))

                  {
                      $ID                 = $row_recordset32['id'];                
                      $Fecha                 = $row_recordset32['Fecha'];                
                      $Hora                  = $row_recordset32['Hora'];                
                      $motivoConsulta        = $row_recordset32['detalle'];      
                   

                     ?>
 


                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $ID?>">
                        Fecha <?php echo $Fecha .'-'.$Hora?> <a href="finalizarClinica18_urologia.php?historiaClinica1=<?php echo $ID?>" title="Imprimir Consulta" target="_blank"><i class="fa fa-print"></i> </a>
                      </a>
                    </h4>
                  </div>
                  <div id="<?php echo $ID?>" class="panel-collapse collapse">
                    <div class="box-body">
                   



               <hr align="center" size="10" width="100%" color="#000000">
                
               <div align="right" >
                Fecha <?php echo $Fecha .'-'.$Hora?>
               </div>
               
            
              
              <?php if (strlen($motivoConsulta)>0): ?>
              <div>
              <label>Motivo Consulta :</label>
              <label>  <?php echo $motivoConsulta?></label>
               
              </div>
              <?php endif ?>



              <?php if (strlen($diagnostico)>0): ?>
              <div>
                <strong> Diagnostico : </strong> 
              <label><?php echo $diagnostico?></label>
              </div>
              
              <?php endif ?>


              <?php if (strlen($tratamiento)>0): ?>
              <div>
               <label> Tratamiento:</label>
                <label><?php echo $tratamiento?></label>
              </div>              
              <?php endif ?>
              

              <?php if (strlen($comoTomarlo)>0): ?>
              <div>
               <label> Como Tomarlo:</label>
                <label><?php echo $comoTomarlo?></label>
              </div>
              <?php endif ?>              
               
              <?php if (strlen($rSistema)>0): ?>

              <div>
               <label> Revisión por sistema :</label>
                <label><?php echo $rSistema?></label>
              </div>

              
              <?php endif ?>
 
              <?php if (strlen($cie10)>0): ?>
              <div>
               <label> :</label>
                <label><?php echo $cie10?></label>
              </div>
              <?php endif ?>              
              
              <?php if (strlen($enfermedadActual)>0): ?>
              <div>
               <label> Enfermedad Actual:</label>
                <label><?php echo $enfermedadActual?></label>
              </div>
              <?php endif ?>              
              
              <?php if (strlen($acompananteFamiliar)>0): ?>
              <div>
               <label> Acompañante Familiar:</label>
                <label><?php echo $acompananteFamiliar.' Teléfono: '.$telefono_acompanante?></label>
              </div>
              <?php endif ?>              
              
              <?php if (strlen($paraClinicos)>0): ?>
              <div>
               <label> Para Clínicos:</label>
                <label><?php echo $paraClinicos?></label>
              </div>
              <?php endif ?>              
              
 
              <?php if (strlen($remision)>0): ?>
              <div>
               <label> Remisión:</label>
                <label><?php echo $remision?></label>
              </div>
              <?php endif ?>              
              
              <?php if (strlen($diagnosticoMsalud)>0): ?>
              <div>
               <label> Diagnostico Para Ministerio de salud:</label>
                <label><?php echo $diagnosticoMsalud?></label>
              </div>
              <?php endif ?>              
              
<hr>
<div align="center"> Exámenes Físicos   </div>

              <?php if ($peso>0): ?>
              <div>
               <label> IMC :</label>
                <label><?php echo 'Peso: '.$peso.' Altura:'.$altura.' IMC: '.$imc.' Composición corporal'.$ComposicionCorporal?></label>
              </div>
              <?php endif ?>  


              <?php if (strlen($estadoGeneral)>0): ?>
              <div>
               <label> Estado General :</label>
                <label><?php echo $estadoGeneral?></label>
              </div>
              <?php endif ?> 

              <?php if (strlen($estadoConciencia)>0): ?>
              <div>
               <label> Estado de Conciencia :</label>
                <label><?php echo $estadoConciencia?></label>
              </div>
              <?php endif ?> 

              <?php if (strlen($ojos)>0): ?>
              <div>
               <label> ojos:</label>
                <label><?php echo $ojos?></label>
              </div>
              <?php endif ?> 

              <?php if (strlen($otoscopia)>0): ?>
              <div>
               <label> Otoscopia :</label>
                <label><?php echo $otoscopia?></label>
              </div>
              <?php endif ?> 

              <?php if (strlen($cavidadOral)>0): ?>
              <div>
               <label> Cavidad Oral :</label>
                <label><?php echo $cavidadOral?></label>
              </div>
              <?php endif ?> 
              <?php if (strlen($cuello)>0): ?>
              <div>
               <label> Cuello :</label>
                <label><?php echo $cuello?></label>
              </div>
              <?php endif ?> 

              <?php if (strlen($torax)>0): ?>
              <div>
               <label> torax :</label>
                <label><?php echo $torax?></label>
              </div>
              <?php endif ?> 

              <?php if (strlen($abdomen)>0): ?>
              <div>
               <label> abdomen :</label>
                <label><?php echo $abdomen?></label>
              </div>
              <?php endif ?> 

              <?php if (strlen($genitoUrinario)>0): ?>
              <div>
               <label> Genito Urinario :</label>
                <label><?php echo $genitoUrinario?></label>
              </div>
              <?php endif ?> 

              <?php if (strlen($extremidades)>0): ?>
              <div>
               <label> Extremidades :</label>
                <label><?php echo $extremidades?></label>
              </div>
              <?php endif ?> 

              <?php if (strlen($vacularPeriferico)>0): ?>
              <div>
               <label> Vacular Periférico :</label>
                <label><?php echo $vacularPeriferico?></label>
              </div>
              <?php endif ?> 

              <?php if (strlen($sistemaNervioso)>0): ?>
              <div>
               <label> Sistema Nervioso :</label>
                <label><?php echo $sistemaNervioso?></label>
              </div>
              <?php endif ?> 

              <?php if (strlen($pielAnexos)>0): ?>
              <div>
               <label> >Piel Anexos :</label>
                <label><?php echo $pielAnexos?></label>
              </div>
              <?php endif ?> 

              <?php if (strlen($examenPartesdCuerpo)>0): ?>
              <div>
               <label> Examen Partes dCuerpo:</label>
                <label><?php echo $examenPartesdCuerpo?></label>
              </div>
              <?php endif ?> 

              <?php if (strlen($tart)>0): ?>
              <div>
               <label> tart:</label>
                <label><?php echo $tart?></label>
              </div>
              <?php endif ?> 

              <?php if (strlen($temperatura)>0): ?>
              <div>
               <label>Temperatura:</label>
                <label><?php echo $temperatura?></label>
              </div>
              <?php endif ?> 

              <?php if (strlen($fcard)>0): ?>
              <div>
               <label>fcard:</label>
                <label><?php echo $fcard?></label>
              </div>
              <?php endif ?> 

              <?php if (strlen($sat)>0): ?>
              <div>
               <label>SAT:</label>
                <label><?php echo $sat?></label>
              </div>
              <?php endif ?> 

 
              
<?php if (strlen($laboratorio)>0 or strlen($laboratorio)>0 or strlen($laboratorio)>0 ): ?>
<hr>
<div align="center"> Exámenes a Realizar  </div>
 

              <?php if (strlen($laboratorio)>0): ?>
              <div>
               <label>laboratorio:</label>
                <label><?php echo $laboratorio?></label>
              </div>
              <?php endif ?> 

              <?php if (strlen($ecografia)>0): ?>
              <div>
               <label>ecografia:</label>
                <label><?php echo $ecografia?></label>
              </div>
              <?php endif ?> 

              <?php if (strlen($otros)>0): ?>
              <div>
               <label>otros:</label>
                <label><?php echo $otros?></label>
              </div>
              <?php endif ?>                             
      

 
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
                           

                             <a target="blank" href="{$Base}/galeriaImg/<?php echo $resulImg['nombre_img']; ?>">
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