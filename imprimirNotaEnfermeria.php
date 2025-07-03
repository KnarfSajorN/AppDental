<?php
date_default_timezone_set('America/Bogota');

include("funciones/funciones.php");
include("funciones/funcionesUtilidades.php");

$usuario_id = base64_decode($_GET['idu']);
$cliente_id = base64_decode($_GET['clienteId']);
$idsNotas = explode(",", base64_decode($_GET['idsNotas']));

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
    $firmaImg = "<img src='{$Base}/FirmasReg/" . $firma . "' height='80' width='150'>";
  }
  // Nuevos campos 
}


$queryList = mysqli_query($conn3, "SELECT * FROM  usuarios where ID = $usuario_id");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

  $empresaNombre      = $rowMotorizado['empresaNombre'];
  $pais               = $rowMotorizado['pais'];

  $ciudad             = $rowMotorizado['ciudad'];
  $direccion          = $rowMotorizado['direccion'];
  $telefono           = $rowMotorizado['whatsapp'];
  $especialidad        = $rowMotorizado['especialidad'];
  $nit                = $rowMotorizado['nit'];
  $NOMBRE_USUARIO                = $rowMotorizado['NOMBRE_USUARIO'];
}


$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $cliente_id");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

  $nombre_cliente             = $rowMotorizado['nombre_cliente'];
  $CODI_CLIENTE               = $rowMotorizado['CODI_CLIENTE'];
  $fechaNacimiento            = $rowMotorizado['fechaNacimiento'];
  $celular_cliente            = $rowMotorizado['celular_cliente'];
  $entidadSalud                     = $rowMotorizado['entidadSalud'];
  $genero                     = $rowMotorizado['genero'];
  $direccion_cliente          = $rowMotorizado['direccion_cliente'];
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
//no usar en css en html y body el display:block!important;
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
                          <h4 align="center"> Nota/s de Enfermería </h4>
                          <div class="col-md-12">
                          </div>
                        </div>

                        <div class="row col-md-12" style="padding:20px;">
                          <table class="table">
                            <thead>
                              <tr>
                                <th class="col-md-1" style="width: 100px;">Fecha</th>
                                <th class="col-md-11">Nota</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php

                              foreach ($idsNotas as $notes) {

                                $queryList = mysqli_query($conn3, "SELECT * FROM  NotaEnfermeria where id = $notes");
                                $nrowl = mysqli_num_rows($queryList);
                                while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                  $fecha = $rowMotorizado['updated_at'];
                                  $fecha = explode(' ', $fecha);
                                  $notaEnfermeria = $rowMotorizado['notaEnfermeria'];
                                  $idDoctor = $rowMotorizado['idDoctor'];
                                }
                                $queryList = mysqli_query($conn3, "SELECT * FROM config where ID_Usuario = $idDoctor");
                                $nrowl = mysqli_num_rows($queryList);
                                while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                  $registroAuxiliar = $rowMotorizado['registroAuxiliar'];
                                }
                              ?>
                                <tr>
                                  <td class="col-md-1" style="width: 100px;"><?= $fecha[0]; ?></td>
                                  <td class=" col-md-11"><?= $notaEnfermeria; ?></td>
                                </tr>
                                <tr>
                                  <th class="col-md-12" colspan="2">Enfermero/a: <?= funcionMaster($idDoctor, 'ID', 'NOMBRE_USUARIO', 'usuarios'); ?> | Registro Auxiliar: <?= $registroAuxiliar ?></th>
                                </tr>
                              <?php
                              }
                              ?>

                              <!-- <tr>
                                <td class="col-md-2" style="display:block; width: 100px;">2021-04-10</td>
                                <td class=" col-md-10">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Exercitationem quibusdam totam explicabo necessitatibus, commodi quisquam nemo odio ratione quos. Quaerat nam quisquam et veniam quidem. Ratione, ab. Dignissimos, id facere.</td>
                              </tr>
                              <tr>
                                <td class="col-md-2" style="display:block; width: 100px;">2021-04-10</td>
                                <td class=" col-md-10">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Exercitationem quibusdam totam explicabo necessitatibus, commodi quisquam nemo odio ratione quos. Quaerat nam quisquam et veniam quidem. Ratione, ab. Dignissimos, id facere.</td>
                              </tr>
                              <tr>
                                <td class="col-md-2" style="display:block; width: 100px;">2021-04-10</td>
                                <td class=" col-md-10">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Exercitationem quibusdam totam explicabo necessitatibus, commodi quisquam nemo odio ratione quos. Quaerat nam quisquam et veniam quidem. Ratione, ab. Dignissimos, id facere.</td>
                              </tr>
                              <tr>
                                <td class="col-md-2" style="display:block; width: 100px;">2021-04-10</td>
                                <td class=" col-md-10">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Exercitationem quibusdam totam explicabo necessitatibus, commodi quisquam nemo odio ratione quos. Quaerat nam quisquam et veniam quidem. Ratione, ab. Dignissimos, id facere.</td>
                              </tr> -->
                            </tbody>
                          </table>
                        </div>

                        <!-- /.row -->

                        <div class=" col-xs-6" align="center">
                          <?php echo $Fecha ?>
                        </div>

                        <div class="col-xs-6" align="center">
                          <?php echo $ciudadPaisF ?>
                        </div>

                        <div class="col-xs-12" align="center">
                          <?php
                          echo  $firmaImg;

                          ?>
                          <br>_______________________________________<br>
                          <?php echo $NOMBRE_USUARIO ?><br>
                          <?php echo $especialidad ?><br>
                          <b>* Documento Firmado Digitalmente *</b>
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