<?php
include 'funciones/funciones.php';
include 'funciones/funcionesUtilidades.php';
include 'funciones/conn3.php';

$Historia_id = $_GET['historiaClinica1'];





$queryList = mysqli_query($conn3, "SELECT * FROM  Historia_Ortodoncia where id = $Historia_id");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $id = $rowMotorizado['id'];
    $cliente_id = $rowMotorizado['cliente_id'];
    $usuario_id = $rowMotorizado['usuario_id'];


    $InformacionAcudiente = $rowMotorizado['InformacionAcudiente'];
    $EnfermedadActual = $rowMotorizado['EnfermedadActual'];
    $Checks_Antecedentes = $rowMotorizado['Checks_Antecedentes'];
    $AntecentesGinecobstetricos = $rowMotorizado['AntecentesGinecobstetricos'];
    $AntecedentesFamiliares = $rowMotorizado['AntecedentesFamiliares'];
    $Checks_Revision = $rowMotorizado['Checks_Revision'];
    $SignosVitales = $rowMotorizado['SignosVitales'];
    $Paraclinicos = $rowMotorizado['Paraclinicos'];
    $Imagenologia_Examen = $rowMotorizado['Imagenologia_Examen'];
    $Laboratorio_Examenes = $rowMotorizado['Laboratorio_Examenes'];
    $ExamenFisico = $rowMotorizado['ExamenFisico'];
    $OrganoSentidos = $rowMotorizado['OrganoSentidos'];
    $SintomasGenerales = $rowMotorizado['SintomasGenerales'];
    $DiagnosticoAcupuntura = $rowMotorizado['DiagnosticoAcupuntura'];
    $DiagnosticoConsulta = $rowMotorizado['DiagnosticoConsulta'];
    $Impresion = $rowMotorizado['Impresion'];
    $PlanManejo = $rowMotorizado['PlanManejo'];
    $Incapacidades = $rowMotorizado['Incapacidades'];
    $Insumos = $rowMotorizado['Insumos'];
    $RecetaId = $rowMotorizado['RecetaId'];
    $imgEscalaTanner = $rowMotorizado['imgEscalaTanner'];
    $textEscalaTanner = $rowMotorizado['textEscalaTanner'];

    $id_tablaOrtodoncia = $rowMotorizado['id_tablaOrtodoncia'];
    /*
    $AP1 = $rowMotorizado['AP1'];
    $SI1 = $rowMotorizado['SI1'];
    $BL1 = $rowMotorizado['BL1'];
    $SP1 = $rowMotorizado['SP1'];
    $BLM1 = $rowMotorizado['BLM1'];
    $IDis1 = $rowMotorizado['IDis1'];
    $ICD1 = $rowMotorizado['ICD1'];
    $BLM2 = $rowMotorizado['BLM2'];
    $SI2 = $rowMotorizado['SI2'];
    $PO1 = $rowMotorizado['PO1'];
    $LM = $rowMotorizado['LM'];
    $LM1 = $rowMotorizado['LM1'];
    $img1 = $rowMotorizado['img1'];
    $AP2 = $rowMotorizado['AP2'];
    $LM2 = $rowMotorizado['LM2'];
    $LM3 = $rowMotorizado['LM3'];
    $LM4 = $rowMotorizado['LM4'];
    $LM5 = $rowMotorizado['LM5'];
    $LM6 = $rowMotorizado['LM6'];
    $LM7 = $rowMotorizado['LM7'];
    */
}


if($nrowl == '') {
    $queryList = mysqli_query($conn3, "SELECT * FROM  examenesaRealizar where historia_id= '$Historia_id'");

 
$nrowl1 = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
   $Imagenologia_Examen = $rowMotorizado['ecografia'];
    $Laboratorio_Examenes = $rowMotorizado['laboratorio'];
      $cliente_id = $rowMotorizado['cliente_id'];
    $usuario_id = $rowMotorizado['usuario_id'];

     }

 }



 $queryList = mysqli_query($conn3, "SELECT * FROM  tablaOrtodoncia where id = $id_tablaOrtodoncia");
 // echo "SELECT * FROM  tablaOrtodoncia where id = $id_tablaOrtodoncia";
 
 $nrowl = mysqli_num_rows($queryList);
 while ($rowMotorizado = mysqli_fetch_array($queryList)) {
   $AP1 = $rowMotorizado['AP1'];
   $AP2 = $rowMotorizado['AP2'];
   $AP3 = $rowMotorizado['AP3'];
   $AP4 = $rowMotorizado['AP4'];
   $AP5 = $rowMotorizado['AP5'];
   $AP6 = $rowMotorizado['AP6'];
   $AP7 = $rowMotorizado['AP7'];
   $AP8 = $rowMotorizado['AP8'];
   $SI1 = $rowMotorizado['SI1'];
   $SI2 = $rowMotorizado['SI2'];
   $SI3 = $rowMotorizado['SI3'];
   $SI4 = $rowMotorizado['SI4'];
   $SI5 = $rowMotorizado['SI5'];
   $SI7 = $rowMotorizado['SI7'];
   $SI8 = $rowMotorizado['SI8'];
   $BL1 = $rowMotorizado['BL1'];
   $BL2 = $rowMotorizado['BL2'];
   $BL3 = $rowMotorizado['BL3'];
   $BL4 = $rowMotorizado['BL4'];
   $BL5 = $rowMotorizado['BL5'];
   $BL7 = $rowMotorizado['BL7'];
   $BL8 = $rowMotorizado['BL8'];
   $SP3 = $rowMotorizado['SP3'];
   $SP4 = $rowMotorizado['SP4'];
   $SP7 = $rowMotorizado['SP7'];
   $SP8 = $rowMotorizado['SP8'];
   $BLM1 = $rowMotorizado['BLM1'];
   $BLM2 = $rowMotorizado['BLM2'];
   $IDis3 = $rowMotorizado['IDis3'];
   $IDis4 = $rowMotorizado['IDis4'];
   $IDis7 = $rowMotorizado['IDis7'];
   $IDis8 = $rowMotorizado['IDis8'];
   $Total_T = $rowMotorizado['Total_T'];
   $Total_O = $rowMotorizado['Total_O'];
   $Total_R = $rowMotorizado['Total_R'];
   $Total_G = $rowMotorizado['Total_G'];
   $Co_GoI = $rowMotorizado['Co_GoI'];
   $CO_MEI = $rowMotorizado['CO_MEI'];
   $Co_GoD = $rowMotorizado['Co_GoD'];
   $CO_MED = $rowMotorizado['CO_MED'];
   $SubTotalI = $rowMotorizado['SubTotalI'];
   $SubTotalD = $rowMotorizado['SubTotalD'];
   $TotalesGO = $rowMotorizado['TotalesGO'];
   $ELO1 = $rowMotorizado['ELO1'];
   $ELO2 = $rowMotorizado['ELO2'];
   $ELO3 = $rowMotorizado['ELO3'];
   $ELO4 = $rowMotorizado['ELO4'];
   $ElementoBL = $rowMotorizado['ElementoBL'];
   $ELBL4 = $rowMotorizado['ELBL4'];
   $ELOS1 = $rowMotorizado['ELOS1'];
   $ELOS2 = $rowMotorizado['ELOS2'];
   $ELOS3 = $rowMotorizado['ELOS3'];
   $ELOS4 = $rowMotorizado['ELOS4'];
   $ELPO1 = $rowMotorizado['ELPO1'];
   $ELPO2 = $rowMotorizado['ELPO2'];
   $LM5 = $rowMotorizado['LM5'];
   $LM7 = $rowMotorizado['LM7'];
   $LM1 = $rowMotorizado['LM1'];
   $LM2 = $rowMotorizado['LM2'];
   $LM3 = $rowMotorizado['LM3'];
   $LM4 = $rowMotorizado['LM4'];
   $LM6 = $rowMotorizado['LM6'];
   $LM8 = $rowMotorizado['LM8'];
 }





$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $cliente_id ");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $nombre_cliente = $rowMotorizado['nombre_cliente'];
    $CODI_CLIENTE = $rowMotorizado['CODI_CLIENTE'];
    $fechaNacimiento = $rowMotorizado['fechaNacimiento'];
    $direccion_cliente = $rowMotorizado['direccion_cliente'];
    //$entidadSalud = $rowMotorizado['entidadSalud'];
    $celular_cliente = $rowMotorizado['celular_cliente'];
    $genero = $rowMotorizado['genero'];

    if ($genero == "M") {
        $genero = "Masculino";
    } elseif ($genero == "F") {
        $genero = "Femenino";
    }

    $entidadSalud = funcionMaster($rowMotorizado['entidad_id'],'id','Nombre','Rips_Entidades');
}

$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $usuario_id");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

    $pieF         = $rowMotorizado['pieF'];
    $header       = $rowMotorizado['header'];

    $nombreF       = $rowMotorizado['nombreF'];

    $LogoF               = $rowMotorizado['logoF'];
    $firma               = $rowMotorizado['firma'];

    if (strlen($LogoF) > 0) {
      $Logo = "<img src='{$Base}/logos/{$LogoF}' style='height: 3.5cm;width: auto;'>";
    }


    if (strlen($firma) > 0) {
        $firmaImg = "<img src='{$Base}/FirmasReg/{$firma}' height='80' width='150'>";
    }
}





  $queryList = mysqli_query($conn3, "SELECT firma FROM  firmas where historia_id = $Historia_id and historia_nombre = 'Historia_Ortodoncia'");
      $nrowl = mysqli_num_rows($queryList);
      while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $firmaP = $rowMotorizado['firma'];
      }

      if (strlen($firmaP) > 10) {
     $firmaPaciente = "<img src='$firmaP' height='125' width='125'> <br>__________________________________ <br>$nombre_cliente<br>$CODI_CLIENTE";

      } 





      $imgEscalaTanner1 = "<img src='img/EscalaTanner/niño1.jpg' height='auto' width='300'>";
      $imgEscalaTanner2 = "<img src='img/EscalaTanner/niño2.jpg' height='auto' width='300'>";
      $imgEscalaTanner3 = "<img src='img/EscalaTanner/niño3.jpg' height='auto' width='300'>";
      $imgEscalaTanner4 = "<img src='img/EscalaTanner/niño4.jpg' height='auto' width='300'>";
      $imgEscalaTanner5 = "<img src='img/EscalaTanner/niño5.jpg' height='auto' width='300'>";
      $imgEscalaTanner6 = "<img src='img/EscalaTanner/niña1.jpg' height='auto' width='300'>";
      $imgEscalaTanner7 = "<img src='img/EscalaTanner/niña2.jpg' height='auto' width='300'>";
      $imgEscalaTanner8 = "<img src='img/EscalaTanner/niña3.jpg' height='auto' width='300'>";
      $imgEscalaTanner9 = "<img src='img/EscalaTanner/niña4.jpg' height='auto' width='300'>";
      $imgEscalaTanner10 = "<img src='img/EscalaTanner/niña5.jpg' height='auto' width='300'>";








