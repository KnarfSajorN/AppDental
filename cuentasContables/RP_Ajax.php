<?php
include("../funciones/conn3.php");

function funcionMaster($filtro, $campoFiltrar, $campoImprimir, $tabla)
{
    include '../funciones/conn3.php';
    $query = mysqli_query($conn3, "SELECT * FROM $tabla where $campoFiltrar = '$filtro'");
    $nrowl = mysqli_num_rows($query);
    while ($row = mysqli_fetch_array($query)) {

        $text = $row[$campoImprimir];
    }
    return  $text;
}

function DatosIngresarMysqli($valor)
{
    include "../funciones/conn3.php";
    foreach ($valor as $key => $value) {
        if (is_array($value)) {
            $Arreglo[$key] = DatosIngresarMysqli($value);
        } else {
            $Arreglo[$key] = mysqli_real_escape_string($conn3, $value);
        }
    }
    return $Arreglo;
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($_POST["TipoEspecial"] == "Busqueda Productos") {
    $TipoProducto = $_POST["TipoProducto"];



    if ($TipoProducto != "Todos" && $TipoProducto != "") {

        $queryList = mysqli_query($conn3, "SELECT * FROM  sinvetrios where estado = 1 AND tipo = '$TipoProducto'");
        $nrowl = mysqli_num_rows($queryList);
        if ($nrowl > 0) {
            $ArregloFuturo = "<option value='Todos'> Todos </option>";
        }
        while ($row_recordset32 = mysqli_fetch_array($queryList)) {
            $ID = $row_recordset32['ID'];
            $descripcion      = $row_recordset32['descripcion'];
            $ArregloFuturo .= "<option value='$ID'> $descripcion </option>";
        }
    } else {
        $queryList = mysqli_query($conn3, "SELECT * FROM  sinvetrios where estado = 1 ");
        $nrowl = mysqli_num_rows($queryList);
        if ($nrowl > 0) {
            $ArregloFuturo = "<option value='Todos'> Todos </option>";
        }
        while ($row_recordset32 = mysqli_fetch_array($queryList)) {
            $ID = $row_recordset32['ID'];
            $descripcion      = $row_recordset32['descripcion'];
            $ArregloFuturo .= "<option value='$ID'> $descripcion </option>";
        }
    }


    echo $ArregloFuturo;
    exit();
}

if ($_POST["TipoEspecial"] == "Busqueda Tipo Cliente") {
    $Valor = $_POST["Valor"];

    if ($Valor == "0") {
        $ArregloFuturo .= "<option value='Todos'> Todos </option>";
    } else if ($Valor == "1") {
        $queryList = mysqli_query($conn3, "SELECT * FROM cliente");
        while ($row_recordset32 = mysqli_fetch_array($queryList)) {
            $ArregloFuturo .= "<option value='{$row_recordset32['cliente_id']}'> {$row_recordset32['nombre_cliente']} </option>";
        }
    } else {
        $queryList = mysqli_query($conn3, "SELECT * FROM sproveedores ");
        while ($row_recordset32 = mysqli_fetch_array($queryList)) {
            $ArregloFuturo .= "<option value='{$row_recordset32['id']}'> {$row_recordset32['nombre']} </option>";
        }
    }


    echo $ArregloFuturo;
    exit();
}

if ($_POST["TipoEspecial"] == "Búsqueda Tipo Tercero") {
    $Valor = $_POST["Valor"];

   if ($Valor == "1") {
        $queryList = mysqli_query($conn3, "SELECT * FROM cliente");
        while ($row_recordset32 = mysqli_fetch_array($queryList)) {
            $ArregloFuturo .= "<option value='{$row_recordset32['cliente_id']}'> {$row_recordset32['nombre_cliente']} </option>";
        }
    } else if($Valor == "2") {
        $queryList = mysqli_query($conn3, "SELECT * FROM sproveedores ");
        while ($row_recordset32 = mysqli_fetch_array($queryList)) {
            $ArregloFuturo .= "<option value='{$row_recordset32['id']}'> {$row_recordset32['nombre']} </option>";
        }
    }


    echo $ArregloFuturo;
    exit();
}











if ($_POST["Tipo"] == "Balance Prueba") {
?>

    <div class="col-xs-12">
        <label>Cuenta Contable</label>
        <select name="CuentaContable" id="CuentaContable" class="form-control" style="width: 100%;" required>
            <!--<option value="" selected>Seleccione</option>-->
            <option value="Todas" selected>Todas</option>
            <?php
            /*
            $conn4 = $conn3;
            mysqli_set_charset($conn4, "utf8");
            $queryList = mysqli_query($conn4, "SELECT * FROM  CCuentas");
            while ($row_recordset32A = mysqli_fetch_array($queryList)) {
                $id = $row_recordset32A['id'];
                $descripcion = $row_recordset32A['descripcion'];

                echo "<option value='$id'> $id | $descripcion </option>";
            }
            */
            ?>
        </select>
    </div>

    <div class="col-xs-12">
        <label>Tipo de búsqueda</label>
        <select id="tipobusqueda" name="tipobusqueda" class="form-control" style="width: 100%;" onchange="TipoBusqueda(this.value)" required>
            <option value="Rango" selected>Rango</option>
            <option value="Mes">Mes</option>
        </select>
    </div>

    <div class="col-xs-12" id="div_fechas" style="display:block;">
        <div class="col-xs-6">
            <label>Desde</label>
            <input type="date" class="form-control input-lg" name="desde" id="desde" required>
        </div>
        <div class="col-xs-6">
            <label>Hasta</label>
            <input type="date" class="form-control input-lg" name="hasta" id="hasta" required>
        </div>
    </div>

    <div class="col-xs-12" id="div_meses" style="display:none;">
        <div class="col-xs-6">
            <label>Mes</label>
            <select id="mesbusqueda" class="form-control" style="width: 100%;" onchange="ConfigurarFecha()">
                <option value="" selected>Seleccione</option>
                <option value="01">Enero</option>
                <option value="02">Febrero</option>
                <option value="03">Marzo</option>
                <option value="04">Abril</option>
                <option value="05">Mayo</option>
                <option value="06">Junio</option>
                <option value="07">Julio</option>
                <option value="08">Agosto</option>
                <option value="09">Septiembre</option>
                <option value="10">Octubre</option>
                <option value="11">Noviembre</option>
                <option value="12">Diciembre</option>
            </select>
        </div>
        <div class="col-xs-6">
            <label>Año</label>
            <select id="anualbusqueda" class="form-control" style="width: 100%;" onchange="ConfigurarFecha()">
                <option value="" selected>Seleccione</option>
                <?php
                $anual = getdate();
                for ($i = $anual["year"]; $i >= 1900; $i--) {
                    echo "<option value='$i'>$i</option>";
                }
                ?>
            </select>
        </div>
    </div>

    <div class="col-xs-12" id="RangoFechasGuia" align="center">

    </div>


    <input type="hidden" class="form-control input-lg" name="tipo_reporte" value="<?= $_POST["Tipo"]; ?>" required>

    <script>
        $("#CuentaContable").select2();
    </script>
<?php
} elseif ($_POST["Tipo"] == "Estado Resultado Integral") {
?>
    <div class="col-xs-12">
        <label>Tipo de búsqueda</label>
        <select id="tipobusqueda" name="tipobusqueda" class="form-control" style="width: 100%;" onchange="TipoBusqueda(this.value)" required>
            <option value="Rango" selected>Rango</option>
            <option value="Mes">Anual</option>
        </select>
    </div>

    <div class="col-xs-12" id="div_fechas" style="display:block;">
        <div class="col-xs-6">
            <label>Desde</label>
            <input type="date" class="form-control input-lg" name="desde" id="desde" required>
        </div>
        <div class="col-xs-6">
            <label>Hasta</label>
            <input type="date" class="form-control input-lg" name="hasta" id="hasta" required>
        </div>
    </div>

    <div class="col-xs-12" id="div_meses" style="display:none;">
        <div class="col-xs-6">
            <label>Año</label>
            <select id="anualbusqueda" class="form-control" style="width: 100%;" onchange="ConfigurarAnualidad()">
                <option value="" selected>Seleccione</option>
                <?php
                $anual = getdate();
                for ($i = $anual["year"]; $i >= 1900; $i--) {
                    echo "<option value='$i'>$i</option>";
                }
                ?>
            </select>
        </div>
    </div>
    <div class="col-xs-12" id="RangoFechasGuia" align="center">

    </div>

    <input type="hidden" class="form-control input-lg" name="tipo_reporte" value="<?= $_POST["Tipo"]; ?>" required>

    <script>
        $("#Form_Reportes").submit(function(event) {
            $("#Form_Reportes").attr('action', 'RP_ReportesModificados.php?Tipo=Estado Resultado Integral');
        });
    </script>

    <script>
        function ConfigurarAnualidad() {

            var mes = 12;
            var anual = document.getElementById("anualbusqueda").value;

            if (mes != "" && anual != "") {

                var diasMes = new Date(anual, mes, 0).getDate();
                var diasSemana = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];

                for (var dia = 1; dia <= diasMes; dia++) {

                    var ultimodia = dia;
                }
                console.log(ultimodia)
                var fechainicio = new Date(anual, "00", "01");
                var fechafinal = new Date(anual, mes - 1, ultimodia);
                console.log("inicio " + fechainicio + " final " + fechafinal);


                document.getElementById("desde").value = fechainicio.toJSON().slice(0, 10);
                document.getElementById("hasta").value = fechafinal.toJSON().slice(0, 10);

                document.getElementById("RangoFechasGuia").innerHTML = "<hr> <label> Fecha <br> [" + fechainicio.toJSON().slice(0, 10) + " - " + fechafinal.toJSON().slice(0, 10) + "]</label>";
            } else {
                document.getElementById("desde").value = "";
                document.getElementById("hasta").value = "";

                document.getElementById("RangoFechasGuia").innerHTML = "";
            }

        }
    </script>

<?php
} elseif ($_POST["Tipo"] == "Compras Por Proveedor") {
?>
    <div class="col-xs-12">
        <label>Proveedor</label>
        <select name="Proveedor" id="Proveedor" class="form-control" style="width: 100%;" required>
            <option value="" selected>Seleccione</option>
            <?php
            $conn4 = $conn3;
            mysqli_set_charset($conn4, "utf8");
            $queryList = mysqli_query($conn3, "SELECT * FROM sproveedores order by nombre");
            while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                $rut     = $row_recordset32['rut'];
                $nombre  = $row_recordset32['nombre'];
                $id      = $row_recordset32['id'];
                echo "<option value='$id'> $rut | $nombre  </option>";
            }
            ?>
        </select>
    </div>

    <div class="col-xs-12">
        <label>Tipo de búsqueda</label>
        <select id="tipobusqueda" name="tipobusqueda" class="form-control" style="width: 100%;" onchange="TipoBusqueda(this.value)" required>
            <option value="Rango" selected>Rango</option>
            <option value="Mes">Mensual</option>
        </select>
    </div>

    <div class="col-xs-12" id="div_fechas" style="display:block;">
        <div class="col-xs-6">
            <label>Desde</label>
            <input type="date" class="form-control input-lg" name="desde" id="desde" required>
        </div>
        <div class="col-xs-6">
            <label>Hasta</label>
            <input type="date" class="form-control input-lg" name="hasta" id="hasta" required>
        </div>
    </div>

    <div class="col-xs-12" id="div_meses" style="display:none;">
        <div class="col-xs-6">
            <label>Mes</label>
            <select id="mesbusqueda" class="form-control" style="width: 100%;" onchange="ConfigurarFecha()">
                <option value="" selected>Seleccione</option>
                <option value="01">Enero</option>
                <option value="02">Febrero</option>
                <option value="03">Marzo</option>
                <option value="04">Abril</option>
                <option value="05">Mayo</option>
                <option value="06">Junio</option>
                <option value="07">Julio</option>
                <option value="08">Agosto</option>
                <option value="09">Septiembre</option>
                <option value="10">Octubre</option>
                <option value="11">Noviembre</option>
                <option value="12">Diciembre</option>
            </select>
        </div>
        <div class="col-xs-6">
            <label>Año</label>
            <select id="anualbusqueda" class="form-control" style="width: 100%;" onchange="ConfigurarFecha()">
                <option value="" selected>Seleccione</option>
                <?php
                $anual = getdate();
                for ($i = $anual["year"]; $i >= 1900; $i--) {
                    echo "<option value='$i'>$i</option>";
                }
                ?>
            </select>
        </div>
    </div>

    <div class="col-xs-12" id="RangoFechasGuia" align="center">

    </div>

    <input type="hidden" class="form-control input-lg" name="tipo_reporte" value="<?= $_POST["Tipo"]; ?>" required>
    <script>
        $("#Proveedor").select2();
    </script>
