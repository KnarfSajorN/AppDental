<?php
include("funciones/conn3.php");


// $conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));
$conn3 = mysqli_connect($server, $user, $pass, $dbname) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));
$sucursal = $_POST["sucursal"];
$usuario = $_POST["usuario"];

if ($sucursal == "0") {
    $campos = 'lt, mt, et, jt, vt, st, dt,ld, md, ed, jd, vd, sd, dd,lh, mh, eh, jh, vh, sh, dh, ldp, mdp, edp, jdp, vdp, sdp, ddp, lhp, mhp, ehp, jhp, vhp, shp, dhp';
    $fetchData = mysqli_query($conn3, "SELECT {$campos} FROM  config where ID_Usuario=$usuario limit 1");
} else {
    $campos = 'lt, mt, et, jt, vt, st, dt,ld, md, ed, jd, vd, sd, dd,lh, mh, eh, jh, vh, sh, dh, ldp, mdp, edp, jdp, vdp, sdp, ddp, lhp, mhp, ehp, jhp, vhp, shp, dhp';
    $fetchData = mysqli_query($conn3, "SELECT {$campos} FROM  Horario_Sistema where usuario_id=$usuario AND sucursal_id=$sucursal limit 1");
}

$data = array();
while ($row = mysqli_fetch_array($fetchData)) {
    foreach ($row as $key => $value) {
        $datos["$key"] = "$value";
    }
}

echo json_encode($datos);
