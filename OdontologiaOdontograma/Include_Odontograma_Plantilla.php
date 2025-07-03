<?php
// $cliente_id = decrypt($_GET['cI']);

$usuario_id = $_SESSION['ID'];

$QueryOdontograma = "SELECT * FROM OD_OdontogramaMaster_Fin WHERE historia_bo_id= '{$ID}' "; 
$ResultOdontograma = mysqli_query($conn3, $QueryOdontograma) or die("Error al consultar odontograma => " . (mysqli_error($conn3)));
$RowOdontograma = mysqli_fetch_array($ResultOdontograma);

?>

<!-- Content Wrapper. Contains page content -->
<!-- Content Header (Page header) -->

<!-- Main content -->
<section class="content">
    <div class="">
        <div class="content">
            <div class="box-body">
                <div class='col-md-12 row'>
                    <?php
                    // Definir los arreglos de dientes
                    $ArregloArriba1 = [["18", "17", "16", "15", "14", "13", "12", "11"], ["21", "22", "23", "24", "25", "26", "27", "28"]];
                    $ArregloArriba2 = [["Vacio", "55", "54", "53", "52", "51", "Vacio", "Vacio"], ["Vacio","61", "62", "63", "64", "65", "Vacio", "Vacio"]];
                    $ArregloAbajo1 = [["Vacio", "85", "84", "83", "82", "81" ,"Vacio", "Vacio"], ["Vacio","71", "72", "73", "74", "75", "Vacio", "Vacio"]];
                    $ArregloAbajo2 = [["48", "47", "46", "45", "44", "43", "42", "41"], ["31", "32", "33", "34", "35", "36", "37", "38"]];

                    // Función para generar las filas de la tabla
                    function generarFilas($dientes, $RowOdontograma) {
                        foreach ($dientes as $grupo) {
                            echo "<tr>";
                            foreach ($grupo as $diente) {
                                if ($diente == "Vacio") {
                                    echo "<td></td>";
                                } else {
                                    $ArregloD = json_decode($RowOdontograma["d$diente"], true);
                                    $ArregloR = json_decode($RowOdontograma["r$diente"], true);

                                    // Obtener los SVG y colores para cada posición del diente
                                    $SVG_RecuadroSuperior = funcionMaster(funcionMaster($ArregloD[0], 'id', 'Icono', 'OD_Procedimiento'), 'id', 'SVG', 'OD_Iconos_SVG');
                                    $Color_RecuadroSuperior = funcionMaster($ArregloD[0], 'id', 'Color', 'OD_Procedimiento');
                                    $SVG_RecuadroSuperior = str_replace('fill="currentColor"', "fill='{$Color_RecuadroSuperior}'", $SVG_RecuadroSuperior);

                                    $SVG_RecuadroIzquierdo = funcionMaster(funcionMaster($ArregloD[1], 'id', 'Icono', 'OD_Procedimiento'), 'id', 'SVG', 'OD_Iconos_SVG');
                                    $Color_RecuadroIzquierdo = funcionMaster($ArregloD[1], 'id', 'Color', 'OD_Procedimiento');
                                    $SVG_RecuadroIzquierdo = str_replace('fill="currentColor"', "fill='{$Color_RecuadroIzquierdo}'", $SVG_RecuadroIzquierdo);

                                    $SVG_RecuadroInferior = funcionMaster(funcionMaster($ArregloD[2], 'id', 'Icono', 'OD_Procedimiento'), 'id', 'SVG', 'OD_Iconos_SVG');
                                    $Color_RecuadroInferior = funcionMaster($ArregloD[2], 'id', 'Color', 'OD_Procedimiento');
                                    $SVG_RecuadroInferior = str_replace('fill="currentColor"', "fill='{$Color_RecuadroInferior}'", $SVG_RecuadroInferior);

                                    $SVG_RecuadroDerecha = funcionMaster(funcionMaster($ArregloD[3], 'id', 'Icono', 'OD_Procedimiento'), 'id', 'SVG', 'OD_Iconos_SVG');
                                    $Color_RecuadroDerecha = funcionMaster($ArregloD[3], 'id', 'Color', 'OD_Procedimiento');
                                    $SVG_RecuadroDerecha = str_replace('fill="currentColor"', "fill='{$Color_RecuadroDerecha}'", $SVG_RecuadroDerecha);

                                    $SVG_RecuadroCentro = funcionMaster(funcionMaster($ArregloD[4], 'id', 'Icono', 'OD_Procedimiento'), 'id', 'SVG', 'OD_Iconos_SVG');
                                    $Color_RecuadroCentro = funcionMaster($ArregloD[4], 'id', 'Color', 'OD_Procedimiento');
                                    $SVG_RecuadroCentro = str_replace('fill="currentColor"', "fill='{$Color_RecuadroCentro}'", $SVG_RecuadroCentro);

                                    $SVG_RecuadroSeparadoSuperior = funcionMaster(funcionMaster($ArregloD[5], 'id', 'Icono', 'OD_Procedimiento'), 'id', 'SVG', 'OD_Iconos_SVG');
                                    $Color_RecuadroSeparadoSuperior = funcionMaster($ArregloD[5], 'id', 'Color', 'OD_Procedimiento');
                                    $SVG_RecuadroSeparadoSuperior = str_replace('fill="currentColor"', "fill='{$Color_RecuadroSeparadoSuperior}'", $SVG_RecuadroSeparadoSuperior);

                                    $SVG_RecuadroSeparadoInferior = funcionMaster(funcionMaster($ArregloD[6], 'id', 'Icono', 'OD_Procedimiento'), 'id', 'SVG', 'OD_Iconos_SVG');
                                    $Color_RecuadroSeparadoInferior = funcionMaster($ArregloD[6], 'id', 'Color', 'OD_Procedimiento');
                                    $SVG_RecuadroSeparadoInferior = str_replace('fill="currentColor"', "fill='{$Color_RecuadroSeparadoInferior}'", $SVG_RecuadroSeparadoInferior);

                                    $SVG_RecuadroSuperior = base64_encode($SVG_RecuadroSuperior);
                                    $SVG_RecuadroIzquierdo = base64_encode($SVG_RecuadroIzquierdo);
                                    $SVG_RecuadroInferior = base64_encode($SVG_RecuadroInferior);
                                    $SVG_RecuadroDerecha = base64_encode($SVG_RecuadroDerecha);
                                    $SVG_RecuadroCentro = base64_encode($SVG_RecuadroCentro);
                                    $SVG_RecuadroSeparadoSuperior = base64_encode($SVG_RecuadroSeparadoSuperior);
                                    $SVG_RecuadroSeparadoInferior = base64_encode($SVG_RecuadroSeparadoInferior);

                                    // Mostrar la fila en la tabla
                                    // <div class='diente_img'>
                                    //             <img src='".$Base."OD_ImagenOdontograma/{$diente}.png'>
                                    //         </div>
                                    echo "<td style='padding-bottom: 5px !important'>
                                            <label>{$diente}</label>
                                            <table class='tg' style='border:0 !important'>
                                                <thead>
                                                    <tr style='border:0 '>
                                                        <th class='tg-0pky' style='border-left:0 !important;border-top:0 !important;' rowspan='2'></th>
                                                        <th class='tg-0pky' style='border-top:1px solid black !important;text-align:center'>" . ($SVG_RecuadroSeparadoSuperior ? "<img style='width:7px;height:7px;' src='data:image/svg+xml;base64,{$SVG_RecuadroSeparadoSuperior}'>" : "" ). "</th>
                                                        <th class='tg-0pky' style='border-right:0 !important;border-top:0 !important;' rowspan='2'></th>
                                                    </tr>
                                                    <tr style='border:0 '>
                                                        <th class='tg-0pky' style='text-align:center'>" . ($SVG_RecuadroSuperior ? "<img style='width:7px;height:7px;' src='data:image/svg+xml;base64,{$SVG_RecuadroSuperior}'>" : "" ). "</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr style='border:0 '>
                                                        <td class='tg-0pky' style='border-left:1px solid black !important;text-align:center'>" . ($SVG_RecuadroIzquierdo ? "<img style='width:7px;height:7px;' src='data:image/svg+xml;base64,{$SVG_RecuadroIzquierdo}'>" : "" ). "</td>
                                                        <td class='tg-0pky' style='text-align:center'>" . ($SVG_RecuadroCentro ? "<img style='width:7px;height:7px;' src='data:image/svg+xml;base64,{$SVG_RecuadroCentro}'>" : "" ). "</td>
                                                        <td class='tg-0pky' style='text-align:center'>" . ($SVG_RecuadroDerecha ? "<img style='width:7px;height:7px;' src='data:image/svg+xml;base64,{$SVG_RecuadroDerecha}'>" : "" ). "</td>
                                                    </tr>
                                                    <tr style='border:0 '>
                                                        <td class='tg-0pky' style='border-left:0 !important;border-bottom:0 !important;' rowspan='2'></td>
                                                        <td class='tg-0pky' style='text-align:center'>" . ($SVG_RecuadroInferior ? "<img style='width:7px;height:7px;' src='data:image/svg+xml;base64,{$SVG_RecuadroInferior}'>" : "" ). "</td>
                                                        <td class='tg-0pky' style='border-right:0 !important;border-bottom:0 !important;' rowspan='2'></td>
                                                    </tr>
                                                    <tr style='border:0 '>
                                                        <td class='tg-0pky' style='text-align:center'>" . ($SVG_RecuadroSeparadoInferior ? "<img style='width:7px;height:7px;' src='data:image/svg+xml;base64,{$SVG_RecuadroSeparadoInferior}'>" : "" ). "</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                          </td>";
                                }
                            }
                            echo "</tr>";
                        }
                    }

                    // Generar las tablas para cada grupo de dientes
                    echo "<table class='table_main'>";
                    generarFilas($ArregloArriba1, $RowOdontograma);
                    generarFilas($ArregloArriba2, $RowOdontograma);
                    generarFilas($ArregloAbajo1, $RowOdontograma);
                    generarFilas($ArregloAbajo2, $RowOdontograma);
                    echo "</table>";
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- /.content -->

