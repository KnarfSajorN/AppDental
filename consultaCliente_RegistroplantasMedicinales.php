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
            $cliente_id = $_GET['clienteId']; 
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


 

             <div align="center">
 

           <form action="guardar_historiaMedicacion.php" method="POST">
            <div class="form-row">
 
          <div class="form-group col-md-3"> 
            Dia      
            <input type="text" class="form-control input-lg" name="dia"  id="codigo"     required>
          </div>
   
          <div class="form-group col-md-9">
          Plantas Medicinales

      
          <select class="form-control select2" style="width: 100%;" name="medicina" required="required">
                  <option selected="">Seleccionar </option>
                  <option>MANZANILLA (Calmante, insomnio y estrés)</option>
                  <option>VALERIANA (Problemas de Sueño, Depresión, Ansiedad Y Nervios)</option>
                  <option>ALBAHACA (Tranquilizante, propiedades para calmar los nervios y el estrés)</option>
                  <option>TE VERDE (Contiene L- teanina, sustancia que puede reducir la ansiedad. </option>

          </select>

          </div> 
          
          <div class="form-group col-md-12">

           </div> 
          <div class="form-group col-md-3">
          Dosis
          <input type="text"  class="form-control input-lg"  name="dosis" value="Tomar una Infusión antes de acostarse" id="descripcion" required>
          </div> 
               
          <div class="form-group col-md-3">
          Via
          <input type="text"  class="form-control input-lg"  name="via" value="Oral" id="descripcion" required>
          </div> 


          <div class="form-group col-md-3">
          Responsable
          <input type="text"  class="form-control input-lg"  name="responsable" value="<?php echo $descripcionE?>" id="descripcion" required>
          </div> 
  
          <input type="hidden" name="ID" id="usuario_id" value="<?php echo $_SESSION['ID']?>">
          <input type="hidden" name="cliente_id" id="usuario_id" value="<?php echo $_GET['clienteId']?>">
              
           
          <div class="form-group col-md-3">
          <button type="submit" class="btn btn-block btn-primary btn-sm"> <h4> <strong>  Guardar  </strong> </h4> </button></center>
          </div> 


              
            </div>

         

          </form>

                                       
     </div>
<br>

               <div class="col-md-12">
           
           





           <div class="col-md-12">
          <div class="box box-solid">
             
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box-group" id="accordion">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                








          <hr align="center" size="10" width="100%" color="#000000">
           <h3>
           Medicacion
           </h3>


       



    
                  <?php 
    $clienteId =  $_GET['clienteId'];            
 
                  $queryList=mysqli_query($conn3,"SELECT * FROM  historiaMedicacion where cliente_id = $clienteId order by ID DESC");

                  $nrowl=mysqli_num_rows($queryList);

                  while($row_recordset32=mysqli_fetch_array($queryList))

                  {
                      $ID                 = $row_recordset32['ID'];                
                      $Fecha                 = $row_recordset32['Fecha'];                
                      $Hora                  = $row_recordset32['Hora'];                
 
                      $dia           = $row_recordset32['dia']; 
                      $medicina           = $row_recordset32['medicina'];  
                      $dosis           = $row_recordset32['dosis'];  
                      $via           = $row_recordset32['via'];  
                      $responsable           = $row_recordset32['responsable'];  
                     
                     ?>
 


                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                    
                        Fecha <?php echo $Fecha .'-'.$Hora?> 
                    
                    </h4>

                    
                    <table border="1" style="undefined;table-layout: fixed; width: 100%">
                      <tr>
                        <th width="5%"> <?php echo $dia?> </th>
                        <th width="45%"> <?php echo $medicina?> </th>
                        <th width="30%"> <?php echo $dosis?> </th>
                        <th width="5%"> <?php echo $via?> </th>
                        <th width="15%"> <?php echo $responsable?> </th>
                      </tr>
                    </table>
 
                  


                  </div>
                  <div id="<?php echo $ID?>" class="panel-collapse collapse">
                    


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