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
                    <label><?php  echo calculaedad($fechaNacimiento);?></label>
                    
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
                <!-- 

                    ECOGRAFÍA OBSTÉTRICA 

                --> <br> <br>
                    <div class="box-header with-border text-center">
                     <h2 class="box-title">Ecografía Obstetrica Primer Trimestre</h2>
                    </div>
                    
                    <input type="hidden" name="tipo_ecografia"  value="Ecografia  Primer Trimestre">

                    <br> <div class="row">

                     <div class="col-sm-6">
                        <div align="left"><label>Fecha Ultima Regla </label></div>

                        <input type="date" id="fecha" name="fecha" >
      
                      </div>



                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Edad Gestacional Proyectada </label>
                          <input type="text" name="edadgestacional" class="form-control">
                        </div>
                      </div>
                    </div>

 <br>

                        <div class="col-md-12">
                        <table class="table table-bordered" >
                          <tr >
          
                          </tr>
                          
                          <tr>
                            <td>
                              Condiciones  donde se realiza el estudio:
                              Buenas <input type="radio" name="condiciones" value="Buenas" class="minimal">
                              Limitadas <input type="radio" name="condiciones" value="Limitadas" class="minimal">
                            </td>
                            <td>
                              Tipo de Gestación:
                              Única <input type="radio" name="tipogestacion" value="Unica" class="minimal">
                              Multiple <input type="radio" name="tipogestacion" value="Multiple" class="minimal">
                            </td>
<td>
                             Corionicidad:
                              Sí <input type="radio" name="corionicidad" value="Sí" class="minimal">
                              No <input type="radio" name="corionicidad" value="No" class="minimal">
                            </td>

                          </tr>
                        </table>
                      </div>


                    <br>  <div class="form-group col-md-12"><hr style="border-color:blue;"></div>

                    <div class="box-header with-border"  align="center">
                      <h1 class="box-title">I. Útero </h1>
                    </div>
                    <br>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Posición útero </label>
                          <input type="text" name="descripcion" class="form-control">
                        </div>
                      </div>
                      

                   
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Medidas </label>
                          <input type="text" name="medidas" class="form-control">
                        </div>
                      </div>
                     


                     
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Volumen </label>
                          <input type="text" name="volumen" class="form-control">
                        </div>
                      </div>

                    </div>

<br><div class="form-group col-md-12"><hr style="border-color:blue;"></div>
<div class="box-header with-border"  align="center">
                      <h1 class="box-title">II. Endometrio </h1>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">Descripción </label>
                          <input type="text" name="endometrio" class="form-control">
                        </div>
                      </div>  
                    <br>

<br><div class="form-group col-md-12"><hr style="border-color:blue;"></div>
             <div class="box-header with-border " align="center">
                      <h1 class="box-title">III.Saco Gestacional</h1>
                    </div>
                   

<div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Descripción </label>
                          <input type="text" name="descripcion1" class="form-control">
                        </div>
                      </div>  
                       <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Medidad de SG </label>
                          <input type="text" name="descripcion2" class="form-control">
                        </div>
                      </div>  
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Corresponde a:</label>
                          <input type="text" name="descripcion3" class="form-control">
                        </div>
                      </div>
                   </div>
                   

  <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Forma</label>
                          <input type="text" name="descripcion4" class="form-control">
                        </div>
                      </div>  
                       <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Ubicación</label>
                          <input type="text" name="descripcion5" class="form-control">
                        </div>
                      </div>  
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Reacción Corto decidual</label>
                          <input type="text" name="descripcion6" class="form-control">
                        </div>
                      </div>  
                   </div>
                   
<div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Bordes</label>
                          <input type="text" name="descripcion7" class="form-control">
                        </div>
                      </div>  
                       <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Hematomas</label>
                          <input type="text" name="descripcion8" class="form-control">
                        </div>
                      </div>  
                      
                   </div>





