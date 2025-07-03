<?php

include("../funciones/funciones.php");
include("../funciones/conn3.php");

$conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));
function HorarioGlobal($conn3, $query)
{

    $queryList2 = mysqli_query($conn3, "{$query}");
    while ($row_sucursal2 = mysqli_fetch_array($queryList2)) {

        //declarar global a la variables anteriores
        global $lt, $mt, $et, $jt, $vt, $st, $dt, $ld, $md, $ed, $jd, $vd, $sd, $dd, $lh, $mh, $eh, $jh, $vh, $sh, $dh, $ldp, $mdp, $edp, $jdp, $vdp, $sdp, $ddp, $lhp, $mhp, $ehp, $jhp, $vhp, $shp, $dhp, $sul, $sum, $sue, $suj, $suv, $sus, $sud;

        $lt = $row_sucursal2['lt'];
        $mt = $row_sucursal2['mt'];
        $et = $row_sucursal2['et'];
        $jt = $row_sucursal2['jt'];
        $vt = $row_sucursal2['vt'];
        $st = $row_sucursal2['st'];
        $dt = $row_sucursal2['dt'];

        $ld = $row_sucursal2['ld'];
        $md = $row_sucursal2['md'];
        $ed = $row_sucursal2['ed'];
        $jd = $row_sucursal2['jd'];
        $vd = $row_sucursal2['vd'];
        $sd = $row_sucursal2['sd'];
        $dd = $row_sucursal2['dd'];

        $lh = $row_sucursal2['lh'];
        $mh = $row_sucursal2['mh'];
        $eh = $row_sucursal2['eh'];
        $jh = $row_sucursal2['jh'];
        $vh = $row_sucursal2['vh'];
        $sh = $row_sucursal2['sh'];
        $dh = $row_sucursal2['dh'];

        $ldp = $row_sucursal2['ldp'];
        $mdp = $row_sucursal2['mdp'];
        $edp = $row_sucursal2['edp'];
        $jdp = $row_sucursal2['jdp'];
        $vdp = $row_sucursal2['vdp'];
        $sdp = $row_sucursal2['sdp'];
        $ddp = $row_sucursal2['ddp'];

        $lhp = $row_sucursal2['lhp'];
        $mhp = $row_sucursal2['mhp'];
        $ehp = $row_sucursal2['ehp'];
        $jhp = $row_sucursal2['jhp'];
        $vhp = $row_sucursal2['vhp'];
        $shp = $row_sucursal2['shp'];
        $dhp = $row_sucursal2['dhp'];

        $sul = $row_sucursal2['sul'];
        $sum = $row_sucursal2['sum'];
        $sue = $row_sucursal2['sue'];
        $suj = $row_sucursal2['suj'];
        $suv = $row_sucursal2['suv'];
        $sus = $row_sucursal2['sus'];
        $sud = $row_sucursal2['sud'];
    }
}

$cuantos = 0;

$fecha         = $_POST['fecha'];
$Hora         = $_POST['Hora'];
$doctor = $_POST['doctor'];
// $Sucursales   = $_POST['sucursal'];
$sucursal    = $_POST['sucursal'];
// solo para ediciones
if ($_POST['idCitas']) {
    $idCitas = $_POST['idCitas'];
    $condicionExtra = " and idCitas <> " . $idCitas . " ";
} else {
    $idCitas == '0';
    $condicionExtra = " ";
}

$HoraV = $Hora;

$dias = array('', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo');
$DiaSemana = $dias[date('N', strtotime($fecha))];

$queryList = mysqli_query($conn3, "SELECT count(idCitas) as cuantos FROM  citas where fecha = '$fecha'  and doctor = '$doctor' and estado != '5' ");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $cuantos      = $rowMotorizado['cuantos'];
}

