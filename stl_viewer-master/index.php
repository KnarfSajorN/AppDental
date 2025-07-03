<?php

include '../funciones/conn3.php';
include '../funciones/funciones.php';

$idarchivo = $_GET['archivo'];
$idcarpeta = $_GET['carpeta'];

// $server = 'localhost';
// $user = 'medicaso_rootBase';
// $pass = '5qA?o]t6d-h25qA?o]t6d-h2';
// $dbname = 'medicaso_dev_baseGeneral';
// $conn3 = mysqli_connect($server, $user, $pass, $dbname) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));


$queryCarpetas = mysqli_query($conn3, "SELECT * FROM STL_Carpetas WHERE ID='$idcarpeta' ");
foreach ($queryCarpetas as $tablaCarpetas) {
    $desCarpeta = $tablaCarpetas['descripcion'];
    $IDCarpeta = $tablaCarpetas['ID'];
}

$queryArchivos = mysqli_query($conn3, "SELECT * FROM STL_Archivos WHERE ID='$idarchivo'");
foreach ($queryArchivos as $tablaArchivosSTL) {
    $nombre_archivo = $tablaArchivosSTL['nombre_archivo'];
    $descripcion = $tablaArchivosSTL['descripcion'];
    $ID = $tablaArchivosSTL['ID'];
}



$carpeta = $desCarpeta;
$archivo = $nombre_archivo;


$url = '../STL_Carpetas/' . $carpeta . '/' . $archivo;
// Obtener el contenido del archivo
$contenidoArchivo = file_get_contents($url);

// Codificar el contenido en base64
$contenidoBase64 = base64_encode($contenidoArchivo);

?>
<html>

<head>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #000;
            color: #fff;
            user-select: none;
        }

        #cont {
            width: 800px;
            margin: auto;
        }

        #inpt {
            display: none;
        }

        #entry {
            text-align: center;
            text-decoration: underline;
            background-color: #fff;
            color: #000;
            font-size: 48px;
            padding: 5px;
            border: 1px solid #fff;
        }

        #entry:hover {
            cursor: pointer;
            background-color: #000;
            color: #fff;
        }

        #disp {
            display: none;
            font-family: monospace;
            font-size: 18px;
        }

        #cnvs {
            float: left;
            cursor: -webkit-grabbing;
        }

        #settings {
            height: 100%;
        }

        input[type='range'] {
            display: block;
            margin: auto;
        }

        #sliders {
            text-align: center;
        }
    </style>
    <script src='https://git.io/zengine.js'></script>
</head>

<body>
    <div id='cont' style="display:none;">
        <h style='font-size: 64; text-align: center;'>STL Visor</h>
        <label for='inpt' id='entry'>Subir archivo <i>.stl</i></label>
        <input id='inpt' type='file' accept='.stl'></input>
    </div>
    <div id='disp'>
        <canvas id='cnvs'></canvas>
        <div id='settings'>
            <h style='font-size: 20px;text-align:middle;'>options</h>
            <br><br>
            <input id='wrfrm' type='checkbox' onchange='wireframe=this.checked; update();' checked></input>
            <label for='wrfrm'>Visor</label>
            <br><br>
            <div id='sliders'>
                <label for='dst'>Distancia</label>
                <br>
                <input id='dst' type='range' min='0' value='128' max='400' oninput='cam.y=-this.value;update();'></input>
                <br>
                <a id='dwnld_a' style="display:none">Descarga</input>
            </div>
        </div>


    </div>
    <script src='script.js'></script>

    <script>
        function cargarInputFile() {
            let file = document.getElementById('inpt');
            let url = '<?php echo $url ?>';
            fetch(url)
                .then(response => response.blob())
                .then(blob => {
                    let fileObject = new File([blob], '<?php echo $archivo ?>');
                    let fileList = new DataTransfer();
                    fileList.items.add(fileObject);
                    file.files = fileList.files;
                    console.log('File loaded:', fileObject);
                    // ahora disparar evento onchange
                    file.dispatchEvent(new Event('change'));
                })
                .catch(error => {
                    console.error('Error al cargar el archivo:', error);
                });
        }

        // esperar que cargue completo
        document.addEventListener('DOMContentLoaded', () => {
            setTimeout(() => {
                cargarInputFile();
            }, 500);
        });
    </script>



</body>

</html>