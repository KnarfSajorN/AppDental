<?php 
  include 'header.php';
  include 'menu.php';
?>

<script type="text/javascript">
  function mostrar(id) 
  {
    if (id == "servicio1") 
    {
      $("#servicio1").show();
      $("#servicio2").hide();
      $("#servicio3").hide();
      $("#servicio4").hide();
      $("#servicio5").hide();
      $("#servicio6").hide();
    }
  
    if (id == "servicio2") 
    {
      $("#servicio1").hide();
      $("#servicio2").show();
      $("#servicio3").hide();
      $("#servicio4").hide();
      $("#servicio5").hide();
      $("#servicio6").hide();
      
    }
  
    if (id == "servicio3") {
      $("#servicio1").hide();
      $("#servicio2").hide();
      $("#servicio3").show();
      $("#servicio4").hide();
      $("#servicio5").hide();
      $("#servicio6").hide();
     
    }

    if (id == "servicio4") 
    {
      $("#servicio1").hide();
      $("#servicio2").hide();
      $("#servicio3").hide();
      $("#servicio4").show();
      $("#servicio5").hide();
      $("#servicio6").hide();
       
    }

    if (id == "servicio5") 
    { 
      $("#servicio1").hide();
      $("#servicio2").hide();
      $("#servicio3").hide();
      $("#servicio4").hide();
      $("#servicio5").show();
      $("#servicio6").hide();
     
    }

    if (id == "servicio6") 
    {
      $("#servicio1").hide();
      $("#servicio2").hide();
      $("#servicio3").hide();
      $("#servicio4").hide();
      $("#servicio5").hide();
      $("#servicio6").show();
      
    }
  }
</script>

<?php

  $clienteId = $_GET['clienteId'];
  $usuarioId = $_GET['usuarioId'];

  $conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

  $queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id=$clienteId");
  $nrowl=mysqli_num_rows($queryList);
  while($rowMotorizado=mysqli_fetch_array($queryList))
  {
    $usuario_id=$rowMotorizado['usuario_id'];
    $nombre_cliente=$rowMotorizado['nombre_cliente'];
    $celular =$rowMotorizado['celular_cliente'];
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
    $fotoperfil=$rowMotorizado['fotoperfil']; 
    $tiposSangre=$rowMotorizado['tiposSangre']; 
    $esDonante=$rowMotorizado['esDonante']; 
    $tomaMedicamento=$rowMotorizado['tomaMedicamento']; 
    
    $fechaNacimiento=$rowMotorizado['fechaNacimiento']; 
 
    $entidadSalud=$rowMotorizado['entidadSalud']; 
    $seguro=$rowMotorizado['seguro']; 
    
    $nota=$rowMotorizado['nota']; 
    $enfermedadesPequeno=$rowMotorizado['enfermedadesPequeno']; 
    $alergias=$rowMotorizado['alergias'];

    $peso=$rowMotorizado['peso']; 
    $altura=$rowMotorizado['altura']; 
    $imc=$rowMotorizado['imc']; 
    $ComposicionCorporal=$rowMotorizado['ComposicionCorporal'];

    $ap1            = $rowMotorizado['ap1'];
    $ap2            = $rowMotorizado['ap2'];
    $ap3            = $rowMotorizado['ap3'];
    $ap4            = $rowMotorizado['ap4'];
    $ap5            = $rowMotorizado['ap5'];
    $ap6            = $rowMotorizado['ap6'];
    $ap7            = $rowMotorizado['ap7'];
    $ap8            = $rowMotorizado['ap8'];
    $ap9            = $rowMotorizado['ap9'];

    $cirugiasCuales = $rowMotorizado['cirugiasCuales'];
    $cirugiasOtros  = $rowMotorizado['cirugiasOtros'];
    $whatsapp       = $rowMotorizado['whatsapp'];
    $tipoUsuario    = $rowMotorizado['tipoUsuario'];
    $estado         = $rowMotorizado['estado'];

  }
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Procedimiento</h1>
    <ol class="breadcrumb">
      <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio </a></li>
      <li><a href="#">Procedimiento</a></li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <!-- /.box-header -->
          <div class="box-body">

            <div class="panel box box-primary">
              <div class="box-header with-border">
                <h4 class="box-title">
                  Datos personales 
                </h4>
              </div>
                  
              <div class="box-body">

                <div class="row">

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
                    <label><strong>Seguro :</strong></label>
                    <label><?php echo $seguro;?></label>
                  </div>

                  <div class="col-md-2">
                    <?php
                      // echo strlen($logoF);
                      if (strlen($fotoperfil) > 0) { 
                      echo '<img src="'.$Base.'/pascientes/'.$fotoperfil.'" width="90%" height="20%">';
                      }
                      else{ echo ''; }
                    ?>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <hr>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <h4 class="card-title">Trabajo Social</h4>
                    <div class="form-group">
                      <select id="status" name="status" class="form-control select2" onChange="mostrar(this.value);" style="width: 80%;">
                        <option >Seleccione tipo...</option>
                        <option value="servicio1">Diagnóstico</option>
                        <option value="servicio2">Valoración</option> 
                        <option value="servicio3">Seguimiento</option> 
                        <option value="servicio4">Terapia Familiar</option>
                        <option value="servicio5">Socioeducativas</option> 
                        
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6" >  
                    <h4 align="right"> <?php echo date("d-m-Y h:m")?> </h4>                                 
                  </div>
                </div>

                <!-- 

                    ECOGRAFÍA OBSTÉTRICA 

                -->
                <div id="servicio1" class="panel box box-secundary element" style="display: none;">
                  <form action="guardarHistoriaTrabajoSocial.php" method="POST" enctype="multipart/form-data">
                    <div class="box-header with-border text-center">
                      <h2 class="box-title">Diagnóstico Trabajo social</h2>
                    </div>
                    <br>
                    <input type="hidden" name="tipo_trabajo"  value="Diagnostico Trabajo Social">

                    
                                              <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID']?>">
 <div class="row">
                      <div class="col-md-2">
                        <div class="form-group">
                          <label class="control-label">Nivel de Estudios</label>
                          <select class="form-control" name="nivel">
                            <option>Seleccione..</option>
                            <option value="Primaria">Primaria</option>
                            <option value="Transverso ">Bachillerato</option>
                            <option value="Transverso ">Universidad</option>
                          </select>
                        </div>
                      </div>
                    

                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">N° de grados o semestres cursados</label>
                          <input type="text" name="grados" class="form-control">
                        </div>
                      </div>
                     

                      
                        <div class="form-group col-md-5">
                          <label class="control-label">Nombre de Acudiente</label>
                          <input class="form-control" type="text"  name="acudiene" >
                        </div>
                        <div class="form-group col-md-2">
                          <label class="control-label">Telefono</label>
                          <input class="form-control" type="text" name="tel" >
                        </div>
                      </div>

                                             <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b> Origenes del Consumo </b></label>
                                                  <textarea class="form-control"  name="origen" rows="5" placeholder="Describa por que cree usted que su familiar llegó al consumo de drogas 
                                                  A nivel Familiar 
                                                  A nivel Personal
                                                  A nivel Social"></textarea>
                                                </div>
                                            </div>
                                        </div>


 <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>¿ Cuando consideró que el consumo de drogas era un problema? </b></label>
                                                  <textarea class="form-control"  name="problema" rows="3" ></textarea>
                                                </div>
                                            </div>
                                        </div>

