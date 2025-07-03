<?php
include 'header.php';
include 'menu.php';

$_POST = DatosIngresarMysqli($_POST);
$Nombre_Tabla = "cliente";

if (isset($_POST['Guardar_Informacion_Pagina'])) {
    // guardar paciente

    $Arreglo = $_POST["Arreglo"];

    $_POST["Arreglo"]["nombre_cliente"] = $_POST["Arreglo"]["primer_nombre"] . " " . $_POST["Arreglo"]["segundo_nombre"] . " " . $_POST["Arreglo"]["primer_apellido"] . " " . $_POST["Arreglo"]["segundo_apellido"];
    $_POST["Arreglo"]["fechar"] = date("Y-m-d H:i:s");
    $_POST["Arreglo"]["whatsapp"] = $_POST["Arreglo"]["indicativo"] . $_POST["Arreglo"]["whatsapp"];

    if ($_POST["Arreglo"]["habeasdata"] == "") {
        $_POST["Arreglo"]["habeasdata"] = "No";
        $_POST["Arreglo"]["whatsapp"] = $_POST["Arreglo"]["whatsapp"] . "/*0*/";
    }

    $Campos = "";
    $Valores = "";
    foreach ($_POST["Arreglo"] as $key => $value) {
        $Campos .= $key . ',';
        $ValoresArray = array();
        if (is_array($value)) {
            foreach ($value as $key1 => $value1) {
                $ValoresArray[] = $value1;
            }
            $ListaFinal = json_encode($ValoresArray, JSON_UNESCAPED_UNICODE);
            $Valores .= "'{$ListaFinal}',";
        } else {
            $Valores .= "'{$value}',";
        }
    }
    $Campos = trim($Campos, ',');
    $Valores = trim($Valores, ',');

    $usuario_id = $_POST['usuario_id'];
    $calendario = $_POST['calendario'];


    $queryList = mysqli_query($conn3, "INSERT INTO {$Nombre_Tabla} (usuario_id,{$Campos}) VALUES ('$usuario_id',{$Valores});");
    //echo "INSERT INTO {$Nombre_Tabla} (usuario_id,{$Campos}) VALUES ('$usuario_id',{$Valores});";
    $idcliente = mysqli_insert_id($conn3);

    $Usuario_Web = $_POST["Arreglo"]["primer_nombre"] . substr($CODI_CLIENTE, 0, 5) . '_' . $idcliente;
    $Clave_Web = $CODI_CLIENTE . $idcliente;

    mysqli_query($conn3, "UPDATE cliente SET  Usuario_Web= '$Usuario_Web', Clave_Web='$Clave_Web'  WHERE cliente_id = '$idcliente'");









$whatsapp = $_POST["Arreglo"]["whatsapp"];
$nombre_cliente = $_POST["Arreglo"]["nombre_cliente"];

$NOMBRE_USUARIO = $_POST["Arreglo"]["NOMBRE_USUARIO"];

$NOMBRE_USUARIO = funcionMaster($usuario_id, 'ID', 'USUARIO', 'usuarios' , $config = null);

 



$mensaje = 'Sr(a) *'.$nombre_cliente.'* usted a quedado registrado en notificaciones para su mejor tratamiento médico con Dr(a) *'.$NOMBRE_USUARIO.'* en MedicalSoft. 

Su acceso al portal de MedicalSoft es : '.$Base.'/web/Plataforma/

USuario: '.$Usuario_Web.'
Clave:  '.$Clave_Web.'

Si no desea recibir notificaciones puede darle de baja en cualquier momento respondiendo con la palabra NO

Atte ALTE 
de MedicalSoft';


Whatsapp_sent_cliente($linkkey, $whatsapp, $mensaje, $cliente_id, $usuario_id, $whatsapp, $accion);







    // var_dump($idcliente, $sistemaActual[0], $_POST["Arreglo"]["fechaNacimiento"], $_POST["Arreglo"]["CODI_CLIENTE"], 1);
    include '../app/funciones/pacientesSistemas.php';
    registroPacienteSistema($idcliente, $sistemaActual[0], $_POST["Arreglo"]["fechaNacimiento"], $_POST["Arreglo"]["CODI_CLIENTE"], 1);

    ////////////////////////////////////////////////////////////////CARGAR IMAGEN////////////////////////////////////////////////////////////////
    if ($_FILES['imagen']['name'] <> "") {
        define('UPLOAD_DIR', 'pascientes/');
        $img = $_FILES['imagen']['tmp_name'];
        $name = $_FILES['imagen']['name'];
        $name = str_replace(' ', '', $name);
        $name = str_replace('__', '_', $name);
        if ($img <> "") {
            $fechahora = date("Y-m-d_H-i-s");
            $nombre_foto = "{$idcliente}__{$fechahora}__{$name}";
            $success = move_uploaded_file($_FILES['imagen']['tmp_name'], UPLOAD_DIR . $nombre_foto);
            if (!empty($success)) {
                $queryCliente = "UPDATE cliente SET  fotoperfil= '$nombre_foto'  WHERE cliente_id = '$idcliente'";
                mysqli_query($conn3, $queryCliente) or die(mysqli_error($conn3));
            }
        }
    } else {
        define('UPLOAD_DIR', 'pascientes/');
        $img = $_POST['foto'];
        if ($img <> "") {
            $img = str_replace('data:image/png;base64,', '', $img);
            $img = str_replace(' ', '+', $img);
            $data = base64_decode($img);
            $fechahora = date("Y-m-d_H-i-s");
            $name = str_replace(' ', '', $nombre_cliente);
            $nombre_foto = "{$idcliente}__{$fechahora}__{$name}.png";
            $success = file_put_contents(UPLOAD_DIR . $nombre_foto, $data);
            if (!empty($success)) {
                $queryCliente = "UPDATE cliente SET  fotoperfil= '$nombre_foto'  WHERE cliente_id = '$idcliente'";
                mysqli_query($conn3, $queryCliente) or die(mysqli_error($conn3));
            }
        }
    }
    ////////////////////////////////////////////////////////////////CARGAR IMAGEN////////////////////////////////////////////////////////////////

    $ruta = htmlentities($_SERVER['PHP_SELF']);
    if ($queryList != true) {
        // var_dump('1');
        echo "<script language='Javascript'> window.location='{$ruta}?error=Hubo Un Error Al Guardar Los Datos'</script>";
    } else {
        if ($calendario == "1") {
            // var_dump('2');
            echo "<script language='Javascript'> window.location='CL_Calendario.php';</script>";
        } else {
            // var_dump('3');
            echo "<script language='Javascript'> window.location='portada?msg=Se Guardaron Los Datos Del Paciente Correctamente'</script>";
        }
    }
}

