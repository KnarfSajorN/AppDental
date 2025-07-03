<?php
include 'header.php';
include 'menu.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Configuración y perfil
    </h1>
    <!-- <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Configuración y perfil</a></li>



      
    </ol> -->
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="">
      <?php

      $usuarioId = $_GET['usuario_id'];
      $usuarioM = $_SESSION['ID'];


      $conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));
      $queryList = mysqli_query($conn3, "SELECT * FROM  usuarios where ID=$usuarioId");
      if ($queryList) {
        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
          $ID = $rowMotorizado['ID'];
          $USUARIO = $rowMotorizado['USUARIO'];
          $PASS = $rowMotorizado['PASS'];
          $NOMBRE_USUARIO = $rowMotorizado['NOMBRE_USUARIO'];
          $fec_ingreso = $rowMotorizado['fec_ingreso'];
          $telefono = $rowMotorizado['telefono'];
          $direccion = $rowMotorizado['direccion'];
          $ciudad = $rowMotorizado['ciudad'];
          $email = $rowMotorizado['correo'];
          $sucursal = $rowMotorizado['sucursal'];
          $empresaNombre = $rowMotorizado['empresaNombre'];



          $TIPO = $rowMotorizado['TIPO'];

          $pais = $rowMotorizado['pais'];

          $numeroFactura = $rowMotorizado['numeroFactura'];
          $nit = $rowMotorizado['nit'];

          $especialidad   = $rowMotorizado['especialidad'];
          // $especialidad = utf8_decode($rowMotorizado['especialidad']);
          $especialidad1   = $rowMotorizado['especialidad1'];
          $especialidad2   = $rowMotorizado['especialidad2'];

          $Nacimiento     = $rowMotorizado['Nacimiento'];
          $perfil = $rowMotorizado['TIPO'];

          if ($perfil == '0') {
            $perfil1 = 'Especialista';
          }
          if ($perfil == '1') {
            $perfil1 = 'Auxiliar';
          }
          if ($perfil == '2') {
            $perfil1 = 'ADMINISTRTADOR';
          }

          $vista = $rowMotorizado['vista'];
          if ($vista == 0) {
            $vista1 = 'Todos los pacientes';
          } else {
            $vista1 = 'Pacientes Registrados por el especialista';
          }

          $menu = $rowMotorizado['menu'];
        }
      }



      $queryList = mysqli_query($conn3, "SELECT * FROM  config where   ID_Usuario=$usuarioId");
      if ($queryList) {
        while ($rowMotorizado = mysqli_fetch_array($queryList)) {

          $nombreF = $rowMotorizado['nombreF'];
          $telefonoF = $rowMotorizado['telefonoF'];
          $direccionF = $rowMotorizado['direccionF'];
          $emailF = $rowMotorizado['emailF'];
          $ciudadPaisF = $rowMotorizado['ciudadPaisF'];
          $licenciaF = $rowMotorizado['licenciaF'];
          $impuestoF = $rowMotorizado['impuestoF'];
          $pieF = $rowMotorizado['pieF'];
          $logoF = $rowMotorizado['logoF'];
          $moneda = $rowMotorizado['moneda'];
          $registroAuxiliar = $rowMotorizado['registroAuxiliar'];
          $cuposHora = $rowMotorizado['cuposHora'];
          if ($cuposHora == '') {
            $cuposHora = 0;
          }

          $tiempoConsulta = $rowMotorizado['tiempoConsulta'];
          $cantidadPacientes = $rowMotorizado['cantidadPacientes'];

          $lt = $rowMotorizado['lt'];
          $mt = $rowMotorizado['mt'];
          $et = $rowMotorizado['et'];
          $jt = $rowMotorizado['jt'];
          $vt = $rowMotorizado['vt'];
          $st = $rowMotorizado['st'];
          $dt = $rowMotorizado['dt'];



          $sul = $rowMotorizado['sul'];
          $sum = $rowMotorizado['sum'];
          $sue = $rowMotorizado['sue'];
          $suj = $rowMotorizado['suj'];
          $suv = $rowMotorizado['suv'];
          $sus = $rowMotorizado['sus'];
          $sud = $rowMotorizado['sud'];


          $sul2 = $rowMotorizado['sul2'];
          $sum2 = $rowMotorizado['sum2'];
          $sue2 = $rowMotorizado['sue2'];
          $suj2 = $rowMotorizado['suj2'];
          $suv2 = $rowMotorizado['suv2'];
          $sus2 = $rowMotorizado['sus2'];
          $sud2 = $rowMotorizado['sud2'];




          $ld = $rowMotorizado['ld'];
          $md = $rowMotorizado['md'];
          $ed = $rowMotorizado['ed'];
          $jd = $rowMotorizado['jd'];
          $vd = $rowMotorizado['vd'];
          $sd = $rowMotorizado['sd'];
          $dd = $rowMotorizado['dd'];

          $lh = $rowMotorizado['lh'];
          $mh = $rowMotorizado['mh'];
          $eh = $rowMotorizado['eh'];
          $jh = $rowMotorizado['jh'];
          $vh = $rowMotorizado['vh'];
          $sh = $rowMotorizado['sh'];
          $dh = $rowMotorizado['dh'];


          $ldp = $rowMotorizado['ldp'];
          $mdp = $rowMotorizado['mdp'];
          $edp = $rowMotorizado['edp'];
          $jdp = $rowMotorizado['jdp'];
          $vdp = $rowMotorizado['vdp'];
          $sdp = $rowMotorizado['sdp'];
          $ddp = $rowMotorizado['ddp'];

          $lhp = $rowMotorizado['lhp'];
          $mhp = $rowMotorizado['mhp'];
          $ehp = $rowMotorizado['ehp'];
          $jhp = $rowMotorizado['jhp'];
          $vhp = $rowMotorizado['vhp'];
          $shp = $rowMotorizado['shp'];
          $dhp = $rowMotorizado['dhp'];

          $cie10 = $rowMotorizado['cie10'];
          $pro1 = $rowMotorizado['pro1'];
          $pro2 = $rowMotorizado['pro2'];

          $header = $rowMotorizado['header'];
          $whatsapp = $rowMotorizado['whatsapp'];
          $firmaE = $rowMotorizado['firma'];
          $lugar = $rowMotorizado['sucursal'];
          $grupo1 = $rowMotorizado['grupo1'];
          $grupo2 = $rowMotorizado['grupo2'];
          $grupo3 = $rowMotorizado['grupo3'];
          $pacientes = $rowMotorizado['pacientes'];


          $queryListC = mysqli_query($conn3, "SELECT * FROM  gruposAtencion where ID=$grupo1");

          if ($queryListC) {
            while ($rowC = mysqli_fetch_array($queryListC)) {


              $nombre1   = $rowC['nombre'];
            }
          }



          $queryListC = mysqli_query($conn3, "SELECT * FROM  gruposAtencion where ID=$grupo2 ");

          if ($queryListC) {
            while ($rowC = mysqli_fetch_array($queryListC)) {


              $nombre2   = $rowC['nombre'];
            }
          }


          $queryListC = mysqli_query($conn3, "SELECT * FROM  gruposAtencion where ID=$grupo3");

          if ($queryListC) {
            while ($rowC = mysqli_fetch_array($queryListC)) {


              $nombre3   = $rowC['nombre'];
            }
          }
        }
      }


      ?>






      <div class="card-body">
        <div class="form-row">
          <h4 class="card-title"> </h4>
          <h6 class="card-subtitle mb-2 text-muted"></h6>


          <div class="col-md-6">
          </div>

          <div class="col-md-6">
          </div>


        </div>

        <div class="col-md-12">
          <div class="card">

            <div class="card-header">
              <ul class="nav nav-tabs">
                <li class="nav-item active"><a class="nav-link" href="#Consultas" data-toggle="tab">Información de Perfil</a></li>
                <li class="nav-item"><a class="nav-link" href="#Examenes" data-toggle="tab">Información
                    de Facturación y configuración</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="#Consultas3" data-toggle="tab">Logo</a>
                </li>

                <?php if ($TIPO <> 2) : ?>
                  <li class="nav-item"><a class="nav-link" href="#Consultas4" data-toggle="tab">Firma</a>
                  </li>
                <?php endif ?>

                <?php if ($_SESSION['ID'] == 1 and $TIPO <> 2) : ?>
                  <li class="nav-item"><a class="nav-link" href="#Consultas5" data-toggle="tab">Dias No
                      laborales</a></li>
                  <li class="nav-item"><a class="nav-link" href="#Consultas2" data-toggle="tab">Generar
                      Respaldo de la base de datos</a></li>
                  <li class="nav-item"><a class="nav-link" href="#listas" data-toggle="tab">Listas</a>
                  </li>
                <?php endif ?>
              </ul>
            </div>
            <div class="card-body">
              <div class="tab-content">
                <div class="active tab-pane" id="Consultas">

                  <div class="form-row">
                    <form action="perfilG.php" method="POST">


                      <table class="tg" style="undefined;table-layout: fixed; width: 100%">
                        <colgroup>
                          <col style="width: 48%">
                          <col style="width: 2%">
                          <col style="width: 48%">
                        </colgroup>
                        <tr>
                          <th>
                            <div align="left"> Usuario </div>
                            <input type="text" class="form-control input-lg" id="nombre_cliente" name="nombre_cliente" value="<?php echo $USUARIO ?>">
                            <input type="hidden" class="form-control input-lg" name="usuarioId" value="<?php echo $ID ?>">
                            <input type="hidden" class="form-control input-lg" name="form1" value="1">
                          </th>
                          <th>

                          </th>
                          <th>
                            <div align="left"> Contraseña </div>
                            <input type="password" class="form-control input-lg" name="PASS" value="<?php echo $PASS ?>" required>
                          </th>
                        </tr>

                        <tr>
                          <th>
                            <div align="left"> Nombre Completo </div>
                            <input type="text" class="form-control input-lg" name="NOMBRE_USUARIO" value="<?php echo $NOMBRE_USUARIO ?>" required>
                          </th>
                          <th>

                          </th>
                          <th>
                            <div align="left"> Teléfono </div>
                            <input type="text" class="form-control input-lg" name="telefono" value="<?php echo $telefono ?>">
                          </th>
                        </tr>

                        <tr>
                          <th>
                            <div align="left"> Dirección </div>
                            <input type="text" class="form-control input-lg" name="direccion" value="<?php echo $direccion ?>">
                          </th>
                          <th>

                          </th>
                          <th>
                            <div align="left"> Ciudad </div>
                            <input type="text" class="form-control input-lg" name="ciudad" value="<?php echo $ciudad ?>">
                          </th>
                        </tr>
                        </tr>
                        <th>
                            <div align="left"> % comisión   </div>
                            <input type="nummber" class="form-control input-lg" name="ciudad" value="">
                          </th>
                        <tr>
                          <th>
                            <div align="left"> Email </div>
                            <input type="text" class="form-control input-lg" name="email" value="<?php echo $email ?>">
                          </th>

                        </tr>
                        <!-- 

 <tr>
    <th>
         
   <div align="left">  Especialidad </div>
           <select id="categoria" name="especialidad1" class="form-control select2" data-placeholder="Seleccione especialidades" style="width: 100%;" >
            <option value="<?php echo $especialidad1 ?>"> <?php echo categoria($especialidad1) ?>  </option>
            <?php categoriaselect() ?>
          </select>
    </th>
    <th>

    </th>
    <th>
         
   <div align="left">  Especialidad 2</div>
           <select id="categoria" name="especialidad2" class="form-control select2" data-placeholder="Seleccione especialidades" style="width: 100%;">
            <option value="<?php echo $especialidad2 ?>"> <?php echo categoria($especialidad2) ?>  </option>
            <?php categoriaselect() ?>
          </select>
    </th>
  </tr>
 -->








                      </table>
                      <hr>

                      <table class="tg" style="undefined;table-layout: fixed; width: 100%">
                        <colgroup>
                          <col style="width: 48%">
                          <col style="width: 2%">
                          <col style="width: 48%">
                        </colgroup>
                        <tr>
                          <th>
                            <div align="left"> Nombre de la empresa (si aplica) </div>
                            <input type="text" class="form-control input-lg" name="empresaNombre" value="<?php echo $empresaNombre ?>">
                          </th>
                          <th>

                          </th>
                          <th>



                            <?php if ($TIPO <> 2) : ?>


                              <div class="form-group col-md-12">
                                Especialidad

                                <select name="especialidad" class="form-control select2"
                                                            data-placeholder="Seleccione especialidades"
                                                            style="width: 100%;"="">
                                                            <option value="<?php echo $especialidad1 ?>">
                                                                <?php echo categoria($especialidad1) ?>
                                                            </option>
                                                            <?php categoriaselect() ?>
                                                        </select>
                                <!-- <select class="form-control input-lg" name="especialidad">
                                  <option value="
                                  <?php echo $especialidad ?>" select>
                                    <?php echo $especialidad ?></option>

                                  <option value="Medicina general">Medicina general
                                  </option>
                                  <option value="Medicina familiar">Medicina familiar
                                  </option>
                                  <option value="Medico internista">Médico internista
                                  </option>
                                  <option value="Medicina alternativa">Medicina
                                    alternativa
                                  </option>
                                  <option value="Clínicas IPS">Clínicas /IPS</option>
                                  <option value="Centro de vacunación">Centro de
                                    vacunación
                                  </option>
                                  <option value="Pediatría">Pediatría</option>
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
                                  <option value="Servicios de ambulancias">Servicios de
                                    ambulancias</option>
                                  <option value="Medicina estética">Medicina estética
                                  </option>
                                  <option value="Podólogo">Podólogo</option>
                                  <option value="Odontología">Odontología</option>
                                  <option value="Ortodoncia">Ortodoncia</option>
                                  <option value="Psicólogo">Psicólogo</option>
                                  <option value="Anestesiólogo">Anestesiólogo</option>
                                  <option value="Asociación médica">Asociación médica
                                  </option>
                                  <option value="Audiólogo">Audiólogo</option>
                                  <option value="Banco de sangre">Banco de sangre</option>
                                  <option value="Cardiólogo">Cardiólogo</option> 
                                  <option value="Centro de rehabilitación">Centro de
                                    rehabilitación</option>
                                  <option value="Centros médicos">Centros médicos</option>
                                  <option value="Cirugía endoscópica">Cirugía endoscópica
                                  </option>
                                  <option value="Cirugía laparoscópica">Cirugía
                                    laparoscópica
                                  </option>
                                  <option value="Cirujano bariátrico">Cirujano bariátrico
                                  </option>
                                  <option value="Cirujano cabeza y cuello">Cirujano cabeza
                                    y
                                    cuello</option>
                                  <option value="Cirujano cardiovascular">Cirujano
                                    cardiovascular</option>
                                  <option value="Cirujano de seno y tejido blandos">
                                    Cirujano
                                    de seno y tejido blandos</option>
                                  <option value="Cirujano de tórax">Cirujano de tórax
                                  </option>
                                  <option value="Cirujano gastrointestinal">Cirujano
                                    gastrointestinal</option>
                                  <option value="Cirujano general">Cirujano general
                                  </option>
                                  <option value="Cirujano maxilofacial">Cirujano
                                    maxilofacial
                                  </option>
                                  <option value="Cirujano oncólogo">Cirujano oncólogo
                                  </option>
                                  <option value="Cirujano pediátrico">Cirujano pediátrico
                                  </option>
                                  <option value="Cirujano plástico">Cirujano plástico
                                  </option>
                                  <option value="Cirujano vascular">Cirujano vascular
                                  </option>
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
                                  <option value="Gastroenterólogo">Gastroenterólogo
                                  </option>
                                  <option value="Genetista">Genetista</option>
                                  <option value="Geriatra">Geriatra</option>
                                  <option value="Hematólogo">Hematólogo</option>
                                  <option value="Hepatólogo">Hepatólogo</option>
                                  <option value="Hospital">Hospital</option>
                                  <option value="Infectólogo">Infectólogo</option>
                                  <option value="Inmunólogo">Inmunólogo</option>
                                  <option value="Internista">Internista</option>
                                  <option value="Laboratorio clínico">Laboratorio clínico
                                  </option>
                                  <option value="Laboratorio farmacéutico">Laboratorio
                                    farmacéutico</option>
                                  <option value="Médico alternativo">Médico alternativo
                                  </option>
                                  <option value="Médico biológico">Médico biológico
                                  </option>
                                  <option value="Médico general">Médico general</option>
                                  <option value="Mastólogo">Mastólogo</option>
                                  <option value="Medicina deportiva">Medicina deportiva
                                  </option>


                                </select> -->
                              <?php endif ?>



                              </div>
                          </th>
                        </tr>


                        <tr>
                          <th>
                            <div align="left"> Cedula o ID </div>
                            <input type="text" class="form-control input-lg" name="nit" value="<?php echo $nit ?>" pattern="[A-Za-z0-9_-]{1,15}" id="txtRut" />

                            <div id="div-results"></div>
                          </th>
                          <th>

                          </th>
                          <th>
                            <div align="left"> Siguiente numero de factura </div>
                            <input type="text" class="form-control input-lg" name="numeroFactura" value="<?php echo $numeroFactura ?>">
                          </th>

                        </tr>

                        <tr>
                          <th>
                            <div align="left"> Perfil </div>



                            <?php if ($TIPO <> 2) : ?>

                              <select class="form-control input-lg" name="perfil">
                                <option value="<?php echo $perfil ?>" select>
                                  <?php echo $perfil1 ?></option>

                                <option value="0">0-Especialista </option>
                                <option value="1">1-Auxiliar</option>

                              </select>

                            <?php endif ?>
                            <?php if ($TIPO  == 2) : ?>

                              <select class="form-control input-lg" name="perfil">
                                <option value="<?php echo $perfil ?>" select>
                                  <?php echo $perfil1 ?></option>


                                <option value="2">Administrador</option>
                                <option value="1">1-Auxiliar</option>

                              </select>

                            <?php endif ?>






                            <div></div>
                          </th>
                          <th>

                          </th>
                          <th>
                            <?php if ($TIPO <> 2) : ?>

                              <div align="left"> Vista de pacientes </div>
                              <select class="form-control input-lg" name="vista">
                                <option value="<?php echo $vista ?>" select>
                                  <?php echo $vista1 ?></option>
                                <option value="0" select>Ver todos los pacientes </option>
                                <option value="1">Ver solo paceintes registrados por el
                                  especialista</option>
                              </select>
                            <?php endif ?>
                            <?php if ($TIPO  == 2) : ?>


                              <input type="hidden" class="form-control input-lg" name="vista" value="<?php echo $vista ?>">


                            <?php endif ?>







                          </th>

                        </tr>
                        <tr>
                          <th>
                            <div align="left"> Sucursal </div>
                            <select class="form-control input-lg" name="sucursal">
                              <?php if ($sucursal != '') { ?>
                                <option value="<?= $sucursal ?>">
                                  <?= funcionMaster($sucursal, 'id', 'descripcion', 'sucursales') ?>
                                </option>
                              <?php } else { ?>
                                <option value="">Seleccione...</option>
                              <?php } ?>

                              <?php
                              $queryList = mysqli_query($conn3, "SELECT * FROM sucursales ");
                              while ($RowSucursales = mysqli_fetch_array($queryList)) {
                                $id = $RowSucursales['id'];
                                $descripcion = $RowSucursales['descripcion'];

                                echo "<option value='$id'> $descripcion </option>";
                              }

                              ?>
                              <option value="0">Ninguna</option>



                            </select>
                  </div>
                  </th>
                  <th></th>
                  <th>
                    <div class="">Grupo / menú
                      <select class="form-control input-lg" name="menu">
                        <?php
                        $query = "SELECT * from grupos where estado = 1";
                        $result = mysqli_query($conn3, $query);
                        while ($row = mysqli_fetch_array($result)) {
                          if ($menu == $row['id']) {
                            echo '<option value="' . $row['id'] . '" selected>' . $row['nombre'] . '</option>';
                          } else {
                            echo '<option value="' . $row['id'] . '">' . $row['nombre'] . '</option>';
                          }
                        }
                        ?>
                      </select>
                    </div>

                  </th>
                  </tr>



                  <tr>
                    <th>



                    </th>
                    <th>

                    </th>
                    <th>




                    </th>
                  </tr>



                  <?php if ($_SESSION['ID'] == 1) : ?>
                    <tr>
                      <th>
                        <!--         
  <a href="sucursales"  class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">  <h4>  Sucursales </h4> </a>  --

    </th>
    <th>

    </th>
    <th>
                  -->
                        <!--
 <a href="usuarios"  class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">  <h4>  Usuarios </h4> </a>
 <a href="registrocatalogo"  class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">  <h4>  Administrar anuncios </h4> </a>

