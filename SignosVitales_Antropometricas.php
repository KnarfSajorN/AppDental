<?php
include 'header.php';
include 'menu.php';

$_POST = DatosIngresarMysqli($_POST);

// $cI=$_GET["cI"];
$cI = decrypt($_GET['cI']);
$usuario_id = $_SESSION['ID'];
$Nombre_Tabla = "SignosVitalesYAntropometria";

$tabladinamica = mysqli_query($conn3, "SHOW COLUMNS FROM {$Nombre_Tabla} WHERE Field = 'Creacion_Dinamica';");
$rowtabladinamica = mysqli_num_rows($tabladinamica); //verificar si es un tabla creada dinamicamente

if (isset($_POST['Guardar_Informacion_Pagina'])) {

  $Arreglo = $_POST['Arreglo'];
  $tabla = mysqli_query($conn3, "SHOW TABLES LIKE '{$Nombre_Tabla}'");
  $nrowtabla = mysqli_num_rows($tabla);
  if ($nrowtabla == 0) {
    foreach ($Arreglo as $key => $value) {
      $Campos .= "`{$key}` text DEFAULT '',";
    }
    $Campos = trim($Campos, ',');

    $query = "CREATE TABLE `{$Nombre_Tabla}` (
      `id` int(11) NOT NULL,
      `cliente_id` int(11) NOT NULL,
      `usuario_id` int(11) NOT NULL,
      `Fecha_Registro` date DEFAULT current_timestamp(),
      {$Campos},
      `Creacion_Dinamica` text DEFAULT '0'
    ) ENGINE=MyISAM DEFAULT CHARSET=latin1;";

    $creaciontabla = mysqli_query($conn3, $query);
    if (!$creaciontabla) {
      echo "<script language='Javascript'> alert('error en la creacion de la tabla');</script>";
    } else {
      mysqli_query($conn3, "ALTER TABLE `{$Nombre_Tabla}` ADD PRIMARY KEY (`id`);");
      mysqli_query($conn3, "ALTER TABLE `{$Nombre_Tabla}` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;");
    }
  } else {
    if ($rowtabladinamica == 1) {
      foreach ($Arreglo as $key => $value) {
        $Campo = mysqli_query($conn3, "show COLUMNS from {$Nombre_Tabla} WHERE Field = '{key}';");
        $nrowCampo = mysqli_num_rows($Campo);
        if ($nrowCampo == 0) {
          mysqli_query($conn3, "ALTER TABLE `{$Nombre_Tabla}` ADD `{$key}` TEXT NULL DEFAULT '';");
        }
      }
    }
  }

  foreach ($Arreglo as $key => $value) {
    $Nombre_Campo .= "{$key},";
    $Valor_Campo .= "'{$value}',";
  }
  $Nombre_Campo = trim($Nombre_Campo, ',');
  $Valor_Campo = trim($Valor_Campo, ',');

  $cliente_id = $_POST['cliente_id'];
  $usuario_id = $_POST['usuario_id'];

  if ($rowtabladinamica == 1) {
    $queryList = mysqli_query($conn3, "INSERT INTO {$Nombre_Tabla} (cliente_id, usuario_id,{$Nombre_Campo}) VALUES ('$cliente_id', '$usuario_id', {$Valor_Campo});");
  }

  // registrar info para graficos pediatria
  if ($_POST['Arreglo']["Peso_Corporal"] <> "" or $_POST['Arreglo']["Altura"] <> "" or $_POST['Arreglo']["IMC"] <> "" or $_POST['Arreglo']["Perimetro_Cefalico"] <> "") {
    $Grafico_Pediatria["Peso_Corporal"] = $_POST['Arreglo']["Peso_Corporal"];
    $Grafico_Pediatria["Altura"] = $_POST['Arreglo']["Altura"];
    $Grafico_Pediatria["IMC"] = $_POST['Arreglo']["IMC"];
    $Grafico_Pediatria["Perimetro_Cefalico"] = $_POST['Arreglo']["Perimetro_Cefalico"];
    $Grafico_Pediatria["Edad"] = $_POST['Edad'];

    foreach ($Grafico_Pediatria as $value) {
      $informacion_grafica .= "'{$value}',";
    }
    $informacion_grafica = trim($informacion_grafica, ',') . ",'0'";
    mysqli_query($conn3, "INSERT INTO  Grafica_Crecimiento (usuario_id,cliente_id,Peso, Altura, IMC, Perimetro_Cefalico, Edad, id_historia, Tipo_Historia) VALUES  ('$usuario_id','$cliente_id',{$informacion_grafica},'Pre Consulta');");
  }
  // cierre info para graficos pediatria

  $ruta = htmlentities($_SERVER['PHP_SELF']);
  if ($queryList !== true) {
    echo "<script language='Javascript'> window.location='{$ruta}?cI=" . urlencode(encrypt($cliente_id)) . "&error=Hubo Un Error Al Guardar Los Datos'</script>";
  } else {
    echo "<script language='Javascript'> window.location='{$ruta}?cI=" . urlencode(encrypt($cliente_id)) . "&msg=Se Guardaron Los Datos Correctamente'</script>";
  }
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if (isset($_POST['Actualizar_Informacion_Pagina'])) {
  $arreglo_id = $_POST['arreglo_id'];
  foreach ($_POST["Arreglo"] as $key => $value) {
    $Campos .= "{$key} = '{$value}',";
  }
  $Campos = trim($Campos, ',');

  if ($rowtabladinamica == 1 and $arreglo_id <> "") {
    $queryList = mysqli_query($conn3, "UPDATE {$Nombre_Tabla} SET {$Campos} WHERE id = '{$arreglo_id}' limit 1;");
  }

  $cliente_id = $_POST['cliente_id'];
  $usuario_id = $_POST['usuario_id'];


  if ($_POST['Edad'] <= "240") {
    // registrar info para graficos pediatria
    if ($_POST['Arreglo']["Peso_Corporal"] <> "" or $_POST['Arreglo']["Altura"] <> "" or $_POST['Arreglo']["IMC"] <> "" or $_POST['Arreglo']["Perimetro_Cefalico"] <> "") {
      $Grafico_Pediatria["Peso_Corporal"] = $_POST['Arreglo']["Peso_Corporal"];
      $Grafico_Pediatria["Altura"] = $_POST['Arreglo']["Altura"];
      $Grafico_Pediatria["IMC"] = $_POST['Arreglo']["IMC"];
      $Grafico_Pediatria["Perimetro_Cefalico"] = $_POST['Arreglo']["Perimetro_Cefalico"];
      $Grafico_Pediatria["Edad"] = $_POST['Edad'];

      foreach ($Grafico_Pediatria as $value) {
        $informacion_grafica .= "'{$value}',";
      }
      $informacion_grafica = trim($informacion_grafica, ',') . ",'0'";
      mysqli_query($conn3, "INSERT INTO  Grafica_Crecimiento (usuario_id,cliente_id,Peso, Altura, IMC, Perimetro_Cefalico, Edad, id_historia, Tipo_Historia) VALUES  ('$usuario_id','$cliente_id',{$informacion_grafica},'Pre Consulta');");
    }
    // cierre info para graficos pediatria
  }
  $ruta = htmlentities($_SERVER['PHP_SELF']);
  if ($queryList != true) {
    echo "<script language='Javascript'> window.location='{$ruta}?cI=" . urlencode(encrypt($cliente_id)) . "&error=Hubo Un Error Al Editar Los Datos'</script>";
  } else {
    echo "<script language='Javascript'> window.location='{$ruta}?cI=" . urlencode(encrypt($cliente_id)) . "&msg=Se Actualizaron Los Datos Correctamente'</script>";
  }
}

