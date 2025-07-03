<?php
//I. Anamnesis
include 'funciones/conn3.php';
date_default_timezone_set('America/Bogota');
$fechar                = date("Y-m-d");
$time = time();
$time = date("H:i:s", $time);


$usuario_id     = $_POST['ID'];
$idcliente     = $_POST['clienteId'];


//Entrevista Inicial

$entrevista = '';
$tipo = isset($_POST['tipoConsulta']) ? $_POST['tipoConsulta'] : '';
$motivoConsulta = isset($_POST['motivoConsulta']) ? $_POST['motivoConsulta'] : '';
$enfermedadActual = isset($_POST['enfermedadActual']) ? $_POST['enfermedadActual'] : '';

$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id=$idcliente");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $celular_cliente = $rowMotorizado['celular_cliente'];
    $autorizacion = $rowMotorizado['autorizacion'];
}


ob_start();
?>

<table width="100%">
    <tr>
        <td width="9%"></td>
        <td width="82%" align="center" style="background-color: #374850;    padding: 10px!important;color: white;">
            I. Entrevista Inicial
        </td>
        <td width="9%"></td>

    </tr>
    <tr>
        <td width="9%"></td>
        <td width="82%" style="border: 1px solid #000000">
            <strong>Tipo de Consulta:</strong>
        </td>
        <td width="9%"></td>
    </tr>
    <tr>
        <td width="9%"></td>
        <td width="82%" style="border: 1px solid #000000">
            <?php echo $tipo; ?>
        </td>
        <td width="9%"></td>
    </tr>
    <tr>

    <tr>
        <td width="9%"></td>
        <td width="82%" style="border: 1px solid #000000">
            <strong>Numero de Autorizacion:</strong>
        </td>
        <td width="9%"></td>
    </tr>
    <tr>
        <td width="9%"></td>
        <td width="82%" style="border: 1px solid #000000">
            <strong><?php echo $autorizacion; ?></strong>
        </td>
        <td width="9%"></td>
    </tr>

    <td width="9%"></td>
    <td width="82%" style="border: 1px solid #000000">
        <strong>Motivo de la Consulta:</strong>
    </td>
    <td width="9%"></td>
    </tr>
    <tr>
        <td width="9%"></td>
        <td width="82%" style="border: 1px solid #000000">
            <?php echo $motivoConsulta; ?>
        </td>
        <td width="9%"></td>
    </tr>
    <tr>
        <td width="9%"></td>
        <td width="82%" style="border: 1px solid #000000">
            <strong>Enfermedad Actual:</strong>
        </td>
        <td width="9%"></td>
    </tr>
    <tr>
        <td width="9%"></td>
        <td width="82%" style="border: 1px solid #000000">
            <?php echo $enfermedadActual; ?>
        </td>
        <td width="9"></td>
    </tr>
    <td>
    </td>
    </tr>
</table>

<?php
$entrevista = ob_get_contents();

$anamnesis = '';

$i = 0;
$I = isset($_POST['I']) ? $_POST['I'] : '';
ob_start();
?>
<!--
<table width="100%">
    <tr>
        <td></td>
        <td colspan="5" align="center" style="background-color: #374850;    padding: 10px!important;color: white;">
            I. Anamnesis
        </td>
        <td></td>
    </tr>
    <tr>
        <td width="9%">
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Diabetes:</strong>
            <?php echo $I[$i];
            $i++; ?>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Hta:</strong>
            <?php echo $I[$i];
            $i++; ?>
        </td>
        <td>
            &nbsp;
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Cáncer:</strong>
            <?php echo $I[$i];
            $i++; ?>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Enf. Reumat:</strong>
            <?php echo $I[$i];
            $i++; ?>
        </td>
        <td width="9%">
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Cardiopatías:</strong>
            <?php echo $I[$i];
            $i++; ?>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Cirugías:</strong>
            <?php echo $I[$i];
            $i++; ?>
        </td>
        <td>
            &nbsp;
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Alergias:</strong>
            <?php echo $I[$i];
            $i++; ?>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Transfusiones:</strong>
            <?php echo $I[$i];
            $i++; ?>
        </td>
        <td>
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Accidentes:</strong>
            <?php echo $I[$i];
            $i++; ?>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Fracturas:</strong>
            <?php echo $I[$i];
            $i++; ?>
        </td>
        <td>
            &nbsp;
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Signos Vitales:</strong>
            <?php echo $I[$i];
            $i++; ?>
        </td>
        <td width="20%" style="border: 1px solid #000000">
        </td>
        <td>
        </td>
    </tr>

</table>  -->

<?php


//$anamnesis = ob_get_contents(); 

//II. Examen fisico postural

$examen_fisico_postural = '';

$II_actitud_postural = isset($_POST['II_actitud_postural']) ? $_POST['II_actitud_postural'] : '';
$II_detalles = isset($_POST['II_detalles']) ? $_POST['II_detalles'] : '';
$II_color = isset($_POST['II_color']) ? $_POST['II_color'] : '';
$II_estado = isset($_POST['II_estado']) ? $_POST['II_estado'] : '';
$II_edema = isset($_POST['II_edema']) ? $_POST['II_edema'] : '';
$II_tumefaccion = isset($_POST['II_tumefaccion']) ? $_POST['II_tumefaccion'] : '';
$II_escaras = isset($_POST['II_escaras']) ?  $_POST['II_escaras'] : '';
$II_heridas = isset($_POST['II_heridas']) ? $_POST['II_heridas'] : '';
$II_cicatriz = isset($_POST['II_cicatriz']) ? $_POST['II_cicatriz'] : '';

ob_start();
?>