<!-- /ICONOS  -->
<?php 
$queryList = mysqli_query($conn3, "SELECT * FROM OD_Procedimiento where (usuario_id = '{$_SESSION['ID']}' or usuario_id = '{$_SESSION['ID_principal']}') and Activo = 1");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $id_procedimiento = $rowMotorizado['id'];
    $Icono = $rowMotorizado['Icono'];
    $Color = $rowMotorizado['Color'];
    $Nombre = $rowMotorizado['Nombre'];

    $SVG = funcionMaster($Icono, 'id', 'SVG', 'OD_Iconos_SVG');
    $SVG = str_replace('fill="currentColor"', 'fill="' . $Color . '"', $SVG);
    $SVG = str_replace('"', "|", $SVG);
    $SVG = str_replace("\r\n", "■", $SVG);
    $SVG = str_replace("\n", "°", $SVG);

    $ArregloSVG["$id_procedimiento"] = $SVG;

    $inventario_id = $rowMotorizado['inventario_id'];
    $Nombre_Inventario = funcionMaster($inventario_id, 'ID', 'descripcion', 'sinvetrios');
    if ($Nombre_Inventario != "") {
        $Nombre_Inventario = " / [ " . $Nombre_Inventario . " ]";
    }

    $ArregloSwal = $ArregloSwal . "<option value='{$id_procedimiento}' data-icon='{$id_procedimiento}' > {$Nombre}{$Nombre_Inventario} </option>";
}

