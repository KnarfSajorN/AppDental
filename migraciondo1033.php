<?php

include 'funciones/conn3.php';


?>
<!doctype>
<html>

<head>
</head>

<body>
    <?php

    require_once "plugins/PHPExcel/Classes/PHPExcel.php";

    $tmpfname = "plugins/PHPExcel/Archivos/migracionestetica.xlsx";
    $excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
    $excelObj = $excelReader->load($tmpfname);
    $worksheet = $excelObj->getSheet(0);
    $lastRow = $worksheet->getHighestRow();

    $arreglo = $excelObj->getActiveSheet()->toArray("");


    foreach ($arreglo as $key => $value) {
        $contador1++;
        //$DNI = $value[2];
        /*$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where CODI_CLIENTE= '$CLIENTE' ");
		$nrowl = mysqli_num_rows($queryList);
		while ($rowMotorizado = mysqli_fetch_array($queryList)) {
			
			$cliente_id = $rowMotorizado['cliente_id'];
			
		//}
		$a = [$value[7], $value[8], $value[9], $value[10], $value[11], $value[12], $value[13]];
        

		dateTime = new \DateTime();
		dateTime->format('Y-m-d H:i:s');
        fechar='" . Date('Y-m-d', strtotime($value[2])) . "',*/

        // $pacienteid= $value[0];
        // $idold = $value[22];
        // $idold2 = $value[22];

        // $genero = $value[35];
        // if ($genero == 'Femenino') {
        //     $gen = 'F';
        // } elseif ($genero == 'Masculino') {
        //     $gen = 'M';
        // } elseif ($genero == 'Sin determinar') {
        //     $gen = 'I';
        // }

        // $var1 = explode(' ', utf8_encode(utf8_decode($value[1])));

        // $primerapellido = utf8_encode(utf8_decode($var1[0]));
        // $segundoapellido = utf8_encode(utf8_decode($var1[1]));
        // $var2 = explode(' ', utf8_encode(utf8_decode($value[2])));
        // $primernombre = utf8_encode(utf8_decode($var1[0]));
        // $segundonombre = utf8_encode(utf8_decode($var1[1]));
        // $NOMBRE = $primernombre . ' ' . $segundonombre;
        // $apellido = $primerapellido . ' ' . $segundoapellido;
        // $nombre_cliente = $value[2] . ' ' . $value[1];
       
        // if ($CODI_CLIENTE== $DNI) {
        //     $arreglo = "SET usuario_id=1, nombre_cliente='{$nombre_cliente}',primer_nombre='{$primernombre}',segundo_nombre='{$segundonombre}',primer_apellido='{$primerapellido}',segundo_apellido='{$segundoapellido}',fechar ='" . Date('Y-m-d H:i:s') . "',genero ='{$value[35]}',CODI_CLIENTE='{$value[3]}',celular_cliente='{$value[4]}' ,numerohistoria ='{$value[0]}' ,whatsapp='{$value[4]}',correo_cliente='{$value[8]}',edad='{$value[36]}' ";
        //     echo  $arreglo . "<br><br>";
        //     //echo  $arreglo2 . "<br><br>";
        //     //$resultado = mysqli_query($conn3, "INSERT sinvetrios {$arreglo}  ");
        //     $resultado = mysqli_query($conn3, "INSERT cliente {$arreglo}");

        //     if (!$resultado) {
        //         echo " error al insertar ";
        //         echo "<pre >";
        //         var_dump(mysqli_error_list($conn3));
        //         echo "</pre>";
        //     } else {
        //         //$arreglo = "SET usuario_id=1, idviejo='{$value[0]}',nombre_cliente ='{$value[1]}',DNI ='{$value[2]}',direccion_cliente='{$value[3]}',celular_cliente ='{$value[7]}' ,correo_cliente ='{$value[9]}'  ";
        //         //$arreglo = "SET usuario_id=1, idviejo='{$value[0]}',nombre_cliente ='{$value[1]}',DNI ='{$value[2]}',direccion_cliente='{$value[3]}',celular_cliente ='{$value[7]}' ,correo_cliente ='{$value[9]}'  ";
        //         //WHERE CODI_CLIENTE='{$value[0]}'$resultado2 =mysqli_query($conn3, "INSERT INTO cliente (nombre_cliente, fechaNacimiento, direccion_cliente,celular_cliente, genero,tiposSangre) VALUES  ('SINTHY YAMILETH AUGUSTO THOMAS', '1980-03-05', 'URBANIZACION TEREMAR CALLE1, CASA # 2C H10', '6866-8488',   'F','O Positivo');");
        //         //$arreglo = "SET idviejo='{$value[0]}',nombre_cliente ='{$value[1]}',DNI ='{$value[2]}',direccion_cliente='{$value[3]}',celular_cliente ='{$value[7]}' ,correo_cliente ='{$value[9]}'  ";
        //         //$arreglo = "SET idviejo='{$value[0]}',nombre_cliente ='{$value[1]}',DNI ='{$value[2]}',direccion_cliente='{$value[3]}',celular_cliente ='{$value[7]}' ,correo_cliente ='{$value[9]}'  ";
        //         //$arreglo = "SET cliente_id='{$cliente_id}',usuario_id=1,fecha='" . Date('Y-m-d', strtotime($value[2])) . "',DiagnosticoConsulta='{$value[3]}',Impresion ='{$value[4]}', EnfermedadActual='{$value[5]}' ,PlanManejo ='{$value[6]}' ,	SignosVitales ='{$a}'   ";
        //         //$arreglo = "SET tipo=10,usuario_id=1,Fecha='" . Date('Y-m-d') . "',referencia='{$value[1]}',existencia ='{$value[8]}', minimo='{$value[3]}' ,maximo ='{$value[2]}' ,	descripcion ='{$value[4]}',nota='{$value[5]}',costo='{$value[7]}',precio='{$value[6]}'    ";
        //         //$arreglo2 = "SET nombre_cliente ='SINTHY YAMILETH AUGUSTO THOMAS',fechaNacimiento='1980-03-05',direccion_cliente='URBANIZACION TEREMAR CALLE1, CASA # 2C H10',celular_cliente ='6866-8488', telefono_cliente='' ,correo_cliente ='' ,genero ='F' ,tipos Sangre ='O+' , alergias ='' , antecedentes ='' , tomaMedicamento =''";

        //         echo " el cliente existe";
        //     }
        // }
		// $numero = $value[14];
    //     $numero1 = $value[3];
    //     $numero2 = $value[4];
        // $int_var = (int)filter_var($geeks, FILTER_SANITIZE_NUMBER_INT);
        // $int = preg_replace('/[^0-9]/', '', $numero);
        // $int1 = preg_replace('/[^0-9]/', '', $numero1);
        // $int2 = preg_replace('/[^0-9]/', '', $numero2);
        // $queryList = mysqli_query($conn3, "SELECT * FROM cliente where idViejo= '$pacienteid'");
        // $nrowl = mysqli_num_rows($queryList);
        // while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        //     //
        //     $idcomp = $rowMotorizado['idviejo'];
        //     $cliente_id = $rowMotorizado['cliente_id'];
        // }

//  $arreglo = "SET usuario_id=1, cliente_id='{$cliente_id}',fecha ='" . Date('Y-m-d H:i:s', strtotime($value[2])) . "',presion='{$value[3]}',peso='{$value[4]}' ,diagnostico='{$value[5]}',diagnostico1='{$value[6]}',diagnostico2='{$value[7]}',diagnostico3='{$value[8]}' ,PlanManejo='{$value[9]}',Impresion='{$value[10]}' ";
		$var1 =explode(' ', mysqli_real_escape_string($conn3, $value[2] ));
// $var1 = explode(' ', utf8_encode(utf8_decode($value[2])));

         $Nombre = utf8_encode(utf8_decode($var1[0]));
         $Dosis = utf8_encode(utf8_decode($var1[1]));
         $Indicaciones = utf8_encode(utf8_decode($var1[2]));
        

// $arreglo = "SET usuario_id=1, idViejo='{$value[0]}',nombre_cliente='$nombre_cliente',CODI_CLIENTE='$int1',edad_cliente='{$value[8]}',correo_cliente ='{$value[8]}' ,celular_cliente='$int',whatsapp='591$int',primer_nombre='{$primernombre}',segundo_nombre='{$segundonombre}',primer_apellido='{$primerapellido}',segundo_apellido='{$segundoapellido}',genero='{$value[3]}',hijos='{$value[15]}',comosuponosotros='{$value[20]}',nombrereferido='{$value[21]}',codigo_pais='CO',codigo_ciudad='{$value[29]}',indicativo='57',habeasdata='Si',tipo_cliente='$$tipo_cliente',fechar ='" . Date('Y-m-d H:i:s') . "',nota='{$value[12]}',ocupacion='{$value[23]}',estado='$estado',tipoUsuario='{$value[32]}',zona='{$value[34]}',direccion_cliente='{$value[12]}',tiposSangre='{$value[14]}',fechaNacimiento='" . Date('Y-m-d', strtotime($value[7])) . "'";
		$arreglo = "SET usuario_id=1, Fecha_Registro ='" . Date('Y-m-d') . "', Nombre='{$value[0]}', Dosis='{$value[1]}', Indicaciones='{$value[2]}'";
echo  $arreglo . "<br><br>";
		
	
		$resultado = mysqli_query($conn3, "INSERT RM_Medicamentos {$arreglo}  ");
		// $resultado = mysqli_query($conn3, "INSERT Historia_Clinica {$arreglo}");

		 if (!$resultado) {
			echo " error al insertar ";
		 	echo "<pre >";
			var_dump(mysqli_error_list($conn3));
		 	echo "</pre>";
		}




      // if ($CODI_CLIENTE == $DNI) {
		// $arreglo = "SET usuario_id=1, cliente_id='{$cliente_id}',fecha ='" . Date('Y-m-d H:i:s', strtotime($value[2])) . "',presion='{$value[3]}',peso='{$value[4]}' ,diagnostico='{$value[5]}',diagnostico1='{$value[6]}',diagnostico2='{$value[7]}',diagnostico3='{$value[8]}' ,PlanManejo='{$value[9]}',Impresion='{$value[10]}' ";
		//$arreglo = "SET usuario_id=1, nombre_cliente='{$value[0]}',correo_cliente ='{$value[2]}' ,celular_cliente='507$int1',telefono_cliente='$int2',whatsapp='507$int',direccion_cliente='{$value[6]}',primer_nombre='{$primernombre}',segundo_nombre='{$segundonombre}',primer_apellido='{$primerapellido}',segundo_apellido='{$segundoapellido}',fechar ='" . Date('Y-m-d H:i:s') . "'";
		//echo  $arreglo . "<br><br>";
		
		//echo  $arreglo2 . "<br><br>";
		//$resultado = mysqli_query($conn3, "INSERT sinvetrios {$arreglo}  ");
		//$resultado = mysqli_query($conn3, "INSERT Historia_Clinica {$arreglo}");

		// if (!$resultado) {
		// 	echo " error al insertar ";
		// 	echo "<pre >";
		// 	var_dump(mysqli_error_list($conn3));
		// 	echo "</pre>";
		//}
       // } else {
            //$arreglo = "SET usuario_id=1, idviejo='{$value[0]}',nombre_cliente ='{$value[1]}',DNI ='{$value[2]}',direccion_cliente='{$value[3]}',celular_cliente ='{$value[7]}' ,correo_cliente ='{$value[9]}'  ";
            //$arreglo = "SET usuario_id=1, idviejo='{$value[0]}',nombre_cliente ='{$value[1]}',DNI ='{$value[2]}',direccion_cliente='{$value[3]}',celular_cliente ='{$value[7]}' ,correo_cliente ='{$value[9]}'  ";
            //WHERE CODI_CLIENTE='{$value[0]}'$resultado2 =mysqli_query($conn3, "INSERT INTO cliente (nombre_cliente, fechaNacimiento, direccion_cliente,celular_cliente, genero,tiposSangre) VALUES  ('SINTHY YAMILETH AUGUSTO THOMAS', '1980-03-05', 'URBANIZACION TEREMAR CALLE1, CASA # 2C H10', '6866-8488',   'F','O Positivo');");
            //$arreglo = "SET idviejo='{$value[0]}',nombre_cliente ='{$value[1]}',DNI ='{$value[2]}',direccion_cliente='{$value[3]}',celular_cliente ='{$value[7]}' ,correo_cliente ='{$value[9]}'  ";
            //$arreglo = "SET idviejo='{$value[0]}',nombre_cliente ='{$value[1]}',DNI ='{$value[2]}',direccion_cliente='{$value[3]}',celular_cliente ='{$value[7]}' ,correo_cliente ='{$value[9]}'  ";
            //$arreglo = "SET cliente_id='{$cliente_id}',usuario_id=1,fecha='" . Date('Y-m-d', strtotime($value[2])) . "',DiagnosticoConsulta='{$value[3]}',Impresion ='{$value[4]}', EnfermedadActual='{$value[5]}' ,PlanManejo ='{$value[6]}' ,	SignosVitales ='{$a}'   ";
            //$arreglo = "SET tipo=10,usuario_id=1,Fecha='" . Date('Y-m-d') . "',referencia='{$value[1]}',existencia ='{$value[8]}', minimo='{$value[3]}' ,maximo ='{$value[2]}' ,	descripcion ='{$value[4]}',nota='{$value[5]}',costo='{$value[7]}',precio='{$value[6]}'    ";
            //$arreglo2 = "SET nombre_cliente ='SINTHY YAMILETH AUGUSTO THOMAS',fechaNacimiento='1980-03-05',direccion_cliente='URBANIZACION TEREMAR CALLE1, CASA # 2C H10',celular_cliente ='6866-8488', telefono_cliente='' ,correo_cliente ='' ,genero ='F' ,tipos Sangre ='O+' , alergias ='' , antecedentes ='' , tomaMedicamento =''";
            
        //}


      //   $arreglo="SET whatsapp='503$int',habeasdata='Si',indicativo='503'  WHERE idViejo='{$value[0]}'";
		
			


			// $resultado = mysqli_query($conn3,"UPDATE cliente {$arreglo}");
			
			// if (!$resultado )
			// {
			// 	echo " error al insertar ,UPDATE cliente SET celular_cliente='507$int1' WHERE idViejo='{$value[0]}'";
			// }
			


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