<?php

// try {

require __DIR__ . '/../header.php';
require __DIR__ . '/../menu.php';

$cliente_id = decrypt($_GET['cI']);
$usuario_id = $_SESSION['ID'];


?>

<link rel="stylesheet" href="<?= $Base ?>OdontoPresupuesto/css/index.css">
<link rel="stylesheet" href="<?= $Base ?>OdontoPresupuesto/css/slip.css">


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> Presupuesto de odontograma</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="">



            <div class="content">
                <div class="col-md-12" style="height: 280px;">
                    <?php
                    $dirEstilos = __DIR__ . '/../Modulos_Estilos/DatosPersonales.php';
                    require $dirEstilos;
                    echo Datos_Personales($cliente_id);
                    ?>
                </div>
                <h4 class="Titulo_Pagina">Presupuesto de odontograma</h4>
                <div class="box">
                    <div class="box-body">
                        <div class='col-md-12 row'>
                            <div class="col-md-12 mb-3">
                                <label for="TipoOdontograma">Tipo</label>
                                <select id="TipoOdontograma" class="select2 form-control input-lg" style="width: 100%;"
                                    onchange="VistaOdontograma(this.value)">
                                    <option value="Mixto" selected>Mixto</option>
                                    <option value="Permanente">Permanente</option>
                                    <option value="Temporal">Temporal</option>
                                </select>
                            </div>
                            <?php


                            $ArregloArriba1[0] = ["18", "17", "16", "15", "14", "13", "12", "11"];
                            $ArregloArriba2[0] = ["Vacio", "55", "54", "53", "52", "51"];

                            $ArregloArriba1[1] = ["21", "22", "23", "24", "25", "26", "27", "28"];
                            $ArregloArriba2[1] = ["61", "62", "63", "64", "65", "Vacio"];

                            foreach ($ArregloArriba1 as $key1 => $value1) {
                                $contador = 0;
                                foreach ($value1 as $key => $value) {
                                    $contador++;
                                    if ($contador == "1") {
                                        $contadorGeneral++;
                                        echo "<div class='col-lg-3 col-md-6 col-xs-12 G_{$contadorGeneral} row'>";
                                    }

                                    switch ($value) {
                                        case "18":
                                        case "17":
                                        case "16":
                                        case "15":
                                        case "14":
                                            $DataArriba = "data-diente='Vestibular'";
                                            $DataIzquierda = "data-diente='Distal'";
                                            $DataDerecha = "data-diente='Mesial'";
                                            $DataAbajo = "data-diente='Palatino'"; //lingual es para inferior | palatino superior
                                            $DataCentro = "data-diente='Oclusal'";

                                            $DataSeparadoSuperior = "data-diente='Cuello Vestibular'";
                                            $DataSeparadoInferior = "data-diente='Cuello Palatino'";
                                            break;
                                        case "13":
                                        case "12":
                                        case "11":
                                            $DataArriba = "data-diente='Vestibular'";
                                            $DataIzquierda = "data-diente='Distal'";
                                            $DataDerecha = "data-diente='Mesial'";
                                            $DataAbajo = "data-diente='Palatino'"; //lingual es para inferior | palatino superior
                                            $DataCentro = "data-diente='Borde Incisal'";

                                            $DataSeparadoSuperior = "data-diente='Cuello Vestibular'";
                                            $DataSeparadoInferior = "data-diente='Cuello Palatino'";
                                            break;
                                        case "21":
                                        case "22":
                                        case "23":
                                            $DataArriba = "data-diente='Vestibular'";
                                            $DataIzquierda = "data-diente='Mesial'";
                                            $DataDerecha = "data-diente='Distal'";
                                            $DataAbajo = "data-diente='Palatino'"; //lingual es para inferior | palatino superior
                                            $DataCentro = "data-diente='Borde Incisal'";

                                            $DataSeparadoSuperior = "data-diente='Cuello Vestibular'";
                                            $DataSeparadoInferior = "data-diente='Cuello Palatino'";
                                            break;
                                        case "24":
                                        case "25":
                                        case "26":
                                        case "27":
                                        case "28":
                                            $DataArriba = "data-diente='Vestibular'";
                                            $DataIzquierda = "data-diente='Mesial'";
                                            $DataDerecha = "data-diente='Distal'";
                                            $DataAbajo = "data-diente='Palatino'"; //lingual es para inferior | palatino superior
                                            $DataCentro = "data-diente='Oclusal'";

                                            $DataSeparadoSuperior = "data-diente='Cuello Vestibular'";
                                            $DataSeparadoInferior = "data-diente='Cuello Palatino'";
                                            break;
                                    }

                                    //Esto funcion para el editar procedimientos//
                                    $ArregloDatosCadaDiente[$value]["RecuadroSuperior"] = str_replace(array("data-diente='", "'"), "", $DataArriba);
                                    $ArregloDatosCadaDiente[$value]["RecuadroIzquierdo"] = str_replace(array("data-diente='", "'"), "", $DataIzquierda);
                                    $ArregloDatosCadaDiente[$value]["RecuadroInferior"] = str_replace(array("data-diente='", "'"), "", $DataAbajo);
                                    $ArregloDatosCadaDiente[$value]["RecuadroDerecha"] = str_replace(array("data-diente='", "'"), "", $DataDerecha);
                                    $ArregloDatosCadaDiente[$value]["RecuadroCentro"] = str_replace(array("data-diente='", "'"), "", $DataCentro);

                                    $ArregloDatosCadaDiente[$value]["RecuadroSeparadoSuperior"] = str_replace(array("data-diente='", "'"), "", $DataSeparadoSuperior);
                                    $ArregloDatosCadaDiente[$value]["RecuadroSeparadoInferior"] = str_replace(array("data-diente='", "'"), "", $DataSeparadoInferior);


                                    $dataBtn = [
                                        "pieza" => $value,
                                        "nombre" => "Pieza No. " . $value,
                                        "valor" => 0,
                                    ];

                                    $dataBtn = base64_encode(json_encode($dataBtn));

                                    echo "<div class='col-md-3 col-xs-3 col-perso'> 

                                        <label class='check_seleccionMultiple'><input type='checkbox' onchange='addProcedimiento(this, \"{$dataBtn}\")' class='class_checkselectall' id='checkselectall_$value'/><div class='box'></div></label>

                                        <label style='left: 15px;position:relative;padding-bottom: 10px;'>{$value}</label>
                                        <div style='width:60px;height: 80px;text-align-last: center;' class='diente_img rotate_icon diente_img_general' id='ImagenDiente_{$value}'> <img src='OD_ImagenOdontograma/{$value}.png' style='position: relative;'> </div>
                                        <br>
                                        
                                    </div>";

                                    if ($contador == "4") {
                                        echo "</div>";
                                        $contador = 0;
                                    }
                                }
                            }

                            foreach ($ArregloArriba2 as $key1 => $value1) {
                                $contador = 0;
                                $contadorGeneral++;
                                echo "<div class='col-lg-6 col-md-6 col-xs-12 G_{$contadorGeneral} row'>";
                                foreach ($value1 as $key => $value) {
                                    if ($value == "Vacio") {
                                        echo "<div class='col-md-2 col-xs-0'><br></div>";
                                    } else {

                                        switch ($value) {
                                            case "55":
                                            case "54":
                                            case "53":
                                                $DataArriba = "data-diente='Vestibular'";
                                                $DataIzquierda = "data-diente='Distal'";
                                                $DataDerecha = "data-diente='Mesial'";
                                                $DataAbajo = "data-diente='Palatino'"; //lingual es para inferior | palatino superior
                                                $DataCentro = "data-diente='Oclusal'";

                                                $DataSeparadoSuperior = "data-diente='Cuello Vestibular'";
                                                $DataSeparadoInferior = "data-diente='Cuello Palatino'";
                                                break;
                                            case "52":
                                            case "51":
                                                $DataArriba = "data-diente='Vestibular'";
                                                $DataIzquierda = "data-diente='Distal'";
                                                $DataDerecha = "data-diente='Mesial'";
                                                $DataAbajo = "data-diente='Palatino'"; //lingual es para inferior | palatino superior
                                                $DataCentro = "data-diente='Borde Incisal'";

                                                $DataSeparadoSuperior = "data-diente='Cuello Vestibular'";
                                                $DataSeparadoInferior = "data-diente='Cuello Palatino'";
                                                break;
                                            case "61":
                                            case "62":
                                                $DataArriba = "data-diente='Vestibular'";
                                                $DataIzquierda = "data-diente='Mesial'";
                                                $DataDerecha = "data-diente='Distal'";
                                                $DataAbajo = "data-diente='Palatino'"; //lingual es para inferior | palatino superior
                                                $DataCentro = "data-diente='Borde Incisal'";

                                                $DataSeparadoSuperior = "data-diente='Cuello Vestibular'";
                                                $DataSeparadoInferior = "data-diente='Cuello Palatino'";
                                                break;
                                            case "63":
                                            case "64":
                                            case "65":
                                                $DataArriba = "data-diente='Vestibular'";
                                                $DataIzquierda = "data-diente='Mesial'";
                                                $DataDerecha = "data-diente='Distal'";
                                                $DataAbajo = "data-diente='Palatino'"; //lingual es para inferior | palatino superior
                                                $DataCentro = "data-diente='Oclusal'";

                                                $DataSeparadoSuperior = "data-diente='Cuello Vestibular'";
                                                $DataSeparadoInferior = "data-diente='Cuello Palatino'";
                                                break;
                                        }

                                        //Esto funcion para el editar procedimientos//
                                        $ArregloDatosCadaDiente[$value]["RecuadroSuperior"] = str_replace(array("data-diente='", "'"), "", $DataArriba);
                                        $ArregloDatosCadaDiente[$value]["RecuadroIzquierdo"] = str_replace(array("data-diente='", "'"), "", $DataIzquierda);
                                        $ArregloDatosCadaDiente[$value]["RecuadroInferior"] = str_replace(array("data-diente='", "'"), "", $DataAbajo);
                                        $ArregloDatosCadaDiente[$value]["RecuadroDerecha"] = str_replace(array("data-diente='", "'"), "", $DataDerecha);
                                        $ArregloDatosCadaDiente[$value]["RecuadroCentro"] = str_replace(array("data-diente='", "'"), "", $DataCentro);

                                        $ArregloDatosCadaDiente[$value]["RecuadroSeparadoSuperior"] = str_replace(array("data-diente='", "'"), "", $DataSeparadoSuperior);
                                        $ArregloDatosCadaDiente[$value]["RecuadroSeparadoInferior"] = str_replace(array("data-diente='", "'"), "", $DataSeparadoInferior);

                                        $dataBtn = [
                                            "pieza" => $value,
                                            "nombre" => "Pieza No. " . $value,
                                            "valor" => 0
                                        ];

                                        $dataBtn = base64_encode(json_encode($dataBtn));


                                        echo "<div class='col-md-2 col-xs-2 col-perso des_{$contador}'> 
                                        
                                        <label class='check_seleccionMultiple'><input type='checkbox' class='class_checkselectall' onchange='addProcedimiento(this, \"{$dataBtn}\")' id='checkselectall_$value'/><div class='box'></div></label>

                                        <label style='left: 15px;position:relative;padding-bottom: 10px;'>{$value}</label>
                                        <div style='width:60px;height: 80px;text-align-last: center;' class='diente_img1 rotate_icon diente_img_general' id='ImagenDiente_{$value}'> <img src='OD_ImagenOdontograma/{$value}.png' style='position: relative;'> </div>
                                        <br>    
                                        
                                    </div>";
                                    }
                                    $contador++;
                                }
                                echo "</div>";
                            }


                            /////////////////////////////////? Parte inferior /////////////////////////////////////////////////////////

                            $ArregloAbajo1[0] = ["Vacio", "85", "84", "83", "82", "81"];
                            $ArregloAbajo2[0] = ["48", "47", "46", "45", "44", "43", "42", "41"];

                            $ArregloAbajo1[1] = ["71", "72", "73", "74", "75", "Vacio"];
                            $ArregloAbajo2[1] = ["31", "32", "33", "34", "35", "36", "37", "38"];


                            foreach ($ArregloAbajo1 as $key1 => $value1) {
                                $contador = 0;
                                $contadorGeneral++;
                                echo "<div class='col-lg-6 col-md-6 col-xs-12 G_{$contadorGeneral} row'>";
                                foreach ($value1 as $key => $value) {
                                    if ($value == "Vacio") {
                                        echo "<div class='col-md-2 col-xs-0'><br></div>";
                                    } else {

                                        switch ($value) {
                                            case "85":
                                            case "84":
                                            case "83":
                                                $DataArriba = "data-diente='Lingual'"; //lingual es para inferior | palatino superior
                                                $DataIzquierda = "data-diente='Distal'";
                                                $DataDerecha = "data-diente='Mesial'";
                                                $DataAbajo = "data-diente='Vestibular'";
                                                $DataCentro = "data-diente='Oclusal'";

                                                $DataSeparadoSuperior = "data-diente='Cuello Lingual'";
                                                $DataSeparadoInferior = "data-diente='Cuello Vestibular'";
                                                break;
                                            case "82":
                                            case "81":
                                                $DataArriba = "data-diente='Lingual'"; //lingual es para inferior | palatino superior
                                                $DataIzquierda = "data-diente='Distal'";
                                                $DataDerecha = "data-diente='Mesial'";
                                                $DataAbajo = "data-diente='Vestibular'";
                                                $DataCentro = "data-diente='Borde Incisal'";

                                                $DataSeparadoSuperior = "data-diente='Cuello Lingual'";
                                                $DataSeparadoInferior = "data-diente='Cuello Vestibular'";
                                                break;
                                            case "71":
                                            case "72":
                                                $DataArriba = "data-diente='Lingual'"; //lingual es para inferior | palatino superior
                                                $DataIzquierda = "data-diente='Mesial'";
                                                $DataDerecha = "data-diente='Distal'";
                                                $DataAbajo = "data-diente='Vestibular'";
                                                $DataCentro = "data-diente='Borde Incisal'";

                                                $DataSeparadoSuperior = "data-diente='Cuello Lingual'";
                                                $DataSeparadoInferior = "data-diente='Cuello Vestibular'";
                                                break;
                                            case "73":
                                            case "74":
                                            case "75":
                                                $DataArriba = "data-diente='Lingual'"; //lingual es para inferior | palatino superior
                                                $DataIzquierda = "data-diente='Mesial'";
                                                $DataDerecha = "data-diente='Distal'";
                                                $DataAbajo = "data-diente='Vestibular'";
                                                $DataCentro = "data-diente='Oclusal'";

                                                $DataSeparadoSuperior = "data-diente='Cuello Lingual'";
                                                $DataSeparadoInferior = "data-diente='Cuello Vestibular'";
                                                break;
                                        }

                                        //Esto funcion para el editar procedimientos//
                                        $ArregloDatosCadaDiente[$value]["RecuadroSuperior"] = str_replace(array("data-diente='", "'"), "", $DataArriba);
                                        $ArregloDatosCadaDiente[$value]["RecuadroIzquierdo"] = str_replace(array("data-diente='", "'"), "", $DataIzquierda);
                                        $ArregloDatosCadaDiente[$value]["RecuadroInferior"] = str_replace(array("data-diente='", "'"), "", $DataAbajo);
                                        $ArregloDatosCadaDiente[$value]["RecuadroDerecha"] = str_replace(array("data-diente='", "'"), "", $DataDerecha);
                                        $ArregloDatosCadaDiente[$value]["RecuadroCentro"] = str_replace(array("data-diente='", "'"), "", $DataCentro);

                                        $ArregloDatosCadaDiente[$value]["RecuadroSeparadoSuperior"] = str_replace(array("data-diente='", "'"), "", $DataSeparadoSuperior);
                                        $ArregloDatosCadaDiente[$value]["RecuadroSeparadoInferior"] = str_replace(array("data-diente='", "'"), "", $DataSeparadoInferior);


                                        $dataBtn = [
                                            "pieza" => $value,
                                            "nombre" => "Pieza No. " . $value,
                                            "valor" => 0
                                        ];

                                        $dataBtn = base64_encode(json_encode($dataBtn));

                                        echo "<div class='col-md-2 col-xs-2 col-perso des_{$contador}'> 
                                        
                                        <label class='check_seleccionMultiple'><input type='checkbox' onchange='addProcedimiento(this, \"{$dataBtn}\")' class='class_checkselectall' id='checkselectall_$value'/><div class='box'></div></label>

                                        <label style='left: 15px;position:relative;padding-bottom: 10px;'>{$value}</label>
                                        <div style='width:60px;height: 80px;text-align-last: center;' class='diente_img2 diente_img_general' id='ImagenDiente_{$value}' > <img src='OD_ImagenOdontograma/{$value}.png' style='position: relative;'> </div>
                                        <br>    
                                        
                                    </div>";
                                    }
                                    $contador++;
                                }
                                echo "</div>";
                            }

                            foreach ($ArregloAbajo2 as $key1 => $value1) {
                                $contador = 0;
                                foreach ($value1 as $key => $value) {
                                    $contador++;
                                    if ($contador == "1") {
                                        $contadorGeneral++;
                                        echo "<div class='col-lg-3 col-md-6 col-xs-12 G_{$contadorGeneral} row'>";
                                    }

                                    switch ($value) {
                                        case "48":
                                        case "47":
                                        case "46":
                                        case "45":
                                        case "44":
                                            $DataArriba = "data-diente='Lingual'"; //lingual es para inferior | palatino superior [posicion dientes] 
                                            $DataIzquierda = "data-diente='Distal'";
                                            $DataDerecha = "data-diente='Mesial'";
                                            $DataAbajo = "data-diente='Vestibular'";
                                            $DataCentro = "data-diente='Oclusal'";

                                            $DataSeparadoSuperior = "data-diente='Cuello Lingual'";
                                            $DataSeparadoInferior = "data-diente='Cuello Vestibular'";
                                            break;
                                        case "43":
                                        case "42":
                                        case "41":
                                            $DataArriba = "data-diente='Lingual'"; //lingual es para inferior | palatino superior [posicion dientes] 
                                            $DataIzquierda = "data-diente='Distal'";
                                            $DataDerecha = "data-diente='Mesial'";
                                            $DataAbajo = "data-diente='Vestibular'";
                                            $DataCentro = "data-diente='Borde Incisal'";

                                            $DataSeparadoSuperior = "data-diente='Cuello Lingual'";
                                            $DataSeparadoInferior = "data-diente='Cuello Vestibular'";
                                            break;
                                        case "31":
                                        case "32":
                                        case "33":
                                            $DataArriba = "data-diente='Lingual'"; //lingual es para inferior | palatino superior [posicion dientes] 
                                            $DataIzquierda = "data-diente='Mesial'";
                                            $DataDerecha = "data-diente='Distal'";
                                            $DataAbajo = "data-diente='Vestibular'";
                                            $DataCentro = "data-diente='Borde Incisal'";

                                            $DataSeparadoSuperior = "data-diente='Cuello Lingual'";
                                            $DataSeparadoInferior = "data-diente='Cuello Vestibular'";
                                            break;
                                        case "34":
                                        case "35":
                                        case "36":
                                        case "37":
                                        case "38":
                                            $DataArriba = "data-diente='Lingual'"; //lingual es para inferior | palatino superior [posicion dientes] 
                                            $DataIzquierda = "data-diente='Mesial'";
                                            $DataDerecha = "data-diente='Distal'";
                                            $DataAbajo = "data-diente='Vestibular'";
                                            $DataCentro = "data-diente='Oclusal'";

                                            $DataSeparadoSuperior = "data-diente='Cuello Lingual'";
                                            $DataSeparadoInferior = "data-diente='Cuello Vestibular'";
                                            break;
                                    }

                                    //Esto funcion para el editar procedimientos//
                                    $ArregloDatosCadaDiente[$value]["RecuadroSuperior"] = str_replace(array("data-diente='", "'"), "", $DataArriba);
                                    $ArregloDatosCadaDiente[$value]["RecuadroIzquierdo"] = str_replace(array("data-diente='", "'"), "", $DataIzquierda);
                                    $ArregloDatosCadaDiente[$value]["RecuadroInferior"] = str_replace(array("data-diente='", "'"), "", $DataAbajo);
                                    $ArregloDatosCadaDiente[$value]["RecuadroDerecha"] = str_replace(array("data-diente='", "'"), "", $DataDerecha);
                                    $ArregloDatosCadaDiente[$value]["RecuadroCentro"] = str_replace(array("data-diente='", "'"), "", $DataCentro);

                                    $ArregloDatosCadaDiente[$value]["RecuadroSeparadoSuperior"] = str_replace(array("data-diente='", "'"), "", $DataSeparadoSuperior);
                                    $ArregloDatosCadaDiente[$value]["RecuadroSeparadoInferior"] = str_replace(array("data-diente='", "'"), "", $DataSeparadoInferior);

                                    $dataBtn = [
                                        "pieza" => $value,
                                        "nombre" => "Pieza No. " . $value,
                                        "valor" => 0
                                    ];

                                    $dataBtn = base64_encode(json_encode($dataBtn));

                                    echo "<div class='col-md-3 col-xs-3 col-perso'> 
                                    
                                        <label class='check_seleccionMultiple'><input type='checkbox' class='class_checkselectall' onchange='addProcedimiento(this, \"{$dataBtn}\")'  id='checkselectall_$value'/><div class='box'></div></label>    
                                    
                                        <label style='left: 15px;position:relative;padding-bottom: 10px;'>{$value}</label>
                                        <div style='width:60px;height: 80px;text-align-last: center;' class='diente_img3 diente_img_general' id='ImagenDiente_{$value}'> <img src='OD_ImagenOdontograma/{$value}.png' style='position: relative;'> </div>
                                        <br>
                                        
                                    </div>";

                                    if ($contador == "4") {
                                        echo "</div>";
                                        $contador = 0;
                                    }
                                }
                            }
                            ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- //////////////////////////////////////////////////? Enviar Firma por Whatsapp y Correo ///////////////////////////////////////////////// -->
