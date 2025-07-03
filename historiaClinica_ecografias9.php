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
                <!-- 

                    ECOGRAFÍA OBSTÉTRICA 

                --> <br> <br>
                    <div class="box-header with-border text-center">
                      <h2 class="box-title">Ecografía Ginecológica</h2>
                    </div>
                    <br>  <div class="form-group col-md-12"><hr style="border-color:blue;"></div>
                    <input type="hidden" name="tipo_ecografia"  value="Ecografia Ginecologica">

                   
 <br>

                         

                
                    <div class="box-header with-border"  align="center">
                      <h1 class="box-title">I.Útero </h1>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Posición de Cérvix </label>
                          <input type="text" name="distanica" class="form-control">
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




 <br>
                    <div class="box-header with-border">
                      <h1 class="box-title"> II. Fondo del saco</h1>
                    </div>
                   

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">Descripción </label>
                          <input type="text" name="descripcion1" class="form-control">
                        </div>
                      </div>
                   
                      </div>





 <br><div class="form-group col-md-12"><hr style="border-color:blue;"></div>
                    <div class="box-header with-border"  align="center">
                      <h1 class="box-title">III. Ovario Derecho </h1>
                    </div>
                    <br>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Medidas </label>
                          <input type="text" name="medida" class="form-control">
                        </div>
                      </div>
                      

                   
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Volumen  </label>
                          <input type="text" name="volume" class="form-control">
                        </div>
                      </div>
                     


                     
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Aspecto </label>
                          <input type="text" name="aspecto" class="form-control">
                        </div>
                      </div>
<div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Pocisión</label>
                          <input type="text" name="posicion" class="form-control">
                        </div>
                      </div>
                    </div>




  <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Número de Folículos</label>
                          <input type="text" name="numerofoliculos" class="form-control">
                        </div>
                      </div>
                      

                   
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Tamaño del Folículo Mayor </label>
                          <input type="text" name="tamañafoliculo" class="form-control">
                        </div>
                      </div>
                     


                     
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Masa Anexial  </label>
                          <input type="text" name="masa" class="form-control">
                        </div>
                      </div>

                    </div>


 <div class="row"> 


<div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">MALIGNO</label>
<br>

                        <div class="form-group">
                        <label class="control-label">  Tumor sólido contorno Irregular</label>  

                        <label><input type="radio" name="tumor" value="Si"> Sí</label>

                        <label><input type="radio" name="tumor" value="no"> No</label>

                        </div>
                     </div>
                     


                        <div class="form-group">
                        <label class="control-label"> Ascitis </label>  

                        <label><input type="radio" name="ascitis" value="Si"> Sí</label>

                        <label><input type="radio" name="ascitis" value="no"> No</label>

                        </div>



<div class="form-group">
                        <label class="control-label"> Mayor Igual 4 proyecciones Papilares: </label>  

                        <label><input type="radio" name="proyecciones" value="Si"> Sí</label>

                        <label><input type="radio" name="proyecciones" value="no"> No</label>

                        </div>

<div class="form-group">
                        <label class="control-label"> Tumor Multilocular > 10 cm  </label>  

                        <label><input type="radio" name="multilocular" value="Si"> Sí</label>

                        <label><input type="radio" name="multilocular" value="no"> No</label>

                        </div>

<div class="form-group">
                        <label class="control-label"> Vascularización abundante  </label>  

                        <label><input type="radio" name="vascularizacion" value="Si"> Sí</label>

                        <label><input type="radio" name="vascularizacion" value="no"> No</label>

                        </div>


                      </div>


                     
                     
                      

                   
 <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">BENIGNO </label>  <br>
                          <div class="form-group">
                        <label class="control-label">  Lesión Unilocular </label>  

                        <label><input type="radio" name="unilocular" value="Si"> Sí</label>

                        <label><input type="radio" name="unilocular" value="no"> No</label>

                        </div>
                     </div>
                     


                        <div class="form-group">
                        <label class="control-label"> Componente sólido <7mm</label>  

                        <label><input type="radio" name="componente" value="Si"> Sí</label>

                        <label><input type="radio" name="componente" value="no"> No</label>

                        </div>



