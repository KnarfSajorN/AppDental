<?php
include '../funciones/funciones.php';
include '../funciones/conn3.php';
include '../funciones/funcionesUtilidades.php';

$id = $_GET['idhb'];

$querylist = mysqli_query($conn3, "SELECT * FROM Historia_ClinicaBo WHERE id = $id");
$fechaActual = date("Y-m-d");
while ($row = mysqli_fetch_assoc($querylist)) {

    $id = $row['id'];
    $nombres = $row['Nombres'];
    $primer_apellido = $row['primer_apellido'];
    $segundo_apellido = $row['segundo_apellido'];
    $genero = $row['genero'];
    $fechaNacimiento = $row['fecha_Nacimiento'];
    $lugarNacimiento = $row['Lugar_Nacimiento'];
    $ocupacion = $row['ocupacion'];
    $direccion = $row['direccion'];
    $telefono = $row['telefono'];
    $antecedentesFamiliares = $row['antecedentesFamiliares'];
    $antecedentesPersonales = $row['antecedentes_p'];
    $otrosAntecedentes = $row['otros_antecentes'];
    $alergias = $row['alergias'];
    $embarazo = $row['Embarazo'];
    $tratamiento_medico = $row['tratamiento_medico'];
    $medicacion_actual = $row['medicacion_actual'];
    $hemorragiaExtracion = $row['hemorragia_extraccion'];
    $mediata_inmediata = $row['mediata_inmediata'];
    $atm = $row['atm'];
    $ganglios_linfaticos = $row['ganglios_linfaticos'];
    $respirador = $row['respirador'];
    $otrosExtra = $row['otros_extra'];
    $fechaUltimaVisita = $row['fecha_ultima_visita'];
    $habitos = $row['Habitos'];
    $labios = $row['labios'];

    $lengua = $row['lengua'];
    $paladar = $row['paladar'];
    $piso_bucal = $row['piso_bucal'];
    $mucosa = $row['mucosa_yucal'];
    $encias = $row['encias'];
    $protesis = $row['protesis'];
    $otros_intra = $row['otros_intra'];
    $cepillo = $row['cepillo'];
    $hilo = $row['hilo'];
    $enjuage = $row['enguaje'];
    $frecuenciaCepillado = $row['frecuencia_cepillado'];
    $cepilladoSangrado  = $row['cepillado_sangrado'];
    $higieneGeneral = $row['higieneGeneral'];
    $problemasTratamientoAnterior = $row['problema_tratamiento_anterior'];
    $observaciones = $row['observaciones'];
    $motivoConsulta = $row['motivo_consulta'];
    $examenClinico = $row['examen_clinico'];
    $diagnostico = $row['diagnostico'];

    $antecedentesPersonales = explode("|/|", $antecedentesPersonales);
    $habitos = explode("|/|", $habitos);

    $cliente_id = $row['cliente_id'];
}

?>
<style>
    * {
        font-size: 13px;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        padding: 2px;
    }

    .border {
        border: 1px solid;
    }

    .text-center {
        text-align: center !important;
    }

    .text-left {
        text-align: left !important;
    }

    .bg-gray {
        background-color: #f0f0f0;
    }
</style>
<div style="text-align:center;">
    <h2 style="font-size: 20px !important;">HISTORIA CLÍNICA ODONTOLÓGICA</h2>
</div>
<!-- datos personales -->
<table class="border">
    <tr class="border">
        <th class="text-left border">Datos personales</th>
        <th class="text-left border">No.H.C</th>
        <th class="text-left"><?= $id ?></th>
        <th class="text-left border">Codigo</th>
        <th class="text-left"></th>
    </tr>
    <tr>
        <td class="text-center"><?= $primer_apellido ?></td>
        <td class="text-center"><?= $segundo_apellido ?></td>
        <td class="text-center"><?= $nombres ?></td>
        <td class="text-center"><?= $edad ?></td>
        <td class="text-center"><?= $genero ?></td>
    </tr>
    <tr>
        <th class="text-center">Apellido Paterno</th>
        <th class="text-center">Apellido Materno</th>
        <th class="text-center">Nombres</th>
        <th class="text-center">Edad</th>
        <th class="text-center">Sexo</th>
    </tr>
    <tr>
        <td class="text-center" colspan="2"><?= $lugarNacimiento ?>, <?= $fechaNacimiento ?></td>
        <td class="text-center"><?= $ocupacion ?></td>
        <td class="text-center"><?= $direccion ?></td>
        <td class="text-center"><?= $telefono ?></td>
    </tr>
    <tr>
        <th class="text-center" colspan="2">Lugar y Fecha de Nacimiento</th>
        <th class="text-center">Ocupacion</th>
        <th class="text-center">Direccion</th>
        <th class="text-center">Telefono-Celular</th>
    </tr>
