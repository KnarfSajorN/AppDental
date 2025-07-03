<?php
include 'funciones/funciones.php';
include 'funciones/funcionesUtilidades.php';
include 'funciones/conn3.php';

$Historia_id = $_GET['historiaClinica1'];

$queryList = mysqli_query($conn3, "SELECT * FROM  Historia_Control_Prenatal where id = $Historia_id");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $id = $rowMotorizado['id'];
    $cliente_id = $rowMotorizado['cliente_id'];
    $usuario_id = $rowMotorizado['usuario_id'];


    $sdg = $rowMotorizado['sdg'];
    $peso = $rowMotorizado['peso'];
    $ta = $rowMotorizado['ta'];
    $fu = $rowMotorizado['fu'];
    $labx = $rowMotorizado['labx'];
    $dx = $rowMotorizado['dx'];
    $tratamiento = $rowMotorizado['tratamiento'];
    $ultima_mestruaccion = $rowMotorizado['ultima_mestruaccion'];
    $probable = $rowMotorizado['probable'];
    $dudas = $rowMotorizado['dudas'];
    $tratamiento = $rowMotorizado['tratamiento'];
    $vacunas = $rowMotorizado['vacunas'];
    $internacion = $rowMotorizado['internacion'];
    $mes_embarazo = $rowMotorizado['mes_embarazo'];
    $dias = $rowMotorizado['dias'];
    $gesta = $rowMotorizado['gesta'];
    $abortos = $rowMotorizado['abortos'];
    $parto = $rowMotorizado['parto'];
    $ninguno = $rowMotorizado['ninguno'];
    $vaginales = $rowMotorizado['vaginales'];
    $cesarea = $rowMotorizado['cesarea'];
    $hijosvivos = $rowMotorizado['hijosvivos'];
    $hijosmuertos = $rowMotorizado['hijosmuertos'];
    $viven = $rowMotorizado['viven'];
    $mueren = $rowMotorizado['mueren'];
    $mueren_semana = $rowMotorizado['mueren_semana'];
    $recien_nacido = $rowMotorizado['recien_nacido'];
    $fecha_terminacion = $rowMotorizado['fecha_terminacion'];
    $pa = $rowMotorizado['pa'];
    $edema = $rowMotorizado['edema'];
    $varices = $rowMotorizado['varices'];
    $presentacion = $rowMotorizado['presentacion'];
    $tonos = $rowMotorizado['tonos'];
    $au = $rowMotorizado['au'];
    $cefalea = $rowMotorizado['cefalea'];
    $semanas = $rowMotorizado['semanas'];
    $medico = $rowMotorizado['medico'];
    $hemoglobina = $rowMotorizado['hemoglobina'];
    $tipaje = $rowMotorizado['tipaje'];
    $rh = $rowMotorizado['rh'];
    $orina = $rowMotorizado['orina'];
    $vdrl = $rowMotorizado['vdrl'];
    $glicemia = $rowMotorizado['glicemia'];
    $alfafeto = $rowMotorizado['alfafeto'];
    $citomega = $rowMotorizado['citomega'];
    $usg = $rowMotorizado['usg'];
    $combs = $rowMotorizado['combs'];
    $miscelanos = $rowMotorizado['miscelanos'];
    $pap = $rowMotorizado['pap'];
    $toxoplasma = $rowMotorizado['toxoplasma'];
    $rubela = $rowMotorizado['rubela'];
    $observaciones = $rowMotorizado['observaciones'];
    $antecedentesPers = $rowMotorizado['antecedentesPers'];
    $antecedentesPersG = $rowMotorizado['antecedentesPersG'];
    
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







$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $cliente_id ");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $nombre_cliente = $rowMotorizado['nombre_cliente'];
    $CODI_CLIENTE = $rowMotorizado['CODI_CLIENTE'];
    $fechaNacimiento = $rowMotorizado['fechaNacimiento'];
    $direccion_cliente = $rowMotorizado['direccion_cliente'];
    $entidadSalud = funcionMaster($rowMotorizado['entidad_id'],'id','Nombre','Rips_Entidades');
    $celular_cliente = $rowMotorizado['celular_cliente'];
    $genero = $rowMotorizado['genero'];

    if ($genero == "M") {
        $genero = "Masculino";
    } elseif ($genero == "F") {
        $genero = "Femenino";
    }
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
        $firmaImg = "<img src='{$Base}/FirmasReg/{$firma}' height='150' width='300'>";
    }
}





  $queryList = mysqli_query($conn3, "SELECT firma FROM  firmas where historia_id = $Historia_id and historia_nombre = 'Historia_Clinica'");
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

<?php
$_GET['validar'] = $CODI_CLIENTE;
$_GET['mensaje'] = "Ingrese su Cédula para Visualizar el Contenido de la Impresión";
include 'preventView.php';
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/Impresion/estructura_impresion.css">
    <link rel="stylesheet" href="css/Impresion/bootstrap_5.1.1.min.css">
    <link rel="stylesheet" href="css/Impresion/bootstrap-print.css" media="print">
