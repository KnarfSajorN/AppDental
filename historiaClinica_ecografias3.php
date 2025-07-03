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

<form action="guardarHistoriaClinica2_ecografias.php" method="POST" id="cri" name="cri" enctype="multipart/form-data">
               
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
                              Negativo: <input type="radio" name="PVH" value="Negativo" class="minimal">
                            </td>
                            <td>
                               Positivo: <input type="radio" name="PVH" value="Positivo" class="minimal">
                            </td>
                            <td>
                              <label class="control-label">ASC-US:
                                Si <input type="radio" name="ASC_US" value="Si" class="minimal"> &nbsp; No <input type="radio" name="ASC_US" value="No" class="minimal">
                              </label>
                            </td>
                            <td>
                              <label class="control-label">LIE BG:
                                Si <input type="radio" name="LIE_BG" value="Si" class="minimal"> &nbsp; No <input type="radio" name="LIE_BG" value="No" class="minimal">
                              </label>
                            </td>
                            <td>
                              <label class="control-label">LIE AG:
                                Si <input type="radio" name="LIE_AG" value="Si" class="minimal"> &nbsp; No <input type="radio" name="LIE_AG" value="No" class="minimal">
                              </label>
                            </td>
                            <td>
                              <label class="control-label">Carcinoma:
                                Si <input type="radio" name="carcinoma" value="Si" class="minimal"> &nbsp; No <input type="radio" name="carcinoma" value="No" class="minimal">
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
                              Negativo: <input type="radio" name="IVAA" value="Negativo"  class="minimal">
                            </td>
                            <td>
                               Positivo: <input type="radio" name="IVAA" value="Positivo"  class="minimal">
                            </td>
                          </tr>
                          <tr>
                            <td colspan="2">
                              Aceto Blanco Rápido: <input type="radio" name="IVAA2" value="Aceto Blanco Rápido - Menor a 15 Segundos" class="minimal">  Menor a 15 Segundos
                            </td>
                          </tr>
                          <tr>
                            <td colspan="2">
                              Aceto Blando Duradero: <input type="radio" name="IVAA2" value="Aceto Blando Duradero - Más de 120 Segundos"  class="minimal">  Más de 120 Segundos
                            </td>
                          </tr>
                        </table>
                      </div>
                      <div class="col-md-6">
                        <table class="table table-bordered" >
                          <tr >
                            <th class="text-center">Tipos de Sona de Transformación</th>
                          </tr>

                          <tr>
                            <td>
                              I UEC Completamente Visible: <input type="radio" name="Tipos_Sona_T" value="I UEC Completamente Visible"  class="minimal">
                            </td>
                          </tr>
                          <tr>
                            <td>
                              II UEC Parcialmente Visible: <input type="radio" name="Tipos_Sona_T" value="II UEC Parcialmente Visible"  class="minimal">
                            </td>
                          </tr>
                          <tr>
                            <td>
                              III UEC No Visible: <input type="radio" name="Tipos_Sona_T" value="III UEC No Visible"  class="minimal">
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
                              Negativo: <input type="radio" name="SHILLER" value="Negativo" class="minimal">
                            </td>
                            <td>
                               Positivo: <input type="radio" name="SHILLER" value="Positivo" class="minimal">
                            </td>
                          </tr>
                        </table>

                        <table class="table table-bordered" >
                          <tr >
                            <th colspan="2" class="text-center">Cervix</th>
                          </tr>
                          <tr>
                            <td>
                              Biopsia: Si <input type="radio" name="biopsia" value="Si" class="minimal"> &nbsp; No <input type="radio" name="biopsia" value="No" class="minimal">
                            </td>
                            <td>
                              Curetaje: Si <input type="radio" name="curetaje" value="Si" class="minimal"> &nbsp; No <input type="radio" name="curetaje" value="No" class="minimal">
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
                              Maduro <input type="radio" name="epit_esca_original" value="Maduro" class="minimal">
                              Atrófico <input type="radio" name="epit_esca_original" value="Atrofico" class="minimal">
                            </td>
                            <td>
                              Epitelio Columnar:
                              Ectópico <input type="radio" name="epitelio_columnar" value="Ectópico" class="minimal">
                              Ectropión <input type="radio" name="epitelio_columnar" value="Ectropion" class="minimal">
                            </td>
                          </tr>
                          <tr>
                            <td>
                              Epitelio Escamoso Metaplasico: Si <input type="radio" name="epitelio_escamoso_metaplasico" value="Si"  class="minimal"> &nbsp; No <input type="radio" name="epitelio_escamoso_metaplasico" value="No"  class="minimal">
                            </td>
                            <td>
                              Criptas Abiertas: Si <input type="radio" name="criptas_abiertas" value="Si" class="minimal"> &nbsp; No <input type="radio" name="criptas_abiertas" value="No" class="minimal">
                            </td>
                          </tr>
                           <tr>
                            <td colspan="2">
                              Deciduosis del Embarazo: Si <input type="radio" name="deciduosis" value="Si" class="minimal"> &nbsp; No <input type="radio" name="deciduosis" value="No" class="minimal">
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
                              Epitelio Aceto Blanco Delgado: Si <input type="radio" name="epitelioAcetoBlancoDelgado" value="Si"  class="minimal"> &nbsp; No <input type="radio" name="epitelioAcetoBlancoDelgado" value="No"  class="minimal">
                            </td>
                          </tr>
                          <tr>
                            <td colspan="2">
                              Borde Irregular: Si <input type="radio" name="borde_irregular" value="Si"  class="minimal"> &nbsp; No <input type="radio" name="borde_irregular" value="No"  class="minimal">
                            </td>
                          </tr>
                          <tr>
                            <td colspan="2">
                              Mosaico Fino: Si <input type="radio" name="mosaico_fino" value="Si" class="minimal"> &nbsp; No <input type="radio" name="mosaico_fino" value="No" class="minimal">
                            </td>
                          </tr>
                          <tr>
                            <td colspan="2">
                              Punteado Fino: Si <input type="radio" name="punteado_fino" value="Si" class="minimal"> &nbsp; No <input type="radio" name="punteado_fino" value="No" class="minimal"> 
                            </td>
                          </tr>
                          <tr><th colspan="2" class="text-center">Lesiones No Específicas</th></tr>
                          <tr>
                            <td>
                             Leucoplasia: Si <input type="radio" name="leucoplasia" value="Si" class="minimal"> &nbsp; No <input type="radio" name="leucoplasia" value="No" class="minimal"> 
                            </td>
                            <td>
                             Erosión: Si <input type="radio" name="erosion" value="Si" class="minimal"> &nbsp; No <input type="radio" name="erosion" value="No" class="minimal"> 
                            </td>
                          </tr>
                          <tr>
                            <td colspan="2">
                             Shiller: Si <input type="radio" name="shiller1" value="Si" class="minimal"> &nbsp; No <input type="radio" name="shiller1" value="No" class="minimal"> 
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
                              Epitelio Aceto Blanco Grueso: Si <input type="radio" name="epitelioAcetoBlancoGrueso" value="Si" class="minimal"> &nbsp; No <input type="radio" name="epitelioAcetoBlancoGrueso" value="No" class="minimal">
                            </td>
                          </tr>
                          <tr>
                            <td>
                              Menor a 15 Segundos: Si <input type="radio" name="menor15seg" value="Si" class="minimal"> &nbsp; No <input type="radio" name="menor15seg" value="No" class="minimal">
                            </td>
                          </tr>
                          <tr>
                            <td>
                              Más de 120 Segundos:  Si <input type="radio" name="mas120seg" value="Si" class="minimal"> &nbsp; No <input type="radio" name="mas120seg" value="No" class="minimal">
                            </td>
                          </tr>
                          <tr>
                            <td>
                              Mosaico Grueso: Si <input type="radio" name="mosaico_grueso" value="Si" class="minimal"> &nbsp; No <input type="radio" name="mosaico_grueso" value="No" class="minimal"> 
                            </td>
                          </tr>
                          <tr>
                            <td>
                             Punteado Grueso: Si <input type="radio" name="punteado_grueso" value="Si" class="minimal"> &nbsp; No <input type="radio" name="punteado_grueso" value="No" class="minimal"> 
                            </td>
                          </tr>
                          <tr>
                            <td>
                              Signo del Limite del Borde Interno: Si <input type="radio" name="signolimiteBorderInterno" value="Si" class="minimal"> &nbsp; No <input type="radio" name="signolimiteBorderInterno" value="No" class="minimal"> 
                            </td>
                          </tr>
                          <tr>
                            <td>
                              Signo de la Cresta: Si <input type="radio" name="signoCresta" value="Si" class="minimal"> &nbsp; No <input type="radio" name="signoCresta" value="No" class="minimal">
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
                            <td>Vasos Atípicos: Si <input type="radio" name="vasosAtipicos" value="Si" class="minimal"> &nbsp; No <input type="radio" name="vasosAtipicos" value="No" class="minimal"></td>
                            <td>Superficie Irregular: Si <input type="radio" name="superficieIrregular" value="Si" class="minimal"> &nbsp; No <input type="radio" name="superficieIrregular" value="No" class="minimal"></td>
                            <td>Necrosis: Si <input type="radio" name="necrosis" value="Si" class="minimal"> &nbsp; No <input type="radio" name="necrosis" value="No" class="minimal"></td>
                            <td>Tumor: Si <input type="radio" name="tumor" value="Si" class="minimal"> &nbsp; No <input type="radio" name="tumor" value="No" class="minimal"></td>
                          </tr>
                          <tr>
                            <td>Vasos Frágiles: Si <input type="radio" name="vasosFragiles" value="Si" class="minimal"> &nbsp; No <input type="radio" name="vasosFragiles" value="No" class="minimal"></td>
                            <td>Lesión Exofitica: Si <input type="radio" name="lesionExofitica" value="Si" class="minimal"> &nbsp; No <input type="radio" name="lesionExofitica" value="No" class="minimal"></td>
                            <td colspan="2">Ulceración: Si <input type="radio" name="ulceracion" value="Si" class="minimal"> &nbsp; No <input type="radio" name="ulceracion" value="No" class="minimal"></td>
                          </tr>
                        </table>
                      </div>

                      <div class="col-md-12">
                        <table class="table table-bordered" >
                          <tr>
                            <th colspan="5" class="text-center">Resultados de Biopsia</th>
                          </tr>
                          <tr>
                            <td>Negativo: Si <input type="radio" name="resultadoBiopsia"  class="minimal"> &nbsp; No <input type="radio" name="resultadoBiopsia"  class="minimal"></td>
                            <td>NIC I: Si <input type="radio" name="NIC_I" value="Si" class="minimal"> &nbsp; No <input type="radio" name="NIC_I" value="No" class="minimal"></td>
                            <td>NIC II: Si <input type="radio" name="NIC_II" value="Si" class="minimal"> &nbsp; No <input type="radio" name="NIC_II" value="No" class="minimal"></td>
                            <td>NIC III: Si <input type="radio" name="NIC_III" value="Si" class="minimal"> &nbsp; No <input type="radio" name="NIC_III" value="No" class="minimal"></td>
                            <td>CIS: Si <input type="radio" name="CIS" value="Si" class="minimal"> &nbsp; No <input type="radio" name="CIS" value="No" class="minimal"></td>
                          </tr>
                          <tr>
                            <td>CA Invasor: Si <input type="radio" name="CA_Invasor" value="Si" class="minimal"> &nbsp; No <input type="radio" name="CA_Invasor" value="No" class="minimal"></td>
                            <td>Adenosis: Si <input type="radio" name="Adenosis" value="Si" class="minimal"> &nbsp; No <input type="radio" name="Adenosis" value="No" class="minimal"></td>
                            <td>Adeno CA Invasor: Si <input type="radio" name="adeno_CAInvasor" value="Si" class="minimal"> &nbsp; No <input type="radio" name="adeno_CAInvasor" value="No" class="minimal"></td>
                            <td colspan="2">Otros: <input type="radio" name="otros"  value="otros" class="minimal"></td>
                          </tr>
                        </table>
                      </div>

                      <div class="col-md-12">
                        <table class="table table-bordered" >
                          <tr>
                            <th colspan="2" class="text-center">Tratamiento</th>
                          </tr>
                          <tr>
                            <td>Crioterapia: Si <input type="radio" name="crioterapia" value="Si" class="minimal"> &nbsp; No <input type="radio" name="crioterapia" value="No" class="minimal"></td>
                            <td>
                              <div class="form-horizontal">
                                <label class="col-md-3 control-label">Fecha: </label>
                                <div class="col-md-7">
                                  <input type="date" class="form-control" name="fecha_crioterapia" >
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              Escisión:<br>
                              Tipo I - Reseca completamente la ectocervix <input type="radio" name="escision" value="Tipo I - Reseca completamente la ectocervix" class="minimal">  <br>
                              Tipo II - Reseca la zona de transformación y una pequeña cantidad de epitelio endocervical <input type="radio" name="escision" value="Tipo II - Reseca la zona de transformación y una pequeña cantidad de epitelio endocervical" class="minimal"> <br>
                              Tipo III . Reseca endocervical <input type="radio" name="escision" value="Tipo III - Reseca endocervical" class="minimal"> 
                            </td>


                            <td>
                              <div class="form-horizontal">
                                <label class="col-md-3 control-label">Fecha: </label>
                                <div class="col-md-7">
                                  <input type="date" class="form-control" name="fecha_escision" >
                                </div>
                              </div>
                            </td>
                          </tr>
                        </table>
                      </div>
                    </div>

                    <div class="form-group col-md-12"><hr style="border-color:blue;"></div>
                    <br>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Diagnóstico</label>
                          <textarea class="form-control"  name="diagnostico3" placeholder="" rows="3" ></textarea>
                        </div>
                      </div>
                    </div>
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