-->



                      </th>
                    </tr>

                  <?php endif ?>






                  </table>

                  <br>

                  <div class="box-footer">
                    <button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                      <h4> Actualizar </h4>
                    </button>

                  </div>

                  </form>

                </div>



              </div>

              <!-- /.tab-pane -->



              <div class="tab-pane" id="Examenes">
                <div class="form-row">
                  <div align="center"> <strong>
                      <font color="red">Para usar el módulo de facturas debe de configurar los
                        datos
                        básicos para el formato de factura los datos básicos están marcados **
                      </font>
                    </strong> </div>

                  <form action="perfilG.php" method="POST" enctype="multipart/form-data">


                    <table class="tg" style="undefined;table-layout: fixed; width: 100%">
                      <colgroup>
                        <col style="width: 48%">
                        <col style="width: 2%">
                        <col style="width: 48%">
                      </colgroup>
                      <tr>
                        <th>
                          <div align="left">
                            <font color="red">**</font> Nombre que saldrá en la factura (Ej.
                            Empresa modelo sas)
                          </div>
                          <input type="text" class="form-control input-lg" name="nombreF" value="<?php echo $nombreF ?>">
                          <input type="hidden" class="form-control input-lg" name="usuarioId" value="<?php echo $ID ?>">
                          <input type="hidden" class="form-control input-lg" name="form2" value="1">


                        </th>
                        <th>

                        </th>
                        <th>
                          <div align="left">
                            <font color="red">**</font> Teléfono
                          </div>
                          <input type="text" class="form-control input-lg" name="telefonoF" value="<?php echo $telefonoF ?>">
                        </th>
                      </tr>

                      <tr>
                        <th>
                          <div align="left">
                            <font color="red">**</font> Dirección
                          </div>
                          <input type="text" class="form-control input-lg" name="direccionF" value="<?php echo $direccionF ?>">
                        </th>
                        <th>

                        </th>
                        <th>
                          <div align="left"> Email </div>
                          <input type="text" class="form-control input-lg" name="emailF" value="<?php echo $emailF ?>">
                        </th>
                      </tr>

                      <tr>
                        <th>
                          <div align="left"> País – ciudad </div>
                          <input type="text" class="form-control input-lg" name="ciudadPaisF" value="<?php echo $ciudadPaisF ?>">
                        </th>
                        <th>

                        </th>
                        <th>
                          <div align="left">Licencia medica (Esta información se verá
                            reflejado en
                            el pie de página) </div>
                          <input type="text" class="form-control input-lg" name="licenciaF" value="<?php echo $licenciaF ?>">
                        </th>
                      </tr>
                      <tr>
                        <th>
                          <div align="left">
                            <font color="red">**</font> Impuesto (si no cobra impuesto solo
                            dejarlo en 0)
                          </div>
                          <input type="text" class="form-control input-lg" name="impuestoF" value="<?php echo $impuestoF ?>" required>
                        </th>
                        <th>

                        </th>
                        <th>


                          <div align="left">
                            <font color="red">**</font> Moneda
                          </div>

                          <select name="moneda" class="form-control select2" style="width: 100%;">
                            <?php

                            $conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));



                            $queryList = mysqli_query($conn3, "SELECT * FROM  Moneda");
                            $nrowl = mysqli_num_rows($queryList);
                            while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                              $Moneda = $rowMotorizado['Moneda'];

                              $Moneda   = $rowMotorizado['Moneda'];
                              $Simbolo  = $rowMotorizado['Simbolo'];
                              $Nombre   = $rowMotorizado['Nombre'];


                              if ($moneda == $Simbolo) {
                                $select = "selected='selected'";
                              } else {
                                $select = " ";
                              }
                              echo "<option $select value='$Simbolo'> $Moneda  - $Nombre </option>";
                            }


                            ?>

                          </select>



                        </th>
                      </tr>


                      <tr>
                        <th>
                          <div align="left"> Tiempo promedio por cada consulta, si desea
                            tiempo
                            abierto solo dejar en 0 (minutos)</div>

                          <select name="tiempoConsulta" class="form-control select2" style="width: 100%;">
                            <option $select value='<?php echo $tiempoConsulta ?>'>
                              <?php echo $tiempoConsulta ?> </option>
                            <option value='0'> 0 </option>
                            <option value='15'> 15 </option>
                            <option value='20'> 20 </option>
                            <option value='30'> 30 </option>

                          </select>

                        </th>
                        <th>

                        </th>
                        <th>
                          <div align="left"> Cantidad de pacientes máximos por día. (Solo para
                            uso
                            de referencia en agenda) </div>
                          <input type="number" max="99" min="1" class="form-control input-lg" name="cantidadPacientes" value="<?php echo $cantidadPacientes ?>">
                        </th>
                      </tr>

                      <tr>
                        <th>
                          <div align="left"> Lugar de trabajo </div>

                          <input type="text" name="lugar" class="form-control input-lg" maxlength="100" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" value="<?php echo $lugar ?>">




                        </th>
                        <th>

                        </th>
                        <th>
                          <div align="left"> Asociar grupo de atención médica 1 </div>
                          <select name="grupo1" id="grupo1" class="form-control select2" style="width: 100%;">

                            <option value="<?php echo $grupo1 ?>" select>
                              <?php echo $nombre1 ?>
                            </option>
                            <option value="0" select>Ninguno</option>
                            <?php
                            $conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));

                            $queryListC = mysqli_query($conn3, "SELECT * FROM  gruposAtencion ");

                            $nrowlC = mysqli_num_rows($queryListC);
                            while ($rowC = mysqli_fetch_array($queryListC)) {

                              $id   = $rowC['ID'];
                              $nombre   = $rowC['nombre'];

                              echo "<option value='$id'> $nombre </option>";
                            } ?>
                          </select>




                        </th>

                      </tr>


                      <tr>
                        <th>
                          <div align="left"> Asociar grupo de atención médica 2 </div>
                          <select name="grupo2" id="grupo12" class="form-control select2" style="width: 100%;">

                            <option value="<?php echo $grupo2 ?>" select>
                              <?php echo $nombre2 ?>
                            </option>
                            <option value="0" select>Ninguno</option>
                            <?php
                            $conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));

                            $queryListC = mysqli_query($conn3, "SELECT * FROM  gruposAtencion ");

                            $nrowlC = mysqli_num_rows($queryListC);
                            while ($rowC = mysqli_fetch_array($queryListC)) {

                              $id   = $rowC['ID'];
                              $nombre   = $rowC['nombre'];

                              echo "<option value='$id'> $nombre </option>";
                            } ?>
                          </select>



                        </th>
                        <th>

                        </th>
                        <th>
                          <div align="left"> Asociar grupo de atención médica 3 </div>
                          <select name="grupo3" id="grupo3" class="form-control select2" style="width: 100%;">

                            <option value="<?php echo $grupo3 ?>" select>
                              <?php echo $nombre3 ?>
                            </option>
                            <option value="0" select>Ninguno</option>
                            <?php
                            $conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));

                            $queryListC = mysqli_query($conn3, "SELECT * FROM  gruposAtencion ");

                            $nrowlC = mysqli_num_rows($queryListC);
                            while ($rowC = mysqli_fetch_array($queryListC)) {

                              $id   = $rowC['ID'];
                              $nombre   = $rowC['nombre'];

                              echo "<option value='$id'> $nombre </option>";
                            } ?>
                          </select>




                        </th>

                      </tr>

                      <tr>
                        <th>
                          <div align="left"> Numero de whapsapp para recibir sus
                            notificaciones
                          </div>
                          <input type="number" class="form-control input-lg" name="whatsapp" placeholder="+57123456789" value="<?php echo $whatsapp ?>">

                        </th>
                        <th>

                        </th>
                        <th>
                          <div align="left"> Cantidad de pacientes por oportunidad de cita
                          </div>
                          <input type="number" class="form-control input-lg" name="pacientes" value="<?php echo $pacientes ?>">
                        </th>
                      </tr>

                      <tr>
                        <th>
                          <div align="left"> Registro Auxiliar </div>
                          <input type="text" class="form-control input-lg" name="registroAuxiliar" value="<?php echo $registroAuxiliar ?>">
                        </th>
                        <th>

                        </th>
                        <th>
                          <div align="left"> Cupos por Hora(Calendario Directorio Medico)
                            <span class="text-danger text-bold"> 0 = Desactivado</span>
                          </div>
                          <input type="number" class="form-control input-lg" name="cuposHora" value="<?php echo $cuposHora ?>">
                        </th>
                      </tr>



                    </table>

                    <div align="left"> Información para el Encabezado </div>

                    <textarea id="header" name="header" class="textarea" placeholder="Información que se vera en el Encabezado " style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required><?php echo $header ?></textarea>

                    <div align="left"> Información para el pie de pagina </div>

                    <textarea id="pieF" name="pieF" class="textarea" placeholder="Información que se vera en el pie de pagina" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required><?php echo $pieF ?></textarea>


                    <hr>
                    <h4>
                      <div align="center"> Configurar horario disponible </div>
                    </h4>
                    <hr>
                    <?php include "Horario_Sistema.php"; ?>

                    <!-- <table border="1" class="tg" style="undefined;table-layout: fixed; width: 100%">

                      <tr>
                        <th>
                          Día de la semana
                        </th>
                        <th>
                          Trabaja
                        </th>
                        <th>
                          Sede primer turno
                        </th>
                        <th>
                          Desde AM
                        </th>
                        <th>
                          Hasta AM
                        </th>
                        <th>
                          Sede segundo turno
                        </th>
                        <th>
                          Desde PM
                        </th>
                        <th>
                          Hasta PM
                        </th>

                      </tr>



                      <tr>
                        <th>
                          Lunes

                        </th>

                        <th>
                          <?php
                          if ($lt == '1') {
                          ?>
                            <input value="1" type="radio" name="lt" id="lt" checked="true" /> SI
                            <input value="0" type="radio" name="lt" id="lt" /> NO
                          <?php
                          } elseif ($lt == '0') {
                          ?>
                            <input value="1" type="radio" name="lt" id="lt" /> SI
                            <input value="0" type="radio" name="lt" id="lt" checked="true" /> NO
                          <?php } ?>
                        </th>



                        <th>
                          <input type="text" class="form-control input-lg" name="sul" value="<?php echo $sul ?>">
                        </th>



                        <th>
                          <input type="time" class="form-control input-lg" name="ld" id="ld" value="<?php echo $ld ?>">
                        </th>
                        <th>
                          <input type="time" class="form-control input-lg" name="lh" id="lh" value="<?php echo $lh ?>">
                        </th>

                        <th>
                          <input type="text" class="form-control input-lg" name="sul2" value="<?php echo $sul2 ?>">
                        </th>


                        <th>
                          <input type="time" class="form-control input-lg" name="ldp" id="ldp" value="<?php echo $ldp ?>">
                        </th>
                        <th>
                          <input type="time" class="form-control input-lg" name="lhp" id="lhp" value="<?php echo $lhp ?>">
                        </th>
                      </tr>


                      <tr>
                        <th>
                          Martes

                        </th>
                        <th>
                          <?php
                          if ($mt == '1') {
                          ?>
                            <input value="1" type="radio" name="mt" id="mt" checked="true" /> SI
                            <input value="0" type="radio" name="mt" id="mt" /> NO
                          <?php
                          } elseif ($mt == '0') {
                          ?>
                            <input value="1" type="radio" name="mt" id="mt" /> SI
                            <input value="0" type="radio" name="mt" id="mt" checked="true" /> NO


                          <?php } ?>


                        </th>


                        <th>
                          <input type="text" class="form-control input-lg" name="sum" value="<?php echo $sum ?>">
                        </th>


                        <th>

                          <input type="time" class="form-control input-lg" name="md" id="md" value="<?php echo $md ?>">
                        </th>
                        <th>
                          <input type="time" class="form-control input-lg" name="mh" id="mh" value="<?php echo $mh ?>">
                        </th>
                        <th>
                          <input type="text" class="form-control input-lg" name="sum2" value="<?php echo $sum2 ?>">
                        </th>

                        <th>
                          <input type="time" class="form-control input-lg" name="mdp" id="mdp" value="<?php echo $mdp ?>">
                        </th>
                        <th>
                          <input type="time" class="form-control input-lg" name="mhp" id="mhp" value="<?php echo $mhp ?>">
                        </th>


                      </tr>



                      <tr>
                        <th>
                          Miercoles

                        </th>
                        <th>
                          <?php
                          if ($et == '1') {
                          ?>
                            <input value="1" type="radio" name="et" id="et" checked="true" /> SI
                            <input value="0" type="radio" name="et" id="et" /> NO
                          <?php
                          } elseif ($et == '0') {
                          ?>
                            <input value="1" type="radio" name="et" id="et" /> SI
                            <input value="0" type="radio" name="et" id="et" checked="true" /> NO


                          <?php } ?>


                        </th>



                        <th>
                          <input type="text" class="form-control input-lg" name="sue" value="<?php echo $sue ?>">
                        </th>



                        <th>

                          <input type="time" class="form-control input-lg" name="ed" id="ed" value="<?php echo $ed ?>">
                        </th>
                        <th>
                          <input type="time" class="form-control input-lg" name="eh" id="eh" value="<?php echo $eh ?>">
                        </th>
                        <th>
                          <input type="text" class="form-control input-lg" name="sue2" value="<?php echo $sue2 ?>">
                        </th>


                        <th>
                          <input type="time" class="form-control input-lg" name="edp" id="edp" value="<?php echo $edp ?>">
                        </th>
                        <th>
                          <input type="time" class="form-control input-lg" name="ehp" id="ehp" value="<?php echo $ehp ?>">
                        </th>

                      </tr>




                      <tr>
                        <th>
                          Jueves

                        </th>
                        <th>
                          <?php
                          if ($jt == '1') {
                          ?>
                            <input value="1" type="radio" name="jt" id="jt" checked="true" /> SI
                            <input value="0" type="radio" name="jt" id="jt" /> NO
                          <?php
                          } elseif ($jt == '0') {
                          ?>
                            <input value="1" type="radio" name="jt" id="jt" /> SI
                            <input value="0" type="radio" name="jt" id="jt" checked="true" /> NO


                          <?php } ?>


                        </th>



                        <th>
                          <input type="text" class="form-control input-lg" name="suj" value="<?php echo $suj ?>">
                        </th>



                        <th>

                          <input type="time" class="form-control input-lg" name="jd" id="jd" value="<?php echo $jd ?>">
                        </th>
                        <th>
                          <input type="time" class="form-control input-lg" name="jh" id="jh" value="<?php echo $jh ?>">
                        </th>

                        <th>
                          <input type="text" class="form-control input-lg" name="suj2" value="<?php echo $suj2 ?>">
                        </th>

                        <th>
                          <input type="time" class="form-control input-lg" name="jdp" id="jdp" value="<?php echo $jdp ?>">
                        </th>
                        <th>
                          <input type="time" class="form-control input-lg" name="jhp" id="jhp" value="<?php echo $jhp ?>">
                        </th>

                      </tr>




                      <tr>
                        <th>
                          Viernes

                        </th>
                        <th>
                          <?php
                          if ($vt == '1') {
                          ?>
                            <input value="1" type="radio" name="vt" id="vt" checked="true" /> SI
                            <input value="0" type="radio" name="vt" id="vt" /> NO
                          <?php
                          } elseif ($vt == '0') {
                          ?>
                            <input value="1" type="radio" name="vt" id="vt" /> SI
                            <input value="0" type="radio" name="vt" id="vt" checked="true" /> NO


                          <?php } ?>


                        </th>



                        <th>
                          <input type="text" class="form-control input-lg" name="suv" value="<?php echo $suv ?>">
                        </th>



                        <th>

                          <input type="time" class="form-control input-lg" name="vd" id="vd" value="<?php echo $vd ?>">
                        </th>
                        <th>
                          <input type="time" class="form-control input-lg" name="vh" id="vh" value="<?php echo $vh ?>">
                        </th>
                        <th>
                          <input type="text" class="form-control input-lg" name="suv2" value="<?php echo $suv2 ?>">
                        </th>


                        <th>
                          <input type="time" class="form-control input-lg" name="vdp" id="vdp" value="<?php echo $vdp ?>">
                        </th>
                        <th>
                          <input type="time" class="form-control input-lg" name="vhp" id="vhp" value="<?php echo $vhp ?>">
                        </th>

                      </tr>



                      <tr>
                        <th>
                          Sábado

                        </th>
                        <th>
                          <?php
                          if ($st == '1') {
                          ?>
                            <input value="1" type="radio" name="st" id="st" checked="true" /> SI
                            <input value="0" type="radio" name="st" id="st" /> NO
                          <?php
                          } elseif ($st == '0') {
                          ?>
                            <input value="1" type="radio" name="st" id="st" /> SI
                            <input value="0" type="radio" name="st" id="st" checked="true" /> NO


                          <?php } ?>


                        </th>




                        <th>
                          <input type="text" class="form-control input-lg" name="sus" value="<?php echo $sus ?>">
                        </th>




                        <th>

                          <input type="time" class="form-control input-lg" name="sd" id="sd" value="<?php echo $sd ?>">
                        </th>
                        <th>
                          <input type="time" class="form-control input-lg" name="sh" id="sh" value="<?php echo $sh ?>">
                        </th>

                        <th>
                          <input type="text" class="form-control input-lg" name="sus2" value="<?php echo $sus2 ?>">
                        </th>

                        <th>
                          <input type="time" class="form-control input-lg" name="sdp" id="sdp" value="<?php echo $sdp ?>">
                        </th>
                        <th>
                          <input type="time" class="form-control input-lg" name="shp" id="shp" value="<?php echo $shp ?>">
                        </th>

                      </tr>



                      <tr>
                        <th>
                          Domingo

                        </th>
                        <th>
                          <?php
                          if ($dt == '1') {
                          ?>
                            <input value="1" type="radio" name="dt" id="dt" checked="true" /> SI
                            <input value="0" type="radio" name="dt" id="dt" /> NO
                          <?php
                          } elseif ($dt == '0') {
                          ?>
                            <input value="1" type="radio" name="dt" id="dt" /> SI
                            <input value="0" type="radio" name="dt" id="dt" checked="true" /> NO


                          <?php } ?>


                        </th>



                        <th>
                          <input type="text" class="form-control input-lg" name="sud" value="<?php echo $sud ?>">
                        </th>



                        <th>

                          <input type="time" class="form-control input-lg" name="dd" id="dd" value="<?php echo $dd ?>">
                        </th>
                        <th>
                          <input type="time" class="form-control input-lg" name="dh" id="dh" value="<?php echo $dh ?>">
                        </th>


                        <th>
                          <input type="text" class="form-control input-lg" name="sud2" value="<?php echo $sud2 ?>">
                        </th>



                        <th>
                          <input type="time" class="form-control input-lg" name="ddp" id="ddp" value="<?php echo $ddp ?>">
                        </th>
                        <th>
                          <input type="time" class="form-control input-lg" name="dhp" id="dhp" value="<?php echo $dhp ?>">
                        </th>

                      </tr>



                    </table> -->





                    <div class="box-footer">
                      <button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" id="registro_usuario" name="registro_usuario">
                        <h4> Actualizar </h4>
                      </button>

                    </div>



                </div>




                </form>






              </div>










              <div class="tab-pane" id="Consultas3">

                <form action="perfilG.php" method="POST" enctype="multipart/form-data">
                  <input type="hidden" class="form-control input-lg" name="usuarioId" value="<?php echo $ID ?>">
                  <input type="hidden" class="form-control input-lg" name="form3" value="1">
                  <div class="form-row">


                    <div align="left">
                      <h3> Logo </h3>
                    </div>
                    <div align="left">
                      <font color="red" size="1"> Tamaño sugerido 500px/500px </font>
                    </div>
                    <input type="file" class="form-control input-lg" name="imagen">

                    <?php
                    // echo strlen($logoF);
                    if (strlen($logoF) > 0) {
                      echo '<img src="' . $Base . '/logos/' . $logoF . '">';
                    } else {
                      echo '';
                    }
                    ?>





                    <button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" id="registro_usuario" name="registro_usuario">
                      <h4> Actualizar </h4>
                    </button>

                  </div>

                </form>

              </div>






              <div class="tab-pane" id="Consultas4">

                <form action="perfilG.php" method="POST" enctype="multipart/form-data">
                  <input type="hidden" class="form-control input-lg" name="usuarioId" value="<?php echo $ID ?>">
                  <input type="hidden" class="form-control input-lg" name="form5" value="1">
                  <div class="form-row">


                    <div align="left">
                      <h3> Firma </h3>
                    </div>
                    <div align="left">
                      <font color="red" size="1"> Tamaño sugerido 200px/200px Imagen fondo
                        totalmente
                        blanco </font>
                    </div>
                    <input type="file" class="form-control input-lg" name="imagen2">

                    <?php
                    // echo strlen($logoF);
                    if (strlen($firmaE) > 0) {
                      echo '<img src="' . $Base . '/FirmasReg/' . $firmaE . '">';
                    } else {

                      echo '<img src="' . $Base . '/FirmasReg/firmabasica.jpg">';
                    }



                    ?>


                    <button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" id="registro_usuario" name="registro_usuario">
                      <h4> Actualizar </h4>
                    </button>

                  </div>

                </form>

              </div>




              <div class="tab-pane" id="Consultas5">

                <form action="perfilG.php" method="POST" enctype="multipart/form-data">
                  <input type="hidden" class="form-control input-lg" name="usuarioId" value="<?php echo $ID ?>">
                  <input type="hidden" class="form-control input-lg" name="usuarioM" value="<?php echo $usuarioM ?>">
                  <input type="hidden" class="form-control input-lg" name="form6" value="1">
                  <div class="form-row">


                    <div align="left">
                      <h3> Registrar Días no Laborables </h3>
                    </div>

                    <div class="form-group col-md-6">


                      Especialista

                      <select id="doctor" name="doctor" class="form-control select2" style="width: 100%;" required="required">
                        <option value="0" selected> Todos lo especialistas</option>
                        <?php
                        usuariosEspecialistasSelect();

                        ?>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      Fecha No laboral
                      <input type="date" name="fechan" class="form-control input-lg">
                    </div>

                    <div class="form-group col-md-12">
                      Nota
                      <input type="text" name="notas" class="form-control input-lg">

                    </div>





                    <button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" id="registro_usuario" name="registro_usuario">
                      <h4> Guardar </h4>
                    </button>

                  </div>

                </form>

              </div>



















              <div class="tab-pane" id="Consultas2">

                <div class="form-row">


                </div>






                <form action="generarrespaldo.php" method="POST">
                  <table class="tg" style="undefined;table-layout: fixed; width: 100%">

                    <tr>
                      <th>

                        <input type="hidden" class="form-control input-lg" id="USUARIO" name="USUARIO" value="<?php echo $USUARIO ?>" disabled>
                        <input type="hidden" class="form-control input-lg" name="usuarioId" value="<?php echo $ID ?>">
                        <input type="hidden" class="form-control input-lg" name="form1" value="1">
                      </th>
                      <th>
                      </th>
                    </tr>
                  </table>
                  <div class="box-footer">
                    <button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                      <h4> Generar respaldo de los pacientes </h4>
                    </button>

                  </div>
                </form>



                <form action="generarrespaldo2.php" method="POST">
                  <table class="tg" style="undefined;table-layout: fixed; width: 100%">

                    <tr>
                      <th>

                        <input type="hidden" class="form-control input-lg" id="USUARIO" name="USUARIO" value="<?php echo $USUARIO ?>" disabled>
                        <input type="hidden" class="form-control input-lg" name="usuarioId" value="<?php echo $ID ?>">
                        <input type="hidden" class="form-control input-lg" name="form1" value="1">
                      </th>
                      <th>
                      </th>
                    </tr>
                  </table>
                  <div class="box-footer">
                    <button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                      <h4> Generar respaldo de todas las historias clínicas </h4>
                    </button>

                  </div>
                </form>



              </div>
















              <div class="tab-pane" id="listas">

                <div class="form-row">


                </div>




                <?php if ($_SESSION['rol'] <> 2 or $_SESSION['rol'] <> 3) : ?>



                  <form action="perfilG.php" method="POST" enctype="multipart/form-data">
                    <table class="tg" style="undefined;table-layout: fixed; width: 100%">


                      <tr>
                        <th>


                          <a href="cie10">
                            <h3> CIE-10 </h3>
                          </a>

                          <?php
                          if ($cie10 == '1') {
                          ?>
                            <input value="1" type="radio" name="cie10" id="cie10" checked="true" />
                            Activa
                            <input value="0" type="radio" name="cie10" id="cie10" /> NO activa
                          <?php
                          } elseif ($cie10 == '0') {
                          ?>
                            <input value="1" type="radio" name="cie10" id="cie10" /> Activa
                            <input value="0" type="radio" name="cie10" id="cie10" checked="true" />
                            NO
                            activa

                          <?php } ?>

                        </th>
                        <th>


                          <a href="lista1">
                            <h3> POS </h3>
                          </a>


                          <?php
                          if ($pro1 == '1') {
                          ?>
                            <input value="1" type="radio" name="pro1" id="pro1" checked="true" />
                            Activa
                            <input value="0" type="radio" name="pro1" id="pro1" /> NO activa
                          <?php
                          } elseif ($pro1 == '0') {
                          ?>
                            <input value="1" type="radio" name="pro1" id="pro1" /> Activa
                            <input value="0" type="radio" name="pro1" id="pro1" checked="true" /> NO
                            activa


                          <?php } ?>




                        </th>
                        <th>


                          <a href="lista2">
                            <h3> CUPS </h3>
                          </a>




                          <?php
                          if ($pro2 == '1') {
                          ?>
                            <input value="1" type="radio" name="pro2" id="pro2" checked="true" />
                            Activa
                            <input value="0" type="radio" name="pro2" id="pro2" /> NO activa
                          <?php
                          } elseif ($pro2 == '0') {
                          ?>
                            <input value="1" type="radio" name="pro2" id="pro2" /> Activa
                            <input value="0" type="radio" name="pro2" id="pro2" checked="true" /> NO
                            activa


                          <?php
                          }
                          ?>


                          <input type="hidden" class="form-control input-lg" id="USUARIO" name="USUARIO" value="<?php echo $USUARIO ?>" disabled>
                          <input type="hidden" class="form-control input-lg" name="usuarioId" value="<?php echo $ID ?>">
                          <input type="hidden" class="form-control input-lg" name="form4" value="1">


                        </th>
                      </tr>
                    </table>
                    <div class="box-footer">
                      <button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                        <h4> Actualizar </h4>
                      </button>

                    </div>
                  </form>
                <?php endif ?>











                <?php if ($_SESSION['rol'] == 2) : ?>



                  <form action="perfilG.php" method="POST" enctype="multipart/form-data">
                    <table class="tg" style="undefined;table-layout: fixed; width: 100%">


                      <tr>
                        <th>

                          <a href="servicios" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                            <h4> Servicios </h4>
                          </a>

                        </th>
                        <th>



                        </th>
                        <th>




                        </th>
                      </tr>
                    </table>

                  <?php endif ?>





                  <?php if ($_SESSION['rol'] == 3) : ?>



                    <form action="perfilG.php" method="POST" enctype="multipart/form-data">
                      <table class="tg" style="undefined;table-layout: fixed; width: 100%">

                        <tr>
                          <th>

                            <a href="serviciosVacunar" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                              <h4> Servicios </h4>
                            </a>

                          </th>
                          <th>



                          </th>
                          <th>




                          </th>
                        </tr>
                      </table>

                    <?php endif ?>










              </div>

            </div>

          </div>
        </div>
        <!-- /.tab-pane -->

        <!-- /.tab-pane -->
      </div>
      <!-- /.tab-content -->
    </div>
    <!-- /.nav-tabs-custom -->
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