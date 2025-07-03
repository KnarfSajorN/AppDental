<?php
include 'funciones/conn3.php';
include 'funciones/funciones.php';

//$_POST = DatosIngresarMysqli($_POST);






$usuario_id = $_POST['usuario_id'];
$cliente_id = $_POST['cliente_id'];

/////////////////////////////////////////////////////////////////// creacion de la tabla para los examemenes //////////////////////////////////////////////////////////////////////////
$tabla = mysqli_query($conn3, "SHOW TABLES LIKE 'RIAS_HistoriaVejez'");
$nrowtabla = mysqli_num_rows($tabla);
if ($nrowtabla == 0) {
    $query = "CREATE TABLE `RIAS_HistoriaVejez` ( 
        `id` INT(11) NOT NULL AUTO_INCREMENT , 
        `Fecha` DATETIME NULL DEFAULT CURRENT_TIMESTAMP , 
        `cliente_id` INT(11) NULL DEFAULT '0' , 
        `usuario_id` INT(11) NULL DEFAULT '0' ,
        PRIMARY KEY (`id`)) ENGINE = MyISAM;";

    $creaciontabla = mysqli_query($conn3, $query);
    if (!$creaciontabla) {
        echo "<script language='Javascript'> alert('error en la creacion de la tabla');
        window.location='portada';</script>";

        exit();
    }
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function eliminarElementosVacios($array) {
    // Recorre cada elemento del array
    foreach ($array as $clave => $valor) {
        // Si es un array, aplica la función de forma recursiva
        if (is_array($valor)) {
            $array[$clave] = eliminarElementosVacios($valor);
        }

        // Elimina los elementos vacíos (excluyendo el valor 0)
        if (empty($array[$clave]) && $array[$clave] !== 0 && $array[$clave] !== "0") {
            unset($array[$clave]);
        }
    }

    return $array;
}


////////////////////////////////////////? Anamnesis General ////////////////////////////////////////
$ArregloCamposAdicionales=["Anamnesis_General"];

foreach ($ArregloCamposAdicionales as $key => $value) {
    $Campo1 = mysqli_query($conn3, "show COLUMNS from RIAS_HistoriaVejez WHERE Field = '$value';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `RIAS_HistoriaVejez` ADD `$value` TEXT NULL ");
    }
}

foreach (eliminarElementosVacios($_POST['Anamnesis']['General']) as $key => $value) {

        $ArregloAntecedentes['Anamnesis_General'][$key]=$value;

}

////////////////////////////////////////? Anamnesis General [FIN] /////////////////////////////////////


////////////////////////////////////////? 1.1 Antecedentes////////////////////////////////////////
$ArregloCamposAdicionales=["Antecedentes_Personales","Antecedentes_Medicos","Antecedentes_Familiares","Antecedentes_MasAntecedentes","Antecedentes_Ginecologicos"];

foreach ($ArregloCamposAdicionales as $key => $value) {
    $Campo1 = mysqli_query($conn3, "show COLUMNS from RIAS_HistoriaVejez WHERE Field = '$value';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `RIAS_HistoriaVejez` ADD `$value` TEXT NULL ");
    }
}

foreach (eliminarElementosVacios($_POST['Anamnesis']['Antecedentes']) as $key => $value) {

    //Aqui se valida que el campo en el cual se va aguardar la info exista por lo que se preguntara por los campos del arreglo de arriba que contendra los campos para este apartado
    //se realiza para que si agregan un campo adicional no de error la consulta
    if (in_array('Antecedentes_'.$key, $ArregloCamposAdicionales)) {
        foreach ($value as $key_2 => $value_2) {

            $ArregloAntecedentes['Antecedentes_'.$key][$key_2]=$value_2;

        }
    }
    else{
        $ArregloAntecedentes['Antecedentes_'.$key]=$value;
    }

}

////////////////////////////////////////? 1.1 Antecedentes [FIN] /////////////////////////////////////









////////////////////////////////////////? 1.2 Derechos sexuales y reproductivos ////////////////////////////////////////
$ArregloCamposAdicionales=["DerechosSexuales"];

foreach ($ArregloCamposAdicionales as $key => $value) {
    $Campo1 = mysqli_query($conn3, "show COLUMNS from RIAS_HistoriaVejez WHERE Field = '$value';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `RIAS_HistoriaVejez` ADD `$value` TEXT NULL ");
    }
}

foreach (eliminarElementosVacios($_POST['Anamnesis']['DerechosSexuales']) as $key => $value) {

    $ArregloAntecedentes['DerechosSexuales'][$key]=$value;


}

