<?php
include 'funciones/conn3.php';
include 'funciones/funciones.php';

//$_POST = DatosIngresarMysqli($_POST);

$usuario_id = $_POST['usuario_id'];
$cliente_id = $_POST['cliente_id'];

/////////////////////////////////////////////////////////////////// creacion de la tabla para los examemenes //////////////////////////////////////////////////////////////////////////
$tabla = mysqli_query($conn3, "SHOW TABLES LIKE 'RIAS_HistoriaPrimeraInfancia'");
$nrowtabla = mysqli_num_rows($tabla);
if ($nrowtabla == 0) {
    $query = "CREATE TABLE `RIAS_HistoriaPrimeraInfancia` ( 
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
/*
function eliminarElementosVacios($array) {
    // Recorre cada elemento del array
    foreach ($array as $clave => $valor) {
        // Si es un array, aplica la función de forma recursiva
        if (is_array($valor)) {
            $array[$clave] = eliminarElementosVacios($valor);
        }

        // Elimina los elementos vacíos
        if (empty($array[$clave])) {
            unset($array[$clave]);
        }
    }

    return $array;
}
*/
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
    $Campo1 = mysqli_query($conn3, "show COLUMNS from RIAS_HistoriaPrimeraInfancia WHERE Field = '$value';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `RIAS_HistoriaPrimeraInfancia` ADD `$value` TEXT NULL ");
    }
}

foreach (eliminarElementosVacios($_POST['Anamnesis']['General']) as $key => $value) {

        $ArregloAntecedentes['Anamnesis_General'][$key]=$value;

}

////////////////////////////////////////? Anamnesis General [FIN] /////////////////////////////////////



////////////////////////////////////////? Antecedentes////////////////////////////////////////
$ArregloCamposAdicionales=["Antecedentes_Personales","Antecedentes_Medicos","Antecedentes_Familiares","Antecedentes_MasAntecedentes"];

foreach ($ArregloCamposAdicionales as $key => $value) {
    $Campo1 = mysqli_query($conn3, "show COLUMNS from RIAS_HistoriaPrimeraInfancia WHERE Field = '$value';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `RIAS_HistoriaPrimeraInfancia` ADD `$value` TEXT NULL ");
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

}

////////////////////////////////////////? Antecedentes [FIN] /////////////////////////////////////









////////////////////////////////////////? Pruebas de Tamizaje Neonatal ////////////////////////////////////////
$ArregloCamposAdicionales=["Tamizaje"];

foreach ($ArregloCamposAdicionales as $key => $value) {
    $Campo1 = mysqli_query($conn3, "show COLUMNS from RIAS_HistoriaPrimeraInfancia WHERE Field = '$value';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `RIAS_HistoriaPrimeraInfancia` ADD `$value` TEXT NULL ");
    }
}

foreach (eliminarElementosVacios($_POST['Anamnesis']['Tamizaje']) as $key => $value) {

    $ArregloAntecedentes['Tamizaje'][$key]=$value;

}

////////////////////////////////////////? Pruebas de Tamizaje Neonatal [FIN] /////////////////////////////////////









////////////////////////////////////////? Hitos del desarrollo del niño ////////////////////////////////////////
$ArregloCamposAdicionales=["HitosDesarollo"];

foreach ($ArregloCamposAdicionales as $key => $value) {
    $Campo1 = mysqli_query($conn3, "show COLUMNS from RIAS_HistoriaPrimeraInfancia WHERE Field = '$value';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `RIAS_HistoriaPrimeraInfancia` ADD `$value` TEXT NULL ");
    }
}

foreach (eliminarElementosVacios($_POST['Anamnesis']['HitosDesarollo']) as $key => $value) {

        $ArregloAntecedentes['HitosDesarollo'][$key]=$value;

}

////////////////////////////////////////? Hitos del desarrollo del niño [FIN] /////////////////////////////////////









