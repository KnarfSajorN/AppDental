<?php
//I. Anamnesis

$anamnesis = '';

$i= 0;
$I = isset($_POST['I'])? $_POST['I']: '';
ob_start();
?>

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
            <?php echo $I['Diabetes']; $i++; ?>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Hta:</strong>
            <?php echo $I['Hta']; $i++; ?>
        </td>
        <td>
            &nbsp;
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Cáncer:</strong>
            <?php echo $I['Cáncer']; $i++; ?>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Enfermedades Reumáticas:</strong>
            <?php echo $I['Enfermedades Reumáticas']; $i++; ?>
        </td>
        <td width="9%">
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Cardiopatías:</strong>
            <?php echo $I['Cardiopatías']; $i++; ?>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Cirugías:</strong>
            <?php echo $I['Cirugías']; $i++; ?>
        </td>
        <td>
            &nbsp;
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Alergias:</strong>
            <?php echo $I['Alergias']; $i++; ?>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Transfusiones:</strong>
            <?php echo $I['Transfusiones']; $i++; ?>
        </td>
        <td>
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Accidentes:</strong>
            <?php echo $I['Accidentes']; $i++; ?>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Fracturas:</strong>
            <?php echo $I['Fracturas']; $i++; ?>
        </td>
        <td>
            &nbsp;
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Signos Vitales:</strong>
            <?php echo $I['Signos Vitales']; $i++; ?>
        </td>
        <td width="20%" style="border: 1px solid #000000">
        </td>
        <td>
        </td>
    </tr>

</table>

<?php
$anamnesis = ob_get_contents();

//II. Examen fisico postural

$examen_fisico_postural = '';

$II_actitud_postural = isset($_POST['II_actitud_postural'])? $_POST['II_actitud_postural']: '';
$II_detalles = isset($_POST['II_detalles'])? $_POST['II_detalles']: '';
$II_color = isset($_POST['II_color'])? $_POST['II_color']:'';
$II_estado = isset($_POST['II_estado'])? $_POST['II_estado']: '';
$II_edema = isset($_POST['II_edema'])? $_POST['II_edema']: '';
$II_tumefaccion = isset($_POST['II_tumefaccion'])? $_POST['II_tumefaccion']: '';
$II_escaras = isset($_POST['II_escaras'])?  $_POST['II_escaras']: '';
$II_heridas = isset($_POST['II_heridas'])? $_POST['II_heridas']: '';
$II_cicatriz = isset($_POST['II_cicatriz'])? $_POST['II_cicatriz']: '';

ob_start();
?>

<table width="100%">
    <tr>
        <td width="9%"></td>
        <td width="82%" colspan="5" align="center" style="background-color: #374850;    padding: 10px!important;color: white;">
            II. Examen Físico Postural
        </td>
        <td width="9%"></td>
    </tr>
    <tr>
        <td width="9%"></td>
        <td width="40%" colspan="2" align="center" style="background-color: #3c8dbc;    padding: 10px!important;color: white;">
            Actitud Postural
        </td>
        <td>&nbsp;</td>
        <td width="40%" colspan="2" align="center" style="background-color: #3c8dbc;    padding: 10px!important;color: white;">
            Evaluación de la Piel
        </td>
        <td width="9%"></td>
    </tr>
    <tr>
        <td width="9%">
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Actitud Postural:</strong>
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

$III_intensidad = isset($_POST['III_intensidad'])? $_POST['III_intensidad']: '';
$III_zona_dolor = isset($_POST['III_zona_dolor'])? $_POST['III_zona_dolor']: '';
$III_presente = isset($_POST['III_presente'])? $_POST['III_presente']: '';
$III_durante = isset($_POST['III_durante'])? $_POST['III_durante']: '';

ob_start();
?>

<table width="100%">
    <tr>
        <td></td>
        <td colspan="5" align="center" style="background-color: #374850;    padding: 10px!important;color: white;">
            III. Evaluación del Dolor
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
            <strong>Zona de Dolor:</strong>
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

