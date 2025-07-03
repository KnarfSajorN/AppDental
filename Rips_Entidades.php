<?php try {
    include 'header.php';
    include 'menu.php';

    // start try catch
    $_POST = DatosIngresarMysqli($_POST);
    $Nombre_Tabla = "Rips_Entidades";
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
        $Examenes = $_POST['Examenes'];

        $queryList = mysqli_query($conn3, "INSERT INTO {$Nombre_Tabla} (usuario_id,{$Campos}) VALUES ('$usuario_id',{$Valores});");

        $ruta = htmlentities($_SERVER['PHP_SELF']);
        $ruta = str_replace('.php', '', $ruta);
        if ($queryList != true) {
            echo "<script language='Javascript'> window.location='{$ruta}?error=Hubo Un Error Al Guardar La Entidad'</script>";
        } else {
            echo "<script language='Javascript'> window.location='{$ruta}?msg=Se Guardo La Entidad Correctamente'</script>";
        }
    }

    ///////////////////////////////////////////////////////////////////////////

    if (isset($_POST['Actualizar_Informacion_Pagina'])) {
        $arreglo_id = $_POST['arreglo_id'];

        $Arreglo = ["Mod_Precio_Adm", "Verificar_Saldo_CTO", "Particular", "Retener", "Retenedor_Iva", "Autoriza"];
        foreach ($Arreglo as $key => $value) {
            if ($_POST["Arreglo"][$value] == "") {
                $_POST["Arreglo"][$value] = "0";
            }
        }

        foreach ($_POST["Arreglo"] as $key => $value) {
            $Campos .= "{$key} = '{$value}',";
        }
        $Campos = trim($Campos, ',');

        $queryList = mysqli_query($conn3, "UPDATE {$Nombre_Tabla} SET {$Campos} WHERE id = '{$arreglo_id}' limit 1;");

        $ruta = htmlentities($_SERVER['PHP_SELF']);
        $ruta = str_replace('.php', '', $ruta);
        if ($queryList != true) {
            echo "<script language='Javascript'> window.location='{$ruta}?error=Hubo Un Error Al Actualizar Los Datos'</script>";
        } else {
            echo "<script language='Javascript'> window.location='{$ruta}?msg=Se Actualizo La Entidad Correctamente'</script>";
        }
    }
    ///////////////////////////////////////////////////////////////////////////
    if ($_GET['Eliminar'] <> "") {
        $id = $_GET['Eliminar'];
        $queryList = mysqli_query($conn3, "UPDATE {$Nombre_Tabla} SET Activo='0' WHERE id ='{$id}' limit 1");

        $ruta = htmlentities($_SERVER['PHP_SELF']);
        $ruta = str_replace('.php', '', $ruta);
        if ($queryList != true) {
            echo "<script language='Javascript'> window.location='{$ruta}?error=Hubo Un Error Al Eliminar La Entidad'</script>";
        } else {
            echo "<script language='Javascript'> window.location='{$ruta}?msg=Se Elimino La Entidad Correctamente'</script>";
        }
    }
    ///////////////////////////////////////////////////////////////////////////
    if (isset($_GET['Editar'])) {
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
            window.onload = function () {
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




    function ConsultarOpcionesSelect($Query)
    {
        include 'funciones/conn3.php';

        $text = "";

        $query = mysqli_query($conn3, $Query);

        if ($query) {
            while ($row = mysqli_fetch_assoc($query)) {
                $id = $row['id'] ?? "Error";
                $Nombre = $row['Nombre'] ?? "Error";
                $text .= "<option value='{$id}'>{$Nombre}</option>";
            }
        }

        return $text;
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

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper p-3">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <ol class="breadcrumb">
                <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
                <li><a href="#"> Registro de Entidades </a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="">
                <div class="content">
                    <h4 class="Titulo_Pagina">Registro de Entidades </h4>
                    <div class="box">
                        <div class="box-body">

                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading"
                                        style="color: black!important;background-color: #9bc2da!important;border-color: #01cd36!important;border-radius: 15px;">
                                        <h4 class="panel-title" style="text-align: center;">
                                            <a data-toggle="collapse" href="#collapse1"
                                                style="display: block;padding: 20px;color: white;"><?php if ($_GET["Editar"]) {
                                                    echo "Editar";
                                                } else {
                                                    echo "Registrar";
                                                } ?>
                                                Entidad </a>
                                        </h4>
                                    </div>
                                    <div id="collapse1" class="panel-collapse collapse <?php if ($_GET["Editar"]) {
                                        echo "in show";
                                    } ?>">
                                        <div class="panel-body">


                                            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST"
                                                class="row">
                                                <div class="form-group col-md-12">
                                                    <label>Nombre de la Entidad</label>
                                                    <input type="text" class="form-control input-lg" name="Arreglo[Nombre]"
                                                        placeholder="Nombre de la Entidad" value="" maxlength="120"
                                                        oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                        required>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>NIT</label>
                                                    <input type="number" class="form-control input-lg" name="Arreglo[NIT]"
                                                        placeholder="NIT" maxlength="9">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>DV</label>
                                                    <input type="number" class="form-control input-lg" name="Arreglo[DV]"
                                                        placeholder="DV" maxlength="1">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Email</label>
                                                    <input type="email" class="form-control input-lg" name="Arreglo[Email]"
                                                        placeholder="Correo Electrónico">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Email FE</label>
                                                    <input type="email" class="form-control input-lg"
                                                        name="Arreglo[Email_FE]" placeholder="Correo Electrónico FE">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Dirección</label>
                                                    <input type="text" class="form-control input-lg"
                                                        name="Arreglo[Direccion]" placeholder="Direccion">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Barrio</label>
                                                    <input type="text" class="form-control input-lg" name="Arreglo[Barrio]"
                                                        placeholder="Barrio">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Teléfono</label>
                                                    <input type="number" class="form-control input-lg"
                                                        name="Arreglo[Telefono]" placeholder="Teléfono">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Celular</label>
                                                    <input type="number" class="form-control input-lg"
                                                        name="Arreglo[Celular]" placeholder="Celular">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Actividad Económica <a href="S_Select_AE" target="_blank"><i
                                                                class="fa fa-cog"></i> </a> </label>
                                                    <select class="form-control select2" style="width:100%;"
                                                        name="Arreglo[Actividad_Economica]" id="Lista_Actividad_Economica">
                                                        <option value="" selected>Seleccione</option>

                                                        <?php
                                                        echo ConsultarOpcionesSelect("SELECT * FROM EN_ActividadEconomica WHERE Activo = 1 and ID_principal='{$_SESSION['ID_principal']}'");
                                                        ?>

                                                    </select>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Ciudad</label>
                                                    <input type="text" class="form-control input-lg" name="Arreglo[Ciudad]"
                                                        placeholder="Ciudad">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Vendedor <a href="S_Select_Vendedor" target="_blank"><i
                                                                class="fa fa-cog"></i> </a> </label>
                                                    <select class="form-control select2" style="width:100%;"
                                                        name="Arreglo[Vendedor]" id="Lista_Vendedor">
                                                        <option value="" selected>Seleccione</option>

                                                        <?php
                                                        echo ConsultarOpcionesSelect("SELECT * FROM EN_Vendedor WHERE Activo = 1 and ID_principal='{$_SESSION['ID_principal']}'");
                                                        ?>

                                                    </select>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Tipo Cliente <a href="S_Select_TipoCliente" target="_blank"><i
                                                                class="fa fa-cog"></i> </a> </label>
                                                    <select class="form-control select2" style="width:100%;"
                                                        name="Arreglo[Tipo_Cliente]" id="Lista_Tipo_Cliente">
                                                        <option value="" selected>Seleccione</option>

                                                        <?php
                                                        echo ConsultarOpcionesSelect("SELECT * FROM EN_TipoCliente WHERE Activo = 1 and ID_principal='{$_SESSION['ID_principal']}'");
                                                        ?>

                                                    </select>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Rips <a href="S_Select_Rips" target="_blank"><i
                                                                class="fa fa-cog"></i> </a> </label>
                                                    <select class="form-control select2" style="width:100%;"
                                                        name="Arreglo[Rips]" id="Lista_Rips">
                                                        <option value="" selected>Seleccione</option>

                                                        <?php
                                                        echo ConsultarOpcionesSelect("SELECT * FROM EN_Rips WHERE Activo = 1 and ID_principal='{$_SESSION['ID_principal']}'");
                                                        ?>

                                                    </select>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Régimen de Salud <a href="S_Select_RegimenSalud"
                                                            target="_blank"><i class="fa fa-cog"></i> </a> </label>
                                                    <select class="form-control select2" style="width:100%;"
                                                        name="Arreglo[Regimen_Salud]" id="Lista_Regimen_Salud">
                                                        <option value="" selected>Seleccione</option>

                                                        <?php
                                                        echo ConsultarOpcionesSelect("SELECT * FROM EN_RegimenSalud WHERE Activo = 1 and ID_principal='{$_SESSION['ID_principal']}'");
                                                        ?>

                                                    </select>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Tipo Persona </label>
                                                    <select class="form-control" name="Arreglo[Tipo_Persona]">
                                                        <option value="" selected>Seleccione</option>
                                                        <option value="1">Persona Natural</option>
                                                        <option value="2">Persona Juridica</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Régimen <a href="S_Select_Regimen" target="_blank"><i
                                                                class="fa fa-cog"></i> </a> </label>
                                                    <select class="form-control select2" style="width:100%;"
                                                        name="Arreglo[Regimen]" id="Lista_Regimen">
                                                        <option value="" selected>Seleccione</option>

                                                        <?php
                                                        echo ConsultarOpcionesSelect("SELECT * FROM EN_Regimen WHERE Activo = 1 and ID_principal='{$_SESSION['ID_principal']}'");
                                                        ?>

                                                    </select>
                                                </div>


                                                <div class="form-group col-md-6">
                                                    <label>Cuenta Cartera </label>
                                                    <select class="form-control select2" style="width:100%;"
                                                        name="Arreglo[Cuenta_Cartera]">
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
                                                    <label>Cuenta Radicación Factura </label>
                                                    <select class="form-control select2" style="width:100%;"
                                                        name="Arreglo[Cuenta_Radicacion_Factura]">
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
                                                    <label>% Convenio UVRS</label>
                                                    <input type="number" class="form-control input-lg"
                                                        name="Arreglo[Porcentaje_Convenio_UVRS]" placeholder="0" value="0">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Lista Precios</label>
                                                    <input type="number" class="form-control input-lg"
                                                        name="Arreglo[Lista_Precios]" placeholder="0" value="0">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Mod Precio Adm</label>
                                                    <input type="checkbox" class="form-control input-lg"
                                                        name="Arreglo[Mod_Precio_Adm]" value="1" style="width: 38px;">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Plazos</label>
                                                    <input type="number" class="form-control input-lg"
                                                        name="Arreglo[Plazos]" placeholder="0" value="0">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Verificar Saldo CTO</label>
                                                    <input type="checkbox" class="form-control input-lg"
                                                        name="Arreglo[Verificar_Saldo_CTO]" value="1" style="width: 38px;">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Orden Factura</label>
                                                    <input type="number" class="form-control input-lg"
                                                        name="Arreglo[Orden_Facturra]" placeholder="0" value="0">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Particular</label>
                                                    <input type="checkbox" class="form-control input-lg"
                                                        name="Arreglo[Particular]" value="1" style="width: 38px;">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>% Liquidación</label>
                                                    <input type="number" class="form-control input-lg"
                                                        name="Arreglo[Porcentaje_Liquidacion]" placeholder="0" value="0">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>% Retención</label>
                                                    <input type="number" class="form-control input-lg"
                                                        name="Arreglo[Porcentaje_Retencion]" placeholder="0" value="0">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Cuenta Retención </label>
                                                    <select class="form-control select2" style="width:100%;"
                                                        name="Arreglo[Cuenta_Retencion_1]">
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
                                                    <label>Cuenta Retención </label>
                                                    <select class="form-control select2" style="width:100%;"
                                                        name="Arreglo[Cuenta_Retencion_2]">
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
                                                    <label>Retener</label>
                                                    <input type="checkbox" class="form-control input-lg"
                                                        name="Arreglo[Retener]" value="1" style="width: 38px;">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>% Cree</label>
                                                    <input type="number" class="form-control input-lg"
                                                        name="Arreglo[Porcentaje_Cree]" placeholder="0" value="0">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Cuenta Cree </label>
                                                    <select class="form-control select2" style="width:100%;"
                                                        name="Arreglo[Cuenta_Cree]">
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
                                                    <label>Cuenta Glosa Proceso </label>
                                                    <select class="form-control select2" style="width:100%;"
                                                        name="Arreglo[Cuenta_Glosa_Proceso]">
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
                                                    <label>Cuenta Glosa Conciliada </label>
                                                    <select class="form-control select2" style="width:100%;"
                                                        name="Arreglo[Cuenta_Glosa_Conciliada]">
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
                                                    <label>Retenedor Iva</label>
                                                    <input type="checkbox" class="form-control input-lg"
                                                        name="Arreglo[Retenedor_Iva]" value="1" style="width: 38px;">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Concepto ICA <a href="S_Select_ConceptoICA" target="_blank"><i
                                                                class="fa fa-cog"></i> </a> </label>
                                                    <select class="form-control select2" style="width:100%;"
                                                        name="Arreglo[Concepto_ICA]" id="Lista_Concepto_ICA">
                                                        <option value="" selected>Seleccione</option>

                                                        <?php
                                                        echo ConsultarOpcionesSelect("SELECT * FROM EN_ConceptoICA WHERE Activo = 1 and ID_principal='{$_SESSION['ID_principal']}'");
                                                        ?>

                                                    </select>
                                                </div>


                                                <div class="form-group col-md-6">
                                                    <label>Responsabilidad Fiscal <a href="S_Select_ResponsabilidadFiscal"
                                                            target="_blank"><i class="fa fa-cog"></i> </a> </label>
                                                    <select class="form-control select2" style="width:100%;"
                                                        name="Arreglo[Responsabilidad_Fiscal]"
                                                        id="Lista_Responsabilidad_Fiscal">
                                                        <option value="" selected>Seleccione</option>

                                                        <?php
                                                        echo ConsultarOpcionesSelect("SELECT * FROM EN_ResponsabilidadFiscal WHERE Activo = 1 and ID_principal='{$_SESSION['ID_principal']}'");
                                                        ?>

                                                    </select>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Tributo <a href="S_Select_Tributo" target="_blank"><i
                                                                class="fa fa-cog"></i> </a> </label>
                                                    <select class="form-control select2" style="width:100%;"
                                                        name="Arreglo[Tributo]" id="Lista_Tributo">
                                                        <option value="" selected>Seleccione</option>

                                                        <?php
                                                        echo ConsultarOpcionesSelect("SELECT * FROM EN_Tributo WHERE Activo = 1 and ID_principal='{$_SESSION['ID_principal']}'");
                                                        ?>

                                                    </select>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Citologia</label>
                                                    <input type="number" class="form-control input-lg"
                                                        name="Arreglo[Citologia]" placeholder="0" value="0">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Biopsia</label>
                                                    <input type="number" class="form-control input-lg"
                                                        name="Arreglo[Biopsia]" placeholder="0" value="0">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Autoriza</label>
                                                    <input type="checkbox" class="form-control input-lg"
                                                        name="Arreglo[Autoriza]" value="1" style="width: 38px;">
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

                                                <input type="hidden" name="usuario_id" value="<?php echo $usuario_id; ?>">

                                                <input type="hidden" name="Arreglo[ID_principal]" value="<?=$_SESSION['ID_principal']?>">

                                                <?php if ($_GET['Editar'] <> ""): ?>
                                                    <div class="col-sm-12">
                                                        <input type="hidden" name="arreglo_id"
                                                            value="<?php echo $_GET['Editar'] ?>">
                                                        <center><button type="submit"
                                                                class="btn btn-block btn-outline-info rounded-pill shadow"
                                                                name="Actualizar_Informacion_Pagina">
                                                                <h2> <strong> A c t u a l i z a r </strong> </h2>
                                                            </button></center>
                                                    </div>
                                                <?php else: ?>
                                                    <div class="col-sm-12">
                                                        <center><button type="submit"
                                                                class="btn btn-block btn-outline-info rounded-pill shadow"
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
                                            <h2 style="text-align: center;font-weight: bold;"> Entidades </h2>
                                            <div class="col-md-12" style="text-align: center;">
                                                <font class="text-dark"> <i class="fa fa-pencil" style="color:#17a2b8">
                                                        Editar</i> </font>
                                                <font class="text-dark"> <i class="fa fa-close" style="color:#dc3545">
                                                        Eliminar</i> </font>
                                                <font class="text-dark"> <i class="fa fa-plus" style="color:#28a745">
                                                        Agregar Convenio</i> </font>
                                            </div>

                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Nombre de la entidad</th>
                                                        <th scope="col">Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php

                                                    $queryList = mysqli_query($conn3, "SELECT * FROM  {$Nombre_Tabla} WHERE Activo='1' and ID_principal='{$_SESSION['ID_principal']}' ORDER BY Nombre ASC");

                                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                                        //$contador++;
                                                        $id = $rowMotorizado['id'];
                                                        $Nombre = $rowMotorizado['Nombre'];

                                                        $ruta = htmlentities($_SERVER['PHP_SELF']);
                                                        $ruta = str_replace('.php', '', $ruta);
                                                        echo "<tr><th scope='row' width='2%'>{$id}</th>
                                                    <td width='20%' align='center'>{$Nombre}</td>";

                                                        echo "<td width='20%' align='center'><font color='#04CC05'> <a href='{$ruta}?Editar={$id}' class='btn btn-outline-info btn-lg rounded-pill shadow' style='width: 50px;'><i class='fa fa-pencil' title='Editar'> </i></a></font>
                                                    <font> <a href='{$ruta}?Eliminar={$id}' class='btn btn-outline-danger btn-lg rounded-pill shadow' style='width: 50px;'> <i class='fa fa-close' title='Eliminar'> </i></a></font>
                                                    <font> <a href='Rips_Convenios?entidad_id={$id}' class='btn btn-outline-success btn-lg rounded-pill shadow' style='width: 50px;'> <i class='fa fa-plus' title='Agregar Convenios'> </i></a></font><br>
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
        function CargarSelectEntidades(Tipo) {

            $.ajax({
                type: "POST",
                url: "Rips_AjaxSelect.php",
                data: {
                    Tipo_Consulta: Tipo,
                },
                success: function (response) {
                    var Arreglo = JSON.parse(response);

                    if (Tipo == 1) {
                        $("#Lista_Actividad_Economica").html(Arreglo.Datos);
                    }
                }
            });

        }
    </script>
<?php } catch (Exception | Error $th) {
    echo "Error: {$th->getMessage()} -> FIle: {$th->getFile()} -> Line: {$th->getLine()}";
}