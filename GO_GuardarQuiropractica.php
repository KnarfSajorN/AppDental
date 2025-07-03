<?php
   //include 'header.php';
   include 'funciones/funciones.php';
   include 'funciones/funcionesUtilidades.php';
 //  include 'menu.php'; 

    date_default_timezone_set('America/Bogota');

        $razon_primaria                = $_POST['razon_primaria'];
        $razon_secundaria                   = $_POST['razon_secundaria'];
        $localizacion                  = $_POST['localizacion'];
        $malestar                    = $_POST['malestar'];
        $calidad                    = $_POST['calidad'];
        $area                    = $_POST['area'];
        $entumecimiento                    = $_POST['entumecimiento'];
        $intensidad                    = $_POST['intensidad'];
        $frecuencia                    = $_POST['frecuencia'];
        $agrada_malestar                    = $_POST['agrada_malestar'];
        $nota                    = $_POST['nota'];
        $intensidad_dolor                    = $_POST['intensidad_dolor'];
        $sueno                    = $_POST['sueno'];
        $cuidados                    = $_POST['cuidados'];
        $desplazamiento                    = $_POST['desplazamiento'];
        $trabajo                    = $_POST['trabajo'];
        $recreacion                    = $_POST['recreacion'];
        $frecuencia_dolor                   = $_POST['frecuencia_dolor'];
        $levantamiento                    = $_POST['levantamiento'];
        $caminata                    = $_POST['caminata'];
        $actitud                    = $_POST['actitud'];
        $total                   = $_POST['total'];
        $indice                    = $_POST['indice'];
       
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
        $idusuario                    = $_POST['ID'];
        $clienteId             = $_POST['clienteId'];
        $receta            = $_POST['receta'];

        $fechaC= $_POST['fechadiagnostico'];


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


$query = "INSERT INTO Historia_Quiropractica (cliente_id, usuario_id, Fecha, Hora, razon_primaria, razon_secundaria, localizacion, malestar, calidad, area, entumecimiento, intensidad, frecuencia, agrada_malestar, nota, intensidad_dolor, sueno, cuidados, desplazamiento, trabajo, recreacion, frecuencia_dolor, levantamiento, caminata, actitud, total, indice) VALUES  ($clienteId, $ID, $fechar, $hora,  $razon_primaria, $razon_secundaria, $localizacion, $malestar, $calidad, $area, $entumecimiento, $intensidad, $frecuencia, $agrada_malestar, $nota, $intensidad_dolor, $sueno, $cuidados, $desplazamiento, $trabajo, $recreacion, $frecuencia_dolor, $levantamiento, $caminata, $actitud, $total, $indice);";
$enlace_actual = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$enlace_actual = str_replace('.php', '', $enlace_actual);

auditorMaster($idusuario, '1', $enlace_actual, $query);


        mysqli_query($conn3,"INSERT INTO Historia_Quiropractica (cliente_id, usuario_id, Fecha, Hora, razon_primaria, razon_secundaria, localizacion, malestar, calidad, area, entumecimiento, intensidad, frecuencia, agrada_malestar, nota, intensidad_dolor, sueno, cuidados, desplazamiento, trabajo, recreacion, frecuencia_dolor, levantamiento, caminata, actitud, total, indice) VALUES  ('$clienteId', '$ID', '$fechar', '$hora',  '$razon_primaria', '$razon_secundaria', '$localizacion', '$malestar', '$calidad', '$area', '$entumecimiento', '$intensidad', '$frecuencia', '$agrada_malestar', '$nota', '$intensidad_dolor', '$sueno', '$cuidados', '$desplazamiento', '$trabajo', '$recreacion', '$frecuencia_dolor', '$levantamiento', '$caminata', '$actitud', '$total', '$indice');");

        /*Echo "INSERT INTO Historia_Quiropractica (cliente_id, usuario_id, Fecha, Hora, razon_primaria, razon_secundaria, localizacion, malestar, calidad, area, entumecimiento, intensidad, frecuencia, agrada_malestar, nota, intensidad_dolor, sueno, cuidados, desplazamiento, trabajo, recreacion, frecuencia_dolor, levantamiento, caminata, actitud, total, indice) VALUES  ('$clienteId', '$ID', '$fechar', '$hora',  '$razon_primaria', '$razon_secundaria', '$localizacion', '$malestar', '$calidad', '$area', '$entumecimiento', '$intensidad', '$frecuencia', '$agrada_malestar', '$nota', '$intensidad_dolor', '$sueno', '$cuidados', '$desplazamiento', '$trabajo', '$recreacion', '$frecuencia_dolor', '$levantamiento', '$caminata', '$actitud', '$total', '$indice'";*/


        /*
              $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as historiaClinica1 from controlprenatal where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $historiaClinica1=$rowhc['historiaClinica1'];
              }   
        */

        $historiaClinica1 = mysqli_insert_id($conn3);

echo "<script language='Javascript'> window.location='GO_FinalizadoQuiropractica.php?historiaClinica1=$historiaClinica1';</script>"; 

?>