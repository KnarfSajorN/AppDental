<?php
// ESTRUCTURA PARA PREPARARA DATOS RECIBIDOS POR AJAX
if (isset($_POST['key'])) {
  include './funciones/funciones.php';
  header("Content-Type: application/json; charset=UTF-8");

  $array = [
    'status' => true,
    'data' => array(),
    'error' => array(),
    'ok' => array()
  ];

  if ($_POST['key'] == 'cargarChat') { // BUSCAR REGISTROS
    $prepare = str_replace("', ", "' AND ", preparePost($_POST, ['key']));
    $select = mysqli_query($conn3, "SELECT nombre, mensaje, (timestamp) AS fecha FROM mensajes WHERE {$prepare}");
    if (mysqli_num_rows($select) > 0) {
      while ($row = mysqli_fetch_array($select)) {
        array_push($array['data'], $row);
      }
      array_push($array['ok'], "Mensajes Obtenidos");
    } else {
      $array['status'] = false;
      array_push($array['error'], "Error {$_POST['key']}: " . mysqli_error($conn3));
    }
    echo json_encode($array);
    exit();
  }

  echo json_encode($array);
  exit();
}
session_start();
include 'funciones/funciones.php';
include("funciones/funcionesUtilidades.php");
$idCitas = $_GET['idCitas'];
$SalaNumero = $_GET['SalaNumero'];
$_SESSION['idCitas'];
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
}
$_SESSION['idCitas'] = $idCitas;

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> <?php echo $sistema ?> </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE_VC.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="plugins/colorpicker/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/select2.min.css">
  <!-- Theme style -->

  <link rel="stylesheet" href="plugins/morris/morris.css">

  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="shortcut icon" type="image/x-icon" href="./icono.ico">

  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">

  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.min.css">
  <link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.print.css" media="print">

  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <!--Start of Zendesk Chat Script-->
  <!-- Start of  Zendesk Widget script -->
  <script id="ze-snippet" src="https://static.zdassets.com/ekr/snippet.js?key=6b1fc0fa-9c06-48f9-ae42-42c86d13fa7b"> </script>
  <!-- End of  Zendesk Widget script -->
  <style type="text/css">
    #otEmbedContainer {
      width: 100%;
      height: 500px;
    }
  </style>
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
          setTimeout('cargar_push()', 2000);

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
      background-image: url("f-chat.jpg");
      background-size: contain;
      height: 482px;
      width: 100%;
      border: 1px solid #ddd;
      /* background: #f1f1f1; */
      overflow-y: scroll;
      position: relative;
      top: 10px;
      overflow-x: hidden;
      overflow-y: auto;
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







</head>





