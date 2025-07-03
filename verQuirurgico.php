 
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Ver Informes Quirurgicos</title>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<!-- estilos css-->
<link rel="stylesheet" href="https://sievensoftcolombia.com/css/bootstrap.css">
<!-- estilos css-->
<link href="https://sievensoftcolombia.com/css/bootstrap.min.css" rel="stylesheet">
<script src="https://sievensoftcolombia.com/js/jquery-3.2.1.slim.min.js" ></script>
<script src="https://sievensoftcolombia.com/js/popper.min.js" ></script>
<script src="https://sievensoftcolombia.com/js/bootstrap.js"></script>
<link href="https://sievensoftcolombia.com/font/icon.css"  rel="stylesheet">
</head>

    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">

   

    <meta charset="utf-8">

    <title>Ver Cliente</title>

    

  </head>
 
 
<?php
        
            $clienteId = $_GET['clienteId']; 
            $usuarioId = $_GET['Us'];



$host='localhost';
$userdb='ssoftcol_root';
$pass2='5qA?o]t6d-h2';
$DB='ssoftcol_sistema';

$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

                  $queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id=$clienteId");
                  $nrowl=mysqli_num_rows($queryList);
                  while($rowMotorizado=mysqli_fetch_array($queryList))

                  {
   

        /*    ///consulta de la tabla usuarios
            $queryMotorizado = "SELECT * FROM  cliente where cliente_id=$clienteId";
            $resultadoMotorizado = mysqli_query($con, $queryMotorizado) or die(mysqli_error());
            $rowMotorizado= mysqli_fetch_assoc($resultadoMotorizado);
*/
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
          }

        ?>
 
      <div class="card" style="width: 100%; margin-left: auto; margin-right: auto;">


 


          <?php 
echo '  <a href="consultaQuirurgica.php?clienteId='.$clienteId.'" title="Ver Historia" class="btn btn-default">  Regresar</a>   ';

          ?> 
          <a href='javascript:window.print(); void 0;'  class="btn btn-default"><i class="fa fa-print"></i> Imprimir</a>
        <div class="card-body">
           <div class="form-row">


          
          <h4 class="card-title">Cliente</h4>
          <h6 class="card-subtitle mb-2 text-muted"></h6>
                                                                                               
            
              <div class="col-md-6">
                 <input type="hidden" id="clienteId" name="usuario_id" value="<?php echo $usuario_id;?>" required>
                 <input type="hidden" id="usuarioId" name="usuarioId" value="<?php echo $usuarioId;?>" required>

                <label for="nombre" class="col-form-label"><strong>Correo:</strong></label>
                <label for="nombre" class="col-form-label"> <?php echo $correo_cliente;?>  </label>
              </div>

              <div class="col-md-6">
                <label for="inputPassword4" class="col-form-label"><strong>Nombre:</strong></label>
                 <label for="nombre" class="col-form-label"><?php echo $nombre_cliente;?> </label>
              </div>

              <div class="col-md-6">
                <label for="inputAddress" class="col-form-label"><strong>Celular:</strong></label>
                <label for="nombre" class="col-form-label"><?php echo $CODI_CLIENTE;?></label>
              </div>
               <div class="col-md-6">
                <label for="inputAddress" class="col-form-label"><strong>Ciudad:</strong></label>
                <label for="nombre" class="col-form-label"><?php echo $ciudad_cliente;?></label>
              </div>
               <div class="col-md-6">
                <label for="inputAddress" class="col-form-label"><strong>Fecha Registro:</strong></label>
                <label for="nombre" class="col-form-label"><?php echo $fechar;?></label>
              </div>
               <div class="col-md-6">
                <label for="inputAddress" class="col-form-label"><strong>Genero:</strong></label>
                <label for="nombre" class="col-form-label"><?php echo $genero;?></label>
              </div>
       
               <div class="col-md-6">
                <label for="inputAddress" class="col-form-label"><strong>  Direccion Cliente:</strong></label>
                <label for="nombre" class="col-form-label"><?php echo $direccion_cliente ;?></label>
              </div>
               <div class="col-md-6">
                <label for="inputAddress" class="col-form-label"><strong> Telefono :</strong></label>
                <label for="nombre" class="col-form-label"><?php echo $telefono_cliente ;?></label>
              </div>
               <div class="col-md-6">
                <label for="inputAddress" class="col-form-label"><strong> Edad :</strong></label>
                <label for="nombre" class="col-form-label"><?php echo $edad_cliente ;?></label>
              </div>
               <div class="col-md-6">
                <label for="inputAddress" class="col-form-label"><strong> Profesion :</strong></label>
                <label for="nombre" class="col-form-label"><?php echo $profesion_cliente ;?></label>
              </div>
               <div class="col-md-12">
                <label for="inputAddress" class="col-form-label"><strong>Antecedentes  :</strong></label>
                <label for="nombre" class="col-form-label"><?php echo $antecedentes;?></label>
              </div>
               
            </div>
          
          
  
          
          
          
          
          
   <div id="accordion" role="tablist" aria-multiselectable="true">
  <div class="card">
    <div class="card-header" role="tab" id="headingOne">
      <h5 class="mb-0">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Historia  Clinica   
        </a>
      </h5>
    </div>

