<?php
include 'header.php';

$clienteId = $_GET['clienteId'];
$Ausente = 4;

include 'menu.php'?>
 
 
 

<?php

  
 
    $query_ap=mysqli_query($conn3,"SELECT * FROM odontogramaMaster WHERE idCliente = $clienteId");
    // // $nrowl=mysqli_num_rows($query_ap);
    if ($query_ap) {
        while($row_alp=mysqli_fetch_array($query_ap))
        {
          $o18 = explode(",", $row_alp['o18']);
          $o17 = explode(",", $row_alp['o17']);
          $o16 = explode(",", $row_alp['o16']);
          $o15 = explode(",", $row_alp['o15']);
          $o14 = explode(",", $row_alp['o14']);
          $o13 = explode(",", $row_alp['o13']);
          $o12 = explode(",", $row_alp['o12']);
          $o11 = explode(",", $row_alp['o11']);
          
          $o21 = explode(",", $row_alp['o21']);
          $o22 = explode(",", $row_alp['o22']);
          $o23 = explode(",", $row_alp['o23']);
          $o24 = explode(",", $row_alp['o24']);
          $o25 = explode(",", $row_alp['o25']);
          $o26 = explode(",", $row_alp['o26']);
          $o27 = explode(",", $row_alp['o27']);
          $o28 = explode(",", $row_alp['o28']);
          
          $o55 = explode(",", $row_alp['o55']);
          $o54 = explode(",", $row_alp['o54']);
          $o53 = explode(",", $row_alp['o53']);
          $o52 = explode(",", $row_alp['o52']);
          $o51 = explode(",", $row_alp['o51']);
         
          $o65 = explode(",", $row_alp['o65']);
          $o64 = explode(",", $row_alp['o64']);
          $o63 = explode(",", $row_alp['o63']);
          $o62 = explode(",", $row_alp['o62']);
          $o61 = explode(",", $row_alp['o61']);

          $o48 = explode(",", $row_alp['o48']);
          $o47 = explode(",", $row_alp['o47']);
          $o46 = explode(",", $row_alp['o46']);
          $o45 = explode(",", $row_alp['o45']);
          $o44 = explode(",", $row_alp['o44']);
          $o43 = explode(",", $row_alp['o43']);
          $o42 = explode(",", $row_alp['o42']);
          $o41 = explode(",", $row_alp['o41']);
          
          $o31 = explode(",", $row_alp['o31']);
          $o32 = explode(",", $row_alp['o32']);
          $o33 = explode(",", $row_alp['o33']);
          $o34 = explode(",", $row_alp['o34']);
          $o35 = explode(",", $row_alp['o35']);
          $o36 = explode(",", $row_alp['o36']);
          $o37 = explode(",", $row_alp['o37']);
          $o38 = explode(",", $row_alp['o38']);
          
          $o85 = explode(",", $row_alp['o85']);
          $o84 = explode(",", $row_alp['o84']);
          $o83 = explode(",", $row_alp['o83']);
          $o82 = explode(",", $row_alp['o82']);
          $o81 = explode(",", $row_alp['o81']);
         
          $o75 = explode(",", $row_alp['o75']);
          $o74 = explode(",", $row_alp['o74']);
          $o73 = explode(",", $row_alp['o73']);
          $o72 = explode(",", $row_alp['o72']);
          $o71 = explode(",", $row_alp['o71']);
           
        }    
    }
  
if ($o18[0] == $Ausente) {$o18P='4,0,0,0,0,0';}else{$o18P='0,0,0,0,0,0';}
if ($o17[0] == $Ausente) {$o17P='4,0,0,0,0,0';}else{$o17P='0,0,0,0,0,0';}
if ($o16[0] == $Ausente) {$o16P='4,0,0,0,0,0';}else{$o16P='0,0,0,0,0,0';}
if ($o15[0] == $Ausente) {$o15P='4,0,0,0,0,0';}else{$o15P='0,0,0,0,0,0';}
if ($o14[0] == $Ausente) {$o14P='4,0,0,0,0,0';}else{$o14P='0,0,0,0,0,0';}
if ($o13[0] == $Ausente) {$o13P='4,0,0,0,0,0';}else{$o13P='0,0,0,0,0,0';}
if ($o12[0] == $Ausente) {$o12P='4,0,0,0,0,0';}else{$o12P='0,0,0,0,0,0';}
if ($o11[0] == $Ausente) {$o11P='4,0,0,0,0,0';}else{$o11P='0,0,0,0,0,0';}

