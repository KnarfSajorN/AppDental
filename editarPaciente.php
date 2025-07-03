<?php include 'header.php';
include 'menu.php';

$cliente_id = $_GET['clienteId'];
$usuario_id = $_SESSION['ID'];

$queryList = mysqli_query($conn3, "SELECT * FROM cliente WHERE  cliente_id = $cliente_id");
$nrowl = mysqli_num_rows($queryList);
while ($row_recordset32 = mysqli_fetch_array($queryList)) {

  $usuario_id = $row_recordset32['usuario_id'];
  $nombre_cliente = $row_recordset32['nombre_cliente'];
  $celular_cliente = $row_recordset32['celular_cliente'];
  $ciudad_cliente = $row_recordset32['ciudad_cliente'];
  $correo_cliente = $row_recordset32['correo_cliente'];
  $CODI_CLIENTE = $row_recordset32['CODI_CLIENTE'];
  $nacionalidad = $row_recordset32['nacionalidad'];
  $id_uso_servicio = $row_recordset32['id_uso_servicio'];
  $tipo_cliente = $row_recordset32['tipo_cliente'];
  $fechar = $row_recordset32['fechar'];
  $fecha_actualizado = $row_recordset32['fecha_actualizado'];
  $activo = $row_recordset32['activo'];
  $genero = $row_recordset32['genero'];
  $direccion_cliente = $row_recordset32['direccion_cliente'];
  $telefono_cliente = $row_recordset32['telefono_cliente'];
  $edad_cliente = $row_recordset32['edad_cliente'];
  $profesion_cliente = $row_recordset32['profesion_cliente'];
  $acompananteFamiliar = $row_recordset32['acompananteFamiliar'];
  $telefono_acompanante = $row_recordset32['telefono_acompanante'];
  $parentesco_acompanante = $row_recordset32['parentesco_acompanante'];
  $antecedentes = $row_recordset32['antecedentes'];
  $fotoperfil = $row_recordset32['fotoperfil'];
  $tiposSangre = $row_recordset32['tiposSangre'];
  $esDonante = $row_recordset32['esDonante'];

  $tomaMedicamento = $row_recordset32['tomaMedicamento'];

  $fechaNacimiento = $row_recordset32['fechaNacimiento'];

  $entidadSalud     = $row_recordset32['entidadSalud'];
  $seguro           = $row_recordset32['seguro'];

  $nota           = $row_recordset32['nota'];
  $enfermedadesPequeno           = $row_recordset32['enfermedadesPequeno'];
  $alergias           = $row_recordset32['alergias'];
  $motivoConsulta           = $row_recordset32['motivoConsulta'];
  $tipo    = $row_recordset32['tipo_cliente'];
  $apellido_cliente  = $row_recordset32['apellido'];
  $departamento  = $row_recordset32['departamento'];
  $zona = $row_recordset32['zona'];
  $asignar = $row_recordset32['asignar'];
  $cod_dpto = $row_recordset32['cod_dpto'];
  $cod_municipio = $row_recordset32['cod_municipio'];
  $cod_entidad = $row_recordset32['cod_entidad'];



  $peso           = $row_recordset32['peso'];
  $altura           = $row_recordset32['altura'];
  $imc           = $row_recordset32['imc'];
  $ComposicionCorporal           = $row_recordset32['ComposicionCorporal'];




  $fechaNacimiento = $row_recordset32['fechaNacimiento'];


  $ap1 = $row_recordset32['ap1'];
  $ap2 = $row_recordset32['ap2'];
  $ap3 = $row_recordset32['ap3'];
  $ap4 = $row_recordset32['ap4'];
  $ap5 = $row_recordset32['ap5'];
  $ap6 = $row_recordset32['ap6'];
  $ap7 = $row_recordset32['ap7'];
  $ap8 = $row_recordset32['ap8'];
  $ap9 = $row_recordset32['ap9'];

  $cirugiasCuales = $row_recordset32['cirugiasCuales'];
  $cirugiasOtros = $row_recordset32['cirugiasOtros'];

  $tipoUsuario = $row_recordset32['tipoUsuario'];
  $estado = $row_recordset32['estado'];



  $primer_nombre = $row_recordset32['primer_nombre'];
  $segundo_nombre = $row_recordset32['segundo_nombre'];
  $primer_apellido = $row_recordset32['primer_apellido'];
  $segundo_apellido = $row_recordset32['segundo_apellido'];
  $genero_asignado = $row_recordset32['genero_asignado'];
  $indicativo = $row_recordset32['indicativo'];
  $whatsapp = $row_recordset32['whatsapp'];
  $habeasdata = $row_recordset32['habeasdata'];

  $whatsapp =  substr($whatsapp, strlen($indicativo));
  $whatsapp = str_replace("/*0*/", "", $whatsapp);

  $ocupacion = $row_recordset32['ocupacion'];
  $nivel_educacion = $row_recordset32['nivel_educacion'];
  $entidadSalud = $row_recordset32['entidadSalud'];
  $prepagada = $row_recordset32['prepagada'];
  $sucursal = $row_recordset32['sucursal'];

  //$pais = $row_recordset32['pais'];

  $Codigo_Pais = $row_recordset32['codigo_pais'];
  $Codigo_Departamento = $row_recordset32['codigo_departamento'];
  $Codigo_Ciudad = $row_recordset32['codigo_ciudad'];
  $entidad_id = $row_recordset32['entidad_id'];
  $convenio_id = $row_recordset32['convenio_id'];
}