<table width="100%">
    <tr>
        <td width="9%"></td>
        <td width="82%" colspan="5" align="center" style="background-color: #374850;    padding: 10px!important;color: white;">
            II. Examen Fisico Postural
        </td>
        <td width="9%"></td>
    </tr>
    <tr>
        <td width="9%"></td>
        <td width="40%" colspan="2" align="center" style="background-color: #3c8dbc;    padding: 10px!important;color: white;">
            Actitud postural
        </td>
        <td>&nbsp;</td>
        <td width="40%" colspan="2" align="center" style="background-color: #3c8dbc;    padding: 10px!important;color: white;">
            Evaluación de la piel
        </td>
        <td width="9%"></td>
    </tr>
    <tr>
        <td width="9%">
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Actitud postural:</strong>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $II_actitud_postural; ?>
        </td>
        <td>
            &nbsp;
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Color:</strong>
            <?php echo $II_color; ?>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Estado:</strong>
            <?php echo $II_estado; ?>
        </td>
        <td width="9%">
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td rowspan="3" style="border: 1px solid #000000">
            <strong>Detalles:</strong>
        </td>
        <td rowspan="3" style="border: 1px solid #000000">
            <?php echo $II_detalles; ?>
        </td>
        <td>
            &nbsp;
        </td>
        <td style="border: 1px solid #000000">
            <strong>Edema:</strong>
            <?php echo $II_edema; ?>
        </td>
        <td style="border: 1px solid #000000">
            <strong>Tumefacción:</strong>
            <?php echo $II_tumefaccion; ?>
        </td>
        <td>
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            &nbsp;
        </td>
        <td style="border: 1px solid #000000">
            <strong>Escaras:</strong>
            <?php echo $II_escaras; ?>
        </td>
        <td style="border: 1px solid #000000">
            <strong>Heridas:</strong>
            <?php echo $II_heridas; ?>
        </td>
        <td>
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            &nbsp;
        </td>
        <td style="border: 1px solid #000000">
            <strong>Cicatriz:</strong>
            <?php echo $II_cicatriz; ?>
        </td>
        <td style="border: 1px solid #000000">
        </td>
        <td>
        </td>
    </tr>
</table>

<?php
$examen_fisico_postural = ob_get_contents();


//III. Evaluación Del Dolor

$evaluación_dolor = '';

$III_intensidad = isset($_POST['III_intensidad']) ? $_POST['III_intensidad'] : '';
$III_zona_dolor = isset($_POST['III_zona_dolor']) ? $_POST['III_zona_dolor'] : '';
$III_presente = isset($_POST['III_presente']) ? $_POST['III_presente'] : '';
$III_durante = isset($_POST['III_durante']) ? $_POST['III_durante'] : '';

ob_start();
?>

<table width="100%">
    <tr>
        <td></td>
        <td colspan="5" align="center" style="background-color: #374850;    padding: 10px!important;color: white;">
            III. Evaluación Del Dolor
        </td>
        <td></td>
    </tr>
    <tr>
        <td width="9%"></td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Intensidad:</strong>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $III_intensidad; ?>
        </td>
        <td>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Presente en:</strong>
            <?php echo $III_presente; ?>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Durante:</strong>
            <?php echo $III_durante; ?>
        </td>
        <td width="9%"></td>
    </tr>
    <tr>
        <td>
        </td>
        <td style="border: 1px solid #000000">
            <strong>Zona de dolor:</strong>
        </td>
        <td style="border: 1px solid #000000">
            <?php echo $III_zona_dolor; ?>
        </td>
        <td>
        </td>
        <td style="border: 1px solid #000000">
        </td>
        <td style="border: 1px solid #000000">
        </td>
        <td>
        </td>
    </tr>
</table>

<?php
$evaluación_dolor = ob_get_contents();

//IV. Evaluación De La Sensibilidad

$evaluación_sensibilidad = '';

$IV_superficial = isset($_POST['IV_superficial']) ? $_POST['IV_superficial'] : '';
$IV_detalles_superficial = isset($_POST['IV_detalles_superficial']) ? $_POST['IV_detalles_superficial'] : '';
$IV_profunda = isset($_POST['IV_profunda']) ? $_POST['IV_profunda'] : '';
$IV_detalles_profunda = isset($_POST['IV_detalles_profunda']) ? $_POST['IV_detalles_profunda'] : '';

ob_start();
?>

<table width="100%">
    <tr>
        <td></td>
        <td colspan="5" align="center" style="background-color: #374850;    padding: 10px!important;color: white;">
            IV. Evaluación De La Sensibilidad
        </td>
        <td></td>
    </tr>
    <tr>
        <td width="9%"></td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Superficial:</strong>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $IV_superficial; ?>
        </td>
        <td></td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Profunda:</strong>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $IV_profunda; ?>
        </td>
        <td width="9%"></td>
    </tr>

    <tr>
        <td width="9%"></td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Detalles:</strong>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $IV_detalles_superficial; ?>
        </td>
        <td></td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Detalles:</strong>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $IV_detalles_profunda; ?>
        </td>
        <td width="9%"></td>
    </tr>
</table>

<?php

$evaluación_sensibilidad = ob_get_contents();

//V. Evaluación Osteoarticular

$evaluación_osteoarticular = '';

$V_estado_articular = isset($_POST['V_estado_articular']) ? $_POST['V_estado_articular'] : '';
$V_detalles_estado_articular = isset($_POST['V_detalles_estado_articular']) ? $_POST['V_detalles_estado_articular'] : '';
$V_amplitud_articular = isset($_POST['V_amplitud_articular']) ? $_POST['V_amplitud_articular'] : '';
$V_detalles_amplitud_articular = isset($_POST['V_detalles_amplitud_articular']) ? $_POST['V_detalles_amplitud_articular'] : '';

ob_start();
?>
<!--
<table width="100%">
    <tr>
        <td></td>
        <td colspan="5" align="center" style="background-color: #374850;    padding: 10px!important;color: white;">
            V. Evaluación Osteoarticular
        </td>
        <td></td>
    </tr>
    <tr>
        <td width="9%"></td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Estado articular:</strong>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $V_estado_articular; ?>
        </td>
        <td></td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Amplitud articular:</strong>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $V_amplitud_articular; ?>
        </td>
        <td width="9%"></td>
    </tr>
    <tr>
        <td width="9%"></td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Detalles:</strong>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $V_detalles_estado_articular; ?>
        </td>
        <td></td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Detalles:</strong>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $V_detalles_amplitud_articular; ?>
        </td>
        <td width="9%"></td>
    </tr>
