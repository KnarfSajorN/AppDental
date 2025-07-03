<?php
include 'funciones/conn3.php';

//estos datos deben venir desde afuera ya creados y con valor
//$cliente_id = $cliente_id;
//$usuario_id = $usuario_id;

$QuerNumReceta = mysqli_query($conn3, "SELECT * FROM  RM_Recetario WHERE cliente_id = $cliente_id AND usuario_id='$usuario_id' AND Estado= 'Abierto'  ORDER BY id ASC LIMIT 1");
while ($RowNumReceta = mysqli_fetch_array($QuerNumReceta)) {
    $receta_id_medicamentos = $RowNumReceta['receta_id'];
}
?>
<link href="Modulos_Estilos/ModuloReceta.css" rel="stylesheet" type="text/css" media="all">

<div class="col-md-12 content-card">
    <div class="card-big-shadow">
        <div class="card card-just-text" data-background="color" data-color="azul">
            <div class="content">
                <h4 class="title" style="font-size: 35px;">
                    Agregar <a href="#" onclick="document.getElementById('Medicamento_Unitario').style.display='block';document.getElementById('Medicamento_Varios').style.display='none';" style="border-bottom-style: double;border-color: #3c8dbc;"> Un Medicamento </a>/ <a href="#" onclick="document.getElementById('Medicamento_Unitario').style.display='none';document.getElementById('Medicamento_Varios').style.display='block';" style="border-bottom-style: double;border-color: #3c8dbc;">Varios Medicamentos</a>

                </h4>
                <div class="description">

                    <div id="Medicamento_Varios" style="display:none;">
                        <div class="form-group col-md-6">
                            <div align="left"> Agregar Varios Medicamentos </div>
                            <select id="varios_medicamento_id" class="form-control select2" style="width: 100%;" multiple onclick="CargaMedicamentosRapidaVarios();">
                                <?php
                                /*
                                $queryList = mysqli_query($conn3, "SELECT * FROM  medicamentosJose WHERE Activo='1' ");
                                while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                    $id = $rowMotorizado["id"];
                                    $Nombre = $rowMotorizado["descripcion"];

                                    echo "<option value='{$id}'>{$Nombre}</option>";
                                }
                                */
                                ?>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <br>
                            <center><button type="button" onclick="GuardarVariosMedicamentos();" class="btn btn-block btn-primary btn-sm">Guardar Medicamentos</button></center><br>
                        </div>
                    </div>






                    <div id="Medicamento_Unitario">
                        <div class="form-group col-md-6">
                            <div align="left"> Agregar Medicamento <a href="RM_Medicamentos.php"><i class="fa fa-cog"></i> </a> </div>
                            <select id="medicamento_id" class="form-control select2" style="width: 100%;" onclick="FuncionesMedicamentos(this.value)">
                                <option value="" selected="selected">Seleccione Medicamento</option>
                                <?php
                                /*
                                $queryList = mysqli_query($conn3, "SELECT * FROM  medicamentosJose   WHERE Activo='1' ");
                                while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                    $id = $rowMotorizado["id"];
                                    $Nombre = $rowMotorizado["descripcion"];

                                    echo "<option value='{$id}'>{$Nombre}</option>";
                                }
                                */
                                ?>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <div align="left"> Cantidad </div>
                            <input type="number" class="form-control input-lg" id="Cantidad" placeholder="1" value="1">
                        </div>

                   

                        <div class="form-group col-md-6">
                            <div align="left">Vía de Administración<a href="Global_ModuloSelect.php?Tipo=Via_Administracion_Receta"><i class="fa fa-cog"></i> </a></div>
                            <select class="form-control input-lg " id="Via_Administracion" placeholder="Via de Administracion del Medicamento" style="width:100%">
                                <?php
                                $QuerySelect = mysqli_query($conn3, "SELECT * FROM  Global_Select WHERE Nombre='Via_Administracion_Receta' LIMIT 1");
                                while ($RowSelect = mysqli_fetch_array($QuerySelect)) {

                                    $Opciones = $RowSelect['Opciones'];
                                    $Listado = json_decode($Opciones, true);
                                    foreach ($Listado as $key => $value) {
                                        echo "<option>{$value}</option>";
                                    }

                                    echo "<option value='' selected> Seleccione </option>";
                                }
                                ?>
                            </select>
                        </div>

                   
                        <div class="form-group col-md-6">
                            <div align="left">Dosis</div>
                            <input type="text" class="form-control input-lg" id="Dosis" placeholder="Dosis del Medicamento" value="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                        </div>


                        <div class="form-group col-md-6">
                            <div align="left"> Indicaciones individual del medicamento </div>
                            <textarea id="Indicaciones" placeholder="INDICACIONES ESPECIFICAS DEL MEDICAMENTO" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;margin: 0px;margin-top: 15px;max-width: 100%;"></textarea>
                        </div>


                        <div class="form-group col-md-6">
                            <div align="left"> Indicaciones generales de la Receta (Llenar al final) </div>
                            <textarea id="Indicaciones_Generales" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;margin: 0px;margin-top: 15px;max-width: 100%;" placeholder="INDICACIONES GENERALES DE LA RECETA , LLENAR AL FINAL."></textarea>
                        </div>


                        <div class="form-group col-md-12">

                            <?php if ($cliente_id != "") { ?>
                                <div class="col-md-12" id="Botones">
                                    <center id="Boton_Guardar_Medicamento"><button type="button" onclick="GuardarMedicamento();" class="btn btn-block btn-primary btn-sm">Guardar Medicamento</button></center><br>
                                </div>
                            <?php } ?>

                        </div>

                    </div>

                    <input type="hidden" id="usuario_id" value="<?php echo $usuario_id ?>">
                    <input type="hidden" id="cliente_id" value="<?php echo $cliente_id ?>">

                    <div class="col-md-12" id="Resultado_GuardarMedicamento">
                        <?php
                        if ($receta_id_medicamentos != "") {

                            echo "<br><label style='font-size: 30px;'>Medicamentos Generados </label>
                                        <table class='table'>
                                            <thead class='table-light'>
                                                <tr> 
                                                    <th>#</th>
                                                    <th>Medicamento/Presentación/Composición</th>
                                                    <th>Cantidad</th>
                                                    <th>Vía de Administración</th>
                                                   
                                                    <th>Dosis</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                        <tbody>";

                            $QueryRecetario = mysqli_query($conn3, "SELECT * FROM  RM_Recetario  where usuario_id = '$usuario_id'  and cliente_id ='$cliente_id' and receta_id= '$receta_id_medicamentos'");
                            while ($RowRecetario = mysqli_fetch_array($QueryRecetario)) {
                                $cont++;

                                $id = $RowRecetario['id'];
                                $Nombre_Medicamento = $RowRecetario['Nombre_Medicamento'];
                                $Cantidad = $RowRecetario['Cantidad'];
                                $Presentacion = $RowRecetario['Presentacion'];
                                $Via_Administracion = $RowRecetario['Via_Administracion'];
                                $Composicion = $RowRecetario['Composicion'];
                                $Dosis = $RowRecetario['Dosis'];

                                echo "<tr> 
                                            <td>{$cont}</td>
                                            <td>{$Nombre_Medicamento}</td>
                                            <td>{$Cantidad}</td>
                                           
                                            <td>{$Via_Administracion}</td>
                                          
                                            <td>{$Dosis}</td>
                                            <td><a onclick='EditarMedicamento($id);'> <font size='5'> <strong>  <i class='fa fa-pencil' style='color: #3c8dbc;font-size: 20px;'></i>   </strong>  </font> </a> 
                                            <a onclick='EliminarMedicamento($id);'> <font size='5'> <strong>  <i class='fa fa-trash' style='color: #ff0000a1;font-size: 20px;'></i>   </strong>  </font> </a></td>
                                        </tr>";
                            }

                            echo "</tbody></table>
                                    <input type='hidden' id='receta_id' name='receta_id' value='{$receta_id_medicamentos}'>";
                        }
                        ?>
                    </div>

                </div><!-- cierre de la descripcion-->
            </div>
        </div> <!-- end card -->
    </div>
