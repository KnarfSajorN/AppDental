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
      $("#servicio7").hide();
    }
  
    if (id == "servicio2") 
    {
      $("#servicio1").hide();
      $("#servicio2").show();
      $("#servicio3").hide();
      $("#servicio4").hide();
      $("#servicio5").hide();
      $("#servicio6").hide();
      $("#servicio7").hide();
      
    }
  
    if (id == "servicio3") {
      $("#servicio1").hide();
      $("#servicio2").hide();
      $("#servicio3").show();
      $("#servicio4").hide();
      $("#servicio5").hide();
      $("#servicio6").hide();
      $("#servicio7").hide();
     
    }

    if (id == "servicio4") 
    {
      $("#servicio1").hide();
      $("#servicio2").hide();
      $("#servicio3").hide();
      $("#servicio4").show();
      $("#servicio5").hide();
      $("#servicio6").hide();
      $("#servicio7").hide();
       
    }

    if (id == "servicio5") 
    { 
      $("#servicio1").hide();
      $("#servicio2").hide();
      $("#servicio3").hide();
      $("#servicio4").hide();
      $("#servicio5").show();
      $("#servicio6").hide();
      $("#servicio7").hide();
     
    }

    if (id == "servicio6") 
    {
      $("#servicio1").hide();
      $("#servicio2").hide();
      $("#servicio3").hide();
      $("#servicio4").hide();
      $("#servicio5").hide();
      $("#servicio6").show();
      $("#servicio7").hide();
      
    }

    if (id == "servicio7") 
    {
      $("#servicio1").hide();
      $("#servicio2").hide();
      $("#servicio3").hide();
      $("#servicio4").hide();
      $("#servicio5").hide();
      $("#servicio6").hide();
      $("#servicio7").show();
      
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
<div class="content-wrapper p-3">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Procedimiento</h1>
    <ol class="breadcrumb">
      <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio </a></li>
      <li><a href="#">Procedimiento</a></li>
    </ol>
  </section>

  <section class="content">
    <div class="">
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

                 <?php echo datosPacientes($clienteId);?>

                </div>

                <div class="row">
                  <div class="col-md-12">
                    <hr>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <h4 class="card-title">Registro de Ecografías</h4>
                    <div class="form-group">
                      <select id="status" name="status" class="form-control select2" onChange="mostrar(this.value);" style="width: 80%;">
                        <option value="">Seleccione tipo...</option>
                        <option value="servicio1">Ecografía Obstétrica</option>
                        <option value="servicio2">Ecografía Morfológica</option> 
                        <option value="servicio3">Colposcopia</option> 
                        <option value="servicio4">Renal</option>
                        <option value="servicio5">Mamas</option> 
                        <option value="servicio6">Abdominal</option>
                        <option value="servicio7">Ecografía Ultra Pélvica</option>
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
                  <form action="GO_Guardar_Controles_Ecografia.php" method="POST" enctype="multipart/form-data" id="FormularioHistoriaClinica1" onsubmit="MostrarAgendarCita(this);">
                    <div class="box-header with-border text-center">
                      <h2 class="box-title">Ecografía Obstétrica</h2>
                    </div>
                    <br>
                    <input type="hidden" name="tipo_ecografia"  value="Ecografia Obstetrica">

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Feto</label>
                          <select class="form-control" name="feto"  >
                            <option value="">Seleccione..</option>
                            <option value="Único">Único</option>
                            <option value="Mùltiple">Mùltiple</option>
                          </select>
                        </div>
                      </div>
                                              <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID']?>">

                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Situación</label>
                          <select class="form-control" name="situacion">
                            <option value="">Seleccione..</option>
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
                            <option value="">Seleccione..</option>
                            <option value="Cefálica">Cefálica</option>
                            <option value="Podálica">Podálica</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Posición</label>
                          <select class="form-control" name="posicion">
                            <option value="">Seleccione..</option>
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
                            <option value="">Seleccione..</option>
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
                      <div class="col-md-6 row">
                        <div class="form-group col-md-6">
                          <label class="control-label">LCN (mm)</label>
                          <input class="form-control" type="text"  name="LCN" >
                        </div>
                        <div class="form-group col-md-6">
                          <label class="control-label">Semanas</label>
                          <input class="form-control" type="text" name="sem1" >
                        </div>
                      </div>
                      <div class="col-md-6 row">
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
                      <div class="col-md-6 row">
                        <div class="form-group col-md-6">
                          <label class="control-label">AC (mm)</label>
                          <input class="form-control" type="text" name="AC"  >
                        </div>
                        <div class="form-group col-md-6">
                          <label class="control-label">Semanas</label>
                          <input class="form-control" type="text" name="sem3" >
                        </div>
                      </div>

                      <div class="col-md-6 row">
                        <div class="form-group col-md-6">
                          <label class="control-label">SG (mm)</label>
                          <input type="text" name="SG" class="form-control" >
                        </div>
                        <div class="form-group col-md-6">
                          <label class="control-label">Semanas</label>
                          <input type="text" name="sem4" class="form-control">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6 row">
                        <div class="form-group col-md-6">
                          <label class="control-label">HC (mm)</label>
                          <input type="text" name="HC" class="form-control" >
                        </div>
                        <div class="form-group col-md-6">
                          <label class="control-label">Semanas</label>
                          <input type="text" name="sem5" class="form-control">
                        </div>
                      </div>

                      <div class="col-md-6 row">
                        <div class="form-group col-md-6">
                          <label class="control-label">LF (mm)</label>
                          <input type="text" name="LF" class="form-control" >
                        </div>
                        <div class="form-group col-md-6">
                          <label class="control-label">Semanas</label>
                          <input type="text" name="sem6" class="form-control">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6 row">
                        <div class="form-group col-md-6">
                          <label class="control-label">VV (mm)</label>
                          <input type="text" name="VV" class="form-control">
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
                          <label class="control-label">Espesor (mm)</label>
                          <input type="text" name="espesor" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Circular de cordón</label>
                          <select name="circulacion_cordon" class="form-control"  style="width: 100%;">
                            <option value="">Seleccione..</option>
                            <option value="No">No</option>
                            <option value="Si">Si</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Frecuencia Cardíaca  ( x min)</label>
                          <input type="text" name="frecuencia_cardiaca" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Líquido Amniótico ILA (cm)</label>
                          <input type="text" name="liquido_amniotico"  class="form-control" >
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Placenta</label>
                          <select   name="placenta" class="form-control">
                            <option value="">Seleccione..</option>
                            <option value="Anterior">Anterior</option>
                            <option value="Posterior">Posterior</option>
                            <option value="Previa">Previa</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Grado</label>
                          <select   name="grado" class="form-control"  style="width: 100%;">
                            <option value="">Seleccione..</option>
                            <option value="I">I</option>
                            <option value="II">II</option>
                            <option value="III">III</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label"> Malformaciones Fetales</label>
                          <select   name="malformaciones_fetales" class="form-control">
                            <option value="">Seleccione..</option>
                            <option value="No">No</option>
                            <option value="Si">Si</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Sexo</label>
                          <select   name="sexo" class="form-control">
                            <option value="">Seleccione..</option>
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
                          <div class="col-md-12">
                            <input type="text" class="form-control" name="abono" id="abono" min="1" placeholder="">
                          </div>
                        </div>
                      </div>
                    </div>
                              


                    <div class="form-group col-md-12 ciclos"><hr style="border-color:blue;"></div>
                    <h3 style="text-align: center;">Ciclos de Embarazo </h3>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Útero</label>
                          <input type="text" name="Utero_C" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Endometrio</label>
                          <input type="text" name="Endometrio_C" class="form-control">
                        </div>
                      </div>



                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Saco Gestacional</label>
                          <input type="text" name="Saco_Gestional_C" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Embrión</label>
                          <input type="text" name="Embrion_C" class="form-control">
                        </div>
                      </div>


                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Hallazgos</label>
                          <textarea class="form-control" id="Hallazgos" name="Hallazgos_C" placeholder="Hallazgos" rows="3" ></textarea>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Diagnóstico</label>
                          <textarea class="form-control" id="Diagnostico" name="Diagnostico_C" placeholder="Diagnostico" rows="3" ></textarea>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Imagenes</label>
                          <input type="file" class="form-control" id="Imagenes" name="ImagenesHistoriaEcografias[]" multiple></textarea>
                        </div>
                      </div>
                          

                    </div>

                    <div class="form-group col-md-12"><hr style="border-color:blue;"></div>

                    
          <br>
         
 
                                                                                         
            <div class="col-md-12">
                <h4 class="text-center">Cargar Archivos</h4>
                <div class="form-group col-md-12">
                <label class="col-md-5 control-label">Nombre Archivo</label>
                <input type="text" class="form-control" id="Descripcion" name="descripcion" placeholder="Descripcion" >
              </div>
              <div class="col-md-12">
              
            <div class="form-group">
              <label class="col-sm-2 control-label">Archivos</label>
              <div class="col-sm-12">
                <input type="file" class="form-control" id="archivo[]" name="archivo[]" multiple="">
              </div>

  </div>   </div>   </div>

                    <!--<div class="form-group col-md-12"><hr style="border-color:blue;"></div>
                    <br>

                    <div class="box-header with-border text-center">
                      <h1 class="box-title">Anexar Imagenes</h1>
                    </div>
                    <br>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Imagen 1</label>
                          <input type="file" id="to5" name="imagen1" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Imagen 2</label>
                          <input type="file" name="imagen2" class="form-control">
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Imagen 3</label>
                          <input type="file" name="imagen3" class="form-control">
                        </div>
                      </div>
                     
                    </div>-->

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Diagnóstico General</label>
                          <textarea class="form-control" id="procedimiento" name="diagnostico" placeholder="Procedimiento" rows="3" ></textarea>
                        </div>
                      </div>
                    </div>
                    <br>

                    <div class="row">
                      <!--
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
                      </div>-->

                      


                      <!--
                      <input  type="hidden" name="email" value="<?php echo $correo_cliente;?>">
                      <input  type="hidden" name="nombre"  value="<?php echo $nombre_cliente;?>">
                      <input  type="hidden" name="telefono"  value="<?php echo $telefono_cliente ;?>">-->
                      <input  type="hidden" name="ID"  value="<?php echo $_SESSION['ID']?>">
                      <input  type="hidden" name="clienteId"  value="<?php echo $clienteId?>">
                      <input  type="hidden" name="NOMBRE_USUARIO"  value="<?php echo $_SESSION['NOMBRE_USUARIO']?>">
                      
                      <div id="DatosDeAgendamientoModal"></div>

                      <input type="checkbox" id="Agendamiento_Modal" value="1"> Usar Agendamiento?  
                      <div align="center" class="col-md-12"> 
                        <br><br><br>
                        <div class="col-md-12">
                          <br><br>
                          <center><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow"> <h2> <strong>  G u a r d a r  </strong> </h2> </button></center>
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
                  <form action="GO_Guardar_Controles_Ecografia.php" method="POST" enctype="multipart/form-data" id="FormularioHistoriaClinica2" onsubmit="MostrarAgendarCita(this);">
                    <div class="box-header with-border text-center">
                      <h2 class="box-title">Ecografía Morfológica</h2>
                    </div>
                    <br>

                    <div class="box-header with-border">
                      <h2 class="box-title">La Imagen Ultrasonográfica Muestra</h2>
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
                      <div class="col-md-6 row">
                        <div class="form-group col-md-6">
                          <label class="control-label">BPD-Diámetro Biparietal (mm)</label>
                          <input type="text" name="BPD" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                          <label class="control-label">Semanas</label>
                          <input type="text" name="sema1" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6 row">
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
                      <div class="col-md-6 row">
                        <div class="form-group col-md-6">
                          <label class="control-label">AC-Circunferencia Abdominal (mm)</label>
                          <input type="text" name="AC2" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                          <label class="control-label">Semanas</label>
                          <input type="text" name="sema3" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6 row">
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
                      <div class="col-md-6 row">
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
                          <label class="control-label" for="inputSuccess">Cráneo</label>
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
                          <label class="control-label" for="inputSuccess">Sistema Músculo-Esquelético</label>
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
                          <label class="control-label" for="inputSuccess">Líquido Amniótico</label>
                          <textarea name="liquido_amniotico2" class="form-control" rows="3" placeholder=""></textarea>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Cordón Umbilical</label>
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
                          <div class="col-md-12">
                            <input type="text" class="form-control" name="abono2" id="abono" min="1" placeholder="">
                          </div>
                        </div>
                      </div>
                    </div>

                    <!--<div class="form-group col-md-12"><hr style="border-color:blue;"></div>
                    <br>

                    <div class="box-header with-border text-center">
                      <h1 class="box-title">Anexar Imagenes</h1>
                    </div>
                    <br>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Imagen 1</label>
                          <input type="file" id="to5" name="imagen11" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Imagen 2</label>
                          <input type="file" name="imagen22" class="form-control">
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Imagen 3</label>
                          <input type="file" name="imagen33" class="form-control">
                        </div>
                      </div>
                    </div>-->       
                    
                    





                    <div class="form-group col-md-12 ciclos"><hr style="border-color:blue;"></div>
                    <h3 style="text-align: center;">Ciclos de Embarazo </h3>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Útero</label>
                          <input type="text" name="Utero_C" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Endometrio</label>
                          <input type="text" name="Endometrio_C" class="form-control">
                        </div>
                      </div>



                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Saco Gestacional</label>
                          <input type="text" name="Saco_Gestional_C" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Embrión</label>
                          <input type="text" name="Embrion_C" class="form-control">
                        </div>
                      </div>


                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Hallazgos</label>
                          <textarea class="form-control" id="Hallazgos" name="Hallazgos_C" placeholder="Hallazgos" rows="3" ></textarea>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Diagnóstico</label>
                          <textarea class="form-control" id="Diagnostico" name="Diagnostico_C" placeholder="Diagnostico" rows="3" ></textarea>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Imagenes</label>
                          <input type="file" class="form-control" id="Imagenes" name="ImagenesHistoriaEcografias[]" multiple></textarea>
                        </div>
                      </div>
                          

                    </div>

                    <div class="form-group col-md-12"><hr style="border-color:blue;"></div>



          <br>
         
 
                                                                                         
            <div class="col-md-12">
                <h4 class="text-center">Cargar Archivos</h4>
                <div class="form-group col-md-12">
                <label class="col-md-5 control-label">Nombre Archivo</label>
                <input type="text" class="form-control" id="Descripcion" name="descripcion" placeholder="Descripcion" >
              </div>
              <div class="col-md-12">
              

            
            <div class="form-group">
              <label class="col-sm-2 control-label">Archivos</label>
              <div class="col-sm-12">
                <input type="file" class="form-control" id="archivo[]" name="archivo[]" multiple="">
              </div>

  </div>   </div>   </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Diagnóstico General</label>
                          <textarea class="form-control"  name="diagnostico2" placeholder="" rows="3" ></textarea>
                        </div>
                      </div>
                    </div>
                    <br>
                    <br>
                    <br>

                    
                    


                    <div class="row">
                      
                      <!--
                      <input  type="hidden" name="email" value="<?php echo $correo_cliente;?>">
                      <input  type="hidden" name="nombre"  value="<?php echo $nombre_cliente;?>">
                      <input  type="hidden" name="telefono"  value="<?php echo $telefono_cliente ;?>">-->
                      <input  type="hidden" name="ID"  value="<?php echo $_SESSION['ID']?>">
                      <input  type="hidden" name="clienteId"  value="<?php echo $clienteId?>">
                      <input  type="hidden" name="NOMBRE_USUARIO"  value="<?php echo $_SESSION['NOMBRE_USUARIO']?>">
                      
                      <div id="DatosDeAgendamientoModal"></div>

                    <input type="checkbox" id="Agendamiento_Modal" value="1"> Usar Agendamiento?  

                      <div align="center" class="col-md-12"> 
                        <br><br><br>
                        <div class="col-md-12">
                          <br><br>
                          <center><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow"> <h2> <strong>  G u a r d a r  </strong> </h2> </button></center>
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
                  <form action="GO_Guardar_Controles_Ecografia.php" method="POST" enctype="multipart/form-data" id="FormularioHistoriaClinica3" onsubmit="MostrarAgendarCita(this);">
                    <div class="box-header with-border text-center">
                      <h2 class="box-title">Colposcopia</h2>
                    </div>
                    <br>

                      <!-- *********************************** Tratamiento laser  ********************************************** -->

                    <input  type="hidden" name="tipo_ecografia"  value="Ecografia Colposcopia">

                    <div class="row">
                      <div class="col-md-12">
                        <table class="table table-bordered" >
                          <tr >
                            <th colspan="2" class="text-center">Resultado PVH</th>
                            <th colspan="4" class="text-center">Resultado de Citología</th>
                          </tr>
                          <tr>
                            <td>
                              Negativo: <input type="radio" name="PVH" value="Negativo">
                            </td>
                            <td>
                               Positivo: <input type="radio" name="PVH" value="Positivo">
                            </td>
                            <td>
                              <label class="control-label">ASC-US:
                                Si <input type="radio" name="ASC_US" value="Si"> &nbsp; No <input type="radio" name="ASC_US" value="No">
                              </label>
                            </td>
                            <td>
                              <label class="control-label">LIE BG:
                                Si <input type="radio" name="LIE_BG" value="Si"> &nbsp; No <input type="radio" name="LIE_BG" value="No">
                              </label>
                            </td>
                            <td>
                              <label class="control-label">LIE AG:
                                Si <input type="radio" name="LIE_AG" value="Si"> &nbsp; No <input type="radio" name="LIE_AG" value="No">
                              </label>
                            </td>
                            <td>
                              <label class="control-label">Carcinoma:
                                Si <input type="radio" name="carcinoma" value="Si"> &nbsp; No <input type="radio" name="carcinoma" value="No">
                              </label>
                            </td>
                          </tr>
                        </table>
                      </div>

                      <div class="col-md-6">
                        <table class="table table-bordered" >
                          <tr >
                            <th colspan="2" class="text-center">IVAA Inspección Visual con Ácido Acético</th>
                          </tr>

                          <tr>
                            <td>
                              Negativo: <input type="radio" name="IVAA" value="Negativo"  >
                            </td>
                            <td>
                               Positivo: <input type="radio" name="IVAA" value="Positivo"  >
                            </td>
                          </tr>
                          <tr>
                            <td colspan="2">
                              Aceto Blanco Rápido: <input type="radio" name="IVAA2" value="Aceto Blanco Rápido - Menor a 15 Segundos" >  Menor a 15 Segundos
                            </td>
                          </tr>
                          <tr>
                            <td colspan="2">
                              Aceto Blando Duradero: <input type="radio" name="IVAA2" value="Aceto Blando Duradero - Más de 120 Segundos"  >  Más de 120 Segundos
                            </td>
                          </tr>
                        </table>
                      </div>
                      <div class="col-md-6">
                        <table class="table table-bordered" >
                          <tr >
                            <th class="text-center">Tipos de Zona de Transformación</th>
                          </tr>

                          <tr>
                            <td>
                              I UEC Completamente Visible: <input type="radio" name="Tipos_Sona_T" value="I UEC Completamente Visible"  >
                            </td>
                          </tr>
                          <tr>
                            <td>
                              II UEC Parcialmente Visible: <input type="radio" name="Tipos_Sona_T" value="II UEC Parcialmente Visible"  >
                            </td>
                          </tr>
                          <tr>
                            <td>
                              III UEC No Visible: <input type="radio" name="Tipos_Sona_T" value="III UEC No Visible"  >
                            </td>
                          </tr>
                        </table>
                      </div>

                      <div class="col-md-6">
                        <table class="table table-bordered" >
                          <tr >
                            <th colspan="2" class="text-center">Test de SHILLER</th>
                          </tr>
                          <tr>
                            <td>
                              Negativo: <input type="radio" name="SHILLER" value="Negativo" >
                            </td>
                            <td>
                               Positivo: <input type="radio" name="SHILLER" value="Positivo" >
                            </td>
                          </tr>
                        </table>

                        <table class="table table-bordered" >
                          <tr >
                            <th colspan="2" class="text-center">Cérvix</th>
                          </tr>
                          <tr>
                            <td>
                              Biopsia: Si <input type="radio" name="biopsia" value="Si" > &nbsp; No <input type="radio" name="biopsia" value="No" >
                            </td>
                            <td>
                              Curetaje: Si <input type="radio" name="curetaje" value="Si" > &nbsp; No <input type="radio" name="curetaje" value="No" >
                            </td>
                          </tr>
                        </table>
                      </div>

                      <div class="col-md-6">
                        <table class="table table-bordered" >
                          <tr><th colspan="2" class="text-center">Tamaño de la Lesión</th></tr>
                          <tr>
                            <td>Número de Cuadrantes: </td>
                            <td><input type="text" class="form-control" name="tam_les"  placeholder=""></td>
                          </tr>
                          <tr>
                            <td>Porcentaje de Cérvix: </td>
                            <td><input type="text" class="form-control" name="por_cervix"  placeholder=""></td>
                          </tr>
                        </table>
                      </div>

                      <br>
                      <div class="col-md-12"><hr style="border-color:blue;"></div>

                      <div class="col-md-12">
                        <div class="box-header with-border">
                          <h1 class="box-title">Hallazgos Colposcópicos</h1>
                        </div>
                      </div>
                      
                      <div class="col-md-12">
                        <table class="table table-bordered" >
                          <tr >
                            <th colspan="2" class="text-center">Hallazgos Normales</th>
                          </tr>
                          
                          <tr>
                            <td>
                              Epitelio Escamoso Original:
                              Maduro <input type="radio" name="epit_esca_original" value="Maduro" >
                              Atrófico <input type="radio" name="epit_esca_original" value="Atrofico" >
                            </td>
                            <td>
                              Epitelio Columnar:
                              Ectópico <input type="radio" name="epitelio_columnar" value="Ectópico" >
                              Ectropión <input type="radio" name="epitelio_columnar" value="Ectropion" >
                            </td>
                          </tr>
                          <tr>
                            <td>
                              Epitelio Escamoso Metaplasico: Si <input type="radio" name="epitelio_escamoso_metaplasico" value="Si"  > &nbsp; No <input type="radio" name="epitelio_escamoso_metaplasico" value="No"  >
                            </td>
                            <td>
                              Criptas Abiertas: Si <input type="radio" name="criptas_abiertas" value="Si" > &nbsp; No <input type="radio" name="criptas_abiertas" value="No" >
                            </td>
                          </tr>
                           <tr>
                            <td colspan="2">
                              Deciduosis del Embarazo: Si <input type="radio" name="deciduosis" value="Si" > &nbsp; No <input type="radio" name="deciduosis" value="No" >
                            </td>
                            
                          </tr>
                        </table>
                      </div>

                      <div class="col-md-12">
                        <table class="table table-bordered" >
                          <tr>
                            <th colspan="2" class="text-center">Hallazgos Anormales</th>
                          </tr>
                        </table>
                      </div>

                      <div class="col-md-6">
                        <table class="table table-bordered" >
                          <tr >
                            <th colspan="2" class="text-center">LIE Bajo Grado</th>
                          </tr>
                          <tr>
                            <td colspan="2">
                              Epitelio Aceto Blanco Delgado: Si <input type="radio" name="epitelioAcetoBlancoDelgado" value="Si"  > &nbsp; No <input type="radio" name="epitelioAcetoBlancoDelgado" value="No"  >
                            </td>
                          </tr>
                          <tr>
                            <td colspan="2">
                              Borde Irregular: Si <input type="radio" name="borde_irregular" value="Si"  > &nbsp; No <input type="radio" name="borde_irregular" value="No"  >
                            </td>
                          </tr>
                          <tr>
                            <td colspan="2">
                              Mosaico Fino: Si <input type="radio" name="mosaico_fino" value="Si" > &nbsp; No <input type="radio" name="mosaico_fino" value="No" >
                            </td>
                          </tr>
                          <tr>
                            <td colspan="2">
                              Punteado Fino: Si <input type="radio" name="punteado_fino" value="Si" > &nbsp; No <input type="radio" name="punteado_fino" value="No" > 
                            </td>
                          </tr>
                          <tr><th colspan="2" class="text-center">Lesiones No Específicas</th></tr>
                          <tr>
                            <td>
                             Leucoplasia: Si <input type="radio" name="leucoplasia" value="Si" > &nbsp; No <input type="radio" name="leucoplasia" value="No" > 
                            </td>
                            <td>
                             Erosión: Si <input type="radio" name="erosion" value="Si" > &nbsp; No <input type="radio" name="erosion" value="No" > 
                            </td>
                          </tr>
                          <tr>
                            <td colspan="2">
                             Shiller: Si <input type="radio" name="shiller1" value="Si" > &nbsp; No <input type="radio" name="shiller1" value="No" > 
                            </td>
                          </tr>
                        </table>
                      </div>

                      <div class="col-md-6">
                        <table class="table table-bordered" >
                          <tr >
                            <th class="text-center">LIE Alto Grado</th>
                          </tr>
                          <tr>
                            <td>
                              Epitelio Aceto Blanco Grueso: Si <input type="radio" name="epitelioAcetoBlancoGrueso" value="Si" > &nbsp; No <input type="radio" name="epitelioAcetoBlancoGrueso" value="No" >
                            </td>
                          </tr>
                          <tr>
                            <td>
                              Menor a 15 Segundos: Si <input type="radio" name="menor15seg" value="Si" > &nbsp; No <input type="radio" name="menor15seg" value="No" >
                            </td>
                          </tr>
                          <tr>
                            <td>
                              Más de 120 Segundos:  Si <input type="radio" name="mas120seg" value="Si" > &nbsp; No <input type="radio" name="mas120seg" value="No" >
                            </td>
                          </tr>
                          <tr>
                            <td>
                              Mosaico Grueso: Si <input type="radio" name="mosaico_grueso" value="Si" > &nbsp; No <input type="radio" name="mosaico_grueso" value="No" > 
                            </td>
                          </tr>
                          <tr>
                            <td>
                             Punteado Grueso: Si <input type="radio" name="punteado_grueso" value="Si" > &nbsp; No <input type="radio" name="punteado_grueso" value="No" > 
                            </td>
                          </tr>
                          <tr>
                            <td>
                              Signo del Limite del Borde Interno: Si <input type="radio" name="signolimiteBorderInterno" value="Si" > &nbsp; No <input type="radio" name="signolimiteBorderInterno" value="No" > 
                            </td>
                          </tr>
                          <tr>
                            <td>
                              Signo de la Cresta: Si <input type="radio" name="signoCresta" value="Si" > &nbsp; No <input type="radio" name="signoCresta" value="No" >
                            </td>
                          </tr>
                        </table>
                      </div>

                      <div class="col-md-12">
                        <table class="table table-bordered" >
                          <tr>
                            <th colspan="4" class="text-center">Signos de Invasión</th>
                          </tr>
                          <tr>
                            <td>Vasos Atípicos: Si <input type="radio" name="vasosAtipicos" value="Si" > &nbsp; No <input type="radio" name="vasosAtipicos" value="No" ></td>
                            <td>Superficie Irregular: Si <input type="radio" name="superficieIrregular" value="Si" > &nbsp; No <input type="radio" name="superficieIrregular" value="No" ></td>
                            <td>Necrosis: Si <input type="radio" name="necrosis" value="Si" > &nbsp; No <input type="radio" name="necrosis" value="No" ></td>
                            <td>Tumor: Si <input type="radio" name="tumor" value="Si" > &nbsp; No <input type="radio" name="tumor" value="No" ></td>
                          </tr>
                          <tr>
                            <td>Vasos Frágiles: Si <input type="radio" name="vasosFragiles" value="Si" > &nbsp; No <input type="radio" name="vasosFragiles" value="No" ></td>
                            <td>Lesión Exofítica: Si <input type="radio" name="lesionExofitica" value="Si" > &nbsp; No <input type="radio" name="lesionExofitica" value="No" ></td>
                            <td colspan="2">Ulceración: Si <input type="radio" name="ulceracion" value="Si" > &nbsp; No <input type="radio" name="ulceracion" value="No" ></td>
                          </tr>
                        </table>
                      </div>

                      <div class="col-md-12">
                        <table class="table table-bordered" >
                          <tr>
                            <th colspan="5" class="text-center">Resultados de Biopsia</th>
                          </tr>
                          <tr>
                            <td>Negativo: Si <input type="radio" name="resultadoBiopsia" value="Si" > &nbsp; No <input type="radio" name="resultadoBiopsia" value="No" ></td>
                            <td>NIC I: Si <input type="radio" name="NIC_I" value="Si" > &nbsp; No <input type="radio" name="NIC_I" value="No" ></td>
                            <td>NIC II: Si <input type="radio" name="NIC_II" value="Si" > &nbsp; No <input type="radio" name="NIC_II" value="No" ></td>
                            <td>NIC III: Si <input type="radio" name="NIC_III" value="Si" > &nbsp; No <input type="radio" name="NIC_III" value="No" ></td>
                            <td>CIS: Si <input type="radio" name="CIS" value="Si" > &nbsp; No <input type="radio" name="CIS" value="No" ></td>
                          </tr>
                          <tr>
                            <td>CA Invasor: Si <input type="radio" name="CA_Invasor" value="Si" > &nbsp; No <input type="radio" name="CA_Invasor" value="No" ></td>
                            <td>Adenosis: Si <input type="radio" name="Adenosis" value="Si" > &nbsp; No <input type="radio" name="Adenosis" value="No" ></td>
                            <td>Adeno CA Invasor: Si <input type="radio" name="adeno_CAInvasor" value="Si" > &nbsp; No <input type="radio" name="adeno_CAInvasor" value="No" ></td>
                            <td colspan="2">Otros: <input type="radio" name="otros"  value="otros" ></td>
                          </tr>
                        </table>
                      </div>

                      <div class="col-md-12">
                        <table class="table table-bordered" >
                          <tr>
                            <th colspan="2" class="text-center">Tratamiento</th>
                          </tr>
                          <tr>
                            <td>Crioterapia: Si <input type="radio" name="crioterapia" value="Si" > &nbsp; No <input type="radio" name="crioterapia" value="No" ></td>
                            <td>
                              <div class="form-horizontal">
                                <label class="col-md-3 control-label">Fecha: </label>
                                <div class="col-md-12">
                                  <input type="date" class="form-control" name="fecha_crioterapia" >
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              Escisión:<br>
                              Tipo I - Reseca completamente la ectocervix <input type="radio" name="escision" value="Tipo I - Reseca completamente la ectocervix" >  <br>
                              Tipo II - Reseca la zona de transformación y una pequeña cantidad de epitelio endocervical <input type="radio" name="escision" value="Tipo II - Reseca la zona de transformación y una pequeña cantidad de epitelio endocervical" > <br>
                              Tipo III . Reseca endocervical <input type="radio" name="escision" value="Tipo III - Reseca endocervical" > 
                            </td>


                            <td>
                              <div class="form-horizontal">
                                <label class="col-md-3 control-label">Fecha: </label>
                                <div class="col-md-12">
                                  <input type="date" class="form-control" name="fecha_escision" >
                                </div>
                              </div>
                            </td>
                          </tr>
                        </table>
                      </div>
                    </div>

                    <!--<div class="form-group col-md-12"><hr style="border-color:blue;"></div>
                    <br>

                    <div class="box-header with-border text-center">
                      <h1 class="box-title">Anexar Imagenes</h1>
                    </div>
                    <br>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Imagen 1</label>
                          <input type="file" id="to5" name="imagen_1" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Imagen 2</label>
                          <input type="file" name="imagen_2" class="form-control">
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Imagen 3</label>
                          <input type="file" name="imagen_3" class="form-control">
                        </div>
                      </div>
                     
                    </div>-->

                    <div class="form-group col-md-12 ciclos"><hr style="border-color:blue;"></div>
                    <h3 style="text-align: center;">Ciclos de Embarazo </h3>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Útero</label>
                          <input type="text" name="Utero_C" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Endometrio</label>
                          <input type="text" name="Endometrio_C" class="form-control">
                        </div>
                      </div>



                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Saco Gestacional</label>
                          <input type="text" name="Saco_Gestional_C" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Embrión</label>
                          <input type="text" name="Embrion_C" class="form-control">
                        </div>
                      </div>


                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Hallazgos</label>
                          <textarea class="form-control" id="Hallazgos" name="Hallazgos_C" placeholder="Hallazgos" rows="3" ></textarea>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Diagnóstico</label>
                          <textarea class="form-control" id="Diagnostico" name="Diagnostico_C" placeholder="Diagnostico" rows="3" ></textarea>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Imagenes</label>
                          <input type="file" class="form-control" id="Imagenes" name="ImagenesHistoriaEcografias[]" multiple></textarea>
                        </div>
                      </div>
                          

                    </div>

                    <div class="form-group col-md-12"><hr style="border-color:blue;"></div>

                    
                                
          <br>
         
 
                                                                                         
            <div class="col-md-12">
                <h4 class="text-center">Cargar Archivos</h4>
                <div class="form-group col-md-12">
                <label class="col-md-5 control-label">Nombre Archivo</label>
                <input type="text" class="form-control" id="Descripcion" name="descripcion" placeholder="Descripcion" >
              </div>
              <div class="col-md-12">
              

            
            <div class="form-group">
              <label class="col-sm-2 control-label">Archivos</label>
              <div class="col-sm-12">
                <input type="file" class="form-control" id="archivo[]" name="archivo[]" multiple="">
              </div>

  </div>   </div>   </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Diagnóstico General</label>
                          <textarea class="form-control"  name="diagnostico3" placeholder="" rows="3" ></textarea>
                        </div>
                      </div>
                    </div>
                    <br>
                    <br>



                    <div class="row">
                      
                      <!--
                      <input  type="hidden" name="email" value="<?php echo $correo_cliente;?>">
                      <input  type="hidden" name="nombre"  value="<?php echo $nombre_cliente;?>">
                      <input  type="hidden" name="telefono"  value="<?php echo $telefono_cliente ;?>">-->
                      <input  type="hidden" name="ID"  value="<?php echo $_SESSION['ID']?>">
                      <input  type="hidden" name="clienteId"  value="<?php echo $clienteId?>">
                      <input  type="hidden" name="NOMBRE_USUARIO"  value="<?php echo $_SESSION['NOMBRE_USUARIO']?>">
                      
                      <div id="DatosDeAgendamientoModal"></div>

                    <input type="checkbox" id="Agendamiento_Modal" value="1"> Usar Agendamiento?  

                      <div align="center" class="col-md-12"> 
                        <br><br><br>
                        <div class="col-md-12">
                          <br><br>
                          <center><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow"> <h2> <strong>  G u a r d a r  </strong> </h2> </button></center>
                        </div>
                      </div>

                      <input type="hidden"  name="tipo_cliente"   valur="1">
                    </div>
                  </form>
                </div>

                <!-- 

                   FIN DE ECOGRAFÍA COLPOSCOPIA

                -->

                
                <!-- 

                   ECOGRAFÍA RENAL

                -->

                <div id="servicio4" class="panel box box-secundary element" style="display: none;">
                  <form action="GO_Guardar_Controles_Ecografia.php" method="POST" enctype="multipart/form-data" id="FormularioHistoriaClinica4" onsubmit="MostrarAgendarCita(this);">
                    <div class="box-header with-border text-center">
                      <h2 class="box-title">Renal</h2>
                    </div>
                    <br>
                    <input  type="hidden" name="tipo_ecografia"  value="Ecografia Renal">

                    <?php $idUsuario = $_SESSION['ID']; ?>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Riñón Izquierdo</label>
                          <textarea class="form-control"  rows="5" placeholder="" name="rinon_izquierdo">
De situación y movilidad           , de          mm de longitud (V.N=90-130mm), de bordes            , y a los cortes ecográficos su parénquima es        ,      se aprecian imagenes expansivas,        se aprecia dilatación de sistema pielocalicial.
Parenquima renal de aspecto       y corteza de tamaño       mm.(V.N=9-11mm),        se aprecian imágenes litiasicas en su interior.
Relación cortico medular:    </textarea>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Riñón Derecho</label>
                          <textarea class="form-control"  rows="5" placeholder="" name="rinon_derecho">
De situación y movilidad           , de          mm de longitud (V.N=90-130mm), de bordes            , y a los cortes ecográficos su parénquima es        ,      se aprecian imagenes expansivas,        se aprecia dilatación de sistema pielocalicial.
Parenquima renal de aspecto       y corteza de tamaño       mm.(V.N=9-11mm),        se aprecian imágenes litiasicas en su interior.
Relación cortico medular:    </textarea>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Vejiga</label>
                          <textarea class="form-control"  rows="5" placeholder="" name="vejiga">
Paredes de aspecto      , de     mm de espesor       se aprecian imágenes invasivas ni infiltrativas, Volumen  Pre miccional    cc, Volumen Post Miccional    cc.</textarea>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Próstata</label>
                          <textarea class="form-control"  rows="5" placeholder="" name="prostata">
Aspecto ecográfico   , volumen    cc (V.N=20cc), peso    gramos (V.N=20gr)</textarea>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Vesículas Seminales Visibles:</label>
                          <select class="form-control" name="vesicula_seminales_visibles">
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Cuerpos Amiláceos Visibles:</label>
                          <select class="form-control" name="cuerpos_amilaceos_visibles" >
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Zona Periférica</label>
                          <input type="text" class="form-control"  placeholder="" name="zona_perifericas">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Zona de Transición</label>
                          <input type="text" class="form-control"  placeholder="" name="zona_de_transicion">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Zona Central:</label>
                          <input type="text" class="form-control"  placeholder="" name="zona_central">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Conclusiones del Informe</label>
                          <textarea class="form-control" id="procedimiento" name="conclusiones" placeholder="Procedimiento" rows="3" ></textarea>
                        </div>
                      </div>
                    </div>

                    <!--<div class="form-group col-md-12"><hr style="border-color:blue;"></div>
                    <br>

                    <div class="box-header with-border text-center">
                      <h1 class="box-title">Anexar Imagenes</h1>
                    </div>
                    <br>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Imagen 1</label>
                          <input type="file" id="to5" name="to5" class="form-control" name="imagen-1" >
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Imagen 2</label>
                          <input type="file" name="imagen3" class="form-control" name="imagen-2">
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Imagen 3</label>
                          <input type="file" name="imagen3" class="form-control" name="imagen-3">
                        </div>
                      </div>
                     
                    </div>-->    
                    
                    
                    <div class="form-group col-md-12 ciclos"><hr style="border-color:blue;"></div>
                    <h3 style="text-align: center;">Ciclos de Embarazo </h3>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Útero</label>
                          <input type="text" name="Utero_C" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Endometrio</label>
                          <input type="text" name="Endometrio_C" class="form-control">
                        </div>
                      </div>



                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Saco Gestacional</label>
                          <input type="text" name="Saco_Gestional_C" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Embrión</label>
                          <input type="text" name="Embrion_C" class="form-control">
                        </div>
                      </div>


                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Hallazgos</label>
                          <textarea class="form-control" id="Hallazgos" name="Hallazgos_C" placeholder="Hallazgos" rows="3" ></textarea>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Diagnóstico</label>
                          <textarea class="form-control" id="Diagnostico" name="Diagnostico_C" placeholder="Diagnostico" rows="3" ></textarea>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Imagenes</label>
                          <input type="file" class="form-control" id="Imagenes" name="ImagenesHistoriaEcografias[]" multiple></textarea>
                        </div>
                      </div>
                          

                    </div>

                    <div class="form-group col-md-12"><hr style="border-color:blue;"></div>


          <br>
         
 
                                                                                         
            <div class="col-md-12">
                <h4 class="text-center">Cargar Archivos</h4>
                <div class="form-group col-md-12">
                <label class="col-md-5 control-label">Nombre Archivo</label>
                <input type="text" class="form-control" id="Descripcion" name="descripcion" placeholder="Descripcion" >
              </div>
              <div class="col-md-12">
              

            
            <div class="form-group">
              <label class="col-sm-2 control-label">Archivos</label>
              <div class="col-sm-12">
                <input type="file" class="form-control" id="archivo[]" name="archivo[]" multiple="">
              </div>

  </div>   </div>   </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Diagnóstico General</label>
                          <textarea class="form-control" id="procedimiento" name="diagnostico4" placeholder="Procedimiento" rows="3" ></textarea>
                        </div>
                      </div>
                    </div>
                    <br>
                    <br>

                    <div class="row">

                    <!--
                      <input  type="hidden" name="email" value="<?php echo $correo_cliente;?>">
                      <input  type="hidden" name="nombre"  value="<?php echo $nombre_cliente;?>">
                      <input  type="hidden" name="telefono"  value="<?php echo $telefono_cliente ;?>">-->
                      <input  type="hidden" name="ID"  value="<?php echo $_SESSION['ID']?>">
                      <input  type="hidden" name="clienteId"  value="<?php echo $clienteId?>">
                      <input  type="hidden" name="NOMBRE_USUARIO"  value="<?php echo $_SESSION['NOMBRE_USUARIO']?>">
                      
                      <div id="DatosDeAgendamientoModal"></div>

                      <input type="checkbox" id="Agendamiento_Modal" value="1"> Usar Agendamiento?  


                      <div align="center" class="col-md-12"> 
                        <br><br><br>
                        <div class="col-md-12">
                          <br><br>
                          <center><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow"> <h2> <strong>  G u a r d a r  </strong> </h2> </button></center>
                        </div>
                      </div>

                      <input type="hidden"  name="tipo_cliente"   valur="1">
                    </div>
                  </form>
                </div>

                <!-- 

                   FIN DE ECOGRAFÍA RENAL

                -->

                <!-- 

                  ECOGRAFÍA MAMARIA

                -->


                <div id="servicio5" class="panel box box-secundary element" style="display: none;">
                  <form action="GO_Guardar_Controles_Ecografia.php" method="POST" enctype="multipart/form-data" id="FormularioHistoriaClinica5" onsubmit="MostrarAgendarCita(this);">
                    <div class="box-header with-border text-center">
                      <h2 class="box-title">Mamas</h2>
                    </div>
                    <br>
                    <input  type="hidden" name="tipo_ecografia"  value="Ecografia Mamaria">

                    <?php $idUsuario = $_SESSION['ID']; ?>


                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Posición</label>
                          <select class="form-control" name="posicion"  >
                            <option value="">Seleccione..</option>
                            <option value="Frontal">Frontal</option>
                            <option value="Lateral">Lateral</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <br>
                    <div class="box-header with-border">
                      <h1 class="box-title">I.- Mama Derecha</h1>
                    </div>
                    <br>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Piel</label>
                          <input type="text" name="piel" class="form-control">
                          <span class="help-block">mm de espesor N=2-3*</span>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Grasa</label>
                          <select class="form-control" name="grasa"  >
                            <option value="">Seleccione..</option>
                            <option value="Hipoecogénico">Hipoecogénico</option>
                            <option value="Hiperecogénico">Hiperecogénico</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Tejido Glandular</label>
                          <select class="form-control" name="tejido_glandular"  >
                            <option value="">Seleccione..</option>
                            <option value="Hipoecogénico">Hipoecogénico</option>
                            <option value="Hiperecogénico">Hiperecogénico</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Tejido Conectivo de Sostén</label>
                          <input type="text" name="TCS" class="form-control" >
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Conductos Mamarios</label>
                          <input type="text" name="cond_m" class="form-control"  >
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Pezón</label>
                          <select class="form-control" name="pezon"  >
                            <option value="">Seleccione..</option>
                            <option value="Hipoecogénico">Hipoecogénico</option>
                            <option value="Hiperecogénico">Hiperecogénico</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Ligamentos de Cooper</label>
                          <input type="text" name="Lig_Coo" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Costillas:<br> Hipoecogénico
                          <input type="radio" name="costillas" value="Hipoecogénico"    ></label>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="control-label">Se Observan a Intervalos Regulares en el Corte</label>
                          <input type="text" name="corte" class="form-control">
                        </div>
                      </div>
                    </div>

                    <br>

                    <div class="box-header with-border">
                      <h1 class="box-title">Masas</h1>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Presente</label>
                          <select class="form-control" name="presente_masas"  >
                            <option value="">Seleccione..</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Forma</label>
                          <select class="form-control" name="form"  >
                            <option value="">Seleccione..</option>
                            <option value="Ovalada">Ovalada</option>
                            <option value="Redondeada">Redondeada</option>
                            <option value="Irregular">Irregular</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Orientación</label>
                          <select class="form-control" name="orientacion"  >
                            <option value="">Seleccione..</option>
                            <option value="Paralela">Paralela</option>
                            <option value="Anti Paralela">Anti Paralela</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Márgenes</label>
                          <select class="form-control" name="margenes"  >
                            <option value="">Seleccione..</option>
                            <option value="Circunscritos">Circunscritos</option>
                            <option value="No Circunscritos">No Circunscritos</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Periféria</label>
                          <select class="form-control" name="periferia"  >
                            <option value="">Seleccione..</option>
                            <option value="Interfaz Abrupta">Interfaz Abrupta</option>
                            <option value="Halo Ecogénico">Halo Ecogénico</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Ecogenicidad</label>
                          <select class="form-control" name="ecogenicidad"  >
                            <option value="">Seleccione..</option>
                            <option value="Anecogenico">Anecogenico</option>
                            <option value="Hipoecogénico">Hipoecogénico</option>
                            <option value="Isoecogénico">Isoecogénico</option>
                            <option value="Hiperecogénico">Hiperecogénico</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Caracteristicas Ultrasonográfias Posteriores</label>
                          <select class="form-control" name="caracteristicas_ultrasonograficas_posteriores"  >
                            <option value="">Seleccione..</option>
                            <option value="Presente">Presente</option>
                            <option value="Ausente">Ausente</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">Tejido Adyacente</label>
                          <textarea class="form-control" rows="3" placeholder="" name="tejido_adyacente"></textarea>
                        </div>
                      </div>
                    </div>

                    <br>

                    <div class="box-header with-border">
                      <h1 class="box-title">Calcificaciones</h1>
                    </div>
                    <br>

                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Presente</label>
                          <select class="form-control" name="presente_calcificaciones"  >
                            <option value="">Seleccione..</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Macrocalcificaciones</label>
                          <select class="form-control" name="macro_calc"  >
                            <option value="">Seleccione..</option>
                            <option value="Presente">Presente</option>
                            <option value="Ausente">Ausente</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Microcalcificaciones por fuera de la masa</label>
                          <select class="form-control" name="micro_calc_fuera"  >
                            <option value="">Seleccione..</option>
                            <option value="Presente">Presente</option>
                            <option value="Ausente">Ausente</option>
                          </select>
                          <span class="help-block">Mayor a 0.5mm</span>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="control-label">Microcalcificaciones por dentro de la masa</label>
                          <select class="form-control" name="micro_calc_dentro"  >
                            <option value="">Seleccione..</option>
                            <option value="Presente">Presente</option>
                            <option value="Ausente">Ausente</option>
                          </select>
                          <span class="help-block">Menor a 0.5mm</span>
                        </div>
                      </div>
                    </div>

                    <div class="box-header with-border">
                      <h1 class="box-title">Casos Especiales</h1>
                    </div>
                    <br>

                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Micro Quistes Complicados</label>
                          <input type="text"  class="form-control" name="micro_quistes_complicados">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Quistes Complicados</label>
                          <input type="text"  class="form-control" name="quistes_complicados">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Masa en Piel</label>
                          <input type="text" class="form-control" name="masa_en_piel">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Cuerpo Extraño</label>
                          <input type="text" class="form-control" name="cuerpo_extraño">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Adenopatía Intramamaria</label>
                          <input type="text"  class="form-control" name="adenopatia_intramamaria">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Adenopatía Axilar</label>
                          <input type="text"  class="form-control" name="adenopatia_axilar" >
                        </div>
                      </div>
                    </div>

                    <div class="box-header with-border">
                      <h1 class="box-title">Vascularización</h1>
                    </div>
                    <br>

                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">No presente / No Evaluada</label>
                          <select class="form-control" name="presente_vascularizacion"  >
                            <option value="">Seleccione..</option>
                            <option value="No Presente">No Presente</option>
                            <option value="No Evaluada">No Evaluada</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Presente dentro de la lesión</label>
                          <select class="form-control" name="presente_dentro"  >
                            <option value="">Seleccione..</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Presente adyacente de la lesión</label>
                          <select class="form-control" name="presente_adyacente"  >
                            <option value="">Seleccione..</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Presente en tejido adyacente</label>
                          <select class="form-control" name="presente_en_tejido_adyacente"  >
                            <option value="">Seleccione..</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <br>
                    <div class="box-header with-border">
                      <h1 class="box-title">II.- Mama Izquierda</h1>
                    </div>
                    <br>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Piel</label>
                          <input type="text" name="pi" class="form-control">
                          <span class="help-block">mm de espesor N=2-3*</span>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Grasa</label>
                          <select class="form-control" name="grasa1"  >
                            <option value="">Seleccione..</option>
                            <option value="Hipoecogénico">Hipoecogénico</option>
                            <option value="Hiperecogénico">Hiperecogénico</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Tejido Glandular</label>
                          <select class="form-control" name="tejido_glandular1"  >
                            <option value="">Seleccione..</option>
                            <option value="Hipoecogénico">Hipoecogénico</option>
                            <option value="Hiperecogénico">Hiperecogénico</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Tejido Conectivo de Sostén</label>
                          <input type="text" name="TCS1" class="form-control" >
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Conductos Mamarios</label>
                          <input type="text" name="cond_m1" class="form-control"  >
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Pezón</label>
                          <select class="form-control" name="pezon1"  >
                            <option value="">Seleccione..</option>
                            <option value="Hipoecogénico">Hipoecogénico</option>
                            <option value="Hiperecogénico">Hiperecogénico</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Ligamentos de Cooper</label>
                          <input type="text" name="Lig_Coo1" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Costillas:<br> Hipoecogénico
                          <input type="radio" name="costillas1" value="Hipoecogénico"    ></label>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="control-label"> Se Observan a Intervalos Regulares en el Corte </label>
                          <input type="text" name="corte1" class="form-control">
                        </div>
                      </div>
                    </div>

                    <br>

                    <div class="box-header with-border">
                      <h1 class="box-title">Masas</h1>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Presente</label>
                          <select class="form-control" name="presente_masas1"  >
                            <option value="">Seleccione..</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Forma</label>
                          <select class="form-control" name="forma1"  >
                            <option value="">Seleccione..</option>
                            <option value="Ovalada">Ovalada</option>
                            <option value="Redondeada">Redondeada</option>
                            <option value="Irregular">Irregular</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Orientación</label>
                          <select class="form-control" name="orientacion1"  >
                            <option value="">Seleccione..</option>
                            <option value="Paralela">Paralela</option>
                            <option value="Anti Paralela">Anti Paralela</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Márgenes</label>
                          <select class="form-control" name="margenes1"  >
                            <option value="">Seleccione..</option>
                            <option value="Circunscritos">Circunscritos</option>
                            <option value="No Circunscritos">No Circunscritos</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Periféria</label>
                          <select class="form-control" name="periferia1"  >
                            <option value="">Seleccione..</option>
                            <option value="Interfaz Abrupta">Interfaz Abrupta</option>
                            <option value="Halo Ecogénico">Halo Ecogénico</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Ecogenicidad</label>
                          <select class="form-control" name="ecogenicidad1"  >
                            <option value="">Seleccione..</option>
                            <option value="Anecogenico">Anecogenico</option>
                            <option value="Hipoecogénico">Hipoecogénico</option>
                            <option value="Isoecogénico">Isoecogénico</option>
                            <option value="Hiperecogénico">Hiperecogénico</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Caracteristicas Ultrasonográfias Posteriores</label>
                          <select class="form-control" name="caracteristicas_ultrasonograficas_posteriores1"  >
                            <option value="">Seleccione..</option>
                            <option value="Presente">Presente</option>
                            <option value="Ausente">Ausente</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">Tejido Adyacente</label>
                          <textarea class="form-control" rows="3" placeholder="" name="tejido_adyacente1"></textarea>
                        </div>
                      </div>
                    </div>

                    <br>

                    <div class="box-header with-border">
                      <h1 class="box-title">Calcificaciones</h1>
                    </div>
                    <br>

                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Presente</label>
                          <select class="form-control" name="presente_calcificaciones1"  >
                            <option value="">Seleccione..</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Macrocalcificaciones</label>
                          <select class="form-control" name="macro_calc1"  >
                            <option value="">Seleccione..</option>
                            <option value="Presente">Presente</option>
                            <option value="Ausente">Ausente</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Microcalcificaciones por fuera de la masa</label>
                          <select class="form-control" name="micro_calc_fuera1"  >
                            <option value="">Seleccione..</option>
                            <option value="Presente">Presente</option>
                            <option value="Ausente">Ausente</option>
                          </select>
                          <span class="help-block">Mayor a 0.5mm</span>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="control-label">Microcalcificaciones por dentro de la masa</label>
                          <select class="form-control" name="micro_calc_dentro1"  >
                            <option value="">Seleccione..</option>
                            <option value="Presente">Presente</option>
                            <option value="Ausente">Ausente</option>
                          </select>
                          <span class="help-block">Menor a 0.5mm</span>
                        </div>
                      </div>
                    </div>

                    <div class="box-header with-border">
                      <h1 class="box-title">Casos Especiales</h1>
                    </div>
                    <br>

                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Micro Quistes Complicados</label>
                          <input type="text"  class="form-control" name="micro_quistes_complicados1">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Quistes Complicados</label>
                          <input type="text"  class="form-control" name="quistes_complicados1">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Masa en Piel</label>
                          <input type="text" class="form-control" name="masa_en_piel1">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Cuerpo Extraño</label>
                          <input type="text" class="form-control" name="cuerpo_extraño1">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Adenopatía Intramamaria</label>
                          <input type="text"  class="form-control" name="adenopatia_intramamaria1">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Adenopatía Axilar</label>
                          <input type="text"  class="form-control" name="adenopatia_axilar1" >
                        </div>
                      </div>
                    </div>

                    <div class="box-header with-border">
                      <h1 class="box-title">Vascularización</h1>
                    </div>
                    <br>

                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">No presente / No Evaluada</label>
                          <select class="form-control" name="presente_vascularizacion1"  >
                            <option value="">Seleccione..</option>
                            <option value="No Presente">No Presente</option>
                            <option value="No Evaluada">No Evaluada</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Presente dentro de la lesión</label>
                          <select class="form-control" name="presente_dentro1"  >
                            <option value="">Seleccione..</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Presente adyacente de la lesión</label>
                          <select class="form-control" name="presente_adyacente1"  >
                            <option value="">Seleccione..</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Presente en tejido adyacente</label>
                          <select class="form-control" name="presente_en_tejido_adyacente1"  >
                            <option value="">Seleccione..</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <!--<div class="box-header with-border text-center">
                      <h1 class="box-title">Anexar Imagenes</h1>
                    </div>
                    <br>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Imagen 1</label>
                          <input type="file" id="to5" name="imagen1_1" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Imagen 2</label>
                          <input type="file" name="imagen1_2" class="form-control">
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Imagen 3</label>
                          <input type="file" name="imagen1_3" class="form-control">
                        </div>
                      </div>
                     
                    </div>-->     
                    
                    <div class="form-group col-md-12 ciclos"><hr style="border-color:blue;"></div>
                    <h3 style="text-align: center;">Ciclos de Embarazo </h3>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Útero</label>
                          <input type="text" name="Utero_C" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Endometrio</label>
                          <input type="text" name="Endometrio_C" class="form-control">
                        </div>
                      </div>



                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Saco Gestacional</label>
                          <input type="text" name="Saco_Gestional_C" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Embrión</label>
                          <input type="text" name="Embrion_C" class="form-control">
                        </div>
                      </div>


                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Hallazgos</label>
                          <textarea class="form-control" id="Hallazgos" name="Hallazgos_C" placeholder="Hallazgos" rows="3" ></textarea>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Diagnóstico</label>
                          <textarea class="form-control" id="Diagnostico" name="Diagnostico_C" placeholder="Diagnostico" rows="3" ></textarea>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Imagenes</label>
                          <input type="file" class="form-control" id="Imagenes" name="ImagenesHistoriaEcografias[]" multiple></textarea>
                        </div>
                      </div>
                          

                    </div>

                    <div class="form-group col-md-12"><hr style="border-color:blue;"></div>


          <br>
         
 
                                                                                         
            <div class="col-md-12">
                <h4 class="text-center">Cargar Archivos</h4>
                <div class="form-group col-md-12">
                <label class="col-md-5 control-label">Nombre Archivo</label>
                <input type="text" class="form-control" id="Descripcion" name="descripcion" placeholder="Descripcion" >
              </div>
              <div class="col-md-12">
              

            
            <div class="form-group">
              <label class="col-sm-2 control-label">Archivos</label>
              <div class="col-sm-12">
                <input type="file" class="form-control" id="archivo[]" name="archivo[]" multiple="">
              </div>

  </div>   </div>   </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Diagnóstico General</label>
                          <textarea class="form-control" id="procedimiento1" name="diagnostico6" placeholder="Procedimiento" rows="3" ></textarea>
                        </div>
                      </div>
                    </div>
                    <br>
                    <br>

                    <div class="row">
                      
                    <!--
                      <input  type="hidden" name="email" value="<?php echo $correo_cliente;?>">
                      <input  type="hidden" name="nombre"  value="<?php echo $nombre_cliente;?>">
                      <input  type="hidden" name="telefono"  value="<?php echo $telefono_cliente ;?>">-->
                      <input  type="hidden" name="ID"  value="<?php echo $_SESSION['ID']?>">
                      <input  type="hidden" name="clienteId"  value="<?php echo $clienteId?>">
                      <input  type="hidden" name="NOMBRE_USUARIO"  value="<?php echo $_SESSION['NOMBRE_USUARIO']?>">
                      
                      <div id="DatosDeAgendamientoModal"></div>

                      <input type="checkbox" id="Agendamiento_Modal" value="1"> Usar Agendamiento?  


                      <div align="center" class="col-md-12"> 
                        <br><br><br>
                        <div class="col-md-12">
                          <br><br>
                          <center><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow"> <h2> <strong>  G u a r d a r  </strong> </h2> </button></center>
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
                  <form action="GO_Guardar_Controles_Ecografia.php" method="POST" enctype="multipart/form-data" id="FormularioHistoriaClinica6" onsubmit="MostrarAgendarCita(this);">
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
                            <th colspan="4" class="text-center">Hígado</th>
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
                            <td>Ecogenicidad</td>
                            <td><input type="text" class="form-control" name="ecogenicidad4"></td>
                            <td><input type="text" class="form-control" name="ecogenicidad5"></td>
                            <td><input type="text" class="form-control" name="ecogenicidad6"></td>
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
                            <th colspan="4" class="text-center">Vesícula Biliar</th>
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
                            <th colspan="4" class="text-center">Páncreas</th>
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
                            <td>Ecogenicidad</td>
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
                          <label class="control-label" for="inputSuccess">Morfología, Ecogenicidad y Movilidad</label>
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
                            <option value="">Seleccione..</option>
                            <option value="Normal">Normal</option>
                            <option value="Anormal">Anormal</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Flujo</label>
                          <select class="form-control" name="flujo1"  >
                            <option value="">Seleccione..</option>
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
                          <label class="control-label" for="inputSuccess">Líquido Libre</label>
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

                    <!--<div class="box-header with-border text-center">
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
                     
                    </div>-->
                               

                    <div class="form-group col-md-12 ciclos"><hr style="border-color:blue;"></div>
                    <h3 style="text-align: center;">Ciclos de Embarazo </h3>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Útero</label>
                          <input type="text" name="Utero_C" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Endometrio</label>
                          <input type="text" name="Endometrio_C" class="form-control">
                        </div>
                      </div>



                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Saco Gestacional</label>
                          <input type="text" name="Saco_Gestional_C" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Embrión</label>
                          <input type="text" name="Embrion_C" class="form-control">
                        </div>
                      </div>


                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Hallazgos</label>
                          <textarea class="form-control" id="Hallazgos" name="Hallazgos_C" placeholder="Hallazgos" rows="3" ></textarea>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Diagnóstico</label>
                          <textarea class="form-control" id="Diagnostico" name="Diagnostico_C" placeholder="Diagnostico" rows="3" ></textarea>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Imagenes</label>
                          <input type="file" class="form-control" id="Imagenes" name="ImagenesHistoriaEcografias[]" multiple></textarea>
                        </div>
                      </div>
                          

                    </div>

                    <div class="form-group col-md-12"><hr style="border-color:blue;"></div>


          <br>
         
 
                                                                                         
            <div class="col-md-12">
              <h4 class="text-center">Cargar Archivos</h4>
                <div class="form-group col-md-12">
                <label class="col-md-5 control-label">Nombre Archivo</label>
                <input type="text" class="form-control" id="Descripcion" name="descripcion" placeholder="Descripcion" >
              </div>
              <div class="col-md-12">
              

            
            <div class="form-group">
              <label class="col-sm-2 control-label">Archivos</label>
              <div class="col-sm-12">
                <input type="file" class="form-control" id="archivo[]" name="archivo[]" multiple="">
              </div>

  </div>   </div>   </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Diagnóstico General</label>
                          <textarea class="form-control" rows="3" placeholder="" name="diagnostico6"></textarea>
                        </div>
                      </div>
                    </div>
                    <br>
                    <br>

                    <div class="row">
                      
                      <!--
                      <input  type="hidden" name="email" value="<?php echo $correo_cliente;?>">
                      <input  type="hidden" name="nombre"  value="<?php echo $nombre_cliente;?>">
                      <input  type="hidden" name="telefono"  value="<?php echo $telefono_cliente ;?>">-->
                      <input  type="hidden" name="ID"  value="<?php echo $_SESSION['ID']?>">
                      <input  type="hidden" name="clienteId"  value="<?php echo $clienteId?>">
                      <input  type="hidden" name="NOMBRE_USUARIO"  value="<?php echo $_SESSION['NOMBRE_USUARIO']?>">
                      
                      <div id="DatosDeAgendamientoModal"></div>

                      <input type="checkbox" id="Agendamiento_Modal" value="1"> Usar Agendamiento?  


                      <div align="center" class="col-md-12"> 
                        <br><br><br>
                        <div class="col-md-12">
                          <br><br>
                          <center><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow"> <h2> <strong>  G u a r d a r  </strong> </h2> </button></center>
                        </div>
                      </div>

                      <input type="hidden"  name="tipo_cliente"   valur="1">
                    </div>
                  </form>
                </div>

                <!-- 

                  FIN ECOGRAFÍA ABDOMINAL

                -->


                <!-- 

                   Ecografia Ultra Pelvica

                -->



                <div id="servicio7" class="panel box box-secundary element" style="display: none;">
                  <form action="GO_Guardar_Controles_Ecografia.php" method="POST" enctype="multipart/form-data" id="FormularioHistoriaClinica7" onsubmit="MostrarAgendarCita(this);">
                    <div class="box-header with-border text-center">
                      <h2 class="box-title">Ecografía Ultra Pélvica</h2>
                    </div>
                    <br>
                    <input type="hidden" name="tipo_ecografia"  value="Ecografia Ultra Pelvica">

                     
                   <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID']?>">


                   <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Motivo del Estudio:</label>
                          <textarea class="form-control" id="motivo_estudio" name="motivo_estudio" placeholder="Motivo del Estudio" rows="3" ></textarea>
                        </div>
                      </div>
                    </div>

                    <div class="row">

                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">Se Realiza Ultrasonografía Pélvica, con Equipo Acuson NX2 Elite Transductor</label>
                          <select class="form-control" name="realiza"  >
                            <option value="">Seleccione..</option>
                            <option value="Endocavitario">Endocavitario</option>
                            <option value="Convexo">Convexo</option>
                          </select>
                        </div>
                      </div>
                    </div>

                      <!--<div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">SE REALIZA ULTRASONOGRAFIA PELVICA, CON EQUIPO ACUSON NX2 ELITE TRANSDUCTOR ENDOCAVITARIO:</label>
                          <textarea class="form-control" id="realiza" name="realiza" placeholder="Procedimiento" rows="3" ></textarea>
                        </div>
                      </div>
                    </div>-->

                    <div class="box-header with-border text-center">
                      <h1 class="box-title">Útero</h1><br>

                      <h1 class="box-title">Dimensiones</h1>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-12 row">
                        <div class="form-group col-md-4">
                          <label class="control-label">L:</label>
                          <input class="form-control" type="text"  name="dimensiones" >
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label">AP:</label>
                          <input class="form-control" type="text" name="ap" >
                        </div>

                        <div class="form-group col-md-4">
                          <label class="control-label">T:</label>
                          <input class="form-control" type="text" name="t" >
                        </div>
                      </div>
                    </div>
                  

                    <br>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">Posición:</label>
                          <input type="text" name="posicion" class="form-control">
                        </div>
                      </div>
                    </div>
                   

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Descripción:</label>
                          <textarea class="form-control" id="descripcion_1" name="descripcion_1" placeholder="Descripción" rows="3" ></textarea>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">Cervix</label>
                          <select class="form-control" name="cervix">
                            <option value="">Seleccione..</option>
                            <option value="Sano">Sano</option>
                            <option value="Con quistes de naboth">Con quistes de naboth</option>
                            <option value="Con cambios post radioterapia">Con cambios post radioterapia</option>
                          </select>
                        </div>
                      </div>
                    <br>
                    <div class="row">
                      <div class="col-md-12 row">
                        <div class="form-group col-md-12">
                          <label class="control-label">Ovario Derecho:</label>
                          <input class="form-control" type="text"  name="ovariod" >
                        </div>
                        <div class="form-group col-md-12">
                          <label class="control-label">Ovario Izquierdo:</label>
                          <input class="form-control" type="text" name="ovarioi" >
                        </div>

                        <div class="form-group col-md-12">
                          <label class="control-label">Fondo del Saco:</label>
                          <input class="form-control" type="text" name="fondosaco" >
                        </div>

                        <div class="form-group col-md-12">
                          <label class="control-label">Cúpula:</label>
                          <input class="form-control" type="text" name="cupula" >
                        </div>
                      </div>
                    </div>

                      <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Diagnóstico:</label>
                          <textarea class="form-control" id="diagnostico" name="diagnostico7" placeholder="Diagnóstico" rows="3" ></textarea>
                        </div>
                      </div>
                    </div>

                    <!--<div class="box-header with-border text-center">
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
                    </div>-->
                              
                    
                    <div class="form-group col-md-12 ciclos"><hr style="border-color:blue;"></div>
                    <h3 style="text-align: center;">Ciclos de Embarazo </h3>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Útero</label>
                          <input type="text" name="Utero_C" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Endometrio</label>
                          <input type="text" name="Endometrio_C" class="form-control">
                        </div>
                      </div>



                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Saco Gestacional</label>
                          <input type="text" name="Saco_Gestional_C" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Embrión</label>
                          <input type="text" name="Embrion_C" class="form-control">
                        </div>
                      </div>


                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Hallazgos</label>
                          <textarea class="form-control" id="Hallazgos" name="Hallazgos_C" placeholder="Hallazgos" rows="3" ></textarea>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Diagnóstico</label>
                          <textarea class="form-control" id="Diagnostico" name="Diagnostico_C" placeholder="Diagnostico" rows="3" ></textarea>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Imagenes</label>
                          <input type="file" class="form-control" id="Imagenes" name="ImagenesHistoriaEcografias[]" multiple></textarea>
                        </div>
                      </div>
                          

                    </div>

                    <div class="form-group col-md-12"><hr style="border-color:blue;"></div>


          <br>
         
 
                                                                                         
            <div class="col-md-12">
                <h4 class="text-center">Cargar Archivos</h4>
                <div class="form-group col-md-12">
                <label class="col-md-5 control-label">Nombre Archivo</label>
                <input type="text" class="form-control" id="Descripcion" name="descripcion" placeholder="Descripcion" >
              </div>
              <div class="col-md-12">
              

            
            <div class="form-group">
              <label class="col-sm-2 control-label">Archivos</label>
              <div class="col-sm-12">
                <input type="file" class="form-control" id="archivo[]" name="archivo[]" multiple="">
              </div>

  </div>   </div>   </div>

                    <!--<div class="form-group col-md-12"><hr style="border-color:blue;"></div>
                    <br>

                    <div class="box-header with-border text-center">
                      <h1 class="box-title">Anexar Imagenes</h1>
                    </div>
                    <br>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Imagen 1</label>
                          <input type="file" id="to5" name="imagen1" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Imagen 2</label>
                          <input type="file" name="imagen2" class="form-control">
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Imagen 3</label>
                          <input type="file" name="imagen3" class="form-control">
                        </div>
                      </div>
                     
                    </div>-->

                    
                    <br>

                    <div class="row">
                      
                      <!--
                      <input  type="hidden" name="email" value="<?php echo $correo_cliente;?>">
                      <input  type="hidden" name="nombre"  value="<?php echo $nombre_cliente;?>">
                      <input  type="hidden" name="telefono"  value="<?php echo $telefono_cliente ;?>">-->
                      <input  type="hidden" name="ID"  value="<?php echo $_SESSION['ID']?>">
                      <input  type="hidden" name="clienteId"  value="<?php echo $clienteId?>">
                      <input  type="hidden" name="NOMBRE_USUARIO"  value="<?php echo $_SESSION['NOMBRE_USUARIO']?>">
                      

                      <div id="DatosDeAgendamientoModal"></div>

                      <input type="checkbox" id="Agendamiento_Modal" value="1"> Usar Agendamiento?  


                      <div align="center" class="col-md-12"> 
                        <br><br><br>
                        <div class="col-md-12">
                          <br><br>
                          <center><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow"> <h2> <strong>  G u a r d a r  </strong> </h2> </button></center>
                        </div>
                      </div>

                      <input type="hidden"  name="tipo_cliente"   valur="1">
                    </div>
                  </form>
                </div>



              <!-- 

                  FIN Ecografia Ultra Pelvica

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

<?php
                      //echo '<div class="col-md-12 center text-center">';
                      //echo '<hr>';
                      //echo '<h2>Agendar Próxima Cita</h2>';
                      include 'agendaCita_Ecografias_Include.php';
                      //echo '<hr>';
                      //echo '</div>';
                      ?>

<script>
  function MostrarAgendarCita(formulario){

    /*
    event.preventDefault();

     // Abre el modal con el id "miModal"
     $('#miModal').modal('show');
     console.log(formulario);
     // Verifica que el parámetro formulario tenga una propiedad id
    if (formulario && formulario.id) {
        // Establece el valor del campo id_formulario_agendarcita
        $('#id_formulario_agendarcita').val(formulario.id);
    } else {
        console.log('El parámetro formulario no tiene un ID válido.');
    }*/



    event.preventDefault();
    // Busca el checkbox "Agendamiento_Modal" dentro del formulario
    var checkboxAgendamientoModal = $(formulario).find('#Agendamiento_Modal');

    // Verifica si el checkbox "Agendamiento_Modal" está marcado
    if (checkboxAgendamientoModal.is(':checked')) {
        // Abre el modal con el id "miModal"
        $('#miModal').modal('show');
        // Resto de tu código
      console.log(formulario);
      $('#id_formulario_agendarcita').val(formulario.id);

    } else {
        // Realiza el submit del formulario
        formulario.submit();
    }
    
    

  }

  function guardarCitaEnFormulario(){
     // Obtén el contenido HTML del campo DatosFormulario_ModalAgendamiento
    //var formularioPrincipal = document.getElementById('FormularioHistoriaClinica1');
    if($('#id_formulario_agendarcita').val()!=""){

          var formularioPrincipal = document.getElementById($('#id_formulario_agendarcita').val());
          var datosModal = document.getElementById('DatosFormulario_ModalAgendamiento');
          var DatosDeAgendamientoModal = formularioPrincipal.querySelector('#DatosDeAgendamientoModal');

          var nuevoDiv = document.createElement('div');

          // Obtiene todos los campos de entrada (input) y select dentro de datosModal
          var campos = datosModal.querySelectorAll('input, select');

          // Itera sobre los campos y copia sus valores al formulario principal
          campos.forEach(function(campo) {
              var nombreCampo = campo.name;

              if (campo.tagName === 'INPUT') {
                  if (campo.type === 'radio') {
                      // Si es un campo de entrada tipo radio, verifica si está seleccionado
                      if (campo.checked) {
                          var nuevoCampo = document.createElement('input');
                          nuevoCampo.type = 'hidden';
                          nuevoCampo.name = nombreCampo;
                          nuevoCampo.value = campo.value;
                          nuevoDiv.appendChild(nuevoCampo);
                      }
                  } else {
                      // Si es un campo de entrada (input), crea un campo oculto y copia el valor
                      var nuevoCampo = document.createElement('input');
                      nuevoCampo.type = 'hidden';
                      nuevoCampo.name = nombreCampo;
                      nuevoCampo.value = campo.value;
                      nuevoDiv.appendChild(nuevoCampo);
                  }
              } else if (campo.tagName === 'SELECT') {
                  // Si es un campo select, crea un nuevo select y copia las opciones
                  var nuevoSelect = document.createElement('select');
                  nuevoSelect.name = nombreCampo;

                  campo.querySelectorAll('option').forEach(function(opcion) {
                      var nuevaOpcion = document.createElement('option');
                      nuevaOpcion.value = opcion.value;
                      nuevaOpcion.text = opcion.text;

                      // Comprueba si la opción está seleccionada y configura su atributo "selected"
                      if (opcion.selected) {
                          nuevaOpcion.setAttribute('selected', 'selected');
                      }

                      nuevoSelect.appendChild(nuevaOpcion);
                  });

                  nuevoDiv.appendChild(nuevoSelect);
              }


          });

          DatosDeAgendamientoModal.innerHTML=nuevoDiv.outerHTML;

          document.getElementById($('#id_formulario_agendarcita').val()).submit();
    }
  }
</script>
<script>
  // no quitar para evitar problemas de que guarde con este caracter " ' "
  $(document).on('input', 'input[type="text"], textarea', function() {
    $(this).val($(this).val().replace(/[']/g, ''));
  });
</script>
<script src="apiVoz_3.2.js"></script>
<?php include 'plantilla.php';?>
 
 <script src="plugins/LottieK/lottie.min.js"></script>
<?php   
$usuariod_id_autoguardado = $_SESSION["ID"];
$cliente_id_autoguardado = $_GET['clienteId'];
$Nombre_Tabla_autoguardado = "Control_Ecografia";//nombre de la tabla de la base de datos de la historia

$RutaFinal_Encryptado = $_SERVER['SCRIPT_URI']."?cl={$cliente_id_autoguardado}";

$HistoriasClinicasAutoguardado_id='"FormularioHistoriaClinica1", "FormularioHistoriaClinica2", "FormularioHistoriaClinica3", "FormularioHistoriaClinica4", "FormularioHistoriaClinica5", "FormularioHistoriaClinica6", "FormularioHistoriaClinica7"';//importante para las historias multiples, mantener estructura de comillas simples y dobles
include 'AutoGuardados/HistoriaEncryptadaMultiple/AutoGuardado_Historia_Encryptado.php';//usar esta si es historia encryptada sin modificar el autoguardado

?>