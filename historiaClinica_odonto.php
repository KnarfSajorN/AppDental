<?php
   include 'header.php';
   include 'menu.php';

$cliente_odonto_id = $_GET['cliente_odonto_id'];
$pzs = $_GET['pzs'];



   

 $ID = $_SESSION['ID'];


        $conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));


                  $queryList=mysqli_query($conn3,"SELECT * FROM  cliente_odonto where cliente_odonto_id=$cliente_odonto_id");
                  $nrowl=mysqli_num_rows($queryList);
                  while($rowMotorizado=mysqli_fetch_array($queryList))
                  {

                    $nombre_cliente=$rowMotorizado['nombre_cliente_odonto'];
                    $celular_cliente=$rowMotorizado['celular_cliente_odonto'];
                    $ciudad_cliente=$rowMotorizado['ciudad_cliente_odonto'];
                    $correo_cliente=$rowMotorizado['correo_cliente_odonto'];
                    $CODI_CLIENTE=$rowMotorizado['CODI_cliente_odonto'];
                    $tipo_cliente=$rowMotorizado['tipo_cliente_odonto'];
                    $fechar=$rowMotorizado['fechar'];
                    $activo=$rowMotorizado['activo'];
                    $genero=$rowMotorizado['genero'];
                    $entidadSalud=$rowMotorizado['entidadSalud'];
                    $direccion_cliente_odonto=$rowMotorizado['direccion_cliente_odonto'];
                    $celular_cliente_odonto=$rowMotorizado['celular_cliente_odonto'];
                    $fechaNacimiento=$rowMotorizado['fechaNacimiento'];
                    $telefono_cliente=$rowMotorizado['telefono_cliente_odonto'];
                    $tiposSangre=$rowMotorizado['tiposSangre'];
                    $telefono_acompanante=$rowMotorizado['telefono_acompanante'];
                    $acompananteFamiliar=$rowMotorizado['acompananteFamiliar'];
                    $parentesco_acompanante=$rowMotorizado['parentesco_acompanante'];
                    $profesion_cliente_odonto=$rowMotorizado['profesion_cliente_odonto'];
                    $edad_cliente_odonto=$rowMotorizado['edad_cliente_odonto'];
                    $nota=$rowMotorizado['nota'];
                    $alergias=$rowMotorizado['alergias'];
                    $antecedentes=$rowMotorizado['antecedentes'];
                    $motivo_consulta=$rowMotorizado['motivo_consulta'];
                    $seguro=$rowMotorizado['seguro'];
                    $tomamedicamento1=$rowMotorizado['tomamedicamento1'];


        }

      ?>
     

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Consulta médica 
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
        <li><a href="#"> Consulta médica </a></li>
        

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
 

          <div class="box">
         
            <!-- /.box-header -->
            <div class="box-body">


  <div class="col-md-12">




        <select name="tipoConsulta" class="form-control select2" style="width: 100%;">
          <option selected="selected" value="">Seleccione tipo de consulta</option>
          <option>Consulta externa</option>
          <option>Urgencia</option>
          <option>Ambulatorio </option>
        </select>





          <div class="box box-solid">
             
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box-group" id="accordion1">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion1" href="#collapseOne">
                        Datos personales 
                      </a>
                    </h4>
                  </div>
                  <div id="collapseOne" class="panel-collapse collapse">
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
                <label><?php echo $direccion_cliente_odonto ;?></label>
             <br>
                <label><strong> Teléfono :</strong></label>
                <label><?php echo $telefono_cliente ;?></label>
                <br>
                
                <label><strong> Fecha de nacimiento :</strong></label>
                <label><?php echo $fechaNacimiento;?></label>
                
                   <br>


                <label><strong> Edad :</strong></label>
                <label><?php echo $edad_cliente_odonto;?></label>
                
                 <br>

                  <label><strong>Genero:</strong></label>
                  <label><?php echo $genero;?></label>

               <br>
                  <label><strong>Profesión :</strong></label>
                  <label><?php echo $profesion_cliente_odonto ;?></label>

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
              <input type="button" class="btn btn-block btn-primary btn-sm" value="Historial consultas" 
              onclick="javascript:window.open('consultaHistoriaMedica.php?tipo=<?php echo $clienteId?>&ID=<?php echo $ID?>','','width=600,height=400,left=50,top=50,toolbar=yes');" />
 
              </div>  
<br>


              <div class="col-md-12">
