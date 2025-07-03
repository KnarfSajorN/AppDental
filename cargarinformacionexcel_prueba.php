<?php

 	include 'funciones/conn3.php';

 		/*
 		$civil["CASADO"]="Casado(a)";
 		$civil["SOLTERO"]="Soltero(a)";
 		$civil["VIUDO"]="Viudo(a)";
 		$civil["SEPARADO"]="Separado(a)";
 		$civil["UNIÓN LIBRE"]="Union Libre";

 		$sangre[""]="No definido";
 		$sangre["O-"]="O NEGATIVO";
 		$sangre["O+"]="O POSITIVO";
 		$sangre["A-"]="A NEGATIVO";
 		$sangre["A+"]="A POSITIVO";
 		$sangre["B-"]="B NEGATIVO";
 		$sangre["B+"]="B POSITIVO";
 		$sangre["AB-"]="AB NEGATIVO";
 		$sangre["AB+"]="AB POSITIVO";

 		/*
 		$civil["DES"]="Desconocido";
 		$civil["MEN"]="Menor de edad";
 		$civil["OT"]="Otro(a)";
 		*/

 		/*
     	$resultado2=mysqli_query($conn3,"SELECT * FROM pacientes_externos");
	    $Nresultado2=mysqli_num_rows($resultado2);
	    while ($rowMotorizado2 = mysqli_fetch_array($resultado2)) 
	    {
	    	$cont++;
	    	$cedula=$rowMotorizado2["cedula"];//
	    	$tipo_documento=$rowMotorizado2["tipo_documento"];//

	    	$primer_nombre=str_replace("'","",utf8_encode($rowMotorizado2["primer_nombre"]));//
	    	$segundo_Nombre=str_replace("'","",utf8_encode($rowMotorizado2["segundo_Nombre"]));//
	    	$primer_apellido=str_replace("'","",utf8_encode($rowMotorizado2["primer_apellido"]));//
	    	$segundo_apellido=str_replace("'","",utf8_encode($rowMotorizado2["segundo_apellido"]));//

	    	$nombre_cliente=trim($primer_nombre.' '.$segundo_Nombre.' '.$primer_apellido.' '.$segundo_apellido," ");//

	    	$fecha_nacimiento=$rowMotorizado2["fecha_nacimiento"];//
	    	if($fecha_nacimiento==""){$fecha_nacimiento="0000-00-00";}


	    	$sexo=$rowMotorizado2["sexo"];//
	    	$estado_civil=$civil[$rowMotorizado2["estado_civil"]];//
			$tipo_de_sangre=$sangre[$rowMotorizado2["tipo_sangre"]];//
	    	$direccion=str_replace("'","",utf8_encode($rowMotorizado2["direccion"]));//
	    	$municipio=$rowMotorizado2["municipio"];//
	    	$telefono_p=$rowMotorizado2["telefono_p"];//
	    	$whatsapp='57'.$telefono_p;//
	    	$telefono_a=$rowMotorizado2["telefono_a"];//

	    	$email=$rowMotorizado2["email"];//
	    	$zona=$rowMotorizado2["zona"];
	    	$empresa=$rowMotorizado2["empresa"];//entidad salud
	    	$regimen=$rowMotorizado2["regimen"];// tipo_usuario
	    	$categoria=$rowMotorizado2["categoria"];// categoria
	    	$nombre_responsable=$rowMotorizado2["nombre_responsable"];// acompa famili
	    	$telefono_acompa=utf8_encode($rowMotorizado2["telefono_acompa"]);// telefono acompa
	    	$dx_principal=$rowMotorizado2["dx_principal"];

	    	
	    	$resultado = mysqli_query($conn3,"INSERT INTO cliente (CODI_CLIENTE,tipo_cliente,primer_nombre,segundo_nombre,primer_apellido,segundo_apellido,fechaNacimiento,genero,estado,tiposSangre,direccion_cliente,ciudad_cliente,celular_cliente,whatsapp,telefono_cliente,correo_cliente,entidadSalud,tipoUsuario,categoria,acompananteFamiliar,telefono_acompanante,dx_principal,cliente_externo,nombre_cliente,usuario_id) 
	    		VALUES ('$cedula','$tipo_documento','$primer_nombre','$segundo_Nombre','$primer_apellido','$segundo_apellido','$fecha_nacimiento','$sexo','$estado_civil','$tipo_de_sangre','$direccion','$municipio','$telefono_p','$whatsapp','$telefono_a','$email','$empresa','$regimen','$categoria','$nombre_responsable','$telefono_acompa','$dx_principal','1','$nombre_cliente','1')");

	    	if (! $resultado ) {
	    	     // este error lo puedes obtener usando 
	    	     // mysqli_error($db) o $db->error;
	    	     echo "Error no inserto, INSERT INTO cliente (CODI_CLIENTE,tipo_cliente,primer_nombre,segundo_nombre,primer_apellido,segundo_apellido,fechaNacimiento,genero,estado,tiposSangre,direccion_cliente,ciudad_cliente,celular_cliente,whatsapp,telefono_cliente,correo_cliente,entidadSalud,tipoUsuario,categoria,acompananteFamiliar,telefono_acompanante,dx_principal,cliente_externo,nombre_cliente,usuario_id) 
	    		VALUES ('$cedula','$tipo_documento','$primer_nombre','$segundo_Nombre','$primer_apellido','$segundo_apellido','$fecha_nacimiento','$sexo','$estado_civil','$tipo_de_sangre','$direccion','$municipio','$telefono_p','$whatsapp','$telefono_a','$email','$empresa','$regimen','$categoria','$nombre_responsable','$telefono_acompa','$dx_principal','1','$nombre_cliente','1')";  
	    	}
	    }
	    */

