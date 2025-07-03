<?php
include 'header.php';
include 'menu.php';

$_POST = DatosIngresarMysqli($_POST);
$Nombre_Tabla = "Rips_Tarifa";
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
        `convenio_id` int(11) NOT NULL,
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

    $usuario_id = $_POST['usuario_id'];
    $convenio_id = $_POST['convenio_id'];

    foreach ($_POST["Arreglo"] as $key => $value) {
        $Campos .= $key . ',';
        $Valores .= "'{$value}',";
    }
    $Campos = trim($Campos, ',');
    $Valores = trim($Valores, ',');

    $queryList = mysqli_query($conn3, "INSERT INTO {$Nombre_Tabla} (usuario_id,convenio_id,{$Campos}) VALUES ('$usuario_id','$convenio_id',{$Valores});");

    $ruta = htmlentities($_SERVER['PHP_SELF']);
    $ruta = str_replace('.php', '', $ruta);
    if ($queryList != true) {
        echo "<script language='Javascript'> window.location='{$ruta}?convenio_id={$convenio_id}&error=Hubo Un Error Al Guardar La Tarifa {$MensajeError}'</script>";
    } else {
        echo "<script language='Javascript'> window.location='{$ruta}?convenio_id={$convenio_id}&msg=Se Guardo La Tarifa Correctamente {$MensajeError}'</script>";
    }
}

///////////////////////////////////////////////////////////////////////////

if (isset($_POST['Actualizar_Informacion_Pagina'])) {
    $arreglo_id = $_POST['arreglo_id'];

    $convenio_id = $_POST['convenio_id'];

    foreach ($_POST["Arreglo"] as $key => $value) {
        $Campos .= "{$key} = '{$value}',";
    }
    $Campos = trim($Campos, ',');
    $convenio_id = $_POST['convenio_id'];

    $queryList = mysqli_query($conn3, "UPDATE {$Nombre_Tabla} SET {$Campos} WHERE id = '{$arreglo_id}' limit 1;");

    $ruta = htmlentities($_SERVER['PHP_SELF']);
    $ruta = str_replace('.php', '', $ruta);
    if ($queryList != true) {
        echo "<script language='Javascript'> window.location='{$ruta}?convenio_id={$convenio_id}&error=Hubo Un Error Al Guardar La Tarifa {$MensajeError}'</script>";
    } else {
        echo "<script language='Javascript'> window.location='{$ruta}?convenio_id={$convenio_id}&msg=Se Guardo La Tarifa Correctamente {$MensajeError}'</script>";
    }
}
///////////////////////////////////////////////////////////////////////////

if(isset($_POST['Guardar_Tarifas_Multiples_Sencillas'])){
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
}

