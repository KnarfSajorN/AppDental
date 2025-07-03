<?php
date_default_timezone_set('America/Bogota');
include("conexiones/conexion.php");
include("funciones/conexiones.php");
include("funciones/funciones.php");
  
$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

 

$fecha 		= $_POST['fecha'];
$Hora 		= $_POST['Hora'];
$usuario_id = $_POST['usuario_id'];
$idconsentimiento     = $_POST['idconsentimiento'];
 
 
 
  $queryList=mysqli_query($conn3,"SELECT count(id) as noLaboral FROM  noLaborales where fechaNoLaboral = '$fecha'  and (idDoctor = '$doctor' or idDoctor = '0')");
      $nrowl=mysqli_num_rows($queryList);
      while($rowMotorizado=mysqli_fetch_array($queryList))
      {
      $noLaboral      =$rowMotorizado['noLaboral'];
      }


/*
echo '  <div  class="form-group col-md-12" align="center"><h2>CONSENTIMIENTO INFORMADO  TELEMEDICINA </h2></div>

    <form class="form-horizontal" action="guardarConsentimiento.php" method="POST" enctype="multipart/form-data">
     <div class="classol-md-11">

 

                          
                      <textarea id="editor1" name="consentimiento" ></textarea>
                      </div>
                      ';
*/

                      echo '---------sd as5d4sadsa sad ';

 
 
?>