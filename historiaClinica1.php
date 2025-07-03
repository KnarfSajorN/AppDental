<?php 
   include 'header.php';
   include 'menu.php';

    $clienteId = $_GET['clienteId']; 
    $usuarioId = $_GET['usuarioId']; 

 


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
                    $antecedentes     =$rowMotorizado['antecedentes'];   
                    $fotoperfil       =$rowMotorizado['fotoperfil']; 
                    $tiposSangre      =$rowMotorizado['tiposSangre']; 
                    $esDonante        =$rowMotorizado['esDonante']; 
                    $tomaMedicamento  =$rowMotorizado['tomaMedicamento']; 
                    
                    $fechaNacimiento  =$rowMotorizado['fechaNacimiento']; 
                 
                    $entidadSalud     =$rowMotorizado['entidadSalud']; 
                    $seguro           =$rowMotorizado['seguro']; 
                    
                    $nota           =$rowMotorizado['nota']; 
                    $enfermedadesPequeno           =$rowMotorizado['enfermedadesPequeno']; 
                    $alergias           =$rowMotorizado['alergias']; 





          $peso           =$rowMotorizado['peso']; 
          $altura           =$rowMotorizado['altura']; 
          $imc           =$rowMotorizado['imc']; 
          $ComposicionCorporal           =$rowMotorizado['ComposicionCorporal']; 

                  }


                  $queryconfig=mysqli_query($conn3,"SELECT * FROM  config where ID=$ID");
                  $nrowl=mysqli_num_rows($queryconfig);
                  while($rowconfig=mysqli_fetch_array($queryconfig))
                  {
                    $cie10 = $rowconfig['cie10'];
                    $pro1=$rowconfig['pro1'];
                    $pro2=$rowconfig['pro2'];
                  }



      ?>
     

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Consulta medica 
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
        <li><a href="#">Registro de consulta</a></li>
        

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
 

          <div class="box">
         
            <!-- /.box-header -->
            <div class="box-body">



         
              <div class="col-md-5">
                
              <label><strong>Correo:</strong></label>
                <label> <?php echo $correo_cliente;?>  </label>
              

              <br>
                <label><strong>Nombre:</strong></label>
                 <label><?php echo $nombre_cliente;?> </label>
              

               <br>
                <label><strong>Celular:</strong></label>
                <label><?php echo $CODI_CLIENTE;?></label>
            
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
               
                <br>
                <label><strong>Peso / altura:</strong></label>
                <label><?php echo $peso.' / '.$altura;?></label>
               
                <br>
                <label><strong>IMC :</strong></label>
                <label><?php echo $imc.' '.$ComposicionCorporal;?></label>
               

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
                  <label><strong>Toma algún medicamento:</strong></label>
                  <label><?php echo $tomaMedicamento ;?></label>   

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



               <div class="col-md-12">
      		    	<label><strong>Antecedentes :</strong></label>
      		    	<label><?php echo $antecedentes;?></label>.
              <br>
                <label><strong>Alergias :</strong></label>
                <label><?php echo $alergias;?></label>

                <br>
                <label><strong>Enfermedades de pequeño :</strong></label>
                <label><?php echo $enfermedadesPequeno;?></label>.
                <br>
              
                <label><strong>Notas adicionales :</strong></label>
                <label><?php echo $nota;?></label>.

      		  	</div>
               
      		   
          <div class="form-group col-md-12">
            <h4 class="card-title"> Registro de consulta </h4>
          </div>                                 
          <br> 
      		 <form action="guardarHistoriaClinica1.php" method="POST" name="formularioActualizarcliente">
            
                                                                                         
      		  <div class="form-row">
            
            <input type="hidden" name="registro" value="1">

              <div class="form-group col-md-12">
                <div align="left">Motivo consulta</div>
              </div>
              <div class="box-body pad">
              
                <textarea id="motivoConsulta" name="motivoConsulta"  class="textarea" placeholder="Motivo Consulta" style="width: 100%; height: 200px; font-size: 20px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
             
              </div>
              

              <div class="form-group col-md-12">
                <div align="left"> Diagnostico </div>
              </div>

               <div class="form-group col-md-12">
              CIE-10
              <?php 
                if ($cie10 == 1) {
              ?>

               <select id="cie10" name="cie10" class="form-control select2" style="width: 100%;" >
                    <option value="" selected="selected">Seleccione</option>
                    <?php
 $usuario_id1 = $_SESSION['ID'].'cie10';
                        $queryList=mysqli_query($conn3,"SELECT * FROM $usuario_id1 order by codigo");
                                      $nrowl=mysqli_num_rows($queryList);
                                      while($row_recordset32=mysqli_fetch_array($queryList))
                                      {
                                          $codigo      = $row_recordset32['codigo'];
                                          $descripcion      = $row_recordset32['descripcion'];
                                          

                                          echo "<option value='$codigo'>$codigo - $descripcion</option>";
                                      }

                    ?>

  


                </select> 

  <div align="center"> 
                  Para configurar la lista CIE10 <a href="<?php echo $Base?>config" target="_blank"> <strong> <i class="fa fa fa-gears"></i>clic aquí Configuración y perfil </strong></a> y luego seleccionamos la pestaña <strong> listas </strong>
                  <br> <font color="red">  Necesitas ayuda, Solicítalo por <a href="'.$Base.'/soporte" target="_blank"> <strong> <i class="fa fa fa-support"></i> soporte </strong></a>  </font></h6>
</div> 


              <?php
                }
                else
                {
                  echo ' <div align="center"> 
                  Lista CIE10 desactivada, para activar debes entrar a configuración 
                  <a href="'.$Base.'/config" target="_blank"> <strong> <i class="fa fa fa-gears"></i> clic aquí Configuración y perfil </strong></a>  y luego seleccionamos la pestaña  <strong> listas </strong>
                  <br> <font color="red">  Necesitas ayuda, Solicítalo por <a href="'.$Base.'/soporte" target="_blank"> <strong> <i class="fa fa fa-support"></i> soporte </strong></a>  </font></h6>
</div>';

                 


                }
              ?>
              
 
               </div>

              <div class="box-body pad">
              
                <textarea id="diagnostico" name="diagnostico" class="textarea" placeholder="Diagnostico" style="width: 100%; height: 200px; font-size: 20px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
             
              </div>
              


              <div class="form-group col-md-12">
                <div align="left">Tratamiento</div>
              </div>
             

              <?php if ($pro1 == 1) 
              {?>


              <div class="form-group col-md-12">
              Lista   
              <select  id="prestaciones" name="prestaciones1[]" class="form-control select2" multiple="multiple" style="width: 100%;" >
                    
                    <?php
                      $usuario_id = $_SESSION['ID'].'pos';
                        $queryList=mysqli_query($conn3,"SELECT * FROM $usuario_id order by codigo");
                                      $nrowl=mysqli_num_rows($queryList);
                                      while($row_recordset32=mysqli_fetch_array($queryList))
                                      {
                                          $codigo      = $row_recordset32['codigo'];
                                          $descripcion      = $row_recordset32['descripcion'];
                                          $pactivo      = $row_recordset32['pactivo'];
                                          

                                          echo "<option value='$codigo'>$codigo | $descripcion | $pactivo</option>";
                                      }

                    ?>

  


                </select>

 
                <div align="center"> 
                  Para configurar la lista CUPS  <a href="<?php echo $Base?>config" target="_blank"> <strong> <i class="fa fa fa-gears"></i> clic aquí Configuración y perfil </strong></a>  y luego seleccionamos la pestaña  <strong> listas </strong>
                  <br> <font color="red">  Necesitas ayuda, Solicítalo por <a href="<?php echo $Base?>soporte" target="_blank"> <strong> <i class="fa fa fa-support"></i> soporte </strong></a>  </font></h6>
</div> 
</div> 


              <?php
                }
                else
                {
                  echo ' <div align="center"> 
                  Lista CUPS desactivada, para activar  
                  <a href="'.$Base.'/config" target="_blank"> <strong> <i class="fa fa fa-gears"></i>clic aquí Configuración y perfil </strong></a>  y luego seleccionamos la pestaña  <strong> listas </strong>
                  <br> <font color="red">  Necesitas ayuda, Solicítalo por <a href="'.$Base.'/soporte" target="_blank"> <strong> <i class="fa fa fa-support"></i> soporte </strong></a>  </font></h6>
</div>';

                 


                }
              ?>



 <?php if ($pro2 == 1) 
              {?>


              <div class="form-group col-md-12">
              Lista  2 
              <select  id="prestaciones2" name="prestaciones2[]" class="form-control select2" multiple="multiple" style="width: 100%;" >
                    
                    <?php
                      $usuario_id = $_SESSION['ID'].'cups';
                        $queryList2=mysqli_query($conn3,"SELECT * FROM $usuario_id order by codigo");
                                      $nrowl=mysqli_num_rows($queryList2);
                                      while($row_recordset322=mysqli_fetch_array($queryList2))
                                      {
                                          $codigo      = $row_recordset322['codigo'];
                                          $descripcion      = $row_recordset322['descripcion'];
                                       
                                          

                                          echo "<option value='$codigo'>$codigo | $descripcion</option>";
                                      }

                    ?>

  


                </select>

 
                <div align="center"> 
                  Para configurar la lista  2  <a href="<?php echo $Base?>config" target="_blank"> <strong> <i class="fa fa fa-gears"></i> clic aquí Configuración y perfil </strong></a>  y luego seleccionamos la pestaña  <strong> listas </strong>
                  <br> <font color="red">  Necesitas ayuda, Solicítalo por <a href="'.$Base.'/soporte" target="_blank"> <strong> <i class="fa fa fa-support"></i> soporte </strong></a>  </font></h6>
</div> 


              <?php
                }
                else
                {
                  echo ' <div align="center"> 
                   Lista  desactivada, para activar  
                  <a href="'.$Base.'/config" target="_blank"> <strong> <i class="fa fa fa-gears"></i> clic aquí Configuración y perfil </strong></a>  y luego seleccionamos la pestaña  <strong> listas </strong>
                  <br> <font color="red">  Necesitas ayuda, Solicítalo por <a href="'.$Base.'/soporte" target="_blank"> <strong> <i class="fa fa fa-support"></i> soporte </strong></a>  </font></h6>
                  </div>';
                }
              ?>





              <div class="box-body pad">
              
                <textarea id="tratamiento" name="tratamiento" class="textarea" placeholder="Tratamiento" style="width: 100%; height: 200px; font-size: 20px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
             
              </div>


              <div class="form-group col-md-12">
                <div align="left">Receta medica </div>
              </div>
              <div class="box-body pad">
              
                <textarea id="recipe" name="recipe" class="textarea" placeholder="Tratamiento" style="width: 100%; height: 200px; font-size: 20px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
             
              </div>


              <div class="form-group col-md-12">
                <div align="left">Incapacidades </div>
              </div>
              <div class="box-body pad">
              
                <textarea id="incapacidades" name="incapacidades" class="textarea" placeholder="Tratamiento" style="width: 100%; height: 200px; font-size: 20px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
             
              </div>

             

              <div class="form-group col-md-12">
                <div align="left">Notas o comentarios</div>
              </div>
              <div class="box-body pad">
              
                <textarea id="notas" name="notas" class="textarea" placeholder="Notas o Comentarios" style="width: 100%; height: 200px; font-size: 20px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
             
              </div>
              


                <div class="col-sm-12">
                  <div align="center"> 
 

                    <label> <strong> Próxima consulta o cita (Solo si aplica)</strong>  </label>
                  </div>
                   
                </div>




                <div class="col-sm-6">
                  <div align="left"> 
                    <label>Fecha </label>
                  </div>
                  <input type="date" name="fecha"  class="form-control input-lg" id="fecha" min="<?php echo date('Y-m-d')?>"   onChange="verDia();">
                  <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID']?>">
                  <div id="div-results"></div>
                </div>


                <div class="col-sm-6">
                  <div align="left"> 
                    <label>Hora </label>
                  </div>
                 <input  type="time" name="hora" class="form-control input-lg"  placeholder="hora" id="Hora"  onChange="verHora();" >
           <div id="div-resultsHora"></div>

                </div>
                  
                <div class="col-sm-6">

                   <div align="left"> 
                    <label>Motivo consulta</label>
                  </div>
                  <input  type="text" name="motivo" class="form-control input-lg"  placeholder="Motivo Consulta">
 
                </div>
                 

                 <div class="col-sm-6">
                <br>
                <br>
               <label>
                  <input type="radio" name="P" value="0" class="flat-red" checked>
                 <i class="fa fa-user"></i>  Presencial  
                
                  <input type="radio" name="P" value="1"  class="flat-red"  >
                 <i class="fa fa-video-camera"></i>   Virtual
                </label>
              </div>



                    <input  type="hidden" name="email" value="<?php echo $correo_cliente;?>">
                    <input  type="hidden" name="nombre"  value="<?php echo $nombre_cliente;?>">
                    <input  type="hidden" name="telefono"  value="<?php echo $telefono_cliente ;?>">
                    <input  type="hidden" name="ID"  value="<?php echo $_SESSION['ID']?>">
                    <input  type="hidden" name="clienteId"  value="<?php echo $clienteId?>">
                    <input  type="hidden" name="NOMBRE_USUARIO"  value="<?php echo $_SESSION['NOMBRE_USUARIO']?>">
              
            

                 <div align="center"> 
                       <br>
            <br>
            <br>
             <div class="col-sm-12">
                <br>
            <br>
            <center><button type="submit" class="btn btn-block btn-primary btn-sm"> <h2> <strong>  G u a r d a r  </strong> </h2> </button></center>
            
                    </div>
                    </div>
                     
                 



           
            <input type="hidden"  name="tipo_cliente"   valur="1">
           </div>   
            
      		</form>










     
    </div>
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


<script type="text/javascript">


      function verDia(){
// estas son las variables que enviamos

        var fecha = $("#fecha").val();
        var Hora = $("#Hora").val();
        var usuario_id = $("#usuario_id").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "disponibilidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id},
            success: function(response) {
                $('#div-results').html(response);
                 
            }
        });
    };

      function verHora(){
// estas son las variables que enviamos

        var fecha = $("#fecha").val();
        var Hora = $("#Hora").val();
        var usuario_id = $("#usuario_id").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "disponibilidadHora.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id},
            success: function(response) {
                $('#div-resultsHora').html(response);
                 
            }
        });
    };



 
</script>