if (isset($_POST['Actualizar_Informacion_Pagina'])) {

    $arreglo_id = $_POST['arreglo_id'];

    $_POST["Arreglo"]["nombre_cliente"] = $_POST["Arreglo"]["primer_nombre"] . " " . $_POST["Arreglo"]["segundo_nombre"] . " " . $_POST["Arreglo"]["primer_apellido"] . " " . $_POST["Arreglo"]["segundo_apellido"];
    $_POST["Arreglo"]["fechar"] = date("Y-m-d H:i:s");
    $_POST["Arreglo"]["whatsapp"] = $_POST["Arreglo"]["indicativo"] . $_POST["Arreglo"]["whatsapp"];

    if ($_POST["Arreglo"]["habeasdata"] == "") {
        $_POST["Arreglo"]["habeasdata"] = "No";
        $_POST["Arreglo"]["whatsapp"] = $_POST["Arreglo"]["whatsapp"] . "/*0*/";
    }

    $Arreglo = ["ap1", "ap2", "ap3", "ap4", "ap5", "ap6", "ap7", "ap8", "ap9"];
    foreach ($Arreglo as $key => $value) {
        if ($_POST["Arreglo"][$value] == "") {
            $_POST["Arreglo"][$value] = "0";
        }
    }


    foreach ($_POST["Arreglo"] as $key => $value) {

        $ValoresArray = array();
        if (is_array($value)) {
            foreach ($value as $key1 => $value1) {
                $ValoresArray[] = $value1;
            }
            $ListaFinal = json_encode($ValoresArray, JSON_UNESCAPED_UNICODE);
            $Campos .= "{$key} = '{$ListaFinal}',";
        } else {
            $Campos .= "{$key} = '{$value}',";
        }
    }

    $Campos = trim($Campos, ',');
    $sucursal = $_POST['sucursal_id'];
    if ($sucursal == "") {
        $sucursal = "0";
    }
    $usuario_id = $_POST['usuario_id'];
    $queryList = mysqli_query($conn3, "UPDATE {$Nombre_Tabla} SET {$Campos}, usuario_id='$usuario_id',sucursal='$sucursal' WHERE cliente_id = '{$arreglo_id}' limit 1;");

    $queryList = mysqli_query($conn3, "UPDATE {$Nombre_Tabla} SET {$Campos}, usuario_id='$usuario_id' WHERE cliente_id = '{$arreglo_id}' limit 1;");
    //echo "UPDATE {$Nombre_Tabla} SET {$Campos}, usuario_id='$usuario_id' WHERE cliente_id = '{$arreglo_id}' limit 1;";


    include '../app/funciones/pacientesSistemas.php';
    registroPacienteSistema($arreglo_id, $sistemaActual[0], $_POST["Arreglo"]["fechaNacimiento"], $_POST["Arreglo"]["CODI_CLIENTE"], 2);

    ////////////////////////////////////////////////////////////////CARGAR IMAGEN////////////////////////////////////////////////////////////////
    if ($_FILES['imagen']['name'] <> "") {
        define('UPLOAD_DIR', 'pascientes/');
        $img = $_FILES['imagen']['tmp_name'];
        $name = $_FILES['imagen']['name'];
        $name = str_replace(' ', '', $name);
        $name = str_replace('__', '_', $name);
        if ($img <> "") {
            $fechahora = date("Y-m-d_H-i-s");
            $nombre_foto = "{$arreglo_id}__{$fechahora}__{$name}";
            $success = move_uploaded_file($_FILES['imagen']['tmp_name'], UPLOAD_DIR . $nombre_foto);
            if (!empty($success)) {
                $queryCliente = "UPDATE cliente SET  fotoperfil= '$nombre_foto'  WHERE cliente_id = '$arreglo_id'";
                mysqli_query($conn3, $queryCliente) or die(mysqli_error($conn3));
            }
        }
    } else {
        define('UPLOAD_DIR', 'pascientes/');
        $img = $_POST['foto'];
        if ($img <> "") {
            $img = str_replace('data:image/png;base64,', '', $img);
            $img = str_replace(' ', '+', $img);
            $data = base64_decode($img);
            $fechahora = date("Y-m-d_H-i-s");
            $name = str_replace(' ', '', $nombre_cliente);
            $nombre_foto = "{$clienteId}__{$fechahora}__{$name}.png";
            $success = file_put_contents(UPLOAD_DIR . $nombre_foto, $data);
            if (!empty($success)) {
                $queryCliente = "UPDATE cliente SET  fotoperfil= '$nombre_foto'  WHERE cliente_id = '$arreglo_id'";
                mysqli_query($conn3, $queryCliente) or die(mysqli_error($conn3));
            }
        }
    }
    ////////////////////////////////////////////////////////////////CARGAR IMAGEN////////////////////////////////////////////////////////////////

    $ruta = htmlentities($_SERVER['PHP_SELF']);
    if ($queryList != true) {
        echo "<script language='Javascript'> window.location='portada?error=Hubo Un Error Al Editar Los Datos Del Paciente'</script>";
    } else {
        echo "<script language='Javascript'> window.location='portada?msg=Se Actualizaron Los Datos Del Paciente Correctamente'</script>";
    }
}

if (isset($_GET['clienteId']) || isset($_GET['cI'])) {
    $id = ($_GET['cI'] != '' ? decrypt($_GET['cI']) : $_GET['clienteId']);

    $queryList = mysqli_query($conn3, "SELECT * FROM  {$Nombre_Tabla} where cliente_id=$id limit 1");
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        foreach ($rowMotorizado as $key => $value) {
            $datos["$key"] = "$value";
        }
    }
    $datos_json = json_encode($datos);
