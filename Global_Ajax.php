<?php
include 'funciones/conn3.php';


if (isset($_POST["Nueva_Opcion_Select_Global"]) AND isset($_POST["Tipo_Select_Global"])) {

    $Nombre_Tabla = "Global_Select";

    //$NombreCreado = $_POST["Nueva_Opcion_Select_Global"];
    //$NombreCreado = preg_replace('/[^a-zA-Z0-9_ -]/s', '', $_POST["Nueva_Opcion_Select_Global"]);
    $NombreCreado = preg_replace('/[^a-zA-Z0-9_áéíóúÁÉÍÓÚ -]/u', '', $_POST["Nueva_Opcion_Select_Global"]);
    //$category_name = $_POST["category_name"];
    $TipoSelect = $_POST["Tipo_Select_Global"];
    $usuario_id = $_POST["Usuario_Select_Global"];
    $tabla = mysqli_query($conn3, "SHOW TABLES LIKE '{$Nombre_Tabla}'");
    $nrowtabla = mysqli_num_rows($tabla);
    if ($nrowtabla == 0) {

        $query = "CREATE TABLE `{$Nombre_Tabla}` (
        `id` int(11) NOT NULL,
        `usuario_id` int(11) NOT NULL,
        `Fecha_Registro` date DEFAULT current_timestamp(),
        `Nombre` text DEFAULT '' COMMENT 'Este Nombre Debe Ser Unico',
        `Opciones` text DEFAULT '',
        `Creacion_Dinamica` text DEFAULT '',
        `Activo` varchar(5) DEFAULT '1'
        ) ENGINE=MyISAM DEFAULT CHARSET=latin1;";

        $creaciontabla = mysqli_query($conn3, $query);
        if (!$creaciontabla) {
            echo "<script language='Javascript'> alert('error en la creacion de la tabla');</script>";
        } else {
            mysqli_query($conn3, "ALTER TABLE `{$Nombre_Tabla}` ADD PRIMARY KEY (`id`);");
            mysqli_query($conn3, "ALTER TABLE `{$Nombre_Tabla}` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;");
        }
    }

    
    $Igual="0";

    $QuerySelect = mysqli_query($conn3, "SELECT * FROM {$Nombre_Tabla} WHERE Nombre = '{$TipoSelect}' LIMIT 1");
    $nrowSelect = mysqli_num_rows($QuerySelect);
    while ($RowSelect = mysqli_fetch_array($QuerySelect)) {
        $Opciones = $RowSelect['Opciones'];
    }

    $Listado = json_decode($Opciones, true);
    foreach ($Listado as $key => $value) {
        if($value == $NombreCreado)
        {
            $Igual="1";
        }
    }

    if($Igual=="0")
    {
        if ($nrowSelect == 0) {
            $ArregloNombre[]= mysqli_real_escape_string($conn3,$NombreCreado);
            $ArregloNombreFinal = json_encode($ArregloNombre, JSON_UNESCAPED_UNICODE);
            $queryList = mysqli_query($conn3, "INSERT INTO {$Nombre_Tabla} (usuario_id,Nombre,Opciones) VALUES ('$usuario_id', '{$TipoSelect}','$ArregloNombreFinal');");
        }

        $Listado[] = $NombreCreado;
        $Listado1 = json_encode($Listado, JSON_UNESCAPED_UNICODE);
        $queryList = mysqli_query($conn3, "UPDATE {$Nombre_Tabla} SET Opciones = '{$Listado1}' WHERE Nombre = '{$TipoSelect}' limit 1");
        if ($queryList != true) {
            echo "Error";
        }
        else{
            echo $NombreCreado;
        }
    }
    else {
        echo "Creado";
    }

}

else if (isset($_POST["Tipo_Select_Global"]) AND $_POST["Tipo"]== "Cargar Resultados") {

    $Nombre_Tabla = "Global_Select";
    $Campo_Tabla = $_POST["Tipo_Select_Global"];

    
    $QuerySelect = mysqli_query($conn3, "SELECT * FROM {$Nombre_Tabla} WHERE Nombre = '{$Campo_Tabla}' LIMIT 1");
    $nrowSelect = mysqli_num_rows($QuerySelect);
    while ($RowSelect = mysqli_fetch_array($QuerySelect)) {
        $Opciones = $RowSelect['Opciones'];
        $Listado = json_decode($Opciones, true);
        foreach ($Listado as $key => $value) {
            echo "<option>{$value}</option>";
        }
    }

}



