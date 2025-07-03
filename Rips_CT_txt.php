<?php

header('Content-Type: application/vnd.ms-excel; charset=UTF-8');
header('Content-Disposition: attachment; filename=RipsCT.txt');
include 'funciones/conn3.php';
include 'funciones/funciones.php';


$desde = $_POST['desde'];
// $hasta = $_POST['hasta'];
$tipoUsuario = $_POST['tipoUsuario']; 


if ($tipoUsuario == 0)
 { $entidadSalud ='SDS001';
$entidadSaludN= 'PARTICULAR';

} else {
$entidadSalud= funcionMaster($tipoUsuario,'id', 'Codigo' ,'Rips_Entidades');
$entidadSaludN= funcionMaster($tipoUsuario,'id', 'Nombre' ,'Rips_Entidades');
}


 
$doctor = $_POST['doctor']; 
$paciente = $_POST['paciente'];
   

 $fechaRemision = $_POST['fechaRemision'];

 $convenio = $_POST['convenio'];
 

  if ($convenio > 0) {
  $where = 'and  convenio= '. $convenio. ' ';
} else {
  $where = '';
}





if($doctor=="0")
        {
            $queryLista=mysqli_query($conn3, "SELECT * FROM    informacion_rips2 where fechaRemision like '$fechaRemision' and paciente='$paciente' and codigoEntidad= '$entidadSalud' $where");
        }
        else
        {
            $queryLista=mysqli_query($conn3,"SELECT * FROM    informacion_rips2  where fechaRemision like '$fechaRemision' and  usuario_id = '$doctor' and paciente='$paciente' and codigoEntidad= '$entidadSalud' $where");

        }


        $nrow=mysqli_num_rows($queryLista);
        while($rowLista=mysqli_fetch_array($queryLista))
        {
            $codigoPrestador=$rowLista['codigoPrestador'];

            $fechaRemision =$rowLista['fechaRemision'];
            $codArchivo =$rowLista['codArchivo'];
            $totalRegistros=$rowLista['totalRegistros'];
             $date = date_create("$fechaRemision");
       $fechaRemision1 = date_format($date, "d/m/Y");
           
 
   echo "$codigoPrestador,$fechaRemision1,$codArchivo,$totalRegistros"."\n";
      

}




 
?>