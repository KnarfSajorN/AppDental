<?php

echo "<div class='col-md-12'><br><h2 style='text-align-last: center;'> Vacunacion </h2><br></div>";

                        echo '<style>
                        #TablaVacunacionCSS {
                            pointer-events: none; /* Evitar eventos de puntero dentro del contenedor */
                            background-color: rgba(0, 0, 0, 0.1); /* Fondo semitransparente */
                            padding: 10px; /* Añadir un poco de espacio alrededor de la tabla */
                        }
                        </style>
                        <div id="TablaVacunacionCSS">
                        <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">Edad</th>
                                <th class="text-center">Vacuna</th>
                                <th class="text-center">Dosis</th>
                                <th class="text-center">Enfermedad que Previene</th>
                                <th class="text-center">Si</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td colspan="3" class="text-center">Leche materna exclusiva</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td rowspan="2" class="text-center">Recién nacido</td>
                                <td class="text-center">BCG</td>
                                <td class="text-center">Única</td>
                                <td class="text-center">Meningitis tuberculosa</td>
                                <td>
                                    <input type="checkbox" name="ArregloVacunacion[bcgUnica]" value="1">
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Hepatitis B</td>
                                <td class="text-center">Recién nacido</td>
                                <td class="text-center">Hepatitis B</td>
                                <td>
                                    <input type="checkbox" name="ArregloVacunacion[hepatitisBRN]" value="1">
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="3" class="text-center">Leche materna exclusiva</td>
                            </tr>
        
                            <tr>
                                <td rowspan="3" style="vertical-align: middle;">
                                    <p class="text-center" style="writing-mode: vertical-lr;transform: rotate(180deg);float: right;">Pentavalente</p>
                                </td>
                                <td class="text-center">Difteria - Tos ferina - Tétanos (DPT)</td>
                                <td class="text-center">Primera</td>
                                <td class="text-center">Difteria - Tos ferina - Tétanos</td>
                                <td>
                                    <input type="checkbox" name="ArregloVacunacion[difteriaTFT]" value="1">
                                </td>
                            </tr>
                            <tr>
                                
                                <td class="text-center">Haemophilus Influenzaetipo b (Hib)</td>
                                <td class="text-center"></td>
                                <td class="text-center">Meningitis y otras enfermedades causadas por Haemophilus Influenzae tipo b</td>
                                <td>
                                    <input type="checkbox" name="ArregloVacunacion[haemophilusIB]" value="1">
                                </td>
                            </tr>
                            <tr>
                                
                                <td class="text-center">Hepatitis B</td>
                                <td class="text-center"></td>
                                <td class="text-center">Hepatitis B</td>
                                <td>
                                    <input type="checkbox" name="ArregloVacunacion[hepatitisBP]" value="1">
                                </td>
                            </tr>
        
        
        
                            <tr>
                                <td class="text-center">A los 2 meses</td>
                                <td class="text-center">Polio</td>
                                <td class="text-center">Primera</td>
                                <td class="text-center">Poliomielitis</td>
                                <td class="text-center">
                                    <input type="checkbox" name="ArregloVacunacion[polioP]" value="1">
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center"></td>
                                <td class="text-center">Rotavirus</td>
                                <td class="text-center">Primera</td>
                                <td class="text-center">Diarrea por Rotavirus</td>
                                <td class="text-center">
                                    <input type="checkbox" name="ArregloVacunacion[rotavirusP]" value="1">
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center"></td>
                                <td class="text-center">Neumococo</td>
                                <td class="text-center">Primera</td>
                                <td class="text-center">Neumonía, otítis, meningitis y bacteriemia</td>
                                <td class="text-center">
                                    <input type="checkbox" name="ArregloVacunacion[neumococoP]" value="1">
                                </td>
                            </tr>
        
                            <tr>
                                <td></td>
                                <td colspan="3" class="text-center">Leche materna exclusiva</td>
                            </tr>
        
        
        
                            <tr>
                                <td rowspan="3" style="vertical-align: middle;">
                                    <p class="text-center" style="writing-mode: vertical-lr;transform: rotate(180deg);float: right;">Pentavalente</p>
                                </td>
                                <td class="text-center">Difteria - Tos ferina - Tétanos (DPT)</td>
                                <td class="text-center">Segunda</td>
                                <td class="text-center">Difteria - Tos ferina - Tétanos</td>
                                <td>
                                    <input type="checkbox" name="ArregloVacunacion[difteriaTFTS]" value="1">
                                </td>
                            </tr>
                            <tr>
                                
                                <td class="text-center">Haemophilus Influenzaetipo b (Hib)</td>
                                <td class="text-center"></td>
                                <td class="text-center">Meningitis y otras enfermedades causadas por Haemophilus Influenzae tipo b</td>
                                <td>
                                    <input type="checkbox" name="ArregloVacunacion[haemophilusIBS]" value="1">
                                </td>
                            </tr>
                            <tr>
                                
                                <td class="text-center">Hepatitis B</td>
                                <td class="text-center"></td>
                                <td class="text-center">Hepatitis B</td>
                                <td>
                                    <input type="checkbox" name="ArregloVacunacion[hepatitisBPS]" value="1">
                                </td>
                            </tr>
        
        
        
        
        
        
        
                            
                            <tr>
                                <td class="text-center">A los 4 meses</td>
                                <td class="text-center">Polio</td>
                                <td class="text-center">Segunda</td>
                                <td class="text-center">Poliomielitis</td>
                                <td class="text-center">
                                    <input type="checkbox" name="ArregloVacunacion[polioS]" value="1">
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center"></td>
                                <td class="text-center">Rotavirus</td>
                                <td class="text-center">Segunda</td>
                                <td class="text-center">Diarrea por Rotavirus</td>
                                <td class="text-center">
                                    <input type="checkbox" name="ArregloVacunacion[rotavirusS]" value="1">
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center"></td>
                                <td class="text-center">Neumococo</td>
                                <td class="text-center">Segunda</td>
                                <td class="text-center">Neumonía, otítis, meningitis y bacteriemia</td>
                                <td class="text-center">
                                    <input type="checkbox" name="ArregloVacunacion[neumococoS]" value="1">
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="3" class="text-center">Continue la leche materna hasta que cumpla dos años e inicie alimentación complementaria nutritiva</td>
                            </tr>
        
        
                            <tr>
                                <td rowspan="3" style="vertical-align: middle;">
                                    <p class="text-center" style="writing-mode: vertical-lr;transform: rotate(180deg);float: right;">Pentavalente</p>
                                </td>
                                <td class="text-center">Difteria - Tos ferina - Tétanos (DPT)</td>
                                <td class="text-center">Tercera</td>
                                <td class="text-center">Difteria - Tos ferina - Tétanos</td>
                                <td>
                                    <input type="checkbox" name="ArregloVacunacion[difteriaTFTT]" value="1">
                                </td>
                            </tr>
                            <tr>
                                
                                <td class="text-center">Haemophilus Influenzaetipo b (Hib)</td>
                                <td class="text-center"></td>
                                <td class="text-center">Meningitis y otras enfermedades causadas por Haemophilus Influenzae tipo b</td>
                                <td>
                                    <input type="checkbox" name="ArregloVacunacion[haemophilusIBT]" value="1">
                                </td>
                            </tr>
                            <tr>
                                
                                <td class="text-center">Hepatitis B</td>
                                <td class="text-center"></td>
                                <td class="text-center">Hepatitis B</td>
                                <td>
                                    <input type="checkbox" name="ArregloVacunacion[hepatitisBPT]" value="1">
                                </td>
                            </tr>
        
        
        
        
                            <tr>
                                <td class="text-center">A los 6 meses</td>
                                <td class="text-center">Polio</td>
                                <td class="text-center">Tercera</td>
                                <td class="text-center">Poliomielitis</td>
                                <td class="text-center">
                                    <input type="checkbox" name="ArregloVacunacion[polioT]" value="1">
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center"></td>
                                <td class="text-center">Influenza estacional</td>
                                <td class="text-center">Tercera</td>
                                <td class="text-center">Diarrea por Rotavirus</td>
                                <td class="text-center">
                                    <input type="checkbox" name="ArregloVacunacion[influenzaEstacionalT]" value="1">
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">A los 7 meses</td>
                                <td class="text-center">Influenza estacional*</td>
                                <td class="text-center">Segunda</td>
                                <td class="text-center">Enfermedad respiratoria causada por el virus de la influenza</td>
                                <td class="text-center">
                                    <input type="checkbox" name="ArregloVacunacion[influenzaEstacionalS]" value="1">
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="text-center">Sarampión - Rubeola - Paperas (SRP)</td>
                                <td class="text-center">Primera</td>
                                <td class="text-center">Sarampión - Rubeola - Paperas </td>
                                <td class="text-center">
                                    <input type="checkbox" name="ArregloVacunacion[sarampionRPP]" value="1">
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center" rowspan="3">A los 12 meses</td>
                                <td class="text-center">Varicela</td>
                                <td class="text-center">Primera</td>
                                <td class="text-center">Varicela</td>
                                <td class="text-center">
                                    <input type="checkbox" name="ArregloVacunacion[varicelaP]" value="1">
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Neumococo</td>
                                <td class="text-center">Refuerzo</td>
                                <td class="text-center">Neumonía, otitis, meningitis y bacteriemia</td>
                                <td class="text-center">
                                    <input type="checkbox" name="ArregloVacunacion[neumococoR]" value="1">
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Hepatitis A</td>
                                <td class="text-center">Única</td>
                                <td class="text-center">Hepatitis A</td>
                                <td class="text-center">
                                    <input type="checkbox" name="ArregloVacunacion[hepatitisAU]" value="1">
                                </td>
                            </tr>
        
                            <tr>
                                <td class="text-center" rowspan="3">A los 18 meses</td>
                                <td class="text-center">Diftéria - Tos ferina - Tétanos (DPT)</td>
                                <td class="text-center">Primer refuerzo</td>
                                <td class="text-center">Sarampión - Rubeola - Paperas</td>
                                <td class="text-center">
                                    <input type="checkbox" name="ArregloVacunacion[difteriaTFTPR]" value="1">
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Polio</td>
                                <td class="text-center">Primer refuerzo</td>
                                <td class="text-center">Poliomielitis</td>
                                <td class="text-center">
                                    <input type="checkbox" name="ArregloVacunacion[polioPR]" value="1">
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Fiebre Amarilla (FA)</td>
                                <td class="text-center">Única</td>
                                <td class="text-center">Fiebre amarilla</td>
                                <td class="text-center">
                                    <input type="checkbox" name="ArregloVacunacion[fiebreAmarillaU]" value="1">
                                </td>
                            </tr>
        
                            <tr>
                                <td class="text-center" rowspan="4">5 años</td>
                                <td class="text-center">Diftéria - Tos ferina - Tétanos (DPT)</td>
                                <td class="text-center">Segundo refuerzo</td>
                                <td class="text-center">Sarampión - Rubeola - Paperas</td>
                                <td class="text-center">
                                    <input type="checkbox" name="ArregloVacunacion[difteriaTFTSR]" value="1">
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Polio</td>
                                <td class="text-center">Segundo refuerzo</td>
                                <td class="text-center">Poliomielitis</td>
                                <td class="text-center">
                                    <input type="checkbox" name="ArregloVacunacion[polioSR]" value="1">
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Sarampión - Rubeola - Paperas (SRP)</td>
                                <td class="text-center">Refuerzo</td>
                                <td class="text-center">Sarampión - Rubeola - Paperas</td>
                                <td class="text-center">
                                    <input type="checkbox" name="ArregloVacunacion[sarampionRPR]" value="1">
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">Varicela</td>
                                <td class="text-center">Refuerzo</td>
                                <td class="text-center">Varicela</td>
                                <td class="text-center">
                                    <input type="checkbox" name="ArregloVacunacion[varicelaR]" value="1">
                                </td>
                            </tr>
        
                            <tr>
                                <td class="text-center">Niñas a los 9 años</td>
                                <td class="text-center">Virus del Papiloma Humano (VPH)**</td>
                                <td class="text-center">Primera: Fecha elegida<br>Segunda: 6 meses después</td>
                                <td class="text-center">Cáncer de cuello uterino</td>
                                <td class="text-center">
                                    <input type="checkbox" name="ArregloVacunacion[virusPHP]" value="1">
                                </td>
                            </tr>
        
                            <tr>
                                <td class="text-center">Mujeres en Edad Fértil (MEF) entre los 10 y 49 años</td>
                                <td class="text-center">Toxoide tetánico y diftérico del adulto(Td)***</td>
                                <td class="text-center">5 dosis:
                                    Td1: dosis inicial
                                    Td2: al mes de Td1
                                    Td3: a los 6 meses de Td2
                                    Td4: al año de Td3
                                    Td5: al año de Td4
                                    Refuerzo cada 10 años</td>
                                <td class="text-center">Difteria - Tétanos - Tétanos neonatal</td>
                                <td class="text-center">
                                    <input type="checkbox" name="ArregloVacunacion[toxicoTDAD]" value="1">
                                </td>
                            </tr>
        
                            <tr>
                                <td class="text-center" rowspan="2">Gestantes</td>
                                <td class="text-center">Influenza estacional</td>
                                <td class="text-center">Una dosis a partir de la semana 14 de gestación en cada embarazo</td>
                                <td class="text-center">Enfermedad respiratoria causada por el virus de la influenza</td>
                                <td class="text-center">
                                    <input type="checkbox" name="ArregloVacunacion[influenciaEstacionalUDS]" value="1">
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">TdaP (Tétanos - Diftéria - Tos ferina Acelular)</td>
                                <td class="text-center">Dosis única a partir de la semana 26 de gestación en cada embarazo</td>
                                <td class="text-center">Tétanos neonatal - Difteria - Tos ferina del recién nacido</td>
                                <td class="text-center">
                                    <input type="checkbox" name="ArregloVacunacion[tetanoDTFADU]" value="1">
                                </td>
                            </tr>
        
                            <tr>
                                <td class="text-center">Adultos de 60 años y más</td>
                                <td class="text-center">Influenza estacional</td>
                                <td class="text-center">Anual</td>
                                <td class="text-center">Enfermedad respiratoria causada por el virus de la influenza</td>
                                <td class="text-center">
                                    <input type="checkbox" name="ArregloVacunacion[influenciaEstacionalA]" value="1">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    </div>';


                    ?>
                    <script>
                        // Supongamos que tienes el arreglo PlanCuidados_Vacunacion
                        var PlanCuidados_Vacunacion = <?=$PlanCuidados_Vacunacion;?>;

                        // Función para establecer los checkboxes según los valores del arreglo
                        function setCheckboxes() {
                            for (var key in PlanCuidados_Vacunacion) {
                                var checkbox = document.querySelector('input[name="ArregloVacunacion[' + key + ']"]');
                                if (checkbox) {
                                    checkbox.checked = PlanCuidados_Vacunacion[key] == 1;
                                }
                            }
                        }

                        window.onload = function() {
                            setCheckboxes();
                        };
                    </script>
                    <script>
                        var container = document.getElementById('TablaVacunacionCSS');
                        var checkboxes = container.getElementsByTagName('input');

                        for (var i = 0; i < checkboxes.length; i++) {
                            checkboxes[i].addEventListener('click', function(event) {
                                event.preventDefault();
                                event.stopPropagation();
                                return false;
                            });
                        }
                    </script>