<?php
} elseif ($_POST["Tipo"] == "Comprobantes Detallados") {
?>
    <div class="col-xs-12">
        <label>Comprobante</label>
        <select name="Comprobante[]" id="Comprobante" class="form-control select2" style="width: 100%;" required multiple>
            <option value="Pago">Pago</option>
            <option value="Factura">Factura</option>
            <option value="Gastos y Egresos">Gastos y Egresos</option>
            <option value="Comprobante [Documento]">Comprobante [Documento]</option>
        </select>
    </div>

    <div class="col-xs-12">
        <label>Tipo de búsqueda</label>
        <select id="tipobusqueda" name="tipobusqueda" class="form-control" style="width: 100%;" onchange="TipoBusqueda(this.value)" required>
            <option value="Rango" selected>Rango</option>
            <option value="Mes">Mensual</option>
        </select>
    </div>

    <div class="col-xs-12" id="div_fechas" style="display:block;">
        <div class="col-xs-6">
            <label>Desde</label>
            <input type="date" class="form-control input-lg" name="desde" id="desde" required>
        </div>
        <div class="col-xs-6">
            <label>Hasta</label>
            <input type="date" class="form-control input-lg" name="hasta" id="hasta" required>
        </div>
    </div>

    <div class="col-xs-12" id="div_meses" style="display:none;">
        <div class="col-xs-6">
            <label>Mes</label>
            <select id="mesbusqueda" class="form-control" style="width: 100%;" onchange="ConfigurarFecha()">
                <option value="" selected>Seleccione</option>
                <option value="01">Enero</option>
                <option value="02">Febrero</option>
                <option value="03">Marzo</option>
                <option value="04">Abril</option>
                <option value="05">Mayo</option>
                <option value="06">Junio</option>
                <option value="07">Julio</option>
                <option value="08">Agosto</option>
                <option value="09">Septiembre</option>
                <option value="10">Octubre</option>
                <option value="11">Noviembre</option>
                <option value="12">Diciembre</option>
            </select>
        </div>
        <div class="col-xs-6">
            <label>Año</label>
            <select id="anualbusqueda" class="form-control" style="width: 100%;" onchange="ConfigurarFecha()">
                <option value="" selected>Seleccione</option>
                <?php
                $anual = getdate();
                for ($i = $anual["year"]; $i >= 1900; $i--) {
                    echo "<option value='$i'>$i</option>";
                }
                ?>
            </select>
        </div>
    </div>

    <div class="col-xs-12" id="RangoFechasGuia" align="center">

    </div>

    <input type="hidden" class="form-control input-lg" name="tipo_reporte" value="<?= $_POST["Tipo"]; ?>" required>
    <script>
        $("#Comprobante").select2();

        $("#Form_Reportes").submit(function(event) {
            $("#Form_Reportes").attr('action', 'RP_ReportesModificados.php?Tipo=Comprobantes Detallados');
        });
    </script>
<?php
} elseif ($_POST["Tipo"] == "Libro Diario Resumido") {
?>
    <div class="col-xs-12">
        <label>Comprobante</label>
        <select name="Comprobante[]" id="Comprobante" class="form-control select2" style="width: 100%;" required multiple>
            <option value="Pago">Pago</option>
            <option value="Factura">Factura</option>
            <option value="Gastos y Egresos">Gastos y Egresos</option>
            <option value="Comprobante [Documento]">Comprobante [Documento]</option>
        </select>
    </div>

    <div class="col-xs-12">
        <label>Tipo de búsqueda</label>
        <select id="tipobusqueda" name="tipobusqueda" class="form-control" style="width: 100%;" onchange="TipoBusqueda(this.value)" required>
            <option value="Rango" selected>Rango</option>
            <option value="Mes">Mensual</option>
        </select>
    </div>

    <div class="col-xs-12" id="div_fechas" style="display:block;">
        <div class="col-xs-6">
            <label>Desde</label>
            <input type="date" class="form-control input-lg" name="desde" id="desde" required>
        </div>
        <div class="col-xs-6">
            <label>Hasta</label>
            <input type="date" class="form-control input-lg" name="hasta" id="hasta" required>
        </div>
    </div>

    <div class="col-xs-12" id="div_meses" style="display:none;">
        <div class="col-xs-6">
            <label>Mes</label>
            <select id="mesbusqueda" class="form-control" style="width: 100%;" onchange="ConfigurarFecha()">
                <option value="" selected>Seleccione</option>
                <option value="01">Enero</option>
                <option value="02">Febrero</option>
                <option value="03">Marzo</option>
                <option value="04">Abril</option>
                <option value="05">Mayo</option>
                <option value="06">Junio</option>
                <option value="07">Julio</option>
                <option value="08">Agosto</option>
                <option value="09">Septiembre</option>
                <option value="10">Octubre</option>
                <option value="11">Noviembre</option>
                <option value="12">Diciembre</option>
            </select>
        </div>
        <div class="col-xs-6">
            <label>Año</label>
            <select id="anualbusqueda" class="form-control" style="width: 100%;" onchange="ConfigurarFecha()">
                <option value="" selected>Seleccione</option>
                <?php
                $anual = getdate();
                for ($i = $anual["year"]; $i >= 1900; $i--) {
                    echo "<option value='$i'>$i</option>";
                }
                ?>
            </select>
        </div>
    </div>

    <div class="col-xs-12" id="RangoFechasGuia" align="center">

    </div>

    <input type="hidden" class="form-control input-lg" name="tipo_reporte" value="<?= $_POST["Tipo"]; ?>" required>
    <script>
        $("#Comprobante").select2();

        $("#Form_Reportes").submit(function(event) {
            $("#Form_Reportes").attr('action', 'RP_ReportesModificados.php');
        });
    </script>
<?php
} elseif ($_POST["Tipo"] == "Cartera General Detallada Por Cliente") {
?>
    <div class="col-xs-12">
        <label>Cliente</label>
        <select name="Cliente" id="Cliente" class="form-control select2" style="width: 100%;" required>
            <option value="" selected>Seleccione</option>
            <option value="Todos">Todos</option>
            <?php
            $queryList = mysqli_query($conn3, "SELECT * FROM cliente ");
            while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                $cliente_id = $rowMotorizado["cliente_id"];
                $nombre_cliente = $rowMotorizado["nombre_cliente"];
                $Documento = $rowMotorizado["CODI_CLIENTE"];

                echo "<option value='$cliente_id'> [$Documento] - $nombre_cliente</option>";
            }
            ?>
        </select>
    </div>

    <input type="hidden" class="form-control input-lg" name="tipo_reporte" value="<?= $_POST["Tipo"]; ?>" required>
    <script>
        $("#Cliente").select2();
    </script>
<?php
} elseif ($_POST["Tipo"] == "Estado De Situacion Financiera") {
?>

    <div class="col-xs-12">
        <div class="col-xs-12">
            <label>Año</label>
            <select id="anualbusqueda" name="anualbusqueda" class="form-control" style="width: 100%;" onchange="LimiteFecha()">
                <option value="" selected>Seleccione</option>
                <?php
                $anual = getdate();
                for ($i = $anual["year"]; $i >= 1900; $i--) {
                    echo "<option value='$i'>$i</option>";
                }
                ?>
            </select>
        </div>
    </div>

    <div class="col-xs-12">
        <div class="col-xs-6">
            <label>Desde</label>
            <input type="date" class="form-control input-lg" name="desde" id="desde" required readOnly>
        </div>
        <div class="col-xs-6">
            <label>Hasta</label>
            <input type="date" class="form-control input-lg" name="hasta" id="hasta" required readOnly>
        </div>
    </div>



    <div class="col-xs-12">
        <div class="col-xs-6">
            <label>Comparar con Año ?</label>
            <select name="compararanual" id="compararanual" class="form-control" style="width: 100%;" onchange="ConfigurarAnualidadComparativo()">
                <option value="" selected>No Aplicar</option>
                <?php
                $anual = getdate();
                for ($i = $anual["year"]; $i >= 1900; $i--) {
                    echo "<option value='$i'>$i</option>";
                }
                ?>
            </select>
        </div>
    </div>

    <input type="hidden" class="form-control input-lg" name="tipo_reporte" value="<?= $_POST["Tipo"]; ?>" required>

    <script>
        $("#Form_Reportes").submit(function(event) {
            $("#Form_Reportes").attr('action', 'RP_ReportesModificados.php');
        });
    </script>

    <script>
        function LimiteFecha() {
            var mes = 12;
            var anual = document.getElementById("anualbusqueda").value;

            document.getElementById("desde").readOnly = false;
            document.getElementById("hasta").readOnly = false;

            document.getElementById("desde").value = "";
            document.getElementById("hasta").value = "";

            if (mes != "" && anual != "") {

                var diasMes = new Date(anual, mes, 0).getDate();
                var diasSemana = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];

                for (var dia = 1; dia <= diasMes; dia++) {

                    var ultimodia = dia;
                }
                var fechainicio = new Date(anual, "00", "01");
                var fechafinal = new Date(anual, mes - 1, ultimodia);

                document.getElementById("desde").setAttribute("max", fechafinal.toJSON().slice(0, 10));
                document.getElementById("desde").setAttribute("min", fechainicio.toJSON().slice(0, 10));

                document.getElementById("hasta").setAttribute("max", fechafinal.toJSON().slice(0, 10));
                document.getElementById("hasta").setAttribute("min", fechainicio.toJSON().slice(0, 10));

                document.getElementById("desde").value = fechainicio.toJSON().slice(0, 10);
                document.getElementById("hasta").value = fechafinal.toJSON().slice(0, 10);

            } else {
                document.getElementById("desde").readOnly = true;
                document.getElementById("hasta").readOnly = true;

                document.getElementById("desde").value = "";
                document.getElementById("hasta").value = "";
            }
        }
    </script>

