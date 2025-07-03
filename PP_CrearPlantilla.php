<?php
include 'header.php';
include 'menu.php';

$_POST = DatosIngresarMysqli($_POST);
$NombreTabla = "PP_Plantillas_Principales";


function reem_Nombre($texto1) 
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

if (isset($_POST['Guardar_Informacion_Pagina'])) {

    

    foreach ($_POST["Arreglo"] as $key => $value) {
        $Campos .= $key . ',';
        $Valores .= "'{$value}',";
    }
    $Campos = trim($Campos, ',');
    $Valores = trim($Valores, ',');

    $Nombre_Tabla = str_replace(" ", "_", $_POST["Arreglo"]["Nombre"]);
    $Nombre_Tabla = "P_" . $Nombre_Tabla;
    $Nombre_Tabla_Informacion = $Nombre_Tabla . "_Informacion";

    $usuario_id = $_POST['usuario_id'];
    $ruta = 'administrarConsenimientos';

    $tabla = mysqli_query($conn3, "SELECT * FROM  {$NombreTabla} WHERE Nombre_Tabla='$Nombre_Tabla' AND Nombre_Tabla_Informacion='$Nombre_Tabla_Informacion'");
    $nrowtabla = mysqli_num_rows($tabla);

    if ($nrowtabla == 0) {
        $queryList = mysqli_query($conn3, "INSERT INTO {$NombreTabla} (usuario_id,{$Campos},Nombre_Tabla,Nombre_Tabla_Informacion) VALUES ('$usuario_id', {$Valores},'{$Nombre_Tabla}','{$Nombre_Tabla_Informacion}');");
        $lastInsert = mysqli_insert_id($conn3);
        $lastInsertFinal = mysqli_insert_id($conn3);
        $lastInsert = encrypt($lastInsert);
        // crear el registro en el menu

        $Nombre = reem_Nombre($_POST['Arreglo']['Nombre']."");
        $insert = "INSERT into main_menu set
                nombre = '{$Nombre}',
                nivel = 2,
                pantalla = 'documentosPacientes?pGi={$lastInsert}',
                idPrincipal = 42,
                estado = 1,
                icon = 'icon-i-certificate-paper-outline',
                color = '#2322e6',
                orden = '99',
                tabla = ''
                ";
        $queryInsert = mysqli_query($conn3, $insert);
        $Menu_id = mysqli_insert_id($conn3);

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// actualizar al menu activo del usuario /////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// actualizar al menu activo del usuario /////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// actualizar al menu activo del usuario /////////////////////////////////////////////////////////////////
        /*
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
            );
            
            $cadenaSinTildes = strtr($cadena, $tildes);
            
            return $cadenaSinTildes;
        }
        
        function ordenarArregloPorOrden($arreglo) {
            usort($arreglo, function($a, $b) {
                return $a['Orden'] - $b['Orden'];
            });
        
            return $arreglo;
        }


        

        $grupo = funcionMaster($_SESSION['ID'], 'ID', 'menu', 'usuarios');

        //aqui obtenemos los grupos
        $QueryGrupos = mysqli_query($conn3, "SELECT * FROM  grupos WHERE id='$grupo'");
        while ($RowGrupos = mysqli_fetch_array($QueryGrupos)) {
            $Arreglo_Grupos = $RowGrupos["Arreglo_Grupos"];
        }

        $Arreglo_Grupos = json_decode($Arreglo_Grupos);
        //Aqui Recorremos los grupos y si esta activo el menu de plantilla lo agregamos en la variable $ArregloGrupos
        foreach ($Arreglo_Grupos as $key => $value) {

            $ArregloMenuFinal = [];
            $querySubmenu = mysqli_query($conn3, "SELECT * FROM  Grupos_Menu WHERE id = '$value'");
            while ($RowSubMenu = mysqli_fetch_array($querySubmenu)) {
              $ArregloMenu = json_decode($RowSubMenu['Arreglo'], true);
            }

            $PlantillasActivo=0;
            foreach ($ArregloMenu as $key1 => $value1) {
              if ($value1["Activo"] == "1" AND $value1['id']== "42") {
                $ArregloGrupos[]=$value;
              }
            }
        }

        //Aqui Recorremos los grupos que tiene plantillas activo
        foreach ($ArregloGrupos as $keygrupos => $valuegrupos){
        
        $id = $valuegrupos;
        $TipoConsulta= "Editar Modulos Menu";

            if ($TipoConsulta=="Editar Modulos Menu") {

                $id = $id;
                $idgrupoedicion = $id;
                $ArregloMenuGuardado="";
                $ArregloMenuG="";
                $ArregloPrincipal="";
                $ArregloMenu="";
                $ArregloGuardar="";

                //aqui obtenemos el arreglo del menu
                $QueryMenu = mysqli_query($conn3, "SELECT * FROM  Grupos_Menu WHERE Activo = 1 AND id = $id");
                while ($RowMenu = mysqli_fetch_array($QueryMenu)) {
                    $ArregloMenuGuardado = $RowMenu['Arreglo'];
            
                }
                $ArregloMenuG = json_decode($ArregloMenuGuardado,true);
            
            
                /////////////////////////////// Actualizacion ///////////////////////////////////////////////////
                /////////////////////////////// Actualizacion ///////////////////////////////////////////////////
                /////////////////////////////// Actualizacion ///////////////////////////////////////////////////

                //aqui obtenemos los menus principales
                $QueryMenu = mysqli_query($conn3, "SELECT * FROM  main_menu WHERE estado = 1 AND idPrincipal = 0 order by id ASC");
                while ($RowMenu = mysqli_fetch_array($QueryMenu)) {
                    $id = $RowMenu['id'];
                    $ArregloPrincipal[$id] = $RowMenu['id'];
            
                }
            
                //echo "llego aqui";
                $contador=0;
                $OrdenUltima=0;
                $OrdenAumento=0;

                //aqui recorremos los menus principales y guardamos los datos en un arreglo
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
                        $ArregloMenu[$contador]["Portada"] = "0";//agregado para aca pp_crearplantillas
                        $ArregloMenu[$contador]["Nombre"] = reem_menu_reves(quitarTildes(utf8_encode($RowMenu['nombre'])));
                        $ArregloMenu[$contador]["Color"] = "#32373d";
                        ////////////? Campos Importantes //////////////////////////////////
            
                        //filtro Portada
                        if($RowMenu['idPrincipal']=="0" && $RowMenu['pantalla']=="#"){
                            $ArregloMenu[$contador]["NoAplicaPortada"] = "1";
                        }
                        //filtro Portada
                        
                        //aqui ingresamos al arreglo guardado y preguntamos si existe el id del arreglo guardado con el de la tabla de menu si existe leguarda los datos al arreglo -> $ArregloMenu
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
            
                                $OrdenUltima = $value1['Orden']+$OrdenAumento;
                                $ExisteSubmenu="1";
                            }
                        }
                        //si no existen los datos le agrega al campo orden un +1 y se actualiza el campo de ultima orden para que los siguientes registros aumente en +1 el orden y funcione correctamente el ordenado
                        if($ExisteSubmenu==0){
                            $ArregloMenu[$contador]["Orden"] = $OrdenUltima+1;
            
                            $OrdenUltima = $OrdenUltima+1;
                            
                            $ArregloMenu[$contador]["CreadoEditar"] = "Si";
                            $OrdenAumento++;
                        }
            
                    }

                    //aqui recorremos los submenus  y guardamos los datos en un arreglo
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
                        $ArregloMenu[$contador]["Portada"] = "0";//agregado para aca pp_crearplantillas
                        $ArregloMenu[$contador]["Nombre"] = reem_menu_reves(quitarTildes(utf8_encode($RowMenu['nombre'])));
                        $ArregloMenu[$contador]["Color"] = "#32373d";
                        ////////////? Campos Importantes //////////////////////////////////
                        
                        //aqui ingresamos al arreglo guardado y preguntamos si existe el id del arreglo guardado con el de la tabla de menu si existe leguarda los datos al arreglo -> $ArregloMenu
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
                        
                        //si no existen los datos le agrega al campo orden un +1 y se actualiza el campo de ultima orden para que los siguientes registros aumente en +1 el orden y funcione correctamente el ordenado
                        if($ExisteSubmenu==0){
                            $ArregloMenu[$contador]["Orden"] = $OrdenUltima+1; // cuando es submenu no se agrega un +1 en el orden
            
                            $OrdenUltima = $OrdenUltima+1;
            
                            $ArregloMenu[$contador]["CreadoEditar"] = "Si";
                            $OrdenAumento++;
                            
                        }
                        
                    }
            
                }
                
            
                
                
                // Llamada a la función para ordenar el arreglo
                $ArregloMenu = ordenarArregloPorOrden($ArregloMenu);

                /////////////////////////////// Actualizacion ///////////////////////////////////////////////////
                /////////////////////////////// Actualizacion ///////////////////////////////////////////////////
                /////////////////////////////// Actualizacion ///////////////////////////////////////////////////
            
                //$ArregloMenuFinal = json_encode($ArregloMenu,true);
            
            }

            //echo "<br>";
            
            //echo "<pre>";
            //print_r($ArregloMenu);
            //echo "</pre>";

            //aqui se le agrega al nuevo menu de lantillas creado que este activo
            $Contador=0;
            foreach ($ArregloMenu as $key => $value) {
                if($value['id']==$Menu_id){
                    $value['Activo'] = "1";
                    $value['Color']= "#9e9ed6";
                    $value['Portada']=0;
                }

                $Contador++;
                //aqui se guarda el arreglo del nuevo menu
                    $Nombre = reem_menu($value['Nombre']);
                    $ArregloGuardar[$Contador] = array(
                        'Nombre' => $Nombre,
                        'Nombre_Original' => $Nombre,
                        'Activo' => $value['Activo'],
                        'Color' => $value['Color'],
                        'Icono' => $value['Icono'],
                        'Portada' => $value['Portada'],
                        'Orden'=> $value['Orden'],
                        'id'=>$value['id']
                    );

            }

            $Fecha = date("Y-m-d H:i:s");
            $JsonGrupo = json_encode($ArregloGuardar);
                //echo $JsonGrupo;
                // el query de arriba volverlo UPDATE
            //echo "<pre>";
            //print_r($ArregloGuardar);
            //echo "</pre>";

            //echo "<hr>";
            $query = "UPDATE Grupos_Menu SET Fecha_Actualizacion = '$Fecha',Arreglo = '$JsonGrupo' WHERE id = '$idgrupoedicion' limit 1";

            //echo $query;
            $resultado = mysqli_query($conn3, $query);

            
        }
        //cierre del foreach de arreglo grupos
        */
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// actualizar al menu activo del usuario [FIM]/////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// actualizar al menu activo del usuario [FIM]/////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// actualizar al menu activo del usuario [FIM]/////////////////////////////////////////////////////////////////

        $Campo1 = mysqli_query($conn3, "show COLUMNS from {$NombreTabla} WHERE Field = 'Menu_id';");
        $nrowCampo1 = mysqli_num_rows($Campo1);
        if ($nrowCampo1 == "0") {
            mysqli_query($conn3, "ALTER TABLE `{$NombreTabla}` ADD `Menu_id` TEXT NULL DEFAULT '' COMMENT 'contendra el id del menu que se creo *Creado desde modulo de PP_CrearPlantilla*'");
        }

        $queryList1 = mysqli_query($conn3, "UPDATE {$NombreTabla} SET Menu_id='$Menu_id' WHERE id = '{$lastInsertFinal}' limit 1;");
        
        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        
        $tabla = mysqli_query($conn3, "SELECT * FROM  {$NombreTabla} WHERE Nombre_Tabla='$Nombre_Tabla' AND Nombre_Tabla_Informacion='$Nombre_Tabla_Informacion'");
        $nrowtabla = mysqli_num_rows($tabla);

    } else {
        echo "<script language='Javascript'> window.location='{$ruta}?error=El nombre de la plantilla ya esta creado, Porfavor digitar otro nombre.'</script>";
    }

    if ($queryList != true) {
        echo "<script language='Javascript'> window.location='{$ruta}?error=Hubo Un Error Al Guardar Los Datos'</script>";
    } else {
        echo "<script language='Javascript'> window.location='Perfiles_Menu_Grupos.php?msg=Se Guardaron Los Datos Correctamente&tipo=plantillas'</script>";
    }
}

