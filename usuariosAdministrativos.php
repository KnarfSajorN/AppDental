   <?php
    include 'header.php';
    include 'menu.php';

    $idusuarios = 0;
    $idusuarios = $_GET['idusuarios'];

    $IDconfig = $_SESSION['ID'];
    $rol      = $_SESSION['rol'];

    $conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));






    $msg = $_GET['msg'];
    if ($msg == 1) {
      $respuesta = ' 
          <div class="callout callout-info">
          <h4>Registrado</h4>
           <p></p>
        </div>';
    } elseif ($msg == 2) {

      $respuesta = ' 
          <div class="callout callout-danger">
          <h4>email duplicado</h4>
           <p></p>
        </div>';
    } elseif ($msg == 3) {

      $respuesta = ' 
          <div class="callout callout-info">
          <h4>Código borrado</h4>
           <p></p>
        </div>';
    } elseif ($msg == 4) {

      $respuesta = ' 
          <div class="callout callout-danger">
          <h4>Código usado no es posible borrarlo</h4>
           <p></p>
        </div>';
    } elseif ($msg == 5) {

      $respuesta = ' 
          <div class="callout callout-info">
          <h4>Código actualizado </h4>
           <p></p>
        </div>';
    }







    if (isset($_POST['registro_usuarioAdmin'])) {


      //name email password confirmPassword
      if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
      } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
      } else {
        $ip = $_SERVER['REMOTE_ADDR'];
      }
      $url = "http://api.wipmania.com/" . $ip;
      $country = file_get_contents($url);
      //echo $country;

      $name         = $_POST['nombre'];
      $email        = $_POST['email'];
      $password       = $_POST['clave'];
      $confirmPassword  = $_POST['clave2'];
      $ciudad       = $_POST['ciudad'];
      $pais       = $_POST['pais'];
      $especialidad2    = $_POST['especialidad'];
      $telefono       = $_POST['telefono'];
      $Nacimiento       = $_POST['Nacimiento'];
      $aliado           = $_POST['aliado'];
      $perfil           = $_POST['perfil'];
      $vista            = $_POST['vista'];
      $correo           = $_POST['correo'];
      $fec_ingreso      = date("Y-m-d h:m:s");
      $usuario_id       = $_POST['usuario_id'];





      list($perfil2, $especialidad) = explode("/", $especialidad2);
      // echo $perfil2;          // foo
      // echo $especialidad;    // *


      //Verificamos que las claves sean iguales
      if ($password <> $confirmPassword) {
        $mensaje_registro_usuario = '
        <div class="callout callout-danger ">
            <h4>Error!</h4>

            <p>La contraseña no coincide   </p>
          </div>';
      }

      $q = mysqli_query($conn3,"select * from usuarios where USUARIO='$email'");

      //Verificamos si el correo no esta Registrado
      if ($check != 0) {
        $mensaje_registro_usuario = '
        <div class="callout callout-danger ">
            <h4>Error!</h4>

            <p>Correo regsitrado por favor acceder     </p>
          </div>';
      } elseif ($password == $confirmPassword) {




        mysqli_query($conn3,"INSERT INTO usuarios 
                   (USUARIO,  PASS,       NOMBRE_USUARIO,  fec_ingreso,    especialidad,     rol, tipo ,   pais,     paisacceso, telefono, vista, correo, usuario_id) 
           VALUES ('$email', '$password', '$name',         '$fec_ingreso', '$especialidad', '2', '2',  '$pais',  '$country', '$telefono', '$vista', '$correo' , '$usuario_id')");


        $queryList = mysqli_query($conn3, "SELECT max(ID) as idUsu FROM usuarios");
        if ($queryList) {
          while ($rowMotorizado = mysqli_fetch_array($queryList)) {
            $idUsu = $rowMotorizado['idUsu'];
          }
        }
        


        $q = mysqli_query($conn3,"select * from usuarios where USUARIO='$email'");

        $data = mysqli_fetch_array($q);
        $ID_Usuario = $data['ID'];



        mysqli_query($conn3, "INSERT INTO config (ID_Usuario) VALUES ('$ID_Usuario')");



        $mensaje_registro_usuario = '
          <div class="callout callout-info ">
            <h4>Enviado!</h4>
          <p>Usuario Registrado<br>  </p>
            </div>';


        //echo "<script language='Javascript'> window.location='usuariosAdministrativos';</script>";
      }
    }










    if (isset($_GET['borrar_usuarios'])) {
      $id     = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_GET['borrar_usuarios'])));

      mysqli_query($conn3, "update usuarios set ACTIVO = 0 where ID= '$id' ");

      mysqli_query($conn3, "update usuarios set ACTIVO = 0 where ID= '$id' ");
    }




    if (isset($_GET['editar_usuarios'])) {



      $id     = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_GET['editar_usuarios'])));

      $queryList = mysqli_query($conn3, "SELECT * FROM usuarios");
      while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $nombre = $rowMotorizado['NOMBRE_USUARIO'];
        $idE = $rowMotorizado['ID'];
        $USUARIO = $rowMotorizado['USUARIO'];
        $clave = $rowMotorizado['PASS'];
        $pais = $rowMotorizado['pais'];
        $especialidad = $rowMotorizado['especialidad'];
        $email = $rowMotorizado['correo'];
        $tel = $rowMotorizado['telefono'];
        $perfil = $rowMotorizado['TIPO'];
      }
    }


    ?>

   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper p-3">
     <!-- Content Header (Page header) -->
     <!-- <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio </a></li>
        <li><a href="config"><i class="fa fa-gears"></i> Perfil / Configuración  </a></li>
        <li><a href="#">Usuarios Administrati</a></li>
      </ol>
    </section> -->

     <!-- Main content -->
     <section class="content">
       <div class="">
         <div class="col-xs-12">


           <div class="card-body">
              <h4 class=""><strong>Registro de Usuarios Administradores </strong><br>
                <font color="red" size="2"> Este usuario no tendra acceso a historias clinicas solo a modulos administrativos </font>
              </h4>



             <form action="usuariosAdministrativos" method="POST">
               <div class="form-row">
                 <div class="col-md-12">
                   <?php echo $respuesta; ?>
                 </div>



                 <?php
                  if ($idE > 0) {
                    echo '<input type="hidden" class="form-control input-lg" name="codigo"  id="codigo"   value="' . $codigoE . '"    required>';
                  }
                  //echo '<input type="hidden" class="form-control input-lg" name="IDconfig"  id="IDconfig"   value="'.$IDconfig.'"    required>';
                  ?>







               </div>



               <div class="row">


               <div class="form-group col-md-6">
                 Usuario *

                 <?php

                  if ($idE > 0) {
                    echo '<input type="hidden" class="form-control input-lg" name="email"  id="email"   value="' . $USUARIO . '"     required>';
                    echo '<input type="text" class="form-control input-lg" name="email"  id="email"   placeholder="Usuario *"   value="' . $USUARIO . '"  disabled="disabled"   required>';
                    echo '<input type="hidden" class="form-control input-lg" name="id"  id="id"   value="' . $idE . '"      required>';
                  } else {
                    echo '<input type="text"  class="form-control input-lg"  name="email"   id="email" placeholder="Usuario *" onChange="validar();" required>';
                  }
                  ?>


                 <div id="div-resultsHora"></div>
               </div>
               <input type="hidden" class="form-control input-lg" name="IDconfig" id="IDconfig" value="<?php echo $IDconfig ?>" required>
               <input type="hidden" class="form-control input-lg" name="rol" id="rol" value="<?php echo $rol ?>" required>
               <div class="form-group col-md-6">
                 Nombre Completo*
                 <input type="text" class="form-control input-lg" placeholder="Nombre *" name="nombre" value="<?php echo $nombre ?>" id="nombre" required>
                 <div id="div-resultsHora"></div>
               </div>
               <div class="form-group col-md-6">
                 Email *
                 <input type="correo" name="correo" class="form-control input-lg" placeholder="Email *" maxlength="80" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" value="<?php echo $email ?>" required>
               </div>

               <div class="form-group col-md-6">
                 Teléfono *
                 <input type="phone" name="telefono" class="form-control input-lg" placeholder="Teléfono *" maxlength="20" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" value="<?php echo $tel ?>" required>

               </div>
               <div class="form-group col-md-6">
                 Contraseña*
                 <input type="Password" class="form-control input-lg" placeholder="Clave *" name="clave" value="<?php echo $clave ?>" id="clave" required>
                 <div id="div-resultsHora"></div>
               </div>

               <div class="form-group col-md-6">
                 Confirmar Contraseña*
                 <input type="Password" class="form-control input-lg" placeholder="Confirmar clave *" name="clave2" value="<?php echo $clave ?>" id="clave2" required>
                 <div id="div-resultsHora"></div>
               </div>

               </div>

               <input type="hidden" class="form-control input-lg" name="ciudad" value="0">
               <input type="hidden" class="form-control input-lg" name="especialidad" value="0">
               <input type="hidden" class="form-control input-lg" name="perfil" value="2">
               <input type="hidden" class="form-control input-lg" name="rol" value="2">
               <input type="hidden" class="form-control input-lg" name="usuario_id" value="<?php echo $_SESSION['ID'] ?>">


               <!--   Ciudad * 

                <input type="hidden" name="ciudad"  class="form-control input-lg"   placeholder="Ciudad *" value="Ciudad" required>

 <div class="form-group col-md-6">

                  País * 
                     <input type="text" name="pais"  class="form-control input-lg"   placeholder="pais *"  maxlength="40" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" value="<?php echo $pais ?>" required>
                  
              </div>  

 <div class="form-group col-md-6">
                 Especialidad  


                 <select class="form-control input-lg" name="especialidad">