////////////////////////////////////////? Alimentación en niños menores de 6 meses ////////////////////////////////////////
$ArregloCamposAdicionales=["AlimentacionMenor6_Lactancia","AlimentacionMenor6_Campos"];

foreach ($ArregloCamposAdicionales as $key => $value) {
    $Campo1 = mysqli_query($conn3, "show COLUMNS from RIAS_HistoriaPrimeraInfancia WHERE Field = '$value';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `RIAS_HistoriaPrimeraInfancia` ADD `$value` TEXT NULL ");
    }
}

foreach (eliminarElementosVacios($_POST['Anamnesis']['AlimentacionMenor6']) as $key => $value) {

    //Aqui se valida que el campo en el cual se va aguardar la info exista por lo que se preguntara por los campos del arreglo de arriba que contendra los campos para este apartado
    //se realiza para que si agregan un campo adicional no de error la consulta
    if (in_array('AlimentacionMenor6_'.$key, $ArregloCamposAdicionales)) {
        if(is_array($value)){

            foreach ($value as $key_2 => $value_2) {
                $ArregloAntecedentes['AlimentacionMenor6_'.$key][$key_2]=$value_2;
            }

        }else{
            $ArregloAntecedentes['AlimentacionMenor6_'.$key]=$value;
        }
    }

}

////////////////////////////////////////? Alimentación en niños menores de 6 meses [FIN] /////////////////////////////////////









////////////////////////////////////////? Alimentación en niños mayores de 6 meses ////////////////////////////////////////
$ArregloCamposAdicionales=["AlimentacionMayor6"];

foreach ($ArregloCamposAdicionales as $key => $value) {
    $Campo1 = mysqli_query($conn3, "show COLUMNS from RIAS_HistoriaPrimeraInfancia WHERE Field = '$value';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `RIAS_HistoriaPrimeraInfancia` ADD `$value` TEXT NULL ");
    }
}

foreach (eliminarElementosVacios($_POST['Anamnesis']['AlimentacionMayor6']) as $key => $value) {
    
    $ArregloAntecedentes['AlimentacionMayor6'][$key]=$value;

}

////////////////////////////////////////? Alimentación en niños mayores de 6 meses [FIN] /////////////////////////////////////









////////////////////////////////////////? Identificación de factores de riesgo ////////////////////////////////////////
$ArregloCamposAdicionales=["FactoresRiesgo_Campos","FactoresRiesgo_SolicitudExamenes"];

foreach ($ArregloCamposAdicionales as $key => $value) {
    $Campo1 = mysqli_query($conn3, "show COLUMNS from RIAS_HistoriaPrimeraInfancia WHERE Field = '$value';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `RIAS_HistoriaPrimeraInfancia` ADD `$value` TEXT NULL ");
    }
}

foreach (eliminarElementosVacios($_POST['Anamnesis']['FactoresRiesgo']) as $key => $value) {
    //Aqui se valida que el campo en el cual se va aguardar la info exista por lo que se preguntara por los campos del arreglo de arriba que contendra los campos para este apartado
    //se realiza para que si agregan un campo adicional no de error la consulta
    if (in_array('FactoresRiesgo_'.$key, $ArregloCamposAdicionales)) {
        if(is_array($value)){

            foreach ($value as $key_2 => $value_2) {
                $ArregloAntecedentes['FactoresRiesgo_'.$key][$key_2]=$value_2;
            }

        }else{
            $ArregloAntecedentes['FactoresRiesgo_'.$key]=$value;
        }
    }
    
}

////////////////////////////////////////? Identificación de factores de riesgo [FIN] /////////////////////////////////////









////////////////////////////////////////? Rutinas y hábitos saludables ////////////////////////////////////////
$ArregloCamposAdicionales=["RutinasHabitos"];

