<?php
include "imprimir_controlECDatos.php"
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    integrity="sha512-LCJOzl6t4XP9fiZmOyjp5Bv9t1Y8LlT+RiHC1++2MI1lI2Ejm7j7oFfF/UxvlwFzSZ1Zjz3vPprNn2L+P8e7zg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />



<div class="container">
    <div class="button">
        <button class="print-button" onclick="window.print()">
            <i class="fas fa-print"></i> Imprimir
        </button>
    </div>
    <table class="tg" style="undefined;table-layout: fixed; width: 1249px">
        <colgroup>
            <col style="width: 100px">
            <col style="width: 80px">
            <col style="width: 80px">
            <col style="width: 80px">
            <col style="width: 80px">
            <col style="width: 80px">
            <col style="width: 80px">
            <col style="width: 80px">
        </colgroup>
        <thead>
            <tr>
                <th class="tg-0pky" colspan="2" rowspan="3">
                    <?php echo $Logo ?>
                </th>
                <th class="tg-0pky" colspan="6" rowspan="3">
                    <h3 class="tittle"><b>Historia Clínica Epicris</b></h3>
                </th>
            </tr>
            <tr>
            </tr>
            <tr>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="tg-0pky" colspan="4"><span style="font-weight:400;font-style:normal">Fecha:
                        <? echo $Fecha ?>
                    </span><br></td>
                <td class="tg-0pky" colspan="4"><span style="font-weight:400;font-style:normal">Hora:
                        <? echo $Hora ?>
                    </span><br></td>
            </tr>
            <tr>
                <td class="tg-0pky" colspan="8"><span style="font-weight:400;font-style:normal">Servicio:
                        <? echo $servicio ?>
                    </span></td>
            </tr>
            <tr>
                <td class="tg-0pky" colspan="4"><span style="font-weight:400;font-style:normal">Servicio de Ingreso:
                        <? echo $ingreso ?>
                    </span>
                </td>
                <td class="tg-0pky" colspan="2"><span style="font-weight:400;font-style:normal">Fecha de ingreso:
                        <? echo $fechaHAI ?>
                    </span>
                </td>
                <td class="tg-0pky" colspan="2">Hora de ingreso:
                    <? echo $horaai ?>
                </td>
            </tr>
            <tr>
                <td class="tg-0pky" colspan="4">Servicio de egreso:
                    <? echo $egreso ?><br>
                </td>
                <td class="tg-0pky" colspan="2">Fecha de egreso:
                    <? echo $fechaE ?>
                </td>
                <td class="tg-0pky" colspan="2">Hora de egreso:
                    <? echo $horaE ?>
                </td>
            </tr>
            <tr>
                <td class="tg-0pky" colspan="8"><span style="font-weight:700;font-style:normal"> DEL INGRESO</span></td>
            </tr>
            <tr>
                <td class="tg-0pky"><span style="font-weight:400;font-style:normal">Peso:
                        <? echo $peso  ?>
                    </span></td>
                <td class="tg-0pky"><span style="font-weight:400;font-style:normal">Talla:
                        <? echo $talla ?>
                    </span></td>
                <td class="tg-0pky"><span style="font-weight:400;font-style:normal">FC:
                        <? echo $fc ?>
                    </span></td>
                <td class="tg-0pky"><span style="font-weight:400;font-style:normal">FR:
                        <? echo $fr ?>
                    </span><br></td>
                <td class="tg-0pky"><span style="font-weight:400;font-style:normal">TA:
                        <? echo $ta ?>
                    </span><br></td>
                <td class="tg-0pky" colspan="3"><span style="font-weight:400;font-style:normal">Profesional:
                        <? echo $profe ?>
                    </span></td>
            </tr>
            <tr>
                <td class="tg-0pky" colspan="5">Motivo de la consulta:
                    <? echo $consultam ?>
                </td>
                <td class="tg-0pky"></td>
                <td class="tg-0pky"></td>
                <td class="tg-0pky"></td>
            </tr>
            <tr>
                <td class="tg-0lax" colspan="4"><span style="font-weight:400;font-style:normal">Enfermedad Actual:
                        <? echo $enferactual ?>
                    </span>
                </td>
                <td class="tg-0lax" colspan="4"><span style="font-weight:400;font-style:normal">Antecedentes
                        Personales:
                        <? echo $antec ?>
                    </span></td>
            </tr>
            <tr>
                <td class="tg-0lax" colspan="4"><span style="font-weight:400;font-style:normal">Examen Psicológico:
                        <? echo $psico ?>
                    </span>
                </td>
                <td class="tg-0lax" colspan="4"><span style="font-weight:400;font-style:normal">Diagnostico:
                        <? echo $diagno ?>
                    </span></td>
            </tr>
            <tr>
                <td class="tg-0lax" colspan="8"></td>
            </tr>
            <tr>
                <td class="tg-0lax" colspan="8"><span style="font-weight:400;font-style:normal">Cambios del estado del
                        paciente (Complicaciones, accidentes o eventos adversos):
                        <? echo $cambios ?>
                    </span></td>
            </tr>
            <tr>
                <td class="tg-0lax" colspan="8"><span style="font-weight:400;font-style:normal">DIAGNÓSTICO
                        PRINCIPAL:
                        <? echo $diagno ?>
                    </span></td>
            </tr>
            <tr>
                <td class="tg-0lax" colspan="8"><span style="font-weight:400;font-style:normal">OTROS DIAGNÓSTICOS:
                        <? echo $otros ?>
                    </span>
                </td>
            </tr>
            <tr>
                <td class="tg-0lax" colspan="8"><span style="font-weight:400;font-style:normal">CONDICIONES DE LA SALIDA
                        DEL
                        PACIENTE:
                        <? echo $salida ?>
                    </span></td>
            </tr>
            <tr>
                <td class="tg-0lax" colspan="8"><span style="font-weight:400;font-style:normal">RECOMENDACIONES:
                        <? echo $recomenda ?>
                    </span></td>
            </tr>

        </tbody>
    </table>


    <div class="row img">
        <div class="col-md-12">
            <?php echo $firmaImg; ?><br>
            _______________________________________<br>
            <?php echo $nombreF; ?><br>
            <?php echo $especialidad; ?><br>
            <b>* Documento firmado digitalmente *</b>
        </div>
    </div>
