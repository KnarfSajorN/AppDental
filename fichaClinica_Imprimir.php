<?php
date_default_timezone_set('America/Bogota');

include("funciones/conn3.php");
include("funciones/funciones.php");
include 'funciones/funcionesUtilidades.php';

//$con = conectar();

//$conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));

$historiaClinica1 = decrypt($_GET['iHC']);
//$historiaClinica1 = $_GET['historiaClinica1'];


$queryList = mysqli_query($conn3, "SELECT * FROM   e_tratamiento1 where id = $historiaClinica1");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

  $tratamiento     = $rowMotorizado['tratamiento'];
  $operador      = $rowMotorizado['operador'];


  $descripcion          = $rowMotorizado['descripcion'];

  $procedimiento         = $rowMotorizado['procedimiento'];
  $planAtencion  = $rowMotorizado['planAtencion'];

  $procedimiento     = $rowMotorizado['procedimiento'];
  $planAtencion     = $rowMotorizado['planAtencion'];
  $abono           = $rowMotorizado['abono'];
  $nota          = $rowMotorizado['nota'];
  $peso    = $rowMotorizado['peso'];
  $altura   = $rowMotorizado['altura'];
  $imc   = $rowMotorizado['imc'];

  $ComposicionCorpora         = $rowMotorizado['composicionCorporal'];

  $usuario_id = $rowMotorizado['idUsuario'];
  $cliente_id = $rowMotorizado['idCliente'];
  $MotivoConsultaD                 = $rowMotorizado['MotivoConsultaD'];        
  $TratamientoD                 = $rowMotorizado['TratamientoD'];        
  $ProductoD                 = $rowMotorizado['ProductoD'];        
  $CantidadD                 = $rowMotorizado['CantidadD'];        
  $NSesiones                 = $rowMotorizado['NSesiones'];             
  $img11                 = $rowMotorizado['img11'];        
  $img12                 = $rowMotorizado['img12'];        
  $SesionD                 = $rowMotorizado['SesionD'];        
  $NSesiones1                = $rowMotorizado['NSesiones1']; 
  $ImpresionD                = $rowMotorizado['ImpresionD'];   

  $SesionesD = $rowMotorizado['sesionesD'];
  $Producto_Nombre = $rowMotorizado['producto_nombre'];

  $SesionesRestantes = $rowMotorizado['SesionesRestantes'];
}

$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $usuario_id");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
  $moneda = $rowMotorizado['moneda'];
  $impuestoF = $rowMotorizado['impuestoF'];

  // Nuevos campos

  $nombreF      = $rowMotorizado['nombreF'];
  $telefonoF    = $rowMotorizado['telefonoF'];
  $direccionF   = $rowMotorizado['direccionF'];
  $emailF       = $rowMotorizado['emailF'];
  $ciudadPaisF  = $rowMotorizado['ciudadPaisF'];
  $licenciaF    = $rowMotorizado['licenciaF'];
  $pieF         = $rowMotorizado['pieF'];
  $header       = $rowMotorizado['header'];

  $LogoF               = $rowMotorizado['logoF'];
  $firma               = $rowMotorizado['firma'];

  if (strlen($LogoF) > 0) {
    $Logo = "<img src='{$Base}/logos/{$LogoF}' style='height: 3.5cm;width: auto;'>";
  }


  if (strlen($firma) > 0) {
    $firmaImg = '<img src="'.$Base.'FirmasReg/' . $firma . '" height="100" width="200">';
  }
}
$queryList = mysqli_query($conn3, "SELECT firma FROM  firmas where historia_id = $historiaClinica1 and historia_nombre = 'e_tratamiento1'");
      $nrowl = mysqli_num_rows($queryList);
      while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $firmaP = $rowMotorizado['firma'];
        $nombreP = $rowMotorizado['nombre'];
        $documentoP = $rowMotorizado['documento'];
      }

      if (strlen($firmaP) > 0) {
     $firmaPaciente = "<img src='$firmaP' height='100' width='200'> <br>__________________________________ <br>$nombre_cliente<br>$CODI_CLIENTE";

      } 

$queryList = mysqli_query($conn3, "SELECT * FROM  usuarios where ID = $usuario_id");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

  $empresaNombre      = $rowMotorizado['empresaNombre'];
  $pais               = $rowMotorizado['pais'];

  $ciudad             = $rowMotorizado['ciudad'];
  $direccion          = $rowMotorizado['direccion'];
  $telefono           = $rowMotorizado['telefono'];

  $nit                = $rowMotorizado['nit'];
}


