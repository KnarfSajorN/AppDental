<?php
include 'funciones/funciones.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> <?php echo $sistema;?>  </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="https://medicalsoftplus.com/baseDev/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
<link rel="shortcut icon" type="image/x-icon" href="./icono.ico">

  <style>
  .centrar
  {
    position: absolute;
    /*nos posicionamos en el centro del navegador*/
    top:20%;
    left:50%;
    /*determinamos una anchura*/
    width:400px;
    /*indicamos que el margen izquierdo, es la mitad de la anchura*/
    margin-left:-200px;
    /*determinamos una altura*/
    height:300px;
    /*indicamos que el margen superior, es la mitad de la altura*/
    margin-top:-150px;
  }
  </style>


  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
<!--Start of Zendesk Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="https://v2.zopim.com/?65r3mACnIFh8hYjJwvyl5pg2FZqM7yDU";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
</script>
<!--End of Zendesk Chat Script-->

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body style="background-color:#E6E6FA">
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content">
    <!-- Content Header (Page header) -->

<div  class='centrar'>
 
<div  class="box box-info" align="center">
            <div class="box-header with-border">
              <img src="img/logo.png" height="20%" width="60%">
              <br>
              <h3 class="box-title">  </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start   <form class="form-horizontal" action="activarregistro.php.php" method="POST" > -->
            <form class="form-horizontal" action="ofertanavidena" method="POST" >
           

              <div class="box-body">
                
                
                  Nombre Completo* 
                  <input class="form-control input-lg" type="text" name="name" placeholder="Nombre Completo*"  maxlength="80" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
 
                Email * 
                   <input type="email" name="email"  class="form-control input-lg"  placeholder="Email *"  maxlength="80" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>

                Teléfono * 
                   <input type="phone" name="telefono"  class="form-control input-lg"  placeholder="Teléfono *"  maxlength="20" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
 

              <!--   Ciudad * -->

                 <input type="hidden" name="ciudad"  class="form-control input-lg"   placeholder="Ciudad *" value="Ciudad" required>
                  País * 
                     <input type="text" name="pais"  class="form-control input-lg"   placeholder="pais *"  maxlength="40" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                  
                


                 Especialidad  


                 <select class="form-control input-lg" name="especialidad">
<option value=" " select> </option>

<option value="1/Medicina general">Medicina general </option>
<option value="1/Medicina familiar">Medicina familiar</option>
<option value="1/Medico internista">Medico internista </option>
<option value="1/Medicina alternativa">Medicina alternativa</option>
<option value="0/Clínicas IPS">Clínicas /IPS </option>

<option value="3/Centro de vacunación">Centro de vacunación</option>
<option value="1/Pediatría">Pediatría </option>
<option value="2/Spa/estética ">Spa/estética </option>

<option value="5/Ecografista">Ecografista </option>

<option value="6/Ginecólogia">Ginecólogia </option> 

<option value="11/Cardiologo">Cardiologo </option>

  
<option value="10/Traumatologia">Traumatologia </option>
<option value="10/Fisioterapia">Fisioterapia </option>
<option value="10/Reabilitacion">Reabilitacion </option>


<option value="9/Pre hospitalario">Pre hospitalario </option>
<option value="9/Servicios de ambulancias">Servicios de ambulancias </option>


<option value="7/Medicina est&eacutetica">Medicina est&eacutetica</option>

<option value="15/Podólogo">Podólogo </option>
<option value="16/Odontología">Odontología </option>
<option value="16/Ortodoncia">Ortodoncia </option>

<option value="4/Psic&oacutelogo">Psic&oacutelogo</option>