</div>
<!-- Select2 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="plugins/select2/select2.full.min.js"></script>
<?php
$javascriptocultar = "1"; // sirve para que en el footer no vuelva a ejecutar el javascript [jquery] en el footer
$javascriptocultarselect = "1"; // sirve para que en el footer no vuelva a ejecutar el javascript [$function{$('.select2').select2();}]en el footer ya que al volverse a inicializar borra la funcion de crear mas options en los select
?>
<script>
    function CargarInformacionMedicamento(Valor) {

        var medicamento_id = Valor;
        $.ajax({
            type: "POST",
            url: "RM_Ajax_1.php",
            data: {
                medicamento_id: medicamento_id,
                Tipo: "Llenar Modulo Medicamentos"
            },
            success: function(response) {

                var json = response;

                // Converting JSON-encoded string to JS object
                var Arreglo = JSON.parse(json);
                for (index in Arreglo) {
                    if (document.getElementById(index) != undefined) {
                        document.getElementById(index).value = Arreglo[index];
                    }

                    valor = Arreglo[index];
                    if (index == "Presentacion") {
                        $("#Presentacion > option[value='" + valor + "']").attr("selected", true);
                        $("#Presentacion").change();
                    }
                    if (index == "Via_Administracion") {
                        $("#Via_Administracion > option[value='" + valor + "']").attr("selected", true);
                        $("#Via_Administracion").change();
                    }
                }

            }
        });
    }

    function GuardarMedicamento() {

        var medicamento_id = $("#medicamento_id").val();
        var Cantidad = $("#Cantidad").val();

        if (medicamento_id == "" || Cantidad == "") {
            alert("Elija un medicamento o una cantidad");
            return null;
        }
        var Presentacion = $("#Presentacion").val();
        var Via_Administracion = $("#Via_Administracion").val();
        var Composicion = $("#Composicion").val();
        var Dosis = $("#Dosis").val();
        var Indicaciones = $("#Indicaciones").val();
        var Indicaciones_Generales = $("#Indicaciones_Generales").val();


        var usuario_id = $("#usuario_id").val();
        var cliente_id = $("#cliente_id").val();
        var receta_id = $("#receta_id").val();

        $.ajax({
            type: "POST",
            url: "RM_Ajax_1.php",
            data: {
                medicamento_id: medicamento_id,
                Cantidad: Cantidad,
                Presentacion: Presentacion,
                Via_Administracion: Via_Administracion,
                Composicion: Composicion,
                Dosis: Dosis,
                Indicaciones: Indicaciones,
                Indicaciones_Generales: Indicaciones_Generales,
                usuario_id: usuario_id,
                cliente_id: cliente_id,
                receta_id: receta_id,
                Tipo: "Guardar Medicamento"
            },
            success: function(response) {
                $("#Resultado_GuardarMedicamento").html(response);

                $("#medicamento_id").val("");
                $("#medicamento_id").change();

                $("#Presentacion").val("");
                $("#Presentacion").change();

                $("#Via_Administracion").val("");
                $("#Via_Administracion").change();

                $("#Cantidad").val("1");
                $("#Composicion").val("");
                $("#Dosis").val("");
                $("#Indicaciones").val("");
                $("#Indicaciones_Generales").val("");
            }
        });
    }

    function EliminarMedicamento(Valor) {

        var medicamento_receta_id = Valor;

        var usuario_id = $("#usuario_id").val();
        var cliente_id = $("#cliente_id").val();
        var receta_id = $("#receta_id").val();


        $.ajax({
            type: "POST",
            url: "RM_Ajax_1.php",
            data: {
                medicamento_receta_id: medicamento_receta_id,
                usuario_id: usuario_id,
                cliente_id: cliente_id,
                receta_id: receta_id,
                Tipo: "Eliminar Medicamento"
            },
            success: function(response) {
                $("#Resultado_GuardarMedicamento").html(response);
            }
        });
    }

    function EditarMedicamento(Valor) {
        //esto para que si usan el boton de editar desde el modulo de recetar varios medicamentos lo devuelva a la pagina de los medicamentos unitarios
        document.getElementById('Medicamento_Unitario').style.display = 'block';
        document.getElementById('Medicamento_Varios').style.display = 'none';
        //
        var medicamento_receta_id = Valor;

        $.ajax({
            type: "POST",
            url: "RM_Ajax_1.php",
            data: {
                medicamento_receta_id: medicamento_receta_id,
                Tipo: "Editar Medicamento"
            },
            success: function(response) {
                var json = response;

                console.log(response);
                // Converting JSON-encoded string to JS object
                var Arreglo = JSON.parse(json);
                for (index in Arreglo) {
                    if (document.getElementById(index) != undefined) {
                        document.getElementById(index).value = Arreglo[index];
                        console.log(index);
                    }

                    valor = Arreglo[index];
                    if (index == "Presentacion") {
                        $("#Presentacion > option[value='" + valor + "']").attr("selected", true);
                        $("#Presentacion").change();
                    }
                    if (index == "Via_Administracion") {
                        $("#Via_Administracion > option[value='" + valor + "']").attr("selected", true);
                        $("#Via_Administracion").change();
                    }
                    if (index == "medicamento_id") {
                        //
                        
                        //$("#medicamento_id").select2();
                        
                        //CargaMedicamentosRapida();
                        //$("#medicamento_id > option[value='" + valor + "']").attr("selected", true);
                        //$("#medicamento_id").trigger('change');

                       // $('#medicamento_id').val('2').trigger('change');
                        $('#medicamento_id')
                            .append('<option value="'+Arreglo[index]+'">'+Arreglo['nombre_medicamento']+'</option>');
                        $("#medicamento_id > option[value='"+Arreglo[index]+"']").attr("selected", true);
                    }
                }

                $("#Boton_Actualizar_Medicamento").remove();

                var el = document.createElement("center");
                el.id = "Boton_Actualizar_Medicamento";
                el.innerHTML = "<input type='hidden' id='medicamento_recetario_id' value='" + medicamento_receta_id + "'><br><button type='button' onclick='ActualizarMedicamento();' class='btn btn-block btn-primary btn-sm' style='background-color:#2e5b83;'>Actualizar Medicamento</button>";
                var div = document.getElementById("Botones");
                div.insertBefore(el, div.lastElementChild);

                document.getElementById("Boton_Guardar_Medicamento").style.display = "none";

            }
        });
    }


    function ActualizarMedicamento() {

        var medicamento_id = $("#medicamento_id").val();
        var Cantidad = $("#Cantidad").val();
        var Presentacion = $("#Presentacion").val();
        var Via_Administracion = $("#Via_Administracion").val();
        var Composicion = $("#Composicion").val();
        var Dosis = $("#Dosis").val();
        var Indicaciones = $("#Indicaciones").val();
        var Indicaciones_Generales = $("#Indicaciones_Generales").val();

        var usuario_id = $("#usuario_id").val();
        var cliente_id = $("#cliente_id").val();
        var receta_id = $("#receta_id").val();

        var medicamento_recetario_id = $("#medicamento_recetario_id").val();

        $.ajax({
            type: "POST",
            url: "RM_Ajax_1.php",
            data: {
                medicamento_id: medicamento_id,
                Cantidad: Cantidad,
                Presentacion: Presentacion,
                Via_Administracion: Via_Administracion,
                Composicion: Composicion,
                Dosis: Dosis,
                Indicaciones: Indicaciones,
                Indicaciones_Generales: Indicaciones_Generales,
                usuario_id: usuario_id,
                cliente_id: cliente_id,
                receta_id: receta_id,

                medicamento_recetario_id: medicamento_recetario_id,
                Tipo: "Actualizar Medicamento"
            },
            success: function(response) {
                $("#Resultado_GuardarMedicamento").html(response);

                $("#medicamento_id").val("");
                $("#medicamento_id").change();

                $("#Presentacion").val("");
                $("#Presentacion").change();

                $("#Via_Administracion").val("");
                $("#Via_Administracion").change();

                $("#Cantidad").val("1");
                $("#Composicion").val("");
                $("#Dosis").val("");
                $("#Indicaciones").val("");
                $("#Indicaciones_Generales").val("");

                $("#Boton_Actualizar_Medicamento").remove();
                document.getElementById("Boton_Guardar_Medicamento").style.display = "block";

            }
        });

    }
    ////////////////////////////////////////////////////////////////////////////////////////////////////

    function GuardarVariosMedicamentos() {
        var varios_medicamento_id = $("#varios_medicamento_id").val();
        var usuario_id = $("#usuario_id").val();
        var cliente_id = $("#cliente_id").val();
        var receta_id = $("#receta_id").val();

        $.ajax({
            type: "POST",
            url: "RM_Ajax_1.php",
            data: {
                varios_medicamento_id: varios_medicamento_id,
                usuario_id: usuario_id,
                cliente_id: cliente_id,
                receta_id: receta_id,
                Tipo: "Guardar Varios Medicamentos"
            },
            success: function(response) {
                $("#Resultado_GuardarMedicamento").html(response);
                $('#varios_medicamento_id').val('').trigger("change");
            }
        });

    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////

    $(document).ready(function() {
        $(".select2").select2();

        $('#Presentacion').select2({
            tags: true,
            createTag: function(params) {
                // Don't offset to create a tag if there is no @ symbol
                /*
                if (params.term.indexOf('@') === -1) {
                    // Return null to disable tag creation
                    return null;
                }
                */

                return {
                    id: params.term,
                    text: params.term
                }
            }
        }).on('select2:close', function() {
            var element = $(this);
            var new_category = $.trim(element.val());

            console.log(new_category);
            if (new_category != '') {
                $.ajax({
                    url: "Global_Ajax.php",
                    method: "POST",
                    data: {
                        Nueva_Opcion_Select_Global: new_category,
                        Tipo_Select_Global: "Presentacion_Receta",
                        Usuario_Select_Global: "<?php echo $usuario_id; ?>"
                    },
                    success: function(data) {
                        console.log(data);
                        if (data == 'Error') {
                            alert("Error al crear un nuevo dato");
                        } else if (data == 'Creado') {
                            console.log("existe dato");
                        } else {
                            element.append('<option value="' + data + '">' + new_category + '</option>').val(data).change();
                        }
                    }
                })
            } else {
                console.log("Error");
            }

        });

        $('#Via_Administracion').select2({
            tags: true,
            createTag: function(params) {
                // Don't offset to create a tag if there is no @ symbol
                /*
                if (params.term.indexOf('@') === -1) {
                    // Return null to disable tag creation
                    return null;
                }
                */

                return {
                    id: params.term,
                    text: params.term
                }
            }
        }).on('select2:close', function() {
            var element = $(this);
            var new_category = $.trim(element.val());

            console.log(new_category);
            if (new_category != '') {
                $.ajax({
                    url: "Global_Ajax.php",
                    method: "POST",
                    data: {
                        Nueva_Opcion_Select_Global: new_category,
                        Tipo_Select_Global: "Via_Administracion_Receta",
                        Usuario_Select_Global: "<?php echo $usuario_id; ?>"
                    },
                    success: function(data) {
                        console.log(data);
                        if (data == 'Error') {
                            alert("Error al crear un nuevo dato");
                        } else if (data == 'Creado') {
                            console.log("existe dato");
                        } else {
                            element.append('<option value="' + data + '">' + new_category + '</option>').val(data).change();
                        }
                    }
                })
            }

        });
    });


    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    function CargaMedicamentosRapida() {

        $("#medicamento_id").select2({
            allowClear: true,
            ajax: {
                url: "RM_CargaRapida.php",
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        searchTerm: params.term, // search term
                        Tipo: "Carga Medicamentos"
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

    function CargaMedicamentosRapidaVarios() {

        $("#varios_medicamento_id").select2({
            //allowClear: true,
            ajax: {
                url: "RM_CargaRapida.php",
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        searchTerm: params.term, // search term
                        Tipo: "Carga Medicamentos"
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

    

    window.onload = function() {
        CargaMedicamentosRapida();
        CargaMedicamentosRapidaVarios();
    }

    function FuncionesMedicamentos(valor){
        CargarInformacionMedicamento(valor);
        CargaMedicamentosRapida();
    }

</script>