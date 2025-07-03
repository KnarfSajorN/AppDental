<?php
include 'funciones/funciones.php';
date_default_timezone_set('America/Bogota');



$proveedor_id            = $_POST['proveedor_id'];
$usuario_id                    = $_POST['usuario_id'];

$descripcion          = $_POST['descripcion'];
$activo                = 1;
$Fecha                 = date("Y-m-d");

$codigo1 = $_POST['archivo'];


//$contador2 = count($codigo1);




foreach ($_FILES["archivo"]['tmp_name'] as $key => $tmp_name) {
    //Validamos que el archivo exista
    if ($_FILES["archivo"]["name"][$key]) {

        $NombreVisual = $_FILES["archivo"]["name"][$key]; //Obtenemos el nombre original del archivo
        //$filename = strtotime("now") . "_" . $_FILES["archivo"]["name"][$key]; //le agregamos la hora unix actual para que no se repita

        /////////////////////////////////////////////////////
        $NombreArchivoInicial = $NombreVisual;
		$NombreArchivoFinal = str_replace("'", "", $NombreArchivoInicial);
		$fechahora = date("Y-m-d_H-i-s");
		$numeroAleatorio = rand(1, 9999);
		$filename = "{$usuario_id}__{$fechahora}__{$numeroAleatorio}_".$NombreArchivoFinal;
        /////////////////////////////////////////////////

        $source = $_FILES["archivo"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo

        $directorio = 'archivos_proveedor/'; //Declaramos un  variable con la ruta donde guardaremos los archivos

        //Validamos si la ruta de destino existe, en caso de no existir la creamos
        if (!file_exists($directorio)) {
            mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");
        }

        $dir = opendir($directorio); //Abrimos el directorio de destino
        $target_path = $directorio . '/' . $filename; //Indicamos la ruta de destino, así como el nombre del archivo

        //Movemos y validamos que el archivo se haya cargado correctamente
        //El primer campo es el origen y el segundo el destino
        if (move_uploaded_file($source, $target_path)) {
            echo "El archivo $filename se ha almacenado en forma exitosa.<br>";
        } else {
            echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
        }
        closedir($dir); //Cerramos el directorio de destino
    }






    mysqli_query($conn3, "INSERT INTO archivos_proveedor (proveedor_id,usuario_id,historia_id,codigo,NombreVisual,fecha, descripcion,Realizado_Desde) VALUES   ('$proveedor_id', '$usuario_id','0','$filename','$NombreVisual','$Fecha', '$descripcion','Historial Proveedor')");
}









echo $cliente_id;


//echo "<script language='Javascript'> window.location='consultaCliente.php?clienteId=$cliente_id';</script>";
echo "<script type='text/javascript'>";
echo "window.history.back(-1)";
echo "</script>";