if ($_GET['Eliminar'] <> "") {
    $id = $_GET['Eliminar'];
    $convenio_id = $_GET['convenio_id'];
    $queryList = mysqli_query($conn3, "UPDATE {$Nombre_Tabla} SET Activo='0' WHERE id ='{$id}' limit 1");

    $ruta = htmlentities($_SERVER['PHP_SELF']);
    $ruta = str_replace('.php', '', $ruta);
    if ($queryList != true) {
        echo "<script language='Javascript'> window.location='{$ruta}?convenio_id={$convenio_id}&error=Hubo Un Error Al Eliminar El Convenio'</script>";
    } else {
        echo "<script language='Javascript'> window.location='{$ruta}?convenio_id={$convenio_id}&msg=Se Elimino el Convenio Correctamente'</script>";
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
        $Tipo_Producto = funcionMaster(funcionMaster($rowMotorizado['inventario_id'], 'ID', 'tipo', 'sinvetrios'),'id','tipo','scategoria');
        $Lote_Nombre = funcionMaster($rowMotorizado['SinvDep_id'], 'id', 'lote', 'SinvDep');
        $Valor = $rowMotorizado['Valor'];
    }
    $datos_json = json_encode($datos);
?>
    <script>
        window.onload = function() {
            var Arreglo = <?php echo $datos_json ?>;
            for (index in Arreglo) {
                if (document.getElementsByName("Arreglo[" + index + "]")[0] != undefined) {
                    document.getElementsByName("Arreglo[" + index + "]")[0].value = Arreglo[index];
                }
            }
            
            $("#inventario_id").select2();
            CargarPrecioProductoEditar();
            $("#Valor").val(<?=$Valor;?>);

            <?php
            if($Tipo_Producto == '5'){
            ?>
                $("#div_solo_lote").text('El Lote actual es: <?=$Lote_Nombre;?>');
            <?php
            }
            ?>


            $("#paquete_id").select2();
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

$convenio_id = $_GET['convenio_id'];


$TipoConvenio = funcionMaster($convenio_id, 'id', 'Tipo_Contrato','Rips_Convenio');
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
            <li><a href="#"> Registro de Tarifas </a></li>
        </ol>
    </section>


    <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading" style="color: black!important;background-color: #9bc2da!important;border-color: #01cd36!important;border-radius: 15px;">
                                    <h4 class="panel-title" style="text-align: center;">
                                        <a data-toggle="collapse" href="#collapse1" style="display: block;padding: 20px;color: white;">Registrar Multiples Tarifas </a>
                                    </h4>
                                </div>
                                <div id="collapse1" class="panel-collapse collapse">
                                    <div class="panel-body">


                                    <div class="box">
                                        <div class="box-body">
                                            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">

                                                <input type="text" id="searchInput" class="form-control input-lg" placeholder="Buscar por Nombre/Procedimiento">

                                                <div style="max-height: 400px; overflow-y: auto;">
                                                    <table id="myTable" class="table table-bordered table-striped" style="height: 400px;">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">Cargar</th>
                                                                <th scope="col">Valor</th>
                                                                <th scope="col">Copago</th>
                                                                <th scope="col">Nombre/Procedimiento</th>
                                                                <th scope="col">CUPS</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php

                                                            $queryList = mysqli_query($conn3, "SELECT * FROM  sinvetrios WHERE estado='1' ");
                                                            while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                                                //$contador++;
                                                                $ID = $rowMotorizado['ID'];
                                                                
                                                                $descripcion = $rowMotorizado['descripcion'];
                                                                $cups = funcionMaster($rowMotorizado['CUPS'], 'id', 'Nombre', 'Cups');
                                                                echo "<tr>";

                                                                echo "<td width='1%'><input type='checkbox' name='ProcedimientosAnexar[$ID][Estado]' class='checkProcedimiento_tabla' value='" . $ID . "'></td>";
                                                                echo "<td width='1%'><input type='number' name='ProcedimientosAnexar[$ID][Valor]' class='form-control input-lg' min='0' step='0.01' value='" . $rowMotorizado['precio'] . "'></td>";
                                                                echo "<td width='1%'><input type='number' name='ProcedimientosAnexar[$ID][Copago]' class='form-control input-lg' max='100' min='0' step='0.01' value='0'></td>";
                                                                echo "<td width='1%'>$descripcion</td>";
                                                                echo "<td width='1%'>$cups</td>";   

                                                                echo "</tr>";
                                                            }

                                                            ?>                            
                                                        </tbody>
                                                    </table>
                                                
                                                
                                                </div>
                                                
                                                <div class="col-sm-12">
                                                    <br>
                                                        <center><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" name="Guardar_Tarifas_Multiples_Sencillas">
                                                                <h2> <strong> G u a r d a r </strong> </h2>
                                                            </button></center>
                                                    </div>

                                            </form>
                                        </div>
                                    </div>




                                    </div>

                                </div>
                            </div>
                        </div>







    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="content">
                <h4 class="Titulo_Pagina"> <a href='<?php echo "{$Base}Rips_Entidades.php"; ?>'> <i class="fa-solid fa-right-from-bracket fa-rotate-180"></i></a>&nbsp;&nbsp;Registro de Tarifas </h4>
                <div class="box">
                    <div class="box-body">
                        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                            <div class="row">

                                <?php if($TipoConvenio=="1"): ?>

                                    <div class="form-group col-md-6">
                                        <label><strong> Depósito</strong></label>
                                        <select class="input-lg form-control" name="Arreglo[deposito_id]" id="deposito" onchange="ActualizacionDeposito()" required>
                                        <?php
                                        $queryListDP = mysqli_query($conn3, "SELECT * from dep WHERE activo = 1 ORDER BY id ASC");
                                        while ($rowMotorizadoDP = mysqli_fetch_array($queryListDP)) {
                                            $idDP = $rowMotorizadoDP['id'];
                                            $descripcionDP = $rowMotorizadoDP['descripcion'];

                                            if ($Deposito_id != "" and $Deposito_id == $idDP) {
                                            echo '<option value="' . $idDP . '" selected>' . $descripcionDP . '</option>';
                                            } else {
                                            echo '<option value="' . $idDP . '">' . $descripcionDP . '</option>';
                                            }
                                        }
                                        ?>
                                        </select>
                                    </div>

                                <div class="form-group col-md-6">
                                    <label>Producto</label>
                                    <select id="inventario_id" name="Arreglo[inventario_id]" class="form-control select2" style="width: 100%;" required="required" onChange="CargarPrecioProducto();">
                                        <option value="" selected="selected">Seleccione Producto</option>
                                        <?php

                                        $queryList = mysqli_query($conn3, "SELECT si.* FROM sinvetrios si
                                            JOIN scategoria sca ON si.tipo = sca.id
                                            WHERE 1=1
                                            AND si.estado = 1
                                            AND sca.tipo in (1,2,5)");
                                        while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                                        $descripcion     = $row_recordset32['descripcion'];
                                        $ID              = $row_recordset32['ID'];
                                        $precio = $row_recordset32['precio'];

                                        echo "<option value='$ID' data-valor='$precio'> $descripcion </option>";
                                        }

                                        ?>

                                    </select>
                                </div>
                                
                                <div align="left" class="col-md-12" id="div_solo_lote"></div>

                                <div id="Campo_Adicional_Producto" class="col-md-12">

                                </div>

                                <div align="left" class="col-md-12" id="informacion_existencia"></div>


                                <div class="form-group col-md-6">
                                    <label>Valor de la Tarifa</label>
                                    <input type="number" class="form-control input-lg" name="Arreglo[Valor]" id="Valor" placeholder="$$" value="0" min="0" step="0.01" maxlength="11" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required >
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Porcentaje Copago</label>
                                    <input type="number" class="form-control input-lg" name="Arreglo[Copago]" placeholder="%" value="0" min="0" max="100" step="0.01" maxlength="11" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                                </div>

                                <?php endif; ?>



                                <?php if($TipoConvenio=="2"): ?>

                                
                               
                                <div class="col-md-12" id="div_productos_paquete">
                                    
                                <div id="Paquete" class="row">

                                    <div class="form-group col-md-6">
                                        <label>Paquete Relacionado <a href="Rips_Paquetes?convenio_id=<?php echo $convenio_id; ?>"><i
                                            class="fa fa-cog"></i> </a> </label>
                                        <select class="form-control input-lg select2" name="Arreglo[paquete_id]" id="paquete_id" style="width:100%" required>
                                            <option value=""> Seleccione </option>
                                            <?php
                                                $QueryCategoria = mysqli_query($conn3, "SELECT * FROM Rips_Paquetes where Activo=1 AND convenio_id='{$convenio_id}'");
                                                while ($RowCategoria = mysqli_fetch_array($QueryCategoria)) {
                                                    $id = $RowCategoria['id'];
                                                    $Nombre = $RowCategoria['Nombre'];
                                                    echo "<option value='$id'> $Nombre </option>";
                                                }

                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label><strong> Depósito</strong></label>
                                        <select class="input-lg form-control" name="Arreglo[deposito_id]" id="deposito" onchange="ActualizacionDeposito()" required>
                                        <?php
                                        $queryListDP = mysqli_query($conn3, "SELECT * from dep WHERE activo = 1 ORDER BY id ASC");
                                        while ($rowMotorizadoDP = mysqli_fetch_array($queryListDP)) {
                                            $idDP = $rowMotorizadoDP['id'];
                                            $descripcionDP = $rowMotorizadoDP['descripcion'];

                                            if ($Deposito_id != "" and $Deposito_id == $idDP) {
                                            echo '<option value="' . $idDP . '" selected>' . $descripcionDP . '</option>';
                                            } else {
                                            echo '<option value="' . $idDP . '">' . $descripcionDP . '</option>';
                                            }
                                        }
                                        ?>
                                        </select>
                                    </div>

                                <div class="form-group col-md-6">
                                    <label>Producto</label>
                                    <select id="inventario_id" name="Arreglo[inventario_id]" class="form-control select2" style="width: 100%;" required="required" onChange="CargarPrecioProducto();">
                                        <option value="" selected="selected">Seleccione Producto</option>
                                        <?php

                                        $queryList = mysqli_query($conn3, "SELECT si.* FROM sinvetrios si
                                            JOIN scategoria sca ON si.tipo = sca.id
                                            WHERE 1=1
                                            AND si.estado = 1
                                            AND sca.tipo in (1,2,5)");
                                        while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                                        $descripcion     = $row_recordset32['descripcion'];
                                        $ID              = $row_recordset32['ID'];
                                        $precio = $row_recordset32['precio'];

                                        echo "<option value='$ID' data-valor='$precio'> $descripcion </option>";
                                        }

                                        ?>

                                    </select>
                                </div>
                                
                                <div align="left" class="col-md-12" id="div_solo_lote"></div>

                                <div id="Campo_Adicional_Producto" class="col-md-12">

                                </div>

                                <div align="left" class="col-md-12" id="informacion_existencia"></div>


                                        <div class="form-group col-md-6">
                                            <label>Valor de la Tarifa</label>
                                            <input type="number" class="form-control input-lg" name="Arreglo[Valor]" id="Valor" placeholder="$$" value="0" min="0" step="0.01" maxlength="11" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required >
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Porcentaje Copago</label>
                                            <input type="number" class="form-control input-lg" name="Arreglo[Copago]" placeholder="%" value="0" min="0" max="100" step="0.01" maxlength="11" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                                        </div>
                                    </div>


                                </div>

                                

                                <?php endif; ?>

                                
                                <?php if($TipoConvenio=="4"): ?>
                                
                                    <div class="form-group col-md-6">
                                        <label><strong> Depósito</strong></label>
                                        <select class="input-lg form-control" name="Arreglo[deposito_id]" id="deposito" onchange="ActualizacionDeposito()" required>
                                        <?php
                                        $queryListDP = mysqli_query($conn3, "SELECT * from dep WHERE activo = 1 ORDER BY id ASC");
                                        while ($rowMotorizadoDP = mysqli_fetch_array($queryListDP)) {
                                            $idDP = $rowMotorizadoDP['id'];
                                            $descripcionDP = $rowMotorizadoDP['descripcion'];

                                            if ($Deposito_id != "" and $Deposito_id == $idDP) {
                                            echo '<option value="' . $idDP . '" selected>' . $descripcionDP . '</option>';
                                            } else {
                                            echo '<option value="' . $idDP . '">' . $descripcionDP . '</option>';
                                            }
                                        }
                                        ?>
                                        </select>
                                    </div>

                                <div class="form-group col-md-6">
                                    <label>Producto</label>
                                    <select id="inventario_id" name="Arreglo[inventario_id]" class="form-control select2" style="width: 100%;" required="required" onChange="CargarPrecioProducto();">
                                        <option value="" selected="selected">Seleccione Producto</option>
                                        <?php

                                        $queryList = mysqli_query($conn3, "SELECT si.* FROM sinvetrios si
                                            JOIN scategoria sca ON si.tipo = sca.id
                                            WHERE 1=1
                                            AND si.estado = 1
                                            AND sca.tipo in (1,2,5)");
                                        while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                                        $descripcion     = $row_recordset32['descripcion'];
                                        $ID              = $row_recordset32['ID'];
                                        $precio = $row_recordset32['precio'];

                                        echo "<option value='$ID' data-valor='$precio'> $descripcion </option>";
                                        }

                                        ?>

                                    </select>
                                </div>
                                
                                <div align="left" class="col-md-12" id="div_solo_lote"></div>

                                <div id="Campo_Adicional_Producto" class="col-md-12">

                                </div>

                                <div align="left" class="col-md-12" id="informacion_existencia"></div>


                                <div class="form-group col-md-4">
                                    <label>Valor de la Tarifa</label>
                                    <input type="number" class="form-control input-lg" name="Arreglo[Valor]" id="Valor" placeholder="$$" value="0" min="0" step="0.01" maxlength="11" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required >
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Porcentaje Copago</label>
                                    <input type="number" class="form-control input-lg" name="Arreglo[Copago]" placeholder="%" value="0" min="0" max="100" step="0.01" maxlength="11" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                                </div>

                                <?php endif; ?>



                                <input type="hidden" name="usuario_id" value="<?php echo $usuario_id; ?>">
                                <input type="hidden" name="convenio_id" value="<?php echo $convenio_id; ?>">

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
                            </div>
                        </form>


                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-body">
                                    <div class="col-md-12">
                                        <!--<label style="color:red">Importante al crear alguna tarifa no usar el codigo "SESIONRIPS" ya que este solo esta reservado para el valor de la consulta al momento de facturar los rips si se crea alguna tarifa con este codigo no se tomara el valor correctamente </label>
                                        <h2 style="text-align: center;font-weight: bold;"> Tarifas </h2> -->
                                        <div class="col-md-12" style="text-align: center;"> 
                                            <font class="text-dark">  <i class="fa fa-pencil" style="color:#17a2b8"> Editar</i>  </font>
                                            <font class="text-dark"> <i class="fa fa-close" style="color:#dc3545"> Eliminar</i> </font>
                                        </div>

                                        <?php if($TipoConvenio=="1"): ?>

                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Deposito</th>
                                                    <th scope="col">Nombre de la Tarifa</th>
                                                    <th scope="col">Valor</th>
                                                    <th scope="col">Copago</th>
                                                    <th scope="col">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                $queryList = mysqli_query($conn3, "SELECT * FROM  {$Nombre_Tabla} WHERE Activo='1' AND convenio_id='{$convenio_id}' ");
                                                while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                                    //$contador++;
                                                    $id = $rowMotorizado['id'];
                                                    $NombreDeposito = funcionMaster($rowMotorizado['deposito_id'], 'id', 'descripcion', 'dep');
                                                    $Nombre = funcionMaster($rowMotorizado['inventario_id'], 'ID', 'descripcion', 'sinvetrios');
                                                    $Valor = $rowMotorizado['Valor'];
                                                    $copago = $rowMotorizado['Copago'];

                                                    $ruta = htmlentities($_SERVER['PHP_SELF']);
                                                    echo "<tr ><th scope='row' width='2%'>{$id}</th>
                                                    <td width='20%' align='center'>{$NombreDeposito}</td>
                                                    <td width='20%' align='center'>{$Nombre}</td>
                                                    
                                                    
                                                    <td width='20%' align='center'>{$Valor} <td width='20%' align='center'>{$copago}</td></td>";

                                                    echo "<td width='20%' align='center'><font color='#04CC05'> <a href='{$ruta}?Editar={$id}&convenio_id={$convenio_id}' class='btn btn-outline-info btn-lg rounded-pill shadow' style='width: 50px;'><i class='fa fa-pencil' title='Editar'> </i></a></font>
                                                    <font> <a href='{$ruta}?Eliminar={$id}&convenio_id={$convenio_id}' class='btn btn-outline-danger btn-lg rounded-pill shadow' style='width: 50px;'> <i class='fa fa-close' title='Eliminar'> </i></a></font></td>
                                                    </td></tr>";
                                                }

                                                ?>
                                            </tbody>
                                        </table>

                                        <?php endif; ?>



                                        <?php if($TipoConvenio=="2"): ?>

                                            <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Deposito</th>
                                                    <th scope="col">Nombre de la Tarifa</th>
                                                    <th scope="col">Paquete</th>
                                                    <th scope="col">Valor</th>
                                                    <th scope="col">Copago</th>
                                                    <th scope="col">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                $queryList = mysqli_query($conn3, "SELECT * FROM  {$Nombre_Tabla} WHERE Activo='1' AND convenio_id='{$convenio_id}' ");
                                                while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                                    //$contador++;
                                                    $id = $rowMotorizado['id'];
                                                    $NombreDeposito = funcionMaster($rowMotorizado['deposito_id'], 'id', 'descripcion', 'dep');
                                                    $Nombre = funcionMaster($rowMotorizado['inventario_id'], 'ID', 'descripcion', 'sinvetrios');
                                                    $NombrePaquete = funcionMaster($rowMotorizado['paquete_id'], 'id', 'Nombre', 'Rips_Paquetes');
                                                    $Valor = $rowMotorizado['Valor'];
                                                    $copago = $rowMotorizado['Copago'];

                                                    $ruta = htmlentities($_SERVER['PHP_SELF']);
                                                    echo "<tr ><th scope='row' width='2%'>{$id}</th>
                                                    <td width='20%' align='center'>{$NombreDeposito}</td>
                                                    <td width='20%' align='center'>{$Nombre}</td>
                                                    <td width='20%' align='center'>{$NombrePaquete}</td>
                                                    
                                                    
                                                    <td width='20%' align='center'>{$Valor} <td width='20%' align='center'>{$copago}</td></td>";

                                                    echo "<td width='20%' align='center'><font color='#04CC05'> <a href='{$ruta}?Editar={$id}&convenio_id={$convenio_id}' class='btn btn-outline-info btn-lg rounded-pill shadow' style='width: 50px;'><i class='fa fa-pencil' title='Editar'> </i></a></font>
                                                    <font> <a href='{$ruta}?Eliminar={$id}&convenio_id={$convenio_id}' class='btn btn-outline-danger btn-lg rounded-pill shadow' style='width: 50px;'> <i class='fa fa-close' title='Eliminar'> </i></a></font></td>
                                                    </td></tr>";
                                                }

                                                ?>
                                            </tbody>
                                        </table>

                                        <?php endif; ?>



                                        <?php if($TipoConvenio=="4"): ?>

                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Deposito</th>
                                                    <th scope="col">Nombre de la Tarifa</th>
                                                    <th scope="col">Valor</th>
                                                    <th scope="col">Copago</th>
                                                    <th scope="col">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                $queryList = mysqli_query($conn3, "SELECT * FROM  {$Nombre_Tabla} WHERE Activo='1' AND convenio_id='{$convenio_id}' ");
                                                while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                                    //$contador++;
                                                    $id = $rowMotorizado['id'];
                                                    $NombreDeposito = funcionMaster($rowMotorizado['deposito_id'], 'id', 'descripcion', 'dep');
                                                    $Nombre = funcionMaster($rowMotorizado['inventario_id'], 'ID', 'descripcion', 'sinvetrios');
                                                    $Valor = $rowMotorizado['Valor'];
                                                    $copago = $rowMotorizado['Copago'];

                                                    $ruta = htmlentities($_SERVER['PHP_SELF']);
                                                    echo "<tr ><th scope='row' width='2%'>{$id}</th>
                                                    <td width='20%' align='center'>{$NombreDeposito}</td>
                                                    <td width='20%' align='center'>{$Nombre}</td>
                                                    
                                                    
                                                    <td width='20%' align='center'>{$Valor} <td width='20%' align='center'>{$copago}</td></td>";

                                                    echo "<td width='20%' align='center'><font color='#04CC05'> <a href='{$ruta}?Editar={$id}&convenio_id={$convenio_id}' class='btn btn-outline-info btn-lg rounded-pill shadow' style='width: 50px;'><i class='fa fa-pencil' title='Editar'> </i></a></font>
                                                    <font> <a href='{$ruta}?Eliminar={$id}&convenio_id={$convenio_id}' class='btn btn-outline-danger btn-lg rounded-pill shadow' style='width: 50px;'> <i class='fa fa-close' title='Eliminar'> </i></a></font></td>
                                                    </td></tr>";
                                                }

                                                ?>
                                            </tbody>
                                        </table>

                                        <?php endif; ?>



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
    $(document).ready(function () {
        $('.checkProcedimiento_tabla').change(function () {
            var $row = $(this).closest('tr');
            $row.find('input[type="number"]').prop('required', this.checked);
        });

        $('#searchInput').on('input', function () {
            var searchText = $(this).val().toLowerCase();

            $('#myTable tbody tr').each(function () {
                var rowText = $(this).text().toLowerCase();
                $(this).toggle(rowText.includes(searchText));
            });
        });

    });
