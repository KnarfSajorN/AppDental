<?php
date_default_timezone_set('America/Bogota');
include("funciones/funciones.php");
include("funciones/funcionesUtilidades.php");
include('funciones/conn3.php');


//$con = conectar();
//var_dump($_POST);


$fechar = date("Y-m-d");
$hora = date("H:i:s");

$usuarioM = $_POST['usuarioM'];
$doctor  = $_POST['doctor'];
$fechan = $_POST['fechan'];
$NOTA = $_POST['notas'];
$periodo = $_POST['periodo'];
$horaInicio = $_POST['horaInicio'];
$horaFinal = $_POST['horaFinal'];

$sucursal = $_POST['sucursal'];
$USUARIO            = $_POST['nombre_cliente'];
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
$correo               = $_POST['email'];
// $especialidad       = reem($_POST['especialidad']);
$especialidad = utf8_encode($_POST['especialidad']);

$especialidad1       = reem($_POST['especialidad1']);
$especialidad2       = reem($_POST['especialidad2']);

$Nacimiento         = $_POST['Nacimiento'];
$perfil         = $_POST['perfil'];
$vista         = $_POST['vista'];
$grupo1        = $_POST['grupo1'];
$grupo2        = $_POST['grupo2'];
$grupo3        = $_POST['grupo3'];
$lugar       = $_POST['lugar'];

$indicativo = $_POST['indicativo'];



$nombreF           = reem($_POST['nombreF']);
$telefonoF         = $_POST['telefonoF'];
$direccionF        = reem($_POST['direccionF']);
$emailF            = $_POST['emailF'];
$ciudadPaisF       = reem($_POST['ciudadPaisF']);
$licenciaF         = $_POST['licenciaF'];
$impuestoF         = $_POST['impuestoF'];
if($impuestoF==""){
        $impuestoF = 0;
}
$pieF              = reem($_POST['pieF']);
$header            = reem($_POST['header']);
$imagen            = $_POST['imagen'];
$cuposHora         = (empty($_POST['cuposHora']) || !is_numeric($_POST['cuposHora']) ? 0 : $_POST['cuposHora']);
$moneda            = $_POST['moneda'];
$tiempoConsulta    = $_POST['tiempoConsulta'];
$cantidadPacientes = $_POST['cantidadPacientes'];


$form1 = $_POST['form1'];
$form2 = $_POST['form2'];
$form3 = $_POST['form3'];
$form4 = $_POST['form4'];
$form5 = $_POST['form5'];
$form6 = $_POST['form6'];
$formCitas = $_POST['formCitas'];
$formPuntosR = $_POST['formPuntosR'];

$formContabilidad = $_POST['formContabilidad'];

$usuarioId = $_POST['usuarioId'];

$lt = $_POST['lt'];
$mt = $_POST['mt'];
$et = $_POST['et'];
$jt = $_POST['jt'];
$vt = $_POST['vt'];
$st = $_POST['st'];
$dt = $_POST['dt'];