foreach ($ArregloCamposAdicionales as $key => $value) {
    $Campo1 = mysqli_query($conn3, "show COLUMNS from RIAS_HistoriaPrimeraInfancia WHERE Field = '$value';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `RIAS_HistoriaPrimeraInfancia` ADD `$value` TEXT NULL ");
    }
}

foreach (eliminarElementosVacios($_POST['Anamnesis']['RutinasHabitos']) as $key => $value) {
    
    $ArregloAntecedentes['RutinasHabitos'][$key]=$value;

}

////////////////////////////////////////? Rutinas y hábitos saludables [FIN] /////////////////////////////////////









////////////////////////////////////////? Prácticas de crianza y cuidado ////////////////////////////////////////
$ArregloCamposAdicionales=["PracticaCrianzaCuidado"];

foreach ($ArregloCamposAdicionales as $key => $value) {
    $Campo1 = mysqli_query($conn3, "show COLUMNS from RIAS_HistoriaPrimeraInfancia WHERE Field = '$value';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `RIAS_HistoriaPrimeraInfancia` ADD `$value` TEXT NULL ");
    }
}

foreach (eliminarElementosVacios($_POST['Anamnesis']['PracticaCrianzaCuidado']) as $key => $value) {
    
    $ArregloAntecedentes['PracticaCrianzaCuidado'][$key]=$value;

}

////////////////////////////////////////? Prácticas de crianza y cuidado [FIN] /////////////////////////////////////









////////////////////////////////////////? Valoración o actualización de la conformación y dinámica de la familiar ////////////////////////////////////////
$ArregloCamposAdicionales=["DinamicaFamiliar_CapacidadRecursosFamiliares","DinamicaFamiliar_APGAR","DinamicaFamiliar_ProcesoDesarolloIntegral","DinamicaFamiliar_RiesgoSaludNinoFamilia","DinamicaFamiliar_Interpretacion_APGAR","DinamicaFamiliar_Puntaje_APGAR"];

