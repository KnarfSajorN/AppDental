
<div class="col-md-12 row">


    <div class='form-group col-md-12'>
        <hr>
    </div>
    

    <div class='form-group col-md-12'>
<?php


$ArreglosCamposOtrosAspectos = [
    "1" => "Atención en salud bucal",
    "2" => "Ordenar prueba de hemoglobina: niños entre 10 y 13 años",
    "3" => "Consulta de anticoncepción",
    "4" => "Para menores de 14 años  notificar a autoridades de protección y justicia",
    "5" => "Prueba rápida treponemica en caso de relaciones sexuales sin protección",
    "6" => "Prueba rápida para VIH previa asesoría pre y pos test y consentimiento informado en caso de relaciones sexuales sin protección",
    "7" => "Prueba de embarazo en caso de retraso menstrual u otros síntomas o signos de sospecha",
];

foreach ($ArreglosCamposOtrosAspectos as $key => $value) {
    $Titulo = $value;
    $Identificacion = $key;
   

    
    echo "<div class='form-group col-md-12'>
        <label>$Titulo</label><br>
        <select name='PlanCuidados[PlanCuidados][$Identificacion][$Titulo]' class='form-control input-lg select2' style='width:100%' >
                    <option value='' selected>Seleccione</option>
                    <option value='Si'>Si</option>
                    <option value='No'>No</option>
        </select>
    </div>";
    
}

        ?>
    </div>


    <div class='form-group col-md-12'>

    <?php

        include 'ModulosRIAS/Infancia/Include_EsquemaVacunacion.php';
    
    ?>

    </div>

    <div class='form-group col-md-12'>
            <label>VPH Observaciones</label><br>
            <textarea class='form-control' name='PlanCuidados[PlanCuidados][3][VPH Observaciones]' style='width: 100%; height: 94px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;'></textarea>
    </div>
    
    <?php

    ?>
    <div class='form-group col-md-12'>
            <label>Sesiones educativas individuales</label><br>
            <select name='PlanCuidados[PlanCuidados][9][Sesiones educativas individuales]' class='form-control input-lg select2' style='width:100%' >
                <option value='' selected>Seleccione</option>
                <option value="Adolescentes con riesgo o dificultades para el afrontamiento emocional. - Adolescentes que presentan compromisos muy fuertes, no han realizado una verdadera exploración en los diferentes dominios de su identidad, hayan presentado problemas de comportamiento; se evidencia falta de recursos para la toma de decisiones como la autoeficacia o no realizan reflexión sobre la toma de decisiones. "> Adolescentes con riesgo o dificultades para el afrontamiento emocional. - Adolescentes que presentan compromisos muy fuertes, no han realizado una verdadera exploración en los diferentes dominios de su identidad, hayan presentado problemas de comportamiento; se evidencia falta de recursos para la toma de decisiones como la autoeficacia o no realizan reflexión sobre la toma de decisiones. </option>
                <option value="Adolescentes que habiten en un entorno social de alto riesgo, con pares o padres que ejercen presiones hacia comportamientos negativos, (actividades delictivas, diversas formas de violencia, Explotación Sexual y ComerciaI, Consumo de SPA)">Adolescentes que habiten en un entorno social de alto riesgo, con pares o padres que ejercen presiones hacia comportamientos negativos, (actividades delictivas, diversas formas de violencia, Explotación Sexual y ComerciaI, Consumo de SPA) </option>
                <option value="Adolescentes que no cuentan con apoyo familiar o en los que se percibe déficits entre límites y libertad; tienen mala comunicación, desconfianza de sus amigos/as o se sienten apartados/as de ellos/as"> Adolescentes que no cuentan con apoyo familiar o en los que se percibe déficits entre límites y libertad; tienen mala comunicación, desconfianza de sus amigos/as o se sienten apartados/as de ellos/as</option>
                <option value="Adolescentes con preocupaciones no justificadas por su imagen corporal y su peso">Adolescentes con preocupaciones no justificadas por su imagen corporal y su peso</option>

                <option value="Fortalecimiento de la alimentación saludable">Fortalecimiento de la alimentación saludable</option>
                <option value="Cesación de tabaco en adolescentes con tabaquismo o exposición al humo del tabaco">Cesación de tabaco en adolescentes con tabaquismo o exposición al humo del tabaco</option>
                <option value="Educación para la salud en Derechos Sexuales y Derechos Reproductivos">Educación para la salud en Derechos Sexuales y Derechos Reproductivos</option>
            </select>
    </div>

    <div class='form-group col-md-12'>
            <label> Educación grupal para</label><br>
            <select name='PlanCuidados[PlanCuidados][10][Educación grupal para]' class='form-control input-lg select2' style='width:100%' >
                <option value='' selected>Seleccione</option>
                <option value="Familias con relaciones conflictivas e inadecuado funcionamiento familiar, con desorganización y presencia de conflictos que afectan el bienestar y desarrollo de sus integrantes y la dinámica familiar."> Familias con relaciones conflictivas e inadecuado funcionamiento familiar, con desorganización y presencia de conflictos que afectan el bienestar y desarrollo de sus integrantes y la dinámica familiar. </option>
                <option value="Familias con vivencia de sucesos vitales que puedan sobrepasar la capacidad de la familia para su afrontamiento y afectar su salud."> Familias con vivencia de sucesos vitales que puedan sobrepasar la capacidad de la familia para su afrontamiento y afectar su salud. </option>
                <option value="Familias en situaciones de vulnerabilidad social que pueden afectar la salud familiar, (por ej.: familias con varios integrantes en condición de dependencia y un solo proveedor, familias en contexto de mayor exposición a violencias, consumo SPA, explotación sexual o económica, pandillismo, entre otras)."> Familias en situaciones de vulnerabilidad social que pueden afectar la salud familiar, (por ej.: familias con varios integrantes en condición de dependencia y un solo proveedor, familias en contexto de mayor exposición a violencias, consumo SPA, explotación sexual o económica, pandillismo, entre otras). </option>
                <option value="Familias con algún integrante con discapacidad."> Familias con algún integrante con discapacidad. </option>
                <option value="Familias con deficientes redes de apoyo, o sostenimiento de relaciones sociales y comunitarias que generen riesgo o afectación de la salud familiar."> Familias con deficientes redes de apoyo, o sostenimiento de relaciones sociales y comunitarias que generen riesgo o afectación de la salud familiar. </option>
                <option value="Familias con prácticas del cuidado de salud críticas de varios de sus integrantes que ponen en riesgo o han afectado la salud de la familia (p ej, descuidos en la higiene personal, prácticas y rutinas de alimentación desordenadas e inadecuada de los integrantes de la familia, ausencia de encuentros familiares que se relacionen con sentimientos de soledad y frustración de sus integrantes entre otros)."> Familias con prácticas del cuidado de salud críticas de varios de sus integrantes que ponen en riesgo o han afectado la salud de la familia (p ej, descuidos en la higiene personal, prácticas y rutinas de alimentación desordenadas e inadecuada de los integrantes de la familia, ausencia de encuentros familiares que se relacionen con sentimientos de soledad y frustración de sus integrantes entre otros). </option>
                <option value="Atenciones básicas para promover la cesación del consumo de tabaco a personas identificadas con tabaquismo">Atenciones básicas para promover la cesación del consumo de tabaco a personas identificadas con tabaquismo</option>
            </select>
    </div>

</div>
