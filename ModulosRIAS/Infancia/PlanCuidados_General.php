

<div class="col-md-12 row">


    <div class='form-group col-md-12'>
        <hr>
    </div>
    

    <div class='form-group col-md-12'>

        <div class='form-group col-md-12'>
                <label>Atención en salud bucal</label><br>
                <select name='PlanCuidados[PlanCuidados][1][Atención en salud bucal]' class='form-control input-lg select2' style='width:100%' >
                    <option value='' selected>Seleccione</option>
                    <option value='Si'>Si</option>
                    <option value='No'>No</option>
                </select>
        </div>

        <div class='form-group col-md-12'>
                <label>Ordenar prueba de hemoglobina: niñas entre 10 y 13 años.</label><br>
                <select name='PlanCuidados[PlanCuidados][2][Ordenar prueba de hemoglobina: niñas entre 10 y 13 años]' class='form-control input-lg select2' style='width:100%' >
                    <option value='' selected>Seleccione</option>
                    <option value='Si'>Si</option>
                    <option value='No'>No</option>
                </select>
        </div>

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
    

    <div class='form-group col-md-12'>
            <label>Sesiones educativas individuales</label><br>
            <select name='PlanCuidados[PlanCuidados][9][Sesiones educativas individuales]' class='form-control input-lg select2' style='width:100%' >
                <option value='' selected>Seleccione</option>
                <option value="Niños en quienes se identifican problemas de higiene corporal o bucal o síntomas recurrentes relacionados con dificultades en el cuidado de la salud."> Niños en quienes se identifican problemas de higiene corporal o bucal o síntomas recurrentes relacionados con dificultades en el cuidado de la salud. </option>
                <option value="Niños en quienes se presentan dificultades para establecer hábitos o rutinas de alimentación, nutrición, sueño, eliminación, etc."> Niños en quienes se presentan dificultades para establecer hábitos o rutinas de alimentación, nutrición, sueño, eliminación, etc. </option>
                <option value="Niños con problemas de desarrollo relacionados con estimulación de este."> Niños con problemas de desarrollo relacionados con estimulación de este. </option>
                <option value="Niños con mala adherencia a tratamientos, seguimientos o manejos crónicos."> Niños con mala adherencia a tratamientos, seguimientos o manejos crónicos. </option>
                <option value="Niños con necesidades especiales para el cuidado de la salud y en quien se identifiquen dificultades para lograr el mismo."> Niños con necesidades especiales para el cuidado de la salud y en quien se identifiquen dificultades para lograr el mismo. </option>
                <option value="Padres, madres o familiares que tengan dificultades para el cuidado, la alimentación o el aseo de su hijo recién nacido."> Padres, madres o familiares que tengan dificultades para el cuidado, la alimentación o el aseo de su hijo recién nacido. </option>
                <option value="Padres, madres, familiares y cuidadores quienes pese a la información recibida en la consulta o en la educación grupal, aún no tienen claridad sobre cómo iniciar la alimentación complementaria o realizar la fortificación o suplementación de micronutrientes."> Padres, madres, familiares y cuidadores quienes pese a la información recibida en la consulta o en la educación grupal, aún no tienen claridad sobre cómo iniciar la alimentación complementaria o realizar la fortificación o suplementación de micronutrientes. </option>
                <option value="Padres, madres o familiares que tienen problemas (referidos o identificados) para la crianza del niño."> Padres, madres o familiares que tienen problemas (referidos o identificados) para la crianza del niño. </option>
                <option value="Padres, madres o familiares con problemas para comprender las necesidades del niño."> Padres, madres o familiares con problemas para comprender las necesidades del niño. </option>
                <option value="Padres, madres o familiares con patrones de crianza nocivos (creencias, actitudes o prácticas) que no tienen en cuenta el grado o las características de desarrollo de los niños y están generando daño o tienen alto riesgo de producirlo."> Padres, madres o familiares con patrones de crianza nocivos (creencias, actitudes o prácticas) que no tienen en cuenta el grado o las características de desarrollo de los niños y están generando daño o tienen alto riesgo de producirlo. </option>
                <option value="Padres, madres o familiares que requieran claridad sobre su responsabilidad en el cuidado, en el acompañamiento y/o la protección del niño. Padres, madres o familiares que requieran claridad sobre estrategias de afrontamiento de sucesos vitales."> Padres, madres o familiares que requieran claridad sobre su responsabilidad en el cuidado, en el acompañamiento y/o la protección del niño. Padres, madres o familiares que requieran claridad sobre estrategias de afrontamiento de sucesos vitales. </option>
                <option value="Niños y niñas que presentan accidentes frecuentes, enfermedades recurrentes (asma), poca estimulación debido a la falta de implementación de medidas para garantizar entornos seguros y protectores."> Niños y niñas que presentan accidentes frecuentes, enfermedades recurrentes (asma), poca estimulación debido a la falta de implementación de medidas para garantizar entornos seguros y protectores. </option> 
                <option value="Niños y/o familiares que requieran mayor conocimiento sobre desarrollo psicosexual y/o derechos sexuales y reproductivos.">Niños y/o familiares que requieran mayor conocimiento sobre desarrollo psicosexual y/o derechos sexuales y reproductivos.</option>
                <option value="Niños y/o familiares con mala adherencia a tratamientos, seguimientos o manejos crónicos.">Niños y/o familiares con mala adherencia a tratamientos, seguimientos o manejos crónicos.</option>
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