<hr>  
</div>
              <div class="col-md-12">
              <div class="col-md-12">

                <label><strong>Toma algún medicamento:</strong></label>
                <label><?php echo $tomamedicamento1 ;?></label>   
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

              </div><hr>


              <div class="row">
                      <div class="col-md-4">
                        <label class="control-label" for="inputSuccess">Nombre acompañante:</label>
                        <div class="form-group has-success">
                          <input type="text" class="form-control" value="<?php echo $acompananteFamiliar; ?>"  disabled id="inputSuccess" placeholder="">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <label class="control-label" for="inputSuccess">Parentesco:</label>
                        <div class="form-group has-success">
                          <input type="text" class="form-control" value="<?php echo $parentesco_acompanante; ?>"  disabled id="inputSuccess" placeholder="">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <label class="control-label" for="inputSuccess">Teléfono:</label>
                        <div class="form-group has-success">
                          <input type="text" class="form-control" value="<?php echo $telefono_acompanante; ?>" disabled  id="inputSuccess" placeholder="">
                        </div>
                      </div>
                    </div>
                       <div class="row">
                        <div class="col-md-12">
                          <div class="form-group has-purple">
                            <label>Motivo de Consulta</label>
                            <textarea class="form-control" rows="3" placeholder="Enter ..." style="border:1px solid purple" disabled ><?php echo $motivo_consulta; ?></textarea>
                          </div>
                        </div>  
                      </div> 

            
 



                    </div>
                  </div>
                </div>

 <form action="guardar_histo_donto.php" method="POST" name="formularioActualizarcliente">




































<!--  *******************************  QUIRURGICO  **************************** -->  
<!--  *******************************  QUIRURGICO  **************************** -->  
<!--  *******************************  QUIRURGICO  **************************** -->  
<!--  *******************************  QUIRURGICO  **************************** -->  
<!--  *******************************  QUIRURGICO  **************************** -->  
<!--  *******************************  QUIRURGICO  **************************** -->  
<!--  *******************************  QUIRURGICO  **************************** -->  
<!--  *******************************  QUIRURGICO  **************************** -->  
<!--  *******************************  QUIRURGICO  **************************** -->   