////////////////////////////////////////? 1.2 Derechos sexuales y reproductivos [FIN] /////////////////////////////////////






////////////////////////////////////////? 1.3 Consumos y hábitos alimentarios   ////////////////////////////////////////
$ArregloCamposAdicionales=["ConsumoHabitos"];

foreach ($ArregloCamposAdicionales as $key => $value) {
    $Campo1 = mysqli_query($conn3, "show COLUMNS from RIAS_HistoriaVejez WHERE Field = '$value';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `RIAS_HistoriaVejez` ADD `$value` TEXT NULL ");
    }
}

foreach (eliminarElementosVacios($_POST['Anamnesis']['ConsumoHabitos']) as $key => $value) {

        $ArregloAntecedentes['ConsumoHabitos'][$key]=$value;

}

////////////////////////////////////////? 1.3 Consumos y hábitos alimentarios  [FIN] /////////////////////////////////////









////////////////////////////////////////? 1.4 Prácticas y hábitos saludables  ////////////////////////////////////////
$ArregloCamposAdicionales=["HabitosSaludables"];

foreach ($ArregloCamposAdicionales as $key => $value) {
    $Campo1 = mysqli_query($conn3, "show COLUMNS from RIAS_HistoriaVejez WHERE Field = '$value';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `RIAS_HistoriaVejez` ADD `$value` TEXT NULL ");
    }
}

foreach (eliminarElementosVacios($_POST['Anamnesis']['HabitosSaludables']) as $key => $value) {

        $ArregloAntecedentes['HabitosSaludables'][$key]=$value;

}

////////////////////////////////////////? 1.4 Prácticas y hábitos saludables [FIN] /////////////////////////////////////









////////////////////////////////////////? 1.5 Practicas de crianza y cuidado ////////////////////////////////////////
$ArregloCamposAdicionales=["PracticasCrianzaCuidado_Actividades"];

foreach ($ArregloCamposAdicionales as $key => $value) {
    $Campo1 = mysqli_query($conn3, "show COLUMNS from RIAS_HistoriaVejez WHERE Field = '$value';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `RIAS_HistoriaVejez` ADD `$value` TEXT NULL ");
    }
}

foreach (eliminarElementosVacios($_POST['Anamnesis']['PracticasCrianzaCuidado']) as $key => $value) {

    //Aqui se valida que el campo en el cual se va aguardar la info exista por lo que se preguntara por los campos del arreglo de arriba que contendra los campos para este apartado
    //se realiza para que si agregan un campo adicional no de error la consulta
    if (in_array('PracticasCrianzaCuidado_'.$key, $ArregloCamposAdicionales)) {
        if(is_array($value)){

            foreach ($value as $key_2 => $value_2) {
                $ArregloAntecedentes['PracticasCrianzaCuidado_'.$key][$key_2]=$value_2;
            }

        }else{
            $ArregloAntecedentes['PracticasCrianzaCuidado_'.$key]=$value;
        }
    }

}

////////////////////////////////////////? 1.5 Practicas de crianza y cuidado [FIN] /////////////////////////////////////









////////////////////////////////////////? 1.6 Conformación y dinámica de la familia ////////////////////////////////////////
$ArregloCamposAdicionales=["DinamicaFamiliar_CapacidadRecursosFamiliares","DinamicaFamiliar_APGAR","DinamicaFamiliar_CapacidadesRelacion","DinamicaFamiliar_Interpretacion_APGAR","DinamicaFamiliar_Puntaje_APGAR"];

foreach ($ArregloCamposAdicionales as $key => $value) {
    $Campo1 = mysqli_query($conn3, "show COLUMNS from RIAS_HistoriaVejez WHERE Field = '$value';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `RIAS_HistoriaVejez` ADD `$value` TEXT NULL ");
    }
}

foreach (eliminarElementosVacios($_POST['Anamnesis']['DinamicaFamiliar']) as $key => $value) {
    
    //Aqui se valida que el campo en el cual se va aguardar la info exista por lo que se preguntara por los campos del arreglo de arriba que contendra los campos para este apartado
    //se realiza para que si agregan un campo adicional no de error la consulta
    if (in_array('DinamicaFamiliar_'.$key, $ArregloCamposAdicionales)) {
        if(is_array($value)){

            foreach ($value as $key_2 => $value_2) {
                $ArregloAntecedentes['DinamicaFamiliar_'.$key][$key_2]=$value_2;
            }

        }else{
            $ArregloAntecedentes['DinamicaFamiliar_'.$key]=$value;
        }
    }

}

////////////////////////////////////////? 1.6 Conformación y dinámica de la familia [FIN] /////////////////////////////////////









