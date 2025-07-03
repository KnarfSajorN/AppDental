<?php
include 'funciones/conn3.php';


if (isset($_POST["Tipo_Consulta"]) && $_POST["Tipo_Consulta"]=="Duplicar Perfil") {


    $Nombre_Perfil_Duplicado = $_POST['Nombre_Perfil_Duplicado'];
    $Perfil_Duplicar_id = $_POST['Perfil_Duplicar_id'];

    // Query para seleccionar el registro que deseas duplicar
        $queryList = mysqli_query($conn3, "SELECT * FROM grupos WHERE id='$Perfil_Duplicar_id' LIMIT 1");

        if ($row = mysqli_fetch_assoc($queryList)) {
            // Insertar un nuevo registro con los mismos valores
            $Arreglo_Grupos = $row['Arreglo_Grupos'];
            $Arreglo_Grupos_Orden = $row['Arreglo_Grupos_Orden'];
            $PortadaPOS = $row['PortadaPOS'];
            $insertQuery = "INSERT INTO grupos (nombre,Arreglo_Grupos,Arreglo_Grupos_Orden,PortadaPOS) VALUES ('$Nombre_Perfil_Duplicado','$Arreglo_Grupos','$Arreglo_Grupos_Orden','$PortadaPOS')";
            if (mysqli_query($conn3, $insertQuery)) {
                // Éxito: el registro se ha duplicado correctamente


                $Arreglo["Estado"]="true";
            } else {
                // Error al duplicar el registro
                $Arreglo["Estado"]="false";
                $Arreglo["Mensaje"]=mysqli_error($conn3);
                //echo "Error: " . mysqli_error($conn3);
            }
        } else {
            // No se encontró el registro a duplicar
            //echo "El registro a duplicar no existe.";
            $Arreglo["Estado"]="false";
            $Arreglo["Mensaje"]="No Existe Registro";
        }
        //echo "SELECT * FROM grupos WHERE id='$Perfil_Duplicar_id' LIMIT 1";
        echo json_encode($Arreglo, true);
}




if (isset($_POST["Tipo_Consulta"]) && $_POST["Tipo_Consulta"]=="Duplicar Grupo") {


    $Nombre_Grupo_Duplicado = $_POST['Nombre_Grupo_Duplicado'];
    $Grupo_Duplicar_id = $_POST['Grupo_Duplicar_id'];
    $usuario_id = $_POST['usuario_id'];
    // Query para seleccionar el registro que deseas duplicar
        $queryList = mysqli_query($conn3, "SELECT * FROM Grupos_Menu WHERE id='$Grupo_Duplicar_id' LIMIT 1");

        if ($row = mysqli_fetch_assoc($queryList)) {
            // Insertar un nuevo registro con los mismos valores

            $Descripcion_Grupo = $row['Descripcion_Grupo'];
            $Arreglo1 = $row['Arreglo'];

            $insertQuery = "INSERT INTO Grupos_Menu (usuario_id,Nombre_Grupo,Descripcion_Grupo,Arreglo) VALUES ('$usuario_id','$Nombre_Grupo_Duplicado','$Descripcion_Grupo','$Arreglo1')"or die(mysqli_error($conn3));
            if (mysqli_query($conn3, $insertQuery)) {
                // Éxito: el registro se ha duplicado correctamente


                $Arreglo["Estado"]="true";
            } else {
                // Error al duplicar el registro
                $Arreglo["Estado"]="false";
                $Arreglo["Mensaje"]=mysqli_error($conn3);
                //echo "Error: " . mysqli_error($conn3);
            }
        } else {
            // No se encontró el registro a duplicar
            //echo "El registro a duplicar no existe.";
            $Arreglo["Estado"]="false";
            $Arreglo["Mensaje"]="No Existe Registro";
        }
        //echo "SELECT * FROM grupos WHERE id='$Perfil_Duplicar_id' LIMIT 1";
        echo json_encode($Arreglo, true);
}

?>