<option value="1/Anestesi&oacutelogo">Anestesi&oacutelogo</option>
<option value="1/Asociaci&oacuten m&eacutedica">Asociaci&oacuten m&eacutedica</option>
<option value="1/Audi&oacutelogo">Audi&oacutelogo</option>
<option value="1/Banco de sangre">Banco de sangre</option>
<option value="1/Cardi&oacutelogo">Cardi&oacutelogo</option>
<option value="1/Centro de rehabilitaci&oacuten">Centro de rehabilitaci&oacuten</option>
<option value="1/Centros m&eacutedicos">Centros m&eacutedicos</option>
<option value="1/Cirug&iacutea endosc&oacutepica">Cirug&iacutea endosc&oacutepica</option>
<option value="1/Cirug&iacutea laparosc&oacutepica">Cirug&iacutea laparosc&oacutepica</option>
<option value="1/Cirujano bariatrico">Cirujano bariatrico</option>
<option value="1/Cirujano cabeza y cuello">Cirujano cabeza y cuello</option>
<option value="1/Cirujano cardiovascular">Cirujano cardiovascular</option>
<option value="1/Cirujano de seno y tejido blandos">Cirujano de seno y tejido blandos</option>
<option value="1/Cirujano de torax">Cirujano de torax</option>
<option value="1/Cirujano gastrointestinal">Cirujano gastrointestinal</option>
<option value="1/Cirujano general">Cirujano general</option>
<option value="1/Cirujano maxilofacial">Cirujano maxilofacial</option>
<option value="1/Cirujano onc&oacutelogo">Cirujano onc&oacutelogo</option>
<option value="1/Cirujano pedi&aacutetrico">Cirujano pedi&aacutetrico</option>
<option value="1/Cirujano pl&aacutestico">Cirujano pl&aacutestico</option>
<option value="1/Cirujano vascular">Cirujano vascular</option>
<option value="1/Cl&iacutenica">Cl&iacutenica</option>
<option value="1/Coloproct&oacutelogo">Coloproct&oacutelogo</option>
<option value="1/Dermat&oacutelogo">Dermat&oacutelogo</option>
<option value="1/Droguer&iacutea">Droguer&iacutea</option>
<option value="1/Endocrin&oacutelogo">Endocrin&oacutelogo</option>
<option value="1/Enfermera">Enfermera</option>
<option value="1/EPS">EPS</option>
<option value="1/Est&eacuteticas">Est&eacuteticas</option>
<option value="1/Fisiatra">Fisiatra</option>
<option value="1/Fisioterapeuta">Fisioterapeuta</option>
<option value="1/Fonoaudi&oacutelogo">Fonoaudi&oacutelogo</option>
<option value="1/Fundaci&oacuten">Fundaci&oacuten</option>
<option value="1/Gastroenter&oacutelogo">Gastroenter&oacutelogo</option>
<option value="1/Genetista">Genetista</option>
<option value="1/Geriatra">Geriatra</option> 
<option value="1/Hemat&oacutelogo">Hemat&oacutelogo</option>
<option value="1/Hepat&oacutelogo">Hepat&oacutelogo</option>
<option value="1/Hospital">Hospital</option>
<option value="1/Infect&oacutelogo">Infect&oacutelogo</option>
<option value="1/Inmun&oacutelogo">Inmun&oacutelogo</option>
<option value="1/Internista">Internista</option>
<option value="1/Laboratorio cl&iacutenico">Laboratorio cl&iacutenico</option>
<option value="1/Laboratorio farmac&eacuteutico">Laboratorio farmac&eacuteutico</option> 
<option value="1/M&eacutedico alternativo">M&eacutedico alternativo</option>
<option value="1/M&eacutedico biol&oacutegico">M&eacutedico biol&oacutegico</option> 
<option value="1/M&eacutedico general">M&eacutedico general</option>
<option value="1/Mast&oacutelogo">Mast&oacutelogo</option>
<option value="1/Medicina deportiva">Medicina deportiva</option>





  <!--
                    <input type="text" name="especialidad"  class="form-control input-lg"   placeholder="Especialidad *"   maxlength="40" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>




                 Fecha de Nacimiento --> 
                    <input type="hidden" name="Nacimiento"  class="form-control input-lg" value="<?php echo date("Y-m-d")?>" required>


 



                  
  <?php
  $ID =0;
  $ID = $_GET['ID'];
  if ($ID<>0) {
  ?> 
                       <input type="hidden" name="aliado"  class="form-control input-lg" value="<?php echo $ID?>">
  <?php
  }
  else
  {
    echo  '<input type="hidden" name="aliado"  class="form-control input-lg" value="0">';
  }
   
  ?>

                 
                  


                  Contraseña * 
                    <input type="Password" name="password"  class="form-control input-lg"   placeholder="Clave *"  maxlength="20" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                  
               Confirmar contraseña * 
                    <input type="Password" name="confirmPassword"  class="form-control input-lg"   placeholder="Confirmar Clave *"  maxlength="20" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                 
              <input type="checkbox" id="cbox1" value="first_checkbox" required="required"> He leído y aceptado los 
              <a data-toggle="modal" data-target="#condiciones" href="#"> términos y condiciones </a>

 
<!-- Modal -->
<div class="modal fade" id="condiciones" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">

    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Términos y condiciones</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <p style="text-align: left;">CONTRATO DE LICENCIA DE USO DE PROGRAMAS DEL SOFTWARE APLICATIVO DENOMINADO MEDICALSOFT (Software de Gestión para consultorios/clínicas)</p>
<p style="text-align: left;">Entre Sievensoft , en adelante el LICENCIANTE, persona jurídica legalmente constituida como Sociedad Anónima y  en adelante el USUARIO, se celebra el presente contrato de LICENCIAMIENTO.</p>