////////////////////////////////////////? 1.8 Seguimiento a compromisos acordados en sesiones de educación individual previas   ////////////////////////////////////////
$ArregloCamposAdicionales=["SeguimientoCompromisoEducacion"];

foreach ($ArregloCamposAdicionales as $key => $value) {
    $Campo1 = mysqli_query($conn3, "show COLUMNS from RIAS_HistoriaVejez WHERE Field = '$value';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `RIAS_HistoriaVejez` ADD `$value` TEXT NULL ");
    }
}

foreach (eliminarElementosVacios($_POST['Anamnesis']['SeguimientoCompromisoEducacion']) as $key => $value) {

    $ArregloAntecedentes['SeguimientoCompromisoEducacion'][$key]=$value;

}

////////////////////////////////////////? 1.8 Seguimiento a compromisos acordados en sesiones de educación individual previas [FIN] /////////////////////////////////////



















////////////////////////////////////////? 2.1 Signos vitales ////////////////////////////////////////
$ArregloCamposAdicionales=["Json_SignosVitales","H_Peso","H_Altura","H_IMC","H_PerimetroCefalico"];

foreach ($ArregloCamposAdicionales as $key => $value) {
    $Campo1 = mysqli_query($conn3, "show COLUMNS from RIAS_HistoriaVejez WHERE Field = '$value';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `RIAS_HistoriaVejez` ADD `$value` TEXT NULL ");
    }
}

foreach (eliminarElementosVacios($_POST['SignosVitales']) as $key => $value) {
    
    //Aqui se valida que el campo en el cual se va aguardar la info exista por lo que se preguntara por los campos del arreglo de arriba que contendra los campos para este apartado
    //se realiza para que si agregan un campo adicional no de error la consulta
    if (in_array('Json_'.$key, $ArregloCamposAdicionales)) {
        if(is_array($value)){

            foreach ($value as $key_2 => $value_2) {
                $ArregloExamenFisico['Json_'.$key][$key_2]=$value_2;
            }

        }else{
            $ArregloExamenFisico['Json_'.$key]=$value;
        }
        
    }

}
$ArregloExamenFisico['H_Peso']=$_POST['SignosVitales']['SignosVitales']['SignosVitales_Peso']['Peso Corporal (Kg)'];
$ArregloExamenFisico['H_Altura']=$_POST['SignosVitales']['SignosVitales']['SignosVitales_Altura']['Altura (cm)'];
$ArregloExamenFisico['H_IMC']=$_POST['SignosVitales']['SignosVitales']['SignosVitales_IMC']['IMC'];
$ArregloExamenFisico['H_PerimetroCefalico']=$_POST['SignosVitales']['SignosVitales']['SignosVitales_PerimetroCefalico']['Perimetro Cefalico'];
////////////////////////////////////////? 2.1 Signos vitales [FIN] /////////////////////////////////////









////////////////////////////////////////? 2.2 Valoración del desarrollo ////////////////////////////////////////
$ArregloCamposAdicionales=["ValoracionDesarrollo_FuncionesCognitivas","ValoracionDesarrollo_Identidad_Anexo14","ValoracionDesarrollo_Autonomia"];

foreach ($ArregloCamposAdicionales as $key => $value) {
    $Campo1 = mysqli_query($conn3, "show COLUMNS from RIAS_HistoriaVejez WHERE Field = '$value';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `RIAS_HistoriaVejez` ADD `$value` TEXT NULL ");
    }
}

foreach (eliminarElementosVacios($_POST['ExamenFisico']['ValoracionDesarrollo']) as $key => $value) {
    
    if (in_array('ValoracionDesarrollo_'.$key, $ArregloCamposAdicionales)) {
        if(is_array($value)){

            foreach ($value as $key_2 => $value_2) {
                $ArregloAntecedentes['ValoracionDesarrollo_'.$key][$key_2]=$value_2;
            }

        }else{
            $ArregloAntecedentes['ValoracionDesarrollo_'.$key]=$value;
        }
    }
}

////////////////////////////////////////? 2.2 Valoración del desarrollo [FIN] /////////////////////////////////////









////////////////////////////////////////? 2.3 Valoración del estado nutricional y seguimiento a parámetros antropométricos ////////////////////////////////////////
$ArregloCamposAdicionales=["ValoracionEstadoNutricional_ParametrosAntropometricos"];

foreach ($ArregloCamposAdicionales as $key => $value) {
    $Campo1 = mysqli_query($conn3, "show COLUMNS from RIAS_HistoriaVejez WHERE Field = '$value';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `RIAS_HistoriaVejez` ADD `$value` TEXT NULL ");
    }
}

