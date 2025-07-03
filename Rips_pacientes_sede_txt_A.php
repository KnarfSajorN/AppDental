<?php

header('Content-Type: application/vnd.ms-excel; charset=UTF-8');
header('Content-Disposition: attachment; filename=RipsUS.txt');
include 'funciones/conn3.php';


$desde = $_POST['desde'];
$hasta = $_POST['hasta'];

$entidadSalud1 = $_POST['entidadSalud'];
$fechaRemision = $_POST['fechaRemision'];

$cantidadRegistros=0;
$fechaHoy=date("Y-m-d");
// consulta para datos de usuario rips
$queryU=mysqli_query($conn3,"SELECT * FROM usuarios where ID=1");
$nrowU=mysqli_num_rows($queryU);
while($rowListaU=mysqli_fetch_array($queryU))
{
    $NOMBRE_USUARIO=$rowListaU['NOMBRE_USUARIO'];
    $codigoPrestador=$rowListaU['codigoPrestador'];
    $nit=$rowListaU['nit'];
}



$queryListaH=mysqli_query($conn3,"SELECT * FROM    historiaClinica1 where fecha BETWEEN '$desde' and '$hasta'");

$nrow=mysqli_num_rows($queryListaH);
while($rowListaH=mysqli_fetch_array($queryListaH))
{

    $ID_HISTORIA=$rowListaH['ID'];
    $id_cliente=$rowListaH['cliente_id'];
    $fecha=$rowListaH['Fecha'];
    $codigoConsulta =$rowListaH['codigoConsulta'];


    $queryListc=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id='$id_cliente' and cod_entidad= '$entidadSalud1' ");
    $nrowl=mysqli_num_rows($queryListc);
    while($rowc=mysqli_fetch_array($queryListc))
    {
        $nombre_cliente     =$rowc['nombre_cliente'];
        $CODI_CLIENTE       =$rowc['CODI_CLIENTE'];
        $ciudad_cliente       =$rowc['ciudad_cliente'];
        $tipo_cliente       =$rowc['tipo_cliente'];
        $genero       =$rowc['genero'];
        $direccion_cliente       =$rowc['direccion_cliente'];
        $edad_cliente       =$rowc['edad_cliente'];
        $profesion_cliente       =$rowc['profesion_cliente'];
        $acompananteFamiliar       =$rowc['acompananteFamiliar'];
        $parentesco_acompanante       =$rowc['parentesco_acompanante'];
        $entidadSalud       =$rowc['entidadSalud'];
        $seguro       =$rowc['seguro'];
        $fechaNacimiento       =$rowc['fechaNacimiento'];
        $tipoUsuario       =$rowc['tipoUsuario'];
        $entidad      =$rowc['cod_entidad'];
        $municipio      =$rowc['cod_municipio'];
        $dpto      =$rowc['cod_dpto'];
        $nombre     =$rowc['nombre'];
        $apellido    =$rowc['apellido'];
        $zona   =$rowc['zona'];



        list($anyo,$mes,$dia) = explode("-",$fechaNacimiento);
        $anyo_dif  = date("Y") - $anyo;
        $mes_dif = date("m") - $mes;
        $dia_dif   = date("d") - $dia;



        if (($mes_dif < 1 and $mes_dif >=0) and ($mes_dif<1 and $mes_dif>=0) and ($anyo_dif < 2 and $anyo_dif >= 0)) {
            $edad=  $dia_dif; 
            $unidad= 3;
        }


        if ($anyo_dif < 1 and $mes_dif>0) {
         $edad =  $mes_dif; 
         $unidad= 2;
     }
     if ($anyo_dif > 0 and $anyo_dif < 2 ) {
        $mes_dif2 = $mes_dif+12;
        $edad =  $mes_dif2; 
        $unidad= 2;
    }
    if ($anyo_dif >= 2 ) {
        if ($mes_dif<0) {
            $mes_dif = 12-($mes_dif*-1);
            $anyo_dif--;
        }
        $edad =  $anyo_dif; 
        $unidad= 1;
    }





    $cantidadRegistros=$cantidadRegistros+1;      

    echo "$tipo_cliente;$CODI_CLIENTE;$entidad;$tipoUsuario;$apellido;;$nombre;;$edad;$unidad;$genero;$dpto;$municipio;$zona"."\n";




}
}

// como el php se ejecita dos veces insertamos u verificamos nuevamente
$existe=0;

$queryZ=mysqli_query($conn3,"SELECT count(ID) as cuantos,ID FROM  informacion_rips2 where 
    usuario_id='1' and
    Fecha='$fechaHoy' and
    nombrePrestador='$NOMBRE_USUARIO' and
    codigoPrestador='$codigoPrestador' and
    TipoId='CC' and
    numeroId='$nit' and
    fechaRemision='$fechaRemision' and
    codArchivo='US' and
    codigoEntidad='$entidadSalud1';");
$nrowZ=mysqli_num_rows($queryZ);
while($rowListaZ=mysqli_fetch_array($queryZ))
{
    $existe=$rowListaZ['cuantos'];
    $id_rips=$rowListaZ['ID'];
}
if ($existe==0) {
    mysqli_query($conn3,"INSERT into informacion_rips2 
        (usuario_id, Fecha, nombrePrestador, codigoPrestador, TipoId, numeroId, fechaRemision, codArchivo, totalRegistros, codigoEntidad)
        values
        ('1','$fechaHoy','$NOMBRE_USUARIO','$codigoPrestador','CC','$nit','$fechaRemision','US','$cantidadRegistros','$entidadSalud1');");   
}elseif ($existe>0) {
    mysqli_query($conn3,"UPDATE  informacion_rips2 set
    usuario_id='1' ,
    Fecha='$fechaHoy' ,
    nombrePrestador='$NOMBRE_USUARIO' ,
    codigoPrestador='$codigoPrestador' ,
    TipoId='CC' ,
    numeroId='$nit' ,
    fechaRemision='$fechaRemision' ,
    codArchivo='US' ,
    totalRegistros='$cantidadRegistros' ,
    codigoEntidad='$entidadSalud1'
    where ID='$id_rips';");
}


?>