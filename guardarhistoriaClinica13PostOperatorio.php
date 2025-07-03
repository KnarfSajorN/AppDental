<?php
  include 'funciones/funciones.php';
  include 'funciones/funcionesUtilidades.php';

//********************************************************************//
//Insercion en la tabla de la base de Datos historiaClinica13PostOperatorio
//********************************************************************//
//print_r($_POST);
 
            

        $usuarioId = $_POST['ID']; 
        $clienteId = $_POST['clienteId']; 
        $fechar = date("Y-m-d");
        $hora = date("H:i:s");

 $conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

          $operatorio=$_POST['operatorio'];


//Insercion en la tabla historiaClinica9_Quirurgica
                $queryList=mysqli_query($conn3,"INSERT INTO  historiaClinica13_PosOperatorio 
                    (cliente_id, usuario_id, Fecha, Hora,   PosOperatorio ) VALUES
                   ('$clienteId','$usuarioId', '$fechar','$hora', '$operatorio')");

//Busqueda del id mayor en la tabla historiaClinica13PostOperatorio
              $buscando=mysqli_query($conn3,"SELECT MAX(ID) as max from  historiaClinica13_PosOperatorio");
              $nrowl=mysqli_fetch_assoc($buscando);
              $maximos=$nrowl['max'];
              



                  echo "<script type='text/javascript'>
                        window.location='FinalizarPosOperatorio.php?historiaClinica1=$maximos';
                     </script>";

?>