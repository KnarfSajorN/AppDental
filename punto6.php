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
      <div class="col-xs-12">
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th colspan="3">LOGO</th>
            </tr>
            <tr>
              <td>EXCAVACIONES JOSAL S.L. <br>
                C.I.F.:B-73121733 <br>
                PLAZA CAMACHOS,Nº2, PL 1ª P.2 <hr>
                MURCIA  
              </td>
              <td>GESTOR DE RESIDUOS <br>
                NO PELIGROSOS N <br>
                GOR-20180003  
              </td>
              <td>ALBARAN Nº.: V01-2021 <hr>
              FECHA: 24/03/2021</td>
            </tr>
            <tr>
              <th colspan="3" class="bg-green">DATOS DEL PRODUCTOR DE LOS RESIDUOS</th>
            </tr>
            <tr>
              <th>RAZON SOCIAL</th>
              <TD colspan="2">
                SERVITIR 2000, S.L.U <br>
                C/CALASPARRA ESQUINA CTRA MADRID <br>
                POLIGONO LA POLVORISTA MOLINA DE SEGURA (MURCIA) <br>
                B-73550691 <br>
              </TD>
            </tr>
            <tr>
              <th>NOMBRE DE LA OBRA</th>
              <TD colspan="2">
                EDIFICIO SERVITIR
              </TD>
            </tr>
            <tr>
              <th>Nº LICENCIA DE Obra:</th>
              <TD colspan="2">
                001624/2019-0701
              </TD>
            </tr>
            <tr>
              <th colspan="3" class="bg-green">DATOS DE LOS RESIDUOS INERTES ENTREGADOS</th>
            </tr>
            <tr>
              <th colspan="1" class="bg-green">DESCIPCION</th>
              <th colspan="1" class="bg-green">CODIGO LER</th>
              <th colspan="1" class="bg-green">M3</th>
            </tr>
            <?php 
            for ($i=1; $i <=7 ; $i++) { ?>
              <tr>
                <td>HORMIGON</td>
                <td>170101</td>
                <td>11544,00</td>
              </tr>
              <?php 
            }
            ?>
            <tr>
              <th colspan="3" class="bg-green">.</th>
            </tr>
            <tr>
              <td colspan="3">
                D.PEDRO AUPI ROMAN, en  nombre y  representación de  EXCAVACIONES JOSAL. S.L. <br>
                empresa gestora de residuos no peligrosos CERTIFICA que los residuos entregados serán sometidos  <br>
                a operaciones de Valorización mediante planta móvil de clasificación de residuos de la  <br>
                construcción y demolición <br>
              </td>
            </tr>
            <tr class="text text-center">
              <td colspan="2">El Gestor Autorizado <br><br><br> </td>
              <td colspan="1">El productor <br><br><br> </td>
            </tr>
          </thead>
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