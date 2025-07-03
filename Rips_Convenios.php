<?php
include 'header.php';
include 'menu.php';

$_POST = DatosIngresarMysqli($_POST);
$Nombre_Tabla = "Rips_Convenio";
#Inicio
if (isset($_POST['Guardar_Informacion_Pagina'])) {

    $Arreglo = $_POST["Arreglo"];
    $tabla = mysqli_query($conn3, "SHOW TABLES LIKE '{$Nombre_Tabla}'");
    $nrowtabla = mysqli_num_rows($tabla);
    if ($nrowtabla == 0) {
        foreach ($Arreglo as $key => $value) {
            $Campos .= "`{$key}` text DEFAULT '',";
        }
        $Campos = trim($Campos, ',');

        $query = "CREATE TABLE `{$Nombre_Tabla}` (
        `id` int(11) NOT NULL,
        `usuario_id` int(11) NOT NULL,
        {$Campos},
        `entidad_id` int(11) NOT NULL,
        `Creacion_Dinamica` text DEFAULT '',
        `Activo` varchar(5) DEFAULT '1'
        ) ENGINE=MyISAM DEFAULT CHARSET=latin1;";

        $creaciontabla = mysqli_query($conn3, $query);
        if (!$creaciontabla) {
            echo "<script language='Javascript'> alert('error en la creacion de la tabla');</script>";
        } else {
            mysqli_query($conn3, "ALTER TABLE `{$Nombre_Tabla}` ADD PRIMARY KEY (`id`);");
            mysqli_query($conn3, "ALTER TABLE `{$Nombre_Tabla}` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;");
        }
    } else {
        if ($nrowtabla == 1) {

            $Campo1 = mysqli_query($conn3, "show COLUMNS from {$Nombre_Tabla} WHERE Field = 'Creacion_Dinamica';");
            $nrowCampo1 = mysqli_num_rows($Campo1);
            if ($nrowCampo1 == "1") {
                foreach ($Arreglo as $key => $value) {
                    $Campo = mysqli_query($conn3, "show COLUMNS from {$Nombre_Tabla} WHERE Field = '{$key}';");
                    $nrowCampo = mysqli_num_rows($Campo);
                    if ($nrowCampo == 0) {
                        mysqli_query($conn3, "ALTER TABLE `{$Nombre_Tabla}` ADD `{$key}` TEXT NULL DEFAULT '';");
                    }
                }
            } else {
                echo "<script language='Javascript'> alert('Tabla No fue creada Dinamicamente');</script>";
                // si bota este mensaje es por que la tabla no esta creado el campo *Creacion_Dinamica* sirve para que no se use este modulo en tablas ya preexistentes
            }
        }
    }

    $Campos = "";
    $Valores = "";
    foreach ($_POST["Arreglo"] as $key => $value) {
        $Campos .= $key . ',';
        $Valores .= "'{$value}',";
    }
    $Campos = trim($Campos, ',');
    $Valores = trim($Valores, ',');

    $usuario_id = $_POST['usuario_id'];
    $entidad_id = $_POST['entidad_id'];

    $queryList = mysqli_query($conn3, "INSERT INTO {$Nombre_Tabla} (usuario_id,entidad_id,{$Campos}) VALUES ('$usuario_id','$entidad_id',{$Valores});");

    $ruta = htmlentities($_SERVER['PHP_SELF']);
    $ruta = str_replace('.php', '', $ruta);
    if ($queryList != true) {
        echo "<script language='Javascript'> window.location='{$ruta}?entidad_id={$entidad_id}&error=Hubo Un Error Al Guardar El Convenio'</script>";
    } else {
        echo "<script language='Javascript'> window.location='{$ruta}?entidad_id={$entidad_id}&msg=Se Guardo El Convenio Correctamente'</script>";
    }
}

///////////////////////////////////////////////////////////////////////////

