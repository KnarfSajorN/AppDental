<?php
include 'funciones/conn3.php';
include 'funciones/funciones.php';

$usuario_id = $_POST['usuario_id'];
$cliente_id = $_POST['cliente_id'];

/////////////////////////////////////////////////////////////////// creacion de la tabla para los examemenes //////////////////////////////////////////////////////////////////////////
$tabla = mysqli_query($conn3, "SHOW TABLES LIKE 'Historia_Odontopediatria'");
$nrowtabla = mysqli_num_rows($tabla);
if ($nrowtabla == 0) {
    $query = "CREATE TABLE `Historia_Odontopediatria` ( 
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

/*
echo "<pre>";
print_r($_POST['InformacionGeneral']);
echo "</pre>";
*/

////////////////////////////////////////? InformacionGeneral ////////////////////////////////////////

$ArregloCamposAdicionales=["InformacionGeneral_General"];

foreach ($ArregloCamposAdicionales as $key => $value) {
    $Campo1 = mysqli_query($conn3, "show COLUMNS from Historia_Odontopediatria WHERE Field = '$value';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `Historia_Odontopediatria` ADD `$value` TEXT NULL ");
    }
}

foreach (eliminarElementosVacios($_POST['InformacionGeneral']) as $key => $value) {

    //Aqui se valida que el campo en el cual se va aguardar la info exista por lo que se preguntara por los campos del arreglo de arriba que contendra los campos para este apartado
    //se realiza para que si agregan un campo adicional no de error la consulta
    if (in_array('InformacionGeneral_'.$key, $ArregloCamposAdicionales)) {
        if(is_array($value)){

            foreach ($value as $key_2 => $value_2) {
                $ArregloFormulario['InformacionGeneral_'.$key][$key_2]=$value_2;
            }

        }else{
            $ArregloFormulario['InformacionGeneral_'.$key]=$value;
        }
    }

}

////////////////////////////////////////? InformacionGeneral [FIN] /////////////////////////////////////

////////////////////////////////////////? Interrogatorio por aparatos y sistemas ////////////////////////////////////////

$ArregloCamposAdicionales=["Interrogatorio_Gestacion","Interrogatorio_Parto","Interrogatorio_EtapaNeonatal","Interrogatorio_InfanciaAdolescencia"];

foreach ($ArregloCamposAdicionales as $key => $value) {
    $Campo1 = mysqli_query($conn3, "show COLUMNS from Historia_Odontopediatria WHERE Field = '$value';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `Historia_Odontopediatria` ADD `$value` TEXT NULL ");
    }
}

foreach (eliminarElementosVacios($_POST['Interrogatorio']) as $key => $value) {

    //Aqui se valida que el campo en el cual se va aguardar la info exista por lo que se preguntara por los campos del arreglo de arriba que contendra los campos para este apartado
    //se realiza para que si agregan un campo adicional no de error la consulta
    if (in_array('Interrogatorio_'.$key, $ArregloCamposAdicionales)) {
        if(is_array($value)){

            foreach ($value as $key_2 => $value_2) {
                $ArregloFormulario['Interrogatorio_'.$key][$key_2]=$value_2;
            }

        }else{
            $ArregloFormulario['Interrogatorio_'.$key]=$value;
        }
    }

}



////////////////////////////////////////? Interrogatorio por aparatos y sistemas [FIN] /////////////////////////////////////




////////////////////////////////////////? Heredofamiliares ////////////////////////////////////////

$ArregloCamposAdicionales=["Heredofamiliares_General"];

foreach ($ArregloCamposAdicionales as $key => $value) {
    $Campo1 = mysqli_query($conn3, "show COLUMNS from Historia_Odontopediatria WHERE Field = '$value';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `Historia_Odontopediatria` ADD `$value` TEXT NULL ");
    }
}

foreach (eliminarElementosVacios($_POST['Heredofamiliares']) as $key => $value) {

    //Aqui se valida que el campo en el cual se va aguardar la info exista por lo que se preguntara por los campos del arreglo de arriba que contendra los campos para este apartado
    //se realiza para que si agregan un campo adicional no de error la consulta
    if (in_array('Heredofamiliares_'.$key, $ArregloCamposAdicionales)) {
        if(is_array($value)){

            foreach ($value as $key_2 => $value_2) {
                $ArregloFormulario['Heredofamiliares_'.$key][$key_2]=$value_2;
            }

        }else{
            $ArregloFormulario['Heredofamiliares_'.$key]=$value;
        }
    }

}

////////////////////////////////////////? Heredofamiliares [FIN] /////////////////////////////////////










