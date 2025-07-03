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

  $queryconfig = mysqli_query($conn3, "SELECT * FROM config where ID_Usuario=$ID");
  $nrowl = mysqli_num_rows($queryconfig);
  while ($rowconfig = mysqli_fetch_array($queryconfig)) {
    $cie10 = $rowconfig['cie10'];
    $pro1  = $rowconfig['pro1'];
    $pro2  = $rowconfig['pro2'];
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

                <div class="row">

                  <div class="col-md-12">
                    <?php echo datosPacientes($clienteId);?>
                  </div>
                <!--
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
                  -->
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <hr>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <h4 class="card-title">Formatos Psicología</h4>
                    <div class="form-group">
                      <select id="status" name="status" class="form-control select2" onChange="mostrar(this.value);" style="width: 80%;">
                        <option >Seleccione tipo...</option>
                        <option value="servicio1">Diagnóstico Psicología</option>
                        <option value="servicio2">Seguimiento /Asistencia</option> 
                        <option value="servicio3">Psicoterapia de Grupo</option> 
                        
                        
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6" >  
                    <h4 align="right"> <?php echo date("d-m-Y h:m")?> </h4>                                 
                  </div>
                </div>

               
                <div id="servicio1" class="panel box box-secundary element" style="display: none;">
                  <form action="PS_Guardar_Controles_Psicologia" method="POST" enctype="multipart/form-data">
                    <div class="box-header with-border text-center">
                      <h2 class="box-title">Diagnóstico Psicología</h2>
                    </div>
                    <br>
                    <input type="hidden" name="tipo_trabajo"  value="Diagnóstico Psicología">


<div class="col-md-6">
                        <div align="left"><label>Fecha </label></div>
                        <input type="date" name="fechadiagnostico"  class="form-control" id="fecha"  >
                       <!-- <div class="form-group">
                          <label class="control-label">Mes:</label>
                          <input type="text" name="tema2" class="form-control">
                        </div>-->
                      </div>




<div class="col-md-12">
                                        <div class="form-group has-#00a65a">
                                          <label>Diagnóstico Cie10</label>
                                        </div>
                                      </div>

                                      <!-- Funcionando CIE10 -->
                                      <div class="form-group col-md-12">
                                        CIE-10
                                        <?php

                                        if ($cie10 == 1) {
                                          /*
                                          ?>
                                          <select id="cie10" name="cie10postquirurgico[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                                            <option value="" selected="selected">Seleccione</option>
                                            <?php
                                              //$usuario_id1 = $ID.'cie10';
                                              $queryList = mysqli_query($conn3, "SELECT * FROM cie10 order by codigo");
                                              $nrowl = mysqli_num_rows($queryList);
                                              while ($row_recordset32 = mysqli_fetch_array($queryList)) {

                                                $codigo      = $row_recordset32['codigo'];
                                                $descripcionee      = $row_recordset32['descripcion'];
                                                $ArregloOptions[]="<option value='$codigo'>$codigo - $descripcionee</option>";
                                                echo "<option value='$codigo'>$codigo - $descripcionee</option>";
                                              }
                                              ?>
                                          </select>
                                          <div align="center">
                                            Para configurar la lista CIE10 <a href="<?php echo $Base ?>config" target="_blank"> <strong> <i class="fa fa fa-gears"></i>clic aquí Configuración y perfil </strong></a> y luego seleccionamos la pestaña <strong> listas </strong>
                                            <br>
                                            <font color="red"> Necesitas ayuda, Solicítalo por <a href="'.$Base.'/soporte" target="_blank"> <strong> <i class="fa fa fa-support"></i> soporte </strong></a> </font>
                                            </h6>
                                          </div>

                                        <?php
                                        */
                                        ?>
                                        <select id="cie10" name="cie10postquirurgico[]" class="form-control" multiple style="width: 100%;" onChange="Buscar_CIE10()">
                                          <option value="" selected="selected">Seleccione</option>
                                        </select>
                                        <?php
                                        } else {
                                          echo ' <div align="center"> Lista CIE10 desactivada, para activar debes entrar a configuración <a href="' . $Base . '/config" target="_blank"> <strong> <i class="fa fa fa-gears"></i> clic aquí Configuración y perfil </strong></a>  y luego seleccionamos la pestaña  <strong> listas </strong><br> <font color="red">  Necesitas ayuda, Solicítalo por <a href="' . $Base . '/soporte" target="_blank"> <strong> <i class="fa fa fa-support"></i> soporte </strong></a>  </font></h6></div>';
                                        }
                                        ?>
                                      </div>
 <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>Diagnóstico inicial </b></label>
                                                  <textarea class="form-control"  name="inicial" rows="3" ></textarea>
                                                </div>
                                            </div>
                                        </div>


 <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>Motivo de la consulta </b></label>
                                                  <textarea class="form-control"  name="motivoC" rows="3" ></textarea>
                                                </div>
                                            </div>
                                        </div>

<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>Etapa de cambio actual:</b></label>
                                                  <textarea class="form-control"  name="etapa" rows="3" ></textarea>
                                                </div>
                                            </div>
                                        </div>


<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>Sufre o ha sufrido algún tipo de agresión:</b></label>
                                                  <textarea class="form-control"  name="agresion" rows="3" ></textarea>
                                                </div>
                                            </div>
                                        </div>
<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>Ideación e intento suicida:</b></label>
                                                  <textarea class="form-control"  name="suicida" rows="3" ></textarea>
                                                </div>
                                            </div>
                                        </div>
<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>Actitudes ante la vida:</b></label>
                                                  <textarea class="form-control"  name="actitud" rows="3" ></textarea>
                                                </div>
                                            </div>
                                        </div>
<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>Autovaloración personal:</b></label>
                                                  <textarea class="form-control"  name="autovalor" rows="3" ></textarea>
                                                </div>
                                            </div>
                                        </div>
<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>Expresión de emociones:</b></label>
                                                  <textarea class="form-control"  name="expresion" rows="3" ></textarea>
                                                </div>
                                            </div>
                                        </div>
<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>Etapa de cambio actual:</b></label>
                                                  <textarea class="form-control"  name="cambio" rows="3" ></textarea>
                                                </div>
                                            </div>
                                        </div>
<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>Satisfacción y problemas sexuales:</b></label>
                                                  <textarea class="form-control"  name="satisfacion" rows="3" ></textarea>
                                                </div>
                                            </div>
                                        </div>
<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>Red de apoyo:</b></label>
                                                  <textarea class="form-control"  name="apoyo" rows="3" ></textarea>
                                                </div>
                                            </div>
                                        </div>
<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>Área escolar y / laboral</b></label>
                                                  <textarea class="form-control"  name="escolar" rows="3" ></textarea>
                                                </div>
                                            </div>
                                        </div>
<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>Área social/familiar:</b></label>
                                                  <textarea class="form-control"  name="familiar" rows="3" ></textarea>
                                                </div>
                                            </div>
                                        </div>
<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>Estado actual de consumo:</b></label>
                                                  <textarea class="form-control"  name="consumo" rows="3" ></textarea>
                                                </div>
                                            </div>
                                        </div>



<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>Dinero para consumir:</b></label>
                                                  <textarea class="form-control"  name="dinero" rows="3" ></textarea>
                                                </div>
                                            </div>
                                        </div>
<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>Sustancias de consumo:</b></label>
                                                  <textarea class="form-control"  name="sustancias" rows="3" ></textarea>
                                                </div>
                                            </div>
                                        </div>
<div class="row">
                                            <div class="col-md-12" align="center">
                                                <div class="form-group">
                                                  <label><h3><b>Eventos ligados al consumo:</b></h3></b></label>
                                                </div>
                                            </div>
                                        </div>
<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>(a) Deseo intenso o compulsión de consumir la sustancia. </b></label>
                                                  <textarea class="form-control"  name="deseo" rows="3" ></textarea>
                                                </div>
                                            </div>
                                        </div>


<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>(b) Dificultades para controlar la conducta de consumir en términos de su inicio terminación o niveles de consumo</b></label>
                                                  <textarea class="form-control"  name="conducta" rows="3" ></textarea>
                                                </div>
                                            </div>
                                        </div>
<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>(c) Condición fisiológica de privación/abstinencia. </b></label>
                                                  <textarea class="form-control"  name="condicion" rows="3" ></textarea>
                                                </div>
                                            </div>
                                        </div>
<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>(d) Evidencia de tolerancia</b></label>
                                                  <textarea class="form-control"  name="tolerancia" rows="3" ></textarea>
                                                </div>
                                            </div>
                                        </div>
<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>(e) Abandono progresivo de alternativas esparcimiento u otros intereses.</b></label>
                                                  <textarea class="form-control"  name="abandono" rows="3" ></textarea>
                                                </div>
                                            </div>
                                        </div>
<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b> (f) Persistencia en el consumo a pesar de tener evidencias claras de consecuencias nocivas. claras de consecuencias nocivas.</b></label>
                                                  <textarea class="form-control"  name="persistencia" rows="3" ></textarea>
                                                </div>
                                            </div>
                                        </div>
<div class="row">
                                            <div class="col-md-12" align="center">
                                                <div class="form-group">
                                                  <label><h3><b>Historial de Tratamiento</b></h3></b></label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
<div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Lugar</label>
                          <input type="text" name="lugart" class="form-control">
                        </div>
                      </div>

<div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Duración del proceso:</label>
                          <input type="text" name="duracion" class="form-control">
                        </div>
                      </div>
                                      </div>

<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>Motivo de salida: </b></label>
                                                  <textarea class="form-control"  name="motivos" rows="3" ></textarea>
                                                </div>
                                            </div>
                                        </div>






<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>Factores de recaída:</b></label>
                                                  <textarea class="form-control"  name="recaida" rows="3" ></textarea>
                                                </div>
                                            </div>
                                        </div>


<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>Conductas delictivas:</b></label>
                                                  <textarea class="form-control"  name="delictivas" rows="3" ></textarea>
                                                </div>
                                            </div>
                                        </div>

<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>Antecedentes judiciales:</b></label>
                                                  <textarea class="form-control"  name="ante_jud" rows="3" ></textarea>
                                                </div>
                                            </div>
                                        </div>


<div class="row">
                                            <div class="col-md-12" align="center">
                                                <div class="form-group">
                                                  <label><h3><b>Examen Mental</b></h3></b></label>
                                                </div>
                                            </div>
                                        </div>
<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>Estado de conciencia:</b></label>
                                                  <textarea class="form-control"  name="conciencia" rows="3" ></textarea>
                                                </div>
                                            </div>
                                        </div>
<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>Comportamiento:</b></label>
                                                  <textarea class="form-control"  name="comportamiento" rows="3" ></textarea>
                                                </div>
                                            </div>
                                        </div>
<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>Lenguaje:</b></label>
                                                  <textarea class="form-control"  name="lenguaje" rows="3" ></textarea>
                                                </div>
                                            </div>
                                        </div>

<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>Pensamiento:</b></label>
                                                  <textarea class="form-control"  name="pensamiento" rows="3" ></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>Diagnóstico inicial:</b></label>
                                                  <textarea class="form-control"  name="diagnoI" rows="3" ></textarea>
                                                </div>
                                            </div>
                                        </div><div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>Responsable: </b></label>
                                                  <textarea class="form-control"  name="reponsable" rows="3" ></textarea>
                                                </div>
                                            </div>
                                        </div>

                 <div class="form-group col-md-12"><hr style="border-color:blue;"></div>
                    <br>
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
                      </div>
                      -->

                      <input  type="hidden" name="email" value="<?php echo $correo_cliente;?>">
                      <input  type="hidden" name="nombre"  value="<?php echo $nombre_cliente;?>">
                      <input  type="hidden" name="telefono"  value="<?php echo $telefono_cliente ;?>">
                      <input  type="hidden" name="ID"  value="<?php echo $_SESSION['ID']?>">
                      <input  type="hidden" name="clienteId"  value="<?php echo $clienteId?>">
                      <input  type="hidden" name="NOMBRE_USUARIO"  value="<?php echo $_SESSION['NOMBRE_USUARIO']?>">
                      
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

                   FIN DE  DIAGNOSTICO DE PSICOLOGIA 

                -->

                <!-- 

                    SEGUIMIENTO

                -->
                <div id="servicio2" class="panel box box-secundary element" style="display: none;">
                  <form action="PS_Guardar_Controles_Psicologia" method="POST" enctype="multipart/form-data">
                    <div class="box-header with-border text-center">
                      <h2 class="box-title">Seguimiento, Asistencia y Psicoterapia</h2>
                    </div>
                    <br>

                   
                                      <div class="col-md-12">
                                        <div class="form-group has-#00a65a">
                                          <label>Diágnostico Cie10</label>
                                        </div>
                                      </div>
                                      
 <div class="form-group col-md-12">
                                        CIE-10
                                        <?php
                                        
                                        if ($cie10 == 1) {
                                          /*
                                          ?>
                                          <select id="cie10" name="cie10seguimiento[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                                            <option value="" selected="selected">Seleccione</option>
                                            <?php
                                              //$usuario_id1 = $ID.'cie10';
                                              
                                              $queryList = mysqli_query($conn3, "SELECT * FROM cie10 order by codigo");
                                              $nrowl = mysqli_num_rows($queryList);
                                              while ($row_recordset32 = mysqli_fetch_array($queryList)) {

                                                $codigo      = $row_recordset32['codigo'];
                                                $descripcionee      = $row_recordset32['descripcion'];

                                                
                                                echo "<option value='$codigo'>$codigo - $descripcionee</option>";
                                              }
                                              
                                              foreach ($ArregloOptions as $key => $value) {
                                                echo $value;
                                              }
                                              ?>
                                          </select>
                                          <div align="center">
                                            Para configurar la lista CIE10 <a href="<?php echo $Base ?>config" target="_blank"> <strong> <i class="fa fa fa-gears"></i>clic aquí Configuración y perfil </strong></a> y luego seleccionamos la pestaña <strong> listas </strong>
                                            <br>
                                            <font color="red"> Necesitas ayuda, Solicítalo por <a href="'.$Base.'/soporte" target="_blank"> <strong> <i class="fa fa fa-support"></i> soporte </strong></a> </font>
                                            </h6>
                                          </div>

                                        <?php
                                        */
                                        ?>

                                        <select id="cie10_1" name="cie10seguimiento[]" class="form-control" multiple style="width: 100%;" onChange="Buscar_CIE10_1()">
                                          <option value="" selected="selected">Seleccione</option>
                                        </select>
                                        <?php
                                        } else {
                                          echo ' <div align="center"> Lista CIE10 desactivada, para activar debes entrar a configuración <a href="' . $Base . '/config" target="_blank"> <strong> <i class="fa fa fa-gears"></i> clic aquí Configuración y perfil </strong></a>  y luego seleccionamos la pestaña  <strong> listas </strong><br> <font color="red">  Necesitas ayuda, Solicítalo por <a href="' . $Base . '/soporte" target="_blank"> <strong> <i class="fa fa fa-support"></i> soporte </strong></a>  </font></h6></div>';
                                        }
                                        ?>
                                      </div>




                    

                    <input  type="hidden" name="tipo_trabajo"  value="Seguimiento, Asistencia y Psicoterapia">

                    <div class="row">
                      <div class="col-md-6">
                        <div align="left"><label>Fecha </label></div>
                        <input type="date" name="fechasegui"  class="form-control" id="fecha"  >
                       <!-- <div class="form-group">
                          <label class="control-label">Mes:</label>
                          <input type="text" name="tema2" class="form-control">
                        </div>-->
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Objetivo:</label>
                          <input type="text" name="obje2" class="form-control">
                        </div>
                      </div>

                      
                    </div>

                    <br>

                  

 <div class="form-group col-md-12">
                        <div class="form-group">
                        <label> Desarrollo de la sesión:</label>
                         <textarea class="form-control"  name="desarrolloS" rows="3" ></textarea>
                        </div> </div>

 <div class="form-group col-md-12">
                        <div class="form-group">
                        <label> Participación:</label>
                         <textarea class="form-control"  name="partic" rows="3" ></textarea>
                        </div> </div>

 <div class="form-group col-md-12">
                        <div class="form-group">
                        <label> Expresión de sentimientos y emociones</label>
                         <textarea class="form-control"  name="expresionS" rows="3" ></textarea>
                        </div> </div>

 <div class="form-group col-md-12">
                        <div class="form-group">
                        <label> Reflexiones  y compromisos  del participante:</label>
                         <textarea class="form-control"  name="COMPROMISO" rows="3" ></textarea>
                        </div> </div>
<div class="form-group col-md-12">
                        <div class="form-group">
                        <label> Conclusion profesional  y recomendaciones: </label>
                         <textarea class="form-control"  name="conclusion" rows="3" ></textarea>
                        </div> </div>

 <div class="form-group col-md-12">
                        <div class="form-group">
                        <label> Profesional Responsable y TP:</label>
                         <textarea class="form-control"  name="prof" rows="3" ></textarea>
                        </div> </div>

 



 <div class="form-group col-md-12"><hr style="border-color:blue;"></div>

                    <br>
                    <br>
                    <br>

                    <div class="row">


                      <input  type="hidden" name="email" value="<?php echo $correo_cliente;?>">
                      <input  type="hidden" name="nombre"  value="<?php echo $nombre_cliente;?>">
                      <input  type="hidden" name="telefono"  value="<?php echo $telefono_cliente ;?>">
                      <input  type="hidden" name="ID"  value="<?php echo $_SESSION['ID']?>">
                      <input  type="hidden" name="clienteId"  value="<?php echo $clienteId?>">
                      <input  type="hidden" name="NOMBRE_USUARIO"  value="<?php echo $_SESSION['NOMBRE_USUARIO']?>">
                      
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

               

                <div id="servicio3" class="panel box box-secundary element" style="display: none;">
                  <form action="PS_Guardar_Controles_Psicologia" method="POST" enctype="multipart/form-data">
                    <div class="box-header with-border text-center">
                      <h2 class="box-title">Psicoterapia de grupo por Psicología</h2>
                    </div>
                    <br>

                      

                    <input  type="hidden" name="tipo_trabajo"  value="Psicoterapia de grupo por Psicología">

 <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID']?>">

 <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Mes</label>
                          <input type="text" name="etapa" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Objetivo</label>
                          <input type="text" name="objetivo2" class="form-control">
                        </div>
                      </div>

                      
                    </div>

 <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Desarrollo de la sesión:</label>
                          <textarea class="form-control" id="desaSesion" name="desaSesion" placeholder="" rows="3" ></textarea>
                        </div>
                      </div>
                    </div>
 <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Participación:</label>
                          <textarea class="form-control" id="particip" name="particip" placeholder="" rows="3" ></textarea>
                        </div>
                      </div>
                    </div>
 <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Reflexiones  y compromisos  del participante:</label>
                          <textarea class="form-control" id="refCompr" name="refCompr" placeholder="" rows="3" ></textarea>
                        </div>
                      </div>
                    </div>

 <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Conclusion profesional  y recomendaciones: </label>
                          <textarea class="form-control" id="procedimiento" name="conclu" placeholder="" rows="3" ></textarea>
                        </div>
                      </div>
                    </div>
 <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Profesional Responsable y TP:</label>
                          <textarea class="form-control" id="procedimiento" name="profRespo" placeholder="" rows="3" ></textarea>
                        </div>
                      </div>
                    </div>


                 <div class="form-group col-md-12"><hr style="border-color:blue;"></div>
                    <br>
                    <br>

                    <div class="row">


                      <input  type="hidden" name="email" value="<?php echo $correo_cliente;?>">
                      <input  type="hidden" name="nombre"  value="<?php echo $nombre_cliente;?>">
                      <input  type="hidden" name="telefono"  value="<?php echo $telefono_cliente ;?>">
                      <input  type="hidden" name="ID"  value="<?php echo $_SESSION['ID']?>">
                      <input  type="hidden" name="clienteId"  value="<?php echo $clienteId?>">
                      <input  type="hidden" name="NOMBRE_USUARIO"  value="<?php echo $_SESSION['NOMBRE_USUARIO']?>">
                      
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

             


          
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>




<?php include("footer.php")?>

<script>
  // no quitar para evitar problemas de que guarde con este caracter " ' "
  $(document).on('input', 'input[type="text"], textarea', function() {
    $(this).val($(this).val().replace(/[']/g, ''));
  });
</script>
<script>
    function Buscar_CIE10() {
        $("#cie10").select2({
            allowClear: true,
            ajax: {
                url: "Ajax_cie10.php",
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        searchTerm: params.term, // search term
                        Tipo: "CIE10"
                    };
                },
                processResults: function(response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }
        });
    };

    function Buscar_CIE10_1() {
        $("#cie10_1").select2({
            allowClear: true,
            ajax: {
                url: "Ajax_cie10.php",
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        searchTerm: params.term, // search term
                        Tipo: "CIE10"
                    };
                },
                processResults: function(response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }
        });
    };


    $(document).ready(function() {
        Buscar_CIE10();
        Buscar_CIE10_1();
    });
</script>
<script src="apiVoz_3.2.js"></script>
<?php include 'plantilla.php';?>