<?php
include 'header.php';
include 'menu.php';

$_POST = DatosIngresarMysqli($_POST);

if (isset($_POST['GuardarDetalleOrdenLaboratorio'])) {
    date_default_timezone_set('America/Bogota');

    $Campo1 = mysqli_query($conn3, "show COLUMNS from sDetalleOperPendites WHERE Field = 'Tipo_Producto';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `sDetalleOperPendites` ADD `Tipo_Producto` VARCHAR(100) NULL DEFAULT 'Inventario'  COMMENT 'Se refiere si es un producto del modulo inventario o de laboratorio *Creado desde modulo de Laboratorio*';");
    }

    if ($_POST["Examen"] != "Todos") {
        $idOperacion = 0;
        $fechaRegistro = date("Y-m-d H:i:s");
        $Examen_id = $_POST["Examen"];
        $cantidad = $_POST['Cantidad'];
        $descripcion = mysqli_real_escape_string($conn3, funcionMaster($Examen_id, 'id', 'Nombre', 'LB_Examen'));
        $base = $_POST["Precio"];
        $impuesto = 0;
        $totalbase = $_POST["Subtotal"];
        $subTotal = $_POST["Subtotal"];
        $usuario_id = $_POST['usuario_id'];
        $cliente_id = $_POST['cliente_id'];

        //Tipo 8-> Laboratorio
        $queryList = mysqli_query($conn3, "INSERT INTO sDetalleOperPendites (idOperacion, fechaRegistro, idProducto, cantidad, descripcion, base, impuesto, totalbase, subTotal, id_usuario, id_cliente,Tipo_Producto,tipo) VALUES ('$idOperacion','$fechaRegistro', '$Examen_id','$cantidad','$descripcion','$base','$impuesto', '$totalbase', '$subTotal', '$usuario_id', '$cliente_id','Laboratorio','8');");
    } else {
        $Categoria = $_POST["Categoria"];

        $idOperacion = 0;
        $fechaRegistro = date("Y-m-d H:i:s");
        $impuesto = 0;
        $totalbase = 0;
        $usuario_id = $_POST['usuario_id'];
        $cliente_id = $_POST['cliente_id'];

        $queryExamen = mysqli_query($conn3, "SELECT * FROM  LB_Examen where categoria_id = $Categoria");
        if ($queryExamen) {
            while ($rowExamen = mysqli_fetch_array($queryExamen)) {

            $Examen_id = $rowExamen["id"];
            $cantidad = 1;
            $descripcion = mysqli_real_escape_string($conn3, $rowExamen["Nombre"]);
            $base = $rowExamen["Precio"];
            $subTotal = $base * $cantidad;
            $totalbase = $subTotal;

            //Tipo 8-> Laboratorio
            $queryList = mysqli_query($conn3, "INSERT INTO sDetalleOperPendites (idOperacion, fechaRegistro, idProducto, cantidad, descripcion, base, impuesto, totalbase, subTotal, id_usuario, id_cliente,Tipo_Producto,tipo) 
            VALUES ('$idOperacion','$fechaRegistro', '$Examen_id','$cantidad','$descripcion','$base','$impuesto', '$totalbase', '$subTotal', '$usuario_id', '$cliente_id','Laboratorio','8');");
            }
        }
        
    }

    
    $ruta = htmlentities($_SERVER['PHP_SELF']);
    $ruta = str_replace('.php', '', $ruta);
    if ($queryList != true) {
        echo "<script language='Javascript'> window.location='{$ruta}?clienteId={$cliente_id}&error=Hubo Un Error Al Guardar Los Datos'</script>";
    } else {
        echo "<script language='Javascript'> window.location='{$ruta}?clienteId={$cliente_id}&msg=Se Guardaron Los Datos Correctamente'</script>";
    }
}