foreach (eliminarElementosVacios($_POST['ExamenFisico']['ParametrosAntropometricos']) as $key => $value) {
    
    $ArregloExamenFisico['ValoracionEstadoNutricional_ParametrosAntropometricos'][$key]=$value;
}


////////////////////////////////////////? 2.3 Valoración del estado nutricional y seguimiento a parámetros antropométricos [FIN] /////////////////////////////////////









////////////////////////////////////////? 2.4 Valoración de la vida sexual ////////////////////////////////////////
$ArregloCamposAdicionales=["SaludSexual_Signos","SaludSexual_Mujeres","SaludSexual_Varones","SaludSexual_Intersexuales","SaludSexual_Otros","SaludSexual_EscalaTanner"];

foreach ($ArregloCamposAdicionales as $key => $value) {
    $Campo1 = mysqli_query($conn3, "show COLUMNS from RIAS_HistoriaVejez WHERE Field = '$value';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `RIAS_HistoriaVejez` ADD `$value` TEXT NULL ");
    }
}

foreach (eliminarElementosVacios($_POST['ExamenFisico']['SaludSexual']) as $key => $value) {
    
    //Aqui se valida que el campo en el cual se va aguardar la info exista por lo que se preguntara por los campos del arreglo de arriba que contendra los campos para este apartado
    //se realiza para que si agregan un campo adicional no de error la consulta
    if (in_array('SaludSexual_'.$key, $ArregloCamposAdicionales)) {
        if(is_array($value)){

            foreach ($value as $key_2 => $value_2) {
                $ArregloExamenFisico['SaludSexual_'.$key][$key_2]=$value_2;
            }

        }else{
            $ArregloExamenFisico['SaludSexual_'.$key]=$value;
        }
    }
}
////////////////////////////////////////? 2.4 Valoración de la vida sexual [FIN] /////////////////////////////////////









////////////////////////////////////////? 2.5 Valoración de salud visual ////////////////////////////////////////
$ArregloCamposAdicionales=["SaludVisual_Valoracion"];

foreach ($ArregloCamposAdicionales as $key => $value) {
    $Campo1 = mysqli_query($conn3, "show COLUMNS from RIAS_HistoriaVejez WHERE Field = '$value';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `RIAS_HistoriaVejez` ADD `$value` TEXT NULL ");
    }
}

foreach (eliminarElementosVacios($_POST['ExamenFisico']['SaludVisual']) as $key => $value) {
    
    //Aqui se valida que el campo en el cual se va aguardar la info exista por lo que se preguntara por los campos del arreglo de arriba que contendra los campos para este apartado
    //se realiza para que si agregan un campo adicional no de error la consulta
    if (in_array('SaludVisual_'.$key, $ArregloCamposAdicionales)) {
        if(is_array($value)){

            foreach ($value as $key_2 => $value_2) {
                $ArregloExamenFisico['SaludVisual_'.$key][$key_2]=$value_2;
            }

        }else{
            $ArregloExamenFisico['SaludVisual_'.$key]=$value;
        }
    }

}

////////////////////////////////////////? 2.5 Valoración de salud visual [FIN] /////////////////////////////////////









////////////////////////////////////////? 2.6 Valoración de la salud auditiva y comunicativa ////////////////////////////////////////
$ArregloCamposAdicionales=["SaludAuditiva_Valoracion"];

foreach ($ArregloCamposAdicionales as $key => $value) {
    $Campo1 = mysqli_query($conn3, "show COLUMNS from RIAS_HistoriaVejez WHERE Field = '$value';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `RIAS_HistoriaVejez` ADD `$value` TEXT NULL ");
    }
}

foreach (eliminarElementosVacios($_POST['ExamenFisico']['SaludAuditiva']) as $key => $value) {
    
    //Aqui se valida que el campo en el cual se va aguardar la info exista por lo que se preguntara por los campos del arreglo de arriba que contendra los campos para este apartado
    //se realiza para que si agregan un campo adicional no de error la consulta
    if (in_array('SaludAuditiva_'.$key, $ArregloCamposAdicionales)) {
        if(is_array($value)){

            foreach ($value as $key_2 => $value_2) {
                $ArregloExamenFisico['SaludAuditiva_'.$key][$key_2]=$value_2;
            }

        }else{
            $ArregloExamenFisico['SaludAuditiva_'.$key]=$value;
        }
    }
    //echo $value;
}

////////////////////////////////////////? 2.6 Valoración de la salud auditiva y comunicativa [FIN] /////////////////////////////////////









