<?php
date_default_timezone_set('America/Bogota');
//include("conexiones/conexion.php");
//include("funciones/conexiones.php");
include("funciones/funciones.php");
include 'funciones/conn3.php';






            $historiaClinica1 = $_GET['historiaClinica1'];


            $queryList=mysqli_query($conn3,"SELECT * FROM historiaConsentimientos where id = $historiaClinica1");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {

              $Consentimiento             =$rowMotorizado['consentimiento'];
             $Firma           =$rowMotorizado['firma'];
                $usuario_id=$rowMotorizado['usuario_id'];
 $cliente_id=$rowMotorizado['cliente_id']; 
            }



            $queryList=mysqli_query($conn3,"SELECT * FROM  config where ID_Usuario = $usuario_id");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {
                $moneda=$rowMotorizado['moneda'];
                $impuestoF=$rowMotorizado['impuestoF'];

                // Nuevos campos

                $nombreF      =$rowMotorizado['nombreF'];
                $telefonoF    =$rowMotorizado['telefonoF'];
                $direccionF   =$rowMotorizado['direccionF'];
                $emailF       = $rowMotorizado['emailF'];
                $ciudadPaisF  =$rowMotorizado['ciudadPaisF'];
                $licenciaF    =$rowMotorizado['licenciaF'];
                $pieF         =$rowMotorizado['pieF'];
                $header       = $rowMotorizado['header'];

                $LogoF               =$rowMotorizado['logoF'];
                $firma               =$rowMotorizado['firma'];

              if (strlen($LogoF) > 0) 
              {
                 $Logo = '<img src="'.$Base.'/logos/'.$LogoF.'" height="100" width="100%">';
              }
              

              if (strlen($firma) > 0)  
              {
                $firmaImg = '<img src="'.$Base.'/FirmasReg/'.$firma.'" height="150" width="150">'; 
              }


            }
 

            $queryList=mysqli_query($conn3,"SELECT * FROM  usuarios where ID = $usuario_id");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {

              $empresaNombre      =$rowMotorizado['empresaNombre'];
              $pais               =$rowMotorizado['pais'];

              $ciudad             =$rowMotorizado['ciudad'];
              $direccion          =$rowMotorizado['direccion'];
              $telefono           =$rowMotorizado['telefono'];

              $nit                =$rowMotorizado['nit'];

            }


            $queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id = $cliente_id");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {

              $nombre_cliente             =$rowMotorizado['nombre_cliente'];
              $CODI_CLIENTE               =$rowMotorizado['CODI_CLIENTE'];
              $edad_cliente               =$rowMotorizado['edad_cliente'];
           
                
            }


 
   ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Ver Consentimiento</title>


<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

<!-- estilos css-->
<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
<!-- estilos css-->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script src="https://sievensoftcolombia.com/js/jquery-3.2.1.slim.min.js" ></script>
<script src="https://sievensoftcolombia.com/js/popper.min.js" ></script>
<script src="https://sievensoftcolombia.com/js/bootstrap.js"></script>
<link href="https://sievensoftcolombia.com/font/icon.css"  rel="stylesheet">
</head>

<body onload="window.print();">
<div class="wrapper">
  <!-- Main content -->

    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        
        <div class="col-xs-3">
          
      <div align="right"> 
          <?php echo $Logo ?>  
      </div>
  </div>
            
          
        <div class="col-xs-9">
          <h4> <br><br><br><br>
            <?php echo 
            $nombreF .'<br>'.
            $nit.'<br>'.
            $direccion.'<br>'.
            $header  
            ?> 
            
          </h4>
        </div>
        <!-- /.col -->
      </div>

      
      <div class="row">
        <div class="col-xs-12">



       <hr>
 <div align="center" class="col-xs-12"> <strong> Consentimiento Informado  </strong> 
<br>
<hr>
<br>

 </div>
 <?php echo 
            $Consentimiento.'<br>'  

            ?> 
            <?php
         //  echo "SELECT * FROM  cliente where cliente_id = $cliente_id";

            ?>
   
      
    
  
   
  
<hr>
<div class="row">
        <div class="col-xs-6">

  <strong>Firma del Paciente (o persona autorizada para firmar para el Paciente):</strong>  <br>
        <div class="col-xs-12">
      <?php if (strlen($Firma)>10) 
{
    echo "<img src='$Firma' height='100' width='200'>";
}




            ?> 

<?php  $img=mysqli_query($conn3,"SELECT * FROM archivos where  cliente_id = '$cliente_id' and idconse='$historiaClinica1'");    

                        while ($ReImg=mysqli_fetch_assoc($img)) { ?>
                            
                <div class="col-md-3" >
                  <img style="border: 1px solid #3c8dbc;border-radius: 5px; padding-left: 10px;padding-right: 11px;box-shadow: 0px 0px 15px -1px rgb(60, 141, 188);"  width="150" height="130" src="archivos/<?php echo $ReImg['codigo']; ?>" alt="" >
                </div>
           



              <?php }  ?>
          <br>
            Nombre: <?php echo $nombre_cliente;?>   <br>
    C.C. <?php echo $CODI_CLIENTE;?>
          
        </div>
      </div>
       <div class="col-xs-6">

  <strong>Firma y sello del Medico</strong>  <br>
        <div class="col-xs-12">
      <?php 
     
    echo  $firmaImg;


            ?> 
            <br>
            Nombre: <?php echo $nombreF ;?>   <br>
   
          
        </div>
      </div>
 
<hr>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
 <!-- /.row -->




      <!-- this row will not appear when printing -->
     <!-- <div class="row no-print">
        <div class="col-xs-12">
      
          <a href="imprimirConsentimiento1.php?usuario_id=<?php echo $usuario_id?>&cliente_id=<?php echo $cliente_id?>&micropigmentacion=<?php echo $micropigmentacion?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Imprimir</a>
          
        </div>
      </div>  -->
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>






