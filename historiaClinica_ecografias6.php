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

 <!--               <div class="row">
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
                  </div>      -->
<form action="guardarHistoriaClinica2_ecografias.php" method="POST" id="cri" name="cri" enctype="multipart/form-data">
               
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
                            <td><input type="text" class="form-control" name="coledoco3" value="< 6 mm"></td>
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
                            <td><input type="text" class="form-control" name="paredes3" value="< 3mm"></td>
                          </tr>
                          <tr>
                            <td>Tamaño</td>
                            <td><input type="text" class="form-control" name="tamaño1"></td>
                            <td><input type="text" class="form-control" name="tamaño2" ></td>
                            <td><input type="text" class="form-control" name="tamaño3" value="100-150mm"></td>
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






                <!-- 

                  FIN ECOGRAFÍA ABDOMINA
                -->



        <!--            <div class="row" style="display: none;" id="final">  -->



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