</table> -->

<?php
//$evaluación_osteoarticular = ob_get_contents();


//VI. Evaluación Neuromuscular

$evaluación_neuromuscular = '';

//1-Parte
$VI_tono = isset($_POST['VI_tono']) ? $_POST['VI_tono'] : '';
$VI_especificar_tono = isset($_POST['VI_especificar_tono']) ? $_POST['VI_especificar_tono'] : '';
$VI_trofismo = isset($_POST['VI_trofismo']) ? $_POST['VI_trofismo'] : '';
$VI_especificar_trofismo = isset($_POST['VI_especificar_trofismo']) ? $_POST['VI_especificar_trofismo'] : '';
$VI_elasticidad = isset($_POST['VI_elasticidad']) ? $_POST['VI_elasticidad'] : '';
$VI_especificar_elastisidad = isset($_POST['VI_especificar_elastisidad']) ? $_POST['VI_especificar_elastisidad'] : '';
$VI_fuerza = isset($_POST['VI_fuerza']) ? $_POST['VI_fuerza'] : '';
$VI_especificar_fuerza = isset($_POST['VI_especificar_fuerza']) ? $_POST['VI_especificar_fuerza'] : '';
//------------------------------------------------------------------------------------------------
ob_start();
?>

<table width="100%">
    <tr>
        <td></td>
        <td colspan="5" align="center" style="background-color: #374850;    padding: 10px!important;color: white;">
            V. Evaluación Neuromuscular
        </td>
        <td></td>
    </tr>
    <tr>
        <td width="9%"></td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Tono:</strong>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $VI_tono; ?>
        </td>
        <td></td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Trofismo:</strong>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $VI_trofismo; ?>
        </td>
        <td width="9%"></td>
    </tr>
    <tr>
        <td width="9%"></td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Especificar:</strong>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $VI_especificar_tono; ?>
        </td>
        <td></td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Especificar:</strong>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $VI_especificar_trofismo; ?>
        </td>
        <td width="9%"></td>
    </tr>
    <tr>
        <td width="9%"></td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Elasticidad:</strong>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $VI_elasticidad; ?>
        </td>
        <td></td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Fuerza:</strong>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $VI_fuerza; ?>
        </td>
        <td width="9%"></td>
    </tr>
    <tr>
        <td width="9%"></td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Especificar:</strong>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $VI_especificar_elastisidad; ?>
        </td>
        <td></td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Especificar:</strong>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $VI_especificar_fuerza; ?>
        </td>
        <td width="9%"></td>
    </tr>
</table>

<?php
//VI. Evaluación Neuromuscular

//2-Parte
$i = 0;
$VI_em = isset($_POST['VI_em']) ? $_POST['VI_em'] : '';
/*//------------------------------------------------------------------------------------------------
?>

<table width="100%">
    <tr>
        <td></td>
        <td colspan="5" align="center" style="background-color: #3c8dbc;    padding: 10px!important;color: white;">
            Evaluación muscular
        </td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="2" align="center" style="background-color: #374850;    padding: 10px!important;color: white;">
            Evaluación 1 fecha
        </td>
        <td></td>
        <td colspan="2" align="center" style="background-color: #374850;    padding: 10px!important;color: white;">
            Evaluación 2 fecha
        </td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td align="center" style="background-color: #3c8dbc;    padding: 10px!important;color: white;">
            Izquierda
        </td>
        <td align="center" style="background-color: #3c8dbc;    padding: 10px!important;color: white;">
            Derecha
        </td>
        <td></td>
        <td align="center" style="background-color: #3c8dbc;    padding: 10px!important;color: white;">
            Izquierda
        </td>
        <td align="center" style="background-color: #3c8dbc;    padding: 10px!important;color: white;">
            Derecha
        </td>
        <td></td>
    </tr>
    <tr>
        <td width="9%" align="center" style="background-color: #3c8dbc;!important;color: white;">
            M. Sup
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $VI_em[$i]; $i++; ?>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $VI_em[$i]; $i++; ?>
        </td>
        <td></td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $VI_em[$i]; $i++; ?>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $VI_em[$i]; $i++; ?>
        </td>
        <td width="9%" align="center" style="background-color: #3c8dbc;!important;color: white;">
            M. Sup
        </td>
    </tr>
    <tr>
        <td width="9%" align="center" style="background-color: #3c8dbc;!important;color: white;">
            M. Inf
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $VI_em[$i]; $i++; ?>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $VI_em[$i]; $i++; ?>
        </td>
        <td></td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $VI_em[$i]; $i++; ?>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $VI_em[$i]; $i++; ?>
        </td>
        <td width="9%" align="center" style="background-color: #3c8dbc;!important;color: white;">
            M. Inf
        </td>
    </tr>
    <tr>
        <td width="9%" align="center" style="background-color: #3c8dbc;!important;color: white;">
            Tronco
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $VI_em[$i]; $i++; ?>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $VI_em[$i]; $i++; ?>
        </td>
        <td></td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $VI_em[$i]; $i++; ?>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $VI_em[$i]; $i++; ?>
        </td>
        <td width="9%" align="center" style="background-color: #3c8dbc;!important;color: white;">
            Tronco
        </td>
    </tr>
    <tr>
        <td width="9%" align="center" style="background-color: #3c8dbc;!important;color: white;">
            Cuello
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $VI_em[$i]; $i++; ?>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $VI_em[$i]; $i++; ?>
        </td>
        <td></td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $VI_em[$i]; $i++; ?>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $VI_em[$i]; $i++; ?>
        </td>
        <td width="9%" align="center" style="background-color: #3c8dbc;!important;color: white;">
            Cuello
        </td>
    </tr>
</table>


<?php
*/
//VI. Evaluación Neuromuscular

