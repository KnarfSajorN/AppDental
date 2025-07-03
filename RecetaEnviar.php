<?php
date_default_timezone_set('America/Bogota');
//include("conexiones/conexion.php");
include("funciones/funciones.php");
include("funciones/funcionesUtilidades.php");
include("funciones/conn3.php");

$qrUrl = "https://app.dentalsoftplus.com/RM_ImprimirReceta.php?receta_id=" . $receta_id . "&cliente_id=" . $cliente_id;

// $historia_clinica_id = $_GET['historia_clinica_id'];
// $nombre_historia = $_GET['nombre_historia'];
$nombre_historia = decrypt($_GET['NC']);
$historia_clinica_id = decrypt($_GET['HC']);

if ($historia_clinica_id <> "" and $nombre_historia <> "") {

  $queryList = mysqli_query($conn3, "SELECT * FROM {$nombre_historia} where id = $historia_clinica_id ");


  if ($queryList) {
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {

      $receta_id = $rowMotorizado['receta_id'];
      $cliente_id = $rowMotorizado['cliente_id'];
      $usuario_id = $rowMotorizado['usuario_id'];
    }
  }

} else {
  $receta_id = $_GET['receta_id'];
  $cliente_id = $_GET['cliente_id'];
  $usuario_id = funcionMaster($receta_id . "' AND cliente_id='{$cliente_id}", 'receta_id', 'usuario_id', 'RM_Recetario');

}

$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $cliente_id ");
if ($queryList) {
  while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $nombre_cliente = $rowMotorizado['nombre_cliente'];
    $CODI_CLIENTE = $rowMotorizado['CODI_CLIENTE'];
    $fechaNacimiento = $rowMotorizado['fechaNacimiento'];
    $direccion_cliente = $rowMotorizado['direccion_cliente'];
    $entidadSalud = funcionMaster($rowMotorizado['entidad_id'], 'id', 'Nombre', 'Rips_Entidades');
    $celular_cliente = $rowMotorizado['celular_cliente'];
    $genero = $rowMotorizado['genero'];
  }
}


$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $usuario_id");
if ($queryList) {
  while ($rowMotorizado = mysqli_fetch_array($queryList)) {

    $pieF = $rowMotorizado['pieF'];
    $header = $rowMotorizado['header'];
    $LogoF = $rowMotorizado['logoF'];
    $firma = $rowMotorizado['firma'];

    if (strlen($LogoF) > 0) {
      $Logo = "<img src='{$Base}/logos/{$LogoF}' height='125' width='125'>";
    }

    if (strlen($firma) > 0) {
      $firmaImg = '<img src="' . $Base . 'FirmasReg/' . $firma . '" height="80" width="180">';
    }

  }

}



?>

<?php
$_GET['validar'] = $CODI_CLIENTE;
$_GET['mensaje'] = "Ingrese su Cédula para Visualizar el Contenido de la Impresión";
include 'preventView.php';
?>

<?php



$historia_clinica_id = $_GET['historia_clinica_id'];
$nombre_historia = $_GET['nombre_historia'];



if ($historia_clinica_id <> "" and $nombre_historia <> "") {

  $queryList = mysqli_query($conn3, "SELECT * FROM {$nombre_historia} where id = $historia_clinica_id ");
  while ($rowMotorizado = mysqli_fetch_array($queryList)) {

    $receta_id = $rowMotorizado['receta_id'];
    $cliente_id = $rowMotorizado['cliente_id'];
  }
} else {
  $receta_id = base64_decode($_GET['receta_id']);
  $cliente_id = base64_decode($_GET['cliente_id']);
  $usuario_id = base64_decode($_GET['usuario_id']);
  // $receta_id = $_GET['receta_id'];
  // $cliente_id = $_GET['cliente_id'];
  // $usuario_id = $_GET['usuario_id'];
}




$receta = funcionMaster($cliente_id, 'cliente_id', 'receta_id', 'RM_Recetario');


$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $cliente_id ");
// $nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
  $nombre_cliente = $rowMotorizado['nombre_cliente'];
  $CODI_CLIENTE = $rowMotorizado['CODI_CLIENTE'];
  $fechaNacimiento = $rowMotorizado['fechaNacimiento'];
  $direccion_cliente = $rowMotorizado['direccion_cliente'];
  $entidadSalud = $rowMotorizado['entidadSalud'];
  $celular_cliente = $rowMotorizado['celular_cliente'];
  $genero = $rowMotorizado['genero'];
}