<?php
} elseif ($_POST["Tipo"] == "Libro Oficial De Compras") {
?>

    <div class="col-xs-12">
        <label>Tipo de búsqueda</label>
        <select id="tipobusqueda" name="tipobusqueda" class="form-control" style="width: 100%;" onchange="TipoBusqueda(this.value)" required>
            <option value="Rango" selected>Rango</option>
            <option value="Mes">Mensual</option>
        </select>
    </div>

    <div class="col-xs-12" id="div_fechas" style="display:block;">
        <div class="col-xs-6">
            <label>Desde</label>
            <input type="date" class="form-control input-lg" name="desde" id="desde" required>
        </div>
        <div class="col-xs-6">
            <label>Hasta</label>
            <input type="date" class="form-control input-lg" name="hasta" id="hasta" required>
        </div>
    </div>

    <div class="col-xs-12" id="div_meses" style="display:none;">
        <div class="col-xs-6">
            <label>Mes</label>
            <select id="mesbusqueda" class="form-control" style="width: 100%;" onchange="ConfigurarFecha()">
                <option value="" selected>Seleccione</option>
                <option value="01">Enero</option>
                <option value="02">Febrero</option>
                <option value="03">Marzo</option>
                <option value="04">Abril</option>
                <option value="05">Mayo</option>
                <option value="06">Junio</option>
                <option value="07">Julio</option>
                <option value="08">Agosto</option>
                <option value="09">Septiembre</option>
                <option value="10">Octubre</option>
                <option value="11">Noviembre</option>
                <option value="12">Diciembre</option>
            </select>
        </div>
        <div class="col-xs-6">
            <label>Año</label>
            <select id="anualbusqueda" class="form-control" style="width: 100%;" onchange="ConfigurarFecha()">
                <option value="" selected>Seleccione</option>
                <?php
                $anual = getdate();
                for ($i = $anual["year"]; $i >= 1900; $i--) {
                    echo "<option value='$i'>$i</option>";
                }
                ?>
            </select>
        </div>
    </div>

    <div class="col-xs-12" id="RangoFechasGuia" align="center">

    </div>

    <input type="hidden" class="form-control input-lg" name="tipo_reporte" value="<?= $_POST["Tipo"]; ?>" required>

<?php
} elseif ($_POST["Tipo"] == "Ventas Por Cliente") {
?>
    <div class="col-xs-12">
        <label>Cliente</label>
        <select name="Cliente" id="Cliente" class="form-control select2" style="width: 100%;" required>
            <option value="" selected>Seleccione</option>
            <option value="Todos">Todos</option>
            <?php
            $queryList = mysqli_query($conn3, "SELECT * FROM cliente ");
            while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                $cliente_id = $rowMotorizado["cliente_id"];
                $nombre_cliente = $rowMotorizado["nombre_cliente"];
                $Documento = $rowMotorizado["CODI_CLIENTE"];

                echo "<option value='$cliente_id'> [$Documento] - $nombre_cliente</option>";
            }
            ?>
        </select>
    </div>

    <div class="col-xs-12">
        <label>Tipo de búsqueda</label>
        <select id="tipobusqueda" name="tipobusqueda" class="form-control" style="width: 100%;" onchange="TipoBusqueda(this.value)" required>
            <option value="Rango" selected>Rango</option>
            <option value="Mes">Mensual</option>
        </select>
    </div>

    <div class="col-xs-12" id="div_fechas" style="display:block;">
        <div class="col-xs-6">
            <label>Desde</label>
            <input type="date" class="form-control input-lg" name="desde" id="desde" required>
        </div>
        <div class="col-xs-6">
            <label>Hasta</label>
            <input type="date" class="form-control input-lg" name="hasta" id="hasta" required>
        </div>
    </div>

    <div class="col-xs-12" id="div_meses" style="display:none;">
        <div class="col-xs-6">
            <label>Mes</label>
            <select id="mesbusqueda" class="form-control" style="width: 100%;" onchange="ConfigurarFecha()">
                <option value="" selected>Seleccione</option>
                <option value="01">Enero</option>
                <option value="02">Febrero</option>
                <option value="03">Marzo</option>
                <option value="04">Abril</option>
                <option value="05">Mayo</option>
                <option value="06">Junio</option>
                <option value="07">Julio</option>
                <option value="08">Agosto</option>
                <option value="09">Septiembre</option>
                <option value="10">Octubre</option>
                <option value="11">Noviembre</option>
                <option value="12">Diciembre</option>
            </select>
        </div>
        <div class="col-xs-6">
            <label>Año</label>
            <select id="anualbusqueda" class="form-control" style="width: 100%;" onchange="ConfigurarFecha()">
                <option value="" selected>Seleccione</option>
                <?php
                $anual = getdate();
                for ($i = $anual["year"]; $i >= 1900; $i--) {
                    echo "<option value='$i'>$i</option>";
                }
                ?>
            </select>
        </div>
    </div>

    <div class="col-xs-12" id="RangoFechasGuia" align="center">

    </div>

    <input type="hidden" class="form-control input-lg" name="tipo_reporte" value="<?= $_POST["Tipo"]; ?>" required>
    <script>
        $("#Cliente").select2();
    </script>
<?php
} elseif ($_POST["Tipo"] == "Consecutivo De Comprobantes") {
?>

    <div class="col-xs-12">
        <label>Comprobante</label>
        <select name="Comprobante[]" id="Comprobante" class="form-control select2" style="width: 100%;" required multiple>

            <option value="0">Comprobante [Documento]</option>
            <option value="1">Factura</option>
            <option value="2">Compras</option>
            <option value="3">Gastos y Egresos</option>
            <option value="4">Devoluciones</option>
        </select>
    </div>

    <div class="col-xs-12" id="div_fechas" style="display:block;">
        <div class="col-xs-6">
            <label>Desde</label>
            <input type="date" class="form-control input-lg" name="desde" id="desde" required>
        </div>
        <div class="col-xs-6">
            <label>Hasta</label>
            <input type="date" class="form-control input-lg" name="hasta" id="hasta" required>
        </div>
    </div>

    <div class="col-xs-12" id="div_meses" style="display:none;">
        <div class="col-xs-6">
            <label>Mes</label>
            <select id="mesbusqueda" class="form-control" style="width: 100%;" onchange="ConfigurarFecha()">
                <option value="" selected>Seleccione</option>
                <option value="01">Enero</option>
                <option value="02">Febrero</option>
                <option value="03">Marzo</option>
                <option value="04">Abril</option>
                <option value="05">Mayo</option>
                <option value="06">Junio</option>
                <option value="07">Julio</option>
                <option value="08">Agosto</option>
                <option value="09">Septiembre</option>
                <option value="10">Octubre</option>
                <option value="11">Noviembre</option>
                <option value="12">Diciembre</option>
            </select>
        </div>
        <div class="col-xs-6">
            <label>Año</label>
            <select id="anualbusqueda" class="form-control" style="width: 100%;" onchange="ConfigurarFecha()">
                <option value="" selected>Seleccione</option>
                <?php
                $anual = getdate();
                for ($i = $anual["year"]; $i >= 1900; $i--) {
                    echo "<option value='$i'>$i</option>";
                }
                ?>
            </select>
        </div>
    </div>

    <div class="col-xs-12" id="RangoFechasGuia" align="center">

    </div>

    <input type="hidden" class="form-control input-lg" name="tipo_reporte" value="<?= $_POST["Tipo"]; ?>" required>

    <script>
        $("#Comprobante").select2();
    </script>
<?php
} elseif ($_POST["Tipo"] == "Ventas por Producto") {
?>

    <div class="col-xs-12">
        <label>Tipo producto</label>
        <select id="tipo" name="tipo" class="form-control" style="width: 100%;" onchange="TipoProductoReporte(this)">
            <option value="" selected="selected">Seleccione </option>
            <option value="Todos">Todos </option>
            <?php
            $contador = 0;
            $queryList = mysqli_query($conn3, "SELECT * FROM scategoria order by descripcion");
            $nrowl = mysqli_num_rows($queryList);
            while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                $id      = $row_recordset32['id'];
                $descripcion      = $row_recordset32['descripcion'];
                echo "<option value='$id'> $descripcion</option>";
            }
            ?>

        </select>
    </div>

    <div class="col-xs-12">
        <label>Producto</label>
        <select id="producto" name="producto" class="form-control" style="width: 100%;">
            <option value="" selected="selected">Seleccione </option>
            <option value="Todos">Todos </option>
            <?php
            $queryList = mysqli_query($conn3, "SELECT * FROM  sinvetrios where estado = 1");
            $nrowl = mysqli_num_rows($queryList);
            while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                $ID = $row_recordset32['ID'];
                $descripcion      = $row_recordset32['descripcion'];
                $ArregloFuturo .= "<option value='$id'> $descripcion </option>";
                echo "<option value='$id'> $descripcion </option>";
            }
            ?>

        </select>
    </div>

    <div class="col-xs-12">
        <label>Tipo de búsqueda</label>
        <select id="tipobusqueda" name="tipobusqueda" class="form-control" style="width: 100%;" onchange="TipoBusqueda(this.value)" required>
            <option value="Rango" selected>Rango</option>
            <option value="Mes">Mensual</option>
        </select>
    </div>

    <div class="col-xs-12" id="div_fechas" style="display:block;">
        <div class="col-xs-6">
            <label>Desde</label>
            <input type="date" class="form-control input-lg" name="desde" id="desde" required>
        </div>
        <div class="col-xs-6">
            <label>Hasta</label>
            <input type="date" class="form-control input-lg" name="hasta" id="hasta" required>
        </div>
    </div>

    <div class="col-xs-12" id="div_meses" style="display:none;">
        <div class="col-xs-6">
            <label>Mes</label>
            <select id="mesbusqueda" class="form-control" style="width: 100%;" onchange="ConfigurarFecha()">
                <option value="" selected>Seleccione</option>
                <option value="01">Enero</option>
                <option value="02">Febrero</option>
                <option value="03">Marzo</option>
                <option value="04">Abril</option>
                <option value="05">Mayo</option>
                <option value="06">Junio</option>
                <option value="07">Julio</option>
                <option value="08">Agosto</option>
                <option value="09">Septiembre</option>
                <option value="10">Octubre</option>
                <option value="11">Noviembre</option>
                <option value="12">Diciembre</option>
            </select>
        </div>
        <div class="col-xs-6">
            <label>Año</label>
            <select id="anualbusqueda" class="form-control" style="width: 100%;" onchange="ConfigurarFecha()">
                <option value="" selected>Seleccione</option>
                <?php
                $anual = getdate();
                for ($i = $anual["year"]; $i >= 1900; $i--) {
                    echo "<option value='$i'>$i</option>";
                }
                ?>
            </select>
        </div>
    </div>

    <div class="col-xs-12" id="RangoFechasGuia" align="center">

    </div>

    <input type="hidden" class="form-control input-lg" name="tipo_reporte" value="<?= $_POST["Tipo"]; ?>" required>

    <script>
        function TipoProductoReporte(valor) {
            var valortipo = valor.value;
            console.log(valortipo);
            $.ajax({
                type: "POST",
                url: "RP_Ajax.php",
                data: {
                    TipoProducto: valortipo,
                    TipoEspecial: "Busqueda Productos"
                },
                success: function(response) {
                    document.getElementById('producto').innerHTML = response;
                }
            });
        }
    </script>