<body class="hold-transition skin-blue sidebar-mini">

  <div class="wrapper">
    <header class="main-header">

      <!-- Logo -->
      <a href="portada.php" class="logo">
        <span class="logo-mini"> <img src="img/logoSolo.png" width="90%" height="90%"></span>

        <!-- mini logo for sidebar mini 50x50 pixels 
      <span class="logo-mini"><b>D</b></span>-->
        <span class="logo-lg"> <img src="img/logoletras.png" width="90%" height="90%"> </span>
        <!-- logo for regular state and mobile devices
      <span class="logo-lg"><b>Triple</b>D</span> -->
      </a>
    </header>
    <?php if ($_SESSION['ID'] <> '') : ?>
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">
              <div align="center">
                <font color="#fff" size="2"> Menú <?php echo $_SESSION['TIPO']; ?>

                  <?php if ($_SESSION['sucursal'] <> '') {
                    echo '<br><font color="#fff" size="3"> <strong>' . $_SESSION['sucursal'] . '-' . sucursal($_SESSION['sucursal']) . '</strong></font>';
                  }
                  ?>
                </font>
              </div>
            </li>

            <li class="treeview">
              <a href="<?php echo $Base; ?>portada">
                <i class="fa fa-dashboard"></i> <span>Escritorio</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>

            <li class="treeview">
              <a target="_blank" href="<?php echo $Base . 'Historia_Clinica.php?cI=' . encrypt($clienteId); ?>">
                <i class="fa fa-user"></i> <span>Historia Clinica</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>


            <!--<li class="treeview">
              <a target="_blank" href="<?php echo $Base . 'historiaClinicaN.php?clienteId=' . $clienteId ?>">
                <i class="fa fa-user"></i> <span>Telemedicina </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>-->

            <li class="treeview">
              <a target="_blank" href="<?php echo $Base . 'RM_HistorialReceta.php?clienteId=' . $clienteId ?>">
                <i class="fa fa-user"></i> <span>Recetario</span>

                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>

            <li class="treeview">
              <a href="<?php echo $Base; ?>portada">
                <i class="fa fa-close"></i> <span>Salir de consulta</span>
                <span class="pull-right-container">

                </span>
              </a>
            </li>
            <?php echo $_SESSION['idCitas']; ?>
            <li>

              <div align="center">
                <br>
                <img src="<?= $Base ?>/alte2.png" title="ALTE" height="100" width="100">
              </div>



            </li>



          </ul>


        </section>

        <br>
        <br>
        <br>


        <div style="color:#fff; margin-left:15px">
          <p><b>Paciente: </b><?= $nombre ?></p>
          <p><b>Telefono: </b><?= $telefono ?></p>
          <p><b>Correo: </b><?= $correo ?></p>
          <p><b>Motivo de Consulta: </b><?= $motivoConsulta ?></p>
        </div>


        <!-- /.sidebar -->
      </aside>


    <?php endif ?>


    </header>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->

      <section class="content-header">
        <h1>
          Video Consulta

        </h1>

      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">












          <div class="col-xs-12 col-sm-12 col-lg-6" align="center">


            <!--<?php
                if (funcionMaster($_SESSION['ID'], 'ID_Usuario', 'canalDedicado', 'config') == 1) {
                  echo funcionMaster($_SESSION['ID'], 'ID_Usuario', 'canalDedicadoVideo', 'config');
                } else { ?>

    <iframe src="https://appr.tc/r/<?php echo $SalaNumero ?>" width=100% height=60% scrolling="auto" allow="microphone; camera" ></iframe>




 
<?php
                }

?>-->

            <?php
            /*
if (funcionMaster($_SESSION['ID'], 'ID_Usuario', 'canalDedicado', 'config') == 1) {
    echo funcionMaster($_SESSION['ID'], 'ID_Usuario', 'canalDedicadoVideo', 'config');
*/

            if (strlen($salabaseDev) > 0) {
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
                <!-- <span style="color: black; word-break: break-all; width: 100%;">
                  Prueba: mensaje<br>
                  <p style="font-size:10px">2022-05-06 12:00:00</p>
                </span> -->
              </div>
            </div>

            <div class="input-group input-group-sm">
              <input type="text" name="mensaje" id="mensaje" class="form-control">
              <span class="input-group-btn">
                <a href="#TestChat" onclick="agergarItem();"> <button type="button" class="btn btn-info btn-flat" style="height: 30px;">
                    <font size="2"><strong> <i class="fa fa-send-o" title="Enviar"></i> </strong> </font>
                  </button></a>
              </span>
            </div>
            <!--
1 = Paciente
2 = Especialista
 -->
            <input type="hidden" name="tipo" id="tipo" value="1" />

            <input type="hidden" name="idUsuario" id="idUsuario" value="<?php echo $_SESSION['ID'] ?>" />
            <input type="hidden" name="idChat" id="idChat" value="<?php echo $idCitas ?>" />
            <input type="hidden" name="nombre" id="nombre" value="<?php echo $_SESSION['NOMBRE_USUARIO'] ?>" />


            <div id="div-results"> </div>
            </form>

            <hr>
            <br>





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
              })
            </script>















          </div>







          <div class="col-xs-12 col-sm-12 col-lg-3" align="center">
            <font size="4" color="red">
              <strong> Grabar su consulta (Opcional) </strong>
            </font>
            <button id="btnComenzarGrabacion" class="btn btn-block btn-success btn-sm">
              <h4> <strong> Comenzar grabación </strong> </h4>
            </button>
            <button id="btnDetenerGrabacion" class="btn btn-block btn-danger btn-sm">
              <h4> <strong> Finalizar grabación </strong> </h4>
            </button>
            <a href="salirDelaConsulta.php">
              <button id="btnDetenerGrabacion" class="btn btn-block btn-info btn-sm" style="margin-top:5px">
                <h4> <strong> Finalizar Consulta </strong> </h4>
              </button>
            </a>
            <input type="hidden" name="idCitas" id="idCitas" value="<?php echo $idCitas ?>">
            <p id="duracion"></p>

            <label for="dispositivosDeAudio" style="color: black;">Micrófono:</label><br>
            <select name="dispositivosDeAudio" id="dispositivosDeAudio" style="width: 100%; color: black;"></select>
            <br><br>
            <label for="dispositivosDeVideo" style="color: black;">Cámara:</label><br>
            <select name="dispositivosDeVideo" id="dispositivosDeVideo" style="width: 100%; color: black;"></select>
            <br><br>

            <video muted="muted" id="video" width="30%"></video>
            <script src="script2.js"></script>


            <hr>
            <br>
          </div>
























          <script languaje="JavaScript">
            function otra_ventana(direccion) {
              var ruta = direccion;
              var caracteristicas = "toolbar=0, location=0, directories=0, resizable=0, scrollbars=0, height=640, width=800, top=0, left=0";

              win = window.open(ruta, "", caracteristicas);
            }
          </script>


        </div>













































        <div class="col-xs-12">
          <div class="col-xs-9">

























            <!--

        <div class="col-xs-3">

        <button id="btnComenzarGrabacion"  class="btn btn-block btn-success btn-sm"> <h4> <strong>   Iniciar Grabación  </strong> </h4> </button>