<h4 style="text-align: left;">I.            OBJETO</h4>
<p style="text-align: left;">1.1 Este contrato tiene por objeto otorgar o conceder una licencia de uso exclusivo al USUARIO, del software denominado MEDICALSOFT, cuyos derechos patrimoniales son propiedad del LICENCIANTE.</p>
<p style="text-align: left;">1.2. Módulos Licenciados: Las licencias de uso del software aplicativo que el LICENCIANTE otorga al USUARIO comprenden los módulos que se detallan en el manual de usuario y técnico del sistema.</p>
<p style="text-align: left;">1.3 Alcance de las licencias. El otorgamiento de las licencias de uso implica:</p>
<p style="text-align: left;">1) La entrega al USUARIO de acceso único al software con numero de licencia . 2) Las licencias de uso indicadas en el literal anterior, dan derecho al USUARIO a utilizar en la forma que considere conveniente, en los equipos de su propiedad, en el ámbito central de cómputo y en las oficinas que designe, la versión licenciada del software aplicativo y a solicitar actualizaciones que considere .</p>
<p style="text-align: left;"><strong>AMBIENTE  TECNOLOGICO PARA        INSTALACIÓN        DEL     SOFTWARE LICENCIADO.</strong></p>
<p style="text-align: left;"><strong> </strong>Son requisitos mínimos para que el software cuya licencia se otorga funcione de manera correcta los siguientes:</p>

<ul style="text-align: left;">
  <li><em>Internet banda ancha         </em></li>
  <li>Manejo intermedio del computador ( tener computadores , teléfonos y/o tabletas ) donde visualizar y operar .</li>
  <li>Manejo de herramientas de comunicación como chat , skype , correo electrónico , para recibir el soporte técnico</li>
</ul>
<h4 style="text-align: left;">II.        PRECIO DEL CONTRATO</h4>
<p style="text-align: left;">La licencia de uso tiene un precio, pero no conlleva o no implica de manera alguna una transmisión, transferencia, cesión o enajenación de los derechos patrimoniales o morales al USUARIO.</p>

<h4 style="text-align: left;">III.       VIGENCIA DEL CONTRATO</h4>
<p style="text-align: left;">El USUARIO podrá utilizar el software objeto de esta licencia en forma perpetua, siempre de manera exclusiva y para su uso individual, manteniendo su renovación al día en términos económicos y morales.</p>

<h4 style="text-align: left;">IV.     LIMITE DE RESPONSABILIDAD DE LA LICENCIA DE USO</h4>
<p style="text-align: left;">EL LICENCIANTE no será responsable bajo ninguna circunstancia de:</p>

<ul style="text-align: left;">
  <li><em>Reclamaciones de terceros en contra del USUARIO por pérdidas, daños o perjuicios, atribuibles a la instalación y operación del software aquí licenciado;</em></li>
  <li><em>Pérdida de los registros, bases de datos, información del </em></li>
  <li><em>Daños o perjuicios económicos indirectos, lucro cesante o daños incidentales o potenciales, atribuibles a la instalación y operación del software aquí licenciado;</em></li>
  <li><em>Si el USUARIO permite que personas ajenas a sí mismo o autorizados directos entren con su clave por cualquier motivo, no podrá hacer reclamación alguna de modificación, alteración y perdida de datos .</em></li>
</ul>
<h4 style="text-align: left;">V.     OBLIGACIONES DEL USUARIO</h4>
<ol style="text-align: left;">
  <li><em>El usuario no arrendarán, subarrendarán, cederán, venderán o transferirán de algún otro modo esta licencia, ni los derechos conferidos en virtud de ella, ni delegarán sus </em></li>
  <li><em>El usuario aceptan no copiar, ayudar a copiar, o permitir que terceros copien los programas del software licenciado y/o documentación sobre los cuales se le otorga la </em></li>
  <li><em>Tampoco están facultados para duplicar con fines comerciales o para el uso por personas diferentes, por ningún medio, ninguno de los programas o su documentación objeto de este contrato</em></li>
</ol>
<h4 style="text-align: left;">VI. TERMINACIÓN DE LA LICENCIA</h4>
<p style="text-align: left;">Son causales para la terminación de esta Licencia las previstas en la Ley y cualquier violación de las obligaciones adquiridas mediante esta licencia de uso.</p>
<p style="text-align: left;">Esta licencia se rige por las reglas de exportación de servicios  y por los tratados Internacionales actualmente vigentes sobre propiedad intelectual y derechos de autor.</p>
<p style="text-align: left;">Así mismo el usuario podrá dejar de utilizar el software en cualquier momento por cualquier causa y sin necesidad de expresarla y solicitar un respaldo de su información de manera gratuita.</p>

<h4 style="text-align: left;">VII.  LEGALIZACION Y VIGENCIA</h4>
<p style="text-align: left;">El presente contrato se entenderá legalizado solo con la aceptación de términos y condiciones con una tilde al momento del registro del usuario sea cual sea la manera de utilización paga o gratuita.</p>
<p style="text-align: left;"><em>Si deseas más información al respecto escribe a info@sievensoft.com</em></p>