if (isset($_POST['btn-save'])) {


  $primer_nombre = $_POST['primer_nombre'];
  $segundo_nombre = $_POST['segundo_nombre'];
  $primer_apellido = $_POST['primer_apellido'];
  $segundo_apellido = $_POST['segundo_apellido'];
  $genero_asignado = $_POST['genero_asignado'];
  $indicativo = $_POST['indicativo'];
  $whatsapp = $_POST['whatsapp'];
  $habeasdata = $_POST['habeasdata'];

  //$whatsapp = str_replace($indicativo, "", $whatsapp);
  $whatsapp = $indicativo . $whatsapp;
  if ($habeasdata <> "Si") {
    $whatsapp = $whatsapp . "/*0*/";
    $habeasdata = "No";
  }

  $ocupacion = $_POST['ocupacion'];
  $nivel_educacion = $_POST['nivel_educacion'];
  $entidadSalud = $_POST['entidadSalud'];
  $prepagada = $_POST['prepagada'];
  $sucursal = $_POST['sucursal'];

  /*
        $pais = $_POST['pais'];
        $municipio_manual = reem($_POST['municipio_manual']);
        $departamento_manual = reem($_POST['departamento_manual']);

        
        $departamento1=$_POST['departamento'];
        echo $departamento1.'<br>';
        $departamento = funcionMaster($departamento1,'codigo','nombre','departamentos');
        if($departamento=="")
        {
            $departamento=$departamento_manual;
        }
        $ciudad_cliente1=$_POST['ciudad_cliente'];
        echo $ciudad_cliente1.'<br>';
        $ciudad_cliente = funcionMaster($ciudad_cliente1,'codigo','nombre','municipios');
        if($ciudad_cliente=="")
        {
            $ciudad_cliente=$municipio_manual;
        }
        */

  $codigo_pais = $_POST['pais'];
  $codigo_departamento = $_POST['departamento'];
  $codigo_ciudad = $_POST['ciudad'];

  $estado = $_POST['estado'];
  $cirugiasOtros = $_POST['cirugiasOtros'];





  $tipo = $_POST['tipo'];
  $apellido = $_POST['apellido'];

  $zona = $_POST['zona'];
  $asignar = $_POST['asignar'];
  $cliente_id = $_POST['cliente_id'];
  $usuario_id = $_POST['usuario_id'];
  $nombre_cliente = $primer_nombre . ' ' . $segundo_nombre . ' ' . $primer_apellido . ' ' . $segundo_apellido;
  $celular_cliente = $_POST['celular_cliente'];
  //$ciudad_cliente=$_POST['ciudad_cliente'];
  $correo_cliente = $_POST['correo_cliente'];
  $CODI_CLIENTE = $_POST['CODI_CLIENTE'];

  $id_uso_servicio = $_POST['id_uso_servicio'];

  $tipo_cliente = $_POST['tipo'];

  $fechar = $_POST['fechar'];

  //$fecha_actualizado=$_POST['fecha_actualizado'];
  //$activo=$_POST['activo'];

  $genero = $_POST['genero'];
  $direccion_cliente = $_POST['direccion_cliente'];
  $telefono_cliente = $_POST['telefono_cliente'];
  $edad_cliente = $_POST['edad_cliente'];
  $profesion_cliente = $_POST['profesion_cliente'];
  $acompananteFamiliar = $_POST['acompananteFamiliar'];
  $telefono_acompanante = $_POST['telefono_acompanante'];
  $parentesco_acompanante = $_POST['parentesco_acompanante'];
  $antecedentes = $_POST['antecedentes'];


  $fechaNacimiento = $_POST['fechaNacimiento'];
  $nacionalidad = $_POST['nacionalidad'];



  //$fotoperfil=$_POST['fotoperfil']; 

  $tiposSangre = $_POST['tiposSangre'];
  $esDonante = $_POST['esDonante'];
  $tomaMedicamento = $_POST['tomaMedicamento'];

  //$entidadSalud         =$_POST['entidadSalud']; 
  $seguro               = $_POST['seguro'];
  $nota                 = $_POST['nota'];
  $enfermedadesPequeno           = $_POST['enfermedadesPequeno'];
  $alergias           = $_POST['alergias'];
  //$whatsapp           =$_POST['whatsapp'];
  $tipoUsuario   = $_POST['tipoUsuario'];



  $peso = $_POST['peso'];
  $altura = $_POST['altura'];
  $imc = $_POST['imc'];
  $ComposicionCorporal = $_POST['ComposicionCorporal'];


  if ($peso == '') {
    $peso = '0';
    $altura = '0';
    $imc = '0';
    $ComposicionCorporal = 'no determinado';
  }


  $motivoConsulta           = $_POST['motivoConsulta'];



  $clienteId = $_POST['cliente_id'];
  $primer_nombre = trim($primer_nombre, ' ');
  $Usuario_Web = $primer_nombre . substr($CODI_CLIENTE, 0, -5);
  $Clave_Web = $CODI_CLIENTE . $clienteId;
  $entidad_id = $_POST['entidad'];
  if ($entidad_id == '') {
    $entidad_id = '0';
  }
  $convenio_id = $_POST['convenio'];
  if ($convenio_id == '') {
    $convenio_id = '0';
  }
  mysqli_query($conn3, "UPDATE cliente SET  Usuario_Web= '$Usuario_Web', Clave_Web='$Clave_Web'  WHERE cliente_id = '$clienteId'");

  if ($_FILES['imagen']['name'] <> "") {
    function fileExtension($s)
    {
      $n = strrpos($s, ".");
      return ($n === false) ? "" : substr($s, $n + 1);
    }

    $nombrer = $nombre_cliente . '_' . $clienteId . '.' . fileExtension($_FILES['imagen']['name']);
    $resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"], "pascientes/" . $nombrer);
    //  $resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);

    if (!empty($resultado)) {
      $queryCliente = "UPDATE cliente SET  fotoperfil= '$nombrer'  WHERE cliente_id = '$clienteId'";
      mysqli_query($conn3, $queryCliente) or die(mysql_error());
      //echo "UPDATE cliente SET  fotoperfil= '$nombrer'  WHERE cliente_id = '$clienteId'";
    }
  } else {
    define('UPLOAD_DIR', 'pascientes/');
    $img = $_POST['foto'];
    if ($img <> "") {
      $img = str_replace('data:image/png;base64,', '', $img);
      $img = str_replace(' ', '+', $img);
      $data = base64_decode($img);
      //$file = UPLOAD_DIR.uniqid().'.png';  //nombre del archivo
      $file = $nombre_cliente . rand(1, 9999) . '.png';
      $success = file_put_contents(UPLOAD_DIR . $file, $data);
      if (!empty($success)) {
        $queryCliente = "UPDATE cliente SET  fotoperfil= '$file'  WHERE cliente_id = '$clienteId'";
        mysqli_query($conn3, $queryCliente) or die(mysql_error());
      }
      //print $success ? $file : 'Unable to save the file.'; 
    }
  }

  $ap3 = $_POST['ap3'];
  if ($ap3 == '') {
    $ap3 = '0';
  }
  $ap4 = $_POST['ap4'];
  if ($ap4 == '') {
    $ap4 = '0';
  }
  $ap6 = $_POST['ap6'];
  if ($ap6 == '') {
    $ap6 = '0';
  }
  $ap7 = $_POST['ap7'];
  if ($ap7 == '') {
    $ap7 = '0';
  }

  mysqli_query($conn3, "UPDATE cliente SET 
    nombre_cliente='$nombre_cliente',
    primer_nombre='$primer_nombre',
    segundo_nombre='$segundo_nombre',
    primer_apellido='$primer_apellido',
    segundo_apellido='$segundo_apellido',
    genero_asignado='$genero_asignado',
    indicativo='$indicativo',
    ocupacion='$ocupacion',
    nivel_educacion='$nivel_educacion',
    prepagada='$prepagada',
    sucursal='$sucursal',
    celular_cliente='$celular_cliente',
    whatsapp='$whatsapp',
    correo_cliente='$correo_cliente',
    CODI_CLIENTE='$CODI_CLIENTE',
    tipo_cliente='$tipo_cliente', 
    genero= '$genero',
    direccion_cliente='$direccion_cliente',
    telefono_cliente='$telefono_cliente',
    edad_cliente='$edad_cliente',
    profesion_cliente='$profesion_cliente',
    acompananteFamiliar='$acompananteFamiliar',
    telefono_acompanante='$telefono_acompanante',
    parentesco_acompanante='$parentesco_acompanante',
    antecedentes='antecedentes',
    cod_entidad='$entidadSalud',
    tiposSangre = '$tiposSangre',
    tipoUsuario = '$tipoUsuario',
    nacionalidad = '$nacionalidad',
    esDonante = '$esDonante',
    tomaMedicamento = '$tomaMedicamento',
    nota = '$nota',
    enfermedadesPequeno = '$enfermedadesPequeno',
    alergias = '$alergias',
    motivoConsulta = '$motivoConsulta',
    seguro= '$seguro' ,
    fechaNacimiento = '$fechaNacimiento',
    peso = '$peso',
    altura = '$altura',
    imc = '$imc', 
    ciudad_cliente='$ciudad_cliente',
    estado='$estado',
    cirugiasOtros='$cirugiasOtros',
    zona= '$zona', 
    asignar= '$asignar', 
    apellido= '$apellido', 
    ComposicionCorporal = '$ComposicionCorporal',
    habeasdata='$habeasdata',
    codigo_pais='$codigo_pais',
    codigo_departamento='$codigo_departamento',
    entidad_id='$entidad_id',
    convenio_id='$convenio_id',
    codigo_ciudad='$codigo_ciudad'
    WHERE usuario_id = $usuario_id and cliente_id = $cliente_id");


  mysqli_query($conn3, "UPDATE cliente SET ap3 = '$ap3', ap4 = '$ap4', ap6 = '$ap6', ap7 = '$ap7' WHERE cliente_id = $cliente_id");

  mysqli_query($conn3, "UPDATE citas SET nombre= '$nombre_cliente', telefono= '$whatsapp', correo= '$correo_cliente' WHERE idCliente = '$cliente_id'");





  echo "<script language='Javascript'> window.location='Pacientes.php?msg=3';</script>";
}


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">

    <ol class="breadcrumb">
      <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
      <li><a href="patientes"> Pacientes</a></li>
      <li class="active"> Editar Paciente</li>
    </ol>
  </section>




  <br>
  <br>
  <br>

  <section class="content">

    <div class="box box-info" align="center">
      <br>
      <br>
      <div class="card-body">
        <h4 class="card-title">Editar paciente </h4>
        <br>


        <form action="editarPaciente" method="POST" name="formularioActualizarcliente" enctype="multipart/form-data">
          <div class="form-row">

            <div class="form-group col-md-3">
              <div align="left"> Tipo </div>

              <select id="tipo" name="tipo" class="form-control input-lg select" style="width: 100%;" required>
                <?php
                echo "<option selected>" . $tipo . "</option>";
                ?>
                <option value=""> Seleccione</option>
                <option value="RC"> RC - Registro Civil</option>
                <option value="TI"> TI - Tarjeta de identidad</option>
                <option value="CC"> CC - Cédula de ciudadanía</option>
                <option value="CE"> CE - Cédula de extranjería</option>
                <option value="PA"> PA - Pasaporte</option>
                <option value="MS"> MS - Menor sin identificación</option>
                <option value="AS"> AS - Adulto sin identidad</option>
                <option value="DNI"> DNI - cédula de identificación personal</option>
              </select>

            </div>

            <div class="form-group col-md-3">
              <div align="left"> Numero de Cedula o ID</div>
              <input type="text" class="form-control input-lg" name="CODI_CLIENTE" id="CODI_CLIENTE" placeholder="Cedula" required onChange="vercedula();" value="<?php echo $CODI_CLIENTE ?>">
              <div id="div-results"></div>
            </div>

            <div class="form-group col-md-4">
              <div align="left"> Fecha de nacimiento </div>
              <input type="date" class="form-control input-lg" id="fechaNacimiento" name="fechaNacimiento" placeholder="Edad" onChange="verEdad();" required value="<?php echo $fechaNacimiento ?>">
            </div>
            <div class="form-group col-md-2">
              <div align="left"> Edad <div id="div-edad"></div>
              </div>
            </div>

            <div class="form-group col-md-6">
              <div align="left"> Primer Nombre* </div>
              <input type="text" class="form-control input-lg" id="primer_nombre" name="primer_nombre" placeholder="Primer Nombre" required value="<?php echo $primer_nombre ?>">
            </div>

            <div class="form-group col-md-6">
              <div align="left"> Segundo Nombre </div>
              <input type="text" class="form-control input-lg" id="segundo_nombre" name="segundo_nombre" placeholder="Segundo Nombre" value="<?php echo $segundo_nombre ?>">
            </div>

            <div class="form-group col-md-6">
              <div align="left"> Primer Apellido* </div>
              <input type="text" class="form-control input-lg" id="primer_apellido" name="primer_apellido" placeholder="Primer Apellido" required value="<?php echo $primer_apellido ?>">
            </div>

            <div class="form-group col-md-6">
              <div align="left"> Segundo Apellido </div>
              <input type="text" class="form-control input-lg" id="segundo_apellido" name="segundo_apellido" placeholder="Segundo Apellido" value="<?php echo $segundo_apellido ?>">
            </div>

            <div class="form-group col-md-6">
              <div align="left"> Genero </div>
              <select id="genero" name="genero" class="form-control input-lg select" style="width: 100%;" required>
                <?php
                if ($genero <> "") :
                  echo '<option value="' . $genero . '"selected>' . genero_cliente($genero) . '</option>';
                else :
                  echo '<option value="" selected> Seleccione </option>';
                endif;
                ?>
                <option value="M">Masculino</option>
                <option value="F">Femenino</option>
                <option value="I">Indeterminado</option>
                <option value="O">Otro</option>
              </select>
            </div>

            <div class="form-group col-md-6">
              <div align="left"> Sexo asignado al nacer </div>
              <select id="genero_asignado" name="genero_asignado" class="form-control input-lg select" style="width: 100%;" required>
                <?php
                if ($genero_asignado <> "") :
                  echo '<option value="' . $genero_asignado . '"selected>' . $genero_asignado . '</option>';
                else :
                  echo '<option value="" selected> Seleccione </option>';
                endif;
                ?>

                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
                <option value="Intersexual">Intersexual</option>
                <option value="Otro">Otro</option>
              </select>
            </div>











            <div class="form-group col-md-6">
              <div align="left"> Nacionalidad </div>
              <input type="text" class="form-control input-lg" id="nacionalidad" name="nacionalidad" placeholder="nacionalidad" value="<?php echo $nacionalidad ?>">
            </div>

            <div class="form-group col-md-6">
              <div align="left"> Email </div>
              <input type="email" class="form-control input-lg" id="correo_cliente" name="correo_cliente" placeholder="Correo" value="<?php echo $correo_cliente ?>">
            </div>

            <!--
              <div class="col-md-4">
                <div align="left">  Pais </div>
                <select name="pais" id="pais"  class="form-control input-lg select" style="width: 100%;" onchange="paises(this.value);">
                  <?php
                  if ($pais <> "") :
                    echo '<option value="' . $pais . '"selected>' . $pais . '</option>';
                  else :
                    echo '<option value="" selected> Seleccione </option>';
                  endif;
                  ?>
                
                <option value="Afganistán" id="AF">Afganistán</option>
                <option value="Albania" id="AL">Albania</option>
                <option value="Alemania" id="DE">Alemania</option>
                <option value="Andorra" id="AD">Andorra</option>
                <option value="Angola" id="AO">Angola</option>
                <option value="Anguila" id="AI">Anguila</option>
                <option value="Antártida" id="AQ">Antártida</option>
                <option value="Antigua y Barbuda" id="AG">Antigua y Barbuda</option>
                <option value="Antillas holandesas" id="AN">Antillas holandesas</option>
                <option value="Arabia Saudí" id="SA">Arabia Saudí</option>
                <option value="Argelia" id="DZ">Argelia</option>
                <option value="Argentina" id="AR">Argentina</option>
                <option value="Armenia" id="AM">Armenia</option>
                <option value="Aruba" id="AW">Aruba</option>
                <option value="Australia" id="AU">Australia</option>
                <option value="Austria" id="AT">Austria</option>
                <option value="Azerbaiyán" id="AZ">Azerbaiyán</option>
                <option value="Bahamas" id="BS">Bahamas</option>
                <option value="Bahrein" id="BH">Bahrein</option>
                <option value="Bangladesh" id="BD">Bangladesh</option>
                <option value="Barbados" id="BB">Barbados</option>
                <option value="Bélgica" id="BE">Bélgica</option>
                <option value="Belice" id="BZ">Belice</option>
                <option value="Benín" id="BJ">Benín</option>
                <option value="Bermudas" id="BM">Bermudas</option>
                <option value="Bhután" id="BT">Bhután</option>
                <option value="Bielorrusia" id="BY">Bielorrusia</option>
                <option value="Birmania" id="MM">Birmania</option>
                <option value="Bolivia" id="BO">Bolivia</option>
                <option value="Bosnia y Herzegovina" id="BA">Bosnia y Herzegovina</option>
                <option value="Botsuana" id="BW">Botsuana</option>
                <option value="Brasil" id="BR">Brasil</option>
                <option value="Brunei" id="BN">Brunei</option>
                <option value="Bulgaria" id="BG">Bulgaria</option>
                <option value="Burkina Faso" id="BF">Burkina Faso</option>
                <option value="Burundi" id="BI">Burundi</option>
                <option value="Cabo Verde" id="CV">Cabo Verde</option>
                <option value="Camboya" id="KH">Camboya</option>
                <option value="Camerún" id="CM">Camerún</option>
                <option value="Canadá" id="CA">Canadá</option>
                <option value="Chad" id="TD">Chad</option>
                <option value="Chile" id="CL">Chile</option>
                <option value="China" id="CN">China</option>
                <option value="Chipre" id="CY">Chipre</option>
                <option value="Ciudad estado del Vaticano" id="VA">Ciudad estado del Vaticano</option>
                <option value="Colombia" id="CO">Colombia</option>
                <option value="Comores" id="KM">Comores</option>
                <option value="Congo" id="CG">Congo</option>
                <option value="Corea" id="KR">Corea</option>
                <option value="Corea del Norte" id="KP">Corea del Norte</option>
                <option value="Costa del Marfíl" id="CI">Costa del Marfíl</option>
                <option value="Costa Rica" id="CR">Costa Rica</option>
                <option value="Croacia" id="HR">Croacia</option>
                <option value="Cuba" id="CU">Cuba</option>
                <option value="Dinamarca" id="DK">Dinamarca</option>
                <option value="Djibouri" id="DJ">Djibouri</option>
                <option value="Dominica" id="DM">Dominica</option>
                <option value="Ecuador" id="EC">Ecuador</option>
                <option value="Egipto" id="EG">Egipto</option>
                <option value="El Salvador" id="SV">El Salvador</option>
                <option value="Emiratos Arabes Unidos" id="AE">Emiratos Arabes Unidos</option>
                <option value="Eritrea" id="ER">Eritrea</option>
                <option value="Eslovaquia" id="SK">Eslovaquia</option>
                <option value="Eslovenia" id="SI">Eslovenia</option>
                <option value="España" id="ES">España</option>
                <option value="Estados Unidos" id="US">Estados Unidos</option>
                <option value="Estonia" id="EE">Estonia</option>
                <option value="c" id="ET">Etiopía</option>
                <option value="Ex-República Yugoslava de Macedonia" id="MK">Ex-República Yugoslava de Macedonia</option>
                <option value="Filipinas" id="PH">Filipinas</option>
                <option value="Finlandia" id="FI">Finlandia</option>
                <option value="Francia" id="FR">Francia</option>
                <option value="Gabón" id="GA">Gabón</option>
                <option value="Gambia" id="GM">Gambia</option>
                <option value="Georgia" id="GE">Georgia</option>
                <option value="Georgia del Sur y las islas Sandwich del Sur" id="GS">Georgia del Sur y las islas Sandwich del Sur</option>
                <option value="Ghana" id="GH">Ghana</option>
                <option value="Gibraltar" id="GI">Gibraltar</option>
                <option value="Granada" id="GD">Granada</option>
                <option value="Grecia" id="GR">Grecia</option>
                <option value="Groenlandia" id="GL">Groenlandia</option>
                <option value="Guadalupe" id="GP">Guadalupe</option>
                <option value="Guam" id="GU">Guam</option>
                <option value="Guatemala" id="GT">Guatemala</option>
                <option value="Guayana" id="GY">Guayana</option>
                <option value="Guayana francesa" id="GF">Guayana francesa</option>
                <option value="Guinea" id="GN">Guinea</option>
                <option value="Guinea Ecuatorial" id="GQ">Guinea Ecuatorial</option>
                <option value="Guinea-Bissau" id="GW">Guinea-Bissau</option>
                <option value="Haití" id="HT">Haití</option>
                <option value="Holanda" id="NL">Holanda</option>
                <option value="Honduras" id="HN">Honduras</option>
                <option value="Hong Kong R. A. E" id="HK">Hong Kong R. A. E</option>
                <option value="Hungría" id="HU">Hungría</option>
                <option value="India" id="IN">India</option>
                <option value="Indonesia" id="ID">Indonesia</option>
                <option value="Irak" id="IQ">Irak</option>
                <option value="Irán" id="IR">Irán</option>
                <option value="Irlanda" id="IE">Irlanda</option>
                <option value="Isla Bouvet" id="BV">Isla Bouvet</option>
                <option value="Isla Christmas" id="CX">Isla Christmas</option>
                <option value="Isla Heard e Islas McDonald" id="HM">Isla Heard e Islas McDonald</option>
                <option value="Islandia" id="IS">Islandia</option>
                <option value="Islas Caimán" id="KY">Islas Caimán</option>
                <option value="Islas Cook" id="CK">Islas Cook</option>
                <option value="Islas de Cocos o Keeling" id="CC">Islas de Cocos o Keeling</option>
                <option value="Islas Faroe" id="FO">Islas Faroe</option>
                <option value="Islas Fiyi" id="FJ">Islas Fiyi</option>
                <option value="Islas Malvinas Islas Falkland" id="FK">Islas Malvinas Islas Falkland</option>
                <option value="Islas Marianas del norte" id="MP">Islas Marianas del norte</option>
                <option value="Islas Marshall" id="MH">Islas Marshall</option>
                <option value="Islas menores de Estados Unidos" id="UM">Islas menores de Estados Unidos</option>
                <option value="Islas Palau" id="PW">Islas Palau</option>
                <option value="Islas Salomón" d="SB">Islas Salomón</option>
                <option value="Islas Tokelau" id="TK">Islas Tokelau</option>
                <option value="Islas Turks y Caicos" id="TC">Islas Turks y Caicos</option>
                <option value="Islas Vírgenes EE.UU." id="VI">Islas Vírgenes EE.UU.</option>
                <option value="Islas Vírgenes Reino Unido" id="VG">Islas Vírgenes Reino Unido</option>
                <option value="Israel" id="IL">Israel</option>
                <option value="Italia" id="IT">Italia</option>
                <option value="Jamaica" id="JM">Jamaica</option>
                <option value="Japón" id="JP">Japón</option>
                <option value="Jordania" id="JO">Jordania</option>
                <option value="Kazajistán" id="KZ">Kazajistán</option>
                <option value="Kenia" id="KE">Kenia</option>
                <option value="Kirguizistán" id="KG">Kirguizistán</option>
                <option value="Kiribati" id="KI">Kiribati</option>
                <option value="Kuwait" id="KW">Kuwait</option>
                <option value="Laos" id="LA">Laos</option>
                <option value="Lesoto" id="LS">Lesoto</option>
                <option value="Letonia" id="LV">Letonia</option>
                <option value="Líbano" id="LB">Líbano</option>
                <option value="Liberia" id="LR">Liberia</option>
                <option value="Libia" id="LY">Libia</option>
                <option value="Liechtenstein" id="LI">Liechtenstein</option>
                <option value="Lituania" id="LT">Lituania</option>
                <option value="Luxemburgo" id="LU">Luxemburgo</option>
                <option value="Macao R. A. E" id="MO">Macao R. A. E</option>
                <option value="Madagascar" id="MG">Madagascar</option>
                <option value="Malasia" id="MY">Malasia</option>
                <option value="Malawi" id="MW">Malawi</option>
                <option value="Maldivas" id="MV">Maldivas</option>
                <option value="Malí" id="ML">Malí</option>
                <option value="Malta" id="MT">Malta</option>
                <option value="Marruecos" id="MA">Marruecos</option>
                <option value="Martinica" id="MQ">Martinica</option>
                <option value="Mauricio" id="MU">Mauricio</option>
                <option value="Mauritania" id="MR">Mauritania</option>
                <option value="Mayotte" id="YT">Mayotte</option>
                <option value="México" id="MX">México</option>
                <option value="Micronesia" id="FM">Micronesia</option>
                <option value="Moldavia" id="MD">Moldavia</option>
                <option value="Mónaco" id="MC">Mónaco</option>
                <option value="Mongolia" id="MN">Mongolia</option>
                <option value="Montserrat" id="MS">Montserrat</option>
                <option value="Mozambique" id="MZ">Mozambique</option>
                <option value="Namibia" id="NA">Namibia</option>
                <option value="Nauru" id="NR">Nauru</option>
                <option value="Nepal" id="NP">Nepal</option>
                <option value="Nicaragua" id="NI">Nicaragua</option>
                <option value="Níger" id="NE">Níger</option>
                <option value="Nigeria" id="NG">Nigeria</option>
                <option value="Niue" id="NU">Niue</option>
                <option value="Norfolk" id="NF">Norfolk</option>
                <option value="Noruega" id="NO">Noruega</option>
                <option value="Nueva Caledonia" id="NC">Nueva Caledonia</option>
                <option value="Nueva Zelanda" id="NZ">Nueva Zelanda</option>
                <option value="Omán" id="OM">Omán</option>
                <option value="Panamá" id="PA">Panamá</option>
                <option value="Papua Nueva Guinea" id="PG">Papua Nueva Guinea</option>
                <option value="Paquistán" id="PK">Paquistán</option>
                <option value="Paraguay" id="PY">Paraguay</option>
                <option value="Perú" id="PE">Perú</option>
                <option value="Pitcairn" id="PN">Pitcairn</option>
                <option value="Polinesia francesa" id="PF">Polinesia francesa</option>
                <option value="Polonia" id="PL">Polonia</option>
                <option value="Portugal" id="PT">Portugal</option>
                <option value="Puerto Rico" id="PR">Puerto Rico</option>
                <option value="Qatar" id="QA">Qatar</option>
                <option value="Reino Unido" id="UK">Reino Unido</option>
                <option value="República Centroafricana" id="CF">República Centroafricana</option>
                <option value="República Checa" id="CZ">República Checa</option>
                <option value="República de Sudáfrica" id="ZA">República de Sudáfrica</option>
                <option value="República Democrática del Congo Zaire" id="CD">República Democrática del Congo Zaire</option>
                <option value="República Dominicana" id="DO">República Dominicana</option>
                <option value="Reunión" id="RE">Reunión</option>
                <option value="Ruanda" id="RW">Ruanda</option>
                <option value="Rumania" id="RO">Rumania</option>
                <option value="Rusia" id="RU">Rusia</option>
                <option value="Samoa" id="WS">Samoa</option>
                <option value="Samoa occidental" id="AS">Samoa occidental</option>
                <option value="San Kitts y Nevis" id="KN">San Kitts y Nevis</option>
                <option value="San Marino" id="SM">San Marino</option>
                <option value="San Pierre y Miquelon" id="PM">San Pierre y Miquelon</option>
                <option value="San Vicente e Islas Granadinas" id="VC">San Vicente e Islas Granadinas</option>
                <option value="Santa Helena" id="SH">Santa Helena</option>
                <option value="Santa Lucía" id="LC">Santa Lucía</option>
                <option value="Santo Tomé y Príncipe" id="ST">Santo Tomé y Príncipe</option>
                <option value="Senegal" id="SN">Senegal</option>
                <option value="Serbia y Montenegro" id="YU">Serbia y Montenegro</option>
                <option value="Sychelles" id="SC">Seychelles</option>
                <option value="Sierra Leona" id="SL">Sierra Leona</option>
                <option value="Singapur" id="SG">Singapur</option>
                <option value="Siria" id="SY">Siria</option>
                <option value="Somalia" id="SO">Somalia</option>
                <option value="Sri Lanka" id="LK">Sri Lanka</option>
                <option value="Suazilandia" id="SZ">Suazilandia</option>
                <option value="Sudán" id="SD">Sudán</option>
                <option value="Suecia" id="SE">Suecia</option>
                <option value="Suiza" id="CH">Suiza</option>
                <option value="Surinam" id="SR">Surinam</option>
                <option value="Svalbard" id="SJ">Svalbard</option>
                <option value="Tailandia" id="TH">Tailandia</option>
                <option value="Taiwán" id="TW">Taiwán</option>
                <option value="Tanzania" id="TZ">Tanzania</option>
                <option value="Tayikistán" id="TJ">Tayikistán</option>
                <option value="Territorios británicos del océano Indico" id="IO">Territorios británicos del océano Indico</option>
                <option value="Territorios franceses del sur" id="TF">Territorios franceses del sur</option>
                <option value="Timor Oriental" id="TP">Timor Oriental</option>
                <option value="Togo" id="TG">Togo</option>
                <option value="Tonga" id="TO">Tonga</option>
                <option value="Trinidad y Tobago" id="TT">Trinidad y Tobago</option>
                <option value="Túnez" id="TN">Túnez</option>
                <option value="Turkmenistán" id="TM">Turkmenistán</option>
                <option value="Turquía" id="TR">Turquía</option>
                <option value="Tuvalu" id="TV">Tuvalu</option>
                <option value="Ucrania" id="UA">Ucrania</option>
                <option value="Uganda" id="UG">Uganda</option>
                <option value="Uruguay" id="UY">Uruguay</option>
                <option value="Uzbekistán" id="UZ">Uzbekistán</option>
                <option value="Vanuatu" id="VU">Vanuatu</option>
                <option value="Venezuela" id="VE">Venezuela</option>
                <option value="Vietnam" id="VN">Vietnam</option>
                <option value="Wallis y Futuna" id="WF">Wallis y Futuna</option>
                <option value="Yemen" id="YE">Yemen</option>
                <option value="Zambia" id="ZM">Zambia</option>
                <option value="Zimbabue" id="ZW">Zimbabue</option>
                </select>
              </div>

              <div class="form-group col-md-4" style="margin: auto;">
                <div align="left">Departamento </div>

                <?php echo 'la opcion actual es:' . $departamento; ?>
                 <input  type="hidden" name="departamento_manual" value="<?php echo $departamento; ?>">

                <div class="col-md-12" id="departamento_div_select">
                <select name="departamento" id="departamento" class="form-control select2" style="width: 100%;" >
                  <?php
                  if ($cod_dpto <> "") :
                    echo '<option value="' . $cod_dpto . '"selected>' . $departamento . '</option>';
                  else :
                    echo '<option value="" selected> Seleccione </option>';
                  endif;
                  ?>
                  <?php
                  $queryList = mysqli_query($conn3, "SELECT * FROM departamentos");


                  $nrowl = mysqli_num_rows($queryList);
                  while ($row_recordset32A = mysqli_fetch_array($queryList)) {
                    $cod = $row_recordset32A['codigo'];
                    $nombre = $row_recordset32A['nombre'];


                    echo "<option value='$cod'> $nombre </option>";
                  }

                  ?>



                </select>
                </div>

                <div class="col-md-12" id="departamento_div">

                </div>



              </div>
              
               
              <div class="form-group col-md-4" style="margin: auto;">
                <div align="left">Municipio </div>

                <?php echo 'la opcion actual es:' . $ciudad_cliente; ?>
                <input  type="hidden" name="municipio_manual" value="<?php echo $ciudad_cliente; ?>">
                <div class="col-md-12" id="municipio_div_select">
                <select id="ciudad_cliente" name="ciudad_cliente" class="form-control select2" style="width: 100%;" >
                    <?php
                    if ($cod_municipio <> "") :
                      echo '<option value="' . $cod_municipio . '"selected>' . $ciudad_cliente . '</option>';
                    else :
                      echo '<option value="" selected> Seleccione </option>';
                    endif;
                    ?>
                  <?php
                  $queryList = mysqli_query($conn3, "SELECT * FROM  municipios");


                  $nrowl = mysqli_num_rows($queryList);
                  while ($row_recordset32A = mysqli_fetch_array($queryList)) {
                    $cod = $row_recordset32A['codigo'];
                    $nombre = $row_recordset32A['nombre'];


                    echo "<option value='$cod'> $nombre </option>";
                  }

                  ?>



                </select>
                </div>

                <div class="col-md-12" id="municipio_div">

                </div>
              -->


            <div class="col-md-4" id="pais_div">
              <div align="left"> Pais </div>
              <select name="pais" id="pais" class="form-control input-lg select2" style="width: 100%;" onchange="paises(this.value);">
                <option value="<?php echo $Codigo_Pais; ?>"><?php echo funcionMaster($Codigo_Pais, 'Codigo', 'Pais', 'Paises'); ?></option>

                <?php
                //            where / value del option / texto del option / tabla
                echo selectMaster("", "Codigo", "Pais", "Paises");
                ?>

              </select>
            </div>

            <div class="col-md-4">
              <div align="left"> Ciudad </div>
              <select name="ciudad" id="ciudad" class="form-control input-lg select2" style="width: 100%;">

              </select>
            </div>




            <div class="form-group col-md-4">
              <div align="left">Zona residencial </div>

              <select id="zona" name="zona" class="form-control input-lg select" style="width: 100%;">
                <?php
                if ($zona <> "") :
                  echo '<option value="' . $zona . '"selected>' . $zona . '</option>';
                else :
                  echo '<option value="" selected> Seleccione </option>';
                endif;
                ?>
                <option>Urbana</option>
                <option>Rural</option>

              </select>

            </div>

            <div class="form-group col-md-4">
              <div align="left"> Dirección </div>
              <input type="text" class="form-control input-lg" id="direccion_cliente" name="direccion_cliente" placeholder="Direccion" value="<?php echo $direccion_cliente ?>">
            </div>






            <div class="form-group col-md-4">
              <div align="left"> Estado civil </div>

              <select id="estado" name="estado" class="form-control input-lg select" style="width: 100%;">
                <?php
                if ($estado <> "") :
                  echo '<option value="' . $estado . '"selected>' . $estado . '</option>';
                else :
                  echo '<option value="" selected> Seleccione </option>';
                endif;
                ?>
                <option>Casado(a)</option>
                <option>Soltero(a)</option>
                <option>Viudo(a)</option>
                <option>Menor de edad</option>
                <option>Separado(a)</option>
                <option>Union Libre</option>
                <option>Otro(a)</option>

              </select>

            </div>


          </div>
          <div class="form-group col-md-4">
            <div align="left"> Numero de Teléfono</div>
            <input type="text" class="form-control input-lg" id="telefono_cliente" name="telefono_cliente" placeholder="Telefono" value="<?php echo $telefono_cliente ?>">
          </div>
          <div class="form-group col-md-4">
            <div align="left"> Numero de Celular </div>
            <input type="number" class="form-control input-lg" id="celular_cliente" name="celular_cliente" placeholder="Celular" value="<?php echo $celular_cliente ?>">
          </div>



          <div class="form-group col-md-4" style="">
            <div class="form-group col-md-3" style="margin-bottom: auto;">
              <div align="left">
                <font color="green"> <strong>Indicativo</strong> </font>
              </div>
              <select id="indicativo" name="indicativo" class="form-control select2" style="width: 100%;">
                <?php
                if ($indicativo <> "") :
                  echo '<option value="' . $indicativo . '"selected>' . $indicativo . '</option>';
                else :
                  echo '<option value="" selected> Seleccione </option>';
                endif;
                ?>
                <?php
                $queryList = mysqli_query($conn3, "SELECT * FROM  indicativos");
                $nrowl = mysqli_num_rows($queryList);
                while ($row_recordset32A = mysqli_fetch_array($queryList)) {
                  $nombre = $row_recordset32A['nombre'];
                  $numero = $row_recordset32A['numero'];


                  echo "<option value='$numero'> $numero - $nombre </option>";
                }

                ?>
              </select>
            </div>

            <div class="form-group col-md-9" style="margin-bottom: auto;">
              <div align="left">
                <font color="green"> <strong>Numero de Celular notificaciones Whatsapp</strong></font>
              </div>
              <input type="number" class="form-control input-lg" id="Whatsapp" name="whatsapp" placeholder="" value="<?php echo $whatsapp ?>">
            </div>

          </div>

          <div class="form-group col-md-12" align="center">
            <input type="checkbox" name="habeasdata" value="Si" <?php if ($habeasdata == "Si") {
                                                                  echo "checked";
                                                                } ?>> <label>Autoriza recibir comunicaciones (Habeas Data)</label></input>
          </div>


          <div class="form-group col-md-4">
            <div align="left"> Profesión </div>
            <input type="text" class="form-control input-lg" id="profesion_cliente" name="profesion_cliente" placeholder="Profesion" value="<?php echo $profesion_cliente ?>">
          </div>


          <div class="form-group col-md-2">
            <div align="left">Es Donante </div>

            <select id="esDonante" name="esDonante" class="form-control input-lg select" style="width: 100%;">
              <?php
              if ($esDonante <> "") :
                echo '<option value="' . $esDonante . '"selected>' . $esDonante . '</option>';
              else :
                echo '<option value="" selected> Seleccione </option>';
              endif;
              ?>
              <option>Si</option>
              <option>No</option>

            </select>

          </div>
          <div class="form-group col-md-2">
            <div align="left"> Tipo de Sangre </div>

            <select class="form-control input-lg select" name="tiposSangre">
              <?php
              if ($tiposSangre <> "") :
                echo '<option value="' . $tiposSangre . '"selected>' . $tiposSangre . '</option>';
              else :
                echo '<option value="" selected> Seleccione </option>';
              endif;
              ?>
              <option>No definido</option>
              <option>O NEGATIVO</option>

              <option>O POSITIVO</option>

              <option>A NEGATIVO</option>

              <option>A POSITIVO </option>

              <option>B NEGATIVO</option>

              <option>B POSITIVO </option>

              <option>AB NEGATIVO</option>
              <option>AB POSITIVO</option>

            </select>

          </div>


          </select>
      </div>
      <div class="form-group col-md-4">
        <div align="left">Seguro </div>
        <input type="text" class="form-control input-lg" id="seguro" name="seguro" placeholder="seguro" value="<?php echo $seguro ?>">
      </div>






      <div class="form-group col-md-4">
        <div align="left">Sucursal del Paciente</div>

        <select id="sucursal" name="sucursal" class="form-control input-lg select" style="width: 100%;">
          <?php
          if ($sucursal <> "") :
            echo sucursalesNombre($sucursal);
          else :
            echo '<option value="" selected> Seleccione </option>';
          endif;
          ?>
          <?php sucursalesSelect($_SESSION['ID']);  ?>

        </select>

      </div>







      <div class="form-group col-md-12">
        <hr>
        <h4> Seguridad social y afiliación </h4>
      </div>

      <div class="form-group col-md-4">
        <div align="left">Tipo Afiliado</div>
        <select class="form-control input-lg select" name="tipoUsuario">
          <?php
          if ($tipoUsuario <> "") :
            echo '<option value="' . $tipoUsuario . '"selected>' . $tipoUsuario . '</option>';
          else :
            echo '<option value="" selected> Seleccione </option>';
          endif;
          ?>
          <option>Contributivo</option>
          <option>Subsidiado</option>
          <option>Vinculado</option>
          <option>Particular</option>
          <option>Otro</option>
          <option>Desplazado con afiliación al Régimen Contributivo</option>
          <option>Desplazado con afiliación al Régimen Subsidiado</option>
          <option>Desplazado no asegurado (Vinculado)</option>
          <option>Regímenes de Excepción</option>
          <option>Régimen Especial</option>
          <option>Otro</option>
        </select>
      </div>

      <!-- <div class="form-group col-md-4">
        <div align="left">Nivel de Educacion</div>
        <select class="form-control input-lg select" name="nivel_educacion">
          <?php
          if ($nivel_educacion <> "") :
            echo '<option value="' . $nivel_educacion . '"selected>' . $nivel_educacion . '</option>';
          else :
            echo '<option value="" selected> Seleccione </option>';
          endif;
          ?>
          <option>No Definido</option>
          <option>Preescolar</option>
          <option>Basica Primaria</option>
          <option>Basica Secundaria</option>
          <option>Basica Secundaria (Bachillerato Basico)</option>
          <option>Media Academica o Clasica (Bachillerato Basico)</option>
          <option>Media Tecnica (Bachillerato Tecnico)</option>
          <option>Normalista</option>
          <option>Tecnica Profesional</option>
          <option>Tecnologica</option>
          <option>Profesional</option>
          <option>Especializacion</option>
          <option>Maestria</option>
          <option>Doctorado</option>
          <option>Desconocido</option>
          <option>Ninguno</option>
        </select>
      </div> -->

      <!-- <div class="form-group col-md-4">
        <div align="left"> Ocupación(En qué trabaja) </div>
        <input type="text" class="form-control input-lg" id="ocupacion" name="ocupacion" placeholder="ocupacion" value="<?php echo $ocupacion ?>">
      </div> -->
      <div class="form-group col-md-4" style="margin: auto;">
        <div align="left">Entidad de Salud </div>
        <select id="cie" name="entidad" class="form-control select2" style="width: 100%;" onchange="Convenio(this.value)">
          <option value="<?= $entidad_id; ?>" selected="selected"><?= funcionMaster($entidad_id, 'id', 'Nombre', 'Rips_Entidades'); ?></option>
          <?php
          $queryList = mysqli_query($conn3, "SELECT * FROM Rips_Entidades");
          while ($RowMotorizado = mysqli_fetch_array($queryList)) {
            $id = $RowMotorizado['id'];
            $Nombre = $RowMotorizado['Nombre'];

            echo "<option value='$id'> $Nombre </option>";
          }
          ?>
        </select>
      </div>

      <div class="form-group col-md-4" style="margin: auto;">
        <div align="left">Convenio</div>
        <select id="convenio" name="convenio" class="form-control select2" style="width: 100%;">
        </select>
      </div>
      <!-- <div class="form-group col-md-4" style="margin: auto;">
        <div align="left">Entidad de Salud </div>

        <select id="cie" name="entidadSalud" class="form-control select2" style="width: 100%;">
          <?php
          if ($cod_entidad <> "") :
            echo '<option value="' . $cod_entidad . '"selected>' . funcionMaster($cod_entidad, 'codigo', 'nombre', 'administradora') . '</option>';
          else :
            echo '<option value="" selected> Seleccione </option>';
          endif;
          ?>
          <?php
          $queryList = mysqli_query($conn3, "SELECT * FROM administradora");


          $nrowl = mysqli_num_rows($queryList);
          while ($row_recordset32A = mysqli_fetch_array($queryList)) {
            $cod = $row_recordset32A['codigo'];
            $nombre = $row_recordset32A['nombre'];


            echo "<option value='$cod'>$cod -- $nombre </option>";
          }

          ?>



        </select>
      </div> -->

      <div class="form-group col-md-4">
        <div align="left">Prepagada</div>
        <select class="form-control input-lg select" name="prepagada">
          <?php
          if ($prepagada <> "") :
            echo '<option value="' . $prepagada . '"selected>' . $prepagada . '</option>';
          else :
            echo '<option value="" selected> Seleccione </option>';
          endif;
          ?>
          <option>Allianz</option>
          <option>AXA Colpatria</option>
          <option>Colmedica</option>
          <option>Colsanitas</option>
          <option>Coomeva Medicina Prepagada</option>
          <option>Medisanitas</option>
          <option>MetLife</option>
          <option>Salud Sura</option>
          <option>Suramericana</option>
          <option>Humano</option>
          <option>Senasa</option>
          <option>Palic</option>
          <option>Universal</option>
          <option>Reserva</option>
          <option>Futura</option>
          <option>Monumental</option>
          <option>Renacer</option>
          <option>Seguros Bolivar</option>
          <option>Colmena Seguros</option>
          <option>Compañía de seguros de vida Aurora</option>
          <option>Liberty Seguros de Vida</option>
          <option>MAFRE Seguros</option>
          <option>Positiva</option>
          <option>Seguros de Vida Alfa</option>
          <option>Suratep</option>
          <option>Medplus</option>
          <option>Famisanar PAC</option>
          <option>Compensar PAC</option>
          <option>Panamerican</option>
          <option>Generali</option>
          <option>Probienestar S.A.S</option>
          <option>Foca PLUS</option>
          <option>Ninguno</option>
        </select>
      </div>





      <div class="form-group col-md-12">
        <hr>
        <h4> Acudiente </h4>
      </div>

      <div class="form-group col-md-4">
        <div align="left">Nombre Acompañante Familiar </div>
        <input type="text" class="form-control input-lg" id="acompananteFamiliar" name="acompananteFamiliar" placeholder="Acompanante Familiar" maxlength="80" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" value="<?php echo $acompananteFamiliar ?>">
      </div>
      <div class="form-group col-md-4">
        <div align="left">Teléfono Acompañante</div>
        <input type="text" class="form-control input-lg" id="telefono_acompanante" name="telefono_acompanante" placeholder="Telefono Acompanante" maxlength="20" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" value="<?php echo $telefono_acompanante ?>">
      </div>


      <div class="form-group col-md-4">
        <div align="left">Parentesco</div>
        <input type="text" class="form-control input-lg" id="parentesco_acompanante" name="parentesco_acompanante" placeholder="Parentesco Acompanante" maxlength="20" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" value="<?php echo $parentesco_acompanante ?>">
      </div>

      <!--<div class="form-group col-md-12">
                <div align="left">Asignar a:</div>
                <input type="text" class="form-control input-lg" name="asignar" placeholder=""  maxlength="20" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"> 
              </div>-->














      <div class="form-group col-md-12">
        <hr>
        <h4> Antecedentes Personales </h4>
      </div>
      <!--
    <div class="form-group col-md-12">
        <div align="left">Medicamento que toma</div>
        <input value="<?php echo $tomaMedicamento; ?> "type="text" class="form-control input-lg" id="tomaMedicamento" name="tomaMedicamento" placeholder="toma Medicamento">
    </div>
-->


      <div class="form-group col-md-3" align="right">
        HTA


        <?php
        if ($ap3 == '1') { ?>
          <input value="1" type="radio" name="ap3" id="lt" class="flat-red" checked="true" /> SI
          <input value="0" type="radio" name="ap3" id="lt" class="flat-red" /> NO
        <?php
        } elseif ($ap3 == '0') { ?>
          <input value="1" type="radio" name="ap3" id="lt" class="flat-red" /> SI
          <input value="0" type="radio" name="ap3" id="lt" class="flat-red" checked="true" /> NO
        <?php } ?>


      </div>

      <div class="form-group col-md-3" align="right">
        Diabetes


        <?php
        if ($ap4 == '1') { ?>
          <input value="1" type="radio" name="ap4" id="lt" class="flat-red" checked="true" /> SI
          <input value="0" type="radio" name="ap4" id="lt" class="flat-red" /> NO
        <?php
        } elseif ($ap4 == '0') { ?>
          <input value="1" type="radio" name="ap4" id="lt" class="flat-red" /> SI
          <input value="0" type="radio" name="ap4" id="lt" class="flat-red" checked="true" /> NO
        <?php } ?>



      </div>



      <div class="form-group col-md-3" align="right">
        Cigarrillo


        <?php
        if ($ap6 == '1') { ?>
          <input value="1" type="radio" name="ap6" id="lt" class="flat-red" checked="true" /> SI
          <input value="0" type="radio" name="ap6" id="lt" class="flat-red" /> NO
        <?php
        } elseif ($ap6 == '0') { ?>
          <input value="1" type="radio" name="ap6" id="lt" class="flat-red" /> SI
          <input value="0" type="radio" name="ap6" id="lt" class="flat-red" checked="true" /> NO
        <?php } ?>



      </div>

      <div class="form-group col-md-3" align="right">
        Licor



        <?php
        if ($ap7 == '1') { ?>
          <input value="1" type="radio" name="ap7" id="lt" class="flat-red" checked="true" /> SI
          <input value="0" type="radio" name="ap7" id="lt" class="flat-red" /> NO
        <?php
        } elseif ($ap7 == '0') { ?>
          <input value="1" type="radio" name="ap7" id="lt" class="flat-red" /> SI
          <input value="0" type="radio" name="ap7" id="lt" class="flat-red" checked="true" /> NO
        <?php } ?>




      </div>




      <div class="form-group col-md-6" align="right">
        <div align="left"> Otros </div>
        <input value="<?php echo $cirugiasOtros; ?> " type="text" class="form-control input-lg" id="cirugiasOtros" name="cirugiasOtros" placeholder="Cirugías" maxlength="80" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
      </div>

      <div class="form-group col-md-12">
        <div align="left">Alergias</div>
        <input value="<?php echo $alergias; ?> " type="text" class="form-control input-lg" id="alergias" name="alergias" placeholder="alergias">

      </div>


      <div class="form-group col-md-12">
        <div align="left">Medicamento que toma</div>
        <input value="<?php echo $tomaMedicamento; ?> " type="text" class="form-control input-lg" id="tomaMedicamento" name="tomaMedicamento" placeholder="toma Medicamento">
      </div>





      <div class="form-group col-md-12">
        <div align="left">Enfermedades Familiares</div>
        <input value="<?php echo $enfermedadesPequeno; ?>" type="text" class="form-control input-lg" id="enfermedadesPequeno" name="enfermedadesPequeno" placeholder="Enfermedades Familiares">



      </div>



      <div class="form-group col-md-12">
        <div align="left"> Notas Adicionales </div>


        <textarea id="nota" name="nota" class="textarea" placeholder="Notas Adicionales" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $nota; ?></textarea>
      </div>

      <div class="form-group col-md-12 " id="modulo_foto" style="border: groove;">
        <input type="hidden" id="foto_mostrada">
        <div class="form-group col-md-6">
          <p id="errorTxt"></p>
          <div>
            <video id="theVideo" autoplay style="width: 100%;height: 300px;border-style: ridge;"></video>
            <canvas id="theCanvas" style="width: 100%;height: 300px;border-style: ridge;background-color: antiquewhite;display:none"></canvas>
            <input type="hidden" id="foto" name="foto">
            <div id="visualizar" class="border border-compu rounded-lg border-2 justify-center text-center"></div>
          </div>
          <div class="botones_camara_pc">
            <select name="listaDeDispositivos" id="listaDeDispositivos" class="form-control input-lg select" onchange="Camara(this.value)">
              <option>Seleccione Camara</option>
            </select>
            <button type="button" id="btnCapture" class="btn btn-primary btn-sm" style="width: 90%;">Tomar Captura</button><button type="button" id="btnRemove" style="float: right;width: 10%;height: 30px;background-color: antiquewhite;border-radius: 0px 5px 5px 0px;border: snow;"><i class="fa fa-trash" aria-hidden="true"></i></button>
            <!--<button type="button" id="btnDownloadImage">Descargar Imagen</button>-->
            <br>
          </div>
        </div>
        <div class="form-group col-md-6">
          <br><br><br><br><br>
          <label for="file-input" class="text-compu icono">
            <i class="fas fa-camera-retro fa-10x" style="color: #3c8dbc;"></i>
            <p><i class="fas fa-arrow-right"></i><strong> Subir Foto de Perfil </strong><i class="fas fa-arrow-left"></i></p>
          </label>
          <input id="file-input" type="file" accept="image/*" capture="camera" name="imagen" style="display: none;" />
        </div>
      </div>


      <input type="hidden" name="ID_Doctor" class="form-control input-lg input-lg" value="<?php echo $_SESSION['ID']; ?> ">
      <input type="hidden" name="cliente_id" class="form-control input-lg input-lg" value="<?php echo $cliente_id; ?> ">
      <input type="hidden" name="usuario_id" class="form-control input-lg input-lg" value="<?php echo $usuario_id; ?> ">

      <input type="hidden" name="ID" value="<?php echo $_SESSION['ID'] ?>">

      <center><button type="submit" name="btn-save" id="btn-save" class="btn btn-block btn-primary btn-sm">Actualizar</button></center>

      <input type="hidden" name="tipo_cliente" valur="1">

      </form>
    </div>



</div>




</section>

<div class="modal fade in" id="myModal" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
        <div class="w-100 text-center justify-center" style="text-align: -webkit-center;">
          <p class="m-0">Recuerda</p>
          <p class="m-0"><small>Preferiblemente utilizar fondo blanco</small></p>
          <img class="img img-responsive w-100" src="Modulos_Estilos/Imagenes/imagenreferenciacamara.jpg">
          <p class="m-0">Esta es la manera correcta para tomar la foto</p>
          <button class="btn btn-default btn-compu" data-dismiss="modal" type="button">Ok</button>
        </div>
      </div>
    </div>
  </div>
</div>
<style>
  #visualizar>img {
    width: 100%;
  }

  @media only screen and (max-width: 750px) {
    .botones_camara_pc {
      display: none;
    }
  }
