<?php

if($TipoAccion_Preocupacional_74=="HabitosToxicos"){

    echo "<div class='col-md-12'>
            <a href='#printerHabitosToxicos' class='btn btn-primary' onclick='addHabitosToxicos(true)'><i class='fa fa-plus-circle'></i> Agregar</a>
        </div>
        <div class='col-md-12' id='printerHabitosToxicos'>
        </div>";

    ?>
    <script>
        var acum5 = 1;

        function addHabitosToxicos(activo = false) {
            var imprimir = "";
            imprimir += '<div class="row" id="habitosToxicos' + acum5 + '">';
            imprimir += '   <div class="col-md-12" align="right"><a href="#printerHabitosToxicos" class="btn btn-danger" onclick="removerHabitosToxicos(' + acum5 + ')"><i class="fa fa-trash"></i> Eliminar</a></div>';
            imprimir += '   <div class="col-md-12">';
            imprimir += '       <label for="consumoNocivo' + acum5 + '">Consumo Nocivo</label>';
            imprimir += '       <input type="text" class="form-control input-lg" name="habitosToxicos[' + acum5 + '][consumoNocivo]" id="consumoNocivo' + acum5 + '" placeholder="">';
            imprimir += '   </div>';
            imprimir += '   <div class="col-md-2">';
            imprimir += '       <label for="sino' + acum5 + '">Si/No</label>';
            imprimir += '       <select class="form-control input-lg" name="habitosToxicos[' + acum5 + '][sino]" id="sino' + acum5 + '" style="width:100%">';
            imprimir += '           <option value="" selected disabled>Seleccione</option>';
            imprimir += '           <option value="Si">Si</option>';
            imprimir += '           <option value="No">No</option>';
            imprimir += '       </select>';
            imprimir += '   </div>';
            imprimir += '   <div class="col-md-3">';
            imprimir += '       <label for="tiempoConsumo' + acum5 + '">Tiempo de Consumo</label>';
            imprimir += '       <input type="text" class="form-control input-lg" name="habitosToxicos[' + acum5 + '][tiempoConsumo]" id="tiempoConsumo' + acum5 + '" placeholder="">';
            imprimir += '   </div>';
            imprimir += '   <div class="col-md-2">';
            imprimir += '       <label for="cantidad' + acum5 + '">Cantidad</label>';
            imprimir += '       <input type="text" class="form-control input-lg" name="habitosToxicos[' + acum5 + '][cantidad]" id="cantidad' + acum5 + '" placeholder="">';
            imprimir += '   </div>';
            imprimir += '   <div class="col-md-2">';
            imprimir += '       <label for="exConsumidor' + acum5 + '">Ex Consumidor</label>';
            imprimir += '       <input type="text" class="form-control input-lg" name="habitosToxicos[' + acum5 + '][exConsumidor]" id="exConsumidor' + acum5 + '" placeholder="">';
            imprimir += '   </div>';
            imprimir += '   <div class="col-md-3">';
            imprimir += '       <label for="tiempoAbstinencia' + acum5 + '">Tiempo de Abstinencia</label>';
            imprimir += '       <input type="text" class="form-control input-lg" name="habitosToxicos[' + acum5 + '][tiempoAbstinencia]" id="tiempoAbstinencia' + acum5 + '" placeholder="">';
            imprimir += '   </div>';
            imprimir += '   <div class="col-md-12">';
            imprimir += '       <br>';
            imprimir += '   </div>';
            imprimir += '   <hr>';
            imprimir += '</div>';
            $("#printerHabitosToxicos").append(imprimir);
            acum5++;
        }
        addHabitosToxicos();
    </script>

    <?php
}