<?php
} elseif ($_POST["Tipo"] == "Libro de Inventario y Balance") {
?>
    <div class="col-xs-12">
        <label>Fecha Impresión</label>
        <input type="date" class="form-control input-lg" name="fechaImpresion" id="fechaImpresion" value="<?= Date("Y-m-d") ?>">
    </div>

    <div class="col-xs-12">
        <label>Tipo de búsqueda</label>
        <select id="tipobusqueda" name="tipobusqueda" class="form-control" style="width: 100%;" onchange="TipoBusqueda(this.value)" required>
            <option value="Rango" selected>Rango</option>
            <option value="Mes">Mensual</option>
        </select>
    </div>

    <div class="col-xs-12" id="div_fechas" style="display:block;">
        <div class="col-xs-6">
            <label>Desde</label>
            <input type="date" class="form-control input-lg" name="desde" id="desde" required>
        </div>
        <div class="col-xs-6">
            <label>Hasta</label>
            <input type="date" class="form-control input-lg" name="hasta" id="hasta" required>
        </div>
    </div>

    <div class="col-xs-12" id="div_meses" style="display:none;">
        <div class="col-xs-6">
            <label>Mes</label>
            <select id="mesbusqueda" class="form-control" style="width: 100%;" onchange="ConfigurarFecha()">
                <option value="" selected>Seleccione</option>
                <option value="01">Enero</option>
                <option value="02">Febrero</option>
                <option value="03">Marzo</option>
                <option value="04">Abril</option>
                <option value="05">Mayo</option>
                <option value="06">Junio</option>
                <option value="07">Julio</option>
                <option value="08">Agosto</option>
                <option value="09">Septiembre</option>
                <option value="10">Octubre</option>
                <option value="11">Noviembre</option>
                <option value="12">Diciembre</option>
            </select>
        </div>
        <div class="col-xs-6">
            <label>Año</label>
            <select id="anualbusqueda" class="form-control" style="width: 100%;" onchange="ConfigurarFecha()">
                <option value="" selected>Seleccione</option>
                <?php
                $anual = getdate();
                for ($i = $anual["year"]; $i >= 1900; $i--) {
                    echo "<option value='$i'>$i</option>";
                }
                ?>
            </select>
        </div>
    </div>

    <div class="col-xs-12" id="RangoFechasGuia" align="center">

    </div>

    <input type="hidden" class="form-control input-lg" name="tipo_reporte" value="<?= $_POST["Tipo"]; ?>" required>
    <script>
        $("#Comprobante").select2();

        $("#Form_Reportes").submit(function(event) {
            $("#Form_Reportes").attr('action', 'RP_ReportesModificados.php');
        });
    </script>
<?php
} elseif ($_POST["Tipo"] == "Movimiento Auxiliar De Centro De Costo Por Cuenta Contable") {
?>

    <div class="col-xs-12">
        <label>Centro de Costo</label>
        <select id="centrocosto" name="centrocosto" class="form-control" style="width: 100%;">
            <option value="0" >Sin centro de costo </option>
            <option value="Todos" selected="selected">Todos </option>
            <?php
            $queryListCentro = mysqli_query($conn3, "SELECT * from CcentroCostos");
            $nrowl = mysqli_num_rows($queryListCentro);
            while ($rowCentro = mysqli_fetch_array($queryListCentro)) {

                $idCentro = $rowCentro['id'];
                $codigoCentro = $rowCentro['codigo'];
                $descripcionCentro = $rowCentro['descripcion'];

                echo '<option value="' . $idCentro . '">' . $codigoCentro . '-' . $descripcionCentro . '</option>';
            }
            ?>

        </select>
    </div>

    <div class="col-xs-12">
        <label>Cuenta Contable</label>
        <select id="cuentacontable" name="cuentacontable" class="form-control" style="width: 100%;" required>
            <option value="" selected="selected">Seleccione</option>
            <option value="Todas" selected>Todas</option>
            <?php
            $conn4 = $conn3;
            mysqli_set_charset($conn4, "utf8");
            $queryList = mysqli_query($conn4, "SELECT * FROM  CCuentas");
            while ($row_recordset32A = mysqli_fetch_array($queryList)) {
                $id = $row_recordset32A['id'];
                $descripcion = $row_recordset32A['descripcion'];

                echo "<option value='$id'> $id | $descripcion </option>";
            }

            ?>

        </select>
    </div>

    </div>


    <div class="col-xs-12">
        <label>Tipo de búsqueda</label>
        <select id="tipobusqueda" name="tipobusqueda" class="form-control" style="width: 100%;" onchange="TipoBusqueda()" required>
            <option value="Rango" selected>Rango</option>
            <option value="Mes">Mensual</option>
        </select>
    </div>

    <div class="col-xs-12" id="div_fechas" style="display:block;">
        <div class="col-xs-6">
            <label>Desde</label>
            <input type="date" class="form-control input-lg" name="desde" id="desde" required>
        </div>
        <div class="col-xs-6">
            <label>Hasta</label>
            <input type="date" class="form-control input-lg" name="hasta" id="hasta" required>
        </div>
    </div>

    <div class="col-xs-12" id="div_meses" style="display:none;">
        <div class="col-xs-6">
            <label>Mes</label>
            <select id="mesbusqueda" class="form-control" style="width: 100%;" onchange="ConfigurarFecha()">
                <option value="" selected>Seleccione</option>
                <option value="01">Enero</option>
                <option value="02">Febrero</option>
                <option value="03">Marzo</option>
                <option value="04">Abril</option>
                <option value="05">Mayo</option>
                <option value="06">Junio</option>
                <option value="07">Julio</option>
                <option value="08">Agosto</option>
                <option value="09">Septiembre</option>
                <option value="10">Octubre</option>
                <option value="11">Noviembre</option>
                <option value="12">Diciembre</option>
            </select>
        </div>
        <div class="col-xs-6">
            <label>Año</label>
            <select id="anualbusqueda" class="form-control" style="width: 100%;" onchange="ConfigurarFecha()">
                <option value="" selected>Seleccione</option>
                <?php
                $anual = getdate();
                for ($i = $anual["year"]; $i >= 1900; $i--) {
                    echo "<option value='$i'>$i</option>";
                }
                ?>
            </select>
        </div>
    </div>

    <div class="col-xs-12" id="RangoFechasGuia" align="center">

    </div>

    <input type="hidden" class="form-control input-lg" name="tipo_reporte" value="<?= $_POST["Tipo"]; ?>" required>

    <script>
        $("#Form_Reportes").submit(function(event) {
            $("#Form_Reportes").attr('action', 'RP_ReportesModificados.php');
        });
    </script>

<?php
} elseif ($_POST["Tipo"] == "Movimiento Auxiliar De Proveedores Por Cuenta Contable") {
?>

    <div class="col-xs-12">
        <label>Proveedores</label>
        <select id="proveedor" name="proveedor" class="form-control" style="width: 100%;" required>
            <option value="" selected="selected">Seleccione </option>
            <option value="Todos">Todos </option>
            <?php
            $queryList = mysqli_query($conn3, "SELECT * FROM sproveedores order by nombre");
            $nrowl = mysqli_num_rows($queryList);
            while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                $rut     = $row_recordset32['rut'];
                $nombre  = $row_recordset32['nombre'];
                $id      = $row_recordset32['id'];
                echo "<option value='$id'>$rut | $nombre  </option>";
            }
            ?>

        </select>
    </div>

    <div class="col-xs-12">
        <label>Cuenta Contable</label>
        <select id="cuentacontable" name="cuentacontable" class="form-control" style="width: 100%;" required>
            <option value="" selected="selected">Seleccione</option>
            <option value="Todos" selected>Todos</option>
            <?php
            $conn4 = $conn3;
            mysqli_set_charset($conn4, "utf8");
            $queryList = mysqli_query($conn4, "SELECT * FROM  CCuentas");
            while ($row_recordset32A = mysqli_fetch_array($queryList)) {
                $id = $row_recordset32A['id'];
                $descripcion = $row_recordset32A['descripcion'];

                echo "<option value='$id'> $id | $descripcion </option>";
            }

            ?>

        </select>
    </div>

    </div>


    <div class="col-xs-12">
        <label>Tipo de búsqueda</label>
        <select id="tipobusqueda" name="tipobusqueda" class="form-control" style="width: 100%;" onchange="TipoBusqueda(this.value)" required>
            <option value="Rango" selected>Rango</option>
            <option value="Mes">Mensual</option>
        </select>
    </div>

    <div class="col-xs-12" id="div_fechas" style="display:block;">
        <div class="col-xs-6">
            <label>Desde</label>
            <input type="date" class="form-control input-lg" name="desde" id="desde" required>
        </div>
        <div class="col-xs-6">
            <label>Hasta</label>
            <input type="date" class="form-control input-lg" name="hasta" id="hasta" required>
        </div>
    </div>

    <div class="col-xs-12" id="div_meses" style="display:none;">
        <div class="col-xs-6">
            <label>Mes</label>
            <select id="mesbusqueda" class="form-control" style="width: 100%;" onchange="ConfigurarFecha()">
                <option value="" selected>Seleccione</option>
                <option value="01">Enero</option>
                <option value="02">Febrero</option>
                <option value="03">Marzo</option>
                <option value="04">Abril</option>
                <option value="05">Mayo</option>
                <option value="06">Junio</option>
                <option value="07">Julio</option>
                <option value="08">Agosto</option>
                <option value="09">Septiembre</option>
                <option value="10">Octubre</option>
                <option value="11">Noviembre</option>
                <option value="12">Diciembre</option>
            </select>
        </div>
        <div class="col-xs-6">
            <label>Año</label>
            <select id="anualbusqueda" class="form-control" style="width: 100%;" onchange="ConfigurarFecha()">
                <option value="" selected>Seleccione</option>
                <?php
                $anual = getdate();
                for ($i = $anual["year"]; $i >= 1900; $i--) {
                    echo "<option value='$i'>$i</option>";
                }
                ?>
            </select>
        </div>
    </div>

    <div class="col-xs-12" id="RangoFechasGuia" align="center">

    </div>

    <input type="hidden" class="form-control input-lg" name="tipo_reporte" value="<?= $_POST["Tipo"]; ?>" required>

    <script>
        $("#Form_Reportes").submit(function(event) {
            $("#Form_Reportes").attr('action', 'RP_ReportesModificados.php');
        });
    </script>