foreach ($ArregloCamposAdicionales as $key => $value) {
    $Campo1 = mysqli_query($conn3, "show COLUMNS from RIAS_HistoriaPrimeraInfancia WHERE Field = '$value';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `RIAS_HistoriaPrimeraInfancia` ADD `$value` TEXT NULL ");
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

////////////////////////////////////////? Valoración o actualización de la conformación y dinámica de la familiar [FIN] /////////////////////////////////////


















////////////////////////////////////////? Signos Vitales ////////////////////////////////////////
$ArregloCamposAdicionales=["Json_SignosVitales","H_Peso","H_Altura","H_IMC","H_PerimetroCefalico"];

foreach ($ArregloCamposAdicionales as $key => $value) {
    $Campo1 = mysqli_query($conn3, "show COLUMNS from RIAS_HistoriaPrimeraInfancia WHERE Field = '$value';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `RIAS_HistoriaPrimeraInfancia` ADD `$value` TEXT NULL ");
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
////////////////////////////////////////? Signos Vitales [FIN] /////////////////////////////////////









////////////////////////////////////////? Valoración del Desarollo ////////////////////////////////////////
$ArregloCamposAdicionales=["ValoracionDesarollo_Observaciones","ValoracionDesarollo_MotricidadGruesa","ValoracionDesarollo_MotricidadFinoAdaptativa","ValoracionDesarollo_AudicionLenguaje","ValoracionDesarollo_PersonalSocial","ValoracionDesarollo_TamizajeA_MCHARF","ValoracionDesarollo_TamizajeA_MCHARF_Seguimiento","ValoracionDesarollo_Interpretacion", "ValoracionDesarrollo_jsonDataEscala", "ValoracionDesarrollo_EscalaAbreviadaTablaPuntuacionHTML","ValoracionDesarollo_InterpretacionMCHART","ValoracionDesarollo_PuntajeMCHART"];

foreach ($ArregloCamposAdicionales as $key => $value) {
    $Campo1 = mysqli_query($conn3, "show COLUMNS from RIAS_HistoriaPrimeraInfancia WHERE Field = '$value';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `RIAS_HistoriaPrimeraInfancia` ADD `$value` TEXT NULL ");
    }
}

foreach (eliminarElementosVacios($_POST['ExamenFisico']['ValoracionDesarollo']) as $key => $value) {
    
    //Aqui se valida que el campo en el cual se va aguardar la info exista por lo que se preguntara por los campos del arreglo de arriba que contendra los campos para este apartado
    //se realiza para que si agregan un campo adicional no de error la consulta
    if (in_array('ValoracionDesarollo_'.$key, $ArregloCamposAdicionales)) {
        if(is_array($value)){

            foreach ($value as $key_2 => $value_2) {
                $ArregloExamenFisico['ValoracionDesarollo_'.$key][$key_2]=$value_2;
            }

        }else{
            $ArregloExamenFisico['ValoracionDesarollo_'.$key]=$value;
        }
    }
    //echo $value;
}


$ArregloExamenFisico['ValoracionDesarollo_MotricidadGruesa']=$_POST['encuesta1'];
$ArregloExamenFisico['ValoracionDesarollo_MotricidadFinoAdaptativa']=$_POST['encuesta2'];
$ArregloExamenFisico['ValoracionDesarollo_AudicionLenguaje']=$_POST['encuesta3'];
$ArregloExamenFisico['ValoracionDesarollo_PersonalSocial']=$_POST['encuesta4'];
$ArregloExamenFisico['ValoracionDesarollo_TamizajeA_MCHARF']=$_POST['mChart1'];
$ArregloExamenFisico['ValoracionDesarollo_TamizajeA_MCHARF_Seguimiento']=$_POST['mChart21'];

$ArregloExamenFisico['ValoracionDesarollo_Interpretacion']=$_POST['tablaencuesta'];
$ArregloExamenFisico['ValoracionDesarrollo_jsonDataEscala']=$_POST['jsonDataEscala'];
$ArregloExamenFisico['ValoracionDesarrollo_EscalaAbreviadaTablaPuntuacionHTML']=$_POST['EscalaAbreviadaTablaPuntuacionHTML'];

////////////////////////////////////////? Valoración del Desarollo [FIN] /////////////////////////////////////









////////////////////////////////////////? Valoración de Estado Nutricional ////////////////////////////////////////
$ArregloCamposAdicionales=["ValoracionEstadoNutricional_ParametrosAntropometricos"];

foreach ($ArregloCamposAdicionales as $key => $value) {
    $Campo1 = mysqli_query($conn3, "show COLUMNS from RIAS_HistoriaPrimeraInfancia WHERE Field = '$value';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `RIAS_HistoriaPrimeraInfancia` ADD `$value` TEXT NULL ");
    }
}

foreach (eliminarElementosVacios($_POST['ExamenFisico']['ParametrosAntropometricos']) as $key => $value) {
    
    $ArregloExamenFisico['ValoracionEstadoNutricional_ParametrosAntropometricos'][$key]=$value;
}


////////////////////////////////////////? Valoración de Estado Nutricional [FIN] /////////////////////////////////////









////////////////////////////////////////? Valoración de la Salud Sexual ////////////////////////////////////////
$ArregloCamposAdicionales=["SaludSexual_Signos","SaludSexual_Ninas","SaludSexual_Ninos","SaludSexual_Intersexuales"];

foreach ($ArregloCamposAdicionales as $key => $value) {
    $Campo1 = mysqli_query($conn3, "show COLUMNS from RIAS_HistoriaPrimeraInfancia WHERE Field = '$value';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `RIAS_HistoriaPrimeraInfancia` ADD `$value` TEXT NULL ");
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
    //echo $value;
}

////////////////////////////////////////? Valoración de la Salud Sexual [FIN] /////////////////////////////////////