if ($Sucursales == 0) {


    $queryList1 = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $doctor");
    $nrowl = mysqli_num_rows($queryList1);
    while ($row2 = mysqli_fetch_array($queryList1)) {

        $cantidadPacientes      = $row2['cantidadPacientes'];

        $cantidadPacientes = $row2['cantidadPacientes'];

        $lt = $row2['lt'];
        $mt = $row2['mt'];
        $et = $row2['et'];
        $jt = $row2['jt'];
        $vt = $row2['vt'];
        $st = $row2['st'];
        $dt = $row2['dt'];

        $ld = $row2['ld'];
        $md = $row2['md'];
        $ed = $row2['ed'];
        $jd = $row2['jd'];
        $vd = $row2['vd'];
        $sd = $row2['sd'];
        $dd = $row2['dd'];

        $lh = $row2['lh'];
        $mh = $row2['mh'];
        $eh = $row2['eh'];
        $jh = $row2['jh'];
        $vh = $row2['vh'];
        $sh = $row2['sh'];
        $dh = $row2['dh'];



        $ldp = $row2['ldp'];
        $mdp = $row2['mdp'];
        $edp = $row2['edp'];
        $jdp = $row2['jdp'];
        $vdp = $row2['vdp'];
        $sdp = $row2['sdp'];
        $ddp = $row2['ddp'];

        $lhp = $row2['lhp'];
        $mhp = $row2['mhp'];
        $ehp = $row2['ehp'];
        $jhp = $row2['jhp'];
        $vhp = $row2['vhp'];
        $shp = $row2['shp'];
        $dhp = $row2['dhp'];

        $sul = $row2['sul'];
        $sum = $row2['sum'];
        $sue = $row2['sue'];
        $suj = $row2['suj'];
        $suv = $row2['suv'];
        $sus = $row2['sus'];
        $sud = $row2['sud'];
    }
} else {
    $queryList1 = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $doctor");
    while ($row_sucursal1 = mysqli_fetch_array($queryList1)) {
        $tiempoConsulta          = $row_sucursal1['tiempoConsulta'];
        $cantidadPacientes = $row_sucursal1['cantidadPacientes'];
    }

    if ($sucursal != "0") {
        HorarioGlobal($conn3, "SELECT * FROM  Horario_Sistema where usuario_id = $doctor and sucursal_id= $sucursal");
    } else {
        HorarioGlobal($conn3, "SELECT * FROM  config where ID_Usuario = $doctor");
    }
}

if ($cuantos < $cantidadPacientes) {
    $cuantos2 = $cantidadPacientes - $cuantos;
}

if ($lt == 0 and $DiaSemana == 'Lunes') {
    echo "false";
} elseif ($mt == 0 and $DiaSemana == 'Martes') {
    echo "false";
} elseif ($et == 0 and $DiaSemana == 'Miercoles') {
    echo "false";
} elseif ($jt == 0 and $DiaSemana == 'Jueves') {
    echo "false";
} elseif ($vt == 0 and $DiaSemana == 'Viernes') {
    echo "false";
} elseif ($st == 0 and $DiaSemana == 'Sabado') {
    echo "false";
} elseif ($dt == 0 and $DiaSemana == 'Domingo') {
    echo "false";
} elseif ($lt == 1 and $DiaSemana == 'Lunes') {
    if (($HoraV >= $ld and  $HoraV < $lh) or ($HoraV >= $ldp and  $HoraV < $lhp)) {


        $queryList = mysqli_query($conn3, "SELECT count(idCitas) as Cuantoshora from citas where fecha = '$fecha' and (Hora <= '{$HoraV}' and horaF > '{$HoraV}') and doctor = '$doctor' and estado != '5' $condicionExtra ");
        // $queryList=mysqli_query($conn3,"SELECT count(idCitas) as Cuantoshora from citas where fecha = '$fecha' and hora = '$HoraV' and doctor = '$doctor' and estado <= '3'");

        //echo "SELECT count(idCitas) as Cuantoshora from citas where fecha = '$fecha' (Hora <==horaM}' and horaF > '{=}')'$HoraV' and doctor = '$doctor'";
        // echo "SELECT count(idCitas) as Cuantoshora from citas where fecha = '$fecha' and hora = '$HoraV' and doctor = '$doctor'";

        $nrowl = mysqli_num_rows($queryList);
        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
            $Cuantoshora      = $rowMotorizado['Cuantoshora'];
        }

        if ($Cuantoshora == 0) {
            echo "true";
        } else {
            echo "false";
        }
    } else {
        echo "false";
    }
}