$registroAuxiliar  = $_POST['registroAuxiliar'];
$Color_Resultados  = $_POST['Laboratorio']['Color_Resultados'];

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
$pacientes = $_POST['pacientes'];



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
        //echo "FORM1";
        //$menu = $_POST['menu'];
        $linkGM     = $_POST['linkGM'];

        $query = mysqli_query($conn3, "UPDATE usuarios SET USUARIO = '$USUARIO', PASS= '$PASS', NOMBRE_USUARIO= '$NOMBRE_USUARIO',
         telefono= '$telefono' ,direccion= '$direccion' ,ciudad= '$ciudad', empresaNombre = '$empresaNombre', 
         especialidad = '$especialidad' , especialidad1 = '$especialidad1' , especialidad2 = '$especialidad2', 
         nit = '$nit', numeroFactura = '$numeroFactura', TIPO ='$perfil', vista='$vista', indicativo='$indicativo',
         correo='$correo',sucursal='$sucursal', ubicacion = '$linkGM', pais = '$pais' WHERE ID = '$usuarioId'");
//         echo "UPDATE usuarios SET USUARIO = '$USUARIO', PASS= '$PASS', NOMBRE_USUARIO= '$NOMBRE_USUARIO',
//         telefono= '$telefono' ,direccion= '$direccion' ,ciudad= '$ciudad', empresaNombre = '$empresaNombre', 
//         especialidad = '$especialidad' , especialidad1 = '$especialidad1' , especialidad2 = '$especialidad2', 
//         nit = '$nit', numeroFactura = '$numeroFactura', TIPO ='$perfil', vista='$vista', indicativo='$indicativo',
//         correo='$correo',sucursal='$sucursal', ubicacion = '$linkGM', pais = '$pais' WHERE ID = '$usuarioId'"; 
// die();
        $queryConfig = mysqli_query($conn3, "UPDATE config set ubicaciion = '$linkGM' WHERE ID_Usuario = '$usuarioId'") or die(mysqli_error($conn3));

        // echo "UPDATE config set ubicaciion = '$linkGM' WHERE ID = '$usuarioId'";
        
        //echo "UPDATE usuarios SET PASS= '$PASS', NOMBRE_USUARIO= '$NOMBRE_USUARIO', TIPO ='$perfil' WHERE ID = '$usuarioId'";

}
if ($form2 == 1) {        
        
        $Campos = "";
       
        foreach ($_POST["Horario"] as $key => $value) {
                $Campos .= "{$key} = '{$value}',";
        }
        $Campos = trim($Campos, ',');
        $Sucursal_id = $_POST["Sucursal_Horario"];

        if ($Sucursal_id == "0") {       //echo"UPDATE config SET {$Campos} WHERE ID_Usuario = '{$usuarioId}' limit 1;";
                $queryList = mysqli_query($conn3, "UPDATE config SET {$Campos} WHERE ID_Usuario = '{$usuarioId}' limit 1;");
                //echo "UPDATE config SET {$Campos} WHERE ID_Usuario = '{$usuarioId}' limit 1;";
        } else {

                $tabladinamica = mysqli_query($conn3, "SELECT * FROM Horario_Sistema WHERE usuario_id = '{$usuarioId}' AND sucursal_id = '{$Sucursal_id}' limit 1;");
                $rowtabladinamica = mysqli_num_rows($tabladinamica);
                if ($rowtabladinamica == 0) {
                        $Campos = "";
                        foreach ($_POST["Horario"] as $key => $value) {
                                $Campos .= $key . ',';
                                $Valores .= "'{$value}',";
                        }
                        $Campos = trim($Campos, ',');
                        $Valores = trim($Valores, ',');

                        $queryList = mysqli_query($conn3, "INSERT INTO Horario_Sistema (usuario_id,sucursal_id,{$Campos}) VALUES ('$usuarioId','$Sucursal_id', {$Valores});");
                        echo "INSERT INTO Horario_Sistema (usuario_id,sucursal_id,{$Campos}) VALUES ('$usuarioId','$Sucursal_id', {$Valores});";
                } else {
                        $queryList = mysqli_query($conn3, "UPDATE Horario_Sistema SET {$Campos} WHERE usuario_id = '{$usuarioId}' AND sucursal_id = '{$Sucursal_id}' limit 1;");
                        echo "UPDATE Horario_Sistema SET {$Campos} WHERE usuario_id = '{$usuarioId}' AND sucursal_id = '{$Sucursal_id}' limit 1;";
                }
        }

        $registroAuxiliar = $_POST["registroAuxiliar"];
        $Max_Descuento = $_POST["Max_Descuento"];
        if($Max_Descuento==""){$Max_Descuento="0";}

        $FacturarExistenciasNegativas = $_POST["FacturarExistenciasNegativas"];
        if($FacturarExistenciasNegativas==""){$FacturarExistenciasNegativas="0";}

        mysqli_query($conn3, "UPDATE config SET nombreF='$nombreF',telefonoF= '$telefonoF' ,direccionF= '$direccionF',emailF= '$emailF' ,ciudadPaisF= '$ciudadPaisF' ,licenciaF= '$licenciaF' ,impuestoF= '$impuestoF',pieF= '$pieF', moneda = '$moneda', tiempoConsulta= '$tiempoConsulta', cantidadPacientes = '$cantidadPacientes', header = '$header', whatsapp = '$whatsapp', pacientes='$pacientes', sucursal= '$lugar', grupo1='$grupo1' , grupo2='$grupo2', grupo3='$grupo3', registroAuxiliar = '$registroAuxiliar', Max_Descuento ='$Max_Descuento', FacturarExistenciasNegativas='$FacturarExistenciasNegativas'  WHERE ID_Usuario = '$usuarioId'") or die(mysqli_error($conn3));
        echo "<script language='Javascript'> window.location='config';   </script>";

        //echo "UPDATE config SET nombreF='$nombreF',telefonoF= '$telefonoF' ,direccionF= '$direccionF',emailF= '$emailF' ,ciudadPaisF= '$ciudadPaisF' ,licenciaF= '$licenciaF' ,impuestoF= '$impuestoF',pieF= '$pieF', moneda = '$moneda', tiempoConsulta= '$tiempoConsulta', cantidadPacientes = '$cantidadPacientes', header = '$header', whatsapp = '$whatsapp', pacientes='$pacientes', sucursal= '$lugar', grupo1='$grupo1' , grupo2='$grupo2', grupo3='$grupo3', registroAuxiliar = '$registroAuxiliar', Max_Descuento ='$Max_Descuento', FacturarExistenciasNegativas='$FacturarExistenciasNegativas' WHERE ID_Usuario = '$usuarioId'";
} elseif ($form3 == 1) {
        echo 'cargamos la imagen';
        $nombre = $_FILES['imagen']['name'];
        //$nombre = $_FILES['imagen']['name'] . rand(1, 10);
        $nombrer = strtolower($nombre);
        $cd = $_FILES['imagen']['tmp_name'];
        $ruta = "logos/" . $_FILES['imagen']['name'];
        $destino = "logos/" . $nombrer;
        $resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);
        if (!empty($resultado)) {

                /*       @mysqli_query($conexion,"INSERT INTO fotos VALUES ('". $nombre."','" . $destino . "')"); 
                echo "el archivo ha sido movido exitosamente";
                */

               $query = mysqli_query($conn3, "UPDATE config SET  logoF= '$nombre'  WHERE ID_Usuario =   '$usuarioId'");


                //mssql_query("UPDATE config SET  logoF= '$nombrer'  WHERE ID_Usuario =   '$usuarioId'");




        }
}