$IV_superficial = isset($_POST['IV_superficial'])? $_POST['IV_superficial']: '';
$IV_detalles_superficial = isset($_POST['IV_detalles_superficial'])? $_POST['IV_detalles_superficial']: '';
$IV_profunda = isset($_POST['IV_profunda'])? $_POST['IV_profunda']: '';
$IV_detalles_profunda = isset($_POST['IV_detalles_profunda'])? $_POST['IV_detalles_profunda']: '';

ob_start();
?>

<table width="100%">
    <tr>
        <td></td>
        <td colspan="5" align="center" style="background-color: #374850;    padding: 10px!important;color: white;">
            IV. Evaluación de la Sensibilidad
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

$V_estado_articular = isset($_POST['V_estado_articular'])? $_POST['V_estado_articular']: '';
$V_detalles_estado_articular = isset($_POST['V_detalles_estado_articular'])? $_POST['V_detalles_estado_articular']: '';
$V_amplitud_articular = isset($_POST['V_amplitud_articular'])? $_POST['V_amplitud_articular']: '';
$V_detalles_amplitud_articular = isset($_POST['V_detalles_amplitud_articular'])? $_POST['V_detalles_amplitud_articular']: '';

ob_start();
?>

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
            <strong>Estado Articular:</strong>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $V_estado_articular; ?>
        </td>
        <td></td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Amplitud Articular:</strong>
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
</table>

<?php
$evaluación_osteoarticular = ob_get_contents();


//VI. Evaluación Neuromuscular

$evaluación_neuromuscular = '';

//1-Parte
$VI_tono = isset($_POST['VI_tono'])? $_POST['VI_tono']: '';
$VI_especificar_tono = isset($_POST['VI_especificar_tono'])? $_POST['VI_especificar_tono']: '';
$VI_trofismo = isset($_POST['VI_trofismo'])? $_POST['VI_trofismo']: '';
$VI_especificar_trofismo = isset($_POST['VI_especificar_trofismo'])? $_POST['VI_especificar_trofismo']: '';
$VI_elasticidad = isset($_POST['VI_elasticidad'])? $_POST['VI_elasticidad']: '';
$VI_especificar_elastisidad = isset($_POST['VI_especificar_elastisidad'])? $_POST['VI_especificar_elastisidad']: '';
$VI_fuerza = isset($_POST['VI_fuerza'])? $_POST['VI_fuerza']: '';
$VI_especificar_fuerza = isset($_POST['VI_especificar_fuerza'])? $_POST['VI_especificar_fuerza']: '';
//------------------------------------------------------------------------------------------------
ob_start();
?>

<table width="100%">
    <tr>
        <td></td>
        <td colspan="5" align="center" style="background-color: #374850;    padding: 10px!important;color: white;">
            VI. Evaluación Neuromuscular
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
$i= 0;
$VI_em = isset($_POST['VI_em'])? $_POST['VI_em']: '';
//------------------------------------------------------------------------------------------------
?>

<table width="100%">
    <tr>
        <td></td>
        <td colspan="5" align="center" style="background-color: #3c8dbc;    padding: 10px!important;color: white;">
            Evaluación Muscular
        </td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="2" align="center" style="background-color: #374850;    padding: 10px!important;color: white;">
            Evaluación 1 Fecha
        </td>
        <td></td>
        <td colspan="2" align="center" style="background-color: #374850;    padding: 10px!important;color: white;">
            Evaluación 2 Fecha
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
            <?php echo $VI_em['M. Sup1']; $i++; ?>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $VI_em['M. Sup2']; $i++; ?>
        </td>
        <td></td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $VI_em['M. Sup3']; $i++; ?>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $VI_em['M. Sup4']; $i++; ?>
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
            <?php echo $VI_em['M. Inf1']; $i++; ?>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $VI_em['M. Inf2']; $i++; ?>
        </td>
        <td></td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $VI_em['M. Inf3']; $i++; ?>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $VI_em['M. Inf4']; $i++; ?>
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
            <?php echo $VI_em['Tronco1']; $i++; ?>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $VI_em['Tronco2']; $i++; ?>
        </td>
        <td></td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $VI_em['Tronco3']; $i++; ?>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $VI_em['Tronco4']; $i++; ?>
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
            <?php echo $VI_em['Cuello1']; $i++; ?>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $VI_em['Cuello2']; $i++; ?>
        </td>
        <td></td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $VI_em['Cuello3']; $i++; ?>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $VI_em['Cuello4']; $i++; ?>
        </td>
        <td width="9%" align="center" style="background-color: #3c8dbc;!important;color: white;">
            Cuello
        </td>
    </tr>