$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $usuario_id");
// $nrowl = mysqli_num_rows($queryList);
if ($queryList) {
  while ($rowMotorizado = mysqli_fetch_array($queryList)) {

    $pieF = $rowMotorizado['pieF'];
    $header = $rowMotorizado['header'];
    $LogoF = $rowMotorizado['logoF'];
    $firma = $rowMotorizado['firma'];

    if (strlen($LogoF) > 0) {
      $Logo = "<img src='{$Base}/logos/{$LogoF}' height='125' width='125'>";
    }






    if (strlen($firma) > 0) {
      $firmaImg = "<img src='{$Base}/FirmasReg/{$firma}' height='80' width='150'>";
    }
  }
}


$queryList = mysqli_query($conn3, "SELECT * FROM  usuarios where ID =  $usuario_id");
// $nrowl = mysqli_num_rows($queryList);
if ($queryList) {
  while ($rowMotorizado = mysqli_fetch_array($queryList)) {

    $empresaNombre = $rowMotorizado['NOMBRE_USUARIO'];
    $especialidad = $rowMotorizado['especialidad'];
  }

}




$queryList = mysqli_query($conn3, "SELECT * FROM  RM_Recetario where cliente_id = $cliente_id and receta_id= '$receta_id'");


// $nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
  $fechaRegistro = $rowMotorizado['Fecha_Registro'];
  $Producto = $rowMotorizado['idProducto'];
  $Indicaciones = $rowMotorizado['Indicaciones'];
  $cada = $rowMotorizado['cada'];
  $administracion = $rowMotorizado['administracion'];
  $horario = $rowMotorizado['horario'];
  $periodo = $rowMotorizado['periodo'];
  $nota = $rowMotorizado['licenciaF'];
  $id_usuario = $rowMotorizado['usuario_id'];
  $id_cliente = $rowMotorizado['cliente_id'];
}

$queryList = mysqli_query($conn3, "SELECT * FROM  historiaClinicaN  where receta = '$idr' and cliente_id= '$historiaClinica1'");

// $nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

  $cliente_id = $rowMotorizado['cliente_id'];
  $usuario_id = $rowMotorizado['usuario_id'];
  $Fecha = $rowMotorizado['Fecha'];

  $Hora = $rowMotorizado['Hora'];

  $CIE1 = $rowMotorizado['CIE1'];
  $CIE2 = $rowMotorizado['CIE2'];
  $CIE3 = $rowMotorizado['CIE3'];
}



$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $usuario_id ");
// $nrowl = mysqli_num_rows($queryList);
if ($queryList) {
  while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $moneda = $rowMotorizado['moneda'];
    $impuestoF = $rowMotorizado['impuestoF'];

    // Nuevos campos

    $nombreF = $rowMotorizado['nombreF'];
    $telefonoF = $rowMotorizado['telefonoF'];
    $direccionF = $rowMotorizado['direccionF'];
    $emailF = $rowMotorizado['emailF'];
    $ciudadPaisF = $rowMotorizado['ciudadPaisF'];
    $licenciaF = $rowMotorizado['licenciaF'];
    $pieF = $rowMotorizado['pieF'];

    $LogoF = $rowMotorizado['logoF'];
    $firma = $rowMotorizado['firma'];


    if (strlen($LogoF) > 0) {
      $Logo = '<img src="' . $Base . '/logos/' . $LogoF . '" height="10%" width="10%">';
    }

    if (strlen($firma) > 0) {
      $firmaImg = '<img src="' . $Base . '/FirmasReg/' . $firma . '" height="100" width="200">';
    }


    // Nuevos campos 
  }

}



$queryList = mysqli_query($conn3, "SELECT * FROM  usuarios where ID = $usuario_id ");
//echo "SELECT * FROM  usuarios where ID = $usuario_id";
//echo "SELECT * FROM  usuarios where ID = $id_usuario ";


// $nrowl = mysqli_num_rows($queryList);
if ($queryList) {
  while ($rowMotorizado = mysqli_fetch_array($queryList)) {

    $empresaNombre = $rowMotorizado['empresaNombre'];
    $nombre = $rowMotorizado['NOMBRE_USUARIO'];
    $pais = $rowMotorizado['pais'];

    $ciudad = $rowMotorizado['ciudad'];
    $direccion = $rowMotorizado['direccion'];
    $telefono = $rowMotorizado['telefono'];

    $nit = $rowMotorizado['nit'];
  }
}