</table>
<!-- datos personales -->
<br>
<!-- antecedentes familiares -->
<table class="border">
    <tr>
        <th class="text-left">ANTECEDENTES PATOLOGICOS FAMILIARES:</th>
    </tr>
    <tr>
        <td class="text-left"><?= $antecedentesFamiliares ?></td>
    </tr>
</table>
<!-- antecedentes familiares -->
<br>
<!-- antecedentes personales -->
<table class="border">
    <tr>
        <th colspan="5" class="text-left">ANTECEDENTES PATOLÓGICOS Y PERSONALES:</th>
    </tr>
    <tr>
        <td>Anemia ( <?= in_array("Anemia", $antecedentesPersonales) ? "X" : "" ?> )</td>
        <td>CardioPatias ( <?= in_array("Cardiopatias", $antecedentesPersonales) ? "X" : "" ?> )</td>
        <td>Enf. Gástrica ( <?= in_array("EnfGastrica", $antecedentesPersonales) ? "X" : "" ?> ) </td>
        <td>Hepatitis ( <?= in_array("Hepatitis", $antecedentesPersonales) ? "X" : "" ?> ) </td>
        <td>Tuberculosis ( <?= in_array("Tuberculosis", $antecedentesPersonales) ? "X" : "" ?> ) </td>
    </tr>
    <tr>
        <td>Asma( <?= in_array("Asma", $antecedentesPersonales) ? "X" : "" ?> )</td>
        <td>Diabetes ( <?= in_array("Diabetes", $antecedentesPersonales) ? "X" : "" ?> )</td>
        <td>Epilepsia ( <?= in_array("Epilepsia", $antecedentesPersonales) ? "X" : "" ?> )</td>
        <td>Hipertensión ( <?= in_array("Hipertension", $antecedentesPersonales) ? "X" : "" ?> ) </td>
        <td>SIDA ( <?= in_array("SIDA", $antecedentesPersonales) ? "X" : "" ?> )</td>
    </tr>
    <tr>
        <td colspan="2">Problemas Renales ( <?= in_array("ProblemasRenales", $antecedentesPersonales) ? "X" : "" ?> ) </td>
        <td colspan="3"> Problemas de Coagulación Sanguínea( <?= in_array("coagulacion", $antecedentesPersonales) ? "X" : "" ?> ) </td>
    </tr>
    <tr>
        <td class="border" colspan="2">Otros : <?= $otrosAntecedentes ?></td>
        <td class="border" colspan="2">Alergias: <?= $alergias ?></td>
        <td class="border">Embarazo: <?= $embarazo ?></td>
    </tr>
    <tr>
        <td class="border" colspan="3">¿Está en tratamiento médico? <?= $tratamiento_medico ?></td>
        <td class="border" colspan="2">¿Toma algún medicamento? <?= $medicamento_actual ?></td>
    </tr>
    <tr>
        <td class="border" colspan="3"> ¿Tuvo alguna hemorragia después de una extracción dental? <?= $hemorragiaExtracion ?> </td>
        <td class="border" colspan="2">Mediata o inmediata No ( <?= $mediata_inmediata == 'No' ? 'X' : '' ?> ) Si ( <?= $mediata_inmediata == 'Si' ? 'X' : '' ?> )</td>
    </tr>
