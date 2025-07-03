<?php
include 'funciones/funciones.php';
date_default_timezone_set('America/Bogota');



$cliente_id            = $_POST['clienteid'];
$usuario_id            = $_POST['usuario_id'];
$CODI_CLIENTE          = $_POST['CODI_CLIENTE'];
$descripcion           = $_POST['descripcion'];
$activo                = 1;
$Fecha                 = date("Y-m-d");

$codigo1 = $_POST['archivo'];

//$contador2 = count($codigo1);

$allowed_formats = array('jpg', 'jpeg', 'png', 'gif','pdf', 'doc', 'docex','xslx');

foreach ($_FILES["archivo"]['tmp_name'] as $key => $tmp_name) {
    //Validamos que el archivo exista
    if ($_FILES["archivo"]["name"][$key]) {
        $file_info = pathinfo($_FILES["archivo"]["name"][$key]);
        $file_extension = strtolower($file_info['extension']);

        if (in_array($file_extension, $allowed_formats)) {
            $source = $_FILES["archivo"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo

            $directorio = 'archivos/'; //Declaramos un  variable con la ruta donde guardaremos los archivos

            //Validamos si la ruta de destino existe, en caso de no existir la creamos
            if (!file_exists($directorio)) {
                mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");
            }

            // Creamos un nombre único para el archivo
            $filename = strtotime("now") . "_" . $_FILES["archivo"]["name"][$key]; //le agregamos la hora unix actual para que no se repita
            
            $dir = opendir($directorio); //Abrimos el directorio de destino
            $target_path = $directorio . '/' . $filename; //Indicamos la ruta de destino, así como el nombre del archivo

            //Movemos y validamos que el archivo se haya cargado correctamente
            //El primer campo es el origen y el segundo el destino
            if (move_uploaded_file($source, $target_path)) {
                echo "El archivo $filename se ha almacenado en forma exitosa.<br>";
            } else {
                echo "Ha ocurrido un error al mover el archivo $filename, por favor inténtelo de nuevo.<br>";
            }
            closedir($dir); //Cerramos el directorio de destino
        } else {           
            echo "<script type='text/javascript'>";
            echo "alert('Error: El formato del archivo no está permitido. Solo se permiten archivos en formato JPG, JPEG, PNG, GIF, PDF, DOC, DOCX o XLSX.');";
            echo "window.history.back(-1);";
            echo "</script>";
            //Corte en 3...2...1.... :v 
            exit();
        }
    }
    mysqli_query($conn3, "INSERT INTO archivos (cliente_id,usuario_id,historia_id,codigo,NombreVisual,fecha, descripcion) VALUES ('$cliente_id', '$usuario_id','0','$filename','$NombreVisual','$Fecha', '$descripcion')") or die(mysqli_error($conn3));
}

//echo "<script language='Javascript'> window.location='consultaCliente.php?clienteId=$cliente_id';</script>";
echo "<script type='text/javascript'>";
echo "window.history.back(-1);";
echo "</script>";

