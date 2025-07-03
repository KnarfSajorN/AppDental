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
      $activo               = $rowMotorizado['activo'];
      $genero = $rowMotorizado['genero'];
      $direccion_cliente    = $rowMotorizado['direccion_cliente'];
      $telefono_cliente     = $rowMotorizado['telefono_cliente'];
      $edad_cliente         = $rowMotorizado['edad_cliente'];
      $profesion_cliente    = $rowMotorizado['profesion_cliente'];
      $acompananteFamiliar  = $rowMotorizado['acompananteFamiliar'];
      $telefono_acompanante = $rowMotorizado['telefono_acompanante'];
      $antecedentes         = $rowMotorizado['antecedentes'];
      $fotoperfil           = $rowMotorizado['fotoperfil'];
      $tiposSangre          = $rowMotorizado['tiposSangre'];
      $esDonante            = $rowMotorizado['esDonante'];
      $tomaMedicamento      = $rowMotorizado['tomaMedicamento'];

      $fechaNacimiento      = $rowMotorizado['fechaNacimiento'];

      $entidadSalud         = $rowMotorizado['entidadSalud'];
      $seguro               = $rowMotorizado['seguro'];

      $nota                 = $rowMotorizado['nota'];
      $enfermedadesPequeno  = $rowMotorizado['enfermedadesPequeno'];
      $alergias             = $rowMotorizado['alergias'];


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
   <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
       <h1>
         Procedimiento

       </h1>
       <ol class="breadcrumb">
         <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio </a></li>
         <li><a href="#">Procedimiento</a></li>

       </ol>
     </section>

     <!-- Main content -->
     <section class="content">
       <div class="row">
         <div class="col-xs-12">


           <div class="box">

             <!-- /.box-header -->
             <div class="box-body">



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
                 <label><strong>Cedula o ID:</strong></label>
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


                  /*

                   <input type="button" class="btn btn-block btn-primary btn-sm" value="Historial consultas" 
              onclick="javascript:window.open('consultaHistoriaMedica.php?tipo=<?php echo $clienteId?>&ID=<?php echo $ID?>','','width=600,height=400,left=50,top=50,toolbar=yes');" />

                */
                  ?>

               </div>
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


               </div>



               <form class="form-horizontal" action="hccpGuardar" method="POST" enctype="multipart/form-data">

                 <!-- ********************************************************************************************************************************
     ********************************************************    Tratamiento laser    ********************************************
     ******************************************************************************************************************************** -->





                 <div class="col-md-12">
                   <div class="col-md-6">
                     <label>ANTI-ENVEJECIMIENTO</label>
                     <select id="status" name="envejecimiento" class="form-control select2" style="width: 100%;">
                       <option>Seleccione </option>
                       <option value="B&oacutetox">Bótox</option>
                       <option value="Rellenos de &aacutecido Hialur&oacutenico">Rellenos de Ácido Hialurónico</option>
                       <option value="Rellenos de &aacutecido Polil&aacutecidoctico">Rellenos de Ácido Poliláctico</option>
                       <option value="Rellenos de Hidroxiapatita C&aacutelcica">Rellenos de Hidroxiapatita Cálcica</option>
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
                       <option value="Hairfiller">Hairfiller</option>
                       <option value="Factores de crecimiento">Factores de crecimiento</option>
                       <option value="Intralipoterapia">Intralipoterapia</option>
                       <option value="Medicina Antiaging">Medicina Antiaging</option>
                       <option value="Varices">Varices</option>





                     </select>
                   </div>

                   <div class="col-md-6">

                     <?php if ($_SESSION['ID'] <> 77) : ?>



                       <label>CIRUGÍA </label>
                       <select id="status" name="cirugia" class="form-control select2" style="width: 100%;">
                         <option>Seleccione </option>
                         <option value="Cirug&iacuteas Faciales">Cirugías Faciales</option>
                         <option value="Cirug&iacutea de Mano">Cirugía de Mano</option>
                         <option value="Cirug&iacuteas Corporales">Cirugías Corporales</option>
                         <option value="Quemaduras">Quemaduras</option>
                         <option value="Malformaciones Cong&eacutenitas">Malformaciones Congénitas
                         </option>
                         <option value="Procedimientos No Quir&uacutergicos">Procedimientos No Quirúrgicos</option>
                         <option value="Otras Cirug&iacuteas Reconstructivas">Otras Cirugías Reconstructivas</option>


                       </select>



                     <?php endif ?>


                   </div>

                   <div class="col-md-12">
                     <label>Motivo de la consulta:</label>

                     <div class="form-group col-md-12">
                       <textarea id="descripcion" name="motivoConsulta" class="textarea" placeholder="Motivo de la consulta" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                     </div>

                   </div>



                   <div class="form-group col-md-12">
                     <div align="left"> Enfermedad actual</div>

                     <input type="text" name="enfermedadActual" class="form-control input-lg" id="enfermedadActual" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">

                   </div>



                 </div>
             </div>















             <div class="box-group" id="accordion">


               <div class="panel box box-danger">
                 <div class="box-header with-border">
                   <h4 class="box-title">
                     <a data-toggle="collapse" data-parent="#accordion1" href="#collapseTwo2s">
                       Revisión por sistema
                     </a>
                   </h4>
                 </div>
                 <div id="collapseTwo2s" class="panel-collapse collapse">
                   <div class="box-body">

                     <div class="form-group col-md-3" align="right">
                       Fiebre
                       <input value="1" type="radio" name="rs1" id="lt" class="flat-red" /> SI
                       <input value="2" type="radio" name="rs1" id="lt" class="flat-red" /> NO
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
                       Vomito

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
                       Dolor Adominal

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












                   </div>
                 </div>
               </div>







               <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
               <div class="panel box box-primary">
                 <div class="box-header with-border">
                   <h4 class="box-title">
                     <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                       Evaluación Piel
                     </a>
                   </h4>
                 </div>
                 <div id="collapseOne" class="panel-collapse collapse">
                   <div class="box-body">


                     Evaluación Piel


                     <div align="center" class="col-md-12">










                       <div>
                         <h3 class="box-title">Estados de la Piel</h3>

                       </div>
                       <!-- /.box-header -->

                       <div class="row">

                         <!-- /.col -->
                         <div class="col-md-3">
                           <h4><strong>Color:</strong></h4>

                           <label for="colo">Normal</label>
                           <input type="text" name="t11" class="form-control" id="colo">


                           <label for="colo">Palida</label>
                           <input type="text" name="t12" class="form-control" id="colo">


                           <label for="colo">Rojiza</label>
                           <input type="text" name="t13" class="form-control" id="colo">

                           <label for="colo">Cutis Seco</label>
                           <input type="text" name="t14" class="form-control" id="colo">


                         </div>
                         <div class="col-md-3">
                           <br><br>
                           <label for="colo">Hidratacion</label>
                           <input type="text" name="t15" class="form-control" id="colo">
                           <br><br><br><br><br><br>
                           <label for="colo">Graso</label>
                           <input type="text" name="t16" class="form-control" id="colo">
                         </div>
                         <div class="col-md-3">
                           <h4><strong>Tacto:</strong></h4>

                           <label for="colo">Lisa y Fina</label>
                           <input type="text" name="t17" class="form-control" id="colo">

                           <label for="colo">Gruesa y Rugosa</label>
                           <input type="text" name="t18" class="form-control" id="colo">
                           <br><br><br>
                           <label for="colo">Mixto</label>
                           <input type="text" name="t19" class="form-control" id="colo">

                         </div>
                         <div class="col-md-3">

                           <!-- 
                 <img style="width: 100%;height: 100%;" src="imagen.png">
                /.col -->

                         </div>
                         <!-- /.col -->
                       </div>
                       <div class="row">
                         <div class="col-md-4">
                           <h4><strong>Orificios Pilosedaceos:</strong></h4>

                           <label for="colo">Postulas</label>
                           <input type="text" name="t20" class="form-control" id="colo">
                         </div>
                         <div class="col-md-4">

                           <label for="colo">Manifiestos</label>
                           <input type="text" name="t21" class="form-control" id="colo">

                           <label for="colo">Milium</label>
                           <input type="text" name="t22" class="form-control" id="colo">
                         </div>
                         <div class="col-md-4">

                           <label for="colo">Pocos Observables</label>
                           <input type="text" name="t23" class="form-control" id="colo">

                           <label for="colo">Comedones</label>
                           <input type="text" name="t24" class="form-control" id="colo">
                         </div>

                       </div>

                       <div class="row">
                         <div class="col-md-4">
                           <h4><strong>Arrugas:</strong></h4>

                           <label for="colo">Region Preauricular</label>
                           <input type="text" name="t25" class="form-control" id="colo">
                           <label for="colo">Comisura ext. de los Párpados</label>
                           <input type="text" name="t26" class="form-control" id="colo">
                           <label for="colo">Patas de Gallo</label>
                           <input type="text" name="t27" class="form-control" id="colo">
                           <h4><strong>Arrugas radiales Periiabiales:</strong></h4>
                           <div class="row">
                             <div class="col-md-8">
                               <label for="colo">Dentadura Buena</label>
                               <input type="text" name="t28" class="form-control" id="colo">
                             </div>
                             <div class="col-md-4">
                               <label for="colo">Mala</label>
                               <input type="text" name="t29" class="form-control" id="colo">
                             </div>
                           </div>
                         </div>

                         <div class="col-md-5">
                           <br><br>
                           <label for="colo">Pliegues Frente</label>
                           <input type="text" name="t30" class="form-control" id="colo">

                           <label for="colo">Pliegues Cuello</label>
                           <input type="text" name="t31" class="form-control" id="colo">
                           <div class="row">
                             <br><br><br><br><br>
                             <div class="col-md-8">
                               <label for="colo">Regular</label>
                               <input type="text" name="t32" class="form-control" id="colo">
                             </div>
                             <div class="col-md-4">
                               <label for="colo">Protesis</label>
                               <input type="text" name="t33" class="form-control" id="colo">
                             </div>
                           </div>
                         </div>
                         <div class="col-md-3">
                           <!-- 
                 <img style="width: 100%;height: 100%;" src="imagen.png">
                /.col -->
                         </div>

                       </div>












                       <!-- 
              <div class="row">
              <div class="col-md-4">
                <h4><strong>Pigmentaciones:</strong></h4>
            
                  <label for="colo">Por Cosmeticos?</label>
                  <input type="text" name="t34"  class="form-control" id="colo" >
                  <label for="colo">Por medicamentos?</label>
                  <input type="text"  name="t35" class="form-control" id="colo" >
                   <label for="colo">Maquillajes?</label>
                  <input type="text"  name="t36" class="form-control" id="colo" >
            
              </div>








               <div class="col-md-5">
              <br><br>  
                  <label for="colo">Anovulatorios?</label>
                  <input type="text" class="form-control" id="colo" > 

                  <label for="colo">Tranquilizantes?</label>
                  <input type="text" class="form-control" id="colo" >
                <div class="row">
                    
                  <div class="col-md-8">
                    <label for="colo">Sol?</label>
                    <input type="text" class="form-control" id="colo" >
                  </div>
                  <div class="col-md-4">
                    <label for="colo">Otros</label>
                    <input type="text" class="form-control" id="colo" >
                  </div>
                </div>
              </div>  
              <div class="col-md-3">
            
                
                 <img style="width: 100%;height: 100%;" src="imagen.png">
                /.col  
              </div>

            </div>

            <div class="row">
              <div class="col-md-4">
                <h4><strong>Grado de Flaccidez:</strong></h4>
                  <div class="row">
                    
                  <div class="col-md-8">
                    <label for="colo">Parpados?</label>
                    <input type="text" class="form-control" id="colo" >
                  </div>
                  <div class="col-md-4">
                    <label for="colo">Cuello</label>
                    <input type="text" class="form-control" id="colo" >
                  </div>
                </div>
            
                  <label for="colo">Dieta Hipociorurada?</label>
                  <input type="text" class="form-control" id="colo" >
                  <label for="colo">Régimen de Adelgazamiento?</label>
                  <input type="text" class="form-control" id="colo" >
                  
            
              </div>

               <div class="col-md-5">
              <br><br>  
                  <label for="colo">Mejillas?</label>
                  <input type="text" class="form-control" id="colo" > 

                  <label for="colo">Diuréticos?</label>
                  <input type="text" class="form-control" id="colo" >
              
              </div>  
              <div class="col-md-3">
            
                   
                 <img style="width: 100%;height: 100%;" src="imagen.png">
                
              </div>

            </div>

            <div class="row">
              <div class="col-md-6">
                <h4><strong>Vello:</strong></h4>
                  <div class="row">
                    
                  <div class="col-md-6">
                    <label for="colo">Cantidad</label>
                    <input type="text" class="form-control" id="colo" >
                    <label for="colo">Espesor</label>
                    <input type="text" class="form-control" id="colo" >
                      <label for="colo">Oscuro</label>
                    <input type="text" class="form-control" id="colo" >
                  </div>
                  <div class="col-md-6">
                    <label for="colo">Áreas</label>
                    <input type="text" class="form-control" id="colo" >
                    <label for="colo">Fino</label>
                    <input type="text" class="form-control" id="colo" >
                    <label for="colo">Claro</label>
                    <input type="text" class="form-control" id="colo" >
                  </div> 
                 
                </div>
                  
            
              </div>

               <div class="col-md-6">
                <h4><strong>Busto:</strong></h4>
                  <div class="row">
                    
                  <div class="col-md-6">
                    <label for="colo">Normal</label>
                    <input type="text" class="form-control" id="colo" >
                    <label for="colo">Hipertrofio</label>
                    <input type="text" class="form-control" id="colo" >
                     
                  </div>
                  <div class="col-md-6">
                    <label for="colo">Hipotrofico</label>
                    <input type="text" class="form-control" id="colo" >
                    <label for="colo">Piosis</label>
                    <input type="text" class="form-control" id="colo" >
                   
                  </div> 
                 
                </div>

                 
              

              </div>  
            
            </div>

          <div class="row">
              <div class="col-md-6">
                <h4><strong>Cabello:</strong></h4>
                  <div class="row">
                    
                  <div class="col-md-6">
                    <label for="colo">Cantidad</label>
                    <input type="text" class="form-control" id="colo" >
                    <label for="colo">Brillo</label>
                    <input type="text" class="form-control" id="colo" >
                    <label for="colo">Graso</label>
                    <input type="text" class="form-control" id="colo" > 
                    <label for="colo">Fragilidad</label>
                    <input type="text" class="form-control" id="colo" >
                    <br><br><br><br><br><br>
                     <label for="colo">Cuero Cabelludo:</label>
                  </div>
                  <div class="col-md-6">
                    <label for="colo">Color</label>
                    <input type="text" class="form-control" id="colo" >
                    <label for="colo">Calibre</label>
                    <input type="text" class="form-control" id="colo" >
                    <label for="colo">Seco</label>
                    <input type="text" class="form-control" id="colo" >
                    <label for="colo">Canicie</label>
                    <input type="text" class="form-control" id="colo" > 
                    <label for="colo">Alopecia</label>
                    <input type="text" class="form-control" id="colo" >
                    <br>
                    <div class="row">
                       <div class="col-md-6">
                          <label for="colo">Seco</label>
                          <input type="text" class="form-control" id="colo" >
                      </div> 
                      <div class="col-md-6">
                          <label for="colo">Graso</label>
                          <input type="text" class="form-control" id="colo" >
                      </div>
                            

                    </div>
                  </div> 
                 
                </div>
                  
            
              </div>

               <div class="col-md-6">
                   <br><br>
                  
                    <label for="colo">Hay Signos de Desnutrición General</label>
                    <input type="text" class="form-control" id="colo" >
                    <label for="colo">Régimen Hormonal</label>
                    <input type="text" class="form-control" id="colo" >
                     
             
                    <label for="colo">Recursos Cosméticos Habituales?</label>
                    <input type="text" class="form-control" id="colo" > 
                    <label for="colo">Cutáneos y Extracutáneos?</label>
                    <input type="text" class="form-control" id="colo" >
                    <label for="colo">Procedimientos de Peluquería</label>
                    <input type="text" class="form-control" id="colo" >
                   
                
                 
                </div>

                 
              -->





























                     </div>
                     <div align="center" class="col-md-6">

                       Diagnostico

                       <textarea id="descripcion" name="diagnostico1" class="textarea" placeholder="Diagnostico" style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                     </div>




                   </div>
                 </div>
               </div>
               <div class="panel box box-danger">
                 <div class="box-header with-border">
                   <h4 class="box-title">
                     <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                       Evaluación rostro
                     </a>
                   </h4>
                 </div>
                 <div id="collapseTwo" class="panel-collapse collapse">
                   <div class="box-body">


                     Evaluación rostro
                     <div align="center" class="col-md-6">
                       <img src="img/rostro.png" height="200" width="100%">

                       <div class="form-group col-md-4">
                         <label>Biotipo Cutaneo</label>
                         <select name="cutaneo" class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Seleccionar" style="width: 100%;" tabindex="-1" aria-hidden="true">
                           <option>Lipidica</option>
                           <option>Mista</option>
                           <option>Eudérmica</option>
                           <option>Alipica</option>
                         </select>
                       </div>
                       <div class="form-group col-md-4">
                         <label>Sobre el acné</label>
                         <select name="acne" class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Seleccionar" style="width: 100%;" tabindex="-1" aria-hidden="true">
                           <option>Grau 1 </option>
                           <option>Grau 2</option>
                           <option>Grau 3</option>
                           <option>Grau 4</option>
                         </select>
                       </div>
                       <div class="form-group col-md-4">
                         <label>Fototico</label>
                         <select name="fototico" class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Seleccionar" style="width: 100%;" tabindex="-1" aria-hidden="true">
                           <option>1 </option>
                           <option>2</option>
                           <option>3</option>
                           <option>4</option>
                           <option>5</option>
                         </select>
                       </div>
                     </div>
                     <div class="row">

                       <div class="form-group col-md-4">
                         <label>Piel</label>
                         <select name="pele" class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Seleccionar" style="width: 100%;" tabindex="-1" aria-hidden="true">
                           <option>Lisa</option>
                           <option>Aspera</option>
                           <option>Fina</option>
                           <option>Grueso</option>
                           <option>Rugosa</option>
                         </select>
                       </div>
                       <div class="form-group col-md-4">
                         <label>Lesiones</label>
                         <select name="lesoes" class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Seleccionar" style="width: 100%;" tabindex="-1" aria-hidden="true">
                           <option>No encontradas</option>
                           <option>Regulares</option>
                           <option>Generales</option>
                           <option>Intensas</option>
                         </select>
                       </div>
                       <div class="form-group col-md-4">
                         <label>Estado Cutaneo</label>
                         <select name="est_cutaneos" class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Seleccionar" style="width: 100%;" tabindex="-1" aria-hidden="true">
                           <option>Normal </option>
                           <option>Sensible</option>
                           <option>Desidratada</option>
                           <option>Seborréica</option>
                         </select>
                       </div>
                     </div>
                     <div class="row">
                       <div class="col-md-12">
                         <table class="table table-condensed">
                           <tbody>

                             <tr>
                               <td>1</td>
                               <td>Cicatriz</td>
                               <td>4</td>
                               <td>Herpes</td>
                               <td>7</td>
                               <td>Melanosis Solar</td>

                               <td>13</td>
                               <td>Puntos</td>
                               <td>16</td>
                               <td>Siringoma</td>
                               <td>19</td>
                               <td>Xantelasma</td>
                             </tr>
                             <tr>
                               <td>2</td>
                               <td>Efélides</td>
                               <td>5</td>
                               <td>Hipercromia</td>
                               <td>8</td>
                               <td>Milium</td>

                               <td>14</td>
                               <td>Rosácea</td>
                               <td>17</td>
                               <td>Telangiectasia</td>
                               <td>20</td>
                               <td></td>
                             </tr>
                             <tr>
                               <td>3</td>
                               <td>Foliculitis</td>
                               <td>6</td>
                               <td>Hipocromia</td>
                               <td>9</td>
                               <td>Nuevo Melano</td>

                               <td>15</td>
                               <td>Arugas</td>
                               <td>18</td>
                               <td>Verruga</td>
                               <td>21</td>
                               <td></td>
                             </tr>



                           </tbody>
                         </table>



                       </div>
                       <div align="center" class="col-md-12">

                         Diagnostico

                         <textarea id="descripcion" name="diagnostico2" class="textarea" placeholder="Diagnostico" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                       </div>



                     </div>
                   </div>
                 </div>




















                 <div class="panel box box-success">
                   <div class="box-header with-border">
                     <h4 class="box-title">
                       <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                         Evaluación corporal
                       </a>
                     </h4>
                   </div>
                   <div id="collapseThree" class="panel-collapse collapse">
                     <div class="box-body">



                       Evaluación corporal

                       <!-- /.box-header -->
                       <div class="box-body">
                         <div class="row">

                           <table class="table table-condensed">
                             <tbody>

                               <tr>
                                 <td width="200"></td>
                                 <td>
                                   <div class="form-group col-md-4">
                                     <select name="evolucion" class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Seleccionar" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                       <option>Inicio</option>
                                       <option>Medio</option>
                                       <option>Fin</option>
                                     </select>
                                   </div>
                                 </td>
                               </tr>
                               <tr>
                                 <td width="200">Peso</td>
                                 <td>
                                   <div class="form-group col-md-4">
                                     <input type="text" name="t311" class="form-control" id="colo" placeholder="Peso" name="peso">
                                   </div>
                                 </td>
                               </tr>
                               <tr>
                                 <td width="200">Busto</td>
                                 <td>
                                   <div class="form-group col-md-4">
                                     <input type="text" name="t312" class="form-control" id="colo" placeholder="Busto" name="busto">
                                   </div>
                                 </td>
                               </tr>
                               <tr>
                                 <td width="200">Brazo Izquierdo</td>
                                 <td>
                                   <div class="form-group col-md-4">
                                     <input type="text" name="t313" class="form-control" id="colo" placeholder="Brazo Izquierdo" name="brazo">
                                   </div>
                                 </td>
                               </tr>
                               <tr>
                                 <td width="200">Brazo Derecho</td>
                                 <td>
                                   <div class="form-group col-md-4">
                                     <input type="text" name="t314" class="form-control" id="colo" placeholder="Brazo Derecho" name="brazo1">
                                   </div>
                                 </td>
                               </tr>
                               <tr>
                                 <td width="200">Abdomen</td>
                                 <td>
                                   <div class="form-group col-md-4">
                                     <input type="text" name="t315" class="form-control" id="colo" placeholder="Abdomen" name="abdomen">
                                   </div>
                                 </td>
                               </tr>
                               <tr>
                                 <td width="200">Cintura</td>
                                 <td>
                                   <div class="form-group col-md-4">
                                     <input type="text" name="t316" class="form-control" id="colo" placeholder="Cintura" name="cintura">
                                   </div>
                                 </td>
                               </tr>
                               <tr>
                                 <td width="200">Cadera</td>
                                 <td>
                                   <div class="form-group col-md-4">
                                     <input type="text" name="t317" class="form-control" id="colo" placeholder="Cadera" name="cadera">
                                   </div>
                                 </td>
                               </tr>
                               <tr>
                                 <td width="200">Pantalones Corto</td>
                                 <td>
                                   <div class="form-group col-md-4">
                                     <input type="text" name="t318" class="form-control" id="colo" placeholder="Pantalones Corto" name="pantalon">
                                   </div>
                                 </td>
                               </tr>
                               <tr>
                                 <td width="200">Muslo Izquierdo</td>
                                 <td>
                                   <div class="form-group col-md-4">
                                     <input type="text" name="t319" class="form-control" id="colo" placeholder="Muslo Izquierdo" name="muslo">
                                   </div>
                                 </td>
                               </tr>
                               <tr>
                                 <td width="200">Muslo Derecho</td>
                                 <td>
                                   <div class="form-group col-md-4">
                                     <input type="text" name="t320" class="form-control" id="colo" placeholder="Muslo Derecho" name="muslo2">
                                   </div>
                                 </td>
                               </tr>
                               <tr>
                                 <td width="200">Pantorrilla Izquierdo</td>
                                 <td>
                                   <div class="form-group col-md-4">
                                     <input type="text" name="t321" class="form-control" id="colo" placeholder="Pantorrilla Izquierdo" name="pantorrilla">
                                   </div>
                                 </td>
                               </tr>
                               <tr>
                                 <td width="200">Pantorrilla Derecho</td>
                                 <td>
                                   <div class="form-group col-md-4">
                                     <input type="text" name="t322" class="form-control" id="colo" placeholder="Pantorrilla Derecho" name="Pantorrilla2">
                                   </div>
                                 </td>
                               </tr>

                               <tr>
                                 <td width="200">Altura</td>
                                 <td>
                                   <div class="form-group col-md-4">
                                     <input type="text" name="t323" class="form-control" id="colo" placeholder="Altura" name="altura">
                                   </div>
                                 </td>
                               </tr>

                             </tbody>
                           </table>



                           <!--

  <img src="img/corporal.png" height="50%" width="100%">