if ($o28[0] == $Ausente) {$o28P='4,0,0,0,0,0';}else{$o28P='0,0,0,0,0,0';}
if ($o27[0] == $Ausente) {$o27P='4,0,0,0,0,0';}else{$o27P='0,0,0,0,0,0';}
if ($o26[0] == $Ausente) {$o26P='4,0,0,0,0,0';}else{$o26P='0,0,0,0,0,0';}
if ($o25[0] == $Ausente) {$o25P='4,0,0,0,0,0';}else{$o25P='0,0,0,0,0,0';}
if ($o24[0] == $Ausente) {$o24P='4,0,0,0,0,0';}else{$o24P='0,0,0,0,0,0';}
if ($o23[0] == $Ausente) {$o23P='4,0,0,0,0,0';}else{$o23P='0,0,0,0,0,0';}
if ($o22[0] == $Ausente) {$o22P='4,0,0,0,0,0';}else{$o22P='0,0,0,0,0,0';}
if ($o21[0] == $Ausente) {$o21P='4,0,0,0,0,0';}else{$o21P='0,0,0,0,0,0';}
 

if ($o48[0] == $Ausente) {$o48P='4,0,0,0,0,0';}else{$o48P='0,0,0,0,0,0';}
if ($o47[0] == $Ausente) {$o47P='4,0,0,0,0,0';}else{$o47P='0,0,0,0,0,0';}
if ($o46[0] == $Ausente) {$o46P='4,0,0,0,0,0';}else{$o46P='0,0,0,0,0,0';}
if ($o45[0] == $Ausente) {$o45P='4,0,0,0,0,0';}else{$o45P='0,0,0,0,0,0';}
if ($o44[0] == $Ausente) {$o44P='4,0,0,0,0,0';}else{$o44P='0,0,0,0,0,0';}
if ($o43[0] == $Ausente) {$o43P='4,0,0,0,0,0';}else{$o43P='0,0,0,0,0,0';}
if ($o42[0] == $Ausente) {$o42P='4,0,0,0,0,0';}else{$o42P='0,0,0,0,0,0';}
if ($o41[0] == $Ausente) {$o41P='4,0,0,0,0,0';}else{$o41P='0,0,0,0,0,0';}
 