</head>

<body>

    <div class="page-header row" style="text-align: center">
        <div class="col-5" align="left"><?php echo $Logo ?></div>

        <div class="col-7" style="font-size: 15px;text-align: right;"><?php echo nl2br($header) ?></div>

        <button type="button" onClick="window.print()" style='background: rgb(250,235,215);background: -moz-radial-gradient(circle, rgba(250,235,215,1) 0%, rgba(60,141,176,1) 100%);background: -webkit-radial-gradient(circle, rgba(250,235,215,1) 0%, rgba(60,141,176,1) 100%);background: radial-gradient(circle, rgba(250,235,215,1) 0%, rgba(60,141,176,1) 100%);filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=" #faebd7",endColorstr="#3c8db0" ,GradientType=1);'>
            IMPRIMIR!
        </button>
    </div>

    <div class="page-footer">
        <?php echo nl2br($pieF); ?>
    </div>

    <table>

        <thead>
            <tr>
                <td>
                    <!--place holder for the fixed-position header-->
                    <div class="page-header-space"></div>
                </td>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>
                    <!--*** CONTENT GOES HERE ***-->
                    <div class="page" style="width:100vw; page-break-after: initial; page-break-before: always;">
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
                            <h3 align="center">Control Prenatal</h3>
                            <?php
                            $Historia_Nombre = "Historia_Control_Prenatal";
                            $Historia_id = $Historia_id;
                            //include 'IR_Imprimir.php';

                            if (strlen($antecedentesPers) > "0") {
                                echo $tabla[12] . '<b>Antecedentes Familiares:</b>' . $antecedentesPers. '</div>';
                            }
                            if (strlen($antecedentesPersG) > "0") {
                                echo $tabla[12] . '<b>Antecedentes Personales Obstétricos:</b>' . $antecedentesPersG. '</div>';
                            }

                            if(strlen($ultima_mestruaccion) > "0") {
                                echo $tabla[12] . '<b>Última Menstruación:</b> ' . $ultima_mestruaccion. '</div>';   
                            }
                            if (strlen($probable) > "0") {
                                echo $tabla[12] . '<b>Probable Parto:</b> ' . $probable. '</div>';
                            }
                            if (strlen($dudas) > "0") {
                                echo $tabla[12] . '<b>Dudas:</b>' . $dudas. '</div>';
                            }
                            if (strlen($vacunas) > "0") {
                                echo $tabla[12] . '<b>Vacuna Antitetánica:</b>' . $vacunas. '</div>';
                            }
                            if (strlen($internacion) > "0") {
                                echo $tabla[12] . '<b>Internación Embarazo:</b>' . $internacion. '</div>';
                            }

                            if (strlen($mes_embarazo) > "0") {
                                echo $tabla[12] . '<b>Mes embarazo:</b>' . $mes_embarazo. '</div>';
                            }

                            if (strlen($dias) > "0") {
                                echo $tabla[12] . '<b>Días:</b>' . $dias. '</div>';
                            }


                            if (strlen($gesta) > "0") {
                                echo $tabla[12] . '<b>Gestaciones:</b>' . $gesta. '</div>';
                            }

                            if (strlen($abortos) > "0") {
                                echo $tabla[12] . '<b>Abortos:</b>' . $abortos. '</div>';
                            }

                            if (strlen($parto) > "0") {
                                echo $tabla[12] . '<b>Partos:</b>' . $parto. '</div>';
                            }

                            if (strlen($ninguno) > "0") {
                                echo $tabla[12] . '<b>Ninguno o Más de 3 Partos:</b>' . $ninguno. '</div>';
                            }

                            if (strlen($vaginales) > "0") {
                                echo $tabla[12] . '<b>Vaginales:</b>' . $vaginales. '</div>';
                            }

                            if (strlen($cesarea) > "0") {
                                echo $tabla[12] . '<b>Cesáreas:</b>' . $cesarea. '</div>';
                            }

                            if (strlen($hijosvivos) > "0") {
                                echo $tabla[12] . '<b>Nac. vivos:</b>' . $hijosvivos. '</div>';
                            }

                            if (strlen($hijosmuertos) > "0") {
                                echo $tabla[12] . '<b>Nac. muertos:</b>' . $hijosmuertos. '</div>';
                            }

                            if (strlen($viven) > "0") {
                                echo $tabla[12] . '<b>Viven:</b>' . $viven. '</div>';
                            }

                            if (strlen($mueren) > "0") {
                                echo $tabla[12] . '<b>Mueren:</b>' . $mueren. '</div>';
                            }

                            if (strlen($mueren_semana) > "0") {
                                echo $tabla[12] . '<b>Mueren Después 1ra semana:</b>' . $mueren_semana. '</div>';
                            }

                            if (strlen($recien_nacido) > "0") {
                                echo $tabla[12] . '<b>Algún Recién Nacido en peso menos de 2500 g :</b>' . $recien_nacido. '</div>';
                            }

                            if (strlen($fecha_terminacion) > "0") {
                                echo $tabla[12] . '<b>Fecha Terminación anterior embarazo:</b>' . $fecha_terminacion. '</div>';
                            }

                            if (strlen($pa) > "0") {
                                echo $tabla[12] . '<b>P.A:</b>' . $pa. '</div>';
                            }

                            if (strlen($peso) > "0") {
                                echo $tabla[12] . '<b>Peso:</b>' . $peso. '</div>';
                            }

                            if (strlen($edema) > "0") {
                                echo $tabla[12] . '<b>Edema:</b>' . $edema. '</div>';
                            }

                            if (strlen($varices) > "0") {
                                echo $tabla[12] . '<b>Várices:</b>' . $varices. '</div>';
                            }

                            if (strlen($presentacion) > "0") {
                                echo $tabla[12] . '<b>Presentación:</b>' . $presentacion. '</div>';
                            }

                            if (strlen($tonos) > "0") {
                                echo $tabla[12] . '<b>Tonos Fetales:</b>' . $tonos. '</div>';
                            }

                            if (strlen($au) > "0") {
                                echo $tabla[12] . '<b>Au:</b>' . $au. '</div>';
                            }

                            if (strlen($cefalea) > "0") {
                                echo $tabla[12] . '<b>Cefalea:</b>' . $cefalea. '</div>';
                            }


                            if (strlen($semanas) > "0") {
                                echo $tabla[12] . '<b>Semanas:</b>' . $semanas. '</div>';
                            }

                            if (strlen($medico) > "0") {
                                echo $tabla[12] . '<b>Médico:</b>' . $medico. '</div><br>';
                            }

                           echo '<b>Resultado de Laboratorio</b><br>'.$resultado.'<br>';

                           

                            if (strlen($hemoglobina) > "0") {
                                echo $tabla[12] . '<b>Hemoglobina:</b>' . $hemoglobina. '</div>';
                            }

                            if (strlen($tipaje) > "0") {
                                echo $tabla[12] . '<b>Tipaje:</b>' . $tipaje. '</div>';
                            }

                            if (strlen($rh) > "0") {
                                echo $tabla[12] . '<b>Rh:</b>' . $rh. '</div>';
                            }

                            if (strlen($orina) > "0") {
                                echo $tabla[12] . '<b>Orina:</b>' . $orina. '</div>';
                            }

                            if (strlen($vdrl) > "0") {
                                echo $tabla[12] . '<b>Vdrl:</b>' . $vdrl. '</div>';
                            }

                            if (strlen($glicemia) > "0") {
                                echo $tabla[12] . '<b>Glicemia:</b>' . $glicemia. '</div>';
                            }

                            if (strlen($alfafeto) > "0") {
                                echo $tabla[12] . '<b>Alfafetoproteína:</b>' . $alfafeto. '</div>';
                            }

                            if (strlen($citomega) > "0") {
                                echo $tabla[12] . '<b>Citomegalovirus:</b>' . $citomega. '</div>';
                            }

                            if (strlen($usg) > "0") {
                                echo $tabla[12] . '<b>U.S.G:</b>' . $usg. '</div>';
                            }

                            if (strlen($combs) > "0") {
                                echo $tabla[12] . '<b>Combs R.B.N.S:</b>' . $combs. '</div>';
                            }

                            if(strlen($miscelanos) > "0"){
                                echo $tabla[12] . '<b>Miscelaneos:</b>' . $miscelanos. '</div>';
                            }

                            if (strlen($pap) > "0") {
                                echo $tabla[12] . '<b>Pap:</b>' . $pap. '</div>';
                            }

                            if (strlen($toxoplasma) > "0") {
                                echo $tabla[12] . '<b>Tóxoplasmosis:</b>' . $toxoplasma. '</div>';
                            }

                            if (strlen($rubela) > "0") {
                                echo $tabla[12] . '<b>Rubéola:</b>' . $rubela. '</div>';
                            }

                            if (strlen($observaciones) > "0") {
                                echo $tabla[12] . '<b>Observaciones:</b>' . $observaciones. '</div>';
                            }


                           
                            ?>

                        <?php
                        endif;
                        ?>

                      

                       

                 <div class="col-md-12">
                      <div class="row">

                            <div class="col-md-6" align="center">
                            <?php
                          //echo  $firmaPaciente;

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


                    </div> 
                    <!-- cierre del page-->
                </td>
            </tr>
        </tbody>

        <tfoot>
            <tr>
                <td>
                    <!--place holder for the fixed-position footer-->
                    <div class="page-footer-space"></div>
                </td>
            </tr>
        </tfoot>

    </table>

</body>

</html>

<script type="text/javascript">
    printHTML();

    function printHTML() {
        if (window.print) {
            window.print();
        }
    }
</script>