</table>

<?php
//VI. Evaluación Neuromuscular

//3-Parte
$VI_apellidos_nombres = isset($_POST['VI_apellidos_nombres'])? $_POST['VI_apellidos_nombres']: '';
$VI_diagnostico = isset($_POST['VI_diagnostico'])? $_POST['VI_diagnostico']: '';
//------------------------------------------------------------------------------------------------
?>

<table width="100%">
    <tr>
        <td></td>
        <td colspan="5" align="center" style="background-color: #3c8dbc;    padding: 10px!important;color: white;">
            Goniometría Movimiento Articular
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
$i= 0;
$VI_gma = isset($_POST['VI_gma'])? $_POST['VI_gma']: '';
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
<table width="100%">
    <tr>
        <td></td>
        <td colspan="5" align="center" style="background-color: #3c8dbc;    padding: 10px!important;color: white;">
            Goniometría Movimiento Articular
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
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">Flexión 0°
            - 180°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td rowspan="6" width="120" align="center"
            class="strong"><strong>Hombro</strong>
        </td>
    </tr>
    <tr>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">Extensión
            0° - 50°-60°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
    </tr>
    <tr>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">Abducción
            0° - 180°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
    </tr>
    <tr>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">Add Horiz.
            0° - 120°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
    </tr>
    <tr>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">Rot Int.
            0° - 70°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
    </tr>
    <tr>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">Rot. Ext.
            0° - 90°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
    </tr>

    <tr>
        <td colspan="7" width="120" align="center" class="strong">
        </td>
    </tr>

    <!-- Codo y antebrazo-->

    <tr>
        <td rowspan="4" width="120" align="center"
            class="strong"><strong>Codo y
                Antebrazo</strong></td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">Flexión 0°
            - 145° 150°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td rowspan="4" width="120" align="center"
            class="strong"><strong>Codo y
                Antebrazo</strong></td>
    </tr>
    <tr>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">Extensión
            145° - 0°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
    </tr>
    <tr>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">Pronación
            0° - 90°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
    </tr>
    <tr>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">Supinación
            0° - 90°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
    </tr>

    <tr>
        <td colspan="7" width="120" align="center" class="strong">
        </td>
    </tr>
    <!-- Muñeca-->

    <tr>
        <td rowspan="4" width="120" align="center"
            class="strong"><strong>Muñeca</strong>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">Flexión 0°
            - 90°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td rowspan="4" width="120" align="center"
            class="strong"><strong>Muñeca</strong>
        </td>
    </tr>
    <tr>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">Extensión.
            0° - 70°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
    </tr>
    <tr>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">Desv. Rad.
            0° - 25° 30°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
    </tr>
    <tr>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">Desv. Cub.
            . 0° - 30°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
    </tr>

    <tr>
        <td colspan="7" width="120" align="center" class="strong">
        </td>
    </tr>
    <!-- 1 dedo de la mano-->

    <tr>
        <td rowspan="3" width="120" align="center"
            class="strong"><strong>1 Dedo de la
                Mano</strong></td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">Flex If 0°
            - 80°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td rowspan="3" width="120" align="center"
            class="strong"><strong>1 Dedo de la
                Mano</strong></td>
    </tr>
    <tr>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">Flex Mcf
            0° - 50°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
    </tr>
    <tr>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">Abd 0° -
            60°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
    </tr>

    <tr>
        <td colspan="7" width="120" align="center" class="strong">
        </td>
    </tr>

    <!-- Cadera-->

    <tr>
        <td rowspan="7" width="120" align="center"
            class="strong"><strong>Cadera</strong>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">Flex C/ Rodilla Flex 0° - 125°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td rowspan="7" width="120" align="center"
            class="strong"><strong>Cadera</strong>
        </td>
    </tr>

    <tr>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">Ext con Rodilla Ext 0° - 15º
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
    </tr>
    <tr>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">Ext con Rodilla Flex 0° - 10º
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
    </tr>
    <tr>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">Abducción
            0°-45°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
    </tr>
    <tr>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">Adducción
            0°-20°-30°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
    </tr>
    <tr>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">Rot. Int.
            0°-30°-45°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
    </tr>
    <tr>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">Rot. Ext.
            0°-30°-45°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
    </tr>
    <tr>
        <td colspan="7" width="120" align="center" class="strong">
        </td>
    </tr>
    <!-- Rodilla-->

    <tr>
        <td rowspan="2" width="120" align="center"
            class="strong"><strong>Rodilla</strong>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">Flexión
            0°-140°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td rowspan="2" width="120" align="center"
            class="strong"><strong>Rodilla</strong>
        </td>
    </tr>

    <tr>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">Extensión
            140°-0°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
    </tr>

    <tr>
        <td colspan="7" width="120" align="center" class="strong">
        </td>
    </tr>
    <!-- Tobillo y Pie-->

    <tr>
        <td rowspan="4" width="120" align="center"
            class="strong"><strong>Tobillo y
                Pie</strong></td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            Dorsiflexión 0°-20°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td rowspan="4" width="120" align="center"
            class="strong"><strong>Tobillo y
                Pie</strong></td>
    </tr>

    <tr>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">Flex Plantar 0°-45°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
    </tr>
    <tr>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">Inversión
            0°-30°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
    </tr>
    <tr>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">Eversión
            0°-25°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
    </tr>

    <tr>
        <td colspan="7" width="120" align="center" class="strong">
        </td>
    </tr>
    <!-- Columna Cervical-->

    <tr>
        <td rowspan="4" width="120" align="center"
            class="strong"><strong>Columna
                Cervical</strong></td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">Flexión
            0°-45°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td rowspan="4" width="120" align="center"
            class="strong"><strong>Columna
                Cervical</strong></td>
    </tr>

    <tr>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">Extensión
            0°-45°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
    </tr>
    <tr>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            Lateralización 0°-45-60°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
    </tr>
    <tr>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">Rotación
            0°-60-70°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
    </tr>

    <tr>
        <td colspan="7" width="120" align="center" class="strong">
        </td>
    </tr>
    <!-- Tronco-->

    <tr>
        <td rowspan="4" width="120" align="center"
            class="strong"><strong>Tronco</strong>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">Flexión
            0°-80°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td rowspan="4" width="120" align="center"
            class="strong"><strong>Tronco</strong>
        </td>
    </tr>

    <tr>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">Extensión
            0°-30°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
    </tr>
    <tr>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            Lateralización 0°-20°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
    </tr>
    <tr>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">Rotación
            0°-45°
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
        <td align="center" class="inputs">
            <?php echo $VI_gma[$i]; $i++; ?>
        </td>
    </tr>