<?php
$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id=$cliente_id");
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $Paciente_Nombre = $rowMotorizado['nombre_cliente'];
    $Paciente_Correo = $rowMotorizado['correo_cliente'];
    $Paciente_Whatsapp = $rowMotorizado['whatsapp'];
}
?>
<!-- //////////////////////////////////////////////////? [FIN] Enviar Firma por Whatsapp y Correo ///////////////////////////////////////////////// -->

<?php
require '../footer.php';
require __DIR__ . '/modales/modalPieza.php';
require __DIR__ . '/modales/modalSeleccionMultiple.php';
require __DIR__ . '/modales/slip.php';


$QueryIcons = "SELECT * FROM  OD_Procedimiento where (usuario_id = '{$_SESSION['ID']}' or usuario_id = '{$_SESSION['ID_principal']}') and Activo = 1";
$queryList = mysqli_query($conn3, $QueryIcons);
$optionsProcedimiento = "";
$arrayOptionsProcedimiento = [];
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

    //inventario id
    $inventario_id = $rowMotorizado['inventario_id'];
    $Nombre_Inventario = funcionMaster($inventario_id, 'ID', 'descripcion', 'sinvetrios');
    $Valor_Inventario = funcionMaster($inventario_id, 'ID', 'precio', 'sinvetrios');
    $Valor_Inventario = !is_numeric($Valor_Inventario) ? 0 : $Valor_Inventario;
    if ($Nombre_Inventario != "") {
        $Nombre_Inventario = " / [ " . $Nombre_Inventario . " ]";
    }
    //inventario id

    $arrayOptionsProcedimiento[] = [
        "id_procedimiento" => $id_procedimiento,
        "SVG" => $SVG,
        "Valor_Inventario" => $Valor_Inventario,
        "Nombre" => $Nombre,
        "Nombre_Inventario" => $Nombre_Inventario
    ];

    // $optionsProcedimiento .= "<option value='{$id_procedimiento}' data-valor='{$Valor_Inventario}' data-icon='{$SVG}' > {$Nombre}{$Nombre_Inventario} </option>";
    // $optionsProcedimiento .= "<option value='{$id_procedimiento}' data-valor='{$Valor_Inventario}' data-icon='{$id_procedimiento}' > {$Nombre}{$Nombre_Inventario} </option>";

    //Esto funcion para el editar procedimientos//
    $ArregloSwal = $ArregloSwal . "<option value='{$id_procedimiento}' data-icon='{$id_procedimiento}' > {$Nombre}{$Nombre_Inventario} </option>";
}