<div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
<div class="card-block">



 <div class="form-row">
 




 

           <h3>
            
           </h3>
                    <?php 
             
                 
                  $queryList=mysqli_query($conn3,"SELECT * FROM  historiaClinica_Quirurgica where cliente_id = $clienteId and usuario_id = $usuarioId order by ID DESC");

              

                  
                  while ($nrowl=mysqli_fetch_assoc($queryList)) { 
                

                  $ID=$nrowl['ID'];
                  $Fecha=$nrowl['Fecha'];
                  $hora_inicio=$nrowl['hora_inicio'];
                  $hora_finaliza=$nrowl['hora_finaliza'];
                  $n_sala=$nrowl['n_sala'];
                  $cirujano=$nrowl['cirujano'];
                  $ayudante=$nrowl['ayudante'];
                  $anestesiologo=$nrowl['anestesiologo'];
                  $tipo_anestesia=$nrowl['tipo_anestesia'];
                  $instrumentador=$nrowl['instrumentador'];
                  $circulante=$nrowl['circulante'];
                  $prodecimiento_quirurgico=$nrowl['prodecimiento_quirurgico'];
                  $hallazgo_quirurgicos=$nrowl['hallazgo_quirurgicos'];
                  $descripcion_quirurgica=$nrowl['descripcion_quirurgica'];
                  $sangrado=$nrowl['sangrado'];
                  $complicaciones=$nrowl['complicaciones'];
                  $observaciones=$nrowl['observaciones'];
                  $patologia=$nrowl['patologia'];
                  $tejido=$nrowl['tejido'];    
                      
                     ?>



               <hr align="center" size="10" width="100%" color="#000000">
                
               <div align="right"  class="col-md-12">
                Fecha <?php echo $Fecha .'-'.$Hora?>
               </div>
               
<div align="center"> Procedimientos Quiúrgicos   </div>
            
               
                          <div class="col-md-12">
                          <label>Hora Inicio :</label>
                          <label>  <?php echo $hora_inicio?></label>
                           
                          </div>

                          <div class="col-md-12">
                          <label>Hora Finalización :</label>
                          <label>  <?php echo $hora_finaliza?></label>
                           
                          </div>

                          <div class="col-md-12">
                          <label>N° Sala :</label>
                          <label>  <?php echo $n_sala?></label>
                           
                          </div>

                          <div class="col-md-12">
                          <label>Cirujano :</label>
                          <label>  <?php echo $cirujano?></label>
                           
                          </div>


                          <div class="col-md-12">
                          <label>Ayudante :</label>
                          <label>  <?php echo $ayudante?></label>
                           
                          </div>

                          <div class="col-md-12">
                          <label>Anestesiólogo :</label>
                          <label>  <?php echo $anestesiologo?></label>
                           
                          </div>

                          <div class="col-md-12">
                          <label>Tipo de Anestesia :</label>
                          <label>  <?php echo $tipo_anestesia?></label>
                           
                          </div>

                          <div class="col-md-12">
                          <label>Instrumentador :</label>
                          <label>  <?php echo $instrumentador?></label>
                           
                          </div>

                          <div class="col-md-12">
                          <label>Circulante :</label>
                          <label>  <?php echo $circulante?></label>
                           
                          </div>

                          <div class="col-md-12">
                          <label>Procedimiento(s) Quirúrgico(s) :</label>
                          <label>  <?php echo $prodecimiento_quirurgico?></label>
                           
                          </div>

                          <div class="col-md-12">
                          <label>Hallazgos Intraoperatorios :</label>
                          <label>  <?php echo $hallazgo_quirurgicos?></label>
                           
                          </div>

                          <div class="col-md-12">
                          <label>Descripción Quirúrgica :</label>
                          <label>  <?php echo $descripcion_quirurgica?></label>
                           
                          </div>

                          <div class="col-md-12">
                          <label>Sangrado estimado :</label>
                          <label>  <?php echo $sangrado?></label>
                           
                          </div>

                          <div class="col-md-12">
                          <label>Complicaciones :</label>
                          <label>  <?php echo $complicaciones?></label>
                           
                          </div>

                          <div class="col-md-12">
                          <label>Observaciones :</label>
                          <label>  <?php echo $observaciones?></label>
                           
                          </div>

                          <div class="col-md-12">
                          <label>Patología :</label>
                          <label>  <?php echo $patologia?></label>
                           
                          </div>

                          <div class="col-md-12">
                          <label>Tejido :</label>
                          <label>  <?php echo $tejido?></label>
                           
                          </div>
                        
                          <hr>



<div align="center"> Diagnosticos Iniciales CIE-10   </div>


                  
                          <?php 
                          $cie1=mysqli_query($conn3,"SELECT * FROM  historiaClinica9_Quirurgico_Cie10 as hq, cie10 as ci where hq.cliente_id = $clienteId and hq.historiaClinica9_id= $ID and hq.usuario_id = $usuarioId and hq.codigo=ci.codigo order by hq.ID_Cie10 DESC");
                          while ($whi=mysqli_fetch_assoc($cie1)) { ?>

                          <div >
                          <label>Codigo :</label>
                          <label><?php echo $whi['codigo'];?></label>
                           
                          </div>
                          <div >
                          <label>Descripción :</label>
                          <label><?php echo $whi['descripcion'];?></label>
                           
                          </div>
                            
                        <?php  }  ?>






               
            <?php }  ?>

              </div>
              <!-- /.tab-pane -->
            
           
      
      </div>
    </div>
  </div>
  
  
  
    
  
</div>

          
         

 