<br><div class="form-group col-md-12"><hr style="border-color:blue;"></div>
                    <div class="box-header with-border"  align="center">
                      <h1 class="box-title" > IV. Embrión </h1>
                    </div>
                    <br>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Medidas mm LCN </label>
                          <input type="text" name="medida3" class="form-control">
                        </div>
                      </div>
                      

                   
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Correspondientas a:  </label>
                          <input type="text" name="semanas" class="form-control">
                            <span class="help-block">semanas</span>
                        </div>
                      </div>
                     


                     
                      <div class="col-md-4">
                        <div class="form-group">
                        <label class="control-label">  Polo cefálico</label>  <br>

                        <label><input type="radio" name="polocefalico" value="Si"> Sí</label>

                        <label><input type="radio" name="polocefalico" value="no"> No</label>

                          
                        </div>
                      </div>

                    </div>



 <div class="box-header with-border"  >
                      <h2 class="box-title" ><b> Craneo</b></h2>
                    </div>
                    <br>

                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Forma:</label>
                          <input type="text" name="forma" class="form-control">
                        </div>
                      </div>
                      

                   
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Osificación Craneal:  </label>
                          <input type="text" name="osificacion" class="form-control">
                            
                        </div>
                      </div>
                     


                     
                      <div class="col-md-3">
                        <div class="form-group">
                        <label class="control-label">  Línea Media:</label>  <br>

                       <input type="text" name="lineamedia" class="form-control">
                        </div>
                      </div>






                      <div class="col-md-3">
                        <div class="form-group">
                        <label class="control-label">  Plexos Coroideos:</label>  <br>

                       <input type="text" name="plexos" class="form-control">
                        </div>
                      </div>
                    </div>

  

                  


<div class="box-header with-border"  >
                      <h2 class="box-title" ><b> Rostro </b></h2>
                    </div>
                    <br>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Orbitas:</label>
                          <input type="text" name="orbitas" class="form-control">
                        </div>
                      </div>
                      

                   
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Perfil:  </label>
                          <input type="text" name="perfil" class="form-control">
                            
                        </div>
                      </div>
                     


                     
                      <div class="col-md-4">
                        <div class="form-group">
                        <label class="control-label">  Micrognatia:</label>  <br>

                       <input type="text" name="micrognatia" class="form-control">
                        </div>
                      </div>

                 
                    </div>




<div class="box-header with-border"  >
                      <h2 class="box-title" > <b>Toráx</b> </h2>
                    </div>
                    <br>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Área Pulmonar:</label>
                          <input type="text" name="areap" class="form-control">
                        </div>
                      </div>
                      

                   
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Diagfragma :  </label>
                          <input type="text" name="diagfragma" class="form-control">
                            
                        </div>
                      </div>
                     
                                
                    </div>

<div class="box-header with-border"  >
                      <h2 class="box-title" > <b>Corazón </b> </h2>
                    </div>
                    <br>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Actividad Cardiaca</label>
                          <input type="text" name="actividadc" class="form-control">
                        </div>
                      </div>
                      

                   
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Tamaño </label>
                          <input type="text" name="tamaño" class="form-control">
                            
                        </div>
                      </div>
                     
                                
                    </div>
 

 <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Axis Cardiaco:</label>
                          <input type="text" name="axis" class="form-control">
                        </div>
                      </div>
                      

                   
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Imagen de cuatro cámaras:</label>
                          <input type="text" name="imagen" class="form-control">
                            
                        </div>
                      </div>
                     
                                
                    </div>

<div class="box-header with-border"  >
                      <h2 class="box-title" >  <b>Abdomén </b>  </h2>
                    </div>
                    <br>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Estomago:</label>
                          <input type="text" name="estomago" class="form-control">
                        </div>
                      </div>
                      

                   
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Riñón: </label>
                          <input type="text" name="riñon" class="form-control">
                            
                        </div>
                      </div>


                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Vejiga: </label>
                          <input type="text" name="vejiga" class="form-control">
                            
                        </div>
                      </div>
                                
                    </div>
 

 <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Vasos umbilicales:</label>
                          <input type="text" name="vasos" class="form-control">
                        </div>
                      </div>
                      

                   
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Inserción de cordón en pared abdominal:</label>
                          <input type="text" name="cordon" class="form-control">
                            
                        </div>
                      </div>
          
                    </div>

               