<option value="<?php echo $especialidad ?>" select><?php echo $especialidad ?></option>

<option value="Medicina general">Medicina general </option>
<option value="Medicina familiar">Medicina familiar</option>
<option value="Medico internista">Medico internista </option>
<option value="Medicina alternativa">Medicina alternativa</option>
<option value="Clínicas IPS">Clínicas /IPS </option>

<option value="Centro de vacunación">Centro de vacunación</option>
<option value="Pediatría">Pediatría </option>
<option value="Spa/estética ">Spa/estética </option>

<option value="Spa/estética ">Flebologia </option>
<option value="Spa/estética ">Urologia </option>




<option value="/Ecografista">Ecografista </option>

<option value="/Ginecólogia">Ginecólogia </option> 

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

<option value="Anestesi&oacutelogo">Anestesi&oacutelogo</option>
<option value="Asociaci&oacuten m&eacutedica">Asociaci&oacuten m&eacutedica</option>
<option value="Audi&oacutelogo">Audi&oacutelogo</option>
<option value="Banco de sangre">Banco de sangre</option>
<option value="Cardi&oacutelogo">Cardi&oacutelogo</option>
<option value="Centro de rehabilitaci&oacuten">Centro de rehabilitaci&oacuten</option>
<option value="Centros m&eacutedicos">Centros m&eacutedicos</option>
<option value="Cirug&iacutea endosc&oacutepica">Cirug&iacutea endosc&oacutepica</option>
<option value="Cirug&iacutea laparosc&oacutepica">Cirug&iacutea laparosc&oacutepica</option>
<option value="Cirujano bariatrico">Cirujano bariatrico</option>
<option value="Cirujano cabeza y cuello">Cirujano cabeza y cuello</option>
<option value="Cirujano cardiovascular">Cirujano cardiovascular</option>
<option value="Cirujano de seno y tejido blandos">Cirujano de seno y tejido blandos</option>
<option value="Cirujano de torax">Cirujano de torax</option>
<option value="Cirujano gastrointestinal">Cirujano gastrointestinal</option>
<option value="Cirujano general">Cirujano general</option>
<option value="Cirujano maxilofacial">Cirujano maxilofacial</option>
<option value="Cirujano onc&oacutelogo">Cirujano onc&oacutelogo</option>
<option value="Cirujano pedi&aacutetrico">Cirujano pedi&aacutetrico</option>
<option value="Cirujano pl&aacutestico">Cirujano pl&aacutestico</option>
<option value="Cirujano vascular">Cirujano vascular</option>
<option value="Cl&iacutenica">Cl&iacutenica</option>
<option value="Coloproct&oacutelogo">Coloproct&oacutelogo</option>
<option value="Dermat&oacutelogo">Dermat&oacutelogo</option>
<option value="Droguer&iacutea">Droguer&iacutea</option>
<option value="Endocrin&oacutelogo">Endocrin&oacutelogo</option>
<option value="Enfermera">Enfermera</option>
<option value="EPS">EPS</option>
<option value="Est&eacuteticas">Est&eacuteticas</option>
<option value="Fisiatra">Fisiatra</option>
<option value="Fisioterapeuta">Fisioterapeuta</option>
<option value="Fonoaudi&oacutelogo">Fonoaudi&oacutelogo</option>
<option value="Fundaci&oacuten">Fundaci&oacuten</option>
<option value="Gastroenter&oacutelogo">Gastroenter&oacutelogo</option>
<option value="Genetista">Genetista</option>
<option value="Geriatra">Geriatra</option> 
<option value="Hemat&oacutelogo">Hemat&oacutelogo</option>
<option value="Hepat&oacutelogo">Hepat&oacutelogo</option>
<option value="Hospital">Hospital</option>
<option value="Infect&oacutelogo">Infect&oacutelogo</option>
<option value="Inmun&oacutelogo">Inmun&oacutelogo</option>
<option value="Internista">Internista</option>
<option value="Laboratorio cl&iacutenico">Laboratorio cl&iacutenico</option>
<option value="Laboratorio farmac&eacuteutico">Laboratorio farmac&eacuteutico</option> 
<option value="M&eacutedico alternativo">M&eacutedico alternativo</option>
<option value="M&eacutedico biol&oacutegico">M&eacutedico biol&oacutegico</option> 
<option value="M&eacutedico general">M&eacutedico general</option>
<option value="Mast&oacutelogo">Mast&oacutelogo</option>
<option value="Medicina deportiva">Medicina deportiva</option>