if ($o38[0] == $Ausente) {$o38P='4,0,0,0,0,0';}else{$o38P='0,0,0,0,0,0';}
if ($o37[0] == $Ausente) {$o37P='4,0,0,0,0,0';}else{$o37P='0,0,0,0,0,0';}
if ($o36[0] == $Ausente) {$o36P='4,0,0,0,0,0';}else{$o36P='0,0,0,0,0,0';}
if ($o35[0] == $Ausente) {$o35P='4,0,0,0,0,0';}else{$o35P='0,0,0,0,0,0';}
if ($o34[0] == $Ausente) {$o34P='4,0,0,0,0,0';}else{$o34P='0,0,0,0,0,0';}
if ($o33[0] == $Ausente) {$o33P='4,0,0,0,0,0';}else{$o33P='0,0,0,0,0,0';}
if ($o32[0] == $Ausente) {$o32P='4,0,0,0,0,0';}else{$o32P='0,0,0,0,0,0';}
if ($o31[0] == $Ausente) {$o31P='4,0,0,0,0,0';}else{$o31P='0,0,0,0,0,0';}
 
 
if ($o55[0] == $Ausente) {$o55P='4,0,0,0,0,0';}else{$o55P='0,0,0,0,0,0';}
if ($o54[0] == $Ausente) {$o54P='4,0,0,0,0,0';}else{$o54P='0,0,0,0,0,0';}
if ($o53[0] == $Ausente) {$o53P='4,0,0,0,0,0';}else{$o53P='0,0,0,0,0,0';}
if ($o52[0] == $Ausente) {$o52P='4,0,0,0,0,0';}else{$o52P='0,0,0,0,0,0';}
if ($o51[0] == $Ausente) {$o51P='4,0,0,0,0,0';}else{$o51P='0,0,0,0,0,0';}

 
if ($o65[0] == $Ausente) {$o65P='4,0,0,0,0,0';}else{$o65P='0,0,0,0,0,0';}
if ($o64[0] == $Ausente) {$o64P='4,0,0,0,0,0';}else{$o64P='0,0,0,0,0,0';}
if ($o63[0] == $Ausente) {$o63P='4,0,0,0,0,0';}else{$o63P='0,0,0,0,0,0';}
if ($o62[0] == $Ausente) {$o62P='4,0,0,0,0,0';}else{$o62P='0,0,0,0,0,0';}
if ($o61[0] == $Ausente) {$o61P='4,0,0,0,0,0';}else{$o61P='0,0,0,0,0,0';}

 
if ($o75[0] == $Ausente) {$o75P='4,0,0,0,0,0';}else{$o75P='0,0,0,0,0,0';}
if ($o74[0] == $Ausente) {$o74P='4,0,0,0,0,0';}else{$o74P='0,0,0,0,0,0';}
if ($o73[0] == $Ausente) {$o73P='4,0,0,0,0,0';}else{$o73P='0,0,0,0,0,0';}
if ($o72[0] == $Ausente) {$o72P='4,0,0,0,0,0';}else{$o72P='0,0,0,0,0,0';}
if ($o71[0] == $Ausente) {$o71P='4,0,0,0,0,0';}else{$o71P='0,0,0,0,0,0';}

 
if ($o85[0] == $Ausente) {$o85P='4,0,0,0,0,0';}else{$o85P='0,0,0,0,0,0';}
if ($o84[0] == $Ausente) {$o84P='4,0,0,0,0,0';}else{$o84P='0,0,0,0,0,0';}
if ($o83[0] == $Ausente) {$o83P='4,0,0,0,0,0';}else{$o83P='0,0,0,0,0,0';}
if ($o82[0] == $Ausente) {$o82P='4,0,0,0,0,0';}else{$o82P='0,0,0,0,0,0';}
if ($o81[0] == $Ausente) {$o81P='4,0,0,0,0,0';}else{$o81P='0,0,0,0,0,0';}




$fecha = date("Y-m-d");
$hora = date("h:i:s");
$idUsuario = $_SESSION['ID'];

mysqli_query($conn3,"INSERT INTO odontogramaMasterPlaca (fecha, hora, idCliente, idUsuario, o18, o17, o16, o15, o14, o13, o12, o11, o21, o22, o23, o24, o25, o26, o27, o28, o55, o54, o53, o52, o51, o61, o62, o63, o64, o65, o48, o47, o46, o45, o44, o43, o42, o41, o31, o32, o33, o34, o35, o36, o37, o38, o85, o84, o83, o82, o81, o71, o72, o73, o74, o75) VALUES 
('$fecha', '$hora', '$clienteId', '$idUsuario', '$o18P', '$o17P', '$o16P', '$o15P', '$o14P', '$o13P', '$o12P', '$o11P', '$o21P', '$o22P', '$o23P', '$o24P', '$o25P', '$o26P', '$o27P', '$o28P', '$o55P', '$o54P', '$o53P', '$o52P', '$o51P', '$o61P', '$o62P', '$o63P', '$o64P', '$o65P', '$o48P', '$o47P', '$o46P', '$o45P', '$o44P', '$o43P', '$o42P', '$o41P', '$o31P', '$o32P', '$o33P', '$o34P', '$o35P', '$o36P', '$o37P', '$o38P', '$o85P', '$o84P', '$o83P', '$o82P', '$o81P', '$o71P', '$o72P', '$o73P', '$o74P', '$o75P')");




    $query_placa=mysqli_query($conn3,"SELECT max(id) as idPlaca FROM odontogramaMasterPlaca WHERE idCliente = $clienteId");
    // $nrowl=mysqli_num_rows($query_placa);
    if ($query_placa) {
      while($rowPlaca=mysqli_fetch_array($query_placa))
    	{
          $idPlaca = $rowPlaca['idPlaca'];
      }

    }
    
echo "<script language='Javascript'> window.location='OD_OdontogramaPlaca?id=$idPlaca&clienteId=$clienteId';</script>";


?>
 