<div class="row" align="center">
                                            
                                                  <label><b> Ciclo Vital Individual </b></label>
                                              
                                        </div>


<div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">Embarazo</label>
                          <input type="text" name="embarazo" class="form-control">
                        </div>
                      </div>

<div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">Lactancia</label>
                          <input type="text" name="lactancia" class="form-control">
                        </div>
                      </div>

<div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">Aspectos relevantes de la infancia</label>
                          <input type="text" name="aspectos" class="form-control">
                        </div>
                      </div>
<div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">Aspectos relevantes de la Adolescencia</label>
                          <input type="text" name="aspectos2" class="form-control">
                        </div>
                      </div>

<div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">Eventos traumáticos</label>
                          <input type="text" name="eventos" class="form-control">
                        </div>
                      </div>



<div class="row" align="center">
                                            
                                                  <label><b> Composición Familiar </b></label>
                                              
                                        </div> <br>
 <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">El usuario vive con:</label>
                          <select class="form-control" name="vivecon" >
                            <option >Selecione...</option>
                            <option value="Padres">Los padres</option>
                            <option value="Solo">Solo</option>
                            
                            <option value="Esposa">La Esposa</option>
                            <option value="Otros">Otros</option>
                          </select>
                        </div>
                      </div>

<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Cual es el familiar más cercano?</label>
                          <input type="text" name="familiarcercano" class="form-control">
                        </div>
                      </div>



<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Parentesco</label>
                          <input type="text" name="parentesco" class="form-control">
                        </div>
                      </div>


                          <div class="row">
                              <div class="col-md-6">
                                <div class="form-group" align="left">
                                  <label class="control-label" >Antecedentes consumidores de drogas &nbsp;  Si &nbsp; <input type="radio" name="ant_drogas" class="flat-red"> &nbsp; No &nbsp;<input type="radio" name="ant_drogas" class="flat-red"></label>
                                </div>
                              </div>


<div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Parentesco</label>
                          <input type="text" name="parentesco1" class="form-control">
                        </div>
                      </div>

                              </div>  

                          <div class="row">
                              <div class="col-md-6">
                                <div class="form-group" align="left">
                                  <label class="control-label" >En su familia hay abusadores de alcohol &nbsp;  Si &nbsp; <input type="radio" name="alcohol" class="flat-red"> &nbsp; No &nbsp;<input type="radio" name="alcohol" class="flat-red"></label>
                                </div>
                              </div>


<div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Parentesco</label>
                          <input type="text" name="parentesco2" class="form-control">
                        </div>
                      </div>

                              </div>  
   <div class="row">
                              <div class="col-md-6">
                                <div class="form-group" align="left">
                                  <label class="control-label" >Antecedentes Pilares psiquiátricos &nbsp;  Si &nbsp; <input type="radio" name="psiquiátricos" class="flat-red"> &nbsp; No &nbsp;<input type="radio" name="psiquiátricos" class="flat-red"></label>
                                </div>
                              </div>