?>
    <script>
        window.onload = function() {
            var Arreglo = <?php echo $datos_json ?>;
            //console.log(Arreglo);
            for (index in Arreglo) {
                if (document.getElementsByName("Arreglo[" + index + "]")[0] != undefined) {

                    if ((document.getElementsByName("Arreglo[" + index + "]")[0].tagName == "INPUT" || document.getElementsByName("Arreglo[" + index + "]")[0].tagName == "TEXTAREA") && document.getElementsByName("Arreglo[" + index + "]")[0].type != "checkbox") {
                        document.getElementsByName("Arreglo[" + index + "]")[0].value = Arreglo[index];
                    } else {

                        var name = document.getElementsByName("Arreglo[" + index + "]")[0].name;
                        var classe = document.getElementsByName("Arreglo[" + index + "]")[0].className;
                        //console.log(Arreglo[index]+" // "+index+ " @@ "+ name);
                        if (classe.indexOf("select2") > -1) {
                            $("select[name='" + name + "'] > option[value='" + Arreglo[index] + "']").attr("selected", true);
                            $("select[name='" + name + "']").select2();
                            //console.log("entroo "+Arreglo[index]+" // "+index+ " @@ "+ name);
                        } else {
                            $("select[name='" + name + "']").val(Arreglo[index]);
                            //console.log("No entro"+Arreglo[index]+" // "+index+ " @@ "+ name);
                        }

                    }

                    if (index == "whatsapp") {
                        var indicativo = Arreglo["indicativo"];
                        //cantidad de caracteres que tiene la variable indicativo
                        var longitud = indicativo.length;
                        //eliminar caracteres de arreglo[index] de la longitud de la variable indicativo desde el inicio
                        var numero = Arreglo[index].substring(longitud);
                        document.getElementsByName("Arreglo[" + index + "]")[0].value = numero;
                    }

                    if (index == "fechaNacimiento") {
                        CalcularEdad(Arreglo[index]);
                    }

                    if (index == "codigo_pais") {
                        paises(Arreglo[index], Arreglo['codigo_departamento'], Arreglo['codigo_ciudad']);
                    }

                    if (index == "genero") {
                        VisualizarGenero(Arreglo[index]);
                    }
                    if (document.getElementsByName("Arreglo[" + index + "]")[0].tagName == "INPUT" && document.getElementsByName("Arreglo[" + index + "]")[0].type == "checkbox") {
                        console.log(Arreglo[index]);
                        if (Arreglo[index] == "1" || Arreglo[index] == "Si") {
                            document.getElementsByName("Arreglo[" + index + "]")[0].checked = true;
                        } else {
                            document.getElementsByName("Arreglo[" + index + "]")[0].checked = false;
                        }
                    }

                }
            }
        };
    </script>
<?php
}

if (!isset($_GET['clienteId']) || isset($_GET['cI'])) {
    $configData = mysqli_query($conn3, "SELECT * FROM usuarios WHERE ID = '{$_SESSION['ID']}'");
    $configData = mysqli_fetch_assoc($configData);
}


if ($_GET["msg"] != "") {
    include "plugins/SweetAlert2K/AlertaCorrectaOperacion.php";
}
if ($_GET["error"] != "") {
    include "plugins/SweetAlert2K/AlertaErrorOperacion.php";
}

$usuario_id = $_SESSION['ID'];
?>

