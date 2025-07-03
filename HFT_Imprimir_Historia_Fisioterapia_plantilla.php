<?php
include 'funciones/funciones.php';
include 'funciones/funcionesUtilidades.php';
include 'funciones/conn3.php';

$Historia_id = decrypt($_GET['historiaClinica1']);


$queryList = mysqli_query($conn3, "SELECT * FROM  Historia_Clinica_Fisioterapia where id = $Historia_id");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $id = $rowMotorizado['id'];
    $cliente_id = $rowMotorizado['cliente_id'];
    $usuario_id = $rowMotorizado['usuario_id'];
    $usuario_id1 = $rowMotorizado['usuario_id'];
    $Fecha = $rowMotorizado['Fecha'];

    $anamnesis = $rowMotorizado['anamnesis'];
    $fisico_postural = $rowMotorizado['fisico_postural'];
    $evaluacion_dolor = $rowMotorizado['evaluacion_dolor'];
    $evaluacion_sensibilidad = $rowMotorizado['evaluacion_sensibilidad'];
    $evaluacion_osteoarticular = $rowMotorizado['evaluacion_osteoarticular'];
    $evaluacion_neuromuscular = $rowMotorizado['evaluacion_neuromuscular'];
    $evaluacion_marcha_equilibrio = $rowMotorizado['evaluacion_marcha_equilibrio'];
    $actividad_motora_funcional = $rowMotorizado['actividad_motora_funcional'];
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

$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $usuario_id1");
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

    //echo "$usuario_id1 usuario";

    if (strlen($firma) > 0) {
        $firmaImg = "<img src='{$Base}/FirmasReg/{$firma}' height='100' width='330'>";
    }
}





  $queryList = mysqli_query($conn3, "SELECT firma FROM  firmas where historia_id = $Historia_id and historia_nombre = 'Historia_Clinica_Fisioterapia'");
      $nrowl = mysqli_num_rows($queryList);
      while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $firmaP = $rowMotorizado['firma'];
      }

      if (strlen($firmaP) > 10) {
     $firmaPaciente = "<img src='$firmaP' height='100' width='330'> <br>__________________________________ <br>$nombre_cliente<br>$CODI_CLIENTE";

      } 


?>


<!-- 
<!DOCTYPE html>
<html>

<head> -->
    <!--<link rel="stylesheet" href="css/Impresion/estructura_impresion.css">
    <link rel="stylesheet" href="css/Impresion/bootstrap_5.1.1.min.css">
    <link rel="stylesheet" href="css/Impresion/bootstrap-print.css" media="print">
    <style>

@media print and (color) {
   * {
      -webkit-print-color-adjust: exact;
      print-color-adjust: exact;
   }

   .page-header{
    background-color:white;
   }

   .page-footer{
    background-color:white;
   }
}

    </style>-->
<!-- </head>

<body> -->

    
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
                        
                        
                        <?php
                        echo "Fecha: ".$Fecha."<br><br>";

                        echo $anamnesis."<br>";

                        echo $fisico_postural."<br>";

                        echo $evaluacion_dolor."<br>";
                        
                        echo $evaluacion_sensibilidad."<br>";

                        echo $evaluacion_osteoarticular."<br>";

                        echo $evaluacion_neuromuscular."<br>";

                        echo $evaluacion_marcha_equilibrio."<br>";

                        echo $actividad_motora_funcional."<br>";
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
                        </div>              
                    </div>


                   <!-- division -->

        <!-- <table>
            <thead>
                <tr>
                    <td> -->
                        <!--place holder for the fixed-position header-->
                        <!-- <div class="page-header-space"></div>
                    </td>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td> -->
                        <!--*** CONTENT GOES HERE ***-->


















                        


        <!-- </div> -->
        <!-- cierre del page-->
        <!-- </td>
        </tr>
        </tbody>

        <tfoot>
            <tr>
                <td> -->
                    <!--place holder for the fixed-position footer-->
                    <!-- <div class="page-footer-space"></div>
                </td>
            </tr>
        </tfoot>

        </table>

</body>

</html> -->