if (isset($_POST['GuardarDetalleOrdenLaboratorioPaquete'])) {
    date_default_timezone_set('America/Bogota');

    $Campo1 = mysqli_query($conn3, "show COLUMNS from sDetalleOperPendites WHERE Field = 'Tipo_Producto';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `sDetalleOperPendites` ADD `Tipo_Producto` VARCHAR(100) NULL DEFAULT 'Inventario'  COMMENT 'Se refiere si es un producto del modulo inventario o de laboratorio *Creado desde modulo de Laboratorio*';");
    }

    $Paquete = $_POST["Paquete"];
    $Examenes = funcionMaster($Paquete, 'id', 'Examenes', 'LB_PaqueteExamenes');
    $Examenes = explode(",", $Examenes);
    $idOperacion = 0;
    $fechaRegistro = date("Y-m-d H:i:s");
    $impuesto = 0;
    $totalbase = 0;
    $usuario_id = $_POST['usuario_id'];
    $cliente_id = $_POST['cliente_id'];

    foreach ($Examenes as $key => $value) {
        $queryExamen = mysqli_query($conn3, "SELECT * FROM  LB_Examen where id = $value AND Activo = 1 ");
        if ($queryExamen) {
            while ($rowExamen = mysqli_fetch_array($queryExamen)) {

            $Examen_id = $rowExamen["id"];
            $cantidad = 1;
            $descripcion = mysqli_real_escape_string($conn3, $rowExamen["Nombre"]);
            $base = $rowExamen["Precio"];
            $subTotal = $base * $cantidad;
            $totalbase = $subTotal;
            //Tipo 8-> Laboratorio
            $queryList = mysqli_query($conn3, "INSERT INTO sDetalleOperPendites (idOperacion, fechaRegistro, idProducto, cantidad, descripcion, base, impuesto, totalbase, subTotal, id_usuario, id_cliente,Tipo_Producto,tipo) 
            VALUES ('$idOperacion','$fechaRegistro', '$Examen_id','$cantidad','$descripcion','$base','$impuesto', '$totalbase', '$subTotal', '$usuario_id', '$cliente_id','Laboratorio','8');");
            }
        }
        
    }

    $ruta = htmlentities($_SERVER['PHP_SELF']);
    $ruta = str_replace('.php', '', $ruta);
    if ($queryList != true) {
        echo "<script language='Javascript'> window.location='{$ruta}?clienteId={$cliente_id}&error=Hubo Un Error Al Guardar Los Datos'</script>";
    } else {
        echo "<script language='Javascript'> window.location='{$ruta}?clienteId={$cliente_id}&msg=Se Guardaron Los Datos Correctamente'</script>";
    }
}