<div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Parentesco</label>
                          <input type="text" name="parentesco3" class="form-control">
                        </div>
                      </div>

                              </div> 


 <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>Observaciones sobre la composición familiar</b></label>
                                                  <textarea class="form-control"  name="observ" rows="3" ></textarea>
                                                </div>
                                            </div>

<div class="row" align="center">
                                            
                                                  <label><b> Dinámica Familiar </b></label>
                                              
                                        </div> <br>
 <div class="row">
                      
                    

                                            
                        <div class="form-group col-md-6">
                          <label class="control-label">Dinámica al interior de la familia</label>
                          <input class="form-control" type="text"  name="dinamica" >
                        </div>
                        <div class="form-group col-md-6">
                          <label class="control-label">Relación familia y entorno</label>
                          <input class="form-control" type="text" name="relacion" >
                        </div>
                      </div>

 <div class="row">
                      
                    

                                            
                       <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>SUBSISTEMA CONYUGAL (Comunicación, Afectividad, límites, alianzas, Relación.) </b></label>
                                                  <textarea class="form-control"  name="conyugal" rows="3" ></textarea>
                                                </div>
                                            </div>
                                      

                      </div>


<div class="row">
                      
                    

                                            
                       <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>SUBSISTEMA PARENTAL (Comunicación, Afectividad, límites, alianzas, Relación.)</b></label>
                                                  <textarea class="form-control"  name="parental" rows="3" ></textarea>
                                                </div>
                                            </div>
                                                    </div>

<div class="row">
                                   
                       <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>SUBSISTEMA FRATERNO  (Comunicación, Afectividad, límites, alianzas, Relación.)</b></label>
                                                  <textarea class="form-control"  name="fraterno" rows="3" ></textarea>
                                                </div>
                                            </div>
                                                      </div>

<div class="row" align="center">
                                            
                                                  <label><b> Composición Familiar </b></label>
                                              
                                        </div> <br>

<div class="row">
                                   
                       <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>¿A través de que formas se ha expresado el afecto en la familia?</b></label>
                                                  <textarea class="form-control"  name="afecto" rows="3" ></textarea>
                                                </div>
                                            </div>
                                                      </div>


<div class="row">
                                   
                       <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>Quien ejerce la autoridad en la familia y a través de qué mecanismos?</b></label>
                                                  <textarea class="form-control"  name="autoridad" rows="3" ></textarea>
                                                </div>
                                            </div>
                                                      </div>

<div class="row">
                                   
                       <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>Que normas existen al interior de su familia</b></label>
                                                  <textarea class="form-control"  name="normas" rows="3" ></textarea>
                                                </div>
                                            </div>
                                                      </div>

<div class="row">
                                   
                       <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>Consideran ustedes que al interior de su familia ha sido más constante la crítica o el estímulo?</b></label>
                                                  <textarea class="form-control"  name="familia" rows="3" ></textarea>
                                                </div>
                                            </div>
                                                      </div>

<div class="row">
                                   
                       <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>En qué consisten los castigos?</b></label>
                                                  <textarea class="form-control"  name="castigos" rows="3" ></textarea>
                                                </div>
                                            </div>
                                                      </div>
<div class="row" align="center">
                                            
                                                  <label><b> Dinámica Espiritual </b></label>
                                              
                                        </div> <br>



<div class="row">
                                   
                       <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>¿Han inculcado Valores Espirituales? Cuales</b></label>
                                                  <textarea class="form-control"  name="valores" rows="3" ></textarea>
                                                </div>
                                            </div>
                                                      </div>
<div class="row">
                                   
                       <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>Como cree usted que la parte espiritual tiene que ver el proceso de rehabilitación?</b></label>
                                                  <textarea class="form-control"  name="rehabilita" rows="3" ></textarea>
                                                </div>
                                            </div>
                                                      </div>
<div class="row">
                                   
                       <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>Observaciones sobre el aspecto esiritual de la familia </b></label>
                                                  <textarea class="form-control"  name="obs_espiritual" rows="3" ></textarea>
                                                </div>
                                            </div>
                                                      </div>







                                        <div class="row">
                              <div class="col-md-5">
                                <div class="form-group" align="left">
                                  <label class="control-label" >¿Hay en familia Otros problemas significativos? &nbsp;  Si &nbsp; <input type="radio" name="prob_fami" class="flat-red"> &nbsp; No &nbsp;<input type="radio" name="prob_fami" class="flat-red"></label>
                                </div>
                              </div>


<div class="col-md-7">
                        <div class="form-group">
                          <label class="control-label">Cuáles</label>
                          <input type="text" name="cuales" class="form-control">
                        </div>
                      </div></div>



<div class="row">
                                   
                       <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>Describa el Ambiente Familiar</b></label>
                                                  <textarea class="form-control"  name="ambiente_fam" rows="3" ></textarea>
                                                </div>
                                            </div>
                                                      </div>


<div class="row">
                                   
                       <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>Lo que más le gusta de su familia</b></label>
                                                  <textarea class="form-control"  name="gusta_fami" rows="3" ></textarea>
                                                </div>
                                            </div>
                                                      </div>



<div class="row">
                                   
                       <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>Lo que más le Disgusta de su familia</b></label>
                                                  <textarea class="form-control"  name="disgusta_fam" rows="3" ></textarea>
                                                </div>
                                            </div>
                                                      </div>

