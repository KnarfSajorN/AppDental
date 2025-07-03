<?php
session_start();
$_SESSION['idCitas'];
$_SESSION['usuario_id'];
$user_agent = $_SERVER['HTTP_USER_AGENT'];

function getBrowser($user_agent)
{

  if (strpos($user_agent, 'MSIE') !== FALSE)

    return 'Internet explorer';

  elseif (strpos($user_agent, 'Edge') !== FALSE) //Microsoft Edge

    return 'Microsoft Edge';

  elseif (strpos($user_agent, 'Trident') !== FALSE) //IE 11

    return 'Internet explorer';

  elseif (strpos($user_agent, 'Opera Mini') !== FALSE)

    return "Opera Mini";

  elseif (strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR') !== FALSE)

    return "Opera";

  elseif (strpos($user_agent, 'Firefox') !== FALSE)

    return 'Mozilla Firefox';

  elseif (strpos($user_agent, 'Chrome') !== FALSE)

    return 'Google Chrome';

  elseif (strpos($user_agent, 'Safari') !== FALSE)

    return "Safari";

  else

    return 'No hemos podido detectar su navegador';
}





$navegador = getBrowser($user_agent);

if ($navegador <> "Google Chrome") {

  echo "<div align='center'>";

  echo "<font size = '6' color ='red'>  El navegador con el que estas visitando esta web es: " . $navegador;

  echo "<br>";

  echo "Para un correcto Funcionamiento te recomedamos Utilizar Google Chrome ";

  echo "  <a href='https://www.google.es/chrome/browser/desktop/'>Descargar Aqui</a> </font> ";

  echo "</div>";
}



?>



<?php
include 'funciones/funciones.php';
//echo $salabaseDev;
$idCitas = $_GET['idCitas'];
$SalaNumero = $_GET['SalaNumero'];
$_SESSION['idCitas'] = $_GET['idCitas'];
//echo $_SESSION['idCitas'];


$queryCita = mysqli_query($conn3, "SELECT * FROM  citas  where idCitas= $idCitas");
//  $queryList=mysqli_query($conn3,"SELECT * FROM  citas");

$nrowl = mysqli_num_rows($queryCita);

while ($row_recordset32 = mysqli_fetch_array($queryCita)) {
  $idCitas      = $row_recordset32['idCitas'];
  $Doctor = $row_recordset32['doctor'];
  $fecha = $row_recordset32['fecha'];
  $Hora = $row_recordset32['Hora'];
  $nombre = $row_recordset32['nombre'];
  $telefono = $row_recordset32['telefono'];
  $correo = $row_recordset32['correo'];
  $motivoConsulta = $row_recordset32['motivoConsulta'];
  $activo = $row_recordset32['activo'];
  $estado = $row_recordset32['estado'];
  $clienteId = $row_recordset32['idCliente'];
  $usuario_id = $row_recordset32['usuario_id'];
}
if ($estado == 1 or $estado == 2) {


  $_SESSION['usuario_id'] = $clienteId;


  //echo $_SESSION['usuario_id'];

?>
  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Consulta Telemedicina <?php echo $idCitas ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="https://medicalsoftcolombia.com/sistema/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="https://medicalsoftcolombia.com/sistema/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://medicalsoftcolombia.com/sistema/dist/css/AdminLTE.min.css">


    <!-- Start of  Zendesk Widget script -->
    <script id="ze-snippet" src="https://static.zdassets.com/ekr/snippet.js?key=6b1fc0fa-9c06-48f9-ae42-42c86d13fa7b"> </script>
    <!-- End of  Zendesk Widget script -->





    <!--
-->

    <script language="javascript" src="js/jquery-1.7.2.min.js"></script>
    <script language="javascript">
      var timestamp = null;

      function cargar_push() {
        $.ajax({
          async: true,
          type: "POST",
          url: "httpush.php",
          data: "&timestamp=" + timestamp,
          dataType: "html",
          success: function(data) {
            var json = eval("(" + data + ")");
            timestamp = json.timestamp;
            mensaje = json.mensaje;
            id = json.id;
            status = json.status;
            tipo = json.tipo;

            if (timestamp == null) {

            } else {
              $.ajax({
                async: true,
                type: "POST",
                url: "mensajes.php",
                data: "",
                dataType: "html",
                success: function(data) {
                  $('#div' + tipo).html(data);
                }
              });
            }
            setTimeout('cargar_push()', 3000);

          }
        });
      }

      // $(document).ready(function() {
      //   cargar_push();
      // });
    </script>






    <!--       estilo del chat       -->
    <!--       estilo del chat       -->
    <!--       estilo del chat       -->

    <style type="text/css">
      #global {
        height: 400px;
        width: 100%;
        border: 1px solid #ddd;
        background: #f1f1f1;
        overflow-y: scroll;
      }

      #div1 {
        height: auto;
      }

      .texto {
        padding: 4px;
        background: #fff;
      }
    </style>
    <!--       estilo del chat       -->
    <!--       estilo del chat       -->
    <!--       estilo del chat       -->











    <style type="text/css">
      html,
      body {
        height: 100%;
        width: 100%;
        padding: 0;
        margin: 0;
      }

      #full-screen-background-image {
        z-index: -999;
        width: 100%;
        height: auto;
        position: fixed;
        top: 0;
        left: 0;
      }
    </style>

  <body>
    <!--<img alt="full screen background image" src="https://www.esan.edu.pe/conexion/bloggers/2017/10/11/1500x844_medicos.jpg" id="full-screen-background-image" />-->

    <br>
    <br>
    <br>
    <!-- 
