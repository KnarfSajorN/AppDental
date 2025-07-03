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
    $("#servicio5").hide();
    $("#servicio6").hide();
    $("#servicio7").hide();
    $("#servicio8").hide();
    $("#servicio9").hide();
    $("#servicio10").hide();
        $("#servicio11").hide();   

    
  }
  
  if (id == "servicio2") {
    $("#servicio1").hide();
    $("#servicio2").show();
    $("#servicio3").hide();
    $("#servicio4").hide();
    $("#servicio5").hide();
    $("#servicio6").hide();
    $("#servicio7").hide();
    $("#servicio8").hide();
    $("#servicio9").hide();
    $("#servicio10").hide();
        $("#servicio11").hide();   

 
  }
  
  if (id == "servicio3") {
    $("#servicio1").hide();
    $("#servicio2").hide();
    $("#servicio3").show();
    $("#servicio4").hide();
    $("#servicio5").hide();
    $("#servicio6").hide();
    $("#servicio7").hide();
    $("#servicio8").hide();
    $("#servicio9").hide();
    $("#servicio10").hide();
    $("#servicio11").hide();   
  }

  if (id == "servicio4") {
    $("#servicio1").hide();
    $("#servicio2").hide();
    $("#servicio3").hide();
    $("#servicio4").show();
    $("#servicio5").hide();
    $("#servicio6").hide();
    $("#servicio7").hide();
    $("#servicio8").hide();
    $("#servicio9").hide();
    $("#servicio10").hide();
    $("#servicio11").hide();   
  }

    if (id == "servicio5") {
    $("#servicio1").hide();
    $("#servicio2").hide();
    $("#servicio3").hide();
    $("#servicio4").hide();
    $("#servicio5").show();
    $("#servicio6").hide();
    $("#servicio7").hide();
    $("#servicio8").hide();
    $("#servicio9").hide();
    $("#servicio10").hide(); 
    $("#servicio11").hide();   

  }


  if (id == "servicio6") {
    $("#servicio1").hide();
    $("#servicio2").hide();
    $("#servicio3").hide();
    $("#servicio4").hide();
    $("#servicio5").hide();
    $("#servicio6").show();
    $("#servicio7").hide();
    $("#servicio8").hide();
    $("#servicio9").hide();
    $("#servicio10").hide();
    $("#servicio11").hide();   

  }


  if (id == "servicio7") {
    $("#servicio1").hide();
    $("#servicio2").hide();
    $("#servicio3").hide();
    $("#servicio4").hide();
    $("#servicio5").hide();
    $("#servicio6").hide();
    $("#servicio7").show();
    $("#servicio8").hide();
    $("#servicio9").hide();
    $("#servicio10").hide();
    $("#servicio11").hide();   
  }


  if (id == "servicio8") {
    $("#servicio1").hide();
    $("#servicio2").hide();
    $("#servicio3").hide();
    $("#servicio4").hide();
    $("#servicio5").hide();
    $("#servicio6").hide();
    $("#servicio7").hide();
    $("#servicio8").show();
    $("#servicio9").hide();
    $("#servicio10").hide();  
    $("#servicio11").hide();   
  }


  if (id == "servicio9") {
    $("#servicio1").hide();
    $("#servicio2").hide();
    $("#servicio3").hide();
    $("#servicio4").hide();
    $("#servicio5").hide();
    $("#servicio6").hide();
    $("#servicio7").hide();
    $("#servicio8").hide();
    $("#servicio9").show();
    $("#servicio10").hide();   
    $("#servicio11").hide();   
  }


  if (id == "servicio10") {
    $("#servicio1").hide();
    $("#servicio2").hide();
    $("#servicio3").hide();
    $("#servicio4").hide();
    $("#servicio5").hide();
    $("#servicio6").hide();
    $("#servicio7").hide();
    $("#servicio8").hide();
    $("#servicio9").hide();
    $("#servicio10").show(); 
    $("#servicio11").hide();   
  
  }


  if (id == "servicio11") {
    $("#servicio1").hide();
    $("#servicio2").hide();
    $("#servicio3").hide();
    $("#servicio4").hide();
    $("#servicio5").hide();
    $("#servicio6").hide();
    $("#servicio7").hide();
    $("#servicio8").hide();
    $("#servicio9").hide();
    $("#servicio10").hide();   
    $("#servicio11").show();   
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
                    $antecedentes     =$rowMotorizado['antecedentes'];   
                    $fotoperfil       =$rowMotorizado['fotoperfil']; 
                    $tiposSangre      =$rowMotorizado['tiposSangre']; 
                    $esDonante        =$rowMotorizado['esDonante']; 
                    $tomaMedicamento  =$rowMotorizado['tomaMedicamento']; 
                    
                    $fechaNacimiento  =$rowMotorizado['fechaNacimiento']; 
                 
                    $entidadSalud     =$rowMotorizado['entidadSalud']; 
                    $seguro           =$rowMotorizado['seguro']; 
                    
                    $nota           =$rowMotorizado['nota']; 
                    $enfermedadesPequeno           =$rowMotorizado['enfermedadesPequeno']; 
                    $alergias           =$rowMotorizado['alergias']; 

 
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
                else
                {

                echo '';
                }
 
                ?>


             
 
              </div>  
<br>
 
  <div class="col-md-12">
  <hr>        
           
          <form action="index.php" method="post">
          <label>Seleccióne consentimiento </label>
          <select id="status" name="status" class="form-control select2" onChange="mostrar(this.value);" style="width: 40%;">
          <option >Seleccione </option>
        <option value="servicio1">CONSENTIMIENTO INFORMADO  TELEMEDICINA</option> 
        <!--    <option value="servicio2">CONSENTIMIENTO INFORMADO  TELEMEDICINA</option>
        <option value="servicio3">CONSENTIMIENTO INFORMADO PARA PEELING</option>
          <option value="servicio4">CONSENTIMIENTO INFORMADO PARA VENOPUNCION GENERAL  </option>
          <option value="servicio5">CONSENTIMIENTO INFORMADO TOXINA BOTULINICA  </option>
          <option value="servicio6">Instrucciones del tratamiento acido hialuronico  </option>
          <option value="servicio7">Instrucciones del tratamiento peeling  </option>
          <option value="servicio8">Instrucciones del tratamiento toxina botulinica  </option> -->
         

          </select>
          </form>
</div>




<div id="servicio1" class="element" style="display: none;">


    <div  class="form-group col-md-12" align="center"><h2>CONSENTIMIENTO INFORMADO  TELEMEDICINA </h2></div>

    <form class="form-horizontal" action="guardarConsentimiento.php" method="POST" enctype="multipart/form-data">

     <div class="col-md-11">

                          <textarea id="editor1" name="consentimiento" >
                                         
   <center><strong aling="center">CONSENTIMIENTO INFORMADO  TELEMEDICINA</strong></center>


  Fecha: <?php echo date("d-m-Y") ?> Hora: <?php echo date("h:m") ?>
  <br><br>

  Yo, <?php echo $nombre_cliente;?> con  número de  documento :<?php echo $CODI_CLIENTE;?>  Fecha de Nacimiento: <?php echo $fechaNacimiento;?> , Edad:<?php echo calculaedad($fechaNacimiento);?> ,  Celular:<?php echo $celular;?>. <br>
  DECLARO: Que, en pleno uso de mis facultades mentales, otorgo en forma libre mi consentimiento y autorizo desde ahora al DR. , para que el profesional de la salud en ejercicio legal de su profesión realice los servicios teleorientacion, Telemedicina/Telesalud habiéndome informado acerca de los servicios los  cuales implican el uso de comunicaciones electrónicas para permitir que los proveedores de atención médica en diferentes lugares compartan información médica individual del paciente, con el fin de mejorarle la atención. La comunicación electrónica significa el uso de equipos de telecomunicaciones interactivos que incluyen, como mínimo, equipos de audio y video,  que permiten la comunicación interactiva bidireccional en tiempo real entre el paciente y el proveedor de atención médica. Un sitio de origen es la ubicación del paciente beneficiario. El sitio distante es donde residen el médico o los proveedores de Telemedicina/Telesalud durante el tiempo de la consulta. Los proveedores pueden incluir médicos de atención primaria, enfermeras practicantes, especialistas y/o subespecialistas y terapeutas  Beneficios esperados incluyen los siguientes:<br> 
• Mejorar del acceso a la atención al permitir que un paciente permanezca en un sitio remoto mientras recibe atención profesional de un proveedor de atención médica. <br>
• Evaluación, gestión médica y sanitaria más eficientes. <br>
• Los pacientes pueden ser diagnosticados y tratados antes, lo que puede contribuir a mejores resultados y tratamientos menos costosos. <br>
Los posibles riesgos incluyen, pero no están limitados a: <br>
• A pesar de los esfuerzos razonables de protección, la transmisión de la información médica de mi o de custodio de representación legal podría verse alterada o distorsionada por fallas técnicas que podrían ocasionar retrasos en la evaluación; la transmisión de mi información médica podría ser interrumpida por una persona no autorizada; y/o el almacenamiento electrónico de mi información médica podría ser accedido por personas no autorizadas.<br> 
• Los servicios basados en Telemedicina/Telesalud pueden no ser tan completos como los servicios cara a cara. Entiendo que si el proveedor de telemedicina/telesalud cree que a mí o a mi custodio de representación legal se le atenderá mejor con otro tipo de servicios (por ejemplo, servicios cara a cara), seré o será derivado a otro proveedor y es mi responsabilidad garantizar que las instrucciones de referencia son seguidos a tiempo. <br>
• En casos poco frecuentes, la información transmitida puede no ser suficiente (por ejemplo, mala resolución de las imágenes) para permitir la toma de decisiones apropiadas por parte del proveedor de servicios de salud de Telemedicina/Telesalud. 
• En casos excepcionales, los protocolos de seguridad pueden fallar, lo que provoca una violación de la privacidad de la información médica personal. A pesar  del cumplimiento de los procesos de  habeas data dispuestos  en la  ley 1581 de 2012.
• En casos raros, la falta de acceso a registros o información médica completa y/o precisa puede dar como resultado reacciones adversas a medicamentos, reacciones alérgicas u otros errores de juicio. <br>
Al firmar este formulario, entiendo lo siguiente: <br>
1. Doy mi consentimiento para compartir la información de salud personal y sus médicos/proveedores. <br>
2. Entiendo que tengo el derecho de negar o retirar mi consentimiento para el uso de la Telemedicina/Telesalud en el transcurso de la atención mia o de mi custodio de representación legal  en cualquier momento sin afectar el derecho  a recibir atención o tratamiento en el futuro. <br>
3. Entiendo que tengo derecho a inspeccionar toda la información obtenida y registrada en el curso de una interacción de Telemedicina/Telesalud, y puedo recibir copias de esta información de acuerdo con la  resolución 2654 de 2019  y sus  disposiciones legales  vigentes.<br>
4. Entiendo que los métodos alternativos de atención médica/de salud pueden estar disponibles para mí, incluida la interacción cara a cara, y que puedo elegir otra alternativa en cualquier momento.<br> 
5. Entiendo que puedo esperar los beneficios anticipados del uso de la Telemedicina/Telesalud bajo mi cuidado, pero que no se pueden garantizar ni asegurar los resultados. <br>
6. Las leyes que protegen la confidencialidad de mi información médica también se aplican a la telemedicina. Como tal, entiendo que la información revelada por mi durante el curso del tratamiento mío y / o de mi custodio de representación legal, generalmente es confidencial. Sin embargo, existen excepciones obligatorias y permisivas a la confidencialidad, que incluyen, entre otras, la denuncia de abuso infantil, de personas mayores y de adultos vulnerables.<br> 
7. Cualquier causa de acción que surja de este servicio debe hacerlo exclusivamente en Colombia  y renuncio deliberadamente a mi derecho de acceder a cualquier otro foro legal. He leído y entiendo la información proporcionada anteriormente sobre Telemedicina/Telesalud y todas mis preguntas han sido respondidas a mi satisfacción. Por la presente doy mi consentimiento informado para el uso de Telemedicina/Telesalud en la atención médica/de salud mi y/o de  mi custodio de  representación legal. <br>




  <br> <br>
NOTA:
<br>
Una vez aprobado el consentimiento y realizado el pago no se realizar&iacutea devoluci&oacuten del dinero por inasistencia de la consulta. 
<br>

 

  Si es un firmante autorizado, relación con el Paciente: ______________________________________
                          </textarea>
                      </div>




            <input  type="hidden" name="tipo" value="1">
           
            <input  type="hidden" name="email" value="<?php echo $correo_cliente;?>">
            <input  type="hidden" name="nombre"  value="<?php echo $nombre_cliente;?>">
            <input  type="hidden" name="telefono"  value="<?php echo $telefono_cliente ;?>">
            <input  type="hidden" name="ID"  value="<?php echo $_SESSION['ID']?>">
            <input  type="hidden" name="clienteId"  value="<?php echo $clienteId?>">
            <input  type="hidden" name="operador"  value="<?php echo $_SESSION['username']?>">
       
            <div align="center"> 
                       <br>
                <br>
                <br>
                 <div class="col-sm-12">
                    <br>
                <br>
                <center><button type="submit" class="btn btn-block btn-primary btn-sm"> <h2> <strong>  G e n e r a r  </strong> </h2> </button></center>
                
                </div>
            </div>
              
            <input type="hidden"  name="tipo_cliente"   valur="1">
            
    </form>



</div>




 




<div id="servicio2" class="element" style="display: none;">
    <div  class="form-group col-md-12" align="center"><h2>CONSENTIMIENTO INFORMADO  TELEMEDICINA </h2></div>
    <form class="form-horizontal" action="guardarConsentimiento.php" method="POST" enctype="multipart/form-data">

   <div class="col-md-11">

                          <textarea id="editor2" name="consentimiento" >
                                         
  <center><strong>CONSENTIMIENTO INFORMADO  TELEMEDICINA</strong></center>




  <br><br>
  <strong>Firma del paciente:  
      <br><br><br>
          
    C.C. <?php echo $CODI_CLIENTE;?>
    <br><br><br>
    Nombre <?php echo $nombre_cliente;?> 
  </strong>
  <div>
    <center>
      <div style="border:1px solid black;width:100px;height:150px;display:inline-block;">
        
      </div>
      <br>
      <strong>Huellas índices derechos</strong>
    </center>
  </div>
  

  Si es un firmante autorizado, relación con el Paciente: ______________________________________
                          </textarea>
                      </div>





                  <input  type="hidden" name="tipo" value="2">



            <input  type="hidden" name="email" value="<?php echo $correo_cliente;?>">
            <input  type="hidden" name="nombre"  value="<?php echo $nombre_cliente;?>">
            <input  type="hidden" name="telefono"  value="<?php echo $telefono_cliente ;?>">
            <input  type="hidden" name="ID"  value="<?php echo $_SESSION['ID']?>">
            <input  type="hidden" name="clienteId"  value="<?php echo $clienteId?>">
            <input  type="hidden" name="operador"  value="<?php echo $_SESSION['username']?>">
       
            <div align="center"> 
                       <br>
                <br>
                <br>
                 <div class="col-sm-12">
                    <br>
                <br>
                <center><button type="submit" class="btn btn-block btn-primary btn-sm"> <h2> <strong>  G e n e r a r  </strong> </h2> </button></center>
                
                </div>
            </div>
              
            <input type="hidden"  name="tipo_cliente"   valur="1">           
    </form>
</div>






 




<div id="servicio3" class="element" style="display: none;">
    <div  class="form-group col-md-12" align="center"><h2>CONSENTIMIENTO INFORMADO PARA PEELING </h2></div>
    <form class="form-horizontal" action="guardarConsentimiento.php" method="POST" enctype="multipart/form-data">

                  <input  type="hidden" name="tipo" value="3">


            <input  type="hidden" name="email" value="<?php echo $correo_cliente;?>">
            <input  type="hidden" name="nombre"  value="<?php echo $nombre_cliente;?>">
            <input  type="hidden" name="telefono"  value="<?php echo $telefono_cliente ;?>">
            <input  type="hidden" name="ID"  value="<?php echo $_SESSION['ID']?>">
            <input  type="hidden" name="clienteId"  value="<?php echo $clienteId?>">
            <input  type="hidden" name="operador"  value="<?php echo $_SESSION['username']?>">
       
            <div align="center"> 
                       <br>
                <br>
                <br>
                 <div class="col-sm-12">
                    <br>
                <br>
                <center><button type="submit" class="btn btn-block btn-primary btn-sm"> <h2> <strong>  G e n e r a r  </strong> </h2> </button></center>
                
                </div>
            </div>
              
            <input type="hidden"  name="tipo_cliente"   valur="1">           
    </form>
</div>









 




<div id="servicio4" class="element" style="display: none;">
    <div  class="form-group col-md-12" align="center"><h2>CONSENTIMIENTO INFORMADO PARA VENOPUNCION GENERAL</h2></div>
    <form class="form-horizontal" action="guardarConsentimiento.php" method="POST" enctype="multipart/form-data">

                  <input  type="hidden" name="tipo" value="4">



            <input  type="hidden" name="email" value="<?php echo $correo_cliente;?>">
            <input  type="hidden" name="nombre"  value="<?php echo $nombre_cliente;?>">
            <input  type="hidden" name="telefono"  value="<?php echo $telefono_cliente ;?>">
            <input  type="hidden" name="ID"  value="<?php echo $_SESSION['ID']?>">
            <input  type="hidden" name="clienteId"  value="<?php echo $clienteId?>">
            <input  type="hidden" name="operador"  value="<?php echo $_SESSION['username']?>">
       
            <div align="center"> 
                       <br>
                <br>
                <br>
                 <div class="col-sm-12">
                    <br>
                <br>
                <center><button type="submit" class="btn btn-block btn-primary btn-sm"> <h2> <strong>  G e n e r a r  </strong> </h2> </button></center>
                
                </div>
            </div>
              
            <input type="hidden"  name="tipo_cliente"   valur="1">           
    </form>
</div>











 




<div id="servicio5" class="element" style="display: none;">
    <div  class="form-group col-md-12" align="center"><h2>CONSENTIMIENTO INFORMADO TOXINA BOTULINICA</h2></div>
    <form class="form-horizontal" action="guardarConsentimiento.php" method="POST" enctype="multipart/form-data">

                  <input  type="hidden" name="tipo" value="5">



            <input  type="hidden" name="email" value="<?php echo $correo_cliente;?>">
            <input  type="hidden" name="nombre"  value="<?php echo $nombre_cliente;?>">
            <input  type="hidden" name="telefono"  value="<?php echo $telefono_cliente ;?>">
            <input  type="hidden" name="ID"  value="<?php echo $_SESSION['ID']?>">
            <input  type="hidden" name="clienteId"  value="<?php echo $clienteId?>">
            <input  type="hidden" name="operador"  value="<?php echo $_SESSION['username']?>">
       
            <div align="center"> 
                       <br>
                <br>
                <br>
                 <div class="col-sm-12">
                    <br>
                <br>
                <center><button type="submit" class="btn btn-block btn-primary btn-sm"> <h2> <strong>  G e n e r a r  </strong> </h2> </button></center>
                
                </div>
            </div>
              
            <input type="hidden"  name="tipo_cliente"   valur="1">           
    </form>
</div>












 




<div id="servicio6" class="element" style="display: none;">
    <div  class="form-group col-md-12" align="center"><h2>Instrucciones del tratamiento acido hialuronico</h2></div>
    <form class="form-horizontal" action="guardarConsentimiento.php" method="POST" enctype="multipart/form-data">

                  <input  type="hidden" name="tipo" value="6">

            <input  type="hidden" name="email" value="<?php echo $correo_cliente;?>">
            <input  type="hidden" name="nombre"  value="<?php echo $nombre_cliente;?>">
            <input  type="hidden" name="telefono"  value="<?php echo $telefono_cliente ;?>">
            <input  type="hidden" name="ID"  value="<?php echo $_SESSION['ID']?>">
            <input  type="hidden" name="clienteId"  value="<?php echo $clienteId?>">
            <input  type="hidden" name="operador"  value="<?php echo $_SESSION['username']?>">
       
            <div align="center"> 
                       <br>
                <br>
                <br>
                 <div class="col-sm-12">
                    <br>
                <br>
                <center><button type="submit" class="btn btn-block btn-primary btn-sm"> <h2> <strong>  G e n e r a r  </strong> </h2> </button></center>
                
                </div>
            </div>
              
            <input type="hidden"  name="tipo_cliente"   valur="1">           
    </form>
</div>












 




<div id="servicio7" class="element" style="display: none;">
    <div  class="form-group col-md-12" align="center"><h2>Instrucciones del tratamiento peeling</h2></div>
    <form class="form-horizontal" action="guardarConsentimiento.php" method="POST" enctype="multipart/form-data">

                        <input  type="hidden" name="tipo" value="7">



            <input  type="hidden" name="email" value="<?php echo $correo_cliente;?>">
            <input  type="hidden" name="nombre"  value="<?php echo $nombre_cliente;?>">
            <input  type="hidden" name="telefono"  value="<?php echo $telefono_cliente ;?>">
            <input  type="hidden" name="ID"  value="<?php echo $_SESSION['ID']?>">
            <input  type="hidden" name="clienteId"  value="<?php echo $clienteId?>">
            <input  type="hidden" name="operador"  value="<?php echo $_SESSION['username']?>">
       
            <div align="center"> 
                       <br>
                <br>
                <br>
                 <div class="col-sm-12">
                    <br>
                <br>
                <center><button type="submit" class="btn btn-block btn-primary btn-sm"> <h2> <strong>  G e n e r a r  </strong> </h2> </button></center>
                
                </div>
            </div>
              
            <input type="hidden"  name="tipo_cliente"   valur="1">           
    </form>
</div>














 




<div id="servicio8" class="element" style="display: none;">
    <div  class="form-group col-md-12" align="center"><h2> Instrucciones del tratamiento toxina botulinica</h2></div>
    <form class="form-horizontal" action="guardarConsentimiento.php" method="POST" enctype="multipart/form-data">

                        <input  type="hidden" name="tipo" value="8">

            <input  type="hidden" name="email" value="<?php echo $correo_cliente;?>">
            <input  type="hidden" name="nombre"  value="<?php echo $nombre_cliente;?>">
            <input  type="hidden" name="telefono"  value="<?php echo $telefono_cliente ;?>">
            <input  type="hidden" name="ID"  value="<?php echo $_SESSION['ID']?>">
            <input  type="hidden" name="clienteId"  value="<?php echo $clienteId?>">
            <input  type="hidden" name="operador"  value="<?php echo $_SESSION['username']?>">
       
            <div align="center"> 
                       <br>
                <br>
                <br>
                 <div class="col-sm-12">
                    <br>
                <br>
                <center><button type="submit" class="btn btn-block btn-primary btn-sm"> <h2> <strong>  G e n e r a r  </strong> </h2> </button></center>
                
                </div>
            </div>
              
            <input type="hidden"  name="tipo_cliente"   valur="1">           
    </form>
</div>













      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>  
          
          
          
     

<?php include("footer.php")?>


