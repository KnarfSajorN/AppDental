<?php
date_default_timezone_set('America/Bogota');
include("funciones/funciones.php");
include("funciones/funcionesUtilidades.php");
session_start();

$idHistoria = decrypt($_GET['id']);
$tipoHistoria = $_GET['tipoHistoria'];
$tablas = [
    0 => "HT_OndasChoque",
    1 => "HT_OndasChoqueBilateral",
    2 => "sesionesAplicadas",
    3 => "evolucionesTratamiento"
];
$tabla = $tablas[$tipoHistoria];
$historia = mysqli_query($conn3, "SELECT * FROM {$tabla} WHERE id = '{$idHistoria}'") or die(mysqli_error($conn3));
if (!empty(mysqli_num_rows($historia))) {
    $historia = mysqli_fetch_assoc($historia);
}

$cliente = mysqli_query($conn3, "SELECT * from cliente where cliente_id = '{$historia['cliente_id']}';");
if (!empty(mysqli_num_rows($cliente))) {
    $cliente = mysqli_fetch_assoc($cliente);
}

$queryList = mysqli_query($conn3, "SELECT * FROM config where ID_Usuario = '{$historia['usuario_id']}'");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $moneda = $rowMotorizado['moneda'];
    $impuestoF = $rowMotorizado['impuestoF'];
    $nombreF      = $rowMotorizado['nombreF'];
    $telefonoF    = $rowMotorizado['telefonoF'];
    $direccionF   = $rowMotorizado['direccionF'];
    $emailF       = $rowMotorizado['emailF'];
    $ciudadPaisF  = $rowMotorizado['ciudadPaisF'];
    $licenciaF    = $rowMotorizado['licenciaF'];
    $pieF         = $rowMotorizado['pieF'];
    $header       = $rowMotorizado['header'];
    $LogoF           = $rowMotorizado['logoF'];
    $firma               = $rowMotorizado['firma'];

    if (strlen($LogoF) > 0) {
        $Logo = "<img src='{$Base}/logos/{$LogoF}' style='height: 3.5cm;width: auto;'>";
    }
    if (strlen($firma) > 0) {
        $firmaImg = '<img src="'.$Base.'FirmasReg/' . $firma . '" height="150" width="150">';
    }
}
$queryList = mysqli_query($conn3, "SELECT * FROM usuarios where ID = '{$historia['usuario_id']}'");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $empresaNombre      = $rowMotorizado['NOMBRE_USUARIO'];
    $pais               = $rowMotorizado['pais'];
    $ciudad             = $rowMotorizado['ciudad'];
    $direccion          = $rowMotorizado['direccion'];
    $telefono           = $rowMotorizado['telefono'];
    $nit                = $rowMotorizado['nit'];
}

$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = '{$historia['cliente_id']}' ");
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

$nombreHistoria = [
    0 => 'Tratamiento de Ondas de Choque',
    1 => 'Tratamiento de Ondas de Choque Bilateral',
    2 => 'Sesion Aplicada',
    3 => 'Evolucion'
];
?>



<!-- <!DOCTYPE html>
<html>

<head> -->
    <!--<link rel="stylesheet" href="css/Impresion/estructura_impresion.css">
    <link rel="stylesheet" href="css/Impresion/bootstrap_5.1.1.min.css">
    <link rel="stylesheet" href="css/Impresion/bootstrap-print.css" media="print">-->
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
                        
                        <br><br>
            <div class="col-xs-12">
                <br>
                <h4 class="center text text-center"><?= $nombreHistoria[$tipoHistoria] ?></h4>
                <table class="table table-responsive table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">Nota de Evolucion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center"><?= $historia['motivoConsulta'] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-xs-12" align="center">
                <label for="">FIRMA DEL DOCTOR</label>
                <P><?php echo $firmaImg . "<br>" . utf8_encode($empresaNombre) ?> <br> 20188-2004 </P>
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