////////////////////////////////////////? 2.7 Valoración de la salud bucal ////////////////////////////////////////
$ArregloCamposAdicionales=["SaludBucal_ValoracionEstructuras","SaludBucal_Valoracion"];

foreach ($ArregloCamposAdicionales as $key => $value) {
    $Campo1 = mysqli_query($conn3, "show COLUMNS from RIAS_HistoriaVejez WHERE Field = '$value';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `RIAS_HistoriaVejez` ADD `$value` TEXT NULL ");
    }
}

foreach (eliminarElementosVacios($_POST['ExamenFisico']['SaludBucal']) as $key => $value) {
    
    //Aqui se valida que el campo en el cual se va aguardar la info exista por lo que se preguntara por los campos del arreglo de arriba que contendra los campos para este apartado
    //se realiza para que si agregan un campo adicional no de error la consulta
    if (in_array('SaludBucal_'.$key, $ArregloCamposAdicionales)) {
        if(is_array($value)){

            foreach ($value as $key_2 => $value_2) {
                $ArregloExamenFisico['SaludBucal_'.$key][$key_2]=$value_2;
            }

        }else{
            $ArregloExamenFisico['SaludBucal_'.$key]=$value;
        }
    }
    //echo $value;
}

////////////////////////////////////////? 2.7 Valoración de la salud bucal [FIN] /////////////////////////////////////









////////////////////////////////////////? 2.8 Valoración de la salud mental ////////////////////////////////////////
$ArregloCamposAdicionales=["SaludMental_Valoracion","SaludMental_SRQ","SaludMental_ASISST","SaludMental_AUDIT","SaludMental_SRQInterpretacion","SaludMental_AUDITInterpretacion","SaludMental_AUDITPuntaje","SaludMental_ASISSTPuntaje","SaludMental_ASISSTInterpretacion"];

foreach ($ArregloCamposAdicionales as $key => $value) {
    $Campo1 = mysqli_query($conn3, "show COLUMNS from RIAS_HistoriaVejez WHERE Field = '$value';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `RIAS_HistoriaVejez` ADD `$value` TEXT NULL ");
    }
}

foreach (eliminarElementosVacios($_POST['ExamenFisico']['SaludMental']) as $key => $value) {
    
    //Aqui se valida que el campo en el cual se va aguardar la info exista por lo que se preguntara por los campos del arreglo de arriba que contendra los campos para este apartado
    //se realiza para que si agregan un campo adicional no de error la consulta
    if (in_array('SaludMental_'.$key, $ArregloCamposAdicionales)) {
        if(is_array($value)){

            foreach ($value as $key_2 => $value_2) {
                $ArregloExamenFisico['SaludMental_'.$key][$key_2]=$value_2;
            }

        }else{
            $ArregloExamenFisico['SaludMental_'.$key]=$value;
        }
    }
    //echo $value;
}

////////////////////////////////////////? 2.8 Valoración de la salud mental [FIN] /////////////////////////////////////









////////////////////////////////////////? 2.9 Otros aspectos ////////////////////////////////////////
$ArregloCamposAdicionales=["OtrosAspectos_Valoracion"];

foreach ($ArregloCamposAdicionales as $key => $value) {
    $Campo1 = mysqli_query($conn3, "show COLUMNS from RIAS_HistoriaVejez WHERE Field = '$value';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `RIAS_HistoriaVejez` ADD `$value` TEXT NULL ");
    }
}

foreach (eliminarElementosVacios($_POST['ExamenFisico']['OtrosAspectos']) as $key => $value) {
    
    //Aqui se valida que el campo en el cual se va aguardar la info exista por lo que se preguntara por los campos del arreglo de arriba que contendra los campos para este apartado
    //se realiza para que si agregan un campo adicional no de error la consulta
    if (in_array('OtrosAspectos_'.$key, $ArregloCamposAdicionales)) {
        if(is_array($value)){

            foreach ($value as $key_2 => $value_2) {
                $ArregloExamenFisico['OtrosAspectos_'.$key][$key_2]=$value_2;
            }

        }else{
            $ArregloExamenFisico['OtrosAspectos_'.$key]=$value;
        }
    }
    //echo $value;
}

////////////////////////////////////////? 2.9 Otros aspectos [FIN] /////////////////////////////////////





















////////////////////////////////////////? 3. Educación ////////////////////////////////////////
$ArregloCamposAdicionales=["Educacion_Datos"];

foreach ($ArregloCamposAdicionales as $key => $value) {
    $Campo1 = mysqli_query($conn3, "show COLUMNS from RIAS_HistoriaVejez WHERE Field = '$value';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `RIAS_HistoriaVejez` ADD `$value` TEXT NULL ");
    }
}

