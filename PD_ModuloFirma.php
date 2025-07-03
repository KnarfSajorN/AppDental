<?php

include 'funciones/conn3.php';

function funcionMaster($filtro, $campoFiltrar, $campoImprimir, $tabla)
    {
        include 'funciones/conn3.php';
        $query = mysqli_query($conn3, "SELECT * FROM $tabla where $campoFiltrar = '$filtro'");
        $nrowl = mysqli_num_rows($query);
        while ($row = mysqli_fetch_array($query)) {

            $text = $row[$campoImprimir];
        }
        return  $text;
    }
    
function Encriptar($valor)
{
    $Sc = base64_decode("Medical");
    //$Texto = urlencode(openssl_encrypt($valor, "AES-256-CBC", $Sc));
    $Texto = (openssl_encrypt($valor, "AES-256-CBC", $Sc));
    return base64_encode($Texto);
}

function Desencriptar($valor)
{
    $Sc = base64_decode("Medical");
    //$Texto = (openssl_decrypt(urldecode($valor), "AES-256-CBC", $Sc));
    $Texto = openssl_decrypt((base64_decode($valor)), "AES-256-CBC", $Sc);
    return $Texto;
}
  

if($_POST["Tipo_Consulta"] == "Agregar Firma"){
  date_default_timezone_set('America/Bogota');

  $Fecha = date("Y-m-d");
  $Hora = date("H:i:s");

  $firma_base64    = $_POST['firma_base64'];
  $Nombres  = mysqli_real_escape_string($conn3,$_POST['Nombres']);
  $Documento  = mysqli_real_escape_string($conn3,$_POST['Documento']);

  //por ahora no se usara nmbre tabla
  //$NombreTabla  = Desencriptar($_POST['tabla']);
  $Tabla_id  = Desencriptar($_POST['tabla_id']);
  $usuario_id  = Desencriptar($_POST['uid']);
  $id  = $_POST['id'];

  $QueryPodologiaMaster = mysqli_query($conn3, "SELECT * FROM PD_PodologiaDetalle WHERE id = '$Tabla_id'");
  while ($RowPodologiaMaster= mysqli_fetch_array($QueryPodologiaMaster)) {
    $cliente_id = $RowPodologiaMaster["cliente_id"];
  }

   
  $QueryRealizado = mysqli_query($conn3,"INSERT INTO PD_FirmaDetalle (Fecha,Hora,usuario_id,cliente_id,Firma,Firma_Nombre,Firma_Documento,detalle_id)
  VALUES ('$Fecha', '$Hora','$usuario_id','$cliente_id','$firma_base64','$Nombres','$Documento','$Tabla_id')");
       
  if($QueryRealizado){
    $Arreglo["Estado"] = true;
  }else{
    $Arreglo["Estado"] = false;
  }
  echo json_encode($Arreglo);
  exit();
}







//$Tabla_Inicial = $_GET['Tabla'];
$id_Inicial = $_GET['id'];
$usuario_Inicial = $_GET['ui'];

//$Tabla=Desencriptar($Tabla_Inicial);
$detalle_id=Desencriptar($id_Inicial);

$QueryPodologiaMaster = mysqli_query($conn3, "SELECT * FROM PD_PodologiaDetalle WHERE id = '$detalle_id'");
while ($RowPodologiaMaster= mysqli_fetch_array($QueryPodologiaMaster)) {
  $Numero_Dedo = $RowPodologiaMaster["Numero_Dedo"];
  $Detalle = $RowPodologiaMaster["Detalle"];
  $Procedimiento = funcionMaster($RowPodologiaMaster["Procedimiento"],'id','Nombre','PD_Procedimiento');
  $Superficie = $RowPodologiaMaster["Superficie"];
}

$queryList=mysqli_query($conn3,"SELECT Firma FROM PD_FirmaDetalle where Firma != '' AND detalle_id = '$detalle_id'");
$nrowl=mysqli_num_rows($queryList);
while($rowMotorizado=mysqli_fetch_array($queryList))
{
  $Firma = $rowMotorizado['Firma']; 
}

if (strlen($Firma)>10) 
{
  $YaFirmado=true;
}

?>

<style>
  

  


  
</style>
<style>
    #canvas {
      border: 1px solid black;
      width: 100%;
      height: 200px;
      border-radius: 20px;
    }
    body{
        background: radial-gradient(ellipse at center, rgb(255 233 254) 0%, rgb(59 151 148) 100%)!important;
    }
  </style>