<!-- etiqueta css ubicada en css/CamposInput.css-->
<link rel="stylesheet" href="css/CamposInput.css">
<link rel="stylesheet" href="css/CamposCheckBoxRadio.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3" style="background: white !important;">
    <!-- Content Header (Page header) -->
    <!-- <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> Registro de Paciente </a></li>
        </ol>
    </section> -->

    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="content">
                <h4 class="Titulo_Pagina"> <a href='<?php echo "{$Base}Pacientes.php"; ?>'> <i class="fa-solid fa-right-from-bracket fa-rotate-180"></i></a>&nbsp;&nbsp;Registro de Paciente </h4>
                <div class="box">
                    <div class="box-body">
                        <form action='<?php echo htmlentities($_SERVER["PHP_SELF"]); ?>' method="POST" enctype="multipart/form-data" class="row">

                            <div class="col-md-12">
                                <hr>
                                <h4 align="center"> Información Personal </h4>
                            </div>

                            <?php include 'includeLectorBarcode.php'; ?>

                            <div class="input col-md-6 webflow-style-input">
                                <select class="input__field" name="Arreglo[tipo_cliente]" id="tipo_cliente" placeholder="CC" required>
                                    <option value=""> Seleccione</option>
                                    <option value="CC"> CC - Cédula de ciudadanía</option>
                                    <option value="CE"> CE - Cédula de extranjería</option>
                                    <option value="TI"> TI - Tarjeta de identidad</option>
                                    <option value="RC"> RC - Registro Civil</option>
                                    <option value="CD"> CD - Cédula Digital</option>
                                    <option value="CN"> CN - Comprobante del tramite del documento</option>
                                    <option value="NU"> NU - Número Único de identificación</option>
                                    <option value="NI"> NI - Carnet de identidad - Documento nacional de identidad </option>
                                    <option value="PE"> PE - Permiso especial de permanencia</option>
                                    <option value="PA"> PA - Pasaporte</option>
                                    <option value="SC"> SC - Salvoconducto</option>
                                    <option value="AS"> AS - Adulto sin identidad</option>
                                    <option value="MS"> MS - Menor sin identificación</option>
                                    <option value="PT"> PT - Permiso por Protección Temporal </option>
                                </select>
                                <span class="input__label"><label for="tipo_cliente">Tipo de Documento</label></span>
                            </div>
                            <div class="input col-md-6 webflow-style-input">
                                <input type="text" class="input__field" name="Arreglo[CODI_CLIENTE]" id="CODI_CLIENTE" placeholder="" maxlength="20" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                                <span class="input__label"><label for="CODI_CLIENTE">Número de Documento</label></span>
                                <label id="RespuestaCedula" style="display:contents"></label>
                            </div>

                            <!-- <div class="input col-md-6 ">

                            </div> -->

                            <div class="input col-md-6 webflow-style-input">
                                <input type="date" class="input__field" name="Arreglo[expedicionDocumento]" id="expedicionDocumento">
                                <span class="input__label"><label for="expedicionDocumento">Fecha de Expedicion</label></span>
                            </div>

                            <div class="input col-md-12 webflow-style-input" id="Cedula_Div" style="text-align-last: center;">

                            </div>

                            <div class="input col-md-6 webflow-style-input">
                                <input type="date" class="input__field" name="Arreglo[fechaNacimiento]" id="fechaNacimiento" required onchange="CalcularEdad(this.value)">
                                <span class="input__label"><label for="fechaNacimiento">Fecha de Nacimiento</label></span>
                            </div>

                            <div class="input col-md-6 webflow-style-input">
                                <input type="text" class="input__field" id="Edad" disabled>
                                <span class="input__label"><label for="fechaNacimiento">Edad</label></span>
                            </div>

                            <div class="input col-md-6 webflow-style-input">
                                <input type="text" class="input__field" name="Arreglo[primer_apellido]" id="primer_apellido" placeholder=" " maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                                <span class="input__label"><label for="primer_apellido">Primer Apellido</label></span>
                            </div>
                            <div class="input col-md-6 webflow-style-input">
                                <input type="text" class="input__field" name="Arreglo[segundo_apellido]" id="segundo_apellido" placeholder=" " maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                <span class="input__label"><label for="segundo_apellido">Segundo Apellido</label></span>
                            </div>

                            <div class="input col-md-6 webflow-style-input">
                                <input type="text" class="input__field" name="Arreglo[primer_nombre]" id="primer_nombre" placeholder=" " maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                                <span class="input__label"><label for="primer_nombre">Primer Nombre</label></span>
                            </div>
                            <div class="input col-md-6 webflow-style-input">
                                <input type="text" class="input__field" name="Arreglo[segundo_nombre]" id="segundo_nombre" placeholder=" " maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                <span class="input__label"><label for="segundo_nombre">Segundo Nombre</label></span>
                            </div>

                            <div class="input col-md-6 webflow-style-input" id="pais_div">
                                <select class="input__field select2" name="Arreglo[codigo_pais]" id="PaisResidencia" onchange="paises(this.value,'','');" required>
                                    <option value="" selected> Seleccione </option>
                                    <?php
                                    //where / value del option (si se quiere mas de un valor separarlo por ,) / texto del option (si se quiere mas de un valor separarlo por ,)/ tabla
                                    echo selectMaster("", "Codigo", "Pais", "Paises");
                                    ?>
                                </select>
                                <span class="input__label_select2"><label for="PaisResidencia">País de Residencia</label></span>
                            </div>

                            <div class="input col-md-6 webflow-style-input" id="ciudad_div">
                                <select class="input__field select2" name="Arreglo[codigo_ciudad]" id="CiudadResidencia" required>
                                    <option value="" selected> Seleccione </option>

                                </select>
                                <span class="input__label_select2"><label for="CiudadResidencia">Ciudad Residencia</label></span>
                            </div>

                            <div class="input col-md-6 webflow-style-input">
                                <select class="input__field select2" name="Arreglo[zona]" id="zona" required>
                                    <option value="" selected> Seleccione </option>
                                    <option value="Urbana">Urbana</option>
                                    <option value="Rural">Rural</option>
                                </select>
                                <span class="input__label_select2"><label for="zona">Zona Residencial</label></span>
                            </div>

                            <div class="input col-md-6 webflow-style-input">
                                <input type="text" class="input__field" name="Arreglo[nacionalidad]" id="Nacionalidad" placeholder=" " maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                <span class="input__label"><label for="Nacionalidad">Nacionalidad</label></span>
                            </div>

                            <div class="input col-md-6 webflow-style-input">
                                <input type="text" class="input__field" name="Arreglo[direccion_cliente]" id="direccion_cliente" placeholder=" " maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                <span class="input__label"><label for="direccion_cliente">Dirección</label></span>
                            </div>

                            <div class="input col-md-6 webflow-style-input">
                                <input type="email" class="input__field" name="Arreglo[correo_cliente]" id="correo_cliente" placeholder="" maxlength="100" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                <span class="input__label"><label for="correo_cliente">Correo Electrónico</label></span>
                            </div>

                            <div class="input col-md-6 webflow-style-input">
                                <select class="input__field select2" name="Arreglo[estado]" id="estado" required>
                                    <option value="" selected> Seleccione </option>
                                    <option value="Casado(a)">Casado(a)</option>
                                    <option value="Soltero(a)">Soltero(a)</option>
                                    <option value="Viudo(a)">Viudo(a)</option>
                                    <option value="Menor de edad">Menor de edad</option>
                                    <option value="Separado(a)">Separado(a)</option>
                                    <option value="Union Libre">Unión Libre</option>
                                    <option value="Divorciada(o)">Divorciada(o)</option>
                                    <option value="Otro(a)">Otro(a)</option>
                                </select>
                                <span class="input__label_select2"><label for="estado">Estado Civil</label></span>
                            </div>

                            <div class="input col-md-6 webflow-style-input">
                                <select class="input__field select2" name="Arreglo[genero]" id="genero" required onchange="VisualizarGenero(this.value)">
                                    <option value="" selected> Seleccione </option>
                                    <option value="M">Masculino</option>
                                    <option value="F">Femenino</option>
                                    <option value="I">Indeterminado</option>
                                    <option value="O">Otro</option>
                                </select>
                                <span class="input__label_select2"><label for="genero">Género</label></span>
                            </div>

                            <div id="Div_PreguntasFemenino" class="row" style="display:none;width:100%">

                                <div class="input col-md-6 webflow-style-input">
                                    <input type="date" class="input__field" name="Arreglo[Fecha_Ultimo_Parto]" id="FechaUltimoParto">
                                    <span class="input__label"><label for="FechaUltimoParto">Fecha de ultimo parto</label></span>
                                </div>

                                <div class="input col-md-6 webflow-style-input">
                                    <input type="date" class="input__field" name="Arreglo[Fecha_Ultima_Mestruacion]" id="FechaUltimaMestruacion">
                                    <span class="input__label"><label for="FechaUltimaMestruacion">Fecha de ultima menstruación</label></span>
                                </div>

                                <div class="input col-md-12 webflow-style-input">
                                    <input type="number" class="input__field" name="Arreglo[Numero_Embarazos]" id="NumeroEmbarazos">
                                    <span class="input__label"><label for="NumeroEmbarazos">Numero de Embarazos</label></span>
                                </div>

                            </div>



                            <div class="input col-md-6 webflow-style-input">
                                <select class="input__field select2" name="Arreglo[esDonante]" id="Donante">
                                    <option value="" selected> Seleccione </option>
                                    <option value="Si">Si</option>
                                    <option value="No">No</option>
                                </select>
                                <span class="input__label_select2"><label for="Donante">¿Es Donante?</label></span>
                            </div>

                            <div class="input col-md-6 webflow-style-input">
                                <select class="input__field select2" name="Arreglo[tiposSangre]" id="TipoSangre">
                                    <option value="" selected> Seleccione </option>
                                    <option value="O NEGATIVO">O NEGATIVO</option>
                                    <option value="O POSITIVO">O POSITIVO</option>
                                    <option value="A NEGATIVO">A NEGATIVO</option>
                                    <option value="A POSITIVO">A POSITIVO</option>
                                    <option value="B NEGATIVO">B NEGATIVO</option>
                                    <option value="B POSITIVO">B POSITIVO</option>
                                    <option value="AB NEGATIVO">AB NEGATIVO</option>
                                    <option value="AB POSITIVO">AB POSITIVO</option>
                                </select>
                                <span class="input__label_select2"><label for="TipoSangre">Tipo de Sangre</label></span>
                            </div>

                            <div class="input col-md-6 webflow-style-input">
                                <select class="input__field select2" name="Arreglo[nivel_educacion]" id="NivelEducacion">
                                    <option value="" selected> Seleccione </option>
                                    <option value="Preescolar"> Preescolar </option>
                                    <option value="Basica Primaria"> Básica Primaria </option>
                                    <option value="Basica Secundaria"> Básica Secundaria </option>
                                    <option value="Basica Secundaria (Bachillerato Basico)"> Básica Secundaria (Bachillerato Básico) </option>
                                    <option value="Media Academica o Clasica (Bachillerato Basico)"> Media Académica o Clásica (Bachillerato Basico) </option>
                                    <option value="Media Tecnica (Bachillerato Tecnico)"> Media Técnica (Bachillerato Técnico) </option>
                                    <option value="Normalista"> Normalista </option>
                                    <option value="Tecnica Profesional"> Técnica Profesional </option>
                                    <option value="Tecnologica"> Tecnológica </option>
                                    <option value="Profesional"> Profesional </option>
                                    <option value="Especializacion"> Especialización </option>
                                    <option value="Maestria"> Maestría </option>
                                    <option value="Doctorado"> Doctorado </option>
                                    <option value="Desconocido"> Desconocido </option>
                                    <option value="Ninguno"> Ninguno </option>
                                </select>
                                <span class="input__label_select2"><label for="NivelEducacion">Nivel de Educación</label></span>
                            </div>

                            <div class="input col-md-6 webflow-style-input">
                                <input type="text" class="input__field" name="Arreglo[ocupacion]" id="Ocupacion" placeholder=" " maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                <span class="input__label"><label for="Ocupacion">Ocupación</label></span>
                            </div>

                            <div class="input col-md-6 webflow-style-input">
                                <input type="text" class="input__field" name="Arreglo[telefono_cliente]" id="TelefonoCliente" placeholder=" " maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                <span class="input__label"><label for="TelefonoCliente">Teléfono</label></span>
                            </div>

                            <div class="input col-md-3 webflow-style-input">
                                <select class="input__field select2" name="Arreglo[indicativo]" id="indicativo" required onchange="placeholderPais(this.value)">
                                    <option value="<?= (empty($configData['Indicativo']) ? '57' : $configData['Indicativo']) ?>" selected><?= (empty($configData['Indicativo']) ? '57' : $configData['Indicativo']) ?> - <?= (empty($configData['Indicativo']) ? 'Colombia' : funcionMaster($configData['Indicativo'], 'numero', 'nombre', 'indicativos')) ?></option>
                                    <?php
                                    //where / value del option (si se quiere mas de un valor separarlo por ,) / texto del option (si se quiere mas de un valor separarlo por ,)/ tabla
                                    echo selectMaster("", "numero", "numero,nombre", "indicativos");
                                    ?>
                                </select>
                                <span class="input__label_select2"><label for="indicativo">Indicativo</label></span>
                            </div>

                            <div class="input col-md-3 webflow-style-input">
                                <input type="number" class="input__field" name="Arreglo[whatsapp]" id="whatsapp" placeholder="300..." maxlength="30" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                <span class="input__label"><label for="whatsapp">Número WhatsApp</label></span>
                            </div>


                            <!-- ============== FUNCION INNECESARIA XD ============== -->

                            <script>
                                function placeholderPais(pais) {
                                    const telefonosAmerica = ['555-1234','555-5678','55-1234-5678','9 1234-5678','15 1234-5678','9 1234-5678','321 1234567','9 1234-5678','987 123 456','99 123 456','412-1234567'];
//   estadosUnidos: ,
//   canada: ,
//   mexico: ,
//   brasil: ,
//   argentina: ,
//   chile: ,
//   colombia: ,
//   ecuador: ,
//   peru: ,
//   uruguay: ,
//   venezuela: ;
                                    switch (pais) {
                                        case '57':
                                            document.getElementById('whatsapp').placeholder = telefonosAmerica[6];
                                            break;
                                        case '1':
                                            document.getElementById('whatsapp').placeholder = telefonosAmerica[0];
                                            break;
                                        case '52':
                                            document.getElementById('whatsapp').placeholder = telefonosAmerica[2];
                                            break;
                                        case '55':
                                            document.getElementById('whatsapp').placeholder = telefonosAmerica[3];
                                            break;
                                        case '54':
                                            document.getElementById('whatsapp').placeholder = telefonosAmerica[4];
                                            break;
                                        case '56':
                                            document.getElementById('whatsapp').placeholder = telefonosAmerica[5];
                                            break;
                                        case '593':
                                            document.getElementById('whatsapp').placeholder = telefonosAmerica[7];
                                            break;
                                        case '51':
                                            document.getElementById('whatsapp').placeholder = telefonosAmerica[8];
                                            break;
                                        case '598':
                                            document.getElementById('whatsapp').placeholder = telefonosAmerica[9];
                                            break;
                                        case '58':
                                            document.getElementById('whatsapp').placeholder = telefonosAmerica[10];
                                            break;
                                    
                                        default:
                                            document.getElementById('whatsapp').placeholder = '654564654';
                                            break;
                                    }
                                }

                            </script>


                            <!-- ============== FUNCION INNECESARIA XD ============== -->

                            <div class="input col-md-6 webflow-style-input">
                                <input type="text" class="input__field" name="Arreglo[celular_cliente]" id="celular_cliente" placeholder=" " maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                <span class="input__label"><label for="celular_cliente">Celular</label></span>
                            </div>

                            <div class="col-md-6" style="text-align: -webkit-center;">
                                <label style="padding-bottom: 10px;margin-bottom: 0px;">
                                    <input type="checkbox" class="option-input checkbox" name="Arreglo[habeasdata]" value="Si" checked /> Autoriza recibir notificaciones vía WhatsApp (Habeas Data)
                                </label>
                            </div>

                            <div class="col-md-12">
                            </div>
                            <div class="input col-md-6 webflow-style-input">
                                <select class="input__field select2" name="Arreglo[Sindrome_Down]" id="Sindrome_Down">
                                    <option value="0" selected> No </option>
                                    <option value="1"> Si </option>
                                </select>
                                <span class="input__label_select2"><label for="Sindrome_Down">¿El paciente presenta síntomas de síndrome de down?</label></span>
                            </div>

                            <div class="form-group col-md-12">
                                <hr>
                                <h4 align="center"> Seguridad Social y Afiliación </h4>
                            </div>

                            <div class="input col-md-6 webflow-style-input">
                                <select class="input__field select2" name="Arreglo[tipoUsuario]" id="TipoAfiliado">
                                    <option value=""> Seleccione </option>
                                    <option value="Contributivo"> Contributivo </option>
                                    <option value="Subsidiado"> Subsidiado </option>
                                    <option value="Vinculado"> Vinculado </option>
                                    <option value="Particular"> Particular </option>
                                    <option value="Otro"> Otro </option>
                                    <option value="Desplazado con afiliación al Régimen Contributivo"> Desplazado con afiliación al Régimen Contributivo </option>
                                    <option value="Desplazado con afiliación al Régimen Subsidiado"> Desplazado con afiliación al Régimen Subsidiado </option>
                                    <option value="Desplazado no asegurado (Vinculado)"> Desplazado no asegurado (Vinculado) </option>
                                    <option value="Regímenes de Excepción"> Regímenes de Excepción </option>
                                    <option value="Régimen Especial"> Régimen Especial </option>
                                    <option value="Otro"> Otro </option>
                                </select>
                                <span class="input__label_select2"><label for="TipoAfiliado">Tipo de Afiliado</label></span>
                            </div>

                            <!-- <div class="input col-md-6 webflow-style-input">
                                <select class="input__field select2" name="Arreglo[entidadSalud]" id="EntidadSalud">
                                    <option value=""> Seleccione </option>
                                    <?php
                                    //where / value del option (si se quiere mas de un valor separarlo por ,) / texto del option (si se quiere mas de un valor separarlo por ,)/ tabla
                                    echo selectMaster("", "codigo", "codigo,nombre", "administradora");
                                    ?>
                                </select>
                                <span class="input__label_select2"><label for="EntidadSalud">Entidad de Salud</label></span>
                            </div> -->
                            <div class="input col-md-6 webflow-style-input">

                                <select id="cie" name="Arreglo[entidad_id]" class="input__field select2" onchange="Convenio(this.value)">
                                    <option value="" selected="selected">Seleccione ...</option>
                                    <?php
                                    $queryList = mysqli_query($conn3, "SELECT * FROM Rips_Entidades");
                                    while ($RowMotorizado = mysqli_fetch_array($queryList)) {
                                        $id = $RowMotorizado['id'];
                                        $Nombre = $RowMotorizado['Nombre'];

                                        echo "<option value='$id'> $Nombre </option>";
                                    }
                                    ?>
                                </select>
                                <span class="input__label_select2"><label for="cie">Entidad de Salud [EPS]</label></span>
                            </div>

                            <div class="input col-md-6 webflow-style-input">

                                <select id="convenio" name="Arreglo[convenio_id]" class="form-control select2" style="width: 100%;">
                                </select>
                                <span class="input__label_select2"><label for="convenio">Convenio</label></span>
                            </div>

                            <div class="input col-md-6 webflow-style-input">
                                <select class="input__field select2" name="Arreglo[prepagada]" id="prepagada">
                                    <option value=""> Seleccione </option>
                                    <option value="Allianz"> Allianz </option>
                                    <option value="AXA Colpatria"> AXA Colpatria </option>
                                    <option value="Colmedica"> Colmedica </option>
                                    <option value="Colsanitas"> Colsanitas </option>
                                    <option value="Coomeva Medicina Prepagada"> Coomeva Medicina Prepagada </option>
                                    <option value="Medisanitas"> Medisanitas </option>
                                    <option value="MetLife"> MetLife </option>
                                    <option value="Salud Sura"> Salud Sura </option>
                                    <option value="Suramericana"> Suramericana </option>
                                    <option value="Humano"> Humano </option>
                                    <option value="Senasa"> Senasa </option>
                                    <option value="Palic"> Palic </option>
                                    <option value="Universal"> Universal </option>
                                    <option value="Reserva"> Reserva </option>
                                    <option value="Futura"> Futura </option>
                                    <option value="Monumental"> Monumental </option>
                                    <option value="Renacer"> Renacer </option>
                                    <option value="Seguros Bolivar"> Seguros Bolivar </option>
                                    <option value="Colmena Seguros"> Colmena Seguros </option>
                                    <option value="Compañía de seguros de vida Aurora"> Compañía de seguros de vida Aurora </option>
                                    <option value="Liberty Seguros de Vida"> Liberty Seguros de Vida </option>
                                    <option value="MAFRE Seguros"> MAFRE Seguros </option>
                                    <option value="Positiva"> Positiva </option>
                                    <option value="Seguros de Vida Alfa"> Seguros de Vida Alfa </option>
                                    <option value="Suratep"> Suratep </option>
                                    <option value="Medplus"> Medplus </option>
                                    <option value="Famisanar PAC"> Famisanar PAC </option>
                                    <option value="Compensar PAC"> Compensar PAC </option>
                                    <option value="Panamerican"> Panamerican </option>
                                    <option value="Generali"> Generali </option>
                                    <option value="Probienestar S.A.S"> Probienestar S.A.S </option>
                                    <option value="Foca PLUS"> Foca PLUS </option>
                                    <option value="Ninguno"> Ninguno </option>
                                </select>
                                <span class="input__label_select2"><label for="prepagada">Pre pagada</label></span>
                            </div>

                            <div class="input col-md-6 webflow-style-input">
                                <select class="input__field select2" name="Arreglo[sucursal]" id="sucursal">
                                    <option value=""> Seleccione </option>
                                    <?php
                                    sucursalesSelect($_SESSION['ID']);
                                    ?>
                                </select>
                                <span class="input__label_select2"><label for="sucursal"> Sucursal </label></span>
                            </div>
                            <div class="form-group col-md-12">
                                <hr>
                                <h4 align="center"> Acompañante </h4>
                            </div>

                            <div class="input col-md-12 webflow-style-input">
                                <input type="text" class="input__field" name="Arreglo[acompananteFamiliar]" id="acompananteFamiliar" placeholder=" " maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                <span class="input__label"><label for="acompananteFamiliar">Nombre Acompañante Familiar</label></span>
                            </div>
                            <div class="input col-md-6 webflow-style-input">
                                <input type="text" class="input__field" name="Arreglo[telefono_acompanante]" id="telefono_acompanante" placeholder=" " maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                <span class="input__label"><label for="telefono_acompanante">Teléfono Acompañante Familiar</label></span>
                            </div>

                            <div class="input col-md-6 webflow-style-input">
                                <!--
                                <input type="text" class="input__field" name="Arreglo[parentesco_acompanante]" id="parentesco_acompanante" placeholder=" " maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                -->

                                <select class="input__field select2" name="Arreglo[parentesco_acompanante]" id="parentesco_acompanante">
                                    <option value="" selected>Seleccione</option>
                                    <option value="Hijos">Hijos</option>
                                    <option value="Hermanos">Hermanos</option>
                                    <option value="Madre">Madre</option>
                                    <option value="Padre">Padre</option>
                                    <option value="Tío">Tio</option>
                                    <option value="Primo">Primo</option>
                                    <option value="Familiar en segundo grado">Familiar en segundo grado</option>
                                    <option value="Colega">Colega</option>
                                    <option value="Nieto">Nieto</option>
                                    <option value="Abuelo">Abuelo</option>
                                    <option value="Amigo">Amigo</option>
                                    <option value="Primo">Primo</option>
                                    <option value="Cónyuge">Cónyuge</option>
                                    <option value="Padres">Padres</option>
                                    <option value="Otro">Otro</option>
                                    <option value="No aplica">No aplica</option>
                                    <option value="Ninguno">Ninguno</option>
                                </select>
                                <span class="input__label_select2"><label for="parentesco_acompanante">Parentesco</label></span>
                            </div>




                            <div class="form-group col-md-12">
                                <hr>
                                <h4 align="center"> Responsable </h4>
                            </div>

                            <div class="input col-md-12 webflow-style-input">
                                <input type="text" class="input__field" name="Arreglo[responsableFamiliar]" id="responsableFamiliar" placeholder=" " maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                <span class="input__label"><label for="responsableFamiliar">Nombre Responsable</label></span>
                            </div>
                            <div class="input col-md-6 webflow-style-input">
                                <input type="text" class="input__field" name="Arreglo[telefono_responsable]" id="telefono_responsable" placeholder=" " maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                <span class="input__label"><label for="telefono_responsable">Teléfono Responsable</label></span>
                            </div>

                            <div class="input col-md-6 webflow-style-input">
                                <!--
                                <input type="text" class="input__field" name="Arreglo[parentesco_acompanante]" id="parentesco_acompanante" placeholder=" " maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                -->

                                <select class="input__field select2" name="Arreglo[parentesco_responsable]" id="parentesco_responsable">
                                    <option value="" selected>Seleccione</option>
                                    <option value="Hijos">Hijos</option>
                                    <option value="Hermanos">Hermanos</option>
                                    <option value="Madre">Madre</option>
                                    <option value="Padre">Padre</option>
                                    <option value="Tío">Tio</option>
                                    <option value="Primo">Primo</option>
                                    <option value="Familiar en segundo grado">Familiar en segundo grado</option>
                                    <option value="Colega">Colega</option>
                                    <option value="Nieto">Nieto</option>
                                    <option value="Abuelo">Abuelo</option>
                                    <option value="Amigo">Amigo</option>
                                    <option value="Primo">Primo</option>
                                    <option value="Cónyuge">Cónyuge</option>
                                    <option value="Padres">Padres</option>
                                    <option value="Otro">Otro</option>
                                    <option value="No aplica">No aplica</option>
                                    <option value="Ninguno">Ninguno</option>
                                </select>
                                <span class="input__label_select2"><label for="parentesco_responsable">Parentesco</label></span>
                            </div>



                            <div class="form-group col-md-12">
                                <hr>
                                <h4 align="center"> Antecedentes Personales </h4>
                            </div>

                            <div class="col-md-3">
                                <label style="padding-bottom: 10px;margin-bottom: 0px;">
                                    <input type="checkbox" class="option-input checkbox" name="Arreglo[ap1]" value="1" /> Alergias a los aines
                                </label>
                            </div>

                            <div class="col-md-3">
                                <label style="padding-bottom: 10px;margin-bottom: 0px;">
                                    <input type="checkbox" class="option-input checkbox" name="Arreglo[ap2]" value="1" /> Asma
                                </label>
                            </div>

                            <div class="col-md-3">
                                <label style="padding-bottom: 10px;margin-bottom: 0px;">
                                    <input type="checkbox" class="option-input checkbox" name="Arreglo[ap3]" value="1" /> HTA
                                </label>
                            </div>

                            <div class="col-md-3">
                                <label style="padding-bottom: 10px;margin-bottom: 0px;">
                                    <input type="checkbox" class="option-input checkbox" name="Arreglo[ap4]" value="1" /> Diabetes
                                </label>
                            </div>




                            <div class="col-md-3">
                                <label style="padding-bottom: 10px;margin-bottom: 0px;">
                                    <input type="checkbox" class="option-input checkbox" name="Arreglo[ap5]" value="1" /> Hipotiroidismo
                                </label>
                            </div>

                            <div class="col-md-3">
                                <label style="padding-bottom: 10px;margin-bottom: 0px;">
                                    <input type="checkbox" class="option-input checkbox" name="Arreglo[ap6]" value="1" /> Tabaquismo
                                </label>
                            </div>

                            <div class="col-md-3">
                                <label style="padding-bottom: 10px;margin-bottom: 0px;">
                                    <input type="checkbox" class="option-input checkbox" name="Arreglo[ap7]" value="1" /> Licor
                                </label>
                            </div>

                            <div class="col-md-3">
                                <label style="padding-bottom: 10px;margin-bottom: 0px;">
                                    <input type="checkbox" class="option-input checkbox" name="Arreglo[ap8]" value="1" /> Alergias
                                </label>
                            </div>




                            <div class="col-md-3">
                                <label style="padding-bottom: 10px;margin-bottom: 0px;">
                                    <input type="checkbox" class="option-input checkbox" name="Arreglo[ap9]" value="1" /> Cirugías
                                </label>
                            </div>

                            <div class="input col-md-9 webflow-style-input">
                                <textarea class="input__field" name="Arreglo[cirugiasCuales]" id="CualesCirugias" style="height:120px;" placeholder=" "></textarea>
                                <span class="input__label_select2"><label for="CualesCirugias">Cuales Cirugías</label></span>
                            </div>


                            <div class="form-group col-md-12">
                                <hr>
                            </div>

                            <div class="input col-md-12 webflow-style-input">
                                <input type="text" class="input__field" name="Arreglo[alergias]" id="alergias" placeholder=" " maxlength="180" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                <span class="input__label"><label for="alergias">¿Tiene Alergias? ¿Cuáles?</label></span>
                            </div>

                            <div class="input col-md-12 webflow-style-input">
                                <input type="text" class="input__field" name="Arreglo[tomaMedicamento]" id="MedicamentosTomados" placeholder=" " maxlength="180" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                <span class="input__label"><label for="MedicamentosTomados">¿Toma Medicamentos?</label></span>
                            </div>

                            <div class="input col-md-12 webflow-style-input">
                                <textarea class="input__field" name="Arreglo[enfermedadesPequeno]" id="AntecedentesFamiliares" placeholder=" " style="height:120px;"></textarea>
                                <span class="input__label_select2"><label for="AntecedentesFamiliares">Antecedentes Familiares</label></span>
                            </div>

                            <div class="input col-md-12 webflow-style-input">
                                <textarea class="input__field" name="Arreglo[nota]" id="nota" placeholder=" " style="height:120px;"></textarea>
                                <span class="input__label_select2"><label for="nota">Notas Adicionales</label></span>
                            </div>

                            <div class="col-md-12 row" id="modulo_foto" style="border: groove;margin-top: 15px;margin-bottom: 15px;">
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
                                            <option>Seleccione Cámara</option>
                                        </select>
                                        <button type="button" id="btnCapture" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" style="width: 80%;z-index: 2;position: relative;background-color: white">Tomar Captura <i class="fas fa-angle-down float-right mt-2"></i></button>
                                        <button type="button" id="btnRemove" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" style="float: right;height: 45px;width: 20%;background-color: antiquewhite;border-radius: 0px 5px 5px 0px;border: snow;top: -55px;position: relative;padding-left: 25%;z-index: 1;"><i class="fa fa-trash" style="left:-42px;position:relative;"></i></button>
                                        <!--<button type="button" id="btnDownloadImage">Descargar Imagen</button>-->
                                        <br>
                                    </div>
                                </div>
                                <div class="form-group col-md-6" style="text-align-last: center;">
                                    <br><br><br><br><br>
                                    <label for="file-input" class="text-compu icono">
                                        <i class="fas fa-camera-retro fa-10x" style="color: #3c8dbc;"></i>
                                        <p><i class="fas fa-arrow-right"></i><strong> Subir Foto de Perfil </strong><i class="fas fa-arrow-left"></i></p>
                                    </label>
                                    <input id="file-input" type="file" accept="image/*" capture="camera" name="imagen" style="display: none;" />
                                </div>
                            </div>


                            <input type="hidden" name="usuario_id" value="<?php echo $usuario_id; ?>">
                            <input type="hidden" name="calendario" value="<?php echo $_GET['calendario'] ?>">

                            <?php if ($_GET['clienteId'] <> "" || $_GET['cI'] <> "") : ?>
                                <div class="col-sm-12">
                                    <br>
                                    <input type="hidden" name="arreglo_id" id="cliente_id" value="<?= ($_GET['cI'] != '' ? decrypt($_GET['cI']) : $_GET['clienteId']) ?>">
                                    <center><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" name="Actualizar_Informacion_Pagina">
                                            <h2> <strong> A c t u a l i z a r <i class="fas fa-angle-down float-right mt-2"></i></strong> </h2>
                                        </button></center>
                                </div>
                            <?php else : ?>
                                <div class="col-sm-12">
                                    <br>
                                    <center><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" name="Guardar_Informacion_Pagina">
                                            <h2> <strong> G u a r d a r <i class="fas fa-angle-down float-right mt-2"></i></strong> </h2>
                                        </button></center>
                                </div>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>










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
                    <button class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" data-dismiss="modal" type="button">Ok <i class="fas fa-angle-down float-right mt-2"></i></button>
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

    #btnCapture:hover {
        color: black !important;
    }

    #btnRemove:hover {
        color: red !important;
    }
