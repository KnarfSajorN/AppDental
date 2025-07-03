                                        <div class="col-md-12">
                                            <h2 style="text-align:center;width:100%;"> Diagnosticos </h2>


                                            <div class="">
                                                <table class="table table-hover" id="TablaModuloDiagnotico">
                                                    <thead>
                                                        <tr>
                                                            <th style="width:50%">Diagnotico CIE10</th>
                                                            <th style="width:50%">Tipo de Diagnostico</th>
                                                            <th style="width:50%">Comentario</th>
                                                            <!--<th style="width:5%"></th>--><!-- Para el botón de eliminar -->
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <select class="form-control input-lg select2" style="width:100%" name="DiagnosticosModulo[CIE10][0]" id="CIE10Diagnostico_0" onclick="Modulo_CIE10_Registro(0);">
                                                                    <option value="">Seleccione</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <select class="form-control input-lg select2" style="width:100%" name="DiagnosticosModulo[TipoDiagnostico][0]"  >
                                                                    <option value="">Seleccione</option>
                                                                    <option value="Principal">Principal</option>
                                                                    <option value="Secundario">Secundario</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control input-lg" style="width:100%" name="DiagnosticosModulo[Comentario][0]"  >
                                                            </td>

                                                            <!--<td><button type="button" class="btn btn-danger" onclick="ModuloDiagnostico_Eliminar(this)">-</button></td>-->
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <select class="form-control input-lg select2" style="width:100%" name="DiagnosticosModulo[CIE10][1]" id="CIE10Diagnostico_1" onclick="Modulo_CIE10_Registro(1);">
                                                                    <option value="">Seleccione</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <select class="form-control input-lg select2" style="width:100%" name="DiagnosticosModulo[TipoDiagnostico][1]"  >
                                                                    <option value="">Seleccione</option>
                                                                    <option value="Principal">Principal</option>
                                                                    <option value="Secundario">Secundario</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control input-lg" style="width:100%" name="DiagnosticosModulo[Comentario][1]"  >
                                                            </td>

                                                            <!--<td><button type="button" class="btn btn-danger" onclick="ModuloDiagnostico_Eliminar(this)">-</button></td>-->
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <select class="form-control input-lg select2" style="width:100%" name="DiagnosticosModulo[CIE10][2]" id="CIE10Diagnostico_2" onclick="Modulo_CIE10_Registro(2);">
                                                                    <option value="">Seleccione</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <select class="form-control input-lg select2" style="width:100%" name="DiagnosticosModulo[TipoDiagnostico][2]"  >
                                                                    <option value="">Seleccione</option>
                                                                    <option value="Principal">Principal</option>
                                                                    <option value="Secundario">Secundario</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control input-lg" style="width:100%" name="DiagnosticosModulo[Comentario][2]"  >
                                                            </td>

                                                            <!--<td><button type="button" class="btn btn-danger" onclick="ModuloDiagnostico_Eliminar(this)">-</button></td>-->
                                                        </tr>

                                                    </tbody>
                                                </table>
                                                <!--<button type="button" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" onclick="ModuloDiagnostico_Agregar()">+ Agregar</button>-->
                                                <br><br>
                                            </div>

                                        </div>

                                        <script>

                                        /*
                                        function ModuloDiagnostico_Agregar() {
                                        // Obtener la tabla y el cuerpo de la tabla
                                        var table = document.getElementById("TablaModuloDiagnotico");
                                        var tbody = table.getElementsByTagName("tbody")[0];

                                        // Obtener la cantidad actual de filas en la tabla
                                        var rowCount = tbody.rows.length;

                                        // Crear una nueva fila
                                        var newRow = document.createElement("tr");

                                        // HTML de la nueva fila con índices actualizados
                                        newRow.innerHTML = '<td>' +
                                            '<select class="form-control input-lg select2" style="width:100%" name="DiagnosticosModulo[CIE10][' + rowCount + ']" onclick="Modulo_CIE10_Registro(' + rowCount + ');" id="CIE10Diagnostico_' + rowCount + '">' +
                                            '<option value="">Seleccione</option>' +
                                            '</select>' +
                                            '</td>' +
                                            '<td>' +
                                            '<select class="form-control input-lg select2" style="width:100%" name="DiagnosticosModulo[TipoDiagnostico][' + rowCount + ']" >' +
                                            '<option value="">Seleccione</option>' +
                                            '<option value="Principal">Principal</option>' +
                                            '<option value="Secundario">Secundario</option>' +
                                            '</select>' +
                                            '</td>' +
                                            '<td>' +
                                            '<input type="text" class="form-control input-lg" style="width:100%" name="DiagnosticosModulo[Comentario][' + rowCount + ']" >' +
                                            '</td>' +
                                            '<td><button type="button" class="btn btn-danger" onclick="ModuloDiagnostico_Eliminar(this)">-</button></td>';

                                        // Agregar la nueva fila al cuerpo de la tabla
                                        tbody.appendChild(newRow);

                                        Modulo_CIE10_Registro(rowCount);
                                    }

                                    // Función para eliminar una fila
                                    function ModuloDiagnostico_Eliminar(button) {
                                        var row = button.parentNode.parentNode;
                                        var tbody = row.parentNode;

                                        // Eliminar la fila
                                        tbody.removeChild(row);

                                        // Actualizar los índices de las filas restantes
                                        var rows = tbody.getElementsByTagName("tr");
                                        for (var i = 0; i < rows.length; i++) {
                                            var selects = rows[i].querySelectorAll('select');
                                            var inputs = rows[i].querySelectorAll('input');

                                            selects[0].setAttribute('name', 'DiagnosticosModulo[CIE10][' + i + ']');
                                            selects[0].setAttribute('id', 'CIE10Diagnostico_' + i);
                                            selects[1].setAttribute('name', 'DiagnosticosModulo[TipoDiagnostico][' + i + ']');
                                            inputs[0].setAttribute('name', 'DiagnosticosModulo[Comentario][' + i + ']');
                                            
                                        }
                                    }
*/
                                    function Modulo_CIE10_Registro(valor) {
                                        
                                        $("#CIE10Diagnostico_"+valor).select2({
                                            allowClear: true,
                                            ajax: {
                                                url: "RIAS_AjaxSelects.php",
                                                type: "post",
                                                dataType: 'json',
                                                delay: 250,
                                                data: function(params) {
                                                    return {
                                                        searchTerm: params.term, // search term
                                                        Tipo: "CIE10"
                                                    };
                                                },
                                                processResults: function(response) {
                                                    return {
                                                        results: response
                                                    };
                                                },
                                                cache: true
                                            }
                                        });
                                    }
                                    
                                    
                                </script>