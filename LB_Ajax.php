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

if ($_POST["Tipo"] == "Examenes") {

    $QueryExamenes = mysqli_query($conn3, "SELECT * FROM LB_Examen where Activo = '1' ");
    $nrowl = mysqli_num_rows($QueryExamenes);
    while ($RowExamenes = mysqli_fetch_array($QueryExamenes)) {
        $id = $RowExamenes['id'];
        $Nombre = ($RowExamenes['Nombre']);
        $Categorias = funcionMaster($RowExamenes['categoria_id'],'id','Nombre','LB_Categoria');

        echo "<option value='$id'> [$Categorias] - $Nombre </option>";
    }
}
else if ($_POST["Tipo"] == "Factura Examen") {
    $Categoria = $_POST['Categoria'];
    $Cliente_id = $_POST['Cliente_id'];

    if ($Categoria == "0") {
        $QueryFacturaExamenes = mysqli_query($conn3, "SELECT * FROM LB_Examen where Activo = '1' ");
    } else {
        $QueryFacturaExamenes = mysqli_query($conn3, "SELECT * FROM LB_Examen where Activo = '1' AND categoria_id='{$Categoria}' ");
    }

    echo "<option value='' > Seleccione Examen </option>";
    $nrowl = mysqli_num_rows($QueryFacturaExamenes);
    while ($RowFacturaExamenes = mysqli_fetch_array($QueryFacturaExamenes)) {

        $id = $RowFacturaExamenes['id'];
        $Categorias = funcionMaster($RowFacturaExamenes['categoria_id'], 'id', 'Nombre', 'LB_Categoria');
        $Nombre = $RowFacturaExamenes['Nombre'];

        
            echo "<option value='$id'> [$Categorias] - $Nombre </option>";

    }
} 
else if ($_POST["Tipo"] == "Precio Examen") {
    $Examen = $_POST['Examen'];

    if($Examen!="Todos"){
        $QueryPrecioExamenes = mysqli_query($conn3, "SELECT * FROM LB_Examen where id = '{$Examen}' AND Activo = '1' ");
        $nrowl = mysqli_num_rows($QueryPrecioExamenes);
        while ($RowPrecioExamenes = mysqli_fetch_array($QueryPrecioExamenes)) {
            $id = $RowPrecioExamenes['id'];
            $Precio = ($RowPrecioExamenes['Precio']);

            echo $Precio;
        }
    }
    else {
        echo "Todos";
    }
}
else if ($_POST["Tipo"] == "Verficiar Usuario Plataforma") {
    $Valor = $_POST['Valor'];
    $Medico = $_POST['Medico'];

        $QueryMedicos1 = mysqli_query($conn3, "SELECT * FROM LB_MedicosAsociados where id = '{$Medico}'");
        $nrowl = mysqli_num_rows($QueryMedicos1);
        while ($RowPrecioExamenes = mysqli_fetch_array($QueryMedicos1)) {
            $NombreUsuario = $RowPrecioExamenes['Usuario_Web'];
        }

        if($Valor!="" AND $NombreUsuario!=$Valor)
        {
            $QueryPacientes = mysqli_query($conn3, "SELECT * FROM cliente where Usuario_Web = '{$Valor}'");
            $nrowl = mysqli_num_rows($QueryPacientes);
            while ($RowPaciente = mysqli_fetch_array($QueryPacientes)) {
                $Nombre = $RowPaciente['nombre_cliente'];
            }

            if ($Nombre != "") {
                $Mensaje = "el Nombre de Usuario *" . $Nombre . "* esta en uso por un paciente";
            }

            $QueryMedicos = mysqli_query($conn3, "SELECT * FROM LB_MedicosAsociados where Usuario_Web = '{$Valor}'");
            $nrowl = mysqli_num_rows($QueryMedicos);
            while ($RowPrecioMedicos = mysqli_fetch_array($QueryMedicos)) {
                $NombreUsuario1 = $RowPrecioMedicos['Nombre'];
            }

            if ($NombreUsuario1 != "") {
                $Mensaje .= ", el Nombre de Usuario *" . $NombreUsuario1 . "* esta en uso por un medico";
            }


            echo $Mensaje;
        }
        
}
else if ($_POST["Tipo"] == "Buscar Valores Referencia Antiguo") {
    $id = $_POST['id'];
    $Valor = $_POST['Valor'];

    $QueryExamen = mysqli_query($conn3, "SELECT * FROM LB_ExamenCargado where id = '{$id}' limit 1");
    while ($RowExamenes = mysqli_fetch_array($QueryExamen)) {
    $Valores_Referencia_Filtrado = $RowExamenes['Valores_Referencia_Filtrado'];
    }

    $Correcto="0";$Correcto_Color="";
    $Incorrecto="0";$Incorrecto_Color="";
    $listado = json_decode($Valores_Referencia_Filtrado, true);
    foreach ($listado as $key => $value) {

        if ($value["Tipo_Filtro_Historia"] == "Numerico") {

            if ($Valor >= $value["Valor_Referencia_Minima_Historia"] and $Valor <= $value["Valor_Referencia_Maxima_Historia"]) {
                $Correcto++;
                $Correcto_Color = $value["Color_Correcto_Historia"];
            } else {
                $Incorrecto++;
                $Incorrecto_Color = "RED";
            }
        } else if ($value["Tipo_Filtro_Historia"] == "Texto") {

            if ($Valor == $value["Valor_Referencia_Minima_Historia"]) {
                $Correcto++;
                $Correcto_Color = $value["Color_Correcto_Historia"];
            } else{
                $Incorrecto++;
                $Incorrecto_Color = "RED";
            }
        }
    }

    if($Correcto<>"0")
    {
        echo $Correcto_Color;
    }else {
        echo $Incorrecto_Color;
    }

} else if ($_POST["Tipo"] == "Buscar Valores Referencia Texto") {
    $id = $_POST['id'];
    $Cliente_id = $_POST['Cliente_id'];

    $QueryCliente = mysqli_query($conn3, "SELECT * FROM cliente where cliente_id = '{$Cliente_id}' ");
    while ($rowCliente = mysqli_fetch_array($QueryCliente)) {
        //$id = $rowCliente['id'];
        $Genero = $rowCliente['genero'];

        switch ($Genero) {
            case "F":
                $Genero = "Femenino";
                break;
            case "M":
                $Genero = "Masculino";
                break;
        }

        $fecha_nacimiento = $rowCliente['fechaNacimiento'];
        date_default_timezone_set('America/Bogota');
        $nacimiento = new DateTime($fecha_nacimiento);
        $ahora = new DateTime(date("Y-m-d"));
        $diferencia = $ahora->diff($nacimiento);

        $ArregloFecha["Anual"] = $diferencia->format("%y");
        $ArregloFecha["Meses"] = ($diferencia->y * 12) + $diferencia->m;
        $ArregloFecha["Dias"] = $diferencia->days;

        //tope maximo de busqueda de edad 100 a;os 1200 meses 365000 dias
        $MultiplicadorFinal["Anual"] = "100";   
        $MultiplicadorFinal["Meses"] = "1200";
        $MultiplicadorFinal["Dias"] = "365000";
    }


    $QueryExamen = mysqli_query($conn3, "SELECT * FROM LB_ExamenCargado where id = '{$id}' limit 1");
    while ($RowExamenes = mysqli_fetch_array($QueryExamen)) {
        $Valores_Referencia_Filtrado = $RowExamenes['Valores_Referencia_Filtrado'];
    }

    $ValoresDeReferencia="";
    $Correcto = "0";
    $Correcto_Color = "";
    $Incorrecto = "0";
    $Incorrecto_Color = "";
    $listado = json_decode($Valores_Referencia_Filtrado, true);
    foreach ($listado as $key => $value) {

            if($value["Tipo_Edad"]!= "No Aplica" AND $value["Sexo"] != "No Aplica"){
                
                if($value["Edad_Maxima"]=="0"){$value["Edad_Maxima"]= $MultiplicadorFinal[$value["Tipo_Edad"]];}

                if($value["Sexo"] == $Genero AND $ArregloFecha[$value["Tipo_Edad"]] >= $value["Edad_Minima"] and $ArregloFecha[$value["Tipo_Edad"]] <= $value["Edad_Maxima"] ){
                    $ValoresDeReferencia.= "". $value["Nombre"]." : [ ". $value["Valor_Referencia_Minima"] ." - ". $value["Valor_Referencia_Maxima"]." ] <br>";
                }
            }
            else if($value["Sexo"] == "No Aplica" AND $value["Tipo_Edad"] != "No Aplica" ){
                if($value["Edad_Maxima"]=="0"){$value["Edad_Maxima"]= $MultiplicadorFinal[$value["Tipo_Edad"]];}

                if($ArregloFecha[$value["Tipo_Edad"]] >= $value["Edad_Minima"] and $ArregloFecha[$value["Tipo_Edad"]] <= $value["Edad_Maxima"] ){
                    $ValoresDeReferencia.= "". $value["Nombre"]." : [ ". $value["Valor_Referencia_Minima"] ." - ". $value["Valor_Referencia_Maxima"]." ] <br>";
                }
            }
            else {
                $ValoresDeReferencia.= "". $value["Nombre"]." : [ ". $value["Valor_Referencia_Minima"] ." - ". $value["Valor_Referencia_Maxima"]." ] <br>";
            }
    }

    //echo $ValoresDeReferencia;

    echo $ValoresDeReferencia;
} 
else if ($_POST["Tipo"] == "Buscar Valores Referencia") {
    $id = $_POST['id'];
    $Valor = $_POST['Valor'];
    $Cliente_id = $_POST['Cliente_id'];

    $QueryCliente = mysqli_query($conn3, "SELECT * FROM cliente where cliente_id = '{$Cliente_id}' ");
    while ($rowCliente = mysqli_fetch_array($QueryCliente)) {
        $Genero = $rowCliente['genero'];

        switch ($Genero) {
            case "F":
                $Genero = "Femenino";
                break;
            case "M":
                $Genero = "Masculino";
                break;
        }

        $fecha_nacimiento = $rowCliente['fechaNacimiento'];
        date_default_timezone_set('America/Bogota');
        $nacimiento = new DateTime($fecha_nacimiento);
        $ahora = new DateTime(date("Y-m-d"));
        $diferencia = $ahora->diff($nacimiento);

        $ArregloFecha["Anual"] = $diferencia->format("%y");
        $ArregloFecha["Meses"] = ($diferencia->y * 12) + $diferencia->m;
        $ArregloFecha["Dias"] = $diferencia->days;

        //tope maximo de busqueda de edad 100 a;os 1200 meses 365000 dias
        $MultiplicadorFinal["Anual"] = "100";
        $MultiplicadorFinal["Meses"] = "1200";
        $MultiplicadorFinal["Dias"] = "365000";
    }

    $QueryExamen = mysqli_query($conn3, "SELECT * FROM LB_ExamenCargado where id = '{$id}' limit 1");
    while ($RowExamenes = mysqli_fetch_array($QueryExamen)) {
        $Valores_Referencia_Filtrado = $RowExamenes['Valores_Referencia_Filtrado'];
    }

    $ValoresDeReferencia = "";
    $Correcto = "0";
    $Correcto_Color = "";
    $Incorrecto = "0";
    $Incorrecto_Color = "";
    $listado = json_decode($Valores_Referencia_Filtrado, true);
    foreach ($listado as $key => $value) {

        if($value["Tipo_Filtro"]=="Numerico"){

           if ($value["Tipo_Edad"] != "No Aplica" and $value["Sexo"] != "No Aplica") {

            if ($value["Edad_Maxima"] == "0") {
                $value["Edad_Maxima"] = $MultiplicadorFinal[$value["Tipo_Edad"]];
            }

            if ($value["Sexo"] == $Genero and $ArregloFecha[$value["Tipo_Edad"]] >= $value["Edad_Minima"] and $ArregloFecha[$value["Tipo_Edad"]] <= $value["Edad_Maxima"]) {

                if ($Valor >= $value["Valor_Referencia_Minima"] and $Valor <= $value["Valor_Referencia_Maxima"]) {
                    $Correcto++;
                    $Correcto_Color = $value["Color_Correcto"];
                } else {
                    $Incorrecto++;
                    $Incorrecto_Color = "RED";
                }

            }
            } else if ($value["Sexo"] == "No Aplica" and $value["Tipo_Edad"] != "No Aplica") {
                if ($value["Edad_Maxima"] == "0") {
                    $value["Edad_Maxima"] = $MultiplicadorFinal[$value["Tipo_Edad"]];
                //echo "entro123";
                }
                //echo $ArregloFecha[$value["Tipo_Edad"]].">=".$value["Edad_Minima"]."and". $ArregloFecha[$value["Tipo_Edad"]]."<=".$value["Edad_Maxima"]."   /r";
                if ($ArregloFecha[$value["Tipo_Edad"]] >= $value["Edad_Minima"] and $ArregloFecha[$value["Tipo_Edad"]] <= $value["Edad_Maxima"]) {
                    //echo "entro";
                    if ($Valor >= $value["Valor_Referencia_Minima"] and $Valor <= $value["Valor_Referencia_Maxima"]) {
                        $Correcto++;
                        
                        $Correcto_Color = $value["Color_Correcto"];
                    } else {
                        $Incorrecto++;
                        $Incorrecto_Color = "RED";
                    }

                }
            } else {

                if ($Valor >= $value["Valor_Referencia_Minima"] and $Valor <= $value["Valor_Referencia_Maxima"]) {
                    $Correcto++;
                    $Correcto_Color = $value["Color_Correcto"];
                } else {
                    $Incorrecto++;
                    $Incorrecto_Color = "RED";
                }
            } 
        }
        else if($value["Tipo_Filtro"] == "Texto"){
            if ($value["Tipo_Edad"] != "No Aplica" and $value["Sexo"] != "No Aplica") {

                if ($value["Edad_Maxima"] == "0") {
                    $value["Edad_Maxima"] = $MultiplicadorFinal[$value["Tipo_Edad"]];
                }

                if ($value["Sexo"] == $Genero and $ArregloFecha[$value["Tipo_Edad"]] >= $value["Edad_Minima"] and $ArregloFecha[$value["Tipo_Edad"]] <= $value["Edad_Maxima"]) {

                    if ($Valor == $value["Valor_Referencia_Maxima"]) {
                        $Correcto++;
                        $Correcto_Color = $value["Color_Correcto"];
                    } else {
                        $Incorrecto++;
                        $Incorrecto_Color = "RED";
                    }
                }
            } else if ($value["Sexo"] == "No Aplica" and $value["Tipo_Edad"] != "No Aplica") {
                if ($value["Edad_Maxima"] == "0") {
                    $value["Edad_Maxima"] = $MultiplicadorFinal[$value["Tipo_Edad"]];
                    //echo "entro123";
                }
                //echo $ArregloFecha[$value["Tipo_Edad"]].">=".$value["Edad_Minima"]."and". $ArregloFecha[$value["Tipo_Edad"]]."<=".$value["Edad_Maxima"]."   /r";
                if ($ArregloFecha[$value["Tipo_Edad"]] >= $value["Edad_Minima"] and $ArregloFecha[$value["Tipo_Edad"]] <= $value["Edad_Maxima"]) {
                    //echo "entro";
                    if ($Valor == $value["Valor_Referencia_Maxima"]) {
                        $Correcto++;

                        $Correcto_Color = $value["Color_Correcto"];
                    } else {
                        $Incorrecto++;
                        $Incorrecto_Color = "RED";
                    }
                }
            } else {

                if ($Valor == $value["Valor_Referencia_Maxima"]) {
                    $Correcto++;
                    $Correcto_Color = $value["Color_Correcto"];
                } else {
                    $Incorrecto++;
                    $Incorrecto_Color = "RED";
                }
            }
        }
        
    }

    if ($Correcto <> "0") {
        echo $Correcto_Color;
    } else {
        echo $Incorrecto_Color;
    }

}