if (isset($_GET['cI'])) {
  // $id = $_GET['cI'];
  $id = decrypt($_GET['cI']);
  $queryList = mysqli_query($conn3, "SELECT * FROM  {$Nombre_Tabla} where cliente_id=$id limit 1");
  while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    foreach ($rowMotorizado as $key => $value) {
      $datos["$key"] = "$value";
    }

    $ExisteInformacion = 1;
    $idtabla = $rowMotorizado['id'];
  }
  $datos_json = json_encode($datos);
?>
<script>
window.onload = function() {
    var Arreglo = <?php echo $datos_json ?>;
    for (index in Arreglo) {
        if (document.getElementsByName("Arreglo[" + index + "]")[0] != undefined) {
            document.getElementsByName("Arreglo[" + index + "]")[0].value = Arreglo[index];
        }
        valor = Arreglo[index];
        if (index == "tipo") {
            console.log(valor);
            $("#tipo > option[value='" + valor + "']").attr("selected", true);
            $('#tipo').select2();
        }
        if (index == "paquete") {
            console.log(valor);
            $("#paquete > option[value='" + valor + "']").attr("selected", true);
            $('#paquete').select2();
        }
    }
};
</script>
<?php
}

if ($_GET["msg"] != "") {
  include "plugins/SweetAlert2K/AlertaCorrectaOperacion.php";
  echo "holaaa";
}
if ($_GET["error"] != "") {
  include "plugins/SweetAlert2K/AlertaErrorOperacion.php";
}