if($TipoAccion_Preocupacional_74=="EstiloVida"){

    echo "<div class='col-md-12'>
    <a href='#printerEstiloVida' class='btn btn-primary' onclick='addEstiloVida(true)'><i class='fa fa-plus-circle'></i> Agregar </a>
</div>
<div class='col-md-12' id='printerEstiloVida'>
</div>";

    ?>

    <script>
        var acum6 = 1;

        function addEstiloVida(activo = false) {
            var imprimir = "";
            imprimir += '<div class="row" id="estiloVida' + acum6 + '">';
            imprimir += '   <div class="col-md-12" align="right"><a href="#printerEstiloVida" class="btn btn-danger" onclick="removerEstiloVida(' + acum6 + ')"><i class="fa fa-trash"></i> Eliminar</a></div>';
            imprimir += '   <div class="col-md-12">';
            imprimir += '       <label for="estilo' + acum6 + '">Estilo</label>';
            imprimir += '       <input type="text" class="form-control input-lg" name="estiloVida[' + acum6 + '][estilo]" id="estilo' + acum6 + '" placeholder="">';
            imprimir += '   </div>';
            imprimir += '   <div class="col-md-4">';
            imprimir += '       <label for="sino' + acum6 + '">Si/No</label>';
            imprimir += '       <select class="form-control input-lg" name="estiloVida[' + acum6 + '][sino]" id="sino' + acum6 + '" style="width:100%">';
            imprimir += '           <option value="" selected disabled>Seleccione</option>';
            imprimir += '           <option value="Si">Si</option>';
            imprimir += '           <option value="No">No</option>';
            imprimir += '       </select>';
            imprimir += '   </div>';
            imprimir += '   <div class="col-md-4">';
            imprimir += '       <label for="cual' + acum6 + '">¿Cuál?</label>';
            imprimir += '       <input type="text" class="form-control input-lg" name="estiloVida[' + acum6 + '][cual]" id="cual' + acum6 + '" placeholder="">';
            imprimir += '   </div>';
            imprimir += '   <div class="col-md-4">';
            imprimir += '       <label for="tiempoCantidad' + acum6 + '">Tiempo / Cantidad</label>';
            imprimir += '       <input type="text" class="form-control input-lg" name="estiloVida[' + acum6 + '][tiempoCantidad]" id="tiempoCantidad' + acum6 + '" placeholder="">';
            imprimir += '   </div>';
            imprimir += '   <div class="col-md-12">';
            imprimir += '       <br>';
            imprimir += '   </div>';
            imprimir += '</div>';
            $("#printerEstiloVida").append(imprimir);
            acum6++;
        }
        addEstiloVida();
    </script>
    <?php
}