else if ($_POST["Tipo"] == "Formula Caracteristica") {

    $examen_id = $_POST['id'];
    $QueryFacturaExamenes = mysqli_query($conn3, "SELECT * FROM LB_Examen where id = '{$examen_id}' limit 1");
    while ($RowExamenes = mysqli_fetch_array($QueryFacturaExamenes)) {
        $Caracteristicas = $RowExamenes['Caracteristicas'];
    }

    $listado = json_decode($Caracteristicas, true);

    foreach ($listado as $key => $value) {
        if ($value["id"] != "") {
            $idFormula = $value["id"];
            $Nombre = $value["Nombre_Caracteristica"];
    
            if($value["Campo_Resultado"]!="Lista" AND $value["Campo_Resultado"]!="Subtitulo"){
    
    
            $Formula = PonerComillasyOtrosCaracteres($value['Formula']);
            if($Formula==""){
                $Formula = "[]";
            }	
    
            echo "<div class='col-md-12'>
                    <div class='col-md-4'>
                        {$Nombre}
                    </div>
                    <div class='col-md-4'>
                        <select id='{$idFormula}' class='form-control input-lg select2 Formula' style='width:100%'>";
                        echo "<option value=''>Seleccione</option>";
                        foreach ($listado as $key1 => $value1) {
                            $id = $value1["id"];
                            if($value1["Campo_Resultado"]!="Lista" AND $value1["Campo_Resultado"]!="Subtitulo"){
                                $NombreCaracteristica = $value1["Nombre_Caracteristica"];
        
                                $ArregloCaracteristicas[$id] = $NombreCaracteristica;
                                echo "<option value='idC=$id'> [idC=$id] {$NombreCaracteristica} </option>";
                            }
                        }
                        echo "<option value='*'>*</option>";
                        echo "<option value='/'>/</option>";
                        echo "<option value='+'>+</option>";
                        echo "<option value='-'>-</option>";
                        echo "<option value='('>(</option>";
                        echo "<option value=')'>)</option>";
                        
                echo "  </select>
                    </div>
                    <div class='col-md-4'>
                        <input name='Formulas[{$idFormula}][]' id='Formula_{$idFormula}' class='form-control input-lg' style='width:100%' value='{$Formula}' readonly> <a href='#' class='fa fa-close' onclick='LimpiarCampo({$idFormula})'>Limpiar</a>
                    </div>
                <hr><br><hr>
            </div>";
            }
        }
    }
    
    
        echo "<input type='hidden' name='examen_id' value='{$examen_id}'>";

}

?>