-->

                         </div>
                         <div align="center" class="col-md-12">

                           Diagnostico

                           <textarea id="descripcion" name="diagnostico3" class="textarea" placeholder="Diagnostico" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                         </div>








                       </div>
                     </div>
                   </div>























                   <?php if ($_SESSION['ID'] <> 77) : ?>



                     <div class="panel box box-success">
                       <div class="box-header with-border">
                         <h4 class="box-title">
                           <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree2">
                             Evaluación pechos
                           </a>
                         </h4>
                       </div>
                       <div id="collapseThree2" class="panel-collapse collapse">
                         <div class="box-body">




                           Evaluación pechos




                           <!-- /.box-header -->
                           <div class="box-body">
                             <div class="row">

                               <div class="form-group col-md-4">
                                 <h4><strong>Derecha</strong></h4>
                                 <div class="form-group col-md-12">
                                   <label for="colo">A:</label>
                                   <input type="text" name="t411" class="form-control" id="colo">
                                   <label for="colo">B:</label>
                                   <input type="text" name="t412" class="form-control" id="colo">
                                   <label for="colo">C:</label>
                                   <input type="text" name="t413" class="form-control" id="colo">
                                   <label for="colo">Cap:</label>
                                   <input type="text" name="t414" class="form-control" id="colo">
                                   <label for="colo">Pts:</label>
                                   <input type="text" name="t415" class="form-control" id="colo">
                                   <label for="colo">Pti:</label>
                                   <input type="text" name="t416" class="form-control" id="colo">
                                   <label for="colo">D:</label>
                                   <input type="text" name="t417" class="form-control" id="colo">
                                 </div>
                               </div>
                               <div class="form-group col-md-4">
                                 <h4><strong>Izquierda</strong></h4>
                                 <div class="form-group col-md-12">
                                   <label for="colo">A:</label>
                                   <input type="text" name="t418" class="form-control" id="colo">
                                   <label for="colo">B:</label>
                                   <input type="text" name="t419" class="form-control" id="colo">
                                   <label for="colo">C:</label>
                                   <input type="text" name="t420" class="form-control" id="colo">
                                   <label for="colo">Cap:</label>
                                   <input type="text" name="t421" class="form-control" id="colo">
                                   <label for="colo">Pts:</label>
                                   <input type="text" name="t422" class="form-control" id="colo">
                                   <label for="colo">Pti:</label>
                                   <input type="text" name="t423" class="form-control" id="colo">
                                   <label for="colo">D:</label>
                                   <input type="text" name="t424" class="form-control" id="colo">
                                 </div>
                               </div>

                               <!--
              <div class="form-group col-md-4">
                <h4><strong>Ptsosis</strong></h4>
                <div class="form-group col-md-12">
                  <div class="radio">
                    <label>
                      <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                      I:
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                      IIa
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3" >
                      Ilb
                    </label>
                  </div>  
                   <div class="radio">
                    <label>
                      <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                      III
                    </label>
                  </div>
                
                </div> 
            </div>
        </div>
        <div class="row">
          <div class="form-group col-md-3">
            <h4><strong>Plan Quirúrgico Senos</strong></h4>
             
                <div class="form-group col-md-12">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox">
                     Mamoplastia De Aumento
                    </label>
                  </div>

                  <div class="checkbox">
                    <label>
                      <input type="checkbox">
                      Retiro de Prótesis Mamarias
                    </label>
                  </div>
                </div> 
          </div>  
          <div class="form-group col-md-3">
            <br><br>
             
                <div class="form-group col-md-12">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox">
                     Mamoplastia Pexia y Aumento
                    </label>
                  </div>

                  <div class="checkbox">
                    <label>
                      <input type="checkbox">
                      Reconstrucción Mamaria
                    </label>
                  </div>
                </div> 
          </div>
          <div class="form-group col-md-2">
            <br><br>
             
                <div class="form-group col-md-12">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox">
                     Mamoplastia Revisión
                    </label>
                  </div>

                  <div class="checkbox">
                    <label>
                      <input type="checkbox">
                      Liposucción Senos
                    </label>
                  </div>
                </div> 
          </div>
          <div class="form-group col-md-2">
            <br><br>
             
                <div class="form-group col-md-12">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox">
                    Mastopexia
                    </label>
                  </div>

                  <div class="checkbox">
                    <label>
                      <input type="checkbox">
                     Lipoinyección Senos
                    </label>
                  </div>
                </div> 
          </div>
          <div class="form-group col-md-2">
            <br><br>
             
                <div class="form-group col-md-12">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox">
                    Mamoplastia Reductora
                    </label>
                  </div>
                </div> 
          </div>
     
  <img src="img/pechos.png" height="60%" width="100%">
