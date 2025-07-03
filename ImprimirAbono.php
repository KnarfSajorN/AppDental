<?php
date_default_timezone_set('America/Bogota');
include("funciones/conn3.php");
include("funciones/funciones.php");
include("funciones/funcionesUtilidades.php");

  $idOperacion = $_GET['idOperacion'];
  $idAbono = $_GET['idAbono'];

  $queryList=mysqli_query($conn3,"SELECT * FROM  sOperacionInv where  idOperacion = '$idOperacion' ");
  // $nrowl=mysqli_num_rows($queryList);
  while($rowMotorizado=mysqli_fetch_array($queryList))
  {
    $idOperacion      =$rowMotorizado['idOperacion'];

    $idCliente      =$rowMotorizado['idCliente'];
    $idEmpresa      =$rowMotorizado['idEmpresa'];



      $totalNeto=$rowMotorizado['totalNeto'];//valor total con descuento
      $montoPagado      =$rowMotorizado['montoPagado'];

  }

  $saldo = $totalNeto-$montoPagado;

  $nombre_paciente = funcionMaster($idCliente,'cliente_id','nombre_cliente','cliente');


  $queryList=mysqli_query($conn3,"SELECT * FROM  abono where  id = '$idAbono' ");

  // $nrowl=mysqli_num_rows($queryList);
  while($rowMotorizado=mysqli_fetch_array($queryList))
  {
    $id=$rowMotorizado['id'];
    $numero_operacion=$rowMotorizado['numero_operacion'];
    $numero_documento=$rowMotorizado['numero_documento'];
    $fecha=$rowMotorizado['fecha'];
    //$hora=$rowMotorizado['hora'];
    $pago=$rowMotorizado['pago'];
    $notas=$rowMotorizado['notas'];
    //$banco=$rowMotorizado['banco'];
    $tarjeta=$rowMotorizado['tarjeta'];
    $cuenta=$rowMotorizado['cuenta'];
    $cliente_id=$rowMotorizado['cliente_id'];
    $valor_abonado=$rowMotorizado['valor_abonado'];
    $fecha_abono=$rowMotorizado['fecha_abono'];

    $valor_nuevo_factura=$rowMotorizado['valor_nuevo_factura'];
    $firmaC=$rowMotorizado['Firma'];
    $Valor_Factura = funcionMaster($idOperacion,'idOperacion','totalNeto','sOperacionInv');
    $saldo = $Valor_Factura-$valor_nuevo_factura;
  }

  $queryList=mysqli_query($conn3,"SELECT * FROM  config where ID_Usuario =  $idEmpresa");
  // $nrowl=mysqli_num_rows($queryList);
  while($rowMotorizado=mysqli_fetch_array($queryList))
  {
    $moneda=$rowMotorizado['moneda'];
    $impuestoF=$rowMotorizado['impuestoF'];

                // Nuevos campos

    $nombreF      =$rowMotorizado['nombreF'];
    $header       = $rowMotorizado['header'];


    $LogoF               =$rowMotorizado['logoF'];
    $firma               =$rowMotorizado['firma'];

    if (strlen($LogoF) > 0) 
    {
      $Logo = '<img src="'.$Base.'logos/'.$LogoF.'" height="125" width="125">'; 
    }
    

    if (strlen($firma) > 0)  
    {
      $firmaImg = '<img src="'.$Base.'FirmasReg/'.$firma.'" height="100" width="150">'; 
    }

  }
  

  $queryList=mysqli_query($conn3,"SELECT * FROM  usuarios where ID = $usuario_id");
  // $nrowl=mysqli_num_rows($queryList);
  if ($queryList) {
    while($rowMotorizado=mysqli_fetch_array($queryList))
    {
      $empresaNombre      =$rowMotorizado['empresaNombre'];
      $direccion          =$rowMotorizado['direccion'];
      $especialidad =$rowMotorizado['especialidad'];
    } 
  }

  $queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id = $cliente_id");
  // $nrowl=mysqli_num_rows($queryList);
  while($rowMotorizado=mysqli_fetch_array($queryList))
  {
    $nombre_cliente             =$rowMotorizado['nombre_cliente'];
    $CODI_CLIENTE               =$rowMotorizado['CODI_CLIENTE'];
    $fechaNacimiento            =$rowMotorizado['fechaNacimiento'];
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
 
</head>

      <body onload="window.print();">
<div class="wrapper">
   <div class="col-md-12">
           
          <div class="box box-solid">
        
  <div class="row">

                <div class="col-md-12">
                
                  <table class="tg" style="undefined;table-layout: fixed; width: 100%">
                  <colgroup>
<col style="width:  100%">
<col style="width:  100%">
<col style="width:  100%">
<col style="width:  100%">
</colgroup>


 <tr align="center">
    <th class="Logo" rowspan="4" align="center"><?php echo $Logo ?> </th>
    <th class="titulo" colspan="4" rowspan="4" align="center"> 
      <div align="center"><?php echo $header  ?></div>

    <!--<h9 align="center"> <?php echo  $empresaNombre ?> <?php echo   $direccion?>  </h9></th>-->
  </tr>

  <tr>
    </tr>
  <tr>
    </tr>
  <tr>
    </tr> 
</table>

<!--<table class="tg" border=1 style="undefined;table-layout: fixed; width: 100%">
  <tr>
    <td  width="30%" class="nombrePaciente">Nombre del paciente: <?php echo $nombre_cliente ?></td>
    <td  width="20%" class="documento">Documento: <?php echo $CODI_CLIENTE ?></td>
    <td  width="30%" class="f.nacimiento">F.Nacimiento: <?php echo  $fechaNacimiento ?></td>
    <td width="20%"  class="edad">Edad:  <?php echo  calculaedad($fechaNacimiento) ?></td>
  </tr>
                
  </table> -->
 
</div>
 <hr>
        <div class="row">
        <h4 align="center"><b> RECIBO DE PAGO</b></h4>
                <div class="col-md-12">
          </div>
        </div>
   
      
      <div class="row">
<!--
<div class="col-xs-12 table-responsive">
      

<?php
 
                  
                    $resultado=mysqli_query($conn3,"SELECT * FROM  sDetalleOper where   id_usuario = $idEmpresa and  id_cliente = $idCliente and idOperacion = $idOperacion order by id");
                    //$resultado=mysqli_query("select * from patients where ID_Doctor = '$ID_DOSTOR'");
                    //$check=mysqli_num_rows($q);

                    while ($fila = mysqli_fetch_array($resultado, MYSQLI_NUM)) {
                  //  '.$fila[2].'                    <a href="" >  <i class="fa fa-pencil-square-o"></i>   </a>  
                  $Numero++;

                  echo '  
<div>'.$fila[4].'&nbsp&nbsp '.$fila[5].' </div>
                  
                  
              ';


 }





 ?>



</div> -->





        <div class="col-xs-12">
         Paciente: <?php echo $nombre_cliente ?> 
         <br><br>
        </div>  
      
        <?php
        
        $ArregloInformacion["Fecha del Abono"] = ($fecha_abono <> '') ? $fecha_abono : $fecha;
        $ArregloInformacion["Método de pago"] = funcionMaster($pago,'id','Nombre','Medios_Pago');
        $ArregloInformacion["Tarjeta de crédito/Banco"] = $tarjeta;
        $ArregloInformacion["Número de Cuenta"] = $cuenta;
        $ArregloInformacion["Se recibió la cantidad de"] = number_format($valor_abonado)." ".$moneda;
        $ArregloInformacion["Saldo del tratamiento"] = number_format($saldo)." ".$moneda;
        $ArregloInformacion["Notas"] = $notas;

        echo "<div class='row col-xs-12'>";
        foreach ($ArregloInformacion as $key => $value) {
          if($value!=""){
            if($key!="Notas"){
              echo "<div class='col-xs-6'> <b>$key</b> : $value </div>";
            }else{
              echo "<div class='col-xs-12'> <b>$key</b><br> $value </div>";
            }
            
          }
        }
        echo "</div>";
        ?>

<hr>
        </div>
        <!-- /.col -->
      </div>
  <br>     <br>  <!-- /.row -->

<div class="col-xs-6" align="center">
  <?php //echo $Fecha ?> 
  </div>

<div class="col-xs-6" align="center">
  
  </div>


  <div class="col-xs-6">

  <strong>Firma del Paciente</strong>  <br>
        <div class="col-xs-12">
      <?php if (strlen($firmaC)>10) 
{
    echo "<img src='$firmaC' height='100' width='200'>";

} else { echo "<br><br><br>";}


            ?> <br>
   <?php echo $nombre_cliente;?>   <br>
    C.C. <?php echo $CODI_CLIENTE;?>
          
        </div>
      </div>

  <div class="col-xs-6" align="center">
  <?php
  echo  $firmaImg;

  ?>
  <br>_______________________________________<br>
  Dr.<?php echo $nombreF?><br>
  <?php echo $especialidad?><br>
 
  <b>* Documento firmado digitalmente *</b>
  </div>


  

      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">  
          <!--<a href="imprimirRecipe.php?historiaClinica1=<?php echo $historiaClinica1?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Imprimir</a>-->
         
  

        </div>
      </div>
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>