</style>











<?php
include 'footer.php';
?>
<script>
    function paises(valor, departamento, ciudad) {
        if (valor == "CO") {

            var pais = document.getElementById('pais_div');
            var select = document.createElement("div");
            select.innerHTML = "<select class='input__field select2' name='Arreglo[codigo_departamento]' id='DepartamentoResidencia' onchange='departamento_ciudad(this.value,);' required></select>";
            select.innerHTML += "<span class='input__label_select2'><label for='DepartamentoResidencia'>Departamento de Residencia</label></span>";

            //select.innerHTML = '<div align="left">  Departamento </div><select name="departamento" id="departamento"  class="form-control input-lg select2" onchange="departamento_ciudad(this.value)"style="width: 100%;"></select>'
            select.setAttribute('id', 'departamento_div');
            select.setAttribute('class', 'input col-md-6 webflow-style-input');
            pais.insertAdjacentElement("afterend", select);
            //K.C
            document.getElementById('ciudad_div').className = 'input col-md-12 webflow-style-input';
            $('#DepartamentoResidencia').select2();

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
                    $('#DepartamentoResidencia').html("<option value='' selected>Seleccione</option>" + response);
                    if (departamento != "") {
                        $("select[id='DepartamentoResidencia'] > option[value='" + departamento + "']").attr("selected", true);
                        $("select[id='DepartamentoResidencia']").select2();
                    }
                }
            });

            if (departamento != "") {
                departamento_ciudad(departamento, ciudad);
            } else {
                $('#CiudadResidencia').empty();
            }

        } else {

            document.getElementById('ciudad_div').className = 'input col-md-6 webflow-style-input';
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
                    $('#CiudadResidencia').html("<option value='' selected>Seleccione</option>" + response);
                    if (ciudad != "") {
                        $("select[id='CiudadResidencia'] > option[value='" + ciudad + "']").attr("selected", true);
                        $("select[id='CiudadResidencia']").select2();
                    }

                }
            });

            var departamento = document.getElementById('departamento_div');
            if (typeof(departamento) != 'undefined' && departamento != null) {
                departamento.remove();
            }
        }
    }

    function departamento_ciudad(valor, ciudad) {
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
                $('#CiudadResidencia').html("<option value='' selected>Seleccione</option>" + response);
                if (ciudad != "") {
                    $("select[id='CiudadResidencia'] > option[value='" + ciudad + "']").attr("selected", true);
                    $("select[id='CiudadResidencia']").select2();
                }
            }
        });
    }

    function CalcularEdad(valor) {
        var fechaNacimiento = valor;
        // aqui enviamos el mensaje por medio de un arreglo     
        $.ajax({
            type: "POST",
            url: "ajax_edad.php",
            data: {
                fechaNacimiento: fechaNacimiento
            },
            success: function(response) {
                $('#Edad').val(response);
            }
        });
    }


    function VerificarDocumento(valor) {
        var CODI_CLIENTE = valor;
        $.ajax({
            type: "POST",
            url: "Ajax_VerificarDocumento.php",
            data: {
                CODI_CLIENTE: CODI_CLIENTE,
            },
            success: function(response) {
                $("#Cedula_Div").html(response);
            }
        });
    };


    /*function VerificarDocumento(valor) {
        var CODI_CLIENTE = valor;
        var cliente_id = $("#cliente_id").val(); // trae el clienteId

        $.ajax({
            type: "POST",
            url: "Ajax_VerificarDocumento.php",
            data: {
                CODI_CLIENTE: CODI_CLIENTE,
                cliente_id: cliente_id
            },
            success: function(response) {
                $("#Cedula_Div").html(response);
                if (response != "") {
                    $('#CODI_CLIENTE').val("");
                }
            }
        });
    };*/

    /* jquery onchange input[id="CODI_CLIENTE"] */
    $("#CODI_CLIENTE").on('change', function() {
        VerificarDocumento(this.value);
    });

    window.addEventListener('load', function() {
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
    });

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

    function Convenio(valor) {
        //ajax para cargar los convenios
        $.ajax({
            type: "POST",
            url: "ajax_rips.php",
            data: {
                entidad_id: valor,
            },
            success: function(response) {
                $('#convenio').html(response);

            }
        });
    }

    function VisualizarGenero(Genero) {
        if (Genero == "F") {
            document.getElementById("Div_PreguntasFemenino").style.display = "contents";
        } else {
            document.getElementById("Div_PreguntasFemenino").style.display = "none";
        }
    }
</script>
<script src="apiVoz_3.2.js"></script>
<?php include 'plantilla.php'; ?>