</table>

<?php
$evaluación_neuromuscular = ob_get_contents();
//$evaluación_osteoarticular = ob_get_contents();

//VII. Evaluación de la marcha y equilibrio

$evaluación_marcha_equilibrio = '';

$ViI_observaciones = isset($_POST['VII_observaciones'])? $_POST['VII_observaciones']: '';
ob_start();
?>

<table width="100%">
    <tr>
        <td></td>
        <td colspan="5" align="center" style="background-color: #374850;    padding: 10px!important;color: white;">
            VII. Evaluación de la Marcha y Equilibrio
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
            <?php echo $ViI_observaciones; ?>
        </td>
        <td width="9%">
        </td>
    </tr>
</table>

<?php
$evaluación_marcha_equilibrio = ob_get_contents();

//VIII. Actividad Motora Funcional

$actividad_motora_funcional = '';

$VIII_dcs_dcp = isset($_POST['VIII_dcs_dcp'])? $_POST['VIII_dcs_dcp']: '';
$VIII_descripcion_dcs_dcp = isset($_POST['VIII_descripcion_dcs_dcp'])? $_POST['VIII_descripcion_dcs_dcp']: '';
$VIII_4ptos_Rod = isset($_POST['VIII_4ptos_Rod'])? $_POST['VIII_4ptos_Rod']: '';
$VIII_descripcion_4ptos_Rod = isset($_POST['VIII_descripcion_4ptos_Rod'])? $_POST['VIII_descripcion_4ptos_Rod']: '';
$VIII_dcp_dcl = isset($_POST['VIII_dcp_dcl'])? $_POST['VIII_dcp_dcl']: '';
$VIII_descripcion_dcp_dcl = isset($_POST['VIII_descripcion_dcp_dcl'])? $_POST['VIII_descripcion_dcp_dcl']: '';
$VIII_rod_marat = isset($_POST['VIII_rod_marat'])? $_POST['VIII_rod_marat']: '';
$VIII_descripcion_rod_marat = isset($_POST['VIII_descripcion_rod_marat'])? $_POST['VIII_descripcion_rod_marat']: '';

