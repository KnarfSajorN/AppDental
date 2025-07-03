<?php
include 'funciones/funciones.php';
include 'funciones/funcionesUtilidades.php';
include 'funciones/conn3.php';

$Historia_id = $_GET['historiaClinica1'];

$queryList = mysqli_query($conn3, "SELECT * FROM  Historia_Clinica_Audiologica where id = $Historia_id");
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $id = $rowMotorizado['id'];
    $cliente_id = $rowMotorizado['cliente_id'];
    $usuario_id = $rowMotorizado['usuario_id'];

    $Antecedentes_Personales_Audiologicos = $rowMotorizado['Antecedentes_Personales_Audiologicos'];
    $Antecedentes_Otologicos = $rowMotorizado['Antecedentes_Otologicos'];
    $Caracteristicas_Subjetivas_Audicion = $rowMotorizado['Caracteristicas_Subjetivas_Audicion'];
    $Antecedentes_Laborales_Audiologia = $rowMotorizado['Antecedentes_Laborales_Audiologia'];
    $Habitos_Audiologia = $rowMotorizado['Habitos_Audiologia'];
    $Antecedentes_Extralaborales_Audiologia = $rowMotorizado['Antecedentes_Extralaborales_Audiologia'];
    $Antecedentes_Extralaborales_Audiologia_2 = $rowMotorizado['Antecedentes_Extralaborales_Audiologia_2'];

    $AnamnesisTinnitus = $rowMotorizado['AnamnesisTinnitus'];

    $AntecedentesPediatricos = $rowMotorizado['AntecedentesPediatricos'];
    $AntecedentesOtologicosPediatria = $rowMotorizado['AntecedentesOtologicosPediatria'];
    $AntecedentesOtologicosPediatria_1 = $rowMotorizado['AntecedentesOtologicosPediatria_1'];
    $CaracteristicasSubjetivasAudicionPediatria = $rowMotorizado['CaracteristicasSubjetivasAudicionPediatria'];
    $HabitosPediatria = $rowMotorizado['HabitosPediatria'];
    $UsoProtesisPediatria = $rowMotorizado['UsoProtesisPediatria'];
    $OtoscopiaPediatria = $rowMotorizado['OtoscopiaPediatria'];

}


