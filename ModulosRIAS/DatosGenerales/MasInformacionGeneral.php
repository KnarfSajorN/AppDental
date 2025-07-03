<div class='form-group col-md-12'>
                                            <div align="left"><strong>Remision</strong> <a href="RIAS_Remision.php"><i class="fa fa-cog"></i> </a>  </div><br>
                                            <select name='Remision[Remision]' class='form-control input-lg select2' style='width:100%'>
                                                <option value='' selected >Seleccione </option>
                                                
                                                <?php
                                                if(tablaExiste("RIAS_Remision")){
                                                    $QueryList = mysqli_query($conn3, "SELECT * FROM  RIAS_Remision WHERE Activo = 1");
                                                    while ($RowRemision = mysqli_fetch_array($QueryList)) {
                                                    
                                                        $id = $RowRemision['id'];
                                                        $Nombre = $RowRemision['Nombre'];

                                                        echo "<option value='$id'> $Nombre </option>";
                                                    }
                                                }
                                                ?>

                                            </select>
                                        </div>


                                        <div class='form-group col-md-12'>
                                            <div align="left"><strong>Finalidad de la consulta</strong> <a href="RIAS_FinalidadConsulta.php"><i class="fa fa-cog"></i> </a>  </div><br>
                                            <select name='FinalidadConsulta[FinalidadConsulta]' class='form-control input-lg select2' style='width:100%'>
                                                <option value='' selected >Seleccione </option>
                                                
                                                <?php
                                                if(tablaExiste("RIAS_FinalidadConsulta")){
                                                    
                                                
                                                    $QueryList = mysqli_query($conn3, "SELECT * FROM  RIAS_FinalidadConsulta WHERE Activo = 1");
                                                    while ($RowFinalidadConsulta = mysqli_fetch_array($QueryList)) {
                                                    
                                                        $id = $RowFinalidadConsulta['id'];
                                                        $Nombre = $RowFinalidadConsulta['Nombre'];

                                                        echo "<option value='$id'> $Nombre </option>";
                                                    }
                                                }
                                                ?>

                                            </select>
                                        </div>

                                        <div class='form-group col-md-12'>
                                                    <div class='form-group col-md-12'>
                                                        <hr>
                                                    </div>

                                                    <?php
                                                    //Para los inputs

                                                    $ArreglosCamposTamizaje = [
                                                        "1" => "Conducta",
                                                        "2" => "Analisis",
                                                        "3" => "Educacion"
                                                    ];

                                                    //1-> Estado
                                                    //2-> Observaciones
                                                    //NombreMenuPrincipal[Submenu][identificador unico general][titulo en texto]

                                                    foreach ($ArreglosCamposTamizaje as $key => $value) {
                                                        $Titulo = $value;
                                                        $Identificador = $key;
                                                    echo"
                                                    <div class='form-group col-md-12'>
                                                        <label>$Titulo</label><br>
                                                        <textarea class='form-control' name='InformacionAdicional_1[$Identificador][$value]' style='width: 100%; height: 94px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;'></textarea>
                                                    </div>";

                                                    }
                                                    
                                                    
                                                    
                                                    ?>




                                                </div>
                                                



                                        <div class="col-md-12">
                                            <h2 style="text-align:center;width:100%;"> Examenes - Orden Medica </h2>


                                            <div class="">
                                                <table class="table table-hover" id="dynamicTable">
                                                    <thead>
                                                        <tr>
                                                            <th style="width:50%">Codigo Cups</th>
                                                            <th style="width:50%">CIE-10</th>
                                                            <!--<th style="width:5%"></th>--> <!-- Para el botón de eliminar -->
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <select class="form-control input-lg select2" style="width:98%" name="ExamenesCUPS[0][CUP]" id="ExamenesCUPS_1" onclick="CUP_Registro(1);" onchange="establecerRequired(1)" >
                                                                    <option value="">Seleccione</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <select class="form-control input-lg select2" style="width:98%" name="ExamenesCUPS[0][CIE10]" id="CIE10CUPS_1" onclick="CIE10_Registro(1);" onchange="establecerRequired(1)">
                                                                    <option value="">Seleccione</option>
                                                                </select>
                                                            </td>
                                                            <!--<td><button type="button" class="btn btn-danger" onclick="eliminarFila(this)">-</button></td>--->
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <select class="form-control input-lg select2" style="width:98%" name="ExamenesCUPS[1][CUP]" id="ExamenesCUPS_2" onclick="CUP_Registro(2);" onchange="establecerRequired(2)">
                                                                    <option value="">Seleccione</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <select class="form-control input-lg select2" style="width:98%" name="ExamenesCUPS[1][CIE10]" id="CIE10CUPS_2" onclick="CIE10_Registro(2);" onchange="establecerRequired(2)">
                                                                    <option value="">Seleccione</option>
                                                                </select>
                                                            </td>
                                                            <!--<td><button type="button" class="btn btn-danger" onclick="eliminarFila(this)">-</button></td>--->
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <select class="form-control input-lg select2" style="width:98%" name="ExamenesCUPS[2][CUP]" id="ExamenesCUPS_3" onclick="CUP_Registro(3);" onchange="establecerRequired(3)">
                                                                    <option value="">Seleccione</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <select class="form-control input-lg select2" style="width:98%" name="ExamenesCUPS[2][CIE10]" id="CIE10CUPS_3" onclick="CIE10_Registro(3);" onchange="establecerRequired(3)">
                                                                    <option value="">Seleccione</option>
                                                                </select>
                                                            </td>
                                                            <!--<td><button type="button" class="btn btn-danger" onclick="eliminarFila(this)">-</button></td>--->
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <!--<button type="button" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" onclick="agregarFila()">+ Agregar</button>-->
                                                <br><br>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                                <h2 style="text-align:center;width:100%;"> Vacunación Covid </h2>
                                            <table class="table table-hover">
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
                                                </table>

                                    
                                        </div>

                                        <script>
    function establecerRequired(id) {
        var selectCUP = document.getElementById("ExamenesCUPS_"+id);
        var selectCIE10 = document.getElementById("CIE10CUPS_"+id);

        if (selectCUP.value !== "" || selectCIE10.value !== "") {
            selectCUP.setAttribute("required", "required");
            selectCIE10.setAttribute("required", "required");
        } else {
            selectCUP.removeAttribute("required");
            selectCIE10.removeAttribute("required");
        }
    }
</script>