if (isset($_POST['GuardarDetalleOrdenLaboratorioCategoria'])) {
    $Categorias = $_POST['Categorias'];
    $idOperacion = 0;
    $fechaRegistro = date("Y-m-d H:i:s");
    $impuesto = 0;
    $totalbase = 0;
    $usuario_id = $_POST['usuario_id'];
    $cliente_id = $_POST['cliente_id'];

    $QueryCategoria = mysqli_query($conn3, "SELECT * FROM LB_Examen where categoria_id = '{$Categorias}' AND Activo = 1 ");
    $nrowl = mysqli_num_rows($QueryCategoria);
    $precio_por_examen=funcionMaster($Categorias,'id','Precio','LB_Categoria')/$nrowl;
    if ($QueryCategoria) {
        while ($rowExamenCategoria= mysqli_fetch_array($QueryCategoria)) {

        $Examen_id = $rowExamenCategoria["id"];
        $cantidad = 1;
        $descripcion = mysqli_real_escape_string($conn3, $rowExamenCategoria["Nombre"]);
        //Tipo 8-> Laboratorio
        $queryList = mysqli_query($conn3, "INSERT INTO sDetalleOperPendites (idOperacion, fechaRegistro, idProducto, cantidad, descripcion, base, impuesto, totalbase, subTotal, id_usuario, id_cliente,Tipo_Producto,tipo) 
            VALUES ('$idOperacion','$fechaRegistro', '$Examen_id','$cantidad','$descripcion','$precio_por_examen','$impuesto', '$totalbase', '$precio_por_examen', '$usuario_id', '$cliente_id','Laboratorio','8');");
        }
    }
    
    $ruta = htmlentities($_SERVER['PHP_SELF']);
    $ruta = str_replace('.php', '', $ruta);
    echo "<script language='Javascript'> window.location='{$ruta}?clienteId={$cliente_id}&msg=Se Guardaron Los Datos Correctamente'</script>";
}

if (isset($_GET['borrar'])) {
    $id = $_GET['borrar'];
    //mysqli_query($conn3, "DELETE FROM sDetalleOperPendites WHERE id = '{$id}' limit 1;");
    mysqli_query($conn3, "UPDATE sDetalleOperPendites set estado = 0 WHERE id = '{$id}' limit 1;");

    $clienteId = $_GET["clienteId"];
    $ruta = htmlentities($_SERVER['PHP_SELF']);
    $ruta = str_replace('.php', '', $ruta);
    echo "<script language='Javascript'>window.location='{$ruta}?clienteId={$clienteId}&error=Se Borro el Examen'</script>";
}

/*
if (isset($_GET['Examenes'])) {
    date_default_timezone_set('America/Bogota');

    $clienteId = $_GET["clienteId"];
    $queryList = mysqli_query($conn3, "SELECT * FROM  ControlDeInsumos where cliente_id=$clienteId");
    while ($rowMotorizado = mysqli_fetch_array($queryList, MYSQLI_ASSOC)) {
        $id = $rowMotorizado['id'];
        $Examenes = $rowMotorizado['Examenes'];
        $usuario_id = $rowMotorizado['usuario_id'];
        $cliente_id = $rowMotorizado['cliente_id'];

        foreach ($rowMotorizado as $key => $value) {
            $arreglo .= "$key: $value ||";
        }
        $arreglo = mysqli_real_escape_string($conn3, trim($arreglo, '||'));
    }

    $Examenes = explode(",", $Examenes);

    foreach ($Examenes as $key => $value) {
        $idOperacion = 0;
        $fechaRegistro = date("Y-m-d H:i:s");
        $Examen_id = $value;
        $cantidad = 1;
        $descripcion = mysqli_real_escape_string($conn3, funcionMaster($value, 'id', 'Nombre', 'LB_Examen'));
        $base = funcionMaster($value, 'id', 'Precio', 'LB_Examen');
        $impuesto = 0;
        $totalbase = 0;
        $subTotal = $base * $cantidad;

        mysqli_query($conn3, "INSERT INTO sDetalleOperPendites (idOperacion, fechaRegistro, idProducto, cantidad, descripcion, base, impuesto, totalbase, subTotal, id_usuario, id_cliente,Tipo_Producto) VALUES ('$idOperacion','$fechaRegistro', '$Examen_id','$cantidad','$descripcion','$base','$impuesto', '$totalbase', '$subTotal', '$usuario_id', '$cliente_id','Laboratorio');");
    }

    mysqli_query($conn3, "INSERT INTO ControlDeInsumosLOG (Valores) VALUES ('$arreglo')");
    mysqli_query($conn3, "UPDATE ControlDeInsumos SET Examenes='' WHERE id='$id' limit 1;");

    $ruta = htmlentities($_SERVER['PHP_SELF']);
    echo "<script language='Javascript'> window.location='{$ruta}?clienteId={$cliente_id}'</script>";
}
*/


if ($_GET["msg"] != "") {
    include "plugins/SweetAlert2K/AlertaCorrectaOperacion.php";
}
if ($_GET["error"] != "") {
    include "plugins/SweetAlert2K/AlertaErrorOperacion.php";
}

$usuario_id = $_SESSION['ID'];

$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $usuario_id");
$nrowl = mysqli_num_rows($queryList);
if ($queryList) {
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $moneda = $rowMotorizado['moneda'];
        $impuestoF = $rowMotorizado['impuestoF'];
    }
}