?>


<script>
    const AjaxPath = "<?= $Base ?>OdontoPresupuesto/ajax/OP_Ajax.php";
    const BasePath = "<?= $Base ?>";
    const optionsProcedimiento = "<?= $optionsProcedimiento ?>";

    let ArregloIconos = JSON.parse(<?php echo json_encode($ArregloSVGTXT); ?>);
    let Paciente_Nombre = "<?= $Paciente_Nombre ?>";
    let Paciente_Whatsapp = "<?= $Paciente_Whatsapp ?>";
    let Paciente_Correo = "<?= $Paciente_Correo ?>";
    let cliente_id = "<?= $cliente_id ?>";
    let usuario_id = "<?= $usuario_id ?>";
    let sucursal_id = "<?= $_SESSION["sucursal"] ?>";
    let ID_principal = "<?= $_SESSION["ID_principal"] ?>";
    let CarasDientes = JSON.parse('<?= json_encode($ArregloDatosCadaDiente); ?>');
    let ArregloSVG = JSON.parse('<?= $ArregloSVGTXT; ?>');
    let ArregloPosicionCarasDientes = JSON.parse('<?= json_encode($ArregloDatosCadaDiente); ?>');
    let ArregloSwal = "<?= $ArregloSwal; ?>";
    let ArregloSwalTratamiento = "<?= $ArregloSwalTratamiento; ?>";
    let ArregloSwalCIE10 = "<?= $ArregloSwalCIE10; ?>";
    let ArregloProcedimientos = JSON.parse(`<?= json_encode($arrayOptionsProcedimiento) ?>`);

    $(document).ready(function() {
        $(".check_seleccionMultiple").css("display", "block");
    })