</select>


</div>



<div class="form-group col-md-6">
                 Perfil 

                 <select class="form-control input-lg" name="perfil">
<option value="<?php echo $perfil ?>" select><?php echo $perfil ?></option>

<option value="0">0-Especialista </option>
<option value="1">1-Auxiliar</option>
<option value="2">2-Administrador </option>



</select>


</div>


<div class="form-group col-md-6">
                 Vista de pacientes 

                 <select class="form-control input-lg" name="vista">
 
<option value="0" select>Ver todos los pacientes </option>
<option value="1">Ver solo paceintes registrados por el especialista</option>




</select>


</div>
<BR>


              -->



               <!--

          
<div class="form-group col-md-12">
  <hr>
  Acceso a:
</div> 
          <div class="form-group col-md-3">
          <?php if ($m1 == 1) {
            echo '<input type="checkbox" name="m1" checked/><label for="ContentPlaceHolderContent_chklSeguros_0">Historia Clínica  </label>';
          } else
            echo '<input type="checkbox" name="m1"/><label for="ContentPlaceHolderContent_chklSeguros_0"> Historia Clínica  </label>';
          ?>
          </div> 


          <div class="form-group col-md-3">
          <?php if ($m2 == 1) {
            echo '<input type="checkbox" name="m2" checked/><label for="ContentPlaceHolderContent_chklSeguros_0">Control de citas</label>';
          } else
            echo '<input type="checkbox" name="m2"/><label for="ContentPlaceHolderContent_chklSeguros_0">Control de citas</label>';
          ?>
          </div> 


          <div class="form-group col-md-3">
          <?php if ($m3 == 1) {
            echo '<input type="checkbox" name="m3" checked/><label for="ContentPlaceHolderContent_chklSeguros_0">Facturación </label>';
          } else
            echo '<input type="checkbox" name="m3"/><label for="ContentPlaceHolderContent_chklSeguros_0"> Facturación</label>';
          ?>
          </div> 


         


          <div class="form-group col-md-3">
          <?php if ($m4 == 1) {
            echo '<input type="checkbox" name="m4" checked/><label for="ContentPlaceHolderContent_chklSeguros_0">Inventarios  </label>';
          } else
            echo '<input type="checkbox" name="m4"/><label for="ContentPlaceHolderContent_chklSeguros_0"> Inventarios</label>';
          ?>
          </div> 


          <div class="form-group col-md-3">
          <?php if ($m5 == 1) {
            echo '<input type="checkbox" name="m5" checked/><label for="ContentPlaceHolderContent_chklSeguros_0">Reportes  </label>';
          } else
            echo '<input type="checkbox" name="m5"/><label for="ContentPlaceHolderContent_chklSeguros_0"> Reportes </label>';
          ?>
          </div> 



          <div class="form-group col-md-3">
          <?php if ($m6 == 1) {
            echo '<input type="checkbox" name="m6" checked/><label for="ContentPlaceHolderContent_chklSeguros_0">Video Consultas  </label>';
          } else
            echo '<input type="checkbox" name="m6"/><label for="ContentPlaceHolderContent_chklSeguros_0"> Video Consultas  </label>';
          ?>
          </div> 

          <div class="form-group col-md-3">
          <?php if ($m7 == 1) {
            echo '<input type="checkbox" name="m7" checked/><label for="ContentPlaceHolderContent_chklSeguros_0">Directorio médico </label>';
          } else
            echo '<input type="checkbox" name="m7"/><label for="ContentPlaceHolderContent_chklSeguros_0">Directorio médico</label>';
          ?>
          </div> 



