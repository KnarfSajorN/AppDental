<?php
include("funciones/conn3.php");

function funcionMaster($filtro, $campoFiltrar, $campoImprimir, $tabla)
{
    include 'funciones/conn3.php';
    $query = mysqli_query($conn3, "SELECT * FROM $tabla where $campoFiltrar = '$filtro'");
    $nrowl = mysqli_num_rows($query);
    while ($row = mysqli_fetch_array($query)) {

        $text = $row[$campoImprimir];
    }
    return  $text;
}

function DatosIngresarMysqli($valor)
{
    include "funciones/conn3.php";
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
}

if ($_POST["Tipo"] == "Movimiento auxiliar de Activos Fijos") {
?>
    <!-- <div class="col-xs-12">
        <label>Fecha Impresion</label>
        <input type="date" class="form-control input-lg" name="fechaImpresion" id="fechaImpresion" value="<?= Date("Y-m-d") ?>">
    </div> -->

    <div class="col-xs-12">
        <label>Tipo de busqueda</label>
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
                <option value="" selected>Selecione</option>
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
            $("#Form_Reportes").attr('action', 'RP_ReportesModificados_2.php?Tipo=Libro de Inventario y Balance');
        });
    </script>
<?php
} else if ($_POST["Tipo"] == "Estado de resultado integral por naturaleza de gasto") {
?>
    <div class="col-xs-12">
        <label>Tipo de busqueda</label>
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
            $("#Form_Reportes").attr('action', 'RP_ReportesModificados_2.php?Tipo=Estado Resultado Integral');
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
}

if ($_POST["Tipo"] == "Resumen Forma de Pago") {
?>
    <!-- <div class="col-xs-12">
            <label>Fecha Impresion</label>
            <input type="date" class="form-control input-lg" name="fechaImpresion" id="fechaImpresion" value="<?= Date("Y-m-d") ?>">
        </div> -->

    <div class="col-xs-12">
        <label> Forma de Pago</label>
        <select id="tipoPago" name="tipoPago" class="form-control" style="width: 100%;" required="required">
            <option value="Todos" selected="selected">Todos</option>
                          <?php
                          $QueryMetodosDePago = mysqli_query($conn3, "SELECT * from FormasDePago WHERE Activo = 1");
                          while ($RowPago = mysqli_fetch_array($QueryMetodosDePago)) {
                            $Codigo = $RowPago['Codigo'];
                            $Nombre = $RowPago['Nombre'];
                            echo '<option value="' . $Codigo . '">' . $Nombre . '</option>';
                          }
                          ?>
            <!--
            <option value="Efectivo">Efectivo</option>
            <option value="Tarjeta de d&eacutebito">Tarjeta de d&eacutebito</option>
            <option value="Tarjeta de cr&eacutedito">Tarjeta de cr&eacutedito</option>
            <option value="Consignaci&oacuten">Consignaci&oacuten </option>
            <option value="Banco">Banco </option>
            <option value="Cheque">Cheque </option>
            <option value="Transferencia">Transferencia </option>
            -->
        </select>
    </div>

    <div class="col-xs-12">
        <label>Tipo de busqueda</label>
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
                <option value="" selected>Selecione</option>
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
            $("#Form_Reportes").attr('action', 'RP_ReportesModificados_2.php');
        });
    </script>
<?php
}
if ($_POST["Tipo"] == "Movimiento Auxiliar de Cartera por Cuenta Contable") {
?>
    <div class="col-xs-12">
        <label>Tipo de busqueda</label>
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
                <option value="" selected>Selecione</option>
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
            $("#Form_Reportes").attr('action', 'RP_ReportesModificados_2.php');
        });
    </script>
<?php
}
if ($_POST["Tipo"] == "Cartera por Centro de Costo") {
?>
    <div class="col-xs-12">
        <label>Tipo de busqueda</label>
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
                <option value="" selected>Selecione</option>
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
            $("#Form_Reportes").attr('action', 'RP_ReportesModificados_2.php');
        });
    </script>
<?php
}
if ($_POST["Tipo"] == "Balance de prueba por Tercero") {
?>
    <div class="col-xs-12">
        <label>Tipo Tercero</label>
        <select id="tercero" name="tercero" class="form-control" style="width: 100%;" required>
            <option value="0" selected>Todos</option>
            <option value="1">Clientes</option>
            <option value="2">Proveedores</option>
        </select>
    </div>
    <div class="col-xs-12">
        <label>Tipo de busqueda</label>
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
                <option value="" selected>Selecione</option>
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
            $("#Form_Reportes").attr('action', 'RP_ReportesModificados_2.php');
        });
    </script>
<?php
}
if ($_POST["Tipo"] == "Balance de prueba por Centro de Costo") {
?>
    <div class="col-xs-12">
        <label>Tipo Tercero</label>
        <select id="centroCosto" name="centroCosto" class="form-control" style="width: 100%;" required>
            <option value="0" selected>Todos</option>
            <?php
            $centroCosto = mysqli_query($conn3, "SELECT * FROM CcentroCostos");
            while ($row = mysqli_fetch_assoc($centroCosto)) {
                echo "<option value='{$row['id']}'>{$row['descripcion']}</option>";
            }
            ?>
        </select>
    </div>

    <div class="col-xs-12">
        <label>Tipo de busqueda</label>
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
                <option value="" selected>Selecione</option>
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
            $("#Form_Reportes").attr('action', 'RP_ReportesModificados_2.php');
        });
    </script>
<?php
}
