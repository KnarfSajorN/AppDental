<?php
include 'funciones/conn3.php';
date_default_timezone_set('America/Bogota');

function reem_menu($texto1) 
{

//Rememplazamos caracteres especiales latinos minusculas
$find = array('á', 'é', 'í', 'ó', 'ú', 'ñ', '\"', '€', 'ü');
$repl = array('&aacute;', '&eacute;', '&iacute;', '&oacute;', '&uacute;', '&ntilde;', '&quot;', '&euro;', '&uuml;');
$texto1 = str_replace ($find, $repl, $texto1);


//Rememplazamos caracteres especiales latinos mayusculas
$find = array('Á', 'É', 'Í', 'Ó', 'Ú', 'Ñ', 'Ü', 'ç', 'Ç');
$repl = array('&Aacute;', '&Eacute;', '&Iacute;', '&Oacute;', '&Uacute;', '&Ntilde;', '&Uuml;', '&ccedil;', '&Ccedil;');
$texto1 = str_replace ($find, $repl, $texto1);

return $texto1;

}

function reem_menu_reves($texto1) 
{

//Rememplazamos caracteres especiales latinos minusculas
$repl = array('á', 'é', 'í', 'ó', 'ú', 'ñ', '\"', '€', 'ü');
$find = array('&aacute;', '&eacute;', '&iacute;', '&oacute;', '&uacute;', '&ntilde;', '&quot;', '&euro;', '&uuml;');
$texto1 = str_replace ($find, $repl, $texto1);


//Rememplazamos caracteres especiales latinos mayusculas
$repl = array('Á', 'É', 'Í', 'Ó', 'Ú', 'Ñ', 'Ü', 'ç', 'Ç');
$find = array('&Aacute;', '&Eacute;', '&Iacute;', '&Oacute;', '&Uacute;', '&Ntilde;', '&Uuml;', '&ccedil;', '&Ccedil;');
$texto1 = str_replace ($find, $repl, $texto1);

return $texto1;

}

function quitarTildes($cadena) {
    $tildes = array(
        'á' => 'a',
        'é' => 'e',
        'í' => 'i',
        'ó' => 'o',
        'ú' => 'u',
        'Á' => 'A',
        'É' => 'E',
        'Í' => 'I',
        'Ó' => 'O',
        'Ú' => 'U',
        "\r\n"=>'',
        "\r"=>'',
        "\n"=>''
    );
    
    $cadenaSinTildes = strtr($cadena, $tildes);
    
    return $cadenaSinTildes;
} 

if (isset($_POST["Tipo_Consulta"]) && $_POST["Tipo_Consulta"]=="Cargar Modulos Menu") {

       

    
    $QueryMenu = mysqli_query($conn3, "SELECT * FROM  main_menu WHERE estado = 1 AND idPrincipal = 0 order by id ASC");
    while ($RowMenu = mysqli_fetch_array($QueryMenu)) {
        $id = $RowMenu['id'];
        $ArregloPrincipal[$id] = $RowMenu['id'];

    }

    $contador=0;
    foreach ($ArregloPrincipal as $key => $value) {
        
        $QueryMenu = mysqli_query($conn3, "SELECT * FROM  main_menu WHERE estado = 1 AND id = $value order by id ASC");
        while ($RowMenu = mysqli_fetch_array($QueryMenu)) {
            $contador++;
            $id = $RowMenu['id'];
            $ArregloMenu[$contador]["id"] = $RowMenu['id'];

            $Nom = quitarTildes($RowMenu['nombre']);
            $ArregloMenu[$contador]["Nombre"] = reem_menu_reves(utf8_encode($Nom));
            $ArregloMenu[$contador]["Url"] = $RowMenu['pantalla'];
            $ArregloMenu[$contador]["idPrincipal"] = $RowMenu['idPrincipal'];
            $ArregloMenu[$contador]["Icono"] = $RowMenu['icon'];
            $ArregloMenu[$contador]["Color"] = $RowMenu['color'];//Actualizacion de color
            //filtro Portada
            if($RowMenu['idPrincipal']=="0" && $RowMenu['pantalla']=="#"){
                $ArregloMenu[$contador]["NoAplicaPortada"] = "1";
            }
            //filtro Portada
            $ArregloMenu[$contador]["Editable"] = $RowMenu['editable'];//activar/desactivar el campo
        }
        
        $QueryMenu = mysqli_query($conn3, "SELECT * FROM  main_menu WHERE estado = 1 AND idPrincipal = $value order by id ASC");
        $nrowsSubmenus = mysqli_num_rows($QueryMenu);
        $ArregloMenu[$contador]["Submenus"] = $nrowsSubmenus;
        while ($RowMenu = mysqli_fetch_array($QueryMenu)) {
            $contador++;
            $id = $RowMenu['id'];
            $ArregloMenu[$contador]["id"] = $RowMenu['id'];

            $Nom = quitarTildes($RowMenu['nombre']);
            $ArregloMenu[$contador]["Nombre"] = reem_menu_reves(utf8_encode($Nom));
            $ArregloMenu[$contador]["Url"] = $RowMenu['pantalla'];
            $ArregloMenu[$contador]["idPrincipal"] = $RowMenu['idPrincipal'];
            $ArregloMenu[$contador]["Icono"] = $RowMenu['icon'];
            $ArregloMenu[$contador]["Color"] = $RowMenu['color'];//Actualizacion de color

            $ArregloMenu[$contador]["Editable"] = $RowMenu['editable'];//activar/desactivar el campo
        }

    }

    echo json_encode($ArregloMenu,true);
    


}
else if (isset($_POST["Tipo_Consulta"]) && $_POST["Tipo_Consulta"]=="Agregar Grupo") {
    
    $tabla = mysqli_query($conn3, "SHOW TABLES LIKE 'Grupos_Menu'");
    $nrowtabla = mysqli_num_rows($tabla);
    if ($nrowtabla == 0) {
        $query = "CREATE TABLE `Grupos_Menu` ( 
            `id` INT(11) NOT NULL AUTO_INCREMENT , 
            `Fecha` DATETIME NULL DEFAULT CURRENT_TIMESTAMP ,
            `Fecha_Actualizacion` DATETIME NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha y hora de cada vez que se actualiza el registro' ,
            `usuario_id` INT(11) NULL DEFAULT '0' ,
            `Nombre_Grupo` TEXT NULL DEFAULT '' ,
            `Descripcion_Grupo` TEXT NULL DEFAULT '' ,
            `Arreglo` TEXT NULL DEFAULT '' ,
            `Activo` TEXT NULL DEFAULT '1' COMMENT '1-> Activo 0-> Inactivo',  
            PRIMARY KEY (`id`)) ENGINE = MyISAM;";

        $creaciontabla = mysqli_query($conn3, $query);
        if (!$creaciontabla) {
            echo "error en la creacion de la tabla";
            exit();
        }
    }

    $usuario_id = $_POST["usuario_id"];
    $Fecha = date("Y-m-d H:i:s");

    $Nombre_Grupo = reem_menu($_POST["Nombre_Grupo"]);
    $Descripcion_Grupo = reem_menu($_POST["Descripcion_Grupo"]);

    //$Arreglo = json_encode($_POST["Arreglo"]);
    //echo "<pre>";
    //print_r($_POST["Arreglo"]);
    //echo "</pre>";

    //echo "<br>";
    
    //echo $Arreglo;

    $ArregloGuardar = array();
    $Contador=0;
    foreach ($_POST["Arreglo"]["Nombre"] as $key => $value) {
        $Contador++;
        if($_POST["Arreglo"]['Activo'][$key]==""){
            $Activo = 0;
        }else{
            $Activo = 1;
        }

        $Nombre = reem_menu($_POST["Arreglo"]['Nombre'][$key]);

        $ArregloGuardar[$Contador] = array(
            'Nombre' => $Nombre,
            'Nombre_Original' => $_POST["Arreglo"]['Nombre_Original'][$key],
            'Activo' => $Activo,
            'Color' => $_POST["Arreglo"]['Color'][$key],
            'Icono' => $_POST["Arreglo"]['Icono'][$key],
            'Portada' => $_POST["Arreglo"]['Portada'][$key],
            'Orden'=> $Contador,
            'id'=>$key
        );
    }
    //echo "<hr>";
    $JsonGrupo = json_encode($ArregloGuardar);
    //echo $JsonGrupo;

    
    $query = "INSERT INTO Grupos_Menu (Fecha,Fecha_Actualizacion,usuario_id,Arreglo,Nombre_Grupo,Descripcion_Grupo) 
        VALUES ('$Fecha','$Fecha','$usuario_id','$JsonGrupo','$Nombre_Grupo','$Descripcion_Grupo')";
    $Arreglo["Tipo"]="Insert";

    $resultado = mysqli_query($conn3, $query);

    if (!$resultado) {
        $Arreglo["Estado"]="Fail";
        $Arreglo["Mensaje"]=mysqli_error($conn3);
    }else{
        $Arreglo["Estado"]="Success";
        
    }

    echo json_encode($Arreglo,true);
    
}