$VIII_dcs_sdt = isset($_POST['VIII_dcs_sdt'])? $_POST['VIII_dcs_sdt']: '';
$VIII_descripcion_dcs_sdt = isset($_POST['VIII_descripcion_dcs_sdt'])? $_POST['VIII_descripcion_dcs_sdt']: '';
$VIII_marat_bip = isset($_POST['VIII_marat_bip'])? $_POST['VIII_marat_bip']: '';
$VIII_descripcion_marat_bip = isset($_POST['VIII_descripcion_marat_bip'])? $_POST['VIII_descripcion_marat_bip']: '';

$VIII_dcp_4ptos = isset($_POST['VIII_dcp_4ptos'])? $_POST['VIII_dcp_4ptos']: '';
$VIII_descripcion_dcp_4ptos = isset($_POST['VIII_descripcion_dcp_4ptos'])? $_POST['VIII_descripcion_dcp_4ptos']: '';
$VIII_sdt_bip = isset($_POST['VIII_sdt_bip'])? $_POST['VIII_sdt_bip']: '';
$VIII_descripcion_sdt_bip = isset($_POST['VIII_descripcion_sdt_bip'])? $_POST['VIII_descripcion_sdt_bip']: '';

ob_start();
?>

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
    </tr>
    <tr>
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
    </tr>
    <tr>
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
    </tr>
    <tr>
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
    </tr>
    <tr>
        <td>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Dcs-Sdt:</strong>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $VIII_dcs_sdt; ?>
        </td>
        <td>
            &nbsp;
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Marat-Bip:</strong>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $VIII_marat_bip; ?>
        </td>
        <td>
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Observaciones:</strong>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $VIII_descripcion_dcs_sdt; ?>
        </td>
        <td>
            &nbsp;
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Observaciones:</strong>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $VIII_descripcion_marat_bip; ?>
        </td>
        <td>
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Dcp-4ptos:</strong>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $VIII_dcp_4ptos; ?>
        </td>
        <td>
            &nbsp;
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <strong>Sdt-Bip:</strong>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $VIII_sdt_bip; ?>
        </td>
        <td>
        </td>
    </tr>
    <tr>
        <td>
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
        <td width="20%" style="border: 1px solid #000000">
            <strong>Observaciones:</strong>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $VIII_descripcion_sdt_bip; ?>
        </td>
        <td>
        </td>
    </tr>
</table>

<?php
$actividad_motora_funcional = ob_get_contents();

//VIII. Actividad Motora Funcional
/*
$actividad_motora_funcional = '';

$VIII_dcs_dcp = isset($_POST['VIII_dcs_dcp'])? $_POST['VIII_dcs_dcp']: '';
$VIII_descripcion_dcs_dcp = isset($_POST['VIII_descripcion_dcs_dcp'])? $_POST['VIII_descripcion_dcs_dcp']: '';
$VIII_4ptos_Rod = isset($_POST['VIII_4ptos_Rod'])? $_POST['VIII_4ptos_Rod']: '';
$VIII_descripcion_4ptos_Rod = isset($_POST['VIII_descripcion_4ptos_Rod'])? $_POST['VIII_descripcion_4ptos_Rod']: '';*/
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
    </tr>
    <tr>
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
    </tr>
    <tr>
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
    </tr>
    <tr>
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
    </tr>
    <tr>
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
    </tr>
    <tr>
        <td>
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
        <td width="20%" style="border: 1px solid #000000">
            <strong>Observaciones:</strong>
        </td>
        <td width="20%" style="border: 1px solid #000000">
            <?php echo $VIII_descripcion_sdt_bip; ?>
        </td>
        <td>
        </td>
    </tr>