<link href="plugins/Firmas/Firma_CardBoard.css" rel='stylesheet'>
<link href="plugins/Firmas/Firma_CargaDinamica.css" rel='stylesheet'>
<link href="plugins/Firmas/Firma_Fondo.css" rel='stylesheet'>
<link href="plugins/Firmas/Firma_bootstrap.min.4.5.0.css" rel='stylesheet'>
<script src="plugins/Firmas/signature_pad.min.js"></script>

<canvas id="stars" width="300" height="300" style="display: none;"></canvas>
<div class="page-loader">
  <div class="page-loader--bg-a"></div>
  <div class="page-loader--bg-b">
    <!-- <div class="sspattern-2"></div> -->
  </div>
  <div class="page-loader--and">

    <h2 style="width: 100%;font-size: 60px;color: white;"><u>Modulo De Firma</u></h2><br>
    <img class="flower" src="img/logoSolo.png">
    <svg fill="white" width="256px" height="256px" viewBox="0 0 56.00 56.00" xmlns="http://www.w3.org/2000/svg" stroke="white" stroke-width="0.00056"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M 1.1883 43.4869 L 13.6935 43.4869 C 13.4483 44.4300 13.3162 45.3542 13.3162 46.2030 C 13.3162 49.2397 15.0138 51.4088 18.5786 51.4088 C 22.9168 51.4088 26.4250 48.3532 28.6884 43.4869 L 54.8118 43.4869 C 55.4719 43.4869 56 42.9777 56 42.3175 C 56 41.6574 55.4719 41.1670 54.8118 41.1670 L 29.6315 41.1670 C 30.6877 38.0737 31.3290 34.4523 31.4611 30.5290 C 32.6494 30.2650 33.8941 30.1329 35.1769 30.1329 C 35.8371 30.1329 36.2141 30.4159 36.2141 30.9063 C 36.2141 32.5472 35.3276 33.8298 35.3276 35.4708 C 35.3276 36.9043 36.3841 37.7719 37.7608 37.7719 C 41.5896 37.7719 46.2108 31.2269 47.7385 31.2269 C 49.1342 31.2269 47.3990 37.1117 52.1522 37.1117 C 52.9256 37.1117 53.9253 36.9043 54.6986 36.4139 C 55.1513 36.0932 55.4719 35.6405 55.4719 35.0558 C 55.4719 34.3391 55.0192 33.7544 54.2648 33.7544 C 53.6046 33.7544 53.0577 34.3013 52.4164 34.3013 C 50.3792 34.3013 52.3218 28.0393 48.5687 28.0393 C 45.2868 28.0393 40.1561 34.4145 38.8548 34.4145 C 38.6852 34.4145 38.5531 34.3202 38.5531 34.0939 C 38.5531 33.4149 39.4017 31.8871 39.4017 30.3593 C 39.4017 28.4732 37.8361 27.2660 35.3844 27.2660 C 34.0451 27.2660 32.7248 27.3980 31.4611 27.6432 C 31.0461 17.7032 26.3307 9.8756 19.1256 9.8756 C 14.2782 9.8756 10.5436 14.0063 10.5436 19.2687 C 10.5436 25.4176 14.5423 30.6799 19.5217 34.1693 C 17.3149 36.3384 15.5985 38.8093 14.5423 41.1670 L 1.1883 41.1670 C .5281 41.1670 0 41.6574 0 42.3175 C 0 42.9777 .5281 43.4869 1.1883 43.4869 Z M 13.4106 19.2687 C 13.4106 15.5907 15.9003 12.7426 19.1256 12.7426 C 24.7841 12.7426 28.4432 19.7780 28.6130 28.4166 C 26.0101 29.3219 23.6335 30.6988 21.5776 32.3397 C 17.6544 29.6237 13.4106 25.1347 13.4106 19.2687 Z M .6413 37.1495 C 1.1317 37.6399 1.8673 37.6210 2.3765 37.1495 L 4.7342 34.7918 L 7.0919 37.1495 C 7.5823 37.6399 8.3368 37.6399 8.8272 37.1495 C 9.3176 36.6591 9.3176 35.9046 8.8272 35.4142 L 6.4695 33.0754 L 8.8272 30.7177 C 9.3176 30.2273 9.3176 29.4917 8.8272 29.0012 C 8.3368 28.4920 7.5823 28.5109 7.0919 29.0012 L 4.7342 31.3401 L 2.3765 29.0012 C 1.8673 28.4920 1.1317 28.4920 .6413 29.0012 C .1509 29.4917 .1509 30.2461 .6413 30.7177 L 2.9990 33.0754 L .6413 35.4142 C .1509 35.9235 .1509 36.6591 .6413 37.1495 Z M 23.6335 36.5459 C 23.8787 36.6591 24.1051 36.7156 24.3314 36.7156 C 25.1047 36.7156 25.6517 36.1121 25.6517 35.4708 C 25.6517 34.9992 25.4254 34.5466 24.8784 34.2825 C 24.6143 34.1505 24.3503 34.0184 24.0674 33.8675 C 25.4254 32.9056 26.9343 32.0568 28.5564 31.4155 C 28.3300 35.0558 27.6322 38.4132 26.5571 41.1670 L 17.5790 41.1670 C 18.5597 39.3185 20.0309 37.3758 21.8982 35.6594 C 22.4641 35.9800 23.0488 36.2630 23.6335 36.5459 Z M 16.2586 45.6560 C 16.2586 44.9959 16.3718 44.2603 16.6170 43.4869 L 25.4820 43.4869 C 23.7844 46.6180 21.5022 48.5418 18.8993 48.5418 C 17.0886 48.5418 16.2586 47.3536 16.2586 45.6560 Z"></path></g></svg>
  </div>