</script>

<script>
      function CargarPrecioProducto() {

        var selectElement = document.getElementById('inventario_id'); 

        var selectedOption = selectElement.options[selectElement.selectedIndex];

        var Precio = selectedOption.getAttribute('data-valor');

        var Valor = document.getElementById('Valor');
        Valor.value = Precio;

        /////////////////////////////////////////////////////////////////////////////////

    var codigoProd = $("#inventario_id").val();
    var deposito = $("#deposito").val();

    $('#Valor').val('0');
    ////////////////////////// EVITAR ERRORES ///////////////

    var DivCampoPersonalizado = document.getElementById('Campo_Adicional_Producto');
    DivCampoPersonalizado.innerHTML = "";

    document.getElementById('informacion_existencia').innerHTML = "";

    /////////////////////////////////////////////////////////


    if (codigoProd != "") {
      $.ajax({
        type: "POST",
        url: "FA_Ajax_CargarPrecioYLista.php",
        data: {
          codigoProd: codigoProd,
          deposito: deposito,
          Tipo_Consulta: "Cargar Precio"
        },
        success: function(response) {

          var Respuesta = JSON.parse(response);
          //console.log (Respuesta);

          // codigo para el apartado de lotes
          if (Respuesta.Lista == true && Respuesta.Tipo == "Lotes") {

            var DivCampoPersonalizado = document.getElementById('Campo_Adicional_Producto');
            // Crea el elemento select
            var selectElement = document.createElement('select');
            selectElement.className = "form-control input-lg";
            selectElement.setAttribute('required', 'required');
            selectElement.setAttribute('name', 'Arreglo[SinvDep_id]');
            selectElement.setAttribute('width', '100%');

            var optionElement = document.createElement('option');
            optionElement.value = '';
            optionElement.textContent = 'Seleccione';
            selectElement.appendChild(optionElement);

            // Crea el elemento label
            var labelElement = document.createElement('label');
            labelElement.textContent = 'Lotes';

            DivCampoPersonalizado.appendChild(labelElement);
            DivCampoPersonalizado.appendChild(document.createElement('br'));

            var Options = Respuesta.Detalles;
            //console.log(Options);
            // Recorre el JSON y agrega opciones al select
            Object.keys(Options).forEach(function(key) {
              var item = Options[key];
              var optionElement = document.createElement('option');
              optionElement.value = item.id;
              optionElement.textContent = item.Nombre + ` [${item.Existencia}] [${item.Vencimiento}] `;
              optionElement.dataset.existencias = item.Existencia;

              if (parseInt(item.Existencia) <= 0) {
                //optionElement.disabled = true;
                optionElement.style.backgroundColor = '#ff00004d';
              }
              // Obtiene la fecha de hoy
              var fechaHoy = new Date();
              var fechaSeleccionada = new Date(item.Vencimiento);
              // Compara las fechas
              if (fechaSeleccionada <= fechaHoy) {
                optionElement.disabled = true;
              }

              selectElement.appendChild(optionElement);
            });

            // Agrega la función onchange al select
            selectElement.onchange = function() {
              var selectedOption = this.options[this.selectedIndex];
              var existencias = selectedOption.dataset.existencias;

              //////////////////////////////////////////////////////////////////////////
              var Mensaje = "Existencia Disponible: <u><b>" + existencias + "</b></u>";
              //info de las existencias informacion_existencia
              document.getElementById('informacion_existencia').innerHTML = Mensaje;
              ///////////////////////////////////////////////////////////////////////////
              // Establecer el valor máximo para el elemento con id=1 que es el campo cantidad
              //var elemento1 = document.getElementById('1');
              // elemento1.max = existencias;
            };

            DivCampoPersonalizado.appendChild(selectElement);

          }
          //codigo para el apartado de producto simple
          else if (Respuesta.Tipo == "Simple") {

            var DivCampoPersonalizado = document.getElementById('Campo_Adicional_Producto');
            var Options = Respuesta.Detalles;
            //console.log(Options);

            // Crea el elemento input hidden
            var input = document.createElement('input');
            input.setAttribute('type', 'hidden');
            input.setAttribute('name', 'Arreglo[SinvDep_id]');

            Object.keys(Options).forEach(function(key) {
              var item = Options[key];
              input.value = item.id;

              //var elemento1 = document.getElementById('1');
              //elemento1.max = item.Existencia;

              ////////////////////
              var Mensaje = "Existencia Disponible: <u><b>" + item.Existencia + "</b></u>";
              document.getElementById('informacion_existencia').innerHTML = Mensaje;
              //////////////////////

            });
            DivCampoPersonalizado.appendChild(input);

          }
          //codigo para el apartado del producto compuesto
          else if (Respuesta.Tipo == "Compuesto") {

            var DivCampoPersonalizado = document.getElementById('Campo_Adicional_Producto');
            var Options = Respuesta.Detalles;
            //console.log(Options);
            // Crea el elemento input hidden
            var input = document.createElement('input');
            input.setAttribute('type', 'hidden');
            input.setAttribute('name', 'Arreglo[SinvDep_id]');

            var labelElement = document.createElement('label');

            Object.keys(Options).forEach(function(key) {
              var item = Options[key];
              input.value = "0";

              //var elemento1 = document.getElementById('1');
              //elemento1.max = item.Existencia;
              labelElement.textContent = item.Nombre;

              ////////////////////
              var Mensaje = "Existencia Disponible: <u><b>" + item.Existencia + "</b></u>";
              document.getElementById('informacion_existencia').innerHTML = Mensaje;
              //////////////////////

            });

            DivCampoPersonalizado.appendChild(input);
            DivCampoPersonalizado.appendChild(labelElement);
          } else if (Respuesta.Tipo == "Servicio") {

            var DivCampoPersonalizado = document.getElementById('Campo_Adicional_Producto');
            var Options = Respuesta.Detalles;
            //console.log(Options);

            // Crea el elemento input hidden
            var input = document.createElement('input');
            input.setAttribute('type', 'hidden');
            input.setAttribute('name', 'Arreglo[SinvDep_id]');

            input.value = "0";
            ////////////////////
            var Mensaje = "<u><b>Servicio</b></u>";
            document.getElementById('informacion_existencia').innerHTML = Mensaje;
            //////////////////////

            DivCampoPersonalizado.appendChild(input);

          }
          // si no tiene un tipo de clasificacion nos indicara este error
          else if (Respuesta.Tipo == "Error") {

            alert('el tipo del producto tiene un error con la clasificacion del inventario o no existe el registro para el deposito elegido');
            ActualizacionDeposito();
          }


          $('#Valor').val(Respuesta.Precio);

        }
      });
    } else {
      $("#inventario_id").val("").trigger('change');
    }

  }





