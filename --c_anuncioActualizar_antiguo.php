<?php
date_default_timezone_set('America/Bogota');

include("funciones/funcionesUtilidades.php");
include("funciones/funciones.php");



$nombre     = reem($_POST['nombre']);
$valorconsulta        = reem($_POST['valorconsulta']);

$categoria           = reem($_POST['categoria']);
$categoria2           = reem($_POST['categoria2']);

$ciudad           = reem($_POST['ciudad']);

$descripcion           = reem($_POST['descripcion']);

$direccionWeb           = reem($_POST['direccionWeb']);
$titulo           = reem($_POST['titulo']);
$proySer           = reem($_POST['proySer']);
$direccion           = reem($_POST['direccion']);
$whatsapp           = $_POST['whatsapp'];
$f           = reem($_POST['f']);
$t           = reem($_POST['t']);
$i           = reem($_POST['i']);
$l           = reem($_POST['l']);
$y           = reem($_POST['y']);
$telefonos           = reem($_POST['telefonos']);
$anosExperiencia           = reem($_POST['anosExperiencia']);

$form1 = $_POST['form1'];

$form3 = $_POST['form3'];
$form4 = $_POST['form4'];
$formColores = $_POST['formColores'];
$formPanel = $_POST['formPanel'];
$formPanelA = $_POST['formPanelA'];

$usuarioId = $_POST['usuarioId'];

$s1           = $_POST['s1'];
$s2           = $_POST['s2'];
$s3           = $_POST['s3'];
$s4           = $_POST['s4'];
$s5           = $_POST['s5'];
$s6           = $_POST['s6'];
$s7           = $_POST['s7'];
$s8           = $_POST['s8'];
$s9           = $_POST['s9'];
$s10          = $_POST['s10'];
$s11          = $_POST['s11'];
$s12          = $_POST['s12'];
$s13          = $_POST['s13'];
$s14          = $_POST['s14'];

$e1           = $_POST['e1'];
$e2           = $_POST['e2'];
$e3           = $_POST['e3'];
$e4           = $_POST['e4'];
$e5           = $_POST['e5'];
$e6           = $_POST['e6'];
$e7           = $_POST['e7'];
$e8           = $_POST['e8'];
$e9           = $_POST['e9'];
$e10          = $_POST['e10'];
$e11          = $_POST['e11'];
$e12          = $_POST['e12'];
$e13          = $_POST['e13'];
$e14          = $_POST['e14'];
$segurosA          = $_POST['segurosA']; 
$GoogleA          = $_POST['GoogleA']; 


$cp          = reem($_POST['cp']);
$cv          = reem($_POST['cv']);
$cd          = reem($_POST['cd']);

$ss          = reem($_POST['ss']);
$particular  = reem($_POST['particular']);

$proySer2     = reem($_POST['proySer2']);
$proySer3     = reem($_POST['proySer3']);
$idiomas      = reem($_POST['idiomas']);
$fpago        = reem($_POST['fpago']);


$tiposConsultas           = $_POST['tiposConsultas'];

$activo = $_POST['activo'];