$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $cliente_id ");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $nombre_cliente = $rowMotorizado['nombre_cliente'];
    $CODI_CLIENTE = $rowMotorizado['CODI_CLIENTE'];
    $fechaNacimiento = $rowMotorizado['fechaNacimiento'];
    $direccion_cliente = $rowMotorizado['direccion_cliente'];
    $entidadSalud = $rowMotorizado['entidadSalud'];
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
        $Logo = '<img src="'.$Base.'logos/'.$LogoF.'" style="height: 3.5cm;width: auto;">'; 
    }

    //echo "$usuario_id1 usuario";

    if (strlen($firma) > 0) {
        $firmaImg = "<img src='{$Base}FirmasReg/{$firma}' height='80' width='150'>";
    }
}



  $queryList = mysqli_query($conn3, "SELECT firma FROM  firmas where historia_id = $Historia_id and historia_nombre = 'Historia_Clinica_Audiologica'");
      $nrowl = mysqli_num_rows($queryList);
      while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $firmaP = $rowMotorizado['firma'];
      }

      if (strlen($firmaP) > 10) {
     $firmaPaciente = "<img src='$firmaP' height='125' width='125'> <br>__________________________________ <br>$nombre_cliente<br>$CODI_CLIENTE";

      }

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
                    <div class="page" style="width:100vw; page-break-after:initial; page-break-before: always;" >   
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
                                    <b>Teléfono:</b> <?php echo $celular_cliente ?>
                                </td>
                                <td>
                                    <b>Género:</b> <?php echo $genero ?>
                                </td>
                            </tr>
                        </table>

                        <hr style="border-top: 1px solid black;opacity: 1;">

                        <!-- comienzo de la impresion de la informacion-->
                        <?php $tabla[3] = "<div class=\"col-3\" style=\"padding-bottom: 10px;\">";
                        $tabla[6] = "<div class=\"col-6\" style=\"padding-bottom: 10px;\">";
                        $tabla[12] = "<div class=\"col-12\" style=\"padding-bottom: 10px;\">"; ?>

                        <?php
                        // if ($_GET['tipo'] == 'consulta') :
                        
                        if (strlen($Antecedentes_Personales_Audiologicos) > "0") {
                            echo '<br> <h4><b>Datos Historia Clínica Audiología</b></h4><br><br>';
                        }
                        if (strpos($Antecedentes_Personales_Audiologicos, "style='display:none;'") == false) {
                            echo  str_replace("class='tg'",'class="table"',$Antecedentes_Personales_Audiologicos);
                        } ?>

                        <div class="col-md-12" align="center">
                            <?php if (strpos($Antecedentes_Otologicos, "style='display:none;'") == false) {
                                        echo str_replace("class='tg'",'class="table"',$Antecedentes_Otologicos);
                                    } 
                            ?>
                        </div>
                        <div class="col-md-12" align="center">
                            <?php if (strpos($Caracteristicas_Subjetivas_Audicion, "style='display:none;'") == false) {
                                        echo str_replace("class='tg'",'class="table"',$Caracteristicas_Subjetivas_Audicion);
                                    } 
                            ?>
                        </div>
                        <div class="col-md-12" align="center">
                            <?php if (strpos($Antecedentes_Laborales_Audiologia, "style='display:none;'") == false) {
                                        echo str_replace("class='tg'",'class="table"',$Antecedentes_Laborales_Audiologia);
                                    } 
                            ?>
                        </div>
                        <div class="col-md-12" align="center">
                            <?php if (strpos($Habitos_Audiologia, "style='display:none;'") == false) {
                                        echo str_replace("class='tg'",'class="table"',$Habitos_Audiologia);
                                    } 
                            ?>
                        </div>
                        <div class="col-md-12" align="center">
                            <?php if (strpos($Antecedentes_Extralaborales_Audiologia, "style='display:none;'") == false) {
                                        echo str_replace("class='tg'",'class="table"',$Antecedentes_Extralaborales_Audiologia);
                                    } 
                            ?>
                        </div>
                        <div class="col-md-12" align="center">
                            <?php if (strpos($Antecedentes_Extralaborales_Audiologia_2, "style='display:none;'") == false) {
                                        echo str_replace("class='tg'",'class="table"',$Antecedentes_Extralaborales_Audiologia_2);
                                    } 
                            ?>
                        </div>





                        <div class="col-md-12" align="left">
                            <?php if (strpos($AnamnesisTinnitus, "style='display:none;'") == false and strlen($AnamnesisTinnitus) > "105") {
                                        echo "<br> <h4><b> Anamnesis Tinnitus </b></h4><br><br>" . str_replace("class='tg'",'class="table"',$AnamnesisTinnitus);
                                    } 
                            ?>
                        </div>





                        <div class="col-md-12" align="left">
                            <?php
                                if (strlen($AntecedentesPediatricos) > "0") {
                                    echo '<br> <h4><b> Historia Pediátrica </b></h4><br>';
                                }
                                if (strpos($AntecedentesPediatricos, "style='display:none;'") == false) {
                                        echo  str_replace("class='tg'",'class="table"',$AntecedentesPediatricos);
                                } 
                            ?>
                         </div>
                         <div class="col-md-12" align="left">
                            <?php if (strpos($AntecedentesOtologicosPediatria, "style='display:none;'") == false) {
                                        echo str_replace("class='tg'",'class="table"',$AntecedentesOtologicosPediatria);
                                    } 
                            ?>
                         </div>
                         <div class="col-md-12" align="left">
                            <?php if (strpos($AntecedentesOtologicosPediatria_1, "style='display:none;'") == false) {
                                        echo str_replace("class='tg'",'class="table"',$AntecedentesOtologicosPediatria_1);
                                    } 
                            ?>
                         </div>
                         <div class="col-md-12" align="left">
                            <?php if (strpos($CaracteristicasSubjetivasAudicionPediatria, "style='display:none;'") == false) {
                                        echo str_replace("class='tg'",'class="table"',$CaracteristicasSubjetivasAudicionPediatria);
                                    } 
                            ?>
                         </div>
                         <div class="col-md-12" align="left">
                            <?php if (strpos($HabitosPediatria, "style='display:none;'") == false) {
                                        echo str_replace("class='tg'",'class="table"',$HabitosPediatria);
                                    } 
                            ?>
                         </div>
                         <div class="col-md-12" align="left">
                            <?php if (strpos($UsoProtesisPediatria, "style='display:none;'") == false) {
                                        echo str_replace("class='tg'",'class="table"',$UsoProtesisPediatria);
                                    } 
                            ?>
                         </div>
                         <div class="col-md-12" align="left">
                            <?php if (strpos($OtoscopiaPediatria, "style='display:none;'") == false) {
                                        echo str_replace("class='tg'",'class="table"',$OtoscopiaPediatria);
                                    } 
                            ?>
                         </div>




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

                            </div>              
                        </div>


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