</div>

<div class="col-xs-3">
        <button id="btnDetenerGrabacion"  class="btn btn-block btn-danger btn-sm"> <h4> <strong> Finalizar Grabación </strong> </h4> </button>
</div>


<div class="col-xs-3">





<a href="javascript:otra_ventana('salaVideoconsulta1.php')">
        <button id="btnDetenerGrabacion"  class="btn btn-block btn-info btn-sm"> <h4> <strong> Entrar a la sala   </strong> </h4> </button>
</a>




 
</div>
<div class="col-xs-3">
<a href="salirDelaConsulta.php">
        <button id="btnDetenerGrabacion"  class="btn btn-block btn-info btn-sm"> <h4> <strong> Finalizar Consulta  </strong> </h4> </button>
</a>
</div>


        <div class="col-xs-12">
<font size="10">
  
        <p id="duracion"></p>
</font>

 
        <label for="dispositivosDeAudio">Micrófono:</label><br>
        <select name="dispositivosDeAudio" id="dispositivosDeAudio"></select>
        <br><br>
        <label for="dispositivosDeVideo">Cámara:</label><br>
        <select name="dispositivosDeVideo" id="dispositivosDeVideo"></select>
        <br><br>
        <video muted="muted" id="video"></video>
        <br><br>
        <br>

    </div>


    <script src="script.js"></script>


























<script languaje="JavaScript">
function otra_ventana(direccion)
{
var ruta=direccion;
var caracteristicas="toolbar=0, location=0, directories=0, resizable=0, scrollbars=0, height=640, width=800, top=0, left=0";
win=window.open(ruta ,"",caracteristicas);
}
</script>







       



        </div>

        <div class="col-xs-3">
<?php

echo '<strong>nombre: </strong>' . $nombre . '<br>';
echo '<strong>telefono: </strong>' . $telefono . '<br>';
echo '<strong>correo: </strong>' . $correo . '<br>';
echo '<strong>motivoConsulta: </strong>' . $motivoConsulta . '<br>';


echo '<a target="_blank" href="https://wa.me/' . $telefono . '"><img src="https://amparemos.com/whatsappLogo.png" whith = "5%" height="5%"></a>';




?>
        </div>
-->



            <!--

 <style>
            .videoContainer {
                position: relative;
                width: 600px;
                height: 550px;
            }
            .videoContainer video {
                position: absolute;
                width: 100%;
                height: 100%;
            }
            .volume_bar {
                position: absolute;
                width: 5px;
                height: 0px;
                right: 0px;
                bottom: 0px;
                background-color: #12acef;
            }
        </style>



    <form id="createRoom">
           
            <input id="sessionInput"/>
            
    </form>



<table width="90%">
  <tr>
    <th width="90%">
