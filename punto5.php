<?php
date_default_timezone_set('America/Bogota');
include("conexiones/conexion.php");
include("funciones/conexiones.php");
include("funciones/funciones.php");
include("funciones/funcionesUtilidades.php");

$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

$historiaClinica1 = $_GET['cliente'];
$idr= $_GET['idr'];

$fechaR         = date("Y-m-d");

// $queryList=mysqli_query($conn3,"SELECT * FROM  operacionRecetario where cliente_id = $historiaClinica1 and idReceta= '$idr'");
// $nrowl=mysqli_num_rows($queryList);
// while($rowMotorizado=mysqli_fetch_array($queryList))
// {
//   $fechaRegistro        =$rowMotorizado['fecha'];
//   $Producto      =$rowMotorizado['idProducto'];
//   $Indicaciones   =$rowMotorizado['Indicaciones'];
//   $cada       = $rowMotorizado['cada'];
//   $administracion       = $rowMotorizado['administracion'];
//   $horario              = $rowMotorizado['horario'];         
//   $periodo   =$rowMotorizado['periodo'];
//   $nota    =$rowMotorizado['licenciaF'];
//   $id_usuario         =$rowMotorizado['usuario_id'];
//   $id_cliente      = $rowMotorizado['cliente_id'];
// }

// $queryList=mysqli_query($conn3,"SELECT * FROM  historiaClinica1  where receta = '$idr' and cliente_id= '$historiaClinica1'");
// $nrowl=mysqli_num_rows($queryList);
// while($rowMotorizado=mysqli_fetch_array($queryList))
// {
//   $cliente_id      =$rowMotorizado['cliente_id'];
//   $usuario_id      =$rowMotorizado['usuario_id'];
//   $Fecha           =$rowMotorizado['Fecha'];
//   $Hora            =$rowMotorizado['Hora'];
//   $cie1 =$rowMotorizado['cie1'];
//   $cie10 =$rowMotorizado['cie10'];
//   $cie3 =$rowMotorizado['cie3'];
//   $cie4 =$rowMotorizado['cie4'];
// }

// $queryList=mysqli_query($conn3,"SELECT * FROM  config where ID_Usuario = $id_usuario");
// $nrowl=mysqli_num_rows($queryList);
// while($rowMotorizado=mysqli_fetch_array($queryList))
// {
//   $moneda=$rowMotorizado['moneda'];
//   $impuestoF=$rowMotorizado['impuestoF'];
//                 // Nuevos campos
//   $nombreF      =$rowMotorizado['nombreF'];
//   $licenciaF    =$rowMotorizado['licenciaF'];
//   $telefonoF    =$rowMotorizado['telefonoF'];
//   $direccionF   =$rowMotorizado['direccionF'];
//   $emailF       = $rowMotorizado['emailF'];
//   $ciudadPaisF  =$rowMotorizado['ciudadPaisF'];
//   $pieF         =$rowMotorizado['pieF'];
//   $header       = $rowMotorizado['header'];
//   $LogoF               =$rowMotorizado['logoF'];
//   $firma               =$rowMotorizado['firma'];
//   if (strlen($LogoF) > 0) 
//   {
//     $Logo = '<img src="'.$Base.'logos/'.$LogoF.'" width="130px">'; 
//   }
//   if (strlen($firma) > 0)  
//   {
//     $firmaImg = '<img src="'.$Base.'FirmasReg/'.$firma.'" height="80" width="180">'; 
//   }
// }

//$Logo1 = '<img src="https://medicalsoftplus.com/co282/logos/logoreceta.PNG" width="100%">'; 

// $queryList=mysqli_query($conn3,"SELECT * FROM  usuarios where ID = $id_usuario");
// $nrowl=mysqli_num_rows($queryList);
// while($rowMotorizado=mysqli_fetch_array($queryList))
// {
//   $empresaNombre      =$rowMotorizado['NOMBRE_USUARIO'];
//   $especialidad     =$rowMotorizado['especialidad'];
//   $pais               =$rowMotorizado['pais'];
//   $ciudad             =$rowMotorizado['ciudad'];
//   $direccion          =$rowMotorizado['direccion'];
//   $telefono           =$rowMotorizado['telefono'];
//   $nit                =$rowMotorizado['nit'];
// }

// $queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id = $historiaClinica1 ");
// $nrowl=mysqli_num_rows($queryList);
// while($rowMotorizado=mysqli_fetch_array($queryList))
// {
//   $nombre_cliente             =$rowMotorizado['nombre_cliente'];
//   $CODI_CLIENTE               =$rowMotorizado['CODI_CLIENTE'];
//   $telefono_cliente = $rowMotorizado['telefono_cliente'];
//   $direccion_cliente = $rowMotorizado['direccion_cliente'];
//   $ciudad_cliente = $rowMotorizado['ciudad_cliente'];
//   $correo_cliente = $rowMotorizado['correo_cliente'];
// }
//$Logoe = '<img src="https://medicalsoftplus.com/co282/logos/encabezadoreceta.png" height="100" width="100%">'; 


