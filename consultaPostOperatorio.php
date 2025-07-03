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

        while($rowCliente=mysqli_fetch_array($queryList))

        {

            $usuario_id=$rowCliente['usuario_id'];
            $nombre_cliente=$rowCliente['nombre_cliente'];
            $celular_cliente=$rowCliente['celular_cliente'];
            $ciudad_cliente=$rowCliente['ciudad_cliente'];
            $correo_cliente=$rowCliente['correo_cliente'];
            $CODI_CLIENTE=$rowCliente['CODI_CLIENTE'];
            $id_uso_servicio=$rowCliente['id_uso_servicio'];
            $tipo_cliente=$rowCliente['tipo_cliente'];
            $fechar=$rowCliente['fechar'];
            $fecha_actualizado=$rowCliente['fecha_actualizado'];
            $activo=$rowCliente['activo'];
            $genero=$rowCliente['genero'];
            $direccion_cliente=$rowCliente['direccion_cliente'];
            $telefono_cliente=$rowCliente['telefono_cliente'];
            $edad_cliente=$rowCliente['edad_cliente'];
            $profesion_cliente=$rowCliente['profesion_cliente'];
            $acompananteFamiliar=$rowCliente['acompananteFamiliar'];
            $telefono_acompanante=$rowCliente['telefono_acompanante'];
            $antecedentes=$rowCliente['antecedentes'];

          


            $peso                     = $rowCliente['peso']; 
            $altura                   = $rowCliente['altura']; 
            $imc                          = $rowCliente['imc']; 
            $ComposicionCorporal      = $rowCliente['ComposicionCorporal']; 
            $fotoperfil      = $rowCliente['fotoperfil']; 

 

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
                <label><?php echo $celular;?></label>
            
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
                <label><?php calculaedad($fechaNacimiento);?></label>
                
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














             <div align="center">
  <a class="btn btn-primary" href="verPostOperatorio.php?clienteId=<?php echo $clienteId;?>&Us=<?php echo $usuarioId; ?>" role="button"> <i class="fa fa-eye"></i>  Ver completo</a>
  <a class="btn btn-primary" href="historiaClinica13_posoperatorio.php?clienteId=<?php echo $clienteId;?>" role="button"> <i class="fa fa-heartbeat"></i>  Nueva consulta </a>
                                       
     </div>
<br>

               <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#Consultas" data-toggle="tab">Consultas</a></li>
              <!--  <li><a href="#Examenes" data-toggle="tab">Registros de exámenes</a></li>
              <li><a href="#ExamenesEcografias" data-toggle="tab">Registros de Ecografias</a></li>

             
              <li><a href="#Documentos" data-toggle="tab">Registros de exámenes</a></li>
                <a class="btn btn-primary" href="historiaExamenes.php?clienteId=<?php echo $clienteId;?>" role="button"><i class="fa fa-folder-open-o"></i>  Agregar exámenes</a>
              -->
            </ul>
            <div class="tab-content">
          <div class="active tab-pane" id="Consultas">
          
          
           





           <div class="col-md-12" style="padding-top: 2%;">
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
           
                  $queryList=mysqli_query($conn3,"SELECT * FROM  historiaClinica13_PosOperatorio where cliente_id = $clienteId and usuario_id = $usuarioId order by ID DESC");

              

                  
                  while ($nrowl=mysqli_fetch_assoc($queryList)) { 
                

                  $ID=$nrowl['ID'];
                  $Fecha=$nrowl['Fecha'];
                  $Hora=$nrowl['Hora'];
                  $PosOperatorio=$nrowl['PosOperatorio'];




                     ?>
 



                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $ID?>">
                        Fecha <?php echo $Fecha .'-'.$Hora?> <a href="FinalizarPosOperatorio.php?historiaClinica1=<?php echo $ID?>" title="Imprimir Consulta" target="_blank"><i class="fa fa-print"></i> </a>
                      </a>
                    </h4>
                  </div>
                  <div id="<?php echo $ID?>" class="panel-collapse collapse">
                    <div class="box-body">
                   



                           <hr align="center" size="10" width="100%" color="#000000">
                            
                           <div align="right" >
                            Fecha <?php echo $Fecha .'-'.$Hora?>
                           </div>
                           
                        
                          
                          <?php if (strlen($PosOperatorio)>0): ?>
                          <div>
                          <label>Control PostOperatorio :</label>
                          <label>  <?php echo $PosOperatorio?></label>
                           
                          </div>
                          <?php endif ?>
                         









                    </div>




          
                  </div>
                </div>
 


                




<?php } ?>








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
