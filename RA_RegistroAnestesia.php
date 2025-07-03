
<?php
include 'header.php';
include 'menu.php';




?>

<style>
.Titulo_Pagina {
    width: fit-content;
    background-color: #3c8dbc75;
    padding: 20px;
    border-radius: 20px 20px 0px 0px;
    display: table-cell;
}

.panel-default>.panel-heading {
    color: #333;
    background-color: #f5f5f5;
    border-color: #ddd;
    margin-bottom: 10px;
}

.panel-heading {
    padding: 10px 15px;
    border-bottom: 1px solid transparent;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
}
.table td, .table th {
    padding: 0;
    text-align-last: center;
}
</style>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> Registro de Anestesia del Paciente <?=$nombre_cliente;?> </a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="content">
                <h4 class="Titulo_Pagina"> Registro de Anestesia del Paciente <?=$nombre_cliente;?> </h4>
                <div class="box">
                    <div class="box-body">
                        <form action="RA_GuardarHistoria.php" method="POST" id="Formulario_Hitoria_Anestesia">

                            <div class="row">
                                
                                <?php
                                
                                $ArregloAnestesia = array(
                                    "Fecha" => "Fecha",
                                    "Sala" => "Sala",
                                    "Ayuno" => "Ayuno",
                                    "Cirugia_Seleccion" => "Cirugia",
                                    "Anestesiologo" => "Anestesiologo",
                                    "Cirujano" => "Cirujano",
                                    "Cirugia" => "Cirugia",
                                    "hora_inicio_anestesia" => "Hora de inicio de anestesia",
                                    "hora_finaliza_anestesia" => "Hora de finalización de anestesia",
                                );
                                
                                $Contador = 0;
                                foreach ($ArregloAnestesia as $key => $value) {
                                    $Contador++;
                                    $Titulo = $value;
                                    $Identificacion = $key;
                                    $colWidth = ($Contador <= 4) ? "col-md-3" : "col-md-12"; // Determina el ancho de la columna según el índice
                                
                                    echo "<div class='form-group $colWidth'>
                                            <div align='left'><label>$Titulo</label></div>";
                                
                                    if ($Contador <= 3 || $Contador == 8 || $Contador == 9) { // Si es del 1 al 3
                                        if($Contador == 1 ){
                                            $Typo = "date";
                                        }else if($Contador == 8 || $Contador == 9){
                                            $Typo = "time";
                                        }else{
                                            $Typo = "text";
                                        }
                                        echo "<input type='$Typo' class='form-control' name='Historia[PrimerModulo][$Identificacion]'>";
                                    } elseif ($Contador == 4) { // Si es el 4

                                        echo "<div class='col-md-12 row'>
                                                <div align='center' class='col-md-6'>
                                                    <label style='position: relative;top: -14px;'>Urg</label>
                                                    <input type='radio' class='form-control input-lg CirugiaCheck' name='Historia[PrimerModulo][$Identificacion]' value='Urg' style='width: 40px;display: inline;'>
                                                </div>
                                                <div align='center' class='col-md-6'>
                                                    <label style='position: relative;top: -14px;'>Elec</label>
                                                    <input type='radio' class='form-control input-lg CirugiaCheck' name='Historia[PrimerModulo][$Identificacion]' value='Elec' style='width: 40px;display: inline;'>
                                                </div>
                                              </div>";

                                    }else { // Si es del 5 al 7
                                        echo "<input type='text' class='form-control' name='Historia[PrimerModulo][$Identificacion]'>";
                                    }
                                
                                    echo "</div>";
                                }

                                ?>

                                <div class="col-md-12">
                                    <hr>
                                </div>

                                <div class="col-md-12">
                                    <h2 style="text-align: center;"> Técnica de Anestesia Regional</h2>
                                    <br>
                                </div>

                                <?php
                                
                                $ArregloAnestesia = array(
                                    "Peridual" => "Peridual",
                                    "Raquidea" => "Raquídea",
                                    "Bloqueo" => "Bloqueo",
                                    "Regional_EV" => "Regional EV",
                                    "Otros" => "Otros",
                                    "Aguja_NO" => "Aguja No",
                                    "D_Puncion" => "D. Punción",
                                    "Posicion" => "Posición",
                                    "Altura" => "Altura",
                                    "Dosis" => "Dosis",
                                    "Vasocont" => "Vasocont",
                                    "Cateter" => "Cateter",
                                    "Revision_Maquina" => "Revisión Máquina",
                                    "Fujo_O" => "Fujo O",
                                    "Energia" => "Energía",
                                    "Monitores" => "Monitores",
                                    "Succion" => "Succión",
                                    "Tubo" => "Tubo",
                                    "Laringosc" => "Laringosc",
                                    "MSV" => "M.S.V",
                                    "Pulsioximent" => "Pulsioximent",
                                    "Cardioscopio" => "Cardioscopio",
                                    "Capnografo" => "Capnografo",
                                    "PVC" => "P.V.C",
                                    "Linea_Art" => "Línea Art",
                                    "Fon_Precord" => "Fon. Precord",
                                    "Fon_Essofag" => "Fon. Essofag",
                                    "Sonda_NG" => "Sonda N.G",
                                    "Sonda_Vesical" => "Sonda Vesical",
                                    "Swan_Gans" => "Swan Gans",


                                );
                                
                                $Contador = 0;
                                foreach ($ArregloAnestesia as $key => $value) {

                                    $Contador++;
                                    $Titulo = $value;
                                    $Identificacion = $key;
                                    $colWidth = ($Contador <= 5) ? "col-md-3" : "col-md-3"; // Determina el ancho de la columna según el índice
                                    
                                    echo "<div class='form-group $colWidth'>
                                            <div align='center'><label>$Titulo</label></div>";
                                
                                    if ($Contador <= 5) { // Si es del 1 al 5
                                        echo "<input type='checkbox' class='form-control input-lg' name='Historia[AnestesiaRegional][$Identificacion]' value='Si'>";
                                    } elseif ($Contador <= 10) { // Si es del 6 al 10
                                        echo "<input type='text' class='form-control' name='Historia[AnestesiaRegional][$Identificacion]'>";
                                    } elseif ($Contador <= 12) { // Si es del 11 al 12
                                        echo "<div class='col-md-12 row'>
                                                <div align='center' class='col-md-6'>
                                                    <label style='position: relative;top: -14px;'>Si</label>
                                                    <input type='radio' class='form-control input-lg' name='Historia[AnestesiaRegional][$Identificacion]' value='Si' style='width: 40px;display: inline;'>
                                                </div>
                                                <div align='center' class='col-md-6'>
                                                    <label style='position: relative;top: -14px;'>No</label>
                                                    <input type='radio' class='form-control input-lg' name='Historia[AnestesiaRegional][$Identificacion]' value='No' style='width: 40px;display: inline;'>
                                                </div>
                                              </div>";
                                    } else { // Si es del 13 al 30
                                        echo "<input type='checkbox' class='form-control input-lg' name='Historia[AnestesiaRegional][$Identificacion]' value='Si'>";
                                    }
                                
                                    echo "</div>";

                                    // Agregar <hr> y div col-md-12 después de ciertos elementos
                                    if (in_array($Contador, array(5, 9, 12, 19, 25, 30))) {
                                        echo "<div class='col-md-12'><hr></div>";
                                    }

                                }


                                echo "<div class='col-md-12 row'>
                                        <div class='col-md-4' style='text-align:center;'><h3> Induccion  </h3></div>
                                        <div class='col-md-8' style='text-align:center;'><h3> Inhalatoria </h3></div>
                                        <div class='col-md-12'><hr></div>
                                        
                                        <div class='col-md-4' style='place-self: center;text-align-last: center;'><h3>Intubacion</h3></div>
                                        <div class='col-md-8 row'>";

                                        $ArregloAnestesia = array(
                                            "NT_Der" => "N.T. Der",
                                            "OT" => "O.T.",
                                            "NT_Izq" => "N.T. Izq",
                                            "Tuno_NO" => "Tubo No.",
                                            "Balon" => "Balón",
                                            "Traqueost" => "Traqueost",
                                        );
                                        
                                        $Contador=0;
                                        foreach ($ArregloAnestesia as $key => $value) {
                                            $Contador++;
                                            $Titulo = $value;
                                            $Identificacion = $key;
                                            $colWidth = "col-md-3"; // Determina el ancho de la columna según el índice
                                        
                                            echo "<div class='$colWidth'>
                                                    <div align='left'><label>$Titulo</label></div>";
                                        

                                                    if ($Contador != 4 && $Contador != 5 && $Contador != 6) { // Si es del 1 al 5
                                                        echo "<input type='checkbox' class='form-control input-lg' name='Historia[AnestesiaRegional][$Identificacion]' value='Si'>";
                                                    }elseif($Contador == 5 || $Contador == 6){
                                                        echo "<div class='col-md-12 row'>
                                                            <div align='center' class='col-md-6'>
                                                                <label style='position: relative;top: -14px;'>Si</label>
                                                                <input type='radio' class='form-control input-lg' name='Historia[AnestesiaRegional][$Identificacion]' value='Si' style='width: 40px;display: inline;'>
                                                            </div>
                                                            <div align='center' class='col-md-6'>
                                                                <label style='position: relative;top: -14px;'>No</label>
                                                                <input type='radio' class='form-control input-lg' name='Historia[AnestesiaRegional][$Identificacion]' value='No' style='width: 40px;display: inline;'>
                                                            </div>
                                                        </div>";
                                                    } 
                                                    else{// Si es del 6 al 10
                                                        echo "<input type='text' class='form-control' name='Historia[AnestesiaRegional][$Identificacion]'>";
                                                    }
                                            
                                        
                                            echo "</div>";
                                        }

                                        echo "</div>";

                                    echo "<div class='col-md-12'><hr></div>";
                                    echo "<div class='col-md-4' style='place-self: center;text-align-last: center;'><h3>Circuito</h3></div>
                                    <div class='col-md-8 row'>";

                                    $ArregloAnestesia = array(
                                        "Abierto" => "Abierto",
                                        "Cerrado" => "Cerrado",
                                        "Mixto" => "Mixto",
                                        "S_Abierto" => "S. Abierto",
                                        "S_Cerrado" => "S. Cerrado",
                                    );
                                    
                                    $Contador=0;
                                    foreach ($ArregloAnestesia as $key => $value) {
                                        $Contador++;
                                        $Titulo = $value;
                                        $Identificacion = $key;
                                        $colWidth =  "col-md-3"; // Determina el ancho de la columna según el índice
                                    
                                        echo "<div class='form-group $colWidth'>
                                                <div align='left'><label>$Titulo</label></div>";
                                    

                                                if ($Contador != 3) { // Si es del 1 al 5
                                                    echo "<input type='checkbox' class='form-control input-lg' name='Historia[AnestesiaRegional][$Identificacion]' value='Si'>";
                                                } else{// Si es del 6 al 10
                                                    echo "<input type='text' class='form-control' name='Historia[AnestesiaRegional][$Identificacion]'>";
                                                }
                                        
                                    
                                        echo "</div>";
                                    }

                                    echo "</div>";

                                    echo "<div class='col-md-12'><hr></div>";
                                    echo "<div class='col-md-4' style='place-self: center;text-align-last: center;'><h3>Mantenimiento</h3></div>
                                    <div class='col-md-8 row'>";

                                    $ArregloAnestesia = array(
                                        "Inhalatorio" => "Inhalatorio",
                                        "Parental" => "Parental",
                                        "EV" => "EV",
                                        "IM" => "IM",
                                    );
                                    
                                    $Contador=0;
                                    foreach ($ArregloAnestesia as $key => $value) {
                                        $Contador++;
                                        $Titulo = $value;
                                        $Identificacion = $key;
                                        $colWidth = "col-md-3"; // Determina el ancho de la columna según el índice
                                    
                                        echo "<div class='form-group $colWidth'>
                                                <div align='left'><label>$Titulo</label></div>";
                                    

                                                if ($Contador != 2) { // Si es del 1 al 5
                                                    echo "<input type='checkbox' class='form-control input-lg' name='Historia[AnestesiaRegional][$Identificacion]' value='Si'>";
                                                } else{// Si es del 6 al 10
                                                    echo "<input type='text' class='form-control' name='Historia[AnestesiaRegional][$Identificacion]'>";
                                                }
                                        
                                    
                                        echo "</div>";
                                    }

                                    echo "</div>";

                                    echo "<div class='col-md-12'><hr></div>";
                                    echo "<div class='col-md-4' style='place-self: center;text-align-last: center;'><h3>Respiracion</h3></div>
                                    <div class='col-md-8 row'>";

                                    $ArregloAnestesia = array(
                                        "Espontanea" => "Espontanea",
                                        "Asistida" => "Asistida",
                                        "Controlada" => "Controlada",
                                        "Manual" => "Manual",
                                        "Mecanica" => "Mecanica",
                                    );
                                    
                                    $Contador=0;
                                    foreach ($ArregloAnestesia as $key => $value) {
                                        $Contador++;
                                        $Titulo = $value;
                                        $Identificacion = $key;
                                        $colWidth = "col-md-3"; // Determina el ancho de la columna según el índice
                                    
                                        echo "<div class='form-group $colWidth'>
                                                <div align='left'><label>$Titulo</label></div>";
                                    

                                            if ($Contador != 3) { // Si es del 1 al 5
                                                echo "<input type='checkbox' class='form-control input-lg' name='Historia[AnestesiaRegional][$Identificacion]' value='Si'>";
                                            } else{// Si es del 6 al 10
                                                echo "<input type='text' class='form-control' name='Historia[AnestesiaRegional][$Identificacion]'>";
                                            }
                                        
                                    
                                        echo "</div>";
                                    }

                                    echo "</div>";

                                echo "</div>";

                                echo "<div class='col-md-12'><hr></div>";

                                ?>



                                <div class="col-md-12 row">
                                    <div class ="col-md-8">
                                        <div align="left"><label>Posicion</label></div>
                                        <input type="text" name="Historia[SegundoModulo][Posicion]" value="" class="input-lg form-control">

                                        <div class="col-md-12">
                                            <div align="center"><h3>Gases</h3></div>
                                        </div>
                                        <div class="col-md-12" style="    padding-bottom: 10px;">
                                            <label style="float: left;">1.</label><input type="text" name="Historia[SegundoModulo][Gases_1]" value="" class="input-lg form-control" style="width:-webkit-fill-available;">
                                        </div>
                                        <div class="col-md-12" style="    padding-bottom: 10px;">
                                            <label style="float: left;">2.</label><input type="text" name="Historia[SegundoModulo][Gases_2]" value="" class="input-lg form-control" style="width:-webkit-fill-available;">
                                        </div>
                                        <div class="col-md-12" style="    padding-bottom: 10px;">
                                            <label style="float: left;">3.</label><input type="text" name="Historia[SegundoModulo][Gases_3]" value="" class="input-lg form-control" style="width:-webkit-fill-available;">
                                        </div>

                                    </div>

                                    <div class ="col-md-4">
                                        <div align="center"><label> Torniquete o Ciamp</label></div>

                                        <div align="left"><label> Hora Colocacion</label></div>
                                        <input type="time" name="Historia[SegundoModulo][Hora_Colocacion]" value="" class="input-lg form-control">

                                        <div align="left"><label> Hora Retiro</label></div>
                                        <input type="time" name="Historia[SegundoModulo][Hora_Retiro]" value="" class="input-lg form-control">

                                        <div align="left"><label> Tiempo Total</label></div>
                                        <input type="text" name="Historia[SegundoModulo][Total]" value="" class="input-lg form-control">
                                    </div>
                                </div>

                                <div class='col-md-12'><hr></div>

                                <div class="col-md-12 row">

                                    <div class="col-md-4">
                                        <div align="left"><label>T.A  [X]</label></div>
                                        <input type="text" name="Historia[TercerModulo][TA]" value="" class="input-lg form-control">
                                        <!--<button class="btn btn-primary" onclick="copiarCaracter('X')" type='button'>X</button>-->
                                    </div>
                                    <div class="col-md-4">
                                        <div align="left"><label>P.A.M [*]</label></div>
                                        <input type="text" name="Historia[TercerModulo][PAM]" value="" class="input-lg form-control">
                                        <!--<button class="btn btn-primary" onclick="copiarCaracter('*')" type='button'>*</button>-->
                                    </div>
                                    <div class="col-md-4">
                                        <div align="left"><label>F.C. [•]</label></div>
                                        <input type="text" name="Historia[TercerModulo][FC]" value="" class="input-lg form-control">
                                        <!--<button class="btn btn-primary" onclick="copiarCaracter('•')" type='button'>•</button>-->
                                    </div>

                                    <div class="col-md-4">
                                        <div align="left"><label>F.R. [○]</label></div>
                                        <input type="text" name="Historia[TercerModulo][FR]" value="" class="input-lg form-control">
                                        <!--<button class="btn btn-primary" onclick="copiarCaracter('○')" type='button'>○</button>-->
                                    </div>
                                    <div class="col-md-4">
                                        <div align="left"><label>Int: [▼]</label></div>
                                        <input type="text" name="Historia[TercerModulo][INT]" value="" class="input-lg form-control">
                                        <!--<button class="btn btn-primary" onclick="copiarCaracter('▼')" type='button'>▼</button>-->
                                    </div>
                                    <div class="col-md-4">
                                        <div align="left"><label>Ext. [▲]</label></div>
                                        <input type="text" name="Historia[TercerModulo][EXT]" value="" class="input-lg form-control">
                                        <!--<button class="btn btn-primary" onclick="copiarCaracter('▲')" type='button'>▲</button>-->
                                    </div>
                                    <div class="col-md-4">
                                        <div align="left"><label>I. Anest. [Ø]</label></div>
                                        <input type="text" name="Historia[TercerModulo][I_Anestecia]" value="" class="input-lg form-control">
                                        <!--<button class="btn btn-primary" onclick="copiarCaracter('Ø')" type='button'>Ø</button>-->
                                    </div>
                                    <div class="col-md-4">
                                        <div align="left"><label>I. Cirug. [x]</label></div>
                                        <input type="text" name="Historia[TercerModulo][I_Cirugia]" value="" class="input-lg form-control">
                                        <!--<button class="btn btn-primary" onclick="copiarCaracter('x')" type='button'>x</button>-->
                                    </div>
                                    <div class="col-md-4">
                                        <div align="left"><label>Temp. [T]</label></div>
                                        <input type="text" name="Historia[TercerModulo][Temperatura]" value="" class="input-lg form-control">
                                        <!--<button class="btn btn-primary" onclick="copiarCaracter('T')" type='button'>T</button>-->
                                    </div>

                                </div>

                                <div class="col-md-12">
                                    <hr>
                                </div>


                            

                                <script>
                                    function copiarCaracter(idInput) {
                                        // Obtiene el valor del input
                                        var valorInput = idInput;
                                        // Copia el valor al portapapeles
                                        navigator.clipboard.writeText(valorInput)
                                            .then(function() {
                                                console.log('Valor copiado: ' + valorInput);
                                            })
                                            .catch(function(error) {
                                                console.error('Error al copiar: ', error);
                                            });
                                    }
                                </script>

                                <div class="col-md-12" style="overflow-x: scroll;">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th colspan='2'>Agente</th>
                                                
                                                <?php
                                                    $CantidadRangos = 4;
                                                    for ($i = 1; $i <= $CantidadRangos; $i++) {
                                                        echo "
                                                        <th><input type='text' name='TablaRecordAnestesia[RangoTiempo][$i]' value='' style='width: 40px;'></i></th>
                                                        <th>5</th>
                                                        <th>10</th>
                                                        <th>15</th>
                                                        <th>20</th>
                                                        <th>25</th>
                                                        <th>30</th>
                                                        <th>35</th>
                                                        <th>40</th>
                                                        <th>45</th>
                                                        <th>50</th>
                                                        <th>55</th>
                                                        "; 
                                                    }
                                                    echo "<th><input type='text' name='TablaRecordAnestesia[RangoTiempo][".($CantidadRangos+1)."]' value='' style='width: 40px;'></i></th>";
                                                ?>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php 
                                            $Numeracion=0;
                                            $NumeracionAgente=0;
                                            $Tipo="";
                                            for ($i = 30; $i >= 2; $i--) {
                                                $Tipo="";
                                                echo "<tr>";
                                                if (($i > 26)) {
                                                    $NumeracionAgente++;
                                                    $Numeracion = $NumeracionAgente;
                                                    $Tipo="Agente";
                                                    echo "<th colspan='2'> <input type='text' name='TablaRecordAnestesia[$Tipo][$NumeracionAgente][Agente]' value='' style='width: 140px;'></th>";
                                                }
                                                elseif (($i % 2 == 0) && ($i <= 26)) {

                                                    if($Tipo==""){
                                                        $Numeracion=$i*10;
                                                    }
                                                    echo "<th colspan='2'>" . ($i * 10) . "</th>";
                                                    $Tipo="TA";
                                                } else {

                                                    if($Tipo==""){
                                                        $Numeracion=$i*10;
                                                    }

                                                    $Tipo="TA";
                                                    echo "<th colspan='2'></th>";
                                                }


                                                for ($j = 0; $j <= 12 * $CantidadRangos; $j++) {
                                                    
                                                    echo "<td> <input type='text' name='TablaRecordAnestesia[$Tipo][$Numeracion][$j]' value='' style='width: 40px;'></td>";
                                                    
                                                }

                                                echo "<input type='hidden' name='TablaRecordAnestesia[$Tipo][$Numeracion][A]' value=''>";

                                                echo "</tr>";
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <?php

                                            echo "<th colspan='2'> Tiempo </th>";
                                                for ($j = 0; $j <= 12 * $CantidadRangos; $j++) {
                                                        echo "<td> <input type='text' name='TablaRecordAnestesia[Tiempo][$j]' style='width: 40px;'></td>";
                                                }
                                                echo "<input type='hidden' name='TablaRecordAnestesia[Tiempo][$j][A]' value=''>";
                                            ?>
                                        </tfoot>
                                    </table>
                                </div>

                                <div class="col-md-12 row">
                                    <div class="col-md-12">
                                        <br>
                                        <div align="center"><h3>Medicamentos</h3></div>
                                    </div>
                                    <div class="col-md-12" style="    padding-bottom: 10px;">
                                        <label style="float: left;">1.</label><input type="text" name="Historia[TercerModulo][Medicamentos_1]" value="" class="input-lg form-control" style="width:-webkit-fill-available;">
                                    </div>

                                    <div class="col-md-12" style="    padding-bottom: 10px;">
                                        <label style="float: left;">2.</label><input type="text" name="Historia[TercerModulo][Medicamentos_2]" value="" class="input-lg form-control" style="width:-webkit-fill-available;">
                                    </div>

                                    <div class="col-md-12" style="    padding-bottom: 10px;">
                                        <label style="float: left;">3.</label><input type="text" name="Historia[TercerModulo][Medicamentos_3]" value="" class="input-lg form-control" style="width:-webkit-fill-available;">
                                    </div>

                                    <div class="col-md-12" style="    padding-bottom: 10px;">
                                        <label style="float: left;">4.</label><input type="text" name="Historia[TercerModulo][Medicamentos_4]" value="" class="input-lg form-control" style="width:-webkit-fill-available;">
                                    </div>
                                </div>

                                <div class="col-md-12 row">

                                    <div class="col-md-12">
                                        <div align="left"><label>Duracion Cirugia</label></div>
                                        <input type="text" name="Historia[TercerModulo][DuracionCirugia]" value="" class="input-lg form-control">
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <div align="left"><label>Duración Anestesia</label></div>
                                        <input type="text" name="Historia[TercerModulo][DuracionAnestesia]" value="" class="input-lg form-control">
                                    </div>

                                </div>

                                <div class="col-md-12 ">
                                    <br><hr><br>
                                </div>



                                <div class="col-md-12 row">
                                    <div class="col-md-12">
                                        <div align="center"><h3> Estado al salir del quirófano </h3></div>
                                    </div>

                                    <div class ="col-md-4">

                                        <div align="left"><label>TA</label></div>
                                        <input type="text" name="Historia[CuartoModulo][TA]" value="" class="input-lg form-control">

                                    </div>

                                    <div class ="col-md-4">

                                        <div align="left"><label>FC</label></div>
                                        <input type="text" name="Historia[CuartoModulo][FC]" value="" class="input-lg form-control">

                                    </div>

                                    <div class ="col-md-4">

                                        <div align="left"><label>SAT</label></div>
                                        <input type="text" name="Historia[CuartoModulo][FR]" value="" class="input-lg form-control">

                                    </div>

                                    <div class="col-md-12 ">
                                        <hr>
                                    </div>


                                    <div class ="col-md-4">
                                        <label>Intubado</label>
                                    </div>

                                    <div class ="col-md-8 row">
                                        <div align='center' class='col-md-6'>
                                            <label style='position: relative;top: -14px;'>Si</label>
                                            <input type='radio' class='form-control input-lg' name='Historia[CuartoModulo][Intubado]' value='Si' style='width: 40px;display: inline;'>
                                        </div>
                                        <div align='center' class='col-md-6'>
                                            <label style='position: relative;top: -14px;'>No</label>
                                            <input type='radio' class='form-control input-lg' name='Historia[CuartoModulo][Intubado]' value='No' style='width: 40px;display: inline;'>
                                        </div>
                                    </div>

                                    <div class="col-md-12 ">
                                        <hr>
                                    </div>


                                    <div class ="col-md-4">
                                        <label>Reflejos</label>
                                    </div>

                                    <div class ="col-md-8 row">
                                        <div align='center' class='col-md-6'>
                                            <label style='position: relative;top: -14px;'>Si</label>
                                            <input type='radio' class='form-control input-lg' name='Historia[CuartoModulo][Reflejos]' value='Si' style='width: 40px;display: inline;'>
                                        </div>
                                        <div align='center' class='col-md-6'>
                                            <label style='position: relative;top: -14px;'>No</label>
                                            <input type='radio' class='form-control input-lg' name='Historia[CuartoModulo][Reflejos]' value='No' style='width: 40px;display: inline;'>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-12 row">
                                    <div class="col-md-12">
                                        <br><div align="center"><h3> Destino </h3></div><br>
                                    </div>

                                    <div class ="col-md-6" style="text-align-last: center;">
                                        <label style='position: relative;top: -14px;'>Recuperacion</label>
                                        <input type="checkbox" name="Historia[CuartoModulo][Destino]" value="Recuperacion" class="input-lg form-control">
                                    </div>

                                    <div class ="col-md-6" style="text-align-last: center;">
                                        <label style='position: relative;top: -14px;'>UCI</label>
                                        <input type="checkbox" name="Historia[CuartoModulo][Destino]" value="UCI" class="input-lg form-control">
                                    </div>

                                </div>
                                
                                <div class="col-md-12 ">
                                    <hr>
                                </div>


                                <div class="col-md-12"> 

                                    <table class="table table-bordered">
                                        <tbody>
                                            <?php
                                            
                                            $Campo = 'Oximetris';
                                            $Columnas = 6;
                                            echo '<tr>';

                                            echo '<th class="tg-0lax">Oximetris</th>';

                                            for ($i = 1; $i <= $Columnas; $i++) {
                                                echo '<th class="tg-0lax"><input type="text" name="Historia[QuintoModulo]['.$Campo.']['.$i.']" value="" class="input-lg form-control"></th>';
                                            }
                                            echo '</tr>';

                                            $Campo = 'Liquidos';
                                            $Columnas = 18;
                                            echo '<tr>';

                                            echo '<th class="tg-0lax" rowspan="3">Liquidos</th>';

                                            for ($i = 1; $i <= $Columnas; $i++) {
                                                echo '<th class="tg-0lax"><input type="text" name="Historia[QuintoModulo]['.$Campo.']['.$i.']" value="" class="input-lg form-control"></th>';
                                                if(($i==6)||($i==12)){
                                                    echo '</tr><tr>';
                                                }

                                            }
                                            echo '</tr>';

                                            $Campo = 'Total';
                                            $Columnas = 6;
                                            echo '<tr>';

                                            echo '<th class="tg-0lax">Total</th>';

                                            for ($i = 1; $i <= $Columnas; $i++) {
                                                echo '<th class="tg-0lax"><input type="text" name="Historia[QuintoModulo]['.$Campo.']['.$i.']" value="" class="input-lg form-control"></th>';
                                            }
                                            echo '</tr>';

                                            $Campo = 'Diuresis';
                                            $Columnas = 6;
                                            echo '<tr>';

                                            echo '<th class="tg-0lax">Diuresis</th>';

                                            for ($i = 1; $i <= $Columnas; $i++) {
                                                echo '<th class="tg-0lax"><input type="text" name="Historia[QuintoModulo]['.$Campo.']['.$i.']" value="" class="input-lg form-control"></th>';
                                            }
                                            echo '</tr>';

                                            ?>
                                        

                                        </tbody>
                                    </table>

                                </div>


                                <input type="hidden" name="cliente_id" value="<?php echo $_GET['clienteId']; ?>">
                                <input type="hidden" name="usuario_id" value="<?php echo $_SESSION['ID']; ?>">

                            
                                <div class="col-sm-12">
                                    <center><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" name="Guardar_Informacion_Pagina">
                                            <h2> <strong> G u a r d a r </strong> </h2>
                                        </button></center>
                                </div>

                            </div>
                            <!-- cierre row-->
                            

                        </form>
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
  // no quitar para evitar problemas de que guarde con este caracter ""
  $(document).on('input', 'input[type="text"], textarea', function() {
    $(this).val($(this).val().replace(/[']/g, ''));
  });
</script>