$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $cliente_id");
// $nrowl = mysqli_num_rows($queryList);
if ($queryList) {
  while ($rowMotorizado = mysqli_fetch_array($queryList)) {

    $nombre_cliente = $rowMotorizado['nombre_cliente'];
    $ciudad_cliente = $rowMotorizado['ciudad_cliente'];

    $correo_cliente = $rowMotorizado['correo_cliente'];
    $direccion_cliente = $rowMotorizado['direccion_cliente'];
    $telefono_cliente = $rowMotorizado['telefono_cliente'];
    //$whatsapp           =$rowMotorizado['whatsapp'];
    $fechaNacimiento = $rowMotorizado['fechaNacimiento'];
    $CODI_CLIENTE = $rowMotorizado['CODI_CLIENTE'];
    $email = $rowMotorizado['correo_cliente'];
    $whatsapp = $rowMotorizado['celular_cliente'];
  }
}


//$Logoe = '<img src="https://medicalsoftplus.com/co435/logos/encabezadoreceta.png" height="100" width="100%">'; 



?>

<!-- Desde aquiii (Page header) -->

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

    <button type="button" onClick="window.print()"
      style='background: rgb(250,235,215);background: -moz-radial-gradient(circle, rgba(250,235,215,1) 0%, rgba(60,141,176,1) 100%);background: -webkit-radial-gradient(circle, rgba(250,235,215,1) 0%, rgba(60,141,176,1) 100%);background: radial-gradient(circle, rgba(250,235,215,1) 0%, rgba(60,141,176,1) 100%);filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=" #faebd7",endColorstr="#3c8db0" ,GradientType=1);'>
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
          <div class="page" style="width:100vw; page-break-after:initial; page-break-before: always;"  >
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
                  <b>F.Nacimiento:</b> <?php echo $fechaNacimiento ?>
                </td>
                <td width="15%">
                  <b>Edad:</b> <?php echo CalculoEdadPaciente($fechaNacimiento); ?>
                </td>
              </tr>

              <tr>
                <td>
                  <b>Residencia:</b> <?php echo $direccion_cliente ?>
                </td>
                <td>
                  <b>EPS:</b> <?php echo $entidadSalud ?>
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
            echo "<div class='col-12' style='padding-bottom: 10px;' align='center'> <h2> Receta Médica </h2> </div>";

            echo "<div class='row' style='padding-bottom: 10px;'>";

            $queryList = mysqli_query($conn3, "SELECT * FROM  RM_Recetario where receta_id = '$receta_id' AND cliente_id = '$cliente_id' and activo = 1");
            if ($queryList) {
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
            }


            echo "</div>";
            ?>

          </div>
          <!-- cierre del page-->
          <!-- Aquí se genera el código QR -->
          <div class="col-12" style="text-align: center;">
            <h3>Codigo QR</h3>
            <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=<?php echo urlencode($qrUrl); ?>"
              alt="QR Code">
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
  <div class="col-xs-4" align="center">
    <?php
    echo $firmaImg;

    ?>
    <br>_______________________________________<br>
    <?php echo $empresaNombre ?><br>
    CC. <?php echo $nit ?> <br>
    <?php echo $especialidad ?>
  </div>

  </div>
  </td>
  </tr>
  </tbody>

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

<!-- Hasta aqui (Page header) -->


<div class="content-wrapper" style="display: none;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Receta Médica
    </h1>

  </section>


  <body onload="window.print();">
    <div class="wrapper">

      <section class="invoice">

        <div class="row">
          <div class="col-xs-12">
            <?php echo $Logoe ?>
          </div>
        </div>

        <div class="row invoice-info">

          <!-- /.col -->
          <div class="col-xs-12 " style="display: none;">


            <h4> ATENCIÓN TELEMEDICINA</h4>
            <address>
              <strong>NOMBRES Y APELLIDOS: <?php echo $nombre_cliente . '' ?> </strong><br>

              <strong>EDAD: <?php echo calculaedad($fechaNacimiento) ?> FECHA: <?php echo $fechaRegistro . '' ?>
              </strong>
              <strong>HCI/CI: <?php echo $CODI_CLIENTE . '' ?> </strong> <br>
              <strong>correo: <?php echo $email . '' ?> </strong> <br>

            </address>
          </div>


        </div>



        <?php

        $conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));




        $queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id=$cliente_id");
        //echo  "SELECT * FROM  cliente where cliente_id=$cliente";
        // $nrowl = mysqli_num_rows($queryList);
        while ($rowMotorizado = mysqli_fetch_array($queryList)) {


          $email = $rowMotorizado['correo_cliente'];
          $whatsapp = $rowMotorizado['whatsapp'];
        }




        $mensajeW = 'Sr(a) *' . $nombre_cliente . '* Se le ha generado una receta motivo de la consulta con el Doctor ' . $nombre . ' ; para ver receta ingresar por el siguiente link:  ' . $Base . '/RM_ImprimirReceta.php?receta_id=' . $receta_id . '&cliente_id=' . $cliente_id . ' ';


        $accion = 0;
        Whatsapp_sent_cliente($linkkey, $whatsapp, $mensajeW, $cliente_id, $usuario_id, $whatsapp, $accion);

        // var_dump($whatsapp);
        // var_dump($mensajeW);
        // var_dump($cliente_id);
        // var_dump($usuario_id);
        // var_dump($linkkey);
        

        $para = "$email";

        // título
        $titulo = 'Receta de la consulta con el Doctor ' . $nombre . ' ';

        // mensaje
        $mensaje = '
                <html>
                <head>
                  <title>Receta de la consulta con el Doctor ' . $nombre . ' </title>
                    <body> 
                    
                               Hola buen dia señor(a) ' . $nombre_cliente . ', como resultado de la consulta con el Doctor ' . $nombre . ', se le ha generado una receta medica. :<br><br>


      