$clienteId = $_GET["clienteId"];
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
<style>
  /* para aplicar la misma funcion de un readonly, ya que si hay readonly y required no funcionan los dos */
  input[data-readonly_P] {
    pointer-events: none;
    background-color: #eee;
    opacity: 1;
  }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> Facturar Orden de Laboratorio </a></li>
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
                <h4 class="Titulo_Pagina"> Facturar Orden de Laboratorio </h4>
                <div class="box">
                    <div class="box-body">
                        <div class="col-md-12">

                        <div align="left" style="padding-bottom: 15px;padding-top: 15px;display:flex;justify-content: space-between; flex-direction:row; width: 80% "><a style="padding-left: 15px;color:blue;" class='btn btn-outline-info  rounded-pill shadow' onclick="MostrarTipoOrden('Simple_Formulario');">Seleccionar Por Examen</a> || <a onclick="MostrarTipoOrden('Paquetes_Formulario');" style="color:blue;" class='btn btn-outline-info  rounded-pill shadow' >Seleccionar Por Paquetes</a> || <a style="color:blue;" class='btn btn-outline-info  rounded-pill shadow' onclick="MostrarTipoOrden('Categorias_Formulario');">Seleccionar Por Categorías</a> </div>

                            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?clienteId=<?php echo $clienteId; ?>" method="POST" id="Simple_Formulario">
                                <div class="form-row">

                                    <div class="form-group col-md-12">
                                        <div align="left">Categorías </div>
                                        <select name="Categoria" id="Categoria" class="form-control select2" style="width: 100%;" onchange="BuscarExamen(this.value)" data-placeholder="Seleccione una Categoría" required>
                                            <option value="" selected="selected">Seleccione ...</option>
                                            <?php
                                            $QueryCategoria = mysqli_query($conn3, "SELECT * FROM LB_Categoria where Activo=1");
                                            if ($QueryCategoria) {
                                                while ($RowCategoria = mysqli_fetch_array($QueryCategoria)) {
                                                $id = $RowCategoria['id'];
                                                $Nombre = $RowCategoria['Nombre'];
                                                echo "<option value='$id'> $Nombre </option>";
                                                }
                                            }
                                            
                                            ?>
                                            <option value="0">Todos</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <div align="left"> Exámenes </div>
                                        <select name="Examen" id="Examen" class="form-control select2" style="width: 100%;" onchange="CargarPrecio(this.value)" data-placeholder="Seleccione un Examen" required>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-2">
                                        <div align="left"> Precio </div>
                                        <input type="Number" name="Precio" id="Precio" step="0.01" class="form-control input-lg" required onchange="Multiplicar()">
                                    </div>

                                    <div class="form-group col-md-2">
                                        <div align="left"> Cantidad </div>
                                        <input type="Number" name="Cantidad" id="Cantidad" class="form-control input-lg" required value="1" onchange="Multiplicar()" >
                                    </div>

                                    <div class="form-group col-md-2">
                                        <div align="left"> Subtotal </div>
                                        <input type="Number" name="Subtotal" id="Subtotal" step="0.01" class="form-control input-lg blur" data-readonly_P required>
                                    </div>

                                    <input type="hidden" name="usuario_id" value="<?php echo $_SESSION['ID'] ?>">
                                    <input type="hidden" name="cliente_id" value="<?php echo $clienteId ?>">

                                    <div class="form-group col-md-2"><br>
                                        <center style="margin-top: -3px;"><button type="submit" class="btn btn-block btn-outline-info  rounded-pill shadow" name="GuardarDetalleOrdenLaboratorio" style="font-size: 18px;">Guardar</button></center>
                                    </div>
                                </div>
                            </form>

                            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?clienteId=<?php echo $clienteId; ?>" method="POST" id="Paquetes_Formulario" style="display:none;">
                                <div class="form-row">

                                    <div class="form-group col-md-12">
                                        <div align="left">Paquetes </div>
                                        <select name="Paquete" id="Paquete" class="form-control select2" style="width: 100%;" onchange="BuscarExamen(this.value)" data-placeholder="Seleccione un Paquete" required>
                                            <option value="" selected="selected">Seleccione ...</option>
                                            <?php
                                            $QueryPaquetes = mysqli_query($conn3, "SELECT * FROM LB_PaqueteExamenes where Activo=1");
                                            if ($QueryPaquetes) {
                                                while ($RowPaquetes = mysqli_fetch_array($QueryPaquetes)) {
                                                $id = $RowPaquetes['id'];
                                                $Nombre = $RowPaquetes['Nombre'];
                                                echo "<option value='$id'> $Nombre </option>";
                                                }
                                            }
                                            
                                            ?>
                                        </select>
                                    </div>

                                    <input type="hidden" name="usuario_id" value="<?php echo $_SESSION['ID'] ?>">
                                    <input type="hidden" name="cliente_id" value="<?php echo $clienteId ?>">

                                    <div class="form-group col-md-12"><br>
                                        <center><button type="submit" class="btn btn-block btn-outline-info  rounded-pill shadow" name="GuardarDetalleOrdenLaboratorioPaquete" style="font-size: 18px;">Guardar</button></center>
                                    </div>
                                </div>
                            </form>

                            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?clienteId=<?php echo $clienteId; ?>" method="POST" id="Categorias_Formulario" style="display:none;">
                                <div class="form-row">

                                    <div class="form-group col-md-12">
                                        <div align="left"> <label>Categorías</label> </div>
                                        <select name="Categorias" id="Categorias" class="form-control select2" style="width: 100%;" data-placeholder="Seleccione una Categoría" required>
                                            <option value="" selected="selected">Seleccione ...</option>
                                            <?php
                                            $QueryPaquetes = mysqli_query($conn3, "SELECT * FROM LB_Categoria where Activo=1");
                                            if ($QueryPaquetes) {
                                                while ($RowPaquetes = mysqli_fetch_array($QueryPaquetes)) {
                                                $id = $RowPaquetes['id'];
                                                $Nombre = $RowPaquetes['Nombre'];
                                                $Precio = $RowPaquetes['Precio'];

                                                echo "<option value='$id'> $Nombre [$ {$Precio}]</option>";
                                                }
                                            }
                                            
                                            ?>
                                        </select>
                                    </div>

                                    <input type="hidden" name="usuario_id" value="<?php echo $_SESSION['ID'] ?>">
                                    <input type="hidden" name="cliente_id" value="<?php echo $clienteId ?>">

                                    <div class="form-group col-md-12"><br>
                                        <center><button type="submit" class="btn btn-block btn-outline-info  rounded-pill shadow" name="GuardarDetalleOrdenLaboratorioCategoria" style="font-size: 18px;">Guardar</button></center>
                                    </div>
                                </div>
                            </form>

                        </div>

                        <?php
                        /*
                        $queryList = mysqli_query($conn3, "SELECT * FROM Historia_Clinica where cliente_id = $clienteId ORDER BY id DESC limit 1");
                        $nrowl = mysqli_num_rows($queryList);
                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                            $Laboratorio_Examenes = $rowMotorizado['Laboratorio_Examenes'];
                        }

                        if ($Laboratorio_Examenes != "") :
                        ?>
                            <div class="col-md-12">
                                <label style='color:green'>Exámenes de Laboratorio Seleccionados en la Ultima Historia Clínica del Paciente Actual</label>
                                <table class="table table-responsive">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Categoria</th>
                                            <th scope="col">Examen</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $contador = 0;
                                        $Laboratorio_Paciente = explode(",", $Laboratorio_Examenes);
                                        foreach ($Laboratorio_Paciente as $value) {
                                            $contador++;
                                            if (funcionMaster($value, 'id', 'Nombre', 'LB_Examen') <> "") :
                                                echo '<tr><td>' . $contador . '</td><td>' . funcionMaster(funcionMaster($value, 'id', 'categoria_id', 'LB_Examen'), 'id', 'Nombre', 'LB_Categoria') . '</td><td>' . funcionMaster($value, 'id', 'Nombre', 'LB_Examen') . '</td></tr>';
                                            endif;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php endif; */?>

                        <div class="col-md-12">
                            <hr style="margin-top:20px;margin-bottom: 10px;">
                        </div>
                        <div class="col-md-12">
                            <h2 style='text-align-last: center;margin-top:0px;'>Exámenes Seleccionados</h2>
                        </div>
                        <div class="col-md-12">
                            <hr style="margin-top:0px;margin-bottom: 10px;">
                        </div>
                        <div class="col-md-12">
                            <table id="Tabla_Examenes" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col" width="2%">#</th>
                                        <th scope="col" width="20%">Nombre</th>
                                        <th scope="col" width="10%">Precio</th>
                                        <th scope="col" width="10%">Cantidad</th>
                                        <th scope="col" width="10%">Total</th>
                                        <th scope="col" width="1%"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $Usuario_id = $_SESSION['ID'];
                                    $queryList = mysqli_query($conn3, "SELECT * FROM  sDetalleOperPendites WHERE id_cliente='$clienteId' AND  id_usuario = '$Usuario_id' AND estado = '1' ORDER BY id ASC");
                                    if ($queryList) {
                                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                        $contador++;
                                        $id = $rowMotorizado['id'];
                                        $descripcion = $rowMotorizado['descripcion'];
                                        $Nombre_Filtro = funcionMaster($rowMotorizado['idProducto'], 'id', 'Nombre_Filtro', 'LB_Examen');
                                        if($Nombre_Filtro!="") {
                                        $Nombre_Filtro= "[$Nombre_Filtro]";
                                        }
                                        $cantidad = $rowMotorizado['cantidad'];
                                        $base = $rowMotorizado['base'];
                                        $subtotal = $rowMotorizado['subTotal'];

                                        $ruta = htmlentities($_SERVER['PHP_SELF']);
                                        echo "
                                        <tr>
                                            <th scope='row' width='2%'>{$contador}</th>
                                            <td width='20%' align='center'>{$descripcion} $Nombre_Filtro</td>
                                            <td width='10%' align='center'>{$base}</td>
                                            <td width='10%' align='center'>{$cantidad}</td>
                                            <td width='10%' align='center'>{$subtotal}</td>
                                            <td width='1%'><a href={$ruta}?clienteId={$clienteId}&borrar={$id}><i class='fa fa-trash' style='color:red'></i> </a></td>
                                        </tr>";

                                        $TotalOrden = $TotalOrden + $subtotal;
                                        }
                                    }
                                    

                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="4" style="text-align: end;">Total</th>
                                        <th style="text-align: center;"><?php echo $TotalOrden; ?></th>
                                        <th style="text-align: center;"></th>
                                    </tr>
                                </tfoot>
                            </table>

                            <?php
                            $queryList = mysqli_query($conn3, "SELECT * FROM  ControlDeInsumos where cliente_id=$clienteId");
                            // $nrowcontrol = mysqli_num_rows($queryList);
                            if ($queryList) {
                                while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                $Examenes = $rowMotorizado["Examenes"];
                                }
                            }
                            
                            if ($Examenes != "") :
                            ?>
                                <div class="col-md-12">
                                    <label style="color:green">El Actual Paciente Tiene Unos Exámenes de Laboratorio Agregados en el *Control de Insumos*</label>
                                    <center><button type="button" class="btn btn-block btn-sm btn-primary" onclick="window.location.href='LB_GenerarOrdenLaboratorio.php?clienteId=<?php echo $clienteId; ?>&Examenes=Si';"> <strong> Agregar Insumos del Modulo Control de Insumos </strong> </button></center>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>


                <h4 class="Titulo_Pagina" style="width: 100vw;text-align: center;position: sticky;">Totalizar Orden</h4>
                <div class="box">
                    <div class="box-body">
                        <div class="col-md-12">
                            <form action="LB_TotalizarOrden" method="POST">
                            <div class="row">
                                <div class="form-group col-md-6">
                                        <div align="left"> <label>Descuento</label>
                                            <label style="font-size:15px;left: 20px;position: relative;">Numérico
                                                <input type="checkbox" class="checkbox" value="Numerico" name="Check_Descuento" id="Descuento_Numerico" onclick="CheckGroup(this), calculoDescuento()" />
                                                <label for="Descuento_Numerico" class="check-box" style="zoom: 0.2;bottom: -20px;left: 40px;"></label>
                                            </label>
                                            <label style="font-size:15px;left: 40px;position: relative;">Porcentaje
                                                <input type="checkbox" class="checkbox" value="Porcentaje" name="Check_Descuento" id="Descuento_Porcentaje" onclick="CheckGroup(this), calculoDescuento()" />
                                                <label for="Descuento_Porcentaje" class="check-box" style="zoom: 0.2;bottom: -20px;left: 40px;"></label>
                                            </label>
                                            <label style="font-size:15px; left: 60px;position: relative;">
                                                Totales:
                                                <span id="calculoDescuento">0</span>
                                            </label>
                                            <script>
                                                function CheckGroup(checkbox) {
                                                    var checkboxes = document.getElementsByName('Check_Descuento')
                                                    checkboxes.forEach((item) => {
                                                        if (item !== checkbox) item.checked = false
                                                    })
                                                }
                                            </script>
                                        </div>
                                        <input type="number" name="Descuento" step="0.01" placeholder="Descuento" class="form-control input-lg" onkeyup="calculoDescuento()" value="0" required>

                                        <div align="left"> <label>Monto Pagado</label> </div>
                                        <input type="number" name="montoPagado" step="0.01" placeholder="Monto Pagado" class="form-control input-lg" value="0" required>
                                        <script type="text/javascript">
                                            function calculoDescuento(value = false) {
                                                let cheked = ($("#Descuento_Numerico").prop("checked") ? $("#Descuento_Numerico") : ($("#Descuento_Porcentaje").prop("checked") ? $("#Descuento_Porcentaje") : ''));
                                                var monto = 0;
                                                var totalCalcular = (value != false ? value : <?= $TotalOrden; ?>)
                                                switch (cheked.val()) {
                                                    case "Numerico":
                                                        monto = (totalCalcular - $("input[name='Descuento']").val());
                                                        $("#calculoDescuento").text(monto);
                                                        $("input[name='montoPagado']").val(monto);
                                                        $("input[name='montoPagado']").attr("max",monto);
                                                        break;
                                                    case "Porcentaje":
                                                        monto = (totalCalcular - ((totalCalcular * $("input[name='Descuento']").val()) / 100));
                                                        $("#calculoDescuento").text(monto);
                                                        $("input[name='montoPagado']").val(monto);
                                                        $("input[name='montoPagado']").attr("max",monto);
                                                        break;
                                                    default:
                                                        $("#calculoDescuento").text("0");
                                                        $("input[name='montoPagado']").attr("max",monto);
                                                        break;
                                                }
                                            }
                                        </script>
                                        <div align="left"> <label>Medio de Pago</label> </div>
                                        <select name="MedicoAsociado" class="form-control select2" style="width: 100%;" data-placeholder="Seleccione un Medico Asociado" required>
                                            <option value="0" selected="selected">Ninguno</option>
                                            <option value="Efectivo">Efectivo</option>
                                            <option value="Tarjeta de Crédito">Tarjeta de Crédito</option>
                                            <option value="Transferencias">Transferencias</option>
                                            <option value="Tarjeta de Débito">Tarjeta de Débito</option>
                                        </select>

                                        <div align="left"> <label>Fecha de Vencimiento</label> </div>
                                        <input type="date" name="fechaVencimiento" placeholder="fecha Vencimiento" class="form-control input-lg" required>

                                        <div align="left"> <label>Fecha de Entrega</label> </div>
                                        <input type="date" name="fechaEntrega" placeholder="fecha Vencimiento" class="form-control input-lg" required>

                                        <div align="left"> <label>Médico Asociado</label> <a href="LB_MedicosAsociados"><i
                                            class="fa fa-cog"></i> </a> </div>
                                        <select name="MedicoAsociado" class="form-control select2" style="width: 100%;" data-placeholder="Seleccione un Medico Asociado" required>
                                            <option value="0" selected="selected">Ninguno</option>
                                            <?php
                                            $QueryCategoria = mysqli_query($conn3, "SELECT * FROM LB_MedicosAsociados where Activo=1");
                                            if ($QueryCategoria) {
                                                while ($RowCategoria = mysqli_fetch_array($QueryCategoria)) {
                                                $id = $RowCategoria['id'];
                                                $Nombre = $RowCategoria['Nombre'];
                                                echo "<option value='$id'> $Nombre </option>";
                                                }
                                            }
                                            
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div align="left"> <label>Observaciones</label> </div>
                                        <textarea id="nota" name="nota" class="textarea" placeholder="Observaciones o Notas" style="width: 100%; height: 423px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                    </div>

                                    <input type="hidden" name="usuario_id" value="<?php echo $_SESSION['ID'] ?>">
                                    <input type="hidden" name="cliente_id" id="cliente_id" value="<?php echo $clienteId ?>">

                                    <div class="form-group col-md-12">
                                        <center><button type="submit" class="btn btn-block btn-outline-danger btn-lg rounded-pill shadow"> <strong> Totalizar Orden Laboratorio </strong> </button></center>
                                    </div>
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
    function MostrarTipoOrden(valor) {

        if (valor == "Simple_Formulario") {
            document.getElementById(valor).style.display = "block";
            document.getElementById("Categorias_Formulario").style.display = "none";
            document.getElementById("Paquetes_Formulario").style.display = "none";
        } else if (valor == "Paquetes_Formulario") {
            document.getElementById(valor).style.display = "block";
            document.getElementById("Categorias_Formulario").style.display = "none";
            document.getElementById("Simple_Formulario").style.display = "none";
        } else if (valor == "Categorias_Formulario") {
            document.getElementById(valor).style.display = "block";
            document.getElementById("Simple_Formulario").style.display = "none";
            document.getElementById("Paquetes_Formulario").style.display = "none";
        }
    }

    function BuscarExamen(valor) {
        var cliente_id = $('#cliente_id').val();
        $.ajax({
            type: "POST",
            url: "LB_Ajax.php",
            data: {
                Categoria: valor,
                Cliente_id: cliente_id,
                Tipo: "Factura Examen"
            },
            success: function(response) {
                $('#Examen').html(response);
                console.log(response);
            }
        });
    }

    function CargarPrecio(valor) {
        $.ajax({
            type: "POST",
            url: "LB_Ajax.php",
            data: {
                Examen: valor,
                Tipo: "Precio Examen",
            },
            success: function(response) {
                if (response != "Todos") {
                    $('#Precio').val(response);
                    $('#Precio').prop('readonly', false);
                    $('#Precio').prop('title', '');
                } else {
                    $('#Precio').val(0);
                    $('#Precio').prop('readonly', true);
                    $('#Precio').prop('title', 'El precio se generara con el valor de cada examen');
                }


                Multiplicar()
            }
        });
    }

    function Multiplicar() {
        valor1 = document.getElementById("Precio").value;
        valor2 = document.getElementById("Cantidad").value;
        total = valor1 * valor2;
        document.getElementById("Subtotal").value = total;
    }

    $('#Tabla_Examenes').dataTable({
        "info": false,
        "paging": false
    });
</script>
<script>
  $(document).on('focus', ".blur", function() {
    $(this).blur();
  });
</script>
<script src="apiVoz_3.2.js"></script>
<?php include 'plantilla.php';?>