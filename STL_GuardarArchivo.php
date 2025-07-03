<?php 
    include 'funciones/conn3.php';
    include 'funciones/funciones.php';

    $idCarpeta = $_POST['idCarpeta'];
    $descripcionArchivo = $_POST['descripcionArchivo'];

    $usuarioId = $_POST['usuarioId'];
    $clienteId = $_POST['clienteId'];   

    $horaActual= date("Y-m-d");

    $nombreArchivo = date("YmdHis"). "_" .$_FILES["archivoCargar"]["name"];

    $nombreCarpeta = funcionMaster($idCarpeta, "ID", "descripcion", "STL_Carpetas");
    $directorioDestino = 'STL_Carpetas/' . $nombreCarpeta . "/";
    
    if (isset($_FILES["archivoCargar"]) && $_FILES["archivoCargar"]["error"] == 0) {
        $file_extension = pathinfo($_FILES["archivoCargar"]["name"], PATHINFO_EXTENSION);
        $allowed_format = 'stl'; // Solo permitir archivos STL
    
        if (strtolower($file_extension) == $allowed_format) {
            if (move_uploaded_file($_FILES["archivoCargar"]["tmp_name"], $directorioDestino . $nombreArchivo)) {
                if (mysqli_query($conn3, "INSERT INTO STL_Archivos(descripcion,fechaCreacion,idCarpeta,nombre_archivo,usuarioId,clienteId) VALUES('$descripcionArchivo', '$horaActual', '$idCarpeta','$nombreArchivo','$usuarioId','$clienteId')")) {
                    echo "<script>window.location.href='STL_CA?cI=". encrypt($clienteId) ."&msg=Archivo Guardado Correctamente'</script>";
                } else {
                    echo "<script>window.location.href='STL_CA?cI=". encrypt($clienteId) ."&error=Ocurrio un error al guardar el archivo'</script>";
                }
            } else {
                echo "<script>window.location.href='STL_CA?cI=". encrypt($clienteId) ."&error=Ocurrio un error al guardar el archivo[2]'</script>";
            }
        } else {
            echo "<script>alert('Error: Solo se permiten archivos en formato STL.');</script>";
            echo "<script>window.history.back(-1);</script>";
            exit();
        }
    }
    



?>