</style>

<?php //echo $mensaje_registro_patients;
?>

<!-- /.content -->
</div>
<!-- /.content-wrapper -->



<?php include 'footer.php' ?>

<script type="text/javascript">
  window.onload = () => {


    const llenarSelectConDispositivosDisponibles = () => {

      navigator
        .mediaDevices
        .enumerateDevices()
        .then(function(dispositivos) {
          const dispositivosDeVideo = [];
          dispositivos.forEach(function(dispositivo) {
            const tipo = dispositivo.kind;
            if (tipo === "videoinput") {
              dispositivosDeVideo.push(dispositivo);
            }
          });

          // Vemos si encontramos algún dispositivo, y en caso de que si, entonces llamamos a la función
          if (dispositivosDeVideo.length > 0) {
            // Llenar el select
            dispositivosDeVideo.forEach(dispositivo => {
              const option = document.createElement('option');
              option.value = dispositivo.deviceId;
              option.text = dispositivo.label;
              listaDeDispositivos.appendChild(option);
              console.log("$listaDeDispositivos => ", listaDeDispositivos)
            });
          }
        });
    }

    llenarSelectConDispositivosDisponibles();

  };

  //procedimiento para el icono/boton que se llama subir foto de perfil/ soluciona la toma de fotos en telefono
  //ya que este iinput reemplazara al otro modulo de camara ya que no funciona correctamente en telefonos
  //este no tiene la misma funcionalidad en pc.
  document.getElementById("file-input").onchange = function(e) {

    document.getElementById('visualizar').style.display = "block";

    document.getElementById('theCanvas').style.display = "none";
    document.getElementById('theVideo').style.display = "none";
    document.getElementById('foto').value = "";
    // Creamos el objeto de la clase FileReader
    let reader = new FileReader();
    // Leemos el archivo subido y se lo pasamos a nuestro fileReader
    reader.readAsDataURL(e.target.files[0]);
    // Le decimos que cuando este listo ejecute el código interno
    reader.onload = function() {
      let visualizar = document.getElementById('visualizar'),
        image = document.createElement('img');
      image.src = reader.result;
      visualizar.innerHTML = '';
      visualizar.append(image);
    };
  }
  document.getElementById("modulo_foto").onmouseover = function(e) {
    if (document.getElementById('foto_mostrada').value != "Mostrada") {
      $("#myModal").modal();
      document.getElementById('foto_mostrada').value = "Mostrada";
    }

  }

  function Camara(valor) {

    document.getElementById('visualizar').style.display = "none";
    document.getElementById('file-input').value = "";

    if (document.getElementById('theVideo').style.display == "none") {
      document.getElementById('theVideo').style.display = "block";
    }

    var videoWidth = 800;
    var videoHeight = 800;
    var videoTag = document.getElementById('theVideo');
    var canvasTag = document.getElementById('theCanvas');
    var btnCapture = document.getElementById("btnCapture");
    var btnRemove = document.getElementById("btnRemove");
    var btnDownloadImage = document.getElementById("btnDownloadImage");
    videoTag.setAttribute('width', videoWidth);
    videoTag.setAttribute('height', videoHeight);
    canvasTag.setAttribute('width', videoWidth);
    canvasTag.setAttribute('height', videoHeight);

    navigator.mediaDevices.getUserMedia({
      audio: false,
      video: {
        width: videoWidth,
        height: videoHeight,
        deviceId: valor
      }
    }).then(stream => {
      videoTag.srcObject = stream;
    }).catch(e => {
      document.getElementById('errorTxt').innerHTML = 'ERROR: ' + e.toString();
    });

    var canvasContext = canvasTag.getContext('2d');
    btnCapture.addEventListener("click", () => {

      if (document.getElementById('visualizar').style.display == "block") {
        document.getElementById('visualizar').style.display = "none";
        document.getElementById('file-input').value = "";
      }

      canvasContext.drawImage(videoTag, 0, 0, videoWidth, videoHeight);
      document.getElementById('foto').value = canvasTag.toDataURL();
      document.getElementById('theCanvas').style.display = "block";
      document.getElementById('theVideo').style.display = "none";
      //captura(canvasTag.toDataURL());
    });
    /*
    btnDownloadImage.addEventListener("click", () => {
        var link = document.createElement('a');
        link.download = 'capturedImage.png';
        link.href = canvasTag.toDataURL();
        link.click();
    });
    */
    btnRemove.addEventListener("click", () => {

      if (document.getElementById('visualizar').style.display == "block") {
        document.getElementById('visualizar').style.display = "none";
        document.getElementById('file-input').value = "";
      }

      document.getElementById('theCanvas').style.display = "none";
      document.getElementById('theVideo').style.display = "block";
      document.getElementById('foto').value = "";
    });
  }
