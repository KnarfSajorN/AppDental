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
      $("#final").show();
    }
  
    if (id == "servicio2") 
    {
      $("#servicio1").hide();
      $("#servicio2").show();
      $("#servicio3").hide();
      $("#servicio4").hide();
      $("#servicio5").hide();
      $("#servicio6").hide();
      $("#final").show();
      
    }
  
    if (id == "servicio3") {
      $("#servicio1").hide();
      $("#servicio2").hide();
      $("#servicio3").show();
      $("#servicio4").hide();
      $("#servicio5").hide();
      $("#servicio6").hide();
      $("#final").show();
     
    }

    if (id == "servicio4") 
    {
      $("#servicio1").hide();
      $("#servicio2").hide();
      $("#servicio3").hide();
      $("#servicio4").show();
      $("#servicio5").hide();
      $("#servicio6").hide();
      $("#final").show();
       
    }

    if (id == "servicio5") 
    { 
      $("#servicio1").hide();
      $("#servicio2").hide();
      $("#servicio3").hide();
      $("#servicio4").hide();
      $("#servicio5").show();
      $("#servicio6").hide();
      $("#final").show();
     
    }

    if (id == "servicio6") 
    {
      $("#servicio1").hide();
      $("#servicio2").hide();
      $("#servicio3").hide();
      $("#servicio4").hide();
      $("#servicio5").hide();
      $("#servicio6").show();
      $("#final").show();
      
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
    <!-- Upload archivos -->
  <link href="upload/css/uploadfile.css" rel="stylesheet">
  <script src="upload/js/jquery.min.js"></script>
  <script src="upload/js/jquery.uploadfile.min.js"></script>
  <!-- Fin upload archivos -->
    <!-- Upload fotos --> 
    <link type="text/css" rel="stylesheet" href="upload/css/jquery-ui.min.css" media="screen" />
    <link type="text/css" rel="stylesheet" href="upload/plupload/js/jquery.ui.plupload/css/jquery.ui.plupload.css" media="screen" />  
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

   <!--              <div class="row">
                  <div class="col-md-12">
                    <hr>
                  </div>
                </div>

              <div class="row">
                  <div class="col-md-6">
                    <h4 class="card-title">Registro de Ecografías</h4>
                    <div class="form-group">
                      <select id="status" name="status" class="form-control select2" onChange="mostrar(this.value);" style="width: 80%;">
                        <option >Seleccione tipo...</option>
                        <option value="servicio1">Ecografía obstétrica</option>
                        <option value="servicio2">Ecografía morfológica</option> 
                        <option value="servicio3">Colposcopia</option> 
                        <option value="servicio4">Renal</option>
                        <option value="servicio5">Mamas</option> 
                        <option value="servicio6">Abdominal</option>
                        <option value="servicio7">Otro</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6" >  
                    <h4 align="right"> <?php echo date("d-m-Y h:m")?> </h4>                                 
                  </div>
                </div> -->
<form action="guardarHistoriaClinica2_ecografias.php" method="POST" id="cri" name="cri" enctype="multipart/form-data">
                <!-- 

                    ECOGRAFÍA OBSTÉTRICA 

                -->
        <!--        <div id="servicio1" class="panel box box-secundary element" style="display: none;">
                    <div class="box-header with-border text-center">
                      <h2 class="box-title">Ecografía obstétrica</h2>
                    </div>
                    <br>
                    <input type="hidden" name="tipo_ecografia"  value="Ecografia Obstetrica">

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Feto</label>
                          <select class="form-control" name="feto"  >
                            <option>Seleccione..</option>
                            <option value="Único">Único</option>
                            <option value="Mùltiple">Mùltiple</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Situación</label>
                          <select class="form-control" name="situacion">
                            <option>Seleccione..</option>
                            <option value="Longitudinal">Longitudinal</option>
                            <option value="Transverso ">Transverso</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Presentación</label>
                          <select class="form-control" name="presentacion"  >
                            <option>Seleccione..</option>
                            <option value="Cefálica">Cefálica</option>
                            <option value="Podálica">Podálica</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Posición</label>
                          <select class="form-control" name="posicion">
                            <option>Seleccione..</option>
                            <option value="Izquierda">Izquierda</option>
                            <option value="Derecha">Derecha</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Dorso</label>
                          <select class="form-control" name="dorso"  >
                            <option>Seleccione..</option>
                            <option value="Lateral">Lateral</option>
                            <option value="Anterior">Anterior</option>
                            <option value="Posterior">Posterior</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="box-header with-border text-center">
                      <h1 class="box-title">Biometría</h1>
                    </div>
                    <br>








                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group col-md-6">
                          <label class="control-label">SG(mm)</label>
                          <input class="form-control" type="text"  name="SG" >
                        </div>
                        <div class="form-group col-md-6">
                          <label class="control-label">Semanas</label>
                          <input class="form-control" type="text" name="sem1" >
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group col-md-6">
                          <label class="control-label">DBP (mm)</label>
                          <input class="form-control" type="text" name="DBP" >
                        </div>
                        <div class="form-group col-md-6">
                          <label class="control-label">Semanas</label>
                          <input class="form-control" type="text" name="sem2" >
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group col-md-6">
                          <label class="control-label"> LCN(mm)</label>
                          <input class="form-control" type="text" name="LCN"  >
                        </div>
                        <div class="form-group col-md-6">
                          <label class="control-label">Semanas</label>
                          <input class="form-control" type="text" name="sem3" >
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group col-md-6">
                          <label class="control-label">HC (mm)</label>
                          <input type="text" name="HC" class="form-control" >
                        </div>
                        <div class="form-group col-md-6">
                          <label class="control-label">Semanas</label>
                          <input type="text" name="sem4" class="form-control">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group col-md-6">
                          <label class="control-label">VV(mm)</label>
                          <input type="text" name="VV" class="form-control" >
                        </div>
                        <div class="form-group col-md-6">
                          <label class="control-label">Semanas</label>
                          <input type="text" name="sem5" class="form-control">
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group col-md-6">
                          <label class="control-label">AC (mm)</label>
                          <input type="text" name="AC" class="form-control" >
                        </div>
                        <div class="form-group col-md-6">
                          <label class="control-label">Semanas</label>
                          <input type="text" name="sem6" class="form-control">
                        </div>
                      </div>
                    </div>

                    <div class="row">


                      <div class="col-md-6">
                        <div class="form-group col-md-6">
                          <label class="control-label"></label>
                       <!--   <input type="text" name="VV" class="form-control"> -->
     <!--                  </div>
                        <div class="form-group col-md-6">
                          <label class="control-label"></label>
                        <!--  <input type="text" name="sem7" class="form-control"> -->
        <!--                </div>
                      </div>

<div class="col-md-6">
                        <div class="form-group col-md-6">
                          <label class="control-label">LF (mm)</label>
                          <input type="text" name="LF" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                          <label class="control-label">Semanas</label>
                          <input type="text" name="sem7" class="form-control">
                        </div>
                      </div>






                    </div>

                    <div class="form-group col-md-12"><hr style="border-color:blue;"></div>

                    <br>
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Ponderado Fetal  (+/- 10 % gr)</label>
                          <input type="text" name="ponderado_f" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Percentil</label>
                          <input type="text" name="percentil"  class="form-control" >
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Frecuencia Cardiaca (x min) </label>
                          <input type="text" name="frecuencia_cardiaca" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Circular de cordón</label>
                          <select name="circulacion_cordon" class="form-control"  style="width: 100%;">
                            <option >Seleccione </option>
                            <option value="No">No</option>
                            <option value="Si">Si</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Placenta  </label>
                          <input type="text" name="placenta" class="form-control">
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Espesor (mm)</label>
                          <input type="text" name="espesor"  class="form-control" >
                        </div>
                      </div>


                        <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Grado</label>
                          <select   name="grado" class="form-control"  style="width: 100%;">
                            <option >Seleccione </option>
                            <option value="I">I</option>
                            <option value="II">II</option>
                            <option value="III">III</option>
                          </select>
                        </div>
                      </div> 


<div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Liquido Amniotico </label>
                          <input type="text" name="liquido_amniotico"  class="form-control" >
                        </div>
                      </div>  -->


              

             <!--         <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Placenta</label>
                          <select   name="placenta" class="form-control">
                            <option >Seleccione </option>
                            <option value="Anterior">Anterior</option>
                            <option value="Posterior">Posterior</option>
                            <option value="Previa">Previa</option>
                          </select>
                        </div>
                      </div>  -->

                      
   <!--                   </div>

                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label"> Malformaciones Fetales</label>
                          <select   name="malformaciones_fetales" class="form-control">
                            <option >Seleccione </option>
                            <option value="No">No</option>
                            <option value="Si">Si</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Sexo</label>
                          <select   name="sexo" class="form-control">
                            <option >Seleccione </option>
                            <option value="Masculino">Masculino   </option>
                            <option value="Femenino">Femenino      </option>
                          </select>
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Fecha probable de parto</label>
                           <input type="date" name="fechaParto" class="form-control">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Conclusiones</label>
                          <textarea class="form-control" id="procedimiento" name="conclusion" placeholder="Procedimiento" rows="3" ></textarea>
                        </div>
                      </div>
                    </div>

                    <div class="box-header with-border text-center">
                      <h1 class="box-title">Información de facturación</h1>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-horizontal">
                          <label class="col-md-5 control-label">Monto de abono o pago</label>
                          <div class="col-md-6">
                            <input type="text" class="form-control" name="abono" id="abono" min="1" placeholder="">
                          </div>
                        </div>
                      </div>
                    </div>


                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Diagnóstico</label>
                          <textarea class="form-control" id="procedimiento" name="diagnostico" placeholder="Procedimiento" rows="3" ></textarea>
                        </div>
                      </div>
                    </div>
                    <br>

                </div> -->

                <!-- 

                   FIN DE  ECOGRAFÍA OBSTÉTRICA 

                -->

                <!-- 

                    ECOGRAFÍA MORFOLÓGICA

                -->
             <!--   <div id="servicio2" class="panel box box-secundary element" style="display: none;"> -->
                    <div class="box-header with-border text-center">
                      <h2 class="box-title">Ecografía morfológica</h2>
                    </div>
                    <br>

                    <div class="box-header with-border">
                      <h2 class="box-title">La imagen ultrasonografica muestra</h2>
                    </div>
                    <br>

                    <input  type="hidden" name="tipo_ecografia"  value="Ecografia Morfologica">

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Situación</label>
                          <input type="text" name="situacion1" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Presentación</label>
                          <input type="text" name="presentacion1" class="form-control">
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Posición</label>
                          <input type="text" name="posicion1" class="form-control">
                        </div>
                      </div>
                    </div>

                    <br>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group col-md-6">
                          <label class="control-label">BPD-Diámetro Biparietal (mm)</label>
                          <input type="text" name="BPD" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                          <label class="control-label">Semanas</label>
                          <input type="text" name="sema1" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group col-md-6">
                          <label class="control-label">HC-Perimétro Cefálico (mm)</label>
                          <input type="text" name="HC" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                          <label class="control-label">Semanas</label>
                          <input type="text" name="sema2" class="form-control">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group col-md-6">
                          <label class="control-label">AC-Circunferencia Abdominal (mm)</label>
                          <input type="text" name="AC2" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                          <label class="control-label">Semanas</label>
                          <input type="text" name="sema3" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group col-md-6">
                          <label class="control-label">FL-longitud de Femúr (mm)</label>
                          <input type="text" name="FL" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                          <label class="control-label">Semanas</label>
                          <input type="text" name="sema4" class="form-control">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group col-md-6">
                          <label class="control-label">Peso Fetal Aproximado (Grs)</label>
                          <input type="text" name="peso_fetal_apro" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                          <label class="control-label">Percentil</label>
                          <input type="text" name="percentil2" class="form-control">
                        </div>
                      </div>
                    </div>

                    <div class="box-header with-border">
                      <h2 class="box-title">Anatomía fetal</h2>
                    </div>
                    <br>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Craneo</label>
                          <textarea name="craneo" class="form-control" rows="3" placeholder=""></textarea>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Sistema nervioso central</label>
                          <textarea name="sistema_nervioso_central" class="form-control" rows="3" placeholder="">
ANCHURA VENTRICULO LATERAL  - ASTA ANTERIOR:   mm
ANCHURA VENTRICULO LATERAL  -  ATRIO:   mm (VN: < 10 mm)
ANCHURA DEL CAVUN SEPTUM PELLUCIDUM:   mm
ANCHURA DEL TALAMO:   mm.
DIAMETRO CEREBELO:   mm.
EDAD GESTACIONAL:   . 
CISTERNA MAGNA:   mm
                          </textarea>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Columna vertebral</label>
                          <textarea name="columna_vertebral" class="form-control" rows="3" placeholder=""></textarea>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Cara</label>
                          <textarea name="cara" class="form-control" rows="3" placeholder="">
FRENTE: 
HUESOS NASALES: 
NARIZ: 
LABIO SUPERIOR: 
LABIO INFERIOR: 
BARBILLA: 
ORBITAS:
                          </textarea>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Corazón</label>
                          <textarea name="corazon" class="form-control" rows="3" placeholder="">
PROYECCION DE CUATRO CAMARAS:  
PROYECCION DE TRES CAMARAS:  
TRACTO DE SALIDA DEL VENTRICULO IZQUIERDO: PERMEABLE:   mm.
TRACTO DE SALIDA DEL VENTRICULO DERECHO: PERMEABLE:   mm.
ARCO AORTICO: 
ARCO DUCTAL:
                          </textarea>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Tórax</label>
                          <textarea name="torax" class="form-control" rows="3" placeholder=""></textarea>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Pared Abdominal Anterior</label>
                          <textarea name="pared_abdominal" class="form-control" rows="3" placeholder="">
INTEGRIDAD DE LA PARED ABDOMINAL
                          </textarea>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Tracto Gastro Intestinal</label>
                          <textarea name="tracto_gastro" class="form-control" rows="3" placeholder="">
INTEGRIDAD DE LA PARED ABDOMINAL
                          </textarea>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Sistema Urinario</label>
                          <textarea name="sistema_urinario" class="form-control" rows="3" placeholder="">
LONGITUD RENAL:    
DIAMETRO VESICAL:   mm.
                          </textarea>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Sistema Musculo-Esquelético</label>
                          <textarea name="sistema_musculo_esqueletico" class="form-control" rows="3" placeholder=""></textarea>
                        </div>
                      </div>
                    </div>

                    <div class="form-group col-md-12"><hr style="border-color:blue;"></div>
                    <br>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Bienestar fetal</label>
                          <textarea name="bienestar_fetal" class="form-control" rows="3" placeholder="">
FRECUENCIA CARDIACA:  
MOVIMIENTOS FETALES:
                          </textarea>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Placenta</label>
                          <textarea name="placenta2" class="form-control" rows="3" placeholder="">
POSICION:    
ESPESOR:               
GRADO:
                          </textarea>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Liquido Amniótico</label>
                          <textarea name="liquido_amniotico2" class="form-control" rows="3" placeholder=""></textarea>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Cordon umbilical</label>
                          <textarea name="cordon_umbilical" class="form-control" rows="3" placeholder=""></textarea>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Conclusión Notas o comentarios</label>
                          <textarea name="conclusion" class="form-control" rows="3" placeholder="Notas y Comentarios"></textarea>
                        </div>
                      </div>
                    </div>

                    <div class="box-header with-border text-center">
                      <h1 class="box-title">Información de facturación</h1>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-horizontal">
                          <label class="col-md-5 control-label">Monto de abono o pago</label>
                          <div class="col-md-6">
                            <input type="text" class="form-control" name="abono2" id="abono" min="1" placeholder="">
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group col-md-12"><hr style="border-color:blue;"></div>
                    <br>


                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Diagnóstico</label>
                          <textarea class="form-control"  name="diagnostico2" placeholder="" rows="3" ></textarea>
                        </div>
                      </div>
                    </div>
                    <br>
                    <br>
                    <br>

              




         <div class="box-header with-border text-center">
                      <h1 class="box-title">Anexar Imagenes</h1>
                    </div>
                    <br>


                  <div class="submit_container" id="gallery_imagesup" >
                  <div class="submit_container_header">Galería de imágenes( <span style="color: red;">Nota: Luego de Añadir las Imagenes, Presionar Start Upload</span>)</div>
                  <div id="upload-container">                 
                    <div id="example" class="prob">

                      <div id="uploader">
                        <p>Su buscador no tiene Flash, Silverlight o no soporta HTML5.</p>
                      </div>




                      
                      <script type="text/javascript">
                      // Initialize the widget when the DOM is ready
                      $(function() {
                        $("#uploader").plupload({
                          // General settings
                          runtimes : 'html5,flash,silverlight,html4',
                          url : "subida1.php",
                      
                          // Maximum file size
                          max_file_size : '2mb',
                      
                          chunk_size: '1mb',
                      
                          // Resize images on clientside if we can
                          resize : {
                            width : 813, 
                            height : 467, 
                            quality : 90,
                            crop: false // crop to exact dimensions
                          },
                      
                          // Specify what files to browse for
                          filters : [
                            {title : "Image files", extensions : "jpg,jpeg,gif,png"}/*,
                            {title : "Zip files", extensions : "zip,avi"}*/
                          ],
                      
                          // Rename files by clicking on their titles
                          rename: true,
                          
                          // Sort files
                          sortable: true,
                      
                          // Enable ability to drag'n'drop files onto the widget (currently only HTML5 supports that)
                          dragdrop: true,
                      
                          // Views to activate
                          views: {
                            list: true,
                            thumbs: true, // Show thumbs
                            active: 'thumbs'
                          },
                      
                          // Flash settings
                          flash_swf_url : '/plupload/js/Moxie.swf',
                        
                          // Silverlight settings
                          silverlight_xap_url : '/plupload/js/Moxie.xap'
                        });
                      });
                      </script>
                    </div>  
                  </div>
                  <span id="message-galeriap" style="display: none; color:red;"> No hay imágenes para la galería</span> </br>
                  - Formatos permitidos: jpg, jpeg, png, gif (Tamaño máximo: 2Mb)
                
                </div>











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
                          <center><input type="submit" class="btn btn-block btn-primary btn-medium" value=" G u a r d a r"></center>
                        </div>
                      </div>

                      <input type="hidden"  name="tipo_cliente"   valur="1">
                    </div>



</form>












              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>




<?php include("footer.php")?>
           <!--Fotos-->
        <script type="text/javascript" src="upload/js/jquery-ui.min.js" charset="UTF-8"></script>
        <script type="text/javascript" src="upload/plupload/js/plupload.full.min.js" charset="UTF-8"></script>
        <script type="text/javascript" src="upload/plupload/js/jquery.ui.plupload/jquery.ui.plupload.min.js" charset="UTF-8"></script>