<hr>  
<div align="left"> 
<h4> USO DEL SITIO.</h4>
Sievensoft company sas opera el sitio web <a href="http://www.hellomedical.net">www.hellomedical.net</a> /www.medicalsoftplus.com  y otros sitios y/o aplicaciones móviles relacionados estos Términos de uso (en conjunto y en adelante nombrados como, <strong>"EL SITIO"</strong>). Se estipula expresamente que los servicios derivados de la Plataforma tienen como único y exclusivo objetivo servir como un intermediario digital. En ningún momento, y bajo ninguna circunstancia, se entenderá que el fin u objetivo de la EL SITIO es prestar servicios médicos. Dichos servicios médicos, en su caso, serán prestados de forma absolutamente independiente a EL SITIO por los <strong>PROVEEDORES DE SALUD</strong> a los <strong>USUARIOS</strong>. Nosotros ponemos a disposición de los USUARIOS una plataforma para gestionar y ejecutar a) servicios de administración de agenda de citas médicas y servicios profesionales de salud ya sea de forma presencial o virtual, b) Teleconsultas con médicos y profesionales de salud telemedicina en línea, c) envío y recepción de prescripción médica, d) captura de datos clínicos y análisis médico. Al acceder y usar el sitio, usted acepta y se obliga a acatar estos Términos de Uso y todas las políticas que rigen el sitio. Si no desea vincularse a estos términos, le pedimos que no use <strong>EL SITIO</strong>.
<h4>2. LIMITACIÓN DE RESPONSABILIDAD.</h4>
Todos los PROVEEDORES DE SALUD, que ofrecen y/o prestan sus servicios a través de <a href="http://www.hellomedical.net">www.hellomedical.net</a> son profesionales independientes, que no tienen ninguna relación laboral con Sievensoft company sas / Medicalsoft / hello medical y son totalmente responsables por los servicios que ofrecen. Bajo ninguna circunstancia se entenderá que los PROVEEDORES DE SALUD son empleados, afiliados, agentes, representantes, o de cualquier otra manera relacionados a Sievensoft company sas o cualquiera de sus afiliadas. En este sentido, se acuerda expresamente que Sievensoft company sas no forma parte, ni adquiere obligación alguna derivada de, la prestación de servicios médicos por parte de los PROVEEDORES DE SALUD a USUARIOS. <a href="http://www.hellomedical.net">www.hellomedical.net</a> , no diagnostica ni realiza consultas y por ningún motivo interfiere con la práctica médica u otra práctica profesional de salud que ejercen los PROVEEDORES DE SALUD listados en EL SITIO. Todos los PROVEEDORES DE SALUD, son responsables de los servicios e indicaciones que prestan y que ofrecen y también del cumplimiento de las normatividades aplicables para el correcto ejercicio de su profesión. Sievensoft company sas  ni EL SITIO ni cualquier medio por el cual tuvo acceso al sitio es responsable por las prescripciones, consejos, indicaciones o servicios profesionales que obtuvo de los PROVEEDORES DE SALUD a través de los SERVICIOS que ofrece el sitio.

Sievensoft company sas , así como cualquier persona relacionada y/o afiliada Sievensoft company sas, incluyendo, sin limitar, directores, apoderados, representantes, administradores, empleados, accionistas y/o agentes, presentes o anteriores, no serán responsables de errores u omisiones en los contenidos de EL SITIO. Asimismo, no serán responsables, bajo ningún caso o circunstancia, por datos y/o perjuicios que se pudieren causar a USUARIOS y/o PROVEEDORES DE SALUD derivado del uso de la Plataforma.

En ningún caso Sievensoft company sas  tendrá responsabilidad derivada de violación del secreto profesional por parte de los PROVEEDORES DE SALUD, ni de cualquier daño y/o perjuicio que sean consecuencia directa de una lesión o daño causado por el tratamiento a un USUARIO, por parte de un PROVEEDOR DE SALUD.

