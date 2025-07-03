<?php
date_default_timezone_set('America/Bogota');

include("funciones/conn3.php");
include("funciones/funciones.php");
include("funciones/funcionesUtilidades.php");

$valor = decrypt($_GET['iC']);

//$con = conectar();

//$conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));

$historiaClinica1 = decrypt($_GET['iC']);

$quirurgico = mysqli_query($conn3, "SELECT * FROM  historiaClinica_Quirurgica where ID ='$valor'");
$datos_quirurgicos = mysqli_fetch_assoc($quirurgico);
$hora_inicio = $datos_quirurgicos['hora_inicio'];
$hora_finaliza = $datos_quirurgicos['hora_finaliza'];
$n_sala = $datos_quirurgicos['n_sala'];
$cirujano = $datos_quirurgicos['cirujano'];
$ayudante = $datos_quirurgicos['ayudante'];
$anestesiologo = $datos_quirurgicos['anestesiologo'];
$tipo_anestesia = $datos_quirurgicos['tipo_anestesia'];
$instrumentador = $datos_quirurgicos['instrumentador'];
$circulante = $datos_quirurgicos['circulante'];
$diagnostico_prequirurgico = $datos_quirurgicos['diagnostico_prequirurgico'];
$diagnostico_postquirurgico = $datos_quirurgicos['diagnostico_postquirurgico'];
$recuento_material = $datos_quirurgicos['recuento_material'];
$plan_manejo_final = $datos_quirurgicos['plan_manejo_final'];
$prodecimiento_quirurgico = $datos_quirurgicos['prodecimiento_quirurgico'];
$hallazgo_quirurgicos = $datos_quirurgicos['hallazgo_quirurgicos'];
$descripcion_quirurgica = $datos_quirurgicos['descripcion_quirurgica'];
$sangrado = $datos_quirurgicos['sangrado'];
$complicaciones = $datos_quirurgicos['complicaciones'];
$observaciones = $datos_quirurgicos['observaciones'];
$patologia = $datos_quirurgicos['patologia'];
$tejido = $datos_quirurgicos['tejido'];
$usuario_id = $datos_quirurgicos['usuario_id'];
$cliente_id = $datos_quirurgicos['cliente_id'];
$d1 = $datos_quirurgicos['cie1'];
$d2 = $datos_quirurgicos['cie2'];
$cup1 = $datos_quirurgicos['cup1'];
$cup2 = $datos_quirurgicos['cup2'];
$Fecha = $datos_quirurgicos['Fecha'];
$Hora = $datos_quirurgicos['Hora'];




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
    $firmaImg = '<img src="'.$Base.'/FirmasReg/' . $firma . '" height="100" width="150">';
  }





  // Nuevos campos 


}


$queryList = mysqli_query($conn3, "SELECT * FROM  usuarios where ID = $usuario_id");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

  $empresaNombre      = $rowMotorizado['NOMBRE_USUARIO'];
  $especialidad     = $rowMotorizado['especialidad'];
  $pais               = $rowMotorizado['pais'];

  $ciudad             = $rowMotorizado['ciudad'];
  $direccion          = $rowMotorizado['direccion'];
  $telefono           = $rowMotorizado['telefono'];

  $nit                = $rowMotorizado['nit'];
  $registro_medico    = $rowMotorizado['registro_medico'];
  $NOMBRE_USUARIO    = $rowMotorizado['NOMBRE_USUARIO'];
}



$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $cliente_id");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

  $nombre_cliente             = $rowMotorizado['nombre_cliente'];
  $CODI_CLIENTE               = $rowMotorizado['CODI_CLIENTE'];
  $celular_cliente            = $rowMotorizado['celular_cliente'];

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







$cie1 = mysqli_query($conn3, "SELECT * FROM historiaClinica9_Quirurgico_Cie10 as hc, cie10 as cie10 WHERE  hc.usuario_id=$usuario_id and hc.historiaClinica9_id='$valor' AND cie10.codigo=hc.codigo and hc.cliente_id='$cliente_id'");





?>

<!-- 
<!DOCTYPE html>
<html>

<head> -->
    <!--<link rel="stylesheet" href="css/Impresion/estructura_impresion.css">
    <link rel="stylesheet" href="css/Impresion/bootstrap_5.1.1.min.css">
    <link rel="stylesheet" href="css/Impresion/bootstrap-print.css" media="print">-->
<!-- </head>

