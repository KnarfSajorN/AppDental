<?php
include 'funciones/conn3.php';

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

            echo $RowMenu['nombre']."<br>";
            $Nom = quitarTildes($RowMenu['nombre']);
            echo $Nom."<br>";
            $ArregloMenu[$contador]["Nombre"] = reem_menu_reves($Nom);
            $ArregloMenu[$contador]["Url"] = $RowMenu['pantalla'];
            $ArregloMenu[$contador]["idPrincipal"] = $RowMenu['idPrincipal'];
            $ArregloMenu[$contador]["Icono"] = $RowMenu['icon'];
            //filtro Portada
            if($RowMenu['idPrincipal']=="0" && $RowMenu['pantalla']=="#"){
                $ArregloMenu[$contador]["NoAplicaPortada"] = "1";
            }
            //filtro Portada
        }
        
        $QueryMenu = mysqli_query($conn3, "SELECT * FROM  main_menu WHERE estado = 1 AND idPrincipal = $value order by id ASC");
        $nrowsSubmenus = mysqli_num_rows($QueryMenu);
        $ArregloMenu[$contador]["Submenus"] = $nrowsSubmenus;
        while ($RowMenu = mysqli_fetch_array($QueryMenu)) {
            $contador++;
            $id = $RowMenu['id'];
            $ArregloMenu[$contador]["id"] = $RowMenu['id'];

            echo $RowMenu['nombre']." 1<br>";
            $Nom = quitarTildes($RowMenu['nombre']);
            echo $Nom." 1<br>";
            $ArregloMenu[$contador]["Nombre"] = reem_menu_reves($Nom);
            $ArregloMenu[$contador]["Url"] = $RowMenu['pantalla'];
            $ArregloMenu[$contador]["idPrincipal"] = $RowMenu['idPrincipal'];
            $ArregloMenu[$contador]["Icono"] = $RowMenu['icon'];

        }

    }

    echo json_encode($ArregloMenu,true);

?>