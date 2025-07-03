<?php
date_default_timezone_set('America/Bogota');
include("conexiones/conexion.php");
include("funciones/funcionesUtilidades.php");

$con = conectar();


$fechar = date("Y-m-d");
$hora = date("H:i:s");

$usuarioM = $_POST['usuarioM'];
$doctor  = $_POST['doctor'];
$fechan = $_POST['fechan'];
$NOTA = $_POST['notas'];

$USUARIO            = $_POST['USUARIO'];
$PASS               = $_POST['PASS'];
$NOMBRE_USUARIO     = reem($_POST['NOMBRE_USUARIO']);
$fec_ingreso        = $_POST['fec_ingreso'];
$telefono           = $_POST['telefono'];
$direccion          = reem($_POST['direccion']);
$ciudad             = reem($_POST['ciudad']);
$empresaNombre      = reem($_POST['empresaNombre']);
$pais               = reem($_POST['pais']);
$numeroFactura      = $_POST['numeroFactura'];
$nit                = $_POST['nit'];
$especialidad       = reem($_POST['especialidad']);

$especialidad1       = reem($_POST['especialidad1']);
$especialidad2       = reem($_POST['especialidad2']);

$Nacimiento         = $_POST['Nacimiento'];
$perfil         = $_POST['perfil'];
$vista         = $_POST['vista'];




$nombreF            = reem($_POST['nombreF']);
$telefonoF          = $_POST['telefonoF'];
$direccionF         = reem($_POST['direccionF']);
$emailF             = $_POST['emailF'];
$ciudadPaisF        = reem($_POST['ciudadPaisF']);
$licenciaF          = $_POST['licenciaF'];
$impuestoF          = $_POST['impuestoF'];
$pieF               = reem($_POST['pieF']);
$header               = reem($_POST['header']);
$imagen             = $_POST['imagen'];
$moneda             = $_POST['moneda'];
$tiempoConsulta     = $_POST['tiempoConsulta'];
$cantidadPacientes  = $_POST['cantidadPacientes'];


$form1 = $_POST['form1'];
$form2 = $_POST['form2'];
$form3 = $_POST['form3'];
$form4 = $_POST['form4'];
$form5 = $_POST['form5'];
$form6 = $_POST['form6'];

$usuarioId = $_POST['usuarioId'];

$lt = $_POST['lt'];
$mt = $_POST['mt'];
$et = $_POST['et'];
$jt = $_POST['jt'];
$vt = $_POST['vt'];
$st = $_POST['st'];
$dt = $_POST['dt'];


$sul = reem($_POST['sul']);
$sum = reem($_POST['sum']);
$sue = reem($_POST['sue']);
$suj = reem($_POST['suj']);
$suv = reem($_POST['suv']);
$sus = reem($_POST['sus']);
$sud = reem($_POST['sud']);

$sul2 = reem($_POST['sul2']);
$sum2 = reem($_POST['sum2']);
$sue2 = reem($_POST['sue2']);
$suj2 = reem($_POST['suj2']);
$suv2 = reem($_POST['suv2']);
$sus2 = reem($_POST['sus2']);
$sud2 = reem($_POST['sud2']);


$ld = $_POST['ld'];
$md = $_POST['md'];
$ed = $_POST['ed'];
$jd = $_POST['jd'];
$vd = $_POST['vd'];
$sd = $_POST['sd'];
$dd = $_POST['dd'];

$lh = $_POST['lh'];
$mh = $_POST['mh'];
$eh = $_POST['eh'];
$jh = $_POST['jh'];
$vh = $_POST['vh'];
$sh = $_POST['sh'];
$dh = $_POST['dh'];


$ldp = $_POST['ldp'];
$mdp = $_POST['mdp'];
$edp = $_POST['edp'];
$jdp = $_POST['jdp'];
$vdp = $_POST['vdp'];
$sdp = $_POST['sdp'];
$ddp = $_POST['ddp'];

$lhp = $_POST['lhp'];
$mhp = $_POST['mhp'];
$ehp = $_POST['ehp'];
$jhp = $_POST['jhp'];
$vhp = $_POST['vhp'];
$shp = $_POST['shp'];
$dhp = $_POST['dhp'];


$cie10 = $_POST['cie10'];
$pro1  = $_POST['pro1'];
$pro2  = $_POST['pro2'];


$whatsapp  = $_POST['whatsapp'];
$registroAuxiliar  = $_POST['registroAuxiliar'];





echo $form1;


if ($ld <= 0) {
    $ld = '00:00:00';
}
if ($md <= 0) {
    $md = '00:00:00';
}
if ($ed <= 0) {
    $ed = '00:00:00';
}
if ($jd <= 0) {
    $jd = '00:00:00';
}
if ($vd <= 0) {
    $vd = '00:00:00';
}
if ($sd <= 0) {
    $sd = '00:00:00';
}
if ($dd <= 0) {
    $dd = '00:00:00';
}