//3-Parte
$VI_apellidos_nombres = isset($_POST['VI_apellidos_nombres']) ? $_POST['VI_apellidos_nombres'] : '';
$VI_diagnostico = isset($_POST['VI_diagnostico']) ? $_POST['VI_diagnostico'] : '';
//------------------------------------------------------------------------------------------------
?>

<table width="100%">
    <tr>
        <td></td>
        <td colspan="5" align="center" style="background-color: #3c8dbc;    padding: 10px!important;color: white;">
            Goniometría movimiento articular
        </td>
        <td></td>
    </tr>
    <tr>
        <td width="9%"></td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Apellidos y Nombres:</strong>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $VI_apellidos_nombres; ?>
        </td>
        <td></td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Diagnóstico:</strong>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $VI_diagnostico; ?>
        </td>
        <td width="9%"></td>
    </tr>
</table>

<?php
//VI. Evaluación Neuromuscular

//4-Parte
$i = 0;
$VI_gma = isset($_POST['VI_gma']) ? $_POST['VI_gma'] : '';
//------------------------------------------------------------------------------------------------
?>
<style type="text/css">
    .strong {
        color: #ffffff;
        background-color: #3c8dbc;
        padding: 10px;
        font-size: 14px;
    }

    .inputs {
        border: 1px solid #000000;
    }
</style>
<!--
<table width="100%">
    <tr>
        <td></td>
        <td colspan="5" align="center" style="background-color: #3c8dbc;    padding: 10px!important;color: white;">
            Goniometría movimiento articular
        </td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="2" align="center" style="background-color: #374850; padding: 10px!important;color: white;">
            Derecho
        </td>
        <td></td>
        <td colspan="2" align="center" style="background-color: #374850;    padding: 10px!important;color: white;">
            Izquierdo
        </td>
        <td></td>
    </tr>
    <tr>
        <td  width="9%"></td>
        <td align="center" style="background-color: #3c8dbc;    padding: 10px!important;color: white;">
            Fecha 1
        </td>
        <td align="center" style="background-color: #3c8dbc;    padding: 10px!important;color: white;">
            Fecha 2
        </td>
        <td></td>
        <td align="center" style="background-color: #3c8dbc;    padding: 10px!important;color: white;">
            Fecha 1
        </td>
        <td align="center" style="background-color: #3c8dbc;    padding: 10px!important;color: white;">
            Fecha 2
        </td>
        <td width="9%"></td>
    </tr>
    <tr>
        <td rowspan="6" width="120" align="center"
            class="strong"><strong>Hombro</strong>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">FLEXION 0°
            - 180°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td rowspan="6" width="120" align="center"
            class="strong"><strong>Hombro</strong>
        </td>
    </tr>
    <tr>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">EXTENSION
            0° - 50°-60°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
    </tr>
    <tr>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">ABDUCCION
            0° - 180°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
    </tr>
    <tr>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">ADD HORIZ.
            0° - 120°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
    </tr>
    <tr>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">ROT INT.
            0° - 70°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
    </tr>
    <tr>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">ROT. EXT.
            0° - 90°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
    </tr>

    <tr>
        <td colspan="7" width="120" align="center" class="strong">
        </td>
    </tr>

    <!-- Codo y antebrazo-->

<!--<tr>
        <td rowspan="4" width="120" align="center"
            class="strong"><strong>Codo y
                Antebrazo</strong></td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">FLEXIÓN 0°
            - 145° 150°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td rowspan="4" width="120" align="center"
            class="strong"><strong>Codo y
                Antebrazo</strong></td>
    </tr>
    <tr>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">EXTENSIÓN
            145° - 0°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
    </tr>
    <tr>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">PRONACIÓN
            0° - 90°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
    </tr>
    <tr>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">SUPINACIÓN
            0° - 90°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
    </tr>

    <tr>
        <td colspan="7" width="120" align="center" class="strong">
        </td>
    </tr>
    <!-- Muñeca-->

<!--<tr>
        <td rowspan="4" width="120" align="center"
            class="strong"><strong>Muñeca</strong>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">FLEXIÓN 0°
            - 90°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td rowspan="4" width="120" align="center"
            class="strong"><strong>Muñeca</strong>
        </td>
    </tr>
    <tr>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">EXTENSIÓN.
            0° - 70°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
    </tr>
    <tr>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">DESV. RAD
            0° - 25° 30°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
    </tr>
    <tr>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">DESV. CUB.
            . 0° - 30°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
    </tr>

    <tr>
        <td colspan="7" width="120" align="center" class="strong">
        </td>
    </tr>
    <!-- 1 dedo de la mano-->

<!--<tr>
        <td rowspan="3" width="120" align="center"
            class="strong"><strong>1 Dedo de la
                Mano</strong></td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">FLEX IF 0°
            - 80°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td rowspan="3" width="120" align="center"
            class="strong"><strong>1 Dedo de la
                Mano</strong></td>
    </tr>
    <tr>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">FLEX MCF
            0° - 50°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
    </tr>
    <tr>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">ABD 0° -
            60°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
    </tr>

    <tr>
        <td colspan="7" width="120" align="center" class="strong">
        </td>
    </tr>

    <!-- Cadera-->

<!--<tr>
        <td rowspan="7" width="120" align="center"
            class="strong"><strong>Cadera</strong>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">FLEX C/
            RODILLA FLEX 0° - 125°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td rowspan="7" width="120" align="center"
            class="strong"><strong>Cadera</strong>
        </td>
    </tr>

    <tr>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">EXT CON
            RODILLA EXT 0° - 15º
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
    </tr>
    <tr>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">EXT CON
            RODILLA FLEX 0° - 10º
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
    </tr>
    <tr>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">ABDUCCIÓN
            0°-45°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
    </tr>
    <tr>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">ADDUCIÓN
            0°-20°-30°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
    </tr>
    <tr>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">ROT. INT.
            0°-30°-45°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
    </tr>
    <tr>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">ROT .EXT.
            0°-30°-45°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
    </tr>
    <tr>
        <td colspan="7" width="120" align="center" class="strong">
        </td>
    </tr>
    <!-- Rodilla-->