</div>

<div class="section" id="ModuloFirma" style="display: block;">
  <div class="container">
    <div class="row full-height justify-content-center">
      <div class="col-12 text-center align-self-center py-5">
        <div class="section pb-5 pt-5 pt-sm-2 text-center">
        
          <input class="checkbox" type="checkbox" id="reg-log" name="reg-log" />

          <div class="card-3d-wrap mx-auto">
            <div class="card-3d-wrapper">
              <div class="card-front">
                <div class="center-wrap">
                  <div class="section text-center" style="color: white;">

                    <h4 class="mb-4 pb-3">Informacion/Estado de la pieza</h4>
                    <div class="form-group">
                      <?php
                        echo "<p class='mb-0 mt-4 text-center'>Numero Dedo: <br>#{$Numero_Dedo}</p>";
                        echo "<p class='mb-0 mt-4 text-center'>Superficie: <br>{$Superficie}</p>";
                        echo "<p class='mb-0 mt-4 text-center'>Procedimiento/Estado: <br>{$Procedimiento}</p>";
                        echo "<p class='mb-0 mt-4 text-center'>Mas Detalles: <br>{$Detalle}</p>";
                      ?>
                    </div>


                    <h4 class="mb-4 pb-3">Firma</h4>
                    <div class="form-group">
                      <canvas id="canvas" style="border: 1px solid black;"></canvas>
                      <hr>
                      <button id="clear" class="btn mt-4b">Borrar firma</button>
                      <button id="clear" class="btn mt-4b" data-action="change-color">Cambiar Color</button>
                      <button id="clear" class="btn mt-4b" data-action="change-width">Cambiar Ancho</button>
                      <button id="clear" class="btn mt-4b" data-action="undo" >Deshacer</button>
                    </div>

                    <form action="#" method="POST" id="FormularioFirma" onsubmit="event.preventDefault();AgregarFirma();">
                      <div class="form-group">
                        <p class="mb-0 mt-4 text-center">Nombres y Apellidos</p>
                        <input type="text" name="Nombres" class="form-style" placeholder="Nombres y Apellidos" required>
                        <i class="input-icon uil uil-at"></i>
                      </div>
                      <div class="form-group mt-2">
                        <p class="mb-0 mt-4 text-center">Numero de Documento</p>
                        <input type="text" name="Documento" class="form-style" placeholder="Numero de Documento"  required>
                        <i class="input-icon uil uil-lock-alt"></i>
                      </div>
                      <button class="btn mt-4b" style="width:100%" id="BotonGuardar" >Guardar</button>
                      <input type="hidden" name="firma_base64" id="firma_base64">
                      <!--<input type="hidden" name="tabla" value="<?=$Tabla_Inicial;?>">-->
                      <input type="hidden" name="tabla_id" value="<?=$id_Inicial;?>">
                      <input type="hidden" name="uid" value="<?=$usuario_Inicial;?>">
                    </form>
                  </div>
                </div>
              </div>
              <div class="card-back">
                <div class="center-wrap">
                  <div class="section text-center">
                    <h4 class="mb-4 pb-3" style="color:white;" id="MensajeFinal">La Firma se registro Correctamente</h4>
                    <div class="form-group">
                    <svg width="256px" height="256px" viewBox="0 0 64.00 64.00" xmlns="http://www.w3.org/2000/svg" stroke-width="3" stroke="#ffffff" fill="none"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><polygon points="49.89 7.74 49.89 43.4 37.94 56.26 12.28 56.26 12.28 7.74 49.89 7.74" stroke-linecap="round"></polygon><polyline points="37.92 56.26 37.94 43.4 49.89 43.4"></polyline><line x1="17.58" y1="45.36" x2="32.59" y2="45.36"></line><line x1="17.58" y1="38.84" x2="41.59" y2="38.84"></line><line x1="17.58" y1="32.74" x2="44.59" y2="32.74"></line><polyline points="24.06 20.81 28.63 24.26 36.7 12.93"></polyline></g></svg>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<script src='plugins/jquery/jquery-2.2.3.min.js'></script>