</script>
<script src="<?= $Base ?>OdontoPresupuesto/js/functionsOdontograma.js"></script>
<script src="<?= $Base ?>OdontoPresupuesto/js/functionsFirma.js"></script>
<script src="<?= $Base ?>OdontoPresupuesto/js/functionReady.js"></script>
<script src="<?= $Base ?>OdontoPresupuesto/js/functionsSlip.js"></script>
<script src="<?= $Base ?>OdontoPresupuesto/js/functionsAjax.js"></script>
<script>
    // let procedimientos = [];
    // let isMinimized = false;
    // let valorTotal = 0;

    // function addProcedimiento(btn, data) {
    //     const isChecked = btn.checked;
    //     let datosPieza = JSON.parse(atob(data));
    //     datosPieza.procedimientos = [];
    //     const idPieza = datosPieza.pieza;

    //     procedimientos = isChecked ?
    //         [...procedimientos, datosPieza] :
    //         procedimientos.filter(p => p.pieza != idPieza);

    //     updateProcedimientoSlip();
    // }

    // function updateProcedimientoSlip() {
    //     const procedimientoSlip = document.getElementById("procedimientoSlip");
    //     const procedimientosList = document.getElementById("procedimientosList");
    //     console.log("ArregloProcedimientos", ArregloProcedimientos);
    //     procedimientosList.innerHTML = "";

    //     procedimientos.forEach((procedimiento) => {
    //         const { procedimientos: procedimientosPieza, pieza: idPieza } = procedimiento;
    //         let procedimientosPiezaHtml = procedimientosPieza.map((proc, indice) => {

            

    //         const optionsProcedimiento1 = ArregloProcedimientos.map(item => {
    //             // console.log("item", item);
                
    //             const { id_procedimiento, SVG, Valor_Inventario, Nombre, Nombre_Inventario } = item;
    //             const selected = proc.procedimiento == id_procedimiento ? "selected" : "";
    //             return `<option ${selected} value='${id_procedimiento}' data-valor='${Valor_Inventario}' data-icon='${SVG}' > ${Nombre} ${Nombre_Inventario ? Nombre_Inventario : ''} </option>`;
    //         }).join('');

    //         return `
    //         <tr id="fila_detalle_${idPieza}_${indice}">
    //             <td>
    //                 <select style="width:100%" class="select2 form-select input-lg"  onchange="handleCaraChange(${idPieza}, ${indice})"  name="datos[${idPieza}][${indice}][cara]">
    //                     <option ${proc.cara == '' ? "selected" : ''} value="">Seleccione</option>
    //                     ${getCaraOptions(proc.cara)}
    //                 </select>
    //             </td>
    //             <td>
    //                 <select style="width:100%" class="form-select"  onchange="handleProcedimientoChange(${idPieza}, ${indice})"  name="datos[${idPieza}][${indice}][procedimiento]">
    //                     <option value="">Seleccione</option>
    //                     ${optionsProcedimiento1}
    //                 </select>
    //             </td>
    //             <td>
    //                 <input name="datos[${idPieza}][${indice}][valor]" onchange="handleValorChange(${idPieza}, ${indice})" class="form-control" value="${proc.valor}" type="number">
    //             </td>
    //             <td>
    //                 ${indice != 0 ? `<i class="fas fa-minus text-danger" onclick="removeProcedimientoDetalle(${idPieza}, ${indice})"></i>` : ''}
    //             </td>
    //         </tr>`}).join('');

    //         procedimientosList.innerHTML += `
    //         <tr id="fila_pieza_${idPieza}">
    //             <th style="width:30%" class="text-center">
    //                 <img src='OD_ImagenOdontograma/${idPieza}.png' style="max-width:15px">
    //             </th>
    //             <th style="width:60%" class="text-center">${procedimiento.nombre}</th>
    //             <td style="width:10%" class="text-center">
    //                 <i class="fas fa-xmark text-danger" onclick="removeProcedimiento(${idPieza})"></i>
    //             </td>
    //         </tr>
    //         <tr id="fila_detalle_${idPieza}">
    //             <td colspan="3">
    //                 <table class="table" id="fila_tabla_${idPieza}">
    //                     <thead>
    //                         <tr>
    //                             <th>Cara</th>
    //                             <th>Procedimiento</th>
    //                             <th>Valor</th>
    //                             <th></th>
    //                         </tr>
    //                     </thead>
    //                     <tbody id="fila_tbody_${idPieza}">
    //                         ${procedimientosPiezaHtml}
    //                     </tbody>
    //                 </table>
    //             </td>
    //         </tr>`;

    //         if (procedimientosPieza.length == 0) addRowProcedure(idPieza);

    //         // Actualizar los valores de los selectores sin disparar eventos
    //         procedimientosPieza.forEach((proc, j) => {
    //             $(`select[name="datos[${idPieza}][${j}][cara]"]`).val(proc.cara);
    //             $(`select[name="datos[${idPieza}][${j}][procedimiento]"]`).val(proc.procedimiento);
    //             $(`input[name="datos[${idPieza}][${j}][valor]"]`).val(proc.valor);
    //         });
    //     });

    //     procedimientoSlip.classList.toggle("active", procedimientos.length > 0);
    // }

    // function getCaraOptions(selectedCara) {
    //     const caras = ["Cuello vestibular", "Vestibular", "Cuello palatino", "Palatino", "Mesial", "Distal", "Borde incisal", "Toda la pieza"];
    //     return caras.map(cara => `<option ${cara == selectedCara ? "selected" : ""} value="${cara}">${cara}</option>`).join('');
    // }

    // function addRowProcedure(pieza) {
    //     const detalleProcedimiento = {
    //         cara: "",
    //         procedimiento: 0,
    //         valor: 0
    //     };
    //     procedimientos.find(item => item.pieza == pieza).procedimientos.push(detalleProcedimiento);
    //     updateProcedimientoSlip();
    // }

    // function removeProcedimiento(pieza) {
    //     $(`#checkselectall_${pieza}`).prop("checked", false);
    //     procedimientos = procedimientos.filter(p => p.pieza != pieza);
    //     updateProcedimientoSlip();
    // }

    // function removeProcedimientoDetalle(pieza, indice) {
    //     const piezaPosicion = procedimientos.find(item => item.pieza == pieza);
    //     piezaPosicion.procedimientos = piezaPosicion.procedimientos.filter((_, index) => index != indice);
    //     updateProcedimientoSlip();
    // }

    // function handleCaraChange(pieza, indice) {
    //     const piezaPosicion = procedimientos.find(item => item.pieza == pieza);
    //     piezaPosicion.procedimientos[indice].cara = $(`select[name="datos[${pieza}][${indice}][cara]"]`).val();
    //     autoRowProcedure(pieza, indice);
    // }

    // function handleProcedimientoChange(pieza, indice) {
    //     const piezaPosicion = procedimientos.find(item => item.pieza == pieza);
    //     piezaPosicion.procedimientos[indice].procedimiento = $(`select[name="datos[${pieza}][${indice}][procedimiento]"]`).val();
    //     agregarValorProcedimiento(pieza, indice);
    // }

    // function handleValorChange(pieza, indice) {
    //     const piezaPosicion = procedimientos.find(item => item.pieza == pieza);
    //     piezaPosicion.procedimientos[indice].valor = $(`input[name="datos[${pieza}][${indice}][valor]"]`).val();
    //     updateTotal(pieza, piezaPosicion.procedimientos[indice].valor, indice);
    // }

    // function clearProcedimientos() {
    //     procedimientos = [];
    //     updateProcedimientoSlip();
    //     $(".class_checkselectall").prop("checked", false);
    // }

    // function toggleMinimize(minusIcon) {
    //     isMinimized = !isMinimized;
    //     document.getElementById("procedimientoSlip").classList.toggle("minimized", isMinimized);
    //     minusIcon.class = isMinimized ? "fas fa-plus" : "fas fa-minus";
    // }

    // function autoRowProcedure(pieza, indice) {
    //     if (!$(`select[name="datos[${pieza}][${indice + 1}][cara]"]`).val()) addRowProcedure(pieza);
    // }

    // function updateTotal(pieza, valor, indice) {
    //     valorTotal = procedimientos.reduce((total, procedimiento) => {
    //         procedimiento.procedimientos.forEach((proc, i) => {
    //             if (procedimiento.pieza == pieza && i == indice) proc.valor = valor;
    //             total += Number(proc.valor);
    //         });
    //         return total;
    //     }, 0);
    //     document.getElementById("totalOdds").textContent = valorTotal.toFixed(2);
    // }

    // function agregarValorProcedimiento(pieza, indice) {
    //     const valor = $(`select[name="datos[${pieza}][${indice}][procedimiento]"] option:selected`).data("valor");
    //     $(`input[name="datos[${pieza}][${indice}][valor]"]`).val(valor);
    //     updateTotal(pieza, valor, indice);
    // }
</script>


<?php
// } catch (\Throwable $th) {
//     $errorMesssage = $th->getMessage();
//     $errorLine = $th->getLine();

//     echo "<script>alert(`Line: {$errorLine} - Error:{$errorMesssage}`)</script>";
// }
// require 'OD_RequireModalEvolucion.php';
// include 'OD_ModalHistorial.php';
?>