<?php
} elseif ($_POST["Tipo"] == "Movimiento Nota Debito y Credito [Venta y Compras]") {
?>

    <div class="col-xs-12">
        <label>Tipo</label>
        <select name="Comprobante" id="Comprobante" class="form-control" style="width: 100%;" required>
            <option value="1">Factura</option>
            <option value="2">Compras</option>
        </select>
    </div>

    <div class="col-xs-12">
        <label>Centro de Costo</label>
        <select id="centrocosto" name="centrocosto" class="form-control" style="width: 100%;">
            <option value="0" >Sin centro de costo </option>
            <option value="Todos" selected="selected">Todos </option>
            <?php
            $queryListCentro = mysqli_query($conn3, "SELECT * from CcentroCostos");
            $nrowl = mysqli_num_rows($queryListCentro);
            while ($rowCentro = mysqli_fetch_array($queryListCentro)) {

                $idCentro = $rowCentro['id'];
                $codigoCentro = $rowCentro['codigo'];
                $descripcionCentro = $rowCentro['descripcion'];

                echo '<option value="' . $idCentro . '">' . $codigoCentro . '-' . $descripcionCentro . '</option>';
            }
            ?>

        </select>
    </div>

    <div class="col-xs-12">
        <label>Tipo de búsqueda</label>
        <select id="tipobusqueda" name="tipobusqueda" class="form-control" style="width: 100%;" onchange="TipoBusqueda(this.value)" required>
            <option value="Rango" selected>Rango</option>
            <option value="Mes">Mensual</option>
        </select>
    </div>

    <div class="col-xs-12" id="div_fechas" style="display:block;">
        <div class="col-xs-6">
            <label>Desde</label>
            <input type="date" class="form-control input-lg" name="desde" id="desde" required>
        </div>
        <div class="col-xs-6">
            <label>Hasta</label>
            <input type="date" class="form-control input-lg" name="hasta" id="hasta" required>
        </div>
    </div>

    <div class="col-xs-12" id="div_meses" style="display:none;">
        <div class="col-xs-6">
            <label>Mes</label>
            <select id="mesbusqueda" class="form-control" style="width: 100%;" onchange="ConfigurarFecha()">
                <option value="" selected>Seleccione</option>
                <option value="01">Enero</option>
                <option value="02">Febrero</option>
                <option value="03">Marzo</option>
                <option value="04">Abril</option>
                <option value="05">Mayo</option>
                <option value="06">Junio</option>
                <option value="07">Julio</option>
                <option value="08">Agosto</option>
                <option value="09">Septiembre</option>
                <option value="10">Octubre</option>
                <option value="11">Noviembre</option>
                <option value="12">Diciembre</option>
            </select>
        </div>
        <div class="col-xs-6">
            <label>Año</label>
            <select id="anualbusqueda" class="form-control" style="width: 100%;" onchange="ConfigurarFecha()">
                <option value="" selected>Seleccione</option>
                <?php
                $anual = getdate();
                for ($i = $anual["year"]; $i >= 1900; $i--) {
                    echo "<option value='$i'>$i</option>";
                }
                ?>
            </select>
        </div>
    </div>

    <div class="col-xs-12" id="RangoFechasGuia" align="center">

    </div>

    <input type="hidden" class="form-control input-lg" name="tipo_reporte" value="<?= $_POST["Tipo"]; ?>" required>

<?php
} elseif ($_POST["Tipo"] == "Ventas Por Centro De Costo") {
?>
    <div class="col-xs-12">
        <label>Centro de Costo</label>
        <select id="centrocosto" name="centrocosto" class="form-control" style="width: 100%;">
            <option value="" selected="selected">Sin centro de costo </option>
            <option value="Todos">Todos </option>
            <?php
            $queryListCentro = mysqli_query($conn3, "SELECT * from CcentroCostos");
            $nrowl = mysqli_num_rows($queryListCentro);
            while ($rowCentro = mysqli_fetch_array($queryListCentro)) {

                $idCentro = $rowCentro['id'];
                $codigoCentro = $rowCentro['codigo'];
                $descripcionCentro = $rowCentro['descripcion'];

                echo '<option value="' . $idCentro . '">' . $codigoCentro . '-' . $descripcionCentro . '</option>';
            }
            ?>

        </select>
    </div>

    <div class="col-xs-12">
        <label>Tipo de búsqueda</label>
        <select id="tipobusqueda" name="tipobusqueda" class="form-control" style="width: 100%;" onchange="TipoBusqueda(this.value)" required>
            <option value="Rango" selected>Rango</option>
            <option value="Mes">Mensual</option>
        </select>
    </div>

    <div class="col-xs-12" id="div_fechas" style="display:block;">
        <div class="col-xs-6">
            <label>Desde</label>
            <input type="date" class="form-control input-lg" name="desde" id="desde" required>
        </div>
        <div class="col-xs-6">
            <label>Hasta</label>
            <input type="date" class="form-control input-lg" name="hasta" id="hasta" required>
        </div>
    </div>

    <div class="col-xs-12" id="div_meses" style="display:none;">
        <div class="col-xs-6">
            <label>Mes</label>
            <select id="mesbusqueda" class="form-control" style="width: 100%;" onchange="ConfigurarFecha()">
                <option value="" selected>Seleccione</option>
                <option value="01">Enero</option>
                <option value="02">Febrero</option>
                <option value="03">Marzo</option>
                <option value="04">Abril</option>
                <option value="05">Mayo</option>
                <option value="06">Junio</option>
                <option value="07">Julio</option>
                <option value="08">Agosto</option>
                <option value="09">Septiembre</option>
                <option value="10">Octubre</option>
                <option value="11">Noviembre</option>
                <option value="12">Diciembre</option>
            </select>
        </div>
        <div class="col-xs-6">
            <label>Año</label>
            <select id="anualbusqueda" class="form-control" style="width: 100%;" onchange="ConfigurarFecha()">
                <option value="" selected>Seleccione</option>
                <?php
                $anual = getdate();
                for ($i = $anual["year"]; $i >= 1900; $i--) {
                    echo "<option value='$i'>$i</option>";
                }
                ?>
            </select>
        </div>
    </div>

    <div class="col-xs-12" id="RangoFechasGuia" align="center">

    </div>

    <input type="hidden" class="form-control input-lg" name="tipo_reporte" value="<?= $_POST["Tipo"]; ?>" required>

<?php
} elseif ($_POST["Tipo"] == "Libro Oficial de Ventas") {
?>

    <div class="col-xs-12">
        <label>Tipo de búsqueda</label>
        <select id="tipobusqueda" name="tipobusqueda" class="form-control" style="width: 100%;" onchange="TipoBusqueda(this.value)" required>
            <option value="Rango" selected>Rango</option>
            <option value="Mes">Mensual</option>
        </select>
    </div>

    <div class="col-xs-12" id="div_fechas" style="display:block;">
        <div class="col-xs-6">
            <label>Desde</label>
            <input type="date" class="form-control input-lg" name="desde" id="desde" required>
        </div>
        <div class="col-xs-6">
            <label>Hasta</label>
            <input type="date" class="form-control input-lg" name="hasta" id="hasta" required>
        </div>
    </div>

    <div class="col-xs-12" id="div_meses" style="display:none;">
        <div class="col-xs-6">
            <label>Mes</label>
            <select id="mesbusqueda" class="form-control" style="width: 100%;" onchange="ConfigurarFecha()">
                <option value="" selected>Seleccione</option>
                <option value="01">Enero</option>
                <option value="02">Febrero</option>
                <option value="03">Marzo</option>
                <option value="04">Abril</option>
                <option value="05">Mayo</option>
                <option value="06">Junio</option>
                <option value="07">Julio</option>
                <option value="08">Agosto</option>
                <option value="09">Septiembre</option>
                <option value="10">Octubre</option>
                <option value="11">Noviembre</option>
                <option value="12">Diciembre</option>
            </select>
        </div>
        <div class="col-xs-6">
            <label>Año</label>
            <select id="anualbusqueda" class="form-control" style="width: 100%;" onchange="ConfigurarFecha()">
                <option value="" selected>Seleccione</option>
                <?php
                $anual = getdate();
                for ($i = $anual["year"]; $i >= 1900; $i--) {
                    echo "<option value='$i'>$i</option>";
                }
                ?>
            </select>
        </div>
    </div>

    <div class="col-xs-12" id="RangoFechasGuia" align="center">

    </div>

    <input type="hidden" class="form-control input-lg" name="tipo_reporte" value="<?= $_POST["Tipo"]; ?>" required>

<?php
} elseif ($_POST["Tipo"] == "Movimiento Auxiliar Por Cuenta Contable") {
?>

    <div class="col-xs-12">
        <label>Cuenta Contable</label>
        <select name="CuentaContable" id="CuentaContable" class="form-control" style="width: 100%;" required>
            <option value="Todos" selected>Todos</option>
            <?php
            $conn4 = $conn3;
            mysqli_set_charset($conn4, "utf8");
            $queryList = mysqli_query($conn4, "SELECT * FROM  CCuentas WHERE id LIKE '4%'");
            while ($row_recordset32A = mysqli_fetch_array($queryList)) {
                $id = $row_recordset32A['id'];
                $descripcion = $row_recordset32A['descripcion'];
                echo "<option value='$id'> $id | $descripcion </option>";
            }
            ?>
        </select>
    </div>

    <div class="col-xs-12">
        <label>Tipo de búsqueda</label>
        <select id="tipobusqueda" name="tipobusqueda" class="form-control" style="width: 100%;" onchange="TipoBusqueda(this.value)" required>
            <option value="Rango" selected>Rango</option>
            <option value="Mes">Mensual</option>
        </select>
    </div>

    <div class="col-xs-12" id="div_fechas" style="display:block;">
        <div class="col-xs-6">
            <label>Desde</label>
            <input type="date" class="form-control input-lg" name="desde" id="desde" required>
        </div>
        <div class="col-xs-6">
            <label>Hasta</label>
            <input type="date" class="form-control input-lg" name="hasta" id="hasta" required>
        </div>
    </div>

    <div class="col-xs-12" id="div_meses" style="display:none;">
        <div class="col-xs-6">
            <label>Mes</label>
            <select id="mesbusqueda" class="form-control" style="width: 100%;" onchange="ConfigurarFecha()">
                <option value="" selected>Seleccione</option>
                <option value="01">Enero</option>
                <option value="02">Febrero</option>
                <option value="03">Marzo</option>
                <option value="04">Abril</option>
                <option value="05">Mayo</option>
                <option value="06">Junio</option>
                <option value="07">Julio</option>
                <option value="08">Agosto</option>
                <option value="09">Septiembre</option>
                <option value="10">Octubre</option>
                <option value="11">Noviembre</option>
                <option value="12">Diciembre</option>
            </select>
        </div>
        <div class="col-xs-6">
            <label>Año</label>
            <select id="anualbusqueda" class="form-control" style="width: 100%;" onchange="ConfigurarFecha()">
                <option value="" selected>Seleccione</option>
                <?php
                $anual = getdate();
                for ($i = $anual["year"]; $i >= 1900; $i--) {
                    echo "<option value='$i'>$i</option>";
                }
                ?>
            </select>
        </div>
    </div>

    <div class="col-xs-12" id="RangoFechasGuia" align="center">

    </div>

    <input type="hidden" class="form-control input-lg" name="tipo_reporte" value="<?= $_POST["Tipo"]; ?>" required>

    <script>
        $("#Form_Reportes").submit(function(event) {
            $("#Form_Reportes").attr('action', 'RP_ReportesModificados.php');
        });
    </script>

<?php
} elseif ($_POST["Tipo"] == "Auxiliar Cuenta Contable Por Tercero") {
?>

    <div class="col-xs-12">
        <label>Cliente/Proveedor</label>
        <select name="TipoCliente" id="TipoCliente" class="form-control" style="width: 100%;" onchange="TipoClienteBuscador()" required>
            <option value='0' selected>Todos</option>
            <option value='1'>Cliente</option>
            <option value='2'>Proveedor</option>
        </select>
    </div>
    <br>
    <div class="col-xs-12">
        <select name="Cliente" id="Cliente" class="form-control" style="width: 100%;" required>
            <!-- se llena por ajax -->
        </select>
    </div>

    <div class="col-xs-12">
        <label>Tipo de búsqueda</label>
        <select id="tipobusqueda" name="tipobusqueda" class="form-control" style="width: 100%;" onchange="TipoBusqueda(this.value)" required>
            <option value="Rango" selected>Rango</option>
            <option value="Mes">Mensual</option>
        </select>
    </div>

    <div class="col-xs-12" id="div_fechas" style="display:block;">
        <div class="col-xs-6">
            <label>Desde</label>
            <input type="date" class="form-control input-lg" name="desde" id="desde" required>
        </div>
        <div class="col-xs-6">
            <label>Hasta</label>
            <input type="date" class="form-control input-lg" name="hasta" id="hasta" required>
        </div>
    </div>

    <div class="col-xs-12" id="div_meses" style="display:none;">
        <div class="col-xs-6">
            <label>Mes</label>
            <select id="mesbusqueda" class="form-control" style="width: 100%;" onchange="ConfigurarFecha()">
                <option value="" selected>Seleccione</option>
                <option value="01">Enero</option>
                <option value="02">Febrero</option>
                <option value="03">Marzo</option>
                <option value="04">Abril</option>
                <option value="05">Mayo</option>
                <option value="06">Junio</option>
                <option value="07">Julio</option>
                <option value="08">Agosto</option>
                <option value="09">Septiembre</option>
                <option value="10">Octubre</option>
                <option value="11">Noviembre</option>
                <option value="12">Diciembre</option>
            </select>
        </div>
        <div class="col-xs-6">
            <label>Año</label>
            <select id="anualbusqueda" class="form-control" style="width: 100%;" onchange="ConfigurarFecha()">
                <option value="" selected>Seleccione</option>
                <?php
                $anual = getdate();
                for ($i = $anual["year"]; $i >= 1900; $i--) {
                    echo "<option value='$i'>$i</option>";
                }
                ?>
            </select>
        </div>
    </div>

    <div class="col-xs-12" id="RangoFechasGuia" align="center">

    </div>

    <input type="hidden" class="form-control input-lg" name="tipo_reporte" value="<?= $_POST["Tipo"]; ?>" required>

    <script>
        $("#Form_Reportes").submit(function(event) {
            $("#Form_Reportes").attr('action', 'RP_ReportesModificados.php');
        });

        function TipoClienteBuscador() {
            var valor = $("#TipoCliente").val();
            $.ajax({
                type: "POST",
                url: "RP_Ajax.php",
                data: {
                    Valor: valor,
                    TipoEspecial: "Busqueda Tipo Cliente"
                },
                success: function(response) {
                    $('#Cliente').html(response);
                    $('#Cliente').select2();
                }
            });
        }

        TipoClienteBuscador();
    </script>

<?php
} elseif ($_POST["Tipo"] == "Movimiento Facturas De Venta y Compra") {
?>

    <div class="col-xs-12">
        <label>Compras/Ventas</label>
        <select name="Tipo" id="Tipo" class="form-control" style="width: 100%;" required>
            <option value='1'>Venta</option>
            <option value='2'>Compra</option>
        </select>
    </div>
    <br>

    <div class="col-xs-12">
        <label>Tipo de búsqueda</label>
        <select id="tipobusqueda" name="tipobusqueda" class="form-control" style="width: 100%;" onchange="TipoBusqueda(this.value)" required>
            <option value="Rango" selected>Rango</option>
            <option value="Mes">Mensual</option>
        </select>
    </div>

    <div class="col-xs-12" id="div_fechas" style="display:block;">
        <div class="col-xs-6">
            <label>Desde</label>
            <input type="date" class="form-control input-lg" name="desde" id="desde" required>
        </div>
        <div class="col-xs-6">
            <label>Hasta</label>
            <input type="date" class="form-control input-lg" name="hasta" id="hasta" required>
        </div>
    </div>

    <div class="col-xs-12" id="div_meses" style="display:none;">
        <div class="col-xs-6">
            <label>Mes</label>
            <select id="mesbusqueda" class="form-control" style="width: 100%;" onchange="ConfigurarFecha()">
                <option value="" selected>Seleccione</option>
                <option value="01">Enero</option>
                <option value="02">Febrero</option>
                <option value="03">Marzo</option>
                <option value="04">Abril</option>
                <option value="05">Mayo</option>
                <option value="06">Junio</option>
                <option value="07">Julio</option>
                <option value="08">Agosto</option>
                <option value="09">Septiembre</option>
                <option value="10">Octubre</option>
                <option value="11">Noviembre</option>
                <option value="12">Diciembre</option>
            </select>
        </div>
        <div class="col-xs-6">
            <label>Año</label>
            <select id="anualbusqueda" class="form-control" style="width: 100%;" onchange="ConfigurarFecha()">
                <option value="" selected>Seleccione</option>
                <?php
                $anual = getdate();
                for ($i = $anual["year"]; $i >= 1900; $i--) {
                    echo "<option value='$i'>$i</option>";
                }
                ?>
            </select>
        </div>
    </div>

    <div class="col-xs-12" id="RangoFechasGuia" align="center">

    </div>

    <input type="hidden" class="form-control input-lg" name="tipo_reporte" value="<?= $_POST["Tipo"]; ?>" required>

    <script>
        $("#Form_Reportes").submit(function(event) {
            $("#Form_Reportes").attr('action', 'RP_ReportesModificados_Largos.php');
        });
    </script>

<?php
} elseif ($_POST["Tipo"] == "Recibos De Caja y Pagos") {
?>

    <div class="col-xs-12">
        <label>Tipo</label>
        <select name="Tipo" id="Tipo" class="form-control" style="width: 100%;" required>
            <option value='CxC'>Cuentas por Cobrar</option>
            <option value='CxP'>Cuentas por Pagar</option>
        </select>
    </div>
    <br>

    <div class="col-xs-12">
        <label>Tipo de búsqueda</label>
        <select id="tipobusqueda" name="tipobusqueda" class="form-control" style="width: 100%;" onchange="TipoBusqueda(this.value)" required>
            <option value="Rango" selected>Rango</option>
            <option value="Mes">Mensual</option>
        </select>
    </div>

    <div class="col-xs-12" id="div_fechas" style="display:block;">
        <div class="col-xs-6">
            <label>Desde</label>
            <input type="date" class="form-control input-lg" name="desde" id="desde" required>
        </div>
        <div class="col-xs-6">
            <label>Hasta</label>
            <input type="date" class="form-control input-lg" name="hasta" id="hasta" required>
        </div>
    </div>

    <div class="col-xs-12" id="div_meses" style="display:none;">
        <div class="col-xs-6">
            <label>Mes</label>
            <select id="mesbusqueda" class="form-control" style="width: 100%;" onchange="ConfigurarFecha()">
                <option value="" selected>Seleccione</option>
                <option value="01">Enero</option>
                <option value="02">Febrero</option>
                <option value="03">Marzo</option>
                <option value="04">Abril</option>
                <option value="05">Mayo</option>
                <option value="06">Junio</option>
                <option value="07">Julio</option>
                <option value="08">Agosto</option>
                <option value="09">Septiembre</option>
                <option value="10">Octubre</option>
                <option value="11">Noviembre</option>
                <option value="12">Diciembre</option>
            </select>
        </div>
        <div class="col-xs-6">
            <label>Año</label>
            <select id="anualbusqueda" class="form-control" style="width: 100%;" onchange="ConfigurarFecha()">
                <option value="" selected>Seleccione</option>
                <?php
                $anual = getdate();
                for ($i = $anual["year"]; $i >= 1900; $i--) {
                    echo "<option value='$i'>$i</option>";
                }
                ?>
            </select>
        </div>
    </div>

    <div class="col-xs-12" id="RangoFechasGuia" align="center">

    </div>

    <input type="hidden" class="form-control input-lg" name="tipo_reporte" value="<?= $_POST["Tipo"]; ?>" required>

    <script>
        $("#Form_Reportes").submit(function(event) {
            $("#Form_Reportes").attr('action', 'RP_ReportesModificados.php');
        });
    </script>

<?php
} elseif ($_POST["Tipo"] == "Recibos De Caja Detallado Por Facturas") {
?>
    <div class="col-xs-12">
        <label>Tipo de búsqueda</label>
        <select id="tipobusqueda" name="tipobusqueda" class="form-control" style="width: 100%;" onchange="TipoBusqueda(this.value)" required>
            <option value="Rango" selected>Rango</option>
            <option value="Mes">Mensual</option>
        </select>
    </div>

    <div class="col-xs-12" id="div_fechas" style="display:block;">
        <div class="col-xs-6">
            <label>Desde</label>
            <input type="date" class="form-control input-lg" name="desde" id="desde" required>
        </div>
        <div class="col-xs-6">
            <label>Hasta</label>
            <input type="date" class="form-control input-lg" name="hasta" id="hasta" required>
        </div>
    </div>

    <div class="col-xs-12" id="div_meses" style="display:none;">
        <div class="col-xs-6">
            <label>Mes</label>
            <select id="mesbusqueda" class="form-control" style="width: 100%;" onchange="ConfigurarFecha()">
                <option value="" selected>Seleccione</option>
                <option value="01">Enero</option>
                <option value="02">Febrero</option>
                <option value="03">Marzo</option>
                <option value="04">Abril</option>
                <option value="05">Mayo</option>
                <option value="06">Junio</option>
                <option value="07">Julio</option>
                <option value="08">Agosto</option>
                <option value="09">Septiembre</option>
                <option value="10">Octubre</option>
                <option value="11">Noviembre</option>
                <option value="12">Diciembre</option>
            </select>
        </div>
        <div class="col-xs-6">
            <label>Año</label>
            <select id="anualbusqueda" class="form-control" style="width: 100%;" onchange="ConfigurarFecha()">
                <option value="" selected>Seleccione</option>
                <?php
                $anual = getdate();
                for ($i = $anual["year"]; $i >= 1900; $i--) {
                    echo "<option value='$i'>$i</option>";
                }
                ?>
            </select>
        </div>
    </div>

    <div class="col-xs-12" id="RangoFechasGuia" align="center">

    </div>

    <input type="hidden" class="form-control input-lg" name="tipo_reporte" value="<?= $_POST["Tipo"]; ?>" required>

    <script>
        $("#Form_Reportes").submit(function(event) {
            $("#Form_Reportes").attr('action', 'RP_ReportesModificados.php');
        });
    </script>

<?php
} elseif ($_POST["Tipo"] == "Movimiento Auxiliar De Tercero Por Cuenta Contable") {
?>
    <div class="col-xs-12">
        <label>Cliente/Proveedor</label>
        <select name="TipoCliente" id="TipoCliente" class="form-control" style="width: 100%;" onchange="TipoClienteBuscador()" required>
            <option value='0' selected>Todos</option>
            <option value='1'>Cliente</option>
            <option value='2'>Proveedor</option>
        </select>
    </div>
    <br>
    <div class="col-xs-12">
        <select name="Cliente" id="Cliente" class="form-control" style="width: 100%;" required>
            <!-- se llena por ajax -->
        </select>
    </div>

    <div class="col-xs-12">
        <label>Tipo de búsqueda</label>
        <select id="tipobusqueda" name="tipobusqueda" class="form-control" style="width: 100%;" onchange="TipoBusqueda(this.value)" required>
            <option value="Rango" selected>Rango</option>
            <option value="Mes">Mensual</option>
        </select>
    </div>

    <div class="col-xs-12" id="div_fechas" style="display:block;">
        <div class="col-xs-6">
            <label>Desde</label>
            <input type="date" class="form-control input-lg" name="desde" id="desde" required>
        </div>
        <div class="col-xs-6">
            <label>Hasta</label>
            <input type="date" class="form-control input-lg" name="hasta" id="hasta" required>
        </div>
    </div>

    <div class="col-xs-12" id="div_meses" style="display:none;">
        <div class="col-xs-6">
            <label>Mes</label>
            <select id="mesbusqueda" class="form-control" style="width: 100%;" onchange="ConfigurarFecha()">
                <option value="" selected>Seleccione</option>
                <option value="01">Enero</option>
                <option value="02">Febrero</option>
                <option value="03">Marzo</option>
                <option value="04">Abril</option>
                <option value="05">Mayo</option>
                <option value="06">Junio</option>
                <option value="07">Julio</option>
                <option value="08">Agosto</option>
                <option value="09">Septiembre</option>
                <option value="10">Octubre</option>
                <option value="11">Noviembre</option>
                <option value="12">Diciembre</option>
            </select>
        </div>
        <div class="col-xs-6">
            <label>Año</label>
            <select id="anualbusqueda" class="form-control" style="width: 100%;" onchange="ConfigurarFecha()">
                <option value="" selected>Seleccione</option>
                <?php
                $anual = getdate();
                for ($i = $anual["year"]; $i >= 1900; $i--) {
                    echo "<option value='$i'>$i</option>";
                }
                ?>
            </select>
        </div>
    </div>

    <div class="col-xs-12" id="RangoFechasGuia" align="center">

    </div>

    <input type="hidden" class="form-control input-lg" name="tipo_reporte" value="<?= $_POST["Tipo"]; ?>" required>

    <script>
        $("#Form_Reportes").submit(function(event) {
            $("#Form_Reportes").attr('action', 'RP_ReportesModificados.php');
        });

        function TipoClienteBuscador() {
            var valor = $("#TipoCliente").val();
            $.ajax({
                type: "POST",
                url: "RP_Ajax.php",
                data: {
                    Valor: valor,
                    TipoEspecial: "Busqueda Tipo Cliente"
                },
                success: function(response) {
                    $('#Cliente').html(response);
                    $('#Cliente').select2();
                }
            });
        }

        TipoClienteBuscador();
    </script>

<?php
} elseif ($_POST["Tipo"] == "Movimiento Auxiliar De Gastos Por Cuenta Contable") {
?>
    <div class="col-xs-12">
        <label>Tipo de búsqueda</label>
        <select id="tipobusqueda" name="tipobusqueda" class="form-control" style="width: 100%;" onchange="TipoBusqueda(this.value)" required>
            <option value="Rango" selected>Rango</option>
            <option value="Mes">Mensual</option>
        </select>
    </div>

    <div class="col-xs-12" id="div_fechas" style="display:block;">
        <div class="col-xs-6">
            <label>Desde</label>
            <input type="date" class="form-control input-lg" name="desde" id="desde" required>
        </div>
        <div class="col-xs-6">
            <label>Hasta</label>
            <input type="date" class="form-control input-lg" name="hasta" id="hasta" required>
        </div>
    </div>

    <div class="col-xs-12" id="div_meses" style="display:none;">
        <div class="col-xs-6">
            <label>Mes</label>
            <select id="mesbusqueda" class="form-control" style="width: 100%;" onchange="ConfigurarFecha()">
                <option value="" selected>Seleccione</option>
                <option value="01">Enero</option>
                <option value="02">Febrero</option>
                <option value="03">Marzo</option>
                <option value="04">Abril</option>
                <option value="05">Mayo</option>
                <option value="06">Junio</option>
                <option value="07">Julio</option>
                <option value="08">Agosto</option>
                <option value="09">Septiembre</option>
                <option value="10">Octubre</option>
                <option value="11">Noviembre</option>
                <option value="12">Diciembre</option>
            </select>
        </div>
        <div class="col-xs-6">
            <label>Año</label>
            <select id="anualbusqueda" class="form-control" style="width: 100%;" onchange="ConfigurarFecha()">
                <option value="" selected>Seleccione</option>
                <?php
                $anual = getdate();
                for ($i = $anual["year"]; $i >= 1900; $i--) {
                    echo "<option value='$i'>$i</option>";
                }
                ?>
            </select>
        </div>
    </div>

    <div class="col-xs-12" id="RangoFechasGuia" align="center">

    </div>

    <input type="hidden" class="form-control input-lg" name="tipo_reporte" value="<?= $_POST["Tipo"]; ?>" required>

    <script>
        $("#Form_Reportes").submit(function(event) {
            $("#Form_Reportes").attr('action', 'RP_ReportesModificados.php');
        });
    </script>

<?php
} elseif ($_POST["Tipo"] == "Libro Diario") {
?>
    <div class="col-xs-12">
        <label>Tipo de búsqueda</label>
        <select id="tipobusqueda" name="tipobusqueda" class="form-control" style="width: 100%;" onchange="TipoBusqueda(this.value)" required>
            <option value="Rango" selected>Rango</option>
            <option value="Mes">Mensual</option>
        </select>
    </div>

    <div class="col-xs-12" id="div_fechas" style="display:block;">
        <div class="col-xs-6">
            <label>Desde</label>
            <input type="date" class="form-control input-lg" name="desde" id="desde" required>
        </div>
        <div class="col-xs-6">
            <label>Hasta</label>
            <input type="date" class="form-control input-lg" name="hasta" id="hasta" required>
        </div>
    </div>

    <div class="col-xs-12" id="div_meses" style="display:none;">
        <div class="col-xs-6">
            <label>Mes</label>
            <select id="mesbusqueda" class="form-control" style="width: 100%;" onchange="ConfigurarFecha()">
                <option value="" selected>Seleccione</option>
                <option value="01">Enero</option>
                <option value="02">Febrero</option>
                <option value="03">Marzo</option>
                <option value="04">Abril</option>
                <option value="05">Mayo</option>
                <option value="06">Junio</option>
                <option value="07">Julio</option>
                <option value="08">Agosto</option>
                <option value="09">Septiembre</option>
                <option value="10">Octubre</option>
                <option value="11">Noviembre</option>
                <option value="12">Diciembre</option>
            </select>
        </div>
        <div class="col-xs-6">
            <label>Año</label>
            <select id="anualbusqueda" class="form-control" style="width: 100%;" onchange="ConfigurarFecha()">
                <option value="" selected>Seleccione</option>
                <?php
                $anual = getdate();
                for ($i = $anual["year"]; $i >= 1900; $i--) {
                    echo "<option value='$i'>$i</option>";
                }
                ?>
            </select>
        </div>
    </div>

    <div class="col-xs-12" id="RangoFechasGuia" align="center">

    </div>

    <input type="hidden" class="form-control input-lg" name="tipo_reporte" value="<?= $_POST["Tipo"]; ?>" required>

    <script>
        $("#Form_Reportes").submit(function(event) {
            $("#Form_Reportes").attr('action', 'RP_ReportesModificados.php');
        });
    </script>

<?php
} elseif ($_POST["Tipo"] == "Libro Mayor y Balance") {
?>
    <div class="col-xs-12">
        <label>Tipo de búsqueda</label>
        <select id="tipobusqueda" name="tipobusqueda" class="form-control" style="width: 100%;" onchange="TipoBusqueda(this.value)" required>
            <option value="Rango" selected>Rango</option>
            <option value="Mes">Mensual</option>
        </select>
    </div>

    <div class="col-xs-12" id="div_fechas" style="display:block;">
        <div class="col-xs-6">
            <label>Desde</label>
            <input type="date" class="form-control input-lg" name="desde" id="desde" required>
        </div>
        <div class="col-xs-6">
            <label>Hasta</label>
            <input type="date" class="form-control input-lg" name="hasta" id="hasta" required>
        </div>
    </div>

    <div class="col-xs-12" id="div_meses" style="display:none;">
        <div class="col-xs-6">
            <label>Mes</label>
            <select id="mesbusqueda" class="form-control" style="width: 100%;" onchange="ConfigurarFecha()">
                <option value="" selected>Seleccione</option>
                <option value="01">Enero</option>
                <option value="02">Febrero</option>
                <option value="03">Marzo</option>
                <option value="04">Abril</option>
                <option value="05">Mayo</option>
                <option value="06">Junio</option>
                <option value="07">Julio</option>
                <option value="08">Agosto</option>
                <option value="09">Septiembre</option>
                <option value="10">Octubre</option>
                <option value="11">Noviembre</option>
                <option value="12">Diciembre</option>
            </select>
        </div>
        <div class="col-xs-6">
            <label>Año</label>
            <select id="anualbusqueda" class="form-control" style="width: 100%;" onchange="ConfigurarFecha()">
                <option value="" selected>Seleccione</option>
                <?php
                $anual = getdate();
                for ($i = $anual["year"]; $i >= 1900; $i--) {
                    echo "<option value='$i'>$i</option>";
                }
                ?>
            </select>
        </div>
    </div>

    <div class="col-xs-12" id="RangoFechasGuia" align="center">

    </div>

    <input type="hidden" class="form-control input-lg" name="tipo_reporte" value="<?= $_POST["Tipo"]; ?>" required>

    <script>
        $("#Form_Reportes").submit(function(event) {
            $("#Form_Reportes").attr('action', 'RP_ReportesModificados.php');
        });
    </script>

<?php
} elseif ($_POST["Tipo"] == "Comprobante Por Tipo De Impuesto") {
?>

    <div class="col-xs-12">
        <label>Tipo</label>
        <select name="TipoComprobante" id="TipoComprobante" class="form-control" style="width: 100%;" required>
            <option value='0' selected>Ventas/Compras</option>
            <option value='1'>Ventas</option>
            <option value='2'>Compras</option>
        </select>
    </div>

    <div class="col-xs-12">
        <label>Tipo de búsqueda</label>
        <select id="tipobusqueda" name="tipobusqueda" class="form-control" style="width: 100%;" onchange="TipoBusqueda(this.value)" required>
            <option value="Rango" selected>Rango</option>
            <option value="Mes">Mensual</option>
        </select>
    </div>

    <div class="col-xs-12" id="div_fechas" style="display:block;">
        <div class="col-xs-6">
            <label>Desde</label>
            <input type="date" class="form-control input-lg" name="desde" id="desde" required>
        </div>
        <div class="col-xs-6">
            <label>Hasta</label>
            <input type="date" class="form-control input-lg" name="hasta" id="hasta" required>
        </div>
    </div>

    <div class="col-xs-12" id="div_meses" style="display:none;">
        <div class="col-xs-6">
            <label>Mes</label>
            <select id="mesbusqueda" class="form-control" style="width: 100%;" onchange="ConfigurarFecha()">
                <option value="" selected>Seleccione</option>
                <option value="01">Enero</option>
                <option value="02">Febrero</option>
                <option value="03">Marzo</option>
                <option value="04">Abril</option>
                <option value="05">Mayo</option>
                <option value="06">Junio</option>
                <option value="07">Julio</option>
                <option value="08">Agosto</option>
                <option value="09">Septiembre</option>
                <option value="10">Octubre</option>
                <option value="11">Noviembre</option>
                <option value="12">Diciembre</option>
            </select>
        </div>
        <div class="col-xs-6">
            <label>Año</label>
            <select id="anualbusqueda" class="form-control" style="width: 100%;" onchange="ConfigurarFecha()">
                <option value="" selected>Seleccione</option>
                <?php
                $anual = getdate();
                for ($i = $anual["year"]; $i >= 1900; $i--) {
                    echo "<option value='$i'>$i</option>";
                }
                ?>
            </select>
        </div>
    </div>

    <div class="col-xs-12" id="RangoFechasGuia" align="center">

    </div>

    <input type="hidden" class="form-control input-lg" name="tipo_reporte" value="<?= $_POST["Tipo"]; ?>" required>

    <script>
        $("#Form_Reportes").submit(function(event) {
            $("#Form_Reportes").attr('action', 'RP_ReportesModificados.php');
        });
    </script>

<?php
} elseif ($_POST["Tipo"] == "Informe Impuesto Detallado") {
?>

    <div class="col-xs-12">
        <label>Tipo</label>
        <select name="TipoComprobante" id="TipoComprobante" class="form-control" style="width: 100%;" required>
            <option value='0' selected>Ventas/Compras</option>
            <option value='1'>Ventas</option>
            <option value='2'>Compras</option>
        </select>
    </div>

    <div class="col-xs-12">
        <label>Tipo de búsqueda</label>
        <select id="tipobusqueda" name="tipobusqueda" class="form-control" style="width: 100%;" onchange="TipoBusqueda(this.value)" required>
            <option value="Rango" selected>Rango</option>
            <option value="Mes">Mensual</option>
        </select>
    </div>

    <div class="col-xs-12" id="div_fechas" style="display:block;">
        <div class="col-xs-6">
            <label>Desde</label>
            <input type="date" class="form-control input-lg" name="desde" id="desde" required>
        </div>
        <div class="col-xs-6">
            <label>Hasta</label>
            <input type="date" class="form-control input-lg" name="hasta" id="hasta" required>
        </div>
    </div>

    <div class="col-xs-12" id="div_meses" style="display:none;">
        <div class="col-xs-6">
            <label>Mes</label>
            <select id="mesbusqueda" class="form-control" style="width: 100%;" onchange="ConfigurarFecha()">
                <option value="" selected>Seleccione</option>
                <option value="01">Enero</option>
                <option value="02">Febrero</option>
                <option value="03">Marzo</option>
                <option value="04">Abril</option>
                <option value="05">Mayo</option>
                <option value="06">Junio</option>
                <option value="07">Julio</option>
                <option value="08">Agosto</option>
                <option value="09">Septiembre</option>
                <option value="10">Octubre</option>
                <option value="11">Noviembre</option>
                <option value="12">Diciembre</option>
            </select>
        </div>
        <div class="col-xs-6">
            <label>Año</label>
            <select id="anualbusqueda" class="form-control" style="width: 100%;" onchange="ConfigurarFecha()">
                <option value="" selected>Seleccione</option>
                <?php
                $anual = getdate();
                for ($i = $anual["year"]; $i >= 1900; $i--) {
                    echo "<option value='$i'>$i</option>";
                }
                ?>
            </select>
        </div>
    </div>

    <div class="col-xs-12" id="RangoFechasGuia" align="center">

    </div>

    <input type="hidden" class="form-control input-lg" name="tipo_reporte" value="<?= $_POST["Tipo"]; ?>" required>

    <script>
        $("#Form_Reportes").submit(function(event) {
            $("#Form_Reportes").attr('action', 'RP_ReportesModificados.php');
        });
    </script>

<?php
} elseif ($_POST["Tipo"] == "Cuentas Por Pagar Detallada Por Proveedor") {
?>
    <div class="col-xs-12">
        <label>Proveedores</label>
        <select id="proveedor" name="proveedor" class="form-control" style="width: 100%;" required>
            <option value="" selected="selected">Seleccione </option>
            <option value="Todos">Todos </option>
            <?php
            $queryList = mysqli_query($conn3, "SELECT * FROM sproveedores order by nombre");
            $nrowl = mysqli_num_rows($queryList);
            while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                $rut     = $row_recordset32['rut'];
                $nombre  = $row_recordset32['nombre'];
                $id      = $row_recordset32['id'];
                echo "<option value='$id'>$rut | $nombre  </option>";
            }
            ?>

        </select>
    </div>

    <div class="col-xs-12">
        <label>Tipo de búsqueda</label>
        <select id="tipobusqueda" name="tipobusqueda" class="form-control" style="width: 100%;" onchange="TipoBusqueda(this.value)" required>
            <option value="Rango" selected>Rango</option>
            <option value="Mes">Mensual</option>
        </select>
    </div>

    <div class="col-xs-12" id="div_fechas" style="display:block;">
        <div class="col-xs-6">
            <label>Desde</label>
            <input type="date" class="form-control input-lg" name="desde" id="desde" required>
        </div>
        <div class="col-xs-6">
            <label>Hasta</label>
            <input type="date" class="form-control input-lg" name="hasta" id="hasta" required>
        </div>
    </div>

    <div class="col-xs-12" id="div_meses" style="display:none;">
        <div class="col-xs-6">
            <label>Mes</label>
            <select id="mesbusqueda" class="form-control" style="width: 100%;" onchange="ConfigurarFecha()">
                <option value="" selected>Seleccione</option>
                <option value="01">Enero</option>
                <option value="02">Febrero</option>
                <option value="03">Marzo</option>
                <option value="04">Abril</option>
                <option value="05">Mayo</option>
                <option value="06">Junio</option>
                <option value="07">Julio</option>
                <option value="08">Agosto</option>
                <option value="09">Septiembre</option>
                <option value="10">Octubre</option>
                <option value="11">Noviembre</option>
                <option value="12">Diciembre</option>
            </select>
        </div>
        <div class="col-xs-6">
            <label>Año</label>
            <select id="anualbusqueda" class="form-control" style="width: 100%;" onchange="ConfigurarFecha()">
                <option value="" selected>Seleccione</option>
                <?php
                $anual = getdate();
                for ($i = $anual["year"]; $i >= 1900; $i--) {
                    echo "<option value='$i'>$i</option>";
                }
                ?>
            </select>
        </div>
    </div>

    <div class="col-xs-12" id="RangoFechasGuia" align="center">

    </div>

    <input type="hidden" class="form-control input-lg" name="tipo_reporte" value="<?= $_POST["Tipo"]; ?>" required>

    <script>
        $("#Form_Reportes").submit(function(event) {
            $("#Form_Reportes").attr('action', 'RP_ReportesModificados.php');
        });
    </script>