<!--<tr>
        <td rowspan="2" width="120" align="center"
            class="strong"><strong>Rodilla</strong>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">FLEXIÓN
            0°-140°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td rowspan="2" width="120" align="center"
            class="strong"><strong>Rodilla</strong>
        </td>
    </tr>

    <tr>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">EXTENSIÓN
            140°-0°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
    </tr>

    <tr>
        <td colspan="7" width="120" align="center" class="strong">
        </td>
    </tr>
    <!-- Tobillo y Pie-->

<!--<tr>
        <td rowspan="4" width="120" align="center"
            class="strong"><strong>Tobillo y
                Pie</strong></td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            DORSIFLEXIÓN 0°-20°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td rowspan="4" width="120" align="center"
            class="strong"><strong>Tobillo y
                Pie</strong></td>
    </tr>

    <tr>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">FLEX
            PLANTAR 0°-45°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
    </tr>
    <tr>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">INVERSIÓN
            0°-30°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
    </tr>
    <tr>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">EVERSIÓN
            0°-25°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
    </tr>

    <tr>
        <td colspan="7" width="120" align="center" class="strong">
        </td>
    </tr>
    <!-- Columna Cervical-->

<!--<tr>
        <td rowspan="4" width="120" align="center"
            class="strong"><strong>Columna
                Cervical</strong></td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">FLEXIÓN
            0°-45°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td rowspan="4" width="120" align="center"
            class="strong"><strong>Columna
                Cervical</strong></td>
    </tr>

    <tr>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">EXTENSIÓN
            0°-45°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
    </tr>
    <tr>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            LATERALIZACIÓN 0°-45-60°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
    </tr>
    <tr>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">ROTACIÓN
            0°-60-70°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
    </tr>

    <tr>
        <td colspan="7" width="120" align="center" class="strong">
        </td>
    </tr>
    <!-- Tronco-->

<!--<tr>
        <td rowspan="4" width="120" align="center"
            class="strong"><strong>Tronco</strong>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">FLEXIÓN
            0°-80°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td rowspan="4" width="120" align="center"
            class="strong"><strong>Tronco</strong>
        </td>
    </tr>

    <tr>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">EXTENSIÓN
            0°-30°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
    </tr>
    <tr>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            LATERALIZACIÓN 0°-20°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
    </tr>
    <tr>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">ROTACIÓN
            0°-45°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i];
            $i++; ?>
        </td>
    </tr>
</table>-->

<?php
$evaluación_osteoarticular = ob_get_contents();

//VII. Evaluación de la marcha y equilibrio

$evaluación_marcha_equilibrio = '';

$VII_Observaciones = isset($_POST['VII_Observaciones']) ? $_POST['VII_Observaciones'] : '';
ob_start();
?>
<!--
<table width="100%">
    <tr>
        <td></td>
        <td colspan="5" align="center" style="background-color: #374850;    padding: 10px!important;color: white;">
            VII. Evaluación de la marcha y equilibrio
        </td>
        <td></td>
    </tr>
    <tr>
        <td width="9%">
        </td>
        <td colspan="2" width="40%" style="border: 1px solid #000000">
            <strong>Observaciones:</strong>
        </td>
        <td>
            &nbsp;
        </td>
        <td colspan="2" width="40%" style="border: 1px solid #000000">
            <?php echo $VII_Observaciones; ?>
        </td>
        <td width="9%">
        </td>
    </tr>
</table> -->

<?php
//$evaluación_marcha_equilibrio = ob_get_contents();

//VIII. Actividad Motora Funcional

$actividad_motora_funcional = '';

$VIII_dcs_dcp = isset($_POST['VIII_dcs_dcp']) ? $_POST['VIII_dcs_dcp'] : '';
$VIII_descripcion_dcs_dcp = isset($_POST['VIII_descripcion_dcs_dcp']) ? $_POST['VIII_descripcion_dcs_dcp'] : '';
$VIII_4ptos_Rod = isset($_POST['VIII_4ptos_Rod']) ? $_POST['VIII_4ptos_Rod'] : '';
$VIII_descripcion_4ptos_Rod = isset($_POST['VIII_descripcion_4ptos_Rod']) ? $_POST['VIII_descripcion_4ptos_Rod'] : '';
$VIII_dcp_dcl = isset($_POST['VIII_dcp_dcl']) ? $_POST['VIII_dcp_dcl'] : '';
$VIII_descripcion_dcp_dcl = isset($_POST['VIII_descripcion_dcp_dcl']) ? $_POST['VIII_descripcion_dcp_dcl'] : '';
$VIII_rod_marat = isset($_POST['VIII_rod_marat']) ? $_POST['VIII_rod_marat'] : '';
$VIII_descripcion_rod_marat = isset($_POST['VIII_descripcion_rod_marat']) ? $_POST['VIII_descripcion_rod_marat'] : '';
$VIII_dcs_sdt = isset($_POST['VIII_dcs_sdt']) ? $_POST['VIII_dcs_sdt'] : '';
$VIII_descripcion_dcs_sdt = isset($_POST['VIII_descripcion_dcs_sdt']) ? $_POST['VIII_descripcion_dcs_sdt'] : '';
$VIII_marat_bip = isset($_POST['VIII_marat_bip']) ? $_POST['VIII_marat_bip'] : '';
$VIII_descripcion_marat_bip = isset($_POST['VIII_descripcion_marat_bip']) ? $_POST['VIII_descripcion_marat_bip'] : '';
$VIII_dcp_4ptos = isset($_POST['VIII_dcp_4ptos']) ? $_POST['VIII_dcp_4ptos'] : '';
$VIII_descripcion_dcp_4ptos = isset($_POST['VIII_descripcion_dcp_4ptos']) ? $_POST['VIII_descripcion_dcp_4ptos'] : '';
$VIII_sdt_bip = isset($_POST['VIII_sdt_bip']) ? $_POST['VIII_sdt_bip'] : '';
$VIII_descripcion_sdt_bip = isset($_POST['VIII_descripcion_sdt_bip']) ? $_POST['VIII_descripcion_sdt_bip'] : '';
$actividad_motora = isset($_POST['actividad_motora']) ? $_POST['actividad_motora'] : '';

