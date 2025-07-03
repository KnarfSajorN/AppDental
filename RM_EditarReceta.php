<?php
include 'header.php';
include 'menu.php';

$_POST = DatosIngresarMysqli($_POST);
#Inicio
if (isset($_POST['Guardar_Informacion_Pagina'])) {

    $medicamento_id = $_POST["medicamento_id"];
    $Cantidad = $_POST["Cantidad"];
    $Presentacion = $_POST["Presentacion"];
    $Via_Administracion = $_POST["Via_Administracion"];
    $Composicion = $_POST["Composicion"];
    $Dosis = $_POST["Dosis"];
    $Indicaciones = $_POST["Indicaciones"];
    $Indicaciones_Generales = $_POST["Indicaciones_Generales"];

    $usuario_id = $_POST["usuario_id"];
    $cliente_id = $_POST["cliente_id"];
    $receta_id = $_POST["receta_id"];

    $Nombre_Medicamento = funcionMaster($medicamento_id, 'id', 'Nombre', 'RM_Medicamentos');

    $Lote = funcionMaster($medicamento_id, 'id', 'Lote', 'RM_Medicamentos');
    $Laboratorio = funcionMaster($medicamento_id, 'id', 'Laboratorio', 'RM_Medicamentos');
    $Fecha_Vencimiento = funcionMaster($medicamento_id, 'id', 'Fecha_Vencimiento', 'RM_Medicamentos');
    
    //Insertar
    mysqli_query($conn3, "INSERT INTO RM_Recetario (usuario_id, cliente_id, Nombre_Medicamento, medicamento_id, Cantidad, Presentacion, Via_Administracion, Composicion, Dosis, Indicaciones, Indicaciones_Generales, Lote, Laboratorio, Fecha_Vencimiento, receta_id,Estado) 
                    VALUES ('$usuario_id','$cliente_id','$Nombre_Medicamento' ,'$medicamento_id','$Cantidad', '$Presentacion'  ,'$Via_Administracion', '$Composicion', '$Dosis','$Indicaciones','$Indicaciones_Generales', '$Lote', '$Laboratorio', '$Fecha_Vencimiento', '$receta_id','Cerrado');");
    
    $ruta = htmlentities($_SERVER['PHP_SELF']);
    if ($queryList != true) {
        echo "<script language='Javascript'> window.location='{$ruta}?receta_id={$receta_id}&cliente_id={$cliente_id}&error=Hubo Un Error Al Guardar Los Datos'</script>";
    } else {
        echo "<script language='Javascript'> window.location='{$ruta}?receta_id={$receta_id}&cliente_id={$cliente_id}&msg=Se Guardo El Medicamento Correctamente'</script>";
    }
}
///////////////////////////////////////////////////////////////////////////

if (isset($_POST['Actualizar_Informacion_Pagina'])) {
    $arreglo_id = $_POST['arreglo_id'];
    
    $cliente_id = $_POST["cliente_id"];
    $receta_id = $_POST["receta_id"];

    $Arreglo["Arreglo"]["medicamento_id"] = $_POST["medicamento_id"];
    $Arreglo["Arreglo"]["Cantidad"] = $_POST["Cantidad"];
    $Arreglo["Arreglo"]["Presentacion"] = $_POST["Presentacion"];
    $Arreglo["Arreglo"]["Via_Administracion"] = $_POST["Via_Administracion"];
    $Arreglo["Arreglo"]["Composicion"] = $_POST["Composicion"];
    $Arreglo["Arreglo"]["Dosis"] = $_POST["Dosis"];
    $Arreglo["Arreglo"]["Indicaciones"] = $_POST["Indicaciones"];
    $Arreglo["Arreglo"]["Indicaciones_Generales"] = $_POST["Indicaciones_Generales"];

    $Arreglo["Arreglo"]["Nombre_Medicamento"] = funcionMaster($_POST["medicamento_id"], 'id', 'Nombre', 'RM_Medicamentos');

    $Arreglo["Arreglo"]["Lote"] = funcionMaster($_POST["medicamento_id"], 'id', 'Lote', 'RM_Medicamentos');
    $Arreglo["Arreglo"]["Laboratorio"] = funcionMaster($_POST["medicamento_id"], 'id', 'Laboratorio', 'RM_Medicamentos');
    $Arreglo["Arreglo"]["Fecha_Vencimiento"] = funcionMaster($_POST["medicamento_id"], 'id', 'Fecha_Vencimiento', 'RM_Medicamentos');
    
    foreach ($Arreglo["Arreglo"] as $key => $value) {
            $Campos .= "{$key} = '{$value}',";
    }
    $Campos = trim($Campos, ',');

    $queryList = mysqli_query($conn3, "UPDATE RM_Recetario SET {$Campos} WHERE id = '{$arreglo_id}' limit 1;");

    $ruta = htmlentities($_SERVER['PHP_SELF']);
    if ($queryList != true) {
        echo "<script language='Javascript'> window.location='{$ruta}?receta_id={$receta_id}&cliente_id={$cliente_id}&error=Hubo Un Error Al Actualizar Los Datos'</script>";
    } else {
        echo "<script language='Javascript'> window.location='{$ruta}?receta_id={$receta_id}&cliente_id={$cliente_id}&msg=Se Actualizo El Medicamento Correctamente'</script>";
    }
}
///////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////
if (isset($_GET['Editar'])) {
    $id = $_GET['Editar'];
    $queryList = mysqli_query($conn3, "SELECT * FROM  RM_Recetario  where id=$id limit 1");
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        foreach ($rowMotorizado as $key => $value) {
            $datos["$key"] = "$value";
        }
    }
    $datos_json = json_encode($datos);
?>

<script>
        window.onload = function() {
            var Arreglo = <?php echo $datos_json ?>;
            //console.log(Arreglo);
            for (index in Arreglo) {
                if (document.getElementsByName("" + index + "")[0] != undefined) {
                    
                    if ((document.getElementsByName("" + index + "")[0].tagName == "INPUT" || document.getElementsByName("" + index + "")[0].tagName == "TEXTAREA") && document.getElementsByName("" + index + "")[0].type != "checkbox") {
                        document.getElementsByName("" + index + "")[0].value = Arreglo[index];
                        //console.log(index);
                    } else {
                        //console.log(index);
                        var name = document.getElementsByName("" + index + "")[0].name;
                        var classe = document.getElementsByName("" + index + "")[0].className;

                        if (classe.indexOf("select2") > -1) {
                            document.getElementsByName("" + index + "")[0].value = Arreglo[index];
                            //console.log(index);
                            $("select[name='" + name + "'] > option[value='" + Arreglo[index] + "']").attr("selected", true);
                            $("select[name='" + name + "']").select2();

                        } else {

                            $("select[name='" + name + "']").val(Arreglo[index]);

                        }

                    }

                    if (index == "Presentacion") {

                        
                        if(document.getElementsByName("" + index + "")[0].value!=""){
                            $("#Presentacion > option[value='" + Arreglo[index] + "']").attr("selected", true);
                            $("#Presentacion").change();
                        }
                        else{
                            $('#Presentacion').append($('<option>').val(Arreglo[index]).text(Arreglo[index]));
                            $("#Presentacion > option[value='" + Arreglo[index] + "']").attr("selected", true);
                            $("#Presentacion").change();
                        }
                        
                    }
                    if (index == "Via_Administracion") {

                        if(document.getElementsByName("" + index + "")[0].value!=""){
                            $("#Via_Administracion > option[value='" + Arreglo[index] + "']").attr("selected", true);
                            $("#Via_Administracion").change();
                        }
                        else{
                            $('#Via_Administracion').append($('<option>').val(Arreglo[index]).text(Arreglo[index]));
                            $("#Via_Administracion > option[value='" + Arreglo[index] + "']").attr("selected", true);
                            $("#Via_Administracion").change();
                        }

                    }
                    if (index == "medicamento_id") {
                        $("#medicamento_id > option[value='" + Arreglo[index] + "']").attr("selected", true);
                        //$("#medicamento_id").change();
                    }

                }

            }
        };
    </script>

<?php
}
#Cierre
if ($_GET["msg"] != "") {
    include "plugins/SweetAlert2K/AlertaCorrectaOperacion.php";
}
if ($_GET["error"] != "") {
    include "plugins/SweetAlert2K/AlertaErrorOperacion.php";
}

