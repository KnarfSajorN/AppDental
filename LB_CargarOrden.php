<?php
include 'header.php';
include 'menu.php';

$_POST = DatosIngresarMysqli($_POST);

if (isset($_POST['CargarOrden']) or isset($_POST['ActualizarOrden'])) {
    date_default_timezone_set('America/Bogota');

    ////////////////////////////// CREACION DE CAMPOS ///////////////////////////////////////////////////

    $Campo1 = mysqli_query($conn3, "show COLUMNS from LB_ExamenCargado WHERE Field = 'Usuario_Resultados_Ingreso';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `LB_ExamenCargado` ADD `Usuario_Resultados_Ingreso` TEXT NULL DEFAULT '0' COMMENT 'Se refiere al usuario que registro los resultados *Creado desde modulo de Laboratorio*'");
    }
    $Campo1 = mysqli_query($conn3, "show COLUMNS from LB_ExamenCargado WHERE Field = 'Usuario_Valida_Resultados';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `LB_ExamenCargado` ADD `Usuario_Valida_Resultados` TEXT NULL DEFAULT '0' COMMENT 'Se refiere al usuario que valido los resultados *Creado desde modulo de Laboratorio*'");
    }

    $Campo1 = mysqli_query($conn3, "show COLUMNS from LB_ExamenCargado WHERE Field = 'Observaciones';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `LB_ExamenCargado` ADD `Observaciones` TEXT NULL DEFAULT '' COMMENT '*Creado desde modulo de Laboratorio*'");
    }
    
    ////////////////////////////// CREACION DE CAMPOS ///////////////////////////////////////////////////

    foreach ($_POST["Examen"] as $key => $value) {
        $queryList = mysqli_query($conn3, "UPDATE LB_ExamenCargado SET Resultado = '$value' WHERE id = '$key';");
    }

    foreach ($_POST["Examen_Observaciones"] as $key => $value) {
        $queryList = mysqli_query($conn3, "UPDATE LB_ExamenCargado SET Observaciones = '$value' WHERE id = '$key';");
    }

    foreach ($_POST["ValoresReferencia"] as $key => $value) {
        $queryList = mysqli_query($conn3, "UPDATE LB_ExamenCargado SET Valores_Referencia = '$value' WHERE id = '$key';");
    }

    $Usuario_Resultados_Ingreso = $_POST["Usuario_Resultados_Ingreso"];
    $Usuario_Valida_Resultados = $_POST["Usuario_Valida_Resultados"];
    $idOperacion = $_POST["idOperacion"];

    $queryList = mysqli_query($conn3, "UPDATE LB_ExamenCargado SET Usuario_Resultados_Ingreso = '$Usuario_Resultados_Ingreso', Usuario_Valida_Resultados='$Usuario_Valida_Resultados' WHERE idOperacion = '$idOperacion';");

    $ruta = htmlentities($_SERVER['PHP_SELF']);
    $ruta = str_replace('.php', '', $ruta);
    if ($queryList != true) {
        echo "<script language='Javascript'> window.location='{$ruta}?idOperacion={$idOperacion}&error=Hubo Un Error Al Guardar Los Datos'</script>";
    } else {
        echo "<script language='Javascript'> window.location='{$ruta}?idOperacion={$idOperacion}&msg=Se Guardaron Los Datos Correctamente'</script>";
    }
}


if (isset($_POST['CerrarOrden'])) {

    $idOperacion = $_POST["idOperacion"];
    $queryList = mysqli_query($conn3, "UPDATE sOperacionInv SET Estado_Orden = 'Cerrado' WHERE idOperacion = '$idOperacion';");

    $queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv WHERE idOperacion='$idOperacion'");
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $cliente_id = $rowMotorizado["idCliente"];
        $usuario_id = $rowMotorizado["idEmpresa"];
    }

    $queryList = mysqli_query($conn3, "SELECT * FROM  cliente WHERE cliente_id='$cliente_id'");
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $Nombre = $rowMotorizado["nombre_cliente"];
        $Nombre = trim($Nombre, ' ');
        $Whatsapp = $rowMotorizado["whatsapp"];
    }

    $mensajeW = " Sr(a) *" . $Nombre . "* Se le ha generado los resultados de la orden del laboratorio de la Empresa " . funcionMaster($usuario_id, 'ID', 'NOMBRE_USUARIO', 'usuarios') . ", para visualizarla entrar en el siguiente link, Link: {$Base}LB_ImpresionResultadoOrden?idOperacion={$idOperacion}";
    $action = 0;
    Whatsapp_sent_cliente($linkkey, $Whatsapp, $mensajeW, $cliente_id, $usuario_id, $Whatsapp, $action);

    
    $ruta = htmlentities($_SERVER['PHP_SELF']);
    $ruta = str_replace('.php', '', $ruta);
    if ($queryList != true) {
        echo "<script language='Javascript'> window.location='{$ruta}?idOperacion={$idOperacion}&error=Hubo Un Error Al Guardar Los Datos'</script>";
    } else {
        echo "<script language='Javascript'> window.location='LB_ResultadoOrden.php?idOperacion={$idOperacion}'</script>";
    }
}