<?php
} elseif ($_POST["Tipo"] == "Cuentas Por Pagar Por Centro De Costo") {
?>
    <div class="col-xs-12">
        <label>Centro de Costo</label>
        <select id="centrocosto" name="centrocosto" class="form-control" style="width: 100%;">
                <option value="Todos" selected="selected">Todos </option>
                <option value="0" >Sin centro de costo </option>
            <?php
            $queryListCentro = mysqli_query($conn3, "SELECT * from CcentroCostos");
            $nrowl = mysqli_num_rows($queryListCentro);
            while ($rowCentro = mysqli_fetch_array($queryListCentro)) {

                $idCentro = $rowCentro['id'];
                $codigoCentro = $rowCentro['codigo'];
                $descripcionCentro = $rowCentro['descripcion'];

                echo '<option value="' . $idCentro . '">' . $codigoCentro . '-' . $descripcionCentro . '</option>';
            }
            ?>

        </select>
    </div>

    <div class="col-xs-12">
        <label>Tipo de búsqueda</label>
        <select id="tipobusqueda" name="tipobusqueda" class="form-control" style="width: 100%;" onchange="TipoBusqueda(this.value)" required>
            <option value="Rango" selected>Rango</option>
            <option value="Mes">Mensual</option>
        </select>
    </div>

    <div class="col-xs-12" id="div_fechas" style="display:block;">
        <div class="col-xs-6">
            <label>Desde</label>
            <input type="date" class="form-control input-lg" name="desde" id="desde" required>
        </div>
        <div class="col-xs-6">
            <label>Hasta</label>
            <input type="date" class="form-control input-lg" name="hasta" id="hasta" required>
        </div>
    </div>

    <div class="col-xs-12" id="div_meses" style="display:none;">
        <div class="col-xs-6">
            <label>Mes</label>
            <select id="mesbusqueda" class="form-control" style="width: 100%;" onchange="ConfigurarFecha()">
                <option value="" selected>Seleccione</option>
                <option value="01">Enero</option>
                <option value="02">Febrero</option>
                <option value="03">Marzo</option>
                <option value="04">Abril</option>
                <option value="05">Mayo</option>
                <option value="06">Junio</option>
                <option value="07">Julio</option>
                <option value="08">Agosto</option>
                <option value="09">Septiembre</option>
                <option value="10">Octubre</option>
                <option value="11">Noviembre</option>
                <option value="12">Diciembre</option>
            </select>
        </div>
        <div class="col-xs-6">
            <label>Año</label>
            <select id="anualbusqueda" class="form-control" style="width: 100%;" onchange="ConfigurarFecha()">
                <option value="" selected>Seleccione</option>
                <?php
                $anual = getdate();
                for ($i = $anual["year"]; $i >= 1900; $i--) {
                    echo "<option value='$i'>$i</option>";
                }
                ?>
            </select>
        </div>
    </div>

    <div class="col-xs-12" id="RangoFechasGuia" align="center">

    </div>

    <input type="hidden" class="form-control input-lg" name="tipo_reporte" value="<?= $_POST["Tipo"]; ?>" required>

    <script>
        $("#Form_Reportes").submit(function(event) {
            $("#Form_Reportes").attr('action', 'RP_ReportesModificados.php');
        });
    </script>

<?php
} elseif ($_POST["Tipo"] == "Compras Por Producto Por Proveedor") {
?>
    <div class="col-xs-12">
        <label>Proveedores</label>
        <select id="proveedor" name="proveedor" class="form-control" style="width: 100%;" required>
            <option value="" selected="selected">Seleccione </option>
            <option value="Todos">Todos </option>
            <?php
            $queryList = mysqli_query($conn3, "SELECT * FROM sproveedores order by nombre");
            $nrowl = mysqli_num_rows($queryList);
            while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                $rut     = $row_recordset32['rut'];
                $nombre  = $row_recordset32['nombre'];
                $id      = $row_recordset32['id'];
                echo "<option value='$id'>$rut | $nombre  </option>";
            }
            ?>

        </select>
    </div>

    <div class="col-xs-12">
        <label>Tipo de búsqueda</label>
        <select id="tipobusqueda" name="tipobusqueda" class="form-control" style="width: 100%;" onchange="TipoBusqueda(this.value)" required>
            <option value="Rango" selected>Rango</option>
            <option value="Mes">Mensual</option>
        </select>
    </div>

    <div class="col-xs-12" id="div_fechas" style="display:block;">
        <div class="col-xs-6">
            <label>Desde</label>
            <input type="date" class="form-control input-lg" name="desde" id="desde" required>
        </div>
        <div class="col-xs-6">
            <label>Hasta</label>
            <input type="date" class="form-control input-lg" name="hasta" id="hasta" required>
        </div>
    </div>

    <div class="col-xs-12" id="div_meses" style="display:none;">
        <div class="col-xs-6">
            <label>Mes</label>
            <select id="mesbusqueda" class="form-control" style="width: 100%;" onchange="ConfigurarFecha()">
                <option value="" selected>Seleccione</option>
                <option value="01">Enero</option>
                <option value="02">Febrero</option>
                <option value="03">Marzo</option>
                <option value="04">Abril</option>
                <option value="05">Mayo</option>
                <option value="06">Junio</option>
                <option value="07">Julio</option>
                <option value="08">Agosto</option>
                <option value="09">Septiembre</option>
                <option value="10">Octubre</option>
                <option value="11">Noviembre</option>
                <option value="12">Diciembre</option>
            </select>
        </div>
        <div class="col-xs-6">
            <label>Año</label>
            <select id="anualbusqueda" class="form-control" style="width: 100%;" onchange="ConfigurarFecha()">
                <option value="" selected>Seleccione</option>
                <?php
                $anual = getdate();
                for ($i = $anual["year"]; $i >= 1900; $i--) {
                    echo "<option value='$i'>$i</option>";
                }
                ?>
            </select>
        </div>
    </div>

    <div class="col-xs-12" id="RangoFechasGuia" align="center">

    </div>

    <input type="hidden" class="form-control input-lg" name="tipo_reporte" value="<?= $_POST["Tipo"]; ?>" required>

    <script>
        $("#Form_Reportes").submit(function(event) {
            $("#Form_Reportes").attr('action', 'RP_ReportesModificados.php');
        });
    </script>