-->



               <input type="hidden" name="idUsuario" id="usuario_id" value="<?php echo $_SESSION['ID'] ?>">

               <input type="hidden" name="id" value="<?php echo $idE ?>">

           </div>

           <center>
             <?php
              if ($idE > 0) {
                echo '<button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" name="actualizar_usuariosSegundarios"> <h4> <strong> Actualizar   </strong> </h4> </button></center>';
              } else {
                echo '<button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" id="registro_usuarioAdmin" name="registro_usuarioAdmin"> <h4> <strong>  Guardar  </strong> </h4> </button></center>';
              }

              ?>


             </form>
             <br>
             <br>


         </div>

         <div class="box-body">
           <table id="example1" class="table table-bordered table-striped">
             <thead>
               <tr>
                 <th>Usuario </th>

                 <th>Nombre </th>

                 <th>Correo </th>
                 <th>Teléfono </th>
                 <th>Perfil </th>
                 <th> </th>
               </tr>
             </thead>
             <tbody>
               <?php

                $ID = $_SESSION['ID'];

                $conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));


                $queryListA = mysqli_query($conn3, "SELECT * FROM  usuarios where activo = 1 and TIPO = 2 and rol = 2 and usuario_id = '$ID' order by NOMBRE_USUARIO");


        

                while ($row_recordset32A = mysqli_fetch_array($queryListA)) {
                  $id = $row_recordset32A['ID'];
                  $usu  = $row_recordset32A['USUARIO'];
                  $CLAVE  = $row_recordset32A['PASS'];

                  $email  = $row_recordset32A['email'];
                  $nombre = $row_recordset32A['NOMBRE_USUARIO'];
                  $especialidad = $row_recordset32A['especialidad'];
                  $correo = $row_recordset32A['correo'];
                  $perfil = $row_recordset32A['TIPO'];
                  $tel = $row_recordset32A['telefono'];


                  if ($perfil == 2) {
                    $PerfilNombre = 'ADMINISTRADOR';
                  }




                  echo '      
                      <tr>
                      <td> ' . $usu . '</td>
                      <td> ' . $nombre . '</td>
                      <td> ' . $correo . '</td>
                      <td> ' . $tel . '</td>
                      <td> ' . $PerfilNombre . '</td>
                      <td>

                      
                       <font color="#04CC05"> <a href="usuariosAdministrativos?borrar_usuarios=' . $id . '&usuario_id=' . $ID . '"> <i class="fa fa-trash" title="Borrar Usuario" name="Virtual"></i>  </a></font>
                      </td>
                      </tr>';
                }
                ?>



             </tbody>
           </table>
         </div>
         <!-- /.box-body -->
       </div>
       <!-- /.box -->
   </div>
   <!-- /.col -->
   </div>
   <!-- /.row -->
   </section>
   <!-- /.content -->
   </div>
   <!-- /.content-wrapper -->
   <?php
    include 'footer.php';

    ?>





   <script type="text/javascript">
     function validar() {
       // estas son las variables que enviamos

       var email = $("#email").val();

       // aqui enviamos el mensaje por medio de un arreglo     

       $.ajax({
         type: "POST",
         url: "ajax_verificar_usuario.php",
         data: {
           email: email
         },
         success: function(response) {
           $('#div-results').html(response);

         }
       });
     };
   </script>