if (isset($_POST['Actualizar_Informacion_Pagina'])) {

    $Arreglo = ["No_Liq_Ds_Ma_Uvr"];
    foreach ($Arreglo as $key => $value) {
        if ($_POST["Arreglo"][$value] == "") {
            $_POST["Arreglo"][$value] = "0";
        }
    }

    $arreglo_id = $_POST['arreglo_id'];
    foreach ($_POST["Arreglo"] as $key => $value) {
        $Campos .= "{$key} = '{$value}',";
    }
    $Campos = trim($Campos, ',');
    $entidad_id = $_POST['entidad_id'];

    $queryList = mysqli_query($conn3, "UPDATE {$Nombre_Tabla} SET {$Campos} WHERE id = '{$arreglo_id}' limit 1;");

    $ruta = htmlentities($_SERVER['PHP_SELF']);
    $ruta = str_replace('.php', '', $ruta);
    if ($queryList != true) {
        echo "<script language='Javascript'> window.location='{$ruta}?entidad_id={$entidad_id}&error=Hubo Un Error Al Actualizar El Convenio'</script>";
    } else {
        echo "<script language='Javascript'> window.location='{$ruta}?entidad_id={$entidad_id}&msg=Se Actualizo El Convenio Correctamente'</script>";
    }
}
///////////////////////////////////////////////////////////////////////////
if ($_GET['Eliminar'] <> "") {
    $id = $_GET['Eliminar'];
    $entidad_id = $_GET['entidad_id'];
    $queryList = mysqli_query($conn3, "UPDATE {$Nombre_Tabla} SET Activo='0' WHERE id ='{$id}' limit 1");

    $ruta = htmlentities($_SERVER['PHP_SELF']);
    $ruta = str_replace('.php', '', $ruta);
    if ($queryList != true) {
        echo "<script language='Javascript'> window.location='{$ruta}?entidad_id={$entidad_id}&error=Hubo Un Error Al Eliminar El Convenio'</script>";
    } else {
        echo "<script language='Javascript'> window.location='{$ruta}?entidad_id={$entidad_id}&msg=Se Elimino el Convenio Correctamente'</script>";
    }
}
///////////////////////////////////////////////////////////////////////////
if (isset($_GET['Editar'])) {
    $VisualizacionCampo="display:none;";

    $id = $_GET['Editar'];
    $queryList = mysqli_query($conn3, "SELECT * FROM  {$Nombre_Tabla} where id=$id limit 1");
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
    for (index in Arreglo) {
        if (document.getElementsByName("Arreglo[" + index + "]")[0] != undefined) {

            if ((document.getElementsByName("Arreglo[" + index + "]")[0].tagName == "INPUT" || document
                    .getElementsByName("Arreglo[" + index + "]")[0].tagName == "TEXTAREA") && document
                .getElementsByName("Arreglo[" + index + "]")[0].type != "checkbox") {
                document.getElementsByName("Arreglo[" + index + "]")[0].value = Arreglo[index];
            } else {

                var name = document.getElementsByName("Arreglo[" + index + "]")[0].name;
                var classe = document.getElementsByName("Arreglo[" + index + "]")[0].className;
                //console.log(Arreglo[index]+" // "+index+ " @@ "+ name);
                if (classe.indexOf("select2") > -1) {
                    $("select[name='" + name + "'] > option[value='" + Arreglo[index] + "']").attr("selected",
                        true);
                    $("select[name='" + name + "']").select2();
                    //console.log("entroo "+Arreglo[index]+" // "+index+ " @@ "+ name);
                } else {
                    $("select[name='" + name + "']").val(Arreglo[index]);
                    //console.log("No entro"+Arreglo[index]+" // "+index+ " @@ "+ name);
                }

            }

            if (document.getElementsByName("Arreglo[" + index + "]")[0].tagName == "INPUT" && document
                .getElementsByName("Arreglo[" + index + "]")[0].type == "checkbox") {
                console.log(Arreglo[index]);
                if (Arreglo[index] == "1" || Arreglo[index] == "Si") {
                    document.getElementsByName("Arreglo[" + index + "]")[0].checked = true;
                } else {
                    document.getElementsByName("Arreglo[" + index + "]")[0].checked = false;
                }
            }


        }
    }
    TipoContrato();
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

$usuario_id = $_SESSION['ID'];

$entidad_id = $_GET['entidad_id'];

function ConsultarOpcionesSelect($Query){

    include 'funciones/conn3.php';

    $text = "";
    $query = mysqli_query($conn3, $Query);
    while ($row = mysqli_fetch_array($query)) {
        $text .= "<option value='{$row['id']}'>{$row['Nombre']}</option>";
    }
    return  $text;
}
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


<!-- Se Cambia de Paquetes a Categoria -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> Registro de Convenios </a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="content">
                <h4 class="Titulo_Pagina"> <a href='<?php echo "{$Base}Rips_Entidades.php"; ?>'> <i
                            class="fa-solid fa-right-from-bracket fa-rotate-180"></i></a>&nbsp;&nbsp;Registro de
                    Convenios </h4>
                <div class="box">
                    <div class="box-body">

                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading"
                                    style="color: black!important;background-color: #9bc2da!important;border-color: #01cd36!important;border-radius: 15px;">
                                    <h4 class="panel-title" style="text-align: center;">
                                        <a data-toggle="collapse" href="#collapse1"
                                            style="display: block;padding: 20px;color: white;"><?php if ($_GET["Editar"]) {echo "Editar";}else{echo "Registrar";} ?>
                                            Convenio </a>
                                    </h4>
                                </div>
                                <div id="collapse1"
                                    class="panel-collapse collapse <?php if ($_GET["Editar"]) {echo "in show";} ?>">
                                    <div class="panel-body">


                                        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST"
                                            class="row">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label>Nombre del Convenio</label>
                                                    <input type="text" class="form-control input-lg"
                                                        name="Arreglo[Nombre]" placeholder="Nombre del Convenio"
                                                        value="" maxlength="120"
                                                        oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                        required>
                                                </div>


                                                <div class="col-md-12" style="<?=$VisualizacionCampo;?>">
                                                    <label align="left"> Tipo Contrato </label>
                                                    <select id="Tipo_Contrato" name="Arreglo[Tipo_Contrato]"
                                                        class="form-control input-lg" style="width: 100%;"
                                                        onchange="TipoContrato()" required>
                                                        <option value="" selected="selected">Seleccione</option>
                                                        <option value="1">Contrato Por Capitacion</option>
                                                        <option value="2">Contrato Por Paquete</option>

                                                        <option value="4">Contrato Por Lote</option>
                                                    </select>

                                                </div>


                                                <div class="form-group col-md-12" id="Div_Contrato_Capitacion"
                                                    style="display:none;">
                                                    <div class="form-group col-md-12">
                                                        <div align="left"> Valor del Convenio </div>
                                                        <input type="number" class="form-control input-lg"
                                                            id="fe_valor_convenio" name="Arreglo[fe_valor_convenio]"
                                                            min="0.01" step="0.01">
                                                    </div>
                                                </div>

                                                <!--
                                            <div class="form-group col-md-12">
                                                <label>Numero Contrato</label>
                                                <input type="text" class="form-control input-lg" name="Arreglo[Numero_Contrato]" placeholder="123" value="" maxlength="50" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                                            </div>

                                            <div class="form-group col-md-12">
                                                <label>Fecha de Inicio</label>
                                                <input type="date" class="form-control input-lg" name="Arreglo[Fecha_Inicio]"  required>
                                            </div>

                                            <div class="form-group col-md-12">
                                                <label>Fecha de Caducidad</label>
                                                <input type="date" class="form-control input-lg" name="Arreglo[Fecha_Caducidad]"required>
                                            </div>
                                            -->


                                                <!--  <div class="form-group col-md-6">
                                <label>Codigo del Convenio</label>
                                <input type="text" class="form-control input-lg" name="Arreglo[Codigo]" placeholder="Codigo del Convenio" value="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                            </div>
                          
                            <div class="form-group col-md-4">
                                <label>Valor Sesion</label>
                                <input type="text" class="form-control input-lg" name="Arreglo[Valor]" placeholder="Valor del Convenio" value="" maxlength="11" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                            </div>
                            -->

                                                <!--
                            <div class="col-md-12">
                                    <label>Codigo</label>
                                    <input type="text" class="form-control input-lg" name="Arreglo[Codigo]" placeholder="Codigo" value="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                                </div>
                            -->

                                                <div class="form-group col-md-6">
                                                    <label>Categoría <a href="S_Select_Categoria" target="_blank"><i
                                                                class="fa fa-cog"></i> </a> </label>
                                                    <select class="form-control select2" style="width:100%;"
                                                        name="Arreglo[Categoria]" id="Lista_Categoria">
                                                        <option value="" selected>Seleccione</option>

                                                        <?php
                                    echo ConsultarOpcionesSelect("SELECT * FROM CON_Categoria WHERE Activo = 1 and ID_principal='{$_SESSION['ID_principal']}'");
                                    ?>

                                                    </select>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Lista</label>
                                                    <input type="number" class="form-control input-lg"
                                                        name="Arreglo[Lista]" placeholder="0" value="0">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Sucursal </label>
                                                    <select class="form-control select2" style="width:100%"
                                                        name="Arreglo[Sucursal]">
                                                        <option value="" selected>Seleccione</option>
                                                        <?php
                                    
                                    $queryList = mysqli_query($conn3, "SELECT * FROM sucursales where 1=1 and ID_principal='{$_SESSION['ID_principal']}'");
                                    while($row_recordset32A=mysqli_fetch_array($queryList))
                                      {
                                          $id= $row_recordset32A['id'];
                                          $descripcion= $row_recordset32A['descripcion'];
                                         
                                          echo "<option value='$id'> $descripcion </option>";
                                    }

                                    ?>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Centro de Costo </label>
                                                    <select class="form-control select2" style="width:100%"
                                                        name="Arreglo[Centro_Costo]">
                                                        <option value="" selected>Seleccione</option>
                                                        <?php
                                    
                                    $queryList = mysqli_query($conn3, "SELECT * FROM CcentroCostos WHERE estado = 1 and ID_principal='{$_SESSION['ID_principal']}'");
                                    while($row_recordset32A=mysqli_fetch_array($queryList))
                                      {
                                          $id= $row_recordset32A['id'];
                                          $descripcion= $row_recordset32A['descripcion'];
                                         
                                          echo "<option value='$id'> $descripcion </option>";
                                    }

                                    ?>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>% Retención</label>
                                                    <input type="number" class="form-control input-lg"
                                                        name="Arreglo[Porcentaje_Retencion]" placeholder="0" value="0">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Cuenta Retención </label>
                                                    <select class="form-control select2" style="width:100%;"
                                                        name="Arreglo[Cuenta_Retencion]">
                                                        <option value="" selected>Seleccione</option>

                                                        <?php
                                    $queryList = mysqli_query($conn3, "SELECT * FROM CCuentas WHERE activo = 1 and ID_principal='{$_SESSION['ID_principal']}' order by id ASC");
                                    $nrowl = mysqli_num_rows($queryList);
                                                    while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                                        $idC = $row_recordset32['id'];
                                        $descripcionC = utf8_encode($row_recordset32['descripcion']);
                                        echo "<option value='$idC'>$idC | $descripcionC  </option>";
                                    }
                                     ?>

                                                    </select>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Base</label>
                                                    <input type="number" class="form-control input-lg"
                                                        name="Arreglo[Base]" placeholder="0" value="0">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>No Liq. DS-MA UVR</label>
                                                    <input type="checkbox" class="form-control input-lg"
                                                        name="Arreglo[No_Liq_Ds_Ma_Uvr]" value="1" style="width: 38px;">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Modalidad de Contratación <a
                                                            href="S_Select_ModalidadContratacion" target="_blank"><i
                                                                class="fa fa-cog"></i> </a> </label>
                                                    <select class="form-control select2" style="width:100%;"
                                                        name="Arreglo[Modalidad_Contratacion]"
                                                        id="Lista_Modalidad_Contratacion">
                                                        <option value="" selected>Seleccione</option>

                                                        <?php
                                    echo ConsultarOpcionesSelect("SELECT * FROM CON_ModalidadContratacion WHERE Activo = 1 and ID_principal='{$_SESSION['ID_principal']}'");
                                    ?>

                                                    </select>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Cobertura de Plan <a href="S_Select_CoberturaPlan"
                                                            target="_blank"><i class="fa fa-cog"></i> </a> </label>
                                                    <select class="form-control select2" style="width:100%;"
                                                        name="Arreglo[Cobertura_Plan]" id="Lista_Cobertura_Plan">
                                                        <option value="" selected>Seleccione</option>

                                                        <?php
                                    echo ConsultarOpcionesSelect("SELECT * FROM CON_CoberturaPlan WHERE Activo = 1 and ID_principal='{$_SESSION['ID_principal']}'");
                                    ?>

                                                    </select>
                                                </div>


                                                <div class="form-group col-md-12">
                                                    <br>
                                                </div>

                                                <div class="form-group col-md-12">
                                                    <hr>
                                                </div>

                                                <div class="form-group col-md-12">
                                                    <br>
                                                </div>


                                                <input type="hidden" name="usuario_id"
                                                    value="<?php echo $usuario_id; ?>">
                                                <input type="hidden" name="entidad_id"
                                                    value="<?php echo $entidad_id; ?>">

                                                    <input type="hidden" name="Arreglo[ID_principal]" value="<?=$_SESSION['ID_principal']?>">

                                                <?php if ($_GET['Editar'] <> "") : ?>
                                                <div class="col-sm-12">
                                                    <input type="hidden" name="arreglo_id"
                                                        value="<?php echo $_GET['Editar'] ?>">
                                                    <center><button type="submit"
                                                            class="btn btn-block btn-outline-info btn-lg rounded-pill shadow"
                                                            name="Actualizar_Informacion_Pagina">
                                                            <h2> <strong> A c t u a l i z a r </strong> </h2>
                                                        </button></center>
                                                </div>
                                                <?php else : ?>
                                                <div class="col-sm-12">
                                                    <center><button type="submit"
                                                            class="btn btn-block btn-outline-info btn-lg rounded-pill shadow"
                                                            name="Guardar_Informacion_Pagina">
                                                            <h2> <strong> G u a r d a r </strong> </h2>
                                                        </button></center>
                                                </div>
                                                <?php endif; ?>

                                                <div class="form-group col-md-12">
                                                    <br>
                                                </div>

                                        </form>

                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-body">
                                    <div class="col-md-12">
                                        <h2 style="text-align: center;font-weight: bold;"> Convenios </h2>

                                        <div class="col-md-12" style="text-align: center;">
                                            <font class="text-dark"> <i class="fa fa-pencil" style="color:#17a2b8">
                                                    Editar</i> </font>
                                            <font class="text-dark"> <i class="fa fa-close" style="color:#dc3545">
                                                    Eliminar</i> </font>
                                            <font class="text-dark"> <i class="fa fa-plus" style="color:#6c757d">
                                                    Agregar Tarifa</i> </font>
                                        </div>

                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Nombre del Convenio</th>
                                                    <th scope="col">Contrato</th>
                                                    <th scope="col">Valor</th>
                                                    <th scope="col">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                $queryList = mysqli_query($conn3, "SELECT * FROM  {$Nombre_Tabla} WHERE Activo='1' AND entidad_id='{$entidad_id}' and ID_principal='{$_SESSION['ID_principal']}' ");
                                                while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                                    //$contador++;
                                                    $id = $rowMotorizado['id'];
                                                    $Nombre = $rowMotorizado['Nombre'];
                                                    $Tipo_Contrato = $rowMotorizado['Tipo_Contrato'];
                                                    $Codigo="";
                                                    if($Tipo_Contrato=="1"){
                                                        $Codigo = "Capitacion";
                                                    }
                                                    if($Tipo_Contrato=="2"){
                                                        $Codigo = "Paquete";
                                                    }
                                                    if($Tipo_Contrato=="4"){
                                                        $Codigo = "Lote";
                                                    }
                                                    $fe_valor_convenio = $rowMotorizado['fe_valor_convenio'];



                                                    $ruta = htmlentities($_SERVER['PHP_SELF']);
                                                    echo "<tr ><th scope='row' width='2%'>{$id}</th>
                                                    <td width='20%' align='center'>{$Nombre}</td>
                                                    <td width='20%' align='center'>{$Codigo}</td>
                                                     <td width='20%' align='center'>{$fe_valor_convenio}</td>

                                                    ";

                                                    echo "<td width='20%' align='center'><font color='#04CC05'> <a href='{$ruta}?Editar={$id}&entidad_id={$entidad_id}'  class='btn btn-outline-info btn-lg rounded-pill shadow' style='width: 50px;'><i class='fa fa-pencil' title='Editar'> </i></a></font>
                                                    <font> <a href='{$ruta}?Eliminar={$id}&entidad_id={$entidad_id}' class='btn btn-outline-danger btn-lg rounded-pill shadow' style='width: 50px;'> <i class='fa fa-close' title='Eliminar'> </i></a></font>
                                                    <font> <a href='Rips_Tarifas?convenio_id={$id}' class='btn btn-outline-secondary btn-lg rounded-pill shadow' style='width: 50px;'> <i class='fa fa-plus' title='Agregar Tarifas'> </i></a></font><br
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

<script>
function TipoContrato() {
    var valor = $("#Tipo_Contrato").val();
    if (valor == "1") {
        document.getElementById("Div_Contrato_Capitacion").style.display = "block";
        document.getElementById("fe_valor_convenio").required = true;
    } else {
        document.getElementById("Div_Contrato_Capitacion").style.display = "none";
        document.getElementById("fe_valor_convenio").value = "";
        document.getElementById("fe_valor_convenio").required = false;

    }

}
</script>