// $ld $dh
elseif ($mt == 1 and $DiaSemana == 'Martes') {
    if (($HoraV >= $md and  $HoraV < $mh) or ($HoraV >= $mdp and  $HoraV < $mhp)) {

        $queryList = mysqli_query($conn3, "SELECT count(idCitas) as Cuantoshora from citas where fecha = '$fecha' and (Hora <= '{$HoraV}' and horaF > '{$HoraV}') and doctor = '$doctor' and estado != '5' $condicionExtra ");
        // $queryList=mysqli_query($conn3,"SELECT count(idCitas) as Cuantoshora from citas where fecha = '$fecha' and hora = '$HoraV' and doctor = '$doctor' and estado <= '3'");
        $nrowl = mysqli_num_rows($queryList);
        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
            $Cuantoshora      = $rowMotorizado['Cuantoshora'];
        }

        if ($Cuantoshora == 0) {
            echo "true";
        } else {
            echo "false";
        }
    } else {
        echo "false";
    }
} elseif ($et == 1 and $DiaSemana == 'Miercoles') {

    if (($HoraV >= $ed and  $HoraV < $eh) or ($HoraV >= $edp and  $HoraV < $ehp)) {

        $queryList = mysqli_query($conn3, "SELECT count(idCitas) as Cuantoshora from citas where fecha = '$fecha' and (Hora <= '{$HoraV}' and horaF > '{$HoraV}') and doctor = '$doctor' and estado != '5' $condicionExtra ");
        // $queryList=mysqli_query($conn3,"SELECT count(idCitas) as Cuantoshora from citas where fecha = '$fecha' and hora = '$HoraV' and doctor = '$doctor' and estado <= '3'");
        $nrowl = mysqli_num_rows($queryList);
        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
            $Cuantoshora      = $rowMotorizado['Cuantoshora'];
        }

        if ($Cuantoshora == 0) {
            echo "true";
        } else {
            echo "false";
        }
    } else {
        echo "false";
    }
} elseif ($jt == 1 and $DiaSemana == 'Jueves') {
    if (($HoraV >= $jd and  $HoraV < $jh) or ($HoraV >= $jdp and  $HoraV < $jhp)) {


        $queryList = mysqli_query($conn3, "SELECT count(idCitas) as Cuantoshora from citas where fecha = '$fecha' and (Hora <= '{$HoraV}' and horaF > '{$HoraV}') and doctor = '$doctor' and estado != '5' $condicionExtra ");
        // $queryList=mysqli_query($conn3,"SELECT count(idCitas) as Cuantoshora from citas where fecha = '$fecha' and hora = '$HoraV' and doctor = '$doctor' and estado <= '3'");
        $nrowl = mysqli_num_rows($queryList);
        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
            $Cuantoshora      = $rowMotorizado['Cuantoshora'];
        }
        //echo "SELECT count(idCitas) as Cuantoshora from citas where fecha = '$fecha' and (Hora <= '{$HoraV}' and horaF > '{$HoraV}') and doctor = '$doctor' and estado <= '3' $condicionExtra ";
        if ($Cuantoshora == 0) {
            echo "true";
        } else {
            echo "false";
        }
    } else {
        echo "false";
    }
} elseif ($vt == 1 and $DiaSemana == 'Viernes') {

    if (($HoraV >= $vd and  $HoraV < $vh) or ($HoraV >= $vdp and  $HoraV < $vhp)) {

        $queryList = mysqli_query($conn3, "SELECT count(idCitas) as Cuantoshora from citas where fecha = '$fecha' and (Hora <= '{$HoraV}' and horaF > '{$HoraV}') and doctor = '$doctor' and estado != '5' $condicionExtra ");
        // $queryList=mysqli_query($conn3,"SELECT count(idCitas) as Cuantoshora from citas where fecha = '$fecha' and hora = '$HoraV' and doctor = '$doctor' and estado <= '3'");
        $nrowl = mysqli_num_rows($queryList);
        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
            $Cuantoshora      = $rowMotorizado['Cuantoshora'];
        }

        if ($Cuantoshora == 0) {
            echo "true";
        } else {
            echo "false";
        }
    } else {
        echo "false";
    }
} elseif ($st == 1 and $DiaSemana == 'Sabado') {

    if (($HoraV >= $sd and  $HoraV < $sh) or ($HoraV >= $sdp and  $HoraV < $shp)) {


        $queryList = mysqli_query($conn3, "SELECT count(idCitas) as Cuantoshora from citas where fecha = '$fecha' and (Hora <= '{$HoraV}' and horaF > '{$HoraV}') and doctor = '$doctor' and estado != '5' $condicionExtra ");
        // $queryList=mysqli_query($conn3,"SELECT count(idCitas) as Cuantoshora from citas where fecha = '$fecha' and hora = '$HoraV' and doctor = '$doctor' and estado <= '3'");
        $nrowl = mysqli_num_rows($queryList);
        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
            $Cuantoshora      = $rowMotorizado['Cuantoshora'];
        }

        if ($Cuantoshora == 0) {
            echo "true";
        } else {
            echo "false";
        }
    } else {
        echo "false";
    }
} elseif ($dt == 1 and $DiaSemana == 'Domingo') {

    if (($HoraV >= $dd and  $HoraV < $dh) or ($HoraV >= $ddp and  $HoraV < $dhp)) {

        $queryList = mysqli_query($conn3, "SELECT count(idCitas) as Cuantoshora from citas where fecha = '$fecha' and (Hora <= '{$HoraV}' and horaF > '{$HoraV}') and doctor = '$doctor' and estado != '5' $condicionExtra ");
        // $queryList=mysqli_query($conn3,"SELECT count(idCitas) as Cuantoshora from citas where fecha = '$fecha' and hora = '$HoraV' and doctor = '$doctor' and estado <= '3'");
        $nrowl = mysqli_num_rows($queryList);
        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
            $Cuantoshora      = $rowMotorizado['Cuantoshora'];
        }

        if ($Cuantoshora == 0) {
            echo "true";
        } else {
            echo "false";
        }
    } else {
        echo "false";
    }
} else {
    echo "false";
}