if ($lh <= 0) {
    $lh = '00:00:00';
}
if ($mh <= 0) {
    $mh = '00:00:00';
}
if ($eh <= 0) {
    $eh = '00:00:00';
}
if ($jh <= 0) {
    $jh = '00:00:00';
}
if ($vh <= 0) {
    $vh = '00:00:00';
}
if ($sh <= 0) {
    $sh = '00:00:00';
}
if ($dh <= 0) {
    $dh = '00:00:00';
}


if ($ldp <= 0) {
    $ldp = '00:00:00';
}
if ($mdp <= 0) {
    $mdp = '00:00:00';
}
if ($edp <= 0) {
    $edp = '00:00:00';
}
if ($jdp <= 0) {
    $jdp = '00:00:00';
}
if ($vdp <= 0) {
    $vdp = '00:00:00';
}
if ($sdp <= 0) {
    $sdp = '00:00:00';
}
if ($ddp <= 0) {
    $ddp = '00:00:00';
}

if ($lhp <= 0) {
    $lhp = '00:00:00';
}
if ($mhp <= 0) {
    $mhp = '00:00:00';
}
if ($ehp <= 0) {
    $ehp = '00:00:00';
}
if ($jhp <= 0) {
    $jhp = '00:00:00';
}
if ($vhp <= 0) {
    $vhp = '00:00:00';
}
if ($shp <= 0) {
    $shp = '00:00:00';
}
if ($dhp <= 0) {
    $dhp = '00:00:00';
}




$idCitas = $_GET['idCitas'];

if ($form1 == 1) {





    $queryCliente2 = "UPDATE usuarios SET PASS= '$PASS', NOMBRE_USUARIO= '$NOMBRE_USUARIO', telefono= '$telefono' ,direccion= '$direccion' ,ciudad= '$ciudad', empresaNombre = '$empresaNombre', especialidad = '$especialidad' , especialidad1 = '$especialidad1' , especialidad2 = '$especialidad2', nit = '$nit', numeroFactura = '$numeroFactura', TIPO ='$perfil', vista='$vista' WHERE ID = '$usuarioId'";
    mysql_query($queryCliente2, $con) or die(mysql_error());


    mysqli_query("UPDATE usuarios SET PASS= '$PASS', NOMBRE_USUARIO= '$NOMBRE_USUARIO', telefono= '$telefono' ,direccion= '$direccion' ,ciudad= '$ciudad', empresaNombre = '$empresaNombre', especialidad = '$especialidad' , especialidad1 = '$especialidad1' , especialidad2 = '$especialidad2', nit = '$nit', numeroFactura = '$numeroFactura', TIPO ='$perfil', vista='$vista' WHERE ID = '$usuarioId'");
}

