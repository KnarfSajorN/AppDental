   <?php
    include 'header.php';
    include 'menu.php'; ?>


   <script type="text/javascript">
     function mostrar(id) {
       if (id == "servicio1") {
         $("#servicio1").show();
         $("#servicio2").hide();
         $("#servicio3").hide();
         $("#servicio4").hide();
         $("#servicio5").hide();
         $("#servicio6").hide();

       }

       if (id == "servicio2") {
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

       if (id == "servicio4") {
         $("#servicio1").hide();
         $("#servicio2").hide();
         $("#servicio3").hide();
         $("#servicio4").show();
         $("#servicio5").hide();
         $("#servicio6").hide();
       }
       if (id == "servicio5") {
         $("#servicio1").hide();
         $("#servicio2").hide();
         $("#servicio3").hide();
         $("#servicio4").hide();
         $("#servicio5").show();
         $("#servicio6").hide();
       }
       if (id == "servicio6") {
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
    $clienteId = decrypt($_GET['cI']);

    $conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));

    $queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id=$clienteId");
    $nrowl = mysqli_num_rows($queryList);
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
      $usuario_id = $rowMotorizado['usuario_id'];
      $nombre_cliente = $rowMotorizado['nombre_cliente'];
      $celular = $rowMotorizado['celular_cliente'];
      $ciudad_cliente = $rowMotorizado['ciudad_cliente'];
      $correo_cliente = $rowMotorizado['correo_cliente'];
      $CODI_CLIENTE = $rowMotorizado['CODI_CLIENTE'];
      $id_uso_servicio = $rowMotorizado['id_uso_servicio'];
      $tipo_cliente = $rowMotorizado['tipo_cliente'];
      $fechar = $rowMotorizado['fechar'];
      $fecha_actualizado = $rowMotorizado['fecha_actualizado'];
      $activo = $rowMotorizado['activo'];
      $genero = $rowMotorizado['genero'];
      $direccion_cliente = $rowMotorizado['direccion_cliente'];
      $telefono_cliente = $rowMotorizado['telefono_cliente'];
      $edad_cliente = $rowMotorizado['edad_cliente'];
      $profesion_cliente = $rowMotorizado['profesion_cliente'];
      $acompananteFamiliar = $rowMotorizado['acompananteFamiliar'];
      $telefono_acompanante = $rowMotorizado['telefono_acompanante'];
      $antecedentes     = $rowMotorizado['antecedentes'];
      $fotoperfil       = $rowMotorizado['fotoperfil'];
      $tiposSangre      = $rowMotorizado['tiposSangre'];
      $esDonante        = $rowMotorizado['esDonante'];
      $tomaMedicamento  = $rowMotorizado['tomaMedicamento'];

      $fechaNacimiento  = $rowMotorizado['fechaNacimiento'];

      $entidadSalud     = $rowMotorizado['entidadSalud'];
      $seguro           = $rowMotorizado['seguro'];

      $nota           = $rowMotorizado['nota'];
      $enfermedadesPequeno           = $rowMotorizado['enfermedadesPequeno'];
      $alergias           = $rowMotorizado['alergias'];


      $peso           = $rowMotorizado['peso'];
      $altura           = $rowMotorizado['altura'];
      $imc           = $rowMotorizado['imc'];
      $ComposicionCorporal           = $rowMotorizado['ComposicionCorporal'];
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


    ?>


   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper p-3">
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
                 <label> <?php echo $correo_cliente; ?> </label>


                 <br>
                 <label><strong>Nombre:</strong></label>
                 <label><?php echo $nombre_cliente; ?> </label>


                 <br>
                 <label><strong>Celular:</strong></label>
                 <label><?php echo $celular; ?></label>

                 <br>
                 <label><strong>Ciudad:</strong></label>
                 <label><?php echo $ciudad_cliente; ?></label>

                 <br>
                 <label><strong>Fecha registro:</strong></label>
                 <label><?php echo $fechar; ?></label>

                 <br>
                 <label><strong>Cédula o ID:</strong></label>
                 <label><?php echo $CODI_CLIENTE; ?></label>

                 <br>
                 <label><strong> Es donante:</strong></label>
                 <label><?php echo $esDonante; ?></label>

                 <br>
                 <label><strong>Entidad de salud :</strong></label>
                 <label><?php echo $entidadSalud; ?></label>



               </div>

               <div class="col-md-5">
                 <label><strong> Dirección cliente:</strong></label>
                 <label><?php echo $direccion_cliente; ?></label>
                 <br>
                 <label><strong> Teléfono :</strong></label>
                 <label><?php echo $telefono_cliente; ?></label>
                 <br>

                 <label><strong> Fecha de nacimiento :</strong></label>
                 <label><?php echo $fechaNacimiento; ?></label>

                 <br>


                 <label><strong> Edad :</strong></label>
                 <label><?php echo calculaedad($fechaNacimiento); ?></label>

                 <br>

                 <label><strong>Genero:</strong></label>
                 <label><?php echo $genero; ?></label>

                 <br>
                 <label><strong>Profesión :</strong></label>
                 <label><?php echo $profesion_cliente; ?></label>

                 <br>
                 <label><strong>Tipo de sangre :</strong></label>
                 <label><?php echo $tiposSangre; ?></label>

                 <br>

                 <br>
                 <label><strong>Seguro :</strong></label>
                 <label><?php echo $seguro; ?></label>



               </div>

               <div class="col-md-2">

                 <?php
                  // echo strlen($logoF);
                  if (strlen($fotoperfil) > 0) {
                    echo '<img src="' . $Base . '/pascientes/' . $fotoperfil . '" width="90%" height="20%">';
                  } else {

                    echo '';
                  }
                  ?>




               </div>
              -->
               <br>

               <div class="col-md-12">
                 <hr>
                 <div class="col-md-6">
                   <h4 class="card-title">Agregar tratamiento</h4>
                 </div>

                 <div class="col-md-6" align="right">
                   <h4 class="card-title"> <?php echo date("d-m-Y h:m") ?> </h4>
                 </div>


                 <br>

                 <form action="index.php" method="post">
                   <label>Selección tipo de tratamiento </label>
                   <select id="status" name="status" class="form-control select2" onChange="mostrar(this.value);" style="width: 40%;">
                     <option>Seleccione </option>
                     <option value="servicio1">Pestañas</option>
                     <option value="servicio2">Micropigmentación</option>
                     <option value="servicio3">Remoción</option>
                   </select>
                 </form>
               </div>















               <!-- *****************************************      Corporal       ***************************************** -->
               <!-- *****************************************      Corporal       ***************************************** -->
               <!-- *****************************************      Corporal       ***************************************** -->
               <!-- *****************************************      Corporal       ***************************************** -->
               <!-- *****************************************      Corporal       ***************************************** -->
               <!-- *****************************************      Corporal       ***************************************** -->
               <!-- *****************************************      Corporal       ***************************************** -->



               <div id="servicio1" class="element" style="display: none;">
                 <div class="col-md-12">

                   <div align="center">
                     <h2>Pestañas </h2>
                   </div>


                   <form class="form-horizontal row" action="hcspaGuardar" method="POST" enctype="multipart/form-data" id="FormularioHistoriaClinica1">

                     <!-- ********************************************************************************************************************************
     ********************************************************    Tratamiento Corporal    ********************************************
     ******************************************************************************************************************************** -->

                     <div class="col-md-12"> Tratamiento </div>
                     <input type="hidden" name="tratamiento" value="1">



                     <div class="form-group col-md-5">
                       <!-- <font size="4"> Tipo</font>     -->
                     </div>
                     <div class="form-group col-md-7">
                       <select name="to1" class="form-control select2" style="width: 100%;">
                         <option>Seleccione </option>
                         <option value="Extensiones de Pestañas">Extensiones de Pestañas</option>
                         <option value="Lifting de Pestañas ">Lifting de Pestañas</option>
                         <!-- <option value="Medidas Finales">Finales</option> -->
                       </select>
                     </div>

                     <div class="form-group col-md-5">
                       <font size="4"> ¿De que lado duerme?</font>
                     </div>
                     <select name="to2" class="form-control select2" style="width: 100%;">
                       <option value="">Seleccione </option>
                       <option value="Izquierda">Izquierda</option>
                       <option value="Derecha">Derecha</option>
                     </select>

                     <div class="form-group col-md-5">
                       <font size="4"> ¿Alergias?</font>
                     </div>
                     <select name="to3" class="form-control select2" style="width: 100%;">
                       <option value="">Seleccione </option>
                       <option value="SI">SI</option>
                       <option value="NO">NO</option>
                     </select>

                     <div class="form-group col-md-5">
                       <font size="4"> ¿Realiza deportes? </font>
                     </div>
                     <select name="to4" class="form-control select2" style="width: 100%;">
                       <option value="">Seleccione </option>
                       <option value="SI">SI</option>
                       <option value="NO">NO</option>
                     </select>

                     <div class="form-group col-md-5">
                       <font size="4"> ¿Con que frecuencia? </font>
                     </div>
                     <input type="text" name="to5" class="form-control input-lg" id="to5" step="any">

                     <div class="form-group col-md-5">
                       <font size="4"> ¿Estas Embarazada o dando de lactar? </font>
                     </div>
                     <select name="to6" class="form-control select2" style="width: 100%;">
                       <option value="">Seleccione </option>
                       <option value="SI">SI</option>
                       <option value="NO">NO</option>
                     </select>

                     <div class="form-group col-md-5">
                       <font size="4"> ¿Trabaja en área de calor? </font>
                     </div>
                     <select name="to7" class="form-control select2" style="width: 100%;">
                        <option value="">Seleccione </option>
                       <option value="SI">SI</option>
                       <option value="NO">NO</option>
                     </select>
                    
                     <div class="form-group col-md-5">
                       <font size="4"> ¿Te has sostenido a una intervención médica en el ocular? </font>
                     </div>
                     <select name="to8" class="form-control select2" style="width: 100%;">
                        <option value="">Seleccione </option>
                       <option value="SI">SI</option>
                       <option value="NO">NO</option>
                     </select>

                     <div class="form-group col-md-12">
                       <hr style="border-color:blue;">
                     </div>

                     <div class="form-group col-md-12">
                       <div align="left">Curvatura de Pestañas/Goma</div>
                       <input type="text" class="form-control input-lg" name="to15">
                     </div>

                     <div class="form-group col-md-12">
                       <div align="left">Tamaño </div>
                     </div>


                     <div class="box-body pad col-md-12">

                       <textarea name="to16" class="textarea" placeholder="Tamaño" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                     </div>



                     <div class="form-group col-md-12">
                       <div align="left">Grosor </div>
                     </div>
                     <div class="box-body pad col-md-12">

                       <textarea name="to17" class="textarea" placeholder="Grosor" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                     </div>



                     <div class="form-group col-md-12">
                       <div align="left">Diseño Realizado </div>
                     </div>
                     <div class="box-body pad col-md-12">

                       <textarea name="to18" class="textarea" placeholder="Diseño" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                     </div>

                     <div class="form-group col-md-12">
                       <div align="left">Nota </div>
                     </div>
                     <div class="box-body pad col-md-12">

                       <textarea id="nota" name="nota" class="textarea" placeholder="Nota" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                     </div>

                     <div class="form-group col-md-4">
                       <div align="left">Foto Antes</div>

                       <input type="file" class="form-control input-lg" name="img11">

                     </div>
                     <div class="form-group col-md-4">
                       <div align="left">Foto Durante</div>




                       <input type="file" class="form-control input-lg" name="img12">

                     </div>

                     <div class="form-group col-md-4">
                       <div align="left">Foto Después</div>




                       <input type="file" class="form-control input-lg" name="img13">

                     </div>


                     <div class="col-sm-6">
                       <div align="left">
                         <label>Fecha </label>
                       </div>
                       <input type="date" name="fecha" class="form-control input-lg" id="fecha" min="<?php echo date('Y-m-d') ?>" onChange="verDia();">

                       <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID'] ?>">

                       <div id="div-results"></div>
                     </div>


                     <div class="col-sm-6">
                       <div align="left">
                         <label>Hora </label>
                       </div>
                       <input type="time" name="hora" class="form-control input-lg" placeholder="hora" id="Hora" onChange="verHora();">
                       <div id="div-resultsHora"></div>

                     </div>

                     <div class="col-sm-6">

                       <div align="left">
                         <label>Motivo consulta</label>
                       </div>
                       <input type="text" name="motivo" class="form-control input-lg" placeholder="Motivo Consulta">

                     </div>

                     <div class="col-sm-6">
                       <label>Especialista </label>
                       <select id="doctor" name="doctor" class="form-control select2" style="width: 100%;" required="required">
                         <option value="<?php echo $_SESSION['username'] ?>" selected="selected"><?php echo $_SESSION['username'] ?> </option>
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
                         <i class="fa fa-user"></i> Presencial

                         <input type="radio" name="P" value="1" class="flat-red">
                         <i class="fa fa-video-camera"></i> Virtual
                       </label>
                     </div>



                     <input type="hidden" name="email" value="<?php echo $correo_cliente; ?>">
                     <input type="hidden" name="nombre" value="<?php echo $nombre_cliente; ?>">
                     <input type="hidden" name="telefono" value="<?php echo $telefono_cliente; ?>">
                     <input type="hidden" name="ID" value="<?php echo $_SESSION['ID'] ?>">
                     <input type="hidden" name="clienteId" value="<?php echo $clienteId ?>">
                     <input type="hidden" name="operador" value="<?php echo $_SESSION['username'] ?>">



                     <!-- <div align="center">
                       <br>
                       <br>
                       <br>
                       <div class="col-sm-12">
                         <br>
                         <br>
                         <center><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                             <h2> <strong> G u a r d a r </strong> </h2>
                           </button></center>

                       </div>
                     </div> -->

                     <div class="col-md-12">
                        <button class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" type="submit">Guardar</button>
                      </div>

                     <input type="hidden" name="tipo_cliente" valur="1">
                   </form>

                 </div>
               </div>








               <div id="servicio2" class="element" style="display: none;">

                 <div class="form-group col-md-12" align="center">
                   <h2> Micropigmentación </h2>
                 </div>

                 <form class="form-horizontal row" action="historia_clinica_spa_guardar.php" method="POST" enctype="multipart/form-data" id="FormularioHistoriaClinica2">

                   <!-- ********************************************************************************************************************************
     ********************************************************    Tratamiento Corporal    ********************************************
     ******************************************************************************************************************************** -->


                   <input type="hidden" name="tratamiento" value="2">


                   <div class="form-group col-md-12"> <strong> Tratamiento </strong> </div>


                   <select id="motivoConsulta" name="to23" class="form-control select2" style="width: 100%;">

                     <option value="">Selecciona:</option>
                     <option value="Microblading">Microblading</option>
                     <option value="Shading">Shading</option>
                     <option value="Microshading">Microshading</option>
                     <option value="Micro Labios">Micro Labios</option>
                     <option value="Areola">Areola</option>

                   </select>

                   <!-- <textarea id="motivoConsulta" name="to23"  class="textarea" placeholder="Motivo Consulta" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea> -->



                   <div class="form-group col-md-12"><strong>Antecedentes Personales </strong> </div>

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
                     <font size="4">Cáncer </font>
                   </div>
                   <div class="form-group col-md-4">
                     <input type="checkbox" class="minimal" id="to29" name="to29">
                     <font size="4">Enfermedades Cardíacas </font>
                   </div>

                   <div class="form-group col-md-4">
                     <input type="checkbox" class="minimal" id="to30" name="to30">
                     <font size="4">Alergias </font>
                   </div>
                   <div class="form-group col-md-4">
                     <input type="checkbox" class="minimal" id="to31" name="to31">
                     <font size="4">Usa Esteroides </font>
                   </div>


                   <div class="form-group col-md-4">
                     <input type="checkbox" class="minimal" id="to32" name="to32">
                     <font size="4">Uso de lentes de contacto </font>
                   </div>
                   <div class="form-group col-md-4">
                     <input type="checkbox" class="minimal" id="to33" name="to33">
                     <font size="4">Embarazo</font>
                   </div>
                   <div class="form-group col-md-4">
                     <input type="checkbox" class="minimal" id="to34" name="to34">
                     <font size="4">Enfermedades Autoinmunes </font>
                   </div>


                   <div class="form-group col-md-4">
                     <input type="checkbox" class="minimal" id="to35" name="to35">
                     <font size="4">Actividad Física </font>
                   </div>


                   <div class="form-group col-md-4">
                     <input type="checkbox" class="minimal" id="to36" name="to36">
                     <font size="4">Uso de Isotetrinoina </font>
                   </div>



                   <div class="form-group col-md-4">
                     <input type="checkbox" class="minimal" id="to37" name="to37">
                     <font size="4"> Cicatriz Atrófica </font>
                   </div>

                   <div class="form-group col-md-4">
                     <input type="checkbox" class="minimal" id="to38" name="to38">
                     <font size="4"> Cirugías </font>
                   </div>

                   <div class="form-group col-md-4">
                     <input type="checkbox" class="minimal" id="to39" name="to39">
                     <font size="4"> Procedimientos estéticos </font>
                   </div>

                   <div class="form-group col-md-4">
                     <input type="checkbox" class="minimal" id="to40" name="to40">
                     <font size="4"> Procedimiento dental </font>
                   </div>

                   <div class="form-group col-md-4">
                     <input type="checkbox" class="minimal" id="to41" name="to41">
                     <font size="4">Anestesia </font>
                   </div>

                   <div class="form-group col-md-4">
                     <input type="checkbox" class="minimal" id="to42" name="to42">
                     <font size="4"> Trastornos Tiroideos </font>
                   </div>

                   <div class="form-group col-md-4">
                     <input type="checkbox" class="minimal" id="to43" name="to43">
                     <font size="4">Rosácea </font>
                   </div>

                   <div class="form-group col-md-4">
                     <input type="checkbox" class="minimal" id="to44" name="to44">
                     <font size="4"> Acné</font>
                   </div>

                   <div class="form-group col-md-4">
                     <input type="checkbox" class="minimal" id="to45" name="to45">
                     <font size="4"> Dermatitis </font>
                   </div>

                   <div class="form-group col-md-4">
                     <input type="checkbox" class="minimal" id="to46" name="to46">
                     <font size="4"> LES </font>
                   </div>
                   <div class="form-group col-md-4">
                     <input type="checkbox" class="minimal" id="to47" name="to47">
                     <font size="4">Artritis Reumatoidea </font>
                   </div>
                   <div class="form-group col-md-4">
                     <input type="checkbox" class="minimal" id="to48" name="to48">
                     <font size="4"> Vasculitis </font>
                   </div>
                   <div class="form-group col-md-4">
                     <input type="checkbox" class="minimal" id="to49" name="to49">
                     <font size="4"> Enfermedad hepática </font>
                   </div>
                   <div class="form-group col-md-4">
                     <input type="checkbox" class="minimal" id="to50" name="to50">
                     <font size="4">Trastornos de la Coagulación </font>
                   </div>
                   <div class="form-group col-md-4">
                     <input type="checkbox" class="minimal" id="to51" name="to51">
                     <font size="4"> Miopatía </font>
                   </div>






                   <hr>

                   <hr>


                   <div class="form-group col-md-12">

                     Antecedentes Adicionales
                     <input type="text" class="form-control input-lg" name="antAe">
                   </div>




                   <div class="form-group col-md-12">
                     <strong> Tratamientos Anteriores </strong>
                   </div>

                   <div class="form-group col-md-6">
                     <input type="checkbox" class="minimal" id="to401" name="to401" value="Si">
                     <font size="4">SI</font>
                   </div>
                   <div class="form-group col-md-6">
                     <input type="checkbox" class="minimal" id="to411" name="to411" value="No">
                     <font size="4">NO </font>
                   </div>

                   <div class="form-group col-md-12">
                     <div align="left">¿Cual? </div>
                   </div>
                   <div class="box-body pad col-md-12">

                     <textarea id="planAtencion" name="planAtencion" class="textarea" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                   </div>


                   <div class="form-group col-md-12">
                     <hr style="border-color:blue;">
                   </div>



                   <div class="col-md-12"></div>

                   <div class="form-group col-md-6">
                     <div align="left">Marca de Pigmento</div>
                     <input type="text" class="form-control input-lg" id="to52" name="to52">
                   </div>

                   <div class="form-group col-md-6">
                     <div align="left">Color de Pigmento</div>
                     <input type="text" class="form-control input-lg" id="to53" name="to53">
                   </div>

                   <div class="form-group col-md-12">
                     <div align="left">Antecedentes </div>
                   </div>


                   <div class="box-body pad col-md-12">

                     <textarea id="procedimiento" name="procedimiento" class="textarea" placeholder="Antecedentes" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                   </div>

                   <div class="form-group col-md-12">
                     <div align="left">Notas o comentarios </div>
                   </div>
                   <div class="box-body pad col-md-12">

                     <textarea id="nota" name="nota" class="textarea" placeholder="Notas o comentarios" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                   </div>
                   <div class="form-group col-md-4">
                     <div align="left">Foto Antes</div>

                     <input type="file" class="form-control input-lg" name="img11">

                   </div>
                   <div class="form-group col-md-4">
                     <div align="left">Foto Durante</div>




                     <input type="file" class="form-control input-lg" name="img12">

                   </div>

                   <div class="form-group col-md-4">
                     <div align="left">Foto Después</div>




                     <input type="file" class="form-control input-lg" name="img13">

                   </div>



                   <div class="col-sm-12">
                     <div align="center">



                     </div>


                   </div>

                   <div class="col-sm-12">
                     <div align="center">


                       <label> <strong> Próxima consulta o cita (Solo si aplica)</strong> </label>
                     </div>

                   </div>

                   <div class="col-sm-6">
                     <div align="left">
                       <label>Fecha </label>
                     </div>
                     <input type="date" name="fecha" class="form-control input-lg" id="fecha" min="<?php echo date('Y-m-d') ?>" onChange="verDia();">

                     <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID'] ?>">

                     <div id="div-results"></div>
                   </div>


                   <div class="col-sm-6">
                     <div align="left">
                       <label>Hora </label>
                     </div>
                     <input type="time" name="hora" class="form-control input-lg" placeholder="hora" id="Hora" onChange="verHora();">
                     <div id="div-resultsHora"></div>

                   </div>

                   <div class="col-sm-6">

                     <div align="left">
                       <label>Motivo consulta</label>
                     </div>
                     <input type="text" name="motivo" class="form-control input-lg" placeholder="Motivo Consulta">

                   </div>

                   <div class="col-sm-6">
                     <label>Especialista </label>
                     <select id="doctor" name="doctor" class="form-control select2" style="width: 100%;" required="required">
                       <option value="<?php echo $_SESSION['username'] ?>" selected="selected"><?php echo $_SESSION['username'] ?> </option>
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
                       <i class="fa fa-user"></i> Presencial

                       <input type="radio" name="P" value="1" class="flat-red">
                       <i class="fa fa-video-camera"></i> Virtual
                     </label>
                   </div>



                   <input type="hidden" name="email" value="<?php echo $correo_cliente; ?>">
                   <input type="hidden" name="nombre" value="<?php echo $nombre_cliente; ?>">
                   <input type="hidden" name="telefono" value="<?php echo $telefono_cliente; ?>">
                   <input type="hidden" name="ID" value="<?php echo $_SESSION['ID'] ?>">
                   <input type="hidden" name="clienteId" value="<?php echo $clienteId ?>">
                   <input type="hidden" name="operador" value="<?php echo $_SESSION['username'] ?>">



                   <!-- <div align="center">
                     <br>
                     <br>
                     <br>
                     <div class="col-sm-12">
                       <br>
                       <br>
                       <center><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                           <h2> <strong> G u a r d a r </strong> </h2>
                         </button></center>

                     </div>
                   </div> -->

                   <div class="col-md-12">
                        <button class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" type="submit">Guardar</button>
                      </div>
               </div>






               <input type="hidden" name="tipo_cliente" valur="1">


               </form>

               <br>


             </div>
           </div>



           <div id="servicio3" class="element" style="display: none;">
             <div class="col-md-12">

               <div align="center">
                 <h2>Tratamiento láser </h2>
               </div>

               <form class="form-horizontal row" action="historia_clinica_spa_guardar.php" method="POST" enctype="multipart/form-data" id="FormularioHistoriaClinica3">

                 <!-- ********************************************************************************************************************************
     ********************************************************    Tratamiento laser    ********************************************
     ******************************************************************************************************************************** -->

                 <div> Tratamiento láser</div>
                 <input type="hidden" name="tratamiento" value="3">



                 <div class="form-group col-md-12">
                   <font size="4"> <strong> TRATAMIENTO A SEGUIR </strong> </font>
                 </div>





                 <div class="form-group col-md-12">
                   Depilación
                 </div>

                 <div class="form-group col-md-3">
                   <font size="4"><input type="checkbox" class="minimal" id="to1" name="to1">
                     Cejas </font>
                 </div>
                 <div class="form-group col-md-3">
                   <font size="4"><input type="checkbox" class="minimal" id="to2" name="to2">
                     Labios</font>
                 </div>

                 <div class="form-group col-md-3">
                   <font size="4"><input type="checkbox" class="minimal" id="to3" name="to3">
                     Ojos </font>
                 </div>

                 <div class="form-group col-md-3">
                   <font size="4"><input type="checkbox" class="minimal" id="to4" name="to4">
                     Otra área </font>
                 </div>

                 <div class="form-group col-md-12">
                   <hr>
                 </div>

                 <div class="form-group col-md-3">
                   <font size="4"><input type="checkbox" class="minimal" id="to5" name="to5">
                     Eliminación Láser</font>
                 </div>
                 <div class="form-group col-md-3">
                   <font size="4"><input type="checkbox" class="minimal" id="to6" name="to6">
                     Eliminación Química </font>
                 </div>

                 <div class="form-group col-md-3">
                   <font size="4"><input type="checkbox" class="minimal" id="to7" name="to7">
                     Pigmentación</font>
                 </div>


                 <div class="form-group col-md-3">
                   <font size="4"><input type="checkbox" class="minimal" id="to8" name="to8">
                     Terapia de Acne </font>
                 </div>

                 <div class="form-group col-md-3">
                   <font size="4"><input type="checkbox" class="minimal" id="to9" name="to9">
                     Terapia Vacular</font>
                 </div>








                 <div class="form-group col-md-3">
                   Tipo de Vello
                   <select name="to11" class="form-control select2" style="width: 100%;">
                     <option>Seleccione </option>
                     <option value="Grueso">Grueso </option>
                     <option value="Delgado">Delgado </option>
                     <option value="Mediano">Mediano </option>

                   </select>
                 </div>



                 <div class="form-group col-md-3">
                   Densidad
                   <select name="to12" class="form-control select2" style="width: 100%;">
                     <option>Seleccione </option>
                     <option value="Alta">Alta </option>
                     <option value="Medio">Medio </option>
                   </select>
                 </div>

                 <div class="form-group col-md-3">
                   Color
                   <input type="text" name="to13" class="form-control input-lg">
                 </div>



                 <div class="form-group col-md-12">
                   <font size="4"> <strong> INFORMACIÓN PERSONAL </strong> </font>
                 </div>


                 <div class="form-group col-md-4">
                   <font size="4"> Esta Tomando antibióticos </font>
                   <input value="1" type="radio" name="to14" id="lt" class="flat-red" /> SI
                   <input value="2" type="radio" name="to14" id="lt" class="flat-red" /> NO
                 </div>


                 <div class="form-group col-md-4">
                   <font size="4">Toma vitaminas A-B </font>
                   <input value="1" type="radio" name="to15" id="lt" class="flat-red" /> SI
                   <input value="2" type="radio" name="to15" id="lt" class="flat-red" /> NO
                 </div>


                 <div class="form-group col-md-4">
                   <font size="4">Toma Robacutam </font>
                   <input value="1" type="radio" name="to16" id="lt" class="flat-red" /> SI
                   <input value="2" type="radio" name="to16" id="lt" class="flat-red" /> NO
                 </div>






                 <div class="form-group col-md-4">
                   <font size="4">Toma Aminoglucosos </font>
                   <input value="1" type="radio" name="to17" id="lt" class="flat-red" /> SI
                   <input value="2" type="radio" name="to17" id="lt" class="flat-red" /> NO
                 </div>


                 <div class="form-group col-md-4">
                   <font size="4">Fuma </font>
                   <input value="1" type="radio" name="to18" id="lt" class="flat-red" /> SI
                   <input value="2" type="radio" name="to18" id="lt" class="flat-red" /> NO
                 </div>


                 <div class="form-group col-md-4">
                   <font size="4">Tiene piel bronceada </font>
                   <input value="1" type="radio" name="to19" id="lt" class="flat-red" /> SI
                   <input value="2" type="radio" name="to19" id="lt" class="flat-red" /> NO
                 </div>




                 <div class="form-group col-md-12" style="padding-left: 2%;">
                   <div align="left">Antecedentes Adicionales</div>
                   <input type="text" class="form-control input-lg" id="sss" name="antA3">
                 </div>





                 <div class="form-group col-md-12">
                   <div align="left">Procedimiento </div>
                 </div>


                 <div class="box-body pad col-md-12">

                   <textarea id="procedimiento" name="procedimiento" class="textarea" placeholder="Procedimiento" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                 </div>



                 <div class="form-group col-md-12">
                   <div align="left">Plan de atención </div>
                 </div>
                 <div class="box-body pad col-md-12">

                   <textarea id="planAtencion" name="planAtencion" class="textarea" placeholder="Plan de atención" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                 </div>



                 <div class="form-group col-md-12">
                   <div align="left">Notas o comentarios </div>
                 </div>
                 <div class="box-body pad col-md-12">

                   <textarea id="nota" name="nota" class="textarea" placeholder="Notas o comentarios" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                 </div>



                 <input type="hidden" name="email" value="<?php echo $correo_cliente; ?>">
                 <input type="hidden" name="nombre" value="<?php echo $nombre_cliente; ?>">
                 <input type="hidden" name="telefono" value="<?php echo $telefono_cliente; ?>">
                 <input type="hidden" name="ID" value="<?php echo $_SESSION['ID'] ?>">
                 <input type="hidden" name="clienteId" value="<?php echo $clienteId ?>">
                 <input type="hidden" name="operador" value="<?php echo $_SESSION['username'] ?>">
                 <input type="hidden" name="usuario_id" value="<?php echo $_SESSION['ID'] ?>">


                 <div class="form-group col-md-4">
                   <div align="left">Foto Antes</div>

                   <input type="file" class="form-control input-lg" name="img11">

                 </div>
                 <div class="form-group col-md-4">
                   <div align="left">Foto Durante</div>




                   <input type="file" class="form-control input-lg" name="img12">

                 </div>

                 <div class="form-group col-md-4">
                   <div align="left">Foto Después</div>




                   <input type="file" class="form-control input-lg" name="img13">

                 </div>
<!-- 
                 <div align="center">
                   <br>
                   <br>
                   <br>
                   <div class="col-sm-12">
                     <br>
                     <br>
                     <center><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                         <h2> <strong> G u a r d a r </strong> </h2>
                       </button></center>

                   </div>
                 </div> -->

                 <div class="col-md-12">
                        <button class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" type="submit">Guardar</button>
                      </div>
             </div>


             </form>





             <br>



           </div>
         </div>


         <div id="servicio5" class="element" style="display: none;">
           <div class="col-md-12">

             <form class="form-horizontal" action="historia_clinica_spa_guardar.php" method="POST" enctype="multipart/form-data">

               <div class="col-sm-12" align="center">
                 <h3> Mesoterapia Capilar </h3>
               </div>
               <input type="hidden" name="tratamiento" value="5">


               <div class="col-sm-12">
                 <div class="col-sm-12">


                   Evaluación rostro
                   <div align="center" class="col-md-12">



                     <div class="form-group col-md-8">
                       <label>Escala Hamilton-Norwood </label>
                       <select name="to52" class="form-control select2" data-placeholder="Seleccionar" style="width: 100%;" tabindex="-1" aria-hidden="true">
                         <option value="Tipo I Retroceso del pelo inapreciable o escaso por la parte frontal."> Tipo I Retroceso del pelo inapreciable o escaso por la parte frontal. </option>
                         <option value="Tipo II  Caída del cabello por la zona temporal. Se dibujan las entradas."> Tipo II Caída del cabello por la zona temporal. Se dibujan las entradas.</option>
                         <option value="Tipo III Pérdida de cabello especialmente por la zona de la coronilla. "> Tipo III Pérdida de cabello especialmente por la zona de la coronilla. </option>
                         <option value="Tipo IV  Se amplía la zona sin pelo en la coronilla. Una banda de pelo separa nítidamente las dos zonas calvas."> Tipo IV Se amplía la zona sin pelo en la coronilla. Una banda de pelo separa nítidamente las dos zonas calvas. </option>
                         <option value="Tipo V Las zonas de la coronilla y de la frente están separadas solamente por una región estrecha. Vista desde arriba, la zona que aún conserva pelo dibuja la forma de una herradura"> Tipo V Las zonas de la coronilla y de la frente están separadas solamente por una región estrecha. Vista desde arriba, la zona que aún conserva pelo dibuja la forma de una herradura. </option>
                         <option value="Tipo VI  Las zonas sin pelo anterior y posterior se juntan, y se produce un ensanchamiento de la zona afectada."> Tipo VI Las zonas sin pelo anterior y posterior se juntan, y se produce un ensanchamiento de la zona afectada. </option>
                         <option value="Tipo VII En este estado solamente queda una porción estrecha del pelo original, que se extiende sobre las orejas y se junta en la nuca7"> Tipo VII En este estado solamente queda una porción estrecha del pelo original, que se extiende sobre las orejas y se junta en la nuca. </option>

                       </select>
                     </div>

                     <img src="historiaClinica2_img.png" width="30%" height="30%">




                   </div>



                   <div align="center" class="col-md-12">
                     <hr>
                   </div>

                   <div align="center" class="col-md-12">



                     <div class="form-group col-md-8">
                       <label>Escala Ludwig </label>
                       <select name="to53" class="form-control select2" data-placeholder="Seleccionar" style="width: 100%;" tabindex="-1" aria-hidden="true">
                         <option value="GRADO 1: Inicio de pérdida de densidad en la región central, asociada a cierta debilidad y fragilidad capilar."> GRADO 1: Inicio de pérdida de densidad en la región central, asociada a cierta debilidad y fragilidad capilar. </option>
                         <option value="GRADO 2: La densidad ha ido disminuyendo por toda la parte superior, apreciándose cada vez más el cuero cabelludo en la línea del peinado. El pelo suele crecer menos y de menor calidad, cada vez más fino.">GRADO 2: La densidad ha ido disminuyendo por toda la parte superior, apreciándose cada vez más el cuero cabelludo en la línea del peinado. El pelo suele crecer menos y de menor calidad, cada vez más fino.</option>
                         <option value="GRADO 3: Ya se ha instaurado una pérdida importante de cabello, con muy poca densidad en la zona central de un modo extenso desde la línea anterior frontal hasta la coronilla inclusive. En esta fase el cabello es muy fino y escaso."> GRADO 3: Ya se ha instaurado una pérdida importante de cabello, con muy poca densidad en la zona central de un modo extenso desde la línea anterior frontal hasta la coronilla inclusive. En esta fase el cabello es muy fino y escaso. </option>

                       </select>
                     </div>

                     <img src="historiaClinica2_img2.png" width="30%" height="20%">




                   </div>




                   <div align="center" class="col-md-12">

                     Otros hallazgos

                     <textarea id="descripcion" name="to60" class="textarea" placeholder="  Otros hallazgos " style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                   </div>



                 </div>



                 <div class="col-md-12">
                   <font size="1"> Calculo de IMC </font>
                 </div>

                 <div class="form-group col-md-3">
                   <div align="left">Peso en KG</div>
                   <input type="number" class="form-control input-lg" id="peso1" name="peso" onChange="calcularimc1();" step="any">
                 </div>

                 <div class="form-group col-md-3">
                   <div align="left">Altura en <strong> Centímetros </strong></div>
                   <input type="number" class="form-control input-lg" id="altura1" name="altura" onChange="calcularimc1();" step="any">
                 </div>

                 <div class="form-group col-md-3">
                   <div align="left"> Índice de masa corporal </div>
                   <input type="number" class="form-control input-lg" id="imc1" name="imc" step="any">
                 </div>

                 <div class="form-group col-md-3">
                   <div align="left">Composición corporal</div>
                   <input type="text" class="form-control input-lg" id="ComposicionCorporal1" name="ComposicionCorporal">
                 </div>

                 <div class="form-group col-md-12">
                   <div align="left">Procedimiento </div>
                 </div>


                 <div class="box-body pad col-md-12">

                   <textarea id="procedimiento" name="procedimiento" class="textarea" placeholder="Procedimiento" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                 </div>



                 <div class="form-group col-md-12">
                   <div align="left">Plan de atención </div>
                 </div>
                 <div class="box-body pad col-md-12">

                   <textarea id="planAtencion" name="planAtencion" class="textarea" placeholder="Plan de atención" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                 </div>



                 <div class="form-group col-md-12">
                   <div align="left">Notas o comentarios </div>
                 </div>
                 <div class="box-body pad col-md-12">

                   <textarea id="nota" name="nota" class="textarea" placeholder="Notas o comentarios" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                 </div>



                 <div class="col-sm-12">
                   <div align="center">


                     <label> <strong> Información de facturación </strong> </label>
                   </div>


                   <div class="col-sm-6">
                     Copago
                   </div>

                   <div class="col-sm-6">
                     <input type="text" name="abono" class="form-control input-lg" id="abono" min="1">
                   </div>



                 </div>

                 <div class="col-sm-12">
                   <div align="center">


                     <label> <strong> Próxima consulta o cita (Solo si aplica)</strong> </label>
                   </div>

                 </div>

                 <div class="col-sm-6">
                   <div align="left">
                     <label>Fecha </label>
                   </div>
                   <input type="date" name="fecha" class="form-control input-lg" id="fecha" min="<?php echo date('Y-m-d') ?>" onChange="verDia();">

                   <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID'] ?>">

                   <div id="div-results"></div>
                 </div>


                 <div class="col-sm-6">
                   <div align="left">
                     <label>Hora </label>
                   </div>
                   <input type="time" name="hora" class="form-control input-lg" placeholder="hora" id="Hora" onChange="verHora();">
                   <div id="div-resultsHora"></div>

                 </div>

                 <div class="col-sm-6">

                   <div align="left">
                     <label>Motivo consulta</label>
                   </div>
                   <input type="text" name="motivo" class="form-control input-lg" placeholder="Motivo Consulta">

                 </div>

                 <div class="col-sm-6">
                   <label>Especialista </label>
                   <select id="doctor" name="doctor" class="form-control select2" style="width: 100%;" required="required">
                     <option value="<?php echo $_SESSION['username'] ?>" selected="selected"><?php echo $_SESSION['username'] ?> </option>
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
                     <i class="fa fa-user"></i> Presencial

                     <input type="radio" name="P" value="1" class="flat-red">
                     <i class="fa fa-video-camera"></i> Virtual
                   </label>
                 </div>



                 <input type="hidden" name="email" value="<?php echo $correo_cliente; ?>">
                 <input type="hidden" name="nombre" value="<?php echo $nombre_cliente; ?>">
                 <input type="hidden" name="telefono" value="<?php echo $telefono_cliente; ?>">
                 <input type="hidden" name="ID" value="<?php echo $_SESSION['ID'] ?>">
                 <input type="hidden" name="clienteId" value="<?php echo $clienteId ?>">
                 <input type="hidden" name="operador" value="<?php echo $_SESSION['username'] ?>">



                 <div align="center">
                   <br>
                   <br>
                   <br>
                   <div class="col-sm-12">
                     <br>
                     <br>
                     <center><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                         <h2> <strong> G u a r d a r </strong> </h2>
                       </button></center>

                   </div>
                 </div>






                 <input type="hidden" name="tipo_cliente" valur="1">


             </form>

           </div>
         </div>
       </div>


































       <div id="servicio6" class="element" style="display: none;">
         <div class="col-md-12">

           <form class="form-horizontal" action="historia_clinica_spa_guardar.php" method="POST" enctype="multipart/form-data">
             <div class="col-sm-12" align="center">
               <h3> Mesoterapia Corporal </h3>
             </div>
             <input type="hidden" name="tratamiento" value="5">




             <div class="col-sm-12">
               <div class="col-sm-12">


                 <div class="form-group col-md-5" align="right">
                   <font size="4"> Medidas</font>
                 </div>
                 <div class="form-group col-md-7">
                   <select name="to52" class="form-control select2" style="width: 100%;">
                     <option>Seleccione </option>
                     <option value="Medidas Iniciales">Iniciales</option>
                     <option value="Medidas A Mitad ">A Mitad </option>
                     <option value="Medidas Finales">Finales</option>
                   </select>
                 </div>

                 <div class="form-group col-md-5" align="right">
                   <font size="4"> Busto</font>
                 </div>
                 <div class="form-group col-md-7">
                   <input type="number" class="form-control input-lg" id="to2" name="to53" step="any">
                 </div>

                 <div class="form-group col-md-5" align="right">
                   <font size="4"> Abdomen Alto</font>
                 </div>
                 <div class="form-group col-md-7">
                   <input type="number" class="form-control input-lg" id="to3" name="to54" step="any">
                 </div>

                 <div class="form-group col-md-5" align="right">
                   <font size="4"> Cintura </font>
                 </div>
                 <div class="form-group col-md-7">
                   <input type="number" class="form-control input-lg" id="to4" name="to55" step="any">
                 </div>

                 <div class="form-group col-md-5" align="right">
                   <font size="4"> Cadera </font>
                 </div>
                 <div class="form-group col-md-7">
                   <input type="number" class="form-control input-lg" id="to5" name="to56" step="any">
                 </div>




                 <div class="form-group col-md-5" align="right">
                   <font size="4"> Record sesiones: </font>
                 </div>
                 <div class="form-group col-md-7">
                   <input type="text" class="form-control input-lg" id="to10" name="to57" step="any">
                 </div>





                 <div class="form-group col-md-5" align="right">
                   <font size="4"> PEFE </font>
                 </div>
                 <div class="form-group col-md-7">
                   <select name="to58" class="form-control select2" style="width: 100%;">
                     <option>Seleccione </option>
                     <option value="Grado I: El paciente no observa ningún tipo de síntomas.">Grado I: El paciente no observa ningún tipo de síntomas.</option>
                     <option value="Grado II: Tras la compresión de la piel o de la contracción muscular se observa palidez, descenso de la temperatura y disminución de la elasticidad. No hay alteraciones en el relieve cutáneo. ">Grado II: Tras la compresión de la piel o de la contracción muscular se observa palidez, descenso de la temperatura y disminución de la elasticidad. No hay alteraciones en el relieve cutáneo. </option>
                     <option value="Grado III: Se observa piel empedrada y con aspecto de piel de naranja con dolor a la palpación. ">Grado III: Se observa piel empedrada y con aspecto de piel de naranja con dolor a la palpación. </option>
                     <option value="Grado IV: Posee las mismas características que en el grado III, pero con nódulos más visibles, palpables y dolorosos, adheridos a niveles profundos.">Grado IV: Posee las mismas características que en el grado III, pero con nódulos más visibles, palpables y dolorosos, adheridos a niveles profundos.</option>
                   </select>
                 </div>
















               </div>




               <div class="col-md-12">
                 <font size="1"> Cálculo de IMC </font>
               </div>

               <div class="form-group col-md-3">
                 <div align="left">Peso en KG</div>
                 <input type="number" class="form-control input-lg" id="peso1" name="peso" onChange="calcularimc1();" step="any">
               </div>

               <div class="form-group col-md-3">
                 <div align="left">Altura en <strong> Centímetros </strong></div>
                 <input type="number" class="form-control input-lg" id="altura1" name="altura" onChange="calcularimc1();" step="any">
               </div>

               <div class="form-group col-md-3">
                 <div align="left"> Índice de masa corporal </div>
                 <input type="number" class="form-control input-lg" id="imc1" name="imc" step="any">
               </div>

               <div class="form-group col-md-3">
                 <div align="left">Composición corporal</div>
                 <input type="text" class="form-control input-lg" id="ComposicionCorporal1" name="ComposicionCorporal">
               </div>

               <div class="form-group col-md-12">
                 <div align="left">Procedimiento </div>
               </div>


               <div class="box-body pad col-md-12">

                 <textarea id="procedimiento" name="procedimiento" class="textarea" placeholder="Procedimiento" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

               </div>



               <div class="form-group col-md-12">
                 <div align="left">Plan de atención </div>
               </div>
               <div class="box-body pad col-md-12">

                 <textarea id="planAtencion" name="planAtencion" class="textarea" placeholder="Plan de atención" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

               </div>



               <div class="form-group col-md-12">
                 <div align="left">Notas o comentarios </div>
               </div>
               <div class="box-body pad col-md-12">

                 <textarea id="nota" name="nota" class="textarea" placeholder="Notas o comentarios" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

               </div>



               <div class="col-sm-12">
                 <div align="center">


                   <label> <strong> Información de facturación </strong> </label>
                 </div>


                 <div class="col-sm-6">
                   Copago
                 </div>

                 <div class="col-sm-6">
                   <input type="text" name="abono" class="form-control input-lg" id="abono" min="1">
                 </div>



               </div>

               <div class="col-sm-12">
                 <div align="center">


                   <label> <strong> Próxima consulta o cita (Solo si aplica)</strong> </label>
                 </div>

               </div>

               <div class="col-sm-6">
                 <div align="left">
                   <label>Fecha </label>
                 </div>
                 <input type="date" name="fecha" class="form-control input-lg" id="fecha" min="<?php echo date('Y-m-d') ?>" onChange="verDia();">

                 <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID'] ?>">

                 <div id="div-results"></div>
               </div>


               <div class="col-sm-6">
                 <div align="left">
                   <label>Hora </label>
                 </div>
                 <input type="time" name="hora" class="form-control input-lg" placeholder="hora" id="Hora" onChange="verHora();">
                 <div id="div-resultsHora"></div>

               </div>

               <div class="col-sm-6">

                 <div align="left">
                   <label>Motivo consulta</label>
                 </div>
                 <input type="text" name="motivo" class="form-control input-lg" placeholder="Motivo Consulta">

               </div>

               <div class="col-sm-6">
                 <label>Especialista </label>
                 <select id="doctor" name="doctor" class="form-control select2" style="width: 100%;" required="required">
                   <option value="<?php echo $_SESSION['username'] ?>" selected="selected"><?php echo $_SESSION['username'] ?> </option>
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
                   <i class="fa fa-user"></i> Presencial

                   <input type="radio" name="P" value="1" class="flat-red">
                   <i class="fa fa-video-camera"></i> Virtual
                 </label>
               </div>



               <input type="hidden" name="email" value="<?php echo $correo_cliente; ?>">
               <input type="hidden" name="nombre" value="<?php echo $nombre_cliente; ?>">
               <input type="hidden" name="telefono" value="<?php echo $telefono_cliente; ?>">
               <input type="hidden" name="ID" value="<?php echo $_SESSION['ID'] ?>">
               <input type="hidden" name="clienteId" value="<?php echo $clienteId ?>">
               <input type="hidden" name="operador" value="<?php echo $_SESSION['username'] ?>">



               <div align="center">
                 <br>
                 <br>
                 <br>
                 <div class="col-sm-12">
                   <br>
                   <br>
                   <center><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                       <h2> <strong> G u a r d a r </strong> </h2>
                     </button></center>

                 </div>
               </div>






               <input type="hidden" name="tipo_cliente" valur="1">


           </form>

         </div>
       </div>


















       <!-- /.row -->
     </section>
     <!-- /.content -->
   </div>





   <?php include("footer.php") ?>



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
   <script src="plugins/LottieK/lottie.min.js"></script>
<?php   
$usuariod_id_autoguardado = $_SESSION["ID"];
$cliente_id_autoguardado = decrypt($_GET['cI']);
$Nombre_Tabla_autoguardado = "e_tratamiento";//nombre de la tabla de la base de datos de la historia

$RutaFinal_Encryptado = $_SERVER['SCRIPT_URI']."?cl={$cliente_id_autoguardado}";

$HistoriasClinicasAutoguardado_id='"FormularioHistoriaClinica1", "FormularioHistoriaClinica2", "FormularioHistoriaClinica3"';//importante para las historias multiples, mantener estructura de comillas simples y dobles
include 'AutoGuardados/HistoriaEncryptadaMultiple/AutoGuardado_Historia_Encryptado.php';//usar esta si es historia encryptada sin modificar el autoguardado

?>