if($TipoAccion_Preocupacional_74=="AntecedentesTrabajo"){

    echo "<div class='col-md-12'>
    <a href='#printerAnteTrabajo' class='btn btn-primary' onclick='addAnteTrabajo(true)'><i class='fa fa-plus-circle'></i> Agregar </a>
</div>
<div class='col-md-12' id='printerAnteTrabajo'>
</div>";

    ?>

    <script>
         var acum7 = 1;

        function addAnteTrabajo(activo = false) {
            var imprimir = "";
            imprimir += '<div class="row" id="anteTrabajo' + acum7 + '">';
            imprimir += '   <div class="col-md-12" align="right"><a href="#printerAnteTrabajo" class="btn btn-danger" onclick="removerAnteTrabajo(' + acum7 + ')"><i class="fa fa-trash"></i> Eliminar </a></div>';
            imprimir += '   <div class="col-md-3">';
            imprimir += '       <label for="empresa' + acum7 + '">Empresa </label>';
            imprimir += '       <input type="text" class="form-control input-lg" name="anteTrabajo[' + acum7 + '][empresa]" id="empresa' + acum7 + '" placeholder="">';
            imprimir += '   </div>';
            imprimir += '   <div class="col-md-3">';
            imprimir += '       <label for="puestoTrabajo' + acum7 + '">Puesto de Trabajo</label>';
            imprimir += '       <input type="text" class="form-control input-lg" name="anteTrabajo[' + acum7 + '][puestoTrabajo]" id="puestoTrabajo' + acum7 + '" placeholder="">';
            imprimir += '   </div>';
            imprimir += '   <div class="col-md-3">';
            imprimir += '       <label for="activDesem' + acum7 + '">Actividades que Desempeñaba</label>';
            imprimir += '       <input type="text" class="form-control input-lg" name="anteTrabajo[' + acum7 + '][activDesem]" id="activDesem' + acum7 + '" placeholder="">';
            imprimir += '   </div>';
            imprimir += '   <div class="col-md-3">';
            imprimir += '       <label for="tiempoTrabajo' + acum7 + '">Tiempo de Trabajo</label>';
            imprimir += '       <input type="text" class="form-control input-lg" name="anteTrabajo[' + acum7 + '][tiempoTrabajo]" id="tiempoTrabajo' + acum7 + '" placeholder="">';
            imprimir += '   </div>';
            imprimir += '   <div class="col-md-6">';
            imprimir += '       <label for="riesgosAnte' + acum7 + '">Riesgo</label>';
            imprimir += '       <select class="form-control input-lg selectNuevo" name="anteTrabajo[' + acum7 + '][riesgo]" id="riesgosAnte' + acum7 + '" style="width:100%">';
            imprimir += '           <option value="" selected disabled>Seleccione</option>';
            imprimir += '           <option value="Físico">Físico</option>';
            imprimir += '           <option value="Mecánico">Mecánico</option>';
            imprimir += '           <option value="Químico">Químico</option>';
            imprimir += '           <option value="Biológico">Biológico</option>';
            imprimir += '           <option value="Ergonómico">Ergonómico</option>';
            imprimir += '           <option value="Psicosocial">Psicosocial</option>';
            imprimir += '       </select>';
            imprimir += '   </div>';
            imprimir += '   <div class="col-md-6">';
            imprimir += '       <label for="observaciones' + acum7 + '">Observaciones</label>';
            imprimir += '       <input type="text" class="form-control input-lg" name="anteTrabajo[' + acum7 + '][observaciones]" id="observaciones' + acum7 + '" placeholder="">';
            imprimir += '   </div>';
            imprimir += '   <div class="col-md-12">';
            imprimir += '       <br>';
            imprimir += '   </div>';
            imprimir += '</div>';
            $("#printerAnteTrabajo").append(imprimir);
            acum6++;
        }
        addAnteTrabajo(true);
    </script>
    <?php
}