</script>

<script type="text/javascript">
  /*
            var videoWidth = 800;
            var videoHeight = 800;
            var videoTag = document.getElementById('theVideo');
            var canvasTag = document.getElementById('theCanvas');
            var btnCapture = document.getElementById("btnCapture");
            var btnRemove = document.getElementById("btnRemove");
            var btnDownloadImage = document.getElementById("btnDownloadImage");
            videoTag.setAttribute('width', videoWidth);
            videoTag.setAttribute('height', videoHeight);
            canvasTag.setAttribute('width', videoWidth);
            canvasTag.setAttribute('height', videoHeight);
            window.onload = () => {
                navigator.mediaDevices.getUserMedia({
                    audio: false,
                    video: {
                        width: videoWidth,
                        height: videoHeight
                    }
                }).then(stream => {
                    videoTag.srcObject = stream;
                }).catch(e => {
                    document.getElementById('errorTxt').innerHTML = 'ERROR: ' + e.toString();
                });
                var canvasContext = canvasTag.getContext('2d');
                btnCapture.addEventListener("click", () => {
                    canvasContext.drawImage(videoTag, 0, 0, videoWidth, videoHeight);
                    document.getElementById('foto').value=canvasTag.toDataURL();
                    document.getElementById('theCanvas').style.display = "block";
                    document.getElementById('theVideo').style.display = "none";
                    //captura(canvasTag.toDataURL());
                });
                
                //btnDownloadImage.addEventListener("click", () => {
                //    var link = document.createElement('a');
                //    link.download = 'capturedImage.png';
                //    link.href = canvasTag.toDataURL();
                //    link.click();
                //});
                
                btnRemove.addEventListener("click", () => {
                    document.getElementById('theCanvas').style.display = "none";
                    document.getElementById('theVideo').style.display = "block";
                    document.getElementById('foto').value="";
                });
            };*/