// si se edita lo que esta dentro de este if editarlo tambien en el archivo PP_CrearPlantilla.php
// si se edita lo que esta dentro de este if editarlo tambien en el archivo PP_CrearPlantilla.php
// si se edita lo que esta dentro de este if editarlo tambien en el archivo PP_CrearPlantilla.php
else if (isset($_POST["Tipo_Consulta"]) && $_POST["Tipo_Consulta"]=="Editar Modulos Menu") {

    $id = $_POST["id"];
    $QueryMenu = mysqli_query($conn3, "SELECT * FROM  Grupos_Menu WHERE Activo = 1 AND id = $id");
    while ($RowMenu = mysqli_fetch_array($QueryMenu)) {
        $ArregloMenuGuardado = $RowMenu['Arreglo'];

    }
    $ArregloMenuG = json_decode($ArregloMenuGuardado,true);



    /////////////////////////////// Actualizacion ///////////////////////////////////////////////////
    /////////////////////////////// Actualizacion ///////////////////////////////////////////////////
    /////////////////////////////// Actualizacion ///////////////////////////////////////////////////
    $contador=0;
    $QueryMenu = mysqli_query($conn3, "SELECT * FROM  main_menu WHERE estado = 1 AND idPrincipal = 0 order by id ASC");
    while ($RowMenu = mysqli_fetch_array($QueryMenu)) {
            $contador++;
            $id = $RowMenu['id'];
            $ArregloPrincipal[$contador]['id'] = $RowMenu['id'];
            $ArregloPrincipal[$contador]["Nombre_Original"] = $RowMenu['nombre'];
            //$ArregloMenu[$contador]["Url"] = $RowMenu['pantalla'];
            $ArregloPrincipal[$contador]["idPrincipal"] = $RowMenu['idPrincipal'];
            $ArregloPrincipal[$contador]["Icono"] = $RowMenu['icon'];

            ////////////? Campos Importantes //////////////////////////////////
            $ArregloPrincipal[$contador]["Activo"] = "0";
            $ArregloPrincipal[$contador]["Orden"] = "0";
            $ArregloPrincipal[$contador]["Nombre"] = $RowMenu['nombre'];
            $ArregloPrincipal[$contador]["Color"] = $RowMenu['color'];
            $ArregloPrincipal[$contador]["editable"] = $RowMenu['editable'];//activar/desactivar el campo
            ////////////? Campos Importantes //////////////////////////////////

            //filtro Portada
            if($RowMenu['idPrincipal']=="0" && $RowMenu['pantalla']=="#"){
                $ArregloPrincipal[$contador]["NoAplicaPortada"] = "1";
            }
            //filtro Portada

    }

    
    $AumentoFinal=0;
    $OrdenFinal=0;
    foreach ($ArregloPrincipal as $key => $value) {
        $Registro=0;
        foreach ($ArregloMenuG as $key1 => $value1) {
            if($value['id']==$value1['id']){

                $ArregloNuevoOrdenamiento[$key]['Orden'] = $value1['Orden']+$AumentoFinal;

                $ArregloNuevoOrdenamiento[$key]['Nombre'] = ($value1['Nombre']);
                
                $ArregloNuevoOrdenamiento[$key]['Activo'] = $value1['Activo'];
                $ArregloNuevoOrdenamiento[$key]['Color'] = $value1['Color'];
                $ArregloNuevoOrdenamiento[$key]['Icono'] = $value1['Icono'];
                $ArregloNuevoOrdenamiento[$key]['Portada'] = $value1['Portada'];
                $ArregloNuevoOrdenamiento[$key]['id'] = $value1['id'];

                $ArregloNuevoOrdenamiento[$key]['Nombre_Original'] = $value['Nombre_Original'];

                $ArregloNuevoOrdenamiento[$key]['idPrincipal'] = $value['idPrincipal'];
                $ArregloNuevoOrdenamiento[$key]['NoAplicaPortada'] = $value['NoAplicaPortada'];
                $ArregloNuevoOrdenamiento[$key]["editable"] = $value['editable'];//activar/desactivar el campo
                
                $OrdenFinal = $value1['Orden']+$AumentoFinal;
                $Registro="1";
            }
            
        }

        if($Registro=="0"){
                
            $ArregloNoExistentes[] = $value['id'];
            
        }

    }
    $AumentoFinal=0;
    $OrdenFinal=0;
    $Registro=0;

    function ordenarArregloPorOrden($arreglo) {
        usort($arreglo, function($a, $b) {
            return $a['Orden'] - $b['Orden'];
        });
    
        return $arreglo;
    }
    
    // Llamada a la función para ordenar el arreglo
    $ArregloNuevoOrdenamiento = ordenarArregloPorOrden($ArregloNuevoOrdenamiento);


    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    $contador=0;
    $QueryMenu = mysqli_query($conn3, "SELECT * FROM  main_menu WHERE estado = 1 AND idPrincipal != '0' order by id ASC");
    while ($RowMenu = mysqli_fetch_array($QueryMenu)) {
            $contador++;
            $id = $RowMenu['id'];
            $ArregloPrincipalSubMenu[$contador]['id'] = $RowMenu['id'];
            $ArregloPrincipalSubMenu[$contador]["Nombre_Original"] = $RowMenu['nombre'];
            //$ArregloMenu[$contador]["Url"] = $RowMenu['pantalla'];
            $ArregloPrincipalSubMenu[$contador]["idPrincipal"] = $RowMenu['idPrincipal'];
            $ArregloPrincipalSubMenu[$contador]["Icono"] = $RowMenu['icon'];

            ////////////? Campos Importantes //////////////////////////////////
            $ArregloPrincipalSubMenu[$contador]["Activo"] = "0";
            $ArregloPrincipalSubMenu[$contador]["Orden"] = "0";
            $ArregloPrincipalSubMenu[$contador]["Nombre"] = $RowMenu['nombre'];
            $ArregloPrincipalSubMenu[$contador]["Color"] = $RowMenu['color'];
            $ArregloPrincipalSubMenu[$contador]["editable"] = $RowMenu['editable'];//activar/desactivar el campo
            ////////////? Campos Importantes //////////////////////////////////

            //filtro Portada
            //if($RowMenu['idPrincipal']=="0" && $RowMenu['pantalla']=="#"){
            //    $ArregloPrincipalSubMenu[$contador]["NoAplicaPortada"] = "1";
            //}
            //filtro Portada

    }

    
    //$OrdenAumentoReg="0";
    foreach ($ArregloPrincipalSubMenu as $key => $value) {
        $Registro="0";
        foreach ($ArregloMenuG as $key1 => $value1) {
            if($value['id']==$value1['id']){

                $ArregloNuevoOrdenamientoSubMenu[$key]['Orden'] = $value1['Orden'];

                $ArregloNuevoOrdenamientoSubMenu[$key]['Nombre'] = $value1['Nombre'];
                $ArregloNuevoOrdenamientoSubMenu[$key]['Activo'] = $value1['Activo'];
                $ArregloNuevoOrdenamientoSubMenu[$key]['Color'] = $value1['Color'];
                $ArregloNuevoOrdenamientoSubMenu[$key]['Icono'] = $value1['Icono'];
                $ArregloNuevoOrdenamientoSubMenu[$key]['Portada'] = $value1['Portada'];
                $ArregloNuevoOrdenamientoSubMenu[$key]['id'] = $value1['id'];

                $ArregloNuevoOrdenamientoSubMenu[$key]['Nombre_Original'] = $value['Nombre_Original'];

                $ArregloNuevoOrdenamientoSubMenu[$key]['idPrincipal'] = $value['idPrincipal'];

                $ArregloNuevoOrdenamientoSubMenu[$key]["editable"] = $value['editable'];//activar/desactivar el campo

                foreach ($ArregloNuevoOrdenamiento as $key2 => $value2) {
                    if($value2['id']==$value['idPrincipal']){
                        $ArregloNuevoOrdenamiento[$key2]['SubMenu'][] = $ArregloNuevoOrdenamientoSubMenu[$key];
                    }
                }
                $Registro="1";
            }
            
        }

        if($Registro=="0"){
                
            $ArregloNuevoOrdenamientoSubMenu[$key]['Orden'] = "Ninguna";
            //$OrdenAumentoReg=$OrdenAumentoReg+1;
            $ArregloNuevoOrdenamientoSubMenu[$key]['OrdenAumento'] = "+";

            $ArregloNuevoOrdenamientoSubMenu[$key]['Nombre'] = $value['Nombre'];
            $ArregloNuevoOrdenamientoSubMenu[$key]['Activo'] = $value['Activo'];
            $ArregloNuevoOrdenamientoSubMenu[$key]['Color'] = $value['Color'];
            $ArregloNuevoOrdenamientoSubMenu[$key]['Icono'] = $value['Icono'];
            $ArregloNuevoOrdenamientoSubMenu[$key]['Portada'] = $value['Portada'];
            $ArregloNuevoOrdenamientoSubMenu[$key]['id'] = $value['id'];

            $ArregloNuevoOrdenamientoSubMenu[$key]['Nombre_Original'] = $value['Nombre_Original'];

            $ArregloNuevoOrdenamientoSubMenu[$key]['idPrincipal'] = $value['idPrincipal'];
            $ArregloNuevoOrdenamientoSubMenu[$key]['CreadoEditar'] = "1";

            $ArregloNuevoOrdenamientoSubMenu[$key]["editable"] = $value['editable'];//activar/desactivar el campo
            

            foreach ($ArregloNuevoOrdenamiento as $key2 => $value2) {
                if($value2['id']==$value['idPrincipal']){
                    $ArregloNuevoOrdenamiento[$key2]['SubMenu'][] = $ArregloNuevoOrdenamientoSubMenu[$key];
                }
            }

        }
    }




    $Contador=0;
    $UltimaOrden=0;
    $Aumento=0;
    foreach ($ArregloNuevoOrdenamiento as $key => $value) {
        $Contador++;
                

                $ArregloFinal[$Contador]['Orden'] = $value['Orden']+$Aumento;
                $ArregloFinal[$Contador]['Aumento'] = $Aumento;
                $ArregloFinal[$Contador]['ordenI'] = $value['Orden'];

                $ArregloFinal[$Contador]['Nombre'] = reem_menu_reves(quitarTildes(utf8_encode($value['Nombre'])));
                $ArregloFinal[$Contador]['Activo'] = $value['Activo'];
                $ArregloFinal[$Contador]['Color'] = $value['Color'];
                $ArregloFinal[$Contador]['Icono'] = $value['Icono'];
                $ArregloFinal[$Contador]['Portada'] = $value['Portada'];
                $ArregloFinal[$Contador]['NoAplicaPortada'] = $value['NoAplicaPortada'];
                $ArregloFinal[$Contador]['id'] = $value['id'];

                $ArregloFinal[$Contador]['idPrincipal'] = $value['idPrincipal'];
                $ArregloFinal[$Contador]['Nombre_Original'] = reem_menu_reves(quitarTildes(utf8_encode($value['Nombre_Original'])));

                $ArregloFinal[$Contador]['editable'] = $value['editable'];

                $OrdenFinal=$value['Orden']+$Aumento;

                $Submenus=0;
                foreach ($value["SubMenu"] as $key1 => $value1) {
                    $Submenus++;
                    $Contador++;
                    if($value1['Orden']!="Ninguna"){

                        $ArregloFinal[$Contador]['Orden'] = $value1['Orden']+$Aumento;
                        $ArregloFinal[$Contador]['Aumento'] = $Aumento;
                        $ArregloFinal[$Contador]['ordenI'] = $value1['Orden'];
                        $ArregloFinal[$Contador]['Nombre'] = reem_menu_reves(quitarTildes(utf8_encode($value1['Nombre'])));
                        $ArregloFinal[$Contador]['Activo'] = $value1['Activo'];
                        $ArregloFinal[$Contador]['Color'] = $value1['Color'];
                        $ArregloFinal[$Contador]['Icono'] = $value1['Icono'];
                        $ArregloFinal[$Contador]['Portada'] = $value1['Portada'];
                        $ArregloFinal[$Contador]['id'] = $value1['id'];

                        $ArregloFinal[$Contador]['Nombre_Original'] = reem_menu_reves(quitarTildes(utf8_encode($value1['Nombre_Original'])));
                        $ArregloFinal[$Contador]['idPrincipal'] = $value1['idPrincipal'];

                        $ArregloFinal[$Contador]['editable'] = $value1['editable'];

                        //$UltimaOrden = $value1['Orden'];
                        $UltimaOrden =  $ArregloFinal[$Contador]['Orden'];

                        $OrdenFinal=$value1['Orden']+$Aumento;

                    }else{
                    
                        $Aumento++;
                        $ArregloFinal[$Contador]['Orden'] = $UltimaOrden+1;
                        $ArregloFinal[$Contador]['Aumento'] = $Aumento;
                        $ArregloFinal[$Contador]['ordenI'] = $value1['Orden'];
                        $ArregloFinal[$Contador]['Nombre'] = reem_menu_reves(quitarTildes(utf8_encode($value1['Nombre'])));
                        $ArregloFinal[$Contador]['Activo'] = $value1['Activo'];
                        $ArregloFinal[$Contador]['Color'] = $value1['Color'];
                        $ArregloFinal[$Contador]['Icono'] = $value1['Icono'];
                        $ArregloFinal[$Contador]['Portada'] = $value1['Portada'];
                        $ArregloFinal[$Contador]['id'] = $value1['id'];

                        $ArregloFinal[$Contador]['Nombre_Original'] = reem_menu_reves(quitarTildes(utf8_encode($value1['Nombre_Original'])));
                        $ArregloFinal[$Contador]['idPrincipal'] = $value1['idPrincipal'];

                        $ArregloFinal[$Contador]['editable'] = $value1['editable'];

                        $UltimaOrden = $UltimaOrden+1;
                        
                        $OrdenFinal=$UltimaOrden+1;
                    }
                    

                }

                $ArregloFinal[$Contador]['Submenus'] = $Submenus;

                
    }

    $contador_final=0;
    foreach ($ArregloNoExistentes as $key => $value) {
        

        $QueryMenu = mysqli_query($conn3, "SELECT * FROM  main_menu WHERE estado = 1 AND id = '$value' order by id ASC");
        while ($RowMenu = mysqli_fetch_array($QueryMenu)) {
                $contador_final++;
                $Contador++;
                $id = $RowMenu['id'];
                /*
                $ArregloPrincipal[$contador]['id'] = $RowMenu['id'];
                $ArregloPrincipal[$contador]["Nombre_Original"] = $RowMenu['nombre'];
                //$ArregloMenu[$contador]["Url"] = $RowMenu['pantalla'];
                $ArregloPrincipal[$contador]["idPrincipal"] = $RowMenu['idPrincipal'];
                $ArregloPrincipal[$contador]["Icono"] = $RowMenu['icon'];

                ////////////? Campos Importantes //////////////////////////////////
                $ArregloPrincipal[$contador]["Activo"] = "0";
                $ArregloPrincipal[$contador]["Orden"] = "0";
                $ArregloPrincipal[$contador]["Nombre"] = $RowMenu['nombre'];
                $ArregloPrincipal[$contador]["Color"] = "#32373d";
                ////////////? Campos Importantes //////////////////////////////////
                */
                //filtro Portada
                $Portada="";
                if($RowMenu['idPrincipal']=="0" && $RowMenu['pantalla']=="#"){
                    $Portada = "1";
                }
                //filtro Portada

                $ArregloFinal[$Contador]['Orden'] = $OrdenFinal+$contador_final;

                $ArregloFinal[$Contador]['Nombre'] = reem_menu_reves(quitarTildes(utf8_encode($RowMenu['nombre'])));
                $ArregloFinal[$Contador]['Activo'] = "0";
                $ArregloFinal[$Contador]['Color'] = $RowMenu['color'];
                $ArregloFinal[$Contador]['Icono'] = $RowMenu['icon'];
                $ArregloFinal[$Contador]['Portada'] = "0";
                $ArregloFinal[$Contador]['NoAplicaPortada'] = $Portada;
                $ArregloFinal[$Contador]['id'] = $RowMenu['id'];

                $ArregloFinal[$Contador]['idPrincipal'] = $RowMenu['idPrincipal'];
                $ArregloFinal[$Contador]['Nombre_Original'] = reem_menu_reves(quitarTildes(utf8_encode($RowMenu['nombre'])));

                $ArregloFinal[$Contador]['editable'] = $RowMenu['editable'];

                $idPrincipal = $RowMenu['id'];
        }

        $QueryMenu = mysqli_query($conn3, "SELECT * FROM  main_menu WHERE estado = 1 AND idPrincipal = '$idPrincipal' order by id ASC");
        $nuwrow = mysqli_num_rows($QueryMenu);
        if($nuwrow>0){
            $ArregloFinal[$Contador]['Submenus'] = $nuwrow;
        }else{
            $ArregloFinal[$Contador]['Submenus'] = 0;
        }
        while ($RowMenu = mysqli_fetch_array($QueryMenu)) {
                $contador_final++;
                $Contador++;
                $id = $RowMenu['id'];
                /*
                $ArregloPrincipal[$contador]['id'] = $RowMenu['id'];
                $ArregloPrincipal[$contador]["Nombre_Original"] = $RowMenu['nombre'];
                //$ArregloMenu[$contador]["Url"] = $RowMenu['pantalla'];
                $ArregloPrincipal[$contador]["idPrincipal"] = $RowMenu['idPrincipal'];
                $ArregloPrincipal[$contador]["Icono"] = $RowMenu['icon'];

                ////////////? Campos Importantes //////////////////////////////////
                $ArregloPrincipal[$contador]["Activo"] = "0";
                $ArregloPrincipal[$contador]["Orden"] = "0";
                $ArregloPrincipal[$contador]["Nombre"] = $RowMenu['nombre'];
                $ArregloPrincipal[$contador]["Color"] = "#32373d";
                ////////////? Campos Importantes //////////////////////////////////
                */
                //filtro Portada
                $Portada="";
                if($RowMenu['idPrincipal']=="0" && $RowMenu['pantalla']=="#"){
                    $Portada = "1";
                }
                //filtro Portada

                $ArregloFinal[$Contador]['Orden'] = $OrdenFinal+$contador_final;

                $ArregloFinal[$Contador]['Nombre'] = reem_menu_reves(quitarTildes(utf8_encode($RowMenu['nombre'])));
                $ArregloFinal[$Contador]['Activo'] = "0";
                $ArregloFinal[$Contador]['Color'] = $RowMenu['color'];
                $ArregloFinal[$Contador]['Icono'] = $RowMenu['icon'];
                $ArregloFinal[$Contador]['Portada'] = $Portada;
                $ArregloFinal[$Contador]['id'] = $RowMenu['id'];

                $ArregloFinal[$Contador]['idPrincipal'] = $RowMenu['idPrincipal'];
                $ArregloFinal[$Contador]['Nombre_Original'] = reem_menu_reves(quitarTildes(utf8_encode($RowMenu['nombre'])));

                $ArregloFinal[$Contador]['editable'] = $RowMenu['editable'];
                
        }    


    }
    /*
    //funciona maso
    foreach ($ArregloNuevoOrdenamiento as $key => $value) {
        $idPrincipal = $value['id'];

        $contador=0;
        $ArregloSubPrincipal="";
        $QueryMenu = mysqli_query($conn3, "SELECT * FROM  main_menu WHERE estado = 1 AND idPrincipal = '$idPrincipal' order by id ASC");
        while ($RowMenu = mysqli_fetch_array($QueryMenu)) {
                $contador++;
                $id = $RowMenu['id'];
                $ArregloSubPrincipal[$contador]['id'] = $RowMenu['id'];
                $ArregloSubPrincipal[$contador]["Nombre_Original"] = reem_menu_reves(quitarTildes(utf8_encode($RowMenu['nombre'])));
                //$ArregloMenu[$contador]["Url"] = $RowMenu['pantalla'];
                $ArregloSubPrincipal[$contador]["idPrincipal"] = $RowMenu['idPrincipal'];
                $ArregloSubPrincipal[$contador]["Icono"] = $RowMenu['icon'];

                ////////////? Campos Importantes //////////////////////////////////
                $ArregloSubPrincipal[$contador]["Activo"] = "0";
                $ArregloSubPrincipal[$contador]["Orden"] = "0";
                $ArregloSubPrincipal[$contador]["Nombre"] = reem_menu_reves(quitarTildes(utf8_encode($RowMenu['nombre'])));
                $ArregloSubPrincipal[$contador]["Color"] = "#32373d";
                ////////////? Campos Importantes //////////////////////////////////

                //filtro Portada
                if($RowMenu['idPrincipal']=="0" && $RowMenu['pantalla']=="#"){
                    $ArregloSubPrincipal[$contador]["NoAplicaPortada"] = "1";
                }
                //filtro Portada

        }

        foreach ($ArregloMenuG as $key => $value) {
            if($value['id']==$idPrincipal){
                $contador=0;
                $ArregloNuevoOrdenamientoSubMenu="";
                foreach ($ArregloSubPrincipal as $key1 => $value1) {
                    if($value1['idPrincipal']==$value['id']){
                        $contador++;
                        $ArregloNuevoOrdenamientoSubMenu[$contador]['Orden'] = $value1['Orden'];
                        $ArregloNuevoOrdenamientoSubMenu[$contador]['Nombre'] = reem_menu_reves($value1['Nombre']);
                        $ArregloNuevoOrdenamientoSubMenu[$contador]['Activo'] = $value1['Activo'];
                        $ArregloNuevoOrdenamientoSubMenu[$contador]['Color'] = $value1['Color'];
                        $ArregloNuevoOrdenamientoSubMenu[$contador]['Icono'] = $value1['Icono'];
                        $ArregloNuevoOrdenamientoSubMenu[$contador]['Portada'] = $value1['Portada'];
                        $ArregloNuevoOrdenamientoSubMenu[$contador]['id'] = $value1['id'];

                        $ArregloNuevoOrdenamientoSubMenu[$contador]['idPrincipal'] = $value['idPrincipal'];

                    }else{
                        $ArregloNoExisteSub[] = $value['id'];
                    }
                }

                foreach ($ArregloNuevoOrdenamiento as $key => $value) {
                    if($value['id']==$idPrincipal){
                        $ArregloNuevoOrdenamiento[$key]['Submenu'] = $ArregloNuevoOrdenamientoSubMenu;
                    }
                }
            }

        }
        //funciona maso
        */
        /*
        $contador=0;
        foreach ($ArregloSubPrincipal as $key => $value) {
            foreach ($ArregloMenuG as $key1 => $value1) {
                if($value['idPrincipal']==$value1['id']){
                    $contador++;
                    $ArregloNuevoOrdenamientoSubMenu[$key]['Orden'] = $value1['Orden'];
                    $ArregloNuevoOrdenamientoSubMenu[$key]['Nombre'] = reem_menu_reves($value1['Nombre']);
                    $ArregloNuevoOrdenamientoSubMenu[$key]['Activo'] = $value1['Activo'];
                    $ArregloNuevoOrdenamientoSubMenu[$key]['Color'] = $value1['Color'];
                    $ArregloNuevoOrdenamientoSubMenu[$key]['Icono'] = $value1['Icono'];
                    $ArregloNuevoOrdenamientoSubMenu[$key]['Portada'] = $value1['Portada'];
                    $ArregloNuevoOrdenamientoSubMenu[$key]['id'] = $value1['id'];

                    $ArregloNuevoOrdenamientoSubMenu[$key]['idPrincipal'] = $value['idPrincipal'];
                }
                else{
                    $ArregloNoExiste[] = $value['id'];
                }
            }
        }

        $ArregloNuevoOrdenamientoSubMenu = ordenarArregloPorOrden($ArregloNuevoOrdenamientoSubMenu);

        foreach ($ArregloNuevoOrdenamiento as $key => $value) {
            if($value['id']==$idPrincipal){
                $ArregloNuevoOrdenamiento[$key]['SubMenu'] = $ArregloNuevoOrdenamientoSubMenu;
            }
        }
        */

        /*
        foreach ($ArregloSubPrincipal as $key => $value) {
            foreach ($ArregloMenuG as $key1 => $value1) {
                if($value['idPrincipal']==$value1['id']){

                    foreach ($ArregloNuevoOrdenamiento as $key2 => $value2) {
                        if($value2['id']==$value['idPrincipal']){
                            $ArregloNuevoOrdenamiento[$key]['SubMenu'][]['Orden'] = $value1['Orden'];
                            $ArregloNuevoOrdenamiento[$key]['SubMenu'][]['Nombre'] = reem_menu_reves($value1['Nombre']);
                            $ArregloNuevoOrdenamiento[$key]['SubMenu'][]['Activo'] = $value1['Activo'];
                            $ArregloNuevoOrdenamiento[$key]['SubMenu'][]['Color'] = $value1['Color'];
                            $ArregloNuevoOrdenamiento[$key]['SubMenu'][]['Icono'] = $value1['Icono'];
                            $ArregloNuevoOrdenamiento[$key]['SubMenu'][]['Portada'] = $value1['Portada'];
                            $ArregloNuevoOrdenamiento[$key]['SubMenu'][]['id'] = $value1['id'];
                        }
                        
                    }
                
                }
                else{
                    $ArregloNoExiste[] = $value['id'];
                }
            }
        }
        

    }
    */
    /*
    $QueryMenuInicial = mysqli_query($conn3, "SELECT * FROM  main_menu WHERE estado = 1 order by id ASC");
    while ($RowMenuInicial = mysqli_fetch_array($QueryMenuInicial)) {
        $id = $RowMenuInicial['id'];
        $ArregloMenuInicial[$id]["id"] = $RowMenuInicial['id'];

        $ArregloMenuInicial[$id]["Nombre"] = $RowMenuInicial['nombre'];
        $ArregloMenuInicial[$id]["Url"] = $RowMenuInicial['pantalla'];
        $ArregloMenuInicial[$id]["idPrincipal"] = $RowMenuInicial['idPrincipal'];
        $ArregloMenuInicial[$id]["Icono"] = $RowMenuInicial['icon'];

    }

    //echo "<pre>";
    //print_r($ArregloMenuInicial);
    //echo "</pre>";

    foreach ($ArregloMenuInicial as $key => $value) {
        //echo $key."<br>";
        
        if(!is_array($ArregloMenu[$key])){
            $ArregloMenu[$key] = array(
                'Nombre' => $ArregloMenuInicial[$key]['Nombre'],
                'Nombre_Original' => $ArregloMenuInicial[$key]['Nombre'],
                'Activo' => "0",
                'Color' => "#32373d",
                'Icono' => $ArregloMenuInicial[$key]['Icono'],
                'id'=>$key
            );
            //echo "entro";
        }
        
    }
    */

    /*
    $QueryMenu = mysqli_query($conn3, "SELECT * FROM  main_menu WHERE estado = 1 AND idPrincipal = 0 order by id ASC");
    while ($RowMenu = mysqli_fetch_array($QueryMenu)) {
        $id = $RowMenu['id'];
        $ArregloPrincipal[$id] = $RowMenu['id'];

    }


    $contador=0;
    $OrdenUltima=0;
    $OrdenAumento=0;
    foreach ($ArregloPrincipal as $key => $value) {
        
        $QueryMenu = mysqli_query($conn3, "SELECT * FROM  main_menu WHERE estado = 1 AND id = $value  order by id ASC");
        while ($RowMenu = mysqli_fetch_array($QueryMenu)) {
            $contador++;
            $id = $RowMenu['id'];
            $ArregloMenu[$contador]["id"] = $RowMenu['id'];
            
            $ArregloMenu[$contador]["Nombre_Original"] = reem_menu_reves(quitarTildes(utf8_encode($RowMenu['nombre'])));
            //$ArregloMenu[$contador]["Url"] = $RowMenu['pantalla'];
            $ArregloMenu[$contador]["idPrincipal"] = $RowMenu['idPrincipal'];
            $ArregloMenu[$contador]["Icono"] = $RowMenu['icon'];

            ////////////? Campos Importantes //////////////////////////////////
            $ArregloMenu[$contador]["Activo"] = "0";
            $ArregloMenu[$contador]["Orden"] = "0";
            $ArregloMenu[$contador]["Nombre"] = reem_menu_reves(quitarTildes(utf8_encode($RowMenu['nombre'])));
            $ArregloMenu[$contador]["Color"] = "#32373d";
            ////////////? Campos Importantes //////////////////////////////////

            //filtro Portada
            if($RowMenu['idPrincipal']=="0" && $RowMenu['pantalla']=="#"){
                $ArregloMenu[$contador]["NoAplicaPortada"] = "1";
            }
            //filtro Portada
            
            $ExisteSubmenu="0";
            foreach ($ArregloMenuG as $key1 => $value1) {
                if ($value1["id"] == $RowMenu['id']) {
                    
                    $ArregloMenu[$contador]["Nombre"] = reem_menu_reves($value1['Nombre']);
                    $ArregloMenu[$contador]["Activo"] = $value1['Activo'];
                    $ArregloMenu[$contador]["Color"] = $value1['Color'];
                    $ArregloMenu[$contador]["Icono"] = $value1['Icono'];
                    $ArregloMenu[$contador]["Portada"] = $value1['Portada'];
                    $ArregloMenu[$contador]["id"] = $value1['id'];
                    $ArregloMenu[$contador]["Orden"] = $value1['Orden']+$OrdenAumento;

                    $ArregloMenu[$contador]["OrdenAntigua"] = $value1['Orden'];
                    $ArregloMenu[$contador]["Contador"] = $contador;

                    $OrdenUltima = $value1['Orden']+$OrdenAumento;
                    $ExisteSubmenu="1";
                }
            }

            if($ExisteSubmenu==0){
                $ArregloMenu[$contador]["Orden"] = $OrdenUltima+1;

                $OrdenUltima = $OrdenUltima+1;
                
                $ArregloMenu[$contador]["CreadoEditar"] = "Si";
                $OrdenAumento++;
            }

        }

        $QueryMenu = mysqli_query($conn3, "SELECT * FROM  main_menu WHERE estado = 1 AND idPrincipal = $value order by id ASC");
        $nrowsSubmenus = mysqli_num_rows($QueryMenu);
        $ArregloMenu[$contador]["Submenus"] = $nrowsSubmenus;

        while ($RowMenu = mysqli_fetch_array($QueryMenu)) {
            $contador++;
            $id = $RowMenu['id'];
            $ArregloMenu[$contador]["id"] = $RowMenu['id'];

            $ArregloMenu[$contador]["Nombre_Original"] = reem_menu_reves(quitarTildes(utf8_encode($RowMenu['nombre'])));
            //$ArregloMenu[$contador]["Url"] = $RowMenu['pantalla'];
            $ArregloMenu[$contador]["idPrincipal"] = $RowMenu['idPrincipal'];
            $ArregloMenu[$contador]["Icono"] = $RowMenu['icon'];

            ////////////? Campos Importantes //////////////////////////////////
            $ArregloMenu[$contador]["Activo"] = "0";
            $ArregloMenu[$contador]["Orden"] = "0";
            $ArregloMenu[$contador]["Nombre"] = reem_menu_reves(quitarTildes(utf8_encode($RowMenu['nombre'])));
            $ArregloMenu[$contador]["Color"] = "#32373d";
            ////////////? Campos Importantes //////////////////////////////////

            $ExisteSubmenu="0";
            foreach ($ArregloMenuG as $key1 => $value1) {
                if ($value1["id"] == $RowMenu['id']) {
                    
                    $ArregloMenu[$contador]["Nombre"] = reem_menu_reves($value1['Nombre']);
                    $ArregloMenu[$contador]["Activo"] = $value1['Activo'];
                    $ArregloMenu[$contador]["Color"] = $value1['Color'];
                    $ArregloMenu[$contador]["Icono"] = $value1['Icono'];
                    $ArregloMenu[$contador]["Portada"] = $value1['Portada'];
                    $ArregloMenu[$contador]["id"] = $value1['id'];
                    $ArregloMenu[$contador]["Orden"] = $value1['Orden']+$OrdenAumento;
                    //$ArregloMenu[$contador]["OrdenAumento"] = $OrdenAumento;

                    $OrdenUltima = $value1['Orden']+$OrdenAumento;
                    $ExisteSubmenu="1";
                }
            }

            if($ExisteSubmenu==0){
                $ArregloMenu[$contador]["Orden"] = $OrdenUltima+1; // cuando es submenu no se agrega un +1 en el orden

                $OrdenUltima = $OrdenUltima+1;

                $ArregloMenu[$contador]["CreadoEditar"] = "Si";
                $OrdenAumento++;
                $ArregloMenu[$contador]["OrdenAumento"] = $OrdenAumento;
                
            }
            
        }

    }
    

    function ordenarArregloPorOrden($arreglo) {
        usort($arreglo, function($a, $b) {
            return $a['Orden'] - $b['Orden'];
        });
    
        return $arreglo;
    }
    
    // Llamada a la función para ordenar el arreglo
    $ArregloMenu = ordenarArregloPorOrden($ArregloMenu);
    */


    /*
    $contador=0;
    foreach ($ArregloPrincipal as $key => $value) {
        
        $QueryMenu = mysqli_query($conn3, "SELECT * FROM  main_menu WHERE estado = 1 AND id = $value  order by id ASC");
        while ($RowMenu = mysqli_fetch_array($QueryMenu)) {
            $contador++;
            $id = $RowMenu['id'];
            $ArregloMenu[$contador]["id"] = $RowMenu['id'];

            $ArregloMenu[$contador]["Nombre_Original"] = $RowMenu['nombre'];
            //$ArregloMenu[$contador]["Url"] = $RowMenu['pantalla'];
            $ArregloMenu[$contador]["idPrincipal"] = $RowMenu['idPrincipal'];
            //$ArregloMenu[$contador]["Icono"] = $RowMenu['icon'];

        }
        $QueryMenu = mysqli_query($conn3, "SELECT * FROM  main_menu WHERE estado = 1 AND idPrincipal = $value order by id ASC");
        $nrowsSubmenus = mysqli_num_rows($QueryMenu);

        $ArregloMenu[$contador]["Submenus"] = $nrowsSubmenus;

        while ($RowMenu = mysqli_fetch_array($QueryMenu)) {
            $contador++;
            $id = $RowMenu['id'];
            $ArregloMenu[$contador]["id"] = $RowMenu['id'];

            $ArregloMenu[$contador]["Nombre_Original"] = $RowMenu['nombre'];
            //$ArregloMenu[$contador]["Url"] = $RowMenu['pantalla'];
            $ArregloMenu[$contador]["idPrincipal"] = $RowMenu['idPrincipal'];
            //$ArregloMenu[$contador]["Icono"] = $RowMenu['icon'];


            $ArregloMenu[$contador]["Activo"] = "0";
            $ArregloMenu[$contador]["Orden"] = "0";
            $ArregloMenu[$contador]["Nombre"] = $RowMenu['nombre'];
        }

    }
    
    foreach ($ArregloMenu as $key => $value) {
        //echo $key."<br>";
        $id = $value['id'];

        foreach ($ArregloMenuG as $key1 => $value1) {
            if($value1['id']==$id){
                
                $ArregloMenu[$key]["Nombre"] = $value1['Nombre'];
                $ArregloMenu[$key]["Activo"] = $value1['Activo'];
                $ArregloMenu[$key]["Color"] = $value1['Color'];
                $ArregloMenu[$key]["Icono"] = $value1['Icono'];
                $ArregloMenu[$key]["id"] = $value1['id'];
                $ArregloMenu[$key]["Orden"] = $value1['Orden'];

            }
        }



    }
    */
    /////////////////////////////// Actualizacion ///////////////////////////////////////////////////
    /////////////////////////////// Actualizacion ///////////////////////////////////////////////////
    /////////////////////////////// Actualizacion ///////////////////////////////////////////////////


    //echo json_encode($ArregloMenu,true);
    
    //echo json_encode($ArregloNuevoOrdenamiento,true);
    //echo json_encode($ArregloNuevoOrdenamientoSubMenu,true);

    $ArregloFinal = ordenarArregloPorOrden($ArregloFinal);

    echo json_encode($ArregloFinal,true);

}

