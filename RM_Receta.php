<?php
include 'funciones/conn3.php';

//estos datos deben venir desde afuera ya creados y con valor
//$cliente_id = $cliente_id;
//$usuario_id = $usuario_id;
$enlace_actual = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
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
                <div class="col-md-12">
                    <h4 class="title" style="font-size: 35px; color: black;">
                        <a href="#" onclick="mostrarMedicamento('Unitario');"
                            style="border-bottom-style: double; border-color: #3c8dbc; color: black;">Un Medicamento</a>/
                        <a href="#" onclick="mostrarMedicamento('Varios');"
                            style="border-bottom-style: double; border-color: #3c8dbc; color: black;">Varios
                            Medicamentos</a>/
                        <a href="#" onclick="mostrarMedicamento('Paquete');"
                            style="border-bottom-style: double; border-color: #3c8dbc; color: black;">Paquetes</a>


                    </h4>
                </div>
                <br>

                <div class="col-md-12 row">

                    <hr>

                    <div class="col-md-6">

                        <a id="btn1" href="#" onclick="mostrarMedicamentoManual('receta_sistema');" class=" btn btn-block btn-info btn-lg rounded-pill ">Receta con Inventario</a>
                    </div>
                    <div class="col-md-6">

                        <a id="btn2" href="#" onclick="mostrarMedicamentoManual('receta_manual');" class=" btn btn-block btn-info btn-lg rounded-pill ">Receta Manual</a>
                    </div>

                </div>
                <br>
                <div class="description">
                    <div id="Medicamento_Varios" style="display:none;">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <div align="left"> Agregar Varios Medicamentos </div>
                                <select id="varios_medicamento_id" class="form-control select2" style="width: 100%;"
                                    multiple>
                                    <?php
                                    $queryList = mysqli_query($conn3, "SELECT * FROM  RM_Medicamentos WHERE Activo='1' and ( ID_Principal = '{$_SESSION['ID']}'or ID_Principal = '{$_SESSION['ID_principal']}')");
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                        $id = $rowMotorizado["id"];
                                        $Nombre = $rowMotorizado["Nombre"];

                                        echo "<option value='{$id}'>{$Nombre}</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <br>
                                <center><button type="button" onclick="GuardarVariosMedicamentos();"
                                        class="btn btn-block btn-info btn-lg rounded-pill shadow">Guardar
                                        Medicamentos</button></center>
                                <br>
                            </div>
                        </div>
                    </div>

                    <div id="Medicamento_Paquete" style="display:none;">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <div align="left"> Paquetes </div>
                                <select id="paquete_id" class="form-control select2" style="width: 100%;">
                                    <option value="" selected="selected">Seleccione ...</option>
                                    <?php
                                    $queryList = mysqli_query($conn3, "SELECT * FROM  RM_Paquete WHERE Activo='1' ");
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                        $id = $rowMotorizado["id"];
                                        $Nombre = $rowMotorizado["Nombre"];

                                        echo "<option value='{$id}'>{$Nombre}</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <br>
                                <center>
                                    <button type="button" onclick="GuardarPaquete();"
                                        class="btn btn-block btn-info btn-lg rounded-pill shadow">Guardar Paquetes
                                    </button>
                                </center>
                                <br>
                            </div>
                            <div class="col-md-6 align-end">
                                <br>
                                <center>
                                    <button type="button" onclick="window.location.href='RM_PaquetesMedicamentos';"
                                        class="btn btn-block btn-info btn-lg rounded-pill shadow">Crear Paquete
                                    </button>
                                </center>
                                <br>
                            </div>

                        </div>
                    </div>




                    <div id="Medicamento_Unitario">
                        <div class="row">
                            <div class="form-group col-md-6" id="inputSistema">
                                <div align="left"> Agregar Medicamento <a href="RM_Medicamentos.php"><i
                                            class="fa fa-cog"></i> </a> </div>
                                <select id="medicamento_id" class="form-control select2" style="width: 100%; display: block;"
                                    onchange="CargarInformacionMedicamento(this.value)">
                                    <option value="" selected="selected">Seleccione Medicamento</option>
                                    <?php
                                    $queryList = mysqli_query($conn3, "SELECT * FROM  RM_Medicamentos WHERE Activo='1' and ( ID_Principal = '{$_SESSION['ID']}'or ID_Principal = '{$_SESSION['ID_principal']}')");
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                        $id = $rowMotorizado["id"];
                                        $Nombre = $rowMotorizado["Nombre"];

                                        echo "<option value='{$id}'>{$Nombre}</option>";
                                    }
                                    ?>
                                </select>

                            </div>

                            <div class="col-md-6" id="inputManual" style="display:none;">
                                <div align="left"> Agregar Medicamento </div>
                                <input type="text" id="medicamento_id2" class="form-control input-lg" placeholder="Medicamento">
                                <input type="hidden" id="medicamento_id1" value="0">
                            </div>

                            <div class="form-group col-md-6">
                                <div align="left"> Cantidad </div>
                                <input type="number" class="form-control input-lg" id="Cantidad" placeholder="1"
                                    value="1">
                            </div>

                            <div class="form-group col-md-6" id="presentacionSistema">
                                <div align="left">Presentación</div>
                                <select class="form-control input-lg " id="Presentacion"
                                    placeholder="Presentacion del Medicamento" style="width:100%">
                                    <?php
                                    $QuerySelect = mysqli_query($conn3, "SELECT * FROM  Global_Select WHERE Nombre='Presentacion_Receta' LIMIT 1");
                                    while ($RowSelect = mysqli_fetch_array($QuerySelect)) {

                                        $Opciones = $RowSelect['Opciones'];
                                        $Listado = json_decode($Opciones, true);
                                        foreach ($Listado as $key => $value) {
                                            echo "<option value='$value'>{$value}</option>";
                                        }

                                        echo "<option value='' selected> Seleccione </option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6" id="presentacionManual" style="display:none;">
                                <div align="left"> Presentacion </div>
                                <input type="text" id="presentacion_id2" class="form-control input-lg" placeholder="Presentacion">
                                <input type="hidden" id="presentacion_id1" value="0">
                            </div>

                            <div class="form-group col-md-6" id="Via_AdministracionSistema">
                                <div align="left">Vía de Administración</div>
                                <select class="form-control input-lg " id="Via_Administracion"
                                    placeholder="Via de Administracion del Medicamento" style="width:100%">
                                    <?php
                                    $QuerySelect = mysqli_query($conn3, "SELECT * FROM  Global_Select WHERE Nombre='Via_Administracion_Receta' LIMIT 1");
                                    while ($RowSelect = mysqli_fetch_array($QuerySelect)) {

                                        $Opciones = $RowSelect['Opciones'];
                                        $Listado = json_decode($Opciones, true);
                                        foreach ($Listado as $key => $value) {
                                            echo "<option value='$value'>{$value}</option>";
                                        }

                                        echo "<option value='' selected> Seleccione </option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6" id="Via_AdministracionManual" style="display:none;">
                                <div align="left"> Via de Administración </div>
                                <input type="text" id="via_administracion_id2" class="form-control input-lg" placeholder="Via de Administracion">
                                <input type="hidden" id="via_administracion_id1" value="0">
                            </div>

                            <div class="form-group col-md-6">
                                <div align="left">Composición</div>
                                <input type="text" class="form-control input-lg" id="Composicion"
                                    placeholder="Composicion del Medicamento" value="" maxlength="240"
                                    oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </div>

                            <div class="form-group col-md-6">
                                <div align="left">Dosis</div>
                                <input type="text" class="form-control input-lg" id="Dosis"
                                    placeholder="Dosis del Medicamento" value="" maxlength="120"
                                    oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </div>


                            <div class="form-group col-md-6">
                                <div align="left"> Indicaciones </div>
                                <textarea id="Indicaciones" placeholder="INDICACIONES ESPECIFICAS DEL MEDICAMENTO"
                                    style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;margin: 0px;margin-top: 15px;max-width: 100%;"></textarea>
                            </div>


                            <div class="form-group col-md-6">
                                <div align="left"> Indicaciones generales de la Recetas </div>
                                <textarea id="Indicaciones_Generales"
                                    style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;margin: 0px;margin-top: 15px;max-width: 100%;"
                                    placeholder="INDICACIONES GENERALES DE LA RECETA , LLENAR AL FINAL."></textarea>
                            </div>


                            <div class="form-group col-md-12">

                                <?php if ($cliente_id != "") { ?>
                                    <div class="col-md-12" id="Botones">
                                        <center id="Boton_Guardar_Medicamento"><button type="button"
                                                onclick="GuardarMedicamento();"
                                                class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">Guardar
                                                Medicamento</button></center><br>
                                    </div>
                                <?php } ?>

                            </div>
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
                                                    <th>Medicamento</th>
                                                    <th>Cantidad</th>
                                                    <th>Presentación</th>
                                                    <th>Vía de Administración</th>
                                                    <th>Composición</th>
                                                    <th>Dosis</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                        <tbody>";

                            $QueryRecetario = mysqli_query($conn3, "SELECT * FROM  RM_Recetario  where usuario_id = '$usuario_id'  and cliente_id ='$cliente_id' and receta_id= '$receta_id_medicamentos' and activo='1'");
                            while ($RowRecetario = mysqli_fetch_array($QueryRecetario)) {
                                $cont++;

                                $id = $RowRecetario['id'];
                                $Nombre_Medicamento = $RowRecetario['Nombre_Medicamento'];
                                $Cantidad = $RowRecetario['Cantidad'];
                                $Presentacion = $RowRecetario['Presentacion'];
                                $Via_Administracion = $RowRecetario['Via_Administracion'];
                                $Composicion = $RowRecetario['Composicion'];
                                $Dosis = $RowRecetario['Dosis'];

                                echo <<<HTML
                                <tr>
                                    <td>{$cont}</td>
                                    <td>{$Nombre_Medicamento}</td>
                                    <td>{$Cantidad}</td>
                                    <td>{$Presentacion}</td>
                                    <td>{$Via_Administracion}</td>
                                    <td>{$Composicion}</td>
                                    <td>{$Dosis}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn" onclick='EditarMedicamento($id);'> <i class='fa fa-pencil' style='color: #3c8dbc;font-size: 20px;'></i> </button>
                                            <button class="btn" onclick='EliminarMedicamento($id);'> <i class='fa fa-trash' style='color: #ff0000a1;font-size: 20px;'></i> </button>
                                        </div>
                                    </td>
                                </tr>
                                HTML;
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
<script src="plugins/jQuery_2/jquery-2.2.3.min.js"></script>
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
            url: "RM_Ajax.php",
            Ruta: "<?php echo $enlace_actual ?>",
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
        var Presentacion = $("#Presentacion").val();
        var Via_Administracion = $("#Via_Administracion").val();

        if (medicamento_id == "") {
            medicamento_id = $("#medicamento_id1").val();
            Presentacion = $("#presentacion_id2").val();
            Via_Administracion = $("#via_administracion_id2").val();
            if (medicamento_id == "0") {
                var medicamento_id2 = $("#medicamento_id2").val();
                
            } else {
                medicamento_id2 = '';
            }
            if (medicamento_id2.trim() === "" || Cantidad == "" || medicamento_id2 === undefined || medicamento_id2 === null) {
                console.log('Estoy aqui');
                alert("Todos los campos son obligatorios");
                return null;
            }

        }
        


       
        var Composicion = $("#Composicion").val();
        var Dosis = $("#Dosis").val();
        var Indicaciones = $("#Indicaciones").val();
        var Indicaciones_Generales = $("#Indicaciones_Generales").val();
        var sucursal = $("#sucursal").val();

        var usuario_id = $("#usuario_id").val();
        var cliente_id = $("#cliente_id").val();
        var receta_id = $("#receta_id").val();

        $.ajax({
            type: "POST",
            url: "RM_Ajax.php",
            data: {
                medicamento_id: medicamento_id,
                medicamento_id2: medicamento_id2,
                Cantidad: Cantidad,
                Presentacion: Presentacion,
                Via_Administracion: Via_Administracion,
                Composicion: Composicion,
                Dosis: Dosis,
                Indicaciones: Indicaciones,
                Indicaciones_Generales: Indicaciones_Generales,
                sucursal: sucursal,
                usuario_id: usuario_id,
                cliente_id: cliente_id,
                receta_id: receta_id,
                Ruta: "<?php echo $enlace_actual ?>",
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
                $("#medicamento_id2").val("");
                $("#presentacion_id2").val("");
                $("#via_administracion_id2").val("");
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
            url: "RM_Ajax.php",
            data: {
                medicamento_receta_id: medicamento_receta_id,
                usuario_id: usuario_id,
                cliente_id: cliente_id,
                receta_id: receta_id,
                Ruta: "<?php echo $enlace_actual ?>",
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
        // document.getElementById('Medicamento_Unitario');
        // document.getElementById('Medicamento_Varios');
        document.getElementById('Medicamento_Varios').style.display = 'none';
        //
        var medicamento_receta_id = Valor;

        $.ajax({
            type: "POST",
            Ruta: "<?php echo $enlace_actual ?>",
            url: "RM_Ajax.php",
            data: {
                medicamento_receta_id: medicamento_receta_id,
                Tipo: "Editar Medicamento"
            },
            success: function(response) {
                var json = response;

                //console.log(response);
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
                    if (index == "medicamento_id") {
                        $("#medicamento_id > option[value='" + valor + "']").attr("selected", true);

                        $("#medicamento_id").select2();
                    }
                }

                $("#Boton_Actualizar_Medicamento").remove();

                var el = document.createElement("center");
                el.id = "Boton_Actualizar_Medicamento";
                el.innerHTML = "<input type='hidden' id='medicamento_recetario_id' value='" +
                    medicamento_receta_id +
                    "'><br><button type='button' onclick='ActualizarMedicamento();' class='btn btn-block btn-info btn-lg rounded-pill shadow' style='background-color:#2e5b83;'>Actualizar Medicamento</button>";
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
            url: "RM_Ajax.php",
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
                Ruta: "<?php echo $enlace_actual ?>",

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
            url: "RM_Ajax.php",
            data: {
                varios_medicamento_id: varios_medicamento_id,
                usuario_id: usuario_id,
                cliente_id: cliente_id,
                receta_id: receta_id,
                Ruta: "<?php echo $enlace_actual ?>",
                Tipo: "Guardar Varios Medicamentos"
            },
            success: function(response) {
                $("#Resultado_GuardarMedicamento").html(response);
                $('#varios_medicamento_id').val('').trigger("change");
            }
        });

    }

    function GuardarPaquete() {
        var paquete_id = $("#paquete_id").val();
        var usuario_id = $("#usuario_id").val();
        var cliente_id = $("#cliente_id").val();
        var receta_id = $("#receta_id").val();
        console.log(paquete_id);
        console.log(usuario_id);
        console.log(cliente_id);
        console.log(receta_id);
        $.ajax({
            type: "POST",
            url: "RM_Ajax.php",
            data: {
                paquete_id: paquete_id,
                usuario_id: usuario_id,
                cliente_id: cliente_id,
                receta_id: receta_id,
                Ruta: "<?php echo $enlace_actual ?>",
                Tipo: "Guardar Paquete"
            },
            success: function(response) {
                $("#Resultado_GuardarMedicamento").html(response);
                $('#Medicamento_Paquete').val('').trigger("change");
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
                        data = data
                            .trim(); // fue necesario ya que el dato devuelto se recivia con espacios BY: JHOE
                        if (data == 'Error') {
                            alert("Error al crear un nuevo dato");
                        } else if (data == 'Creado') {
                            console.log("existe dato");
                        } else {
                            //element.append('<option value="' + data + '">' + new_category + '</option>').val(data).change();
                            element.append('<option value="' + data + '">' + data + '</option>')
                                .val(data).change();
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
                        data = data
                            .trim(); // fue necesario ya que el dato devuelto se recivia con espacios BY: JHOE
                        if (data == 'Error') {
                            alert("Error al crear un nuevo dato");
                        } else if (data == 'Creado') {
                            console.log("existe dato");
                        } else {
                            //element.append('<option value="' + data + '">' + new_category + '</option>').val(data).change();
                            element.append('<option value="' + data + '">' + data + '</option>')
                                .val(data).change();
                        }
                    }
                })
            }

        });
    });

    function mostrarMedicamento(tipo) {
        if (tipo === 'Unitario') {
            document.getElementById('Medicamento_Unitario').style.display = 'block';
            document.getElementById('Medicamento_Varios').style.display = 'none';
            document.getElementById('Medicamento_Paquete').style.display = 'none';
            document.getElementById('btn1').style.display = 'block';
            document.getElementById('btn2').style.display = 'block';
        } else if (tipo === 'Varios') {
            document.getElementById('Medicamento_Unitario').style.display = 'none';
            document.getElementById('Medicamento_Varios').style.display = 'block';
            document.getElementById('Medicamento_Paquete').style.display = 'none';
            document.getElementById('btn1').style.display = 'none';
            document.getElementById('btn2').style.display = 'none';
        } else if (tipo === 'Paquete') {
            document.getElementById('Medicamento_Unitario').style.display = 'none';
            document.getElementById('Medicamento_Varios').style.display = 'none';
            document.getElementById('Medicamento_Paquete').style.display = 'block';
            document.getElementById('btn1').style.display = 'none';
            document.getElementById('btn2').style.display = 'none';
        }
    }
</script>
<script>
    function mostrarMedicamentoManual(valor) {

        if (valor == 'receta_sistema') {
            document.getElementById('inputSistema').style.display = 'block';
            document.getElementById('inputManual').style.display = 'none';
            document.getElementById('presentacionSistema').style.display = 'block';
            document.getElementById('presentacionManual').style.display = 'none';
            document.getElementById('Via_AdministracionManual').style.display = 'none';
            document.getElementById('Via_AdministracionSistema').style.display = 'block';
        } else if (valor == 'receta_manual') {
            document.getElementById('inputSistema').style.display = 'none';
            document.getElementById('inputManual').style.display = 'block';
            document.getElementById('presentacionSistema').style.display ='none' ;
            document.getElementById('presentacionManual').style.display ='block' ;
            document.getElementById('Via_AdministracionManual').style.display = 'block';
            document.getElementById('Via_AdministracionSistema').style.display = 'none';
        }
    }
</script>