<?php
include 'funciones/funciones.php';
include 'funciones/funcionesUtilidades.php';
include 'funciones/conn3.php';

// $historia_clinica_id = $_GET['historia_clinica_id'];
// $nombre_historia = $_GET['nombre_historia'];
$nombre_historia = decrypt($_GET['NC']);
$historia_clinica_id = decrypt($_GET['HC']);

if($historia_clinica_id<>"" AND $nombre_historia <>""){

    $queryList = mysqli_query($conn3, "SELECT * FROM {$nombre_historia} where id = $historia_clinica_id ");
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {

        $receta_id = $rowMotorizado['receta_id'];
        $cliente_id = $rowMotorizado['cliente_id'];
        $usuario_id = $rowMotorizado['usuario_id'];
    }
}
else {
    $receta_id = $_GET['receta_id'];
    $cliente_id = $_GET['cliente_id'];
    $usuario_id = funcionMaster($receta_id."' AND cliente_id='{$cliente_id}", 'receta_id', 'usuario_id', 'RM_Recetario');
}





$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $cliente_id ");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $nombre_cliente = $rowMotorizado['nombre_cliente'];
    $CODI_CLIENTE = $rowMotorizado['CODI_CLIENTE'];
    $fechaNacimiento = $rowMotorizado['fechaNacimiento'];
    $direccion_cliente = $rowMotorizado['direccion_cliente'];
    $entidadSalud = funcionMaster($rowMotorizado['entidad_id'], 'id', 'Nombre', 'Rips_Entidades');
    $celular_cliente = $rowMotorizado['celular_cliente'];
    $genero = $rowMotorizado['genero'];
}

$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $usuario_id");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

    $pieF         = $rowMotorizado['pieF'];
    $header       = $rowMotorizado['header'];
    $LogoF               = $rowMotorizado['logoF'];
    $firma               =$rowMotorizado['firma'];

    if (strlen($LogoF) > 0) {
        $Logo = "<img src='{$Base}/logos/{$LogoF}' height='125' width='125'>";
    }

    if (strlen($firma) > 0)  
    {
       $firmaImg = '<img src="'.$Base.'FirmasReg/'.$firma.'" height="80" width="180">'; 
     }

}



?>
<!-- 
<!DOCTYPE html>
<html>

<head> -->
    <!--<link rel="stylesheet" href="css/Impresion/estructura_impresion.css">
    <link rel="stylesheet" href="css/Impresion/bootstrap_5.1.1.min.css">
    <link rel="stylesheet" href="css/Impresion/bootstrap-print.css" media="print">-->
<!-- </head>

<body> -->
                    <!--*** CONTENT GOES HERE ***-->
                    
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
                                    <b>Edad:</b> <?php echo  CalculoEdadPaciente($fechaNacimiento);?>
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
                        <?php
                        echo "<div class='col-12' style='padding-bottom: 10px;' align='center'> <h2> Receta Medica </h2> </div>";

                        echo "<div class='row' style='padding-bottom: 10px;'>";

                        $queryList = mysqli_query($conn3, "SELECT * FROM  RM_Recetario where receta_id = '$receta_id' AND cliente_id = '$cliente_id' ");
                        while ($RowRecetario = mysqli_fetch_array($queryList)) {

                            $id = $RowRecetario['id'];
                            $Nombre_Medicamento = $RowRecetario['Nombre_Medicamento'];
                            $Cantidad = $RowRecetario['Cantidad'];
                            $Presentacion = $RowRecetario['Presentacion'];
                            $Via_Administracion = $RowRecetario['Via_Administracion'];
                            $Composicion = $RowRecetario['Composicion'];
                            $Dosis = $RowRecetario['Dosis'];

                            $Indicaciones = $RowRecetario['Indicaciones'];
                            $Indicaciones_Generales = $RowRecetario['Indicaciones_Generales'];

                            echo "<div class='col-6'>";
                            echo "<div class='col-12'>Nombre: {$Nombre_Medicamento} </div>";
                            echo "<div class='col-12'>Presentación: {$Presentacion} </div>";
                            echo "<div class='col-12'>Vía de Administración: {$Via_Administracion} </div>";
                            echo "<div class='col-12'>Composición: {$Composicion} </div>";
                            echo "<div class='col-12'>Cantidad: {$Cantidad} </div>";
                            echo "<div class='col-12'>Dosis: {$Dosis}</div>";
                            echo "<div class='col-12'><br></div>";
                            echo "</div>";

                            echo "<div class='col-6'>";
                            echo "<div class='col-12'>Indicaciones:<br> {$Indicaciones} </div>";
                            echo "<div class='col-12'>Indicaciones Generales:<br> {$Indicaciones_Generales}</div>";
                            echo "<div class='col-12'><br></div>";
                            echo "</div>";

                        }

                        echo "</div>";
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

<!-- 
















                        


        </div> -->
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