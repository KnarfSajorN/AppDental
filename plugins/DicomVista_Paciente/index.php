<?php
function decrypt($dato){
  // el dato tiene 10 caracteres de basura y luego la clave en base64
  return base64_decode(substr($dato, 10, strlen($dato)));
}
?>



<!DOCTYPE html>
<html>


<!-- Mirrored from ivmartel.github.io/dwv-simplistic/baseDev/stable/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 17 Jan 2022 14:40:25 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
  <title>Visor Dicom</title>
  
  <meta charset="UTF-8">
  <meta name="description" content="Simplistic viewer using DICOM Web Viewer (DWV).">
  <meta name="keywords" content="DICOM,HTML5,JavaScript,medical,imaging,DWV">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <link rel="icon" href="https://medicalsoftplus.com/iconoms.ico" type="image/x-icon">
  <meta name="theme-color" content="#f86a2d" />
  <link rel="manifest" href="manifest.json">
  <link type="text/css" rel="stylesheet" href="css/style.css" />
  <!-- mobile web app -->
  <meta name="mobile-web-app-capable" content="yes" />
  <link rel="shortcut icon" sizes="16x16" href="resources/icons/icon-16.png" />
  <link rel="shortcut icon" sizes="32x32" href="resources/icons/icon-32.png" />
  <link rel="shortcut icon" sizes="64x64" href="resources/icons/icon-64.png" />
  <link rel="shortcut icon" sizes="128x128" href="resources/icons/icon-128.png" />
  <link rel="shortcut icon" sizes="256x256" href="resources/icons/icon-256.png" />
  <!-- apple specific -->
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-status-bar-style" content="black" />
  <link rel="apple-touch-icon" sizes="16x16" href="resources/icons/icon-16.png" />
  <link rel="apple-touch-icon" sizes="32x32" href="resources/icons/icon-32.png" />
  <link rel="apple-touch-icon" sizes="64x64" href="resources/icons/icon-64.png" />
  <link rel="apple-touch-icon" sizes="128x128" href="resources/icons/icon-128.png" />
  <link rel="apple-touch-icon" sizes="256x256" href="resources/icons/icon-256.png" />
  <!-- Third party (dwv) -->
  <script type="text/javascript" src="node_modules/i18next/i18next.min.js"></script>
  <script type="text/javascript" src="node_modules/i18next-http-backend/i18nextHttpBackend.min.js"></script>
  <script type="text/javascript" src="node_modules/i18next-browser-languagedetector/i18nextBrowserLanguageDetector.min.js"></script>
  <script type="text/javascript" src="node_modules/jszip/dist/jszip.min.js"></script>
  <!-- decoders -->
  <script type="text/javascript" src="node_modules/dwv/decoders/dwv/rle.js"></script>
  <script type="text/javascript" src="node_modules/dwv/decoders/pdfjs/jpx.js"></script>
  <script type="text/javascript" src="node_modules/dwv/decoders/pdfjs/util.js"></script>
  <script type="text/javascript" src="node_modules/dwv/decoders/pdfjs/arithmetic_decoder.js"></script>
  <script type="text/javascript" src="node_modules/dwv/decoders/pdfjs/jpg.js"></script>
  <script type="text/javascript" src="node_modules/dwv/decoders/rii-mango/lossless-min.js"></script>
  <!-- dwv -->
  <script type="text/javascript" src="node_modules/dwv/dist/dwv.min.js"></script>
  <!-- gui -->
  <script type="text/javascript" src="src/gui/dropboxLoader.js"></script>

  <!-- Launch the app -->
  <script type="text/javascript" src="src/register-sw.js"></script>
  <script type="text/javascript" src="src/appgui.js"></script>
  <script type="text/javascript" src="src/applauncher.js"></script>
</head>

<body>

  <!-- Toolbar -->
  <div class="toolbar">
    <select id="tools" name="tools" onChange="dwvAppGui.onChangeTool(this.value)" disabled>
      <option value="Scroll" data-i18n="tool.Scroll.name">Scroll</option>
      <option value="WindowLevel" data-i18n="tool.WindowLevel.name">WindowLevel</option>
      <option value="ZoomAndPan" data-i18n="tool.ZoomAndPan.name">ZoomAndPan</option>
    </select>
    <select id="presets" name="presets" onChange="dwvAppGui.onChangePreset(this.value)" disabled>
      <option value="">Preset...</option>
    </select>
    <button id="reset" value="Reset" onClick="dwvAppGui.onDisplayReset()" data-i18n="basics.reset" disabled>Reset</button>
  </div>

  <!-- DWV -->
  <div id="dwv">

    <!-- Layer Container -->
    <div id="layerGroup0" class="layerGroup">
      <div id="dropBox"></div>
    </div>

    <div id="legend" class="legend"><span id="dwvVersion"></span>
    </div>

  </div><!-- /dwv -->

</body>

<!-- Mirrored from ivmartel.github.io/dwv-simplistic/baseDev/stable/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 17 Jan 2022 14:40:30 GMT -->

</html>

<style>
  .card {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    transition: 0.3s;
    /* width: 40%; */
    position: fixed;
    bottom: 0;
    right: 0px;
    background-color: #3c8dbc;
    border-radius: 10px;
    border: 1px solid black;
    height: 500px;
  }

  .card:hover {
    box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
  }

  .container {
    padding: 2px 2px;
  }

  .ui-widget-header {
    border: 1px solid #3c8dbc;
    background: #3c8dbc;
    color: #fff;
    font-weight: bold;
  }
</style>