if (isset($_POST['Actualizar_Informacion_Pagina'])) {
    $arreglo_id = $_POST['arreglo_id'];
    foreach ($_POST["Arreglo"] as $key => $value) {
        $Campos .= "{$key} = '{$value}',";
    }
    $Campos = trim($Campos, ',');

    $queryList = mysqli_query($conn3, "UPDATE {$NombreTabla} SET {$Campos} WHERE id = '{$arreglo_id}' limit 1;");

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $Nombre_Nuevo = reem_Nombre($_POST['Arreglo']['Nombre']);
    $Caracteres = array("'", '"');
    $Nombre_Nuevo = str_replace($Caracteres,"",$Nombre_Nuevo);

    //se consulta el menu_id guardado al crear la plantilla
    $queryList = mysqli_query($conn3, "SELECT * FROM  {$NombreTabla} where id=$arreglo_id limit 1");
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $Menu_id = $rowMotorizado["Menu_id"];
    }

        //obtengo los grupos del menu actual
        $grupo = funcionMaster($_SESSION['ID'], 'ID', 'menu', 'usuarios');
        $QueryGrupos = mysqli_query($conn3, "SELECT * FROM  grupos WHERE id='$grupo'");
        while ($RowGrupos = mysqli_fetch_array($QueryGrupos)) {
            $Arreglo_Grupos = $RowGrupos["Arreglo_Grupos"];
        }

        //Aqui Recorremos los grupos y si esta activo el menu de plantilla lo agregamos en la variable $ArregloGrupos
        $Arreglo_Grupos = json_decode($Arreglo_Grupos);
        foreach ($Arreglo_Grupos as $key => $value) {
            $querySubmenu = mysqli_query($conn3, "SELECT * FROM  Grupos_Menu WHERE id = '$value'");
            while ($RowSubMenu = mysqli_fetch_array($querySubmenu)) {
              $ArregloMenu = json_decode($RowSubMenu['Arreglo'], true);
            }

            $PlantillasActivo=0;
            foreach ($ArregloMenu as $key1 => $value1) {
              if ($value1["Activo"] == "1" AND $value1['id']== "42") {
                $ArregloGrupos[]=$value;
              }
            }
        }

        //aqui recorremos los grupos que tienen activo la plantilla
        foreach ($ArregloGrupos as $keygrupos => $valuegrupos){
            $id = $valuegrupos;
            $ArregloMenuGuardado="";
            $ArregloMenuG="";
            $JsonGrupo="";

            $QueryMenu = mysqli_query($conn3, "SELECT * FROM  Grupos_Menu WHERE Activo = 1 AND id = $id");
            while ($RowMenu = mysqli_fetch_array($QueryMenu)) {
                $ArregloMenuGuardado = $RowMenu['Arreglo'];
            
            }
            $ArregloMenuG = json_decode($ArregloMenuGuardado,true);

            //aqui buscamos el id del menu que se edito y se le actualiza el nombre
            foreach ($ArregloMenuG as $key => $value) {
                if($value['id']==$Menu_id){
                    //$value['Nombre'] = $Nombre_Nuevo;
                    $ArregloMenuG[$key]['Nombre'] = $Nombre_Nuevo;
                    $ArregloMenuG[$key]['Nombre_Original'] = $Nombre_Nuevo;
                    //echo "entro aqui";
                }
            }

            $Fecha = date("Y-m-d H:i:s");
            $JsonGrupo = json_encode($ArregloMenuG);
                //echo $JsonGrupo;
                // el query de arriba volverlo UPDATE

            //echo "<pre>";
            //print_r($ArregloMenuG);
            //echo "</pre>";

            //echo "<hr>";
            $query = "UPDATE Grupos_Menu SET Fecha_Actualizacion = '$Fecha',Arreglo = '$JsonGrupo' WHERE id = '$id' limit 1";
            $resultado = mysqli_query($conn3, $query);

            $queryList1 = mysqli_query($conn3, "UPDATE main_menu SET nombre='$Nombre_Nuevo' WHERE id = '{$Menu_id}' limit 1;");

        }








    $ruta = 'administrarConsenimientos';
    if ($queryList != true) {
        echo "<script language='Javascript'> window.location='{$ruta}?error=Hubo Un Error Al Editar Los Datos'</script>";
    } else {
        echo "<script language='Javascript'> window.location='{$ruta}?msg=Se Actualizaron Los Datos Correctamente'</script>";
    }
}

