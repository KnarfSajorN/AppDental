<?php /*<!DOCTYPE html>
<html lang="en">
  <head>
    <title>requestVideoFrameCallback Demo</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script>if (location.protocol !== 'https:') { location.protocol = 'https:'; }</script>

    <!-- import the webpage's javascript file -->
  </head>
  <body>
    <h1><code>requestVideoFrameCallback</code> Demo</h1>
    <p>
      Start <button type="button">⏯</button> capturing video from camera. Pause the video to read the metadata.
      Drawing video frames on the canvas is synced with the actual video framerate.
      For details, check out the blog post
      <a href="https://blog.tomayac.com/2020/05/15/the-requestvideoframecallback-api/">
        The requestVideoFrameCallback API
      </a>.
    </p>
    <video id="cameraVideo" width="640" height="360" autoplay playsinline></video>
    <canvas id="canvas" width="640" height="360"></canvas>
    <p><span id="fps-info">0</span>fps</p>
    <p><pre id="metadata-info"></pre></p>
  </body>
</html>

<script>
const startDrawing = async () => { 
  const button = document.querySelector("button");
  const video = document.querySelector("#cameraVideo");
  const canvas = document.querySelector("#canvas");
  const ctx = canvas.getContext("2d");
  const fpsInfo = document.querySelector("#fps-info");
  const metadataInfo = document.querySelector("#metadata-info");

  try {
    const stream = await navigator.mediaDevices.getUserMedia({ video: true });
    video.srcObject = stream;
  } catch (error) {
    console.error("Error accessing camera:", error);
    return;
  }

  button.addEventListener("click", () => (video.paused ? video.play() : video.pause()));

  let width = canvas.width;
  let height = canvas.height;

  let paintCount = 0;
  let startTime = 0.0;

  const updateCanvas = (now, metadata) => {
    if (startTime === 0.0) {
      startTime = now;
    }

    ctx.drawImage(video, 0, 0, width, height);

    const elapsed = (now - startTime) / 1000.0;
    const fps = (++paintCount / elapsed).toFixed(3);
    fpsInfo.innerText = !isFinite(fps) ? 0 : fps;
    metadataInfo.innerText = JSON.stringify(metadata, null, 2);

    video.requestVideoFrameCallback(updateCanvas);
  };

  video.requestVideoFrameCallback(updateCanvas);
};

window.addEventListener("load", startDrawing);
</script>
<style>

body {
  font-family: helvetica, arial, sans-serif;
  margin: 2em;
}

h1 {
  font-style: italic;
  color: #373fff;
}

video, 
canvas {
  max-width: 100%;
  height: auto;
}

</style>
*/?>

<?php
include 'funciones/conn3.php';

function quitarTildes($cadena) {
  $tildes = array(
      'á' => 'a',
      'é' => 'e',
      'í' => 'i',
      'ó' => 'o',
      'ú' => 'u',
      'Á' => 'A',
      'É' => 'E',
      'Í' => 'I',
      'Ó' => 'O',
      'Ú' => 'U',
      "\r\n"=>'',
      "\r"=>'',
      "\n"=>''
  );
  
  
  $cadenaSinTildes = strtr($cadena, $tildes);
  
  return $cadenaSinTildes;
} 

$QueryMenu = mysqli_query($conn3, "SELECT * FROM  main_menu WHERE estado = 0 AND id = 313 order by id ASC");
        while ($RowMenu = mysqli_fetch_array($QueryMenu)) {
          $Nombre = $RowMenu['nombre'];
        }
echo $Nombre."1";
echo "<hr>";
$Final = quitarTildes($Nombre);

printf($Final);

if (strpos($Final, "\r\n") !== false) {
  echo "La variable contiene \\r\\n";
  $cleanedString = str_replace(array("\r", "\n"), '', $Nombre);
} else {
  echo "La variable no contiene \\r\\n";
}

/*
if (strpos($cleanedString, "\r\n") !== false) {
  echo "La variable final contiene \\r\\n";
} else {
  echo "La variable final no contiene \\r\\n";
}
?>