////////////////////////////////////////? Valoración de la Salud Visual ////////////////////////////////////////
$ArregloCamposAdicionales=["SaludVisual_Valoracion"];

foreach ($ArregloCamposAdicionales as $key => $value) {
    $Campo1 = mysqli_query($conn3, "show COLUMNS from RIAS_HistoriaPrimeraInfancia WHERE Field = '$value';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `RIAS_HistoriaPrimeraInfancia` ADD `$value` TEXT NULL ");
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
    //echo $value;
}

////////////////////////////////////////? Valoración de la Salud Visual [FIN] /////////////////////////////////////









////////////////////////////////////////? Valoración Auditiva ////////////////////////////////////////
$ArregloCamposAdicionales=["SaludAuditiva_Valoracion","SaludAuditiva_Anexo4","SaludAuditiva_VALE","SaludAuditiva_VALE_2","SaludAuditiva_VALE_3","SaludAuditiva_VALE_4","SaludAuditiva_VALE_5","SaludAuditiva_VALE_Interpretacion"];

foreach ($ArregloCamposAdicionales as $key => $value) {
    $Campo1 = mysqli_query($conn3, "show COLUMNS from RIAS_HistoriaPrimeraInfancia WHERE Field = '$value';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `RIAS_HistoriaPrimeraInfancia` ADD `$value` TEXT NULL ");
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

////////////////////////////////////////? Valoración Auditiva [FIN] /////////////////////////////////////









////////////////////////////////////////? Valoración de Salud Bucal ////////////////////////////////////////
$ArregloCamposAdicionales=["SaludBucal_Valoracion"];

foreach ($ArregloCamposAdicionales as $key => $value) {
    $Campo1 = mysqli_query($conn3, "show COLUMNS from RIAS_HistoriaPrimeraInfancia WHERE Field = '$value';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `RIAS_HistoriaPrimeraInfancia` ADD `$value` TEXT NULL ");
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

////////////////////////////////////////? Valoración de Salud Bucal [FIN] /////////////////////////////////////









////////////////////////////////////////? Valoración de Salud Mental ////////////////////////////////////////
$ArregloCamposAdicionales=["SaludMental_Valoracion"];

foreach ($ArregloCamposAdicionales as $key => $value) {
    $Campo1 = mysqli_query($conn3, "show COLUMNS from RIAS_HistoriaPrimeraInfancia WHERE Field = '$value';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `RIAS_HistoriaPrimeraInfancia` ADD `$value` TEXT NULL ");
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

////////////////////////////////////////? Valoración de Salud Mental [FIN] /////////////////////////////////////









////////////////////////////////////////? Valoración de Otros Aspectos ////////////////////////////////////////
$ArregloCamposAdicionales=["OtrosAspectos_Valoracion"];

foreach ($ArregloCamposAdicionales as $key => $value) {
    $Campo1 = mysqli_query($conn3, "show COLUMNS from RIAS_HistoriaPrimeraInfancia WHERE Field = '$value';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `RIAS_HistoriaPrimeraInfancia` ADD `$value` TEXT NULL ");
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

////////////////////////////////////////? Valoración de Otros Aspectos [FIN] /////////////////////////////////////



















////////////////////////////////////////? Educacion ////////////////////////////////////////
$ArregloCamposAdicionales=["Educacion_Datos"];

foreach ($ArregloCamposAdicionales as $key => $value) {
    $Campo1 = mysqli_query($conn3, "show COLUMNS from RIAS_HistoriaPrimeraInfancia WHERE Field = '$value';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `RIAS_HistoriaPrimeraInfancia` ADD `$value` TEXT NULL ");
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

////////////////////////////////////////? Educacion [FIN] /////////////////////////////////////



















////////////////////////////////////////? Plan de Cuidados ////////////////////////////////////////
$ArregloCamposAdicionales=["PlanCuidados_Datos","PlanCuidados_Vacunacion"];

foreach ($ArregloCamposAdicionales as $key => $value) {
    $Campo1 = mysqli_query($conn3, "show COLUMNS from RIAS_HistoriaPrimeraInfancia WHERE Field = '$value';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `RIAS_HistoriaPrimeraInfancia` ADD `$value` TEXT NULL ");
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
////////////////////////////////////////? Plan de Cuidados [FIN] /////////////////////////////////////









////////////////////////////////////////? Remision ////////////////////////////////////////
$ArregloCamposAdicionales=["Remision","ExamenesCUPSCIE10","FinalidadConsulta","VacunacionCovid","DiagnosticosGenerales","InformacionAdicional_1"];

foreach ($ArregloCamposAdicionales as $key => $value) {
    $Campo1 = mysqli_query($conn3, "show COLUMNS from RIAS_HistoriaPrimeraInfancia WHERE Field = '$value';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `RIAS_HistoriaPrimeraInfancia` ADD `$value` TEXT NULL ");
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
    $Campo1 = mysqli_query($conn3, "show COLUMNS from RIAS_HistoriaPrimeraInfancia WHERE Field = '$value';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `RIAS_HistoriaPrimeraInfancia` ADD `$value` TEXT NULL ");
    }
}
$Familiograma = $_POST['familiograma_xml'];
////////////////////////////////////////////Familiograma [FIN]///////////////////////////////////////////////////

////////////////////////////////////////////Ecomapa ////////////////////////////////////////////////////////
$ArregloCamposAdicionales=["Ecomapa_Archivo"];
foreach ($ArregloCamposAdicionales as $key => $value) {
    $Campo1 = mysqli_query($conn3, "show COLUMNS from RIAS_HistoriaPrimeraInfancia WHERE Field = '$value';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `RIAS_HistoriaPrimeraInfancia` ADD `$value` TEXT NULL ");
    }
}
$Ecomapa = $_POST['ecomapa_xml'];
////////////////////////////////////////////Ecomapa  [FIN]///////////////////////////////////////////////////










//echo "INSERT INTO RIAS_HistoriaPrimeraInfancia (usuario_id,cliente_id,{$Campos},Familiograma_Archivo,Ecomapa_Archivo) VALUES ('$usuario_id','$cliente_id',{$Valores},'$Familiograma','$Ecomapa');";

$queryList = mysqli_query($conn3, "INSERT INTO RIAS_HistoriaPrimeraInfancia (usuario_id,cliente_id,{$Campos},Familiograma_Archivo,Ecomapa_Archivo) VALUES ('$usuario_id','$cliente_id',{$Valores},'$Familiograma','$Ecomapa');") or die(mysqli_error($conn3));
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
                                                VALUES  ('$usuario_id','$cliente_id','$Grafico_Pediatria_Peso','$Grafico_Pediatria_Altura','$Grafico_Pediatria_IMC','$Grafico_Pediatria_Perimetro_Cefalico','$Grafico_Pediatria_Edad','$Historia_id','Historia RIAS');");
}
///////////////////////////////////////////// Graficas de Pediatria ////////////////////////////////////////////////////////






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





/*
echo "<img src='$Familiograma_Archivo'>";
echo "<hr>";
echo "<img src='$Ecomapa_Archivo'>";
*/

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
$Recetario_Nombre_Historia = "RIAS_HistoriaPrimeraInfancia";
$Recetario_historia_id = $Historia_id;
$Recetario_cliente_id = $cliente_id;
$Recetario_usuario_id = $usuario_id;
include 'RM_GuardarRecetaHistoria.php';
///////////////////////////////////////////// Recetario ////////////////////////////////////////////////////////





echo "<script language='Javascript'> window.location='RIAS_Finalizado.php?id=$Historia_id';</script>";
//echo "<button class='btn btn-primary' onclick='window.location=`RIAS_Finalizado.php?id=$Historia_id`'>Finalizar</button>";

?>