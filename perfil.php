<?php
if (isset($_POST['key'])) {
  include "config.php";
  switch ($_POST['key']) {
    case 'insert':
      $querySelect = mysqli_query($conn3, "SELECT count(*) AS cantRegistro FROM cuposHorario WHERE rangoDesde = '" . Date("H:i:s", strtotime($_POST['rangoDesde'])) . "' AND rangoHasta = '" . Date("H:i:s", strtotime($_POST['rangoHasta'])) . "'")->fetch_array();
      if ($querySelect['cantRegistro'] == 0) {
        $queryInsert = mysqli_query($conn3, "INSERT INTO cuposHorario SET idUsuario = '{$_POST['idUsuario']}', rangoDesde = '{$_POST['rangoDesde']}', rangoHasta = '{$_POST['rangoHasta']}', cupos = '{$_POST['cupos']}'");
        if ($queryInsert) {
          $respuesta = 1;
        } else {
          $respuesta = 0;
        }
      } else {
        $respuesta = 2;
      }
      break;
    case 'select':
      $respuesta = mysqli_query($conn3, "SELECT id, rangoDesde, rangoHasta, cupos FROM cuposHorario WHERE id = '{$_POST['id']}'")->fetch_assoc();
      break;
    case 'update':
      $querySelect = mysqli_query($conn3, "SELECT count(*) AS cantRegistro FROM cuposHorario WHERE rangoDesde = '" . Date("H:i:s", strtotime($_POST['rangoDesde'])) . "' AND rangoHasta = '" . Date("H:i:s", strtotime($_POST['rangoHasta'])) . "' AND id != '{$_POST['id']}'")->fetch_array();
      if ($querySelect['cantRegistro'] == 0) {
        $queryUpdate = mysqli_query($conn3, "UPDATE cuposHorario SET rangoDesde = '{$_POST['rangoDesde']}', rangoHasta = '{$_POST['rangoHasta']}', cupos = '{$_POST['cupos']}' WHERE id = '{$_POST['id']}'");
        if ($queryUpdate) {
          $respuesta = 1;
        } else {
          $respuesta = 0;
        }
      } else {
        $respuesta = 2;
      }
      break;

    case 'updateEstado':
      $estado = ($_POST['estado'] == 1 ? 0 : 1);
      $queryUpdate = mysqli_query($conn3, "UPDATE cuposHorario SET activo = '{$estado}' WHERE id = '{$_POST['id']}'");
      if ($queryUpdate) {
        $respuesta = 1;
      } else {
        $respuesta = 0;
      }
      break;

    case 'updateActivos':
      $queryUpdate = mysqli_query($conn3, "UPDATE cuposHorario SET activo = '{$_POST['activo']}'");
      if ($queryUpdate) {
        $respuesta = 1;
      } else {
        $respuesta = 0;
      }
      break;
    default:
      # code...
      break;
  }

  header('Content-Type: application/json; charset=utf-8');
  echo json_encode($respuesta);
  exit();
}
include 'header.php';
include 'menu.php';

$indicativo = funcionMaster($_SESSION['ID'], 'ID', 'Indicativo', 'usuarios');



// Este codigo funciona para cuando en el grupos_menu se pone 1 en PortadaPOS es para que cada vez que ingresen a configuracion y perfil los redirija a POS y ademas se usara para quitar los botones superiores de soporte y configuracion y perfil
$grupo = funcionMaster($_SESSION['ID'], 'ID', 'menu', 'usuarios');

$QueyrGrupoMenu = mysqli_query($conn3, "SELECT * FROM  grupos  where id = $grupo ");
if ($QueyrGrupoMenu) {
  while ($RowGrupoMenu = mysqli_fetch_array($QueyrGrupoMenu)) {
    $PortadaPOS = $RowGrupoMenu['PortadaPOS'];
  }
}

if ($PortadaPOS == 1) {
  //echo "<script language='Javascript'> window.location='pos';</script>";
}
// [FIN] Este codigo funciona para cuando en el grupos_menu se pone 1 en PortadaPOS es para que cada vez que ingresen a configuracion y perfil los redirija a POS y ademas se usara para quitar los botones superiores de soporte y configuracion y perfil


