<?php
date_default_timezone_set('America/Bogota');

require_once __DIR__ . "/../funciones/funciones.php";
require_once __DIR__ . "/../funciones/funcionesUtilidades.php";

$idHistoria = decrypt($_GET['id']);

$QueryHistoria = "SELECT * FROM OB_Historia WHERE id = '$idHistoria' ";
$ResultHistoria = mysqli_query($conn3, $QueryHistoria);
$RowHistoria = mysqli_fetch_assoc($ResultHistoria);

$QueryCliente = "SELECT * FROM cliente WHERE cliente_id = '{$RowHistoria["cliente_id"]}' ";
$ResultCliente = mysqli_query($conn3, $QueryCliente);
$RowCliente = mysqli_fetch_assoc($ResultCliente);

$CODI_CLIENTE = $RowCliente["CODI_CLIENTE"];

?>

<table class="border">
    <tr class="border">
        <th class="text-center border" colspan="3">Datos personales</th>
        <th class="text-left border">No.H.C</th>
        <td class="text-left"><?= $idHistoria ?></td>
    </tr>
    <tr>
        <th class="text-center">Apellido Paterno</th>
        <th class="text-center">Apellido Materno</th>
        <th class="text-center">Nombres</th>
        <th class="text-center">Edad</th>
        <th class="text-center">Sexo</th>
    </tr>
    <tr>
        <td class="text-center"><?= $RowCliente["primer_apellido"] ?></td>
        <td class="text-center"><?= $RowCliente["segundo_apellido"] ?></td>
        <td class="text-center"><?= $RowCliente["primer_nombre"] . $RowCliente["segundo_nombre"]  ?></td>
        <td class="text-center"><?= CalculoEdadPaciente($RowCliente["fechaNacimiento"])  ?></td>
        <td class="text-center"><?= $RowCliente["genero"] ?></td>
    </tr>
    <tr>
        <th class="text-center" colspan="2">Lugar y Fecha de Nacimiento</th>
        <th class="text-center">Ocupacion</th>
        <th class="text-center">Direccion</th>
        <th class="text-center">Telefono-Celular</th>
    </tr>
    <tr>
        <td class="text-center" colspan="2"><?= $RowCliente["lugarNacimiento"] ?>, <?= $RowCliente["fechaNacimiento"] ?></td>
        <td class="text-center"><?= $RowCliente["ocupacion"] ?></td>
        <td class="text-center"><?= $RowCliente["direccion"] ?></td>
        <td class="text-center"><?= $RowCliente["telefono"] ?></td>
    </tr>
</table>

<table class="">
    <thead>
        <tr>
            <th colspan="4" class="text-center">Antecedentes</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th colspan="4">Antecedentes patológicos familiares</th>
        </tr>
        <tr>
            <td colspan="4">
                <p><?= $RowHistoria["antecedentes_patologicos_familiares"] ?></p>
            </td>
        </tr>
        <tr>
            <th colspan="4">Antecedentes patológicos personales</th>
        </tr>
        <tr>
            <td>
                <p><b>Anemia: </b> <?= $RowHistoria["Anemia"] == 'on' ? 'Si' : 'No' ?></p>
            </td>
            <td>
                <p><b>Cardiopatías: </b> <?= $RowHistoria["Cardiopatias"] == 'on' ? 'Si' : 'No' ?></p>
            </td>
            <td>
                <p><b>Enf. Gastricas: </b> <?= $RowHistoria["Enf_Gastricas"] == 'on' ? 'Si' : 'No' ?></p>
            </td>
            <td>
                <p><b>Hepatitis: </b> <?= $RowHistoria["Hepatitis"] == 'on' ? 'Si' : 'No' ?></p>
            </td>
        </tr>
        <tr>
            <td>
                <p><b>Tuberculosis: </b> <?= $RowHistoria["Tuberculosis"] == 'on' ? 'Si' : 'No' ?></p>
            </td>
            <td>
                <p><b>Asma: </b> <?= $RowHistoria["Asma"] == 'on' ? 'Si' : 'No' ?></p>
            </td>
            <td>
                <p><b>Diabetes: </b> <?= $RowHistoria["Diabetes"] == 'on' ? 'Si' : 'No' ?></p>
            </td>
            <td>
                <p><b>Epilepsia: </b> <?= $RowHistoria["Epilepsia"] == 'on' ? 'Si' : 'No' ?></p>
            </td>
        </tr>
        <tr>
            <td>
                <p><b>Hipertensión: </b> <?= $RowHistoria["Hipertension"] == 'on' ? 'Si' : 'No' ?></p>
            </td>
            <td>
                <p><b>VIH: </b> <?= $RowHistoria["VIH"] == 'on' ? 'Si' : 'No' ?></p>
            </td>
            <td>
                <p><b>Ninguno: </b> <?= $RowHistoria["Ninguno"] == 'on' ? 'Si' : 'No' ?></p>
            </td>
            <td></td>
        </tr>
        <tr>
            <td>
                <p><b>Otro: </b> <?= $RowHistoria["otro_antecedente"] ?></p>
            </td>
            <td>
                <p><b>Alergias: </b> <?= $RowHistoria["alergias"] ?></p>
            </td>
            <td>
                <p><b>Embarazo: </b> <?= $RowHistoria["embarazo"] ?></p>
            </td>
            <td></td>
        </tr>
        <tr>
            <td colspan="2">
                <p><b>Tuvo hemorragia después de una extracción dental:</b> <?= $RowHistoria["hemorragia_despues"] == 'on' ? 'Si' : 'No' ?></p>
            </td>
            <td colspan="2">
                <p><b>Especifique: </b> <?= $RowHistoria["hemorragia_especificar"] ?></p>
            </td>
        </tr>
    </tbody>