if($_POST["Tipo"]== "TablaSelect_CargarDatos"){

    $Tabla = $_POST["Tabla"];
    $Consulta_Where = $_POST["Consulta_Where"];
    $Datos_Option = json_decode($_POST["Datos_Option"], true);
    //explode para separar los datos por |
    $DatosTexto = explode("|", $Datos_Option['TextOption']);
    

    if(!isset($_POST['searchTerm'])){
        if($Consulta_Where!=""){$Consulta_Where_Final="WHERE ".$Consulta_Where;}

        $fetchData = mysqli_query($conn3,"select * from {$Tabla} {$Consulta_Where_Final} order by {$Datos_Option['ValueOption']} ASC limit 50");
      }else{ 
        if($Consulta_Where!="" AND $DatosTexto!=null){$Consulta_Where_Final="WHERE ".$Consulta_Where." AND ";}
        elseif($Consulta_Where!="" AND $DatosTexto['0']==null){$Consulta_Where_Final="WHERE ".$Consulta_Where;}
        elseif($Consulta_Where=="" AND $DatosTexto['0']!=null){$Consulta_Where_Final="WHERE ";}

        $search = $_POST['searchTerm'];
        $DatosQuery="(";
        foreach($DatosTexto as $key => $value){
            if($search!=""){
                $DatosQuery .= " $value like '%{$search}%' OR ";
            }
        }
        //trim de la palabra OR 
        $DatosQuery = trim($DatosQuery,"OR ");
        $DatosQuery .= ")";

        if($DatosQuery!="()"){
            $Consulta_Where_Final = $Consulta_Where_Final.$DatosQuery;
        }

        $fetchData = mysqli_query($conn3,"select * from {$Tabla} {$Consulta_Where_Final} order by {$Datos_Option['ValueOption']} ASC limit 50");
      } 
      
      $data = array();
      while ($row = mysqli_fetch_array($fetchData)) {
        $DatosArreglo="";
        foreach($DatosTexto as $key => $value){
            $DatosArreglo .= $row[$value]." | ";
        }

        $data[] = array("id"=>$row[$Datos_Option['ValueOption']], "text"=>$DatosArreglo);
      }

      echo json_encode($data);
}

