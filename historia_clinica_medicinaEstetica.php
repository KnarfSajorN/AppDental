   <?php 
   include 'header.php';
   include 'menu.php';?>


   <script type="text/javascript">
function mostrar(id) {
    if (id == "servicio1") {
        $("#servicio1").show();
        $("#servicio2").hide();
        $("#servicio3").hide();
        $("#servicio4").hide();

    }

    if (id == "servicio2") {
        $("#servicio1").hide();
        $("#servicio2").show();
        $("#servicio3").hide();
        $("#servicio4").hide();

    }

    if (id == "servicio3") {
        $("#servicio1").hide();
        $("#servicio2").hide();
        $("#servicio3").show();
        $("#servicio4").hide();

    }

    if (id == "servicio4") {
        $("#servicio1").hide();
        $("#servicio2").hide();
        $("#servicio3").hide();
        $("#servicio4").show();

    }


}



   </script>


   <?php
  
  $clienteId = ($_GET['cI'] != '' ? decrypt($_GET['cI']) : $_GET['clienteId']) ;

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
    $activo               =$rowMotorizado['activo'];
    $genero=$rowMotorizado['genero'];
    $direccion_cliente    =$rowMotorizado['direccion_cliente'];
    $telefono_cliente     =$rowMotorizado['telefono_cliente'];
    $edad_cliente         =$rowMotorizado['edad_cliente'];
    $profesion_cliente    =$rowMotorizado['profesion_cliente'];
    $acompananteFamiliar  =$rowMotorizado['acompananteFamiliar'];
    $telefono_acompanante =$rowMotorizado['telefono_acompanante'];
    $antecedentes         =$rowMotorizado['antecedentes'];   
    $fotoperfil           =$rowMotorizado['fotoperfil']; 
    $tiposSangre          =$rowMotorizado['tiposSangre']; 
    $esDonante            =$rowMotorizado['esDonante']; 
    $tomaMedicamento      =$rowMotorizado['tomaMedicamento']; 

    $fechaNacimiento      =$rowMotorizado['fechaNacimiento']; 

    $entidadSalud         =$rowMotorizado['entidadSalud']; 
    $seguro               =$rowMotorizado['seguro']; 

    $nota                 =$rowMotorizado['nota']; 
    $enfermedadesPequeno  =$rowMotorizado['enfermedadesPequeno']; 
    $alergias             =$rowMotorizado['alergias']; 


    $peso           =$rowMotorizado['peso']; 
    $altura           =$rowMotorizado['altura']; 
    $imc           =$rowMotorizado['imc']; 
    $ComposicionCorporal           =$rowMotorizado['ComposicionCorporal']; 
     // ----------------------------------------------------------------------------------------------------------------------------


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


  $queryconfig=mysqli_query($conn3,"SELECT * FROM  config where ID_Usuario=$ID");


  $nrowl=mysqli_num_rows($queryconfig);
  while($rowconfig=mysqli_fetch_array($queryconfig))
  {
    $cie10 = $rowconfig['cie10'];
    $pro1  = $rowconfig['pro1'];
    $pro2  = $rowconfig['pro2'];
  }


  ?>


   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper p-3" style="background: white !important;">
       <!-- Content Header (Page header) -->
       <section class="content-header">
           <h1>
               Procedimiento

           </h1>
           <!-- <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio </a></li>
        <li><a href="#">Procedimiento</a></li>

      </ol> -->
       </section>

       <!-- Main content -->
       <section class="content">
           <div class="">
               <div class="col-xs-12">


                   <div class="box">

                       <!-- /.box-header -->
                       <div class="box-body row">

                            <?php echo datosPacientes($clienteId); ?>
                            <!--
                           <div class="col-md-5">

                               <label><strong>Correo:</strong></label>
                               <label> <?php echo $correo_cliente;?> </label>


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
                               <label><strong>Cédula o ID:</strong></label>
                               <label><?php echo $CODI_CLIENTE;?></label>

                               <br>
                               <label><strong> Es donante:</strong></label>
                               <label><?php echo $esDonante;?></label>

                               <br>
                               <label><strong>Entidad de salud :</strong></label>
                               <label><?php echo $entidadSalud;?></label>



                           </div>

                           <div class="col-md-5">
                               <label><strong> Dirección cliente:</strong></label>
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

                               <br>
                               <label><strong>Seguro :</strong></label>
                               <label><?php echo $seguro;?></label>



                           </div>
                            -->
                            <!--
                           <div class="col-md-2">

                               <?php
                               /*
                // echo strlen($logoF);
              if (strlen($fotoperfil) > 0) { 
                echo '<img src="'.$Base.'/pascientes/'.$fotoperfil.'" width="90%" height="20%">';
              }
              else
              {

                echo '';
              }


                /*

                   <input type="button" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" value="Historial consultas" 
              onclick="javascript:window.open('consultaHistoriaMedica.php?tipo=<?php echo $clienteId?>&ID=<?php echo $ID?>','','width=600,height=400,left=50,top=50,toolbar=yes');"
                               />

                               */
                               ?>

                           </div>
                           <br>
                            -->
                           <div class="col-md-12">
                               <hr>
                               <!-- <div class="col-md-6">  
                <h4 class="card-title">Agregar tratamiento</h4>                                 
              </div> -->

                               <div class="col-md-6" align="right">
                                   <h4 class="card-title"> <?php echo date("d-m-Y h:m")?> </h4>
                               </div>


                               <br>


                           </div>
            

                           <form class="form-horizontal row" action="hcmeGuardar" method="POST"
                               enctype="multipart/form-data" id="FormularioHistoriaClinica" >

                               <!-- ********************************************************************************************************************************
     ********************************************************    Tratamiento laser    ********************************************
     ******************************************************************************************************************************** -->



                               <div class="col-md-12 center text-center">
                                   <div style="background-color:#c0c0c0;text-align: -webkit-center;">
                                       <canvas id="canvas1" name="canvas1" height="400" width="800"></canvas>
                                       <input type="file" id="fileUpload1" name="fileUpload1" style="display: flex;">
                                   </div>
                                   <a class="btn" onclick="guardarTrazo()">Guardar Trazo</a>
                                   <input type="hidden" name="tarea" id="tarea"  required>
                                   <a onclick="clear1()">Limpiar</a>
                                   <br>
                                   <label>Notas</label>
                                   <textarea class="form-control input-lg" rows="5" name="tarea2"></textarea>
                                   <hr>
                               </div>


                               <div class="col-md-12">
                                   <label>TRATAMIENTO ANTI-ENVEJECIMIENTO</label>
                                   <select id="status" name="envejecimiento" class="form-control select2"
                                       style="width: 100%;">
                                       <option>Seleccione </option>
                                       <option value="Toxina Botulinica">Toxina Botulínica</option>
                                       <option value="Rellenos de &aacutecido Hialur&oacutenico">Rellenos de Ácido
                                           Hialurónico</option>
                                       <option value="Rellenos de &aacutecido Polil&aacutecidoctico">Rellenos de Ácido
                                           Poliláctico</option>
                                       <option value="Rellenos de Hidroxiapatita C&aacutelcica">Rellenos de
                                           Hidroxiapatita Cálcica</option>
                                       <option value="Hilos Tensores PDO">Hilos Tensores PDO</option>
                                       <option value="L&aacuteser ENERJET">L&aacuteser ENERJET</option>
                                       <option value="L&aacuteser PLEXR">Láser PLEXR</option>
                                       <option value="Mesoterapia facial">Mesoterapia facial</option>
                                       <option value="Mesoterapia corporal">Mesoterapia corporal</option>
                                       <option value="Micropigmentaci&oacuten">Micropigmentación</option>
                                       <option value="Peeling">Peeling</option>
                                       <option value="Hiperhidrosis">Hiperhidrosis</option>
                                       <option value="Bruxismo">Bruxismo</option>
                                       <option value="L&aacuteser IPL">Láser IPL</option>
                                       <option value="L&aacuteser CO2">Láser CO2</option>
                                       <option value="Skinbooster">Skinbooster</option>
                                       <option value="Factores de crecimiento">Factores de crecimiento</option>
                                       <option value="Mesoterapia Capilar">Mesoterapia Capilar</option>
                                       <option value="Medicina Antiaging">Medicina Antiaging</option>
                                       <option value="Varices">Varices</option>





                                   </select>
                               </div>
                               <!--
          <div class="col-md-6"> 

 

        <label>CIRUGÍA </label>
        <select id="status" name="cirugia" class="form-control select2"   style="width: 100%;">
        <option >Seleccione </option>
        <option value="Cirug&iacuteas Faciales">Cirugías Faciales</option>
        <option value="Cirug&iacutea de Mano">Cirugía de Mano</option>
        <option value="Cirug&iacuteas Corporales">Cirugías Corporales</option>
        <option value="Quemaduras">Quemaduras</option>
        <option value="Malformaciones Cong&eacutenitas">Malformaciones Congénitas
        </option>
        <option value="Procedimientos No Quir&uacutergicos">Procedimientos No Quirúrgicos</option>
        <option value="Otras Cirug&iacuteas Reconstructivas">Otras Cirugías Reconstructivas</option>


        </select>

 
           
          </div>


        -->




                               <div class="col-md-12">
                                   <BR> <BR>
                                   <label>DIAGNÓSTICO CIE10</label>



                                   <?php

          if ($cie10 == 1) {
            ?>
                                   <select id="cie10" name="cie10D1" class="form-control" style="width: 100%;" onChange="Buscar_CIE10()">
                                       <option value="" selected="selected">Seleccione</option>
                                       <?php
                                              //$usuario_id1 = $ID.'cie10';
                                              /*
              $queryList = mysqli_query($conn3, "SELECT * FROM cie10 order by codigo");
              $nrowl = mysqli_num_rows($queryList);
              while ($row_recordset32 = mysqli_fetch_array($queryList)) {

                $codigo      = $row_recordset32['codigo'];
                $descripcionee      = $row_recordset32['descripcion'];
                echo "<option value='$codigo - $descripcionee'>$codigo - $descripcionee</option>";
              }
              */
              ?>
                                   </select>


                                   <?php
          } else {
            echo ' <div align="center"> Lista CIE10 desactivada, para activar debes entrar a configuración <a href="' . $Base . '/config" target="_blank"> <strong> <i class="fa fa fa-gears"></i> clic aquí Configuración y perfil </strong></a>  y luego seleccionamos la pestaña  <strong> listas </strong><br> <font color="red">  Necesitas ayuda, Solicítalo por <a href="' . $Base . '/soporte" target="_blank"> <strong> <i class="fa fa fa-support"></i> soporte </strong></a>  </font></h6></div>';
          }
          ?>
                               </div>
                               <br>
                               <div class="col-md-12">
                                   <label>Motivo de la consulta:</label>

                                   <div class="form-group col-md-12">
                                       <textarea id="descripcion" name="motivoConsulta" class="textarea"
                                           placeholder="Motivo de la consulta"
                                           style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                   </div>

                               </div>



                               <div class=" col-md-12">
                                   <div align="left"> Enfermedad actual</div>

                                   <textarea id="enfermedadActual" name="enfermedadActual" class="textarea"
                                       placeholder="Enfermedad Actual"
                                       style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>


                               </div>




                               <div class=" col-md-12">

                                   <h4 class="box-title">
                                       Revisión por sistema
                                   </h4>

                               </div>





                               <div class="form-group col-md-3" align="right">
                                   Tos
                                   <input value="1" type="radio" name="rs2" id="lt" class="flat-red" /> SI
                                   <input value="2" type="radio" name="rs2" id="lt" class="flat-red" /> NO
                               </div>
                               <div class="form-group col-md-3" align="right">
                                   Rinorrea
                                   <input value="1" type="radio" name="rs3" id="lt" class="flat-red" /> SI
                                   <input value="2" type="radio" name="rs3" id="lt" class="flat-red" /> NO
                               </div>

                               <div class="form-group col-md-3" align="right">
                                   Cefalea

                                   <input value="1" type="radio" name="rs4" id="lt" class="flat-red" /> SI
                                   <input value="2" type="radio" name="rs4" id="lt" class="flat-red" /> NO
                               </div>

                               <div class="form-group col-md-3" align="right">
                                   Mareo

                                   <input value="1" type="radio" name="rs5" id="lt" class="flat-red" /> SI
                                   <input value="2" type="radio" name="rs5" id="lt" class="flat-red" /> NO
                               </div>

                               <div class="form-group col-md-3" align="right">
                                   Vómito

                                   <input value="1" type="radio" name="rs6" id="lt" class="flat-red" /> SI
                                   <input value="2" type="radio" name="rs6" id="lt" class="flat-red" /> NO
                               </div>

                               <div class="form-group col-md-3" align="right">
                                   Diarrea

                                   <input value="1" type="radio" name="rs7" id="lt" class="flat-red" /> SI
                                   <input value="2" type="radio" name="rs7" id="lt" class="flat-red" /> NO
                               </div>

                               <div class="form-group col-md-3" align="right">
                                   Disuria

                                   <input value="1" type="radio" name="rs8" id="lt" class="flat-red" /> SI
                                   <input value="2" type="radio" name="rs8" id="lt" class="flat-red" /> NO
                               </div>

                               <div class="form-group col-md-3" align="right">
                                   Dolor de Garganta

                                   <input value="1" type="radio" name="rs9" id="lt" class="flat-red" /> SI
                                   <input value="2" type="radio" name="rs9" id="lt" class="flat-red" /> NO
                               </div>

                               <div class="form-group col-md-3" align="right">
                                   Dolor Abdominal

                                   <input value="1" type="radio" name="rs10" id="lt" class="flat-red" /> SI
                                   <input value="2" type="radio" name="rs10" id="lt" class="flat-red" /> NO
                               </div>

                               <div class="form-group col-md-3" align="right">
                                   Disnea

                                   <input value="1" type="radio" name="rs11" id="lt" class="flat-red" /> SI
                                   <input value="2" type="radio" name="rs11" id="lt" class="flat-red" /> NO
                               </div>

                               <div class="form-group col-md-3" align="right">
                                   Otalgia

                                   <input value="1" type="radio" name="rs12" id="lt" class="flat-red" /> SI
                                   <input value="2" type="radio" name="rs12" id="lt" class="flat-red" /> NO
                               </div>

                               <div class="form-group col-md-3" align="right">
                                   Perdida de Peso

                                   <input value="1" type="radio" name="rs13" id="lt" class="flat-red" /> SI
                                   <input value="2" type="radio" name="rs13" id="lt" class="flat-red" /> NO
                               </div>

                               <div class="form-group col-md-3" align="right">
                                   Sangre en heces/defecar

                                   <input value="1" type="radio" name="rs14" id="lt" class="flat-red" /> SI
                                   <input value="2" type="radio" name="rs14" id="lt" class="flat-red" /> NO
                               </div>

                               <div class="form-group col-md-3" align="right">
                                   Hematuria

                                   <input value="1" type="radio" name="rs15" id="lt" class="flat-red" /> SI
                                   <input value="2" type="radio" name="rs15" id="lt" class="flat-red" /> NO
                               </div>

                               <div class="form-group col-md-3" align="right">
                                   Dolor en las extremidades

                                   <input value="1" type="radio" name="rs16" id="lt" class="flat-red" /> SI
                                   <input value="2" type="radio" name="rs16" id="lt" class="flat-red" /> NO
                               </div>

                               <div class="form-group col-md-3" align="right">
                                   Parestesias

                                   <input value="1" type="radio" name="rs17" id="lt" class="flat-red" /> SI
                                   <input value="2" type="radio" name="rs17" id="lt" class="flat-red" /> NO
                               </div>

                               <div class="form-group col-md-3" align="right">
                                   Hipoestesias

                                   <input value="1" type="radio" name="rs18" id="lt" class="flat-red" /> SI
                                   <input value="2" type="radio" name="rs18" id="lt" class="flat-red" /> NO
                               </div>

                               <div class="form-group col-md-12">
                                   <hr>
                               </div>






                               <div class=" col-md-12">

                                   <h4 class="box-title">
                                       Antecedentes
                                   </h4>

                               </div>







                               <div class="form-group col-md-4">
                                   <input type="checkbox" class="minimal" id="to24" name="to24">
                                   <font size="4">Cicatriz Queloide </font>
                               </div>


                               <div class="form-group col-md-4">
                                   <input type="checkbox" class="minimal" id="to25" name="to25">
                                   <font size="4">Diabetes </font>
                               </div>
                               <div class="form-group col-md-4">
                                   <input type="checkbox" class="minimal" id="to26" name="to26">
                                   <font size="4">Epilepsia </font>
                               </div>
                               <div class="form-group col-md-4">
                                   <input type="checkbox" class="minimal" id="to27" name="to27">
                                   <font size="4">Herpes </font>
                               </div>
                               <div class="form-group col-md-4">
                                   <input type="checkbox" class="minimal" id="to28" name="to28">
                                   <font size="4">Cancer </font>
                               </div>
                               <div class="form-group col-md-4">
                                   <input type="checkbox" class="minimal" id="to29" name="to29">
                                   <font size="4">Enfermedades Cardíacas </font>
                               </div>

                               <div class="form-group col-md-4">
                                   <input type="checkbox" class="minimal" id="to30" name="to30">
                                   <font size="4">Alergías </font>
                               </div>
                               <div class="form-group col-md-4">
                                   <input type="checkbox" class="minimal" id="to31" name="to31">
                                   <font size="4">Usa Esteroides </font>
                               </div>


                               <div class="form-group col-md-4">
                                   <input type="checkbox" class="minimal" id="to34" name="to32">
                                   <font size="4">Uso de lentes de contacto </font>
                               </div>
                               <div class="form-group col-md-4">
                                   <input type="checkbox" class="minimal" id="to33" name="to33">
                                   <font size="4">Embarazo</font>
                               </div>
                               <div class="form-group col-md-4">
                                   <input type="checkbox" class="minimal" id="to37" name="to34">
                                   <font size="4">Enfermedades Autoinmunes </font>
                               </div>


                               <div class="form-group col-md-4">
                                   <input type="checkbox" class="minimal" id="to37" name="to35">
                                   <font size="4">Actividad Física </font>
                               </div>


                               <div class="form-group col-md-4">
                                   <input type="checkbox" class="minimal" id="to37" name="to36">
                                   <font size="4">Uso de Isotetrinoina </font>
                               </div>



                               <div class="form-group col-md-4">
                                   <input type="checkbox" class="minimal" id="to37" name="to37">
                                   <font size="4"> Cicatriz Atrófica </font>
                               </div>

                               <div class="form-group col-md-4">
                                   <input type="checkbox" class="minimal" id="to37" name="to38">
                                   <font size="4"> Cirugías </font>
                               </div>

                               <div class="form-group col-md-4">
                                   <input type="checkbox" class="minimal" id="to37" name="to39">
                                   <font size="4"> Procedimientos estéticos </font>
                               </div>

                               <div class="form-group col-md-4">
                                   <input type="checkbox" class="minimal" id="to37" name="to40">
                                   <font size="4"> Procedimiento dental </font>
                               </div>

                               <div class="form-group col-md-4">
                                   <input type="checkbox" class="minimal" id="to37" name="to41">
                                   <font size="4">Anestesía </font>
                               </div>

                               <div class="form-group col-md-4">
                                   <input type="checkbox" class="minimal" id="to37" name="to42">
                                   <font size="4"> Trastornos Tiroideos </font>
                               </div>

                               <div class="form-group col-md-4">
                                   <input type="checkbox" class="minimal" id="to37" name="to43">
                                   <font size="4">Rosácea </font>
                               </div>

                               <div class="form-group col-md-4">
                                   <input type="checkbox" class="minimal" id="to37" name="to44">
                                   <font size="4"> Acné</font>
                               </div>

                               <div class="form-group col-md-4">
                                   <input type="checkbox" class="minimal" id="to37" name="to45">
                                   <font size="4"> Dermatitis </font>
                               </div>

                               <div class="form-group col-md-4">
                                   <input type="checkbox" class="minimal" id="to37" name="to46">
                                   <font size="4"> LES </font>
                               </div>
                               <div class="form-group col-md-4">
                                   <input type="checkbox" class="minimal" id="to37" name="to47">
                                   <font size="4">Artritis Reumatoidea </font>
                               </div>
                               <div class="form-group col-md-4">
                                   <input type="checkbox" class="minimal" id="to37" name="to48">
                                   <font size="4"> Vasculitis </font>
                               </div>
                               <div class="form-group col-md-4">
                                   <input type="checkbox" class="minimal" id="to37" name="to49">
                                   <font size="4"> Enfermedad hepática </font>
                               </div>
                               <div class="form-group col-md-4">
                                   <input type="checkbox" class="minimal" id="to37" name="to50">
                                   <font size="4">Trastornos de la Coagulación </font>
                               </div>
                               <div class="form-group col-md-4">
                                   <input type="checkbox" class="minimal" id="to37" name="to51">
                                   <font size="4"> Miopatía </font>
                               </div>












                               <div class="form-group col-md-12"><strong>Antecedentes Personales </strong> </div>




                               <div class="col-md-12">
                                    <textarea id="motivoConsulta" name="AntecedentesPersonales" class="textarea"
                                   placeholder="Antecedentes Personales"
                                   style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                </div>

                               <hr>


                               <div class="form-group col-md-12"><strong> Antecedentes Familiar </strong> </div>

                               <div class="col-md-12">
                                    <textarea id="motivoConsulta" name="AntecedentesFamiliar" class="textarea"
                                    placeholder="Antecedentes Familiar"
                                    style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                </div>


                               <hr>

























                               <?php $idUsuario = $_SESSION['ID'];?>












                               <div class="col-md-12">
                                   <font size="1"> Cálculo de IMC </font>
                               </div>

                               <div class="form-group col-md-3">
                                   <div align="left">Peso en KG</div>
                                   <input type="number" class="form-control input-lg" id="peso4" name="peso"
                                       onChange="calcularimc4();" step="any">
                               </div>

                               <div class="form-group col-md-3">
                                   <div align="left">Altura en <strong> Centímetros </strong></div>
                                   <input type="number" class="form-control input-lg" id="altura4" name="altura"
                                       onChange="calcularimc4();" step="any">
                               </div>

                               <div class="form-group col-md-3">
                                   <div align="left"> Índice de masa corporal </div>
                                   <input type="number" class="form-control input-lg" id="imc4" name="imc" step="any">
                               </div>

                               <div class="form-group col-md-3">
                                   <div align="left">Composición corporal</div>
                                   <input type="text" class="form-control input-lg" id="ComposicionCorporal4"
                                       name="ComposicionCorporal">
                               </div>

                               <div class="form-group col-md-12">
                                   <div align="left">Procedimiento </div>
                               </div>


                               <div class="box-body pad col-md-12">

                                   <textarea id="procedimiento" name="procedimiento" class="textarea"
                                       placeholder="Procedimiento"
                                       style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                               </div>



                               <div class="form-group col-md-12">
                                   <div align="left">Plan de atención </div>
                               </div>
                               <div class="box-body pad col-md-12">

                                   <textarea id="planAtencion" name="planAtencion" class="textarea"
                                       placeholder="Plan de atención"
                                       style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                               </div>



                               <div class="form-group col-md-12">
                                   <div align="left">Notas o comentarios </div>
                               </div>
                               <div class="box-body pad col-md-12">

                                   <textarea id="nota" name="nota" class="textarea" placeholder="Notas o comentarios"
                                       style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                               </div>





                               <div class="form-group col-md-4">
                                   <div align="left">Foto Antes</div>



                                   <input type="hidden" class="form-control input-lg" value="foto1">
                                   <input type="file" class="form-control input-lg" name="imagen1">

                               </div>
                               <div class="form-group col-md-4">
                                   <div align="left">Foto Durante</div>



                                   <input type="hidden" class="form-control input-lg" value="foto2">
                                   <input type="file" class="form-control input-lg" name="imagen2">

                               </div>

                               <div class="form-group col-md-4">
                                   <div align="left">Foto Después</div>



                                   <input type="hidden" class="form-control input-lg" value="foto3">
                                   <input type="file" class="form-control input-lg" name="imagen3">

                               </div>





                               <div class="col-sm-12">
                                   <div align="center">
                                       <label> <strong> Información de facturación </strong> </label>
                                   </div>


                                   <div class="col-md-6">
                                       Copago
                                   </div>

                                   <div class="col-md-6">
                                       <input type="number" step="0.01" name="pagoAbono" class="form-control input-lg"
                                           id="abono" min="1">
                                   </div>



                               </div>

                               <!--<div class="col-sm-12">
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
  <select id="doctor" name="doctor" class="form-control select2" style="width: 100%;" >
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
    <input type="radio" name="P" value="0" class="flat-red" checked>
    <i class="fa fa-user"></i>  Presencial  

    <input type="radio" name="P" value="1"  class="flat-red"  >
    <i class="fa fa-video-camera"></i>   Virtual
  </label>