$usuarioId = $_SESSION['ID'];
$ID_principal = $_SESSION['ID_principal'];
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-2">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Configuración y perfil
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">

      <?php

      $usuarioId = $_SESSION['ID'];


      $conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));
      $queryList = mysqli_query($conn3, "SELECT * FROM  usuarios where ID=$usuarioId");
      // $nrowl = mysqli_num_rows($queryList);
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

          $empresaNombre = $rowMotorizado['empresaNombre'];

          $pais = $rowMotorizado['pais'];

          $numeroFactura = $rowMotorizado['numeroFactura'];
          $nit = $rowMotorizado['nit'];

          $especialidad = $rowMotorizado['especialidad'];
          $especialidad1 = $rowMotorizado['especialidad1'];
          $especialidad2 = $rowMotorizado['especialidad2'];

          $Nacimiento = $rowMotorizado['Nacimiento'];

          $menu = $rowMotorizado['menu'];
        }
      }



      $queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario=$usuarioId");
      // $nrowl = mysqli_num_rows($queryList);
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
          $firmaE = $rowMotorizado['firma'];

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
          $pacientes = $rowMotorizado['pacientes'];
          $lugar = $rowMotorizado['sucursal'];
          $grupo1 = $rowMotorizado['grupo1'];
          $grupo2 = $rowMotorizado['grupo2'];
          $grupo3 = $rowMotorizado['grupo3'];

          $rips = $rowMotorizado['rips'];
          $linkGM = $rowMotorizado['ubicaciion'];


          // $queryListC = mysqli_query($conn3, "SELECT * FROM  gruposAtencion where ID=$grupo1");

          // // $nrowlC = mysqli_num_rows($queryListC);
          // while ($rowC = mysqli_fetch_array($queryListC)) {


          //   $nombre1 = $rowC['nombre'];
          // }


          // $queryListC = mysqli_query($conn3, "SELECT * FROM  gruposAtencion where ID=$grupo2 ");

          // // $nrowlC = mysqli_num_rows($queryListC);
          // while ($rowC = mysqli_fetch_array($queryListC)) {


          //   $nombre2 = $rowC['nombre'];
          // }

          // $queryListC = mysqli_query($conn3, "SELECT * FROM  gruposAtencion where ID=$grupo3");

          // // $nrowlC = mysqli_num_rows($queryListC);
          // while ($rowC = mysqli_fetch_array($queryListC)) {


          //   $nombre3 = $rowC['nombre'];
          // }

          $Color_Resultados = $rowMotorizado['Color_Resultados'];
          $CitasGoogleCalendar = $rowMotorizado['CitasGoogleCalendar'];
          $google_calendar_id = $rowMotorizado['google_calendar_id'];
          $Zona_Horaria = $rowMotorizado['Zona_Horaria'];

          $Max_Descuento = $rowMotorizado['Max_Descuento'];
          $FacturarExistenciasNegativas = $rowMotorizado['FacturarExistenciasNegativas'];
        }
      }



      $conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));
      $queryList = mysqli_query($conn3, "SELECT * FROM  configPuntos where ID_Usuario=$usuarioId");
      // $nrowl = mysqli_num_rows($queryList);
      if ($queryList) {
        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
          $equivalenPuntos = $rowMotorizado['equivalenPuntos'];
          $puntosPorCita = $rowMotorizado['puntosPorCita'];
          $puntosPorCumpleannos = $rowMotorizado['puntosPorCumpleannos'];
          $puntosR = $rowMotorizado['puntosR'];
        }
      }

















      if (isset($_GET['borrar'])) {



        $idb = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_GET['borrar'])));

        mysqli_query($conn3, "delete from  noLaborales where id = '$idb' ");
      }



      ?>

      <style>
        .select2-container--default .select2-selection--single {
          height: 40px !important;
        }
      </style>




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
          <div class="card card-primary card-outline card-outline-tabs">
            <div class="card-header p-0 border-bottom-0">
              <ul class="nav nav-tabs">

                <li class="nav-item" class="active"><a class="nav-link active" href="#Consultas"
                    data-toggle="tab">Información de Perfil</a>
                </li>
                <?php /* Teniendo en cuenta que todos los registros solo pueden apuntar al master, esto no es viable para tenerlo en todos los usuarios */ ?>
                <?php /* Por el momento unicamente dejare esta validación para que no tengo acceso a estos módulos */ ?>

                <li class="nav-item">
                  <a class="nav-link " href="#Examenes" data-toggle="tab">Información de Facturación y configuración</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="#Consultas3" data-toggle="tab">Logo</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="#Consultas4" data-toggle="tab">Firma</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="#Consultas5" data-toggle="tab">Días No laborales</a>
                </li>
                <!-- <li class="nav-item">
                  <a class="nav-link " href="#listas" data-toggle="tab">Listas</a>
                </li> -->
                <li class="nav-item">
                  <a class="nav-link " href="#Citas" data-toggle="tab">Google Calendar</a>
                </li>
                <!-- <li class="nav-item">
                  <a class="nav-link " href="#PuntosR" data-toggle="tab"> Puntos y
                      Referidos</a> -->
                <li class="nav-item">
                  <a class="nav-link " href="#Consultas2" data-toggle="tab">Generar Respaldo de la base de datos</a>
                </li>

              </ul>
            </div>
            <div class="card-body">
              <div class="tab-content">
                <div class="active tab-pane" id="Consultas">

                  <div class="">
                    <form action="perfilG.php" method="POST">


                      <table class="tg" style="undefined;table-layout: fixed; width: 100%">
                        <colgroup>
                          <col style="width: 48%">
                          <col style="width: 2%">
                          <col style="width: 48%">
                        </colgroup>
                        <tr>
                          <th>
                            <div align="left">Usuario </div>
                            <input type="text" class="form-control input-lg" id="nombre_cliente" name="nombre_cliente"
                              value="<?php echo $USUARIO ?>">
                            <input type="hidden" class="form-control input-lg" name="usuarioId"
                              value="<?php echo $ID ?>">
                            <input type="hidden" class="form-control input-lg" name="perfil" value="99">
                            <input type="hidden" class="form-control input-lg" name="vista" value="0">
                            <input type="hidden" class="form-control input-lg" name="form1" value="1">
                          </th>
                          <th>

                          </th>
                          <th>
                            <div align="left"> Contraseña </div>
                            <input type="password" class="form-control input-lg" name="PASS"
                              value="<?php echo $PASS ?>">
                          </th>
                        </tr>

                        <tr>
                          <th>
                            <div align="left"> Nombre Completo </div>
                            <input type="text" class="form-control input-lg" name="NOMBRE_USUARIO"
                              value="<?php echo $NOMBRE_USUARIO ?>">
                          </th>
                          <th>

                          </th>
                          <th>
                            <div align="left"> Teléfono </div>
                            <input type="text" class="form-control input-lg" name="telefono"
                              value="<?php echo $telefono ?>">
                          </th>
                        </tr>

                        <tr>
                          <th>
                            <div align="left"> Dirección </div>
                            <input type="text" class="form-control input-lg" name="direccion"
                              value="<?php echo $direccion ?>">
                          </th>
                          <th>

                          </th>
                          <th>
                            <div align="left"> Ciudad </div>
                            <input type="text" class="form-control input-lg" name="ciudad"
                              value="<?php echo $ciudad ?>">
                          </th>
                        </tr>

                        <tr>
                          <th>

                          </th>
                          <th>

                          </th>
                          <th>
                            <div align="left"> Indicativos <span style="color:red">* Numero
                                WhatsApp *</span></div>
                            <select name="indicativo" id="indicativo" class="form-control input-lg select2"
                              style="width: 100%;">
                              <option value="">Elegir opción</option>
                              <?php
                              //            filtro / campo a filtrar / value del option / texto del option / tabla
                              echo selectMaster("", "numero", "numero,nombre", "indicativos");

                              ?>
                            </select>


                          </th>
                        </tr>

                        <tr>
                          <th>

                            <div align="left"> Especialidad </div>
                            <select name="especialidad1" class="form-control select2"
                              data-placeholder="Seleccione especialidades" style="width: 100%;"="">
                              <option value="<?php echo $especialidad1 ?>">
                                <?php echo categoria($especialidad1) ?>
                              </option>
                              <?php categoriaselect() ?>
                            </select>
                          </th>
                          <th>

                          </th>
                          <th>

                            <div align="left"> Especialidad 2</div>
                            <select name="especialidad2" class="form-control select2"
                              data-placeholder="Seleccione especialidades" style="width: 100%;">
                              <option value="<?php echo $especialidad2 ?>">
                                <?php echo categoria($especialidad2) ?>
                              </option>
                              <?php categoriaselect() ?>
                            </select>
                          </th>
                        </tr>










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
                            <div align="left"> Nombre de la empresa (sí aplica) </div>
                            <input type="text" class="form-control input-lg" name="empresaNombre"
                              value="<?php echo $empresaNombre ?>">
                          </th>
                          <th>

                          </th>
                          <th>
                            <div align="left"> Especialidad </div>
                            <input type="text" class="form-control input-lg" name="especialidad"
                              value="<?php echo $especialidad ?>">
                          </th>
                        </tr>


                        <tr>
                          <th>
                            <div align="left"> Cédula o ID</div>
                            <input type="text" class="form-control input-lg" name="nit" value="<?php echo $nit ?>"
                              pattern="[A-Za-z0-9_-]{1,15}" id="txtRut" />

                            <div id="div-results"></div>
                          </th>
                          <th>

                          </th>
                          <th>
                            <div align="left"> Siguiente número de factura </div>
                            <input type="text" class="form-control input-lg" name="numeroFactura"
                              value="<?php echo $numeroFactura ?>">
                          </th>
                        </tr>



                        <tr>
                          <th>

                            <!-- <div class="">Grupo / menú
                              <select class="form-control input-lg" name="menu">
                                <?php
                                $query = "SELECT * from grupos where estado = 1";
                                $result = mysqli_query($conn3, $query);
                                if ($result) {
                                  while ($row = mysqli_fetch_array($result)) {
                                    if ($menu == $row['id']) {
                                      echo '<option value="' . $row['id'] . '" selected>' . $row['nombre'] . '</option>';
                                    } else {
                                      echo '<option value="' . $row['id'] . '">' . $row['nombre'] . '</option>';
                                    }
                                  }
                                }

                                ?>
                              </select>
                            </div> -->


                          </th>
                          <th>

                          </th>
                          <th>

                            <div class="">Link google maps
                              <input type="text" class="form-control input-lg" name="linkGM" id="linkGM"
                                value="<?php echo $linkGM ?>">
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
                      </table>

                      <br>

                      <div class="footer">
                        <button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow"
                          style="height: 100%;">
                          <h4> Actualizar </h4>
                        </button>
                      </div>

                    </form>
                    <?php if ($_SESSION['TIPO'] == 99): ?>
                      <div class="row mt-4" id="configuraciones del sistema">
                        <div class="col-md-6">
                          <a href="sucursales" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                            <h4> Sucursales </h4>
                          </a>

                          <a href="misHistorias" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                            <h4> Historias </h4>
                          </a>
                          <!-- <a href="configHospitalizacion.php"
                                                    class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                                                    <h4> Configurar Hospitalización </h4>
                                                </a> -->

                          <a href="configImpresiones" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                            <h4> Configurar Impresiones </h4>
                          </a>

                          <!--  29 06 2023 - JRodriguez - oculto por estetica -->

                          <!--<a href="configConsentimientos.php" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                          <h4> Consentimiento </h4>
                        </a>-->



                          <!--a href="Formulario_Rips.php" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                          <h4> Información para Rips // se comenta con autorizacion de leidy revision estetica02112022</h4>
                        </a-->

                          <!--<a href="odontogramaEstados.php" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                          <h4> Config Odontograma </h4>
                        </a>

                        <a href="LB_MedicosAsociados.php" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                          <h4> Medicos Laboratorio </h4>
                        </a>-->
                          <a href="administrarConsenimientos"
                            class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                            <h4> Administrar Plantillas/Documentos </h4>
                          </a>
                          <!-- <a href="Estado_Ingreso.php" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                            <h4> Estados de Ingreso </h4>
                          </a> -->
                          <a href="POS_CrearPunto" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                            <h4> Crear Punto POS</h4>
                          </a>
                          <a href="Medios_Pago" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                            <h4> Crear Medios de Pago</h4>
                          </a>

                          <a href="IN_Ivas" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                            <h4> Crear Iva</h4>
                          </a>

                        </div>
                        <div class="col-md-6">


                          <?php if ($_SESSION['ID'] == 1): ?>
                            <!--
    SOLO EL REGISTRO 1 PODRA CREAR USUARIOS
  -->
                            <a href="usuarios" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                              <h4> Usuarios </h4>
                            </a>

                          <?php endif ?>




                          <a href="usuariosAdministrativos"
                            class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                            <h4> Usuarios Administrativos </h4>
                          </a>
                          <a href="AgregarExamenes.php" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                            <h4> Exámenes </h4>
                          </a>
                          <a href="ConfigGenerarPlantilla.php"
                            class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                            <h4> Plantillas TextArea</h4>
                          </a>

                          <a href="CS_ComisionServicio.php"
                            class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                            <h4> Comisión Producto a Usuario</h4>
                          </a>
                          <?php if ($usuarioId == $ID_principal) { ?>
                            <a href="permisosUsuariosVista.php"
                              class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                              <h4> Permisos Usuarios </h4>
                            </a>

                            <a href="OD_Procedimientos.php"
                              class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                              <h4> Configuración de Odontograma</h4>
                            </a>
                            <a href="ODP_Procedimientos.php"
                              class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                              <h4> Configuración de Odontopediatría</h4>
                            </a>
                          <?php  } ?>
                          <!-- <a href="Docso_InformacioUsuario"
                                                    class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                                                    <h4> Agregar Información Documento Soporte</h4>
                                                </a> -->
                          <!--<a href="GC_Visualizacion.php" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                          <h4> Graficas de Crecimiento </h4>
                        </a>-->
                        </div>


                        <!--<div class="col-md-12">
                        <br>
                        <button class="btn btn-block btn-outline-info btn-lg rounded-pill shadow " onclick="$('#target').toggle();">Mas Opciones</button>
                        <br>
                        <div id="target" class="col-md-12" style="display:none;">

                          <div class="col-md-6">
                            <a href="Informacion_Adicional_Modulos.php?Tabla=H_Equipos&Usuario=<?php echo $_SESSION["ID"]; ?>" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                              <h4> Equipos / Historia Audiología </h4>
                            </a>
                          </div>

                          <div class="col-md-6">
                            <a href="Informacion_Adicional_Modulos.php?Tabla=H_Entidades&Usuario=<?php echo $_SESSION["ID"]; ?>" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                              <h4> Entidades / Historia Audiología </h4>
                            </a>
                          </div>

                          <div class="col-md-6">
                            <a href="Informacion_Adicional_Modulos.php?Tabla=cups" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                              <h4> Cups </h4>
                            </a>
                          </div>

                        </div>

                      </div>-->

                      </div>
                    <?php else: ?>
                      <!--<div class="row">
                      <div class="col-md-12">
                        <a href="GC_Visualizacion.php" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                          <h4> Gráficas de Crecimiento </h4>
                        </a>
                      </div>
                    </div>-->
                    <?php endif; ?>
                  </div>



                </div>
                <!-- /.tab-pane -->



                <div class="tab-pane" id="Examenes">
                  <div class="form-row">
                    <div align="center"> <strong>
                        <font color="red">Para usar el módulo de facturas debe de configurar los
                          datos básicos para el
                          formato de factura los datos básicos están marcados ** </font>
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
                              <font color="red">**</font> Nombre que saldrá en la factura
                              (Ej. Empresa modeló SAS)
                            </div>
                            <input type="text" class="form-control input-lg" name="nombreF"
                              value="<?php echo $nombreF ?>">
                            <input type="hidden" class="form-control input-lg" name="usuarioId"
                              value="<?php echo $ID ?>">
                            <input type="hidden" class="form-control input-lg" name="form2" value="1">


                          </th>
                          <th>

                          </th>
                          <th>
                            <div align="left">
                              <font color="red">**</font> Teléfono
                            </div>
                            <input type="text" class="form-control input-lg" name="telefonoF"
                              value="<?php echo $telefonoF ?>">
                          </th>
                        </tr>

                        <tr>
                          <th>
                            <div align="left">
                              <font color="red">**</font> Dirección
                            </div>
                            <input type="text" class="form-control input-lg" name="direccionF"
                              value="<?php echo $direccionF ?>">
                          </th>
                          <th>

                          </th>
                          <th>
                            <div align="left"> Correo Electrónico </div>
                            <input type="text" class="form-control input-lg" name="emailF"
                              value="<?php echo $emailF ?>">
                          </th>
                        </tr>

                        <tr>
                          <th>
                            <div align="left"> País – ciudad </div>
                            <input type="text" class="form-control input-lg" name="ciudadPaisF"
                              value="<?php echo $ciudadPaisF ?>">
                          </th>
                          <th>

                          </th>
                          <th>
                            <div align="left">Licencia médica (Esta información se verá
                              reflejado en el pie de página)
                            </div>
                            <input type="text" class="form-control input-lg" name="licenciaF"
                              value="<?php echo $licenciaF ?>">
                          </th>
                        </tr>
                        <tr>
                          <th>
                            <!--
                            <div align="left">
                              <font color="red">**</font> Impuesto (si no cobra impuesto solo dejarlo en 0)
                            </div>
                            <input type="text" class="form-control input-lg" name="impuestoF"
                              value="<?php echo $impuestoF ?>">
                            -->
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
                              // $nrowl = mysqli_num_rows($queryList);
                              if ($queryList) {
                                while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                  $Moneda = $rowMotorizado['Moneda'];

                                  $Moneda = $rowMotorizado['Moneda'];
                                  $Simbolo = $rowMotorizado['Simbolo'];
                                  $Nombre = $rowMotorizado['Nombre'];


                                  if ($moneda == $Simbolo) {
                                    $select = "selected='selected'";
                                  } else {
                                    $select = " ";
                                  }
                                  echo "<option $select value='$Simbolo'> $Moneda  - $Nombre </option>";
                                }
                              }



                              ?>

                            </select>











                          </th>
                        </tr>


                        <tr>
                          <th>

                            <div align="left"> Tiempo promedio por cada consulta, si desea
                              tiempo abierto solo dejar en
                              0
                              (minutos)</div>

                            <select name="tiempoConsulta" class="form-control select2" style="width: 100%;" required>
                              <option $select value='<?php echo $tiempoConsulta ?>'>
                                <?php echo $tiempoConsulta ?>
                              </option>
                              <option value='0'> 0 LIBRE</option>
                              <option value='15'> 15 Minutos</option>
                              <option value='20'> 20 Minutos</option>
                              <option value='30'> 30 Minutos</option>
                              <option value='40'> 40 Minutos</option>
                              <option value='60'> 1 Hora</option>
                              <option value='90'> 1/2 Horas</option>
                              <option value='120'> 2 Horas</option>

                            </select>


                          </th>
                          <th>

                          </th>
                          <th>
                            <div align="left"> Cantidad de pacientes máximos por día. (Solo
                              para uso de referencia en
                              agenda) </div>
                            <input type="number" max="99" min="1" class="form-control input-lg" name="cantidadPacientes"
                              value="<?php echo $cantidadPacientes ?>" required>
                          </th>
                        </tr>




                        <!-- <tr>
                        <th>
                          <div align="left"> Lugar de trabajo </div>

                          <input type="text" name="lugar" class="form-control input-lg" maxlength="100" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" value="<?php echo $lugar ?>">




                        </th> -->
                        <!-- <th>

                        </th> -->
                        <!-- <th>
                          <div align="left"> Asociar grupo de atención médica 1 </div>
                          <select name="grupo1" id="grupo1" class="form-control select2" style="width: 100%;">

                            <option value="<?php echo $grupo1 ?>" select><?php echo $nombre1 ?></option>
                            <option value="0" select>Ninguno</option>
                            <?php
                            $conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));

                            $queryListC = mysqli_query($conn3, "SELECT * FROM  gruposAtencion ");

                            // $nrowlC = mysqli_num_rows($queryListC);
                            if ($queryListC) {
                              while ($rowC = mysqli_fetch_array($queryListC)) {

                                $id = $rowC['ID'];
                                $nombre = $rowC['nombre'];

                                echo "<option value='$id'> $nombre </option>";
                              }
                            }
                            ?>
                          </select>




                        </th>

                      </tr> -->


                        <!-- <tr>
                        <th>
                          <div align="left"> Asociar grupo de atención médica 2 </div>
                          <select name="grupo2" id="grupo12" class="form-control select2" style="width: 100%;">

                            <option value="<?php echo $grupo2 ?>" select><?php echo $nombre2 ?></option>
                            <option value="0" select>Ninguno</option>
                            <?php
                            $conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));

                            $queryListC = mysqli_query($conn3, "SELECT * FROM  gruposAtencion ");

                            // $nrowlC = mysqli_num_rows($queryListC);
                            if ($queryListC) {
                              while ($rowC = mysqli_fetch_array($queryListC)) {

                                $id = $rowC['ID'];
                                $nombre = $rowC['nombre'];

                                echo "<option value='$id'> $nombre </option>";
                              }
                            }
                            ?>
                          </select>



                        </th>
                        <th>

                        </th>
                        <th>
                          <div align="left"> Asociar grupo de atención médica 3 </div>
                          <select name="grupo3" id="grupo3" class="form-control select2" style="width: 100%;">

                            <option value="<?php echo $grupo3 ?>" select><?php echo $nombre3 ?></option>
                            <option value="0" select>Ninguno</option>
                            <?php
                            $conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));

                            $queryListC = mysqli_query($conn3, "SELECT * FROM  gruposAtencion ");

                            // $nrowlC = mysqli_num_rows($queryListC);
                            if ($queryListC) {
                              while ($rowC = mysqli_fetch_array($queryListC)) {

                                $id = $rowC['ID'];
                                $nombre = $rowC['nombre'];

                                echo "<option value='$id'> $nombre </option>";
                              }
                            }
                            ?>
                          </select>




                        </th>

                      </tr>




 -->









                        <tr>
                          <th>
                            <div align="left"> Número de WhatsApp para recibir sus
                              notificaciones </div>
                            <input type="text" class="form-control input-lg" name="whatsapp"
                              placeholder="57123456789" value="<?php echo $whatsapp ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">

                          </th>
                          <th>

                          </th>
                          <th>
                            <div align="left"> Registro Auxiliar </div>
                            <input type="text" class="form-control input-lg" name="registroAuxiliar" placeholder=""
                              value="<?php echo $registroAuxiliar ?>">
                          </th>
                        </tr>


                        <tr>
                          <th>
                            <div align="left"> Máximo Descuento en el Modulo POS </div>
                            <input type="number" class="form-control input-lg" name="Max_Descuento" max="100" min="0"
                              required value="<?php echo $Max_Descuento ?>">

                          </th>
                          <th>

                          </th>
                          <th>
                            <div align="left"> Facturar Existencias Negativas en el Modulo
                              POS </div>
                            <select name="FacturarExistenciasNegativas" class="form-control select2"
                              style="width: 100%;" required>
                              <?php
                              $ArregloOpciones["0"] = "No";
                              $ArregloOpciones["1"] = "Si";
                              $ArregloOpciones["2"] = "Con Validación de Token";
                              if ($FacturarExistenciasNegativas != "") {
                                echo "<option value='$FacturarExistenciasNegativas' selected>$ArregloOpciones[$FacturarExistenciasNegativas]</option>";
                              }
                              ?>

                              <option value='0'> No</option>
                              <option value='1'> Si</option>
                              <option value='2'> Con Validación de Token</option>

                            </select>
                          </th>
                        </tr>


                        <!--
                      <tr>
                        <th>
                          <div align="left"> Catidad de pacientes por oportunidad de cita </div>
                          <input type="number" class="form-control input-lg" name="pacientes" value="<?php echo $pacientes ?>">
                        </th>
                        <th>

                        </th> -->
                        <!-- <th>
                          <div align="left"> Cupos por Hora(Calendario Directorio Médico) <span class="text-danger text-bold"> 0 = Desactivado</span> </div>
                          <input type="number" class="form-control input-lg" name="cuposHora" value="<?php echo $cuposHora ?>">
                        </th>
                      </tr> -->
                      </table>

                      <div align="left"> Información para el Encabezado </div>

                      <textarea id="header" name="header" class="textarea"
                        placeholder="Información que se vera en el Encabezado "
                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $header ?></textarea>

                      <div align="left"> Información para el pie de página </div>

                      <textarea id="pieF" name="pieF" class="textarea"
                        placeholder="Información que se vera en el pie de página"
                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $pieF ?></textarea>

                      <hr>

                      <!-- <div class="col-md-12">
                          <div class="card card-primary">
                            <div class="card-header">
                              <h4 class="card-title">
                                <a data-toggle="collapse" href="#collapse1" aria-expanded="false">Opciones Laboratorio</a>
                              </h4>
                            </div>
                            <div id="collapse1" class="collapse">
                              <div class="card-body">
                                <div class="form-group col-md-12">
                                  <label style="float: left;">¿Dar Color a los Resultados?</label>
                                  <select name="Laboratorio[Color_Resultados]" class="form-control input-lg"
                                    style="width:100%">
                                    <?php if ($Color_Resultados != ""): ?>
                                      <option>
                                        <?php echo $Color_Resultados; ?>
                                      </option>
                                    <?php endif; ?>
                                    <option>No</option>
                                    <option>Si</option>
                                  </select>
                                </div>
                              </div>
                              <div class="card-footer">Laboratorio</div>
                            </div>
                          </div>
                        </div> -->




                      <hr>

                      <?php // include "cuposPorHora.php"; 
                      ?><br>
                      <hr>
                      <hr>
                      <div>
                        <h4>
                          <?php //include "ModuloSucursales/Horario_Sistema.php"; 
                          ?>
                        </h4>
                      </div>
                      <h4>
                        <div align="center"> Configurar horario disponible </div>
                      </h4>
                      <hr>

                      <?php include "Horario_Sistema.php"; ?>
                      <HR>
                      </HR>


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
                            <input value="1" type="radio" name="lt" checked="true" /> SI
                            <input value="0" type="radio" name="lt" /> NO
                          <?php
                          } elseif ($lt == '0') {
                          ?>
                            <input value="1" type="radio" name="lt" /> SI
                            <input value="0" type="radio" name="lt" checked="true" /> NO
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
                            <input value="1" type="radio" name="mt" checked="true" /> SI
                            <input value="0" type="radio" name="mt" /> NO
                          <?php
                          } elseif ($mt == '0') {
                          ?>
                            <input value="1" type="radio" name="mt" /> SI
                            <input value="0" type="radio" name="mt" checked="true" /> NO


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
                            <input value="1" type="radio" name="et" checked="true" /> SI
                            <input value="0" type="radio" name="et" /> NO
                          <?php
                          } elseif ($et == '0') {
                          ?>
                            <input value="1" type="radio" name="et" /> SI
                            <input value="0" type="radio" name="et" checked="true" /> NO


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
                            <input value="1" type="radio" name="jt" checked="true" /> SI
                            <input value="0" type="radio" name="jt" /> NO
                          <?php
                          } elseif ($jt == '0') {
                          ?>
                            <input value="1" type="radio" name="jt" /> SI
                            <input value="0" type="radio" name="jt" checked="true" /> NO


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
                            <input value="1" type="radio" name="vt" checked="true" /> SI
                            <input value="0" type="radio" name="vt" /> NO
                          <?php
                          } elseif ($vt == '0') {
                          ?>
                            <input value="1" type="radio" name="vt" /> SI
                            <input value="0" type="radio" name="vt" checked="true" /> NO


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
                            <input value="1" type="radio" name="st" checked="true" /> SI
                            <input value="0" type="radio" name="st" /> NO
                          <?php
                          } elseif ($st == '0') {
                          ?>
                            <input value="1" type="radio" name="st" /> SI
                            <input value="0" type="radio" name="st" checked="true" /> NO


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
                            <input value="1" type="radio" name="dt" checked="true" /> SI
                            <input value="0" type="radio" name="dt" /> NO
                          <?php
                          } elseif ($dt == '0') {
                          ?>
                            <input value="1" type="radio" name="dt" /> SI
                            <input value="0" type="radio" name="dt" checked="true" /> NO


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
                        <button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow"
                          name="registro_usuario" onclick="window.location.href='config'">
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

                      <!--
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
                    -->

                      <?php
                      include 'CargarLogo.php';
                      ?>

                      <button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow"
                        name="registro_usuario">
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
                          totalmente blanco </font>
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


                      <button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow"
                        name="registro_usuario">
                        <h4> Actualizar </h4>
                      </button>

                    </div>

                  </form>

                </div>























                <div class="tab-pane" id="Consultas2">
                  <?php include 'includeConfigRespaldos.php'; ?>
                </div>





                <div class="tab-pane" id="Consultas5">

                  <form action="perfilG.php" method="POST" enctype="multipart/form-data" class="row">
                    <input type="hidden" class="form-control input-lg" name="usuarioId" value="<?php echo $ID ?>">
                    <input type="hidden" class="form-control input-lg" name="usuarioM" value="<?php echo $usuarioId ?>">
                    <input type="hidden" class="form-control input-lg" name="form6" value="1">
                    <div class="form-row">


                      <div align="left" class="col-md-12">
                        <h3> Registrar Días no Laborables </h3>
                      </div>

                      <div class="form-group col-md-6">


                        Especialista

                        <select id="doctor" name="doctor" class="form-control select2" style="width: 100%;"="">
                          <!-- <option value="0" selected> Todos los especialistas</option> -->
                          <option value="<?= $_SESSION['ID'] ?>" selected>
                            <?= $_SESSION['NOMBRE_USUARIO'] ?>
                          </option>
                          <?php
                          // usuariosEspecialistasSelect();
                          ?>
                        </select>
                      </div>
                      <div class="form-group col-md-6">
                        Fecha No laboral
                        <input type="date" name="fechan" class="form-control input-lg">
                      </div>

                      <div class="form-group col-md-4">
                        <label for="periodo">Periodo</label>
                        <select id="periodo" name="periodo" class="form-control select2" style="width: 100%;">
                          <option value="0" selected>Todo el día</option>
                          <option value="1">Rango de Horas</option>
                        </select>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="horaInicio">Hora Inicial</label>
                        <input type="time" name="horaInicio" id="horaInicio" class="form-control input-lg" value="00:00"
                          required>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="horaFinal">Hora Final</label>
                        <input type="time" name="horaFinal" id="horaFinal" class="form-control input-lg" value="00:00"
                          required>
                      </div>


                      <div class="form-group col-md-12">
                        Nota
                        <input type="text" name="notas" class="form-control input-lg">

                      </div>





                      <div class="col-md-12 mb-4">

                        <button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow"
                          name="registro_usuario">
                          <h4> Guardar </h4>
                        </button>

                      </div>





                      <div class="box-body col-md-12">
                        <table id="example1" class="table table-bordered table-striped w-100">
                          <thead>
                            <tr>
                              <th>Especialista </th>
                              <th>Fechas Bloqueadas</th>
                              <th>Periodo Bloqueado</th>
                              <th>Nota </th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php



                            $conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));
                            $queryListAA = mysqli_query($conn3, "SELECT idDoctor FROM  noLaborales ");
                            if ($queryListAA) {
                              while ($row_recordset32A = mysqli_fetch_array($queryListAA)) {
                                $idDoctor = $row_recordset32A['idDoctor'];


                                if ($idDoctor == 0) {
                                  $queryListA = mysqli_query($conn3, "SELECT * FROM  noLaborales where idUsuario = '{$_SESSION['ID']}' ");
                                } else {
                                  $queryListA = mysqli_query($conn3, "SELECT * FROM  noLaborales L, usuarios  U where L.idDoctor = U.ID and L.idUsuario = '{$_SESSION['ID']}' ");
                                }
                              }
                            }

                            // $nrowl = mysqli_num_rows($queryListA);

                            if ($queryListA) {
                              while ($row_recordset32A = mysqli_fetch_array($queryListA)) {
                                $idL = $row_recordset32A['id'];
                                $fechar = $row_recordset32A['fecha'];
                                $fechaN = $row_recordset32A['fechaNoLaboral'];
                                $especialista = $row_recordset32A['NOMBRE_USUARIO'];
                                $nota = $row_recordset32A['nota'];
                                $h1 = $row_recordset32A['hora1'];
                                $h2 = $row_recordset32A['hora2'];



                                echo '
                            <tr>
                            <td> ' . ($row_recordset32A['idDoctor'] == 0 ? 'Todos' : $especialista) . '</td>
                            <td> ' . $fechaN . '</td>
                            <td> ' . ($row_recordset32A['periodo'] == 0 ? 'Todo el dia' : "Rango de Hora:\nDesde: {$row_recordset32A['horaInicio']} - Hasta: {$row_recordset32A['horaFinal']}") . '</td>
                            <td> ' . $nota . '</td>


                            <td>



                            <font color="#04CC05"> <a href="perfil.php?borrar=' . $idL . '"> <i class="fa fa-trash" title="Borrar Registro" name="Virtual"></i>  </a></font>
                            </td>
                            </tr>';
                              }
                            }

                            ?>



                          </tbody>
                        </table>
                      </div>
                    </div>



                  </form>

                </div>












                <div class="tab-pane" id="listas">

                  <div class="form-row">


                  </div>




                  <?php if ($_SESSION['rol'] <> 2 or $_SESSION['rol'] <> 3): ?>



                    <form action="perfilG.php" method="POST" enctype="multipart/form-data">
                      <table class="tg" style="undefined;table-layout: fixed; width: 100%">


                        <tr>
                          <th>


                            <a href="cie10">
                              <h3> CIE-11 </h3>
                            </a>

                            <?php
                            if ($cie10 == '1') {
                            ?>
                              <input value="1" type="radio" name="cie10" checked="true" /> Activa
                              <input value="0" type="radio" name="cie10" /> NO activa
                            <?php
                            } elseif ($cie10 == '0') {
                            ?>
                              <input value="1" type="radio" name="cie10" /> Activa
                              <input value="0" type="radio" name="cie10" checked="true" /> NO
                              activa

                            <?php } ?>

                          </th>
                          <!--<th>


                          <a href="lista1">
                            <h3> POS </h3>
                          </a>


                          <?php
                          if ($pro1 == '1') {
                          ?>
                            <input value="1" type="radio" name="pro1" checked="true" /> Activa
                            <input value="0" type="radio" name="pro1" /> NO activa
                          <?php
                          } elseif ($pro1 == '0') {
                          ?>
                            <input value="1" type="radio" name="pro1" /> Activa
                            <input value="0" type="radio" name="pro1" checked="true" /> NO activa


                          <?php } ?>




                        </th>
                        <th>


                          <a href="lista2">
                            <h3> CUPS </h3>
                          </a>




                          <?php
                          if ($pro2 == '1') {
                          ?>
                            <input value="1" type="radio" name="pro2" checked="true" /> Activa
                            <input value="0" type="radio" name="pro2" /> NO activa
                          <?php
                          } elseif ($pro2 == '0') {
                          ?>
                            <input value="1" type="radio" name="pro2" /> Activa
                            <input value="0" type="radio" name="pro2" checked="true" /> NO activa


                          <?php
                          }
                          ?>

                        </th>-->
                          <?php
                          if ($_SESSION['geoData']['timezone'] == 'America/Bogota'):
                          ?>
                            <th>
                              <a href="cie10">
                                <h3> RIPS </h3>
                              </a>
                              <?php
                              if ($rips == '1') {
                              ?>
                                <input value="1" type="radio" name="rips_usuario" checked="true" />
                                Activa
                                <input value="0" type="radio" name="rips_usuario" /> NO activa
                              <?php
                              } elseif ($rips == '0') {
                              ?>
                                <input value="1" type="radio" name="rips_usuario" /> Activa
                                <input value="0" type="radio" name="rips_usuario" checked="true" />
                                NO activa
                              <?php } ?>

                            </th>
                          <?php
                          endif;
                          ?>

                          <input type="hidden" class="form-control input-lg" name="USUARIO" value="<?php echo $USUARIO ?>"
                            readonly>
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
                  <?php endif; ?>

                  <?php if ($_SESSION['rol'] == 2): ?>

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





                    <?php if ($_SESSION['rol'] == 3): ?>



                      <form action="perfilG.php" method="POST" enctype="multipart/form-data">
                        <table class="tg" style="undefined;table-layout: fixed; width: 100%">

                          <tr>
                            <th>

                              <a href="serviciosVacunar"
                                class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
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

                <!-- Inicio Tab card -->
                <div class="tab-pane" id="Citas">

                  <div class="form-row">


                    <form action="perfilG.php" method="POST" enctype="multipart/form-data">
                      <div class="row">
                        <div class="col-md-4">
                          <label> Agregar Futuras Citas a Google Calendar </label>
                          <select name="CitasGoogleCalendar" class="form-control select2" data-placeholder="Seleccione"
                            style="width: 100%;" required>
                            <?= "<option value='{$CitasGoogleCalendar}'>{$CitasGoogleCalendar}</option> " ?>
                            <option value="No">No</option>
                            <option value="Si">Si</option>

                          </select>
                        </div>

                        <div class="col-md-4">
                          <label> Código Calendario ID </label>
                          <input type="text" class="form-control input-lg" name="google_calendar_id"
                            value="<?= $google_calendar_id; ?>">
                        </div>

                        <div class="col-md-4">
                          <label> Zona Horaria </label>
                          <select name="Zona_Horaria" class="form-control select2" data-placeholder="Seleccione"
                            style="width: 100%;" required>
                            <?php if ($Zona_Horaria != "") {
                              if ($Zona_Horaria == "UTC") {
                                echo "<option value='UTC'> Horario Universal Coordinado GTM+00:00 </option>";
                              } else {
                                echo "<option value='{$Zona_Horaria}'>{$Zona_Horaria}</option> ";
                              }
                            }
                            ?>

                            <?php
                            echo "<option value='UTC'> Horario Universal Coordinado GTM+00:00 </option>";
                            $time_zones = DateTimeZone::listIdentifiers();
                            foreach ($time_zones as $time_zone) {
                              $date = new DateTime('now', new DateTimeZone($time_zone));
                              $offset_in_hours = $date->getOffset() / 3600;
                              echo "<option value='{$time_zone}'> {$time_zone} [GMT {$offset_in_hours}]</option>";
                            }
                            ?>

                          </select>
                        </div>

                        <input type="hidden" class="form-control input-lg" name="usuarioId" value="<?php echo $ID ?>">
                        <input type="hidden" class="form-control input-lg" name="formCitas" value="1">

                        <div class="col-md-12">
                          <hr>
                        </div>

                        <div class="box-footer" style="width:100%">
                          <button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow"
                            style="width:100%">
                            <h4> Actualizar </h4>
                          </button>
                        </div>

                        <div class="col-md-12">
                          <hr>
                        </div>
                        <div class="col-md-12">
                          <div class="card card-info">
                            <div class="card-header">
                              <h4 class="">
                                <a data-toggle="collapse" href="#collapse1"
                                  style="width: 100%;display: block;">Más Información</a>
                              </h4>
                            </div>
                            <div id="collapse1" class="card-collapse collapse">
                              <div class="card-body">
                                <p style='font-size:23px;'> Para usar la integración de
                                  google calendar seguir los siguiente pasos: </p>

                                <p style='font-size:20px;'> 1. Ir a la pagina de google
                                  calendar e iniciar sesión
                                  https://www.google.com/calendar</p>

                                <p style='font-size:20px;'> 2. En la parte izquierda donde
                                  dice Otros Calendarios darle al icono + y seleccionar
                                  Crear Calendario</p>
                                <!-- mostra una imagen con la ruta 1googlecalendar.png-->
                                <img src="GuiasImagenes/Calendario/1googlecalendar.png"
                                  alt="" style="width:auto; height:auto;">

                                <p style='font-size:20px;'> 3. Darle Nombre al Calendario y
                                  seleccionar la zona horaria, *si no desea manejar zona
                                  horaria dejarlo en GTM+00:00 Tiempo Universal
                                  Coordinado. Pero si selecciona alguna deberá en la lista
                                  de zona horaria en petsoftplus también elegirla, si no
                                  aparece en la lista de medical la zona horaria elegir la
                                  zona horaria que tenga el numero GMT igual que el que
                                  fue agregado en el calendario de google calendar*</p>
                                <p style='font-size:20px;'> <label style="color:red">Si no
                                    esta seguro del uso de las zonas horarias dejar en
                                    todas las opciones de zonas horarias en la opcion de
                                    GTM+00:00 Tiempo Universal Coordinado, para un
                                    correcto funcionamiento </label> </p>
                                <!-- mostra una imagen con la ruta 1googlecalendar.png-->
                                <img src="GuiasImagenes/Calendario/2googlecalendar.png"
                                  alt="" style="width:auto; height:auto;">

                                <p style='font-size:20px;'> 4. Volver al inicio de la pagina
                                  de Google calendar darle click a los 3 puntos donde esta
                                  el calendario creado y seleccionar configurar y
                                  compartir</p>
                                <!-- mostra una imagen con la ruta 1googlecalendar.png-->
                                <img src="GuiasImagenes/Calendario/3googlecalendar.png"
                                  alt="" style="width:auto; height:auto;">

                                <p style='font-size:20px;'> 5. en el modulo de compartir con
                                  personas predeterminadas deberá agregar el siguiente
                                  correo
                                  <u>api-medical-calendar@medical-calendar-353222.iam.gserviceaccount.com</u>
                                  y seleccionando la opcion de hacer cambios en eventos
                                </p>
                                <!-- mostra una imagen con la ruta 1googlecalendar.png-->
                                <img src="GuiasImagenes/Calendario/4googlecalendar.png"
                                  alt="" style="width:auto; height:auto;">

                                <p style='font-size:20px;'> 6. Bajando en la misma pestaña
                                  en el modulo integrar calendario aparecera una clave
                                  tipo correo la cual debera suministrar en petsoftplus
                                </p>
                                <!-- mostra una imagen con la ruta 1googlecalendar.png-->
                                <img src="GuiasImagenes/Calendario/5googlecalendar.png"
                                  alt="" style="width:auto; height:auto;">
                                <p style='font-size:20px;'> 7. Aqui agregar la clave de
                                  google</p>
                                <img src="GuiasImagenes/Calendario/6googlecalendar.png"
                                  alt="" style="width: 100%;">
                                <hr>
                                <p style='font-size:20px;'> 8. Ahora se tiene que configurar
                                  la visualizacion del calendario en google calendar</p>
                                <img src="GuiasImagenes/Calendario/7googlecalendar.png"
                                  alt="" style="width: 100%;">
                                <p style='font-size:20px;'> 8.1 En la Parte de configuracion
                                  del Calendario en General en el icono del engranaje de
                                  google calendar selecciona la opcion Configuracion </p>
                                <img src="GuiasImagenes/Calendario/8googlecalendar.png"
                                  alt="" style="width: 100%;">
                                <p style='font-size:20px;'> 8.2 En el modulo de zona horaria
                                  debera tener el mismo nombre que en la zona horaria de
                                  petsoftplus o si no lo tiene, debera seleccionar la zona
                                  horaria con el mismo GMT para que funcione correctamente
                                  el calendario </p>
                                <img src="GuiasImagenes/Calendario/9googlecalendar.png"
                                  alt="" style="width:100%; height:auto;">

                                <p style='font-size:23px;'> <label style="color:red">Si no
                                    esta seguro del uso de las zonas horarias dejar
                                    tanto en la opcion de zona horaria de google
                                    calendar como en petsoftplus la opcion de GTM+00:00
                                    Tiempo Universal Coordinado </label></p>
                                <img src="GuiasImagenes/Calendario/10googlecalendar.png"
                                  alt="" style="width:100%; height:auto;">
                              </div>
                              <div class="panel-footer">Calendario</div>
                            </div>
                          </div>
                        </div>




                      </div>

                    </form>


                  </div>

                </div>
                <!-- Fin Tab card -->


                <!-- Inicio Tab card -->
                <div class="tab-pane" id="PuntosR">

                  <div class="form-row">


                    <form action="perfilG.php" method="POST" enctype="multipart/form-data">
                      <div class="row">
                        <div class="col-md-12">
                          <label>Equivalencia de Puntos</label>
                          <input type="number" class="form-control input-lg" name="equivalenPuntos" id="equivalenPuntos"
                            value="<?= $equivalenPuntos; ?>" onChange="calcularpuntos();">
                        </div>
                        <div class="col-md-12">
                          <font color="red" size="2"> Nota: Este monto será dividido entre el
                            total de lo facturado para valer los puntos. </font>
                        </div>

                        <div class="col-md-12">

                          <font color="red" size="2"> Ejemplo: Monto: 100 Valor de los
                            Puntos:10 = 100/10= 10 Puntos </font>

                        </div>


                        <div class="col-md-12">
                          <label>Monto de Factura</label>
                          <input type="text" class="form-control input-lg" name="montoTotal" id="montoTotal"
                            onChange="calcularpuntos();">
                        </div>

                        <div class="col-md-12">
                          <label>Resultado de los puntos del Paciente</label>
                          <input type="text" class="form-control input-lg" name="puntosR" id="puntosR"
                            value="<?= $puntosR; ?>">
                        </div>



                        <div class="col-md-12">
                          <label> Puntos por Cita Agendada de Referidos</label>
                          <input type="text" class="form-control input-lg" name="puntosPorCita"
                            value="<?= $puntosPorCita; ?>">
                        </div>

                        <font color="red" size="2">Nota:Cuando su referido agenda su primera
                          cita el que refiere obtendrá los puntos acá configurados.</font>


                        <div class="col-md-12">
                          <label>Puntos por Cumpleaños</label>
                          <input type="text" class="form-control input-lg" name="puntosPorCumpleannos"
                            value="<?= $puntosPorCumpleannos; ?>">
                        </div>

                        <font color="red" size="2">Nota:Todos los primeros de cada mes se
                          verificarán la persona o pacientes que cumplen en este mes y se le
                          incrementara la cantidad de puntos acá configurada.</font>



                        <input type="hidden" class="form-control input-lg" name="usuarioId" value="<?php echo $ID ?>">
                        <input type="hidden" class="form-control input-lg" name="formPuntosR" value="1">

                        <div class="col-md-12">
                          <hr>
                        </div>

                        <div class="box-footer" style="width:100%">
                          <button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow"
                            style="width:100%">
                            <h4> Actualizar </h4>
                          </button>
                        </div>

                        <div class="col-md-12">
                          <hr>
                        </div>

                      </div>

                    </form>


                  </div>

                </div>
                <!-- Fin Tab card -->


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
include 'dataTablePaginacion.php';
function Encriptar($valor)
{
  $Sc = base64_decode("keyMaster");
  $Texto = urlencode(openssl_encrypt($valor, "AES-256-CBC", $Sc));
  return $Texto;
}
?>