</table>

<table class="">
    <thead>
        <tr>
            <th colspan="3" class="text-center">Examen Extra Oral</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <p><b>ATM: </b> <?= $RowHistoria["ATM"] ?></p>
            </td>
            <td>
                <p><b>Labios: </b> <?= $RowHistoria["labios"] ?></p>
            </td>
            <td>
                <p><b>Ganglios linfáticos: </b> <?= $RowHistoria["ganglios_linfaticos"] ?></p>
            </td>
        </tr>
        <tr>
            <td>
                <p><b>Lengua: </b> <?= $RowHistoria["lengua"] ?></p>
            </td>
            <td>
                <p><b>Respirador: </b> <?= $RowHistoria["respirador"] ?></p>
            </td>
            <td>
                <p><b>Paladar: </b> <?= $RowHistoria["paladar"] ?></p>
            </td>
        </tr>
        <tr>
            <td>
                <p><b>Otros: </b> <?= $RowHistoria["examen_extraoral_otros"] ?></p>
            </td>
            <td>
                <p><b>Piso de la boca: </b> <?= $RowHistoria["piso_boca"] ?></p>
            </td>
            <td></td>
        </tr>
    </tbody>
</table>

<table class="">
    <thead>
        <tr>
            <th colspan="3" class="text-center">Antecedentes bucodentales</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <p><b>Mucosa Yugal: </b> <?= $RowHistoria["mucosa_yugal"] ?></p>
            </td>
            <td>
                <p><b>Fecha de ultima visita al odontólogo: </b> <?= $RowHistoria["ultima_visita_odontolog"] ?></p>
            </td>
            <td>
                <p><b>Encías: </b> <?= $RowHistoria["encias"] ?></p>
            </td>
        </tr>
        <tr>
            <td>
                <p><b>Habitos</b> <br> <b>Fuma</b><?= $RowHistoria["habito_fuma"] == 'on' ? 'Si' : 'No' ?> <b>Bebe</b><?= $RowHistoria["habito_bebe"] == 'on' ? 'Si' : 'No' ?></p>
            </td>
            <td>
                <p><b>Utiliza protesis dental: </b> <?= $RowHistoria["usa_protesis_dental"] == 'on' ? 'Si' : 'No' ?></p>
            </td>
            <td></td>
        </tr>
    </tbody>
</table>

<table class="">
    <thead>
        <tr>
            <th colspan="3" class="text-center">Antecedentes de higiene oral</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <p><b>Utiliza cepillo dental: </b> <?= $RowHistoria["usa_cepillo"] ?></p>
            </td>
            <td>
                <p><b>Utiliza hilo dental: </b> <?= $RowHistoria["usa_hilo"] ?></p>
            </td>
            <td>
                <p><b>Utiliza enguaje bucal: </b> <?= $RowHistoria["usa_enguaje"] ?></p>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <p><b>Frecuencia del cepillado dental</b> <?= $RowHistoria["frecuencia_cepillado"] ?></p>
            </td>
            <td>
                <p><b>Durante el cepillado le sangran las encías: </b> <?= $RowHistoria["sangrado_cepillado"] == 'on' ? 'Si' : 'No' ?></p>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <p><b>Higiene bucal: </b> <?= $RowHistoria["higiene_bucal"] ?></p>
            </td>
        </tr>
    </tbody>
</table>

<table class="">
    <thead>
        <tr>
            <thclass="text-center">Observaciones</thclass=>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <p><?= $RowHistoria["observaciones"] ?></p>
            </td>
        </tr>
    </tbody>
</table>

<style>
    table {
        border-collapse: collapse;
        border: 1px solid black !important;
        width: 98% !important;
        margin-bottom: 5px !important;
        margin-top: 5px !important;
        padding: 0 !important;
    }

    table tr {
        border-bottom: 1px solid black !important;
        border-right: 1px solid black !important;
        padding: 0 !important;
        padding-left: 5px !important;
        padding-right: 5px !important;
        margin: 0 !important;
    }

    table th {
        border-bottom: 1px solid black !important;
        border-right: 1px solid black !important;
        padding: 0 !important;
        padding-left: 5px !important;
        padding-right: 5px !important;
        margin: 0 !important;
    }

    table td {
        border-bottom: 1px solid black !important;
        border-right: 1px solid black !important;
        padding: 0 !important;
        padding-left: 5px !important;
        padding-right: 5px !important;
        margin: 0 !important;
    }

    p {
        margin: 0;
    }

    .text-center {
        text-align: center !important;
    }

    .text-left {
        text-align: left !important;
    }
</style>