if ($form1 == 1) {


    if ($s1 == 'on') {
        $s1 = 1;
    } else {
        $s1 = 0;
    }
    if ($s2 == 'on') {
        $s2 = 1;
    } else {
        $s2 = 0;
    }
    if ($s3 == 'on') {
        $s3 = 1;
    } else {
        $s3 = 0;
    }
    if ($s4 == 'on') {
        $s4 = 1;
    } else {
        $s4 = 0;
    }
    if ($s5 == 'on') {
        $s5 = 1;
    } else {
        $s5 = 0;
    }
    if ($s6 == 'on') {
        $s6 = 1;
    } else {
        $s6 = 0;
    }
    if ($s7 == 'on') {
        $s7 = 1;
    } else {
        $s7 = 0;
    }
    if ($s8 == 'on') {
        $s8 = 1;
    } else {
        $s8 = 0;
    }
    if ($s9 == 'on') {
        $s9 = 1;
    } else {
        $s9 = 0;
    }
    if ($s10 == 'on') {
        $s10 = 1;
    } else {
        $s10 = 0;
    }
    if ($s11 == 'on') {
        $s11 = 1;
    } else {
        $s11 = 0;
    }
    if ($s12 == 'on') {
        $s12 = 1;
    } else {
        $s12 = 0;
    }
    if ($s13 == 'on') {
        $s13 = 1;
    } else {
        $s13 = 0;
    }
    if ($s14 == 'on') {
        $s14 = 1;
    } else {
        $s14 = 0;
    }

    if ($e1 == 'on') {
        $e1 = 1;
    } else {
        $e1 = 0;
    }
    if ($e2 == 'on') {
        $e2 = 1;
    } else {
        $e2 = 0;
    }
    if ($e3 == 'on') {
        $e3 = 1;
    } else {
        $e3 = 0;
    }
    if ($e4 == 'on') {
        $e4 = 1;
    } else {
        $e4 = 0;
    }
    if ($e5 == 'on') {
        $e5 = 1;
    } else {
        $e5 = 0;
    }
    if ($e6 == 'on') {
        $e6 = 1;
    } else {
        $e6 = 0;
    }
    if ($e7 == 'on') {
        $e7 = 1;
    } else {
        $e7 = 0;
    }
    if ($e8 == 'on') {
        $e8 = 1;
    } else {
        $e8 = 0;
    }
    if ($e9 == 'on') {
        $e9 = 1;
    } else {
        $e9 = 0;
    }
    if ($e10 == 'on') {
        $e10 = 1;
    } else {
        $e10 = 0;
    }
    if ($e11 == 'on') {
        $e11 = 1;
    } else {
        $e11 = 0;
    }
    if ($e12 == 'on') {
        $e12 = 1;
    } else {
        $e12 = 0;
    }
    if ($e13 == 'on') {
        $e13 = 1;
    } else {
        $e13 = 0;
    }
    if ($e14 == 'on') {
        $e14 = 1;
    } else {
        $e14 = 0;
    }

    if ($cp == 'on') {
        $cp = 1;
    } else {
        $cp = 0;
    }
    if ($cv == 'on') {
        $cv = 1;
    } else {
        $cv = 0;
    }
    if ($cd == 'on') {
        $cd = 1;
    } else {
        $cd = 0;
    }

    if ($ss == 'on') {
        $ss = 1;
    } else {
        $ss = 0;
    }
    if ($particular == 'on') {
        $particular = 1;
    } else {
        $particular = 0;
    }




mysqli_query($conn3, " UPDATE c_catalogo SET nombre= '$nombre', descripcion= '$descripcion', valorconsulta= '$valorconsulta' , categoria= '$categoria' , 
categoria2= '$categoria2' , ciudad = '$ciudad', direccionWeb = '$direccionWeb', titulo = '$titulo', proySer = '$proySer', direccion = '$direccion', 
whatsapp = '$whatsapp',  f = '$f', t = '$t', i= '$i', l = '$l', y = '$y',  telefonos = '$telefonos', anosExperiencia = '$anosExperiencia', activo = '1',
        s1 = $s1,
          s2 = $s2,
        s3 = $s3,
        s4 = $s4,
        s5 = $s5,
        s6 = $s6,
        s7 = $s7,
        s8 = $s8,
        s9 = $s9,
        s10 = $s10,
        s11 = $s11,
        s12 = $s12,
        s13 = $s13,
        s14 = $s14,
        
        e1 = $e1,
        e2 = $e2,
        e3 = $e3,
        e4 = $e4,
        e5 = $e5,
        e6 = $e6,
        e7 = $e7,
        e8 = $e8,
        e9 = $e9,
        e10 = $e10,
        e11 = $e11,
        e12 = $e12,
        e13 = $e13,
        e14 = $e14,
        ss = $ss,
        particular= $particular,
        proySer2 = '$proySer2',
        proySer3 = '$proySer3',
        idiomas = '$idiomas',
        fpago = '$fpago',
        cp = $cp,
        cv = $cv,
        cd = $cd,
        segurosA = '$segurosA',
        GoogleA = '$GoogleA'
         WHERE idUsuario = '$usuarioId'") or die(mysqli_error($conn3));
}


if ($form2 == 1) {
} elseif ($form3 == 1) {

    echo '1';

    $nombre = $_FILES['imagen']['name'];
    $nombrer = strtolower(rand(1, 500) . $nombre4);
    $cd = $_FILES['imagen']['tmp_name'];
    $ruta = "c_foto/" . $_FILES['imagen']['name'];
    $destino = "c_foto/" . $nombrer;
    $resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"], "c_foto/" . $nombrer);

    if (!empty($resultado)) {
        echo '2';

        mysqli_query($conn3, "UPDATE c_catalogo SET  foto = '$nombrer'  WHERE idUsuario = '$usuarioId'");
        echo "UPDATE c_catalogo SET  foto = '$nombrer'  WHERE idUsuario = '$usuarioId'";
    }








    // imagen 3
    // la de contactanos
    $nombre3 = $_FILES['imagen3']['name'];
    $nombrer3 = strtolower(rand(1, 500) . $nombre3);
    $cd = $_FILES['imagen3']['tmp_name'];
    $ruta = "c_foto/" . $_FILES['imagen3']['name'];
    $destino = "c_foto/" . $nombrer3;
    $resultado = @move_uploaded_file($_FILES["imagen3"]["tmp_name"], "c_foto/" . $nombrer3);

    if (!empty($resultado)) {

        mysqli_query($conn3, "UPDATE c_catalogo SET  foto3 = '$nombrer3'  WHERE idUsuario = '$usuarioId'");
    }










    // imagen 8
    // Logo
    $nombre8 = $_FILES['imagen8']['name'];
    $nombrer8 = strtolower(rand(1, 500) . $nombre8);
    $cd = $_FILES['imagen8']['tmp_name'];
    $ruta = "c_foto/" . $_FILES['imagen8']['name'];
    $destino = "c_foto/" . $nombrer8;
    $resultado = @move_uploaded_file($_FILES["imagen8"]["tmp_name"], "c_foto/" . $nombrer8);

    if (!empty($resultado)) {

        mysqli_query($conn3, "UPDATE c_catalogo SET  foto8 = '$nombrer8'  WHERE idUsuario = '$usuarioId'");
    }







} elseif ($form4 == 1) {



    // unlink('c_foto/'.$usuarioId.'png');

    // imagen 2
    $nombre2 = $_FILES['imagen2']['name'];
    $nombrer2 = strtolower(rand(1, 500) . $nombre2);
    $cd = $_FILES['imagen2']['tmp_name'];
    $ruta = "c_foto/" . $_FILES['imagen2']['name'];
    $destino = "c_foto/" . $nombrer2;
    $resultado = @move_uploaded_file($_FILES["imagen2"]["tmp_name"], "c_foto/" . $nombrer2);

    if (!empty($resultado)) {

        mysqli_query($conn3, "UPDATE c_catalogo SET  foto2 = '$nombrer2'  WHERE idUsuario = '$usuarioId'");
    }











    // imagen 4
    $nombre4 = $_FILES['imagen4']['name'];
    $nombrer4 = strtolower(rand(1, 500) . $nombre4);
    $cd = $_FILES['imagen4']['tmp_name'];
    $ruta = "c_foto/" . $_FILES['imagen4']['name'];
    $destino = "c_foto/" . $nombrer4;
    $resultado = @move_uploaded_file($_FILES["imagen4"]["tmp_name"], "c_foto/" . $nombrer4);

    if (!empty($resultado)) {

        mysqli_query($conn3, "UPDATE c_catalogo SET  foto4 = '$nombrer4'  WHERE idUsuario = '$usuarioId'");
    }








    // imagen 5
    $nombre5 = $_FILES['imagen5']['name'];
    $nombrer5 = strtolower(rand(1, 500) . $nombre5);
    $cd = $_FILES['imagen5']['tmp_name'];
    $ruta = "c_foto/" . $_FILES['imagen5']['name'];
    $destino = "c_foto/" . $nombrer5;
    $resultado = @move_uploaded_file($_FILES["imagen5"]["tmp_name"], "c_foto/" . $nombrer5);

    if (!empty($resultado)) {

        mysqli_query($conn3, "UPDATE c_catalogo SET  foto5 = '$nombrer5'  WHERE idUsuario = '$usuarioId'");
    }
    
} elseif ($formColores == 1) {
    $primario         = $_POST['primario'];
    if($primario == ''){
        $primario = '#83c1e7';

    }
    $secundario         = $_POST['secundario'];
    $banner         = $_POST['banner'];
    if ($banner == '') {
        $banner = 1;
    }
    $letra         = $_POST['letra'];
    $portada1         = $_POST['portada1'];
    $portada2         = $_POST['portada2'];
    $portada3         = $_POST['portada3'];
    $textoP2         = $_POST['textoP2'];
    $textoP3         = $_POST['textoP3'];

    mysqli_query($conn3, "UPDATE c_catalogo SET  primario = '$primario',secundario = '$secundario',banner = '$banner',letra = '$letra',
        portada1 = '$portada1',portada2 = '$portada2',portada3 = '$portada3',textoP2 = '$textoP2',textoP3 = '$textoP3' WHERE idUsuario = '$usuarioId'")  or die(mysqli_error($conn3));

// echo "UPDATE c_catalogo SET  primario = '$primario',secundario = '$secundario',banner = '$banner',letra = '$letra',
// portada1 = '$portada1',portada2 = '$portada2',portada3 = '$portada3',textoP2 = '$textoP2',textoP3 = '$textoP3' WHERE idUsuario = '$usuarioId'";
    //FOTOS DE PORTADA
    // Portada 1
    $nombre10 = $_FILES['portada1']['name'];
    $nombrer10 = strtolower(rand(1, 500) . $nombre10);
    $cd = $_FILES['portada1']['tmp_name'];
    $ruta = "c_foto/" . $_FILES['portada1']['name'];
    $destino = "c_foto/" . $nombrer10;
    $resultado = @move_uploaded_file($_FILES["portada1"]["tmp_name"], "c_foto/" . $nombrer10);

    if (!empty($resultado)) {

        mysqli_query($conn3, "UPDATE c_catalogo SET  portada1 = '$nombrer10'  WHERE idUsuario = '$usuarioId'");
        // echo "UPDATE c_catalogo SET  portada1 = '$nombrer10'  WHERE idUsuario = '$usuarioId'";
    }

    // imagen 4
    $nombre11 = $_FILES['portada2']['name'];
    $nombrer11 = strtolower(rand(1, 500) . $nombre11);
    $cd = $_FILES['portada2']['tmp_name'];
    $ruta = "c_foto/" . $_FILES['portada2']['name'];
    $destino = "c_foto/" . $nombrer11;
    $resultado = @move_uploaded_file($_FILES["portada2"]["tmp_name"], "c_foto/" . $nombrer11);

    if (!empty($resultado)) {

        mysqli_query($conn3, "UPDATE c_catalogo SET  portada2 = '$nombrer11'  WHERE idUsuario = '$usuarioId'");
        // echo "UPDATE c_catalogo SET  portada2 = '$nombrer11'  WHERE idUsuario = '$usuarioId'";
    }

    // imagen 4
    $nombre12 = $_FILES['portada3']['name'];
    $nombrer12 = strtolower(rand(1, 500) . $nombre12);
    $cd = $_FILES['portada3']['tmp_name'];
    $ruta = "c_foto/" . $_FILES['portada3']['name'];
    $destino = "c_foto/" . $nombrer12;
    $resultado = @move_uploaded_file($_FILES["portada3"]["tmp_name"], "c_foto/" . $nombrer12);

    if (!empty($resultado)) {

        mysqli_query($conn3, "UPDATE c_catalogo SET  portada3 = '$nombrer12'  WHERE idUsuario = '$usuarioId'");
        // echo "UPDATE c_catalogo SET  portada3 = '$nombrer12'  WHERE idUsuario = '$usuarioId'";
    }


    //FOTOS DE PORTADA

} elseif ($formPanel == 1) {
    $nombre_P = $_POST['nombre'];
    $enlace_P = $_POST['enlace'];
    $panel_P = $_POST['panel'];
    $fecha = date("Y-m-d");
    $hora = date("H:i:s");
    mysqli_query($conn3, "INSERT into configPaneles (fecha,hora,usuario,panel,nombre,enlace) values ('$fecha','$hora','$usuarioId','$panel_P','$nombre_P','$encale_P') ;") or die(mysqli_error($conn3));
} elseif ($formPanelA == 1) {
    $nombre_P = $_POST['nombre'];
    $enlace_P = $_POST['enlace'];
    $panel_P = $_POST['panel'];
    $activo = $_POST['activo'];
    $idP = $_POST['idP'];
    mysqli_query($conn3, "UPDATE configPaneles set panel='$panel_P',nombre='$nombre_P',enlace='$enlace_P',activo='$activo' where id='$idP';") or die(mysqli_error($conn3));

}


 
        
 echo "<script language='Javascript'> window.location='anuncio';   </script>";