$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $cliente_id");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

  $nombre_cliente             = $rowMotorizado['nombre_cliente'];
  $CODI_CLIENTE               = $rowMotorizado['CODI_CLIENTE'];
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

            <div class="row">

                <div class="col-xs-12">
                    <hr>
                    <center> <strong>
                            <h3>Ficha Clínica</h3>
                        </strong></center>
                    <hr>
                    <?php if (strlen($MotivoConsultaD) > 0) : ?>

                    <strong> Motivo de la Consulta </strong>
                    <p> <?php echo  $MotivoConsultaD ?> </p>

                    <?php endif ?>

                    <?php if (strlen($ImpresionD) > 0) : ?>

                    <strong> Impresión Diagnostica </strong>
                    <p> <?php echo  $ImpresionD ?> </p>

                    <?php endif ?>

                    <?php if (strlen($TratamientoD) > 0) : ?>

                    <strong> Tratamiento </strong>
                    <p> <?php echo  $TratamientoD ?></p>

                    <?php endif ?>
                    
                    <?php if (strlen($Producto_Nombre) > 0) : ?>

                    <strong> Producto de Paquete de Procedimientos </strong>
                    <p> <?php echo $Producto_Nombre ?></p>

                    <?php endif ?>


                    <?php if (strlen($ProductoD) > 0) : ?>

                    <strong> Producto </strong>
                    <p> <?php echo $ProductoD ?></p>

                    <?php endif ?>



                    <?php if (strlen($CantidadD) > 0) : ?>

                    <strong> Cantidad de Productos: </strong>
                    <p> <?php echo $CantidadD ?> </p>

                    <?php endif ?>

                    <?php if (strlen($SesionesD) > 0) : ?>

                    <strong> Sesiones: </strong>
                    <p><?php echo $SesionesD ?> </p>

                    <?php endif ?> 

                    <?php if (strlen($SesionesRestantes) > 0) : ?>

                    <strong> Sesiones Restantes: </strong>
                    <p><?php echo $SesionesRestantes ?> </p>

                    <?php endif ?> 


                    <?php if (strlen($NSesiones) > 0) : ?>

                    <strong> Número de Sesiones: </strong>
                    <p><?php echo $NSesiones ?> </p>
                    <?php endif ?>


                    <?php if (strlen($NSesiones1) > 0) : ?>
                    <strong> Sesión Número: </strong>
                    <p><?php echo $NSesiones1 ?> </p>
                    <br>
                    <?php endif ?>

                    <?php if (strlen($SesionD) > 0) : ?>
                    <strong> Notas: </strong>
                    <p><?php echo $SesionD ?> </p>

                    <?php endif ?>

                    <center><strong>Nota: Permiso de uso de imágenes para evidencias del tratamiento
                            <br>
                            ° Para Uso del Profesional médico
                            <br>
                            ° Uso del laboratorio Mesoestetic(Netamente Interno)
                            <br>
                            °Se debe Salvaguardar la identidad del paciente.


                            <center><strong>Ficha Evidencia</strong></center>

                            <?php if (strlen($NSesiones1) > 0) : ?>

                            <strong> Sesión número: </strong>
                            <p><?php echo $NSesiones1 ?> </p>



                            <?php endif ?>

                            <div class="col-md-12 row">
                            <?php if ($img11<>''): ?>
                            <div class="col-md-6">
                                <h3><strong><label>Antes:</label></strong></h3>
                                <img src="archivos/e_tratamiento/<?php echo $img11 ?>"
                                    style="width: 100%; height: auto;">
                            </div>
                            <?php endif ?>

                            <?php if ($img12<>''): ?>
                            <div class="col-md-6">
                                <h3><strong><label>Después:</label></strong></h3>
                                <img src="archivos/e_tratamiento/<?php echo $img12 ?>"
                                    style="width: 100%; height: auto;">
                            </div>
                            <?php endif ?>
                            </div>





                            <hr>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->




            <div class="col-md-12">
                <div class="row" style="display:flex; flex-flow:row; justify-content: center">

                    <div class="col-md-4" align="center">
                        <?php
                          echo  $firmaPaciente;
                          ?>

                        <?php
                          echo $nombre_cliente;
                          ?>
                        <br>
                        <?php
                          echo $CODI_CLIENTE;
                          ?>


                    </div>

                    <div class="col-md-4" align="center">
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
