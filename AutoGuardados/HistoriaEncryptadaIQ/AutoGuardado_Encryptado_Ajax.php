<?php
include '../../funciones/conn3.php';
date_default_timezone_set('America/Bogota');

if (isset($_POST["Tipo_Consulta"]) && $_POST["Tipo_Consulta"]=="Guardar Datos Historia Clinica") {
    
    //Aquí creamos la tabla del autoguardado 
    $tabla = mysqli_query($conn3, "SHOW TABLES LIKE 'AutoGuardado'");
    $nrowtabla = mysqli_num_rows($tabla);
    if ($nrowtabla == 0) {
        $query = "CREATE TABLE `AutoGuardado` ( 
            `id` INT(11) NOT NULL AUTO_INCREMENT , 
            `Fecha` DATETIME NULL DEFAULT CURRENT_TIMESTAMP ,
            `Fecha_Actualizacion` DATETIME NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha y hora de cada vez que se actualiza el registro' ,
            `usuario_id` INT(11) NULL DEFAULT '0' , 
            `cliente_id` INT(11) NULL DEFAULT '0' , 
            `Ruta` TEXT NULL DEFAULT '' ,
            `Nombre_Tabla` TEXT NULL DEFAULT '' ,
            `Campos` TEXT NULL DEFAULT '' ,
            `Arreglo_Paraclinicos` TEXT NULL DEFAULT '' ,
            `Arreglo_Incapacidades` TEXT NULL DEFAULT '' ,
            `Arreglo_Insumos` TEXT NULL DEFAULT '' ,
            `Arreglo_Familiares` TEXT NULL DEFAULT '' ,
            `Estado` TEXT NULL DEFAULT '1' COMMENT '1-> Activo 0-> Inactivo',  
            PRIMARY KEY (`id`)) ENGINE = MyISAM;";

        $creaciontabla = mysqli_query($conn3, $query);
        if (!$creaciontabla) {
            echo "error en la creacion de la tabla";
            exit();
        }
    }

    //Aquí obtenemos los campos que tragimos desde el ajax
    $Campos = json_encode($_POST['Campos'],true);
    $Ruta = $_POST['rutaActual'];
    $nombre_tabla = $_POST['nombre_tabla'];
    $usuario_id = $_POST['usuario_id'];
    $cliente_id = $_POST['cliente_id'];
    
    $CamposPersonalizados = json_encode($_POST['CamposPersonalizados'],true);

    //Aquí estos campos son los que son especiales para los modulos de paraclinicos, incapacidades y insumos
    $Arreglo_Paraclinicos = mysqli_real_escape_string($conn3,$_POST['CamposArrayModulos']['Arreglo_Paraclinicos']);
    $Arreglo_Incapacidades = mysqli_real_escape_string($conn3,$_POST['CamposArrayModulos']['Arreglo_Incapacidades']);
    $Arreglo_Insumos = mysqli_real_escape_string($conn3,$_POST['CamposArrayModulos']['Arreglo_Insumos']);
    //$Arreglo_Familiares = mysqli_real_escape_string($conn3,$_POST['CamposArrayAntecedentesFamiliares']);

    //aqui realizamos manualmente una estructura de un arreglo para que funcione correctamente
    foreach ($_POST['CamposArrayAntecedentesFamiliares'] as $key => $value) {
        $Arreglo_Familiares.= $value.",";
    }
    $Arreglo_Familiares = trim($Arreglo_Familiares,",");

    $Arreglo_Familiares = "[".$Arreglo_Familiares."]";
    //$Arreglo_Familiares = json_encode($Arreglo_Familiares);

     //Aquí se valida si el autoguardado existe
    $QueryAutoGuardado = mysqli_query($conn3, "SELECT * FROM  AutoGuardado where cliente_id = '$cliente_id' and usuario_id = '$usuario_id' and Ruta = '$Ruta' AND Estado = 1");
    $NrowAutoGuardado = mysqli_num_rows($QueryAutoGuardado);

    $Fecha = date("Y-m-d H:i:s");
    if($NrowAutoGuardado>0){
        //$query = "INSERT INTO AutoGuardado (Campos,Ruta,usuario_id,cliente_id) VALUES ('$Campos','$Ruta','$usuario_id','$cliente_id')";
        //hacer un update con la consulta anterior

        //si se existe se actualizan los campos
        $query = "UPDATE AutoGuardado SET Campos='$Campos', Arreglo_Paraclinicos='$Arreglo_Paraclinicos', Arreglo_Incapacidades='$Arreglo_Incapacidades', Arreglo_Insumos='$Arreglo_Insumos', Arreglo_Familiares='$Arreglo_Familiares', Fecha_Actualizacion='$Fecha', imagen_medicinaestetica='$CamposPersonalizados' WHERE cliente_id = '$cliente_id' and usuario_id = '$usuario_id' and Ruta = '$Ruta' and Estado = 1 LIMIT 1";
        $Arreglo["Tipo"]="Update";

        //$RowDatos = mysqli_fetch_assoc($QueryAutoGuardado);//autoguardado a;adido

        $resultado = mysqli_query($conn3, $query);
        //$Autoguardado_id = $RowDatos['id'];//autoguardado a;adido
    }else{

        //Si no existes se crean los campos
        $query = "INSERT INTO AutoGuardado (Campos,Arreglo_Paraclinicos,Arreglo_Incapacidades,Arreglo_Insumos,Arreglo_Familiares,Ruta,Nombre_Tabla,usuario_id,cliente_id,Fecha,Fecha_Actualizacion,imagen_medicinaestetica) 
        VALUES ('$Campos','$Arreglo_Paraclinicos','$Arreglo_Incapacidades','$Arreglo_Insumos','$Arreglo_Familiares','$Ruta','$nombre_tabla','$usuario_id','$cliente_id','$Fecha','$Fecha','$CamposPersonalizados')";
        $Arreglo["Tipo"]="Insert";

        $resultado = mysqli_query($conn3, $query);
        //$Autoguardado_id = mysqli_insert_id($conn3);//autoguardado a;adido
    }
    
    
    /*
    //////////////////////////////? Apartado personalizado //////////////////////////////
    $Sql_Update_Personalizado="";
    $CamposPersonalizados = ($_POST['CamposPersonalizados']);
    foreach ($CamposPersonalizados as $key => $value) {
        $nombre_tabla_crear = $value['nombre_tabla'];
        $Valor_tabla_crear = $value['valor'];

        $Campo1 = mysqli_query($conn3, "show COLUMNS from AutoGuardado WHERE Field = '$nombre_tabla_crear';");
        $nrowCampo1 = mysqli_num_rows($Campo1);
        if ($nrowCampo1 == "0") {
            mysqli_query($conn3, "ALTER TABLE `AutoGuardado` ADD `$nombre_tabla_crear` TEXT NULL  COMMENT ' *Creado desde modulo de Autoguardado_personalizado_ajax*'");
        }

        $Sql_Update_Personalizado .= "$nombre_tabla_crear = '$Valor_tabla_crear', ";
    }
    
    // Construir la consulta UPDATE
    $Sql_Update_Personalizado = rtrim($Sql_Update_Personalizado, ", "); // Eliminar la última coma y espacio
    $Sql_Ejecutar = "UPDATE AutoGuardado SET ".$Sql_Update_Personalizado." WHERE id = '$Autoguardado_id' LIMIT 1";
    
    mysqli_query($conn3, $Sql_Ejecutar);

    //////////////////////////////? Apartado personalizado [FIN] //////////////////
    */

    //Aquí se enviar el arreglo con el estado si fue correcto o incorrecto el autoguardado
    if (!$resultado) {
        $Arreglo["Estado"]="Fail";
        $Arreglo["Mensaje"]=mysqli_error($conn3);
    }else{
        $Arreglo["Estado"]="Success";
    }

    echo json_encode($Arreglo,true);

}
elseif (isset($_POST["Tipo_Consulta"]) && $_POST["Tipo_Consulta"]=="Consultar Estado AutoGuardado") {

    $Ruta = $_POST['rutaActual'];
    $usuario_id = $_POST['usuario_id'];
    $cliente_id = $_POST['cliente_id'];

     //Consulta si existe el autoguardado
    $QueryAutoGuardado = mysqli_query($conn3, "SELECT * FROM  AutoGuardado where cliente_id = '$cliente_id' and usuario_id = '$usuario_id' and Ruta = '$Ruta' AND Estado = 1");
    $NrowAutoGuardado = mysqli_num_rows($QueryAutoGuardado);

    if($NrowAutoGuardado>0){
        $Arreglo["Estado"]="Existe";
    }else{
        $Arreglo["Estado"]="No Existe";
    }

    echo json_encode($Arreglo,true);

}
elseif (isset($_POST["Tipo_Consulta"]) && $_POST["Tipo_Consulta"]=="Cargar AutoGuardado") {
    $Ruta = $_POST['rutaActual'];
    $usuario_id = $_POST['usuario_id'];
    $cliente_id = $_POST['cliente_id'];

    // Se hace una consulta de los datos
    $QueryAutoGuardado = mysqli_query($conn3, "SELECT * FROM  AutoGuardado where cliente_id = '$cliente_id' and usuario_id = '$usuario_id' and Ruta = '$Ruta' AND Estado = 1");
    $NrowAutoGuardado = mysqli_num_rows($QueryAutoGuardado);
    while ($row_recordset32 = mysqli_fetch_array($QueryAutoGuardado)) {
        $Campos = $row_recordset32['Campos'];
        $Arreglo_Paraclinicos = $row_recordset32['Arreglo_Paraclinicos'];
        $Arreglo_Incapacidades = $row_recordset32['Arreglo_Incapacidades'];
        $Arreglo_Insumos = $row_recordset32['Arreglo_Insumos'];
        $Arreglo_Familiares = $row_recordset32['Arreglo_Familiares'];
        $imagen_medicinaestetica = $row_recordset32['imagen_medicinaestetica'];
    }

    //Se le actualizan los saltos de linea por <br> para evitar errores con javascript
    $Campos = str_replace("\n", "<br>", $Campos);
    $Arreglo_Paraclinicos = str_replace("\n", "<br>", $Arreglo_Paraclinicos);
    $Arreglo_Incapacidades = str_replace("\n", "<br>", $Arreglo_Incapacidades);
    $Arreglo_Insumos = str_replace("\n", "<br>", $Arreglo_Insumos);
    $Arreglo_Familiares = str_replace("\n", "<br>", $Arreglo_Familiares);
    $imagen_medicinaestetica = str_replace("\n", "<br>", $imagen_medicinaestetica);
    //aqui se guardan los valores de los campos en arreglos para luego leerlos en javascript
    if($NrowAutoGuardado>0){
        $Arreglo["Estado"]="Existe";
        $Arreglo["Campos"] = json_decode($Campos);
        $Arreglo["Arreglo_Paraclinicos"] = ($Arreglo_Paraclinicos);
        $Arreglo["Arreglo_Incapacidades"] = ($Arreglo_Incapacidades);
        $Arreglo["Arreglo_Insumos"] = ($Arreglo_Insumos);
        $Arreglo["Arreglo_Familiares"] = ($Arreglo_Familiares);
        $Arreglo["imagen_medicinaestetica"] = json_decode($imagen_medicinaestetica);
    }else{
        $Arreglo["Estado"]="No Existe";
    }

    echo json_encode($Arreglo);

}

elseif (isset($_POST["Tipo_Consulta"]) && $_POST["Tipo_Consulta"]=="Cargar Estado Error Autoguardado") {

    $Ruta = $_POST['rutaActual'];
    $usuario_id = $_POST['usuario_id'];
    $cliente_id = $_POST['cliente_id'];

    //aqui se actualiza el autoguardado ya que dio error y para generar un nuevo autoguardado este debera pasarse a estado 2
    
    $query = "UPDATE AutoGuardado SET Estado='2' WHERE cliente_id = '$cliente_id' and usuario_id = '$usuario_id' and Ruta = '$Ruta'";
    $resultado = mysqli_query($conn3, $query);
    $Afectadas = mysqli_affected_rows($conn3);
    if ($Afectadas==0) {
        $Arreglo["Estado"]="Fail";
        $Arreglo["Mensaje"]=mysqli_error($conn3);
    }else{
        $Arreglo["Estado"]="Success";
        
    }

    echo json_encode($Arreglo,true);

}
?>