ob_start();
?>

<table width="100%">
    <tr>
        <!--<td width="9%"></td>
        <td colspan="5" align="center" style="background-color: #374850;    padding: 10px!important;color: white;">
            VIII. Actividad Motora Funcional
        </td>
        <td width="9%"></td>
    </tr>-->
        <!--<tr>
        <td>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Dcs-Dcp:</strong>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $VIII_dcs_dcp; ?>
        </td>
        <td>
            &nbsp;
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>4ptos-Rod:</strong>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $VIII_4ptos_Rod; ?>
        </td>
        <td>
        </td>
    </tr>-->
        <!-- <tr>
        <td>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Descripción:</strong>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $VIII_descripcion_dcs_dcp; ?>
        </td>
        <td>
            &nbsp;
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Descripción:</strong>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $VIII_descripcion_4ptos_Rod; ?>
        </td>
        <td>
        </td>
    </tr>-->
        <!--<tr>
        <td>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Dcp-Dcl:</strong>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $VIII_dcp_dcl; ?>
        </td>
        <td>
            &nbsp;
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Rod-Marat:</strong>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $VIII_rod_marat; ?>
        </td>
        <td>
        </td>
    </tr>-->
        <!--<tr>
        <td>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Observaciones:</strong>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $VIII_descripcion_dcp_dcl; ?>
        </td>
        <td>
            &nbsp;
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Observaciones:</strong>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $actividad_motora; ?>
        </td>
        <td>
        </td>
    </tr>-->
        <!--<tr>
        <td>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Dcs-Sdt:</strong>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $VIII_dcp_4ptos; ?>
        </td>
        <td>
            &nbsp;
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Marat-Bip:</strong>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $VIII_sdt_bip; ?>
        </td>
        <td>
        </td>
    </tr>-->
    <tr>
        <td>
        </td>
        <!--<td width="20%" style="border: 1px solid #000000">
            <strong>Observaciones:</strong>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $VIII_descripcion_dcp_4ptos; ?>
        </td>-->
        <td>
            &nbsp;
            <!--</td>
        <td width="40%" style="border: 1px solid #000000">
            <strong></strong>
        </td>
        <td width="40%" style="border: 1px solid #000000">
            <?php echo $VIII_descripcion_sdt_bip; ?>
        </td>
        <td>
        </td>
    </tr>-->
</table>

<?php
$actividad_motora_funcional = ob_get_contents();

//VIII. Actividad Motora Funcional

$actividad_motora_funcional = '';

$VIII_dcs_dcp = isset($_POST['VIII_dcs_dcp']) ? $_POST['VIII_dcs_dcp'] : '';
$VIII_descripcion_dcs_dcp = isset($_POST['VIII_descripcion_dcs_dcp']) ? $_POST['VIII_descripcion_dcs_dcp'] : '';
$VIII_4ptos_Rod = isset($_POST['VIII_4ptos_Rod']) ? $_POST['VIII_4ptos_Rod'] : '';
$VIII_descripcion_4ptos_Rod = isset($_POST['VIII_descripcion_4ptos_Rod']) ? $_POST['VIII_descripcion_4ptos_Rod'] : '';
$actividad_motora = isset($_POST['actividad_motora']) ? $_POST['actividad_motora'] : '';

?>
<!-- 
<table width="100%">
    <tr>
        <td width="9%"></td>
        <td colspan="5" align="center" style="background-color: #374850;    padding: 10px!important;color: white;">
            VIII. Actividad Motora Funcional
        </td>
        <td width="9%"></td>
    </tr>
  <tr>
        <td>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Dcs-Dcp:</strong>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $VIII_dcs_dcp; ?>
        </td>
        <td>
            &nbsp;
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>4ptos-Rod:</strong>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $VIII_4ptos_Rod; ?>
        </td>
        <td>
        </td>
    </tr>-->
<!--<tr>
        <td>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Descripción:</strong>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $VIII_descripcion_dcs_dcp; ?>
        </td>
        <td>
            &nbsp;
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Descripción:</strong>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $VIII_descripcion_4ptos_Rod; ?>
        </td>
        <td>
        </td>
    </tr>-->
<!--<tr>
        <td>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Dcp-Dcl:</strong>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $VIII_dcp_dcl; ?>
        </td>
        <td>
            &nbsp;
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Rod-Marat:</strong>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $VIII_rod_marat; ?>
        </td>
        <td>
        </td>
    </tr>-->
<!--<tr>
        <td>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Observaciones:</strong>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $VIII_descripcion_dcp_dcl; ?>
        </td>
        <td>
            &nbsp;
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Observaciones:</strong>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $VIII_descripcion_rod_marat; ?>
        </td>
        <td>
        </td>
    </tr>-->
<!--<tr>
        <td>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Dcs-Sdt:</strong>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $VIII_dcp_4ptos; ?>
        </td>
        <td>
            &nbsp;
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Marat-Bip:</strong>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $VIII_sdt_bip; ?>
        </td>
        <td>
        </td>
    </tr>-->
