<?php
include "./funciones/conn3.php";
include "./funciones/funciones.php";

$historia = decrypt($_GET['iC']);

$queryList = mysqli_query($conn3, "SELECT * FROM  historiaClinicaEpic where ID = $historia");
if ($queryList) {
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {

        $cliente_id      = $rowMotorizado['cliente_id'];
        $usuario_id      = $rowMotorizado['usuario_id'];
        $Fecha           = $rowMotorizado['fecha'];
        $Hora            = $rowMotorizado['hora'];
        $tipo            = $rowMotorizado['tipo_control'];
        $detalle         = $rowMotorizado['detalle'];
        $dataJson        = json_decode($rowMotorizado['dataJson'], true);
        $CODI_CLIENTE    = funcionMaster ($cliente_id, 'cliente_id', 'CODI_CLIENTE', 'cliente');
        $servicio        = $rowMotorizado['servicio'];
        $ingreso         = $rowMotorizado['ingreso'];
        $fechaHAI        = $rowMotorizado['fecHAI'];
        $horaai          = $rowMotorizado['horai'];
        $egreso          = $rowMotorizado['egreso'];
        $fechaE          = $rowMotorizado['fechaE'];
        $horaE           = $rowMotorizado['horaE'];
        $peso            = $rowMotorizado['peso'];
        $talla           = $rowMotorizado['talla'];
        $fc              = $rowMotorizado['fc'];
        $fr              = $rowMotorizado['fr'];
        $ta              = $rowMotorizado['ta'];
        $profe           = $rowMotorizado['profe'];
        $consultam       = $rowMotorizado['consultam'];
        $enferactual     = $rowMotorizado['enferactual'];
        $antec           = $rowMotorizado['antec'];
        $psico           = $rowMotorizado['psico'];
        $diagno          = $rowMotorizado['diagno'];
        $conducta        = $rowMotorizado['conducta'];
        $cambios         = $rowMotorizado['cambios'];
        $diagEgreso      = $rowMotorizado['diagEgreso'];
        $otro            = $rowMotorizado['otro'];
        $salida          = $rowMotorizado['SALIDAP'];
        $recomenda       = $rowMotorizado['recomenda'];
    }
};
$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $usuario_id");

if ($queryList) {
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {


        $LogoF = $rowMotorizado['logoF'];
        $firma = $rowMotorizado['firma'];


        if (strlen($LogoF) > 0) {
            $Logo = "<img src='{$Base}/logos/{$LogoF}' style='height: 125px;width: 150px;margin-left: 5%;' class= 'Logo'>";
        }


        if (strlen($firma) > 0) {
            $firmaImg = "<img src='{$Base}/FirmasReg/{$firma}' height='100' width='330'>";
        }
    }
};