if ($_POST["Tipo"] == "TablaSelect_CrearDatos") {

    $Tabla = $_POST["Tabla"];
    $Valor = $_POST["Valor"];
    $Datos_Option = json_decode($_POST["Datos_Option"],true);
    //explode para separar los datos por |
    $DatosTexto = explode("|", $Datos_Option['TextOption']);

    $QueryCampo = explode("|", $Datos_Option['AgregarQueryCampo']);
    $QueryValor = explode("|", $Datos_Option['AgregarQueryValor']);
    foreach ($QueryCampo as $key => $value) {
        if($value!=""){
        $QueryWhereCampo .= ",{$value}";
        }
    }

    foreach ($QueryValor as $key => $value) {
        if($value!=""){
        $QueryValorCampo .= ",'{$value}' ";
        }
    }


    $QuerySelect = mysqli_query($conn3, "SELECT * FROM {$Tabla} WHERE {$Datos_Option['CampoWhereValue']} = '{$Valor}' LIMIT 1");
    $nrowSelect = mysqli_num_rows($QuerySelect);

    if($nrowSelect=="0")
    {
        $CampoNombre = $Datos_Option['CampoWhereValue'];
        $CampoValor = $_POST["Valor"];

        $queryList = mysqli_query($conn3, "INSERT INTO {$Tabla} ($CampoNombre {$QueryWhereCampo}) VALUES ('$CampoValor' {$QueryValorCampo});");
        if ($queryList != true) {
            // mostrar el errorde del query
            echo "Error | ".mysqli_error($conn3);
        }
        else{
            $id = mysqli_insert_id($conn3);
            if($id==0){$id=$CampoValor;}
            echo $id."|".$CampoValor ;
        }
    }
    else {
        echo "Creado";
    }
    //echo "SELECT * FROM {$Tabla} WHERE {$Datos_Option['CampoWhereValue']} = '{$Valor}' LIMIT 1";
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($_POST["Tipo"] == "GlobalSelect_CargarDatos") {

    $Usuario = $_POST["Usuario"];
    $Tabla = $_POST["Tabla"];

    $fetchData = mysqli_query($conn3, "SELECT * FROM  Global_Select WHERE Nombre='{$Tabla}' limit 1");

    $data = array();
    while ($row = mysqli_fetch_array($fetchData)) {

        $Opciones = $row['Opciones'];
        $Listado = json_decode($Opciones, true);
        foreach ($Listado as $key => $value) {
            //si el searchTerm tiene letras similares a las opciones
            if(!isset($_POST['searchTerm'])){
                $data[] = array("id" => $value, "text" => $value);
            }else{
                if (strpos($value, $_POST['searchTerm']) !== false OR $_POST['searchTerm'] == "") {
                    $data[] = array("id" => $value, "text" => $value);
                }
            }
            
        }
    }
    echo json_encode($data);
}

if ($_POST["Tipo"] == "GlobalSelect_CrearDatos") {

    $Nombre_Tabla = "Global_Select";

    $NombreCreado = preg_replace('/[^a-zA-Z0-9_ -áéíóúÁÉÍÓÚñÑ]/s', '', $_POST["Nueva_Opcion_Select_Global"]);
    //$category_name = $_POST["category_name"];
    $TablaArreglo = $_POST["Tabla"];
    $usuario_id = $_POST["Usuario"];
    $tabla = mysqli_query($conn3, "SHOW TABLES LIKE '{$Nombre_Tabla}'");
    $nrowtabla = mysqli_num_rows($tabla);
    if ($nrowtabla == 0) {

        $query = "CREATE TABLE `{$Nombre_Tabla}` (
        `id` int(11) NOT NULL,
        `usuario_id` int(11) NOT NULL,
        `Fecha_Registro` date DEFAULT current_timestamp(),
        `Nombre` text DEFAULT '' COMMENT 'Este Nombre Debe Ser Unico',
        `Opciones` text DEFAULT '',
        `Creacion_Dinamica` text DEFAULT '',
        `Activo` varchar(5) DEFAULT '1'
        ) ENGINE=MyISAM DEFAULT CHARSET=latin1;";

        $creaciontabla = mysqli_query($conn3, $query);
        if (!$creaciontabla) {
            echo "<script language='Javascript'> alert('error en la creacion de la tabla');</script>";
        } else {
            mysqli_query($conn3, "ALTER TABLE `{$Nombre_Tabla}` ADD PRIMARY KEY (`id`);");
            mysqli_query($conn3, "ALTER TABLE `{$Nombre_Tabla}` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;");
        }
    }

    $Igual="0";

    $QuerySelect = mysqli_query($conn3, "SELECT * FROM {$Nombre_Tabla} WHERE Nombre = '{$TablaArreglo}' LIMIT 1");
    $nrowSelect = mysqli_num_rows($QuerySelect);
    while ($RowSelect = mysqli_fetch_array($QuerySelect)) {
        $Opciones = $RowSelect['Opciones'];
    }

    $Listado = json_decode($Opciones, true);
    foreach ($Listado as $key => $value) {
        if($value == $NombreCreado)
        {
            $Igual="1";
        }
    }

    if($Igual=="0")
    {
        if ($nrowSelect == 0) {
            $ArregloNombre[]= mysqli_real_escape_string($conn3,$NombreCreado);
            $ArregloNombreFinal = json_encode($ArregloNombre, JSON_UNESCAPED_UNICODE);
            $queryList = mysqli_query($conn3, "INSERT INTO {$Nombre_Tabla} (usuario_id,Nombre,Opciones) VALUES ('$usuario_id', '{$TablaArreglo}','$ArregloNombreFinal');");
        }

        $Listado[] = $NombreCreado;
        $Listado1 = json_encode($Listado, JSON_UNESCAPED_UNICODE);
        $queryList = mysqli_query($conn3, "UPDATE {$Nombre_Tabla} SET Opciones = '{$Listado1}' WHERE Nombre = '{$TablaArreglo}' limit 1");
        if ($queryList != true) {
            echo "Error";
        }
        else{
            echo $NombreCreado;
        }
    }
    else {
        echo "Creado";
    }

}
?>