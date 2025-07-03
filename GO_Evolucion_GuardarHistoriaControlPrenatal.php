<?php
   //include 'header.php';
   include 'funciones/funciones.php';
   include 'funciones/funcionesUtilidades.php';

    date_default_timezone_set('America/Bogota');

        //entrevista inicial
        $fecha_terminacion        = ($_POST['fecha_terminacion']);
        $semana_emabarazo        = ($_POST['semana_emabarazo']);
        $presion_arterial        = ($_POST['presion_arterial']);
        $pulso        = ($_POST['pulso']);
        $tempratura        = ($_POST['tempratura']);
        $peso        = ($_POST['peso']);
        $altura        = ($_POST['altura']);
        $frecuencia        = ($_POST['frecuencia']);
        $posicion        = ($_POST['posicion']);
        $presentacion        = ($_POST['presentacion']);
        $movimientos        = ($_POST['movimientos']);
        $edema        = ($_POST['edema']);
        
       
        $fechar                = date("Y-m-d");
        $Afechar               = date("Y-m-d H:i:s");
        $hora                  = date("H:i:s");
       
        $registro              = $_POST['registro'];
        $ID                    = $_POST['ID'];
        $clienteId             = $_POST['clienteId'];
        $historiaClinica           = $_POST['historiaClinica'];

        if($fecha_terminacion==""){
            $fecha_terminacion="0000-00-00";
        }

        $queryList=mysqli_query($conn3,"SELECT * FROM  config where ID_Usuario=$ID");
        $nrowl=mysqli_num_rows($queryList);
        while($rowMotorizado=mysqli_fetch_array($queryList))
        {
            $whatsapp = $rowMotorizado['whatsapp'];
        }


        $queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id=$clienteId");
        $nrowl=mysqli_num_rows($queryList);
        while($rowMotorizado=mysqli_fetch_array($queryList))
        {
            $celular_cliente = $rowMotorizado['celular_cliente'];
        }




      
 

        // *********************************************************    TABLA  historiaClinica1 *********************************************************
        // *********************************************************    TABLA  historiaClinica1 *********************************************************


        mysqli_query($conn3,"INSERT INTO Evoluciones_Historia_Control_Prenatal (cliente_id, usuario_id, Fecha, Hora,  motivoConsulta, id_historiaClinica, semana_emabarazo, presion_arterial, pulso, tempratura, peso, altura, frecuencia, posicion, presentacion, movimientos, edema) VALUES  ('$clienteId', '$ID', '$fecha_terminacion', '$hora',  '$motivoConsulta','$historiaClinica', '$semana_emabarazo', '$presion_arterial', '$pulso', '$tempratura', '$peso', '$altura', '$frecuencia', '$posicion', '$presentacion', '$movimientos', '$edema');") or die(mysqli_error($conn3));

/*echo "INSERT INTO evoluciones (cliente_id, usuario_id, Fecha, Hora,  motivoConsulta, id_historiaClinica, semana_emabarazo, presion_arterial, pulso, tempratura, peso, altura, frecuencia, posicion, presentacion, movimientos, edema) VALUES  ('$clienteId', '$ID', '$fecha_terminacion', '$hora',  '$motivoConsulta','$historiaClinica', '$semana_emabarazo', '$presion_arterial', '$pulso', '$tempratura', '$peso', '$altura', '$frecuencia', '$posicion', '$presentacion', '$movimientos', '$edema');";*/

/*
              $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as historiaClinica1 from evoluciones where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $historiaClinica1=$rowhc['historiaClinica1'];
              }   
*/
$historiaClinica1 = mysqli_insert_id($conn3);

echo "<script language='Javascript'> window.location='GO_Evolucion_Finalizado.php?historiaClinica1=$historiaClinica1';</script>";




?>