<div class="form-group">
                        <label class="control-label">Sombra Acústica: </label>  

                        <label><input type="radio" name="sombra" value="Si"> Sí</label>

                        <label><input type="radio" name="sombra" value="no"> No</label>

                        </div>

<div class="form-group">
                        <label class="control-label"> Tumor Multilocular >10 cm  </label>  

                        <label><input type="radio" name="tumormutilocular" value="Si"> Sí</label>

                        <label><input type="radio" name="tumormutilocular" value="no"> No</label>

                        </div>

<div class="form-group">
                        <label class="control-label"> Vascularización ausente </label>  

                        <label><input type="radio" name="vascularizaciona" value="Si"> Sí</label>

                        <label><input type="radio" name="vascularizaciona" value="no"> No</label>

                        </div>


                      </div>


  </div>



 <br><div class="form-group col-md-12"><hr style="border-color:blue;"></div>
                    <div class="box-header with-border" align="center">
                      <h1 class="box-title">IV. Ovario Izquierdo</h1>
                    </div>
                    <br>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Medidas </label>
                          <input type="text" name="medida1" class="form-control">
                        </div>
                      </div>
                      

                   
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Volumen  </label>
                          <input type="text" name="volume1" class="form-control">
                        </div>
                      </div>
                     


                     
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Aspecto </label>
                          <input type="text" name="aspecto1" class="form-control">
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Pocisión</label>
                          <input type="text" name="posicion1" class="form-control">
                        </div>
                      </div>
                    </div>

                    </div>




  <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Número de Folículos</label>
                          <input type="text" name="numerofoliculos1" class="form-control">
                        </div>
                      </div>
                      

                   
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Tamaño del Folículo Mayor </label>
                          <input type="text" name="tamañafoliculo1" class="form-control">
                        </div>
                      </div>
                     



   <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Masa Anexial  </label>
                          <input type="text" name="masa1" class="form-control">
                        </div>
                      </div>

                    </div>


 <div class="row"> 


<div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">MALIGNO</label>
<br>

                        <div class="form-group">
                        <label class="control-label">  Tumor sólido contorno Irregular</label>  

                        <label><input type="radio" name="tumor1" value="Si"> Sí</label>

                        <label><input type="radio" name="tumor1" value="no"> No</label>

                        </div>
                     </div>
                     


                        <div class="form-group">
                        <label class="control-label"> Ascitis </label>  

                        <label><input type="radio" name="ascitis1" value="Si"> Sí</label>

                        <label><input type="radio" name="ascitis1" value="no"> No</label>

                        </div>



<div class="form-group">
                        <label class="control-label"> Mayor Igual 4 proyecciones Papilares: </label>  

                        <label><input type="radio" name="proyecciones1" value="Si"> Sí</label>

                        <label><input type="radio" name="proyecciones1" value="no"> No</label>

                        </div>

<div class="form-group">
                        <label class="control-label"> Tumor Multilocular > 10 cm  </label>  

                        <label><input type="radio" name="multilocular1" value="Si"> Sí</label>

                        <label><input type="radio" name="multilocular1" value="no"> No</label>

                        </div>

<div class="form-group">
                        <label class="control-label"> Vascularización abundante  </label>  

                        <label><input type="radio" name="vascularizacion1" value="Si"> Sí</label>

                        <label><input type="radio" name="vascularizacion1" value="no"> No</label>

                        </div>


                      </div>


                     
                     
                      

                   
 <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">BENIGNO </label>  <br>
                          <div class="form-group">
                        <label class="control-label">  Lesión Unilocular </label>  

                        <label><input type="radio" name="unilocular1" value="Si"> Sí</label>

                        <label><input type="radio" name="unilocular1" value="no"> No</label>

                        </div>
                     </div>
                     


                        <div class="form-group">
                        <label class="control-label"> Componente sólido < 7mm</label>  

                        <label><input type="radio" name="componente1" value="Si"> Sí</label>

                        <label><input type="radio" name="componente1" value="no"> No</label>

                        </div>