?>

                        <table class="table" style="width: 100%;margin-top: 3px;">
                            <tr>
                                <td width="35%">
                                    <b>Nombre:</b> <?php echo $nombre_cliente ?> 
                                </td>
                                <td width="30%">
                                    <b>Documento:</b> <?php echo $CODI_CLIENTE ?>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">
                                    <b>F.Nacimiento:</b> <?php echo  $fechaNacimiento ?>
                                </td>
                                <td width="15%">
                                    <b>Edad:</b> <?php echo  CalculoEdadPaciente($fechaNacimiento); ?>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <b>Residencia:</b> <?php echo $direccion_cliente  ?>
                                </td>
                                <td>
                                    <b>EPS:</b> <?php echo $entidadSalud  ?>
                                </td>
                            </tr>
                            <tr style="border-bottom-width: 1px;">
                                <td>
                                    <b>Telefono:</b> <?php echo $celular_cliente ?>
                                </td>
                                <td>
                                    <b>Genero:</b> <?php echo $genero ?>
                                </td>
                            </tr>
                        </table>

                        <hr style="border-top: 1px solid black;opacity: 1;">

                        <!-- comienzo de la impresion de la informacion-->
                        <?php $tabla[3] = "<div class=\"col-3\" style=\"padding-bottom: 10px;\">";
                        $tabla[6] = "<div class=\"col-6\" style=\"padding-bottom: 10px;\">";
                        $tabla[12] = "<div class=\"col-12\" style=\"padding-bottom: 10px;\">"; ?>

                       <?php
                        if ($_GET['tipo'] == 'consulta') :
                        ?>
                            <h3 align="center">Historia Ortodoncia</h3>
                            <?php
                            $Historia_Nombre = "Historia_Ortodoncia";
                            $Historia_id = $Historia_id;
                            include 'IR_Imprimir.php';

                            // if (strlen($InformacionAcudiente) > "0") {
                            //     echo $tabla[12] . '<b>Informacion del Acudiente </b><br><br>' . $InformacionAcudiente . '</div>';
                            // }

                            if (strlen($InformacionAcudiente) > "0") {
                                $InformacionAcudiente = explode("<br>", $InformacionAcudiente);
                                echo "<br>
                            <div class='container-fluid'>
                            <div class='row'>
                            <h5><div style='text-align:center'>1. Diagnóstico Articular</div></h5>
                            <table class='table table-bordered'>
                            <tbody>
                          
                           
                              <tr>
                                <td>$InformacionAcudiente[0]</td>
                                <td>$InformacionAcudiente[1]</td>
                                <td>$InformacionAcudiente[2]</td>
                              </tr>
                              <tr>
                              <td>$InformacionAcudiente[3]</td>
                              <td>$InformacionAcudiente[4]</td>
                              <td>$InformacionAcudiente[5]</td>
                            </tr>
                            <tr>
                              <td>$InformacionAcudiente[6]</td>
                              <td>$InformacionAcudiente[7]</td>
                              <td>$InformacionAcudiente[8]</td>
                            </tr>
                            </tbody>
                          </table>
                           
                          
                          
                          
                            
                            </div>
                            </div>";
                            }

                            //    var_dump($EnfermedadActual);
                            //      $EnfermedadActual1 = explode(":", $EnfermedadActual);

                            if (strlen($EnfermedadActual) > "0") {
                                $EnfermedadActual = explode("<br>", $EnfermedadActual);
                                echo "
                            <div class='container-fluid'>
                            <div class='row'>
                           
                           
                          <div class='container-fluid'>
                          <div class='row'>
                          <h5><div style='text-align:center'>Musculatura Craneocervical</div></h5>
                            
                       
                          <table class='table table-bordered'>
                          <tbody>
                          <tr>
                          <td><b>Derecho</b></td>
                          <td></td>
                          <td><b>Izquierdo</b></td>
                          </tr>
                          <tr>
                          <td>$EnfermedadActual[0]</td>
                           <td></td>
                          <td>$EnfermedadActual[1]</td>
                        </tr>

                        <tr>
                        <td>$EnfermedadActual[2]</td>
                         <td></td>
                        <td>$EnfermedadActual[3]</td>
                      </tr>
                        <tr>
                  
                        
                        <td>$EnfermedadActual[4]</td>
                         <td></td>
                        <td>$EnfermedadActual[5]</td>
                      </tr>
                      <tr>
                      <td>$EnfermedadActual[6]</td>
                       <td></td>
                      <td>$EnfermedadActual[7]</td>
                   
                    </tr>
                         
                            <tr>
                          
                              <td>$EnfermedadActual[8]</td>
                              <td></td>
                              <td>$EnfermedadActual[9]</td>
                            </tr>
                        
                            <tr>
                          
                            <td>$EnfermedadActual[10]</td>
                            <td></td>
                            <td>$EnfermedadActual[11]</td>
                          </tr>
                          <tr>
                          
                          <td>$EnfermedadActual[12]</td>
                          <td></td>
                          <td>$EnfermedadActual[13]</td>
                        </tr>
                        <tr>
                          
                        <td>$EnfermedadActual[14]</td>
                        <td></td>
                        <td>$EnfermedadActual[15]</td>
                      </tr>
                      <tr>
                          
                      <td>$EnfermedadActual[16]</td>
                      <td></td>
                      <td>$EnfermedadActual[17]</td>
                    </tr>
                  
                          </tbody>
                        </table>
                            
                            </div>
                            </div>";
                            }

                            //    var_dump($InformacionAcudiente);
                            //      $InformacionAcudiente1 = explode(":", $InformacionAcudiente);

                            if (strlen($Checks_Antecedentes) > "0") {
                                $Checks_Antecedentes = explode("<br>", $Checks_Antecedentes);
                                echo "<br>
                            <div class='container-fluid'>
                            <div class='row'>
                            <h5><div style='text-align:center'>ATM</div></h5>
                            <table class='table table-bordered'>
                            <tbody>
                            <tr>
                            <td><b>Derecho</b></td>
                            <td></td>
                            <td><b>Izquierdo</b></td>
                            </tr>
                           
                            <td>$Checks_Antecedentes[0]</td>
                            <td></td>
                           <td>$Checks_Antecedentes[1]</td>
                         </tr>
 
                         <tr>
                         <td>$Checks_Antecedentes[2]</td>
                          <td></td>
                         <td>$Checks_Antecedentes[3]</td>
                       </tr>
                         <tr>
                   
                         
                         <td>$Checks_Antecedentes[4]</td>
                          <td></td>
                         <td>$Checks_Antecedentes[5]</td>
                       </tr>
                       <tr>
                       <td>$Checks_Antecedentes[6]</td>
                        <td></td>
                       <td>$Checks_Antecedentes[7]</td>
                    
                     </tr>
                          
                             <tr>
                           
                               <td>$Checks_Antecedentes[8]</td>
                               <td></td>
                               <td>$Checks_Antecedentes[9]</td>
                             </tr>
                         
                             <tr>
                           
                             <td>$Checks_Antecedentes[10]</td>
                             <td></td>
                             <td>$Checks_Antecedentes[11]</td>
                           </tr>
                           <tr>
                           
                           <td>$Checks_Antecedentes[12]</td>
                           <td></td>
                           <td>$Checks_Antecedentes[13]</td>
                         </tr>
                         <tr>
                           
                         <td>$Checks_Antecedentes[14]</td>
                         <td></td>
                         <td>$Checks_Antecedentes[15]</td>
                       </tr>

                       <tr>
                           
                       <td></td>
                       <td></td>
                       <td></td>
                     </tr>
                      
                   
                            </tbody>
                          </table>
                           
                          
                          
                          
                            
                            </div>
                            </div>
                            ";
                            }


                            //    var_dump($InformacionAcudiente);
                            //      $InformacionAcudiente1 = explode(":", $InformacionAcudiente);

                            if (strlen($Checks_Revision) > "0") {
                                $Checks_Revision = explode("<br>", $Checks_Revision);
                                echo "<br>
                            <div class='container-fluid'>
                            <div class='row'>
                            <h5><div style='text-align:center'>2.Diagnóstico Respiratorio</div></h5>
                            <table class='table table-bordered'>
                            <tbody>
                          
                           
                              <tr>
                                <td>$Checks_Revision[0]</td>
                                <td>$Checks_Revision[1]</td>
                                <td>$Checks_Revision[2]</td>
                              </tr>
                              <tr>
                              <td>$Checks_Revision[3]</td>
                              <td>$Checks_Revision[4]</td>
                              <td>$Checks_Revision[5]</td>
                            </tr>
                            </tbody>
                          </table>
                           
                          
                          
                          
                            
                            </div>
                            </div>";
                            }


                            if (strlen($SintomasGenerales) > "0") {
                                $SintomasGenerales = explode("<br>", $SintomasGenerales);
                                echo "<br>
                                <div class='container-fluid'>
                                  <div class='row'>
                                    <h5>
                                      <div style='text-align:center'>3.Diagnóstico Maxilofacial</div>
                                    </h5>
                                    <table class='table table-bordered'>
                                      <tbody>
                                
                                
                                        <tr>
                                          <td>$SintomasGenerales[0]</td>
                                          <td>$SintomasGenerales[1]</td>
                                
                                        </tr>
                                
                                      </tbody>
                                    </table>

                                    </div>
                                    </div>";
                            }


                            /*
                            if (strlen($AP1) > "0") {
                                $AP1 = explode("<br>", $AP1);
                                echo "<br>
                                        <div class='container-fluid'>
                                        <div class='row'>
                                        <style type='text/css'>
                                        .tg {
                                            border-collapse: collapse;
                                            border-spacing: 0;
                                        }

                                        .tg td {
                                            border-color: black;
                                            border-style: solid;
                                            border-width: 1px;
                                            font-family: Arial, sans-serif;
                                            font-size: 30px;
                                            overflow: hidden;
                                            padding: 10px 5px;
                                            word-break: normal;
                                        }

                                        .tg th {
                                            border-color: black;
                                            border-style: solid;
                                            border-width: 1px;
                                            font-family: Arial, sans-serif;
                                            font-size: 30px;
                                            font-weight: normal;
                                            overflow: hidden;
                                            padding: 10px 5px;
                                            word-break: normal;
                                        }

                                        .tg .tg-baqh {
                                            text-align: center;
                                            vertical-align: top
                                        }

                                        .tg .tg-c3ow {
                                            border-color: inherit;
                                            text-align: center;
                                            vertical-align: top
                                        }

                                        .tg .tg-s5xa {
                                            background-color: #9698ed;
                                            border-color: inherit;
                                            text-align: center;
                                            vertical-align: top
                                        }

                                        .tg .tg-haji {
                                            background-color: #9b9b9b;
                                            border-color: inherit;
                                            text-align: center;
                                            vertical-align: middle
                                        }

                                        .tg .tg-xkfo {
                                            background-color: #9698ed;
                                            border-color: inherit;
                                            text-align: left;
                                            vertical-align: top
                                        }

                                        .tg .tg-0pky {
                                            border-color: inherit;
                                            text-align: left;
                                            vertical-align: top
                                        }

                                        .tg .tg-0lax {
                                            text-align: left;
                                            vertical-align: top
                                        }
                                        .idi{
                                            border: 3px solid black;
                                        }
                                    </style>
                                
                                    <div class='container-fluid'>
                                    <div class='row'>
                                   
                          <table>
                          <tr>
                                      <td> <h5><div class='idi' style='text-align:center'><b>Elementos I,IV</b></div></h5></td>
                                      </tr>
                          </table>
                                   
                                   
                                        <table class='tg' style='undefined;table-layout: fixed; width: 100%'>
                                        <!--
                                        <colgroup>
                                        <col style='width: 133.88889px'>
                                        <col style='width: 162.88889px'>
                                        <col style='width: 95.88889px'>
                                        <col style='width: 95.88889px'>
                                        <col style='width: 96.88889px'>
                                        <col style='width: 96.88889px'>
                                        <col style='width: 96.88889px'>
                                        <col style='width: 96.88889px'>
                                        <col style='width: 96.88889px'>
                                        <col style='width: 95.88889px'>
                                    </colgroup>-->
                                
                                    <thead>
                                    <tr>
                                        <td colspan='9' ><label style='width:33%'>DIENTE</label>
                                        <label style='width:33%'>MAXILAR</label>
                                        <label style='width:32%'>MANDÍBULA</label></td>
                                    </tr>
                                      <tr>
                                     
                                      <br>
                                      <!--<h3><span style='font-weight:bold'>DIENTE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MAXILAR&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MANDIBULA</span></h3>-->

                                      
                                     

                                      
                                    
                             
                                          <td class='tg-s5xa' colspan='3'>Discrepancia Central</td>

                                          <td class='tg-c3ow'><b>O</b></td>
                                          <td class='tg-c3ow'><b>C</b></td>
                                          <td class='tg-xkfo' colspan='2'></td>

                                          <td class='tg-baqh'><b>O</b></td>
                                          <td class='tg-baqh'><b>C</b></td>
                                  </tr>
                                 

                                      <tr>
                                      <td class='tg-0pky'>AP</td>
                                      <td class='tg-0pky'>

                                          <input type='text' class='form-control' value='$AP1[0]' readonly>
                                      </td>
                                      <td class='tg-0pky'>

                                          <input type='text' class='form-control' value='$AP1[1]' readonly>
                                      </td>
                                      <td class='tg-0pky'>

                                          <input type='text' class='form-control' value='$AP1[2]' readonly>
                                      </td>
                                      <td class='tg-0pky'>

                                          <input type='text' class='form-control' value='$AP1[3]' readonly>
                                      </td>
                                      <td class='tg-0pky'>

                                          <input type='text' class='form-control' value='$AP1[4]' readonly>
                                      </td>
                                      <td class='tg-0pky'>

                                          <input type='text' class='form-control' value='$AP1[5]' readonly>
                                      </td>
                                      <td class='tg-0lax'>

                                          <input type='text' class='form-control' value='$AP1[6]' readonly>
                                      </td>
                                      <td class='tg-0lax'>

                                          <input type='text' class='form-control' value='$AP1[7]' readonly>
                                      </td>
                                  </tr>
  
                                  </tbody>
                                  </thead>
                                  </table>

                                  </div>
                                  </div>";
                            }
                            if (strlen($SI1) > "0") {
                                $SI1 = explode("<br>", $SI1);
                                echo "<br>
                            <div class='container-fluid'>
                            <div class='row'>
                        <table class='tg' style='undefined;table-layout: fixed; width: 100%'>
                        <!--
                         <colgroup>
                                        <col style='width: 133.88889px'>
                                        <col style='width: 162.88889px'>
                                        <col style='width: 95.88889px'>
                                        <col style='width: 95.88889px'>
                                        <col style='width: 96.88889px'>
                                        <col style='width: 96.88889px'>
                                        <col style='width: 96.88889px'>
                                        <col style='width: 96.88889px'>
                                        <col style='width: 96.88889px'>
                                        <col style='width: 95.88889px'>
                                    </colgroup>-->
                          <thead>

                                  <tr>
                                      <td class='tg-0pky'>SI</td>
                                      <td class='tg-0pky'>
                                          <input type='text' class='form-control' value='$SI1[0]' readonly>
                                      </td>
                                      <td class='tg-0pky'>
                                          <input type='text' class='form-control' value='$SI1[1]' readonly>
                                      </td>
                                      <td class='tg-0pky'>
                                          <input type='text' class='form-control' value='$SI1[2]' readonly>
                                      </td>
                                      <td class='tg-0pky'>
                                          <input type='text' class='form-control' value='$SI1[3]' readonly>
                                      </td>
                                      <td class='tg-0pky'>
                                          <input type='text' class='form-control' value='$SI1[4]' readonly>
                                      </td>
                                      <td class='tg-0pky'>
                                          <input type='text' class='form-control' value='$SI1[5]' readonly>
                                      </td>
                                      <td class='tg-0lax'>
                                          <input type='text' class='form-control' value='$SI1[6]' readonly>
                                      </td>
                                      <td class='tg-0lax'>
                                          <input type='text' class='form-control' value='$SI1[7]' readonly>
                                      </td>
                                  </tr>
                                  </tbody>
                                  </thead>
                                  </table>

                                  </div>
                                  </div>";
                            }
                            if (strlen($BL1) > "0") {
                                $BL1 = explode("<br>", $BL1);
                                echo "<br>
                            <div class='container-fluid'>
                            <div class='row'>
                        <table class='tg' style='undefined;table-layout: fixed; width: 100%'>
                        <!--
                         <colgroup>
                                        <col style='width: 133.88889px'>
                                        <col style='width: 162.88889px'>
                                        <col style='width: 95.88889px'>
                                        <col style='width: 95.88889px'>
                                        <col style='width: 96.88889px'>
                                        <col style='width: 96.88889px'>
                                        <col style='width: 96.88889px'>
                                        <col style='width: 96.88889px'>
                                        <col style='width: 96.88889px'>
                                        <col style='width: 95.88889px'>
                                    </colgroup> -->
                          <thead>
                                  <tr>
                                      <td class='tg-0pky'>BL</td>
                                      <td class='tg-0pky'>
                                          <input type='text' class='form-control' value='$BL1[0]' readonly>
                                      </td>
                                      <td class='tg-0pky'>
                                          <input type='text' class='form-control' value='$BL1[1]' readonly>
                                      </td>
                                      <td class='tg-0pky'>
                                          <input type='text' class='form-control' value='$BL1[2]' readonly>
                                      </td>
                                      <td class='tg-0pky'>
                                          <input type='text' class='form-control' value='$BL1[3]' readonly>
                                      </td>
                                      <td class='tg-0pky'>
                                          <input type='text' class='form-control' value='$BL1[4]' readonly>
                                      </td>
                                      <td class='tg-0pky'>
                                          <input type='text' class='form-control' value='$BL1[5]' readonly>
                                      </td>
                                      <td class='tg-0lax'>
                                          <input type='text' class='form-control' value='$BL1[6]' readonly>
                                      </td>
                                      <td class='tg-0lax'>
                                          <input type='text' class='form-control' value='$BL1[7]' readonly>
                                      </td>
                                  </tr>
                                  </tbody>
                                  </thead>
                                  </table>

                                  </div>
                                  </div>";
                            }

                            if (strlen($SP1) > "0") {
                                $SP1 = explode("<br>", $SP1);
                                echo "<br>
                            <div class='container-fluid'>
                            <div class='row'>
                        <table class='tg' style='undefined;table-layout: fixed; width: 100%'>
                        <!--
                         <colgroup>
                                        <col style='width: 133.88889px'>
                                        <col style='width: 162.88889px'>
                                        <col style='width: 95.88889px'>
                                        <col style='width: 95.88889px'>
                                        <col style='width: 96.88889px'>
                                        <col style='width: 96.88889px'>
                                        <col style='width: 96.88889px'>
                                        <col style='width: 96.88889px'>
                                        <col style='width: 96.88889px'>
                                        <col style='width: 95.88889px'>
                                    </colgroup>-->
                          <thead>
                                  <tr>
                                      <td class='tg-0pky'>SP</td>
                                      <td class='tg-0pky'>
                                          <input type='text' class='form-control' value='$SP1[0]' readonly>
                                      </td>
                                      <td class='tg-0pky'>
                                          <input type='text' class='form-control' value='$SP1[1]' readonly>
                                      </td>
                                      <td class='tg-0pky'>
                                          <input type='text' class='form-control' value='$SP1[2]' readonly>
                                      </td>
                                      <td class='tg-0pky'>
                                          <input type='text' class='form-control' value='$SP1[3]' readonly>
                                      </td>
                                      <td class='tg-0pky'>
                                          <input type='text' class='form-control' value='$SP1[4]' readonly>
                                      </td>
                                      <td class='tg-0pky'>
                                          <input type='text' class='form-control' value='$SP1[5]' readonly>
                                      </td>
                                      <td class='tg-0lax'>
                                          <input type='text' class='form-control' value='$SP1[6]' readonly>
                                      </td>
                                      <td class='tg-0lax'>
                                          <input type='text' class='form-control' value='$SP1[7]' readonly>
                                      </td>
                                  </tr>
                                  </tbody>
                                  </thead>
                                  </table>

                                  </div>
                                  </div>";
                            }
                            if (strlen($BLM1) > "0") {
                                $BLM1 = explode("<br>", $BLM1);
                                echo "<br>
                            <div class='container-fluid'>
                            <div class='row'>
                        <table class='tg' style='undefined;table-layout: fixed; width: 100%'>
                        <!--
                         <colgroup>
                                        <col style='width: 133.88889px'>
                                        <col style='width: 162.88889px'>
                                        <col style='width: 95.88889px'>
                                        <col style='width: 95.88889px'>
                                        <col style='width: 96.88889px'>
                                        <col style='width: 96.88889px'>
                                        <col style='width: 96.88889px'>
                                        <col style='width: 96.88889px'>
                                        <col style='width: 96.88889px'>
                                        <col style='width: 95.88889px'>
                                    </colgroup> -->
                          <thead>
                                  <tr>
                                      <td class='tg-xkfo' colspan='3'>BL (Maxilar)</td>
                                      <td class='tg-0pky'>
                                          <input type='text' class='form-control' value='$BLM1[0]' readonly>
                                      </td>
                                      <td class='tg-0pky'>
                                          <input type='text' class='form-control' value='$BLM1[1]' readonly>
                                      </td>
                                      <td class='tg-xkfo' colspan='4'></td>
                                  </tr>
                                  </tbody>
                                  </thead>
                                  </table>

                                  </div>
                                  </div>";
                            }
                            if (strlen($IDis1) > "0") {
                                $IDis1 = explode("<br>", $IDis1);
                                echo "<br>
                                    <div class='container-fluid'>
                                    <div class='row'>
                                <table class='tg' style='undefined;table-layout: fixed; width: 100%'>
                                <!--
                                 <colgroup>
                                        <col style='width: 133.88889px'>
                                        <col style='width: 162.88889px'>
                                        <col style='width: 95.88889px'>
                                        <col style='width: 95.88889px'>
                                        <col style='width: 96.88889px'>
                                        <col style='width: 96.88889px'>
                                        <col style='width: 96.88889px'>
                                        <col style='width: 96.88889px'>
                                        <col style='width: 96.88889px'>
                                        <col style='width: 95.88889px'>
                                    </colgroup> -->
                                  <thead>
                                  <tr>
                                      <td class='tg-0pky'>I</td>
                                      <td class='tg-0pky'>
                                          <input type='text' class='form-control' value='$IDis1[0]' readonly>
                                      </td>
                                      <td class='tg-0pky'>
                                          <input type='text' class='form-control' value='$IDis1[1]' readonly>
                                      </td>
                                      <td class='tg-0pky'>
                                          <input type='text' class='form-control' value='$IDis1[2]' readonly>
                                      </td>
                                      <td class='tg-0pky'>
                                          <input type='text' class='form-control' value='$IDis1[3]' readonly>
                                      </td>
                                      <td class='tg-0pky'>
                                          <input type='text' class='form-control' value='$IDis1[4]' readonly>
                                      </td>
                                      <td class='tg-0pky'>
                                          <input type='text' class='form-control' value='$IDis1[5]' readonly>
                                      </td>
                                      <td class='tg-0lax'>
                                          <input type='text' class='form-control' value='$IDis1[6]' readonly>
                                      </td>
                                      <td class='tg-0lax'>
                                          <input type='text' class='form-control' value='$IDis1[7]' readonly>
                                      </td>
                                  </tr>
                                  </tbody>
                                  </thead>
                                  </table>

                                  </div>
                                  </div>";
                            }
                            if (strlen($ICD1) > "0") {
                                $ICD1 = explode("<br>", $ICD1);
                                echo "<br>
                            <div class='container-fluid'>
                            <div class='row'>
                        <table class='tg' style='undefined;table-layout: fixed; width: 100%'>
                        <!--
                         <colgroup>
                                        <col style='width: 133.88889px'>
                                        <col style='width: 162.88889px'>
                                        <col style='width: 95.88889px'>
                                        <col style='width: 95.88889px'>
                                        <col style='width: 96.88889px'>
                                        <col style='width: 96.88889px'>
                                        <col style='width: 96.88889px'>
                                        <col style='width: 96.88889px'>
                                        <col style='width: 96.88889px'>
                                        <col style='width: 95.88889px'>
                                    </colgroup> -->
                          <thead>
                                  <tr>
                                      <td class='tg-0pky'>ICD</td>
                                      <td class='tg-0pky'>
                                          <input type='text' class='form-control' value='$ICD1[0]' readonly>
                                      </td>
                                      <td class='tg-0pky'>
                                          <input type='text' class='form-control' value='$ICD1[1]' readonly>
                                      </td>
                                      <td class='tg-0pky'>
                                          <input type='text' class='form-control' value='$ICD1[2]' readonly>
                                      </td>
                                      <td class='tg-0pky'>
                                          <input type='text' class='form-control' value='$ICD1[3]' readonly>
                                      </td>
                                      <td class='tg-0pky'>
                                          <input type='text' class='form-control' value='$ICD1[4]' readonly>
                                      </td>
                                      <td class='tg-0pky'>
                                          <input type='text' class='form-control' value='$ICD1[5]' readonly>
                                      </td>
                                      <td class='tg-0lax'>
                                          <input type='text' class='form-control' value='$ICD1[6]' readonly>
                                      </td>
                                      <td class='tg-0lax'>
                                          <input type='text' class='form-control' value='$ICD1[7]' readonly>
                                      </td>
                                  </tr>
                                      </tbody>
                                      </thead>
                                    </table>
                                
                                
                                
                                  </div>
                                </div>";
                            }
echo '<br>
<br>
<br>';

                            if (strlen($AP2) > "0") {
                                $AP2 = explode("<br>", $AP2);
                                echo "<br>
                                        <div class='container-fluid'>
                                        <div class='row'>
                                        <style type='text/css'>
                                        .tg {
                                            border-collapse: collapse;
                                            border-spacing: 0;
                                        }

                                        .tg td {
                                            border-color: black;
                                            border-style: solid;
                                            border-width: 1px;
                                            font-family: Arial, sans-serif;
                                            font-size: 30px;
                                            overflow: hidden;
                                            padding: 10px 5px;
                                            word-break: normal;
                                        }

                                        .tg th {
                                            border-color: black;
                                            border-style: solid;
                                            border-width: 1px;
                                            font-family: Arial, sans-serif;
                                            font-size: 30px;
                                            font-weight: normal;
                                            overflow: hidden;
                                            padding: 10px 5px;
                                            word-break: normal;
                                        }

                                        .tg .tg-266k {
                                            background-color: #9b9b9b;
                                            border-color: inherit;
                                            text-align: left;
                                            vertical-align: top
                                        }

                                        .tg .tg-c3ow {
                                            border-color: inherit;
                                            text-align: center;
                                            vertical-align: top
                                        }

                                        .tg .tg-s5xa {
                                            background-color: #9698ed;
                                            border-color: inherit;
                                            text-align: center;
                                            vertical-align: top
                                        }

                                        .tg .tg-9u2q {
                                            background-color: #9b9b9b;
                                            border-color: inherit;
                                            text-align: center;
                                            vertical-align: top
                                        }

                                        .tg .tg-xkfo {
                                            background-color: #9698ed;
                                            border-color: inherit;
                                            text-align: left;
                                            vertical-align: top
                                        }

                                        .tg .tg-0pky {
                                            border-color: inherit;
                                            text-align: left;
                                            vertical-align: top
                                        }

                                       
                                     
                                    </style>
                                    <table class='tg' style='undefined;table-layout: fixed; width: 100%'>
                                    <colgroup>
                                        <col style='width: 133.88889px'>
                                        <col style='width: 203.88889px'>
                                        <col style='width: 107.88889px'>
                                        <col style='width: 107.88889px'>
                                        <col style='width: 203.88889px'>
                                        <col style='width: 107.88889px'>
                                        <col style='width: 107.88889px'>
                                    </colgroup>
                                    <thead>
                                    <tr>
                                        <td colspan='2' style='text-align:center'>HUESO</td>
                                        <td colspan='1' style='text-align:center'>O</td>
                                        <td colspan='1' style='text-align:center'>C</td>
                                        <td colspan='1' style='text-align:center'></td>
                                        <td colspan='1' style='text-align:center'>O</td>
                                        <td colspan='1' style='text-align:center'>C</td>
                                    </tr>
                                        <tr>
                                            <!--<h3><span style='font-weight:bold'>HUESO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; O &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; C &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; O &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; C</span></h3>
                                            -->

                                            <th class='tg-9u2q'>Elemento II</th>
                                            <th class='tg-c3ow'>AP</th>
                                           
                                            <th class='tg-c3ow'>  <input type='text' class='form-control' value='$AP2[0]' readonly>
                                            </th>
                                            <th class='tg-c3ow'>  <input type='text' class='form-control' value='$AP2[1]' readonly>
                                            </th>
                                            <th class='tg-c3ow'>AP</th>
                                            <th class='tg-c3ow'>  <input type='text' class='form-control' value='$AP2[2]' readonly>
                                            </th>
                                            <th class='tg-c3ow'>  <input type='text' class='form-control' value='$AP2[3]' readonly>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                  </thead>
                                  </table>

                                  </div>
                                  </div>";
                            }

                            
                            if (strlen($BLM2) > "0") {
                                $BLM2 = explode("<br>", $BLM2);
                                echo "<br>
                                        <div class='container-fluid'>
                                        <div class='row'>
                                       
                                    <table class='tg' style='undefined;table-layout: fixed; width: 100%'>
                                    <colgroup>
                                        <col style='width: 133.88889px'>
                                        <col style='width: 203.88889px'>
                                        <col style='width: 107.88889px'>
                                        <col style='width: 107.88889px'>
                                        <col style='width: 203.88889px'>
                                        <col style='width: 107.88889px'>
                                        <col style='width: 107.88889px'>
                                    </colgroup>
                                    <thead>
                                    <tr>
                                    <td class='tg-9u2q'>Elemento III</td>
                                    <td class='tg-s5xa'>BL</td>
                                    <td class='tg-xkfo'> <input type='text' class='form-control' value='$BLM2[0]' readonly>
                                    </td>
                                    <td class='tg-xkfo'> <input type='text' class='form-control' value='$BLM2[1]' readonly>
                                    </td>
                                    <td class='tg-266k' colspan='3'></td>
                                </tr>
                                    </thead>
                                    <tbody>
                                  </thead>
                                  </table>

                                  </div>
                                  </div>";
                            }
  
                            if (strlen($SI2) > "0") {
                                $SI2 = explode("<br>", $SI2);
                                echo "<br>
                                        <div class='container-fluid'>
                                        <div class='row'>
                                       
                                    <table class='tg' style='undefined;table-layout: fixed; width:100%'>
                                    <colgroup>
                                        <col style='width: 133.88889px'>
                                        <col style='width: 203.88889px'>
                                        <col style='width: 107.88889px'>
                                        <col style='width: 107.88889px'>
                                        <col style='width: 203.88889px'>
                                        <col style='width: 107.88889px'>
                                        <col style='width: 107.88889px'>
                                    </colgroup>
                                    <thead>
                                    <tr>
                                    <td class='tg-9u2q'>Elemento IV</td>
                                    <td class='tg-c3ow'>SI</td>
                                    <td class='tg-0pky'> <input type='text' class='form-control' value='$SI2[0]' readonly>
                                    </td>
                                    <td class='tg-0pky'> <input type='text' class='form-control' value='$SI2[1]' readonly>
                                    </td>
                                    <td class='tg-c3ow'>SI</td>
                                    <td class='tg-0pky'> <input type='text' class='form-control' value='$SI2[2]' readonly>
                                    </td>
                                    <td class='tg-0pky'> <input type='text' class='form-control' value='$SI2[3]' readonly>
                                    </td>
                                </tr>
                                    </thead>
                                    <tbody>
                                  </thead>
                                  </table>

                                  </div>
                                  </div>";
                            }
                            if (strlen($PO1) > "0") {
                                $PO1 = explode("<br>", $PO1);
                                echo "<br>
                                        <div class='container-fluid'>
                                        <div class='row'>
                                       
                                    <table class='tg' style='undefined;table-layout: fixed; width: 100%'>
                                    <colgroup>
                                        <col style='width: 133.88889px'>
                                        <col style='width: 203.88889px'>
                                        <col style='width: 107.88889px'>
                                        <col style='width: 107.88889px'>
                                        <col style='width: 203.88889px'>
                                        <col style='width: 107.88889px'>
                                        <col style='width: 107.88889px'>
                                    </colgroup>
                                    <thead>
                                    <tr>
                                    <td class='tg-9u2q'>Elemento V</td>
                                    <td class='tg-266k' colspan='3'></td>
                                    <td class='tg-c3ow'>PO</td>
                                    <td class='tg-0pky'> <input type='text' class='form-control' value='$PO1[0]' readonly>
                                    </td>
                                    <td class='tg-0pky'> <input type='text' class='form-control' value='$PO1[1]' readonly>
                                    </td>
                                </tr>
                                    </thead>
                                    <tbody>
                                  </thead>
                                  </table>

                                  </div>
                                  </div>";
                            }

                            if (strlen($LM) > "0") {
                                echo "<br>
                                <div class='col-md-6'>
                            <div class='container-fluid'>
                            <div class='row'>
                            <h5><div style='text-align:center'>Máxilar</div></h5>
                            <table class='table table-bordered'>
                            <tbody>
                          
                        
                              <tr>
                                <td><b>LM:</b> $LM</td>
                              </tr>
                            
                            </tbody>
                          </table>
                           
                          
                          
                          
                            
                            </div>
                            </div>
                            </div>
                            
                            ";
                            }

                            
                            if (strlen($LM2) > "0") {
                                echo "<br>
                                <div class='col-md-6'>
                            <div class='container-fluid'>
                            <div class='row'>
                            <h5><div style='text-align:center'>Mandibula</div></h5>
                            <table class='table table-bordered'>
                            <tbody>
                          
                        
                              <tr>
                   
                                <td><b>LM:</b> $LM2</td>
                              </tr>

                            
                            </tbody>
                          </table>
                           
                          
                          
                          
                            
                            </div>
                            </div>
                            </div>
                            
                            ";
                            }

                            



                            if (strlen($LM1) > "0") {
                                echo "<br>
                                <div class='col-md-6'>
                            <div class='container-fluid'>
                            <div class='row'>
                            <table class='table table-bordered'>
                            <tbody>
                          
                        
                              <tr>
                          
                                <td><b>LM:</b> $LM1</td>
                              </tr>

                            
                            </tbody>
                          </table>
                           
                          
                          
                          
                            
                            </div>
                            </div>
                            </div>
                            
                            ";
                            }

                            if (strlen($LM3) > "0") {
                                echo "<br>
                                <div class='col-md-6'>
                            <div class='container-fluid'>
                            <div class='row'>
                            <table class='table table-bordered'>
                            <tbody>
                          
                        
                              <tr>
                                <td><b>LM:</b>  $LM3</td>
                              </tr>

                            
                            </tbody>
                          </table>
                           
                          
                          
                          
                            
                            </div>
                            </div>
                            </div>
                            
                            ";
                            }

                            if (strlen($LM6) > "0") {
                                echo "<br>
                                <div class='col-md-6'>
                            <div class='container-fluid'>
                            <div class='row'>
                            <table class='table table-bordered'>
                            <tbody>
                          
                        
                              <tr>
                                <td><b>Ancho Pretratamiento:</b> $LM6</td>
                              </tr>

                            
                            </tbody>
                          </table>
                           
                          
                          
                          
                            
                            </div>
                            </div>
                            </div>
                            
                            ";
                            }
                        
                       
                        
                            if (strlen($LM4) > "0") {
                                echo "<br>
                                <div class='col-md-6'>
                            <div class='container-fluid'>
                            <div class='row'>
                            <table class='table table-bordered'>
                            <tbody>
                          
                        
                              <tr>
                                <td><b>Ancho Pretratamiento:</b> $LM4</td>
                              </tr>

                            
                            </tbody>
                          </table>
                           
                          
                          
                          
                            
                            </div>
                            </div>
                            </div>
                            
                            ";
                            }
                            if (strlen($LM7) > "0") {
                                echo "<br>
                                <div class='col-md-6'>
                            <div class='container-fluid'>
                            <div class='row'>
                            <table class='table table-bordered'>
                            <tbody>
                          
                        
                              <tr>
                                <td><b>Ancho Elemento I:</b> $LM7</td>
                              </tr>

                            
                            </tbody>
                          </table>
                           
                          
                          
                          
                            
                            </div>
                            </div>
                            </div>
                            
                            ";
                            }
                            if (strlen($LM5) > "0") {
                                echo "<br>
                                <div class='col-md-6'>
                            <div class='container-fluid'>
                            <div class='row'>
                            <table class='table table-bordered'>
                            <tbody>
                          
                        
                              <tr>
                                <td><b>Ancho Elemento I:</b> $LM5</td>
                              </tr>

                            
                            </tbody>
                          </table>
                           
                          
                          
                          
                            
                            </div>
                            </div>
                            </div>
                            
                            ";
                            }
                            */













                            ?>






                            <div class='container-fluid'>
                <div class='row'>

                  <style>
                    table {
                      width: 100%;
                      background: white;
                      margin-bottom: 1.25em;
                      border: solid 1px #dddddd;
                      border-collapse: collapse;
                      border-spacing: 0;
                    }

                    table tr th,
                    table tr td {
                      padding: 0.5625em 0.625em;
                      font-size: 0.875em;
                      color: #222222;
                      border: 1px solid #dddddd;
                    }

                    table tr.even,
                    table tr.alt,
                    table tr:nth-of-type(even) {
                      background: #f9f9f9;
                    }

                    @media only screen and (max-width: 768px) {

                      table.resp,
                      .resp thead,
                      .resp tbody,
                      .resp tr,
                      .resp th,
                      .resp td,
                      .resp caption {
                        display: block;
                      }

                      table.resp {
                        border: none
                      }

                      .resp thead tr {
                        display: none;
                      }

                      .resp tbody tr {
                        margin: 1em 0;
                        border: 1px solid #2ba6cb;
                      }

                      .resp td {
                        border: none;
                        border-bottom: 1px solid #dddddd;
                        position: relative;
                        padding-left: 45%;
                        text-align: left;
                      }

                      .resp tr td:last-child {
                        border-bottom: 1px double #dddddd;
                      }

                      .resp tr:last-child td:last-child {
                        border: none;
                      }

                      .resp td:before {
                        position: absolute;
                        top: 6px;
                        left: 6px;
                        width: 45%;
                        padding-right: 10px;
                        white-space: nowrap;
                        text-align: left;
                        font-weight: bold;
                      }

                      td:nth-of-type(1):before {
                        content: "Elementos";
                      }
                    }
                  </style>

                  <table class="resp">
                    <thead>
                      <tr>
                        <th scope="col" style="text-align: center;">
                          <h3>Dientes</h3>
                        </th>
                        <th scope="col" colspan="6" style="width: 20px; text-align: center;"> <b>
                            <h3>Maxilar</h3>
                          </b>
                        <th scope="col" colspan="4" style="text-align: center;">
                          <h3>Mandíbula</h3>
                        </th>
                      </tr>
                      <tr>

                        <th scope="col" style="text-align: center;">Elementos</th>
                        <th scope="col" colspan="4" style="text-align: center;">Discrepancia Central</th>
                        <th scope="col" style="width: 20px; text-align: center;"> <b>O</b>
                          <input type="text" class="form-control" step="any" size="40" style="width: 70px;height: 34px;padding: 6px 12px;display: block;" value="<?php echo $SI2 ?>">
        </td>
        <th scope="col" style="width: 20px; text-align: center;"> <b>C</b>
          <input type="text" class="form-control" step="any" size="40" style="width: 70px;height: 34px;padding: 6px 12px;display: block;" value="<?php echo $BL1 ?>">
          </td>
        <th scope="col" colspan="2"></th>
        <th scope="col" style="width: 20px; text-align: center;"> <b>O</b>
          <input type="text" class="form-control" step="any" size="40" style="width: 70px;height: 34px;padding: 6px 12px;display: block;" value="<?php echo $BL2 ?>">
          </td>
        <th scope="col" style="width: 20px; text-align: center;"> <b>C</b>
          <input type="text" class="form-control" step="any" size="40" style="width: 70px;height: 34px;padding: 6px 12px;display: block;" value="<?php echo $BL5 ?>">
          </td>
      </tr>
      </thead>
    <tbody>
      <tr>
        <td rowspan="7" style="text-align: center;">I,IV</td>
        <td colspan="2">AP</td>
        <td style="width: 20px;"><input type="text" name="AP1" id="AP1" class="form-control" step="any" size="40" style="width: 70px;height: 34px;padding: 6px 12px;display: block;" value="<?php echo $AP1 ?>"></td>
        <td style="width: 20px;"><input type="text" name="AP2" id="AP2" class="form-control" step="any" size="40" style="width: 70px;height: 34px;padding: 6px 12px;display: block;" value="<?php echo $AP2 ?>"></td>
        <td style="width: 20px;"> <input type="text" name="AP3" id="AP3" class="form-control" step="0.01" size="40" style="width: 70px;height: 34px;padding: 6px 12px;display: block;" value="<?php echo $AP3 ?>">
        </td>
        <td style="width: 20px;"><input type="text" name="AP4" id="AP4" class="form-control" step="any" size="40" style="width: 70px;height: 34px;padding: 6px 12px;display: block;" value="<?php echo $AP4 ?>">
        </td>

        <td style="width: 20px;"> <input type="text" name="AP5" id="AP5" class="form-control" step="0.01" size="40" style="width: 70px;height: 34px;padding: 6px 12px;display: block;" value="<?php echo $AP5 ?>">
        </td>
        <td style="width: 20px;"><input type="text" name="AP6" id="AP6" class="form-control" step="any" size="40" style="width: 70px;height: 34px;padding: 6px 12px;display: block;" value="<?php echo $AP6 ?>">
        </td>
        <td style="width: 20px;"><input type="text" name="AP7" id="AP7" class="form-control" step="any" size="40" style="width: 70px;height: 34px;padding: 6px 12px;display: block;" value="<?php echo $AP7 ?>">
        </td>
        <td style="width: 20px;"> <input type="text" name="AP8" id="AP8" class="form-control" step="any" size="40" style="width: 70px;height: 34px;padding: 6px 12px;display: block;" value="<?php echo $AP8 ?>">
        </td>
      </tr>

      <tr>
        <td colspan="2">SI</td>
        <td style="width: 20px;"><input type="text" name="SI1" id="SI1" class="form-control" step="any" style="width: 70px;height: 34px;padding: 6px 12px;display: block;" value="<?php echo $SI1 ?>"></td>
        <td></td>
        <td style="width: 20px;"><input type="text" name="SI3" id="SI3" class="form-control" step="any" style="width: 70px;height: 34px;padding: 6px 12px;display: block;" value="<?php echo $SI3 ?>">
        </td>

        <td style="width: 20px;"> <input type="text" name="SI4" id="SI4" class="form-control" step="any" style="width: 70px;height: 34px;padding: 6px 12px;display: block;" value="<?php echo $SI4 ?>">
        </td>

        <td style="width: 20px;"><input type="text" name="SI5" id="SI5" class="form-control" step="any" size="40" style="width: 70px;height: 34px;padding: 6px 12px;display: block;" value="<?php echo $SI5 ?>">
        </td>
        <td></td>
        <td style="width: 20px;"><input type="text" name="SI7" id="SI7" class="form-control" step="any" size="40" style="width: 70px;height: 34px;padding: 6px 12px;display: block;" value="<?php echo $SI7 ?>">
        </td>
        <td style="width: 20px;"> <input type="text" name="SI8" id="SI8" class="form-control" step="any" size="40" style="width: 70px;height: 34px;padding: 6px 12px;display: block;" value="<?php echo $SI8 ?>">
        </td>
      </tr>

      <tr>
        <td colspan="2">BL</td>
        <td style="width: 20px;"></td>
        <td></td>
        <td style="width: 20px;"><input type="text" name="BL3" id="BL3" class="form-control" step="any" style="width: 70px;height: 34px;padding: 6px 12px;display: block;" value="<?php echo $BL3 ?>">
        </td>
        <td style="width: 20px;"><input type="text" name="BL4" id="BL4" class="form-control" step="any" style="width: 70px;height: 34px;padding: 6px 12px;display: block;" value="<?php echo $BL4 ?>">
        </td>
        <td></td>
        <td></td>
        <td style="width: 20px;"><input type="text" name="BL7" id="BL7" class="form-control" step="any" size="40" style="width: 70px;height: 34px;padding: 6px 12px;display: block;" value="<?php echo $BL7 ?>">
        </td>
        <td style="width: 20px;"> <input type="text" name="BL8" id="BL8" class="form-control" step="any" size="40" style="width: 70px;height: 34px;padding: 6px 12px;display: block;" value="<?php echo $BL8 ?>">
        </td>
      </tr>
      <tr>
        <td colspan="2">SP</td>
        <td></td>
        <td></td>
        <td style="width: 20px;"><input type="text" name="SP3" id="SP3" class="form-control" step="any" style="width: 70px;height: 34px;padding: 6px 12px;display: block;" value="<?php echo $SP3 ?>">
        </td>
        <td style="width: 20px;"><input type="text" name="SP4" id="SP4" class="form-control" step="any" style="width: 70px;height: 34px;padding: 6px 12px;display: block;" value="<?php echo $SP4 ?>">
        </td>
        <td></td>
        <td></td>
        <td style="width: 20px;"><input type="text" name="SP7" id="SP7" class="form-control" step="any" size="40" style="width: 70px;height: 34px;padding: 6px 12px;display: block;" value="<?php echo $SP7 ?>">
        </td>
        <td style="width: 20px;"> <input type="text" name="SP8" id="SP8" class="form-control" step="0.01" size="40" style="width: 70px;height: 34px;padding: 6px 12px;display: block;" value="<?php echo $SP8 ?>">
        </td>
      </tr>
      <tr>
        <td colspan="4">BL (MAxilar)</td>
        <td style="width: 20px;"><input type="text" name="BLM1" id="BLM1" class="form-control" step="any" style="width: 70px;height: 34px;padding: 6px 12px;display: block;" value="<?php echo $BLM1 ?>">
        </td>
        <td style="width: 20px;"><input type="text" name="BLM2" id="BLM2" class="form-control" step="any" style="width: 70px;height: 34px;padding: 6px 12px;display: block;" value="<?php echo $BLM2 ?>">
        </td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td colspan="2">I</td>
        <td></td>
        <td></td>
        <td style="width: 20px;"><input type="text" name="IDis3" id="IDis3" class="form-control" step="any" style="width: 70px;height: 34px;padding: 6px 12px;display: block;" value="<?php echo $IDis3 ?>">
        </td>
        <td style="width: 20px;"><input type="text" name="IDis4" id="IDis4" class="form-control" step="any" style="width: 70px;height: 34px;padding: 6px 12px;display: block;" value="<?php echo $IDis4 ?>">
        </td>
        <td></td>
        <td></td>
        <td style="width: 20px;"><input type="text" name="IDis7" id="IDis7" class="form-control" step="any" size="40" style="width: 70px;height: 34px;padding: 6px 12px;display: block;" value="<?php echo $IDis7 ?>">
        </td>
        <td style="width: 20px;"> <input type="text" name="IDis8" id="IDis8" class="form-control" step="any" size="40" style="width: 70px;height: 34px;padding: 6px 12px;display: block;" value="<?php echo $IDis8 ?>">
        </td>
      </tr>
      <tr>
        <td colspan="2">ICD</td>
        <td></td>
        <td></td>
        <td style="width: 20px;"><input type="number" class="form-control" step="any" name="Total_T" id="Total_T" style="width: 70px;height: 34px;padding: 6px 12px;display: block;" value="<?php echo $Total_T ?>">
        </td>
        <td style="width: 20px;"><input type="text" class="form-control" step="any" name="Total_O" id="Total_O" style="width: 70px;height: 34px;padding: 6px 12px;display: block;" value="<?php echo $Total_O ?>">
        </td>
        <td></td>
        <td></td>
        <td style="width: 20px;"><input type="text" name="Total_R" id="Total_R" class="form-control" step="any" size="40" style="width: 70px;height: 34px;padding: 6px 12px;display: block;" value="<?php echo $Total_R ?>">
        </td>
        <td style="width: 20px;"> <input type="text" name="Total_G" id="Total_G" class="form-control" step="any" size="40" style="width: 70px;height: 34px;padding: 6px 12px;display: block;" value="<?php echo $Total_G ?>">
        </td>
      </tr>
    </tbody>
  </table>


  <br>
  <br>
  <style type="text/css">
    table {
      width: 100%;
      background: white;
      margin-bottom: 1.25em;
      border: solid 1px #dddddd;
      border-collapse: collapse;
      border-spacing: 0;
    }

    table tr th,
    table tr td {
      padding: 0.5625em 0.625em;
      font-size: 0.875em;
      color: #222222;
      border: 1px solid #dddddd;
    }

    table tr.even,
    table tr.alt,
    table tr:nth-of-type(even) {
      background: #f9f9f9;
    }

    @media only screen and (max-width: 768px) {

      table.resp,
      .resp thead,
      .resp tbody,
      .resp tr,
      .resp th,
      .resp td,
      .resp caption {
        display: block;
      }

      table.resp {
        border: none
      }

      .resp thead tr {
        display: none;
      }

      .resp tbody tr {
        margin: 1em 0;
        border: 1px solid #2ba6cb;
      }

      .resp td {
        border: none;
        border-bottom: 1px solid #dddddd;
        position: relative;
        padding-left: 45%;
        text-align: left;
      }

      .resp tr td:last-child {
        border-bottom: 1px double #dddddd;
      }

      .resp tr:last-child td:last-child {
        border: none;
      }

      .resp td:before {
        position: absolute;
        top: 6px;
        left: 6px;
        width: 45%;
        padding-right: 10px;
        white-space: nowrap;
        text-align: left;
        font-weight: bold;
      }

      td:nth-of-type(1):before {
        content: "Elementos";
      }
    }
  </style>
  <table class="resp">
    <thead>
      <tr>
        <th scope="col" style="width: 20px; text-align: center;">Elemento II</th>
        <th scope="col" colspan="2" style="width: 20px; text-align: center;">AP</th>
        <th scope="col" style="width: 20px; text-align: center;">O
          <input type="text" name="ELO1" id="ELO1" class="form-control" step="any" style="width: 70px;height: 34px;padding: 6px 12px;display: block;" value="<?php echo $ELO1 ?>">
        </th>
        <th scope="col" style="width: 20px; text-align: center;">C
          <input type="text" name="ELO2" id="ELO2" class="form-control" step="any" style="width: 70px;height: 34px;padding: 6px 12px;display: block;" value="<?php echo $ELO2 ?>">
        </th>
        <th scope="col" colspan="2" style="width: 20px; text-align: center;">AP</th>
        <th scope="col" style="width: 20px; text-align: center;">O
          <input type="text" name="ELO3" id="ELO3" class="form-control" step="any" style="width: 70px;height: 34px;padding: 6px 12px;display: block;" value="<?php echo $ELO3 ?>">
        </th>
        <th scope="col" style="width: 20px; text-align: center;">C
          <input type="text" name="ELO4" id="ELO4" class="form-control" step="any" style="width: 70px;height: 34px;padding: 6px 12px;display: block;" value="<?php echo $ELO4 ?>">
        </th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td style="width: 20px; text-align: center;">Elemento III</td>
        <td colspan="2" style="width: 20px; text-align: center;">BL</td>
        <td style="width: 20px; text-align: center;"><input type="text" name="ElementoBL" id="ElementoBL" class="form-control" step="any" value="<?php echo $ElementoBL ?>"></td>
        <td style="width: 20px; text-align: center;"><input type="text" name="ELBL4" id="ELBL4" class="form-control" step="any" value="<?php echo $ELBL4 ?>"></td>
        <td colspan="2"></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td style="width: 20px; text-align: center;">Elemento IV</td>
        <td colspan="2" style="width: 20px; text-align: center;">SI</td>
        <td><input type="text" name="ELOS1" id="ELOS1" class="form-control" step="any" value="<?php echo $ELOS1 ?>"></td>
        <td><input type="text" name="ELOS2" id="ELOS2" class="form-control" step="any" value="<?php echo $ELOS2 ?>"></td>
        <td colspan="2" style="width: 20px; text-align: center;">SI</td>
        <td><input type="text" name="ELOS3" id="ELOS3" class="form-control" step="any" value="<?php echo $ELOS3 ?>"></td>
        <td><input type="text" name="ELOS4" id="ELOS4" class="form-control" step="any" value="<?php echo $ELOS4 ?>"></td>
      </tr>
      <tr>
        <td style="width: 20px; text-align: center;">Elemento V</td>
        <td colspan="4"></td>
        <td colspan="2" style="width: 20px; text-align: center;">PO</td>
        <td><input type="text" name="ELPO1" id="ELPO1" class="form-control" step="any" value="<?php echo $ELPO1 ?>"></td>
        <td><input type="text" name="ELPO2" id="ELPO2" class="form-control" step="any" value="<?php echo $ELPO2 ?>"></td>
      </tr>
    </tbody>
  </table>

  </div>
  </div>














  <?php
  if ((strlen($LM6) > 0 or strlen($LM7) > 0) or strlen($LM8) > 0 or strlen($LM5) > 0) {
    echo "<br>
                    <div class='col-md-6>
                <div class='container-fluid'>
                <div class='row'>
                <table class='table table-bordered'>
                <h5><div style='text-align:center'></div></h5>
                <tbody>
              
            
                  <tr>
                  <td><b>Ancho Pre-Tratamiento:</b> $LM6</td>
                  <td><b>Ancho Elemento I:</b> $LM7</td>
                    <td><b>Ancho Pre-Tratamiento:</b> $LM8</td>
                    <td><b>Ancho Elemento I:</b> $LM5</td>
                  </tr>
                  <tr>
                  <td></td>
                </tr>
                
                </tbody>
              </table>
               
              
              
              
                
                </div>
                </div>
                </div>
                
                ";
  }



                            if (strlen($Impresion) > "0") {
                                $Impresion = explode("<br>", $Impresion);
                                echo "<br>
                            <div class='container-fluid'>
                            <div class='row'>
                            <h5><div style='text-align:center'>Subsección Altura Facial</div></h5>
                            <table class='table table-bordered'>
                            <tbody>
                          
                        
                              <tr>
                                <td>$Impresion[0]</td>
                                <td>$Impresion[1]</td>
                               
                              </tr>

                              <tr>
                              <td>$Impresion[2]</td>
                              <td>$Impresion[3]</td>
                             
                            </tr>

                            <tr>
                            <td>$Impresion[4]</td>
                            <td>$Impresion[5]</td>
                           
                          </tr>

                          <tr>
                     
                          <td>$Impresion[6]</td>
                          <td></td>
                     
                         
                        </tr>
                          
                            
                            </tbody>
                          </table>
                           
                          
                          
                          
                            
                            </div>
                            </div>
                            
                            
                            ";
                            }

                            if(strlen($DiagnosticoConsulta)>0){
                                $DiagnosticoConsulta = explode("<br>", $DiagnosticoConsulta);

                                foreach ($DiagnosticoConsulta as $key => $value) {
                                    echo $value."<br>";
                                }
                            }

                            if (strlen($PlanManejo) > "0") {
                                $PlanManejo = explode("<br>", $PlanManejo);
                                echo "<br>
                            <div class='container-fluid'>
                            <div class='row'>
                            <h5><div style='text-align:center'>Subsección Mandíbula</div></h5>
                            <table class='table table-bordered'>
                            <tbody>
                          
                        
                              <tr>
                                <td>$PlanManejo[0]</td>
                                <td>$PlanManejo[1]</td>
                               
                              </tr>

                              <tr>
                              <td>$PlanManejo[2]</td>
                              <td>$PlanManejo[3]</td>
                             
                            </tr>

                            <tr>
                            <td>$PlanManejo[4]</td>
                            <td>$PlanManejo[5]</td>
                           
                          </tr>

                          <tr>
                     
                          <td>$PlanManejo[6]</td>
                          <td>$PlanManejo[7]</td>
                     
                         
                        </tr>
                        <tr>
                     
                        <td>$PlanManejo[8]</td>
                        <td>$PlanManejo[9]</td>
                   
                       
                      </tr>
                      <tr>
                
                      <td>$PlanManejo[10]</td>
                      <td></td>
                 
                     
                    </tr>
                    <tr>
                    
                    <td>$PlanManejo[11]</td>
                    <td>$PlanManejo[12]</td>
               
                   
                  </tr>
                          
                            
                            </tbody>
                          </table>
                           
                          
                          
                          
                            
                            </div>
                            </div>
                            
                            
                            ";
                            }

                            if (strlen($OrganoSentidos) > "0") {
                                $OrganoSentidos = explode("<br>", $OrganoSentidos);
                                echo "<br>
                            <div class='container-fluid'>
                            <div class='row'>
                            <h5><div style='text-align:center'>Diagnóstico y Plan de tratamiento</div></h5>
                            <table class='table table-bordered'>
                            <tbody>
                          
                        
                             
                    <tr>
                    
                    <td>$OrganoSentidos[0]</td>
                    <td>$OrganoSentidos[1]</td>
               
                   
                  </tr>
                          
                            
                            </tbody>
                          </table>
                           
                          
                          
                          
                            
                            </div>
                            </div>
                            
                            
                            ";
                            }
                            if (strlen($ExamenFisico) > "0") {
                                $ExamenFisico = explode("<br>", $ExamenFisico);
                                echo "<br>
                            <div class='container-fluid'>
                            <div class='row'>
                            <h5><div style='text-align:center'>4. Compromisos</div></h5>
                            <table class='table table-bordered'>
                            <tbody>
                          
                        
                             
                    <tr>
                    
                    <td>$ExamenFisico[0]</td>
               
                   
                  </tr>
                          
                            
                            </tbody>
                          </table>
                           
                          
                          
                          
                            
                            </div>
                            </div>
                            
                            
                            ";
                            }
                            if (strlen($DiagnosticoAcupuntura) > "0") {
                                $DiagnosticoAcupuntura = explode("<br>", $DiagnosticoAcupuntura);
                                echo "<br>
                            <div class='container-fluid'>
                            <div class='row'>
                            <h5><div style='text-align:center'>Tiempo de Tratamiento</div></h5>
                            <table class='table table-bordered'>
                            <tbody>
                          
                        
                             
                    <tr>
                    
                    <td>$DiagnosticoAcupuntura[0]</td>
               
                   
                  </tr>
                          
                            
                            </tbody>
                          </table>
                           
                          
                          
                          
                            
                            </div>
                            </div>
                            
                            
                            ";
                            }

                            //    var_dump($AP1);
                            //      $AP11 = explode(":", $AP1);

                            if (strlen($SintomasGenerales) > "0") {
                                $SintomasGenerales = explode("<br>", $SintomasGenerales);
                                echo "<br>
                            <div class='container-fluid'>
                            <div class='row'>
                            <h5><div style='text-align:center'>3.Diagnóstico Maxilofacial</div></h5>
                            <table class='table table-bordered'>
                            <tbody>
                          
                           
                              <tr>
                                <td>$SintomasGenerales[0]</td>
                                <td>$SintomasGenerales[1]</td>
                               
                              </tr>
                            
                            </tbody>
                          </table>
                           
                          
                          
                          
                            
                            </div>
                            </div>
                            
                            
                            ";
                            }



                            ?>

                        <?php
                        endif;
                        ?>

                        <?php
                        if ($_GET['tipo'] == 'incapacidad') :

                            $Historia_Nombre = "Historia_Clinica";
                            $Historia_id = $Historia_id;
                            include 'IR_Imprimir.php';

                            if (strlen($Incapacidades) > "0") {
                                echo $tabla[12] . '<b>Incapacidades</b> <br><br>' . $Incapacidades . '</div>';
                            }


                        endif;
                        ?>
                        <?php
                        if ($_GET['tipo'] == 'examenes') :

                            $Historia_Nombre = "Historia_Clinica";
                            $Historia_id = $Historia_id;
                            include 'IR_Imprimir.php';
                            echo $tabla[12];
                        ?>
                            <h3 align="center">Examenes</h3>
                            <table class="table table-responsive">
                                <thead>  <?php if ($Imagenologia_Examen <> '') { echo '
                                    <tr>
                                        <th scope="col" colspan="2">Orden de Imagenología</th>
                                    </tr>';
                                } ?>
                                </thead>
                                <tbody>
                                    <?php
                                    $contador = 0;
                                    $Examen_Paciente = explode(",", $Imagenologia_Examen);
                                    foreach ($Examen_Paciente as $value) {
                                        $contador++;
                                        if (funcionMaster($value, 'id', 'Nombre', 'examenes_historia') <> "") :
                                            echo '<tr><td>' . $contador . '</td><td>' . funcionMaster($value, 'id', 'Nombre', 'examenes_historia') . '</td></tr>';
                                        endif;
                                    }
                                    ?>
                                </tbody>
                                <thead>

                                    <?php if ($Laboratorio_Examenes <> '') { echo '
                                    <tr>
                                        <th scope="col" colspan="2">Orden de Laboratorio</th>
                                    </tr>';
                                } ?>

                                </thead>
                                <tbody>
                                    <?php
                                    $contador = 0;
                                    $Laboratorio_Paciente = explode(",", $Laboratorio_Examenes);
                                    foreach ($Laboratorio_Paciente as $value) {
                                        $contador++;
                                        if (funcionMaster($value, 'id', 'Nombre', 'examenes_historia') <> "") :
                                            echo '<tr><td>' . $contador . '</td><td>' . funcionMaster($value, 'id', 'Nombre', 'examenes_historia') . '</td></tr>';
                                        endif;
                                    }
                                    ?>
                                </tbody>
                            </table>

                        <?php
                            echo "</div>";
                        endif;
                        ?>

                        <?php
                        if ($_GET['tipo'] == 'receta') :
                            $Historia_Nombre = "Historia_Clinica";
                            $Historia_id = $Historia_id;
                            include 'IR_Imprimir.php';
                            echo $tabla[12];
                        ?>

                            <div class="row">
                                <h4 align="center"> Receta </h4>
                                <div class="col-md-12">


                                    <?php


                                    $querydeta = mysqli_query($conn3, "SELECT * FROM  operacionRecetario  where  cliente_id = $cliente_id  and idReceta=$RecetaId");

                                    $nrowl = mysqli_num_rows($querydeta);
                                    while ($rowDetalle = mysqli_fetch_array($querydeta)) {
                                        $Producto = funcionMaster($rowDetalle['codigoProd'], 'id', 'descripcion', 'pos');
                                        $posologia                = $rowDetalle['posologia'];
                                        $cantidad          = $rowDetalle['cantidad'];
                                        $duracion          = $rowDetalle['duracion'];
                                        $metodo          = $rowDetalle['metodo'];
                                        $nota            = $rowDetalle['nota'];
                                        $nota2         = $rowDetalle['nota2'];
                                        $administracion_posologia  = $rowDetalle['administracion_posologia'];
                                        $duracion_tratamiento         = $rowDetalle['duracion_tratamiento'];

                                        $dosis                 = $rowDetalle['dosis'];

                                        $frecuencia                 = $rowDetalle['frecuencia'];
                                        $administracion              = $rowDetalle['administracion'];
                                        $dosisdia           = $rowDetalle['dosisdia'];
                                        $via   = $rowDetalle['via'];
                                        $id_usuario              = $rowDetalle['id_usuario'];
                                        $id_cliente              = $rowDetalle['idcliente'];
                                        $total             = $rowDetalle['total'];
                                        $dias             = $rowDetalle['dias'];

                                        $producto1          = $rowDetalle['producto1'];



                                        $numero++;

                                    ?>

                                        <table id="example1" class="table table-bordered table-striped" style="zoom:0.7">
                                            <tr>
                                                <th style="width:20%">
                                                    <h6 align="center"> MEDICAMENTO</h6>
                                                </th>
                                                <th style="width:20%">
                                                    <h6 align="center"> FRECUENCIA DE ADMINISTRACIÓN</h6>
                                                </th>
                                                <th style="width:10%">
                                                    <h6 align="center"> DOSIS</h6>
                                                </th>
                                                <th style="width:20%">
                                                    <h6 align="center"> DURACIÓN DE PRESCRIPCIÓN</h6>
                                                </th>
                                                <th style="width:20%">
                                                    <h6 align="center"> METODO DE ADMINISTRACIÓN</h6>
                                                </th>
                                                <th style="width:10%">
                                                    <h6 align="center"> CANTIDAD TOTAL DE DESPACHO</h6>
                                                </th>
                                                <th style="width:10%">
                                                    <h6 align="center"> INDICACIONES DE ADMINISTRACIÓN</h6>
                                                </th>
                                                <th style="width:10%">
                                                    <h6 align="center"> OBSERVACIONES</h6>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td style="width:20%">
                                                    <h5> <?php echo $Producto; ?></h5>
                                                </td>
                                                <td style="width:20%">
                                                    <h5><?php echo $frecuencia ?> </h5>
                                                </td>
                                                <td style="width:10%">
                                                    <h5><?php echo $dosis ?></h5>
                                                </td>
                                                <td style="width:20%">
                                                    <h5><?php echo $duracion ?></h5>
                                                </td>
                                                <td style="width:20%">
                                                    <h5><?php echo $metodo ?></h5>
                                                </td>
                                                <td style="width:10%">
                                                    <h5><?php echo $cantidad . $posologia ?></h5>
                                                </td>
                                                <td style="width:10%">
                                                    <h5><?php echo wordwrap($nota, 30, "\n", true) ?></h5>
                                                </td>
                                                <td style="width:10%">
                                                    <h5><?php echo wordwrap($nota2, 30, "\n", true) ?></h5>
                                                </td>
                                            </tr>
                                        </table>
                                    <?php

                                    }

                                    ?>

                                </div>
                            </div>
                        <?php
                            echo "</div>";
                        endif;
                        ?>

                 <div class="col-md-12">
                      <div class="row">

                            <div class="col-md-6" align="center">
                            <?php
                          echo  $firmaPaciente;

                            ?>
                        </div>

                      <div class="col-md-6" align="center">
                            <?php
                            echo  $firmaImg;

                            ?>
                            <br>_______________________________________<br>
                            <?php echo $nombreF ?><br>
                            <b>* Documento firmado digitalmente *</b>
                        </div>
</div> </div>