<div class="row">
                                   
                       <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>Expectativas familiares frente al proceso,  ¿Que espera la familia de la IPS?</b></label>
                                                  <textarea class="form-control"  name="ips" rows="3" ></textarea>
                                                </div>
                                            </div>
                                                      </div>

<div class="row">
                                   
                       <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>Compromisos de la Familia frente al proceso</b></label>
                                                  <textarea class="form-control"  name="comprom_fami" rows="3" ></textarea>
                                                </div>
                                            </div>
                                                      </div>

<div class="row">
                                   
                       <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>Preocupaciones Familiares</b></label>
                                                  <textarea class="form-control"  name="preocu_fami" rows="3" ></textarea>
                                                </div>
                                            </div>
                                                      </div>

<div class="row" align="center">
                                            
                                                  <label><b> Familiograma </b></label>
                                              
                                        </div> <br>

<div class="row">
                                   
                       <div class="col-md-12">
                                                <div class="form-group">
                                                  
                                                  <textarea class="form-control"  name="familiograma" rows="6" ></textarea>
                                                </div>
                                            </div>
                                                      </div>

<div class="row" align="center">
                                            
                                                  <label><b> Impresiones diagnósticas y planeación </b></label>
                                              
                                        </div> <br>

<div class="row">
                                   
                       <div class="col-md-12">
                                                <div class="form-group">
                                                  
                                                  <textarea class="form-control"  name="impresiones_diag" rows="6" ></textarea>
                                                </div>
                                            </div>
                 <div class="col-md-6">
                                              <div class="form-group">
                                                <label class="control-label">Nombre del profesional:</label>
                                                <input type="text" name="profesional" class="form-control" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                              </div>
                                            </div> 
                                            <div class="col-md-6">
                                              <div class="form-group">
                                                <label class="control-label">Registro profesional Número:</label>
                                                <input type="text" name="registro_prof"class="form-control" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                              </div>
                                            </div>                                      </div>



                 <div class="form-group col-md-12"><hr style="border-color:blue;"></div>
                    <br>
                    <br>


                    <div class="row">
                      <div class="col-sm-12">
                        <div align="center"> 
                          <label> <strong> Próxima consulta o cita (Solo si aplica)</strong>  </label>
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div align="left"><label>Fecha </label></div>
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
                        <select id="doctor" name="doctor" class="form-control select2" style="width: 100%;" >
                          <option value="<?php echo $_SESSION['username']?>" selected="selected"><?php echo $_SESSION['username']?> </option>
                          <?php usuariosAselect($ID);?>
                        </select>
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
                        <br><br><br>
                        <div class="col-sm-12">
                          <br><br>
                          <center><button type="submit" class="btn btn-block btn-primary btn-sm"> <h2> <strong>  G u a r d a r  </strong> </h2> </button></center>
                        </div>
                      </div>

                      <input type="hidden"  name="tipo_cliente"   valur="1">
                    </div>
                  </form>
                </div>

                <!-- 

                   FIN DE  ECOGRAFÍA OBSTÉTRICA 

                -->

                <!-- 

                    ECOGRAFÍA MORFOLÓGICA

                -->
                <div id="servicio2" class="panel box box-secundary element" style="display: none;">
                  <form action="guardarHistoriaTrabajoSocial.php" method="POST" enctype="multipart/form-data">
                    <div class="box-header with-border text-center">
                      <h2 class="box-title">Valoración Trabajo Social</h2>
                    </div>
                    <br>

                   
                    <input  type="hidden" name="tipo_trabajo"  value="Valoracion Trabajo Social">

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Nombre del Acudiente</label>
                          <input type="text" name="acudiente" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Telefono del acudiente</label>
                          <input type="text" name="telacudiente" class="form-control">
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Dirección del Acudiente</label>
                          <input type="text" name="diracudiente" class="form-control">
                        </div>
                      </div>
                    </div>

                    <br>

                    <div class="row">
                      
                        <div class="form-group col-md-12">
                          <label class="control-label">Objetivo</label>
                          <input type="text" name="objetivo" class="form-control">
                        </div>

                          
                         <div class="form-group col-md-12">
                        <div class="form-group">
                        <label> Motivo de la consulta</label>
                         <textarea class="form-control"  name="motivoc" rows="3" ></textarea>
                        </div> </div> 