if ($form4 == 1) {
        $rips_usuario  = $_POST['rips_usuario'];

        $Campo = mysqli_query($conn3, "show COLUMNS from config WHERE Field = 'rips';");
        $nrowCampo = mysqli_num_rows($Campo);
        if ($nrowCampo == 0) {
                $creacion = mysqli_query($conn3, "ALTER TABLE `config` ADD `rips` INT(11) NULL DEFAULT '0' COMMENT 'Campo para activar rips | 1:Activo / 0: Inactivo'");
        }
        $queryCliente = "UPDATE config SET  
        cie10= '$cie10', 
        rips='$rips_usuario'
   WHERE ID_Usuario = '$usuarioId'";

        mysqli_query($conn3, $queryCliente);

        //mysql_query($queryCliente,$con) or die(mysql_error());

        /*
mssql_query("UPDATE config SET  
        cie10= '$cie10',   
        pro1= '$pro1' ,  
        pro2= '$pro2'   
   WHERE ID_Usuario = '$usuarioId'"); */
} elseif ($form5 == 1) {
        echo 'cargamos la imagen';
        $nombre = $_FILES['imagen2']['name'];
        //$nombre = $_FILES['imagen2']['name'] . rand(1, 10);
        $nombref = strtolower($nombre);
        $cd = $_FILES['imagen2']['tmp_name'];
        $ruta = "FirmasReg/" . $_FILES['imagen2']['name'];
        $destino = "FirmasReg/" . $nombrer;
        $resultado = @move_uploaded_file($_FILES["imagen2"]["tmp_name"], $ruta);
        if (!empty($resultado)) {

                /*       @mysqli_query($conexion,"INSERT INTO fotos VALUES ('". $nombre."','" . $destino . "')"); 
                echo "el archivo ha sido movido exitosamente";
                */

               $query = mysqli_query($conn3, "UPDATE config SET  firma = '$nombre'  WHERE ID_Usuario =   '$usuarioId'");

                //mssql_query( "UPDATE config SET  firma = '$nombref'  WHERE ID_Usuario =   '$usuarioId'");



        }
}


