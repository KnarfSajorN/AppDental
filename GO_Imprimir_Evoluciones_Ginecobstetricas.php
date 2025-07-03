<?php
include 'funciones/funciones.php';
include 'funciones/funcionesUtilidades.php';
include 'funciones/conn3.php';

$historiaClinica1 = $_GET['historiaClinica1'];





$queryList=mysqli_query($conn3,"SELECT * FROM  evoluciones where ID = $historiaClinica1");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {

              $cliente_id      =$rowMotorizado['cliente_id'];
              $usuario_id      =$rowMotorizado['usuario_id'];
              $Fecha           =$rowMotorizado['Fecha'];

              $Hora            =$rowMotorizado['Hora'];
              $motivoConsulta  =$rowMotorizado['motivoConsulta'];
              $receta_id  =$rowMotorizado['receta_id'];
             
              
             

          }


$queryList = mysqli_query($conn3, "SELECT * FROM  usuarios where ID = $usuario_id");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

  $empresaNombre      =$rowMotorizado['NOMBRE_USUARIO'];
  $especialidad     =$rowMotorizado['especialidad'];
  $pais               = $rowMotorizado['pais'];

  $ciudad             = $rowMotorizado['ciudad'];
  $direccion          = $rowMotorizado['direccion'];
  $telefono           = $rowMotorizado['telefono'];

  $nit                = $rowMotorizado['nit'];
}








$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $cliente_id ");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $nombre_cliente = $rowMotorizado['nombre_cliente'];
    $CODI_CLIENTE = $rowMotorizado['CODI_CLIENTE'];
    $fechaNacimiento = $rowMotorizado['fechaNacimiento'];
    $direccion_cliente = $rowMotorizado['direccion_cliente'];
    $entidadSalud = $rowMotorizado['entidadSalud'];
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
        $Logo = "<img src='{$Base}logos/{$LogoF}' height='125' width='125'>";
    }


    if (strlen($firma) > 0) {
        $firmaImg = "<img src='{$Base}/FirmasReg/{$firma}' height='80' width='150'>";
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




 //$logoheader = "<img src='{$Base}/logos/header.PNG' height='100%' width='105%'>";




?>
<style>

body{
  -webkit-print-color-adjust:exact !important;
  print-color-adjust:exact !important;
}
</style>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/Impresion/estructura_impresion.css">
    <link rel="stylesheet" href="css/Impresion/bootstrap_5.1.1.min.css">
    <link rel="stylesheet" href="css/Impresion/bootstrap-print.css" media="print">
</head>

<body>

    <div class="page-header row" style="text-align: center">
        <div class="col-12" align="left"><?php echo $Logo ?></div>

    <!-- <div class="col-7" style="font-size: 15px;text-align: right;"><?php echo nl2br($header) ?></div> -->

        <button type="button" onClick="window.print()" style='background: rgb(250,235,215);background: -moz-radial-gradient(circle, rgba(250,235,215,1) 0%, rgba(60,141,176,1) 100%);background: -webkit-radial-gradient(circle, rgba(250,235,215,1) 0%, rgba(60,141,176,1) 100%);background: radial-gradient(circle, rgba(250,235,215,1) 0%, rgba(60,141,176,1) 100%);filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=" #faebd7",endColorstr="#3c8db0" ,GradientType=1);'>
            IMPRIMIR!
        </button>
    </div>

   
    <div class="page-footer" style="color:#E74C3C; background:#FFFFFF;  ">
      <b>  <?php echo nl2br( $pieF); ?> </b>

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
                      <!--*** CONTENT GOES HERE ***-->
                   <div class="page" style="width:100vw; page-break-after:initial; page-break-before: always;" >

                        <table class="table" style="width: 100%;margin-top: 3px;">
                            <tr>
                                <td width="35%">
                                    <b>Paciente:</b> <?php echo $nombre_cliente ?>
                                </td>
                                <td width="30%">
                                    <b>Documento:</b> <?php echo $CODI_CLIENTE ?>
                                </td>
                            </tr>
                            <tr>
                                
                                <td width="15%">
                                    <b>Edad:</b> <?php echo  CalculoEdadPaciente($fechaNacimiento);?>
                                </td>
                                <td width="15%">
                                    <b>Fecha:</b> <?php echo  $Fecha;?>
                                </td>
                            </tr>

                          <!--  <tr>
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
                            </tr> -->
                        </table>
                        <hr style="border-top: 1px solid black;opacity: 1;">

                        <!-- comienzo de la impresion de la informacion-->
                        <?php $tabla[3] = "<div class=\"col-3\" style=\"padding-bottom: 10px;\">";
                        $tabla[6] = "<div class=\"col-6\" style=\"padding-bottom: 10px;\">";
                        $tabla[12] = "<div class=\"col-12\" style=\"padding-bottom: 10px;\">"; ?>

                     
                            <h2 align="center">NOTA DE EVOLUCIÓN</h2>


  <?php  echo $notas1  ?>
  <?php  if ($motivoConsulta <> '') {$motivoConsulta1 = $motivoConsulta.'<hr>';} ?>
  <?php  echo $motivoConsulta1  ?>


                           <?php
                       

                        echo "<div class='row' style='padding-bottom: 10px;'>";

                        $queryList = mysqli_query($conn3, "SELECT * FROM  RM_Recetario where receta_id = '$receta_id' AND cliente_id = '$cliente_id' ");
                        while ($RowRecetario = mysqli_fetch_array($queryList)) {

                            $id = $RowRecetario['id'];
                            $Nombre_Medicamento = $RowRecetario['Nombre_Medicamento'];
                            $codigoProd1 = $RowRecetario['codigoProd1'];
                            $Cantidad = $RowRecetario['Cantidad'];
                            $Presentacion = $RowRecetario['Presentacion'];
                            $Via_Administracion = $RowRecetario['Via_Administracion'];
                            $Composicion = $RowRecetario['Composicion'];
                            $Dosis = $RowRecetario['Dosis'];

                            $Indicaciones = $RowRecetario['Indicaciones'];
                            $Indicaciones_Generales = $RowRecetario['Indicaciones_Generales'];

                            echo "<div class='col-6'>";
                            echo "<div class='col-12'><b>Medicamento: </B> {$Nombre_Medicamento} {$codigoProd1} </div>";
                            echo "<div class='col-12'><b>Presentación: </B> {$Presentacion} </div>";
                            echo "<div class='col-12'><b>Vía de Administración: </B>  {$Via_Administracion} </div>";
                          
                            echo "<div class='col-6'><b>Cantidad: </B>  {$Cantidad},  <b>Dosis: </b> {$Dosis} </div>";
                           
                            echo "<div class='col-12'><br></div>";
                            echo "</div>";

                            echo "<div class='col-6'>";
                            echo "<div class='col-12'><b>Indicaciones: </B> <br> {$Indicaciones} </div>";
                            echo "<div class='col-12'>Recomendaciones Generales:<br> {$Indicaciones_Generales}</div>";
                            echo "<div class='col-12'><br></div>";
                            echo "</div>";

                        }

                        echo "</div>";
                        ?>
                    </td>
                  </tr>

                </table>


                       

                 <div class="col-md-12">
                      <div class="row">

                            <div class="col-md-6" align="center">
                    
                        </div>

                      <div class="col-md-6" align="center">
                            <?php
                            echo  $firmaImg;

                            ?>
                            <br>_______________________________________<br>
                            <?php echo $empresaNombre?><br>
                            <?php echo $especialidad?><br>
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