foreach (eliminarElementosVacios($_POST['Educacion']) as $key => $value) {
    
    //Aqui se valida que el campo en el cual se va aguardar la info exista por lo que se preguntara por los campos del arreglo de arriba que contendra los campos para este apartado
    //se realiza para que si agregan un campo adicional no de error la consulta

        if(is_array($value)){

            foreach ($value as $key_2 => $value_2) {
                $ArregloEducacion['Educacion_Datos'][$key_2]=$value_2;
            }

        }else{
            $ArregloEducacion['Educacion_Datos']=$value;
        }

}

////////////////////////////////////////? 3. Educación [FIN] /////////////////////////////////////



















////////////////////////////////////////? 4. Plan de Cuidados ////////////////////////////////////////
$ArregloCamposAdicionales=["PlanCuidados_Datos","PlanCuidados_Vacunacion"];

foreach ($ArregloCamposAdicionales as $key => $value) {
    $Campo1 = mysqli_query($conn3, "show COLUMNS from RIAS_HistoriaVejez WHERE Field = '$value';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `RIAS_HistoriaVejez` ADD `$value` TEXT NULL ");
    }
}

foreach (eliminarElementosVacios($_POST['PlanCuidados']) as $key => $value) {
    
    //Aqui se valida que el campo en el cual se va aguardar la info exista por lo que se preguntara por los campos del arreglo de arriba que contendra los campos para este apartado
    //se realiza para que si agregan un campo adicional no de error la consulta

        if(is_array($value)){

            foreach ($value as $key_2 => $value_2) {
                $ArregloPlandeCuidados['PlanCuidados_Datos'][$key_2]=$value_2;
            }

        }else{
            $ArregloPlandeCuidados['PlanCuidados_Datos']=$value;
        }

}


foreach (eliminarElementosVacios($_POST['ArregloVacunacion']) as $key => $value) {
    
    //Aqui se valida que el campo en el cual se va aguardar la info exista por lo que se preguntara por los campos del arreglo de arriba que contendra los campos para este apartado
    //se realiza para que si agregan un campo adicional no de error la consulta

            $ArregloPlandeCuidados['PlanCuidados_Vacunacion'][$key]=$value;
        

}
////////////////////////////////////////? 4. Plan de Cuidados [FIN] /////////////////////////////////////




////////////////////////////////////////? Remision ////////////////////////////////////////
$ArregloCamposAdicionales=["Remision","ExamenesCUPSCIE10","FinalidadConsulta","VacunacionCovid","DiagnosticosGenerales","InformacionAdicional_1"];

foreach ($ArregloCamposAdicionales as $key => $value) {
    $Campo1 = mysqli_query($conn3, "show COLUMNS from RIAS_HistoriaVejez WHERE Field = '$value';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `RIAS_HistoriaVejez` ADD `$value` TEXT NULL ");
    }
}

$ArregloMasDato['Remision']=eliminarElementosVacios($_POST['Remision']['Remision']);
////////////////////////////////////////? Remision [FIN] /////////////////////////////////////

////////////////////////////////////////? Examenes CUPS ////////////////////////////////////////

$ArregloMasDato['ExamenesCUPSCIE10']=eliminarElementosVacios($_POST['ExamenesCUPS']);

////////////////////////////////////////? Examenes CUPS [FIN] /////////////////////////////////////


////////////////////////////////////////? FinalidadConsulta ////////////////////////////////////////

$ArregloMasDato['FinalidadConsulta']=eliminarElementosVacios($_POST['FinalidadConsulta']['FinalidadConsulta']);

////////////////////////////////////////? FinalidadConsulta [FIN] /////////////////////////////////////


////////////////////////////////////////? Vacunacion Covid ////////////////////////////////////////

$ArregloMasDato['VacunacionCovid']=eliminarElementosVacios($_POST['VacunacionCovid']);

////////////////////////////////////////? Vacunacion Covid [FIN] /////////////////////////////////////


////////////////////////////////////////? Modulo Diagnotico ////////////////////////////////////////

$ArregloMasDato['DiagnosticosGenerales']=$_POST['DiagnosticosModulo'];

////////////////////////////////////////? Modulo Diagnotico [FIN] /////////////////////////////////////

////////////////////////////////////////? Modulo Mas Informacion ////////////////////////////////////////

$ArregloMasDato['InformacionAdicional_1']=$_POST['InformacionAdicional_1'];

////////////////////////////////////////? Modulo Mas Informacion [FIN] ////////////////////////////////////////