if ($form6 == 1) {

        /*
        $queryList = mysqli_query($conn3, "INSERT INTO  noLaborales
                    (fecha, hora, idUsuario, idDoctor, fechaNoLaboral, nota  ) VALUES
                   ('$fechar','$hora', '$usuarioM','$doctor','$fechan', '$NOTA')");


        echo "INSERT INTO  noLaborales
                    (fecha, hora, idUsuario, idDoctor, fechaNoLaboral, nota  ) VALUES
                   ('$fechar','$hora', '$usuarioM','$doctor','$fechan', '$NOTA')";
                   */


        $queryList = mysqli_query($conn3, "INSERT INTO  noLaborales
                   (fecha, hora, idUsuario, idDoctor, fechaNoLaboral, nota, periodo, horaInicio, horaFinal ) VALUES
                  ('$fechar','$hora', '$usuarioM','$doctor','$fechan', '$NOTA', '$periodo', '$horaInicio', '$horaFinal')");
        echo "
<pre>";
        var_dump(mysqli_error_list($conn3));
        echo "</pre>";

        echo "INSERT INTO  noLaborales
                   (fecha, hora, idUsuario, idDoctor, fechaNoLaboral, nota, periodo, horaInicio, horaFinal ) VALUES
                  ('$fechar','$hora', '$usuarioM','$doctor','$fechan', '$NOTA', '$periodo', '$horaInicio', '$horaFinal')";

}

if ($formCitas == 1) {

        $Campo1 = mysqli_query($conn3, "show COLUMNS from config WHERE Field = 'CitasGoogleCalendar';");
        $nrowCampo1 = mysqli_num_rows($Campo1);
        if ($nrowCampo1 == "0") {
                mysqli_query($conn3, "ALTER TABLE `config` ADD `CitasGoogleCalendar` TEXT NULL DEFAULT 'No' COMMENT 'Activar Agregar Citas Google Calendar [Si/No] *Creado desde modulo de Configuracion[PerfilG]*'");
        }

        $Campo1 = mysqli_query($conn3, "show COLUMNS from config WHERE Field = 'google_calendar_id';");
        $nrowCampo1 = mysqli_num_rows($Campo1);
        if ($nrowCampo1 == "0") {
                mysqli_query($conn3, "ALTER TABLE `config` ADD `google_calendar_id` TEXT NULL DEFAULT '' COMMENT 'Clave Google Calendar *Creado desde modulo de Configuracion[PerfilG]*'");
        }

        $Campo1 = mysqli_query($conn3, "show COLUMNS from config WHERE Field = 'Zona_Horaria';");
        $nrowCampo1 = mysqli_num_rows($Campo1);
        if ($nrowCampo1 == "0") {
                mysqli_query($conn3, "ALTER TABLE `config` ADD `Zona_Horaria` TEXT NULL DEFAULT 'UTC' COMMENT 'Zona Horaria por predeter... UTC  *Creado desde modulo de Configuracion[PerfilG]*'");
        }

        $CitasGoogleCalendar = $_POST['CitasGoogleCalendar'];
        $google_calendar_id = $_POST['google_calendar_id'];
        $Zona_Horaria = $_POST['Zona_Horaria'];

        $query = mysqli_query($conn3, "UPDATE config SET google_calendar_id = '$google_calendar_id',CitasGoogleCalendar='$CitasGoogleCalendar',Zona_Horaria='$Zona_Horaria' WHERE ID_Usuario =   '$usuarioId' ");
}


if ($formPuntosR == 1) {

        $equivalenPuntos = $_POST['equivalenPuntos'];
        $puntosR = $_POST['puntosR'];
        $puntosPorCita = $_POST['puntosPorCita'];
        $puntosPorCita = $_POST['puntosPorCita'];
        $puntosPorCumpleannos = $_POST['puntosPorCumpleannos'];

        $query = mysqli_query($conn3, "UPDATE configPuntos SET equivalenPuntos = '$equivalenPuntos',puntosR='$puntosR',puntosPorCita='$puntosPorCita', puntosPorCumpleannos='$puntosPorCumpleannos'  WHERE ID_Usuario =   '$usuarioId' ");

        echo "UPDATE configPuntos SET equivalenPuntos = '$equivalenPuntos',puntosR='$puntosR',puntosPorCita='$puntosPorCita', puntosPorCumpleannos='$puntosPorCumpleannos'  WHERE ID_Usuario =   '$usuarioId' ";
}


if($formContabilidad == "1"){

        mysqli_query($conn3,"UPDATE Config_Contabilidad SET  Activo= '1' where id=1");
}


echo "<script language='Javascript'> window.location='config';   </script>";