////////////////////////////////////////? Personales ////////////////////////////////////////

$ArregloCamposAdicionales=["AntecedentesPersonales_Alimentacion","AntecedentesPersonales_Higiene"];

foreach ($ArregloCamposAdicionales as $key => $value) {
    $Campo1 = mysqli_query($conn3, "show COLUMNS from Historia_Odontopediatria WHERE Field = '$value';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `Historia_Odontopediatria` ADD `$value` TEXT NULL ");
    }
}

foreach (eliminarElementosVacios($_POST['AntecedentesPersonales']) as $key => $value) {

    //Aqui se valida que el campo en el cual se va aguardar la info exista por lo que se preguntara por los campos del arreglo de arriba que contendra los campos para este apartado
    //se realiza para que si agregan un campo adicional no de error la consulta
    if (in_array('AntecedentesPersonales_'.$key, $ArregloCamposAdicionales)) {
        if(is_array($value)){

            foreach ($value as $key_2 => $value_2) {
                $ArregloFormulario['AntecedentesPersonales_'.$key][$key_2]=$value_2;
            }

        }else{
            $ArregloFormulario['AntecedentesPersonales_'.$key]=$value;
        }
    }

}

////////////////////////////////////////? Personales [FIN] /////////////////////////////////////







////////////////////////////////////////? InspeccionCyB ////////////////////////////////////////

$ArregloCamposAdicionales=["InspeccionCyB_General","InspeccionCyB_ExploracionCB","InspeccionCyB_TejidosBlandos","InspeccionCyB_Traumatismos"];

foreach ($ArregloCamposAdicionales as $key => $value) {
    $Campo1 = mysqli_query($conn3, "show COLUMNS from Historia_Odontopediatria WHERE Field = '$value';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `Historia_Odontopediatria` ADD `$value` TEXT NULL ");
    }
}

foreach (eliminarElementosVacios($_POST['InspeccionCyB']) as $key => $value) {

    //Aqui se valida que el campo en el cual se va aguardar la info exista por lo que se preguntara por los campos del arreglo de arriba que contendra los campos para este apartado
    //se realiza para que si agregan un campo adicional no de error la consulta
    if (in_array('InspeccionCyB_'.$key, $ArregloCamposAdicionales)) {
        if(is_array($value)){

            foreach ($value as $key_2 => $value_2) {
                $ArregloFormulario['InspeccionCyB_'.$key][$key_2]=$value_2;
            }

        }else{
            $ArregloFormulario['InspeccionCyB_'.$key]=$value;
        }
    }

}

////////////////////////////////////////? InspeccionCyB [FIN] /////////////////////////////////////











////////////////////////////////////////? Oclusion y alineamiento ////////////////////////////////////////

$ArregloCamposAdicionales=["OclusionAlineacion_General","OclusionAlineacion_HabitosNocivos"];

foreach ($ArregloCamposAdicionales as $key => $value) {
    $Campo1 = mysqli_query($conn3, "show COLUMNS from Historia_Odontopediatria WHERE Field = '$value';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `Historia_Odontopediatria` ADD `$value` TEXT NULL ");
    }
}

foreach (eliminarElementosVacios($_POST['OclusionAlineacion']) as $key => $value) {

    //Aqui se valida que el campo en el cual se va aguardar la info exista por lo que se preguntara por los campos del arreglo de arriba que contendra los campos para este apartado
    //se realiza para que si agregan un campo adicional no de error la consulta
    if (in_array('OclusionAlineacion_'.$key, $ArregloCamposAdicionales)) {
        if(is_array($value)){

            foreach ($value as $key_2 => $value_2) {
                $ArregloFormulario['OclusionAlineacion_'.$key][$key_2]=$value_2;
            }

        }else{
            $ArregloFormulario['OclusionAlineacion_'.$key]=$value;
        }
    }

}

////////////////////////////////////////? Oclusion y alineamiento [FIN] /////////////////////////////////////











////////////////////////////////////////? Conducta y Actitud ////////////////////////////////////////

$ArregloCamposAdicionales=["ConductaActitud_General"];

foreach ($ArregloCamposAdicionales as $key => $value) {
    $Campo1 = mysqli_query($conn3, "show COLUMNS from Historia_Odontopediatria WHERE Field = '$value';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `Historia_Odontopediatria` ADD `$value` TEXT NULL ");
    }
}

