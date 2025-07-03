<?php
include 'header.php';
include 'menu.php';

$clienteId = $_GET['clienteId'];

$usuarioId = $_SESSION['ID'];


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Paciente
    </h1>
    <ol class="breadcrumb">
      <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
      <li><a href="#">Historial de Registro de Anestesia</a></li>
    </ol>
  </section>

  <link rel="stylesheet" type="text/css" href="css/tab_nav_demo79_1.css" media="screen" />

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="card-body">
        <div class="box">
          <?php echo datosPacientes($clienteId); ?>
          <div align="center">

            <br><br>
          </div>
        </div>
      </div>
    </div>
  </section>

  <br>

  <div class="box-body">
    <div class="row">
      <div class="col-md-12">
        <div class="tab" role="tabpanel">
          <!-- Nav tabs -->
          <!-- <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#Section1" aria-controls="home" role="tab" data-toggle="tab"> <i class='fas fa-book-medical' style='font-size:26px'> </i> Historia</a></li>
            <li role="presentation"><a href="#Section2" aria-controls="profile" role="tab" data-toggle="tab"> <i class='fas fa-vials' style='font-size:26px'> </i> Exámenes</a></li>
            <li role="presentation"><a href="#Section3" aria-controls="messages" role="tab" data-toggle="tab"> <i class='fas fa-bed' style='font-size:26px'> </i> Incapacidades</a></li>
            <li role="presentation"><a href="#Section4" aria-controls="messages" role="tab" data-toggle="tab"> <i class='fas fa-prescription-bottle-alt' style='font-size:26px'> </i> Recetas</a></li>
            <li role="presentation"><a href="#Section5" aria-controls="messages" role="tab" data-toggle="tab"> <i class='fa-solid fa-calendar-days' style='font-size:26px'> </i> Citas</a></li>
            <li role="presentation"><a href="#Section6" aria-controls="messages" role="tab" data-toggle="tab"> <i class='fa-solid fa-credit-card' style='font-size:26px'> </i> Facturas</a></li>
            <li role="presentation"><a href="#Section7" aria-controls="messages" role="tab" data-toggle="tab"> <i class='fa-solid fa-credit-card' style='font-size:26px'> </i> Cuentas por cobrar</a></li>
            <li role="presentation"><a href="#Section8" aria-controls="messages" role="tab" data-toggle="tab"> <i class='fa-solid fa-chart-pie' style='font-size:26px'> </i> Analítica</a></li>
          </ul> -->

          <?php

            $arrayHistorias = [
              ['Historias Anestesia ', 'SectionAnestesia', 'fas fa-book']       
            ];

          ?>

          <div class="card-header">
            <ul class="nav nav-tabs" role="tablist">
              <?php foreach ($arrayHistorias as $key => $value) : ?>
                <li role="presentation" class="nav-item "><a class="nav-link" href="#<?= $value[1] ?>" aria-controls="home" role="tab" data-toggle="tab"> <i class='<?= $value[2] ?>' style='font-size:26px'> </i> <?= $value[0] ?></a></li>
              <?php endforeach ?>
            </ul>
          </div>

          <!-- Tab panes -->
          <div class="tab-content tabs">










            <!-- inicio seccion consentimientos -->
            <div role="tabpanel" class="tab-pane fade in active show" id="SectionAnestesia">


              <!--inicio accordion-->
              <div class="col-md-12">
                
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">


                <?php
                  
                  $QueryHistoria = mysqli_query($conn3, "SELECT * FROM  Historia_Anestesia where cliente_id = '$clienteId' ");
                  while ($RowHitoria = mysqli_fetch_array($QueryHistoria)) {
                    
                    $Fecha = $RowHitoria['Fecha'];
                    $id = $RowHitoria['id'];

                                    ?>
                                        <div class="panel panel-default" style="background: #f1f1f1;">
                                            <div class="panel-heading" role="tab" id="heading" style="background-color: #bad8e687;">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Plantilla_Documento_<?php echo $id ?>" aria-expanded="false" aria-controls="Plantilla_Documento_<?php echo $id ?>" style="width:100%">
                                                        Historia - <?php echo  $id ." - ". $Fecha . '</b>'; ?>

                                                        <!--necesita plugin iconofy para ver los iconos-->
                                                        <button type="button" onclick="window.location.href='RA_Finalizado.php?id=<?= ($id); ?>'; Document.getElementById('Plantilla_Documento_<?php echo $id ?>').classname = 'panel-collapse collapse';" style="border: hidden;font-size: 20px;z-index:10;background-color: #b9ccd5;border-radius: 20px;" title="Imprimir Documento"><i class="iconify" data-icon="gridicons:print"></i></button>

                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="Plantilla_Documento_<?php echo $id ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" style="padding-top: 20px;background-color: rgb(238, 238, 238);">
                                                <div class="panel-body">
                                                    
                                                <?php




                    $queryList = mysqli_query($conn3, "SELECT * FROM  Historia_Anestesia where id = $id LIMIT 1");
                    $nrowl = mysqli_num_rows($queryList);
                    $rowMotorizado = mysqli_fetch_array($queryList);
                        
                    //var_dump($rowMotorizado);
                    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                    $ArregloPersonalizado=[];
                        // Define un array asociativo para almacenar los datos
                        $ArregloDatosPrimerModulo = array(
                            "Fecha" => $rowMotorizado['PrimerModulo_Fecha'],
                            "Sala" => $rowMotorizado['PrimerModulo_Sala'],
                            "Ayuno" => $rowMotorizado['PrimerModulo_Ayuno'],
                            "Cirugia_Seleccion" => $rowMotorizado['PrimerModulo_Cirugia_Seleccion'],
                            "Anestesiologo" => $rowMotorizado['PrimerModulo_Anestesiologo'],
                            "Cirujano" => $rowMotorizado['PrimerModulo_Cirujano'],
                            "Cirugia" => $rowMotorizado['PrimerModulo_Cirugia'],
                            
                        );

                        if($rowMotorizado['PrimerModulo_Cirugia_Seleccion'] == "Urg"){
                            $ArregloPersonalizado['Cirugia_Urg']="X";
                        }
                        if($rowMotorizado['PrimerModulo_Cirugia_Seleccion'] == "Elec"){
                            $ArregloPersonalizado['Cirugia_Elec']="X";
                        }

                        echo '
                        <table class="table table-bordered" style="width:100%;">
                        <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Sala</th>
                            <th>Ayuno</th>
                            <th colspan="2">Cirugia</th>
                            <td>Anestesiologo: ' . $ArregloDatosPrimerModulo['Anestesiologo'] . '</td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td rowspan="2">' . $ArregloDatosPrimerModulo['Fecha'] . '</td>
                            <td rowspan="2">' . $ArregloDatosPrimerModulo['Sala'] . '</td>
                            <td rowspan="2">' . $ArregloDatosPrimerModulo['Ayuno'] . '</td>
                            <td style="text-align:center">Urg.</td>
                            <td style="text-align:center">Elec.</td>
                            <td>Cirujano: ' . $ArregloDatosPrimerModulo['Cirujano'] . '</td>
                        </tr>
                        <tr>
                            <td style="text-align:center">'.$ArregloPersonalizado['Cirugia_Urg'].'</td>
                            <td style="text-align:center">'.$ArregloPersonalizado['Cirugia_Elec'].'</td>
                            <td>Cirugia: ' . $ArregloDatosPrimerModulo['Cirugia'] . '</td>
                        </tr>
                        </tbody>
                        </table>';

                        





                        $ArregloDatosRegional = array(
                            "Peridual" => $rowMotorizado['AnestesiaRegional_Peridual'],//1
                            "Raquidea" => $rowMotorizado['AnestesiaRegional_Raquidea'],
                            "Bloqueo" => $rowMotorizado['AnestesiaRegional_Bloqueo'],
                            "Regional_EV" => $rowMotorizado['AnestesiaRegional_Regional_EV'],
                            "Otros" => $rowMotorizado['AnestesiaRegional_Otros'],//1
                            "Aguja_NO" => $rowMotorizado['AnestesiaRegional_Aguja_NO'],//2
                            "D_Puncion" => $rowMotorizado['AnestesiaRegional_D_Puncion'],
                            "Posicion" => $rowMotorizado['AnestesiaRegional_Posicion'],
                            "Altura" => $rowMotorizado['AnestesiaRegional_Altura'],//2
                            "Dosis" => $rowMotorizado['AnestesiaRegional_Dosis'],//3
                            "Vasocont" => $rowMotorizado['AnestesiaRegional_Vasocont'],
                            "Cateter" => $rowMotorizado['AnestesiaRegional_Cateter'],//3
                            "Revision_Maquina" => $rowMotorizado['AnestesiaRegional_Revision_Maquina'],//4
                            "Fujo_O" => $rowMotorizado['AnestesiaRegional_Fujo_O'],
                            "Energia" => $rowMotorizado['AnestesiaRegional_Energia'],
                            "Monitores" => $rowMotorizado['AnestesiaRegional_Monitores'],
                            "Succion" => $rowMotorizado['AnestesiaRegional_Succion'],
                            "Tubo" => $rowMotorizado['AnestesiaRegional_Tubo'],
                            "Laringosc" => $rowMotorizado['AnestesiaRegional_Laringosc'],//4
                            "MSV" => $rowMotorizado['AnestesiaRegional_MSV'],//5
                            "Pulsioximent" => $rowMotorizado['AnestesiaRegional_Pulsioximent'],
                            "Cardioscopio" => $rowMotorizado['AnestesiaRegional_Cardioscopio'],
                            "Capnografo" => $rowMotorizado['AnestesiaRegional_Capnografo'],
                            "PVC" => $rowMotorizado['AnestesiaRegional_PVC'],
                            "Linea_Art" => $rowMotorizado['AnestesiaRegional_Linea_Art'],//5
                            "Fon_Precord" => $rowMotorizado['AnestesiaRegional_Fon_Precord'],//6
                            "Fon_Essofag" => $rowMotorizado['AnestesiaRegional_Fon_Essofag'],
                            "Sonda_NG" => $rowMotorizado['AnestesiaRegional_Sonda_NG'],
                            "Sonda_Vesical" => $rowMotorizado['AnestesiaRegional_Sonda_Vesical'],
                            "Swan_Gans" => $rowMotorizado['AnestesiaRegional_Swan_Gans'],//6
                            "NT_Der" => $rowMotorizado['AnestesiaRegional_NT_Der'],//7 -31
                            "OT" => $rowMotorizado['AnestesiaRegional_OT'],
                            "NT_Izq" => $rowMotorizado['AnestesiaRegional_NT_Izq'],
                            "Tuno_NO" => $rowMotorizado['AnestesiaRegional_Tuno_NO'],
                            "Balon" => $rowMotorizado['AnestesiaRegional_Balon'],
                            "Traqueost" => $rowMotorizado['AnestesiaRegional_Traqueost'],//7
                            "Abierto" => $rowMotorizado['AnestesiaRegional_Abierto'],//8
                            "Cerrado" => $rowMotorizado['AnestesiaRegional_Cerrado'],
                            "Mixto" => $rowMotorizado['AnestesiaRegional_Mixto'],
                            "S_Abierto" => $rowMotorizado['AnestesiaRegional_S_Abierto'],
                            "S_Cerrado" => $rowMotorizado['AnestesiaRegional_S_Cerrado'],//8
                            "Inhalatorio" => $rowMotorizado['AnestesiaRegional_Inhalatorio'],//9
                            "Parental" => $rowMotorizado['AnestesiaRegional_Parental'],
                            "EV" => $rowMotorizado['AnestesiaRegional_EV'],
                            "IM" => $rowMotorizado['AnestesiaRegional_IM'],//9
                            "Espontanea" => $rowMotorizado['AnestesiaRegional_Espontanea'],//10
                            "Asistida" => $rowMotorizado['AnestesiaRegional_Asistida'],
                            "Controlada" => $rowMotorizado['AnestesiaRegional_Controlada'],
                            "Manual" => $rowMotorizado['AnestesiaRegional_Manual'],
                            "Mecanica" => $rowMotorizado['AnestesiaRegional_Mecanica']//10
                        );
                        
                        
                        $Contador = 0;
                        $ArregloTecnica["1"]="";
                        $ArregloTecnica["2"]="";
                        $ArregloTecnica["3"]="";
                        $ArregloTecnica["4"]="";
                        $ArregloTecnica["5"]="";
                        $ArregloTecnica["6"]="";
                        $ArregloTecnica["7"]="";
                        $ArregloTecnica["8"]="";
                        $ArregloTecnica["9"]="";
                        $ArregloTecnica["10"]="";

                        foreach ($ArregloDatosRegional as $key => $value) {
                            $Contador++; 

                            if($value != ""){
                                $checkmark = "[ X ]";
                            }
                            else{
                                $checkmark = "[ ]"; 
                            }

                            if($Contador >= 1 && $Contador <= 5){
                                $ArregloTecnica["1"] .= "{$key}: $checkmark <br>";
                            }
                            elseif($Contador >= 6 && $Contador <= 9){
                                $ArregloTecnica["2"] .= "{$key}: <u> $value </u> <br>";
                            }
                            elseif($Contador >= 10 && $Contador <= 12){

                                if($Contador == 10 || $Contador == 11 || $Contador == 12){
                                    $ArregloTecnica["3"] .= "{$key}: <u> $value </u> <br>";
                                }

                            }
                            elseif($Contador >= 13 && $Contador <= 19){
                                $ArregloTecnica["4"] .= "{$key}: $checkmark <br>";
                            }
                            elseif($Contador >= 20 && $Contador <= 25){
                                $ArregloTecnica["5"] .= "{$key}: $checkmark <br>";
                            }
                            elseif($Contador >= 26 && $Contador <= 30){
                                $ArregloTecnica["6"] .= "{$key}: $checkmark <br>";
                            }
                            elseif($Contador >= 31 && $Contador <= 36){

                                if($Contador == 34 || $Contador == 35 || $Contador == 36){
                                    $ArregloTecnica["7"] .= "{$key}: <u> $value </u> <br>";
                                }else{
                                    $ArregloTecnica["7"] .= "{$key}: $checkmark <br>";
                                }

                                
                            }
                            elseif($Contador >= 37 && $Contador <= 41){

                                if($Contador == 39 ){
                                    $ArregloTecnica["8"] .= "{$key}: <u> $value </u> <br>";
                                }else{
                                    $ArregloTecnica["8"] .= "{$key}: $checkmark <br>";
                                }

                            }
                            elseif($Contador >= 42 && $Contador <= 45){
                               

                                if($Contador == 43 ){
                                    $ArregloTecnica["9"] .= "{$key}: <u> $value </u> <br>";
                                }else{
                                    $ArregloTecnica["9"] .= "{$key}: $checkmark <br>";
                                }


                            }
                            elseif($Contador >= 46 && $Contador <= 50){

                                if($Contador == 48 ){
                                    $ArregloTecnica["10"] .= "{$key}: <u> $value </u> <br>";
                                }else{
                                    $ArregloTecnica["10"] .= "{$key}: $checkmark <br>";
                                }
                            }

                        }

                        echo'<table class="table table-bordered" style="width:100%;">
                            <thead>
                            <tr>
                                <td rowspan="2">'.$ArregloTecnica['1'].'</td>
                                <td rowspan="2">'.$ArregloTecnica['2'].'</td>
                                <td rowspan="2">'.$ArregloTecnica['3'].'</td>
                                <th>Induccion</th>
                                <th>Inhalatoria</th>
                            </tr>
                            <tr>
                                <th style="vertical-align:middle;">Intubacion</th>
                                <td>'.$ArregloTecnica['7'].'</td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td rowspan="3">'.$ArregloTecnica['4'].'</td>
                                <td rowspan="3">'.$ArregloTecnica['5'].'</td>
                                <td rowspan="3">'.$ArregloTecnica['6'].'</td>
                                <th style="vertical-align:middle;">Circuito</th>
                                <td>'.$ArregloTecnica['8'].'</td>
                            </tr>
                            <tr>
                                <th style="vertical-align:middle;">Mantenimiento</th>
                                <td>'.$ArregloTecnica['9'].'</td>
                            </tr>
                            <tr>
                                <th style="vertical-align:middle;">Respiracion</th>
                                <td>'.$ArregloTecnica['10'].'</td>
                            </tr>
                            </tbody>
                            </table>';


                        $arregloSegundoModulo = array(
                            "SegundoModulo_Posicion" => $rowMotorizado['SegundoModulo_Posicion'],
                            "SegundoModulo_Gases_1" => $rowMotorizado['SegundoModulo_Gases_1'],
                            "SegundoModulo_Gases_2" => $rowMotorizado['SegundoModulo_Gases_2'],
                            "SegundoModulo_Gases_3" => $rowMotorizado['SegundoModulo_Gases_3'],
                            "SegundoModulo_Hora_Colocacion" => $rowMotorizado['SegundoModulo_Hora_Colocacion'],
                            "SegundoModulo_Hora_Retiro" => $rowMotorizado['SegundoModulo_Hora_Retiro'],
                            "SegundoModulo_Total" => $rowMotorizado['SegundoModulo_Total']
                        );



                        echo '<table class="table table-bordered" style="width:100%;">
                        <thead>
                          <tr>
                            <th colspan="2" style="width: 70%;">Posicion: '.$arregloSegundoModulo['SegundoModulo_Posicion'].'</th>
                            <th>Torniquete o Ciamp</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td rowspan="3" style="width: 20%;">Gases</td>
                            <td>'.$arregloSegundoModulo['SegundoModulo_Gases_1'].'</td>
                            <td>Hora Colocacion: '.$arregloSegundoModulo['SegundoModulo_Hora_Colocacion'].'</td>
                          </tr>
                          <tr>
                            <td>'.$arregloSegundoModulo['SegundoModulo_Gases_2'].'</td>
                            <td>Hora Retiro: '.$arregloSegundoModulo['SegundoModulo_Hora_Retiro'].'</td>
                          </tr>
                          <tr>
                            <td>'.$arregloSegundoModulo['SegundoModulo_Gases_3'].'</td>
                            <td>Tiempo Total: '.$arregloSegundoModulo['SegundoModulo_Total'].'</td>
                          </tr>
                        </tbody>
                        </table>';

                        // Define el array con los nombres de las columnas
                        $arregloTercerModulo = array(
                            "TA" => $rowMotorizado['TercerModulo_TA'],
                            "PAM" => $rowMotorizado['TercerModulo_PAM'],
                            "FC" => $rowMotorizado['TercerModulo_FC'],
                            "FR" => $rowMotorizado['TercerModulo_FR'],
                            "INT" => $rowMotorizado['TercerModulo_INT'],
                            "EXT" => $rowMotorizado['TercerModulo_EXT'],
                            "I Anestecia" => $rowMotorizado['TercerModulo_I_Anestecia'],
                            "I Cirugia" => $rowMotorizado['TercerModulo_I_Cirugia'],
                            "Temperatura" => $rowMotorizado['TercerModulo_Temperatura']
                            
                        );

                        $arregloTercerModulo_1 = array(
                            "Medicamentos # 1" => $rowMotorizado['TercerModulo_Medicamentos_1'],
                            "Medicamentos # 2" => $rowMotorizado['TercerModulo_Medicamentos_2'],
                            "Medicamentos # 3" => $rowMotorizado['TercerModulo_Medicamentos_3'],
                            "Medicamentos # 4" => $rowMotorizado['TercerModulo_Medicamentos_4']
                            
                        );

                        $arregloTercerModulo_2 = array(
                            "Duracion Cirugia" => $rowMotorizado['TercerModulo_DuracionCirugia'],
                            "Duracion Anestesia" => $rowMotorizado['TercerModulo_DuracionAnestesia']
                        );

                        $ArregloTercer["1"] = "";
                        $Contador=0;
                        foreach ($arregloTercerModulo as $key => $value) {
                            $Contador++;
                            $ArregloTercer["1"] .= '<td>'.$key.': '.$value.'</td>';
                            if($Contador == 4){
                                $ArregloTercer["1"] .= '</tr><tr>';
                                $Contador=0;
                            }
                        }

                        $ArregloTercer["2"] = "";
                        $Contador=0;
                        foreach ($arregloTercerModulo_1 as $key => $value) {
                            $Contador++;
                            $ArregloTercer["2"] .= '<td colspan="4">'.$key.': '.$value.'</td>';
                            if($Contador == 1){
                                $ArregloTercer["2"] .= '</tr><tr>';
                                $Contador=0;
                            }
                        }

                        $ArregloTercer["3"] = "";
                        $Contador=0;
                        foreach ($arregloTercerModulo_2 as $key => $value) {
                            $Contador++;
                            $ArregloTercer["3"] .= '<td colspan="4">'.$key.': '.$value.'</td>';

                            if($Contador == 1){
                                $ArregloTercer["3"] .= '</tr><tr>';
                                $Contador=0;
                            }
                        }
                        echo '<table class="table table-bordered" style="width:100%;">
                        <tbody>
                          <tr>
                            '.$ArregloTercer["1"].'
                          </tr>
                          <tr>
                            '.$ArregloTercer["2"].'
                          </tr>
                          <tr>
                            '.$ArregloTercer["3"].'
                          </tr>
                        </tbody>
                        </table>';


                        

                        ?>


                        

                                <div class="col-md-12" style="overflow-x:scroll">
                                    <table class="table table-bordered" style="width:100%;zoom: 0.8">
                                        <thead>
                                            <tr>
                                                <th colspan='2'>Agente</th>
                                                
                                                <?php
                                                    $CantidadRangos = 4;
                                                    
                                                    $TablaRecordAnestesia_RangoTiempo = json_decode($rowMotorizado['TablaRecordAnestesia_RangoTiempo'], true);

                                                    for ($i = 1; $i <= $CantidadRangos; $i++) {
                                                        echo "
                                                        <th style='width: 40px;' ><input type='text' name='TablaRecordAnestesia[RangoTiempo][$i]' value='".$TablaRecordAnestesia_RangoTiempo[$i]."' readonly style='width: 40px;'></i></th>
                                                        <th style='width: 40px;' >5</th>
                                                        <th style='width: 40px;' >10</th>
                                                        <th style='width: 40px;' >15</th>
                                                        <th style='width: 40px;' >20</th>
                                                        <th style='width: 40px;' >25</th>
                                                        <th style='width: 40px;' >30</th>
                                                        <th style='width: 40px;' >35</th>
                                                        <th style='width: 40px;' >40</th>
                                                        <th style='width: 40px;' >45</th>
                                                        <th style='width: 40px;' >50</th>
                                                        <th style='width: 40px;' >55</th>
                                                        "; 
                                                    }   
                                                    echo "<th><input type='text' name='TablaRecordAnestesia[RangoTiempo][".($CantidadRangos+1)."]' value='".$TablaRecordAnestesia_RangoTiempo[$CantidadRangos+1]."' readonly style='width: 40px;'></i></th>";
                                                ?>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php

                                            $ArregloCompletoTabla = json_decode($rowMotorizado['ArregloCompletoTabla'], true);
                                            
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
                                                    if($ArregloCompletoTabla[$Tipo][$NumeracionAgente]['Agente']==""){
                                                        $ArregloCompletoTabla[$Tipo][$NumeracionAgente]['Agente']="&nbsp";
                                                    }
                                                    echo "<th colspan='2' style='width: 140px;' > ".$ArregloCompletoTabla[$Tipo][$NumeracionAgente]['Agente']."</th>";
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
                                                    if($ArregloCompletoTabla[$Tipo][$Numeracion][$j]==""){
                                                        $ArregloCompletoTabla[$Tipo][$Numeracion][$j]="&nbsp";
                                                    }
                                                    echo "<td style='width: 40px;'> ".$ArregloCompletoTabla[$Tipo][$Numeracion][$j]."</td>";
                                                    
                                                }
                                                echo "</tr>";
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <?php

                                            echo "<th colspan='2'> Tiempo </th>";
                                                for ($j = 0; $j <= 12 * $CantidadRangos; $j++) {
                                                        echo "<td style='width: 40px;'>".$ArregloCompletoTabla['Tiempo'][$j]."</td>";
                                                }
                                            ?>
                                        </tfoot>
                                    </table>
                                </div>





                        <?php

                        
                        $arregloCuartoModulo = array(
                            "TA" => $rowMotorizado['CuartoModulo_TA'],
                            "FC" => $rowMotorizado['CuartoModulo_FC'],
                            "FR" => $rowMotorizado['CuartoModulo_FR'],
                            "Intubado" => $rowMotorizado['CuartoModulo_Intubado'],
                            "Reflejos" => $rowMotorizado['CuartoModulo_Reflejos'],
                            "Destino" => $rowMotorizado['CuartoModulo_Destino']
                        );


                        echo '<table class="table table-bordered" style="width:100%;">
                        <tbody>
                        <tr>
                            ';

                            $Contador=0;
                            foreach ($arregloCuartoModulo as $key => $value) {
                                $Contador++;
                                echo '<td>'.$key.': '.$value.'</td>';
                                if($Contador == 3){
                                    echo '</tr><tr>';
                                    $Contador=0;
                                }
                            }
                        
                        echo'</tr>
                        </tbody>
                        </table>';


                        
                        $arregloQuintoModulo = array(
                            "Oximetris" => json_decode($rowMotorizado['QuintoModulo_Oximetris'],true),
                            "Liquidos" => json_decode($rowMotorizado['QuintoModulo_Liquidos'],true),
                            "Total" => json_decode($rowMotorizado['QuintoModulo_Total'],true),
                            "Diuresis" => json_decode($rowMotorizado['QuintoModulo_Diuresis'],true)
                        );


                        echo '<table class="table table-bordered" style="width:100%;">
                        <tbody>
                        <tr>
                        <td colspan="7"></td>
                        </tr>
                        <tr>';

                        foreach ($arregloQuintoModulo as $key => $value) {
                            echo '<td><p>'.$key.'</p></td>';
                            $contador=0;
                            if(is_array($value)){

                                foreach ($value as $key2 => $value2) {
                                    $contador++;
                                        echo '<td><p>'.$value2.'</p></td>';
                                    if($contador==6 AND $key!="Diuresis"){
                                        echo '</tr><tr>';
                                        $contador=0;
                                        if($key=="Liquidos" AND $key2!="18"){
                                            echo '<td>Liquidos</td>';
                                        }
                                    }
                                    
                                    
                                }
                            }
                            else{
                                if($value!=""){
                                    echo '<p>'.$value.'</p>';
                                }
                            }
                        }
                        
                        echo '</tr>
                        </tbody>
                        </table>';


                        
                    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


                    ?>

                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                            
              
                    ?>
                </div>

              </div>
              <!--final accordion-->  


            </div>
            <!-- cierre seccion consentimientos-->




            























           




















































</div>
</div>
</div>
</div>
</div>

















</div>
</section>
</div>


<?php
include 'footer.php';

?>
<!-- Funciona para consultar disponibilidad -->