<script>
  document.getElementById('GuardarContabilidad').addEventListener('submit', function(event) {
    event.preventDefault(); // Detiene el envío predeterminado del formulario

    var EstadoContabilidad = $("#EstadoContabilidad").val();
    //console.log(EstadoContabilidad);
    if (EstadoContabilidad === "1") {
      Swal.fire({
        title: 'Activar Contabilidad',
        text: '¿Está seguro de activar la contabilidad? No podrá desactivarla después.',
        icon: 'warning',
        showCancelButton: true,
        closeOnClickOutside: false,
        allowOutsideClick: () => false,
        confirmButtonText: 'Sí',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.isConfirmed) {
          // Usuario hizo clic en "Sí", así que enviamos el formulario
          document.getElementById('GuardarContabilidad').submit();
        }
      });
    }



  });
</script>





<script type="text/javascript">
  //cargar el indicativo del usuario
  var tablaOne;
  $(window).on("load", function() {
    cargaTablaDinamica();
    $("#indicativo > option[value='<?php echo $indicativo; ?>']").attr("selected", true);
    $('#indicativo').select2();
  });

  function cargaTablaDinamica() {
    if (tablaOne != null && typeof tablaOne != 'undefined') {
      tablaOne.clear().draw(); // Limpio la tabla ya existente
      tablaOne = $("#cargaDataTable").dataTable().fnDestroy(); // Destruyo
    }
    tablaOne = tablaDinamica({
      input: "#cargaDataTable", // id del input
      selectFrom: "<?= Encriptar("*") ?>", // SELECT la colausa entre estos dos  FROM
      name: "<?= Encriptar("cuposHorario") ?>", // Nombre de la tabla o en su defecto si se realiza joins y de mas
      camposValue: "<?= Encriptar(json_encode(['rangoDesde', 'rangoHasta', 'cupos'])) ?>", // Campos que se mostraran en la tabla ATENCION: en caso de usar inner si presentan porblemas al usar el filtrado por columnas, deberan reflejar cada columna con su sufijo, Ejemplo: c.cliente O en caso de no usar mascara ser directos cliente.cliente_id
      clausula: {
        data: "<?= Encriptar("") ?>", // Clausula de la consulta
        value: [''], // Valores de la clausula
      },
      likeWhere: "<?= Encriptar('rangoDesde || rangoHasta || cupos') ?>", // campos que se usaran en el buscador (CAMPO LIKE %CAMPO%)
      order: "<?= Encriptar(json_encode(['order by' => '$0'])) ?>", // Orden de la consulta, AQUI SE PUEDE PONER EL ORDER BY, GROUP BY
      btns: btoa(JSON.stringify({ // Botones que se mostraran en la tabla
        btn1: btoa(JSON.stringify({ // Boton 1 PARA CREAR MAS BOTONES ES IMPORTANTE MANTENER LA NUMERACION EJEMPL BTN1, BTN2 ETC
          class: "<?= Encriptar("fa fa-edit text-primary") ?>", // Clase del boton
          id: "<?= Encriptar("toggleIcon$0") ?>", // id del boton
          href: "<?= Encriptar("#editarHoras") ?>", // href del boton
          title: "<?= Encriptar("Editar Cupo") ?>", // title del boton
          event: "<?= Encriptar("onclick='getRangoHoras({id:$0})'") ?>", // evento del boton
          target: "<?= Encriptar("") ?>", // target del boton blank_
          value: "<?= Encriptar("id") ?>" // indices del href dividir con || en caso de presentar mas de un indice del boton
        })),
        btn2: btoa(JSON.stringify({ // Boton 1 PARA CREAR MAS BOTONES ES IMPORTANTE MANTENER LA NUMERACION EJEMPL BTN1, BTN2 ETC
          class: "<?= Encriptar("fa fa-thumb-tack toggle$1") ?>", // Clase del boton
          id: "<?= Encriptar("toggleIcon$0") ?>", // id del boton
          href: "<?= Encriptar("#editarHoras") ?>", // href del boton
          title: "<?= Encriptar("Activar/Desactivar Rango") ?>", // title del boton
          event: "<?= Encriptar("onclick='updateEstadoRangoHoras({id:$0, estado:$1})'") ?>", // evento del boton
          target: "<?= Encriptar("") ?>", // target del boton blank_
          value: "<?= Encriptar("id || activo") ?>" // indices del href dividir con || en caso de presentar mas de un indice del boton
        })),
      })),
      carapter: "true", // ACTIVAR O DESACTUVAR UTF8_DECODE
      tbody: true, // ACTIVAR O DESACTIVAR LA ANIMACION DE CARGA
    });
    tablaOne.columns.adjust().draw();
  }

  function addRangoHoras(options) {
    if (options.rangoDesde != "" && options.rangoHasta != "" && options.cupos != "") {
      options.key = "insert";
      console.log(options);
      $.ajax({
        url: "./perfil.php",
        data: options,
        type: "POST",
        dataType: "JSON",
        success: function(response) {
          (response == 1 ? cargaTablaDinamica() : alert(
            "ATENCIÓN: El Rango seleccionado ya existe."));
        }
      });
    }
  }

  function getRangoHoras(options) {
    options.key = "select";
    console.log(options);
    $.ajax({
      url: "./perfil.php",
      data: options,
      type: "POST",
      dataType: "JSON",
      success: function(response) {
        if (typeof response != 'undefined') {
          $("#btnCuposPorHora").removeClass("btn-primary").addClass("btn-success").html("ACTUALIZAR")
            .attr('onclick', "updateRangoHoras({id:'" + response.id +
              "', rangoDesde:$('#rangoDesde').val(),rangoHasta:$('#rangoHasta').val(),cupos:$('#cupos').val()})"
            );
          $("#toggleIcon" + response.id + " i").removeClass("fa-edit text-primary").addClass(
            "fa-times text-danger");
          $("#toggleIcon" + response.id).attr('onclick', "($('#toggleIcon" + response.id +
            " i').removeClass('fa-times text-danger').addClass('fa-edit text-primary') ($('#toggleIcon" +
            response.id + "').attr('onclick', \"getRangoHoras({id:" + response.id +
            "})\") ($('#btnCuposPorHora').removeClass('btn-success').addClass('btn-primary').html('AGREGAR').attr('onclick', \"addRangoHoras({idUsuario:<?= $_SESSION['ID'] ?>,rangoDesde:$('#rangoDesde').val(),rangoHasta:$('#rangoHasta').val(),cupos:$('#cupos').val()})\") ) ) )"
          );
          $("#rangoDesde").val(response.rangoDesde);
          $("#rangoHasta").val(response.rangoHasta);
          $("#cupos").val(response.cupos);
        }
      }
    });
  }

  function updateRangoHoras(options) {
    if (options.rangoDesde != "" && options.rangoHasta != "" && options.cupos != "") {
      options.key = "update";
      console.log(options);
      $.ajax({
        url: "./perfil.php",
        data: options,
        type: "POST",
        dataType: "JSON",
        success: function(response) {
          if (response == 1) {
            $("#btnCuposPorHora").removeClass("btn-success").addClass("btn-primary").html("AGREGAR")
              .attr('onclick',
                "addRangoHoras({idUsuario:<?= $_SESSION['ID'] ?>,rangoDesde:$('#rangoDesde').val(),rangoHasta:$('#rangoHasta').val(),cupos:$('#cupos').val()})"
              );
            cargaTablaDinamica()
            var times = new Date().toLocaleTimeString().split(":");
            $("#rangoDesde").val(times[0] + ":" + times[1]);
            $("#rangoHasta").val(times[0] + ":" + times[1]);
            $("#cupos").val(1);
          } else {
            alert("ATENCIÓN: El Rango seleccionado ya existe.");
          }
        }
      });
    }
  }

  function updateEstadoRangoHoras(options) {
    options.key = "updateEstado";
    console.log(options);
    $.ajax({
      url: "./perfil.php",
      data: options,
      type: "POST",
      dataType: "JSON",
      success: function(response) {
        (response == 1 ? cargaTablaDinamica() : alert("ATENCIÓN: Error al desactivar rango"));
      }
    });
  }

  function updateToggle(options) {
    options.key = "updateActivos";
    console.log(options);
    $.ajax({
      url: "./perfil.php",
      data: options,
      type: "POST",
      dataType: "JSON",
      success: function(response) {
        (response == 1 ? cargaTablaDinamica() : alert("ATENCIÓN: Error al desactivar rangos"));
      }
    });
  }

  function calcularpuntos() {



    m1 = document.getElementById("equivalenPuntos").value;
    m2 = document.getElementById("montoTotal").value;

    r = m2 / m1;



    document.getElementById("puntosR").value = r;



  }
</script>
<script>
  // Esteban
  $("img:not([class])").addClass("img-fluid");
</script>