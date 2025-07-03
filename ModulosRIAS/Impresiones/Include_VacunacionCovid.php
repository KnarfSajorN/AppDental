<?php
echo "<div id='container1234'>
<h2 style='text-align:center;width:100%;'> Vacunación Covid </h2>";
                                    echo '<style>
                                    #TablaVacunacionCovidCSS {
                                        pointer-events: none; /* Evitar eventos de puntero dentro del contenedor */
                                        background-color: rgba(0, 0, 0, 0.1); /* Fondo semitransparente */
                                        padding: 10px; /* Añadir un poco de espacio alrededor de la tabla */
                                    }
                                    </style>
                                    <table class="table table-striped table-hover" id="TablaVacunacionCovidCSS">
                                    <thead>
                                        <tr>
                                        <th>Edad recomendada de aplicacion</th>
                                        <th>Biológico recomendado</th>
                                        <th>Aplicado</th>
                                        <th>Refuerzos</th>
                                        <th>Sin Vacuna</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <td>3 a 11 años</td>
                                        <td>Sinovac Life Scienses Co Ltd denominada CoronaVac</td>
                                        <td><input type="checkbox" name="VacunacionCovid[3_11][Sinovac][Aplicado]" value="1"></td>
                                        <td><input type="checkbox" name="VacunacionCovid[3_11][Sinovac][Refuerzo]" value="1"></td>
                                        <td><input type="checkbox" name="VacunacionCovid[3_11][Sinovac][SinVacuna]" value="1"></td>
                                        </tr>
                                        <tr>
                                        <td rowspan="3">12 a 17 años</td>
                                        <td>Pfizer Inc y BioNTech</td>
                                        <td><input type="checkbox" name="VacunacionCovid[12_17][Pfizer][Aplicado]" value="1"></td>
                                        <td><input type="checkbox" name="VacunacionCovid[12_17][Pfizer][Refuerzo]" value="1"></td>
                                        <td><input type="checkbox" name="VacunacionCovid[12_17][Pfizer][SinVacuna]" value="1"></td>
                                        </tr>
                                        <tr>
                                        <td>Moderna ARNm-1273, Switzerland GmbH</td>
                                        <td><input type="checkbox" name="VacunacionCovid[12_17][Moderna][Aplicado]" value="1"></td>
                                        <td><input type="checkbox" name="VacunacionCovid[12_17][Moderna][Refuerzo]" value="1"></td>
                                        <td><input type="checkbox" name="VacunacionCovid[12_17][Moderna][SinVacuna]" value="1"></td>
                                        </tr>
                                        <tr>
                                        <td>Sinovac Life Scienses Co Ltd denominada CoronaVac</td>
                                        <td><input type="checkbox" name="VacunacionCovid[12_17][Sinovac][Aplicado]" value="1"></td>
                                        <td><input type="checkbox" name="VacunacionCovid[12_17][Sinovac][Refuerzo]" value="1"></td>
                                        <td><input type="checkbox" name="VacunacionCovid[12_17][Sinovac][SinVacuna]" value="1"></td>
                                        </tr>
                                        <tr>
                                        <td rowspan="5">18 años y más</td>
                                        <td>Sinovac Life Scienses Co Ltd denominada CoronaVac</td>
                                        <td><input type="checkbox" name="VacunacionCovid[18+][Sinovac][Aplicado]" value="1"></td>
                                        <td><input type="checkbox" name="VacunacionCovid[18+][Sinovac][Refuerzo]" value="1"></td>
                                        <td><input type="checkbox" name="VacunacionCovid[18+][Sinovac][SinVacuna]" value="1"></td>
                                        </tr>
                                        <tr>
                                        <td>Pfizer Inc y BioNTech</td>
                                        <td><input type="checkbox" name="VacunacionCovid[18+][Pfizer][Aplicado]" value="1"></td>
                                        <td><input type="checkbox" name="VacunacionCovid[18+][Pfizer][Refuerzo]" value="1"></td>
                                        <td><input type="checkbox" name="VacunacionCovid[18+][Pfizer][SinVacuna]" value="1"></td>
                                        </tr>
                                        <tr>
                                        <td>Moderna ARNm-1273, Switzerland GmbH</td>
                                        <td><input type="checkbox" name="VacunacionCovid[18+][Moderna][Aplicado]" value="1"></td>
                                        <td><input type="checkbox" name="VacunacionCovid[18+][Moderna][Refuerzo]" value="1"></td>
                                        <td><input type="checkbox" name="VacunacionCovid[18+][Moderna][SinVacuna]" value="1"></td>
                                        </tr>
                                        <tr>
                                        <td>ChAdOx1-S* recombinante o AZD1222 del laboratorio AstraZeneca</td>
                                        <td><input type="checkbox" name="VacunacionCovid[18+][Astrazeneca][Aplicado]" value="1"></td>
                                        <td><input type="checkbox" name="VacunacionCovid[18+][Astrazeneca][Refuerzo]" value="1"></td>
                                        <td><input type="checkbox" name="VacunacionCovid[18+][Astrazeneca][SinVacuna]" value="1"></td>
                                        </tr>
                                        <tr>
                                        <td>Janssen Pharmaceutica NV</td>
                                        <td><input type="checkbox" name="VacunacionCovid[18+][Janssen][Aplicado]" value="1"></td>
                                        <td><input type="checkbox" name="VacunacionCovid[18+][Janssen][Refuerzo]" value="1"></td>
                                        <td><input type="checkbox" name="VacunacionCovid[18+][Janssen][SinVacuna]" value="1"></td>
                                        </tr>
                                    </tbody>
                                    </table></div>';

                                    echo "<script>
                                var data = $VacunacionCovid;
                        
                                function marcarCheckboxes() {
                                    for (var edad in data) {
                                        for (var vacuna in data[edad]) {
                                            for (var tipo in data[edad][vacuna]) {
                                                var checkboxName = 'VacunacionCovid[' + edad + '][' + vacuna + '][' + tipo + ']';
                                                var checkboxes = document.getElementsByName(checkboxName);
                                                for (var i = 0; i < checkboxes.length; i++) {
                                                    checkboxes[i].checked = data[edad][vacuna][tipo] === '1';
                                                }
                                            }
                                        }
                                    }
                                }
                        
                                marcarCheckboxes();</script>";
                                ?>
                                <script>
                                    var container = document.getElementById('TablaVacunacionCovidCSS');
                                    var checkboxes = container.getElementsByTagName('input');

                                    for (var i = 0; i < checkboxes.length; i++) {
                                        checkboxes[i].addEventListener('click', function(event) {
                                            event.preventDefault();
                                            event.stopPropagation();
                                            return false;
                                        });
                                    }
                                </script>