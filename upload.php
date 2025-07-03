<?php
$Carpeta = $_REQUEST["Carpeta"];
//$Documento = $_REQUEST["Documento"];
$Documento = $_REQUEST["Cliente_id"];
foreach ($_FILES as $key => $Archivo) {
    $contador++;

    //Validamos que el archivo exista
    if (isset($Archivo["name"])) {

        $filename = $Archivo["name"];
        $nombre_asignado = $filename; //Obtenemos el nombre original del archivo
        $source = $Archivo["tmp_name"]; //Obtenemos un nombre temporal del archivo

        
        $directorio = 'ArchivosDicom/'; //Declaramos un  variable con la ruta donde guardaremos los archivos
        //Validamos si la ruta de destino existe, en caso de no existir la creamos
        if (!file_exists($directorio)) {
            mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");
        }

        $directorio1 = $directorio . $Documento."/"; //Declaramos un  variable con la ruta donde guardaremos los archivos
        //Validamos si la ruta de destino existe, en caso de no existir la creamos
        if (!file_exists($directorio1)) {
            mkdir($directorio1, 0777) or die("No se puede crear el directorio de extracci&oacute;n");
        }


        $directorio2 = $directorio1 . $Carpeta."/"; //Declaramos un  variable con la ruta donde guardaremos los archivos
        //Validamos si la ruta de destino existe, en caso de no existir la creamos
        if (!file_exists($directorio2)) {
            mkdir($directorio2, 0777) or die("No se puede crear el directorio de extracci&oacute;n");
        }
        
        //$inputName = str_replace("\/", "/", $inputName);
        $dir = opendir($directorio2); //Abrimos el directorio de destino
        $target_path = $directorio2 . '/' . $nombre_asignado; //Indicamos la ruta de destino, así como el nombre del archivo

        //Movemos y validamos que el archivo se haya cargado correctamente
        //El primer campo es el origen y el segundo el destino
        if (move_uploaded_file($source, $target_path)) {
            $Arreglo["success"] = true;
            $Arreglo["uuid"] = "{$directorio2}";
            $Arreglo["uploadName"] = "{$nombre_asignado} - {$Documento} - {$Carpeta}";
        } else {
            $Arreglo["success"] = false;
            $Arreglo["error"] = "No se pudo Cargar la imagen - {$Documento} - {$Carpeta}";
        }
        closedir($dir); //Cerramos el directorio de destino

    } else {
        $CantidadArchivos_Error++;
    }
}

echo json_encode($Arreglo);

?>