</table>
<!-- antecedentes personales -->
<br>
<!-- exámenes -->
<table>
    <tr>
        <th class="text-left" colspan="3">EXAMEN EXTRA ORAL</th>
        <th class="text-left" colspan="2">EXAMEN INTRA ORAL </th>
    </tr>
    <tr class="border">
        <td colspan="3">A.T.M : <?= $atm ?></td>
        <td colspan="2" class="border"> Labios: <?= $labios ?></td>
    </tr>
    <tr class="border">
        <td colspan="3">Ganglios Linfáticos: <?= $ganglios_linfaticos ?></td>
        <td colspan="2" class="border">Lengua: <?= $lengua ?></td>
    </tr>
    <tr class="border">
        <td colspan="3">Respirador: Nasal ( <?= $respirador == 'Nasal' ? 'X' : '' ?> ) Bucal ( <?= $respirador == 'Bucal' ? 'X' : '' ?> ) Buco Nasal ( <?= $respirador == 'Buco_Nasal' ? 'X' : '' ?> )</td>
        <td colspan="2" class="border">Paladar: <?= $paladar ?></td>
    </tr>
    <tr class="border">
        <td colspan="3">Otros: <?= $otrosExtra ?></td>
        <td colspan="2" class="border">Piso de la Boca: <?= $piso_bucal ?></td>
    </tr>
    <tr class="border">
        <th class="text-left" colspan="3">ANTECEDENTES BUCODENTALES</th>
        <td colspan="2" class="border">Mucosa Yugal: <?= $mucosa ?></td>
    </tr>
    <tr class="border">
        <td colspan="3">Fecha de la última visita al Odontólogo: <?= $fecha_ultima_visita ?></td>
        <td colspan="2" class="border">Encías: <?= $encias ?></td>
    </tr>
    <tr class="border">
        <td colspan="3">Hábitos: Fuma ( <?= in_array("Fuma", $habitos) ? "X" : "" ?> ) Bebe ( <?= in_array("Bebe", $habitos) ? "X" : "" ?> ) Otros ( <?= in_array("Otros", $habitos) ? "X" : "" ?> )</td>
        <td colspan="2" class="border">Utiliza Prótesis Dental: Si ( <?= $protesis == 'Si' ? 'X' : '' ?> ) No ( <?= $protesis == 'No' ? 'X' : '' ?> )</td>
    </tr>
    <tr class="border">
        <th class="text-left" colspan="5">ANTECEDENTES DE HIGIENE ORAL</th>
    </tr>
    <tr class="border">
        <td colspan="2" class="border">Usa Cepillo dental Si ( <?= $cepillo == 'Si' ? 'X' : '' ?> ) No ( <?= $cepillo == 'No' ? 'X' : '' ?> )</td>
        <td>Utiliza Hilo Dental: Si ( <?= $hilo == 'Si' ? 'X' : '' ?> ) No ( <?= $hilo == 'No' ? 'X' : '' ?> )</td>
        <td colspan="2" class="border">Utiliza enjuague Bucal Si ( <?= $enjuage == 'Si' ? 'X' : '' ?> ) No ( <?= $enjuage == 'No' ? 'X' : '' ?> )</td>
    </tr>
    <tr class="border">
        <td colspan="2" class="border">Frecuencia de cepillado <?= $frecuenciaCepillado ?></td>
        <td colspan="3">Durante el cepillado dental sangran las encías Si ( <?= $cepilladoSangrado == 'Si' ? 'X' : '' ?> ) No ( <?= $cepilladoSangrado == 'No' ? 'X' : '' ?> )</td>
    </tr>
    <tr class="border">
        <td colspan="5">Higiene dental: Buena ( <?= $higieneGeneral == 'Buena' ? 'X' : '' ?> ) Regular ( <?= $higieneGeneral == 'Regular' ? 'X' : '' ?> ) Mala ( <?= $higieneGeneral == 'Mala' ? 'X' : '' ?> )</td>
    </tr>
    <tr class="border">
        <td colspan="5"> ¿Ha tenido algún problema grave en un tratamiento dental anterior?: <?= $problemasTratamientoAnterior ?></td>
    </tr>
</table>
<!-- exámenes -->
<br>
<!-- adicionales -->
<table class="border">
    <tr>
        <th class="text-left">ANTECEDENTES PATOLÓGICOS FAMILIARES:</th>
    </tr>
    <tr>
        <td class="text-left"><?= $antecedentesFamiliares ?></td>
    </tr>
</table>
<table class="border">
    <tr>
        <th class="text-left">Observaciones:</th>
    </tr>
    <tr>
        <td class="text-left"><?= $observaciones ?></td>
    </tr>
</table>
<table class="border">
    <tr>
        <th class="text-left">MOTIVO DE CONSULTA:</th>
    </tr>
    <tr>
        <td class="text-left"><?= $motivoConsulta ?></td>
    </tr>
</table>
<table class="border">
    <tr>
        <th class="text-left">EXAMEN CLÍNICO:</th>
    </tr>
    <tr>
        <td class="text-left"><?= $examenClinico ?></td>
    </tr>
</table>
<table class="border">
    <tr>
        <th class="text-left">DIAGNOSTICO:</th>
    </tr>
    <tr>
        <td class="text-left"><?= $diagnostico ?></td>
    </tr>
</table>
<!-- adicionales -->
<p>Declaro ciertos todos los datos relativos a mi historia clínica, no habiendo omitido ningún aspecto de interés o que me hubiera sido cuestionado.</p>
<p style="margin:0; padding:0;">Nombre del paciente: <?= $nombres . ' ' . $primer_apellido . ' ' . $segundo_apellido ?></p>
<p style="margin:0; padding:0;">CI: <?= funcionMaster($cliente_id,'cliente_id','CODI_CLIENTE','cliente') ?></p>
<p style="margin:0; padding:0;">Fecha <?= $fechaActual ?></p>
<p style="margin:0; padding:0;">Firma: 
    <br>
    <?php $firma = funcionMaster($id," historia_nombre='Historia_ClinicaBo' and historia_id",'firma','firmas'); ?>
    <?php if ($firma != null && $firma != "" && $firma != "null"){ ?>
        <img src="<?= $firma ?>" style="height: 2cm; width: auto;">
    <?php } ?>
</p>