USUARIOS y PROVEEDORES DE SALUD, mediante su aceptación a los presentes términos y condiciones, se obligan expresamente a sacar en paz y a salvo e indemnizar (incluyendo el pago de honorarios de abogados)a Sievensoft company sas , así como a cualquier persona relacionada y/o afiliada a Sievensoft company sas , incluyendo, sin limitar, directores, apoderados, representantes, administradores, empleados, accionistas y/o agentes, presentes o anteriores, de cualquier responsabilidad que derive, o pudiere derivar, del uso de EL SITIO, o de cualquier servicio derivado de dicho uso, incluyendo de manera enunciativa, más no limitativa, cualesquiera contingencias legales, fiscales, laborales, administrativas, civiles, penales, financieras, de salud o de cualquier otra índole, cualesquiera reclamación, demanda, juicio, acto, hecho u omisión que represente o pudiera representar una responsabilidad a cargo de Sievensoft company sas, o a cargo de personas relacionadas y/o afiliadas.
<h4>3. CONTENIDO DEL SITIO.</h4>
Ninguna información contenida en el sitio (salvo la que recomienden los PROVEEDORES DE SALUD, bajo su propio criterio profesional), debe considerarse como consulta médica o como garantía de que un tratamiento es apropiado o efectivo para ti.
<h4>4. AUTORIZACIÓN DE USO.</h4>
<ol>
  <li>La Teleconsulta / Telemedicina es la entrega de servicios de salud usando tecnología interactiva de audio y video, donde el paciente y el PROVEEDOR DE SALUD, se encuentran en una ubicación física diferente. Durante la Teleconsulta con un PROVEEDOR DE SALUD, detalles personales de salud así como detalles de tu historia clínica pueden ser comunicados y discutidos a través de tecnologías de comunicación virtual.</li>
  <li>Los servicios de Telemedicina que recibes de los PROVEEDORES DE SALUD, no intentan reemplazar la atención primaria de un médico o ser un médico permanente en casa. Podría darse el caso de desarrollar una relación usual de médico-paciente a través de la plataforma sin embargo, se deben acatar las instrucciones de los PROVEEDORES DE SALUD, de cuál es la mejor vía para que puedas ser diagnosticado y tratado. De cualquier forma y como en cualquier servicio de salud hay riesgos potenciales asociados al uso de la Telemedicina / Teleconsulta. Estos riesgos incluyen pero no se limitan a:</li>
</ol>
<ul>
  <li>En algunos casos la información transmitida no es suficiente para permitir un diagnostico o recomendación de salud apropiado (p.e. baja resolución de las imágenes, formatos no compatibles, internet lento, etc).</li>
  <li>Atrasos en el diagnostico o prescripción pueden ocurrir debido a fallas en los equipos electrónicos. Si esto ocurre deberás entrar en contacto con tu PROVEEDOR DE SALUD por cualquier otro medio.</li>
  <li>En algunos casos, la falta de acceso a todo tu historial médico puede resultar en una prescripción de medicamentos que tengan un efecto adverso o alérgico o algunos otros errores de juicio.</li>
  <li>Aunque los sistemas electrónicos que utilizamos incorporan protocolos de máxima seguridad para proteger la privacidad y la seguridad de tu información clínica, en casos extremos estos protocolos podrán fallar, causando una brecha de privacidad de la información clínica personal.</li>
</ul>
<ol>
  <li>Aceptando estos Términos de Uso, confirmas que entiendes y aceptas:</li>
</ol>
<ul>
  <li>Que puedes esperar beneficios anticipados del uso de la telemedicina en tu favor, pero que ningún resultado puede ser garantizado o asegurado.</li>
  <li>Que entiendes que las leyes de protección de privacidad y seguridad de la información aplican a la Telemedicina y que has aceptado la política de privacidad de Sievensoft company sas . La comunicación electrónica que se lleva a cabo con EL SITIO, es transmitida a través de una interface segura y encriptado de video y de información</li>
  <li>Que el PROVEEDOR DE SALUD puede determinar que los SERVICIOS, no son apropiados para tus necesidades y puede recomendar consultas presenciales u otro tipo de asistencia.</li>
  <li>Con respecto a la psicoterapia, puedes recibir información de tu PROVEEDOR DE SALUD acerca de los métodos de terapia, técnicas usadas, duración de tu terapia y la estructura de los pagos. Puedes en cualquier momento buscar una segunda opinión de otro terapeuta o terminar la terapia cuando lo decidas.</li>
</ul>
<ol>
  <li>Con respecto a la psicoterapia, si tú y tu PROVEEDOR DE SALUD, deciden realizar terapias de grupo o de parejas (en conjunto <strong>"TERAPIA DE GRUPO"</strong>) entiendes y aceptas que la información discutida en la terapia de grupo es para fines terapéuticos y de ninguna forma para fines legales que involucren a los participantes del grupo. Así mismo aceptas a no citar al PROVEEDOR DE SALUD a testificar por o contra cualquier participante de la TERAPIA DE GRUPO o proveer información en alguna acción legal contra los participantes de la TERAPIA DE GRUPO. Entiendes y aceptas que cualquier información que los participantes de la TERAPIA DE GRUPO comuniquen por cualquier medio al PROVEEDOR DE SALUD queda a completa discreción de este último para compartirla con los demás participantes de la TERAPIA DE GRUPO. Tu aceptas y compartes la responsabilidad con el PROVEEDOR DE SALUD, por el progreso de la terapia, incluyendo la fijación de objetivos y la terminación de la terapia.</li>
  <li><strong> MÉDICO Y/O PROFESIONAL DE LA SALUD:</strong>Al aceptar estos términos y condiciones autoriza que EL SITIO (aliv.io) así como sus entidades legales puedan actuar como agente de cobranza en su nombre, sin que por ello se entienda que aliv.io es una prestadora de servicios de salud. El sitio realizará los cobros de las consultas que usted realice a través de la plataforma y transferirá los recursos a la cuenta bancaría que usted indique. Las obligaciones fiscales de los ingresos generados por consultas médicas continúan bajo la responsabilidad de cada prestador de servicios. Sievensoft company sas es responsable de las obligaciones fiscales de los ingresos generados por el uso de la plataforma Tecnológica.</li>