/*
echo "<pre>";
print_r($ArregloAntecedentes);
echo "</pre>";

echo "<pre>";
print_r($ArregloExamenFisico);
echo "</pre>";

echo "<pre>";
print_r($ArregloEducacion);
echo "</pre>";

echo "<pre>";
print_r($ArregloPlandeCuidados);
echo "</pre>";
*/

$Campos = "";
$Valores = "";
foreach ($ArregloAntecedentes as $key => $value) {

    if(is_array($value)){
        $ValorArreglo = mysqli_real_escape_string($conn3, json_encode($value));
    }else{
        $ValorArreglo = mysqli_real_escape_string($conn3, $value);
    }
    
    $Campos .= $key . ',';
    $Valores .= "'{$ValorArreglo}',";
}

foreach ($ArregloExamenFisico as $key => $value) {

    if(is_array($value)){
        $ValorArreglo = mysqli_real_escape_string($conn3, json_encode($value));
    }else{
        $ValorArreglo = mysqli_real_escape_string($conn3, $value);
    }
    
    $Campos .= $key . ',';
    $Valores .= "'{$ValorArreglo}',";
}

foreach ($ArregloEducacion as $key => $value) {

    if(is_array($value)){
        $ValorArreglo = mysqli_real_escape_string($conn3, json_encode($value));
    }else{
        $ValorArreglo = mysqli_real_escape_string($conn3, $value);
    }
    
    $Campos .= $key . ',';
    $Valores .= "'{$ValorArreglo}',";
}

foreach ($ArregloPlandeCuidados as $key => $value) {

    if(is_array($value)){
        $ValorArreglo = mysqli_real_escape_string($conn3, json_encode($value));
    }else{
        $ValorArreglo = mysqli_real_escape_string($conn3, $value);
    }
    
    $Campos .= $key . ',';
    $Valores .= "'{$ValorArreglo}',";
}

foreach ($ArregloMasDato as $key => $value) {

    if(is_array($value)){
        $ValorArreglo = mysqli_real_escape_string($conn3, json_encode($value));
    }else{
        $ValorArreglo = mysqli_real_escape_string($conn3, $value);
    }
    
    $Campos .= $key . ',';
    $Valores .= "'{$ValorArreglo}',";
}




$Campos = trim($Campos, ',');
$Valores = trim($Valores, ',');

////////////////////////////////////////////Familiograma////////////////////////////////////////////////////////
$ArregloCamposAdicionales=["Familiograma_Archivo"];
foreach ($ArregloCamposAdicionales as $key => $value) {
    $Campo1 = mysqli_query($conn3, "show COLUMNS from RIAS_HistoriaVejez WHERE Field = '$value';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `RIAS_HistoriaVejez` ADD `$value` TEXT NULL ");
    }
}
$Familiograma = $_POST['familiograma_xml'];
////////////////////////////////////////////Familiograma [FIN]///////////////////////////////////////////////////

////////////////////////////////////////////Ecomapa ////////////////////////////////////////////////////////
$ArregloCamposAdicionales=["Ecomapa_Archivo"];
foreach ($ArregloCamposAdicionales as $key => $value) {
    $Campo1 = mysqli_query($conn3, "show COLUMNS from RIAS_HistoriaVejez WHERE Field = '$value';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `RIAS_HistoriaVejez` ADD `$value` TEXT NULL ");
    }
}
$Ecomapa = $_POST['ecomapa_xml'];
////////////////////////////////////////////Ecomapa  [FIN]///////////////////////////////////////////////////












//echo "INSERT INTO RIAS_HistoriaVejez (usuario_id,cliente_id,{$Campos},Familiograma_Archivo,Ecomapa_Archivo) VALUES ('$usuario_id','$cliente_id',{$Valores},'$Familiograma','$Ecomapa');";

$queryList = mysqli_query($conn3, "INSERT INTO RIAS_HistoriaVejez (usuario_id,cliente_id,{$Campos},Familiograma_Archivo,Ecomapa_Archivo) VALUES ('$usuario_id','$cliente_id',{$Valores},'$Familiograma','$Ecomapa');") or die(mysqli_error($conn3));
$Historia_id = mysqli_insert_id($conn3);







///////////////////////////////////////////// Graficas de Pediatria ////////////////////////////////////////////////////////
$fecha_nac = new DateTime(date('Y/m/d', strtotime(funcionMaster($cliente_id, 'cliente_id', 'fechaNacimiento', 'cliente')))); // Creo un objeto DateTime de la fecha ingresada
$fecha_hoy =  new DateTime(date('Y/m/d', time())); // Creo un objeto DateTime de la fecha de hoy
$edad = date_diff($fecha_hoy, $fecha_nac); // La funcion ayuda a calcular la diferencia, esto seria un objeto
$MesesTotal = ($edad->format('%y') * 12) + $edad->format('%m');