<div class="col-xs-12">

<a href="javascript:otra_ventana('https://appr.tc/r/<?php echo $SalaNumero ?>')">

<a href="javascript:otra_ventana('salaVideoconsulta2.php')">


        <button id="btnDetenerGrabacion"  class="btn btn-block btn-info btn-sm"> <h3> <strong> Clic acá para Entrar <br>a la Consulta con el doctor   </strong> </h3> </button>
</a>

<br>
<br>
</div>
-->


    <div class="col-xs-12" align="center">







      <div class="col-xs-12 col-sm-12 col-lg-6" align="center">


        <!--<?php
            if (funcionMaster($Doctor, 'ID_Usuario', 'canalDedicado', 'config') == 1) {
              echo funcionMaster($Doctor, 'ID_Usuario', 'canalDedicadoVideo', 'config');
            } else { ?>

    <iframe src="https://appr.tc/r/<?php echo $SalaNumero ?>" width=100% height=80% scrolling="auto" allow="microphone; camera" ></iframe>




 
<?php
            }

?>-->

        <?php
        /*
if (funcionMaster($_SESSION['ID'], 'ID_Usuario', 'canalDedicado', 'config') == 1) {
    echo funcionMaster($_SESSION['ID'], 'ID_Usuario', 'canalDedicadoVideo', 'config');
*/

        if (strlen($salabaseDev) > 0) {
          //echo "Hola! {$salabaseDev} {$idCitas} {$SalaNumero}";
          echo "Hola! {$nombre}";
          echo '
<div id="otEmbedContainer" style="width:100%;"></div> <script src="https://tokbox.com/embed/embed/ot-embed.js?embedId=' . $salabaseDev . '&room=' . $idCitas . '' . $SalaNumero . '"></script>';
        }


        //}
        else {
        ?>

          <iframe src="https://appr.tc/r/<?php echo $SalaNumero ?>" width=100% height=60% scrolling="auto" allow="microphone; camera"></iframe>

        <?php
        }

        ?>


      </div>





      <script src="script2.js"></script>










      <div class="col-xs-12 col-sm-12 col-lg-3">













        <div id="global">


          <div id="div1" style="width:100%; height:100%; max-height:100%; float:left; padding: 10px; overflow: auto;" align="left">

          </div>
        </div>

        <div class="input-group input-group-sm">
          <input type="text" name="mensaje" id="mensaje" class="form-control">
          <span class="input-group-btn">
            <a href="#TestChat" onclick="agergarItem();"> <button type="button" class="btn btn-info btn-flat">
                <font size="2"><strong> <i class="fa fa-send-o" title="Enviar"></i> </strong> </font>
              </button></a>
          </span>
        </div>
        <!--