if ($_GET['Eliminar'] <> "") {
    $id = $_GET['Eliminar'];
    $queryList = mysqli_query($conn3, "UPDATE {$NombreTabla} SET Activo='0' WHERE id ='{$id}' limit 1");

    //aqui se busca el id del menu de la plantilla
    $queryList = mysqli_query($conn3, "SELECT * FROM  {$NombreTabla} where id=$id limit 1");
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $Menu_id = $rowMotorizado["Menu_id"];
    }

    //aqui se actualiza a estado = 0 para que no se vea en el menu la plantilla eliminada
    $queryList1 = mysqli_query($conn3, "UPDATE main_menu SET estado='0' WHERE id = '{$Menu_id}' limit 1;");

    $ruta = 'administrarConsenimientos';
    if ($queryList != true) {
        echo "<script language='Javascript'> window.location='{$ruta}?error=Hubo Un Error Al Eliminar Los Datos'</script>";
    } else {
        echo "<script language='Javascript'> window.location='{$ruta}?msg=Se Eliminaron Los Datos Correctamente'</script>";
    }
}

if (isset($_GET['Editar'])) {
    $id = $_GET['Editar'];
    $queryList = mysqli_query($conn3, "SELECT * FROM  {$NombreTabla} where id=$id limit 1");
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        foreach ($rowMotorizado as $key => $value) {
            $datos["$key"] = "$value";
        }
    }
    $datos_json = json_encode($datos);