</ol>
<h4>5. AVISO DE PRIVACIDAD.</h4>
El presente aviso de Privacidad acata las Leyes de Protección de Datos Personales en Posesión de los Particulares, su Reglamento y los Lineamientos del Aviso de Privacidad, en todos los países donde EL SITIO tiene operaciones.

Es política y compromiso de Sievensoft company sas  con domicilio Bogotá, Colombia, respetar y proteger la privacidad de todos nuestros clientes y potenciales clientes, así como de los titulares de los datos personales que tengamos en nuestra posesión.

En Sievensoft company sas. Procuramos mantener una comunicación constante y activa con nuestros miembros, usuarios, visitantes y demás personas importantes para nosotros. Salvo notificación o instrucción contraria del titular de los datos personales (en adelante "Titular"), Él o ella consiente su tratamiento y uso dentro y fuera de las jurisdicciones donde opera Sievensoft company sas de conformidad con el presente Aviso y los "Términos de Uso" del Portal y reconoce que podrán ser manejados y/o transferidos directa o indirectamente por aliv.io, los PROVEEDORES DE SALUD, así como también autoridades competentes dentro del marco legal aplicable.

El tratamiento de los datos personales del Titular, comprende las siguientes finalidades:
<ul>
  <li>Ser contactado para solucionar y dar seguimiento a incidentes que tenga con el uso de EL SITIO.</li>
  <li>Ser contactado por los PROVEEDORES DE SALUD, para proveerle los servicios de salud que haya solicitado.</li>
  <li>Que los USUARIOS puedan contactar a los PROVEEDORES DE SALUD, para recibir los servicios de salud solicitados.</li>
  <li>Ser contactado y enviarle información relativa a las solicitudes del "Titular" o para agilizar y mejorar los Servicios y mantener comunicación en general.</li>
  <li>Ser contactado y enviarle información relativa a los Médicos o Especialistas, promociones disponibles, y los cambios o mejoras de nuestros Servicios, así como otras comunicaciones, con el contenido que creemos le podría interesar.</li>
  <li>Ser contactado a fin de recordarle sobre citas próximas o de seguimiento en conjunto con el uso de determinadas Herramientas Interactivas y otras aplicaciones comunitarias.</li>
  <li>Realizar cobros por servicios adquiridos en EL SITIO, en nombre de los PROVEEDORES DE SALUD o por uso de la plataforma propiedad de Sievensoft company sas</li>
  <li>Dar a conocer a nuestros miembros, usuarios y visitantes la información necesaria sobre los Médicos o Especialistas que forman parte de nuestra comunidad con el fin de que tengan acceso a la mejor opción en cuanto a experiencia, conocimientos, citas, horarios, ubicación, etc.</li>
  <li>Conocer los trabajos, experiencias y niveles de estudios de los Médicos o Especialistas de nuestra comunidad.</li>
  <li>Poner a disposición de los PROVEEDORES DE SALUD información necesaria para realizar un diagnóstico de salud con el fin de que pueda obtener un consejo una prescripción o un servicio de salud.</li>
</ul>
Para prevenir el acceso no autorizado a los datos personales del "Titular" y con el fin de asegurar que la información sea utilizada para los fines establecidos en este aviso de privacidad, las opciones y medios que hemos establecido son, de manera general los mismos que utilizamos para nuestros propios datos y documentos.

El Titular siempre tendrá derecho al acceso, rectificación, cancelación, u oposición respecto el uso de sus datos personales (Solicitud) y podrá revocar la autorización de Sievensoft company sas  para usar y tratar, así como limitar el uso o divulgación de sus datos personales mediante correo dirigido a la siguiente dirección: soporte@sievensoft.com en el cual debe indicar su usuario y el deseo de eliminar su cuenta de la plataforma

Esta solicitud, independientemente de los medios en que ponemos a su disposición este aviso, es regulada por las leyes de los datos personales aplicables al país de residencia de su cuenta de usuario.

Todo cambio a los términos y condiciones de este Aviso de Privacidad, será publicado en nuestra página en internet para que el Titular siempre tenga conocimiento de la versión vigente del mismo, así como de los Términos de Uso de nuestro Sitio.