1 = Paciente
2 = Especialista
 -->
        <input type="hidden" name="tipo" id="tipo" value="1" />

        <input type="hidden" name="idUsuario" id="idUsuario" value="<?php echo $_SESSION['usuario_id'] ?>" />
        <input type="hidden" name="idChat" id="idChat" value="<?php echo $idCitas ?>" />
        <input type="hidden" name="nombre" id="nombre" value="<?php echo $nombre ?>" />


        <div id="div-results"> </div>
        </form>








        <script language="javascript" src="js/jquery-1.7.2.min.js"></script>

        <script type="text/javascript">
          function agergarItem() {

            // estas son las variables que enviamos

            var mensaje = $("#mensaje").val();
            var usuario = $("#usuario").val();
            var tipo = $("#tipo").val();
            var idUsuario = $("#idUsuario").val();
            var idChat = $("#idChat").val();
            var nombre = $("#nombre").val();


            // aqui enviamos el mensaje por medio de un arreglo     

            $.ajax({
              type: "POST",
              url: "insertar.php",
              data: {
                mensaje: mensaje,
                usuario: usuario,
                tipo: tipo,
                idUsuario: idUsuario,
                idChat: idChat,
                nombre: nombre
              },
              success: function(response) {
                $("#mensaje").val("");
                // $('#div-results').html(response);

                // aqui enviamos el mensaje por medio de un arreglo     



              }
            });
          };

          const cargarChat = () => {
            let idUsuario = $("#idUsuario").val();
            let idChat = $("#idChat").val();
            let data = {
              key: "cargarChat",
              // idUsuario: idUsuario,
              idChat: idChat
            };
            $.ajax({
              url: "verConsulta.php",
              data: data,
              type: "POST",
              dataType: "json",
              success: function(response) {
                // console.log(response);
                if (response.status) {
                  let print = ``;
                  response.data.forEach(element => {
                    print += `<span style="color: black; word-break: break-all; width: 100%;">
                          ${element.nombre}: ${element.mensaje}<br>
                          <p style="font-size:10px">${element.fecha}</p>
                        </span>`;
                  });
                  $("#div1").html(print);
                  const div = document.getElementById('div1');
                  scrollToBottom(div);
                }
              }
            });
          };

          function scrollToBottom(elemento) {
            elemento.scrollTop = elemento.scrollHeight;
          }

          let intervalClose;
          window.addEventListener("load", function() {
            intervalClose = setInterval(cargarChat, 1000);
          });

          $(document).ready(function() {
            // Seleccionar el elemento con jQuery
            const contenedor = $('#div1');
            // Asignar los eventos
            contenedor.on('mouseenter', function() {
              clearInterval(intervalClose);
              // console.log('El mouse entró en el div1');
            });

            contenedor.on('mouseleave', function() {
              intervalClose = setInterval(cargarChat, 1000);
              // console.log('El mouse salió del div1');
            });
          });
        </script>















      </div>





      <!--

        <div class= "col-xs-12 col-sm-12 col-lg-3" align="center">
            <font size="4" color="red">  
<strong>  Grabar su consulta *Opcional  </strong>
            </font>
        <button id="btnComenzarGrabacion"  class="btn btn-block btn-success btn-sm"> <h4> <strong> Comenzar grabación  </strong> </h4> </button>
        <button id="btnDetenerGrabacion"  class="btn btn-block btn-danger btn-sm"> <h4> <strong> Finalizar grabación </strong> </h4> </button>
        <input type="hidden" name="idCitas" id="idCitas" value="<?php echo $idCitas ?>">
        <p id="duracion"></p>

        <label for="dispositivosDeAudio">Micrófono:</label><br>
        <select name="dispositivosDeAudio" id="dispositivosDeAudio"></select>
        <br><br>
        <label for="dispositivosDeVideo">Cámara:</label><br>
        <select name="dispositivosDeVideo" id="dispositivosDeVideo"></select>
        <br><br>
        <video muted="muted" id="video" width="30%"></video>
        <br><br>
        <br>
    <script src="script2.js"></script>


</div>
 -->





    <?php
  } elseif ($estado <> 1 or $estado <> 2) {
    ?>






      <div v class="col-xs-12 col-sm-12 col-lg-12" align="center">


        <h1>Consulta Finalizada</h1>


      </div>





    <?php
  }






    ?>











    <script languaje="JavaScript">
      function otra_ventana(direccion) {
        var ruta = direccion;
        var caracteristicas = "toolbar=0, location=0, directories=0, resizable=0, scrollbars=0, height=640, width=800, top=0, left=0";

        win = window.open(ruta, "", caracteristicas);
      }
    </script>


    </div>
















    </div>


  </body>


  <style>
    #launcher {
      display: none !important;
    }
  </style>
  <script src="./plugins/jQuery/jquery-2.2.3.min.js"></script>