<div class="box-header with-border"  >
                      <h2 class="box-title" > <b>Extremidades</b> </h2>
                    </div>
                    <br>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                        <label class="control-label">  Existencia </label>  <br>

                        <label><input type="radio" name="extre" value="presente"> Presente</label>

                        <label><input type="radio" name="extre" value="ausente"> Ausente</label>

                          </div> 
                        </div>
                      

                   
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Humero</label>
                          <input type="text" name="humero" class="form-control">
                            
                        </div>
                      </div>


                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Fémur  </label>
                          <input type="text" name="femur" class="form-control">
                            
                        </div>
                      </div>
                                
                    </div>


  <div class="row">
    <div class="col-md-6">

<div class="box-header with-border">
                      <h2 class="box-title" > <b>Liquido Amniótico</b> </h2>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                        <label class="control-label">  Existencia </label>  <br>

                        <label><input type="radio" name="liquido" value="adecuado"> Adecuado</label>

                        <label><input type="radio" name="liquido" value="noadecuado"> No adecuado </label>

                          </div> 
                        </div>
                      
 </div>

</div>



    <div class="col-md-6">

<div class="box-header with-border"  >
                      <h2 class="box-title" ><b>Vesicula Vitelina<b>  </h2>
                    </div>
                   

                    <div class="row">
                      <div class="col-md-6">
                        
                        <div class="form-group">
                          <label class="control-label">Valor en mm</label>
                          <input type="text" name="vesicula" class="form-control">
                            
                        </div>
                      </div>

                          
                        </div>

  </div>  </div>



 

<div class="box-header with-border"  >
                      <h2 class="box-title" > <b>Placenta</b>  </h2>
                    </div>
                   

                    <div class="row">
                      <div class="col-md-12">
                        <table class="table table-bordered" >
                         
                          
                          <tr>
                            <td>
                              Saco gestacional ubicado en el segmento uterino inferior:
                              SÍ<input type="radio" name="saco" value="si" class="minimal">
                              No <input type="radio" name="saco" value="no" class="minimal">
                            </td>  </tr>
                          <tr>   <td>
                              Múltiples lagos venesos  dentro del lecho placentario:
                              Única <input type="radio" name="lagos" value="si" class="minimal">
                              Multiple <input type="radio" name="lagos" value="no" class="minimal">
                            </td>  </tr>
 <tr><td>
                             Implantación de saso gestacional a nivel de cicatríz anterior:
                              Sí <input type="radio" name="implantacion" value="Sí" class="minimal">
                              No <input type="radio" name="implantacion" value="No" class="minimal">
                            </td>  </tr>

      <br>                    

                              <tr>
                            <td>
                              Anterior:
                              SÍ<input type="radio" name="anterior" value="si" class="minimal">
                             
                            </td>

                            <td>
                              Posterior:
                              Única <input type="radio" name="posterior" value="si" class="minimal">
                             
                          </td>
                           <td>  Fundica:
                              Sí <input type="radio" name="fundica" value="Sí" class="minimal">
                             
                            </td>

                          </tr>



                        </table>
                      </div>


                          
                        </div>

 






<br><div class="form-group col-md-12"><hr style="border-color:blue;"></div>
                    <div class="box-header with-border"  align="center">
                      <h1 class="box-title" > V. Hallazgos </h1>
                    </div>
                    <br>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">Descripcion </label>
                          <input type="text" name="Hallazgos" class="form-control">
                        </div>
                      </div>
                      
 </div>







<br><div class="form-group col-md-12"><hr style="border-color:blue;"></div>
                    <div class="box-header with-border"  align="center">
                      <h1 class="box-title" > VI. Diagnostico </h1>
                    </div>
                    <br>

                    <div class="row">




                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label"> Descripcion </label>
                          <input type="text" name="diagnostico" class="form-control">
                        </div>
                      </div>
                      
 </div>




<div class="form-group col-md-12"><hr style="border-color:blue;"></div>






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