<tr>
    <!--<td>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Observaciones:</strong>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $VIII_descripcion_dcp_4ptos; ?>
        </td>
        <td>
            &nbsp;
        </td>
        <td width="40%" style="border: 1px solid #000000">
            <strong>Actividad Motora:</strong>
        </td>
        <td width="40%" style="border: 1px solid #000000">
            <?php echo $actividad_motora; ?>
        </td>
        <td>
        </td>
    </tr>
</table> -->

    <?php
    //$actividad_motora_funcional = ob_get_contents();

    //Analisis


    $analisis = '';

    $analisis_tratamiento = isset($_POST['analisis_tratamiento']) ? $_POST['analisis_tratamiento'] : '';
    ob_start();
    ?>

    <table width="100%">
        <tr>
            <td width="9%"></td>
            <td width="82%" align="center" style="background-color: #374850;    padding: 10px!important;color: white;">
                VI. Análisis y plan de tratamiento
            </td>
            <td width="9%"></td>
        </tr>
        <tr>
            <td width="9%"></td>


            <td width="82%" style="border: 1px solid #000000">
                <?php echo $analisis_tratamiento; ?>
            </td>
            <td width="9%"></td>
            <td>

                <!--</td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Hora:</strong>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $prox_cita_hora; ?>
        </td>
        <td>
        </td>-->
        </tr>
        <!--<tr>
        <td>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Motivo consulta:</strong>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $motivo_consulta; ?>
        </td>
        <td>
            &nbsp;
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Especialista:</strong>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $doctor; ?>
        </td>
        <td>
        </td>
    </tr>-->
        <!--<tr>
        <td>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <strong><?php echo $prox_cita_asistencia; ?></strong>
        </td>
        <td width="20%" style="border: 1px solid #000000">
        </td>
        <td>
            &nbsp;
        </td>
        <td width="20%" style="border: 1px solid #000000">
        </td>  
        <td width="20%" style="border: 1px solid #000000">
        </td>
        <td>
        </td>
    </tr>-->
    </table>

    <?php
    $analisis = ob_get_contents();
    ?>


    <?php
    //CIE-10

    $CIE10 = '';

    $Finalidad = isset($_POST['Finalidad']) ? $_POST['Finalidad'] : '';
    $Externa = isset($_POST['Externa']) ? $_POST['Externa'] : '';

    //$select1 = isset($_POST['select1'])? $_POST['select1']: '';


    $select1 = isset($_POST['select1']) ? $_POST['select1'] : '';
    $select2 = isset($_POST['select2']) ? $_POST['select2'] : '';
    $select3 = isset($_POST['select3']) ? $_POST['select3'] : '';
    $select4 = isset($_POST['select4']) ? $_POST['select4'] : '';

    $tipodia = isset($_POST['tipodia']) ? $_POST['tipodia'] : '';

    $select1 = str_replace("�", "", $select1);
    $select2 = str_replace("�", "", $select2);
    $select3 = str_replace("�", "", $select3);
    $select4 = str_replace("�", "", $select4);



    ob_start();
    ?>

    <table width="100%">
        <tr>
            <td width="9%"></td>
            <td colspan="5" align="center" style="background-color: #374850;    padding: 10px!important;color: white;">
                VII.Diágnostico (CIE10)
            </td>
            <td width="9%"></td>
        </tr>
        <tr>
            <td>
            </td>
            <td width="40%" style="border: 1px solid #000000">
                <strong>Finalidad de la consulta:</strong>

            </td>
            <td width="2%"></td>
            <td width="40%" style="border: 1px solid #000000">
                <?php echo $Finalidad;  ?>
            </td>
            <td>
                &nbsp;
        </tr>
        <tr>
            <td>
            </td>
            <td width="40%" style="border: 1px solid #000000">
                <strong>Causa Externa:</strong>

            </td>
            <td width="2%"></td>
            <td width="40%" style="border: 1px solid #000000">
                <?php echo $Externa; ?>
            </td>
            <td>
                &nbsp;
        </tr>
        <tr>
            <td>
            </td>
            <td width="40%" style="border: 1px solid #000000">
                <strong>CIE-10 DEL DIÁGNOSTICO PRINCIPAL:</strong>

            </td>
            <td width="2%"></td>
            <td width="40%" style="border: 1px solid #000000">
                <?php echo $select1; ?>
            </td>
            <td>
                &nbsp;
        </tr>
        <tr>
            <td>
            </td>
            <td width="40%" style="border: 1px solid #000000">
                <strong>CIE-10 DEL DIÁGNOSTICO RELACIONADO 1:</strong>

            </td>
            <td width="2%"></td>
            <td width="40%" style="border: 1px solid #000000">
                <?php echo $select2; ?>
            </td>
            <td>
                &nbsp;
        </tr>
        <tr>
            <td>
            </td>
            <td width="40%" style="border: 1px solid #000000">
                <strong>CIE-10 DEL DIÁGNOSTICO RELACIONADO 2:</strong>

            </td>
            <td width="2%"></td>
            <td width="40%" style="border: 1px solid #000000">
                <?php echo $select3; ?>
            </td>
            <td>
                &nbsp;
        </tr>
        <tr>
            <td>
            </td>
            <td width="40%" style="border: 1px solid #000000">
                <strong>CIE-10 DEL DIÁGNOSTICO RELACIONADO 3:</strong>

            </td>
            <td width="2%"></td>
            <td width="40%" style="border: 1px solid #000000">
                <?php echo $select4; ?>
            </td>
            <td>
                &nbsp;
        </tr>
        <tr>
            <td>
            </td>
            <td width="40%" style="border: 1px solid #000000">
                <strong>Tipo de Diágnostico principal:</strong>

            </td>
            <td width="2%"></td>
            <td width="40%" style="border: 1px solid #000000">
                <?php echo $tipodia; ?>
            </td>
            <td>
                &nbsp;
        </tr>
    </table>

    <?php
    $CIE10 = ob_get_contents();
    ?>





    <?php
    //Solicitud Procedimiento

    $SolicitudProcedimiento = '';

    $IX_SolicitudProcedimiento = isset($_POST['IX_SolicitudProcedimiento']) ? $_POST['IX_SolicitudProcedimiento'] : '';

    ob_start();
    ?>

    <table width="100%">
        <tr>
            <td width="9%"></td>
            <td width="82%" align="center" style="background-color: #374850;    padding: 10px!important;color: white;">
                VIII. Solicitud Procedimiento
            </td>
            <td width="9%"></td>
        </tr>
        <tr>
            <td width="9%"></td>
            <td width="82%" style="border: 1px solid #000000">
                <?php echo $IX_SolicitudProcedimiento; ?>
            </td>
            <td width="9%"></td>
        </tr>
    </table>

    <?php
    $SolicitudProcedimiento = ob_get_contents();
    ?>



    <?php
    //Orden Medica

    $OrdenMedica = '';

    $X_OrdenMedica = isset($_POST['X_OrdenMedica']) ? $_POST['X_OrdenMedica'] : '';

    ob_start();
    ?>

    <table width="100%">
        <tr>
            <td width="9%"></td>
            <td width="82%" align="center" style="background-color: #374850;    padding: 10px!important;color: white;">
                IX. Orden Medica
            </td>
            <td width="9%"></td>
        </tr>
        <tr>
            <td width="9%"></td>
            <td width="82%" style="border: 1px solid #000000">
                <?php echo $X_OrdenMedica; ?>
            </td>
            <td width="9%"></td>
            <td>
                &nbsp;
        </tr>
    </table>

    <?php
    $OrdenMedica = ob_get_contents();
    ?>











    <?php
    //Proxima cita

    $prox_cita = '';

    $prox_cita_fecha = isset($_POST['prox_cita_fecha']) ? $_POST['prox_cita_fecha'] : '';
    $prox_cita_hora = isset($_POST['prox_cita_hora']) ? $_POST['prox_cita_hora'] : '';
    $motivo_consulta = isset($_POST['motivo_consulta']) ? $_POST['motivo_consulta'] : '';
    $doctor = isset($_POST['doctor']) ? $_POST['doctor'] : '';
    $prox_cita_asistencia = isset($_POST['prox_cita_asistencia']) ? $_POST['prox_cita_asistencia'] : '';


    ob_start();
    ?>



    <table width="100%">
        <!--<tr>
        <td width="9%"></td>
        <td colspan="5" align="center" style="background-color: #374850;    padding: 10px!important;color: white;">
            Proxima cita
        </td>
        <td width="9%"></td>
    </tr>
    <tr>
        <td>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Fecha:</strong>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $prox_cita_fecha; ?>
        </td>
        <td>
            &nbsp;
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Hora:</strong>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $prox_cita_hora; ?>
        </td>
        <td>
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Motivo consulta:</strong>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $motivo_consulta; ?>
        </td>
        <td>
            &nbsp;
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Especialista:</strong>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $doctor; ?>
        </td>
        <td>
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <strong><?php echo $prox_cita_asistencia; ?></strong>
        </td>
        <td width="20%" style="border: 1px solid #000000">
        </td>
        <td>
            &nbsp;
        </td>
        <td width="20%" style="border: 1px solid #000000">
        </td>  
        <td width="20%" style="border: 1px solid #000000">
        </td>
        <td>
        </td>
    </tr>-->

        <tr>
            <td width="9%"></td>
            <td colspan="5" align="center" style="background-color: #9b9b9b;    padding: 10px!important;color: white;">
                <a class="btn btn-app" target="_blank" href="<?php echo $Base; ?>consultaCliente_fisioterapia.php?clienteId=<?php echo $idcliente ?>">
                    <h4>VER CONSULTAS FISIOTERAPIA</h4>
                </a>
            </td>
            <td width="9%"></td>
        </tr>
    </table>

    <?php
    $prox_cita = ob_get_contents();
    ?>









    <?php


    $queryList = mysqli_query($conn3, "SELECT count(id) as contador FROM historiaClinica6_fisioterapia WHERE cliente_id ='$idcliente' and usuario_id= '$usuario_id'");
    $nrowl = mysqli_num_rows($queryList);
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $contador = $rowMotorizado['contador'] + 1;
    }


    $queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id=$idcliente");
    $nrowl = mysqli_num_rows($queryList);
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $celular_cliente = $rowMotorizado['celular_cliente'];
        $autorizacion = $rowMotorizado['autorizacion'];
    }


    echo $time;


    include 'funciones/conn3.php';


    if ($conn3) {
        $sql = "insert into historiaClinica6_fisioterapia set cliente_id = '$idcliente', usuario_id='$usuario_id', Fecha='$fechar',  anamnesis='$anamnesis'
  ,fisico_postural='$examen_fisico_postural'
  ,autorizacion='$autorizacion'
  ,evaluacion_dolor='$evaluación_dolor'
  ,evaluacion_sensibilidad='$evaluación_sensibilidad'
  ,evaluacion_osteoarticular='$evaluación_osteoarticular'
  ,evaluacion_neuromuscular='$evaluación_neuromuscular'
  ,evaluacion_marcha_equilibrio='$evaluación_marcha_equilibrio'
  ,actividad_motora_funcional='$actividad_motora_funcional'
  ,prox_cita='$prox_cita',entrevista='$entrevista',analisis='$analisis'
  ,CIE10='$CIE10',solicitud_procedimiento='$SolicitudProcedimiento',orden_medica='$OrdenMedica', OrdenMedica_imprimir='$X_OrdenMedica' , Solicitud_Imprimir='$IX_SolicitudProcedimiento' , D1 ='$select1', D2 ='$select2', D3 ='$select3', D4 ='$select4', secuencial_historia = '$contador'
  ,Hora='$time'";


        $query = mysqli_query($conn3, $sql);
        // echo "<pre>";
        //             var_dump(mysqli_error_list($conn3));
        //             echo "</pre>";
    }
    ?>