</div>-->
                               <input type="hidden" name="email" value="<?php echo $correo_cliente;?>">
                               <input type="hidden" name="nombre" value="<?php echo $nombre_cliente;?>">
                               <input type="hidden" name="telefono" value="<?php echo $telefono_cliente ;?>">
                               <input type="hidden" name="ID" value="<?php echo $_SESSION['ID']?>">
                               <input type="hidden" name="clienteId" value="<?php echo $clienteId?>">
                               <input type="hidden" name="operador" value="<?php echo $_SESSION['username']?>">
                               <input type="hidden" name="sucursal" value="<?php echo $_SESSION["sucursal"] ?>">



                               <!-- <div align="center"> 
 <br>
 <br>
 <br>
 <div class="col-sm-12">
  <br>
  <br>
  <center><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow"> <h2> <strong>  G u a r d a r  </strong> </h2> </button></center>

</div>
</div> -->

<input type="checkbox" required style="width:17px;margin:5px;margin-top:15px" ><p><br>Ya terminé</p>
                               <button type="submit"
                                   class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">Guardar</button>







                               <input type="hidden" name="tipo_cliente" valur="1">


                           </form>

                       </div>
                   </div>
               </div>

               <!-- /.row -->
       </section>
       <!-- /.content -->
   </div>
   </div>





   <?php include("footer.php")?>
   <script>
  // no quitar para evitar problemas de que guarde con este caracter " ' "
  $(document).on('input', 'input[type="text"], textarea', function() {
    $(this).val($(this).val().replace(/[']/g, ''));
  });
</script>

   <script src="<?php echo $Base ?>firma/js/signature_pad.umd.js"></script>
   <script src="<?php echo $Base ?>firma/js/app.js"></script>
   <script type="text/javascript">
// modulo de dibujo
function guardarTrazo() {
    var dataURL = signaturePad1.toDataURL();
    document.getElementById("tarea").value = dataURL;
}

function clearFileInput(ctrl) {
    try {
        ctrl.value = null;
    } catch (ex) {}
    if (ctrl.value) {
        ctrl.parentNode.replaceChild(ctrl.cloneNode(true), ctrl);
    }
}
$(function() {
    window.signaturePad1 = new SignaturePad($('#canvas1').get(0), {});
})

var clear1 = function() {
    window.signaturePad1.clear();
    clearFileInput(document.getElementById("fileUpload1"));

}
   </script>
   <script type="text/javascript">
const EL = (sel) => document.querySelector(sel);
const canvasContext = EL("#canvas1").getContext("2d");

var imagenHeight = document.getElementById('canvas1').clientHeight;
console.log(imagenHeight);
var imagenWidth = document.getElementById('canvas1').clientWidth;
console.log(imagenWidth);
var imagenTag = document.getElementById('fileUpload1');

var canvasTag = document.getElementById('canvas1');

imagenTag.setAttribute('width', imagenWidth);
imagenTag.setAttribute('height', imagenHeight);
canvasTag.setAttribute('width', imagenWidth);
canvasTag.setAttribute('height', imagenHeight);



function readImage1() {
    if (!this.files || !this.files[0]) return;

    const FR = new FileReader();
    FR.addEventListener("load", (evt) => {
        const img = new Image();
        img.addEventListener("load", () => {
            var imagenW = img.width;
            var imagenH = img.height;
            // ajustamos la altura del canva segun la imagen
            //document.getElementById("canvas2").style.height = imagenH ;
            var ratio = imagenW / imagenH;
            if (ratio > 1) {
                imagenWidth2 = imagenWidth;
                //imagenHeight = imagenHeight/ratio;  
            } else {
                imagenWidth2 = imagenWidth * ratio;
                //imagenHeight = imagenHeight;
            }
            canvasContext.clearRect(img, 0, 0, 99999999999, 99999999999);
            canvasContext.drawImage(img, 0, 0, imagenWidth2, imagenHeight);
            canvasContext.clearRect(0, 0, canvasContext.width, canvasContext.height);
            canvasContext.beginPath(); //ADD THIS LINE!<<<<<<<<<<<<<
            canvasContext.moveTo(0, 0);
            canvasContext.lineTo(event.clientX, event.clientY);
            canvasContext.stroke();

        });
        img.src = evt.target.result;
    });
    FR.readAsDataURL(this.files[0]);
}
EL("#fileUpload1").addEventListener("change", readImage1);
   </script>





   <script type="text/javascript">
function verDia() {
    // estas son las variables que enviamos

    var fecha = $("#fecha").val();
    var Hora = $("#Hora").val();
    var usuario_id = $("#usuario_id").val();

    // aqui enviamos el mensaje por medio de un arreglo     

    $.ajax({
        type: "POST",
        url: "disponibilidad.php",
        data: {
            fecha: fecha,
            Hora: Hora,
            usuario_id: usuario_id
        },
        success: function(response) {
            $('#div-results').html(response);

        }
    });
};

function verHora() {
    // estas son las variables que enviamos

    var fecha = $("#fecha").val();
    var Hora = $("#Hora").val();
    var usuario_id = $("#usuario_id").val();

    // aqui enviamos el mensaje por medio de un arreglo     

    $.ajax({
        type: "POST",
        url: "disponibilidadHora.php",
        data: {
            fecha: fecha,
            Hora: Hora,
            usuario_id: usuario_id
        },
        success: function(response) {
            $('#div-resultsHora').html(response);

        }
    });
};




function calcularimc1() {
    m1 = document.getElementById("peso1").value;
    m2 = document.getElementById("altura1").value;

    r1 = m1 / ((m2 / 100) * (m2 / 100));

    document.getElementById("imc1").value = r1.toFixed(2);

    if (r1.toFixed(2) < 16)
        ComposicionCorporal1 = 'Infrapeso: Delgadez Severa';
    else if (r1.toFixed(2) > 16 & r1.toFixed(2) < 16.99)
        ComposicionCorporal1 = 'Infrapeso: Delgadez moderada';
    else if (r1.toFixed(2) > 17 & r1.toFixed(2) < 18.49)
        ComposicionCorporal1 = 'Infrapeso: Delgadez aceptable';
    else if (r1.toFixed(2) > 18.50 & r1.toFixed(2) < 24.99)
        ComposicionCorporal1 = 'Peso Normal';

    else if (r1.toFixed(2) > 25.00 & r1.toFixed(2) < 29.99)
        ComposicionCorporal1 = 'Sobrepeso';

    else if (r1.toFixed(2) > 30.00 & r1.toFixed(2) < 34.99)
        ComposicionCorporal1 = 'Obeso: Tipo I';

    else if (r1.toFixed(2) > 35.00 & r1.toFixed(2) < 40)
        ComposicionCorporal1 = 'Obeso: Tipo II';

    else if (r1.toFixed(2) > 40.00)
        ComposicionCorporal1 = 'Obeso: Tipo III';

    document.getElementById("ComposicionCorporal1").value = ComposicionCorporal1;

}

function calcularimc2() {
    m1 = document.getElementById("peso2").value;
    m2 = document.getElementById("altura2").value;

    r2 = m1 / ((m2 / 100) * (m2 / 100));

    document.getElementById("imc2").value = r2.toFixed(2);

    if (r2.toFixed(2) < 16)
        ComposicionCorporal2 = 'Infrapeso: Delgadez Severa';
    else if (r2.toFixed(2) > 16 & r2.toFixed(2) < 16.99)
        ComposicionCorporal2 = 'Infrapeso: Delgadez moderada';
    else if (r2.toFixed(2) > 17 & r2.toFixed(2) < 18.49)
        ComposicionCorporal2 = 'Infrapeso: Delgadez aceptable';
    else if (r2.toFixed(2) > 18.50 & r2.toFixed(2) < 24.99)
        ComposicionCorporal2 = 'Peso Normal';

    else if (r2.toFixed(2) > 25.00 & r2.toFixed(2) < 29.99)
        ComposicionCorporal2 = 'Sobrepeso';

    else if (r2.toFixed(2) > 30.00 & r2.toFixed(2) < 34.99)
        ComposicionCorporal2 = 'Obeso: Tipo I';

    else if (r2.toFixed(2) > 35.00 & r2.toFixed(2) < 40)
        ComposicionCorporal2 = 'Obeso: Tipo II';

    else if (r2.toFixed(2) > 40.00)
        ComposicionCorporal2 = 'Obeso: Tipo III';

    document.getElementById("ComposicionCorporal2").value = ComposicionCorporal2;

}


function calcularimc3() {
    m1 = document.getElementById("peso3").value;
    m2 = document.getElementById("altura3").value;

    r3 = m1 / ((m2 / 100) * (m2 / 100));

    document.getElementById("imc3").value = r3.toFixed(2);

    if (r3.toFixed(2) < 16)
        ComposicionCorporal3 = 'Infrapeso: Delgadez Severa';
    else if (r3.toFixed(2) > 16 & r3.toFixed(2) < 16.99)
        ComposicionCorporal3 = 'Infrapeso: Delgadez moderada';
    else if (r3.toFixed(2) > 17 & r3.toFixed(2) < 18.49)
        ComposicionCorporal3 = 'Infrapeso: Delgadez aceptable';
    else if (r3.toFixed(2) > 18.50 & r3.toFixed(2) < 24.99)
        ComposicionCorporal3 = 'Peso Normal';

    else if (r3.toFixed(2) > 25.00 & r3.toFixed(2) < 29.99)
        ComposicionCorporal3 = 'Sobrepeso';

    else if (r3.toFixed(2) > 30.00 & r3.toFixed(2) < 34.99)
        ComposicionCorporal3 = 'Obeso: Tipo I';

    else if (r3.toFixed(2) > 35.00 & r3.toFixed(2) < 40)
        ComposicionCorporal3 = 'Obeso: Tipo II';

    else if (r3.toFixed(2) > 40.00)
        ComposicionCorporal3 = 'Obeso: Tipo III';

    document.getElementById("ComposicionCorporal3").value = ComposicionCorporal3;

}


function calcularimc4() {
    m1 = document.getElementById("peso4").value;
    m2 = document.getElementById("altura4").value;

    r4 = m1 / ((m2 / 100) * (m2 / 100));

    document.getElementById("imc4").value = r4.toFixed(2);

    if (r4.toFixed(2) < 16)
        ComposicionCorporal4 = 'Infrapeso: Delgadez Severa';
    else if (r4.toFixed(2) > 16 & r4.toFixed(2) < 16.99)
        ComposicionCorporal4 = 'Infrapeso: Delgadez moderada';
    else if (r4.toFixed(2) > 17 & r4.toFixed(2) < 18.49)
        ComposicionCorporal4 = 'Infrapeso: Delgadez aceptable';
    else if (r4.toFixed(2) > 18.50 & r4.toFixed(2) < 24.99)
        ComposicionCorporal4 = 'Peso Normal';

    else if (r4.toFixed(2) > 25.00 & r4.toFixed(2) < 29.99)
        ComposicionCorporal4 = 'Sobrepeso';

    else if (r4.toFixed(2) > 30.00 & r4.toFixed(2) < 34.99)
        ComposicionCorporal4 = 'Obeso: Tipo I';

    else if (r4.toFixed(2) > 35.00 & r4.toFixed(2) < 40)
        ComposicionCorporal4 = 'Obeso: Tipo II';

    else if (r4.toFixed(2) > 40.00)
        ComposicionCorporal4 = 'Obeso: Tipo III';

    document.getElementById("ComposicionCorporal4").value = ComposicionCorporal4;

}
   </script>

<script src="apiVoz_3.2.js"></script>
<?php include 'plantilla.php';?>

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

    $(document).ready(function() {
        Buscar_CIE10();
    });
</script>


<script src="plugins/LottieK/lottie.min.js"></script>
 <?php   
$usuariod_id_autoguardado = $_SESSION["ID"];
$cliente_id_autoguardado = decrypt($_GET['cI']);
$Nombre_Tabla_autoguardado = "historiaClinica5";//nombre de la tabla de la base de datos de la historia

$RutaFinal_Encryptado = $_SERVER['SCRIPT_URI']."?cl={$cliente_id_autoguardado}";


include 'AutoGuardados/HistoriaMedicinaEsteticaEncryptada/AutoGuardado_Historia_Encryptado.php';//usar esta para  la historia de medicina estetica

?>