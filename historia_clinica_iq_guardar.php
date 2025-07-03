<?php
  include 'funciones/funciones.php';
  include 'funciones/funcionesUtilidades.php';

//********************************************************************//
//Insercion en la tabla de la base de Datos historiaClinica_Quirurgica
//********************************************************************//
//print_r($_POST);
 
            

      $usuarioId = $_POST['ID'];
      $idusuario = $_POST['ID'];
      $clienteId = $_POST['clienteId']; 
      $fechar = date("Y-m-d");
      $hora = date("H:i:s");

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

      $codigo1=$_POST['cie10Prequirurgico'];
      $codigo2=$_POST['cie10postquirurgico'];
       
$codigo1=$_POST['select1'];
$codigo2=$_POST['select2'];
$codigo3=$_POST['select3'];
$codigo4=$_POST['select4'];

echo'.....hghjghjghjgh..........'.$codigo1;
echo'.....hghjghjghjgh..........'.$codigo2;
echo'.....hghjghjghjgh..........'.$codigo3;
        
//       $contador=count($codigo1);
//       $contador1=count($codigo2);

//       $contador3=count($arregloCup);
//     $contador4=count($arregloCup1);


//     echo '$contador3'.$contador3;

      $conn3 = mysqli_connect($host,$userdb,$pass2,$DB) or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));


$query = "INSERT INTO historiaClinica_Quirurgica (cliente_id,usuario_id,Fecha,Hora,hora_inicio,hora_finaliza,n_sala,cirujano,ayudante,anestesiologo,tipo_anestesia,instrumentador,circulante,prodecimiento_quirurgico,diagnostico_prequirurgico,diagnostico_postquirurgico,hallazgo_quirurgicos,descripcion_quirurgica,sangrado,complicaciones,recuento_material,plan_manejo_final,observaciones,patologia,tejido, cie1, cie2, cup1, cup2) 
      VALUES ($clienteId,$usuarioId,$fechar,$hora,$hora_inicio,$hora_finaliza,$n_sala,$cirujano,$ayudante,$anestesiologo,$tipo_anestesia,$instrumentista,$circulante,$procedimiento_quirurgico,$diagnostico_prequirurgico,$diagnostico_postquirurgico,$hallazgo,$descripcion_quirurgica,$sangrado,$complicaciones,$recuento_material,$plan_manejomaterial,$observaciones,$patologia,$tejido,$codigo1,$codigo2,$codigo3,$codigo4);";
$enlace_actual = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$enlace_actual = str_replace('.php', '', $enlace_actual);

auditorMaster($idusuario, '1', $enlace_actual, $query);

      //Insercion en la tabla historiaClinica9_Quirurgica

      mysqli_query($conn3,"INSERT INTO historiaClinica_Quirurgica (cliente_id,usuario_id,Fecha,Hora,hora_inicio,hora_finaliza,n_sala,cirujano,ayudante,anestesiologo,tipo_anestesia,instrumentador,circulante,prodecimiento_quirurgico,diagnostico_prequirurgico,diagnostico_postquirurgico,hallazgo_quirurgicos,descripcion_quirurgica,sangrado,complicaciones,recuento_material,plan_manejo_final,observaciones,patologia,tejido, cie1, cie2, cup1, cup2) 
      VALUES ('$clienteId','$usuarioId','$fechar','$hora','$hora_inicio','$hora_finaliza','$n_sala','$cirujano','$ayudante','$anestesiologo','$tipo_anestesia','$instrumentista','$circulante','$procedimiento_quirurgico','$diagnostico_prequirurgico','$diagnostico_postquirurgico','$hallazgo','$descripcion_quirurgica','$sangrado','$complicaciones','$recuento_material','$plan_manejomaterial','$observaciones','$patologia','$tejido', '$codigo1', '$codigo2','$codigo3','$codigo4')");

     echo "INSERT INTO historiaClinica_Quirurgica (cliente_id,usuario_id,Fecha,Hora,hora_inicio,hora_finaliza,n_sala,cirujano,ayudante,anestesiologo,tipo_anestesia,instrumentador,circulante,prodecimiento_quirurgico,diagnostico_prequirurgico,diagnostico_postquirurgico,hallazgo_quirurgicos,descripcion_quirurgica,sangrado,complicaciones,recuento_material,plan_manejo_final,observaciones,patologia,tejido, cie1, cie2, cup1, cup2) 
      VALUES ('$clienteId','$usuarioId','$fechar','$hora','$hora_inicio','$hora_finaliza','$n_sala','$cirujano','$ayudante','$anestesiologo','$tipo_anestesia','$instrumentista','$circulante','$procedimiento_quirurgico','$diagnostico_prequirurgico','$diagnostico_postquirurgico','$hallazgo','$descripcion_quirurgica','$sangrado','$complicaciones','$recuento_material','$plan_manejomaterial','$observaciones','$patologia','$tejido', '$codigo1', '$codigo2','$codigo3','$codigo4')";




//////////////////AUTOGUARDADO///////////////////////////////////////////////////////////////
if($_POST['Ruta_Historia_AutoGuardado']!=""){
	$Ruta_Historia_AutoGuardado = $_POST['Ruta_Historia_AutoGuardado'];

	$query = "UPDATE AutoGuardado SET Estado='0' WHERE cliente_id = '$clienteId' and usuario_id = '$usuarioId' and Ruta = '$Ruta_Historia_AutoGuardado' AND Estado = '1' ";
	mysqli_query($conn3, $query);
}
////////////////////////////////////////////////////////////////////////////////////////////


      //Busqueda del id mayor en la tabla historiaClinica_Quirurgica
      $buscando=mysqli_query($conn3,"SELECT MAX(ID) as max from historiaClinica_Quirurgica");
      $nrowl=mysqli_fetch_assoc($buscando);
      $maximos=$nrowl['max'];

     

echo "<script type='text/javascript'>
                        window.location='hciqFinalizado?iC=".encrypt($maximos)."';
                     </script>"; 
                  




?>