<div class="row">
        <div class="col-md-12">
          <div class="box box-solid">
            
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box-group" id="accordion">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne11">
                        Datos Entrevista
                      </a>
                    </h4>
                  </div>
                  <div id="collapseOne11" class="panel-collapse collapse">
                     <div class="box-body">
                        <div class="row">

                          <div class="col-md-3">
                              <img src='oG0/<?php echo $pzs;?>.png' width="40" height="80" >Pieza N° <?php echo $pzs;?>
                          </div>

                          <div class="col-md-3">
                            <label>Tipo de Servicio : </label>
                                    <select name="tipoConsulta" class="form-control select2"  style="width: 100%;">
                                  <option value="" disabled selected>Seleccionar</option>

                                   <?php $list=mysqli_query($conn3,"SELECT * FROM  servicios_odonto ");
                                        
                                        while($servicio=mysqli_fetch_assoc($list))
                                        {?>
                                          <option value="<?php echo $servicio['id']; ?>"><?php echo $servicio['detalle']; ?></option>
                                <?php } ?>       

                                </select>
                            </div>
                          
                            <div class="col-md-6">
                              <label>Partes a Tratar :</label> <br>
                              <div class="form-group col-md-12" >
                                  <input value="1" type="checkbox" name="p_inferior" id="lt" class="flat-red"/> Parte Inferior  |&nbsp;&nbsp;
                                  <input value="1" type="checkbox" name="p_superior" id="lt" class="flat-red"/> Parte Superior  |&nbsp;&nbsp;
                                  <input value="1" type="checkbox" name="p_frontal" id="lt" class="flat-red"/> Parte Fronta  <br style="margin-top: 2%;"> 
                                  <input value="1" type="checkbox" name="c_izquierdo" id="lt" class="flat-red"/> Costado Izquierdo |&nbsp;  &nbsp;
                                  <input value="1" type="checkbox" name="c_derecho" id="lt" class="flat-red"/> Costado Derecho   |&nbsp;&nbsp;
                                  <input value="1" type="checkbox" name="completa" id="lt" class="flat-red"/> Completa   
                              </div>
                              
                            </div>


                           
                        
                        </div>
                    <div class="row">
                      <div class="col-md-6">
                        <label class="control-label" for="inputSuccess">Tratamiento :</label>
                        <div class="form-group has-success">
                          <input type="text" class="form-control" name="tratamiento"  id="inputSuccess" placeholder="">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <label class="control-label" for="inputSuccess">Detalles del Tratamiento:</label>
                        <div class="form-group has-success">
                          <input type="text" class="form-control" name="detalle_tra"  id="inputSuccess" placeholder="">
                        </div>
                      </div>
                      
                    </div>








                      </div>


                  </div>
                </div>

                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                       Examen de Tejidos Blandos
                      </a>
                    </h4>
                  </div>
                  <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="box-body">
                   

                    <div class="row">
                      <div class="col-md-3">
                        <label class="control-label" for="inputSuccess">Lengua:</label>
                        <div class="form-group has-success">
                          <input type="text" class="form-control" id="inputSuccess" placeholder="" name="lengua">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <label class="control-label" for="inputSuccess">Carillos:</label>
                        <div class="form-group has-success">
                          <input type="text" class="form-control" id="inputSuccess" placeholder="" name="carillos">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <label class="control-label" for="inputSuccess">Mucosa Labial:</label>
                        <div class="form-group has-success">
                          <input type="text" class="form-control" id="inputSuccess" placeholder="" name="mucosa">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <label class="control-label" for="inputSuccess">Piso de Boca:</label>
                        <div class="form-group has-success">
                          <input type="text" class="form-control" id="inputSuccess" placeholder="" name="piso_boca">
                        </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-3">
                        <label class="control-label" for="inputSuccess">Paladar Duro:</label>
                        <div class="form-group has-success">
                          <input type="text" class="form-control" id="inputSuccess" placeholder="" name="paladar_dura">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <label class="control-label" for="inputSuccess">Paladar Blando:</label>
                        <div class="form-group has-success">
                          <input type="text" class="form-control" id="inputSuccess" placeholder="" name="paladar_blando">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <label class="control-label" for="inputSuccess">Frenillo:</label>
                        <div class="form-group has-success">
                          <input type="text" class="form-control" id="inputSuccess" placeholder="" name="frenillo">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <label class="control-label" for="inputSuccess">Área Amigdalina:</label>
                        <div class="form-group has-success">
                          <input type="text" class="form-control" id="inputSuccess" placeholder="" name="amigdalina">
                        </div>
                      </div>
                  </div>

                    <div class="row">
                      <div class="col-md-3">
                        <label class="control-label" for="inputSuccess">Oro-Faringe:</label>
                        <div class="form-group has-success">
                          <input type="text" class="form-control" id="inputSuccess" placeholder="" name="faringe">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <label class="control-label" for="inputSuccess">Encía:</label>
                        <div class="form-group has-success">
                          <input type="text" class="form-control" id="inputSuccess" placeholder="" name="encia">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <label class="control-label" for="inputSuccess">Biotipo Periodontal:</label>
                        <div class="form-group has-success">
                          <input type="text" class="form-control" id="inputSuccess" placeholder="" name="periodontal">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <label class="control-label" for="inputSuccess">Papilas Interdentales:</label>
                        <div class="form-group has-success">
                          <input type="text" class="form-control" id="inputSuccess" placeholder="" name="interdentales">
                        </div>
                      </div>
                  </div>

                    <div class="row">
                      <div class="col-md-3">
                        <label class="control-label" for="inputSuccess">Inserción de Frenillos:</label>
                        <div class="form-group has-success">
                          <input type="text" class="form-control" id="inputSuccess" placeholder="" name="insercion_frenillos">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <label class="control-label" for="inputSuccess">Permeabilidad de Glándulas salivales:</label>
                        <div class="form-group has-success">
                          <input type="text" class="form-control" id="inputSuccess" placeholder="" name="glandulas_salivales">
                        </div>
                      </div>
                    </div>
   
                    </div>
                  </div>
                </div>


                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                       Examen Dental
                      </a>
                    </h4>
                  </div>
                  <div id="collapseThree" class="panel-collapse collapse">
                    <div class="box-body">
                      <div class="row">
                          <div class="col-md-3">
                            <label class="control-label" for="inputSuccess">Tipo de dentición:</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="" name="denticion">
                            </div>
                          </div>
                          <div class="col-md-3">
                            <label class="control-label" for="inputSuccess">Dientes en erupción:</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="" name="dientes_erupcion">
                            </div>
                          </div>
                          <div class="col-md-3">
                            <label class="control-label" for="inputSuccess">Dientes ausentes:</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="" name="dientes_ausentes">
                            </div>
                          </div>
                          <div class="col-md-3">
                            <label class="control-label" for="inputSuccess">Presencia de fracturas dentales:</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="" name="fracturas_dentales">
                            </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-3">
                            <label class="control-label" for="inputSuccess">Pérdida de la integridad dental:</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="" name="intregridad_dental">
                            </div>
                          </div>
                          <div class="col-md-3">
                            <label class="control-label" for="inputSuccess">Otras anomalías de esmalte:</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="" name="anomalias_esmalte">
                            </div>
                          </div>
                          <div class="col-md-3">
                            <label class="control-label" for="inputSuccess">Movilidad dental:</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="" name="movilidad_dental">
                            </div>
                          </div>
                          <div class="col-md-3">
                            <label class="control-label" for="inputSuccess">Anomalías dentarias de número:</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="" name="dentarias_numero">
                            </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-3">
                            <label class="control-label" for="inputSuccess">Anomalías dentarias de forma:</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="" name="dentarias_forma">
                            </div>
                          </div>
                          <div class="col-md-3">
                            <label class="control-label" for="inputSuccess">Anomalías dentarias de posición:</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="" name="dentarias_posicion">
                            </div>
                          </div>
                          <div class="col-md-3">
                            <label class="control-label" for="inputSuccess">Anomalías dentarias de tamaño:</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="" name="dentaria_tamanno">
                            </div>
                          </div><!--
                          <div class="col-md-3">
                            <label class="control-label" for="inputSuccess">Anomalías dentarias de tamaño:</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="" name="dentarias_tamannno">
                            </div>
                          </div>-->
                      </div> 
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group has-purple">
                            <label>Observaciones</label>
                            <textarea class="form-control" rows="3" name="obs_dental" placeholder="Enter ..." style="border:1px solid purple"></textarea>
                          </div>
                        </div>  
                      </div> 
                        
                    </div>
                  </div>
                </div>





                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                      Examen Inter-Arco
                      </a>
                    </h4>
                  </div>
                  <div id="collapse4" class="panel-collapse collapse">
                    <div class="box-body">
                        



  
                    <h4>Relaciones Sagitales</h4>
               
                        <div class="col-md-12">
                            <label class="control-label" for="inputSuccess">Overjet:</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" name="Overjet" id="inputSuccess" placeholder="">
                            </div>
                        </div>
                        <table width="100%" >
                          <tr>
                            <td align="center"><strong>Parámetro</strong></td>
                            <td align="center"><strong>Derecha</strong></td>
                            <td align="center"><strong>Milímetros</strong></td>
                            <td align="center"><strong>Izquierda</strong></td>
                            <td align="center"><strong>Milímetros</strong></td>
                          </tr> 
                          <tr>
                            <td>Relación molar temporal</td>
                            <td style="padding: 2px;"><input  name="relacion_molar_der" type="text" class="form-control" id="inputSuccess" placeholder=""></td>
                            <td style="padding: 2px;"><input  name="relacion_molar_mili" type="text" class="form-control" id="inputSuccess" placeholder=""></td>
                            <td style="padding: 2px;"><input  name="relacion_molar_izq" type="text" class="form-control" id="inputSuccess" placeholder=""></td>
                            <td style="padding: 2px;"><input  name="relacion_molar_mili2" type="text" class="form-control" id="inputSuccess" placeholder=""></td>
                          </tr>
                          <tr>
                            <td>Relación molar permanente</td>
                            <td style="padding: 2px;"><input name="relacion_molar_per_der" type="text" class="form-control" id="inputSuccess" placeholder=""></td>
                            <td style="padding: 2px;"><input name="relacion_molar_per_mili" type="text" class="form-control" id="inputSuccess" placeholder=""></td>
                            <td style="padding: 2px;"><input name="relacion_molar_per_izq" type="text" class="form-control" id="inputSuccess" placeholder=""></td>
                            <td style="padding: 2px;"><input name="relacion_molar_per_mili2" type="text" class="form-control" id="inputSuccess" placeholder=""></td>
                          </tr>
                          <tr>
                            <td>Relación canina</td>
                            <td style="padding: 2px;"><input name="relacion_canina_der" type="text" class="form-control" id="inputSuccess" placeholder=""></td>
                            <td style="padding: 2px;"><input name="relacion_canina_mili" type="text" class="form-control" id="inputSuccess" placeholder=""></td>
                            <td style="padding: 2px;"><input name="relacion_canina_izq" type="text" class="form-control" id="inputSuccess" placeholder=""></td>
                            <td style="padding: 2px;"><input name="relacion_canina_mili2" type="text" class="form-control" id="inputSuccess" placeholder=""></td>
                          </tr>
                          
                        </table>
                        <div class="col-md-12">
                          <hr style="    color: #3c8dbc;    border: 1px solid;">
                        </div>
                    <h4> Relaciones Verticales</h4>
                    <div class="row">
                    <div class="col-md-3">
                        <label class="control-label" for="inputSuccess">Verbite:</label>
                        <div class="form-group has-success">
                          <input type="text" name="relaciones_verticales" class="form-control" id="inputSuccess" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label class="control-label" for="inputSuccess">Mordida Abierta Anterior:</label>
                        <div class="form-group has-success">
                          <input type="text" name="mordida_abierta_anterior" class="form-control" id="inputSuccess" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label class="control-label" for="inputSuccess">Mordida Abierta Posterior:</label>
                        <div class="form-group has-success">
                          <input type="text" name="mordida_abierta_posterior" class="form-control" id="inputSuccess" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label class="control-label" for="inputSuccess">Unilateral:</label>
                        <div class="form-group has-success">
                          <input type="text" class="form-control" name="unilateral" id="inputSuccess" placeholder="">
                        </div>
                    </div>
                    </div>
                    <div class="row">


                    <div class="col-md-3">
                        <label class="control-label" for="inputSuccess">Bilateral:</label>
                        <div class="form-group has-success">
                          <input type="text" class="form-control" name="bilateral" id="inputSuccess" placeholder="">
                        </div>
                    </div>
                       
                  
                    <div class="col-md-3">
                        <label class="control-label" for="inputSuccess">Derecha (mm):</label>
                        <div class="form-group has-success">
                          <input type="text" class="form-control" name="derecha_mm" id="inputSuccess" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label class="control-label" for="inputSuccess">Izquierda (mm):</label>
                        <div class="form-group has-success">
                          <input type="text" class="form-control" name="izquierda_mm" id="inputSuccess" placeholder="">
                        </div>
                    </div>
                  </div>


                    <h4> Relaciones Transversales</h4>
                    <div class="row">
                      <div class="col-md-6">
                          <label class="control-label" for="inputSuccess">Línea media superior (respecto a la línea media facial):</label>
                          <div class="form-group has-success">
                            <input type="text" class="form-control" name="relaciones_transversales" id="inputSuccess" placeholder="">
                          </div>
                      </div>

                      <div class="col-md-6">
                          <label class="control-label" for="inputSuccess">Línea media inferior (respecto a la línea media facial):</label>
                          <div class="form-group has-success">
                            <input type="text" class="form-control" id="inputSuccess" name="linea_media_inferior" placeholder="">
                          </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="control-label" for="inputSuccess">Presencia de mordida cruzada posterior:</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" name="precsencia_mordida_cruda" id="inputSuccess" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="control-label" for="inputSuccess">Unilateral:</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" name="unilateral_mordida_cruzada" placeholder="">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label class="control-label" for="inputSuccess">Bilateral:</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" name="bilateral_mordida_cruzada"  placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="control-label" for="inputSuccess">Presencia de mordida en tijera:</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess"  name="mordida_tijera" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="control-label" for="inputSuccess">Unilatera:</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess"  name="unilateral_mordida_tijera" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="control-label" for="inputSuccess">Bilateral:</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" name="bilateral_mordida_tijera" placeholder="">
                            </div>
                        </div>
                    </div>
                    </div>
                  </div>
                </div>





                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">
                      Examen Intra-Arco:
                      </a>
                    </h4>
                  </div>
                  <div id="collapse5" class="panel-collapse collapse">
                    <div class="box-body">
                        


  
                    <h4>1. Forma de Arco</h4><br>

                        <table width="100%">
                          <tr>
                            <td align="center" style="background-color: #65a7ce;color: white;padding: 5px;font: 16px;">Arco</td>
                            <td align="center" style="background-color: #65a7ce;color: white;padding: 5px;font: 16px;">Ovalado</td>
                            <td align="center" style="background-color: #65a7ce;color: white;padding: 5px;font: 16px;">Triangular</td>
                            <td align="center" style="background-color: #65a7ce;color: white;padding: 5px;font: 16px;">Cuadrado</td>
                          </tr> 
                          <tr>
                            <td align="center" style="background-color: #65a7ce;color: white;padding: 5px;font: 16px;">Superior</td>
                            <td style="padding: 1%;"><input name="f_arco_s_ovalado" type="text" class="form-control" id="inputSuccess" placeholder=""></td>
                            <td style="padding: 1%;"><input name="f_arco_s_trianglar" type="text" class="form-control" id="inputSuccess" placeholder=""></td>
                            <td style="padding: 1%;"><input name="f_arco_s_cuadrado" type="text" class="form-control" id="inputSuccess" placeholder=""></td>
                          </tr>
                          <tr>
                            <td align="center" style="background-color: #65a7ce;color: white;padding: 5px;font: 16px;">Inferior</td>
                            <td style="padding: 1%;"><input name="f_arco_i_ovalado" type="text" class="form-control" id="inputSuccess" placeholder=""></td>
                            <td style="padding: 1%;"><input name="f_arco_i_trianglar" type="text" class="form-control" id="inputSuccess" placeholder=""></td>
                            <td style="padding: 1%;"><input name="f_arco_i_cuadrado" type="text" class="form-control" id="inputSuccess" placeholder=""></td>
                          </tr>
                          
                        </table>
                      <br>
                    <h4>2. Anomalías de espacio</h4><br>
                        <table width="100%">
                          <tr>
                            <td align="center" style="background-color: #65a7ce;color: white;padding: 5px;font: 16px;">Parámetro</td>
                            <td align="center" style="background-color: #65a7ce;color: white;padding: 5px;font: 16px;">Cuadrante I</td>
                            <td align="center" style="background-color: #65a7ce;color: white;padding: 5px;font: 16px;">Cuadrante II</td>
                            <td align="center" style="background-color: #65a7ce;color: white;padding: 5px;font: 16px;">Cuadrante III</td>
                            <td align="center" style="background-color: #65a7ce;color: white;padding: 5px;font: 16px;">Cuadrante IV</td>
                          </tr> 
                          <tr>
                            <td align="center" style="background-color: #65a7ce;color: white;padding: 5px;font: 16px;">Apiñamiento</td>
                            <td style="padding: 1%;"><input name="anomalias_espacio_apinamiento_cuad_i" type="text" class="form-control" id="inputSuccess" placeholder=""></td>
                            <td style="padding: 1%;"><input name="anomalias_espacio_apinamiento_cuad_ii" type="text" class="form-control" id="inputSuccess" placeholder=""></td>
                            <td style="padding: 1%;"><input name="anomalias_espacio_apinamiento_cuad_iii" type="text" class="form-control" id="inputSuccess" placeholder=""></td>
                            <td style="padding: 1%;"><input name="anomalias_espacio_apinamiento_cuad_iv" type="text" class="form-control" id="inputSuccess" placeholder=""></td>
                          </tr>
                          <tr>
                            <td align="center" style="background-color: #65a7ce;color: white;padding: 5px;font: 16px;">Espaciamiento</td>
                            <td style="padding: 1%;"><input  name="anomalias_espacio_espaciamiento_cuad_i" type="text" class="form-control" id="inputSuccess" placeholder=""></td>
                            <td style="padding: 1%;"><input  name="anomalias_espacio_espaciamiento_cuad_ii" type="text" class="form-control" id="inputSuccess" placeholder=""></td>
                            <td style="padding: 1%;"><input  name="anomalias_espacio_espaciamiento_cuad_iii" type="text" class="form-control" id="inputSuccess" placeholder=""></td>
                            <td style="padding: 1%;"><input  name="anomalias_espacio_espaciamiento_cuad_iv" type="text" class="form-control" id="inputSuccess" placeholder=""></td>
                          </tr>
                          
                        </table>
                      <br>
                    <h4>3.  Análisis de simetría</h4><br>
                        <table width="100%">
                          <tr>
                            <td align="center" width="135"  style="background-color: #65a7ce;color: white;padding: 5px;font: 16px;">Parámetro</td>
                            <td align="center" style="background-color: #65a7ce;color: white;padding: 5px;font: 16px;">Si </td>
                            <td align="center" style="background-color: #65a7ce;color: white;padding: 5px;font: 16px;">No</td>
                            <td align="center" style="background-color: #65a7ce;color: white;padding: 5px;font: 16px;">Hallazgo</td>
                          </tr> 
                          <tr>
                            <td align="center" width="135"  style="background-color: #65a7ce;color: white;padding: 2px;font: 16px;">Sagital Superior</td>
                            <td style="padding: 1%;" align="center">
                              <input type="radio" name="analisis_simetria_sagi_supe_" class="minimal-red" value="Si"  style="position: absolute; opacity: 0;">
                            </td>
                            <td style="padding: 1%;" align="center">
                              <input type="radio" name="analisis_simetria_sagi_supe_" class="minimal-red" value="No"  style="position: absolute; opacity: 0;">
                            </td>
                            <td style="padding: 1%;"><input name="analisis_simetria_sagi_supe_hallazgo" type="text" class="form-control" id="inputSuccess" placeholder=""></td>
                          </tr>
                          <tr>
                            <td align="center" width="135"  style="background-color: #65a7ce;color: white;padding: 2px;font: 16px;">Transversal Superior</td>
                            <td style="padding: 1%;" align="center">
                              <input type="radio"  name="analisis_simetria_transver_supe_"  class="minimal-red" value="Si"  style="position: absolute; opacity: 0;">
                            </td>
                            <td style="padding: 1%;" align="center">
                              <input type="radio"  name="analisis_simetria_transver_supe_"  class="minimal-red"  value="No" style="position: absolute; opacity: 0;">
                            </td>
                            <td style="padding: 1%;"><input  name="analisis_simetria_transver_hallazgo" type="text" class="form-control" id="inputSuccess" placeholder=""></td>
                          </tr>
                          <tr>
                            <td align="center" width="135"  style="background-color: #65a7ce;color: white;padding: 2px;font: 16px;">Sagital Inferior</td>
                            <td style="padding: 1%;" align="center">
                              <input type="radio"  name="analisis_simetria_sagi_infer_" class="minimal-red"  value="Si" style="position: absolute; opacity: 0;">
                            </td>
                            <td style="padding: 1%;" align="center">
                              <input type="radio"  name="analisis_simetria_sagi_infer_" class="minimal-red"  value="No" style="position: absolute; opacity: 0;">
                            </td>
                            <td style="padding: 1%;"><input name="analisis_simetria_sagi_infer_hallazgo" type="text" class="form-control" id="inputSuccess" placeholder=""></td>
                          </tr>
                          <tr>
                            <td align="center" width="135"  style="background-color: #65a7ce;color: white;padding: 2px;font: 16px;">Transversal Inferior</td>
                            <td style="padding: 1%;" align="center">
                              <input type="radio"  name="analisis_simetria_transver_infer_"  class="minimal-red"  value="Si" style="position: absolute; opacity: 0;">
                            </td>
                            <td style="padding: 1%;" align="center">
                              <input type="radio"  name="analisis_simetria_transver_infer_" class="minimal-red" value="No"  style="position: absolute; opacity: 0;">
                            </td>
                            <td style="padding: 1%;"><input name="analisis_simetria_transver_infer_hallazgo" type="text" class="form-control" id="inputSuccess" placeholder=""></td>
                          </tr>
                          
                        </table>
                      <br>



                    </div>
                  </div>
                </div>




                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse6">
                      Analisis del Paladar
                      </a>
                    </h4>
                  </div>
                  <div id="collapse6" class="panel-collapse collapse">
                    <div class="box-body">

        
                      <div class="row">
                          <div class="col-md-4">
                            <label class="control-label" for="inputSuccess">Anchura posterior del paladar:</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" name="anchura_p_paladar" id="inputSuccess" placeholder="">
                            </div>
                          </div>
                          <div class="col-md-4">
                            <label class="control-label" for="inputSuccess">Altura del paladar:</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" name="altura_paladar" id="inputSuccess" placeholder="">
                            </div>
                          </div>
                          <div class="col-md-4">
                            <label class="control-label" for="inputSuccess">Índice de Korkhaus:</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" name="indice_korhaus" id="inputSuccess" placeholder="">
                            </div>
                          </div>
                      </div> <hr style="    color: #3c8dbc;    border: 1px solid;">
                  <h4>Diagnósticos</h4>
                      <div class="row">
                         <div class="col-md-3">
                            <label class="control-label" for="inputSuccess">Asa</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control"  name="asa" id="inputSuccess" placeholder="">
                            </div>
                          </div>
                          <div class="col-md-3">
                            <label class="control-label" for="inputSuccess">Sistématico</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" name="sistematico" id="inputSuccess" placeholder="">
                            </div>
                          </div>  
                          <div class="col-md-3">
                            <label class="control-label" for="inputSuccess">Facial esquelético</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" name="facial_esqueletico" id="inputSuccess" placeholder="">
                            </div>
                          </div>
                          <div class="col-md-3">
                            <label class="control-label" for="inputSuccess">Estomatológico</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" name="estomatologico" id="inputSuccess" placeholder="">
                            </div>
                          </div>
                      
                      </div>
                      <div class="row">
                        <!-- <div class="col-md-3">
                            <label class="control-label" for="inputSuccess">Endodónticos</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="">
                            </div>
                          </div>-->
                          <div class="col-md-3">
                            <label class="control-label" for="inputSuccess">Endodónticos</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" name="endodonticos" id="inputSuccess" placeholder="">
                            </div>
                          </div>  
                         <!-- <div class="col-md-3">
                            <label class="control-label" for="inputSuccess">Endodónticos</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="">
                            </div>
                          </div>-->
                          <div class="col-md-3">
                            <label class="control-label" for="inputSuccess">Funcional</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" name="funcional1" id="inputSuccess" placeholder="">
                            </div>
                          </div>
                      
                      </div>
                      <input type="hidden" name="ClienteID" value="<?php echo $_GET['cliente_odonto_id']; ?>"> 
                      <input type="hidden" name="Pieza" value="<?php echo $_GET['pzs']; ?>"> 
                <hr style="    color: #3c8dbc;    border: 1px solid;">
                  <h4>Pronóstico</h4>
                      <div class="row">
                         <div class="col-md-3">
                            <label class="control-label" for="inputSuccess">Individual</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" name="pron_individual" id="inputSuccess" placeholder="">
                            </div>
                          </div>
                          <div class="col-md-3">
                            <label class="control-label" for="inputSuccess">General</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control"  name="pron_general" id="inputSuccess" placeholder="">
                            </div>
                          </div> 
                      
                      </div>
                  <hr style="    color: #3c8dbc;    border: 1px solid;">
                  <h4>Plan de Tratamiento</h4>
                      <div class="row">
                         <div class="col-md-3">
                            <label class="control-label" for="inputSuccess">Fase sistémica</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control"  name="plan_fase_sistematica" id="inputSuccess" placeholder="">
                            </div>
                          </div>
                          <div class="col-md-3">
                            <label class="control-label" for="inputSuccess">Fase de Urgencia</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" name="plan_fase_urgencia"  id="inputSuccess" placeholder="">
                            </div>
                          </div>
                          <div class="col-md-3">
                            <label class="control-label" for="inputSuccess">Fase Higiénica</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" name="plan_fase_higienica"  id="inputSuccess" placeholder="">
                            </div>
                          </div>
                          <div class="col-md-3">
                            <label class="control-label" for="inputSuccess">Ambientación dental</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" name="plan_ambiente_dentral"  id="inputSuccess" placeholder="">
                            </div>
                          </div> 
                      
                      </div>
                      <div class="row">
                         <div class="col-md-3">
                            <label class="control-label" for="inputSuccess">Ambientación Periodontal</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" name="plan_ambiente_periodontal" id="inputSuccess" placeholder="">
                            </div>
                          </div>
                          <div class="col-md-3">
                            <label class="control-label" for="inputSuccess">Fase revaluativa</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" name="plan_fase_revaluativa" id="inputSuccess" placeholder="">
                            </div>
                          </div>
                          <div class="col-md-3">
                            <label class="control-label" for="inputSuccess">Fase correctiva inicial</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" name="plan_fase_correctiva_inicial"  id="inputSuccess" placeholder="">
                            </div>
                          </div>
                          <div class="col-md-3">
                            <label class="control-label" for="inputSuccess">Fase correctiva final</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" name="plan_fase_correctiva_final"  id="inputSuccess" placeholder="">
                            </div>
                          </div> 
                      
                      </div>
                      <div class="row">
                         <!--<div class="col-md-3">
                            <label class="control-label" for="inputSuccess">Fase Revaluativa</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" name="plan_fase_revaluativa2"  id="inputSuccess" placeholder="">
                            </div>
                          </div>-->
                          <div class="col-md-3">
                            <label class="control-label" for="inputSuccess">Fase de mantenimiento</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" name="plan_fase_mantenimiento"  id="inputSuccess" placeholder="">
                            </div>
                          </div>
                      
                      </div>


                    </div>
                  </div>
                </div>

 
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        






 

























































<hr>  
 
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
 <label>Especialista </label>
                <select id="doctor" name="doctor" class="form-control select2" style="width: 100%;" required="required">
                    <option value="<?php echo $_SESSION['username']?>" selected="selected"><?php echo $_SESSION['username']?> </option>
                    <?php
                      usuariosAselect($ID);

                    ?>
                </select>

  </div>

<div class="col-sm-6">
                 
                <br>
                <br>
               <label>
                  <input type="radio" name="P" value="0" class="flat-red" >
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

 
</script>