<div class="form-group col-md-12">
                        <div class="form-group">
                        <label> Tecnicas Utilizadas</label>
                         <textarea class="form-control"  name="tecnicas" rows="3" ></textarea>
                        </div> </div>



                      </div> 

 <div class="row" align="center">
                                            
                    <label><b> Composición Familiar</b></label>
                                              
                                        </div>



                      
                        <div class="form-group col-md-6">
                          <label class="control-label">Nombres y Apellidos</label>
                          <input type="text" name="nombre" class="form-control">
                        </div>

                        <div class="form-group col-md-6">
                          <label class="control-label">Edad</label>
                          <input type="text" name="edad" class="form-control">
                        </div>
                      


                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group col-md-6">
                          <label class="control-label">Estado Civil</label>
                          <input type="text" name="ec" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                          <label class="control-label">Escolaridad</label>
                          <input type="text" name="escola" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group col-md-6">
                          <label class="control-label">Ocupación</label>
                          <input type="text" name="ocupacion" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                          <label class="control-label">Parentesco</label>
                          <input type="text" name="parentescos" class="form-control">
                        </div>
                      </div>
                    </div>
  <div class="form-group col-md-12">
                        <div class="form-group">
                        <label> Situación Encontrada</label>
                         <textarea class="form-control"  name="sit_encontrada" rows="3" ></textarea>
                        </div> </div>



 <div class="row" align="center">
                                            
                    <label><b> Perfil de Vulnerabilidad y Generatividad</b></label>
                                              
                                        </div>


 <div class="form-group col-md-12">
                        <div class="form-group">
                        <label> Vulnerabilidad</label>
                         <textarea class="form-control"  name="vulnerabilidad" rows="3" ></textarea>
                        </div> </div>

 <div class="form-group col-md-12">
                        <div class="form-group">
                        <label> Generatividad</label>
                         <textarea class="form-control"  name="generat" rows="3" ></textarea>
                        </div> </div>

 <div class="row" align="center">
                                            
                    <label><b> Apreciación Profesional del Caso</b></label>
                                              
                                        </div>


 <div class="form-group col-md-12">
                        <div class="form-group">
                        
                         <textarea class="form-control"  name="apreciacion" rows="3" ></textarea>
                        </div> </div>
 <div class="col-md-6">
                                              <div class="form-group">
                                                <label class="control-label">Nombre del profesional:</label>
                                                <input type="text" name="nom_profesion" class="form-control" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                              </div>
                                            </div> 
                                            <div class="col-md-6">
                                              <div class="form-group">
                                                <label class="control-label">Registro profesional Número:</label>
                                                <input type="text" name="registro_num"class="form-control" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                              </div>
                                            </div>


 <div class="form-group col-md-12"><hr style="border-color:blue;"></div>

                    <br>
                    <br>
                    <br>

                    <div class="row">
                      <div class="col-sm-12">
                        <div align="center"> 
                          <label> <strong> Próxima consulta o cita (Solo si aplica)</strong>  </label>
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div align="left"><label>Fecha </label></div>
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
                        <select id="doctor" name="doctor" class="form-control select2" style="width: 100%;" >
                          <option value="<?php echo $_SESSION['username']?>" selected="selected"><?php echo $_SESSION['username']?> </option>
                          <?php usuariosAselect($ID);?>
                        </select>
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
                        <br><br><br>
                        <div class="col-sm-12">
                          <br><br>
                          <center><button type="submit" class="btn btn-block btn-primary btn-sm"> <h2> <strong>  G u a r d a r  </strong> </h2> </button></center>
                        </div>
                      </div>

                      <input type="hidden"  name="tipo_cliente"   valur="1">
                    </div>
                  </form>
                </div>

                <!-- 

                    FIN DE ECOGRAFÍA MORFOLÓgica

                -->

                <!-- 

                    ECOGRAFÍA COLPOSCOPIA

                -->

                <div id="servicio3" class="panel box box-secundary element" style="display: none;">
                  <form action="guardarHistoriaTrabajoSocial.php" method="POST" enctype="multipart/form-data">
                    <div class="box-header with-border text-center">
                      <h2 class="box-title">Seguimiento Trabajo Social</h2>
                    </div>
                    <br>

                      

                    <input  type="hidden" name="tipo_trabajo"  value="Seguimiento Trabajo Social">

 <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID']?>">

 <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Lugar</label>
                          <input type="text" name="lugar" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Tema</label>
                          <input type="text" name="tema" class="form-control">
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Profesional</label>
                          <input type="text" name="profes" class="form-control">
                        </div>
                      </div>
                    </div>

 <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Objetivo del seguimiento por trabajo Social</label>
                          <textarea class="form-control" id="procedimiento" name="obj_segui" placeholder="" rows="3" ></textarea>
                        </div>
                      </div>
                    </div>
 <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Desarrollo de la Actividad</label>
                          <textarea class="form-control" id="procedimiento" name="desarrollo" placeholder="" rows="3" ></textarea>
                        </div>
                      </div>
                    </div>
 <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Recomendaciones</label>
                          <textarea class="form-control" id="procedimiento" name="recomen" placeholder="" rows="3" ></textarea>
                        </div>
                      </div>
                    </div>

 

                 <div class="form-group col-md-12"><hr style="border-color:blue;"></div>
                    <br>
                    <br>

                    <div class="row">
                      <div class="col-sm-12">
                        <div align="center"> 
                          <label> <strong> Próxima consulta o cita (Solo si aplica)</strong>  </label>
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div align="left"><label>Fecha </label></div>
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
                        <select id="doctor" name="doctor" class="form-control select2" style="width: 100%;" >
                          <option value="<?php echo $_SESSION['username']?>" selected="selected"><?php echo $_SESSION['username']?> </option>
                          <?php usuariosAselect($ID);?>
                        </select>
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
                        <br><br><br>
                        <div class="col-sm-12">
                          <br><br>
                          <center><button type="submit" class="btn btn-block btn-primary btn-sm"> <h2> <strong>  G u a r d a r  </strong> </h2> </button></center>
                        </div>
                      </div>

                      <input type="hidden"  name="tipo_cliente"   valur="1">
                    </div>
                  </form>
                </div>

             

                <div id="servicio4" class="panel box box-secundary element" style="display: none;">
                  <form action="guardarHistoriaTrabajoSocial.php" method="POST" enctype="multipart/form-data">
                    <div class="box-header with-border text-center">
                      <h2 class="box-title">Terapia Familiar por Trabajo Social</h2>
                    </div>
                    <br>
                    <input  type="hidden" name="tipo_trabajo"  value="Terapia Familiar">

                     <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID']?>">

                   

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Tema</label>
                          <input type="text" class="form-control"  placeholder="" name="temas">
                        </div>
                      </div>
                      <div class="col-md-8">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Objetivos</label>
                          <input type="text" class="form-control"  placeholder="" name="obj">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Nombres de participantes y parentesco</label>
                          <textarea class="form-control" id="procedimiento" name="participantes" placeholder="" rows="3" ></textarea>
                        </div>
                      </div>
                    </div>