<div align="center">Doctor</div>
 

 <div id="remotes"></div>

 

    </th>
    <th  width="10%"> 

<div align="center">Paciente</div>
           <br>
        <br>
        <br>
        <div class="videoContainer">
            <video id="localVideo" style="height: 150px;" oncontextmenu="return false;"></video>
            <div id="localVolume" class="volume_bar"></div>
        </div>

    </th>
  </tr>
</table>
   
-->





            <!--

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
        <script src="out/simplewebrtc-with-adapter.bundle.js"></script>

        <script>

          /*
            // grab the room from the URL
            var room = location.search && location.search.split('?')[1];

            // create our webrtc connection
            var webrtc = new SimpleWebRTC({
                // the id/element dom element that will hold "our" video
                localVideoEl: 'localVideo',
                // the id/element dom element that will hold remote videos
                remoteVideosEl: '',
                // immediately ask for camera access
                autoRequestMedia: true,
                debug: false,
                detectSpeakingEvents: true
            });

            // when it's ready, join if we got a room from the URL
            webrtc.on('readyToCall', function () {
                // you can name it anything
                if (room) webrtc.joinRoom(room);
            });

            function showVolume(el, volume) {
                if (!el) return;
                if (volume < -45) { // vary between -45 and -20
                    el.style.height = '0px';
                } else if (volume > -20) {
                    el.style.height = '100%';
                } else {
                    el.style.height = '' + Math.floor((volume + 100) * 100 / 25 - 220) + '%';
                }
            }
            webrtc.on('channelMessage', function (peer, label, data) {
                if (data.type == 'volume') {
                    showVolume(document.getElementById('volume_' + peer.id), data.volume);
                }
            });
            webrtc.on('videoAdded', function (video, peer) {
                console.log('video added', peer);
                var remotes = document.getElementById('remotes');
                if (remotes) {
                    var d = document.createElement('div');
                    d.className = 'videoContainer';
                    d.id = 'container_' + webrtc.getDomId(peer);
                    d.appendChild(video);
                    var vol = document.createElement('div');
                    vol.id = 'volume_' + peer.id;
                    vol.className = 'volume_bar';
                    video.onclick = function () {
                        video.style.width = video.videoWidth + 'px';
                        video.style.height = video.videoHeight + 'px';
                    };
                    d.appendChild(vol);
                    remotes.appendChild(d);
                }
            });
            webrtc.on('videoRemoved', function (video, peer) {
                console.log('video removed ', peer);
                var remotes = document.getElementById('remotes');
                var el = document.getElementById('container_' + webrtc.getDomId(peer));
                if (remotes && el) {
                    remotes.removeChild(el);
                }
            });
            webrtc.on('volumeChange', function (volume, treshold) {
                //console.log('own volume', volume);
                showVolume(document.getElementById('localVolume'), volume);
            });

            // Since we use this twice we put it here
            function setRoom(name) {
                $('form').remove();
                $('h1').text(name);
                $('#subTitle').text('Link to join: ' + location.href);
                $('body').addClass('active');
            }

            if (room) {
                setRoom(room);
            } else {
                $('form').submit(function () {
                    var val = $('#sessionInput').val().toLowerCase().replace(/\s/g, '-').replace(/[^A-Za-z0-9_\-]/g, '');
                    webrtc.createRoom(val, function (err, name) {
                        console.log(' create room cb', arguments);

                        var newUrl = location.pathname + '?' + name;
                        if (!err) {
                            history.replaceState({foo: 'bar'}, null, newUrl);
                            setRoom(name);
                        } else {
                            console.log(err);
                        }
                    });
                    return false;
                });
            }

            var button = $('#screenShareButton'),
                setButton = function (bool) {
                    button.text(bool ? 'share screen' : 'stop sharing');
                };
            webrtc.on('localScreenStopped', function () {
                setButton(true);
            });

            setButton(true);

            button.click(function () {
                if (webrtc.getLocalScreen()) {
                    webrtc.stopScreenShare();
                    setButton(true);
                } else {
                    webrtc.shareScreen(function (err) {
                        if (err) {
                            setButton(true);
                        } else {
                            setButton(false);
                        }
                    });

                }
            });

            */
        </script>

-->



























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