$ArregloSVGTXT = json_encode($ArregloSVG);

?>

<!-- /ICONOS  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    var ArregloIconos = JSON.parse(<?php echo json_encode($ArregloSVGTXT); ?>);

    function ModalPiezaOdontograma(diente_id, posicion, NombreCara, Toda_Pieza) {
        $('#modalPieza').modal('show');
        document.getElementById("diente_id").value = diente_id;
        document.getElementById("Diente_Posicion").value = posicion;
        document.getElementById("Diente_NombreCara").value = NombreCara;
        document.getElementById("Diente_TodaPieza").value = Toda_Pieza || "";

        document.getElementById("Tipo_Diente_Cara").innerText = NombreCara;
        document.getElementById("Imagen_Diente").innerHTML = "<label>" + diente_id + "</label><img src='OD_ImagenOdontograma/" + diente_id + ".png'>";
    }

    function CargarImagenPieza(elemento) {
        var usuario_id = "<?=$usuario_id?>";
        var cliente_id = "<?=$RowHistoria["cliente_id"]?>";

        $.ajax({
            type: "POST",
            url: "<?= $Base ?>OdontologiaOdontograma/OD_Ajax_Bolivia.php",
            data: {
                Tipo_Consulta: "Cargar Imagen Pieza Historia",
                cliente_id: cliente_id,
                usuario_id: usuario_id,
                historia_bo_id: "<?=$ID?>",
                diente_id: elemento
            },
            success: function(response) {
                try {
                    let arr = JSON.parse(response);
                    if (arr.length > 0) {
                        document.getElementById("RecuadroSuperior_<?=$ID?>_" + elemento).innerHTML = arr[0];
                        document.getElementById("RecuadroIzquierdo_<?=$ID?>_" + elemento).innerHTML = arr[1];
                        document.getElementById("RecuadroInferior_<?=$ID?>_" + elemento).innerHTML = arr[2];
                        document.getElementById("RecuadroDerecha_<?=$ID?>_" + elemento).innerHTML = arr[3];
                        document.getElementById("RecuadroCentro_<?=$ID?>_" + elemento).innerHTML = arr[4];
                        document.getElementById("RecuadroSeparadoSuperior_<?=$ID?>_" + elemento).innerHTML = arr[5];
                        document.getElementById("RecuadroSeparadoInferior_<?=$ID?>_" + elemento).innerHTML = arr[6];
                    }
                } catch (error) {
                    console.error("Error => ", error);
                }
            }
        });
    }

    function CargarImagenDiente(elemento) {
        var usuario_id = "<?=$usuario_id?>";
        var cliente_id = "<?=$RowHistoria["cliente_id"]?>";

        $.ajax({
            type: "POST",
            url: "<?= $Base ?>OdontologiaOdontograma/OD_Ajax_Bolivia.php",
            data: {
                Tipo_Consulta: "Cargar Imagen Diente Historia",
                cliente_id: cliente_id,
                usuario_id: usuario_id,
                historia_bo_id: "<?=$ID?>",
                diente_id: elemento
            },
            success: function(response) {
                var div = document.getElementById("ImagenDiente_<?=$ID?>_" + elemento);
                var svg = div.getElementsByTagName("svg")[0];
                if (svg != undefined) {
                    div.removeChild(svg);
                }

                var respuesta = response.split('|');
                document.getElementById("ImagenDiente_<?=$ID?>_" + elemento).innerHTML += respuesta[0];
                document.getElementById("ImagenDiente_<?=$ID?>_" + elemento).title = respuesta[1];
            }
        });
    }

    function VistaOdontograma(Valor) {
        const grupos = ["G_1", "G_2", "G_3", "G_4", "G_5", "G_6", "G_7", "G_8", "G_9", "G_10", "G_11", "G_12"];
        const display = Valor === "Mixto" ? "flex" : Valor === "Permanente" ? "flex" : "none";

        grupos.forEach((grupo, index) => {
            $(`.${grupo}`).css("display", index < 4 || index >= 8 ? display : Valor === "Mixto" ? "flex" : "none");
        });
    }
</script>