<?php 
    include 'funciones/conn3.php';
    
    $idCarpeta = $_POST['idCarpeta'];


    ////TRAER EL NOMBRE DE LA CARPETA
    $queryCarpeta = mysqli_query($conn3,"SELECT descripcion FROM STL_Carpetas WHERE ID='$idCarpeta' ");
    foreach ($queryCarpeta as $tCarpeta) {
        $nombreCarpeta = $tCarpeta['descripcion']; 
    }
    ////TRAER EL NOMBRE DE LA CARPETA



    $queryArchivos = mysqli_query($conn3, "SELECT * FROM STL_Archivos WHERE idCarpeta='$idCarpeta'");

    foreach ($queryArchivos as $tablaArchivosSTL) {
        $nombre_archivo = $tablaArchivosSTL['nombre_archivo'];
        $descripcion = $tablaArchivosSTL['descripcion'];
        $ID = $tablaArchivosSTL['ID'];
        //$nombreCarpeta = funcionMaster($idCarpeta, "ID", "descripcion", "STL_Carpetas");
        $directorioBuscar= "STL_Carpetas/" . $nombreCarpeta . "/" . $nombre_archivo;

        //<img src="'.$directorioBuscar.'" class="card-img-top">
        echo '<div class="card" style="width: 100%; display:flex; flex-direction: row; justify-content: space-between">
                <div class="card-body" style="width: 100%; display:flex; flex-direction: row; justify-content: space-around; align-items: center">
                <h3 class="card-title" align="center">'.$descripcion.'</h3>
                <a href="#" class="btn btn-primary" onclick="enviarArchivoSTL('.$idCarpeta.', '.$ID.')">Abrir como STL</a>
                </div>
            </div>';

    }


?>