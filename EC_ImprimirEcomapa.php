<?php
include 'funciones/conn3.php';
include 'funciones/funciones.php';

$idHistoria = $_GET['id'];

$queryList = mysqli_query($conn3, "SELECT * FROM  Historia_Ecomapa where id = $idHistoria");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    
    $usuario_id = $rowMotorizado['usuario_id'];
    $cliente_id = $rowMotorizado['cliente_id'];

}


$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $usuario_id");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

    $pieF = $rowMotorizado['pieF'];
    $header = $rowMotorizado['header'];
    $LogoF = $rowMotorizado['logoF'];

    $firma = $rowMotorizado['firma'];
    $nombreF = $rowMotorizado['nombreF'];

    if (strlen($LogoF) > 0) {
        $Logo = "<img src='{$Base}/logos/{$LogoF}' style='height: 3.5cm;width: auto;'>";
    }

    if (strlen($firma) > 0) {
        $firmaImg = "<img src='{$Base}/FirmasReg/{$firma}' height='125' width='250'>";
    }
}


$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $cliente_id ");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $nombre_cliente = $rowMotorizado['nombre_cliente'];
    $CODI_CLIENTE = $rowMotorizado['CODI_CLIENTE'];
    $fechaNacimiento = $rowMotorizado['fechaNacimiento'];
    $direccion_cliente = $rowMotorizado['direccion_cliente'];
    $entidadSalud = $rowMotorizado['entidadSalud'];
    $entidadSalud = funcionMaster($rowMotorizado['entidad_id'], 'id', 'Nombre', 'Rips_Entidades');
    $celular_cliente = $rowMotorizado['celular_cliente'];
    $genero = $rowMotorizado['genero'];
}


function Edad_Paciente($fecha_nacimiento)
{
    $nacimiento = new DateTime($fecha_nacimiento);
    $ahora = new DateTime(date("Y-m-d"));
    $diferencia = $ahora->diff($nacimiento);
    return $diferencia->format("%y");
}


?>



<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/Impresion/estructura_impresion.css">
    <link rel="stylesheet" href="css/Impresion/bootstrap_5.1.1.min.css">
    <link rel="stylesheet" href="css/Impresion/bootstrap-print.css" media="print">


    <style>
        @media print {
            .QuitarBordes {
                border-left-style: hidden;
                border-right-style: hidden;
            }
        }

        p {
            margin: 0;
        }

        .table>:not(caption)>*>* {
            padding: .1rem .5rem;
        }

        .page-footer,
        .page-footer-space {
            height: 100px;
        }

        .page {
            font-size: 18px !important;
        }
    </style>
</head>

<body style="padding:10px;">

    <div class="page-header row" style="text-align: center">
        <div class="col-4" align="left"><?php echo $Logo ?></div>
        <div class="col-8" style="font-size: 18px;text-align: right;"><?php echo nl2br($header) ?></div>

        <button type="button" onClick="window.print()" style='background: rgb(250,235,215);background: -moz-radial-gradient(circle, rgba(250,235,215,1) 0%, rgba(60,141,176,1) 100%);background: -webkit-radial-gradient(circle, rgba(250,235,215,1) 0%, rgba(60,141,176,1) 100%);background: radial-gradient(circle, rgba(250,235,215,1) 0%, rgba(60,141,176,1) 100%);filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=" #faebd7",endColorstr="#3c8db0" ,GradientType=1);'>
            IMPRIMIR!
        </button>
    </div>

    <div class="page-footer">
        <div class='row' style="zoom: 0.8;place-content: center;position: relative;">
            <?php echo nl2br($pieF); ?>
        </div>
    </div>

    <table style="width:100%">

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

                    <div class="row col-md-12">
                    
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
                                    <b>Edad:</b> <?php echo  Edad_Paciente($fechaNacimiento); ?>
                                </td>
                            </tr>
                        </table>

                        <h2 class="text-center"> Ecomapa </h2>
                    <?php

                        


                    $queryList = mysqli_query($conn3, "SELECT * FROM  Historia_Ecomapa where id = $idHistoria LIMIT 1");
                    $nrowl = mysqli_num_rows($queryList);
                    $rowMotorizado = mysqli_fetch_array($queryList);
                        

                    $Ecomapa_Archivo = $rowMotorizado['Ecomapa_Archivo'];
                        
                        
                    if(!empty($Ecomapa_Archivo)){
                        echo "<div class='form-group col-md-12' align='center' ><br><br><img src='$Ecomapa_Archivo' width='500px'></div>";

                        
                    }


                    ?>
                    </div>
                    

                    <div class="col-12">
                        
                      <div class="row">
                            <div class="col-12" align="center">
                            <br><br><hr><br><br>
                            </div>
                            <div class="col-6" align="center">
                                <?php
                                $queryList = mysqli_query($conn3, "SELECT firma FROM  firmas where historia_id = $idHistoria and historia_nombre = 'Familiograma' LIMIT 1");
                                $nrowl = mysqli_num_rows($queryList);
                                while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                $firmaP = $rowMotorizado['firma'];
                                }
                        
                                if (strlen($firmaP) > 10) {
                                    $firmaPaciente = "<img src='$firmaP' height='125' width='250'> <br>__________________________________ <br>$nombre_cliente<br>$CODI_CLIENTE";
                        
                                } 

                            echo  $firmaPaciente;

                            ?>
                            </div>

                            <div class="col-6" align="center">
                                    <?php
                                    echo  $firmaImg;

                                    ?>
                                    <br>_______________________________________<br>
                                    <?php echo $nombreF ?><br>
                                    <b>* Documento firmado digitalmente *</b>
                            </div>
                    </div> 
                    



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