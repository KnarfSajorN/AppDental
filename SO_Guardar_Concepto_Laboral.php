<?php
include 'funciones/conn3.php';


//proceso = 1
$historia_salud_ocupacional_id = $_POST['historia_salud_ocupacional_id'];

$camposPermitidos = ["xtipodeexa690", "xinformaci281", "xaptitudoc588", "xaptitudoc267",'xaptitudoc161','xexaacutem307'
,'xrecomenda954','xelpresent728','xincluiren405','xtipodepro824','recomendacion_general','consentimiento','recomendacion_particular'];

foreach ($_POST as $campo => $valor) {
    // Aquí puedes realizar cualquier acción con $campo y $valor
    if (in_array($campo, $camposPermitidos)) {
        // Aquí puedes realizar cualquier acción con $campo y $valor

        if (is_array($valor)) {
            $valor1 = implode('||', $valor);
        }else{
            $valor1 = mysqli_real_escape_string($conn3, $valor);
        }

        
        $camposActualizados[] = "$campo = '$valor1'";
    }
}


// Combinar los campos actualizados en una cadena separada por comas
$camposUpdate = implode(", ", $camposActualizados);

// Armar la consulta UPDATE
$sql = mysqli_query($conn3, "UPDATE conceptolaboral SET $camposUpdate, proceso=1 WHERE id='$historia_salud_ocupacional_id'");

echo "<script language='Javascript'> window.location='SO_Finalizado?historiaClinica1=$historia_salud_ocupacional_id';</script>";

?>