<div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Desarrollo de la Terapia Familiar</label>
                          <textarea class="form-control" id="procedimiento" name="des_tera" placeholder="" rows="3" ></textarea>
                        </div>
                      </div>
                    </div>


<div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Reflexiones y Compromisos de la famila</label>
                          <textarea class="form-control" id="procedimiento" name="comp_fami" placeholder="Procedimiento" rows="3" ></textarea>
                        </div>
                      </div>
                    </div>


<div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Conclusión Profesional y Recomendaciones</label>
                          <textarea class="form-control" id="procedimiento" name="conclusiones" placeholder="" rows="3" ></textarea>
                        </div>
                      </div>
                    </div>

<div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Profesional responsable y TP</label>
                          <textarea class="form-control" id="procedimiento" name="tp" placeholder="" rows="3" ></textarea>
                        </div>
                      </div>
                    </div>





                    <div class="form-group col-md-12"><hr style="border-color:blue;"></div>
                   
                    <br>
                    <br>

                    <div class="row">
                      <div class="col-sm-12">
                        <div align="center"> 
                          <label> <strong> Próxima consulta o cita (Solo si aplica)</strong>  </label>
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div align="left"><label>Fecha </label></div>
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
                        <input type="text" name="motivo" class="form-control input-lg"  placeholder="Motivo Consulta">
                      </div>
                      <div class="col-sm-6">
                        <label>Especialista </label>
                        <select id="doctor" name="doctor" class="form-control select2" style="width: 100%;" >
                          <option value="<?php echo $_SESSION['username']?>" selected="selected"><?php echo $_SESSION['username']?> </option>
                          <?php usuariosAselect($ID);?>
                        </select>
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
                        <br><br><br>
                        <div class="col-sm-12">
                          <br><br>
                          <center><button type="submit" class="btn btn-block btn-primary btn-sm"> <h2> <strong>  G u a r d a r  </strong> </h2> </button></center>
                        </div>
                      </div>

                      <input type="hidden"  name="tipo_cliente"   valur="1">
                    </div>
                  </form>
                </div>

               


                <div id="servicio5" class="panel box box-secundary element" style="display: none;">
                  <form action="guardarHistoriaTrabajoSocial.php" method="POST" enctype="multipart/form-data">
                    <div class="box-header with-border text-center">
                      <h2 class="box-title">Acciones Socioeducativas Trabajo Social</h2>
                    </div>
                    <br>
                    <input  type="hidden" name="tipo_trabajo"  value="Acciones Socieducativas">

                  


                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Sesión</label>
                          <input type="text" name="sesion" class="form-control" >
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Tema</label>
                          <input type="text" name="tematica" class="form-control"  >
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Fecha</label>
                          <input type="date" name="fech" class="form-control">
                        </div>
                      </div>
                    </div>

                    

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">Objetivo de la actividad SocioEducativa Familiar</label>
                          <textarea class="form-control" rows="3" placeholder="" name="objeti"></textarea>
                        </div>
                      </div>
                    </div>


<div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">Desarrollo de la actividad SocioEducativa Familiar</label>
                          <textarea class="form-control" rows="3" placeholder="" name="desarr"></textarea>
                        </div>
                      </div>
                    </div>