function CargarPrecioProductoEditar() {
/////////////////////////////////////////////////////////////////////////////////

var codigoProd = $("#inventario_id").val();
var deposito = $("#deposito").val();

$('#Valor').val('0');
////////////////////////// EVITAR ERRORES ///////////////

var DivCampoPersonalizado = document.getElementById('Campo_Adicional_Producto');
DivCampoPersonalizado.innerHTML = "";

document.getElementById('informacion_existencia').innerHTML = "";

/////////////////////////////////////////////////////////


if (codigoProd != "") {
$.ajax({
type: "POST",
url: "FA_Ajax_CargarPrecioYLista.php",
data: {
  codigoProd: codigoProd,
  deposito: deposito,
  Tipo_Consulta: "Cargar Precio"
},
success: function(response) {

  var Respuesta = JSON.parse(response);
  //console.log (Respuesta);

  // codigo para el apartado de lotes
  if (Respuesta.Lista == true && Respuesta.Tipo == "Lotes") {

    var DivCampoPersonalizado = document.getElementById('Campo_Adicional_Producto');
    // Crea el elemento select
    var selectElement = document.createElement('select');
    selectElement.className = "form-control input-lg";
    selectElement.setAttribute('required', 'required');
    selectElement.setAttribute('name', 'Arreglo[SinvDep_id]');
    selectElement.setAttribute('width', '100%');

    var optionElement = document.createElement('option');
    optionElement.value = '';
    optionElement.textContent = 'Seleccione';
    selectElement.appendChild(optionElement);

    // Crea el elemento label
    var labelElement = document.createElement('label');
    labelElement.textContent = 'Lotes';

    DivCampoPersonalizado.appendChild(labelElement);
    DivCampoPersonalizado.appendChild(document.createElement('br'));

    var Options = Respuesta.Detalles;
    //console.log(Options);
    // Recorre el JSON y agrega opciones al select
    Object.keys(Options).forEach(function(key) {
      var item = Options[key];
      var optionElement = document.createElement('option');
      optionElement.value = item.id;
      optionElement.textContent = item.Nombre + ` [${item.Existencia}] [${item.Vencimiento}] `;
      optionElement.dataset.existencias = item.Existencia;

      if (parseInt(item.Existencia) <= 0) {
        //optionElement.disabled = true;
        optionElement.style.backgroundColor = '#ff00004d';
      }
      // Obtiene la fecha de hoy
      var fechaHoy = new Date();
      var fechaSeleccionada = new Date(item.Vencimiento);
      // Compara las fechas
      if (fechaSeleccionada <= fechaHoy) {
        optionElement.disabled = true;
      }

      selectElement.appendChild(optionElement);
    });

    // Agrega la función onchange al select
    selectElement.onchange = function() {
      var selectedOption = this.options[this.selectedIndex];
      var existencias = selectedOption.dataset.existencias;

      //////////////////////////////////////////////////////////////////////////
      var Mensaje = "Existencia Disponible: <u><b>" + existencias + "</b></u>";
      //info de las existencias informacion_existencia
      document.getElementById('informacion_existencia').innerHTML = Mensaje;
      ///////////////////////////////////////////////////////////////////////////
      // Establecer el valor máximo para el elemento con id=1 que es el campo cantidad
      //var elemento1 = document.getElementById('1');
      // elemento1.max = existencias;
    };

    DivCampoPersonalizado.appendChild(selectElement);

  }
  //codigo para el apartado de producto simple
  else if (Respuesta.Tipo == "Simple") {

    var DivCampoPersonalizado = document.getElementById('Campo_Adicional_Producto');
    var Options = Respuesta.Detalles;
    //console.log(Options);

    // Crea el elemento input hidden
    var input = document.createElement('input');
    input.setAttribute('type', 'hidden');
    input.setAttribute('name', 'Arreglo[SinvDep_id]');

    Object.keys(Options).forEach(function(key) {
      var item = Options[key];
      input.value = item.id;

      //var elemento1 = document.getElementById('1');
      //elemento1.max = item.Existencia;

      ////////////////////
      var Mensaje = "Existencia Disponible: <u><b>" + item.Existencia + "</b></u>";
      document.getElementById('informacion_existencia').innerHTML = Mensaje;
      //////////////////////

    });
    DivCampoPersonalizado.appendChild(input);

  }
  //codigo para el apartado del producto compuesto
  else if (Respuesta.Tipo == "Compuesto") {

    var DivCampoPersonalizado = document.getElementById('Campo_Adicional_Producto');
    var Options = Respuesta.Detalles;
    //console.log(Options);
    // Crea el elemento input hidden
    var input = document.createElement('input');
    input.setAttribute('type', 'hidden');
    input.setAttribute('name', 'Arreglo[SinvDep_id]');

    var labelElement = document.createElement('label');

    Object.keys(Options).forEach(function(key) {
      var item = Options[key];
      input.value = "0";

      //var elemento1 = document.getElementById('1');
      //elemento1.max = item.Existencia;
      labelElement.textContent = item.Nombre;

      ////////////////////
      var Mensaje = "Existencia Disponible: <u><b>" + item.Existencia + "</b></u>";
      document.getElementById('informacion_existencia').innerHTML = Mensaje;
      //////////////////////

    });

    DivCampoPersonalizado.appendChild(input);
    DivCampoPersonalizado.appendChild(labelElement);
  } else if (Respuesta.Tipo == "Servicio") {

    var DivCampoPersonalizado = document.getElementById('Campo_Adicional_Producto');
    var Options = Respuesta.Detalles;
    //console.log(Options);

    // Crea el elemento input hidden
    var input = document.createElement('input');
    input.setAttribute('type', 'hidden');
    input.setAttribute('name', 'Arreglo[SinvDep_id]');

    input.value = "0";
    ////////////////////
    var Mensaje = "<u><b>Servicio</b></u>";
    document.getElementById('informacion_existencia').innerHTML = Mensaje;
    //////////////////////

    DivCampoPersonalizado.appendChild(input);

  }
  // si no tiene un tipo de clasificacion nos indicara este error
  else if (Respuesta.Tipo == "Error") {

    alert('el tipo del producto tiene un error con la clasificacion del inventario o no existe el registro para el deposito elegido');
    ActualizacionDeposito();
  }


  //$('#Valor').val(Respuesta.Precio);

}
});
} else {
$("#inventario_id").val("").trigger('change');
}

}

  function ActualizacionDeposito() {

    var divPersonalizado = document.getElementById('Campo_Adicional_Producto');
    divPersonalizado.innerHTML = "";
    $("#inventario_id").val("").trigger('change');

  }


</script>