<?php
} elseif ($_POST["Tipo"] == "Auxiliar Cuenta Contable") {
    ?>
        <div class="col-xs-12">
            <label>Cuenta Contable</label>
            <select name="CuentaContable" id="CuentaContable" class="form-control" style="width: 100%;" required>
                <option value="Todos" selected>Todos</option>
                <?php
                $conn4 = $conn3;
                mysqli_set_charset($conn4, "utf8");
                $queryList = mysqli_query($conn4, "SELECT * FROM  CCuentas");
                while ($row_recordset32A = mysqli_fetch_array($queryList)) {
                    $id = $row_recordset32A['id'];
                    $descripcion = $row_recordset32A['descripcion'];
                    echo "<option value='$id'> $id | $descripcion </option>";
                }
                ?>
            </select>
        </div>
    
        <div class="col-xs-12">
            <label>Tipo de búsqueda</label>
            <select id="tipobusqueda" name="tipobusqueda" class="form-control" style="width: 100%;" onchange="TipoBusqueda(this.value)" required>
                <option value="Rango" selected>Rango</option>
                <option value="Mes">Mensual</option>
            </select>
        </div>
    
        <div class="col-xs-12" id="div_fechas" style="display:block;">
            <div class="col-xs-6">
                <label>Desde</label>
                <input type="date" class="form-control input-lg" name="desde" id="desde" required>
            </div>
            <div class="col-xs-6">
                <label>Hasta</label>
                <input type="date" class="form-control input-lg" name="hasta" id="hasta" required>
            </div>
        </div>
    
        <div class="col-xs-12" id="div_meses" style="display:none;">
            <div class="col-xs-6">
                <label>Mes</label>
                <select id="mesbusqueda" class="form-control" style="width: 100%;" onchange="ConfigurarFecha()">
                    <option value="" selected>Seleccione</option>
                    <option value="01">Enero</option>
                    <option value="02">Febrero</option>
                    <option value="03">Marzo</option>
                    <option value="04">Abril</option>
                    <option value="05">Mayo</option>
                    <option value="06">Junio</option>
                    <option value="07">Julio</option>
                    <option value="08">Agosto</option>
                    <option value="09">Septiembre</option>
                    <option value="10">Octubre</option>
                    <option value="11">Noviembre</option>
                    <option value="12">Diciembre</option>
                </select>
            </div>
            <div class="col-xs-6">
                <label>Año</label>
                <select id="anualbusqueda" class="form-control" style="width: 100%;" onchange="ConfigurarFecha()">
                    <option value="" selected>Seleccione</option>
                    <?php
                    $anual = getdate();
                    for ($i = $anual["year"]; $i >= 1900; $i--) {
                        echo "<option value='$i'>$i</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
    
        <div class="col-xs-12" id="RangoFechasGuia" align="center">
    
        </div>
    
        <input type="hidden" class="form-control input-lg" name="tipo_reporte" value="<?= $_POST["Tipo"]; ?>" required>
    
        <script>
            $("#Form_Reportes").submit(function(event) {
                $("#Form_Reportes").attr('action', 'RP_ReportesModificados.php');
            });
        </script>
    
<?php
} elseif ($_POST["Tipo"] == "Auxiliar Cuenta Contable Por Centro De Costo") {
    ?>
        <div class="col-xs-12">
            <label>Cuenta Contable</label>
            <select name="CuentaContable" id="CuentaContable" class="form-control" style="width: 100%;" required>
                <option value="Todos" selected>Todos</option>
                <?php
                $conn4 = $conn3;
                mysqli_set_charset($conn4, "utf8");
                $queryList = mysqli_query($conn4, "SELECT * FROM  CCuentas");
                while ($row_recordset32A = mysqli_fetch_array($queryList)) {
                    $id = $row_recordset32A['id'];
                    $descripcion = $row_recordset32A['descripcion'];
                    echo "<option value='$id'> $id | $descripcion </option>";
                }
                ?>
            </select>
        </div>

        <div class="col-xs-12">
            <label>Centro de Costo</label>
            <select id="centrocosto" name="centrocosto" class="form-control" style="width: 100%;">
                <option value="Todos" selected="selected">Todos </option>
                <option value="0" >Sin centro de costo </option>
                
                <?php
                $queryListCentro = mysqli_query($conn3, "SELECT * from CcentroCostos");
                $nrowl = mysqli_num_rows($queryListCentro);
                while ($rowCentro = mysqli_fetch_array($queryListCentro)) {

                    $idCentro = $rowCentro['id'];
                    $codigoCentro = $rowCentro['codigo'];
                    $descripcionCentro = $rowCentro['descripcion'];

                    echo '<option value="' . $idCentro . '">' . $codigoCentro . '-' . $descripcionCentro . '</option>';
                }
                ?>

            </select>
        </div>

    
        <div class="col-xs-12">
            <label>Tipo de búsqueda</label>
            <select id="tipobusqueda" name="tipobusqueda" class="form-control" style="width: 100%;" onchange="TipoBusqueda(this.value)" required>
                <option value="Rango" selected>Rango</option>
                <option value="Mes">Mensual</option>
            </select>
        </div>
    
        <div class="col-xs-12" id="div_fechas" style="display:block;">
            <div class="col-xs-6">
                <label>Desde</label>
                <input type="date" class="form-control input-lg" name="desde" id="desde" required>
            </div>
            <div class="col-xs-6">
                <label>Hasta</label>
                <input type="date" class="form-control input-lg" name="hasta" id="hasta" required>
            </div>
        </div>
    
        <div class="col-xs-12" id="div_meses" style="display:none;">
            <div class="col-xs-6">
                <label>Mes</label>
                <select id="mesbusqueda" class="form-control" style="width: 100%;" onchange="ConfigurarFecha()">
                    <option value="" selected>Seleccione</option>
                    <option value="01">Enero</option>
                    <option value="02">Febrero</option>
                    <option value="03">Marzo</option>
                    <option value="04">Abril</option>
                    <option value="05">Mayo</option>
                    <option value="06">Junio</option>
                    <option value="07">Julio</option>
                    <option value="08">Agosto</option>
                    <option value="09">Septiembre</option>
                    <option value="10">Octubre</option>
                    <option value="11">Noviembre</option>
                    <option value="12">Diciembre</option>
                </select>
            </div>
            <div class="col-xs-6">
                <label>Año</label>
                <select id="anualbusqueda" class="form-control" style="width: 100%;" onchange="ConfigurarFecha()">
                    <option value="" selected>Seleccione</option>
                    <?php
                    $anual = getdate();
                    for ($i = $anual["year"]; $i >= 1900; $i--) {
                        echo "<option value='$i'>$i</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
    
        <div class="col-xs-12" id="RangoFechasGuia" align="center">
    
        </div>
    
        <input type="hidden" class="form-control input-lg" name="tipo_reporte" value="<?= $_POST["Tipo"]; ?>" required>
    
        <script>
            $("#Form_Reportes").submit(function(event) {
                $("#Form_Reportes").attr('action', 'RP_ReportesModificados.php');
            });
        </script>
    
<?php
} elseif ($_POST["Tipo"] == "Comprobante Informe Diario") {
    ?>
        <div class="col-xs-12">
            <label>Fecha</label>
            <input type="date" class="form-control input-lg" name="fecha" id="fecha" required>
        </div>

        <div class="col-xs-12">
            <label>Hora</label>
            <input type="time" class="form-control input-lg" name="hora" id="hora" required>
        </div>
    
        <input type="hidden" class="form-control input-lg" name="tipo_reporte" value="<?= $_POST["Tipo"]; ?>" required>
    
        <script>
            $("#Form_Reportes").submit(function(event) {
                $("#Form_Reportes").attr('action', 'RP_ReporteInformeDiario.php');
            });
        </script>
    
<?php
}
?>