El presente Aviso de Privacidad no abarca los términos de privacidad de personas ajenas al sitio web
<h4>6. CUENTA DE USUARIO.</h4>
Para hacer uso del sitio es requerido crear una cuenta de usuario (<strong>CUENTA DE USUARIO</strong>), ingresando tu nombre, edad, correo electrónico, teléfono, password y otra información recolectada por EL SITIO (en conjunto llamada <strong>INFORMACIÓN DE LA CUENTA</strong>). Para crear una CUENTA DE USUARIO debes ser mayor de edad para poder aceptar estos términos y condiciones vinculantes. Si no eres mayor de edad no debes registrarte para el uso de los SERVICIOS. Tú aceptas que la información que ingreses para crear la cuenta y cualquier información que ingreses al sitio, es verdadera, exacta, actualizada y completa. No debes transferir o compartir tu password ni la información de tu CUENTA DE USUARIO con nadie o crear más de una cuenta (con la excepción de subcuentas para niños de los cuales eres padre y responsable legal). Eres responsable de mantener la confidencialidad de tu cuenta y de todas las actividades que realices en ella. Sievensoft company sas,  se reserva del derecho de ejecutar cualquier acción que considere adecuada para salvaguardar la seguridad del sitio y de la información de tu cuenta. En ningún caso y bajo ninguna circunstancia Sievensoft company sas, será responsable por cualquier percance o daño resultado del uso del sitio, del uso de la información de tu cuenta o el despliegue de la información de tu cuenta a terceras personas. En ningún caso debes utilizar la cuenta de alguien más.
<h4>7. USO DEL SITIO PARA MENORES DE EDAD.</h4>
Los SERVICIOS, están disponibles para ser utilizados por niños( menos de 18 años), sin embargo el usuario a través del cual dispongan de los SERVICIOS debe ser mayor de 18 años y debe ser el padre o tutor del niño. Si tú te registras como el padre o tutor de un niño serás totalmente responsable del cumplimiento de estos Términos y condiciones.

&nbsp;
<h4>8. DERECHO DE ACCESO AL SITIO.</h4>
Por este medio se te otorga un derecho de uso limitado, no exclusivo y no transferible a EL SITIO y al uso de LOS SERVICIOS que se promueven en él, para tu uso personal y no comercial. Nos reservamos el derecho a nuestra entera discreción de negar o suspender el acceso y el uso de EL SITIO o sus SERVICIOS por cualquier razón. Tu aceptas que de ninguna manera
<ol>
  <li><strong>a)</strong> Te harás pasar por otra persona o entidad.</li>
  <li><strong>b)</strong> Usaras EL SITIO y LOS SERVICIOS para violar ninguna ley ni regulación local, nacional o internacional.</li>
  <li><strong>c)</strong> Desmantelar, descompilar, decodificar, copiar todo o en partes, aplicar ingeniería en reversa, transferir, traducir cualquier software o componente parte de EL SITIO.</li>
  <li><strong>d)</strong> Distribuir virus o cualquier otro código que pueda dañar equipos tecnológicos.</li>
  <li><strong>e)</strong> Usar LOS SERVICIOS del sitio de cualquier manera que rebase el objetivo y el alcance plasmado en este documento.</li>
  <li><strong>f)</strong> Adicionalmente tú aceptas no utilizar lenguaje ofensivo y mantener siempre un comportamiento cordial con los PROVEEDORES DE SALUD y el personal Staff del sitio web.</li>
</ol>
Recomendamos ampliamente no usar LOS SERVICIOS en computadoras públicas.

También recomendamos que no almacenes tu contraseña en el buscador o con otro software.
<h4>9. TÉRMINOS DE COMPRA, PAGO DE SERVICIOS Y REEMBOLSOS.</h4>
Tu aceptas y accedes a pagar todos los cargos hechos a tu CUENTA DE USUARIO, de acuerdo con las tarifas y términos de pago establecidas en el momento que EL SERVICIO, es generado u adquirido. Al capturar la información de algún MEDIO DE PAGO, autorizas a Sievensoft company sas o cualquiera de sus afiliadas, a cargar inmediatamente tu medio de pago y CUENTA DE USUARIO, con las tarifas correspondientes a los servicios solicitados a través de la plataforma. En adelante no es necesaria ninguna autorización adicional para poder realizar los cargos a los medios de pago capturados en la plataforma.

Sievensoft company sas, se reserva el derecho a modificar o implementar una nueva estructura de precios por LOS SERVICIOS que ofrece la plataforma en cualquier momento. Cualquier cambio a la estructura de precios será comunicado a través de EL SITIO y los medios de comunicación que se dispongan.

Tu entiendes y aceptas que por LOS SERVICIOS realizados con base en una cita agendada previamente serás responsable completamente en caso de que no asistas a la cita y que se cobrara el monto completo de la consulta médica y el uso de la plataforma en caso de que no se cancele la cita al menos con 24 horas de anterioridad.

Los pagos hechos por LOS SERVICIOS son finales y no reembolsables, a menos que se determine lo contrario por parte de Sievensoft company sas  analizando caso por caso mediante una solicitud por escrito enviada por USUARIOS y/o PROVEEDORES al correo <strong>soporte@sievensoft.com</strong> Sievensoft company sas, responderá a cualquier solicitud de un PROVEEDOR DE SALUD o USUARIO en un plazo no mayor de 30 días naturales.

