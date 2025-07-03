<?php
   include 'header.php';
   include 'menu.php'; 

    date_default_timezone_set('America/Bogota');


	function CargarDocumentos_DocumentosSistema_Ecografias($usuario_documento, $Documentos, $Carpeta)
	{
		include 'funciones/conn3.php';
		if (!empty($Documentos['name'])) {

			// Carpeta de destino para guardar los archivos
			$carpetaDestino = 'archivos/';
			// Verificar si la carpeta de destino existe, de lo contrario, crearla
			if (!is_dir($carpetaDestino)) {
				mkdir($carpetaDestino, 0777, true);
			}

			// Iterar sobre cada archivo cargado
			$Contador = 0;
			foreach ($Documentos['tmp_name'] as $key => $tmpName) {

				if ($tmpName != "") {

					$NombreArchivoInicial = $Documentos['name'][$key];
					$NombreArchivoFinal = str_replace("'", "", $NombreArchivoInicial);
					$fechahora = date("Y-m-d_H-i-s");
					$numeroAleatorio = rand(1, 9999);
					$nombreArchivo = "{$usuario_documento}__{$fechahora}__{$numeroAleatorio}_" . $NombreArchivoFinal;

					$archivoDestino = $carpetaDestino . $nombreArchivo;

					// Mover archivo temporal a la carpeta de destino
					if (move_uploaded_file($tmpName, $archivoDestino)) {
						$ArregloDocumentos[$Contador]["Nombre"] = $nombreArchivo;
						$ArregloDocumentos[$Contador]["Nombre_Original"] = $NombreArchivoFinal;
						$ArregloDocumentos[$Contador]["Ruta"] = $carpetaDestino;
						$ArregloDocumentos[$Contador]["Carpeta"] = $Carpeta;
						$ArregloDocumentos[$Contador]["usuario_id"] = $usuario_documento;

						//echo 'El archivo "' . $NombreArchivoFinal . '" se ha subido correctamente.<br>';
					} else {
						//echo '<script>alert("Error al subir el archivo' . $NombreArchivoFinal . ', Volver a Subirlo");</script>';
						//exit();
					}
					$Contador++;
				}
			}

			return $ArregloDocumentos;
		} else {
			return 'No se han seleccionado archivos para subir.<br>';
		}
	}

	if ($_POST['citaAprobada'] == 1) {
		include 'guardarCita_Include.php';
	  }
	  

    $ID                    = $_POST['ID']; 

    $idusuario                    = $_POST['ID'];          

    $pacienteId            = $_POST['clienteId']; //Paciente
    $usuarioid         	   = $_POST['usuario_Id']; //Usuario

    $fechar                = date("Y-m-d");
    $Afechar               = date("Y-m-d H:i:s");
    $hora                  = date("H:i:s");

    //tipo de ecografia
    $tipo_eco = $_POST['tipo_ecografia'];





	$Campo1 = mysqli_query($conn3, "show COLUMNS from historiaClinica_ecografias WHERE Field = 'nombreEcografiaTilde';");
	$nrowCampo1 = mysqli_num_rows($Campo1);
	if ($nrowCampo1 == "0") {
		mysqli_query($conn3, "ALTER TABLE `historiaClinica_ecografias` ADD `nombreEcografiaTilde` TEXT NULL");
	}