if($TipoAccion_Preocupacional_74=="FactoresRiesgos"){

    echo "<div class='col-md-12'>
    <a href='#printerRiesgos' class='btn btn-primary' onclick='addRiesgos(true)'><i class='fa fa-plus-circle'></i> Agregar </a>
</div>
<div class='col-md-12' id='printRiesgos'></div>";

    ?>
    <script>
        var acum = 1;

        function addRiesgos(activo = false) {
            var imprimir = "";
            imprimir += '<div class="col-md-12" id="riesgo' + acum + '">';
            imprimir += '<div class="col-md-12" align="right"><a href="#removerimgLabOtros" class="btn btn-danger" onclick="removerRiesgo(' + acum + ')"><i class="fa fa-trash"></i> Eliminar</a></div>';
            imprimir += '  <div class="row">';
            imprimir += '    <div class="col-md-4">';
            imprimir += '      <label for="puestoTrabajo">Puesto de Trabajo / Área</label>';
            imprimir += '      <input type="text" class="form-control" name="riesgos[' + acum + '][puestoTrabajo]" id="puestoTrabajo' + acum + '" placeholder="">';
            imprimir += '    </div>';
            imprimir += '    <div class="col-md-4">';
            imprimir += '      <label for="actividades">Actividades</label>';
            imprimir += '      <input type="text" class="form-control" name="riesgos[' + acum + '][actividades]" id="actividades' + acum + '" placeholder="">';
            imprimir += '    </div>';
            imprimir += '    <div class="col-md-4">';
            imprimir += '      <label for="tiempoTrabajo">Tiempo de Trabajo (Meses)</label>';
            imprimir += '      <input type="text" class="form-control" name="riesgos[' + acum + '][tiempoTrabajo]" id="tiempoTrabajo' + acum + '" placeholder="">';
            imprimir += '    </div>';
            imprimir += '  </div>';
            imprimir += '  <div class="row">';
            imprimir += '    <div class="col-md-6">';
            imprimir += '      <label for="puestoTrabajo">Físico</label>';
            imprimir += '      <select class="form-control input-lg select22" multiple name="riesgos[' + acum + '][fisico][]" id="fisico' + acum + '" onchange="addOtrosRiesgos(\'fisico\', ' + acum + ')">';
            imprimir += '        <option value="Temperaturas Altas">Temperaturas altas</option>';
            imprimir += '        <option value="Temperaturas Bajas">Temperaturas bajas</option>';
            imprimir += '        <option value="Radiación Ionizante">Radiación Ionizante</option>';
            imprimir += '        <option value="Radiación No Ionizante">Radiación No Ionizante</option>';
            imprimir += '        <option value="Ruido Vibración">Ruido Vibración</option>';
            imprimir += '        <option value="Iluminación">Iluminación</option>';
            imprimir += '        <option value="Ventilación">Ventilación</option>';
            imprimir += '        <option value="Fluido">Fluido</option>';
            imprimir += '        <option value="Eléctrico">eléctrico</option>';
            imprimir += '        <option value="Otros">Otros</option>';
            imprimir += '      </select>';
            imprimir += '    </div>';
            imprimir += '    <div class="col-md-6">';
            imprimir += '      <label for="actividades">Mecánico</label>';
            imprimir += '      <select class="form-control input-lg select22" multiple name="riesgos[' + acum + '][mecanico][]" id="mecanico' + acum + '" onchange="addOtrosRiesgos(\'mecanico\', ' + acum + ')">';
            imprimir += '        <option value="Atrapamiento entre Máquinas">Atrapamiento entre máquinas</option>';
            imprimir += '        <option value="Atrapamiento entre Superficies">Atrapamiento entre superficies</option>';
            imprimir += '        <option value="Atrapamiento entre Objetos">Atrapamiento entre objetos</option>';
            imprimir += '        <option value="Caída de Objetos">Caída de objetos</option>';
            imprimir += '        <option value="Caídas al Mismo Nivel">Caídas al mismo nivel</option>';
            imprimir += '        <option value="Caídas a Diferente Nivel">Caídas a diferente nivel</option>';
            imprimir += '        <option value="Contacto Eléctrico">Contacto eléctrico</option>';
            imprimir += '        <option value="Contacto con Superficies de Trabajos">Contacto con superficies de trabajos</option>';
            imprimir += '        <option value="Proyección de Partículas – Fragmentos">Proyección de partículas – fragmentos</option>';
            imprimir += '        <option value="Proyección de Fluidos">Proyección de fluidos</option>';
            imprimir += '        <option value="Pinchazos">Pinchazos</option>';
            imprimir += '        <option value="Cortes">Cortes</option>';
            imprimir += '        <option value="Atropellamientos por Vehículos">Atropellamientos por vehículos</option>';
            imprimir += '        <option value="Choques/Colisión Vehicular">Choques/colisión vehicular</option>';
            imprimir += '        <option value="Otros">Otros</option>';
            imprimir += '      </select>';
            imprimir += '    </div>';
            imprimir += '    <div class="col-md-6">';
            imprimir += '      <label for="">Químico</label>';
            imprimir += '      <select class="form-control input-lg select22" multiple name="riesgos[' + acum + '][quimico][]" id="quimico' + acum + '" onchange="addOtrosRiesgos(\'quimico\', ' + acum + ')">';
            imprimir += '        <option value="Sólidos">Sólidos</option>';
            imprimir += '        <option value="Polvos">Polvos</option>';
            imprimir += '        <option value="Humos">Humos</option>';
            imprimir += '        <option value="Líquidos">Líquidos</option>';
            imprimir += '        <option value="Vapores">Vapores</option>';
            imprimir += '        <option value="Aerosoles">Aerosoles</option>';
            imprimir += '        <option value="Neblinas">Neblinas</option>';
            imprimir += '        <option value="Gaseosos">Gaseosos</option>';
            imprimir += '        <option value="Otros">Otros</option>';
            imprimir += '      </select>';
            imprimir += '    </div>';
            imprimir += '    <div class="col-md-6">';
            imprimir += '      <label for="">Biológico</label>';
            imprimir += '      <select class="form-control input-lg select22" multiple name="riesgos[' + acum + '][biológico][]" id="biológico' + acum + '" onchange="addOtrosRiesgos(\'biológico\', ' + acum + ')">';
            imprimir += '        <option value="Virus">Virus</option>';
            imprimir += '        <option value="Hongos">Hongos</option>';
            imprimir += '        <option value="Bacterias">Bacterias</option>';
            imprimir += '        <option value="Parásitos">Parásitos</option>';
            imprimir += '        <option value="Exposición a Vectores">Exposición a vectores</option>';
            imprimir += '        <option value="Exposición a Animales Selváticos">Exposición a animales selváticos</option>';
            imprimir += '        <option value="Otros">Otros</option>';
            imprimir += '      </select>';
            imprimir += '    </div>';
            imprimir += '    <div class="col-md-6">';
            imprimir += '      <label for="">Ergonómico</label>';
            imprimir += '      <select class="form-control input-lg select22" multiple name="riesgos[' + acum + '][ergonomico][]" id="ergonomico' + acum + '" onchange="addOtrosRiesgos(\'ergonomico\', ' + acum + ')">';
            imprimir += '        <option value="Manejo Manual de Carga">Manejo manual de carga</option>';
            imprimir += '        <option value="Movimiento Repetitivos">Movimiento repetitivos</option>';
            imprimir += '        <option value="Posturas Forzadas">Posturas forzadas</option>';
            imprimir += '        <option value="Trabajos con PVD">Trabajos con PVD</option>';
            imprimir += '        <option value="Otros">Otros</option>';
            imprimir += '      </select>';
            imprimir += '    </div>';
            imprimir += '    <div class="col-md-6">';
            imprimir += '      <label for="">Psicosocial</label>';
            imprimir += '      <select class="form-control input-lg select22" multiple name="riesgos[' + acum + '][psicosocial][]" id="psicosocial' + acum + '" onchange="addOtrosRiesgos(\'psicosocial\', ' + acum + ')">';
            imprimir += '        <option value="Monotonía del Trabajo">Monotonía del trabajo</option>';
            imprimir += '        <option value="Sobrecarga Laboral">Sobrecarga laboral</option>';
            imprimir += '        <option value="Minuciosidad de la Tarea">Minuciosidad de la tarea</option>';
            imprimir += '        <option value="Alta Responsabilidad">Alta responsabilidad</option>';
            imprimir += '        <option value="Autonomía en la Toma de Decisiones">Autonomía en la toma de decisiones</option>';
            imprimir += '        <option value="Supervisión y Estilos de Dirección Deficiente">Supervisión y estilos de dirección deficiente</option>';
            imprimir += '        <option value="Conflicto de Rol">Conflicto de rol</option>';
            imprimir += '        <option value="Falta de Claridad en las Funciones">Falta de claridad en las funciones</option>';
            imprimir += '        <option value="Incorrecta Distribución del Trabajo">Incorrecta distribución del trabajo</option>';
            imprimir += '        <option value="Turnos Rotativos">Turnos rotativos</option>';
            imprimir += '        <option value="Relaciones Interpersonales">Relaciones interpersonales</option>';
            imprimir += '        <option value="Inestabilidad Laboral">Inestabilidad laboral</option>';
            imprimir += '        <option value="Otros">Otros</option>';
            imprimir += '      </select>';
            imprimir += '    </div>';
            imprimir += '  </div>';
            imprimir += '  <div class="row">';
            imprimir += '    <div class="col-md-12">';
            imprimir += '      <label for="">Medidas Preventivas</label>';
            imprimir += '      <textarea class="form-control" name="riesgos[' + acum + '][medidasPreventivas]" id="medidasPreventivas' + acum + '" rows="3" style="width:100%"></textarea>';
            imprimir += '    </div>';
            imprimir += '  </div>';
            imprimir += '</div>';
            $("#printRiesgos").append(imprimir);
            if (activo == true) {
                $(".select22").select2();
            }
            acum++;
            selectExamenes(true);
        }
        addRiesgos();


    </script>
    <?php
}

?>