Sievensoft company sas, puede generar ofertas promocionales y descuentos que pueden modificar los cargos.

&nbsp;
<ol start="10">
  <li>PROPIEDAD.</li>
</ol>
El sitio y todo su contenido, configuraciones, y funcionalidad (que incluye pero no se limita a toda la información, software, texto, catálogos, imágenes, video, audio y diseño, flujos de procesos, botones de selección etc.) son propiedad de Sievensoft company sas, sus licenciatarios y/o otros proveedores de material, los cuales están protegidos por leyes y tratados internacionales de derechos de autor, marcas y patentes. Estos Términos permiten el uso de EL SITIO y LOS SERVICIOS para tu uso personal y no comercial. No debes reproducir, distribuir, modificar, crear trabajos derivados, desplegar, publicitar, republicar, descargar, almacenar o transmitir ningún material de nuestro sitio, excepto lo explícitamente permitido en estos Términos y Condiciones. No debes acceder o usar ninguna parte de EL SITIO o los SERVICIOS con fines comerciales.
<h4>11. MARCAS.</h4>
Algunos nombres, logos y otros materiales desplegados en EL STIO o en los SERVICIOS pueden ser marcas o nombres o logos (LAS MARCAS) propiedad de Sievensoft company sas. No tienes autorizado usar LAS MARCAS, sin permiso explícito y por escrito de Sievensoft company sas
<h4>12. TERMINACIÓN DE USUARIO.</h4>
Tienes derecho en cualquier momento y por cualquier razón a desactivar tu CUENTA DE USUARIO mandando un correo a soporte@sievensoft.com

Sievensoft company sas , puede suspender o cancelar tu CUENTA DE USUARIO, el uso de EL SITIO y LOS SERVICIOS, por cualquier razón en el momento que lo considere. Sujeto a la ley aplicable Sievensoft company sas, se reserva el derecho de mantener, almacenar, borrar o destruir, cualquier comunicación y material publicado y cargado en o a través de EL SITIO.
<h4>13. COOKIES.</h4>
Una cookie es un archivo de texto muy pequeño que un servidor Web puede guardar en el disco duro de un equipo para almacenar algún tipo de información sobre el usuario. La cookie identifica el equipo de forma única, y sólo puede ser leída por el sitio Web que lo envió al equipo.

Una cookie no es un archivo ejecutable ni un programa y por lo tanto no puede propagar o contener un virus u otro software malicioso.

La utilización de las cookies tiene como finalidad exclusiva recordar las preferencias del usuario (idioma, país, inicio de sesión, características de su navegador, información de uso de nuestra Web, etc

Sievensoft company sas, en este acto, notifica a Usuarios y Proveedores que EL SITIO, así como todos los servicios relacionados con la misma, podrán utilizar cookies a efecto de mejorar los servicios prestados por Sievensoft company sas. Mediante el registro y utilización de la Plataforma, Usuarios y Proveedores otorgan su consentimiento a Sievensoft company sas, en relación con la utilización de cookies en EL SITIO.

La información de Usuarios y Proveedores obtenida a través de cookies se utiliza para analizar tendencias, administrar la Plataforma, conocer la conducta del Usuario o Proveedor, y recopilar información de carácter demográfico acerca de nuestra base de Usuarios y Proveedores en conjunto. Sievensoft company sas, puede utilizar esta información en sus servicios de marketing y publicidad. Esta información puede utilizarse para reducir o eliminar la cantidad de mensajes enviados a nuestros clientes.

&nbsp;


</div>







      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
         
      </div>
    </div>
  </div>
</div>
                 
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
<button type="submit" class="btn btn-block btn-primary btn-sm" id="registro_usuario389" name="registro_usuario389"><h4>
                 Regístrate </h4></button>
                
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <?php echo $mensaje_registro_usuario389?>
          <div align="center">
            <h4 class="box-title"> <a href="recover">  Olvidé Contraseña </a>   </h4>  
   
            <h4 class="box-title"> <a href="index.php">  Login </a>   </h4> 
             <br>  
            Desarrollado por <strong> <a  target="_blank" href="https://sievensoft.com">SievenSoft</a> </strong>   
          </div>

</div>

   
    <!-- /.content --> 
  </div>
  <!-- /.content-wrapper -->
 
 
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="https://medicalsoftplus.com/baseDev/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="https://medicalsoftplus.com/baseDev/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- Sparkline -->
<script src="https://medicalsoftplus.com/baseDev/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="https://medicalsoftplus.com/baseDev/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="https://medicalsoftplus.com/baseDev/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="https://medicalsoftplus.com/baseDev/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="https://medicalsoftplus.com/baseDev/plugins/chartjs/Chart.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
 