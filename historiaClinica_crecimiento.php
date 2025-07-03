<?php
date_default_timezone_set('America/Bogota');
include("conexiones/conexion.php");
include("funciones/conexiones.php");
include("funciones/funciones.php");
$con=conectar();
$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));
 
$clienteId = $_GET['clienteId'];
 
$EstadoN0 = 0;
$EstadoN1 = 0;
$EstadoN2 = 0;
$EstadoN3 = 0;

            $queryList=mysqli_query($conn3,"SELECT * FROM  config where ID_Usuario = $ID");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {

              $empresaNombre      =$rowMotorizado['nombreF'];
              $LogoF               =$rowMotorizado['logoF'];

              if (strlen($LogoF) > 0) 
              {
                $Logo = '<img src="'.$Base.'/logos/'.$LogoF.'" height="10%" width="10%">'; 
              }
            

            }




   ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> <?php echo $empresaNombre ?>   </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>
   <!-- Main content -->
  <div class="row no-print">
        <div class="col-xs-12">  
         <a href="<?php echo $Base;?>Reportesinventario"   class="btn btn-default">  Regresar</a>
            <a href='javascript:window.print(); void 0;'   class="btn btn-default"><i class="fa fa-print"></i> Imprimir</a>
        </div>
      </div>
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <?php echo $Logo?> <?php echo $empresaNombre?>
            <small class="pull-right"> Fecha: <?php echo date("d-m-y")?></small>
          </h2>
        </div>

        <div class="col-xs-12">
          
              <?php 
        $queryListc=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id=$tipo");
        $nrowl=mysqli_num_rows($queryListc);
        while($rowc=mysqli_fetch_array($queryListc))
        {
            $nombre_cliente     =$rowc['nombre_cliente'];
            $CODI_CLIENTE       =$rowc['CODI_CLIENTE'];

        }     
            



$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));
 
         $queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id=$clienteId");

        $nrowl=mysqli_num_rows($queryList);

        while($rowMotorizado=mysqli_fetch_array($queryList))

        {
 $usuario_id=$rowMotorizado['usuario_id'];
            $nombre_cliente=$rowMotorizado['nombre_cliente'];
            $celular_cliente=$rowMotorizado['celular_cliente'];
            $ciudad_cliente=$rowMotorizado['ciudad_cliente'];
            $correo_cliente=$rowMotorizado['correo_cliente'];
            $CODI_CLIENTE=$rowMotorizado['CODI_CLIENTE'];
            $id_uso_servicio=$rowMotorizado['id_uso_servicio'];
            $tipo_cliente=$rowMotorizado['tipo_cliente'];
            $fechar=$rowMotorizado['fechar'];
            $fecha_actualizado=$rowMotorizado['fecha_actualizado'];
            $activo=$rowMotorizado['activo'];
            $genero=$rowMotorizado['genero'];
            $direccion_cliente=$rowMotorizado['direccion_cliente'];
            $telefono_cliente=$rowMotorizado['telefono_cliente'];
            $edad_cliente=$rowMotorizado['edad_cliente'];
            $profesion_cliente=$rowMotorizado['profesion_cliente'];
            $acompananteFamiliar=$rowMotorizado['acompananteFamiliar'];
            $telefono_acompanante=$rowMotorizado['telefono_acompanante'];
            $antecedentes=$rowMotorizado['antecedentes'];
            $fechaNacimiento=$rowMotorizado['fechaNacimiento'];
            $esDonante=$rowMotorizado['esDonante'];
            $entidadSalud=$rowMotorizado['entidadSalud'];

              


            $peso                     = $rowMotorizado['peso']; 
            $altura                   = $rowMotorizado['altura']; 
            $imc                          = $rowMotorizado['imc']; 
            $ComposicionCorporal      = $rowMotorizado['ComposicionCorporal']; 
            $fotoperfil      = $rowMotorizado['fotoperfil']; 



          }
 
        echo '<br>Paciente: '.$nombre_cliente;
 
        echo '<br>fecha Nacimiento: '.$fechaNacimiento;
        echo '<br>genero: '.$genero;
             
             
        ?> 

           
        </div>


        <!-- /.col -->
      </div>
      <!-- info row -->
      
      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped" border="1">
            <thead>
            <tr style="background: #A4A4A4">
              <th>Fecha</th>
              <th>Hora</th>
              <th>Meses</th>
              <th>Estatura </th>
              <th>Peso </th>
              <th>Perimetro Cefalico </th>
              <th>IMC </th>
              <th>Composicion Corporal </th>
             
            </tr>
            </thead>
            <tbody>
<?php



 

$queryListEF=mysqli_query($conn3,"SELECT * FROM  historiaFisica where cliente_id = $clienteId");
                  $nrowlEF=mysqli_num_rows($queryListEF);
                  while($row_recordsetEF=mysqli_fetch_array($queryListEF))
                  {
                      $fecha                 = $row_recordsetEF['fecha']; 
                      $hora                 = $row_recordsetEF['hora']; 
                      $meses                 = $row_recordsetEF['meses']; 
                      $estatura                 = $row_recordsetEF['estatura']; 
                      $peso                 = $row_recordsetEF['peso']; 
                      $perimetrocefalico                 = $row_recordsetEF['perimetrocefalico']; 
                      $imc                 = $row_recordsetEF['imc']; 
                      $Composicioncorporal                 = $row_recordsetEF['Composicioncorporal']; 
                      $historia_id                 = $row_recordsetEF['historia_id']; 
        
                      
                  
 
   
     
echo "<tr>
         
       
        <td>$fecha</td>
        <td>$hora </td>

        <td>$meses </td>
        <td>$estatura </td>
        <td>$peso </td>
        <td>$perimetrocefalico </td>
        <td>$imc </td>
        <td>$Composicioncorporal </td>
        
    </tr>";
         

 }

 ?>


            </tbody>
          </table>

            

      
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

   
      <!-- /.row -->

      <!-- this row will not appear when printing -->
     
    
    <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