<div class="form-group">
                        <label class="control-label">Sombra Acústica: </label>  

                        <label><input type="radio" name="sombra1" value="Si"> Sí</label>

                        <label><input type="radio" name="sombra1" value="no"> No</label>

                        </div>

<div class="form-group">
                        <label class="control-label"> Tumor Multilocular > 10 cm  </label>  

                        <label><input type="radio" name="tumormutilocular1" value="Si"> Sí</label>

                        <label><input type="radio" name="tumormutilocular1" value="no"> No</label>

                        </div>

<div class="form-group">
                        <label class="control-label"> Vascularización ausente </label>  

                        <label><input type="radio" name="vascularizaciona1" value="Si"> Sí</label>

                        <label><input type="radio" name="vascularizaciona1" value="no"> No</label>

                        </div>

                      </div>

                      </div>

<div class="form-group col-md-12"><hr style="border-color:blue;"></div>
                    <div class="box-header with-border" align="center">
                      <h1 class="box-title">V. Linea Endometrial </h1>
                    </div>
                    <br>

 <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Pre Menopausica </label>
                          <input type="text" name="premenopausica" class="form-control">
                        </div>
                      </div>

 <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Post Menopausica </label>
                          <input type="text" name="PostMenopausica" class="form-control">
                        </div>
                      </div>

<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Post Progesterona</label>
                          <input type="text" name="PostProgesterona" class="form-control">
                        </div>
                      </div>
<div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Post TRH</label>
                          <input type="text" name="postrh" class="form-control">
                        </div>
                      </div>

<div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Grosor de la linea Endometrial </label>
                          <input type="text" name="grosor" class="form-control">
                        </div>
                      </div>

<div class="col-md-6">
<div class="form-group">
                        <label class="control-label"> Presencia de sangrado vaginal </label>  

                        <label><input type="radio" name="sangradovaginal" value="Si"> Sí</label>

                        <label><input type="radio" name="sangradovaginal" value="no"> No</label>

                        </div> </div>

<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Medidas </label>
                          <input type="text" name="medida2" class="form-control">
                        </div>
                      </div>
                      
<div class="col-md-6">
<div class="form-group">
                        <label class="control-label">Liquido Centro de Cavidad Uterina  </label>  

                        <label><input type="radio" name="liquidouterino" value="Si"> Sí</label>

                        <label><input type="radio" name="liquidouterino" value="no"> No</label>

                        </div></div>


<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Medidas </label>
                          <input type="text" name="medida3" class="form-control">
                        </div>
                      </div>



<div class="col-md-6">
<div class="form-group">
                        <label class="control-label">Lesión Intracavitaria  </label>  

                        <label><input type="radio" name="intracavitaria" value="Si"> Sí</label>

                        <label><input type="radio" name="intracavitaria" value="no"> No</label>

                        </div></div>


<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Medidas </label>
                          <input type="text" name="medida4" class="form-control">
                        </div>
                      </div>

<div class="col-md-2">
                        <div class="form-group">
                          <label class="control-label">Extendida >= 25% </label>
                         <label><input type="radio" name="extendida" value="Si"> Sí</label>
                          <label class="control-label">Localizada < 25% </label>
                         <label><input type="radio" name="localizada" value="Si"> Sí</label>

                        </div>
                      </div>

<div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label"><h4>Ecotextrura:</h4></label>
                          </div>
                      </div>

<div class="col-md-4">
<div class="form-group">
                        <label class="control-label">Hiperecogenica</label>  

                        <label><input type="radio" name="Hiperecogenica" value="Si"> Sí</label>

                        <label><input type="radio" name="Hiperecogenica" value="no"> No</label>

                        </div></div>