<div class="card">
  <div class="container">
    <form id="formInforme">
      <div class="ui-dialog-titlebar ui-corner-all ui-widget-header ui-helper-clearfix ui-draggable-handle" style="padding: 10px">
        <span class="ui-dialog-title">
          <center>Informe</center>
        </span>
      </div>
      <span class="ui-dialog-title" style="vertical-align: middle; display: inline-block; width: 80px;">Paciente</span>
      <input name="datos[Nombre_P]" id="Nombre_P" readonly style="width: 150px;"><br>
      <span class="ui-dialog-title" style="vertical-align: middle; display: inline-block; width: 80px;">Cédula</span>
      <input name="datos[Numero]" id="Numero" value="<?php echo decrypt($_GET['Numero']); ?>" readonly style="width: 150px;"><br>
      <span class="ui-dialog-title" style="vertical-align: middle; display: inline-block; width: 80px;">Fecha.N</span>
      <input name="datos[Fecha_N]" id="Fecha_N" readonly style="width: 150px;"><br>
      <textarea class="dicom_voz" name="datos[informe]" id="informe" cols="40" rows="20" style="width:90%;" readonly></textarea>
      <input type="hidden" name="datos[Numero]" id="Numero" value="<?php echo decrypt($_GET['Numero']); ?>">
      <input type="hidden" name="datos[Nombre]" id="Nombre" value="<?php echo $_GET['Nombre']; ?>">
      <!-- <button type="button" onclick="procesarInforme();">Guardar</button> -->
    </form>
  </div>
</div>

<!-- <div class="" style="
position: fixed;
bottom: 0;
right: 70px;
">


</div>  -->

<!-- <div tabindex="-1" role="dialog" class="ui-dialog ui-corner-all ui-widget ui-widget-content ui-front ui-draggable ui-resizable" aria-describedby="dwv-toolList" aria-labelledby="ui-id-2" style="position: absolute; width: 300px; bottom: 0; right: 70px;">
  <div class="ui-dialog-titlebar ui-corner-all ui-widget-header ui-helper-clearfix ui-draggable-handle">
    <span id="ui-id-2" class="ui-dialog-title">Informe</span>
  </div>
  <div id="dwv-toolList" class="ui-dialog-content ui-widget-content" style="width: auto; min-height: 93.243px; max-height: none; height: auto;">

    
  </div>
  
</div> -->



<?php
    // no hay session activa
    $cedulaValidar = $_GET['validar'];
    $mensaje = $_GET['mensaje'];
    // se le pide la cedula para validar
?>


<script>
  function procesarInforme() {
    let informe, Numero, Nombre;
    informe = document.getElementById("informe").value;
    Nombre = document.getElementById("Nombre").value;
    Numero = document.getElementById("Numero").value;
    clienteID = '<?= $_GET['ci'] ?>';
    // console.log(informe, Nombre, Numero);

    const data = {
      informe: informe,
      Numero: Numero,
      Nombre: Nombre,
      clienteID: clienteID
    };
    const params = new URLSearchParams(data);
    fetch(`ajax_informeDicom.php?${params}`, {
        method: 'GET',
        headers: {
          'Content-Type': 'application/json'
        }
      })
      .then(response => {
        if (!response.ok) {
          throw new Error('Request failed');
        }
        return response.json();
      })
      .then(data => {
        console.log(data);
      })
      .catch(error => {
        console.error(error);
      });
  }

  function cargarInforme() {
    let informe, Numero, Nombre;
    informe = document.getElementById("informe").value;
    Nombre = document.getElementById("Nombre").value;
    Numero = document.getElementById("Numero").value;
    clienteID = '<?= $_GET['ci'] ?>';
    // console.log(informe, Nombre, Numero,Nombre_P, Fecha_N);

    const data = {
      informe: informe,
      Numero: Numero,
      Nombre: Nombre,
      clienteID: clienteID
    };

    const params = new URLSearchParams(data);
    fetch(`ajax_informeDicomConsulta.php?${params}`, {
        method: 'GET',
        headers: {
          'Content-Type': 'application/json'
        }
      })
      .then(response => {
        if (!response.ok) {
          throw new Error('Request failed');
        }
        return response.json();
      })
      .then(data => {
        console.log(data);
        document.getElementById("informe").value = data.Informe,
          document.getElementById("Nombre_P").value = data.nombre_cliente,
          document.getElementById("Fecha_N").value = data.fechaNacimiento;
      })
      .catch(error => {
        console.error(error);
      });

  }
</script>
<?php
$cedulaValidar = decrypt($_GET['Numero']);
$mensaje = "Ingrese su Cédula para Visualizar el Contenido de la Impresión";
?>
<script>
  function CargarClave() {
    setTimeout(() => {
            let foo = prompt("<?=$mensaje?>");
        if (foo == "<?php echo $cedulaValidar; ?>") {
            document.getElementById("PantallaDeClave").style.display = "none";
            // nada pasa
        } else {
            window.location.href = "https://www.google.com";
        }    
        }, 100);
  }

  window.onload = function() {
    cargarInforme();

    
     // Crear un nuevo elemento div
     var div = document.createElement("div");
     div.id="PantallaDeClave";
      // Aplicar estilos CSS para cubrir toda la pantalla y ser blanco
      div.style.position = "fixed";
      div.style.top = "0";
      div.style.left = "0";
      div.style.width = "100%";
      div.style.height = "100%";
      div.style.backgroundColor = "white";
      // Agregar el div al cuerpo de la página
      document.body.appendChild(div);

      CargarClave()
  }
</script>