?>


<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="style.css" />
</head>

<style type="text/css">

.page-header, .page-header-space {
  height: 150px;
}

.page-footer, .page-footer-space {
  height: 100px;
}

.page-footer {
  position: fixed;
  bottom: 0;
  width: 100%;
  border-top: 1px solid black; /* for demo */
  background: #bfe6fd52; /* for demo */
}

.page-header {
  position: fixed;
  top: 0mm;
  width: 100%;
  border-bottom: 1px solid black; /* for demo */
  background: #bfe6fd52; /* for demo */
  font-size: inherit !important;
}

.page {
  page-break-after: always;
}

@page {
  margin: 5mm;
}

@media print {
 thead {display: table-header-group;} 
 tfoot {display: table-footer-group;}
 body {margin: 0;}
 .col-md-6{width: 50%;float: left;}
 .col-md-12{width: 100%;float: left;}
 .col-md-4{width: 33.3333%;float: left;}
}
</style>


<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.6 -->
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="dist/css/AdminLTE.min.css">
<body>
  <!-- <div class="page-header" style="text-align: center">

    <div class="col-md-6" align="left">
      <?php echo $Logo ?>
    </div>
    <div class="col-md-6" align="right">
      <?php date_default_timezone_set("America/Bogota");
      $diassemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
      $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
      echo $nombreF.'<br> NIT '.$licenciaF.'<br> '.$direccionF.'<br> '.$ciudadPaisF.'<br> '.$telefonoF.'<br> '.$diassemana[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ; ?>
    </div>
  </div> -->

  <!-- <div class="page-footer">
    <?php echo $pieF?>
  </div> -->
  <br>
  <div class="row">
    <div class="col-xs-12">
      <div class="col-xs-8 center text-center">
        <h3 class="text-success">CONTRATO DE TRATAMIENTOS DE RESIDUOS</h3>
        <h4 class="text-success">(Artículo 5 del R.D. 553/2020, de 2 de junio) </h4>
      </div>
      <div class="col-xs-4">
        <table class="table">
          <tbody>
            <tr>
              <td>Fecha Inicio: </td>
              <td>----</td>
            </tr>
            <tr>
              <td>Fecha Fin: </td>
              <td>----</td>
            </tr>
          </tbody>
        </table>
      </div>  
    </div>
  </div>

  <div class="row">
    <div class="col-xs-12">      
      <div class="col-xs-12">
        <table class="table">
          <thead>
            <tr>
              <th>Nº DOCUMENTO:</th>
              <th>CTR202100000___:</th>
            </tr>
          </thead>
        </table>
      </div>  
    </div>
  </div>

  <div class="row">
    <div class="col-xs-12">  
      <div class="col-xs-12 center text-center">
        <h3>DATOS DEL GESTOR</h3>
      </div>    
      <div class="col-xs-12">
        <table class="table">
          <thead>
            <tr>
              <th>NIMAi: </th>
              <th></th>
              <th>Numero de autorización</th>
              <th></th>
            </tr>
            <tr>
              <th>Nombre/Razón Social:</th>
              <th></th>
              <th>NIF:</th>
              <th></th>
            </tr>
            <tr>
              <th>Dirección:</th>
              <th></th>
              <th>Provincia:</th>
              <th></th>
            </tr>
            <tr>
              <th>Persona de contacto</th>
              <th></th>
              <th>CCAA</th>
              <th></th>
            </tr>
            <tr>
              <th>Teléfono:</th>
              <th></th>
              <th>Tipo de operador:</th>
              <th></th>
            </tr>
            <tr>
              <th>Correo electrónico:</th>
              <th></th>
              <th>País:</th>
              <th></th>
            </tr>
          </thead>
        </table>
      </div>  
    </div>
  </div>

  <div class="row">
    <div class="col-xs-12">  
      <div class="col-xs-12 center text-center">
        <h3>OPERADOR DE TRASLADO</h3>
      </div>    
      <div class="col-xs-12">
        <table class="table">
          <thead>
            <tr>
              <th>NIMAi: </th>
              <th></th>
              <th>Nº Registro de producción y gestión:</th>
              <th></th>
            </tr>
            <tr>
              <th>Nombre/Razón Social:</th>
              <th></th>
              <th>NIF:</th>
              <th></th>
            </tr>
            <tr>
              <th>Dirección:</th>
              <th></th>
              <th>Provincia:</th>
              <th></th>
            </tr>
            <tr>
              <th>Persona de contacto</th>
              <th></th>
              <th>CCAA</th>
              <th></th>
            </tr>
            <tr>
              <th>Teléfono:</th>
              <th></th>
              <th>Tipo de operador:</th>
              <th></th>
            </tr>
            <tr>
              <th>Correo electrónico:</th>
              <th></th>
              <th>País:</th>
              <th></th>
            </tr>
          </thead>
        </table>
      </div>  
    </div>
  </div>

  <div class="row">
    <div class="col-xs-12">  
      <div class="col-xs-12 center text-center">
        <h3>PRODUCTOR DEL RESIDUO</h3>
      </div>    
      <div class="col-xs-12">
        <table class="table">
          <thead>
            <tr>
              <th>NIMAi: </th>
              <th></th>
              <th>Nº Registro de producción y gestión:</th>
              <th></th>
            </tr>
            <tr>
              <th>Nombre/Razón Social:</th>
              <th></th>
              <th>NIF:</th>
              <th></th>
            </tr>
            <tr>
              <th>Dirección:</th>
              <th></th>
              <th>Provincia:</th>
              <th></th>
            </tr>
            <tr>
              <th>Persona de contacto</th>
              <th></th>
              <th>CCAA</th>
              <th></th>
            </tr>
            <tr>
              <th>Teléfono:</th>
              <th></th>
              <th>Correo electrónico:</th>
              <th></th>
            </tr>
          </thead>
        </table>
      </div>  
    </div>
  </div>

  <div class="row">
    <div class="col-xs-12">  
      <div class="col-xs-12 center text-center">
        <h3>ORIGEN DEL TRANSLADO</h3>
      </div>    
      <div class="col-xs-12">
        <table class="table">
          <thead>
            <tr>
              <th>NIMAi: </th>
              <th></th>
              <th>Denominación:</th>
              <th></th>
            </tr>
            <tr>
              <th>Dirección:</th>
              <th></th>
              <th>Municipio:</th>
              <th></th>
            </tr>
            <tr>
              <th>Provincia:</th>
              <th></th>
              <th>CCAA:</th>
              <th></th>
            </tr>
            <tr>
              <th>Nº de licencia:</th>
              <th></th>
              <th></th>
              <th></th>
            </tr>
          </thead>
        </table>
      </div>  
    </div>
  </div>

  <div class="row">
    <div class="col-xs-12">  
      <div class="col-xs-12 center text-center">
        <h3>TRANSPORTISTAS</h3>
      </div>    
      <div class="col-xs-12">
        <table class="table">
          <thead>
            <tr>
              <th>Nombre/Razón Social: </th>
              <th></th>
              <th>NIF:</th>
              <th></th>
            </tr>
            <tr>
              <th>Dirección:</th>
              <th></th>
              <th>Municipio:</th>
              <th></th>
            </tr>
            <tr>
              <th>Provincia:</th>
              <th></th>
              <th>CCAA:</th>
              <th></th>
            </tr>
            <tr>
              <th>País:</th>
              <th></th>
              <th>Teléfono:</th>
              <th></th>
            </tr>
            <tr>
              <th>Fax:</th>
              <th></th>
              <th>Correo Electrónico:</th>
              <th></th>
            </tr>
          </thead>
        </table>
      </div>  
    </div>
  </div>

  <div class="row">
    <div class="col-xs-12">  
      <div class="col-xs-12 center text-center">
        <h3>IDENTIFICACION DEL RESIDUO</h3>
      </div>    
      <div class="col-xs-12">
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>CODIGO LER: </th>
              <th>Descripción:</th>
              <th>Cantidad (Kg):</th>
              <th>Periodicidad</th>
              <th>Forma de entrega</th>
              <th>Tratamiento</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            for ($i=1; $i <=10 ; $i++) { ?>
              <tr>
                <td><?php echo $i ?></td>
                <td>Residuos de plástico excepto embalaje</td>
                <td></td>
                <td></td>
                <td></td>
                <td>R13</td>
              </tr>
              <?php 
            }
            ?>
          </tbody>
        </table>
      </div>  
    </div>
  </div>

  <div class="row">
    <div class="col-xs-12">
      <div class="col-xs-12">
        <h2>CONDICIONES DE ACEPTACION DE RESIUDOS</h2>
      </div>
      <div class="col-xs-12">
        <ul>
          <li>· Se verifica que cada carga de residuos posee su correspondiente Documento de Identificación (DI).</li>
          <li>· El operario encargado del control de entrada, deberá requerir al conductor del vehículo que retire el toldo o que abra las
          puertas de la caja o contenedor del vehículo para poder realizar una revisión adecuada.</li>
          <li>· Se deberán verificar todas las entradas, antes de autorizar la descarga del residuo en la instalación, El operario de control
            de entrada comprueba que el DI está debidamente cumplimentado y que el residuo se ajusta a la documentación presentada,
            comprobando que no existan residuos diferentes de los autorizados o aceptados y que no hay residuos peligrosos,
          rechazando el residuo cuando no se cumpla lo anterior.</li>
          <li>· Si la información contemplada en el DI no se corresponde con el residuo que se pretende depositar en la instalación, pero
            dicho residuo si es asimilable, para esa entrega en concreto, se procederá a anular el DI generado por el productor y se
            creará un nuevo DI en la propia instalación, para el residuo real que se va a depositar., amparándose en el contrato de
          tratamiento firmado por las partes</li>
          <li>Cuando los traslados sean de carácter multirresiduo y monotransporte la tasa aplicable a la totalidad de la carga de residuo
          será el precio más gravoso correspondientes a los residuos depositados.</li>
        </ul>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-xs-12">
      <div class="col-xs-12">
        <h2>OBLIGACIONES DE LAS PARTES EN RELACIÓN CON EL RECHAZO DE LOS RESIDUOS (en el caso de que los
        residuos no sean aceptados por el DESTINATARIO)</h2>
      </div>
      <div class="col-xs-12">
        <table class="table table-striped table-bordered">
          <tbody class="center text-center">
            <tr>
              <td colspan="2">
                duos no sean aceptados por el DESTINATARIO)
                Si el Centro Gestor (Destinatario) de los residuos no acepta alguno de los residuos deberá comunicarlo, en un plazo máximo
                de treinta días, al Operador de traslado, indicando en el documento de identificación las causas por las que no acepta el residuo. En
                este caso de conformidad con el Operador de traslado se podrá optar por las siguientes opciones:<br>
                1. El residuo será devuelto al origen indicando en el documento de identificación la devolución del residuo. El Operador remitirá
                a las comunidades de origen y destino el documento de identificación.<br>
                2. Enviar el residuo a otra instalación de tratamiento, donde se debe hacer un nuevo documento de identificación, siendo el
                titular el Operador del traslado. El operador remitirá a las comunidades de origen y destino la notificación del nuevo traslado
                y el documento de identificación.<br>
                Los costes derivados del este rechazo correrán por cuenta del operador del traslado con los precios fijados para tal circunstancia.
              </td>
            </tr>
            <tr>
              <td style="width: 50%;">EL GESTOR (Fecha, firma y sello)
                <br><br><br><br><br>
              </td>
              <td style="width: 50%;">OPERADOR DE TRASLADO (Fecha, firma y sello)
                <br><br><br><br><br>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- <table>

    <thead>
      <tr>
        <td>
          
          <div class="page-header-space"></div>
        </td>
      </tr>
    </thead>

    <tbody>
      <tr>
        <td>
          
          <div class="page">
            <br> -->
            <!-- <div class="col-md-6" style="text-align:left;"> 
              <address style="padding-left: 40px;">
                <strong>Nombre:</strong> <?php echo $nombre_cliente ?> <br>
                <strong>Telefono:</strong> <?php echo $telefono_cliente ?> <br>
                <strong>Documento:</strong> <?php echo $CODI_CLIENTE ?> <br>
              </address>
            </div>
            <div class="col-md-6" style="text-align:left;"> 
              <address style="padding-left: 40px;">
                <strong>Direccion:</strong> <?php echo $direccion_cliente ?> <br>
                <strong>Ciudad:</strong> <?php echo $ciudad_cliente ?> <br>
                <strong>Email:</strong> <?php echo $correo_cliente ?> 
              </address>
            </div> -->

            <!-- <strong>CIE-10 :<?php echo $cie1.''?> </strong>
            <br><strong><?php echo $cie10.''?> </strong>
            <br><strong><?php echo $cie10_2.''?> </strong>
            <br><strong><?php echo $cie10_3.''?> </strong>
            <br><strong><?php echo $cie10_4.''?> </strong>
            <hr> -->
            
            


<!-- 
         </div>
       </td>
     </tr>
   </tbody>

   <tfoot>
    <tr>
      <td>
        place holder for the fixed-position footer
        <div class="page-footer-space"></div>
      </td>
    </tr>
  </tfoot>

</table> -->

<div class="col-xs-4" align="center">
 <?php
 echo  $firmaImg;

 ?>
 <br>_______________________________________<br>
 <?php echo $empresaNombre?><br>
 CC. <?php echo $nit ?> <br>
 <?php echo $especialidad?>
</div>

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