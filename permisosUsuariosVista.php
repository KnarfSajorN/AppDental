<?php
include 'header.php';
include 'menu.php';

$idusuarios = 0;
$idusuarios = $_GET['idusuarios'];

$IDconfig = $_SESSION['ID'];
$rol = $_SESSION['rol'];
$ID_principal = $_SESSION['ID'];
$conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));

$queryListA = mysqli_query($conn3, "SELECT count(ID) as Maximos FROM  usuarios where  activo = 1 and rol <> 2");


$nrowl = mysqli_num_rows($queryListA);

while ($row_recordset32A = mysqli_fetch_array($queryListA)) {
  $Maximos = $row_recordset32A['Maximos'];
}





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
          <h4>Email duplicado</h4>
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







if (isset($_GET['borrar_usuarios'])) {

  $id = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_GET['borrar_usuarios'])));

  mysqli_query($conn3, "update usuarios set ACTIVO = 0 where ID= '$id' ");

  mysqli_query($conn3, "update usuarios set ACTIVO = 0 where ID= '$id' ");
}



$perfil = 0;
if (isset($_GET['editar_usuarios'])) {



  $id = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_GET['editar_usuarios'])));

  $queryList = mysqli_query($conn3, "SELECT * FROM usuarios");
  $nrowl = mysqli_num_rows($queryList);
  while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $nombre = $rowMotorizado['NOMBRE_USUARIO'];
    $idE = $rowMotorizado['ID'];
    $USUARIO = $rowMotorizado['USUARIO'];
    $clave = $rowMotorizado['PASS'];
    $pais = $rowMotorizado['pais'];
    // $especialidad = $rowMotorizado['especialidad'];
    $especialidad = funcionMaster($row_recordset32A['especialidad'], 'id', 'descripcion', 'c_categoria');
    $email = $rowMotorizado['correo'];
    $tel = $rowMotorizado['telefono'];
    $perfil = $rowMotorizado['TIPO'];
  }
}