else if (isset($_POST["Tipo_Consulta"]) && $_POST["Tipo_Consulta"]=="Editar Modulos Menu Inputs") {

    $id = $_POST["id"];
    $QueryMenu = mysqli_query($conn3, "SELECT * FROM  Grupos_Menu WHERE Activo = 1 AND id = $id");
    while ($RowMenu = mysqli_fetch_array($QueryMenu)) {
        $Nombre_Grupo = $RowMenu['Nombre_Grupo'];
        $Descripcion_Grupo = $RowMenu['Descripcion_Grupo'];
    }
    $ArregloMenu["Nombre"] = reem_menu_reves($Nombre_Grupo);
    $ArregloMenu["Descripcion"] = reem_menu_reves($Descripcion_Grupo);
    echo json_encode($ArregloMenu,true);

}




// si se edita lo que esta dentro de este if editarlo tambien en el archivo PP_CrearPlantilla.php
// si se edita lo que esta dentro de este if editarlo tambien en el archivo PP_CrearPlantilla.php
// si se edita lo que esta dentro de este if editarlo tambien en el archivo PP_CrearPlantilla.php
else if (isset($_POST["Tipo_Consulta"]) && $_POST["Tipo_Consulta"]=="Actualizar Grupo") {

    $id = $_POST["Grupo_edicion_id"];
    $usuario_id = $_POST["usuario_id"];
    $Fecha = date("Y-m-d H:i:s");

    $Nombre_Grupo = reem_menu($_POST["Nombre_Grupo"]);
    $Descripcion_Grupo = reem_menu($_POST["Descripcion_Grupo"]);

    /*
    $ArregloGuardar = array();
    foreach ($_POST["Arreglo"]["Nombre"] as $key => $value) {
        
        if($_POST["Arreglo"]['Activo'][$key]==""){
            $Activo = 0;
        }else{
            $Activo = 1;
        }

        $ArregloGuardar[$key] = array(
            'Nombre' => $_POST["Arreglo"]['Nombre'][$key],
            'Nombre_Original' => $_POST["Arreglo"]['Nombre_Original'][$key],
            'Activo' => $Activo,
            'Color' => $_POST["Arreglo"]['Color'][$key],
            'Icono' => $_POST["Arreglo"]['Icono'][$key],
            'id'=>$key
        );
    }
    */
    ///////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////


    $ArregloGuardar = array();
    $Contador=0;
    foreach ($_POST["Arreglo"]["Nombre"] as $key => $value) {
        $Contador++;
        if($_POST["Arreglo"]['Activo'][$key]==""){
            $Activo = 0;
        }else{
            $Activo = 1;
        }

        $Nombre = reem_menu($_POST["Arreglo"]['Nombre'][$key]);
        $ArregloGuardar[$Contador] = array(
            'Nombre' => $Nombre,
            'Nombre_Original' => $_POST["Arreglo"]['Nombre_Original'][$key],
            'Activo' => $Activo,
            'Color' => $_POST["Arreglo"]['Color'][$key],
            'Icono' => $_POST["Arreglo"]['Icono'][$key],
            'Portada' => $_POST["Arreglo"]['Portada'][$key],
            'Orden'=> $Contador,
            'id'=>$key
        );
    }


    ///////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////

    $JsonGrupo = json_encode($ArregloGuardar);
    //echo $JsonGrupo;
    // el query de arriba volverlo UPDATE
    $query = "UPDATE Grupos_Menu SET Fecha_Actualizacion = '$Fecha',Arreglo = '$JsonGrupo',Nombre_Grupo = '$Nombre_Grupo',Descripcion_Grupo = '$Descripcion_Grupo' WHERE id = '$id' limit 1";
    $Arreglo["Tipo"]="Update";
    
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

else if (isset($_POST["Tipo_Consulta"]) && $_POST["Tipo_Consulta"]=="Eliminar Modulos Menu") {

    $id = $_POST["id"];

    // el query de arriba volverlo UPDATE
    $query = "UPDATE Grupos_Menu SET Activo = '0' WHERE id = '$id' limit 1";
    $Arreglo["Tipo"]="Update";

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