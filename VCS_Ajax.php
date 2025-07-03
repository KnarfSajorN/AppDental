<?php
date_default_timezone_set('America/Bogota');
include("funciones/conn3.php");
include("funciones/funcionesUtilidades.php");

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

if ($_POST["Tipo"] == "Aplicaciones_Vacuna") {

    $queryList = mysqli_query($conn3, "SELECT * FROM  VCS_Vacunas WHERE id={$_POST["Vacuna_id"]}");
    while ($rowVacuna = mysqli_fetch_array($queryList)) {
        $Aplicaciones_Informacion = json_decode($rowVacuna['Aplicaciones_Informacion'], true);

        foreach ($Aplicaciones_Informacion as $key => $value) {
            echo "<div class='col-md-12' style='padding-bottom: 10px;'>";
                $numero = $key+1;
                if($numero==1){
                    echo "<label>Seleccione las dosis/aplicaciones que va a tener el paciente, cada dosis tendrá su fecha de aplicación la cual se usará para los recordatorios los cuales avisaran 7 Dias antes de la fecha de la aplicación </label><br>";
                    echo "<label># Dosis </label>";
                    echo "<label style='float: right;'>Fecha</label><br>";

                    //div col-md-6 dentro un checkbox 
                    echo "<label><input type='checkbox' name='Aplicaciones[$numero][Seleccion]' value='Si' style='top: 6px;position: relative;' checked> # {$numero}</label>";
                }
                else{
                    //div col-md-6 dentro un checkbox 
                    echo "<label><input type='checkbox' name='Aplicaciones[$numero][Seleccion]' value='Si' style='top: 6px;position: relative;'> # {$numero}</label>";
                }
                
                // tomando la variable $value["Meses"] volverlo una fecha sumando los meses a partir de hoy
                $fecha = date("Y-m-d");
                //agregar los meses a la fecha actual
                $fecha = date("Y-m-d", strtotime($fecha . " + {$value["Meses"]} months"));

                $categoria = $value["Categoria"];
                //input type date para la fecha de aplicacion
                echo "<input type='date' name='Aplicaciones[$numero][Fecha]' class='form-control' style='width: 90%;float: right;' value='{$fecha}'>";
                echo "<input type='hidden' name='Aplicaciones[$numero][Categoria]' value='{$categoria}'>";
            echo "</div>";
        }
    }
}