if ($_GET["msg"] != "") {
    include "plugins/SweetAlert2K/AlertaCorrectaOperacion.php";
}
if ($_GET["error"] != "") {
    include "plugins/SweetAlert2K/AlertaErrorOperacion.php";
}


$usuario_id = $_SESSION['ID'];

$idOperacion = $_GET["idOperacion"];
$clienteId = funcionMaster($idOperacion, 'idOperacion', 'cliente_id', 'LB_ExamenCargado')
?>


<style>
.Titulo_Pagina {
    width: fit-content;
    background-color: #3c8dbc75;
    padding: 20px;
    border-radius: 20px 20px 0px 0px;
    display: table-cell;
}
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> Cargar Laboratorio </a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="content">
                <div class="col-md-12" style="height: 280px;">
                    <?php include 'Modulos_Estilos/DatosPersonales.php';
                    echo Datos_Personales($clienteId);
                    ?>
                </div>
                <br><br>
                <h4 class="Titulo_Pagina"> Cargar Laboratorio </h4>
                <div class="box">
                    <div class="box-body">

                        <div class="col-md-12">
                            <hr style="margin-top:20px;margin-bottom: 10px;">
                        </div>
                        <div class="col-md-12">
                            <h2 style='text-align-last: center;margin-top:0px;'>Exámenes Cargados</h2>
                        </div>
                        <div class="col-md-12">
                            <hr style="margin-top:0px;margin-bottom: 10px;">
                        </div>

                        <div class="col-md-12">
                            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?idOperacion=<?php echo $idOperacion; ?>" method="POST" name="formularioActualizarcliente">
                                <div class="form-row">
                                    <table class="table table-bordered table-striped table-responsive">
                                        <thead>
                                            <tr>
                                                <th scope="col" width="10%">Nombre</th>
                                                <th scope="col" width="10%">Resultado</th>
                                                <th scope="col" width="10%">Unidades de Referencia</th>
                                                <th scope="col" width="10%">Valor de Referencia</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $queryList = mysqli_query($conn3, "SELECT * FROM  LB_ExamenCargado WHERE idOperacion='$idOperacion' AND Activo = 1 ORDER BY id ASC");
                                            while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                                $contador++;
                                                $FormulaDelExamen = "";
                                                $Funcion = "";
                                                $FuncionValores = "";
                                                $Valores_Referencia = "";
                                                $ExamenFormula = "";

                                                $id = $rowMotorizado['id'];
                                                $examen_id = $rowMotorizado['examen_id'];
                                                $Resultado = $rowMotorizado['Resultado'];
                                                $Comentarios = $rowMotorizado['Comentarios'];
                                                $Nombre = $rowMotorizado['Nombre'];
                                                $Unidades_Referencia = $rowMotorizado['Unidades_Referencia'];
                                                $CaracteristicaExamen = $rowMotorizado['CaracteristicaExamen'];
                                                $examenrelacion_id = $rowMotorizado['examenrelacion_id'];

                                                ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                                $Formulas_Arreglo = json_decode($rowMotorizado['Formulas'], true);
                                                foreach ($Formulas_Arreglo as $key => $value) {
                                                    $pos = strpos($value, "id=");
                                                    $posCaracteristicas = strpos($value, "idC=");
                                                    if ($pos !== false) {
                                                        $queryList1 = mysqli_query($conn3, "SELECT * FROM  LB_ExamenCargado WHERE idOperacion='$idOperacion' AND examen_id='" . str_replace("id=", "", $value) . "' AND examenrelacion_id='{$examenrelacion_id}' AND Activo = 1  ORDER BY id ASC");
                                                        while ($rowMotorizado1 = mysqli_fetch_array($queryList1)) {
                                                            $examencargado_id = $rowMotorizado1["id"];
                                                        }
                                                        $FormulaDelExamen .= '"idexamencargado=' . $examencargado_id . '",';
                                                    } 
                                                    else if($posCaracteristicas !== false){
                                                        $contadorCaracteristicas=-1;
                                                        $idCaracteristica = str_replace("idC=", "", $value);
                                                        $queryList1 = mysqli_query($conn3, "SELECT * FROM  LB_ExamenCargado WHERE idOperacion='$idOperacion' AND examen_id='" . $examen_id . "' AND examenrelacion_id='{$examenrelacion_id}' AND Activo = 1  ORDER BY id ASC");
                                                        while ($rowMotorizado1 = mysqli_fetch_array($queryList1)) {
                                                            $contadorCaracteristicas++;

                                                            if($contadorCaracteristicas==$idCaracteristica){
                                                                $examencargado_id = $rowMotorizado1["id"];
                                                                $FormulaDelExamen .= '"idexamencargado=' . $examencargado_id . '",'; 
                                                            }
                                                             
                                                        }
                                                    }
                                                    else {
                                                        $FormulaDelExamen .= '"' . $value . '",';
                                                    }
                                                }
                                                ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                                if ($FormulaDelExamen != "") {
                                                    $FormulaDelExamen = "data-formula='[" . trim($FormulaDelExamen, ',') . "]'";
                                                    $ExamenFormula = "<i class='fa fa-pencil-square-o' aria-hidden='true' title='Este Examen Tiene una Formula Para Calcular Su Valor'></i>";
                                                }
                                                ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                                $Arreglo_Mas_Informacion = json_decode($rowMotorizado['Arreglo_Mas_Informacion'], true);
                                                $Campo_Resultado = "";
                                                $Valor_Campo_Resultado = "";
                                                
                                                foreach ($Arreglo_Mas_Informacion as $key => $value) {
                                                    if ($key == "Campo_Resultado" and $value == "Subtitulo") {
                                                        $Resultado = "Subtitulo";
                                                        $ExamenFormula="";
                                                        $FormulaDelExamen = "";
                                                    }
                                                    if ($key == "Campo_Resultado" and $value == "Lista") {
                                                        $ExamenFormula="";
                                                        $FormulaDelExamen = "";
                                                    }
                                                    if ($key == "Campo_Resultado") {
                                                        $Campo_Resultado = $value;
                                                    }
                                                    if ($key == "Valores_Campo_Resultado") {
                                                        $Valor_Campo_Resultado = $value;
                                                    }
                                                    
                                                }
                                                ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                                if ($rowMotorizado['Valores_Referencia_Filtrado'] != "[]") {
                                                    $Funcion = "onchange='BuscarValores(this,{$id})'";
                                                    $FuncionValores = "BuscarValoresReferencia({$id})";
                                                } else {
                                                    $Valores_Referencia = PonerComillasyOtrosCaracteres($rowMotorizado['Valores_Referencia']);
                                                }
                                                ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                                $queryList1 = mysqli_query($conn3, "SELECT examen_id, COUNT(*) as Cantidad FROM LB_ExamenCargado where examen_id='$examen_id' and idOperacion = '$idOperacion' AND examenrelacion_id='{$examenrelacion_id}'    AND Activo = 1  GROUP BY examen_id");
                                                while ($rowMotorizado1 = mysqli_fetch_array($queryList1)) {
                                                    $CantidadCaracteristicas = $rowMotorizado1["Cantidad"];
                                                }
                                                ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                                switch ($Campo_Resultado) {
                                                    case 'Lista':
                                                        $Valor_Campo_Resultado1 = json_decode(PonerComillasyOtrosCaracteres($Valor_Campo_Resultado), true);
                                                        $Options = "<option value=''> Seleccione </option>";
                                                        foreach ($Valor_Campo_Resultado1 as $key => $value) {
                                                            if ($Resultado == $value) {
                                                                $Options .= "<option selected value='$value'>{$value}</option>";
                                                            } else {
                                                                $Options .= "<option value='$value'>{$value}</option>";
                                                            }
                                                        }
                                                        $Input = "<select type='select' name='Examen[$id]' id='Examen_$id' class='form-control select2' style='width: 100%;'  placeholder='Seleccione...' {$Funcion} {$FormulaDelExamen}>  $Options </select>";
                                                        break;
                                                    case 'Numerico': case 'Numérico':
                                                        $Input = "<input type='number' name='Examen[$id]' id='Examen_$id' class='form-control CampoResultado' style='width: 100%;' value='$Resultado' {$Funcion} {$FormulaDelExamen} step='0.001' >";
                                                        break;
                                                    case 'Texto':
                                                        $Input = "<input type='text' name='Examen[$id]' id='Examen_$id' class='form-control CampoResultado' style='width: 100%;' value='$Resultado' {$Funcion} {$FormulaDelExamen}>";
                                                        break;
                                                    case '':
                                                        $Input = "<input type='text' name='Examen[$id]' id='Examen_$id' class='form-control CampoResultado' style='width: 100%;' value='$Resultado' {$Funcion} {$FormulaDelExamen}>";
                                                        break;
                                                }
                                                ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                                if ($Resultado == "No Aplica Resultado") {
                                                    $contador = "1";
                                                    $id_observaciones = $id;
                                                    
                                                    $ResultadoObservaciones = $rowMotorizado['Observaciones'];
                                                    echo "<tr><td colspan='5' align='center'><b style='font-size: 22px;'>$Nombre</b></td></tr>";
                                                } 
                                                else if ($Resultado == "Subtitulo") {
                                                    echo "<tr><td colspan='5' align='center'><b style='font-size: 22px;'>$Nombre</b></td></tr>";
                                                }

                                                else if ($CaracteristicaExamen == "No") {
                                                    $contador = "1";
                                                    $id_observaciones = $id;
                                                    $ResultadoObservaciones = $rowMotorizado['Observaciones'];
                                                    echo "<tr><td colspan='5' align='center'><b style='font-size: 22px;'>$Nombre</b></td></tr>";
                                                    echo "<tr>
                                                            <td>$ExamenFormula $Nombre  </td>
                                                            <td>{$Input}</td>
                                                            <td>$Unidades_Referencia</td>
                                                            <td class='valoresreferencia' id='Caracteristicas_{$id}' onchange='{$FuncionValores}'>$Valores_Referencia</td>
                                                        </tr>";
                                                } else {
                                                    echo "<tr>
                                                            <td>$ExamenFormula $Nombre </td>
                                                            <td>{$Input}</td>
                                                            <td>$Unidades_Referencia</td>
                                                            <td class='valoresreferencia' id='Caracteristicas_{$id}' onchange='{$FuncionValores}'>$Valores_Referencia</td>
                                                        </tr>";
                                                }
                                                //echo "<tr><td>$CantidadCaracteristicas == $contador</td></tr>";
                                                if ($CantidadCaracteristicas == $contador) {
                                                    echo "<tr><td colspan='4' align='center'><b style='font-size: 22px;'>Observaciones:</b><textarea name='Examen_Observaciones[$id_observaciones]' class='input-lg' style='width: 100%;'>{$ResultadoObservaciones}</textarea></td></tr>";
                                                }
                                                $Usuario_Resultados_Ingreso = $rowMotorizado['Usuario_Resultados_Ingreso'];
                                                $Usuario_Valida_Resultados = $rowMotorizado['Usuario_Valida_Resultados'];
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <link rel="stylesheet" href="plugins/DataEditor/ckeditor.css"><!-- para que se vean las tablas del ckeditor-->
                                    <br>
                                </div>

                                <br><label>Usuario que Ingresa los Resultados</label>
                                <select name="Usuario_Resultados_Ingreso" class="form-control select2" style="width: 100%;">
                                    <option value="0">No Aplica </option>
                                    <?php
                                    $queryList = mysqli_query($conn3, "SELECT * FROM  usuarios where ACTIVO = 1");
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                        if ($Usuario_Resultados_Ingreso == $rowMotorizado["ID"]) {
                                            echo "<option value='" . $rowMotorizado["ID"] . "' selected>" . $rowMotorizado["NOMBRE_USUARIO"] . "</option>";
                                        } else {
                                            echo "<option value='" . $rowMotorizado["ID"] . "'>" . $rowMotorizado["NOMBRE_USUARIO"] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>

                                <br><label>Usuario que Valida los Resultados</label>
                                <select name="Usuario_Valida_Resultados" class="form-control select2" style="width: 100%;">
                                    <option value="0">No Aplica </option>
                                    <?php
                                    $queryList = mysqli_query($conn3, "SELECT * FROM  usuarios where ACTIVO = 1");
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                        if ($Usuario_Valida_Resultados == $rowMotorizado["ID"]) {
                                            echo "<option value='" . $rowMotorizado["ID"] . "' selected>" . $rowMotorizado["NOMBRE_USUARIO"] . "</option>";
                                        } else {
                                            echo "<option value='" . $rowMotorizado["ID"] . "'>" . $rowMotorizado["NOMBRE_USUARIO"] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>

                                <input type="hidden" name="idOperacion" value="<?php echo $idOperacion; ?>">
                                <hr>

                                <div class="form-group col-md-12">
                                    <?php if (!isset($_GET['Editar'])) : ?>
                                        <center><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" name="CargarOrden"> <strong> Cargar los Resultados </strong> </button></center><br>
                                        <center><button type="submit" class="btn btn-block btn-outline-danger btn-lg rounded-pill shadow" name="CerrarOrden"> <strong> Cerrar Orden / Imprimirla </strong> </button></center>
                                    <?php else : ?>
                                        <center><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" name="ActualizarOrden"> <strong> Actualizar los Resultados </strong> </button></center><br>
                                    <?php endif; ?>
                                </div>
                            </form>
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
<script>
    
    $(".CampoResultado").change(function() {
        var Inputs = document.getElementsByClassName('CampoResultado');
        //console.log(Inputs);
        Array.prototype.forEach.call(Inputs, function(Campo) {
            //console.log($(Campo).attr('data-formula'));
            if($(Campo).attr('data-formula')!==undefined){
                let Arreglo = JSON.parse($(Campo).attr('data-formula'));
                var elemento_final = "";
                Arreglo.forEach(element => {
                    //console.log(element);
                    var elemento = element.includes('idexamencargado=');
                    //console.log(elemento);
                    if (element != undefined) {
                        if (elemento == true) {
                            var id = element.replace('idexamencargado=', '');
                            //console.log(document.getElementById("Examen_" + id).value);
                            elemento_final += document.getElementById("Examen_" + id).value;
                        } 
                        else {
                            //console.log(element);
                            elemento_final += element;
                        }
                    }
                });
            }
            

            //console.log(eval(elemento_final));
            if (elemento_final !==undefined) {
                try{
                    $(Campo).val(eval(elemento_final));
                    var Campoid = Campo.id.replace('Examen_', '');
                    BuscarValores(Campo,Campoid);
                }
                catch(error){
                    console.log("error");
                    console.log("error onchange");
                }
            }
        });
    });
</script>
<script>
    $('#Tabla_Examenes').dataTable({
        "info": false,
        "paging": false
    });

    function BuscarValores(value, id) {
        var valor = value.value;
        $.ajax({
            url: "LB_Ajax.php",
            method: "POST",
            data: {
                Tipo: "Buscar Valores Referencia",
                id: id,
                Valor: valor,
                Cliente_id: "<?php echo $clienteId; ?>"
            },
            success: function(data) {
                if(valor!=""){
                    $(value).css('background-color', data);
                    $("#"+value.id+" ~ span > span > span").css('background-color', data);
                }else{
                    $(value).css('background-color', '#fff');
                    $("#"+value.id+" ~ span > span > span").css('background-color', '#fff');
                }
                //console.log(this);
                //console.log(data);
            }
        })
    }

    function BuscarValoresReferencia(id) {
        $.ajax({
            url: "LB_Ajax.php",
            method: "POST",
            data: {
                Tipo: "Buscar Valores Referencia Texto",
                id: id,
                Cliente_id: "<?php echo $clienteId; ?>"
            },
            success: function(data) {
                $("#Caracteristicas_" + id).html(data+"<textarea name='ValoresReferencia["+id+"]' style='display:none'>"+data+"</textarea>");
            }
        })
    }

    $(document).ready(function() {
        var valoresreferencia = document.getElementsByClassName("valoresreferencia");
        for (let i = 0; i < valoresreferencia.length; i++) {
            valoresreferencia[i].onchange();
        }
    });

</script>