foreach (eliminarElementosVacios($_POST['ConductaActitud']) as $key => $value) {

    //Aqui se valida que el campo en el cual se va aguardar la info exista por lo que se preguntara por los campos del arreglo de arriba que contendra los campos para este apartado
    //se realiza para que si agregan un campo adicional no de error la consulta
    if (in_array('ConductaActitud_'.$key, $ArregloCamposAdicionales)) {
        if(is_array($value)){

            foreach ($value as $key_2 => $value_2) {
                $ArregloFormulario['ConductaActitud_'.$key][$key_2]=$value_2;
            }

        }else{
            $ArregloFormulario['ConductaActitud_'.$key]=$value;
        }
    }

}

////////////////////////////////////////? Conducta y Actitud [FIN] /////////////////////////////////////









////////////////////////////////////////? Examen dental ////////////////////////////////////////

$ArregloCamposAdicionales=["ExamenDental_General"];

foreach ($ArregloCamposAdicionales as $key => $value) {
    $Campo1 = mysqli_query($conn3, "show COLUMNS from Historia_Odontopediatria WHERE Field = '$value';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `Historia_Odontopediatria` ADD `$value` TEXT NULL ");
    }
}

foreach (eliminarElementosVacios($_POST['ExamenDental']) as $key => $value) {

    //Aqui se valida que el campo en el cual se va aguardar la info exista por lo que se preguntara por los campos del arreglo de arriba que contendra los campos para este apartado
    //se realiza para que si agregan un campo adicional no de error la consulta
    if (in_array('ExamenDental_'.$key, $ArregloCamposAdicionales)) {
        if(is_array($value)){

            foreach ($value as $key_2 => $value_2) {
                $ArregloFormulario['ExamenDental_'.$key][$key_2]=$value_2;
            }

        }else{
            $ArregloFormulario['ExamenDental_'.$key]=$value;
        }
    }

}

////////////////////////////////////////? Examen dental [FIN] /////////////////////////////////////










////////////////////////////////////////? Diagnostico ////////////////////////////////////////

$ArregloCamposAdicionales=["Diagnostico_General"];

foreach ($ArregloCamposAdicionales as $key => $value) {
    $Campo1 = mysqli_query($conn3, "show COLUMNS from Historia_Odontopediatria WHERE Field = '$value';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `Historia_Odontopediatria` ADD `$value` TEXT NULL ");
    }
}

foreach (eliminarElementosVacios($_POST['Diagnostico']) as $key => $value) {

    //Aqui se valida que el campo en el cual se va aguardar la info exista por lo que se preguntara por los campos del arreglo de arriba que contendra los campos para este apartado
    //se realiza para que si agregan un campo adicional no de error la consulta
    if (in_array('Diagnostico_'.$key, $ArregloCamposAdicionales)) {
        if(is_array($value)){

            foreach ($value as $key_2 => $value_2) {
                $ArregloFormulario['Diagnostico_'.$key][$key_2]=$value_2;
            }

        }else{
            $ArregloFormulario['Diagnostico_'.$key]=$value;
        }
    }

}

////////////////////////////////////////? Diagnostico [FIN] /////////////////////////////////////




////////////////////////////////////////? Mas Datos ////////////////////////////////////////
$ArregloCamposAdicionales=["TablaInterrogatorio","TablaRiesgoCaries"];

foreach ($ArregloCamposAdicionales as $key => $value) {
    $Campo1 = mysqli_query($conn3, "show COLUMNS from Historia_Odontopediatria WHERE Field = '$value';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `Historia_Odontopediatria` ADD `$value` TEXT NULL ");
    }
}

$ArregloMasDato['TablaInterrogatorio']=eliminarElementosVacios($_POST['TablaInterrogatorio']);

$ArregloMasDato['TablaRiesgoCaries']=($_POST['TablaRiesgoCaries']);
////////////////////////////////////////? Mas Datos [FIN] /////////////////////////////////////



$Campos = "";
$Valores = "";
foreach ($ArregloFormulario as $key => $value) {

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


echo "<pre>";
print_r($ArregloFormulario);
echo "</pre>";

echo "<pre>";
print_r($ArregloMasDato);
echo "</pre>";


$queryList = mysqli_query($conn3, "INSERT INTO Historia_Odontopediatria (usuario_id,cliente_id,{$Campos}) VALUES ('$usuario_id','$cliente_id',{$Valores});") or die(mysqli_error($conn3));
$Historia_id = mysqli_insert_id($conn3);


echo "<script language='Javascript'> window.location='ODP_Finalizado?id=$Historia_id';</script>";
//echo "<button class='btn btn-primary' onclick='window.location=`ODP_Finalizado?id=$Historia_id`'>Finalizar</button>";