<body>    -->
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
        <div class="col-md-12">
          <table width="100%">
            <tr style="font-weight: bold;padding: 4px;margin-top: 20px;margin-bottom: 20px;font-size: 16px">
              <td colspan="6" align="center" height="20">Procedimiento Quirúrgico</td>
            </tr>
            <tr>
              <td style="font-weight: bold;">Hora de Inicio:</td>
              <td><?php echo  $hora_inicio; ?></td>
              <td style="font-weight: bold;">Hora Finalizacion:</td>
              <td><?php echo $hora_finaliza; ?></td>
              <td style="font-weight: bold;">N°.Sala:</td>
              <td><?php echo  $n_sala; ?></td>
            </tr>
            <tr>
              <td style="font-weight: bold;">Cirujano:</td>
              <td><?php echo  $cirujano; ?></td>
              <td></td>
              <td width="100" style="font-weight: bold;">Ayudante:</td>
              <td><?php echo  $ayudante; ?></td>
              <td></td>
            </tr>
            <tr>
              <td style="font-weight: bold;">Anestesiólogo:</td>
              <td colspan="2"><?php echo  $anestesiologo; ?></td>
              <td style="font-weight: bold;">Tipo de Anestesia:</td>
              <td colspan="2"><?php echo  $tipo_anestesia; ?></td>
            </tr>
            <tr>
              <td style="font-weight: bold;">Instrumentador:</td>
              <td colspan="2"><?php echo  $instrumentador; ?></td>
              <td style="font-weight: bold;">Circulante:</td>
              <td colspan="2"><?php echo  $circulante; ?></td>
            </tr>
            <tr>
              <td style="font-weight: bold;"> <br> </td>
            </tr>
            <tr>
              <td style="font-weight: bold;">Procedimiento(s) Quirúrgico(s):</td>
              <td colspan="5"><?php echo  $prodecimiento_quirurgico; ?></td>
            </tr>
            <tr>
              <td style="font-weight: bold;">CIE-10:</td>
              <td colspan="5"><?php echo  $d1; ?></td>
            </tr>

            <tr>
              <td style="font-weight: bold;">Diagnóstico Pre-Quirúrgico:</td>
              <td colspan="5"><?php echo  $diagnostico_prequirurgico; ?></td>
            </tr>
            <tr>
              <td style="font-weight: bold;">CIE-10:</td>
              <td colspan="5"><?php echo  $d2; ?></td>
            </tr>

            <tr>
              <td style="font-weight: bold;">Diagnóstico Post-Quirúrgico:</td>
              <td colspan="5"><?php echo  $diagnostico_postquirurgico; ?></td>
            </tr>
            <tr>
              <td style="font-weight: bold;">Hallazgos Intraoperatorios:</td>
              <td colspan="5"><?php echo  $hallazgo_quirurgicos; ?></td>
            </tr>
          </table><br>






          <table width="100%">
            <tr>
              <td style="font-weight: bold;">Descripción Quirúrgica:</td>
              <td colspan="5"><?php echo  $descripcion_quirurgica; ?></td>
            </tr>
            <tr>
              <td style="font-weight: bold;">Cups:</td>
              <td colspan="5"><?php echo  $cup2; ?></td>
            </tr>
            <tr>
              <td style="font-weight: bold;">Sangrado Estimado:</td>
              <td colspan="5"><?php echo  $sangrado; ?></td>
            </tr>
            <tr>
              <td style="font-weight: bold;">Complicaciones:</td>
              <td colspan="5"><?php echo  $complicaciones; ?></td>
            </tr>
            <tr>
              <td style="font-weight: bold;">Recuento de Material:</td>
              <td colspan="5"><?php echo  $recuento_material; ?></td>
            </tr>
            <tr>
              <td style="font-weight: bold;">Plan de Manejo Final:</td>
              <td colspan="5"><?php echo  $plan_manejo_final; ?></td>
            </tr>
            <tr>
              <td style="font-weight: bold;">Observaciones:</td>
              <td colspan="5"><?php echo  $observaciones; ?></td>
            </tr>
            <tr>
              <td width="10" style="font-weight: bold;">
                Patología:
              </td>
              <td width="160"><?php echo  $patologia; ?></td>
              <td style="font-weight: bold;">Tejido:</td>

              <td>
                <?php echo  $tejido; ?>
              </td>
              <td width="100"></td>
            </tr>
          </table>

          <hr>


          <div class="col-xs-6" align="center">
            <?php
            echo  $firmaImg;

            ?>
            <br>_______________________________________<br>
            <?php echo $NOMBRE_USUARIO ?><br>
            <?php echo $especialidad ?><br>
            <b>* Documento firmado digitalmente *</b>
            <br>
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