echo '<br><br><br><br>--------------------------------------------------------------------'.$tipo_eco;
    if ($tipo_eco == 'Ecografia Obstetrica') 
    {

    	//datos iniciales de la ecografia obstétrica
	    $eco1	= $_POST['feto'];
	    $eco2	= $_POST['situacion'];
	    $eco3	= $_POST['presentacion'];
	    $eco4	= $_POST['posicion'];
	    $eco5	= $_POST['dorso'];

	    //Datos de biometria de ecografia obstetrica
	    
	    $eco6 	= $_POST['LCN'];
	    $eco7 	= $_POST['sem1'];
	    $eco8 	= $_POST['DBP'];
	    $eco9 	= $_POST['sem2'];
	    $eco10 	= $_POST['AC'];
	    $eco11	= $_POST['sem3'];
	    $eco12	= $_POST['SG'];
		$eco13	= $_POST['sem4'];
	    $eco14	= $_POST['HC'];
	    $eco15	= $_POST['sem5'];
	    
	    $eco16	= $_POST['LF'];
	    $eco17	= $_POST['sem6'];
	    $eco18	= $_POST['VV'];
	    $eco19	= $_POST['sem7'];

	    $eco20	= $_POST['ponderado_f'];
	    $eco21	= $_POST['percentil'];
	    $eco22	= $_POST['espesor'];
	    $eco23	= $_POST['circulacion_cordon'];
	    $eco24	= $_POST['frecuencia_cardiaca'];
	    $eco25	= $_POST['liquido_amniotico'];
	    $eco26	= $_POST['placenta'];
	    $eco27	= $_POST['grado'];
	    $eco28	= $_POST['malformaciones_fetales'];
	    $eco29	= $_POST['sexo'];
	    $eco30	= $_POST['fechaParto'];

	    //conlusiones 
	    
	    $eco31	= $_POST['conclusion'];
	    $eco32	= $_POST['abono'];
		$eco33	= $_POST['diagnostico'];

		$Utero = $_POST['Utero_C'];
		$Endometrio = $_POST['Endometrio_C'];
		$Saco_Gestional = $_POST['Saco_Gestional_C'];
		$Embrion = $_POST['Embrion_C'];
		$Hallazgos = $_POST['Hallazgos_C'];
		$Diagnostico = $_POST['Diagnostico_C'];

		$CiclosEmbarazoTexto="";
		if (!empty($Utero) || !empty($Endometrio)) {
			$CiclosEmbarazoTexto .= '<tr>';
			if (!empty($Utero)) {
				$CiclosEmbarazoTexto .= '<td colspan="2">Útero: ' . $Utero . '</td>';
			}
			if (!empty($Endometrio)) {
				$CiclosEmbarazoTexto .= '<td colspan="2">Endometrio: ' . $Endometrio . '</td>';
			}
			$CiclosEmbarazoTexto .= '</tr>';
		}
		
		if (!empty($Saco_Gestional) || !empty($Embrion)) {
			$CiclosEmbarazoTexto .= '<tr>';
			if (!empty($Saco_Gestional)) {
				$CiclosEmbarazoTexto .= '<td colspan="2">Saco Gestacional: ' . $Saco_Gestional . '</td>';
			}
			if (!empty($Embrion)) {
				$CiclosEmbarazoTexto .= '<td colspan="2">Embrión: ' . $Embrion . '</td>';
			}
			$CiclosEmbarazoTexto .= '</tr>';
		}
		
		if (!empty($Hallazgos)) {
			$CiclosEmbarazoTexto .= '<tr>';
			$CiclosEmbarazoTexto .= '<td colspan="4">Hallazgos: ' . $Hallazgos . '</td>';
			$CiclosEmbarazoTexto .= '</tr>';
		}
		
		if (!empty($Diagnostico)) {
			$CiclosEmbarazoTexto .= '<tr>';
			$CiclosEmbarazoTexto .= '<td colspan="4">Diagnóstico: ' . $Diagnostico . '</td>';
			$CiclosEmbarazoTexto .= '</tr>';
		}
		
		if (!empty($CiclosEmbarazoTexto)) {
			$CiclosEmbarazoTexto = '<tr><td colspan="4" style="text-align:center;"><b>Ciclos de Embarazo</b></td></tr>' . $CiclosEmbarazoTexto;
		}


		$Datos = mysqli_real_escape_string($conn3,"<table class='table table-bordered'>
						<tr> 
							<td colspan='2'>Feto: $eco1 </td>
							<td colspan='2'> Situacion: $eco2 </td>
						</tr>
						<tr>
							<td colspan='2'> Presentacion: $eco3 </td>
							<td colspan='2'> Posicion: $eco4 </td>
						</tr>
						<tr>
							<td colspan='4'>Dorso: $eco5 </td>
						</tr>
						<tr>
							<th colspan='4' class='text-center'>Biométria</th>
						</tr>
						<tr>
							<td colspan='2'> LCN (mm): $eco6 </td>
							<td colspan='2'> Semanas: $eco7 </td>
						</tr>
						<tr>
							<td colspan='2'> DBP (mm): $eco8 </td>
							<td colspan='2'> Semanas: $eco9 </td>
						</tr>
						<tr>
							<td colspan='2'> AC (mm): $eco10 </td>
							<td colspan='2'> Semanas: $eco11 </td>
						</tr>
						<tr>
							<td colspan='2'> SG (mm): $eco12 </td>
							<td colspan='2'> Semanas: $eco13 </td>
						</tr>
						<tr>
							<td colspan='2'> HC (mm):  $eco14 </td>
							<td colspan='2'> Semanas: $eco15 </td>
						</tr>
						<tr>
							<td colspan='2'> LF (mm):  $eco16 </td>
							<td colspan='2'> Semanas: $eco17 </td>
						</tr>
						<tr>
							<td colspan='2'> VV (mm):  $eco18 </td>
							<td colspan='2'> Semanas: $eco19 </td>
						</tr>
							
						<tr>
							<td> Ponderado Fetal (+/- 10 % gr): $eco20 </td>
							<td> Percentil: $eco21 </td>
							<td> Espesor (mm): $eco22 </td>
							<td> Circular de cordón: $eco23 </td>
						</tr>

						<tr>
							<td> Frecuencia Cardíaca ( x min): $eco24 </td>
							<td> Líquido Amniótico ILA (cm): $eco25 </td>
							<td> Placenta: $eco26 </td>
							<td> Grado: $eco27 </td>
						</tr>

						<tr>
							<td> Malformaciones Fetales: $eco28 </td>
							<td> Sexo: $eco29 </td>
							<td colspan='2'> Fecha probable de parto: $eco30 </td>
						</tr>
						<tr>
							<td colspan='4'> Conclusiones:  $eco31 </td>
						</tr>
						<tr>
							<td colspan='4'> Abono:  $eco32 </td>
						</tr>




						$CiclosEmbarazoTexto


						</table>
						");


	    $eco33	= '';

	    $eco33	= '';


$cliente_id            = $_POST['clienteid'];           
        $usuario_id                    = $_POST['usuario_id'];                                  
        $descripcion          = $_POST['descripcion'];                                   
        //$activo                = 1;
        $Fecha                 = date("Y-m-d");

         



// Recibo los datos de la imagen1
$nombre_img = $_FILES['imagen1']['name'];
$tipo = $_FILES['imagen1']['type'];
$tamano = $_FILES['imagen1']['size'];
 
//Si existe imagen1 y tiene un tamaño correcto
if (($nombre1_img == !NULL) && ($_FILES['imagen1']['size'] <= 10000000)) 
{
   
   //indicamos los formatos que permitimos subir a nuestro servidor
   if (($_FILES["imagen1"]["type"] == "image/gif")
    || ($_FILES["imagen1"]["type"] == "image/jpeg")
    || ($_FILES["imagen1"]["type"] == "image/jpg")
    || ($_FILES["imagen1"]["type"] == "image/png")
    || ($_FILES["imagen1"]["type"] == "image/bmp"))
   {
      // Ruta donde se guardarán las imágenes que subamos
      $directorio = $_SERVER['DOCUMENT_ROOT'].'/baseEcuador/upload/';
      echo       $directorio;
      // Muevo la imagen1 desde el directorio temporal a nuestra ruta indicada anteriormente
      move_uploaded_file($_FILES['imagen1']['tmp_name'],$directorio.$nombre_img);
    } 
   
}  
 

 



	    $eco34	= $_POST['imagen2'];
	    $eco35	= $_POST['imagen3'];

		
	    $eco36	= mysqli_real_escape_string($conn3,$_POST['diagnostico']);

	    //Datos iniciales de la ecografia
	    if(strlen($eco1) > 1){$eexp1= '<table class="table table-bordered"><tr> <td>Feto: '.$eco1.'</td>';}
	    if(strlen($eco2) > 1){$eexp2= '<td>Situacion: '.$eco2.'</td>';}
	    if(strlen($eco3) > 1){$eexp3= '<td>Presentacion: '.$eco3.'</td>';}
	    if(strlen($eco4) > 1){$eexp4= '<td>Posicion: '.$eco4.'</td></tr>';}
	    if(strlen($eco5) > 1){$eexp5= '<tr> <td colspan="4">Dorso: '.$eco5.'</td></tr><tr><th colspan="4" class="text-center">Biométria</th></tr>';}
	    //aqui hacemos un salto de linea para el pdf cuando se muestre

	    //comparamos los datos de biometria
	    if(strlen($eco6) > 1){$eexp6= '<td>LNC(mm): '.$eco6.'</td>';}else{$eexp6= '<td>   </td>';}
	    if(strlen($eco7) > 1){$eexp7= '<td>Semana: '.$eco7.'</td>';}else{$eexp7= '<td>     </td>';} 
	    if(strlen($eco8) > 1){$eexp8= '<tr><td>DBP(mm): '.$eco8.'</td>';}else{$eexp8= '<td>     </td>';}
        if(strlen($eco9) > 1){$eexp9= '<td>Semanas: '.$eco9.'</td></tr>';}else{$eexp9= '<td>     </td></tr>';}

	  if(strlen($eco12) > 1){$eexp12= '<tr><td>SG(mm): '.$eco12.'</td>';}else{$eexp12= '<tr>   </td>';}
	    if(strlen($eco11) > 1){$eexp11= '<td>Semana: '.$eco11.'</td>';} else{$eexp12= '<tr>   </td>';}
	     if(strlen($eco14) > 1){$eexp14= '<tr><td>HC(mm): '.$eco14.'</td>';}else{$eexp14= '<tr>   </td>';}
	   	 if(strlen($eco13) > 1){$eexp13= '<td>Semanas: '.$eco13.'</td></tr>';}else{$eexp13= '<tr>   </td></tr>';}

	  	if(strlen($eco10) > 1){$eexp33= '<tr><td>   </td>';}else{$eexp33= '<tr>   </td>';}
	    if(strlen($eco10) > 1){$eexp34= '<td>    </td>';}   else{$eexp34= '<tr>   </td>';}
	    if(strlen($eco10) > 1){$eexp10= '<tr><td>AC(mm):  '.$eco10.'</td>';}else{$eexp10= '<tr>   </td>';}
	    if(strlen($eco17) > 1){$eexp17= '<td>Semanas: '.$eco17.'</td></tr>';}else{$eexp17= '<tr>   </td></tr>';}

        if(strlen($eco18) > 1){$eexp18= '<tr><td>VV(mm): '.$eco18.'</td>';}else{$eexp18= '<tr>   </td>';}
	    if(strlen($eco19) > 1){$eexp19= '<td> Semana: '.$eco19.'</td>';}else{$eexp19= '<tr>   </td>';}
	    if(strlen($eco16) > 1){$eexp16= '<tr><td>LF(mm): '.$eco16.'</td>';}else{$eexp16= '<tr>   </td>';}
	     if(strlen($eco19) > 1){$eexp19= '<td> Semanas: '.$eco19.'</td>';}else{$eexp19= '<tr>   </td></tr>';}
	  // donde esta aqui

	    

	    //Datos extras de Biometria
	    
	    if(strlen($eco20) > 1){$eexp20= '<tr><th colspan="4"></th></tr> 
	    								<tr><td>Ponderado Fetal: '.$eco20.'</td>';}else{$eexp20= '<tr>   </td>';}
	    if(strlen($eco21) > 1){$eexp21= '<td>Percentil: '.$eco21.'</td>';}else{$eexp21= '<tr>   </td>';}
	    
	    if(strlen($eco23) > 1){$eexp23= '<td>Circular del Cordón: '.$eco23.'</td>';}else{$eexp23= '<tr>   </td>';}

	    if(strlen($eco24) > 1){$eexp24= '<td>Frecuencia Cardiáca(x min):  '.$eco24.'</td></tr>';}else{$eexp24= '<tr>   </td></tr>';}
	    if(strlen($eco25) > 1){$eexp25= '<tr><td>Líquido Amniótico ILA (cm): '.$eco25.'</td>';}else{$eexp25= '<tr>   </td>';}
	    if(strlen($eco26) > 1){$eexp26= '<td>Placenta: '.$eco26.'</td>';}else{$eexp26= '<tr>   </td>';}
	    if(strlen($eco22) > 1){$eexp22= '<td>Espesor(mm): '.$eco22.'</td>';}else{$eexp22= '<tr>   </td>';}
	    if(strlen($eco27) > 1){$eexp27= '<td>Grado: '.$eco27.'</td></tr>';}else{$eexp27= '<tr>   </td></tr>';}

	    if(strlen($eco28) > 1){$eexp28= '<tr><td>Malformaciones Fetales: '.$eco28.'</td>';}else{$eexp28= '<tr>   </td>';}
	    if(strlen($eco29) > 1){$eexp29= '<td>Sexo: '.$eco29.'</td>';}else{$eexp29= '<tr>   </td>';}
	    if(strlen($eco30) > 1){$eexp30= '<td colspan="2">Fecha probable de parto: '.$eco30.'</td></tr>';}else{$eexp30= '<tr>   </td>';}

	    if(strlen($eco31) > 1){$eexp31= '<tr><th colspan="4"></th></tr>
	    								 <tr><td colspan="4">Conclusiones: '.$eco31.'</td></tr>';}else{$eexp31= '<tr>   </td>';}
	    if(strlen($eco32) > 1){$eexp32= '<tr><td colspan="4">Abono: '.$eco32.'</td></tr>';}else{$eexp32= '<tr>   </td>';}


		$tipo_ecotilde = "Ecografía Obstétrica";//agregar el nombre de la historia con tildes


	    $ecografia_obstetrica=$eexp1.$eexp2.$eexp3.$eexp4.$eexp5.$eexp6.$eexp7.$eexp8.$eexp9.$eexp14.$eexp13.$eexp10.$eexp17.$eexp16.$eexp19.$eexp20.$eexp21.$eexp23.$eexp24.$eexp25.$eexp26.$eexp22.$eexp27.$eexp28.$eexp29.$eexp30.$eexp31.$eexp32.'</td></tr></table>';
		/*
    	mysqli_query($conn3,"
    		INSERT INTO historiaClinica_ecografias (cliente_id,usuario_id,Fecha,Hora,ecografiaDetalle,diagnostico,nombreEcografia)
    		VALUES ('$pacienteId','$ID','$fechar','$hora','$ecografia_obstetrica','$eco36','$tipo_eco')");*/
		

///////////////////////////////////// Ciclos Embarazo //////////////////////////////////











$query = "INSERT INTO historiaClinica_ecografias (cliente_id,usuario_id,Fecha,Hora,ecografiaDetalle,diagnostico,nombreEcografia,nombreEcografiaTilde)
    		VALUES ($pacienteId,$ID,$fechar,$hora,$Datos,$eco36,$tipo_eco,$tipo_ecotilde);";
$enlace_actual = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$enlace_actual = str_replace('.php', '', $enlace_actual);

auditorMaster($idusuario, '1', $enlace_actual, $query);
			
			mysqli_query($conn3,"
    		INSERT INTO historiaClinica_ecografias (cliente_id,usuario_id,Fecha,Hora,ecografiaDetalle,diagnostico,nombreEcografia,nombreEcografiaTilde)
    		VALUES ('$pacienteId','$ID','$fechar','$hora','$Datos','$eco36','$tipo_eco','$tipo_ecotilde')");

/*
echo $ecografia_obstetrica;
*/
$historiaClinica1 = mysqli_insert_id($conn3);

if($historiaClinica1!="0" AND $historiaClinica1!=""){

		$DatosDocumentos = CargarDocumentos_DocumentosSistema_Ecografias($ID, $_FILES['ImagenesHistoriaEcografias'], "Ecografias");

		foreach ($DatosDocumentos as $key => $value) {

			$Doc_Nombre = $value["Nombre"];
			$Doc_Nombre_Original = $value["Nombre_Original"];
			$Doc_Ruta = $value["Ruta"];
			$Doc_Carpeta = $value["Carpeta"];
			$Tabla = "historiaClinica_ecografias";
			$tabla_id = $historiaClinica1;
			$Doc_usuario_id = $value["usuario_id"];
			$Campo_Input="ImagenesHistoriaEcografias";
			//insert en la tabla de arriba
			
			$Respuesta = mysqli_query($conn3,"INSERT INTO archivos (cliente_id,usuario_id,historia_id,codigo,fecha, NombreVisual,Realizado_Desde,Campo_Input) VALUES   ('$pacienteId', '$Doc_usuario_id','$historiaClinica1','$Doc_Nombre','$Fecha', '$Doc_Nombre_Original','historiaClinica_ecografias','ImagenesHistoriaEcografias')");

			if ($Respuesta != true) {
				echo "<script> alert('Error al insertar un documento $Doc_Nombre_Original')</script>";
			}
		} 
}


 $codigo2=$_POST['archivo'];


      //$contador2=count($codigo2); 




 foreach($_FILES["archivo"]['tmp_name'] as $key => $tmp_name)
    {
        //Validamos que el archivo exista
        if($_FILES["archivo"]["name"][$key]) {

			$numeroAleatorio = rand(1, 99999999);
            $fechaHoyNumerica = date("Ymd");

            $Ran = $numeroAleatorio."-".$fechaHoyNumerica;
            $filename = $Ran."-".$_FILES["archivo"]["name"][$key];

            //$filename = $_FILES["archivo"]["name"][$key]; //Obtenemos el nombre original del archivo
            $source = $_FILES["archivo"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
            
            $directorio = 'archivos/'; //Declaramos un  variable con la ruta donde guardaremos los archivos
            
            //Validamos si la ruta de destino existe, en caso de no existir la creamos
            if(!file_exists($directorio)){
                mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");    
            }
            
            $dir=opendir($directorio); //Abrimos el directorio de destino
            $target_path = $directorio.'/'.$filename; //Indicamos la ruta de destino, así como el nombre del archivo
            
            //Movemos y validamos que el archivo se haya cargado correctamente
            //El primer campo es el origen y el segundo el destino
            if(move_uploaded_file($source, $target_path)) { 
                echo "El archivo $filename se ha almacenado en forma exitosa.<br>";
                } else {    
                echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
            }
            closedir($dir); //Cerramos el directorio de destino

			$descripcion = mysqli_real_escape_string($conn3,$descripcion);
			mysqli_query($conn3,"INSERT INTO archivos (cliente_id,usuario_id,historia_id,codigo,fecha, NombreVisual,descripcion,Realizado_Desde) VALUES   ('$pacienteId', '$usuario_id','$historiaClinica1','$filename','$Fecha', '$filename','$descripcion','historiaClinica_ecografias')");  

			echo '<br>-------<br>';
			echo "INSERT INTO archivos (cliente_id,usuario_id,historia_id,codigo,fecha, descripcion) VALUES   ('$pacienteId', '$usuario_id','$historiaClinica1','$filename','$Fecha', '$descripcion')";  

        }
 





    
 


    }

    







}

    
  elseif ($tipo_eco == 'Ecografia Genetica') 
    {


echo 'Ecografia Genetica Ecografia Genetica Ecografia Genetica Ecografia Genetica';
    	//datos iniciales de la ecografia obstétrica
	    $ec1	= $_POST['fecha'];
	    $ec2	= $_POST['edadgestacional'];
	    $ec3	= $_POST['condiciones'];
	    $ec4	= $_POST['tipogestacion'];
	    $ec5	= $_POST['corionicidad'];  
	    $ec6 	= $_POST['descripcion'];
	    $ec7 	= $_POST['medidas'];
	    $ec8 	= $_POST['volumen'];
	    $ec9	= $_POST['descripcion1'];
	    $ec10 	= $_POST['medida'];
	    $ec11	= $_POST['volume'];
	    $ec12	= $_POST['aspecto'];
	    $ec13	= $_POST['numerofoliculos'];
	    $ec14	= $_POST['tamañafoliculo'];
	    $ec15	= $_POST['hallazgos'];
	    $ec16	= $_POST['medida1'];
	    $ec17	= $_POST['volume1'];
	    $ec18	= $_POST['aspecto1'];
	    $ec19	= $_POST['numerofoliculos1'];

	    $ec20	= $_POST['tamañafoliculo1'];
	    $ec21	= $_POST['hallazgos1"'];
	    $ec22	= $_POST['medida2'];
	    $ec23	= $_POST['bordes'];
	    $ec24	= $_POST['localizacion'];
	    $ec25	= $_POST['reaccion'];
	    $ec26	= $_POST['hematomas'];
	    $ec27	= $_POST['formas'];
	    $ec28	= $_POST['medida3'];
	    $ec29	= $_POST['semanas'];
	    $ec30	= $_POST['polocefalico'];
	    $ec31	= $_POST['forma'];
	    $ec32	= $_POST['osificacion'];
        $ec33	= $_POST['lineamedia'];
	    $ec34	= $_POST['plexos'];
	    $ec35	= $_POST['orbitas"'];
	    $ec36	= $_POST['perfil'];
	    $ec37	= $_POST['micrognatia'];
	    $ec38	= $_POST['areap'];
	    $ec39	= $_POST['diagfragma"'];
	    $ec40	= $_POST['actividadc'];
	    $ec41	= $_POST['tamaño'];
	    $ec42	= $_POST['axis'];
        $ec43	= $_POST['imagen'];
	    $ec44	= $_POST['estomago'];
	    $ec45	= $_POST['riñon'];
	    $ec46	= $_POST['vejiga'];
	    $ec47	= $_POST['vasos'];
	    $ec48	= $_POST['cordon'];
	    $ec49	= $_POST['extre'];
	    $ec50	= $_POST['humero'];
	    $ec51	= $_POST['femur'];

        $ec52	= $_POST['liquido'];
	    $ec53	= $_POST['vesicula'];
	    $ec54	= $_POST['nucal'];
	    $ec55	= $_POST['hueso'];
	    $ec56	= $_POST['valorhueso'];
	    $ec57	= $_POST['velocidad'];
	    $ec58	= $_POST['angulo'];
	    $ec59	= $_POST['formah'];
	    $ec60	= $_POST['velocidad1'];
	    $ec61	= $_POST['angulo1'];
        $ec62	= $_POST['forma1'];
        $ec63	= $_POST['diagnostico'];
        $ec64	= $_POST['frontom'];

        $descripcion          = $_POST['descripcion'];  

       


/////////////////////////////////////////
	   

	    //Datos iniciales de la ecografia
	    if(strlen($ec1) > 1){$exp1= '<td>FUM: '.$ec1.'</td>';}
	    if(strlen($ec2) > 1){$exp2= '<td>Edad Gestacional Proyectada: '.$ec2.'</td>';}
	    if(strlen($ec3) > 1){$exp3= '<td>VCondiciones donde se realiza el estudio: '.$ec3.'</td>';}
	    if(strlen($ec4) > 1){$exp4= '<td>Tipo de Gestación:'.$ec4.'</td>';}
	    if(strlen($ec5) > 1){$exp5= '<td>Corionicidad:'.$ec5.'</td></tr><tr><th colspan="4" class="text-center">Útero</th></tr>';}
	   
	    //aqui hacemos un salto de linea para el pdf cuando se muestre

	  
	    if(strlen($ec6) > 1){$exp6= '<tr><td>Descripción: '.$ec6.'</td>';}
	    if(strlen($ec7) > 1){$exp7= '<td>Medidas: '.$ec7.'</td>';}
	    if(strlen($ec8) > 1){$exp8= '<td>Volumen: '.$ec8.'</td>';}
	    if(strlen($ec9) > 1){$exp9= '<td>Fondo del saco: '.$ec9.'</td></tr><tr><th colspan="4" class="text-center">Ovario Derecho </th></tr>';}else{$exp9= '<td>   </td></tr><tr><th colspan="4" class="text-center">Ovario Derecho</th></tr>';}

	    if(strlen($ec10) > 1){$exp10= '<tr><td>Medidas:  '.$ec10.'</td>';}
	    if(strlen($ec11) > 1){$exp11= '<td>Volumen: '.$ec11.'</td>';}
	    if(strlen($ec12) > 1){$exp12= '<td>Aspecto: '.$ec12.'</td></tr>';}
	    if(strlen($ec13) > 1){$exp13= '<tr><td>Número de Folículos: '.$ec13.'</td>';}
	    if(strlen($ec14) > 1){$exp14= '<td>Tamaño del Folículo Mayor: '.$ec14.'</td>';}
	    if(strlen($ec15) > 1){$exp15= '<td>Hallazgos: '.$ec15.'</td></tr><tr><th colspan="4" class="text-center">Ovario Izquierdo</th></tr>';}else{$exp15= '<td>   </td></tr><tr><th colspan="4" class="text-center">Ovario Izquierdo</th></tr>';}

        if(strlen($ec16) > 1){$exp16= '<tr><td>Medidas:  '.$ec16.'</td>';}
	    if(strlen($ec17) > 1){$exp17= '<td>Volumen: '.$ec17.'</td>';}
	    if(strlen($ec18) > 1){$exp18= '<td>Aspecto: '.$ec18.'</td></tr>';}
	    if(strlen($ec19) > 1){$exp19= '<tr><td>Número de Folículos: '.$ec19.'</td>';}
	    if(strlen($ec20) > 1){$exp20= '<td>Tamaño del Folículo Mayor: '.$ec20.'</td>';}
	    if(strlen($ec21) > 1){$exp21= '<td>Hallazgos1: '.$ec21.'</td></tr><tr><th colspan="4" class="text-center">Saco Gestacional</th></tr>';}else{$exp21= '<td>   </td></tr><tr><th colspan="4" class="text-center">Saco Gestacional</th></tr>';}


        if(strlen($ec22) > 1){$exp22= '<tr><td>Medidas en mm/Semanas/Dias:  '.$ec22.'</td>';}
	    if(strlen($ec23) > 1){$exp23= '<td>Bordes: '.$ec23.'</td>';}
	    if(strlen($ec24) > 1){$exp24= '<td>Localización: '.$ec24.'</td></tr>';}
	    if(strlen($ec25) > 1){$exp25= '<tr><td>Reacción coriodecidual: '.$ec25.'</td>';}
	    if(strlen($ec26) > 1){$exp26= '<td>Hematomas: '.$ec26.'</td>';}
	    if(strlen($ec27) > 1){$exp27= '<td>Formas: '.$ec27.'</td></tr><tr><th colspan="4" class="text-center">Embrión</th></tr>';}else{$exp27= '<td>   </td></tr><tr><th colspan="4" class="text-center">Embrión</th></tr>';}


	    if(strlen($ec28) > 1){$exp28= '<tr><td>Medidas mm LCN: '.$ec28.'</td>';}
	    if(strlen($ec29) > 1){$exp29= '<td>Correspondientas a: '.$ec29.'</td>';}
	    if(strlen($ec30) > 1){$exp30= '<td>Polo cefálico: '.$ec30.'</td></tr>';}

	    if(strlen($ec31) > 1){$exp31= ' <tr><td>Forma el Cranéo: '.$ec31.'</td>';}								
	    if(strlen($ec32) > 1){$exp32= '<td>Osificación Craneal:: '.$ec32.'</td>';}
        if(strlen($ec33) > 1){$exp33= '<td>Línea Media del Craneo: '.$ec33.'</td></tr>';}

        if(strlen($ec34) > 1){$exp34= '<tr><td>Plexos Coroideos:'.$ec34.'</td>';}								
	    if(strlen($ec35) > 1){$exp35= '<td>Orbitas del rostro: '.$ec35.'</td>';}
        if(strlen($ec36) > 1){$exp36= '<td>Perfil del Rostro: '.$ec36.'</td></tr>';}

        if(strlen($ec37) > 1){$exp37= ' <tr><td>Micrognatia::'.$ec37.'</td>';}								
	    if(strlen($ec38) > 1){$exp38= '<td>Área Pulmonar: '.$ec38.'</td>';}
        if(strlen($ec39) > 1){$exp39= '<td>Diagfragma : '.$ec39.'</td></tr>';}

        if(strlen($ec40) > 1){$exp40= '<tr><td>Actividad Cardiaca:'.$ec40.'</td>';}								
	    if(strlen($ec41) > 1){$exp41= '<td>Tamaño '.$ec41.'</td>';}
        if(strlen($ec42) > 1){$exp42= '<td>Axis Cardiaco:'.$ec42.'</td></tr>';}

        if(strlen($ec43) > 1){$exp43= '<tr><td>Imagen de cuatro cámaras::'.$ec43.'</td>';}								
	    if(strlen($ec44) > 1){$exp44= '<td>Estomago:'.$ec44.'</td>';}
        if(strlen($ec45) > 1){$exp45= '<td>Riñon:'.$ec45.'</td></tr>';}

        if(strlen($ec46) > 1){$exp46= '<tr><td>Vegiga:'.$ec46.'</td>';}							
	    if(strlen($ec47) > 1){$exp47= '<td>Vasos umbilicales:'.$ec47.'</td>';}
        if(strlen($ec48) > 1){$exp48= '<td>Inserción de cordón en pared abdominal:'.$ec48.'</td></tr>';}

        if(strlen($ec49) > 1){$exp49= '<tr><td>Extremidades:'.$ec49.'</td>';}								
	    if(strlen($ec50) > 1){$exp50= '<td>Humero:'.$ec50.'</td>';}
        if(strlen($ec51) > 1){$exp51= '<td>Femúr:'.$ec51.'</td></tr>';}


        if(strlen($ec52) > 1){$exp52= '<tr><td>Liquido Amniótico:'.$ec52.'</td>';}								
	    if(strlen($ec53) > 1){$exp53= '<td>Vesicula Vitelina:'.$ec53.'</td></tr><tr><th colspan="4" class="text-center">Traslucencia Nucal</th></tr>';}else{$exp53= '<td>   </td></tr><tr><th colspan="4" class="text-center">Traslucencia</th></tr>';}


        if(strlen($ec54) > 1){$exp54= '<tr><td> Valor en ( N < 2.5mm )'.$ec54.'</td></tr><tr><th colspan="4" class="text-center">Hueso Nasal</th></tr>';}else{$exp54= '<td>   </td></tr><tr><th colspan="4" class="text-center">Hueso Nasal</th></tr>';}

        if(strlen($ec55) > 1){$exp55= '<tr><td>Existencia:'.$ec55.'</td>';}								
	    if(strlen($ec56) > 1){$exp56= '<td>( P95.N 2.1 – 2.7mm):'.$ec56.'</td></tr><tr><th colspan="4" class="text-center">DUCTUS VENOSO</th></tr>';}else{$exp56= '<td>   </td></tr><tr><th colspan="4" class="text-center">Ductus veneso</th></tr>';}

        if(strlen($ec57) > 1){$exp57= '<tr><td> Velocidad: ( > 80cm/seg):'.$ec57.'</td>';}								
	    if(strlen($ec58) > 1){$exp58= '<td>Angulo ( <30°):'.$ec58.'</td>';}
        if(strlen($ec59) > 1){$exp59= '<td>Forma(Trifásica):'.$ec59.'</td></tr><tr><th colspan="4" class="text-center">FLUJO TRICUSPIDEO</th></tr>';}else{$exp59= '<td>   </td></tr><tr><th colspan="4" class="text-center">Flujo Tricuspido</th></tr>';}

        if(strlen($ec60) > 1){$exp60= '<tr><td> Velocidad: ( > 80cm/seg):'.$ec60.'</td>';}								
	    if(strlen($ec61) > 1){$exp61= '<td>Angulo ( <30°):'.$ec61.'</td>';}
        if(strlen($ec62) > 1){$exp62= '<td>Forma(Trifásica):'.$ec62.'</td></tr><tr><th colspan="4" class="text-center">ANGULO FRONTO MAXILAR(N 77 – 85°)</th></tr>';}else{$exp62= '<td>   </td></tr><tr><th colspan="4" class="text-center">Angulo fronto Maxilar</th></tr>';}

        if(strlen($ec64) > 1){$exp64= '<tr><td> Descripción:'.$ec64.'';}



	    $ecografia_genetica= '<table class="table table-bordered"><tr>'.$exp1.$exp2.$exp3.$exp4.$exp5.$exp6.$exp7.$exp8.$exp9.$exp10.$exp11.$exp12.$exp13.$exp14.$exp15.$exp16.$exp17.$exp18.$exp19.$exp20.$exp21.$exp22.$exp23.$exp24.$exp25.$exp26.$exp27.$exp28.$exp29.$exp30.$exp31.$exp32.$exp33.$exp34.$exp35.$exp36.$exp37.$exp38.$exp39.$exp40.$exp41.$exp42.$exp43.$exp44.$exp45.$exp46.$exp47.$exp48.$exp49.$exp50.$exp51.$exp52.$exp53.$exp54.$exp55.$exp56.$exp57.$exp58.$exp59.$exp60.$exp61.$exp62.$exp64.='</td></tr></table>';

$query = "INSERT INTO historiaClinica_ecografias (cliente_id,usuario_id,Fecha,Hora,ecografiaDetalle,diagnostico,nombreEcografia)
    		VALUES ($pacienteId,$ID,$fechar,$hora,$ecografia_genetica,$ec63,$tipo_eco);";
$enlace_actual = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$enlace_actual = str_replace('.php', '', $enlace_actual);

auditorMaster($idusuario, '1', $enlace_actual, $query);


    	mysqli_query($conn3,"
    		INSERT INTO historiaClinica_ecografias (cliente_id,usuario_id,Fecha,Hora,ecografiaDetalle,diagnostico,nombreEcografia)
    		VALUES ('$pacienteId','$ID','$fechar','$hora','$ecografia_genetica','$ec63','$tipo_eco')");


echo "INSERT INTO historiaClinica_ecografias (cliente_id,usuario_id,Fecha,Hora,ecografiaDetalle,diagnostico,nombreEcografia)
    		VALUES ('$pacienteId','$ID','$fechar','$hora','$ecografia_genetica','$ec63','$tipo_eco')";

    	$con=mysqli_query($conn3,"SELECT MAX(ID) as max FROM historiaClinica_ecografias ");
    	$resu=mysqli_fetch_assoc($con);
    	$historiaClinica1=$resu['max'];







          $codigo3=$_POST['archivo'];
       

      //$contador3=count($codigo3); 





 foreach($_FILES["archivo"]['tmp_name'] as $key => $tmp_name)
    {
        //Validamos que el archivo exista
        if($_FILES["archivo"]["name"][$key]) {
            $filename = $_FILES["archivo"]["name"][$key]; //Obtenemos el nombre original del archivo
            $source = $_FILES["archivo"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
            
            $directorio = 'archivos/'; //Declaramos un  variable con la ruta donde guardaremos los archivos
            
            //Validamos si la ruta de destino existe, en caso de no existir la creamos
            if(!file_exists($directorio)){
                mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");    
            }
            
            $dir=opendir($directorio); //Abrimos el directorio de destino
            $target_path = $directorio.'/'.$filename; //Indicamos la ruta de destino, así como el nombre del archivo
            
            //Movemos y validamos que el archivo se haya cargado correctamente
            //El primer campo es el origen y el segundo el destino
            if(move_uploaded_file($source, $target_path)) { 
                echo "El archivo $filename se ha almacenado en forma exitosa.<br>";
                } else {    
                echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
            }
            closedir($dir); //Cerramos el directorio de destino
        }
 




    mysqli_query($conn3,"INSERT INTO archivos (cliente_id,usuario_id,historia_id,codigo,fecha, descripcion) VALUES   ('$pacienteId', '$ID', '$historiaClinica1','$filename','$fechar', '$descripcion')");  


echo "INSERT INTO archivos (cliente_id,usuario_id,historia_id,codigo,fecha, descripcion) VALUES   ('$pacienteId', '$ID', '$historiaClinica1','$filename','$fechar', '$descripcion')";  


    }










$contador=$_POST['uploader_count'];


for ($i=0; $i <$contador ; $i++) { 
    $nomb=$_POST['uploader_'.$i.'_name'];

    mysqli_query($conn3,"INSERT INTO imgEcografia (idHistoria, imagen) VALUE
    ('$historiaClinica1','$nomb');");
    
		}



    }
    


elseif ($tipo_eco == 'Ecografia Ginecologica') 
    {


echo 'Ecografia Genetica Ecografia Genetica Ecografia Genetica Ecografia Genetica';
    	//datos iniciales de la ecografia ianecologicg
	    $ecog1	= $_POST['distanica'];
	    $ecog7 	= $_POST['medidas'];
	    $ecog8 	= $_POST['volumen'];
	    $ecog9	= $_POST['descripcion1'];
	    $ecog10 = $_POST['medida'];
	    $ecog11	= $_POST['volume'];
	    $ecog12	= $_POST['aspecto'];
	    $ecog13	= $_POST['posicion'];
	    $ecog14	= $_POST['numerofoliculos'];
	    $ecog15	= $_POST['tamañafoliculo'];
	    $ecog16	= $_POST['masa'];  
        $ecog17	= $_POST['tumor'];
        $ecog18	= $_POST['ascitis'];
$ecog19	= $_POST['proyecciones'];
$ecog20	= $_POST['multilocular'];
$ecog21	= $_POST['vascularizacion'];
$ecog22	= $_POST['unilocular'];
$ecog23	= $_POST['componente'];
$ecog24	= $_POST['sombra'];
$ecog25	= $_POST['tumormutilocular'];
$ecog26	= $_POST['vascularizaciona'];
$ecog27	= $_POST['medida1'];
$ecog28	= $_POST['volume1'];
$ecog29	= $_POST['aspecto1'];
$ecog30	= $_POST['posicion1'];
$ecog31	= $_POST['numerofoliculos1'];
$ecog32	= $_POST['tamañafoliculo1'];
$ecog33	= $_POST['masa1'];
$ecog34	= $_POST['tumor1'];
$ecog35	= $_POST['ascitis1'];
$ecog36	= $_POST['proyecciones1'];
$ecog37	= $_POST['multilocular1'];
$ecog38	= $_POST['vascularizacion1'];
$ecog39	= $_POST['unilocular1'];
$ecog40	= $_POST['componente1'];
$ecog41	= $_POST['sombra1'];
$ecog42	= $_POST['tumormutilocular1'];
$ecog43	= $_POST['vascularizaciona1'];
$ecog44	= $_POST['premenopausica'];
$ecog45	= $_POST['PostMenopausica'];
$ecog46	= $_POST['PostProgesteron'];
$ecog47	= $_POST['postrh'];
$ecog48	= $_POST['grosor'];
$ecog49	= $_POST['sangradovaginal'];
$ecog50	= $_POST['medida2'];
$ecog51	= $_POST['liquidouterino'];
$ecog2	= $_POST['medida3'];
$ecog52	= $_POST['intracavitaria'];
$ecog53	= $_POST['medida4'];
$ecog54	= $_POST['extendida'];
$ecog55	= $_POST['localizada'];
$ecog56	= $_POST['Hiperecogenica'];
$ecog57	= $_POST['IsoEcogenica'];
$ecog58	= $_POST['HipoEcogenica'];
$ecog59	= $_POST['formauni'];
$ecog60	= $_POST['nouniforme'];
$ecog61	= $_POST['Interface'];
$ecog62	= $_POST['Regular'];
$ecog63	= $_POST['Irregular'];
$ecog64	= $_POST['Interrumpida'];
$ecog65	= $_POST['nodefinida'];
$ecog66	= $_POST['margen'];
$ecog67	= $_POST['relacion'];
$ecog68	= $_POST['patron'];
$ecog69	= $_POST['distanciatc'];
$ecog70	= $_POST['indice'];
$ecog71	= $_POST['velocidad'];
$ecog72	= $_POST['Sinequias'];
$ecog73	= $_POST['diagnostico'];

$descripcion          = $_POST['descripcion'];  

       

         


/////////////////////////////////////////
	   

	    //Datos iniciales de la ecografia
	   
	   
	    if(strlen($ecog1) > 1){$ex1= '<td>Distancia Fondo Cérvix: '.$ecog1.'</td>';}
	    if(strlen($ecog7) > 1){$ex7= '<td>Medidas: '.$ecog7.'</td>';}
	    if(strlen($ecog8) > 1){$ex8= '<td>Volumen: '.$ecog8.'</td></tr><tr><th colspan="4" class="text-center">II. Fondo del saco </th></tr>';}
	  
	if(strlen($ecog9) > 1){$ex9= '<tr><td>Descripción: '.$ecog9.'</td></tr><tr><th colspan="4" class="text-center">III. Ovario Derecho </th></tr>';}

	    if(strlen($ecog10) > 1){$ex10= '<tr><td>Medidas: '.$ecog10.'</td>';}
	    if(strlen($ecog11) > 1){$ex11= '<td>Volumen: '.$ecog11.'</td>';}
	    if(strlen($ecog12) > 1){$ex12= '<td>Aspecto: '.$ecog12.'</td>';}
	    if(strlen($ecog13) > 1){$ex13= '<td>Pocisión:'.$ecog13.'</td></tr>';}

        if(strlen($ecog14) > 1){$ex14= '<tr><td>Número de Folículos: '.$ecog14.'</td>';}
	    if(strlen($ecog15) > 1){$ex15= '<td>Tamaño del Folículo Mayor: '.$ecog15.'</td>';}
	    if(strlen($ecog16) > 1){$ex16= '<td>Masa Anexial:'.$ecog16.'</td></tr><tr><th colspan="4" class="text-left">Maligno </th></tr>';}

	   if(strlen($ecog17) > 1){$ex17= '<tr><td> Tumor sólido contorno Irregular:'.$ecog17.'</td>';}
	    if(strlen($ecog18) > 1){$ex18= '<td>Ascitis: '.$ecog18.'</td>';}
	    if(strlen($ecog19) > 1){$ex19= '<td>Mayor Igual 4 proyecciones Papilares: '.$ecog19.'</td></tr>';}
	    if(strlen($ecog20) > 1){$ex20= '<tr><td>Tumor Multilocular > 10 cm :'.$ecog20.'</td>';}
	    if(strlen($ecog21) > 1){$ex21= '<td>Vascularización abundante: '.$ecog21.'</td></tr><tr><th colspan="4" class="text-left">Benigno</th></tr>';}

if(strlen($ecog22) > 1){$ex22= '<tr><td>Lesión Unilocular:'.$ecog22.'</td>';}
	    if(strlen($ecog23) > 1){$ex23= '<td>Componente sólido <7mm:'.$ecog23.'</td>';}
	    if(strlen($ecog24) > 1){$ex24= '<td>Sombra Acústica:'.$ecog24.'</td></tr>';}
	    if(strlen($ecog25) > 1){$ex25= '<tr><td>Tumor Multilocular >10 cm :'.$ecog25.'</td>';}
        if(strlen($ecog26) > 1){$ex26= '<td>Vascularización abundante: '.$ecog26.'</td></tr><tr><th colspan="4" class="text-center">IV.Ovario Izquierdo</th></tr>';}

 if(strlen($ecog27) > 1){$ex27= '<tr><td>Medidas: '.$ecog27.'</td>';}
	    if(strlen($ecog28) > 1){$ex28= '<td>Volumen: '.$ecog28.'</td>';}
	    if(strlen($ecog29) > 1){$ex29= '<td>Aspecto: '.$ecog29.'</td>';}
	    if(strlen($ecog30) > 1){$ex30= '<td>Pocisión:'.$ecog30.'</td></tr>';}

        if(strlen($ecog31) > 1){$ex31= '<tr><td>Número de Folículos: '.$ecog31.'</td>';}
	    if(strlen($ecog32) > 1){$ex32= '<td>Tamaño del Folículo Mayor: '.$ecog32.'</td>';}
	    if(strlen($ecog33) > 1){$ex33= '<td>Masa Anexial:'.$ecog33.'</td></tr><tr><th colspan="4" class="text-left">Maligno </th></tr>';}

	    if(strlen($ecog34) > 1){$ex34= '<tr><td> Tumor sólido contorno Irregular:'.$ecog34.'</td>';}
	    if(strlen($ecog35) > 1){$ex35= '<td>Ascitis: '.$ecog35.'</td>';}
	    if(strlen($ecog36) > 1){$ex36= '<td>Mayor Igual 4 proyecciones Papilares: '.$ecog36.'</td></tr>';}
	    if(strlen($ecog37) > 1){$ex37= '<tr><td>Tumor Multilocular > 10 cm :'.$ecog37.'</td>';}
	    if(strlen($ecog38) > 1){$ex38= '<td>Vascularización abundante: '.$ecog38.'</td></tr><tr><th colspan="4" class="text-left">Benigno</th></tr>';}

	    if(strlen($ecog39) > 1){$ex39= '<tr><td>Lesión Unilocular:'.$ecog39.'</td>';}
	    if(strlen($ecog40) > 1){$ex40= '<td>Componente sólido <7mm:'.$ecog40.'</td>';}
	    if(strlen($ecog41) > 1){$ex41= '<td>Sombra Acústica:'.$ecog41.'</td></tr>';}
	    if(strlen($ecog42) > 1){$ex42= '<tr><td>Tumor Multilocular >10 cm :'.$ecog42.'</td>';}
        if(strlen($ecog43) > 1){$ex43= '<td>Vascularización abundante: '.$ecog43.'</td></tr><tr><th colspan="4" class="text-center">V. Linea Endometrial </th></tr>';}

	    if(strlen($ecog44) > 1){$ex44= '<tr><td>Pre Menopausica:  '.$ecog44.'</td>';}
	    if(strlen($ecog45) > 1){$ex45= '<td>Post Menopausica: '.$ecog45.'</td>';}
	    if(strlen($ecog46) > 1){$ex46= '<td>Post Progesterona: '.$ecog46.'</td></tr>';}
	    if(strlen($ecog47) > 1){$ex47= '<tr><td>Post TRH: '.$ecog47.'</td>';}
	    if(strlen($ecog48) > 1){$ex48= '<td>Grosor de la linea Endometrial: '.$ecog48.'</td>';}
	    if(strlen($ecog49) > 1){$ex49= '<td>Presencia de sangrado vaginal: '.$ecog49.'</td>';}
        if(strlen($ecog50) > 1){$ex50= '<td>Medidas sangrado vaginal:  '.$ecog50.'</td>/tr>';}
	    if(strlen($ecog51) > 1){$ex51= '<tr><td>Liquido Centro de Cavidad Uterina : '.$ecog51.'</td>';}
	    if(strlen($ecog2) > 1){$ex2= '<td>Medidas liquido cavidad uterina: '.$ecog2.'</td>';}
	    if(strlen($ecog52) > 1){$ex52= '<td>Lesión Intracavitaria : '.$ecog52.'</td>';}
	    if(strlen($ecog53) > 1){$ex53= '<td>Medidas Lesion Intercavitaria: '.$ecog53.'</td>';}
	    if(strlen($ecog54) > 1){$ex54= '<td>Extendida >= 25%: '.$ecog54.'</td>';}
	    if(strlen($ecog55) > 1){$ex55= '<td>Localizada <25%: '.$ecog55.'</td></tr><tr><th colspan="4" class="text-left">Ecotextura</th></tr>';}
	    if(strlen($ecog56) > 1){$ex56= '<tr><td>Hiperecogenica:'.$ecog56.'</td>';}
	    if(strlen($ecog57) > 1){$ex57= '<td>IsoEcogenica :'.$ecog57.'</td>';}
	    if(strlen($ecog58) > 1){$ex58= '<td>HipoEcogenica:'.$ecog58.'</td></tr><tr><th colspan="4" class="text-left">Forma</th></tr>';}


        if(strlen($ecog59) > 1){$ex59= '<tr><td>Uniforme u Homogeneo:'.$ecog59.'</td>';}
	    if(strlen($ecog60) > 1){$ex60= '<td>No Uniforme o Heterogeneo:'.$ecog60.'</td>';}
	    if(strlen($ecog61) > 1){$ex61= '<td>Presencia de Interface Conservada:'.$ecog61.'</td></tr><tr><th colspan="4" class="text-left">Unión Endometrio-Miometro</th></tr>';}
        if(strlen($ecog62) > 1){$ex62= '<tr><td>Regular: '.$ecog62.'</td>';}
	    if(strlen($ecog63) > 1){$ex63= '<td>Irregular: '.$ecog63.'</td>';}
	    if(strlen($ecog64) > 1){$ex64= '<td>Interrumpida: '.$ecog64.'</td>';}
        if(strlen($ecog65) > 1){$ex65= '<td>No definida:  '.$ecog65.'</td>/tr>';}
        if(strlen($ecog66) > 1){$ex66= '<tr><td>Margen del Miometro libre del tumor(mm): '.$ecog66.'</td>';}
	    if(strlen($ecog67) > 1){$ex67= '<td>Relación diámetro tumoral/ diámetro AP Uterino : '.$ecog67.'</td>';}
	    if(strlen($ecog68) > 1){$ex68= '<td>Patrón Vascular Tumoral: '.$ecog68.'</td>';}
        if(strlen($ecog69) > 1){$ex69= '<td>Distancia del tumor al cérvix(mm):  '.$ecog69.'</td>/tr>';}

        if(strlen($ecog70) > 1){$ex70= '<tr><td>Índice de resistencia vascular:'.$ecog70.'</td>';}
	    if(strlen($ecog71) > 1){$ex71= '<td>Velocidad máxima de flujo en sistoles del vaso tumoral:'.$ecog71.'</td>';}
	    if(strlen($ecog72) > 1){$ex72= '<td>Sinequias:'.$ecog72.'</td></tr>';}

	     /*  */



	  $ecografia_ginecologica= '<table class="table table-bordered"><tr><tr><th colspan="4" class="text-center">Útero</th></tr>'.$ex1.$ex7.$ex8.$ex9.$ex10.$ex11.$ex12.$ex13.$ex14.$ex15.$ex16.$ex17.$ex18.$ex19.$ex20.$ex21.$ex22.$ex23.$ex24.$ex25.$ex26.$ex27.$ex28.$ex29.$ex30.$ex31.$ex32.$ex33.$ex34.$ex35.$ex36.$ex37.$ex38.$ex39.$ex40.$ex41.$ex42.$ex43.$ex44.$ex45.$ex46.$ex47.$ex48.$ex49.$ex50.$ex51.$ex2.$ex52.$ex53.$ex54.$ex55.$ex56.$ex57.$ex58.$ex59.$ex60.$ex61.$ex62.$ex63.$ex64.$ex65.$ex66.$ex67.$ex68.$ex69.$ex70.$ex71.$ex72.'</td></tr></table>';

$query = "INSERT INTO historiaClinica_ecografias (cliente_id,usuario_id,Fecha,Hora,ecografiaDetalle,diagnostico,nombreEcografia)
    		VALUES ($pacienteId,$ID,$fechar,$hora,$ecografia_ginecologica,$ecog73,$tipo_eco);";
$enlace_actual = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$enlace_actual = str_replace('.php', '', $enlace_actual);

auditorMaster($idusuario, '1', $enlace_actual, $query);


    	mysqli_query($conn3,"
    		INSERT INTO historiaClinica_ecografias (cliente_id,usuario_id,Fecha,Hora,ecografiaDetalle,diagnostico,nombreEcografia)
    		VALUES ('$pacienteId','$ID','$fechar','$hora','$ecografia_ginecologica','$ecog73','$tipo_eco')");


echo "INSERT INTO historiaClinica_ecografias (cliente_id,usuario_id,Fecha,Hora,ecografiaDetalle,diagnostico,nombreEcografia)
    		VALUES ('$pacienteId','$ID','$fechar','$hora','$ecografia_ginecologica','$ecog73','$tipo_eco')";

    $con=mysqli_query($conn3,"SELECT MAX(ID) as max FROM historiaClinica_ecografias ");
    	$resu=mysqli_fetch_assoc($con);
    	$historiaClinica1=$resu['max'];







    	 $codigo4=$_POST['archivo'];
       

      $contador4=count($codigo4); 





 foreach($_FILES["archivo"]['tmp_name'] as $key => $tmp_name)
    {
        //Validamos que el archivo exista
        if($_FILES["archivo"]["name"][$key]) {
            $filename = $_FILES["archivo"]["name"][$key]; //Obtenemos el nombre original del archivo
            $source = $_FILES["archivo"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
            
            $directorio = 'archivos/'; //Declaramos un  variable con la ruta donde guardaremos los archivos
            
            //Validamos si la ruta de destino existe, en caso de no existir la creamos
            if(!file_exists($directorio)){
                mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");    
            }
            
            $dir=opendir($directorio); //Abrimos el directorio de destino
            $target_path = $directorio.'/'.$filename; //Indicamos la ruta de destino, así como el nombre del archivo
            
            //Movemos y validamos que el archivo se haya cargado correctamente
            //El primer campo es el origen y el segundo el destino
            if(move_uploaded_file($source, $target_path)) { 
                echo "El archivo $filename se ha almacenado en forma exitosa.<br>";
                } else {    
                echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
            }
            closedir($dir); //Cerramos el directorio de destino
        }
 




    mysqli_query($conn3,"INSERT INTO archivos (cliente_id,usuario_id,historia_id,codigo,fecha, descripcion) VALUES   ('$pacienteId', '$ID', '$historiaClinica1','$filename','$fechar', '$descripcion')");  


echo "INSERT INTO archivos (cliente_id,usuario_id,historia_id,codigo,fecha, descripcion) VALUES   ('$pacienteId', '$ID', '$historiaClinica1','$filename','$fechar', '$descripcion')";  


    }





$contador=$_POST['uploader_count'];

echo '------------------------------------------------------------------  '.$historiaClinica1;
echo '------------------------------------------------------------------  '.$contador;
for ($i=0; $i <$contador ; $i++) { 
    $nomb=$_POST['uploader_'.$i.'_name'];

    mysqli_query($conn3,"INSERT INTO imgEcografia (idHistoria, imagen) VALUE
    ('$historiaClinica1','$nomb');");
    echo "INSERT INTO imgEcografia (idHistoria, imagen) VALUE
    ('$historiaClinica1','$nomb');";
    
		}



    }



elseif ($tipo_eco == 'Ecografia  Primer Trimestre') 
    {


echo 'Ecografia Genetica Ecografia Genetica Ecografia Genetica Ecografia Genetica';
    	//datos iniciales de la ecografia obstétrica
	    $ec1	= $_POST['fecha'];
	    $ec2	= $_POST['edadgestacional'];
	    $ec3	= $_POST['condiciones'];
	    $ec4	= $_POST['tipogestacion'];
	    $ec5	= $_POST['corionicidad'];  
	    $ec6 	= $_POST['descripcion'];
	    $ec7 	= $_POST['medidas'];
	    $ec8 	= $_POST['volumen'];
	    $ec9	= $_POST['endometrio'];
       $ec10 	= $_POST['descripcion1'];

	/*    $ec10 	= $_POST['medida'];
	    $ec11	= $_POST['volume'];
	    $ec12	= $_POST['aspecto'];
	    $ec13	= $_POST['numerofoliculos'];
	    $ec14	= $_POST['tamañafoliculo'];
	    $ec15	= $_POST['hallazgos'];
	    $ec16	= $_POST['medida1'];
	    $ec17	= $_POST['volume1'];
	    $ec18	= $_POST['aspecto1'];
	    $ec19	= $_POST['numerofoliculos1'];

	    $ec20	= $_POST['tamañafoliculo1'];
	    $ec21	= $_POST['hallazgos1"'];
	    $ec22	= $_POST['medida2'];
	    $ec23	= $_POST['bordes'];
	    $ec24	= $_POST['localizacion'];
	    $ec25	= $_POST['reaccion'];
	    $ec26	= $_POST['hematomas'];
	    $ec27	= $_POST['formas'];  */


	    $ec28	= $_POST['medida3'];
	    $ec29	= $_POST['semanas'];
	    $ec30	= $_POST['polocefalico'];
	    $ec31	= $_POST['forma'];
	    $ec32	= $_POST['osificacion'];
        $ec33	= $_POST['lineamedia'];
	    $ec34	= $_POST['plexos'];
	    $ec35	= $_POST['orbitas"'];
	    $ec36	= $_POST['perfil'];
	    $ec37	= $_POST['micrognatia'];
	    $ec38	= $_POST['areap'];
	    $ec39	= $_POST['diagfragma"'];
	    $ec40	= $_POST['actividadc'];
	    $ec41	= $_POST['tamaño'];
	    $ec42	= $_POST['axis'];
        $ec43	= $_POST['imagen'];
	    $ec44	= $_POST['estomago'];
	    $ec45	= $_POST['riñon'];
	    $ec46	= $_POST['vejiga'];
	    $ec47	= $_POST['vasos'];
	    $ec48	= $_POST['cordon'];
	    $ec49	= $_POST['extre'];
	    $ec50	= $_POST['humero'];
	    $ec51	= $_POST['femur'];
        $ec52	= $_POST['liquido'];
	    $ec53	= $_POST['vesicula'];
	    $ec54	= $_POST['saco'];
	    $ec55	= $_POST['lagos'];
	    $ec56	= $_POST['implantacion'];
	    $ec57	= $_POST['anterior'];
	    $ec58	= $_POST['posterior'];
	    $ec59	= $_POST['fundica'];

	    $ec60	= $_POST['Hallazgos'];
	    $ec61	= $_POST['diagnostico'];
        $ec64	= $_POST['descripcion2'];
	    $ec65	= $_POST['descripcion3'];
        $ec66	= $_POST['descripcion4'];
        $ec67	= $_POST['descripcion5'];
        $ec68	= $_POST['descripcion6'];
        $ec69	= $_POST['descripcion7'];
        $ec70	= $_POST['descripcion8'];
        


/////////////////////////////////////////
	   

	    //Datos iniciales de la ecografia
	    if(strlen($ec1) > 1){$exp1= '<td>FUM: '.$ec1.'</td>';}
	    if(strlen($ec2) > 1){$exp2= '<td>Edad Gestacional Proyectada: '.$ec2.'</td>';}
	    if(strlen($ec3) > 1){$exp3= '<td>VCondiciones donde se realiza el estudio: '.$ec3.'</td>';}
	    if(strlen($ec4) > 1){$exp4= '<td>Tipo de Gestación:'.$ec4.'</td>';}
	    if(strlen($ec5) > 1){$exp5= '<td>Corionicidad:'.$ec5.'</td></tr><tr><th colspan="4" class="text-center">Útero</th></tr>';}
	   
	    //aqui hacemos un salto de linea para el pdf cuando se muestre

	  
	    if(strlen($ec6) > 1){$exp6= '<tr><td>Descripción: '.$ec6.'</td>';}
	    if(strlen($ec7) > 1){$exp7= '<td>Medidas: '.$ec7.'</td>';}
	    if(strlen($ec8) > 1){$exp8= '<td>Volumen: '.$ec8.'</td></tr><tr><th colspan="4" class="text-center"> Endometrio </th></tr>';}
	    if(strlen($ec9) > 1){$exp9= '<td>Descripción: '.$ec9.'</td></tr><tr><th colspan="4" class="text-center"> Saco Gestacional </th></tr>';}

       if(strlen($ec10) > 1){$exp10= '<tr><td>Descripción del saco:  '.$ec10.'</td>';}
       if(strlen($ec64) > 1){$exp64= '<td>Medidad de SG:  '.$ec64.'</td>';}
       if(strlen($ec65) > 1){$exp65= '<td>Corresponde a:  '.$ec65.'</td>';}

       if(strlen($ec66) > 1){$exp66= '<td>Forma:  '.$ec66.'</td></tr>';}
       if(strlen($ec67) > 1){$exp67= '<tr><td>Ubicación:  '.$ec67.'</td>';}
       if(strlen($ec68) > 1){$exp68= '<td>Reacción Corto decidual: '.$ec68.'</td>';}

       if(strlen($ec69) > 1){$exp69= '<td>Bordes:  '.$ec69.'</td>';}
        if(strlen($ec70) > 1){$exp70= '<td>Hematomas:  '.$ec70.'</td></tr><tr><th colspan="4" class="text-center">Embrión</th></tr>';}




	  
	 
	    if(strlen($ec28) > 1){$exp28= '<tr><td>Medidas mm LCN: '.$ec28.'</td>';}
	    if(strlen($ec29) > 1){$exp29= '<td>Correspondientas a: '.$ec29.'</td>';}
	    if(strlen($ec30) > 1){$exp30= '<td>Polo cefálico: '.$ec30.'</td></tr>';}

	    if(strlen($ec31) > 1){$exp31= ' <tr><td>Forma el Cranéo: '.$ec31.'</td>';}								
	    if(strlen($ec32) > 1){$exp32= '<td>Osificación Craneal:: '.$ec32.'</td>';}
        if(strlen($ec33) > 1){$exp33= '<td>Línea Media del Craneo: '.$ec33.'</td></tr>';}

        if(strlen($ec34) > 1){$exp34= '<tr><td>Plexos Coroideos:'.$ec34.'</td>';}								
	    if(strlen($ec35) > 1){$exp35= '<td>Orbitas del rostro: '.$ec35.'</td>';}
        if(strlen($ec36) > 1){$exp36= '<td>Perfil del Rostro: '.$ec36.'</td></tr>';}

        if(strlen($ec37) > 1){$exp37= ' <tr><td>Micrognatia::'.$ec37.'</td>';}								
	    if(strlen($ec38) > 1){$exp38= '<td>Área Pulmonar: '.$ec38.'</td>';}
        if(strlen($ec39) > 1){$exp39= '<td>Diagfragma : '.$ec39.'</td></tr>';}

        if(strlen($ec40) > 1){$exp40= '<tr><td>Actividad Cardiaca:'.$ec40.'</td>';}								
	    if(strlen($ec41) > 1){$exp41= '<td>Tamaño '.$ec41.'</td>';}
        if(strlen($ec42) > 1){$exp42= '<td>Axis Cardiaco:'.$ec42.'</td></tr>';}

        if(strlen($ec43) > 1){$exp43= '<tr><td>Imagen de cuatro cámaras::'.$ec43.'</td>';}								
	    if(strlen($ec44) > 1){$exp44= '<td>Estomago:'.$ec44.'</td>';}
        if(strlen($ec45) > 1){$exp45= '<td>Riñon:'.$ec45.'</td></tr>';}

        if(strlen($ec46) > 1){$exp46= '<tr><td>Vegiga:'.$ec46.'</td>';}							
	    if(strlen($ec47) > 1){$exp47= '<td>Vasos umbilicales:'.$ec47.'</td>';}
        if(strlen($ec48) > 1){$exp48= '<td>Inserción de cordón en pared abdominal:'.$ec48.'</td></tr>';}

        if(strlen($ec49) > 1){$exp49= '<tr><td>Extremidades:'.$ec49.'</td>';}								
	    if(strlen($ec50) > 1){$exp50= '<td>Humero:'.$ec50.'</td>';}
        if(strlen($ec51) > 1){$exp51= '<td>Femúr:'.$ec51.'</td></tr>';}


        if(strlen($ec52) > 1){$exp52= '<tr><td>Liquido Amniótico:'.$ec52.'</td>';}								
	    if(strlen($ec53) > 1){$exp53= '<td>Vesicula Vitelina:'.$ec53.'</td></tr>';}


        if(strlen($ec54) > 1){$exp54= '<tr><td> PLACENTA:  Saco gestacional ubicado en el segmento uterino inferior:'.$ec54.'</td>';}

        if(strlen($ec55) > 1){$exp55= '<td> Múltiples lagos venesos  dentro del lecho placentario:'.$ec55.'</td>';}								
	    if(strlen($ec56) > 1){$exp56= '<td>Implantación de saso gestacional a nivel de cicatríz anterior:'.$ec56.'</td></tr>';}

        if(strlen($ec57) > 1){$exp57= '<tr><td>  Anterior: '.$ec57.'</td>';}								
	    if(strlen($ec58) > 1){$exp58= '<td>Posterior:'.$ec58.'</td>';}
        if(strlen($ec59) > 1){$exp59= '<td>Fundica:'.$ec59.'</td></tr><tr><th colspan="4" class="text-center">Hallazgos</th></tr>';}

        if(strlen($ec60) > 1){$exp60= '<tr><td> Dscripción del hallazgo:'.$ec60.'';}
        


	    $ecografia_primertrimestre= '<table class="table table-bordered"><tr>'.$exp1.$exp2.$exp3.$exp4.$exp5.$exp6.$exp7.$exp8.$exp9.$exp10.$exp64.$exp65.$exp66.$exp67.$exp68.$exp69.$exp70.$exp28.$exp29.$exp30.$exp31.$exp32.$exp33.$exp34.$exp35.$exp36.$exp37.$exp38.$exp39.$exp40.$exp41.$exp42.$exp43.$exp44.$exp45.$exp46.$exp47.$exp48.$exp49.$exp50.$exp51.$exp52.$exp53.$exp54.$exp55.$exp56.$exp57.$exp58.$exp59.$exp60.'</td></tr></table>';

$query = "INSERT INTO historiaClinica_ecografias (cliente_id,usuario_id,Fecha,Hora,ecografiaDetalle,diagnostico,nombreEcografia)
    		VALUES ($pacienteId,$ID,$fechar,$hora,$ecografia_primertrimestre,$ec61,$tipo_eco);";
$enlace_actual = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$enlace_actual = str_replace('.php', '', $enlace_actual);

auditorMaster($idusuario, '1', $enlace_actual, $query);

    	mysqli_query($conn3,"
    		INSERT INTO historiaClinica_ecografias (cliente_id,usuario_id,Fecha,Hora,ecografiaDetalle,diagnostico,nombreEcografia)
    		VALUES ('$pacienteId','$ID','$fechar','$hora',' $ecografia_primertrimestre','$ec61','$tipo_eco')");


echo "INSERT INTO historiaClinica_ecografias (cliente_id,usuario_id,Fecha,Hora,ecografiaDetalle,diagnostico,nombreEcografia)
    		VALUES ('$pacienteId','$ID','$fechar','$hora',' $ecografia_primertrimestre','$ec61','$tipo_eco')";

    	$con=mysqli_query($conn3,"SELECT MAX(ID) as max FROM historiaClinica_ecografias ");
    	$resu=mysqli_fetch_assoc($con);
    	$historiaClinica1=$resu['max'];

$contador=$_POST['uploader_count'];


for ($i=0; $i <$contador ; $i++) { 
    $nomb=$_POST['uploader_'.$i.'_name'];

    mysqli_query($conn3,"INSERT INTO imgEcografia (idHistoria, imagen) VALUE
    ('$historiaClinica1','$nomb');");
    
		}



    }
    













    elseif ($tipo_eco == 'Ecografia Morfologica') 
    {
    	//Datos de ecografia Morfologica
	    
	    $morf1 		= $_POST['situacion1'];
	    $morf2 		= $_POST['presentacion1'];
	    $morf3 		= $_POST['posicion1'];

	    $morf4 		= $_POST['BPD'];
	    $morf5 		= $_POST['sema1'];
	    $morf6 		= $_POST['HC'];
	    $morf7 		= $_POST['sema2'];

	    $morf8 		= $_POST['AC2'];
	    $morf9 		= $_POST['sema3'];
	    $morf10 	= $_POST['FL'];
	    $morf11 	= $_POST['sema4'];
	    $morf12 	= $_POST['peso_fetal_apro'];
	    $morf13 	= $_POST['percentil2'];

	    $morf14 	= $_POST['craneo'];
	    $morf15 	= $_POST['sistema_nervioso_central'];
	    $morf16 	= $_POST['columna_vertebral'];
	    $morf17 	= $_POST['cara'];
	    $morf18 	= $_POST['corazon'];
	    $morf19 	= $_POST['torax'];
	    $morf20 	= $_POST['pared_abdominal'];
	    $morf21 	= $_POST['tracto_gastro'];
	    $morf22 	= $_POST['sistema_urinario'];
	    $morf23 	= $_POST['sistema_musculo_esqueletico'];
	    $morf24 	= $_POST['bienestar_fetal'];

	    $morf25 	= $_POST['placenta2'];
	    $morf26 	= $_POST['liquido_amniotico2'];
	    $morf27 	= $_POST['cordon_umbilical'];

	    $morf28 	= $_POST['conclusion'];
	    $morf29 	= $_POST['abono2'];
 
	    $morf33	= mysqli_real_escape_string($conn3,$_POST['diagnostico2']);

	    $descripcion          = $_POST['descripcion'];  


		$Utero = $_POST['Utero_C'];
		$Endometrio = $_POST['Endometrio_C'];
		$Saco_Gestional = $_POST['Saco_Gestional_C'];
		$Embrion = $_POST['Embrion_C'];
		$Hallazgos = $_POST['Hallazgos_C'];
		$Diagnostico = $_POST['Diagnostico_C'];

		$CiclosEmbarazoTexto="";
		if (!empty($Utero) || !empty($Endometrio)) {
			$CiclosEmbarazoTexto .= '<tr>';
			if (!empty($Utero)) {
				$CiclosEmbarazoTexto .= '<td colspan="2">Útero: ' . $Utero . '</td>';
			}
			if (!empty($Endometrio)) {
				$CiclosEmbarazoTexto .= '<td colspan="2">Endometrio: ' . $Endometrio . '</td>';
			}
			$CiclosEmbarazoTexto .= '</tr>';
		}
		
		if (!empty($Saco_Gestional) || !empty($Embrion)) {
			$CiclosEmbarazoTexto .= '<tr>';
			if (!empty($Saco_Gestional)) {
				$CiclosEmbarazoTexto .= '<td colspan="2">Saco Gestacional: ' . $Saco_Gestional . '</td>';
			}
			if (!empty($Embrion)) {
				$CiclosEmbarazoTexto .= '<td colspan="2">Embrión: ' . $Embrion . '</td>';
			}
			$CiclosEmbarazoTexto .= '</tr>';
		}
		
		if (!empty($Hallazgos)) {
			$CiclosEmbarazoTexto .= '<tr>';
			$CiclosEmbarazoTexto .= '<td colspan="4">Hallazgos: ' . $Hallazgos . '</td>';
			$CiclosEmbarazoTexto .= '</tr>';
		}
		
		if (!empty($Diagnostico)) {
			$CiclosEmbarazoTexto .= '<tr>';
			$CiclosEmbarazoTexto .= '<td colspan="4">Diagnóstico: ' . $Diagnostico . '</td>';
			$CiclosEmbarazoTexto .= '</tr>';
		}
		
		if (!empty($CiclosEmbarazoTexto)) {
			$CiclosEmbarazoTexto = '<tr><td colspan="4" style="text-align:center;"><b>Ciclos de Embarazo</b></td></tr>' . $CiclosEmbarazoTexto;
		}


		$DatosMorf = mysqli_real_escape_string($conn3,"<table class='table table-bordered'>
						<tr>
							<td colspan='4' class='text-center'>
								La Imagen Ultrasonográfica Muestra
							</td>
						<tr> 
							<td colspan='2'>Situación: $morf1 </td>
							<td colspan='2'>Presentación: $morf2 </td>
						</tr>
						<tr>
							<td colspan='2'>Posición: $morf3 </td>
							<td colspan='2'>  </td>
						</tr>

						<tr>
							<td colspan='2'> BPD-Diámetro Biparietal (mm): $morf4 </td>
							<td colspan='2'> Semanas: $morf5 </td>
						</tr>
						<tr>
							<td colspan='2'> HC-Perimétro Cefálico (mm): $morf6 </td>
							<td colspan='2'> Semanas: $morf7 </td>
						</tr>
						<tr>
							<td colspan='2'> AC-Circunferencia Abdominal (mm): $morf8 </td>
							<td colspan='2'> Semanas: $morf9 </td>
						</tr>
						<tr>
							<td colspan='2'> FL-longitud de Femúr (mm): $morf10 </td>
							<td colspan='2'> Semanas: $morf11 </td>
						</tr>
						<tr>
							<td colspan='2'> Peso Fetal Aproximado (Grs):  $morf12 </td>
							<td colspan='2'> Percentil: $morf13 </td>
						</tr>

						<tr>
							<th colspan='4' class='text-center'>Anatomía fetal</th>
						</tr>

						<tr>
							<td colspan='4'> Cráneo:  $morf14 </td>
						</tr>
						<tr>
							<td colspan='4'> Sistema nervioso central:  $morf15 </td>
						</tr>
						<tr>
							<td colspan='4'> Columna vertebral:  $morf16 </td>
						</tr>
						<tr>
							<td colspan='4'> Cara:  $morf17 </td>
						</tr>
						<tr>
							<td colspan='4'> Corazón:  $morf18 </td>
						</tr>
						<tr>
							<td colspan='4'> Tórax:  $morf19 </td>
						</tr>
						<tr>
							<td colspan='4'> Pared Abdominal Anterior:  $morf20 </td>
						</tr>
						<tr>
							<td colspan='4'> Tracto Gastro Intestinal:  $morf21 </td>
						</tr>
						<tr>
							<td colspan='4'> Sistema Urinario:  $morf22 </td>
						</tr>
						<tr>
							<td colspan='4'> Sistema Músculo-Esquelético:  $morf23 </td>
						</tr>
						<tr>
							<td colspan='4'> Bienestar fetal:  $morf24 </td>
						</tr>
						<tr>
							<td colspan='4'> Placenta:  $morf25 </td>
						</tr>
						<tr>
							<td colspan='4'> Líquido Amniótico:  $morf26 </td>
						</tr>
						<tr>
							<td colspan='4'> Cordón Umbilical:  $morf27 </td>
						</tr>
						<tr>
							<td colspan='4'> Conclusiones:  $morf28 </td>
						</tr>
						<tr>
							<td colspan='4'> Abono:  $morf29 </td>
						</tr>

						$CiclosEmbarazoTexto


						</table>
						");



       

        
	    //Validacion de datos de ecografia de morfologia
	    if(strlen($morf1) > 1){$mor1= '<table class="table table-bordered">
	    								<tr><th colspan="4" class="text-center">La Imagen Ultrasonografica Muestra</th></tr>
	    								<tr><td>Situacion: '.$morf1.'</td>';}
	    if(strlen($morf2) > 1){$mor2= '<td colspan="2">Presentacion: '.$morf2.'</td>';}
	    if(strlen($morf3) > 1){$mor3= '<td>Posicion: '.$morf3.'</td></tr><tr><th colspan="4"></th></tr>';}

	    if(strlen($morf4) > 1){$mor4= '<tr><td>BPD-Diámetro Biparietal (mm): '.$morf4.'</td>';}
	    if(strlen($morf5) > 1){$mor5= '<td>Semana: '.$morf5.'</td>';}
	    if(strlen($morf6) > 1){$mor6= '<td>HC-Perimétro Cefálico (mm): '.$morf6.'</td>';}
	    if(strlen($morf7) > 1){$mor7= '<td>Semana: '.$morf7.'</td></tr>';}

	    if(strlen($morf8) > 1){$mor8= '<tr><td>AC-Circunferencia Abdominal (mm):  '.$morf8.'</td>';}
	    if(strlen($morf9) > 1){$mor9= '<td>Semana: '.$morf9.'</td>';}
	    if(strlen($morf10) > 1){$mor10= '<td>FL-longitud de Femúr (mm): '.$morf10.'</td>';}
	    if(strlen($morf11) > 1){$mor11= '<td>Semana: '.$morf11.'</td></tr>';}

	    if(strlen($morf12) > 1){$mor12= '<tr><td colspan="2">Peso Fetal Aproximado (Grs): '.$morf12.'</td>';}
	    if(strlen($morf13) > 1){$mor13= '<td colspan="2">Percentil: '.$morf13.'</td></tr><tr><th colspan="4"></th></tr>';}

	    if(strlen($morf14) > 1){$mor14= '<tr><th colspan="4" class="text-center">Anatomía fetal</th></tr>
	    								<tr><th colspan="4"></th></tr><tr><td colspan="4">Craneo: '.$morf14.'<br></td></tr>';}
	    if(strlen($morf15) > 1){$mor15= '<tr><td colspan="4">Sistema Nervioso Central: '.$morf15.'<br> </td></tr>';}
	    if(strlen($morf16) > 1){$mor16= '<tr><td colspan="4">Columna Vertebral: '.$morf16.'<br> </td></tr>';}
	    if(strlen($morf17) > 1){$mor17= '<tr><td colspan="4">Cara: '.$morf17.'<br> </td></tr>';}
	    if(strlen($morf18) > 1){$mor18= '<tr><td colspan="4">Corazón: '.$morf18.'<br> </td></tr>';}
	    if(strlen($morf19) > 1){$mor19= '<tr><td colspan="4">Tórax: '.$morf19.'<br> </td></tr>';}
	    if(strlen($morf20) > 1){$mor20= '<tr><td colspan="4">Pared Abdominal Anterior: '.$morf20.'<br> </td></tr>';}
	    if(strlen($morf21) > 1){$mor21= '<tr><td colspan="4">Tracto Gastro Intestinal: '.$morf21.'<br> </td></tr>';}

	    if(strlen($morf22) > 1){$mor22= '<tr><td colspan="4">Sistema Urinario: '.$morf22.'<br> </td></tr>';}
	    if(strlen($morf23) > 1){$mor23= '<tr><td colspan="4">Sistema Musculo-Esquelético: '.$morf23.'<br> </td></tr>';}
	    if(strlen($morf24) > 1){$mor24= '<tr><td colspan="4">Bienestar fetal: '.$morf24.'<br> </td></tr>';}
	    if(strlen($morf25) > 1){$mor25= '<tr><td colspan="4">Placenta: '.$morf25.'<br> </td></tr>';}
	    if(strlen($morf26) > 1){$mor26= '<tr><td colspan="4">Líquido Amniótico: '.$morf26.'<br> </td></tr>';}
	    if(strlen($morf27) > 1){$mor27= '<tr><td colspan="4">Cordón Umbilical: '.$morf27.'<br> </td></tr>';}
	    if(strlen($morf28) > 1){$mor28= '<tr><td colspan="4">Conclusion: '.$morf28.'<br> </td></tr>';}
	    if(strlen($morf29) > 1){$mor29= '<tr><td colspan="4">Abono: '.$morf29.'';}
	    

	    $ecografia_morfologica=$mor1.$mor2.$mor3.$mor4.$mor5.$mor6.$mor7.$mor8.$mor9.$mor10.$mor11.$mor12.$mor13.$mor14.$mor15.$mor16.$mor17.$mor18.$mor19.$mor20.$mor21.$mor22.$mor23.$mor24.$mor25.$mor26.$mor27.$mor28.$mor29.'</td></tr></table>';

		$tipo_ecotilde = "Ecografía Morfológica";//agregar el nombre de la historia con tildes

		/*
	    mysqli_query($conn3,"
	    	INSERT INTO historiaClinica_ecografias (cliente_id,usuario_id,Fecha,Hora,ecografiaDetalle,diagnostico,nombreEcografia) 
	    	VALUES ('$pacienteId','$ID','$fechar','$hora','$ecografia_morfologica','$morf33','$tipo_eco')");*/

$query = "INSERT INTO historiaClinica_ecografias (cliente_id,usuario_id,Fecha,Hora,ecografiaDetalle,diagnostico,nombreEcografia,nombreEcografiaTilde) 
	    	VALUES ($pacienteId,$ID,$fechar,$hora,$DatosMorf,$morf33,$tipo_eco,$tipo_ecotilde);";
$enlace_actual = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$enlace_actual = str_replace('.php', '', $enlace_actual);

auditorMaster($idusuario, '1', $enlace_actual, $query);
			
			mysqli_query($conn3,"
	    	INSERT INTO historiaClinica_ecografias (cliente_id,usuario_id,Fecha,Hora,ecografiaDetalle,diagnostico,nombreEcografia,nombreEcografiaTilde) 
	    	VALUES ('$pacienteId','$ID','$fechar','$hora','$DatosMorf','$morf33','$tipo_eco','$tipo_ecotilde')");

			/*
	    echo '<br><br><br><br><br><br><br><br>----------------------- -----------------------------------------------------------'."
	    	INSERT INTO historiaClinica_ecografias (cliente_id,usuario_id,Fecha,Hora,ecografiaDetalle,diagnostico,nombreEcografia) 
	    	VALUES ('$pacienteId','$ID','$fechar','$hora','$ecografia_morfologica','$morf33','$tipo_eco')";*/
/*
$con=mysqli_query($conn3,"SELECT MAX(ID) as max FROM historiaClinica_ecografias ");
    	$resu=mysqli_fetch_assoc($con);
    	$historiaClinica1=$resu['max'];*/

		$historiaClinica1 = mysqli_insert_id($conn3);


if($historiaClinica1!="0" AND $historiaClinica1!=""){
		$Fecha = date("Y-m-d");
		$DatosDocumentos = CargarDocumentos_DocumentosSistema_Ecografias($ID, $_FILES['ImagenesHistoriaEcografias'], "Ecografias");

		foreach ($DatosDocumentos as $key => $value) {

			$Doc_Nombre = $value["Nombre"];
			$Doc_Nombre_Original = $value["Nombre_Original"];
			$Doc_Ruta = $value["Ruta"];
			$Doc_Carpeta = $value["Carpeta"];
			$Tabla = "historiaClinica_ecografias";
			$tabla_id = $historiaClinica1;
			$Doc_usuario_id = $value["usuario_id"];
			$Campo_Input="ImagenesHistoriaEcografias";
			//insert en la tabla de arriba
			
			$Respuesta = mysqli_query($conn3,"INSERT INTO archivos (cliente_id,usuario_id,historia_id,codigo,fecha, NombreVisual,Realizado_Desde,Campo_Input) VALUES   ('$pacienteId', '$Doc_usuario_id','$historiaClinica1','$Doc_Nombre','$Fecha', '$Doc_Nombre_Original','historiaClinica_ecografias','ImagenesHistoriaEcografias')") or die (mysqli_error($conn3));

			if ($Respuesta != true) {
				echo "<script> alert('Error al insertar un documento $Doc_Nombre_Original')</script>";
			}
		} 
}







    	  $codigo4=$_POST['archivo'];
       

      //$contador4=count($codigo4); 





 foreach($_FILES["archivo"]['tmp_name'] as $key => $tmp_name)
    {
        //Validamos que el archivo exista
        if($_FILES["archivo"]["name"][$key]) {

			
$numeroAleatorio = rand(1, 99999999);
$fechaHoyNumerica = date("Ymd");

$Ran = $numeroAleatorio."-".$fechaHoyNumerica;
$filename = $Ran."-".$_FILES["archivo"]["name"][$key];


            //$filename = $_FILES["archivo"]["name"][$key]; //Obtenemos el nombre original del archivo
            $source = $_FILES["archivo"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
            
            $directorio = 'archivos/'; //Declaramos un  variable con la ruta donde guardaremos los archivos
            
            //Validamos si la ruta de destino existe, en caso de no existir la creamos
            if(!file_exists($directorio)){
                mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");    
            }
            
            $dir=opendir($directorio); //Abrimos el directorio de destino
            $target_path = $directorio.'/'.$filename; //Indicamos la ruta de destino, así como el nombre del archivo
            
            //Movemos y validamos que el archivo se haya cargado correctamente
            //El primer campo es el origen y el segundo el destino
            if(move_uploaded_file($source, $target_path)) { 
                echo "El archivo $filename se ha almacenado en forma exitosa.<br>";
                } else {    
                echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
            }
            closedir($dir); //Cerramos el directorio de destino

			$descripcion = mysqli_real_escape_string($conn3,$descripcion);
			mysqli_query($conn3,"INSERT INTO archivos (cliente_id,usuario_id,historia_id,codigo,fecha, NombreVisual,descripcion,Realizado_Desde) VALUES   ('$pacienteId', '$ID', '$historiaClinica1','$filename','$fechar', '$filename','$descripcion','historiaClinica_ecografias')");  


echo "INSERT INTO archivos (cliente_id,usuario_id,historia_id,codigo,fecha, descripcion) VALUES   ('$pacienteId', '$ID', '$historiaClinica1','$filename','$fechar', '$descripcion')";  

        }
 




    


    }


$contador=$_POST['uploader_count'];


for ($i=0; $i <$contador ; $i++) { 
    $nomb=$_POST['uploader_'.$i.'_name'];

    mysqli_query($conn3,"INSERT INTO imgEcografia (idHistoria, imagen) VALUE
    ('$historiaClinica1','$nomb');");
    

 }

    }
    elseif ($tipo_eco == 'Ecografia Colposcopia') 
    {
    	//Datos de Ecografia de Colposcopia
	    $col1 		= $_POST['PVH'];
	    //Resultados de Citologia
	    $col2 		= $_POST['ASC_US'];
	    $col3 		= $_POST['LIE_BG'];
	    $col4 		= $_POST['LIE_AG'];
	    $col5 		= $_POST['carcinoma'];

	    $col6 		= $_POST['IVAA'];
	    $col7 		= $_POST['IVAA2'];

	    $col8 		= $_POST['Tipos_Sona_T'];
	    $col9 		= $_POST['SHILLER'];

	    $col10 		= $_POST['biopsia'];
	    $col11 		= $_POST['curetaje'];
	    $col12 		= $_POST['tam_les'];
	    $col13 		= $_POST['por_cervix'];

	    $col14 		= $_POST['epit_esca_original'];

	    $col15 		= $_POST['epitelio_columnar'];
	    $col16 		= $_POST['epitelio_escamoso_metaplasico'];
	    $col17 		= $_POST['criptas_abiertas'];
	    $col18 		= $_POST['deciduosis'];

	    $col19 		= $_POST['epitelioAcetoBlancoDelgado'];
	    $col20 		= $_POST['borde_irregular'];
	    $col21 		= $_POST['mosaico_fino'];
	    $col22 		= $_POST['punteado_fino'];
	    $col23 		= $_POST['leucoplasia'];
	    $col24 		= $_POST['erosion'];
	    $col25 		= $_POST['shiller1'];

	    $col26 		= $_POST['epitelioAcetoBlancoGrueso'];
	    $col27 		= $_POST['menor15seg'];
	    $col28 		= $_POST['mas120seg'];
	    $col29 		= $_POST['mosaico_grueso'];
	    $col30 		= $_POST['punteado_grueso'];
	    $col31 		= $_POST['signolimiteBorderInterno'];
	    $col32 		= $_POST['signoCresta'];
		
	    $col33 		= $_POST['vasosAtipicos'];
	    $col34 		= $_POST['superficieIrregular'];
	    $col35 		= $_POST['necrosis'];
	    $col36 		= $_POST['tumor'];
	    $col37 		= $_POST['vasosFragiles'];
	    $col38 		= $_POST['lesionExofitica'];
	    $col39 		= $_POST['ulceracion'];

	    $col40 		= $_POST['resultadoBiopsia'];
	    $col41 		= $_POST['NIC_I'];
	    $col42 		= $_POST['NIC_II'];
	    $col43 		= $_POST['NIC_III'];
	    $col44 		= $_POST['CIS'];
	    $col45 		= $_POST['CA_Invasor'];
	    $col46 		= $_POST['Adenosis'];
	    $col47 		= $_POST['adeno_CAInvasor'];
	    $col48 		= $_POST['otros'];

	    $col49 		= $_POST['crioterapia'];
	    $col50 		= $_POST['fecha_crioterapia'];
	    $col51 		= $_POST['escision'];
	    $col52 		= $_POST['fecha_escision'];

	    $col53 		= $_POST['imagen_1'];
	    $col54 		= $_POST['imagen_2'];
	    $col55 		= $_POST['imagen_3'];

	    $col56 		= $_POST['diagnostico3'];


	    $descripcion          = $_POST['descripcion'];  

       

         

	   	if(strlen($col1) >= 0){$co1= '
	   		<table class="table table-bordered">
	   			<tr>
	   				<th colspan="2" class="text-center">Resultado PVH</th>
	   				<th colspan="4" class="text-center">Resultado de Citología</th>
	   			</tr>
	   			<tr>
                 	<td colspan="2">'.$col1.' </td>';}

	    if(strlen($col2) >= 0 AND strlen($col3) >= 0 AND strlen($col4) >= 0 AND strlen($col5) >= 0) {$co2= 
	    		   '<td>ASC-US:'.$col2.'</td>
	    		   	<td>LIE BG:'.$col3.'</td>
	    		   	<td>LIE AG:'.$col4.'</td>
	    		   	<td>Carcinoma:'.$col5.'</td>
	    		</tr>
	    	</table>';}

	    if(strlen($col6) >= 0 AND strlen($col7) >= 0){$co3= 
	       '<table class="table table-bordered">
	       		<tr>
	       			<th colspan="2" class="text-center">IVAA Inspección Visual con Ácido Acético</th>
	       			<th colspan="2" class="text-center">Tipos de Zona de Transformación</th>
	       			<th class="text-center">Test de SHILLER</th>
	       		</tr>
	       		<tr>
	       			<td colspan="2">'.$col6.' Con '.$col7.'</td>';}
		if(strlen($col8) >= 0){$co4= '
					<td colspan="2">'.$col8.'</td>';}

	    if(strlen($col9) >= 0){$co5= '
	    			<td>'.$col9.'</td>
	    		</tr>
	    	</table>
	    	<table class="table table-bordered">
	    		<tr>
	    			<th colspan="2" class="text-center">Cérvix</th>
	    			<th colspan="2" class="text-center">Tamaño de la Lesión</th>
	    		</tr>';}

	    if(strlen($col10) >= 0){$co6= '
	    		<tr>
	    			<td>Biopsia:'.$col10.'</td>';}
	    			
	   	if(strlen($col11) >= 0){$co7= '
	   				<td>Curetaje:'.$col11.'</td>';}

	    if(strlen($col12) >= 0 ){$co8= '
	    			<td>Número de Cuadrantes: '.$col12.'</td>';}

	    if(strlen($col13) >= 0){$co9= '
	    	    	<td>Porcentaje de Cérvix: '.$col13.'</td>
				</tr>
	    	</table>';}

	    if(strlen($col14) >= 0){$co10= '
	    	<table class="table table-bordered">
	    		<tr>
	    			<th colspan="2" class="text-center">Hallazgos Colposcópicos</th>
				</tr>
				<tr>
					<th colspan="2">Hallazgos Normales</th>
				</tr>
				<tr>
					<td>Epitelio Escamoso Original:'.$col14.'</td>';}

	    if(strlen($col15) >= 0){$co11= '
	    			<td>Epitelio Columnar:'.$col15.'</td>
	    		</tr>';}

	    if(strlen($col16) >= 0){$co12= '
	    		<tr>
	    			<td>Epitelio Escamoso Metaplasico: '.$col16.'</td>';}
	    if(strlen($col17) >= 0){$co13= '
	    			<td>Criptas Abiertas:'.$col17.'</td>
	    		</tr>';}
	    if(strlen($col18) >= 0){$co14= '
	    		<tr>
	    			<td colspan="2">Deciduosis del Embarazo: '.$col18.'</td>
	    		</tr>
	    	</table>
	    	<table class="table table-bordered">
	    		<tr>
	    			<th colspan="2">Hallazgos Anormales</th>
	    		</tr>
	    		<tr>
	    			<th class="text-center">LIE Bajo Grado</th>
	    			<th class="text-center">LIE Alto Grado</th>
	    		</tr>
	    		<tr>';}

	    if(strlen($col19) >= 0){$co15= '
	    			<td>Epitelio Aceto Blanco Delgado:'.$col19.'</td>';}
	    if(strlen($col26) >= 0){$co16= '
	    			<td>Epitelio Aceto Blanco Grueso:'.$col26.'</td>
	    		</tr>';}
	    if(strlen($col20) >= 0){$co17= '
	    		<tr>
	    			<td>Borde Irregular: '.$col20.'</td>';}
	    if(strlen($col27) >= 0){$co18= '
	    			<td>Menor a 15 Segundos: '.$col27.'</td>
	    		</tr>';}
	    if(strlen($col21) >= 0){$co19= '
	    		<tr>
	    			<td>Mosaico Fino: '.$col21.'</td>';}
	    if(strlen($col28) >= 0){$co20= '
	    			<td>Más de 120 Segundos: '.$col28.'</td></tr>';}
	    if(strlen($col22) >= 0){$co21= '
	    		<tr>
	    			<td>Punteado Fino: '.$col22.'</td>';}
	    if(strlen($col29) >= 0){$co22= '
	    			<td>Mosaico Grueso:'.$col29.'</td>
	    		</tr>
	    		<tr>
	    			<td class="text-center">Lesiones No Específicas</td>';}

	    if(strlen($col30) >= 0){$co23= '
	    			<td>Punteado Grueso:'.$col30.'</td>
	    		</tr>';}

	    if(strlen($col23) >= 0){$co24= '
	    		<tr>
	    			<td>Leucoplasia:'.$col23.'</td>';}

	    if(strlen($col31) >= 0){$co25= '
	    			<td>Signo del Limite del Borde Interno:'.$col31.'</td>
	    		</tr>';}
	    if(strlen($col24) >= 0){$co26= '
	    		<tr>
	    			<td>Erosión:'.$col24.'</td>';}

	    if(strlen($col32) >= 0){$co27= '
	    			<td>Signo de la Cresta:'.$col32.'</td>
	    		</tr>';}
	    if(strlen($col25) >= 0){$co28= '
	    		<tr>
	    			<td>Shiller:'.$col25.'</td>
	    		</tr>
	    	</table>';}

	    if(strlen($col33) >= 0){$co29= '
	    	<table class="table table-bordered">
	    		<tr>
	    			<th colspan="4" class="text-center">Signos de Invasión</th>
	    		</tr>
	    		<tr>
	    			<td> Vasos Atípicos: '.$col33.'</td>';}

	    if(strlen($col34) >= 0){$co30= '
	    			<td>Superficie Irregular: '.$col34.'</td>';}

	    if(strlen($col35) >= 0){$co31= '
	    			<td>Necrosis: '.$col35.'</td>';}

	    if(strlen($col35) >= 0){$co32= '
	    			<td>Tumor: '.$col36.'</td>
	    		</tr>';}

	    if(strlen($col37) >= 0){$co33= '
	    		<tr>
	    			<td>Vasos Frágiles:'.$col37.'</td>';}

	    if(strlen($col38) >= 0){$co34= '
	    			<td>Lesión Exofítica: '.$col38.'</td>';}
	    if(strlen($col39) >= 0){$co35= '
	    			<td colspan="2">Ulceración: '.$col39.'</td>
	    		</tr>
	    	</table>';}

	    if(strlen($col40) >= 0){$co36= '
	    	<table class="table table-bordered">
	    		<tr>
	    			<th colspan="5" class="text-center">Resultados de Biopsia</th>
	    		</tr>
	    		<tr>
	    			<td>Negativo: '.$col40.'</td>';}

	    if(strlen($col41) >= 0){$co37= '
	    			<td>NIC I: '.$col41.'</td>';}

	    if(strlen($col42) >= 0){$co38= '
	    			<td>NIC II: '.$col42.'</td>';}

	    if(strlen($col43) >= 0){$co39= '
	    			<td>NIC III: '.$col43.'</td>';}

	    if(strlen($col44) >= 0){$co40= '
	    			<td>CIS: '.$col44.'</td></tr>';}

	    if(strlen($col45) >= 0){$co41= '
	    		<tr>
	    			<td>CA Invasor: '.$col45.'</td>';}

	    if(strlen($col46) >= 0){$co42= '
	    			<td>Adenosis: '.$col46.'</td>';}

	    if(strlen($col47) >= 0){$co43= '
	    			<td>Adeno CA Invasor: '.$col47.'</td>';}

	    if(strlen($col48) >= 0){$co44= '
	    			<td colspan="2">Otros: '.$col48.'</td>
	    		</tr>
	    	</table>';}

	    if(strlen($col49) >= 0){$co45= '
	    	<table class="table table-bordered">
	    		<tr>
	    			<th colspan="4" class="text-center">Tratamiento</th>
	    		</tr>
	    		<tr>
	    			<td colspan="2">Crioterapia:'.$col49.'</td>';}

	    if(strlen($col50) >= 0){$co46= '
	    			<td colspan="2">Fecha: '.$col50.'</td>
	    		</td>';}

	    if(strlen($col51) >= 0){$co47= '
	    		<tr>
	    			<td colspan="2">Escisión: '.$col51.'</td>';}

	    if(strlen($col52) >= 0){$co48= '
	    			<td colspan="2">Fecha: '.$col52.'</td>';} 






		///////////////////////////////////////////////////////////////////////////

		$Utero = $_POST['Utero_C'];
		$Endometrio = $_POST['Endometrio_C'];
		$Saco_Gestional = $_POST['Saco_Gestional_C'];
		$Embrion = $_POST['Embrion_C'];
		$Hallazgos = $_POST['Hallazgos_C'];
		$Diagnostico = $_POST['Diagnostico_C'];
		
		$CiclosEmbarazoTexto="";
		if (!empty($Utero) || !empty($Endometrio)) {
			$CiclosEmbarazoTexto .= '<tr>';
			if (!empty($Utero)) {
				$CiclosEmbarazoTexto .= '<td colspan="2">Útero: ' . $Utero . '</td>';
			}
			if (!empty($Endometrio)) {
				$CiclosEmbarazoTexto .= '<td colspan="2">Endometrio: ' . $Endometrio . '</td>';
			}
			$CiclosEmbarazoTexto .= '</tr>';
		}
		
		if (!empty($Saco_Gestional) || !empty($Embrion)) {
			$CiclosEmbarazoTexto .= '<tr>';
			if (!empty($Saco_Gestional)) {
				$CiclosEmbarazoTexto .= '<td colspan="2">Saco Gestacional: ' . $Saco_Gestional . '</td>';
			}
			if (!empty($Embrion)) {
				$CiclosEmbarazoTexto .= '<td colspan="2">Embrión: ' . $Embrion . '</td>';
			}
			$CiclosEmbarazoTexto .= '</tr>';
		}
		
		if (!empty($Hallazgos)) {
			$CiclosEmbarazoTexto .= '<tr>';
			$CiclosEmbarazoTexto .= '<td colspan="4">Hallazgos: ' . $Hallazgos . '</td>';
			$CiclosEmbarazoTexto .= '</tr>';
		}
		
		if (!empty($Diagnostico)) {
			$CiclosEmbarazoTexto .= '<tr>';
			$CiclosEmbarazoTexto .= '<td colspan="4">Diagnóstico: ' . $Diagnostico . '</td>';
			$CiclosEmbarazoTexto .= '</tr>';
		}
		
		if (!empty($CiclosEmbarazoTexto)) {
			$CiclosEmbarazoTexto = '<tr><td colspan="4" style="text-align:center;"><b>Ciclos de Embarazo</b></td></tr>' . $CiclosEmbarazoTexto;
		}
		//////////////////////////////////////////////////////////////////////////////////



	    $ecografia_colposcopia=$co1.$co2.$co3.$co4.$co5.$co6.$co7.$co8.$co9.$co10.$co11.$co12.$co13.$co14.$co15.$co16.$co17.$co18.$co19.$co20.$co21.$co22.$co23.$co24.$co25.$co26.$co27.$co28.$co29.$co30.$co31.$co32.$co33.$co34.$co35.$co36.$co37.$co38.$co39.$co40.$co41.$co42.$co43.$co44.$co45.$co46.$co47.$co48.'</tr>'.$CiclosEmbarazoTexto.'</table>';

$query = "INSERT INTO historiaClinica_ecografias (cliente_id,usuario_id,Fecha,Hora,ecografiaDetalle,  diagnostico,nombreEcografia) 
                      VALUES ($pacienteId, $ID,   $fechar,$hora,$ecografia_colposcopia,$col56,$tipo_eco);";
$enlace_actual = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$enlace_actual = str_replace('.php', '', $enlace_actual);

auditorMaster($idusuario, '1', $enlace_actual, $query);

	    mysqli_query($conn3,"
INSERT INTO historiaClinica_ecografias (cliente_id,usuario_id,Fecha,Hora,ecografiaDetalle,  diagnostico,nombreEcografia) 
                      VALUES ('$pacienteId', '$ID',   '$fechar','$hora','$ecografia_colposcopia','$col56',   '$tipo_eco' )" );
    



					  $historiaClinica1 = mysqli_insert_id($conn3);


if($historiaClinica1!="0" AND $historiaClinica1!=""){
		$Fecha = date("Y-m-d");
		$DatosDocumentos = CargarDocumentos_DocumentosSistema_Ecografias($ID, $_FILES['ImagenesHistoriaEcografias'], "Ecografias");

		foreach ($DatosDocumentos as $key => $value) {

			$Doc_Nombre = $value["Nombre"];
			$Doc_Nombre_Original = $value["Nombre_Original"];
			$Doc_Ruta = $value["Ruta"];
			$Doc_Carpeta = $value["Carpeta"];
			$Tabla = "historiaClinica_ecografias";
			$tabla_id = $historiaClinica1;
			$Doc_usuario_id = $value["usuario_id"];
			$Campo_Input="ImagenesHistoriaEcografias";
			//insert en la tabla de arriba
			
			$Respuesta = mysqli_query($conn3,"INSERT INTO archivos (cliente_id,usuario_id,historia_id,codigo,fecha, NombreVisual,Realizado_Desde,Campo_Input) VALUES   ('$pacienteId', '$Doc_usuario_id','$historiaClinica1','$Doc_Nombre','$Fecha', '$Doc_Nombre_Original','historiaClinica_ecografias','ImagenesHistoriaEcografias')") or die (mysqli_error($conn3));

			if ($Respuesta != true) {
				echo "<script> alert('Error al insertar un documento $Doc_Nombre_Original')</script>";
			}
		} 
}






 $codigo5=$_POST['archivo'];
       

      //$contador5=count($codigo5); 





 foreach($_FILES["archivo"]['tmp_name'] as $key => $tmp_name)
    {
        //Validamos que el archivo exista
        if($_FILES["archivo"]["name"][$key]) {

			
$numeroAleatorio = rand(1, 99999999);
$fechaHoyNumerica = date("Ymd");

$Ran = $numeroAleatorio."-".$fechaHoyNumerica;
$filename = $Ran."-".$_FILES["archivo"]["name"][$key];


            //$filename = $_FILES["archivo"]["name"][$key]; //Obtenemos el nombre original del archivo
            $source = $_FILES["archivo"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
            
            $directorio = 'archivos/'; //Declaramos un  variable con la ruta donde guardaremos los archivos
            
            //Validamos si la ruta de destino existe, en caso de no existir la creamos
            if(!file_exists($directorio)){
                mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");    
            }
            
            $dir=opendir($directorio); //Abrimos el directorio de destino
            $target_path = $directorio.'/'.$filename; //Indicamos la ruta de destino, así como el nombre del archivo
            
            //Movemos y validamos que el archivo se haya cargado correctamente
            //El primer campo es el origen y el segundo el destino
            if(move_uploaded_file($source, $target_path)) { 
                echo "El archivo $filename se ha almacenado en forma exitosa.<br>";
                } else {    
                echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
            }
            closedir($dir); //Cerramos el directorio de destino

			$descripcion = mysqli_real_escape_string($conn3,$descripcion);
			mysqli_query($conn3,"INSERT INTO archivos (cliente_id,usuario_id,historia_id,codigo,fecha, NombreVisual,descripcion,Realizado_Desde) VALUES   ('$pacienteId', '$ID', '$historiaClinica1','$filename','$fechar','$filename','$descripcion','historiaClinica_ecografias')");  


echo "INSERT INTO archivos (cliente_id,usuario_id,historia_id,codigo,fecha, descripcion) VALUES   ('$pacienteId', '$ID', '$historiaClinica1','$filename','$fechar', '$descripcion')";  
        }
 




    


    }






$contador=$_POST['uploader_count'];


for ($i=0; $i <$contador ; $i++) { 
    $nomb=$_POST['uploader_'.$i.'_name'];

    mysqli_query($conn3,"INSERT INTO imgEcografia (idHistoria, imagen) VALUE
    ('$historiaClinica1','$nomb');");
    
		}














    }
    elseif ($tipo_eco == 'Ecografia Renal') 
    {  	
    	//Datos de Ecografia de Renal 
	    $ren1 		= $_POST['rinon_izquierdo'];
	    $ren2 		= $_POST['rinon_derecho'];
	    $ren3 		= $_POST['vejiga'];
	    $ren4 		= $_POST['prostata'];
	    $ren5 		= $_POST['vesicula_seminales_visibles'];
	    $ren6 		= $_POST['cuerpos_amilaceos_visibles'];

	    $ren7 		= $_POST['zona_perifericas'];
	    $ren8 		= $_POST['zona_de_transicion'];

	    $ren9 		= $_POST['zona_central'];
	    $ren10 		= $_POST['conclusiones'];
	    $ren11 		= $_POST['imagen-1'];
	    $ren12 		= $_POST['imagen-2'];

	    $ren13 		= $_POST['imagen-3'];

	    $ren14 		= $_POST['diagnostico4'];

	    $descripcion          = $_POST['descripcion'];  

		///////////////////////////////////////////////////////////////////////////

		$Utero = $_POST['Utero_C'];
		$Endometrio = $_POST['Endometrio_C'];
		$Saco_Gestional = $_POST['Saco_Gestional_C'];
		$Embrion = $_POST['Embrion_C'];
		$Hallazgos = $_POST['Hallazgos_C'];
		$Diagnostico = $_POST['Diagnostico_C'];
		
		$CiclosEmbarazoTexto="";
		if (!empty($Utero) || !empty($Endometrio)) {
			$CiclosEmbarazoTexto .= '<tr>';
			if (!empty($Utero)) {
				$CiclosEmbarazoTexto .= '<td colspan="2">Útero: ' . $Utero . '</td>';
			}
			if (!empty($Endometrio)) {
				$CiclosEmbarazoTexto .= '<td colspan="2">Endometrio: ' . $Endometrio . '</td>';
			}
			$CiclosEmbarazoTexto .= '</tr>';
		}
		
		if (!empty($Saco_Gestional) || !empty($Embrion)) {
			$CiclosEmbarazoTexto .= '<tr>';
			if (!empty($Saco_Gestional)) {
				$CiclosEmbarazoTexto .= '<td colspan="2">Saco Gestacional: ' . $Saco_Gestional . '</td>';
			}
			if (!empty($Embrion)) {
				$CiclosEmbarazoTexto .= '<td colspan="2">Embrión: ' . $Embrion . '</td>';
			}
			$CiclosEmbarazoTexto .= '</tr>';
		}
		
		if (!empty($Hallazgos)) {
			$CiclosEmbarazoTexto .= '<tr>';
			$CiclosEmbarazoTexto .= '<td colspan="4">Hallazgos: ' . $Hallazgos . '</td>';
			$CiclosEmbarazoTexto .= '</tr>';
		}
		
		if (!empty($Diagnostico)) {
			$CiclosEmbarazoTexto .= '<tr>';
			$CiclosEmbarazoTexto .= '<td colspan="4">Diagnóstico: ' . $Diagnostico . '</td>';
			$CiclosEmbarazoTexto .= '</tr>';
		}
		
		if (!empty($CiclosEmbarazoTexto)) {
			$CiclosEmbarazoTexto = '<tr><td colspan="4" style="text-align:center;"><b>Ciclos de Embarazo</b></td></tr>' . $CiclosEmbarazoTexto;
		}
		//////////////////////////////////////////////////////////////////////////////////


       

	    if(strlen($ren1) >= 0){$re1= '
	    	<table class="table table-bordered">
	    		<tr>
	    			<th colspan="5">Riñón Izquierdo</th>
	    		</tr>
	    		<tr>
	    			<td colspan="5">'.$ren1.'</td>
	    		</tr>';}
	    if(strlen($ren2) >= 0){$re2= '
	    		<tr>
	    			<th colspan="5">Riñón Derecho:</th>
	    		</tr>
	    		<tr>
	    			<td colspan="5">'.$ren2.'</td>
	    		</tr>';}
	    if(strlen($ren3) >= 0){$re3= '
	    		<tr>
	    			<th colspan="5">Vejiga</th>
	    		</tr>
	    		<tr>
	    			<td colspan="5">'.$ren3.'</td>
	    		</tr>';}
	    if(strlen($ren4) >= 0){$re4= '
	    		<tr>
	    			<th colspan="5">Próstata</th>
	    		</tr>
	    		<tr>
	    			<td colspan="5">'.$ren4.'</td>
	    		</tr>';}
	    if(strlen($ren5) >= 0){$re5= '
	    		<tr><th colspan="5"></th></tr>
	    		<tr>
	    			<td colspan="2">Vesículas Seminales Visibles:'.$ren5.'</td>';} 
	    if(strlen($ren6) >= 0){$re6= '
	    			<td>Cuerpos Amiláceos Visibles: '.$ren6.'</td>';}
	    if(strlen($ren7) >= 0){$re7= '
	    			<td colspan="2">Zona Periférica: '.$ren7.'</td>
	    		</tr>';}
	    if(strlen($ren8) >= 0){$re8= '
	    		<tr>
	    			<td colspan="2">Zona de Transición: '.$ren8.'</td>';}
	    if(strlen($ren9) >= 0){$re9= '
	    			<td colspan="3">Zona Central: '.$ren9.'</td>
	    		</tr>';}
	    if(strlen($ren10) >= 0){$re10= '
	    		<tr>
	    			<th colspan="5">Conclusiones del Informe:</th>
	    		</tr>
	    		<tr>
	    			<td colspan="5">'.$ren10.'';}


	    $ecografia_renal=$re1.$re2.$re3.$re4.$re5.$re6.$re7.$re8.$re9.$re10.'</td></tr>'.$CiclosEmbarazoTexto.'</table>';

	    $query = "INSERT INTO historiaClinica_ecografias (cliente_id,usuario_id,Fecha,Hora,ecografiaDetalle,diagnostico,nombreEcografia) 
	    	VALUES ($pacienteId,$ID,$fechar,$hora,$ecografia_renal,$ren14,$tipo_eco);";
$enlace_actual = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$enlace_actual = str_replace('.php', '', $enlace_actual);

auditorMaster($idusuario, '1', $enlace_actual, $query);

	    mysqli_query($conn3,"
	    	INSERT INTO historiaClinica_ecografias (cliente_id,usuario_id,Fecha,Hora,ecografiaDetalle,diagnostico,nombreEcografia) 
	    	VALUES ('$pacienteId','$ID','$fechar','$hora','$ecografia_renal','$ren14','$tipo_eco')");
    	



		$historiaClinica1 = mysqli_insert_id($conn3);


if($historiaClinica1!="0" AND $historiaClinica1!=""){
		$Fecha = date("Y-m-d");
		$DatosDocumentos = CargarDocumentos_DocumentosSistema_Ecografias($ID, $_FILES['ImagenesHistoriaEcografias'], "Ecografias");

		foreach ($DatosDocumentos as $key => $value) {

			$Doc_Nombre = $value["Nombre"];
			$Doc_Nombre_Original = $value["Nombre_Original"];
			$Doc_Ruta = $value["Ruta"];
			$Doc_Carpeta = $value["Carpeta"];
			$Tabla = "historiaClinica_ecografias";
			$tabla_id = $historiaClinica1;
			$Doc_usuario_id = $value["usuario_id"];
			$Campo_Input="ImagenesHistoriaEcografias";
			//insert en la tabla de arriba
			
			$Respuesta = mysqli_query($conn3,"INSERT INTO archivos (cliente_id,usuario_id,historia_id,codigo,fecha, NombreVisual,Realizado_Desde,Campo_Input) VALUES   ('$pacienteId', '$Doc_usuario_id','$historiaClinica1','$Doc_Nombre','$Fecha', '$Doc_Nombre_Original','historiaClinica_ecografias','ImagenesHistoriaEcografias')") or die (mysqli_error($conn3));

			if ($Respuesta != true) {
				echo "<script> alert('Error al insertar un documento $Doc_Nombre_Original')</script>";
			}
		} 
}








          $codigo6=$_POST['archivo'];
       

      //$contador6=count($codigo6); 





 foreach($_FILES["archivo"]['tmp_name'] as $key => $tmp_name)
    {
        //Validamos que el archivo exista
        if($_FILES["archivo"]["name"][$key]) {
            
			$numeroAleatorio = rand(1, 99999999);
            $fechaHoyNumerica = date("Ymd");

            $Ran = $numeroAleatorio."-".$fechaHoyNumerica;
            $filename = $Ran."-".$_FILES["archivo"]["name"][$key];


			//$filename = $_FILES["archivo"]["name"][$key]; //Obtenemos el nombre original del archivo
            $source = $_FILES["archivo"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
            
            $directorio = 'archivos/'; //Declaramos un  variable con la ruta donde guardaremos los archivos
            
            //Validamos si la ruta de destino existe, en caso de no existir la creamos
            if(!file_exists($directorio)){
                mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");    
            }
            
            $dir=opendir($directorio); //Abrimos el directorio de destino
            $target_path = $directorio.'/'.$filename; //Indicamos la ruta de destino, así como el nombre del archivo
            
            //Movemos y validamos que el archivo se haya cargado correctamente
            //El primer campo es el origen y el segundo el destino
            if(move_uploaded_file($source, $target_path)) { 
                echo "El archivo $filename se ha almacenado en forma exitosa.<br>";
                } else {    
                echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
            }
            closedir($dir); //Cerramos el directorio de destino

			$descripcion = mysqli_real_escape_string($conn3,$descripcion);

			mysqli_query($conn3,"INSERT INTO archivos (cliente_id,usuario_id,historia_id,codigo,fecha, NombreVisual,descripcion,Realizado_Desde) VALUES   ('$pacienteId', '$ID', '$historiaClinica1','$filename','$fechar','$filename' , '$descripcion','historiaClinica_ecografias')");  


echo "INSERT INTO archivos (cliente_id,usuario_id,historia_id,codigo,fecha, descripcion) VALUES   ('$pacienteId', '$ID', '$historiaClinica1','$filename','$fechar', '$descripcion')";

        }
 




      


    }



$contador=$_POST['uploader_count'];

echo '------------------------------------------------------------------  '.$historiaClinica1;
echo '------------------------------------------------------------------  '.$contador;
for ($i=0; $i <$contador ; $i++) { 
    $nomb=$_POST['uploader_'.$i.'_name'];

    mysqli_query($conn3,"INSERT INTO imgEcografia (idHistoria, imagen) VALUE
    ('$historiaClinica1','$nomb');");
    echo "INSERT INTO imgEcografia (idHistoria, imagen) VALUE
    ('$historiaClinica1','$nomb');";
		}



    }
    elseif ($tipo_eco == 'Ecografia Mamaria')
    {
    	// Ecografia Mamaria
    	//I Mama
	    $mam1 		= $_POST['posicion'];

	    $mam2 		= $_POST['piel'];
	    $mam3 		= $_POST['grasa'];
	    $mam4 		= $_POST['tejido_glandular'];
	    $mam5 		= $_POST['TCS'];
	    $mam6 		= $_POST['cond_m'];
	    $mam7 		= $_POST['pezon'];
	    $mam8 		= $_POST['Lig_Coo'];
	    $mam9 		= $_POST['costillas'];
	    $mam10 		= $_POST['corte'];
	    $mam11 		= $_POST['presente_masas'];
	    $mam12 		= $_POST['form'];
	    $mam13 		= $_POST['orientacion'];
	    $mam14 		= $_POST['margenes'];
	    $mam15 		= $_POST['periferia'];
	    $mam16 		= $_POST['ecogenicidad'];
	    $mam17 		= $_POST['caracteristicas_ultrasonograficas_posteriores'];
	    $mam18 		= $_POST['tejido_adyacente'];
	    $mam19 		= $_POST['presente_calcificaciones'];
	    $mam20 		= $_POST['macro_calc'];
	    $mam21 		= $_POST['micro_calc_fuera'];
	    $mam22 		= $_POST['micro_calc_dentro'];
	    $mam23 		= $_POST['micro_quistes_complicados'];
	    $mam24 		= $_POST['quistes_complicados'];
	    $mam25 		= $_POST['masa_en_piel'];
	    $mam26 		= $_POST['cuerpo_extraño'];
	    $mam27 		= $_POST['adenopatia_intramamaria'];
	    $mam28 		= $_POST['adenopatia_axilar'];
	    $mam29 		= $_POST['presente_vascularizacion'];
	    $mam30 		= $_POST['presente_dentro'];
	    $mam31 		= $_POST['presente_adyacente'];
	    $mam32 		= $_POST['presente_en_tejido_adyacente'];

	    //II Mama
	    $mam33 		= $_POST['pi'];
	    $mam34 		= $_POST['grasa1'];
	    $mam35 		= $_POST['tejido_glandular1'];
	    $mam36 		= $_POST['TCS1'];
	    $mam37 		= $_POST['cond_m1'];
	    $mam38 		= $_POST['pezon1'];
	    $mam39 		= $_POST['Lig_Coo1'];
	    $mam40 		= $_POST['costillas1'];
	    $mam41 		= $_POST['corte1'];
	    $mam42 		= $_POST['presente_masas1'];
	    $mam43 		= $_POST['forma1'];
	    $mam44 		= $_POST['orientacion1'];
	    $mam45 		= $_POST['margenes1'];
	    $mam46 		= $_POST['periferia1'];
	    $mam47 		= $_POST['ecogenicidad1'];
	    $mam48 		= $_POST['caracteristicas_ultrasonograficas_posteriores1'];
	    $mam49 		= $_POST['tejido_adyacente1'];

	    $mam50 		= $_POST['presente_calcificaciones1'];
	    $mam51 		= $_POST['macro_calc1'];
	    $mam52 		= $_POST['micro_calc_fuera1'];
	    $mam53 		= $_POST['micro_calc_dentro1'];
	    $mam54 		= $_POST['micro_quistes_complicados1'];
	    $mam55 		= $_POST['quistes_complicados1'];
	    $mam56 		= $_POST['masa_en_piel1'];
	    $mam57 		= $_POST['cuerpo_extraño1'];
	    $mam58 		= $_POST['adenopatia_intramamaria1'];
	    $mam59 		= $_POST['adenopatia_axilar1'];
	    $mam60 		= $_POST['presente_vascularizacion1'];
	    $mam61 		= $_POST['presente_dentro1'];
	    $mam62 		= $_POST['presente_adyacente1'];
	    $mam63 		= $_POST['presente_en_tejido_adyacente1'];

	    $mam64		= $_POST['diagnostico6'];
	    $mam65 		= $_POST['imagen1_1'];
	    $mam66 		= $_POST['imagen1_2'];
	    $mam67 		= $_POST['imagen1_3'];

	    $descripcion          = $_POST['descripcion'];  

       ///////////////////////////////////////////////////////////////////////////

		$Utero = $_POST['Utero_C'];
		$Endometrio = $_POST['Endometrio_C'];
		$Saco_Gestional = $_POST['Saco_Gestional_C'];
		$Embrion = $_POST['Embrion_C'];
		$Hallazgos = $_POST['Hallazgos_C'];
		$Diagnostico = $_POST['Diagnostico_C'];
		
		$CiclosEmbarazoTexto="";
		if (!empty($Utero) || !empty($Endometrio)) {
			$CiclosEmbarazoTexto .= '<tr>';
			if (!empty($Utero)) {
				$CiclosEmbarazoTexto .= '<td colspan="2">Útero: ' . $Utero . '</td>';
			}
			if (!empty($Endometrio)) {
				$CiclosEmbarazoTexto .= '<td colspan="2">Endometrio: ' . $Endometrio . '</td>';
			}
			$CiclosEmbarazoTexto .= '</tr>';
		}
		
		if (!empty($Saco_Gestional) || !empty($Embrion)) {
			$CiclosEmbarazoTexto .= '<tr>';
			if (!empty($Saco_Gestional)) {
				$CiclosEmbarazoTexto .= '<td colspan="2">Saco Gestacional: ' . $Saco_Gestional . '</td>';
			}
			if (!empty($Embrion)) {
				$CiclosEmbarazoTexto .= '<td colspan="2">Embrión: ' . $Embrion . '</td>';
			}
			$CiclosEmbarazoTexto .= '</tr>';
		}
		
		if (!empty($Hallazgos)) {
			$CiclosEmbarazoTexto .= '<tr>';
			$CiclosEmbarazoTexto .= '<td colspan="4">Hallazgos: ' . $Hallazgos . '</td>';
			$CiclosEmbarazoTexto .= '</tr>';
		}
		
		if (!empty($Diagnostico)) {
			$CiclosEmbarazoTexto .= '<tr>';
			$CiclosEmbarazoTexto .= '<td colspan="4">Diagnóstico: ' . $Diagnostico . '</td>';
			$CiclosEmbarazoTexto .= '</tr>';
		}
		
		if (!empty($CiclosEmbarazoTexto)) {
			$CiclosEmbarazoTexto = '<tr><td colspan="4" style="text-align:center;"><b>Ciclos de Embarazo</b></td></tr>' . $CiclosEmbarazoTexto;
		}
		//////////////////////////////////////////////////////////////////////////////////

         
	    if(strlen($mam1) >= 0){$ma1= '
	    	<table class="table table-bordered">
	    		<tr>
	    			<th>'.$mam1.'</th>
	    		</tr>
	    		<tr>
	    			<th colspan="3" class="text-center">I.- Mama Derecha</th>
	    		</tr>';}
	    if(strlen($mam2) >= 0){$ma2= '
	    		<tr>
	    			<td>Piel: '.$mam2.'</td>';}
	    if(strlen($mam3) >= 0){$ma3= '
	    			<td>Grasa: '.$mam3.'</td>';}
	    if(strlen($mam4) >= 0){$ma4= '
	    			<td>Tejido Glandular:'.$mam4.'</td>
	    		</tr>';}
	    if(strlen($mam5) >= 0){$ma5= '
	    		<tr>
	    			<td>Tejido Conectivo de Sostén:'.$mam5.'</td>';} 
	    if(strlen($mam6) >= 0){$ma6= '
	    			<td>Conductos Mamarios: '.$mam6.'</td>';}
	    if(strlen($mam7) >= 0){$ma7= '
	    			<td>Pezón: '.$mam7.'</td>
	    		</tr>';}
	    if(strlen($mam8) >= 0){$ma8= '
	    		<tr>
	    			<td>Ligamentos de Cooper: '.$mam8.'</td>';}
	    if(strlen($mam9) >= 0){$ma9= '
	    			<td colspan="2">Costillas: '.$mam9.' , ';}
	    if(strlen($mam10) >= 0){$ma10= ' Se Observan a Intervalos Regulares en el Corte: '.$mam10.'</td>
	    		</tr>';}
	    if(strlen($mam11) >= 0){$ma11= '
	    		<tr>
	    			<th colspan="3">Masas</th>
	    		</tr>
	    		<tr>
	    			<td> Presente: '.$mam11.'</td>';}
	    if(strlen($mam12) >= 0){$ma12= '
	    			<td>Forma: '.$mam12.'</td>';}
	    if(strlen($mam13) >= 0){$ma13= '
	    			<td>Orientación: '.$mam13.'</td>
	    		</tr>';}
	    if(strlen($mam14) >= 0){$ma14= '
	    		<tr>
	    			<td>Márgenes: '.$mam14.'</td>';}
	    if(strlen($mam15) >= 0){$ma15= '
	    			<td>Periféria: '.$mam15.'</td>';}
	    if(strlen($mam16) >= 0){$ma16= '
	    			<td>Ecogenicidad: '.$mam16.'</td>
	    		</tr>';}
	    if(strlen($mam17) >= 0){$ma17= '
	    		<tr>
	    			<td colspan="3">Caracteristicas Ultrasonográficas Posteriores: '.$mam17.'</td>
	    		</tr>';}
	    if(strlen($mam18) >= 0){$ma18= '
	    		<tr>
	    			<td colspan="3">Tejido Adyacente:'.$mam18.'<br></td>
	    		</tr>';}
	    if(strlen($mam19) >= 0){$ma19= '
	    		<tr>
	    			<th colspan="3">Calcificaciones</th>
	    		</tr>
	    		<tr>
	    			<td>Presente: '.$mam19.'</td>';}
	    if(strlen($mam20) >= 0){$ma20= '
	    			<td>Macrocalcificaciones: '.$mam20.'</td>';}
	    if(strlen($mam21) >= 0){$ma21= '
	    			<td>Microcalcificaciones por fuera de la masa: '.$mam21.'</td>
	    		</tr>';}
	    if(strlen($mam22) >= 0){$ma22= '
	    		<tr>
	    			<td colspan="3">Microcalcificaciones por dentro de la masa: '.$mam22.'</td>
	    		</tr>';}
	    if(strlen($mam23) >= 0){$ma23= '
	    		<tr>
	    			<th colspan="3">Casos Especiales </th>
	    		</tr>
	    		<tr>
	    			<td> Micro Quistes Complicados: '.$mam23.'</td>';}
	    if(strlen($mam24) >= 0){$ma24= '
	    			<td>Quistes Complicados: '.$mam24.'</td>';}
	    if(strlen($mam25) >= 0){$ma25= '
	    			<td>Masa en Piel: '.$mam25.'</td>
	    		</tr>';}
	    if(strlen($mam26) >= 0){$ma26= '
	    		<tr>
	    			<td>Cuerpo Extraño: '.$mam26.'</td>';}
	    if(strlen($mam27) >= 0){$ma27= '
	    			<td>Adenopatía Intramamaria: '.$mam27.'</td>';}
	    if(strlen($mam28) >= 0){$ma28= '
	    			<td>Adenopatía Axilar: '.$mam28.'</td>
	    		</tr>';}
	    if(strlen($mam29) >= 0){$ma29= '
	    		<tr>
	    			<th colspan="3">Vascularización</th>
	    		</tr>
	    		<tr>
	    			<td>No presente / No Evaluada: '.$mam29.'</td>';}
	    if(strlen($mam30) >= 0){$ma30= '
	    			<td>Presente dentro de la lesión: '.$mam30.'</td>';}
	    if(strlen($mam31) >= 0){$ma31= '
	    			<td>Presente adyacente de la lesión: '.$mam31.'</td>
	    		</tr>';}
	    if(strlen($mam32) >= 0){$ma32= '
	    		<tr>
	    			<td colspan="3">Presente en tejido adyacente: '.$mam32.'</td>
	    		</tr>';}

	    if(strlen($mam33) >= 0){$ma33= '
	    		<tr>
	    			<th colspan="3" class="text-center">II.- Mama Izquierda</th>
	    		</tr>
	    		<tr>
	    			<td>Piel:'.$mam33.'</td>';}
	    if(strlen($mam34) >= 0){$ma34= '
	    			<td>Grasa: '.$mam34.'</td>';}
	    if(strlen($mam35) >= 0){$ma35= '
	    			<td>Tejido Glandular:'.$mam35.'</td>
	    		</tr>';}
	    if(strlen($mam36) >= 0){$ma36= '
	    		<tr>
	    			<td>Tejido Conectivo de Sostén:'.$mam36.'</td>';} 
	    if(strlen($mam37) >= 0){$ma37= '
	    			<td>Conductos Mamarios: '.$mam37.'</td>';}
	    if(strlen($mam38) >= 0){$ma38= '
	    			<td>Pezón: '.$mam38.'</td>
	    		</tr>';}
	    if(strlen($mam39) >= 0){$ma39= '
	    		<tr>
	    			<td>Ligamentos de Cooper: '.$mam39.'</td>';}
	    if(strlen($mam40) >= 0){$ma40= '
	    			<td colspan="2">Costillas: '.$mam40.' , ';}
	    if(strlen($mam41) >= 0){$ma41= ' Se Observan a Intervalos Regulares en el Corte: '.$mam41.'</td>
	    		</tr>';}
	    if(strlen($mam42) >= 0){$ma42= '
	    		<tr>
	    			<th colspan="3">Masas </th>
	    		</tr>
	    		<tr>
	    			<td> Presente: '.$mam42.'</td>';}
	    if(strlen($mam43) >= 0){$ma43= '
	    			<td>Forma: '.$mam43.'</td>';}
	    if(strlen($mam44) >= 0){$ma44= '
	    			<td>Orientación: '.$mam44.'</td>
	    		</tr>';}
	    if(strlen($mam45) >= 0){$ma45= '
	    		<tr>
	    			<td>Márgenes: '.$mam45.'</td>';}
	    if(strlen($mam46) >= 0){$ma46= '
	    			<td>Periféria: '.$mam46.'</td>';}
	    if(strlen($mam47) >= 0){$ma47= '
	    			<td>Ecogenicidad: '.$mam47.'</td>
	    		</tr>';}
	    if(strlen($mam48) >= 0){$ma48= '
	    		<tr>
	    			<td colspan="3">Caracteristicas Ultrasonográficas Posteriores: '.$mam48.'</td>
	    		</tr>';}
	    if(strlen($mam49) >= 0){$ma49= '
	    		<tr>
	    			<td colspan="3">Tejido Adyacente:'.$mam49.'<br></td>
	    		</tr>';}
	    if(strlen($mam50) >= 0){$ma50= '
	    		<tr>
	    			<th colspan="3">Calcificaciones </th>
	    		</tr>
	    		<tr>
	    			<td> Presente: '.$mam50.'</td>';}
	    if(strlen($mam51) >= 0){$ma51= '
	    			<td>Macrocalcificaciones: '.$mam51.'</td>';}
	    if(strlen($mam52) >= 0){$ma52= '
	    			<td>Microcalcificaciones por fuera de la masa: '.$mam52.'</td>
	    		</tr>';}
	    if(strlen($mam53) >= 0){$ma53= '
	    		<tr>
	    			<td colspan="3">Microcalcificaciones por dentro de la masa: '.$mam53.'</td>
	    		</tr>';}
	    if(strlen($mam54) >= 0){$ma54= '
	    		<tr>
	    			<th colspan="3">Casos Especiales </th>
	    		</tr>
	    		<tr>
	    			<td> Micro Quistes Complicados: '.$mam54.'</td>';}
	    if(strlen($mam55) >= 0){$ma55= '
	    			<td>Quistes Complicados: '.$mam55.'</td>';}
	    if(strlen($mam56) >= 0){$ma56= '
	    			<td>Masa en Piel: '.$mam56.'</td>
	    		</tr>';}
	    if(strlen($mam57) >= 0){$ma57= '
	    		<tr>
	    			<td>Cuerpo Extraño: '.$mam57.'</td>';}
	    if(strlen($mam58) >= 0){$ma58= '
	    			<td>Adenopatía Intramamaria: '.$mam58.'</td>';}
	    if(strlen($mam59) >= 0){$ma59= '
	    			<td>Adenopatía Axilar: '.$mam59.'</td>
	    		</tr>';}

	    if(strlen($mam60) >= 0){$ma60= '
	    		<tr>
	    			<th colspan="3">Vascularización </th>
	    		</tr>
	    		<tr>
	    			<td> No presente / No Evaluada: '.$mam60.'</td>';}
	    if(strlen($mam61) >= 0){$ma61= '
	    			<td>Presente dentro de la lesión: '.$mam61.'</td>';}
	    if(strlen($mam62) >= 0){$ma62= '
	    			<td>Presente adyacente de la lesión: '.$mam62.'</td>
	    		</tr>';}
	    if(strlen($mam63) >= 0){$ma63= '
	    		<tr>
	    			<td colspan="3">Presente en tejido adyacente: '.$mam63.'';}
	    
	    $ecografia_mamaria=$ma1.$ma2.$ma3.$ma4.$ma5.$ma6.$ma7.$ma8.$ma9.$ma10.$ma11.$ma12.$ma13.$ma14.$ma15.$ma16.$ma17.$ma18.$ma19.$ma20.$ma21.$ma22.$ma23.$ma24.$ma25.$ma26.$ma27.$ma28.$ma29.$ma30.$ma31.$ma32.$ma33.$ma34.$ma35.$ma36.$ma37.$ma38.$ma39.$ma40.$ma41.$ma42.$ma43.$ma44.$ma45.$ma46.$ma47.$ma48.$ma49.$ma50.$ma51.$ma52.$ma53.$ma54.$ma55.$ma56.$ma57.$ma58.$ma59.$ma60.$ma61.$ma62.$ma63.'</td></tr>'.$CiclosEmbarazoTexto.'</table>';

$query = "INSERT INTO historiaClinica_ecografias (cliente_id,usuario_id,Fecha,Hora,ecografiaDetalle,diagnostico,nombreEcografia,nombreEcografiaTilde)
    		VALUES ($pacienteId,$ID,$fechar,$hora,$Datos,$eco36,$tipo_eco,$tipo_ecotilde);";
$enlace_actual = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$enlace_actual = str_replace('.php', '', $enlace_actual);

auditorMaster($idusuario, '1', $enlace_actual, $query);

	    mysqli_query($conn3,"
	    	INSERT INTO historiaClinica_ecografias (cliente_id,usuario_id,Fecha,Hora,ecografiaDetalle,diagnostico,nombreEcografia) 
	    	VALUES ('$pacienteId','$ID','$fechar','$hora','$ecografia_mamaria','$mam64','$tipo_eco')" );


		$historiaClinica1 = mysqli_insert_id($conn3);


if($historiaClinica1!="0" AND $historiaClinica1!=""){
		$Fecha = date("Y-m-d");
		$DatosDocumentos = CargarDocumentos_DocumentosSistema_Ecografias($ID, $_FILES['ImagenesHistoriaEcografias'], "Ecografias");

		foreach ($DatosDocumentos as $key => $value) {

			$Doc_Nombre = $value["Nombre"];
			$Doc_Nombre_Original = $value["Nombre_Original"];
			$Doc_Ruta = $value["Ruta"];
			$Doc_Carpeta = $value["Carpeta"];
			$Tabla = "historiaClinica_ecografias";
			$tabla_id = $historiaClinica1;
			$Doc_usuario_id = $value["usuario_id"];
			$Campo_Input="ImagenesHistoriaEcografias";
			//insert en la tabla de arriba
			
			$Respuesta = mysqli_query($conn3,"INSERT INTO archivos (cliente_id,usuario_id,historia_id,codigo,fecha, NombreVisual,Realizado_Desde,Campo_Input) VALUES   ('$pacienteId', '$Doc_usuario_id','$historiaClinica1','$Doc_Nombre','$Fecha', '$Doc_Nombre_Original','historiaClinica_ecografias','ImagenesHistoriaEcografias')") or die (mysqli_error($conn3));

			if ($Respuesta != true) {
				echo "<script> alert('Error al insertar un documento $Doc_Nombre_Original')</script>";
			}
		} 
}


    	 $codigo7=$_POST['archivo'];
       

      //$contador7=count($codigo7); 





 foreach($_FILES["archivo"]['tmp_name'] as $key => $tmp_name)
    {
        //Validamos que el archivo exista
        if($_FILES["archivo"]["name"][$key]) {
            $numeroAleatorio = rand(1, 99999999);
            $fechaHoyNumerica = date("Ymd");

            $Ran = $numeroAleatorio."-".$fechaHoyNumerica;
            $filename = $Ran."-".$_FILES["archivo"]["name"][$key];

			
			//$filename = $_FILES["archivo"]["name"][$key]; //Obtenemos el nombre original del archivo
            $source = $_FILES["archivo"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
            
            $directorio = 'archivos/'; //Declaramos un  variable con la ruta donde guardaremos los archivos
            
            //Validamos si la ruta de destino existe, en caso de no existir la creamos
            if(!file_exists($directorio)){
                mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");    
            }
            
            $dir=opendir($directorio); //Abrimos el directorio de destino
            $target_path = $directorio.'/'.$filename; //Indicamos la ruta de destino, así como el nombre del archivo
            
            //Movemos y validamos que el archivo se haya cargado correctamente
            //El primer campo es el origen y el segundo el destino
            if(move_uploaded_file($source, $target_path)) { 
                echo "El archivo $filename se ha almacenado en forma exitosa.<br>";
                } else {    
                echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
            }
            closedir($dir); //Cerramos el directorio de destino

			$descripcion = mysqli_real_escape_string($conn3,$descripcion);

			mysqli_query($conn3,"INSERT INTO archivos (cliente_id,usuario_id,historia_id,codigo,fecha, NombreVisual,descripcion,Realizado_Desde) VALUES   ('$pacienteId', '$ID', '$historiaClinica1','$filename','$fechar','$filename' , '$descripcion', 'historiaClinica_ecografias')");  


echo "INSERT INTO archivos (cliente_id,usuario_id,historia_id,codigo,fecha, descripcion) VALUES   ('$pacienteId', '$ID', '$historiaClinica1','$filename','$fechar', '$descripcion')"; 

        }
 




     


    }



$contador=$_POST['uploader_count'];


for ($i=0; $i <$contador ; $i++) { 
    $nomb=$_POST['uploader_'.$i.'_name'];

    mysqli_query($conn3,"INSERT INTO imgEcografia (idHistoria, imagen) VALUE
    ('$historiaClinica1','$nomb');");
    
		}

    }
    elseif ($tipo_eco == 'Ecografia Abdominal')
    {
    	//Datos de ecografia Abdominal
	    $abdo1      = $_POST['morfologica1'];
	    $abdo2      = $_POST['morfologica2'];
	    $abdo3      = $_POST['morfologica3'];

	    $abdo4      = $_POST['bordes1'];
	    $abdo5      = $_POST['bordes2'];
	    $abdo6      = $_POST['bordes3'];

	    $abdo7      = $_POST['dimensiones1'];
	    $abdo8      = $_POST['dimensiones2'];
	    $abdo9      = $_POST['dimensiones3'];

	    $abdo10     = $_POST['ecogenicidad4'];
	    $abdo11     = $_POST['ecogenicidad5'];
	    $abdo12     = $_POST['ecogenicidad6'];

	    $abdo13    	= $_POST['imagen_ex1'];
	    $abdo14     = $_POST['imagen_ex2'];
	    $abdo15     = $_POST['imagen_ex3'];

	    $abdo16     = $_POST['coledoco1'];
	    $abdo17     = $_POST['coledoco2'];
	    $abdo18     = $_POST['coledoco3'];

	    $abdo19     = $_POST['vena_porta1'];
	    $abdo20     = $_POST['vena_porta2'];
	    $abdo21     = $_POST['vena_porta3'];

	    $abdo22     = $_POST['observacion_higado'];

	    $abdo23     = $_POST['form1'];
        $abdo24     = $_POST['form2'];
        $abdo25     = $_POST['form3'];

        $abdo26     = $_POST['paredes1'];
        $abdo27     = $_POST['paredes2'];
        $abdo28     = $_POST['paredes3'];

        $abdo29     = $_POST['tamaño1'];
        $abdo30     = $_POST['tamaño2'];
        $abdo31     = $_POST['tamaño3'];

        $abdo32     = $_POST['barro_biliar1'];
        $abdo33     = $_POST['barro_biliar2'];
        $abdo34     = $_POST['barro_biliar3'];

        $abdo35      = $_POST['imagen_ex4'];
        $abdo36      = $_POST['imagen_ex5'];
        $abdo37      = $_POST['imagen_ex6'];

        $abdo38      = $_POST['observacion_vesicula'];

        $abdo39      = $_POST['form4'];
        $abdo40      = $_POST['form5'];
        $abdo41      = $_POST['form6'];

        $abdo42      = $_POST['ecogenicidad7'];
        $abdo43      = $_POST['ecogenicidad8'];
        $abdo44      = $_POST['ecogenicidad9'];

        $abdo45      = $_POST['cabeza1'];
        $abdo46      = $_POST['cabeza2'];
        $abdo47      = $_POST['cabeza3'];

        $abdo48      = $_POST['cuerpo1'];
        $abdo49      = $_POST['cuerpo2'];
        $abdo50      = $_POST['cuerpo3'];

        $abdo51      = $_POST['cola1'];
        $abdo52      = $_POST['cola2'];
        $abdo53      = $_POST['cola3'];

        $abdo54      = $_POST['wirsung1'];
        $abdo55      = $_POST['wirsung2'];
        $abdo56      = $_POST['wirsung3'];

        $abdo57      = $_POST['observacion_pancreas'];

	    $abdo58      = $_POST['MEM'];
	    $abdo59      = $_POST['tamaño4'];
	    $abdo60      = $_POST['calibre1'];
	    $abdo61      = $_POST['flujo1'];
	    $abdo62      = $_POST['paredes_gastricas'];
	    $abdo63      = $_POST['liquido_libre'];
	    $abdo64      = $_POST['conclusion_informe'];

	    $abdo65      = $_POST['imagen44'];
	    $abdo66      = $_POST['imagen45'];
	    $abdo67      = $_POST['imagen46'];

	    $abdo68      = $_POST['diagnostico6'];

	    $descripcion          = $_POST['descripcion'];  

       

         ///////////////////////////////////////////////////////////////////////////

		$Utero = $_POST['Utero_C'];
		$Endometrio = $_POST['Endometrio_C'];
		$Saco_Gestional = $_POST['Saco_Gestional_C'];
		$Embrion = $_POST['Embrion_C'];
		$Hallazgos = $_POST['Hallazgos_C'];
		$Diagnostico = $_POST['Diagnostico_C'];
		
		$CiclosEmbarazoTexto="";
		if (!empty($Utero) || !empty($Endometrio)) {
			$CiclosEmbarazoTexto .= '<tr>';
			if (!empty($Utero)) {
				$CiclosEmbarazoTexto .= '<td colspan="2">Útero: ' . $Utero . '</td>';
			}
			if (!empty($Endometrio)) {
				$CiclosEmbarazoTexto .= '<td colspan="2">Endometrio: ' . $Endometrio . '</td>';
			}
			$CiclosEmbarazoTexto .= '</tr>';
		}
		
		if (!empty($Saco_Gestional) || !empty($Embrion)) {
			$CiclosEmbarazoTexto .= '<tr>';
			if (!empty($Saco_Gestional)) {
				$CiclosEmbarazoTexto .= '<td colspan="2">Saco Gestacional: ' . $Saco_Gestional . '</td>';
			}
			if (!empty($Embrion)) {
				$CiclosEmbarazoTexto .= '<td colspan="2">Embrión: ' . $Embrion . '</td>';
			}
			$CiclosEmbarazoTexto .= '</tr>';
		}
		
		if (!empty($Hallazgos)) {
			$CiclosEmbarazoTexto .= '<tr>';
			$CiclosEmbarazoTexto .= '<td colspan="4">Hallazgos: ' . $Hallazgos . '</td>';
			$CiclosEmbarazoTexto .= '</tr>';
		}
		
		if (!empty($Diagnostico)) {
			$CiclosEmbarazoTexto .= '<tr>';
			$CiclosEmbarazoTexto .= '<td colspan="4">Diagnóstico: ' . $Diagnostico . '</td>';
			$CiclosEmbarazoTexto .= '</tr>';
		}
		
		if (!empty($CiclosEmbarazoTexto)) {
			$CiclosEmbarazoTexto = '<tr><td colspan="4" style="text-align:center;"><b>Ciclos de Embarazo</b></td></tr>' . $CiclosEmbarazoTexto;
		}
		//////////////////////////////////////////////////////////////////////////////////


	    if(strlen($abdo1) >= 0){$ad1= '
	    	<table class="table table-bordered">
	    		<tr>
	    			<th colspan="4" class="text-center">Hígado</th>
	    		</tr>
	    		<tr class="text-center">
	    			<th></th>
	    			<th>Normal</th>
	    			<th>Anormal</th>
	    			<th>Valor Normal</th>
	    		</tr>
	    		<tr>
	    			<td>Morfología</td>
	    			<td>'.$abdo1.'</td>';}else{$ad1= '<td>   </td>';}
	    if(strlen($abdo2) >= 0){$ad2= '<td>'.$abdo2.'</td>';}else{$ad2= '<td>   </td>';}
	    if(strlen($abdo3) >= 0){$ad3= '<td>'.$abdo3.'</td></tr>';}else{$ad3= '<td>   </td></tr>';}

	    if(strlen($abdo4) >= 0){$ad4= '<tr><td>Bordes</td><td>'.$abdo4.'</td>';}else{$ad4= '<td>   </td>';}
	    if(strlen($abdo5) >= 0){$ad5= '<td>'.$abdo5.'</td>';} else{$ad5= '<td>   </td>';}
	    if(strlen($abdo6) >= 0){$ad6= '<td>'.$abdo6.'</td></tr>';}else{$ad6= '<td>   </td></tr>';}

	    if(strlen($abdo7) >= 0){$ad7= '<tr><td>Dimensiones</td><td>'.$abdo7.'</td>';}else{$ad7= '<td>   </td>';}
	    if(strlen($abdo8) >= 0){$ad8= ' <td>'.$abdo8.'</td>';}else{$ad8= '<td>   </td>';}
	    if(strlen($abdo9) >= 0){$ad9= '<td>'.$abdo9.'</td></tr>';}else{$ad9= '<td>   </td></tr>';}
	    		


	    if(strlen($abdo10) >= 0){$ad10= '<tr><td>Ecogenicidad</td><td>'.$abdo10.'</td>';}else{$ad10= '<td>   </td>';}
	    if(strlen($abdo11) >= 0){$ad11= '<td>'.$abdo11.'</td>';}else{$ad11= '<td>   </td>';}
	    if(strlen($abdo12) >= 0){$ad12= '<td>'.$abdo12.'</td></tr>';}else{$ad12= '<td>   </td></tr>';}


	    if(strlen($abdo13) >= 0){$ad13= '<tr><td>Imagen Expansiva</td><td>'.$abdo13.'</td>';}else{$ad13= '<td>   </td>';}
	    if(strlen($abdo14) >= 0){$ad14= '<td>'.$abdo14.'</td>';}else{$ad14= '<td>   </td>';}
	    if(strlen($abdo15) >= 0){$ad15= '<td>'.$abdo15.'</td></tr>';}else{$ad15= '<td>   </td></tr>';}




	    if(strlen($abdo16) >= 0){$ad16= '<tr><td>Colédoco</td><td>'.$abdo16.'</td>';}else{$ad16= '<td>   </td>';}
	    if(strlen($abdo17) >= 0){$ad17= '<td>'.$abdo17.'</td>';}else{$ad17= '<td>   </td>';}
	    if(strlen($abdo18) >= 0){$ad18= '<td>'.$abdo18.'</td></tr>';}else{$ad18= '<td>   </td></tr>';}

	    if(strlen($abdo19) >= 0){$ad19= '<tr><td>Vena Porta</td><td>'.$abdo19.'</td>';}else{$ad19= '<td>   </td>';}
	    if(strlen($abdo20) >= 0){$ad20= '<td>'.$abdo20.'</td>';}else{$ad20='<td>   </td>';}
	    if(strlen($abdo21) >= 0){$ad21= '<td>'.$abdo21.'</td></tr>';}else{$ad21= '<td>   </td></tr>';}




	    if(strlen($abdo22) >= 0){$ad22= '
	    		<tr>
	    			<td colspan="4">Observación:<br>'.$abdo22.'</td>
	    		</tr>
	    	</table>';}else{$ad22 ='<td>   </td>';}


	    if(strlen($abdo23) >= 0){$ad23= '
	    	<table class="table table-bordered">
	    		<tr>
	    			<th colspan="4" class="text-center">Vesícula Biliar</th>
	    		</tr>
	    		<tr class="text-center">
	    			<th></th>
	    			<th>Normal</th>
	    			<th>Anormal</th>
	    			<th>Valor Normal</th>
	    		</tr>
	    		<tr>
	    			<td>Forma</td>
	    			<td>'.$abdo23.'</td>';}else{$ad23= '<td>   </td>';}
	      if(strlen($abdo24) >= 0){$ad24= '
	    			<td>'.$abdo24.'</td>';}else{$ad24 ='<td>   </td>';}
	    if(strlen($abdo25) >= 0){$ad25= '
	    			<td>'.$abdo25.'</td>
	    		</tr>';}else{$ad25= '<td>   </td>';}

	    if(strlen($abdo26) >= 0){$ad26= '
	    		<tr>
	    			<td>Paredes</td>
	    			<td>'.$abdo26.'</td>';}else{$ad26= '<td>   </td>';}
	    if(strlen($abdo27) >= 0){$ad27= '
	    			<td>'.$abdo27.'</td>';}else{$ad27 ='<td>   </td>';}
	    if(strlen($abdo28) >= 0){$ad28= '
	    			<td>'.$abdo28.'</td>
	    		</tr>';}else{$ad28= '<td>   </td>';}
if(strlen($abdo29) >= 0){$ad29= '
	    		<tr>
	    			<td>Tamaño</td>
	    			<td>'.$abdo29.'</td>';}else{$ad29 ='<td>   </td>';}
	    if(strlen($abdo30) >= 0){$ad30= '
	    			<td>'.$abdo30.'</td>';}else{$ad30 ='<td>   </td>';}
	    if(strlen($abdo31) >= 0){$ad31= '
	    			<td>'.$abdo31.'</td>
	    		</tr>';}else{$ad31= '<td>   </td>';}

	    if(strlen($abdo32) >= 0){$ad32= '
	    		<tr>
	    			<td>Barro Biliar</td>
	    			<td>'.$abdo32.'</td>';}else{$ad32 ='<td>   </td>';}
	    if(strlen($abdo33) >= 0){$ad33= '
	    			<td>'.$abdo33.'</td>';}else{$ad33 ='<td>   </td>';}
	    if(strlen($abdo34) >= 0){$ad34= '
	    			<td>'.$abdo34.'</td>
	    		</tr>';}else{$ad34= '<td>   </td>';}

	    if(strlen($abdo35) >= 0){$ad35= '
	    		<tr>
	    			<td>Imagen Expansiva</td>
	    			<td>'.$abdo35.'</td>';}else{$ad35= '<td>   </td>';}
	    if(strlen($abdo36) >= 0){$ad36= '
	    			<td>'.$abdo36.'</td>';} else{$ad36= '<td>   </td>';}
	    if(strlen($abdo37) >= 0){$ad37= '
	    			<td>'.$abdo37.'</td>
	    		</tr>';}else{$ad37= '<td>   </td>';}
	    if(strlen($abdo38) >= 0){$ad38= '
	    		<tr>
	    			<td colspan="4">Observación:<br>'.$abdo38.'</td>
	    		</tr>
	    	</table>';}else{$ad38= '<td>   </td>';}


	    if(strlen($abdo39) >= 0){$ad39= '
	    	<table class="table table-bordered">
	    		<tr>
	    			<th colspan="4" class="text-center">Páncreas</th>
	    		</tr>
	    		<tr class="text-center">
	    			<th></th>
	    			<th>Normal</th>
	    			<th>Anormal</th>
	    			<th>Valor Normal</th>
	    		</tr>
	    		<tr>
	    			<td>Forma</td>
	    				<td>'.$abdo39.'</td>';}else{$ad39 ='<td>   </td>';}
	    if(strlen($abdo40) >= 0){$ad40= '
	    			<td>'.$abdo40.'</td>';}else{$ad40 ='<td>   </td>';}
	    if(strlen($abdo41) >= 0){$ad41= '
	    			<td>'.$abdo41.'</td>
	    		</tr>';}else{$ad41 ='<td>   </td>';}
	    if(strlen($abdo42) >= 0){$ad42= '
	    		<tr>
	    			<td>Ecogenicidad</td>
	    			<td>'.$abdo42.'</td>';}else{$ad42= '<td>   </td>';}
	    if(strlen($abdo43) >= 0){$ad43= '
	    			<td>'.$abdo43.'</td>';}else{$ad43 ='<td>   </td>';}
	    if(strlen($abdo44) >= 0){$ad44= '
	    			<td>'.$abdo44.'</td>
	    		</tr>';}else{$ad44= '<td>   </td>';}

	    if(strlen($abdo45) >= 0){$ad45= '
	    		<tr>
	    			<td>Cabeza</td>
	    			<td>'.$abdo45.'</td>';}else{$ad45 ='<td>   </td>';}
	    if(strlen($abdo46) >= 0){$ad46= '
	    			<td>'.$abdo46.'</td>';}else{$ad46 ='<td>   </td>';}
	    if(strlen($abdo47) >= 0){$ad47= '
	    			<td>'.$abdo47.'</td>
	    		</tr>';}else{$ad47 ='<td>   </td>';}
	    if(strlen($abdo48) >= 0){$ad48= '
	    		<tr>
	    			<td>Cuerpo</td>
	    			<td>'.$abdo48.'</td>';} else{$ad48= '<td>   </td>';}
	    if(strlen($abdo49) >= 0){$ad49= '
	    			<td> '.$abdo49.'</td>';}else{$ad49= '<td>   </td>';}
	    if(strlen($abdo50) >= 0){$ad50= '
	    			<td>'.$abdo50.'</td>
	    		</tr>';}else{$ad50= '<td>   </td>';}
	    if(strlen($abdo51) >= 0){$ad51= '
	    		<tr>
	    			<td>Cola</td>
	    			<td>'.$abdo51.'</td>';}else{$ad51= '<td>   </td>';}
	    if(strlen($abdo52) >= 0){$ad52= '
	    			<td>'.$abdo52.'</td>';}else{$ad52 ='<td>   </td>';}
	    if(strlen($abdo53) >= 0){$ad53= '
	    			<td>'.$abdo53.'</td>
	    		</tr>';}else{$ad53= '<td>   </td>';}
	    if(strlen($abdo54) >= 0){$ad54= '
	    		<tr>
	    			<td>Wirsung</td>
	    			<td>'.$abdo54.'</td>';}else{$ad55= '<td>   </td>';}
	    if(strlen($abdo55) >= 0){$ad55= '
	    			<td>'.$abdo55.'</td>';}
	    if(strlen($abdo56) >= 0){$ad56= '
	    			<td>'.$abdo56.'</td>
	    		</tr>';}else{$ad56= '<td>   </td>';}
	    if(strlen($abdo57) >= 0){$ad57= '
	    		<tr>
	    			<td colspan="4">Observación:<br>'.$abdo57.'</td>
	    		</tr>
	    	</table>';}else{$ad57 ='<td>   </td>';}


	    if(strlen($abdo58) >= 0){$ad58= '
	    	<table class="table table-bordered">
	    		<tr>
	    			<th colspan="4" class="text-center">Bazo</th>
	    		</tr>
	    		<tr>
	    			<td colspan="2">Morfología, Ecogenicidad y Movilidad:<br>'.$abdo58.'</td>';}else{$ad58= '<td>   </td>';}
	    if(strlen($abdo59) >= 0){$ad59= '
	    			<td colspan="2">Tamaño (V.N < 130mm):<br>'.$abdo59.'</td>
	    		</tr>
	    	</table>';}else{$ad59 ='<td>   </td>';}
	    if(strlen($abdo60) >= 0){$ad60= '
	    	<table class="table table-bordered">
	    		<tr>
	    			<th colspan="4" class="text-center">Arteria Aorta, Vena Cava y Vena Porta</th>
	    		</tr>
	    		<tr>
	    			<td colspan="2">Calibre:'.$abdo60.'</td>';}else{$ad60='<td>   </td>';}
	    if(strlen($abdo61) >= 0){$ad61= '
	    			<td colspan="2">Flujo: '.$abdo61.'</td>
	    		</tr>';}else{$ad61='<td>   </td>';}
	    if(strlen($abdo62) >= 0){$ad62= '
	    		<tr>
	    			<td colspan="2">Pared Gástrica:'.$abdo62.'</td>';}else{$ad62='<td>   </td>';}
	    if(strlen($abdo63) >= 0){$ad63= '
	    			<td colspan="2">Líquido Libre:'.$abdo63.'</td>
	    		</tr>';}else{$ad63 ='<td>   </td>';}
	    if(strlen($abdo64) >= 0){$ad64= '
	    		<tr>
	    			<td colspan="4">Conclusión del Informe:<br>'.$abdo64.'';}else{$ad64='<td>   </td>';}

	    $ecografia_adbdominal=$ad1.$ad2.$ad3.$ad4.$ad5.$ad6.$ad7.$ad8.$ad9.$ad10.$ad11.$ad12.$ad13.$ad14.$ad15.$ad16.$ad17.$ad18.$ad19.$ad20.$ad21.$ad22.$ad23.$ad24.$ad25.$ad26.$ad27.$ad28.$ad29.$ad30.$ad31.$ad32.$ad33.$ad34.$ad35.$ad36.$ad37.$ad38.$ad39.$ad40.$ad41.$ad42.$ad43.$ad44.$ad45.$ad46.$ad47.$ad48.$ad49.$ad50.$ad51.$ad52.$ad53.$ad54.$ad55.$ad56.$ad57.$ad58.$ad59.$ad60.$ad61.$ad62.$ad63.$ad64.'</td></tr>'.$CiclosEmbarazoTexto.'</table>';

$query = "NSERT INTO historiaClinica_ecografias (cliente_id,usuario_id,Fecha,Hora,ecografiaDetalle,diagnostico,nombreEcografia) 
	    	VALUES ($pacienteId,$ID,$fechar,$hora,$ecografia_adbdominal,$abdo68,$tipo_eco);";
$enlace_actual = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$enlace_actual = str_replace('.php', '', $enlace_actual);

auditorMaster($idusuario, '1', $enlace_actual, $query);


	    mysqli_query($conn3,"
	    	INSERT INTO historiaClinica_ecografias (cliente_id,usuario_id,Fecha,Hora,ecografiaDetalle,diagnostico,nombreEcografia) 
	    	VALUES ('$pacienteId','$ID','$fechar','$hora','$ecografia_adbdominal','$abdo68','$tipo_eco')" );





				$historiaClinica1 = mysqli_insert_id($conn3);


				if($historiaClinica1!="0" AND $historiaClinica1!=""){
						$Fecha = date("Y-m-d");
						$DatosDocumentos = CargarDocumentos_DocumentosSistema_Ecografias($ID, $_FILES['ImagenesHistoriaEcografias'], "Ecografias");
				
						foreach ($DatosDocumentos as $key => $value) {
				
							$Doc_Nombre = $value["Nombre"];
							$Doc_Nombre_Original = $value["Nombre_Original"];
							$Doc_Ruta = $value["Ruta"];
							$Doc_Carpeta = $value["Carpeta"];
							$Tabla = "historiaClinica_ecografias";
							$tabla_id = $historiaClinica1;
							$Doc_usuario_id = $value["usuario_id"];
							$Campo_Input="ImagenesHistoriaEcografias";
							//insert en la tabla de arriba
							
							$Respuesta = mysqli_query($conn3,"INSERT INTO archivos (cliente_id,usuario_id,historia_id,codigo,fecha, NombreVisual,Realizado_Desde,Campo_Input) VALUES   ('$pacienteId', '$Doc_usuario_id','$historiaClinica1','$Doc_Nombre','$Fecha', '$Doc_Nombre_Original','historiaClinica_ecografias','ImagenesHistoriaEcografias')") or die (mysqli_error($conn3));
				
							if ($Respuesta != true) {
								echo "<script> alert('Error al insertar un documento $Doc_Nombre_Original')</script>";
							}
						} 
				}







    	 $codigo8=$_POST['archivo'];
       

      //$contador8=count($codigo8); 





 foreach($_FILES["archivo"]['tmp_name'] as $key => $tmp_name)
    {
        //Validamos que el archivo exista
        if($_FILES["archivo"]["name"][$key]) {
            
			$numeroAleatorio = rand(1, 99999999);
            $fechaHoyNumerica = date("Ymd");

            $Ran = $numeroAleatorio."-".$fechaHoyNumerica;
            $filename = $Ran."-".$_FILES["archivo"]["name"][$key];


			//$filename = $_FILES["archivo"]["name"][$key]; //Obtenemos el nombre original del archivo
            $source = $_FILES["archivo"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
            
            $directorio = 'archivos/'; //Declaramos un  variable con la ruta donde guardaremos los archivos
            
            //Validamos si la ruta de destino existe, en caso de no existir la creamos
            if(!file_exists($directorio)){
                mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");    
            }
            
            $dir=opendir($directorio); //Abrimos el directorio de destino
            $target_path = $directorio.'/'.$filename; //Indicamos la ruta de destino, así como el nombre del archivo
            
            //Movemos y validamos que el archivo se haya cargado correctamente
            //El primer campo es el origen y el segundo el destino
            if(move_uploaded_file($source, $target_path)) { 
                echo "El archivo $filename se ha almacenado en forma exitosa.<br>";
                } else {    
                echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
            }
            closedir($dir); //Cerramos el directorio de destino

			$descripcion = mysqli_real_escape_string($conn3,$descripcion);

			mysqli_query($conn3,"INSERT INTO archivos (cliente_id,usuario_id,historia_id,codigo,fecha, NombreVisual,descripcion,Realizado_Desde) VALUES   ('$pacienteId', '$ID', '$historiaClinica1','$filename','$fechar','$filename', '$descripcion','historiaClinica_ecografias')");  


echo "INSERT INTO archivos (cliente_id,usuario_id,historia_id,codigo,fecha, descripcion) VALUES   ('$pacienteId', '$ID', '$historiaClinica1','$filename','$fechar', '$descripcion')";  
        }
 




    


    }

$contador=$_POST['uploader_count'];


for ($i=0; $i <$contador ; $i++) { 
    $nomb=$_POST['uploader_'.$i.'_name'];

    mysqli_query($conn3,"INSERT INTO imgEcografia (idHistoria, imagen) VALUE
    ('$historiaClinica1','$nomb');");

		}



    }
   




	elseif ($tipo_eco == 'Ecografia Ultra Pelvica')
    {
    	//Datos de ecografia Abdominal
	    $abu1      = $_POST['motivo_estudio'];
	    $abu2      = $_POST['realiza'];
	    $abu3      = $_POST['dimensiones'];
	    $abu4      = $_POST['ap'];
	    $abu5      = $_POST['t'];
	    $abu6      = $_POST['posicion'];
	    $abu7      = $_POST['descripcion_1'];
	    $abu71      = $_POST['cervix'];
	    $abu8      = $_POST['ovariod'];
	    $abu9      = $_POST['ovarioi'];
	    $abu10     = $_POST['fondosaco'];
	    $abu10_1     = $_POST['cupula'];
	    $abu11     = $_POST['diagnostico7'];


		 ///////////////////////////////////////////////////////////////////////////

		 $Utero = $_POST['Utero_C'];
		 $Endometrio = $_POST['Endometrio_C'];
		 $Saco_Gestional = $_POST['Saco_Gestional_C'];
		 $Embrion = $_POST['Embrion_C'];
		 $Hallazgos = $_POST['Hallazgos_C'];
		 $Diagnostico = $_POST['Diagnostico_C'];
		 
		 $CiclosEmbarazoTexto="";
		 if (!empty($Utero) || !empty($Endometrio)) {
			 $CiclosEmbarazoTexto .= '<tr>';
			 if (!empty($Utero)) {
				 $CiclosEmbarazoTexto .= '<td colspan="2">Útero: ' . $Utero . '</td>';
			 }
			 if (!empty($Endometrio)) {
				 $CiclosEmbarazoTexto .= '<td colspan="2">Endometrio: ' . $Endometrio . '</td>';
			 }
			 $CiclosEmbarazoTexto .= '</tr>';
		 }
		 
		 if (!empty($Saco_Gestional) || !empty($Embrion)) {
			 $CiclosEmbarazoTexto .= '<tr>';
			 if (!empty($Saco_Gestional)) {
				 $CiclosEmbarazoTexto .= '<td colspan="2">Saco Gestacional: ' . $Saco_Gestional . '</td>';
			 }
			 if (!empty($Embrion)) {
				 $CiclosEmbarazoTexto .= '<td colspan="2">Embrión: ' . $Embrion . '</td>';
			 }
			 $CiclosEmbarazoTexto .= '</tr>';
		 }
		 
		 if (!empty($Hallazgos)) {
			 $CiclosEmbarazoTexto .= '<tr>';
			 $CiclosEmbarazoTexto .= '<td colspan="4">Hallazgos: ' . $Hallazgos . '</td>';
			 $CiclosEmbarazoTexto .= '</tr>';
		 }
		 
		 if (!empty($Diagnostico)) {
			 $CiclosEmbarazoTexto .= '<tr>';
			 $CiclosEmbarazoTexto .= '<td colspan="4">Diagnóstico: ' . $Diagnostico . '</td>';
			 $CiclosEmbarazoTexto .= '</tr>';
		 }
		 
		 if (!empty($CiclosEmbarazoTexto)) {
			 $CiclosEmbarazoTexto = '<tr><td colspan="4" style="text-align:center;"><b>Ciclos de Embarazo</b></td></tr>' . $CiclosEmbarazoTexto;
		 }
		 //////////////////////////////////////////////////////////////////////////////////

	    if(strlen($abu1) >= 0){$abu111= '
	    	<table class="table table-bordered">
	    		<tr>
	    			<th colspan="2">Motivo del Estudio: '.$abu1.'</th>
	    		</tr>';}

	    if(strlen($abu2) >= 0){$abu121= '
	    	<table class="table table-bordered">
	    		<tr>
	    			<th colspan="2">Se Realiza Ultrasonografía Pélvica, con Equipo Acuson NX2 Elite Transductor: '.$abu2.'</th>
	    		</tr>';}


	    if(strlen($abu3) >= 0){$abu13= '
	    	<table class="table table-bordered">
	    		<tr>
	    			<th colspan="4" class="text-center">Útero</th>
	    		</tr>
	    		<tr class="text-center">
	    			<th>Dimensiones L: '.$abu3.'</th>
	    			<th>AP:'.$abu4.'</th>
	    			<th>T: '.$abu5.'</th>
	    		</tr>
	    		<tr>';}

	    if(strlen($abu6) >= 0){$abu16= '
	    	<table class="table table-bordered">
	    		<tr>
	    			<th colspan="2">Posición:'.$abu6.'</th>
	    		</tr>';}

	    	if(strlen($abu7) >= 0){$abu17= '
	    	<table class="table table-bordered">
	    		<tr>
	    			<th colspan="2">Descripción:'.$abu7.'</th>
	    		</tr>';}


	       if(strlen($abu71) >= 0){$abu171= '
	    	<table class="table table-bordered">
	    		<tr>
	    			<th colspan="2">Cervix:'.$abu71.'</th>
	    		</tr>';}

	       if(strlen($abu8) >= 0){$abu18= '
	    	<table class="table table-bordered">
	    		<tr>
	    			<th colspan="2">Ovario Derecho:'.$abu8.'</th>
	    		</tr>';}

	      if(strlen($abu9) >= 0){$abu19= '
	    	<table class="table table-bordered">
	    		<tr>
	    			<th colspan="2">Ovario Izquierdo:'.$abu9.'</th>
	    		</tr>';}


	    	if(strlen($abu10) >= 0){$abu101= '
	    	<table class="table table-bordered">
	    		<tr>
	    			<th colspan="2">Fondo del Saco:'.$abu10.'</th>
	    		</tr>';}

	    	if(strlen($abu10_1) >= 0){$abu10_11= '
	    	<table class="table table-bordered">
	    		<tr>
	    			<th colspan="2">Cúpula:'.$abu10_1.'</th>
	    		</tr>';}

	    	/*if(strlen($abu8) > 1){$abu18= '
	    	<table class="table table-bordered">
	    		<tr>
	    			<th colspan="4" class="text-center">CERVIX CON QUISTE DE NABOTH</th>
	    		</tr>
	    		<tr class="text-center">
	    			<th>OVARIO DERECHO: '.$abu8.'</th>
	    			<th>OVARIO IZQUIERDO: '.$abu9.'</th>
	    			<th>FONDO DEL SACO: '.$abu10.'</th>
	    		</tr>
	    		<tr>';}*/

	    if(strlen($abu11) >= 0){$abu21= '
	    	<table class="table table-bordered">
	    		<tr>
	    			<th colspan="2">Diagnóstico:'.$abu11.'</th>
	    		</tr>';}


	    

	    $ecografia_ultrapelvica=$abu111.$abu121.$abu13.$abu14.$abu15.$abu16.$abu17.$abu171.$abu18.$abu19.$abu101.$abu10_11.$abu20.'</td></tr>'.$CiclosEmbarazoTexto.'</table>';

		$tipo_ecotilde = "Ecografía Ultra Pélvica";//agregar el nombre de la historia con tildes

$query = "INSERT INTO historiaClinica_ecografias (cliente_id,usuario_id,Fecha,Hora,ecografiaDetalle,diagnostico,nombreEcografia,nombreEcografiaTilde)
    		VALUES ($pacienteId,$ID,$fechar,$hora,$Datos,$eco36,$tipo_eco,$tipo_ecotilde);";
$enlace_actual = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$enlace_actual = str_replace('.php', '', $enlace_actual);

auditorMaster($idusuario, '1', $enlace_actual, $query);

	    mysqli_query($conn3,"
	    	INSERT INTO historiaClinica_ecografias (cliente_id,usuario_id,Fecha,Hora,ecografiaDetalle,diagnostico,nombreEcografia,nombreEcografiaTilde) 
	    	VALUES ('$pacienteId','$ID','$fechar','$hora','$ecografia_ultrapelvica','$abu11','$tipo_eco','$tipo_ecotilde')" );

			//$historiaClinica1 = mysqli_insert_id($conn3);

			$historiaClinica1 = mysqli_insert_id($conn3);


			if($historiaClinica1!="0" AND $historiaClinica1!=""){
					$Fecha = date("Y-m-d");
					$DatosDocumentos = CargarDocumentos_DocumentosSistema_Ecografias($ID, $_FILES['ImagenesHistoriaEcografias'], "Ecografias");
			
					foreach ($DatosDocumentos as $key => $value) {
			
						$Doc_Nombre = $value["Nombre"];
						$Doc_Nombre_Original = $value["Nombre_Original"];
						$Doc_Ruta = $value["Ruta"];
						$Doc_Carpeta = $value["Carpeta"];
						$Tabla = "historiaClinica_ecografias";
						$tabla_id = $historiaClinica1;
						$Doc_usuario_id = $value["usuario_id"];
						$Campo_Input="ImagenesHistoriaEcografias";
						//insert en la tabla de arriba
						
						$Respuesta = mysqli_query($conn3,"INSERT INTO archivos (cliente_id,usuario_id,historia_id,codigo,fecha, NombreVisual,Realizado_Desde,Campo_Input) VALUES   ('$pacienteId', '$Doc_usuario_id','$historiaClinica1','$Doc_Nombre','$Fecha', '$Doc_Nombre_Original','historiaClinica_ecografias','ImagenesHistoriaEcografias')") or die (mysqli_error($conn3));
			
						if ($Respuesta != true) {
							echo "<script> alert('Error al insertar un documento $Doc_Nombre_Original')</script>";
						}
					} 
			}






    	 $codigo9=$_POST['archivo'];
       

      //$contador9=count($codigo9); 



$descripcion          = $_POST['descripcion']; 
 foreach($_FILES["archivo"]['tmp_name'] as $key => $tmp_name)
    {
        //Validamos que el archivo exista
        if($_FILES["archivo"]["name"][$key]) {
            
			$numeroAleatorio = rand(1, 99999999);
            $fechaHoyNumerica = date("Ymd");

            $Ran = $numeroAleatorio."-".$fechaHoyNumerica;
            $filename = $Ran."-".$_FILES["archivo"]["name"][$key];

			//$filename = $_FILES["archivo"]["name"][$key]; //Obtenemos el nombre original del archivo
            $source = $_FILES["archivo"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
            
            $directorio = 'archivos/'; //Declaramos un  variable con la ruta donde guardaremos los archivos
            
            //Validamos si la ruta de destino existe, en caso de no existir la creamos
            if(!file_exists($directorio)){
                mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");    
            }
            
            $dir=opendir($directorio); //Abrimos el directorio de destino
            $target_path = $directorio.'/'.$filename; //Indicamos la ruta de destino, así como el nombre del archivo
            
            //Movemos y validamos que el archivo se haya cargado correctamente
            //El primer campo es el origen y el segundo el destino
            if(move_uploaded_file($source, $target_path)) { 
                echo "El archivo $filename se ha almacenado en forma exitosa.<br>";
                } else {    
                echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
            }
            closedir($dir); //Cerramos el directorio de destino

			$descripcion = mysqli_real_escape_string($conn3,$descripcion);

			mysqli_query($conn3,"INSERT INTO archivos (cliente_id,usuario_id,historia_id,codigo,fecha, NombreVisual,descripcion,Realizado_Desde) VALUES   ('$pacienteId', '$ID', '$historiaClinica1','$filename','$fechar','$filename' , '$descripcion', 'historiaClinica_ecografias')");  


echo "INSERT INTO archivos (cliente_id,usuario_id,historia_id,codigo,fecha, descripcion) VALUES   ('$pacienteId', '$ID', '$historiaClinica1','$filename','$fechar', '$descripcion')";  

        }
 




    


    }

$contador=$_POST['uploader_count'];


for ($i=0; $i <$contador ; $i++) { 
    $nomb=$_POST['uploader_'.$i.'_name'];

    mysqli_query($conn3,"INSERT INTO imgEcografia (idHistoria, imagen) VALUE
    ('$historiaClinica1','$nomb');");

		}



    }
















	if($_POST['Ruta_Historia_AutoGuardado']!=""){
		$Ruta_Historia_AutoGuardado = $_POST['Ruta_Historia_AutoGuardado'];
	
		$query = "UPDATE AutoGuardado SET Estado='0' WHERE cliente_id = '$pacienteId' and usuario_id = '$ID' and Ruta = '$Ruta_Historia_AutoGuardado' AND Estado = '1' ";
		mysqli_query($conn3, $query);
	}




    /*
    $query=mysqli_query($conn3,"SELECT MAX(ID) as ecografia from historiaClinica_ecografias");
    $nrowl=mysqli_num_rows($query);

    while($rowhc=mysqli_fetch_array($query)){$historiaClinica_ecografias=$rowhc['ecografia'];} 
	*/
    //echo "<script language='Javascript'> alert('ecografia=$historiaClinica_ecografias');</script>";


echo "<script language='Javascript'> window.location='GO_Finalizado_Ecografia.php?ecografia=$historiaClinica1';</script>";


?>