// no alterar el orden
$Grafico_Pediatria_Peso= $_POST['ExamenFisico']['ParametrosAntropometricos']['Valoracion']['ExamenFisico_Parametros_Peso']['Peso'];
$Grafico_Pediatria_Altura = $_POST['ExamenFisico']['ParametrosAntropometricos']['Valoracion']['ExamenFisico_Parametros_Talla']['Talla'];
$Grafico_Pediatria_IMC = $_POST['ExamenFisico']['ParametrosAntropometricos']['Valoracion']['ExamenFisico_Parametros_IMC']['IMC'];
$Grafico_Pediatria_Perimetro_Cefalico = $_POST['ExamenFisico']['ParametrosAntropometricos']['Valoracion']['ExamenFisico_Parametros_PerimetroC']['Perimetro Cefalico'];

$Grafico_Pediatria_Edad = $MesesTotal;

if($Grafico_Pediatria_Peso!= "" OR $Grafico_Pediatria_Altura!= "" OR $Grafico_Pediatria_IMC!= "" OR $Grafico_Pediatria_Perimetro_Cefalico!= ""){
mysqli_query($conn3, "INSERT INTO  Grafica_Crecimiento (usuario_id,cliente_id,Peso,Altura,IMC,Perimetro_Cefalico,Edad,id_historia, Tipo_Historia) 
                                                VALUES  ('$usuario_id','$cliente_id','$Grafico_Pediatria_Peso','$Grafico_Pediatria_Altura','$Grafico_Pediatria_IMC','$Grafico_Pediatria_Perimetro_Cefalico','$Grafico_Pediatria_Edad','$Historia_id','Historia RIAS');") or die (mysqli_error($conn3));
}
///////////////////////////////////////////// Graficas de Pediatria ////////////////////////////////////////////////////////




/*
echo "<img src='$Familiograma_Archivo'>";
echo "<hr>";
echo "<img src='$Ecomapa_Archivo'>";
*/
////////////////////////////////////////////Familiograma - Ecomapa para cliente ////////////////////////////////////////////////////////
$ArregloCamposAdicionales=["Ecomapa_Archivo","Familiograma_Archivo"];
foreach ($ArregloCamposAdicionales as $key => $value) {
    $Campo1 = mysqli_query($conn3, "show COLUMNS from cliente WHERE Field = '$value';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `cliente` ADD `$value` TEXT NULL ");
    }
}
$Ecomapa_cliente = $_POST['ecomapa_xml'];
$Familiograma_cliente = $_POST['familiograma_xml'];
////////////////////////////////////////////Familiograma - Ecomapa para cliente  [FIN]///////////////////////////////////////////////////

mysqli_query($conn3, "UPDATE cliente SET Ecomapa_Archivo = '$Ecomapa_cliente', Familiograma_Archivo = '$Familiograma_cliente' WHERE cliente_id = $cliente_id LIMIT 1");





//////////////////AUTOGUARDADO///////////////////////////////////////////////////////////////
if($_POST['Ruta_Historia_AutoGuardado']!=""){
	$Ruta_Historia_AutoGuardado = $_POST['Ruta_Historia_AutoGuardado'];

	$query = "UPDATE RIAS_AutoGuardado SET Estado='0' WHERE cliente_id = '$cliente_id' and usuario_id = '$usuario_id' and Ruta = '$Ruta_Historia_AutoGuardado' AND Estado = '1' ";
	mysqli_query($conn3, $query);
}
//////////////////AUTOGUARDADO///////////////////////////////////////////////////////////////


///////////////////////////////////////////// Recetario ////////////////////////////////////////////////////////
$receta_id = $_POST['receta_id'];
if ($receta_validacion != "") {
	$RecetaId = $receta;
} else {
	$RecetaId = "0";
}
$Recetario_Nombre_Historia = "RIAS_HistoriaVejez";
$Recetario_historia_id = $Historia_id;
$Recetario_cliente_id = $cliente_id;
$Recetario_usuario_id = $usuario_id;
include 'RM_GuardarRecetaHistoria.php';
///////////////////////////////////////////// Recetario ////////////////////////////////////////////////////////


echo "<script language='Javascript'> window.location='RIAS_Finalizado_Vejez.php?id=$Historia_id';</script>";
//echo "<button class='btn btn-primary' onclick='window.location=`RIAS_Finalizado_Adolescencia.php?id=$Historia_id`'>Finalizar</button>";

?>