?>
    <script>
        window.onload = function() {
            var Arreglo = <?php echo $datos_json ?>;
            for (index in Arreglo) {
                if (document.getElementsByName("Arreglo[" + index + "]")[0] != undefined) {
                    document.getElementsByName("Arreglo[" + index + "]")[0].value = Arreglo[index];
                }
            }
        };
    </script>
<?php
}

if ($_GET["msg"] != "") {
    include "plugins/SweetAlert2K/AlertaCorrectaOperacion.php";
}
if ($_GET["error"] != "") {
    include "plugins/SweetAlert2K/AlertaErrorOperacion.php";
}

$usuario_id = $_SESSION['ID'];
?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <!-- <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#">Plantillas/Documentos Dinamicos </a></li>
        </ol>
    </section> -->

    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="content">
                <h4 class="Titulo_Pagina">Plantillas/Documentos Dinamicos</h4>
                <h4 style='color:red;'> *IMPORTANTE: Al editar el nombre de la plantilla o documento, solo se editara el nombre en los grupos/menu que estén actualmente activos en el usuario, si se encuentra registrada la plantilla en otro menu grupo/menu que no está activo en este usuario deberá modificarlo manualmente *</h4>
                <div class="box">
                    <div class="box-body">
                        <form action="administrarConsenimientos" method="POST">
                            <div class="form-group col-md-12">
                                <label>Nombre de la Plantilla</label>
                                <input type="text" class="form-control input-lg" name="Arreglo[Nombre]" placeholder="Nombre" value="" maxlength="120" pattern="^[A-Za-z0-9_ ]+$" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)" required>
                            </div>

                            <div class="form-group col-md-12">
                                <label>Descripcion</label>
                                <textarea name="Arreglo[Descripcion]" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </div>

                            <input type="hidden" name="usuario_id" value="<?php echo $usuario_id; ?>">

                            <?php if ($_GET['Editar'] <> "") : ?>
                                <div class="col-sm-12">
                                    <input type="hidden" name="arreglo_id" value="<?php echo $_GET['Editar'] ?>">
                                    <center><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" name="Actualizar_Informacion_Pagina">
                                            <h2> <strong> A c t u a l i z a r </strong> </h2>
                                        </button></center>
                                </div>
                            <?php else : ?>
                                <div class="col-sm-12">
                                    <center><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" name="Guardar_Informacion_Pagina">
                                            <h2> <strong> G u a r d a r </strong> </h2>
                                        </button></center>
                                </div>
                            <?php endif; ?>

                        </form>
                    </div>
                </div>
                <h4 class="Titulo_Pagina" style="left: 50%;position: sticky;">Plantillas/Documentos </h4>
                <div class="box">
                    <div class="box-body">
                        <div class="col-md-12">

                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col" width="2%">#</th>
                                        <th scope="col" width="30%">Nombre</th>
                                        <th scope="col" width="48%">Descripcion</th>
                                        <th scope="col" width="10%">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    // $queryList = mysqli_query($conn3, "SELECT * FROM  {$NombreTabla} WHERE  Activo=1 and usuario_id = '{$usuario_id}'");
                                    $queryList = mysqli_query($conn3, "SELECT * FROM  {$NombreTabla} WHERE  Activo=1 and usuario_id = '{$usuario_id}' or id='105'");
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                        //$contador++;
                                        $id = $rowMotorizado['id'];
                                        $Nombre = $rowMotorizado['Nombre'];
                                        $Descripcion = $rowMotorizado['Descripcion'];
                                        $id_ = encrypt($id);

                                        $ruta = $ruta = 'administrarConsenimientos';
                                        echo "<tr ><th scope='row' width='2%'>{$id}</th>
                                         <td width='30%' align='center'>{$Nombre}</td>
                                         <td width='48%' align='center'>{$Descripcion}</td>
                                         <td width='10%' align='center'><font color='#04CC05'> <a href='{$ruta}?Editar={$id}' class='btn btn-block btn-outline-info btn-lg rounded-pill shadowy' style='width: 200px;'><i class='fa fa-pencil' title='Editar'> Editar</i></a></font><br>
                                            <font> <a href='{$ruta}?Eliminar={$id}' class='btn btn-block btn-outline-info btn-lg rounded-pill shadowy' style='width: 200px;margin-top:5px;margin-bottom:5px'> <i class='fa fa-close' title='Eliminar'> Eliminar</i></a></font><br>
                                            <font> <a href='editarConsentimiento?i={$id_}' class='btn btn-block btn-outline-info btn-lg rounded-pill shadowy' style='width: 200px;margin-top:5px;margin-bottom:5px'> <i class='fa fa-newspaper-o' title='Agregar Plantilla'> Agregar Plantilla</i></a></font>                                            
                                         </td></tr>";
                                    }

                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
</div>
</div>
</section>

<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include 'footer.php';


/*
CREATE TABLE `PP_Plantillas` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `usuario_id` INT(11) NOT NULL , `cliente_id` INT(11) NOT NULL , `Fecha` DATETIME NULL DEFAULT CURRENT_TIMESTAMP , `Nombre` VARCHAR(120) NOT NULL DEFAULT '' , `Descripcion` TEXT NULL DEFAULT '' , `Activo` VARCHAR(5) NULL DEFAULT '1' COMMENT '1:activo / 0: inactivo' , PRIMARY KEY (`id`)) ENGINE = MyISAM;
*/
?>