<script src='plugins/Firmas/Firma_js_TweenMax.min.js'></script>

<script src='plugins/Firmas/Firma_js_delaunay.js'></script>

<script src='plugins/Firmas/Fondo.js'></script>
<script src='plugins/Firmas/CargaDinamica_Transicion.js'></script>
<script>

    const changeColorButton = document.querySelector("[data-action=change-color]");
    const undoButton = document.querySelector("[data-action=undo]");
    const changeWidthButton = document.querySelector("[data-action=change-width]");

    const canvas1 = document.getElementById('canvas');
    canvas1.width = canvas1.offsetWidth;
    canvas1.height = canvas1.offsetHeight;
    
    const signaturePad = new SignaturePad(canvas1, {
      backgroundColor: 'aliceblue'
    });

    changeWidthButton.addEventListener("click", () => {
      const min = Math.round(Math.random() * 100) / 10;
      const max = Math.round(Math.random() * 100) / 10;

      signaturePad.minWidth = Math.min(min, max);
      signaturePad.maxWidth = Math.max(min, max);
    });

    // Actualiza el valor del input oculto cada vez que se termina de dibujar
    signaturePad.onEnd = function() {
      const dataURL = signaturePad.toDataURL();
      const inputFirma = document.getElementById('firma_base64');
      inputFirma.value = dataURL;
    };

    undoButton.addEventListener("click", () => {
    const data = signaturePad.toData()

      if (data) {
        data.pop()  // remove the last dot or line
        signaturePad.fromData(data)
      }
    })

    changeColorButton.addEventListener("click", () => {
      const r = Math.round(Math.random() * 255)
      const g = Math.round(Math.random() * 255)
      const b = Math.round(Math.random() * 255)
      const color = "rgb(" + r + "," + g + "," + b +")"

      signaturePad.penColor = color
    })

    const clearButton = document.getElementById('clear');
    clearButton.addEventListener('click', function() {
      signaturePad.clear();

      document.getElementById('firma_base64').value = '';
    });

  </script>
<script>
  //despues de 3 segundos a este id stars ponerle display block
  document.getElementById('ModuloFirma').style.display = 'none';
  const stars = document.getElementById('stars');
  const formulario1 = document.getElementById('ModuloFirma');
  setTimeout(() => {
    stars.style.display = 'block';
    formulario1.style.display = 'block';
  }, 1500);

  function AgregarFirma() {
    //serealize FormularioFirma
    //firma_base64
    var firma = $("#firma_base64").val();
    if (firma == "") {
      alert("Debe llenar la firma");
      return false;
    }
    var data_form = $("#FormularioFirma").serialize() + '&Tipo_Consulta=Agregar Firma';
        $.ajax({
            type: "POST",
            url: "PD_ModuloFirma.php",
            data: data_form,
            success: function(response) {
              var Respuesta = JSON.parse(response);
              if (Respuesta.Estado == true) {
                $("#reg-log").addClass("active");
                $("#BotonGuardar").css("display","none");
              }else{
                alert("No se registro Correctamente");
              }
            }
        });
    
  }
</script>
<script>
<?php
if($YaFirmado==true){
?>
  $("#reg-log").addClass("active");
  $("#BotonGuardar").css("display","none");
  $("#MensajeFinal").html("<u>Ya se encuentra registrada la firma, sobre el estado/procedimiento del dedo</u>");
<?php
}
?>
</script>