$receta_id = $_GET['receta_id'];
$cliente_id = $_GET['cliente_id'];
$usuario_id = $_SESSION['ID'];

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> Editar Receta </a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="content">
                <h4 class="Titulo_Pagina">Editar Receta</h4>
                <div class="box">
                    <div class="box-body">
                        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                            
                            <div id="Medicamento_Unitario" class="row">
                                <div class="form-group col-md-6">
                                    <div align="left"> Agregar Medicamento <a href="RM_Medicamentos.php"><i class="fa fa-cog"></i> </a> </div>
                                    <select name="medicamento_id" id="medicamento_id" class="form-control select2" style="width: 100%;" onchange="CargarInformacionMedicamento(this.value)">
                                        <option value="" selected="selected">Seleccione Medicamento</option>
                                        <?php
                                        $queryList = mysqli_query($conn3, "SELECT * FROM  RM_Medicamentos WHERE Activo='1' ");
                                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                            $id = $rowMotorizado["id"];
                                            $Nombre = $rowMotorizado["Nombre"];

                                            echo "<option value='{$id}'>{$Nombre}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <div align="left"> Cantidad </div>
                                    <input type="number" class="form-control input-lg" name="Cantidad" id="Cantidad" placeholder="1" value="1">
                                </div>

                                <div class="form-group col-md-6">
                                    <div align="left">Presentación <a href="Global_ModuloSelect.php?Tipo=Presentacion_Receta"><i class="fa fa-cog"></i> </a></div>
                                    <select class="form-control input-lg " name="Presentacion" id="Presentacion" placeholder="Presentacion del Medicamento" style="width:100%">
                                        <?php
                                        $QuerySelect = mysqli_query($conn3, "SELECT * FROM  Global_Select WHERE Nombre='Presentacion_Receta' LIMIT 1");
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
                                    <div align="left">Vía de Administración<a href="Global_ModuloSelect.php?Tipo=Via_Administracion_Receta"><i class="fa fa-cog"></i> </a></div>
                                    <select class="form-control input-lg " name="Via_Administracion" id="Via_Administracion" placeholder="Via de Administracion del Medicamento" style="width:100%">
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
                                    <div align="left">Composición</div>
                                    <input type="text" class="form-control input-lg" name="Composicion" id="Composicion" placeholder="Composicion del Medicamento" value="" maxlength="240" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>

                                <div class="form-group col-md-6">
                                    <div align="left">Dosis</div>
                                    <input type="text" class="form-control input-lg" name="Dosis" id="Dosis" placeholder="Dosis del Medicamento" value="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>


                                <div class="form-group col-md-6">
                                    <div align="left"> Indicaciones </div>
                                    <textarea id="Indicaciones" name="Indicaciones" placeholder="INDICACIONES ESPECIFICAS DEL MEDICAMENTO" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;margin: 0px;margin-top: 15px;max-width: 100%;"></textarea>
                                </div>


                                <div class="form-group col-md-6">
                                    <div align="left"> Indicaciones Generales de la Receta </div>
                                    <textarea id="Indicaciones_Generales" name="Indicaciones_Generales" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;margin: 0px;margin-top: 15px;max-width: 100%;" placeholder="INDICACIONES GENERALES DE LA RECETA , LLENAR AL FINAL."></textarea>
                                </div>
                            </div>

                            <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $usuario_id; ?>">
                            <input type="hidden" name="cliente_id" id="cliente_id" value="<?php echo $cliente_id; ?>">
                            <input type="hidden" name="receta_id" id="receta_id" value="<?php echo $receta_id; ?>">

                            <?php if ($_GET['Editar'] <> "") : ?>
                                <div class="col-sm-12">
                                    <input type="hidden" name="arreglo_id" value="<?php echo $_GET['Editar'] ?>">
                                    <center><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" name="Actualizar_Informacion_Pagina">
                                            <h2> <strong> A c t u a l i z a r </strong> </h2>
                                        </button></center>
                                </div>
                            <?php else : ?>
                                <div class="col-sm-12">
                                    <center><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" name="Guardar_Informacion_Pagina">
                                            <h2> <strong> G u a r d a r </strong> </h2>
                                        </button></center>
                                </div>
                            <?php endif; ?>
                            <br><br>
                        </form>


                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-body">
                                    <div class="col-md-12">
                                        <h2 style="text-align: center;font-weight: bold;"> Medicamentos de la Receta </h2>
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Nombre</th>
                                                    <th scope="col">Cantidad</th>
                                                    <th scope="col">Presentación</th>
                                                    <th scope="col">Vía de Administración</th>
                                                    <th scope="col">Dosis</th>
                                                    <th scope="col"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                    $QueryRecetario = mysqli_query($conn3, "SELECT * FROM  RM_Recetario where receta_id = '$receta_id' AND cliente_id = '$cliente_id' AND usuario_id = '$usuario_id' ");
                                                    while ($RowRecetario = mysqli_fetch_array($QueryRecetario)) {
                                                    //$contador++;
                                                        $id = $RowRecetario['id'];
                                                        $Nombre_Medicamento = $RowRecetario['Nombre_Medicamento'];
                                                        $Cantidad = $RowRecetario['Cantidad'];
                                                        $Presentacion = $RowRecetario['Presentacion'];
                                                        $Via_Administracion = $RowRecetario['Via_Administracion'];
                                                        $Composicion = $RowRecetario['Composicion'];
                                                        $Dosis = $RowRecetario['Dosis'];

                                                        $Indicaciones = $RowRecetario['Indicaciones'];
                                                        $Indicaciones_Generales = $RowRecetario['Indicaciones_Generales'];

                                                    $ruta = htmlentities($_SERVER['PHP_SELF']);
                                                    echo "<tr width='2%'><th scope='row'>{$id}</th>
                                                    <td width='20%' align='center'>{$Nombre_Medicamento}</td>
                                                    <td width='20%' align='center'>{$Cantidad}</td>
                                                    <td width='20%' align='center'>{$Presentacion}</td>
                                                    <td width='20%' align='center'>{$Via_Administracion}</td>
                                                    <td width='30%' align='center'>{$Dosis}</td>";

                                                    echo "<td width='30%' align='center'><font color='#04CC05'> <a href='{$ruta}?receta_id={$receta_id}&cliente_id={$cliente_id}&Editar={$id}' class='btn btn-block btn-outline-primary btn-lg rounded-pill shadow' style='display: flex;'><i class='fa fa-pencil' title='Editar'></i>  Editar</a></font><br>
                                                    <br>
                                                    </td></tr>";
                                                }

                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include 'footer.php';

?>

<script type="text/javascript">

function EliminarMedicamento(Valor){

    $.ajax({
    type: "POST",
    url: "RM_Ajax.php",
    data: {
        receta_detalle_id: Valor,
        cliente_id: $("#cliente_id").val(),
        receta_id: $("#receta_id").val(),
        usuario_id : $("#usuario_id").val(),
        Tipo: "Eliminar Medicamento Modulo Editar"
    },
    success: function(response) {
        //console.log(response);
        window.location=response;

    }
});

}

function CargarInformacionMedicamento(Valor) {

var medicamento_id = Valor;
//console.log(medicamento_id);
$.ajax({
    type: "POST",
    url: "RM_Ajax.php",
    data: {
        medicamento_id: medicamento_id,
        Tipo: "Llenar Modulo Medicamentos"
    },
    success: function(response) {

        var json = response;
        //console.log(json);
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
                            //element.append('<option value="' + data + '">' + new_category + '</option>').val(data).change();
                            element.append('<option value="' + data + '">' + data + '</option>').val(data).change();
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
                            //element.append('<option value="' + data + '">' + new_category + '</option>').val(data).change();
                            element.append('<option value="' + data + '">' + data + '</option>').val(data).change();
                        }
                    }
                })
            }

        });
    });
</script>   