</table>
-->
<?php
//$actividad_motora_funcional = ob_get_contents();

//Proxima cita

$prox_cita = '';

$prox_cita_fecha = isset($_POST['prox_cita_fecha'])? $_POST['prox_cita_fecha']: '';
$prox_cita_hora = isset($_POST['prox_cita_hora'])? $_POST['prox_cita_hora']: '';
$motivo_consulta = isset($_POST['motivo_consulta'])? $_POST['motivo_consulta']: '';
$doctor = isset($_POST['doctor'])? $_POST['doctor']: '';
$prox_cita_asistencia = isset($_POST['prox_cita_asistencia'])? $_POST['prox_cita_asistencia']: '';


ob_start();
?>

<table width="100%">
    <tr>
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
    </tr>
</table>

<?php
//$prox_cita = ob_get_contents();
$prox_cita="";
 $usuario_id = $_POST['ID'];
 $idusuario = $_POST['ID'];
 $cliente_id = $_POST['clienteId'];


include 'funciones/conn3.php';
include "funciones/funciones.php";

if($conn3){

$queryAuditor = "insert into Historia_Clinica_Fisioterapia set anamnesis='$anamnesis'
  ,fisico_postural='$examen_fisico_postural'
  ,evaluacion_dolor='$evaluación_dolor'
  ,evaluacion_sensibilidad='$evaluación_sensibilidad'
  ,evaluacion_osteoarticular='$evaluación_osteoarticular'
  ,evaluacion_neuromuscular='$evaluación_neuromuscular'
  ,evaluacion_marcha_equilibrio='$evaluación_marcha_equilibrio'
  ,actividad_motora_funcional='$actividad_motora_funcional'
  ,prox_cita='$prox_cita'
  ,usuario_id='$usuario_id'
  ,cliente_id='$cliente_id'";
$queryAuditor = str_replace("'", '', $queryAuditor);
$enlace_actual = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$enlace_actual = str_replace('.php', '', $enlace_actual);
//echo $queryAuditor;

auditorMaster($idusuario, '1', $enlace_actual, $queryAuditor);

    $sql="insert into Historia_Clinica_Fisioterapia set anamnesis='$anamnesis'
  ,fisico_postural='$examen_fisico_postural'
  ,evaluacion_dolor='$evaluación_dolor'
  ,evaluacion_sensibilidad='$evaluación_sensibilidad'
  ,evaluacion_osteoarticular='$evaluación_osteoarticular'
  ,evaluacion_neuromuscular='$evaluación_neuromuscular'
  ,evaluacion_marcha_equilibrio='$evaluación_marcha_equilibrio'
  ,actividad_motora_funcional='$actividad_motora_funcional'
  ,prox_cita='$prox_cita'
  ,usuario_id='$usuario_id'
  ,cliente_id='$cliente_id'";

  $query=mysqli_query($conn3,$sql);

  $Historia_id = mysqli_insert_id($conn3);

  //////////////////AUTOGUARDADO///////////////////////////////////////////////////////////////
if($_POST['Ruta_Historia_AutoGuardado']!=""){
	$Ruta_Historia_AutoGuardado = $_POST['Ruta_Historia_AutoGuardado'];

	$query = "UPDATE AutoGuardado SET Estado='0' WHERE cliente_id = '$cliente_id' and usuario_id = '$usuario_id' and Ruta = '$Ruta_Historia_AutoGuardado' AND Estado = '1' ";
	mysqli_query($conn3, $query);
}


  echo "<script type='text/javascript'>window.location.href='HFT_Finalizado_Historia_Fisioterapia?historiaClinica1={$Historia_id}'</script>";
}


?>