<div class="col-md-4">
<div class="form-group">
                        <label class="control-label">IsoEcogenica</label>  

                        <label><input type="radio" name="IsoEcogenica" value="Si"> Sí</label>

                        <label><input type="radio" name="IsoEcogenica" value="no"> No</label>

                        </div></div>



<div class="col-md-4">
<div class="form-group">
                        <label class="control-label"> HipoEcogenica</label>  

                        <label><input type="radio" name=" HipoEcogenica" value="Si"> Sí</label>

                        <label><input type="radio" name=" HipoEcogenica" value="no"> No</label>

                        </div></div>


<div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label"> <h4>Forma:</h4> </label>
                          </div>
                      </div>

<div class="col-md-4">
<div class="form-group">
                        <label class="control-label">Uniforme u Homogeneo</label>  

                        <label><input type="radio" name="formauni" value="Si"> Sí</label>

                        <label><input type="radio" name="formauni" value="no"> No</label>

                        </div></div>

<div class="col-md-4">
<div class="form-group">
                        <label class="control-label">No Uniforme o Heterogeneo </label>  

                        <label><input type="radio" name="nouniforme" value="Si"> Sí</label>

                        <label><input type="radio" name="nouniforme" value="no"> No</label>

                        </div></div>

<div class="col-md-4">
<div class="form-group">
                        <label class="control-label">Presencia de Interface Conservada </label>  

                        <label><input type="radio" name="Interface" value="Si"> Sí</label>

                        <label><input type="radio" name="Interface" value="no"> No</label>

                        </div></div>


<div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label"> <h4>Unión Endometrio-Miometro:</h4> </label>
                          </div>
                      </div>

<div class="col-md-3">
<div class="form-group">
                        <label class="control-label">Regular</label>  

                        <label><input type="radio" name="Regular" value="Si"> Sí</label>

                      

                        </div></div>

<div class="col-md-3">
<div class="form-group">
                        <label class="control-label">Irregular</label>  

                        <label><input type="radio" name="Irregular" value="Si"> Sí</label>

                       

                        </div></div>

<div class="col-md-3">
<div class="form-group">
                        <label class="control-label">Interrumpida</label>  

                        <label><input type="radio" name="Interrumpida" value="Si"> Sí</label>

                       

                        </div></div>

<div class="col-md-3">
<div class="form-group">
                        <label class="control-label">No definida</label>  

                        <label><input type="radio" name="nodefinida" value="Si"> Sí</label>

                        </div></div>




<div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Margen del Miometro libre del tumor(mm) </label>
                          <input type="text" name="margen" class="form-control">
                        </div>
                      </div>


<div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Relación diámetro tumoral/ diámetro AP Uterino </label>
                          <input type="text" name="relacion" class="form-control">
                        </div>
                      </div>


<div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Patrón Vascular Tumoral </label>
                          <input type="text" name="patron" class="form-control">
                        </div>
                      </div>
<div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Distancia del tumor al cérvix(mm) </label>
                          <input type="text" name="distanciatc" class="form-control">
                        </div>
                      </div>

<div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Índice de resistencia vascular </label>
                          <input type="text" name="indice" class="form-control">
                        </div>
                      </div>

<div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Velocidad máxima de flujo en sistoles del vaso tumoral </label>
                          <input type="text" name="velocidad" class="form-control">
                        </div>
                      </div>

<div class="col-md-6">
<div class="form-group">
                        <label class="control-label">Sinequias </label>  

                        <label><input type="radio" name="Sinequias" value="Si"> Sí</label>

                        <label><input type="radio" name="Sinequias" value="no"> No</label>

                        </div></div>
</div>



<div class="form-group col-md-12"><hr style="border-color:blue;"></div>
                   


 <div class="form-group col-md-12">
<div class="form-group">
<label class="control-label">DIAGNÓSTICO </label>  

 <textarea type="textarea" class="form-control input-lg" id="diagnostico" name="diagnostico" placeholder="Diagnóstico">   </textarea>  </div> 


</div>





                </div>   </div>    

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