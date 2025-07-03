<?php

ini_set('display_errors', 'off');
  include 'funciones/funciones.php';
  include 'funciones/funcionesUtilidades.php';

//print_r($_POST);
if (isset($_POST['editar']) && $_POST['editar']==1) {
  //print_r($_POST);

            $nombre       =   $_POST['nombre'];
            $precio       =   $_POST['precio'];
            $codigo       =   $_POST['codigo'];
            $idDemo       =   $_POST['idDemo'];
            $fecha        =   date("Y-m-d");
            $hora         =   date("H:i:s");

        $queryList=mysqli_query($conn3,"
           UPDATE examenes_22
            SET
            fecha             =   '$fecha',
            hora              =   '$hora',
            codigo             =   '$codigo',
            nombre             =   '$nombre',
            precio             =   '$precio'

          WHERE 

          id='$idDemo'   ");


}



if (isset($_POST['registrar']) && $_POST['registrar']==1) {
            $nombre   =     $_POST['nombre'];
            $precio   =     $_POST['precio'];
            $codigo   =     $_POST['codigo'];
            $fecha    = date("Y-m-d");
            $hora     = date("H:i:s");
  
    

    

        $queryList=mysqli_query($conn3,"INSERT INTO examenes_22 (fecha, hora, codigo, nombre, precio) VALUES  ('$fecha','$hora','$codigo','$nombre','$precio' )");

}









if (isset($_POST['detalle']) && $_POST['detalle']==1) {

            $idExmane   =     $_POST['idExmane'];
            $densidad   =     $_POST['densidad'];
            $valor1   =     $_POST['valor1'];
            $valor2   =     $_POST['valor2'];
            $fecha    = date("Y-m-d");
            $hora     = date("H:i:s");
  $queryList=mysqli_query($conn3,"INSERT INTO detalleExamenes_22 (fecha, hora, idExamen, densidad, valorReferencia1, valorReferencia2) 
    VALUES  ('$fecha','$hora','$idExmane','$densidad','$valor1' ,'$valor2' )");



    }



            echo "<script type='text/javascript'>
              window.location='demostracion.php';
                   </script>";  

?>