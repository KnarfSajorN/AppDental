<?php
  //include 'header.php';
  include 'funciones/funciones.php';
  include 'funciones/funcionesUtilidades.php';
  //include 'menu.php'; 
 
    date_default_timezone_set('America/Bogota');
    include("conexiones/conexion.php");

  
    //********************************************************************//
    //Insercion en la tabla de la base de Datos historiaClinica_Quirurgica
    //********************************************************************//

    $hora_inicio=$_POST['hora_inicio'];
    $hora_finaliza=$_POST['hora_finaliza'];
    $n_sala=$_POST['n_sala'];
    $cirujano=$_POST['cirujano'];
    $ayudante=$_POST['ayudante'];
    $anestesiologo=$_POST['anestesiologo'];
    $tipo_anestesia=$_POST['tipo_anestesia'];
    $instrumentista=$_POST['instrumentista'];
    $circulante=$_POST['circulante'];
    $procedimiento_quirurgico=$_POST['procedimiento_quirurgico'];
    $diagnostico_prequirurgico=$_POST['DiagnosticoPrequirurgico'];
    $diagnostico_postquirurgico=$_POST['DiagnosticoPostquirurgico'];
    $hallazgo=$_POST['hallazgo'];
    $descripcion_quirurgica=$_POST['descripcion_quirurgica'];
    $sangrado=$_POST['sangrado'];
    $complicaciones=$_POST['complicaciones'];
    $recuento_material=$_POST['recuentoMaterial'];
    $plan_manejomaterial=$_POST['planManejoFinal'];
    $observaciones=$_POST['observaciones'];
    $patologia=$_POST['patologia'];
    $tejido=$_POST['tejido'];

    $fechar = date("Y-m-d");
    $hora = date("H:i:s");
    $usuarioId = $_POST['usuario_id'];
    $clienteId = $_POST['clienteId'];
    $arregloCie1=$_POST['cie10Prequirurgico'];
    $arregloCie2=$_POST['cie10postquirurgico'];

    $contador1=count($arregloCie1);
    $contador2=count($arregloCie2);

    print_r("INSERT INTO historiaClinica_Quirurgica (hora_inicio,hora_finaliza,n_sala,cirujano,ayudante,anestesiologo,tipo_anestesia,instrumentador,circulante,prodecimiento_quirurgico,diagnostico_prequirurgico,diagnostico_postquirurgico,hallazgo_quirurgicos,descripcion_quirurgica,sangrado,complicaciones,recuento_material,plan_manejo_final,observaciones,patologia,tejido)
    VALUES ('$hora_inicio','$hora_finaliza','$n_sala','$cirujano','$ayudante','$anestesiologo','$tipo_anestesia','$instrumentista','$circulante','$procedimiento_quirurgico','$diagnostico_prequirurgico','$diagnostico_postquirurgico','$hallazgo','$descripcion_quirurgica','$sangrado','$complicaciones','$recuento_material','$plan_manejomaterial','$observaciones','$patologia','$tejido')");

    

    $buscando=mysqli_query($conn3,"SELECT MAX(ID) as max from historiaClinica_Quirurgica");
    $nrowl=mysqli_fetch_assoc($buscando);
    $maximos=$nrowl['max'];
    //variables de arreglos de los CIE10

    for ($i=1; $i<$contador1; $i++) 
    { 
      
     print_r("INSERT INTO historiaClinica9_Quirurgico_Cie10 
      (cliente_id,usuario_id,historiaClinica9_id,Fecha,Hora,codigo,tipo_campo) 
      VALUES ('$clienteId','$usuarioId','$maximos','$fechar','$hora','$arregloCie1[$i]','Diagnostico Prequirurgico')");

    }

    
    for ($i=1; $i<$contador2; $i++) 
    { 
      
      print_r("INSERT INTO historiaClinica9_Quirurgico_Cie10 
      (cliente_id,usuario_id,historiaClinica9_id,Fecha,Hora,codigo,tipo_campo) 
      VALUES ('$clienteId','$usuarioId','$maximos','$fechar','$hora','$arregloCie2[$i]','Diagnostico Postquirurgico')");

    }
    
?>