$numeroUsuario = 999;
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
  <!-- Content Header (Page header) -->
  <!-- <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio </a></li>
      <li><a href="config"><i class="fa fa-gears"></i> Perfil / Configuración </a></li>
      <li><a href="#">Usuarios </a></li>
    </ol>
  </section> -->

  <!-- Main content -->
  <section class="content">
    <div class="box">
      <!-- <div class="col-md-12">
                <a href="Perfiles_Menu.php" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">Gestionar
                    perfiles y grupos de usuarios</a>
            </div> -->
      <!-- <div class="col-xs-12">
        <div class="card-body">
           <a href="grupos.php" class="btn btn-primary">Gestionar perfiles y grupos de usuarios</a>
          <h4 class="card-title"><strong>Registro de Usuarios</strong>
            <strong> (
              <?php echo $Maximos ?> de
              <?php echo $numeroUsuario ?> usuarios permitidos)
            </strong>
           </h4>
            <form action="usuarios" method="POST">
              <div class="form-row">
              <div class="col-md-12">
                <?php echo $respuesta; ?>
              </div>
              <?php
              if ($idE > 0) {
                echo '<input type="hidden" class="form-control input-lg" name="codigo"  id="codigo"   value="' . $codigoE . '"    required>';
              }
              echo '<input type="hidden" class="form-control input-lg" name="IDconfig"  id="IDconfig"   value="'.$IDconfig.'"    required>';
              ?>
            </div>

            <br>

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
              <input type="hidden" class="form-control input-lg" name="IDconfig" id="IDconfig"
                value="<?php echo $IDconfig ?>" required>
              <input type="hidden" class="form-control input-lg" name="rol" id="rol"
                value="<?php echo $rol ?>" required>
              <div class="form-group col-md-6">
                Nombre Completo*
                <input type="text" class="form-control input-lg" placeholder="Nombre *" name="nombre"
                  value="<?php echo $nombre ?>" id="nombre" required>
                <div id="div-resultsHora"></div>
              </div>
              <div class="form-group col-md-6">
                Email *
                <input type="correo" name="correo" class="form-control input-lg" placeholder="Email *"
                  maxlength="80"
                  oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                  value="<?php echo $email ?>" required>
              </div>

              <div class="form-group col-md-6">
                Teléfono *
                <input type="phone" name="telefono" class="form-control input-lg"
                  placeholder="Teléfono *" maxlength="20"
                  oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                  value="<?php echo $tel ?>" required>

              </div>
              <div class="form-group col-md-6">
                Contraseña*
                <input type="Password" class="form-control input-lg" placeholder="Clave *" name="clave"
                  value="<?php echo $clave ?>" id="clave" required>
                <div id="div-resultsHora"></div>
              </div>

              <div class="form-group col-md-6">
                Confirmar Contraseña*
                <input type="Password" class="form-control input-lg" placeholder="Confirmar clave *"
                  name="clave2" value="<?php echo $clave ?>" id="clave2" required>
                <div id="div-resultsHora"></div>
              </div>



                Ciudad *

              <input type="hidden" name="ciudad" class="form-control input-lg" placeholder="Ciudad *"
                value="Ciudad" required>

              <div class="form-group col-md-6">

                País *
                <input type="text" name="pais" class="form-control input-lg" placeholder="país *"
                  maxlength="40"
                  oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                  value="<?php echo $pais ?>" required>

              </div>

              <div class="form-group col-md-6">
                Especialidad


                 <select class="form-control input-lg" name="especialidad">
                                    <option value="<?php echo utf8_encode($especialidad); ?>" select>
                                        <?php echo utf8_encode($especialidad); ?></option>

                                    <option value="Medicina general">Medicina general</option>
                                    <option value="Medicina familiar">Medicina familiar</option>
                                    <option value="Medico internista">Médico internista</option>
                                    <option value="Medicina alternativa">Medicina alternativa</option>
                                    <option value="Clínicas IPS">Clínicas /IPS</option>
                                    <option value="Centro de vacunación">Centro de vacunación</option>
                                    <option value="Pediatria">Pediatría</option>
                                    <option value="Spa/estética">Spa/estética</option>
                                    <option value="Flebólogo">Flebólogo</option>
                                    <option value="Urología">Urología</option>
                                    <option value="/Ecografista">Ecografista</option>
                                    <option value="/Ginecología">Ginecología</option>
                                    <option value="Cardiólogo">Cardiólogo</option>
                                    <option value="Traumatología">Traumatología</option>
                                    <option value="Fisioterapia">Fisioterapia</option>
                                    <option value="Rehabilitación">Rehabilitación</option>
                                    <option value="Prehospitalario">Prehospitalario</option>
                                    <option value="Servicios de ambulancias">Servicios de ambulancias</option>
                                    <option value="Medicina estetica">Medicina estética</option>
                                    <option value="Podólogo">Podólogo</option>
                                    <option value="Odontología">Odontología</option>
                                    <option value="Ortodoncia">Ortodoncia</option>
                                    <option value="Psicólogo">Psicólogo</option>
                                    <option value="Anestesiólogo">Anestesiólogo</option>
                                    <option value="Asociación médica">Asociación médica</option>
                                    <option value="Audiólogo">Audiólogo</option>
                                    <option value="Banco de sangre">Banco de sangre</option>
                                     <option value="Cardiólogo">Cardiólogo</option> 
                <option value="Centro de rehabilitación">Centro de rehabilitación</option>
                                    <option value="Centros médicos">Centros médicos</option>
                                    <option value="Cirugía endoscópica">Cirugía endoscópica</option>
                                    <option value="Cirugía laparoscópica">Cirugía laparoscópica</option>
                                    <option value="Cirujano bariátrico">Cirujano bariátrico</option>
                                    <option value="Cirujano cabeza y cuello">Cirujano cabeza y cuello</option>
                                    <option value="Cirujano cardiovascular">Cirujano cardiovascular</option>
                                    <option value="Cirujano de seno y tejido blandos">Cirujano de seno y tejido blandos
                                    </option>
                                    <option value="Cirujano de tórax">Cirujano de tórax</option>
                                    <option value="Cirujano gastrointestinal">Cirujano gastrointestinal</option>
                                    <option value="Cirujano general">Cirujano general</option>
                                    <option value="Cirujano maxilofacial">Cirujano maxilofacial</option>
                                    <option value="Cirujano oncólogo">Cirujano oncólogo</option>
                                    <option value="Cirujano pediátrico">Cirujano pediátrico</option>
                                    <option value="Cirujano plástico">Cirujano plástico</option>
                                    <option value="Cirujano vascular">Cirujano vascular</option>
                                    <option value="Clínica">Clínica</option>
                                    <option value="Coloproctólogo">Coloproctólogo</option>
                                    <option value="Dermatólogo">Dermatólogo</option>
                                    <option value="Droguería">Droguería</option>
                                    <option value="Endocrinólogo">Endocrinólogo</option>
                                    <option value="Enfermera">Enfermera</option>
                                    <option value="EPS">EPS</option>
                                    <option value="Estéticas">Estéticas</option>
                                    <option value="Fisiatra">Fisiatra</option>
                                    <option value="Fisioterapeuta">Fisioterapeuta</option>
                                    <option value="Fonoaudiólogo">Fonoaudiólogo</option>
                                    <option value="Fundación">Fundación</option>
                                    <option value="Gastroenterólogo">Gastroenterólogo</option>
                                    <option value="Genetista">Genetista</option>
                                    <option value="Geriatra">Geriatra</option>
                                    <option value="Hematólogo">Hematólogo</option>
                                    <option value="Hepatólogo">Hepatólogo</option>
                                    <option value="Hospital">Hospital</option>
                                    <option value="Infectólogo">Infectólogo</option>
                                    <option value="Inmunólogo">Inmunólogo</option>
                                    <option value="Internista">Internista</option>
                                    <option value="Laboratorio clínico">Laboratorio clínico</option>
                                    <option value="Laboratorio farmacéutico">Laboratorio farmacéutico</option>
                                    <option value="Médico alternativo">Médico alternativo</option>
                                    <option value="Médico biológico">Médico biológico</option>
                                    <option value="Médico general">Médico general</option>
                                    <option value="Mastólogo">Mastólogo</option>
                                    <option value="Medicina deportiva">Medicina deportiva</option>



                                </select> 
                <select name="especialidad" class="form-control select2"
                  data-placeholder="Seleccione especialidades"
                  style="width: 100%;"="">
                  <option value="<?php echo $especialidad1 ?>">
                    <?php echo categoria($especialidad1) ?>
                  </option>
                  <?php categoriaselect() ?>
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
                  <option value="1">Ver solo pacientes registrados por el especialista</option>




                </select>


              </div>

              <div class="form-group col-md-6">Grupo / menú
                <select class="form-control input-lg" name="menu">
                  <?php
                  $query = "SELECT * from grupos where estado = 1";
                  $result = mysqli_query($conn3, $query);
                  while ($row = mysqli_fetch_array($result)) {
                    echo '<option value="' . $row['id'] . '">' . $row['nombre'] . '</option>';
                  }
                  ?>
                </select>
              </div>
            </div>
            <BR>





            
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



          


            <input type="hidden" name="idUsuario" id="usuario_id" value="<?php echo $_SESSION['ID'] ?>">

            <input type="hidden" name="id" value="<?php echo $idE ?>">

        </div>

        <center>
          <?php
          if ($idE > 0) {
            echo '<button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" name="actualizar_usuariosSegundarios"> <h4> <strong> Actualizar   </strong> </h4> </button></center>';
          } elseif ($Maximos < $numeroUsuario) {
            echo '<button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" id="registro_usuario" name="registro_usuario"> <h4> <strong>  Guardar  </strong> </h4> </button></center>';
          }

          ?>


          </form>
          <br>
          <br>


      </div> -->

      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped w-100">
          <thead>
            <tr>
              <th>Usuario </th>
              <th>Contraseña </th>
              <th>Nombre </th>
              <th>Especialidad </th>
              <th>Correo </th>
              <th>Teléfono </th>
              
              <th>Permisos </th>
            </tr>
          </thead>
          <tbody>
            <?php

            $ID = $_SESSION['ID'];

            $conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));


            $queryListA = mysqli_query($conn3, "SELECT * FROM  usuarios where activo = 1  and rol <> 2 and ID_principal = $ID_principal");

            $nrowl = mysqli_num_rows($queryListA);

            while ($row_recordset32A = mysqli_fetch_array($queryListA)) {
              $id = $row_recordset32A['ID'];
              $usu = $row_recordset32A['USUARIO'];
              $CLAVE = $row_recordset32A['PASS'];

              $email = $row_recordset32A['email'];
              $nombre = $row_recordset32A['NOMBRE_USUARIO'];
              //$especialidad = $row_recordset32A['especialidad'];
              $especialidad = funcionMaster($row_recordset32A['especialidad'], 'id', 'descripcion', 'c_categoria');
              if ($especialidad == "" or NULL) {
                $especialidad = $row_recordset32A['especialidad'];
              }
              $correo = $row_recordset32A['correo'];
              $perfil = $row_recordset32A['TIPO'];
              $tel = $row_recordset32A['telefono'];

              echo '      
                      <tr>
                      <td> ' . $usu . '</td>
                      <td> ' . $CLAVE . '</td>
                      <td> ' . $nombre . '</td>
                      <td> ' . $especialidad . '</td>
                      <td> ' . $correo . '</td>
                      <td> ' . $tel . '</td>
                    
                      <td>

                       <a class="btn btn-outline-info rounded-pill btn-block" href="permisosMenuUsuarios.php?idU=' . encrypt($id) . '"><i class="fas fa-pen" title="Editar permisos de Usuarios"></i> Editar</a>
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