<?php
include 'funciones/funciones.php';
include 'funciones/funcionesUtilidades.php';
include 'funciones/conn3.php';

// $Historia_id = $_GET['historiaClinica1'];
$Hospitalizacion_Id = decrypt($_GET['idHP']);





$queryList = mysqli_query($conn3, "SELECT * FROM  hoIngresoHospitalizacion where idHospitalizacion = $Hospitalizacion_Id");

if ($queryList) {
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {


        $idHospitalizacion = $rowMotorizado['idHospitalizacion '];
        $fechaIngreso= $rowMotorizado['fechaIngreso'];
        $horaIngreso	= $rowMotorizado['horaIngreso'];
        $fechaSalida	= $rowMotorizado['fechaSalida'];
        $horaSalida	= $rowMotorizado['horaSalida'];
        $motivoHospitalizacion	= $rowMotorizado['motivoHospitalizacion'];
        $diagnosticoHospitalizacion		= $rowMotorizado['diagnosticoHospitalizacion'];
        $diagnosticoCIE_10= $rowMotorizado['diagnosticoCIE_10'];
        $tratamiento	= $rowMotorizado['tratamiento'];
        $procedimientos	= $rowMotorizado['procedimientos'];
        $pisoSelect= $rowMotorizado['pisoSelect'];
        $habitacionSelect	= $rowMotorizado['habitacionSelect'];
        $camillaSelect	= $rowMotorizado['camillaSelect'];
        $hospitalizacionActiva= $rowMotorizado['hospitalizacionActiva'];
        $cliente_id= $rowMotorizado['cliente_id'];
        $usuarioId= $rowMotorizado['usuarioId'];

        if($hospitalizacionActiva == 1){
            $estadoHospitalizacion = "ACTIVA";
        }else{
            $estadoHospitalizacion = "CERRADA";
        }

    }
}


$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $cliente_id ");

if ($queryList) {
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
}


$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $usuario_id1");
if ($queryList) {
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
        $firmaImg = "<img src='{$Base}/FirmasReg/{$firma}' height='80' width='150'>";
    }
}
}






  $queryList = mysqli_query($conn3, "SELECT firma FROM  firmas where historia_id = $Historia_id and historia_nombre = 'Historia_Clinica'");
      
  if ($queryList) {
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $firmaP = $rowMotorizado['firma'];
      }
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
                            <tr style="border-bottom-width: 1px;">
                                <td>
                                    <b>Fecha y Hora de Ingreso:</b> <?php echo $fechaIngreso . " ".$horaIngreso ?>
                                </td>
                                <td>
                                    <b>Estado Actual:</b> <?php echo $estadoHospitalizacion ?>
                                </td>
                            </tr>

                    


                        </table>

                        <hr style="border-top: 1px solid black;opacity: 1;">

                        <!-- comienzo de la impresion de la informacion-->
                        <?php $tabla[3] = "<div class=\"col-3\" style=\"padding-bottom: 10px;\">";
                        $tabla[6] = "<div class=\"col-6\" style=\"padding-bottom: 10px;\">";
                        $tabla[12] = "<div class=\"col-12\" style=\"padding-bottom: 10px;\">"; ?>


                        <style>
                            .col-md-12 h6{
                                margin:0;
                                padding:0
                            }
                        </style>


                        <div class="col-md-12">
                            <h3 align="center"><b>Hospitalizacion: #<?php echo $Hospitalizacion_Id ?></b></h3><br>

                            <?php
                            if($motivoHospitalizacion <> ""){
                                echo "<h6><b>Motivo de hospitalizacion:</b></h6><br>" . nl2br($motivoHospitalizacion);
                            }
                            if($pisoSelect <> "" || $habitacionSelect <> ""  || $camillaSelect <> "" ){
                                echo '<h6 align="center"><b>Datos de alojamiento:</b></h6><br>
                                <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Piso</th>
                                                <th scope="col">Habitacion</th>
                                                <th scope="col">Camilla</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>'.$pisoSelect.'</td>
                                                <td>'.$habitacionSelect.'</td>
                                                <td>'. funcionMaster($camillaSelect,'idCamilla', 'descripcion', 'ho_camilla').'</td>
                                            </tr>
                                        </tbody>
                                </table>';
                            }

                            if($diagnosticoHospitalizacion <> ""){
                                echo "<h6><b>Diagnostico:</b></h6><br>" . nl2br($diagnosticoHospitalizacion);
                            }

                            if($diagnosticoCIE_10 <> ""){
                                echo "<h6><b>Diagnostico CIE-10:</b></h6><br>" . nl2br($diagnosticoCIE_10);
                            }

                            if($tratamiento <> ""){
                                echo "<h6><b>Tratamiento a seguir:</b></h6><br>" . nl2br($tratamiento);
                            }

                            if($procedimientos <> ""){
                                echo "<h6><b>Procedimientos a seguir:</b></h6><br>" . nl2br($procedimientos);
                            }

                            
                            
                            $queryProcHospitalizacion = mysqli_query($conn3, "SELECT * FROM  procedimientosHospitalizacion where idHospitalizacion = '$Hospitalizacion_Id'");
                            echo "<h4 align='center'><b>Acciones/Procedimientos de Hospitalizacion:</b></h4>";
                            foreach($queryProcHospitalizacion as $tablaProcedimientos){
                                echo "<h5><b>Procedimiento:</b>" . nl2br($tablaProcedimientos['nombreProcedimiento']) . " || <b>Fecha/Hora:</b>" . $tablaProcedimientos['Fecha'] . " - " . $tablaProcedimientos['Hora'] . "</h5><br>";
                                echo $tablaProcedimientos['detalle'];
                                echo "<br><br>";
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
