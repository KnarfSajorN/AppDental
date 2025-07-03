<?php
   //include 'header.php';
   include 'funciones/funciones.php';
   include 'funciones/funcionesUtilidades.php';
 //  include 'menu.php'; 



    date_default_timezone_set('America/Bogota');

  $conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

  $Afecha                = $_POST['fecha'];
        $Ahora                 = $_POST['hora'];
        $motivo                = reem($_POST['motivo']);

        $doctor                     = $_POST['doctor'];

        $NOMBRE_USUARIO        = reem($_POST['NOMBRE_USUARIO']);
        $email                 = $_POST['email'];        
        $nombre                = reem($_POST['nombre']);        
        $telefono              = $_POST['telefono'];

        $activo                = 1;
        $fechar                = date("Y-m-d");
        $Afechar               = date("Y-m-d H:i:s");
        $hora                  = date("H:i:s");
        $P                     = $_POST['P'];

        $registro              = $_POST['registro'];
        $ID                    = $_POST['ID'];
        $clienteId             = $_POST['clienteId'];
        $receta            = $_POST['receta'];
     

        // *****************************   Variables Informacion RIPS Y (CUPS) *********************************

        $numero_autorizacion = $_POST['numero_autorizacion'];
        $Cup = $_POST['select1_Cup'];
        $finalidad_consulta = $_POST['finalidad_consulta'];
        $causa_externa = $_POST['causa_externa']; 
        $cie10_1 = $_POST['select1'];
        $cie10_2 = $_POST['select2'];
        $cie10_3 = $_POST['select3'];
        $cie10_4 = $_POST['select4'];
        $tipo_diagnostico_principal = $_POST['tipo_diagnostico_principal'];
        $valor_consulta = $_POST['valor_consulta'];
        if($valor_consulta == '')
        {
            $valor_consulta = 0;
        }
        $tipo_historia=1;



        // ***************************** ************************ ************************* ********************

        // *****************************   Variables Procedimiento  *********************************

        $ambito_procedimiento = $_POST['ambito_procedimiento'];
        $finalidad_procedimiento = $_POST['finalidad_procedimiento'];
        $personal_atiende = $_POST['personal_atiende'];
        $realizacion_quirurgico = $_POST['realizacion_quirurgico'];
        $valor_procedimiento = $_POST['valor_procedimiento'];
        if($valor_procedimiento == '')
        {
            $valor_procedimiento = 0;
        }
        $cie10_complicacion=$_POST['select5'];
        





        // ***************************** ************************ ************************* ********************
        // *****************************   Variables Facturacion  *********************************
      
        $numero_contrato = $_POST['numero_contrato'];if($numero_contrato == ''){ $numero_contrato = 0;}
        $plan_beneficios = $_POST['plan_beneficios'];
        $numero_poliza = $_POST['numero_poliza'];if($numero_poliza == ''){ $numero_poliza = 0;}
        $valor_total_copago = $_POST['valor_total_copago'];if($valor_total_copago == ''){ $valor_total_copago = 0;}
        $valor_comision = $_POST['valor_comision'];if($valor_comision == ''){ $valor_comision = 0;}
        $valor_total_descuento = $_POST['valor_total_descuento'];if($valor_total_descuento == ''){ $valor_total_descuento = 0;}
        $valor_entidad_contratante = $_POST['valor_entidad_contratante'];if($valor_entidad_contratante == ''){ $valor_entidad_contratante = 0;}
        $valor_cuota_moderadora = $_POST['valor_cuota_moderadora'];if($valor_cuota_moderadora == ''){ $valor_cuota_moderadora = 0;}
        $valor_neto_pagar = $_POST['valor_neto_pagar'];if($valor_neto_pagar == ''){ $valor_neto_pagar = 0;}
 

        // ***************************** ************************ ************************* ********************

        // *********************************************************    TABLA  historiaClinica1 *********************************************************
        // *********************************************************    TABLA  historiaClinica1 *********************************************************


        mysqli_query($conn3,"INSERT INTO procedimientos (id_cliente, fecha, hora,  cie10_1, cie10_2, tipo_diagnostico_principal,  numero_autorizacion, CUPS,ambito_procedimiento,finalidad_procedimiento,personal_atiende,realizacion_quirurgico,valor_procedimiento,cie10_complicacion) VALUES  ('$clienteId',  '$fechar', '$hora', '$cie10_1', '$cie10_2', '$tipo_diagnostico_principal', '$numero_autorizacion', '$Cup', '$ambito_procedimiento','$finalidad_procedimiento','$personal_atiende','$realizacion_quirurgico','$valor_procedimiento','$cie10_complicacion' );");

echo "INSERT INTO procedimientos (id_cliente, fecha, hora,  cie10_1, cie10_2, tipo_diagnostico_principal,  numero_autorizacion, CUPS,ambito_procedimiento,finalidad_procedimiento,personal_atiende,realizacion_quirurgico,valor_procedimiento,cie10_complicacion) VALUES  ('$clienteId',  '$fechar', '$hora', '$cie10_1', '$cie10_2', '$tipo_diagnostico_principal', '$numero_autorizacion', '$Cup', '$ambito_procedimiento','$finalidad_procedimiento','$personal_atiende','$realizacion_quirurgico','$valor_procedimiento','$cie10_complicacion' );";

              $queryListhc=mysqli_query($conn3,"SELECT MAX(id) as historiaClinica1 from procedimientos where id_cliente= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $historiaClinica1=$rowhc['historiaClinica1'];
              }   


                                                  
            


echo "<script language='Javascript'> window.location='finalizado_p.php?historiaClinica1=$historiaClinica1';</script>"; 

?>