</div>
<?php
$_GET['validar'] = $CODI_CLIENTE;
$_GET['mensaje'] = "Ingrese su Cédula para Visualizar el Contenido de la Impresión";
include 'preventView.php';
?>


<style type="text/css">
.tg {
    width: 100%;
    max-width: 100%;
    margin: auto;
    overflow-x: auto;
    border-collapse: collapse;
    border-spacing: 0;
}

.tg td,
.tg th {
    border-color: black;
    border-style: solid;
    border-width: 1px;
    font-family: Arial, sans-serif;
    font-size: 12px; /* Reducir el tamaño de fuente para las celdas */
    overflow: hidden;
    padding: 8px; /* Reducir el espacio interno de las celdas */
    word-break: normal;
}

.tg th {
    font-weight: bold;
}

.tg .tg-0pky {
    border-color: inherit;
    text-align: left;
    vertical-align: top;
}

.tg .tg-0lax {
    text-align: left;
    vertical-align: top;
}

.tittle {
    align-items: center;
    align-self: auto;
    display: flex;
    justify-content: center;
    font-size: 30px; /* Reducir el tamaño de fuente del título */
    margin-bottom: 10px;
    margin-top: 20px; /* Ajustar el margen superior */
}

.img {
    text-align: center;
    margin-top: 10px; /* Ajustar el margen superior */
}

.button {
    text-align: center;
    margin-top: 10px; /* Ajustar el margen superior */
}

.print-button {
    font-size: 16px; /* Reducir el tamaño de fuente del botón */
    font-weight: bold;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-bottom: 5px; /* Ajustar el margen inferior */
    padding: 8px 15px; /* Ajustar el padding del botón */
}

@media print {
    .button,
    .print-button {
        display: none;
    }

}
</style>