<div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">Recomendaciones</label>
                          <textarea class="form-control" rows="3" placeholder="" name="recomen"></textarea>
                        </div>
                      </div>
                    </div>


 <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">Firma del profesional Tratante</label>
                          <input type="text" name="firma" class="form-control"  >
                        </div>
                      </div>



  <div class="form-group col-md-12"><hr style="border-color:blue;"></div>

                    <br>
                    <br>

                    <div class="row">
                      <div class="col-sm-12">
                        <div align="center"> 
                          <label> <strong> Próxima consulta o cita (Solo si aplica)</strong>  </label>
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div align="left"><label>Fecha </label></div>
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
                        <select id="doctor" name="doctor" class="form-control select2" style="width: 100%;" >
                          <option value="<?php echo $_SESSION['username']?>" selected="selected"><?php echo $_SESSION['username']?> </option>
                          <?php usuariosAselect($ID);?>
                        </select>
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
                        <br><br><br>
                        <div class="col-sm-12">
                          <br><br>
                          <center><button type="submit" class="btn btn-block btn-primary btn-sm"> <h2> <strong>  G u a r d a r  </strong> </h2> </button></center>
                        </div>
                      </div>

                      <input type="hidden"  name="tipo_cliente"   valur="1">
                    </div>
                  </form>
                </div>

                <!-- 

                   FIN DE ECOGRAFÍA MAMARIA

                -->


                <!-- 

                  ECOGRAFÍA ABDOMINAL

                -->
                <div id="servicio6" class="panel box box-secundary element" style="display: none;">
                  <form action="guardarHistoriaTrabajoSocial.php" method="POST" enctype="multipart/form-data">
                    <div class="box-header with-border text-center">
                      <h2 class="box-title">Abdominal</h2>
                    </div>
                    <br>
                    <input  type="hidden" name="tipo_ecografia"  value="Ecografia Abdominal">

                    <?php $idUsuario = $_SESSION['ID']; ?>

                    <div class="row">
                      <div class="col-md-12">
                        <table class="table table-bordered" >
                          <tr>
                            <th colspan="4" class="text-center">Higado</th>
                          </tr>
                          <tr class="text-center">
                            <th></th>
                            <th>Normal</th>
                            <th>Anormal</th>
                            <th>Valor Normal</th>
                          </tr>
                          <tr>
                            <td>Morfología</td>
                            <td><input type="text" class="form-control" name="morfologica1"></td>
                            <td><input type="text" class="form-control" name="morfologica2"></td>
                            <td><input type="text" class="form-control" name="morfologica3"></td>
                          </tr>
                          <tr>
                            <td>Bordes</td>
                            <td><input type="text" class="form-control" name="bordes1"></td>
                            <td><input type="text" class="form-control" name="bordes2"></td>
                            <td><input type="text" class="form-control" name="bordes3"></td>
                          </tr>
                          <tr>
                            <td>Dimensiones</td>
                            <td><input type="text" class="form-control" name="dimensiones1"></td>
                            <td><input type="text" class="form-control" name="dimensiones2"></td>
                            <td><input type="text" class="form-control" name="dimensiones3" value="280-150mm"></td>
                          </tr>
                          <tr>
                            <td>Ecogenisidad</td>
                            <td><input type="text" class="form-control" name="ecocigenidad4"></td>
                            <td><input type="text" class="form-control" name="ecocigenidad5"></td>
                            <td><input type="text" class="form-control" name="ecocigenidad6"></td>
                          </tr>
                          <tr>
                            <td>Imagen Expansiva</td>
                            <td><input type="text" class="form-control" name="imagen_ex1"></td>
                            <td><input type="text" class="form-control" name="imagen_ex2"></td>
                            <td><input type="text" class="form-control" name="imagen_ex3"></td>
                          </tr>
                          <tr>
                            <td>Colédoco</td>
                            <td><input type="text" class="form-control" name="coledoco1"></td>
                            <td><input type="text" class="form-control" name="coledoco2"></td>
                            <td><input type="text" class="form-control" name="coledoco3" value="< 5mm"></td>
                          </tr>
                          <tr>
                            <td>Vena Porta</td>
                            <td><input type="text" class="form-control" name="vena_porta1"></td>
                            <td><input type="text" class="form-control" name="vena_porta2"></td>
                            <td><input type="text" class="form-control" name="vena_porta3" value="< 13mm"></td>
                          </tr>
                        </table>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Observación</label>
                          <textarea class="form-control" rows="3" placeholder="" name="observacion_higado"></textarea>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <table class="table table-bordered" >
                          <tr>
                            <th colspan="4" class="text-center">Vesicula Biliar</th>
                          </tr>
                          <tr class="text-center">
                            <th></th>
                            <th>Normal</th>
                            <th>Anormal</th>
                            <th>Valor Normal</th>
                          </tr>
                          <tr>
                            <td>Forma</td>
                            <td><input type="text" class="form-control" name="form1"></td>
                            <td><input type="text" class="form-control" name="form2"></td>
                            <td><input type="text" class="form-control" name="form3"></td>
                          </tr>
                          <tr>
                            <td>Paredes</td>
                            <td><input type="text" class="form-control" name="paredes1"></td>
                            <td><input type="text" class="form-control" name="paredes2"></td>
                            <td><input type="text" class="form-control" name="paredes3"></td>
                          </tr>
                          <tr>
                            <td>Tamaño</td>
                            <td><input type="text" class="form-control" name="tamaño1"></td>
                            <td><input type="text" class="form-control" name="tamaño2"></td>
                            <td><input type="text" class="form-control" name="tamaño3" value="280-150mm"></td>
                          </tr>
                          <tr>
                            <td>Barro Biliar</td>
                            <td><input type="text" class="form-control" name="barro_biliar1"></td>
                            <td><input type="text" class="form-control" name="barro_biliar2"></td>
                            <td><input type="text" class="form-control" name="barro_biliar3"></td>
                          </tr>
                          <tr>
                            <td>Imagen Expansiva</td>
                            <td><input type="text" class="form-control" name="imagen_ex4"></td>
                            <td><input type="text" class="form-control" name="imagen_ex5"></td>
                            <td><input type="text" class="form-control" name="imagen_ex6"></td>
                          </tr>
                        </table>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Observación</label>
                          <textarea class="form-control" rows="3" name="observacion_vesicula" placeholder=""></textarea>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <table class="table table-bordered" >
                          <tr>
                            <th colspan="4" class="text-center">Pancreas</th>
                          </tr>
                          <tr class="text-center">
                            <th></th>
                            <th>Normal</th>
                            <th>Anormal</th>
                            <th>Valor Normal</th>
                          </tr>
                          <tr>
                            <td>Forma</td>
                            <td><input type="text" class="form-control" name="form4"></td>
                            <td><input type="text" class="form-control" name="form5"></td>
                            <td><input type="text" class="form-control" name="form6"></td>
                          </tr>
                          <tr>
                            <td>Ecogenisidad</td>
                            <td><input type="text" class="form-control" name="ecogenicidad7"></td>
                            <td><input type="text" class="form-control" name="ecogenicidad8"></td>
                            <td><input type="text" class="form-control" name="ecogenicidad9"></td>
                          </tr>
                          <tr>
                            <td>Cabeza</td>
                            <td><input type="text" class="form-control" name="cabeza1"></td>
                            <td><input type="text" class="form-control" name="cabeza2"></td>
                            <td><input type="text" class="form-control" name="cabeza3" value="<30mm"></td>
                          </tr>
                          <tr>
                            <td>Cuerpo</td>
                            <td><input type="text" class="form-control" name="cuerpo1"></td>
                            <td><input type="text" class="form-control" name="cuerpo2"></td>
                            <td><input type="text" class="form-control" name="cuerpo3" value="<25mm"></td>
                          </tr>
                          <tr>
                            <td>Cola</td>
                            <td><input type="text" class="form-control" name="cola1"></td>
                            <td><input type="text" class="form-control" name="cola2"></td>
                            <td><input type="text" class="form-control" name="cola3" value="<25mm"></td>
                          </tr>
                          <tr>
                            <td>Wirsung</td>
                            <td><input type="text" class="form-control" name="wirsung1"></td>
                            <td><input type="text" class="form-control" name="wirsung2"></td>
                            <td><input type="text" class="form-control" name="wirsung3" value="<3mm"></td>
                          </tr>
                        </table>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Observación</label>
                          <textarea class="form-control" rows="3" name="observacion_pancreas" placeholder=""></textarea>
                        </div>
                      </div>
                    </div>

                    <br>
                    <div class="box-header with-border">
                      <h1 class="box-title">Bazo</h1>
                    </div>
                    <br>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Morfología, Ecogenisidad y Movilidad</label>
                          <textarea class="form-control" rows="3" placeholder="" name="MEM"></textarea>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Tamaño</label>
                          <input type="text" class="form-control" name="tamaño4" value="" placeholder="">
                          <span class="help-block">(V.N < 130mm)</span>
                        </div>
                      </div>
                    </div>

                    <br>
                    <div class="box-header with-border">
                      <h1 class="box-title">Arteria Aorta, Vena Cava y Vena Porta</h1>
                    </div>
                    <br>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Calibre</label>
                          <select class="form-control" name="calibre1"  >
                            <option>Seleccione..</option>
                            <option value="Normal">Normal</option>
                            <option value="Anormal">Anormal</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Flujo</label>
                          <select class="form-control" name="flujo1"  >
                            <option>Seleccione..</option>
                            <option value="Normal">Normal</option>
                            <option value="Anormal">Anormal</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Pared Gástrica</label>
                          <textarea class="form-control" rows="3" placeholder="" name="paredes_gastricas"></textarea>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Liquido Libre</label>
                          <textarea class="form-control" rows="3" placeholder="" name="liquido_libre"></textarea>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Conclusión del Informe</label>
                          <textarea class="form-control" rows="3" placeholder="" name="conclusion_informe"></textarea>
                        </div>
                      </div>
                    </div>

                    <div class="box-header with-border text-center">
                      <h1 class="box-title">Anexar Imagenes</h1>
                    </div>
                    <br>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Imagen 1</label>
                          <input type="file" id="to5" name="imagen44" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Imagen 2</label>
                          <input type="file" name="imagen45" class="form-control">
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Imagen 3</label>
                          <input type="file" name="imagen46" class="form-control">
                        </div>
                      </div>
                     
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Diagnóstico</label>
                          <textarea class="form-control" rows="3" placeholder="" name="diagnostico6"></textarea>
                        </div>
                      </div>
                    </div>
                    <br>
                    <br>

                    <div class="row">
                      <div class="col-sm-12">
                        <div align="center"> 
                          <label> <strong> Próxima consulta o cita (Solo si aplica)</strong>  </label>
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div align="left"><label>Fecha </label></div>
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
                        <select id="doctor" name="doctor" class="form-control select2" style="width: 100%;" >
                          <option value="<?php echo $_SESSION['username']?>" selected="selected"><?php echo $_SESSION['username']?> </option>
                          <?php usuariosAselect($ID);?>
                        </select>
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
                        <br><br><br>
                        <div class="col-sm-12">
                          <br><br>
                          <center><button type="submit" class="btn btn-block btn-primary btn-sm"> <h2> <strong>  G u a r d a r  </strong> </h2> </button></center>
                        </div>
                      </div>

                      <input type="hidden"  name="tipo_cliente"   valur="1">
                    </div>
                  </form>
                </div>

                <!-- 

                  FIN ECOGRAFÍA ABDOMINAL

                -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>




<?php include("footer.php")?>
 