/*
	    mysqli_query($conn3,"CREATE TABLE historiaclinicatratamiento (
cedula TEXT NULL DEFAULT '',
nombre_medico_atencion TEXT NULL DEFAULT '',
fechahora TEXT NULL DEFAULT '',
tipo_consulta TEXT NULL DEFAULT '',
finalidad TEXT NULL DEFAULT '',
motivo_consulta TEXT NULL DEFAULT '',
numero_autorizacion TEXT NULL DEFAULT '',
sesion_numero TEXT NULL DEFAULT '',
cual TEXT NULL DEFAULT '',
si_1 TEXT NULL DEFAULT '',
no_1 TEXT NULL DEFAULT '',
de_1_a_10 TEXT NULL DEFAULT '',
si_2 TEXT NULL DEFAULT '',
no_2 TEXT NULL DEFAULT '',
calor_humedo TEXT NULL DEFAULT '',
tens TEXT NULL DEFAULT '',
frio TEXT NULL DEFAULT '',
tape TEXT NULL DEFAULT '',
crioterapia TEXT NULL DEFAULT '',
ems TEXT NULL DEFAULT '',
parafina TEXT NULL DEFAULT '',
ejercicios TEXT NULL DEFAULT '',
terapia_manual TEXT NULL DEFAULT '',
area_donde_se_aplica TEXT NULL DEFAULT '',
finaliza_sesion TEXT NULL DEFAULT '',
igual TEXT NULL DEFAULT '',
peor TEXT NULL DEFAULT '',
condicion TEXT NULL DEFAULT '',
nota TEXT NULL DEFAULT '',
diagnostico_ppal TEXT NULL DEFAULT '',
diagnostico_relacionado_1 TEXT NULL DEFAULT '',
diagnostico_relacionado_2 TEXT NULL DEFAULT '',
diagnostico_relacionado_3 TEXT NULL DEFAULT '',
tipo_diagnostico_consulta TEXT NULL DEFAULT ''
)ENGINE = MyISAM;");
*/



?>
<!doctype>
<html>
<head>
</head>
<body>
<?php

require_once "plugins/PHPExcel/Classes/PHPExcel.php";

		$tmpfname = "plugins/PHPExcel/Archivos/ListaIMC_M.xlsx";
		$excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
		$excelObj = $excelReader->load($tmpfname);
		$worksheet = $excelObj->getSheet(0);
		$lastRow = $worksheet->getHighestRow();
		
		$arreglo = $excelObj->getActiveSheet()->toArray("");
		

		foreach ($arreglo as $key => $value) {
			$contador1++;

			/*$arreglo="SET cod_dpto='{$value[10]}' , cod_municipio ='{$value[11]}' WHERE CODI_CLIENTE='{$value[0]}'";

			$resultado = mysqli_query($conn3,"UPDATE cliente {$arreglo}");
			
			if (!$resultado )
			{
				echo " error al insertar ,UPDATE cliente SET cod_dpto='{$value[10]}' , cod_municipio ='{$value[11]}' WHERE CODI_CLIENTE='{$value[0]}'";
			}
			*/

			/*
			$resultado = mysqli_query($conn3,"INSERT INTO cie10_1 (codigo,descripcion) values ('{$value[0]}','{$value[1]}')");
			
			if (!$resultado )
			{
				echo " error al insertar ,INSERT INTO cie10_1 (codigo,descripcion) values ('{$value[0]}','{$value[1]}')";
			}
			*/

		}












		
		/*
		$find = array("'",'"');
		$replace = array("\'",'\"');

		foreach ($arreglo as $key => $value) {
			$arreglo="";
			foreach ($value as $key1 => $value1) {
				$arreglo .= ",'".str_replace($find,$replace,$value1)."'";
			}
			$arreglo=trim($arreglo,',');
			//$resultado = mysqli_query($conn3,'INSERT INTO Tabla_Crecimiento(Meses,3_Percentil,5_Percentil,10_Percentil,25_Percentil,50_Percentil,75_Percentil,90_Percentil,95_Percentil,97_Percentil,Genero,Tipo_Tabla) VALUES ('.$arreglo.',"Mujer","Circunferencia de Cabeza")');
			$resultado = mysqli_query($conn3,'INSERT INTO Tabla_Crecimiento(Meses,3_Percentil,5_Percentil,10_Percentil,25_Percentil,50_Percentil,75_Percentil,85_Percentil,90_Percentil,95_Percentil,97_Percentil,Genero,Tipo_Tabla) VALUES ('.$arreglo.',"Mujer","IMC")');
			
			if (!$resultado )
			{
				echo " error al insertar ,".'INSERT INTO Tabla_Crecimiento(Meses,3_Percentil,5_Percentil,10_Percentil,25_Percentil,50_Percentil,75_Percentil,85_Percentil,90_Percentil,95_Percentil,97_Percentil,Genero,Tipo_Tabla) VALUES ('.$arreglo.',"Mujer","Circunferencia de Cabeza")'."<br>";
			}
		}
		*/
		/*
		echo "<table>";
		for ($row = 1; $row <= $lastRow; $row++) {
			 echo "<tr><td>";
			 echo $worksheet->getCell('A'.$row)->getValue();
			 echo "</td><td>";
			 echo $worksheet->getCell('B'.$row)->getValue();
			 echo "</td><tr>";
		}
		echo "</table>";
		*/
?>

</body>
</html>