?>

<style type="text/css">
.select2-container .select2-selection--single {
    height: 45px !important;
    padding: 15px !important;
}
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#">Signos Vitales y Antropometría </a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="content">
                <h4 class="Titulo_Pagina"><a href="Pacientes.php"><i
                            class="fa-solid fa-arrow-up-from-bracket fa-rotate-270"></i></a> Signos Vitales y
                    Antropometría de <b><?php echo funcionMaster($cI, 'cliente_id', 'nombre_cliente', 'cliente'); ?></b>
                </h4>
                <div class="box">
                    <div class="box-body">
                        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']) . '?cI=' . encrypt($cI); ?>"
                            method="POST">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>Peso Corporal [kg]</label>
                                    <input type="number" name="Arreglo[Peso_Corporal]" id="KG_peso"
                                        class="form-control input-lg" onchange="IMC();" step="0.01">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Altura [cm]</label>
                                    <input type="number" name="Arreglo[Altura]" id="CM_altura"
                                        class="form-control input-lg" onchange="IMC();" step="0.01">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>IMC</label>
                                    <input type="number" name="Arreglo[IMC]" id="IMC_Paciente"
                                        class="form-control input-lg" step="0.01">
                                </div>
                                <script>
                                function IMC() {
                                    m1 = document.getElementById("KG_peso").value;
                                    m2 = document.getElementById("CM_altura").value;
                                    r = m1 / ((m2 / 100) * (m2 / 100));
                                    document.getElementById("IMC_Paciente").value = r.toFixed(2);
                                }
                                </script>

                                <div class="form-group col-md-4">
                                    <label>Perimetro Cefálico</label>
                                    <input type="number" name="Arreglo[Perimetro_Cefalico]"
                                        class="form-control input-lg" step="0.01">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Frecuencia Respiratoria</label>
                                    <input type="number" name="Arreglo[Frecuencia_Respiratoria]"
                                        class="form-control input-lg" step="0.01">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Frecuencia Cardíaca</label>
                                    <input type="number" name="Arreglo[Frecuencia_Cardiaca]"
                                        class="form-control input-lg" step="0.01">
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Presión Arterial Sistólica [mmHg]</label>
                                    <input type="number" name="Arreglo[Presion_Arterial_Sistolica]"
                                        onchange="CalculaPresionArterialMedia()" id="PresionArterialSistolica"
                                        class="form-control input-lg" step="0.01">
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Presión Arterial Diastólica [mmHg]</label>
                                    <input type="number" name="Arreglo[Presion_Arterial_Diastolica]"
                                        onchange="CalculaPresionArterialMedia()" id="PresionArterialDiastolica"
                                        class="form-control input-lg" step="0.01">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Tensión Arterial Media [mmHg]</label>
                                    <input type="number" name="Arreglo[Tension_Arterial_Media]"
                                        id="TensionArterialMedia" class="form-control input-lg" step="0.01">
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Temperatura Corporal [C°]</label>
                                    <input type="number" name="Arreglo[Temperatura_Corporal]"
                                        class="form-control input-lg" step="0.01">
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Saturación Oxígeno [%]</label>
                                    <input type="number" name="Arreglo[Saturacion_Oxigeno]"
                                        class="form-control input-lg" step="0.01">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Porcentaje de Grasa Corporal [%]</label>
                                    <input type="number" name="Arreglo[Porcentaje_Grasa_Corporal]"
                                        class="form-control input-lg" step="0.01">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Circunferencia Abdominal [cm]</label>
                                    <input type="number" name="Arreglo[Circunferencia_Abdominal]"
                                        class="form-control input-lg" step="0.01">
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Circunferencia de Cintura [cm]</label>
                                    <input type="number" name="Arreglo[Circunferencia_Cintura]"
                                        class="form-control input-lg" step="0.01">
                                </div>


                                <input type="hidden" name="usuario_id" value="<?php echo $usuario_id ?>">
                                <input type="hidden" name="cliente_id" value="<?php echo $cI ?>">
                                <?php
                function calcular_meses($fecha)
                {
                  $fecha_nac = new DateTime(date('Y/m/d', strtotime($fecha))); // Creo un objeto DateTime de la fecha ingresada
                  $fecha_hoy =  new DateTime(date('Y/m/d', time())); // Creo un objeto DateTime de la fecha de hoy
                  $edad = date_diff($fecha_hoy, $fecha_nac); // La funcion ayuda a calcular la diferencia, esto seria un objeto
                  return ($edad->format('%y') * 12) + $edad->format('%m');
                }
                $fechaNacimiento = funcionMaster($cI, 'cliente_id', 'fechaNacimiento', 'cliente');
                //echo $fechaNacimiento;
                ?>
                                <input type="hidden" name="Edad" class="form-control"
                                    value="<?php echo calcular_meses($fechaNacimiento); ?>">

                                <?php if ($ExisteInformacion <> "") : ?>

                                <div class="col-sm-12">
                                    <input type="hidden" name="arreglo_id" value="<?php echo $idtabla ?>">
                                    <!--<input type="hidden" name="arreglo_id" value="<?php echo $_GET['Editar'] ?>">-->
                                    <center><button type="submit"
                                            class="btn btn-block btn-outline-info btn-lg rounded-pill shadow"
                                            name="Actualizar_Informacion_Pagina"
                                            title="<?php if (calcular_meses($fechaNacimiento) <= '240') {
                                                                                                                                                                  echo 'Ademas al darle al boton Actualizar se agregaran los 4 primeros campos para los *Graficos de Pediatria* ';
                                                                                                                                                                } ?>">
                                            <h2> <strong> A c t u a l i z a r </strong> </h2>
                                        </button></center>
                                </div>
                                <?php else : ?>
                                <div class="col-sm-12">
                                    <center><button type="submit"
                                            class="btn btn-block btn-outline-info btn-lg rounded-pill shadow"
                                            name="Guardar_Informacion_Pagina"
                                            title="<?php if (calcular_meses($fechaNacimiento) <= '240') {
                                                                                                                                                                echo 'Ademas al darle al boton Guardar se agregaran los 4 primeros campos para los *Graficos de Pediatria* ';
                                                                                                                                                              } ?>">
                                            <h2> <strong> G u a r d a r </strong> </h2>
                                        </button></center>
                                </div>
                                <?php endif; ?>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include 'footer.php';

?>

<script>
function CalculaPresionArterialMedia() {
    var Sistolica = parseFloat(document.getElementById("PresionArterialSistolica").value);
    var Diastolica = parseFloat(document.getElementById("PresionArterialDiastolica").value);
    console.log(Sistolica);
    console.log(Diastolica);
    var TensionMedia = (Diastolica + ((Sistolica - Diastolica) / 3));

    if (!isNaN(Sistolica) && !isNaN(Diastolica)) {
        console.log(TensionMedia);
        document.getElementById("TensionArterialMedia").value = TensionMedia.toFixed(2);
    }

}
</script>