</script>

<script type="text/javascript">
  function vercedula() {
    // estas son las variables que enviamos
    var CODI_CLIENTE = $("#CODI_CLIENTE").val();
    //CODI_CLIENTE = document.getElementById("CODI_CLIENTE").value;
    // aqui enviamos el mensaje por medio de un arreglo

    $.ajax({
      type: "POST",
      url: "consultardoc.php",
      data: {
        CODI_CLIENTE: CODI_CLIENTE
      },
      success: function(response) {
        $('#div-results').html(response);

      }
    });
  };


  function verEdad() {
    // estas son las variables que enviamos

    var fechaNacimiento = $("#fechaNacimiento").val();


    // aqui enviamos el mensaje por medio de un arreglo     

    $.ajax({
      type: "POST",
      url: "ajax_edad.php",
      data: {
        fechaNacimiento: fechaNacimiento
      },
      success: function(response) {
        $('#div-edad').html(response);

      }
    });
  };

  /*
  function paises(valor)
  {
    if(valor!="Colombia")
    {
          var texto = '<div class="col-md-12"><input type="text" class="form-control input-lg" id="departamento_manual" name="departamento_manual" placeholder="Escriba el Departamento"></div>';
        // aqui enviamos el mensaje por medio de un arreglo     
        document.getElementById("departamento_div").innerHTML=texto;

        var texto = '<div class="col-md-12"><input type="text" class="form-control input-lg" id="municipio_manual" name="municipio_manual" placeholder="Escriba la Ciudad"></div>';
        // aqui enviamos el mensaje por medio de un arreglo     
        document.getElementById("municipio_div").innerHTML=texto;

        document.getElementById("departamento_div_select").style.display = "none";
        document.getElementById("departamento").disabled = true;

        document.getElementById("municipio_div_select").style.display = "none";
        document.getElementById("ciudad_cliente").disabled = true;


    }
    else
    {
      var texto = '';
        // aqui enviamos el mensaje por medio de un arreglo     
        document.getElementById("departamento_div").innerHTML=texto;

        var texto = '';
        // aqui enviamos el mensaje por medio de un arreglo     
        document.getElementById("municipio_div").innerHTML=texto;

        document.getElementById("departamento_div_select").style.display = "block";
        document.getElementById("departamento").disabled = false;

        document.getElementById("municipio_div_select").style.display = "block";
        document.getElementById("ciudad_cliente").disabled = false;
    }
  }
  */

  function paises(valor) {
    if (valor == "CO") {

      var pais = document.getElementById('pais_div');

      var select = document.createElement("div");
      select.innerHTML = '<div align="left">  Departamento </div><select name="departamento" id="departamento"  class="form-control input-lg select2" onchange="departamento_ciudad(this.value)"style="width: 100%;"></select>'
      select.setAttribute('id', 'departamento_div');
      select.setAttribute('class', 'col-md-4');

      pais.insertAdjacentElement("afterend", select);
      //K.C

      $('#departamento').select2();

      $.ajax({
        type: "POST",
        url: "ajax_select.php",
        data: {
          where: "",
          value: "codigo",
          texto: "nombre",
          tabla: "departamentos"
        },
        success: function(response) {
          $('#departamento').html(response);
          cargardepartamento();

        }
      });

      $('#ciudad').empty();

    } else {

      $.ajax({
        type: "POST",
        url: "ajax_select.php",
        data: {
          where: "WHERE Codigo_Pais='" + valor + "'",
          value: "Nombre",
          texto: "Nombre_Tildes",
          tabla: "Ciudades"
        },
        success: function(response) {
          $('#ciudad').html(response);
          cargarciudad();

        }
      });

      var departamento = document.getElementById('departamento_div');
      if (typeof(departamento) != 'undefined' && departamento != null) {
        departamento.remove();
      }


    }
  }

  function departamento_ciudad(valor) {
    $.ajax({
      type: "POST",
      url: "ajax_select.php",
      data: {
        where: "WHERE Codigo_Departamento='" + valor + "'",
        value: "id",
        texto: "Nombre_Tildes",
        tabla: "Ciudades"
      },
      success: function(response) {
        $('#ciudad').html(response);
        cargarciudad();

      }
    });
  }

  var NuevoD = "Si";
  var NuevoC = "Si";

  function cargardepartamento() {
    if (NuevoD == "Si") {
      $("#departamento > option[value='<?php echo $Codigo_Departamento; ?>']").attr("selected", true);
      departamento_ciudad('<?php echo $Codigo_Departamento; ?>');
      NuevoD = "NO";
    }
  }

  function cargarciudad() {
    if (NuevoC == "Si") {
      $("#ciudad > option[value='<?php echo $Codigo_Ciudad; ?>']").attr("selected", true);
      NuevoC = "NO";
    }
  }

  paises('<?php echo $Codigo_Pais; ?>');

  function Convenio(valor) {
    //ajax para cargar los convenios
    $.ajax({
      type: "POST",
      url: "ajax_rips.php",
      data: {
        entidad: valor,
      },
      success: function(response) {
        $('#convenio').html(response);

      }
    });
  }
</script>

<script type="text/javascript">
  //$(window).on("load", function(){ $("#ciudad > option[value='<?php echo $Codigo_Ciudad; ?>']").attr("selected",true);$('#ciudad').select2(); });
</script>