-->

                             </div>
                             <div align="center" class="col-md-12">

                               Diagnostico

                               <textarea id="descripcion" name="diagnostico4" class="textarea" placeholder="Diagnostico" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                             </div>

                           </div>
                         </div>
                       </div>


                     <?php endif ?>



                     <div class="panel box box-success">
                       <div class="box-header with-border">
                         <h4 class="box-title">
                           <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree3">
                             Otros
                           </a>
                         </h4>
                       </div>
                       <div id="collapseThree3" class="panel-collapse collapse">
                         <div class="box-body">



                           Diagnostico

                           <textarea id="descripcion" name="diagnostico5" class="textarea" placeholder="Diagnostico" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                         </div>





                       </div>
                     </div>
                     </div>





                 </div>





                 <div class="col-md-12">
                   <hr>
                 </div>




                 <?php $idUsuario = $_SESSION['ID']; ?>












                 <div class="form-group col-md-12">
                   <textarea id="descripcion" name="tratamiento" class="textarea" placeholder="Tratamiento" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                 </div>


                 <div class="col-md-12">
                   <font size="1"> Calculo de IMC </font>
                 </div>

                 <div class="form-group col-md-3">
                   <div align="left">Peso en KG</div>
                   <input type="number" class="form-control input-lg" id="peso4" name="peso" onChange="calcularimc4();" step="any">
                 </div>

                 <div class="form-group col-md-3">
                   <div align="left">Altura en <strong> Centímetros </strong></div>
                   <input type="number" class="form-control input-lg" id="altura4" name="altura" onChange="calcularimc4();" step="any">
                 </div>

                 <div class="form-group col-md-3">
                   <div align="left"> Índice de masa corporal </div>
                   <input type="number" class="form-control input-lg" id="imc4" name="imc" step="any">
                 </div>

                 <div class="form-group col-md-3">
                   <div align="left">Composición corporal</div>
                   <input type="text" class="form-control input-lg" id="ComposicionCorporal4" name="ComposicionCorporal">
                 </div>

                 <div class="form-group col-md-12">
                   <div align="left">Procedimiento </div>
                 </div>


                 <div class="box-body pad">

                   <textarea id="procedimiento" name="procedimiento" class="textarea" placeholder="Procedimiento" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                 </div>



                 <div class="form-group col-md-12">
                   <div align="left">Plan de atención </div>
                 </div>
                 <div class="box-body pad">

                   <textarea id="planAtencion" name="planAtencion" class="textarea" placeholder="Plan de atención" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                 </div>



                 <div class="form-group col-md-12">
                   <div align="left">Notas o comentarios </div>
                 </div>
                 <div class="box-body pad">

                   <textarea id="nota" name="nota" class="textarea" placeholder="Notas o comentarios" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

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


                   <div class="col-sm-6">
                     Monto de abono o pago
                   </div>

                   <div class="col-sm-6">
                     <input type="text" name="pagoAbono" class="form-control input-lg" id="abono" min="1">
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
                   <select id="doctor" name="doctor" class="form-control select2" style="width: 100%;">
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
                     <center><button type="submit" class="btn btn-block btn-primary btn-sm">
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