if ($form2 == 1) {

    $queryCliente = "UPDATE config SET  nombreF='$nombreF',telefonoF= '$telefonoF' ,direccionF= '$direccionF',emailF= '$emailF' ,ciudadPaisF= '$ciudadPaisF' ,licenciaF= '$licenciaF' ,impuestoF= '$impuestoF',pieF= '$pieF', moneda = '$moneda', tiempoConsulta= '$tiempoConsulta', cantidadPacientes = '$cantidadPacientes', 
        lt= '$lt',
        mt= '$mt',
        et= '$et',
        jt= '$jt',
        vt= '$vt',
        st= '$st',
        dt= '$dt',
        sul= '$sul',
        sum= '$sum',
        sue= '$sue',
        suj= '$suj',
        suv= '$suv',
        sus= '$sus',
        sud= '$sud',
        
        sul2= '$sul2',
        sum2= '$sum2',
        sue2= '$sue2',
        suj2= '$suj2',
        suv2= '$suv2',
        sus2= '$sus2',
        sud2= '$sud2',

        ld= '$ld',
        md= '$md',
        ed= '$ed',
        jd= '$jd',
        vd= '$vd',
        sd= '$sd',
        dd= '$dd',   
        lh= '$lh',
        mh= '$mh',
        eh= '$eh',
        jh= '$jh',
        vh= '$vh',
        sh= '$sh',
        dh= '$dh',
        ldp= '$ldp',
        mdp= '$mdp',
        edp= '$edp',
        jdp= '$jdp',
        vdp= '$vdp',
        sdp= '$sdp',
        ddp= '$ddp',   
        lhp= '$lhp',
        mhp= '$mhp',
        ehp= '$ehp',
        jhp= '$jhp',
        vhp= '$vhp',
        shp= '$shp',
        dhp= '$dhp',
        header = '$header',
        whatsapp = '$whatsapp',
        registroAuxiliar = '$registroAuxiliar'    
   WHERE ID_Usuario = '$usuarioId'";

    mysql_query($queryCliente, $con) or die(mysql_error());
    mysql_query("UPDATE config SET registroAuxiliar = '$registroAuxiliar' WHERE ID_Usuario = '$usuarioId'", $con);
    mssql_query("UPDATE config SET  nombreF='$nombreF',telefonoF= '$telefonoF' ,direccionF= '$direccionF',emailF= '$emailF' ,ciudadPaisF= '$ciudadPaisF' ,licenciaF= '$licenciaF' ,impuestoF= '$impuestoF',pieF= '$pieF', moneda = '$moneda', tiempoConsulta= '$tiempoConsulta', cantidadPacientes = '$cantidadPacientes', 
        lt= '$lt',
        mt= '$mt',
        et= '$et',
        jt= '$jt',
        vt= '$vt',
        st= '$st',
        dt= '$dt',
        sul= '$sul',
        sum= '$sum',
        sue= '$sue',
        suj= '$suj',
        suv= '$suv',
        sus= '$sus',
        sud= '$sud',
        
        sul2= '$sul2',
        sum2= '$sum2',
        sue2= '$sue2',
        suj2= '$suj2',
        suv2= '$suv2',
        sus2= '$sus2',
        sud2= '$sud2',

        ld= '$ld',
        md= '$md',
        ed= '$ed',
        jd= '$jd',
        vd= '$vd',
        sd= '$sd',
        dd= '$dd',   
        lh= '$lh',
        mh= '$mh',
        eh= '$eh',
        jh= '$jh',
        vh= '$vh',
        sh= '$sh',
        dh= '$dh',
        ldp= '$ldp',
        mdp= '$mdp',
        edp= '$edp',
        jdp= '$jdp',
        vdp= '$vdp',
        sdp= '$sdp',
        ddp= '$ddp',   
        lhp= '$lhp',
        mhp= '$mhp',
        ehp= '$ehp',
        jhp= '$jhp',
        vhp= '$vhp',
        shp= '$shp',
        dhp= '$dhp',
        header = '$header',
        whatsapp = '$whatsapp'  
   WHERE ID_Usuario = '$usuarioId'");
} elseif ($form3 == 1) {
    echo 'cargamos la imagen';
    $nombre = $_FILES['imagen']['name'] . rand(10);
    $nombrer = strtolower($nombre);
    $cd = $_FILES['imagen']['tmp_name'];
    $ruta = "logos/" . $_FILES['imagen']['name'];
    $destino = "logos/" . $nombrer;
    $resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);
    if (!empty($resultado)) {

        /*       @mysqli_query($conexion,"INSERT INTO fotos VALUES ('". $nombre."','" . $destino . "')"); 
                echo "el archivo ha sido movido exitosamente";
                */

        $queryCliente = "UPDATE config SET  logoF= '$nombrer'  WHERE ID_Usuario =   '$usuarioId'";

        mysql_query($queryCliente, $con) or die(mysql_error());


        mssql_query("UPDATE config SET  logoF= '$nombrer'  WHERE ID_Usuario =   '$usuarioId'");
    }
}



if ($form4 == 1) {


    $queryCliente = "UPDATE config SET  
        cie10= '$cie10',   
        pro1= '$pro1' ,  
        pro2= '$pro2'   
   WHERE ID_Usuario = '$usuarioId'";




    mysql_query($queryCliente, $con) or die(mysql_error());



    mssql_query("UPDATE config SET  
        cie10= '$cie10',   
        pro1= '$pro1' ,  
        pro2= '$pro2'   
   WHERE ID_Usuario = '$usuarioId'");
} elseif ($form5 == 1) {
    echo 'cargamos la imagen';
    $nombre = $_FILES['imagen2']['name'] . rand(10);
    $nombref = strtolower($nombre);
    $cd = $_FILES['imagen2']['tmp_name'];
    $ruta = "FirmasReg/" . $_FILES['imagen2']['name'];
    $destino = "FirmasReg/" . $nombrer;
    $resultado = @move_uploaded_file($_FILES["imagen2"]["tmp_name"], $ruta);
    if (!empty($resultado)) {

        /*       @mysqli_query($conexion,"INSERT INTO fotos VALUES ('". $nombre."','" . $destino . "')"); 
                echo "el archivo ha sido movido exitosamente";
                */

        $queryCliente = "UPDATE config SET  firma = '$nombref'  WHERE ID_Usuario =   '$usuarioId'";

        mysql_query($queryCliente, $con) or die(mysql_error());

        mssql_query("UPDATE config SET  firma = '$nombref'  WHERE ID_Usuario =   '$usuarioId'");
    }
}


if ($form6 == 1) {


    $queryList = mysqli_query($conn3, "INSERT INTO  noLaborales
                    (fecha, hora, idUsuario, idDoctor, fechaNoLaboral, nota  ) VALUES
                   ('$fechar','$hora', '$usuarioM','$doctor','$fechan', '$NOTA')");


    mssql_query("INSERT INTO  noLaborales
                    (fecha, hora, idUsuario, idDoctor, fechaNoLaboral, nota  ) VALUES
                   ('$fechar','$hora', '$usuarioM','$doctor','$fechan', '$NOTA')");
}



echo "<script language='Javascript'> window.location='Perfil2.php?usuario_id=$usuarioId';   </script>";
