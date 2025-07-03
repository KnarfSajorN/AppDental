<?php

$user_agent = $_SERVER['HTTP_USER_AGENT'];

 

function getBrowser($user_agent){

 

if(strpos($user_agent, 'MSIE') !== FALSE)

   return 'Internet explorer';

 elseif(strpos($user_agent, 'Edge') !== FALSE) //Microsoft Edge

   return 'Microsoft Edge';

 elseif(strpos($user_agent, 'Trident') !== FALSE) //IE 11

    return 'Internet explorer';

 elseif(strpos($user_agent, 'Opera Mini') !== FALSE)

   return "Opera Mini";

 elseif(strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR') !== FALSE)

   return "Opera";

 elseif(strpos($user_agent, 'Firefox') !== FALSE)

   return 'Mozilla Firefox';

 elseif(strpos($user_agent, 'Chrome') !== FALSE)

   return 'Google Chrome';

 elseif(strpos($user_agent, 'Safari') !== FALSE)

   return "Safari";

 else

   return 'No hemos podido detectar su navegador';

 

 

}

 

 

$navegador = getBrowser($user_agent);

if ($navegador <> "Google Chrome") {

echo "<div align='center'>"; 

echo "<font size = '6' color ='red'>  El navegador con el que estas visitando esta web es: ".$navegador;

echo "<br>";

echo "Para un correcto Funcionamiento te recomedamos Utilizar Google Chrome ";

echo "  <a href='https://www.google.es/chrome/browser/desktop/'>Descargar Aqui</a> </font> ";

echo "</div>"; 

}



?>



<?php
include 'funciones/funciones.php';
$idCitas = $_GET['idCitas'];
$SalaNumero = $_GET['SalaNumero'];
       $queryCita=mysqli_query($conn3,"SELECT * FROM  citas  where idCitas= $idCitas");
                //  $queryList=mysqli_query($conn3,"SELECT * FROM  citas");

                  $nrowl=mysqli_num_rows($queryCita);

                  while($row_recordset32=mysqli_fetch_array($queryCita))

                  {
                      $idCitas      = $row_recordset32['idCitas'];
                      $Doctor= $row_recordset32['doctor'];
                      $fecha= $row_recordset32['fecha'];
                      $Hora= $row_recordset32['Hora'];
                      $nombre= $row_recordset32['nombre'];
                      $telefono= $row_recordset32['telefono'];
                      $correo= $row_recordset32['correo'];
                      $motivoConsulta= $row_recordset32['motivoConsulta'];
                      $activo= $row_recordset32['activo']; 
                      $estado= $row_recordset32['estado'];
                      $clienteId= $row_recordset32['idCliente'];
  
                  }

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Consulta Telemedicina <?php echo $idCitas?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{$Base}/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{$Base}/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{$Base}/dist/css/AdminLTE.min.css">


<!--Start of Zendesk Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="https://v2.zopim.com/?65r3mACnIFh8hYjJwvyl5pg2FZqM7yDU";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
</script>
<!--End of Zendesk Chat Script-->






<style type="text/css">
    html, body {
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
    <img alt="full screen background image" src="https://www.esan.edu.pe/conexion/bloggers/2017/10/11/1500x844_medicos.jpg" id="full-screen-background-image" /> 

                <br>  
                <br>  
                <br>  
 


      <div class="col-xs-12" align="center">
       <h1> <font color="green"> <strong>   Su firma a sido registrada !! Observa el video a continuacion para entender como sera la consulta </strong> </font></h1> 
 
<iframe width="100%" height="415" src="https://www.youtube.com/embed/9eabZUkZ2Qo" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
<br>
<br>
<br>
</div>

      <div class="col-xs-12" align="center">

        <div class="col-xs-4">

        <button id="btnComenzarGrabacion"  class="btn btn-block btn-success btn-sm"> <h4> <strong>   Comenzar  </strong> </h4> </button>
</div>

<div class="col-xs-4">
        <button id="btnDetenerGrabacion"  class="btn btn-block btn-danger btn-sm"> <h4> <strong> Finalizar  </strong> </h4> </button>
        <input type="hidden" name="idCitas" id="idCitas" value="<?php echo $idCitas?>">
</div>


<div class="col-xs-4">
<a href="javascript:otra_ventana('https://appr.tc/r/<?php echo rand(11111,999999)?>')">
<!--
<a href="javascript:otra_ventana('salaVideoconsulta2.php')">
-->


        <button id="btnDetenerGrabacion"  class="btn btn-block btn-info btn-sm"> <h4> <strong> Entrar a la sala   </strong> </h4> </button>
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


    <script src="script2.js"></script>






















<script languaje="JavaScript">
function otra_ventana(direccion)
{
var ruta=direccion;
var caracteristicas="toolbar=0, location=0, directories=0, resizable=0, scrollbars=0, height=640, width=800, top=0, left=0";

win=window.open(ruta ,"",caracteristicas);
}
</script>


<!--
          <iframe src="https://tokbox.com/embed/embed/ot-embed.js?embedId=23cd172a-f4a0-4080-8a14-f701f2dcbc4a&room=123&iframe=true" width="800px" height="640px" scrolling="auto" allow="microphone; camera" ></iframe>
        
-->


        </div>

 



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

    
</body>