';



        $querydeta = mysqli_query($conn3, "SELECT * FROM  operacionRecetario  where  cliente_id = $cliente  and idReceta=$idr");
        // echo  "SELECT * FROM  operacionRecetario  where  cliente_id = $cliente  and idReceta=$idr";
        
        // echo  "SELECT * FROM  DetalleReceta where   id_cliente = $cliente and fechaRegistro ='$fechaR' and idReceta=$idr ";
        
        // $nrowl = mysqli_num_rows($querydeta);
        if ($querydeta) {
          while ($rowDetalle = mysqli_fetch_array($querydeta)) {
            $Producto = $rowDetalle['codigoProd'];

            $dosis = $rowDetalle['dosis'];
            $posologia = $rowDetalle['posologia'];
            $frecuencia = $rowDetalle['frecuencia'];
            $administracion = $rowDetalle['administracion'];
            $dosisdia = $rowDetalle['dosisdia'];
            $via = $rowDetalle['via'];
            $id_usuario = $rowDetalle['id_usuario'];
            $id_cliente = $rowDetalle['idcliente'];
            $total = $rowDetalle['total'];
            $dias = $rowDetalle['dias'];
            $nota = $rowDetalle['nota'];
            $producto1 = $rowDetalle['producto1'];
            $cantidad = $rowDetalle['cantidad'];

            $numero++;
            ;
          }
        }

        $queryList = mysqli_query($conn3, "SELECT * FROM  RM_Recetario where cliente_id = $cliente_id and receta_id= '$receta_id'");


        // $nrowl = mysqli_num_rows($queryList);
        if ($queryList) {
          while ($rowMotorizado = mysqli_fetch_array($queryList)) {
            $fechaRegistro = $rowMotorizado['Fecha_Registro'];
            $Producto = $rowMotorizado['idProducto'];
            $Indicaciones = $rowMotorizado['Indicaciones'];
            $cada = $rowMotorizado['cada'];
            $administracion = $rowMotorizado['administracion'];
            $horario = $rowMotorizado['horario'];
            $periodo = $rowMotorizado['periodo'];
            $nota = $rowMotorizado['licenciaF'];
            $id_usuario = $rowMotorizado['usuario_id'];
            $id_cliente = $rowMotorizado['cliente_id'];
          }
        }





        ?>

        <?php
        $mensaje .= '     


                
             <div>  Link para ver receta:  ' . $Base . 'RM_ImprimirReceta.php?receta_id=' . $receta_id . '&cliente_id=' . $cliente_id . '
              
          </div>
        

 
                          <br></br>
                <p>Atentamente,<br />
                 Doctor ' . $nombre . ' </p> 
                  
                <br/>
                 
                  
 
                <body>

                </body>
                </html>
                ';

        // Para enviar un correo HTML, debe establecerse la cabecera Content-type
        $cabeceras = 'MIME-Version: 1.0' . "\r\n";
        $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        // Cabeceras adicionales
        $cabeceras .= 'To: sievensoft <noreply@medicalsoftplus.com>' . "\r\n";
        $cabeceras .= 'From:  Receta Medica <noreply@medicalsoftplus.com>' . "\r\n";
        $cabeceras .= 'Cc: noreply@medicalsoftplus.com' . "\r\n";
        $cabeceras .= 'Bcc: noreply@medicalsoftplus.com' . "\r\n";

        // Enviarlo
        mail($para, $titulo, $mensaje, $cabeceras);
        mail($para1, $titulo, $mensaje, $cabeceras);


        // echo "<script language='Javascript'> window.location='RM_PacientesRecetas.php';</script>";
        
        ?>